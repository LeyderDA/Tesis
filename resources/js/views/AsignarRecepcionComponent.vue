<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Usuario</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <div class="col-6 form-group">
            <input class="form-control" placeholder="ID_RECEPCION" v-model="usurecep.recepcion.id" />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="ID_USUARIO" v-model="usurecep.usuario.id" />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <div class="col-12 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalRE"
            @click="buscarrecep()"
          >Buscar Recepción</button>
        </div>

        <div class="col-12 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalUSU"
            @click="buscarusu()"
          >Buscar Usuario</button>
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
                      <th>ID RECEPCIÓN</th>
                      <th>ID ASIGNADO</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(usurecep,index) in usurecepss" :key="usurecep.index">
                      <td>{{usurecep.recp_id}}</td>
                      <td>{{usurecep.usu_id}}</td>
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(usurecep,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(usurecep,index)">
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Asignacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="ID_RECEPCION" v-model="usurecep.recp_id" />
                <div class="col-12 form-group" v-if="true">
                  <button
                    class="btn btn-primary btn-block"
                    data-toggle="modal"
                    data-target="#buscarModalRE"
                    @click="buscarrecep()"
                  >Buscar Recepción</button>
                </div>
                <input placeholder="ID_USUARIO" v-model="usurecep.usu_id" />
                <div class="col-12 form-group" v-if="true">
                  <button
                    class="btn btn-primary btn-block"
                    data-toggle="modal"
                    data-target="#buscarModalUSU"
                    @click="buscarusu()"
                  >Buscar Usuario</button>
                </div>
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

        <!--segundo modal - el de buscar RECEPCION-->
        <div
          class="modal fade"
          id="buscarModalRE"
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
                <input placeholder="ID" v-model="usurecep.recepcion.id" />
                <input placeholder="RECEPCIONADO" v-model="usurecep.recepcion.recepcionado" />
                <input placeholder="FECHA DE RADICADO" v-model="usurecep.recepcion.fecharadicado" />
                <input placeholder="FECHA DE RECEPCIONADO" v-model="usurecep.recepcion.fecharecepcionado"/>
                <input placeholder="CONSULTORIO" v-model="usurecep.recepcion.consultorio" />
                <input placeholder="FECHA DE REPARTO" v-model="usurecep.recepcion.fechareparto" />
                <input placeholder="FECHA DE PUBLICACIÓN" v-model="usurecep.recepcion.fechapublicacion" />
                <input placeholder="FECHA DE RETIRO" v-model="usurecep.recepcion.fecharetiro" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--segundo modal - el de buscar USUARIO-->
        <div
          class="modal fade"
          id="buscarModalUSU"
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
                <input placeholder="ID USUARIO" v-model="usurecep.usuario.id" />
                <input placeholder="USERNAME" v-model="usurecep.usuario.username" />
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
        usurecep: {
        id: "",
        recp_id: "",
        usu_id: "",

        recepcion: {
          id: "",
          recepcionado: "",
          fecharadicado: "",
          fecharecepcionado: "",
          consultorio: "",
          fechareparto: "",
          fechapublicacion: "",
          fecharetiro: "",
        },
        usuario: {
          id: "",
          username: "",
          email: "",
          email_verified_at: "",
          password: "",
        },
      },

      esta: false,
      estado: "disable",
      usurecepss: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/asigrecep").then((res) => {
      this.usurecepss = res.data;
    });
  },
  methods: {
    buscarusu() {
      axios.get("/api/user/" + this.usurecep.usuario.id).then((res) => {
        if (res.data[0] == null) {
          this.usurecep.usuario.id = "";
          this.usurecep.usuario.username = "";
          console.log(this.usurecep.usuario.id);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usurecep.usuario = person;
          this.esta = true;
        }
      });
    },

    buscarrecep() {
      axios.get("/api/recepcion/" + this.usurecep.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          this.usurecep.recepcion.id = "";
          this.usurecep.recepcion.recepcionado = "";
          this.usurecep.recepcion.fecharadicado = "";
          this.usurecep.recepcion.fecharecepcionado = "";
          this.usurecep.recepcion.consultorio = "";
          this.usurecep.recepcion.fechareparto = "";
          this.usurecep.recepcion.fechapublicacion = "";
          this.usurecep.recepcion.fecharetiro = "";
          console.log(this.usurecep.recepcion.id);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usurecep.recepcion = person;
          this.esta = true;
        }
      });
    },
    agregar() {
      // alert(this.personas.prinom);
      const params = {
        recp_id: this.usurecep.recepcion.id,
        usu_id: this.usurecep.usuario.id,
      };
      this.usurecep.recepcion.id = "";
      this.usurecep.usuario.id = "";

      axios.post("/api/asigrecep", params).then((res) => {
        if (res.data == null) {
          alert("La asignacion no se ha registrado con exito");
        } else {
          alert("La asignacion se ha registrado");
        }
        this.usurecepss.push(res.data);
      });
    },

    eliminar(usurecep, index) {
      const confirmacion = confirm(
        `Confirma Eliminar la asignacion con id de usuario: ${usurecep.usu_id}`
      );
      if (confirmacion) {
        axios.delete("/api/asigrecep/" + usurecep.id).then(() => {
          this.usurecepss.splice(index, 1);
          alert("La asignación se ha eliminado con exito");
        });
      }
    },
    editarForm(usurecep, index) {
      this.usurecep = usurecep;
      this.usurecep.index = index;
    },
    editar() {
      const params = {
        recp_id: this.usurecep.recp_id,
        usu_id: this.usurecep.usu_id,
      };
      axios
        .put("/api/asigrecep/" + this.usurecep.usu_id, params)
        .then((res) => {
          if (res.data == null) {
            alert("La asignación no se ha actualizado");
          } else {
            alert("La asignación se ha actualizado");
          }

          this.usurecepss[this.usurecep.index] = res.data;
          this.usurecep.recp_id = "";

          this.usurecepss[this.usurecep.index] = res.data;
          this.usurecep.usu_id = "";

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