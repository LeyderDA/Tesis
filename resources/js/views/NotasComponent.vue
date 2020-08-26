<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Notas</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Id Estudiante" v-model="notas.usuario.id" />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Nota primer corte" v-model="notas.notapricort" />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Nota segundo corte"
              v-model="notas.notasegcort"
            />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Nota tercer corte"
              v-model="notas.notateracort"
            />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Nota tercer corte" v-model="notas.notafinprom" />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <div class="col-12 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModal"
            @click="buscar()"
          >Buscar Estudiante</button>
        </div>

        <div class="col-12 form-group" v-if="true">
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
                       <th>Usuario</th>
                      <th>Primer Corte</th>
                      <th>Segundo Corte</th>
                      <th>Tercer Corte</th>
                      
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(notas,index) in notass" :key="notas.index">
                      <td>{{notas.usuario.username}}</td>
                      <td>{{notas.notapricort}}</td>
                       <td>{{notas.notasegcort}}</td>
                        <td>{{notas.notateracort}}</td>


                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(notas,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(notas,index)">
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Notas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Nota 1" v-model="notas.notapricort" />
                <input placeholder="Nota 2" v-model="notas.notasegcort" />
                <input placeholder="Nota 3" v-model="notas.notateracort" />
                <input placeholder="Promedio" v-model="notas.notafinprom" />
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
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Nombre" v-model="notas.usuario.id" />
                <input placeholder="Cedula" v-model="notas.usuario.username" />
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

      notas: {
        id: "",
        notapricort: "",
        notasegcort: "",
        notateracort: "",
        notafinprom: "",
        usu_id: "",
        
        usuario: {
          id: "",
          username: "",
          email: "",
          email_verified_at: "",
          password: "",
          rol_id: "",
          per_id: "",
        },
      },

      esta: false,
      estado: "disable",
      notass: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/notas").then((res) => {
      this.notass = res.data;
    });
  },
  methods: {
    buscar() {
      axios.get("/api/user/" + this.notas.usuario.id).then((res) => {
        if (res.data[0] == null) {
          this.notas.usuario.id = "";
          this.notas.usuario.username = "";
          console.log(this.notas.usuario.id);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.notas.usuario = person;
          this.esta = true;
        }
      });
    },

    agregar() {
      // alert(this.personas.prinom);
      const params = {
        notapricort: this.notas.notapricort,
        notasegcort: this.notas.notasegcort,
        notateracort: this.notas.notateracort,
        notafinprom: this.notas.notafinprom,
        usu_id: this.notas.usuario.id,
      };
      this.notas.notapricort = "";
      this.notas.notasegcort = "";
      this.notas.notateracort = "";
      this.notas.notafinprom = "";
      this.notas.usuario.id = "";

      axios.post("/api/notas", params).then((res) => {
        if (res.data == null) {
          alert("La nota no se ha registrado con exito");
        } else {
          alert("La nota se ha registrado");
        }
        this.notass.push(res.data);
      });
    },

    eliminar(notas, index) {
      const confirmacion = confirm(`Confirma Eliminar Usuario: ${notas.id}`);
      if (confirmacion) {
        axios.delete("/api/notas/" + usuario.id).then(() => {
          this.notass.splice(index, 1);
          alert("Las Notas se han eliminado con exito");
        });
      }
    },
    editarForm(notas, index) {
      this.notas = notas;
      this.notas.index = index;
    },
    editar() {
      const params = {
        notapricort: this.notas.notapricort,
        notasegcort: this.notas.notasegcort,
        notateracort: this.notas.notateracort,
        notafinprom: this.notas.notafinprom,
        usu_id: this.notas.usuario.id,
      };
      axios
        .put("/api/notas/" + this.notas.id, params)
        .then((res) => {
          if (res.data == null) {
            alert("Las Notas no se ha actualizado");
          } else {
            alert("Las Notas se ha actualizado");
          }

          this.notass[this.notas.index] = res.data;
          this.notas.usuario.id = "";

          this.notass[this.notas.index] = res.data;
          this.notas.notapricort = "";

          this.notass[this.notas.index] = res.data;
          this.notas.notasegcort = "";

          this.notass[this.notas.index] = res.data;
          notas.notateracort = "";

          this.notass[this.notas.index] = res.data;
          this.notas.notafinprom = "";
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.username[0]);
            alert(this.errors.email[0]);
          }
        });
    },
  },
};
</script>