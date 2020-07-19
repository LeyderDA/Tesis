<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Recepcion</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label">Escoge el area</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Area" v-model="receparea.area.nombre" />
          </div>

          <label class="col-5 col-form-label">Fecha radicado</label>

          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de radicado"
              v-model="recepusu.fecharadicado"
            />
          </div>

          <label class="col-5 col-form-label">Fecha recepcionado</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha recepcionado"
              v-model="recepusu.fecharecepcionado"
            />
          </div>

          <label class="col-5 col-form-label">Fecha reparto</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha reparto"
              v-model="recepusu.fechareparto"
            />
          </div>

          <label class="col-5 col-form-label">Fecha de publicación</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de publicación"
              v-model="recepusu.fechapublicacion"
            />
          </div>

          <label class="col-5 col-form-label">Fecha de retiro</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de retiro"
              v-model="recepusu.fecharetiro"
            />
          </div>

          <label class="col-5 col-form-label">Recepcionado en</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Recepcionado en"
              v-model="recepusu.recepcionado"
            />
          </div>

          <label class="col-5 col-form-label">Consultorio</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Consultorio" v-model="recepusu.consultorio" />
          </div>

          <label class="col-5 col-form-label">Digita la cedula del usuario</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Usuario" v-model="recepusu.personausu.cedula" />
          </div>

          <label class="col-5 col-form-label">Digita la cedula del asignado</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Asignado"
              v-model="recepasig.personaasig.cedula"
            />
          </div>

          <label class="col-5 col-form-label">Digita la cedula del Recepcionador</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Recepciona"
              v-model="receprecep.personarecep.cedula"
            />
          </div>

          <label class="col-5 col-form-label">Digita la cedula del reclamante</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Reclamante"
              v-model="receprecla.personarecla.cedula"
            />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <!--buscar area -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscararea"
            @click="buscararea()"
          >Buscar Area</button>
        </div>
        <!--buscar area -->

        <!--buscar usuario -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalusu"
            @click="buscarusu()"
          >B.Usu</button>
        </div>
        <!--buscar usuario -->

        <!--buscar asignado -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarasig"
            @click="buscarasig()"
          >B.Asg</button>
        </div>
        <!--buscar asignado -->

        <!--buscar recepcionador -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarrecep"
            @click="buscarrecep()"
          >B.Rcp</button>
        </div>
        <!--buscar recepcionador -->
        <!--buscar reclamante -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarrecla"
            @click="buscarrecla()"
          >B.Rcl</button>
        </div>
        <!--buscar reclamante -->

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
                      <th>Area</th>
                      <th>Fecha de Radicado</th>
                      <th>Fecha de Recepcionado</th>
                      <th>Fecha de Reparto</th>
                      <th>Fecha de Publicación</th>
                      <th>Fecha de Retiro</th>
                      <th>Recepcionado en</th>
                      <th>Consultorio</th>
                      <th>Usuario</th>
                      <th>Asignado</th>
                      <th>Recepcionador</th>
                      <th>Reclamante</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(recepusu,index) in usuarioss" :key="recepusu.index">
                      <td>{{receparea.area.nombre}}</td>
                      <td>{{recepusu.fecharadicado}}</td>
                      <td>{{recepusu.fecharecepcionado}}</td>
                      <td>{{recepusu.fechareparto}}</td>
                      <td>{{recepusu.fechapublicacion}}</td>
                      <td>{{recepusu.fecharetiro}}</td>
                      <td>{{recepusu.recepcionado}}</td>
                      <td>{{recepusu.consultorio}}</td>
                      <td>{{recepusu.personausu.cedula}}</td>
                      <td>{{recepasig.personaasig.cedula}}</td>
                      <td>{{receprecep.personarecep.cedula}}</td>
                      <td>{{receprecla.personarecla.cedula}}</td>
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

        <!--modal de area -->
        <div
          class="modal fade"
          id="buscararea"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Nombre" v-model="receparea.area.nombre" />
                <input placeholder="Id" v-model="receparea.area.id" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de area -->

        <!--segundo modal - el de buscar usuario -->
        <div
          class="modal fade"
          id="buscarModalusu"
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
                <input placeholder="Nombre" v-model="recepusu.personausu.prinom" />
                <input placeholder="Cedula" v-model="recepusu.personausu.cedula" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--modal de buscar asignado -->
        <div
          class="modal fade"
          id="buscarasig"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Nombre" v-model="recepasig.personaasig.prinom" />
                <input placeholder="Cedula" v-model="recepasig.personaasig.cedula" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--segundo modal - el de buscar recepcionador -->
        <div
          class="modal fade"
          id="buscarrecep"
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
                <input placeholder="Nombre" v-model="receprecep.personarecep.prinom" />
                <input placeholder="Cedula" v-model="receprecep.personarecep.cedula" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--modal de buscar reclamante -->
        <div
          class="modal fade"
          id="buscarrecla"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Nombre" v-model="receprecla.personarecla.prinom" />
                <input placeholder="Cedula" v-model="receprecla.personarecla.cedula" />
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

      recepusu: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",
        usu_id: "",

        personausu: {
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
      recepasig: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",
        asig_id: "",

        personaasig: {
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

      receprecep: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",
        recep_id: "",

        personarecep: {
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

      receprecla: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",
        recla_id: "",

        personarecla: {
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

      receparea: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",
        area_id: "",

        area: {
          id: "",
          nombre: ""
        }
      },

      esta: false,
      estado: "disable",
      usuarioss: [],
      asignadoss: [],
      recepcionadoss: [],
      reclamantess: [],
      errors: []
    };
  },
  created() {
    axios.get("/api/recepcion").then(res => {
      this.usuarioss = res.data;
    });
  },
  methods: {
    buscarusu() {
      axios.get("/api/persona/" + this.recepusu.personausu.cedula).then(res => {
        if (res.data[0] == null) {
          this.recepusu.personausu.cedula = "";
          this.recepusu.personausu.prinom = "";
          console.log(this.recepusu.personausu.cedula);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.recepusu.personausu = person;
          this.esta = true;
        }
      });
    },
    buscarasig() {
      axios
        .get("/api/persona/" + this.recepasig.personaasig.cedula)
        .then(res => {
          if (res.data[0] == null) {
            this.recepasig.personaasig.cedula = "";
            this.recepasig.personaasig.prinom = "";
            console.log(this.recepasig.personaasig.cedula);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.recepasig.personaasig = person;
            this.esta = true;
          }
        });
    },

    buscarrecep() {
      axios
        .get("/api/persona/" + this.receprecep.personarecep.cedula)
        .then(res => {
          if (res.data[0] == null) {
            this.receprecep.personarecep.cedula = "";
            this.receprecep.personarecep.prinom = "";
            console.log(this.receprecep.personarecep.cedula);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.receprecep.personarecep = person;
            this.esta = true;
          }
        });
    },

    buscarrecla() {
      axios
        .get("/api/persona/" + this.receprecla.personarecla.cedula)
        .then(res => {
          if (res.data[0] == null) {
            this.receprecla.personarecla.cedula = "";
            this.receprecla.personarecla.prinom = "";
            console.log(this.receprecla.personarecla.cedula);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.receprecla.personarecla = person;
            this.esta = true;
          }
        });
    },

    buscararea() {
      axios.get("/api/area/" + this.receparea.area.nombre).then(res => {
        if (res.data[0] == null) {
          this.receparea.area.nombre = "";
          this.receparea.area.id = "";
          console.log(this.receparea.area.nombre);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let are = res.data[0];
          this.receparea.area = are;
          this.esta = true;
        }
      });
    },
    agregar() {
      const params = {
        recepcionado: this.recepusu.recepcionado,
        fecharadicado: this.recepusu.fecharadicado,
        fecharecepcionado: this.recepusu.fecharecepcionado,
        consultorio: this.recepusu.consultorio,
        fechareparto: this.recepusu.fechareparto,
        fechapublicacion: this.recepusu.fechapublicacion,
        fecharetiro: this.recepusu.fecharetiro,
        usu_id: this.recepusu.personausu.id,
        asig_id: this.recepasig.personaasig.id,
        recep_id: this.receprecep.personarecep.id,
        recla_id: this.receprecla.personarecla.id,
        area_id: this.receparea.area.id
      };
      this.recepusu.recepcionado = "";
      this.recepusu.fecharadicado = "";
      this.recepusu.fecharecepcionado = "";
      this.recepusu.consultorio = "";
      this.recepusu.fechareparto = "";
      this.recepusu.fechapublicacion = "";
      this.recepusu.fecharetiro = "";
      this.recepusu.personausu = "";
      this.recepasig.personaasig = "";
      this.receprecep.personarecep = "";
      this.receprecla.personarecla = "";
      this.receparea.area = "";

      axios.post("/api/recepcion", params).then(res => {
        if (res.data == null) {
          alert("La recepcion No se registro porque tiene errores");
        } else {
          alert("L recepción se ha registrado con EXITO");
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