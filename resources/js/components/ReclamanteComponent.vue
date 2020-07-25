<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Reclamante</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Enfoque diferencial"
              v-model="reclamante.enfodifervictima"
            />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Genero" v-model="reclamante.genevictima" />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Edad" v-model="reclamante.edadvictima" />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Discapacidad"
              v-model="reclamante.discapavictima"
            />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Estrato" v-model="reclamante.estravictima" />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Embarazo" v-model="reclamante.embaravictima" />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Grupo Etnico"
              v-model="reclamante.grupetnicovictima"
            />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Entidad o persona que reclama"
              v-model="reclamante.persoentidreclama"
            />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Cedula" v-model="reclamante.persona.cedula" />
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
                      <th>Enf.Diferencial</th>
                      <th>Genero</th>
                      <th>Edad</th>
                      <th>Discapacidad</th>
                      <th>Estrato</th>
                      <th>Embarazo</th>
                      <th>Grupo Etnico</th>
                      <th>Entidad Reclamante</th>
                      <th>Persona Relacionada</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(reclamante,index) in usuarioss" :key="reclamante.index">
                      <td>{{reclamante.enfodifervictima}}</td>
                      <td>{{reclamante.genevictima}}</td>
                      <td>{{reclamante.edadvictima}}</td>
                      <td>{{reclamante.discapavictima}}</td>
                      <td>{{reclamante.estravictima}}</td>
                      <td>{{reclamante.embaravictima}}</td>
                      <td>{{reclamante.grupetnicovictima}}</td>
                      <td>{{reclamante.persoentidreclama}}</td>
                      <td>{{reclamante.persona.prinom}}</td>

                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(reclamante,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(reclamante,index)">
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Reclamante</h5>
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
                <input placeholder="Nombre" v-model="reclamante.persona.prinom" />
                <input placeholder="Cedula" v-model="reclamante.persona.cedula" />
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
        }
      },

      reclamante: {
        id: "",
        enfodifervictima: "",
        genevictima: "",
        edadvictima: "",
        discapavictima: "",
        estravictima: "",
        embaravictima: "",
        grupetnicovictima: "",
        persoentidreclama: "",
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
        }
      },

      esta: false,
      estado: "disable",
      usuarioss: [],

      errors: []
    };
  },
  created() {
    axios.get("/api/reclamante").then(res => {
      this.usuarioss = res.data;
    });
  },
  methods: {
    buscar() {
      axios.get("/api/persona/" + this.reclamante.persona.cedula).then(res => {
        if (res.data[0] == null) {
          this.reclamante.persona.cedula = "";
          this.reclamante.persona.prinom = "";
          console.log(this.reclamante.persona.cedula);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.reclamante.persona = person;
          this.esta = true;
        }
      });
    },
    agregar() {
      const params = {
        enfodifervictima: this.reclamante.enfodifervictima,
        genevictima: this.reclamante.genevictima,
        edadvictima: this.reclamante.edadvictima,
        discapavictima: this.reclamante.discapavictima,
        estravictima: this.reclamante.estravictima,
        embaravictima: this.reclamante.embaravictima,
        grupetnicovictima: this.reclamante.grupetnicovictima,
        persoentidreclama: this.reclamante.persoentidreclama,
        per_id: this.reclamante.persona.id
      };

      this.reclamante.enfodifervictima = "";
      this.reclamante.genevictima = "";
      this.reclamante.edadvictima = "";
      this.reclamante.discapavictima = "";
      this.reclamante.estravictima = "";
      this.reclamante.embaravictima = "";
      this.reclamante.grupetnicovictima = "";
      this.reclamante.persoentidreclama = "";
      this.reclamante.per_id = "";

      axios.post("/api/reclamante", params).then(res => {
        if (res.data == null) {
          alert("El reclamante no se ha registrado con exito");
        } else {
          alert("El reclamante se ha registrado");
        }
        this.usuarioss.push(res.data);s
      });
    },

    eliminar(usuario, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Usuario: ${usuario.username}`
      );
      if (confirmacion) {
        axios.delete("/api/reclamante/" + usuario.id).then(() => {
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
        .put("/api/reclamante/" + this.usuario.id, params)
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