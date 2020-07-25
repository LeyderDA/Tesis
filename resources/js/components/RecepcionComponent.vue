<template>
  <div class="card">
    <div>
      <h1 class="text-center mb-2 card-title">Registrando Recepcion</h1>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label">Escoge el area</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Area" v-model="recepcion.area.nombre" />
          </div>

          <label class="col-5 col-form-label">Fecha radicado</label>

          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de radicado"
              v-model="recepcion.fecharadicado"
            />
          </div>

          <label class="col-5 col-form-label">Fecha recepcionado</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha recepcionado"
              v-model="recepcion.fecharecepcionado"
            />
          </div>

          <label class="col-5 col-form-label">Fecha reparto</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha reparto"
              v-model="recepcion.fechareparto"
            />
          </div>

          <label class="col-5 col-form-label">Fecha de publicación</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de publicación"
              v-model="recepcion.fechapublicacion"
            />
          </div>

          <label class="col-5 col-form-label">Fecha de retiro</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de retiro"
              v-model="recepcion.fecharetiro"
            />
          </div>

          <label class="col-5 col-form-label">Recepcionado en</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Recepcionado en"
              v-model="recepcion.recepcionado"
            />
          </div>

          <label class="col-5 col-form-label">Consultorio</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Consultorio" v-model="recepcion.consultorio" />
          </div>

          <label class="col-5 col-form-label">Ingresa el ID del estudiante</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Estudiante" v-model="recepcion.estudiante.id" />
          </div>

          <label class="col-5 col-form-label">Ingresa el ID del asignado</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Asignado" v-model="recepcion.docente.id" />
          </div>

          <label class="col-5 col-form-label">Ingresa el ID del Recepcionador</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Recepciona"
              v-model="recepcion.administrativo.id"
            />
          </div>

          <label class="col-5 col-form-label">Ingresa el ID del reclamante</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Reclamante" v-model="recepcion.reclamante.id" />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <!--buscar area -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalarea"
            @click="buscararea()"
          >Buscar Area</button>
        </div>
        <!--buscar area -->

        <!--buscar estudiante -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalest"
            @click="buscarest()"
          >B.Estudiante Usu</button>
        </div>
        <!--buscar usuario -->

        <!--buscar asignado -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModaldoc"
            @click="buscardoc()"
          >B.Docente Asig</button>
        </div>
        <!--buscar asignado -->

        <!--buscar recepcionador -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModaladm"
            @click="buscaradm()"
          >B.Admin Recep</button>
        </div>
        <!--buscar recepcionador -->

          <!--buscar reclamante -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalrecl"
            @click="buscarrecl()"
          >B.Reclamante</button>
        </div>
        <!--buscar recepcionador -->

    

        <div class="col-6 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
        </div>
      </div>
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div class="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Fecha de Radicado</th>
                      <th>Fecha de Recepcionado</th>
                      <th>Fecha de Reparto</th>
                      <th>Fecha de Publicación</th>
                      <th>Fecha de Retiro</th>
                      <th>Recepcionado en</th>
                      <th>Consultorio</th>
                      <th>Usuario</th>
                      <th>Asignado</th>
                      <th>Recepcionista</th>
                      <th>Reclamante</th>
                      <th>Area</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(recepcion,index) in recepcioness" :key="recepcion.index">
                      <td>{{recepcion.fecharadicado}}</td>
                      <td>{{recepcion.fecharecepcionado}}</td>
                      <td>{{recepcion.fechareparto}}</td>
                      <td>{{recepcion.fechapublicacion}}</td>
                      <td>{{recepcion.fecharetiro}}</td>
                      <td>{{recepcion.recepcionado}}</td>
                      <td>{{recepcion.consultorio}}</td>
                      <td>{{recepcion.estudiante.persona.nombre}}</td>
                      <td>{{recepcion.docente.persona.nombre}}</td>
                      <td>{{recepcion.administrativo.persona.nombre}}</td>
                      <td>{{recepcion.reclamante.persona.nombre}}</td>
                      <td>{{recepcion.area.nombre}}</td>
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(recepcion,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(recepcion,index)">
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
          id="buscarModalarea"
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
                
                <input placeholder="Id" v-model="recepcion.area.id" />
                <input placeholder="Nombre" v-model="recepcion.area.nombre" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de area -->

        <!--segundo modal - el de buscar estudiante -->
        <div
          class="modal fade"
          id="buscarModalest"
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
                <input placeholder="Id" v-model="recepcion.estudiante.id" />
                <input placeholder="Nombre" v-model="recepcion.estudiante.per_id" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--segundo modal - el de buscar docente -->
        <div
          class="modal fade"
          id="buscarModaldoc"
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
                <input placeholder="Id Docente" v-model="recepcion.docente.id" />
                <input placeholder="Id Persona" v-model="recepcion.docente.per_id" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--segundo modal - el de buscar Administrativo -->
        <div
          class="modal fade"
          id="buscarModaladm"
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
                <input placeholder="Id Docente" v-model="recepcion.administrativo.id" />
                <input placeholder="Id Persona" v-model="recepcion.administrativo.per_id" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->
        

           <!--segundo modal - el de buscar reclamante -->
        <div
          class="modal fade"
          id="buscarModalrecl"
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
                <input placeholder="Id Docente" v-model="recepcion.reclamante.id" />
                <input placeholder="Id Persona" v-model="recepcion.reclamante.per_id" />
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
          direc: "",
        },
      },

      recepcion: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",

        estudiante: {
          id: "",
          per_id: "",
          persona: {
            id: "",
            cedula: "",
            prinom: "",
            segnom: "",
            priape: "",
            segape: "",
            tel: "",
            direc: "",
          },
        },
        docente: {
          id: "",
          per_id: "",
          persona: {
            id: "",
            cedula: "",
            prinom: "",
            segnom: "",
            priape: "",
            segape: "",
            tel: "",
            direc: "",
          },
        },
        administrativo: {
          id: "",
          per_id: "",
          persona: {
            id: "",
            cedula: "",
            prinom: "",
            segnom: "",
            priape: "",
            segape: "",
            tel: "",
            direc: "",
          },
        },
        reclamante: {
          id: "",
          per_id: "",
          persona: {
            id: "",
            cedula: "",
            prinom: "",
            segnom: "",
            priape: "",
            segape: "",
            tel: "",
            direc: "",
          },
        },
        area: {
          id: "",
          nombre: "",
        },
      },

      esta: false,
      estado: "disable",
      recepcioness: [],
      errors: [],
    };
  },
  created() {
    axios.get("/api/recepcion").then((res) => {
      this.recepcioness = res.data;
    });
  },
  methods: {
    buscarest() {
      axios
        .get("/api/estudiante/" + this.recepcion.estudiante.id)
        .then((res) => {
          if (res.data[0] == null) {
            this.recepcion.estudiante.id = "";
            this.recepcion.estudiante.per_id = "";
            console.log(this.recepcion.estudiante);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.recepcion.estudiante = person;
            this.esta = true;
          }
        });
    },
buscardoc() {
      axios.get("/api/docente/" + this.recepcion.docente.id).then((res) => {
        if (res.data[0] == null) {
          this.recepcion.docente.id = "";
          this.recepcion.docente.per_id = "";
          console.log(this.recepcion.docente);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.recepcion.docente = person;
          this.esta = true;
        }
      });
    },


buscaradm() {
      axios
        .get("/api/administrativo/" + this.recepcion.administrativo.id)
        .then((res) => {
          if (res.data[0] == null) {
            this.recepcion.administrativo.id = "";
            this.recepcion.administrativo.per_id = "";
            console.log(this.recepcion.administrativo);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.recepcion.administrativo = person;
            this.esta = true;
          }
        });
    },
    

    buscarrecl() {
      axios
        .get("/api/reclamante/" + this.recepcion.reclamante.id)
        .then((res) => {
          if (res.data[0] == null) {
            this.recepcion.reclamante.id = "";
            this.recepcion.reclamante.per_id = "";
            console.log(this.recepcion.reclamante);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.recepcion.reclamante = person;
            this.esta = true;
          }
        });
    },
    

    buscararea() {
      axios
        .get("/api/area/" + this.recepcion.area.nombre)
        .then((res) => {
          if (res.data[0] == null) {
            this.recepcion.area.id = "";
            this.recepcion.area.nombre = "";
            console.log(this.recepcion.area);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.recepcion.area = person;
            this.esta = true;
          }
        });
    },
    
    

    

    agregar() {
      const params = {
        recepcionado: this.recepcion.recepcionado,
        fecharadicado: this.recepcion.fecharadicado,
        fecharecepcionado: this.recepcion.fecharecepcionado,
        consultorio: this.recepcion.consultorio,
        fechareparto: this.recepcion.fechareparto,
        fechapublicacion: this.recepcion.fechapublicacion,
        fecharetiro: this.recepcion.fecharetiro,
        usu_id: this.recepcion.estudiante.id,
        asig_id: this.recepcion.docente.id,
        recep_id: this.recepcion.administrativo.id,
        recla_id: this.recepcion.reclamante.id,
        area_id: this.recepcion.area.id,
      };
      this.recepcion.recepcionado = "";
      this.recepcion.fecharadicado = "";
      this.recepcion.fecharecepcionado = "";
      this.recepcion.consultorio = "";
      this.recepcion.fechareparto = "";
      this.recepcion.fechapublicacion = "";
      this.recepcion.fecharetiro = "";
      this.recepcion.estudiante = "";
      this.recepcion.docente = "";
      this.recepcion.administrativo = "";
      this.recepcion.reclamante = "";
      this.recepcion.area = "";

      axios.post("/api/recepcion", params).then((res) => {
        if (res.data == null) {
          alert("La recepcion No se registro porque tiene errores");
        } else {
          alert("La recepción se ha registrado con EXITO");
        }
        this.recepcioness.push(res.data);
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
        per_id: this.usuario.per_id,
      };
      axios
        .put("/api/user/" + this.usuario.id, params)
        .then((res) => {
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
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.id[0]);
            alert(this.errors.username[0]);
            alert(this.errors.email[0]);
            alert(this.errors.password[0]);
          }
        });
    },
  },
};
</script>