<template>
  <div class="card">
    <div>
      <h4 class="text-center mb-2 card-title">Registrando Usuario</h4>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Nombre de Usuario" v-model="usuario.username"
             />
          </div>



          <div class="col-6 form-group">
            <input class="form-control" placeholder="Email" v-model="usuario.email"
              />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Contraseña" v-model="usuario.password" 
           />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Cedula" v-model="usuario.persona.cedula" />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <div class="col-6 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModal"
            @click="buscar()"
          >Buscar</button>
        </div>

        <div class="col-6 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
        </div>
      </div>
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Nombre Persona</th>
                      <th>Apellido Persona</th>
                       <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(usuario,index) in usuarioss" :key="usuario.index">
                      <td>{{usuario.username}}</td>
                      <td>{{usuario.email}}</td>
                      <td>{{usuario.persona.prinom}}</td>
                      <td>{{usuario.persona.priape}}</td>

                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(usuario,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(usuario,index)">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div
          class="modal fade"
          id="editarModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Username" v-model="usuario.username" />
                <input placeholder="Email" v-model="usuario.email" />
                <input placeholder="Contraseña" v-model="usuario.password" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button
                  type="button"
                  class="btn btn-primary"
                  @click="editar()"
                  data-dismiss="modal"
                >Guardar Cambios</button>
              </div>
            </div>
          </div>
        </div>

        <!--segundo modal - el de buscar -->
        <div
          class="modal fade"
          id="buscarModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Nombre" v-model="usuario.persona.prinom" />
                <input placeholder="Cedula" v-model="usuario.persona.cedula" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      usuario: {
        id: "",
        username: "",
        email: "",
        email_verified_at: "",
        password: "",
        per_id: "",

         persona: {
        id: "",
        cedula: "",
        prinom: "",
        segnom: "",
        priape: "",
        segape: "",
        tel: "",
        direc: ""
      },
      },
     
      esta:false,
      estado:'disable',
      usuarioss: [],
      errors: []
    };
  },
  created() {
    axios.get("/api/user").then(res => {
      this.usuarioss = res.data;
    });
  },
  methods: {
    
    buscar() {
      axios.get("/api/persona/" + this.usuario.persona.cedula).then(res => {
        if (res.data[0] == null) {
          this.usuario.persona.cedula = "";
          this.usuario.persona.prinom = "";
          console.log(this.usuario.persona.cedula);
          this.esta=false
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usuario.persona = person;
          this.esta=true
        }
      });
    },
    agregar() {
      // alert(this.personas.prinom);
      const params = {
        username: this.usuario.username,
        email: this.usuario.email,
        password: this.usuario.password,
        per_id: this.usuario.persona.id
      };
      this.usuario.username = "";
      this.usuario.email = "";
      this.usuario.password = "";
      this.usuario.per_id = "";

      axios.post("/api/user", params).then(res => {
        if (res.data == null) {
          alert("El usuario no se ha registrado con exito");
        } else {
          alert("El usuario se ha registrado");
        }
        this.usuarioss.push(res.data);
      });
    },

    eliminar(usuario, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Usuario: ${usuario.username}`
      );
      if (confirmacion) {
        axios.delete("/api/user/" + usuario.id).then(() => {
          this.usuarioss.splice(index, 1);
          alert("El usuario se ha eliminado con exito");
        });
      }
    },
    editarForm(usuario, index) {
      this.usuario = usuario;
      this.usuario.index = index;
    },
    editar() {
      const params = {
        username: this.usuario.username,
        email: this.usuario.email,
        password: this.usuario.password,
        per_id: this.usuario.per_id
      };
      axios
        .put("/api/user/" + this.usuario.id, params)
        .then(res => {
          if (res.data == null) {
            alert("El Usuario no se ha actualizado");
          } else {
            alert("El Usuario se ha actualizado");
          }
          //alert(this.area.index)
          this.usuarioss[this.usuario.index] = res.data;
          this.usuario.id = "";

          this.usuarioss[this.usuario.index] = res.data;
          this.usuario.username = "";

          this.usuarioss[this.usuario.index] = res.data;
          this.usuario.email = "";

          this.usuarioss[this.usuario.index] = res.data;
          this.usuario.password = "";
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.id[0]);
            alert(this.errors.username[0]);
            alert(this.errors.email[0]);
            alert(this.errors.password[0]);
          }
        });
    }
  }
};
</script>