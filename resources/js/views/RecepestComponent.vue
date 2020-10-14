<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Recepciones</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="card-body col">
          <div class="container row">
            <div class="table text-center table-reponsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Recepcionado</th>
                    <th>Consultorio</th>
                    <th>Reclamante</th>
                    <th>Recepcionista</th>
                    <th>Area</th>
                    <th>Fechas</th>
                    <th>Agregar Gestión</th>
                    <th>Mostrar QR</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="recepcion in recepcioness" :key="recepcion.index">
                    <td>{{ recepcion.id }}</td>
                    <td>{{ recepcion.recepcionado }}</td>
                    <td>{{ recepcion.consultorio }}</td>
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalRECLAMANTE"
                        @click="editarForm(recepcion)"
                        title="Mostrar los datos del Reclamante"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalRECEP"
                        @click="editarForm(recepcion)"
                        title="Mostrar recepcionista"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>
                    <td>{{ recepcion.area.nombre }}</td>
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModal"
                        @click="editarForm(recepcion)"
                        title="Mostrar las fechas"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>

                    <td>
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#AggModal"
                        @click="editarForm(recepcion)"
                        title="Agregar Gestión"
                      >
                        <i class="fas fa-save fa-3x" style="color: black"></i>
                      </button>
                    </td>
                    <td>
                      <a :href="'/recepcionqr/' + recepcion.id">
                        <i
                          class="fas fa-qrcode fa-3x"
                          style="color: black"
                          title="Mostrar QR de la gestión"
                        ></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!--modal de asignar gestion -->
      <div
        class="modal fade"
        id="AggModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Agregar Gestion
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="col-6 form-group">
                <input
                type="hidden"
                  class="form-control"
                  placeholder="Recepción"
                  v-model="recepcion.id"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Ampliación de hechos</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Ampliación de hechos"
                  v-model="gestion.amplhechos"
                />
              </div>

              <label class="col-5 col-form-label">Fecha entrevista</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Fecha entrevista"
                  type="date"
                  v-model="gestion.fechentrevasesor"
                />
              </div>

              <label class="col-5 col-form-label">Tipo de tramite</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Tipo de tramite"
                  v-model="gestion.tipotramite"
                />
              </div>

              <label class="col-5 col-form-label">Asunto de tramite</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Asunto de tramite"
                  v-model="gestion.asuntotramite"
                />
              </div>

              <label class="col-5 col-form-label">Motivo de archivo</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Motivo de archivo"
                  v-model="gestion.motivoarchivo"
                />
              </div>

              <label class="col-5 col-form-label">Fecha de archivo</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Fecha de archivo"
                  type="date"
                  v-model="gestion.fechaarchivo"
                />
              </div>
              <label class="col-5 col-form-label">Entidad del tramite</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Entidad del tramite"
                  v-model="gestion.entidadelantramite"
                />
              </div>

              <label class="col-5 col-form-label">Observaciones</label>
               <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                   class="form-control"
                  v-model="gestion.obsrvtramite"
                >
                </textarea>
          </div>
             

              <label class="col-5 col-form-label">Actuaciones realizadas</label>
               <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                   class="form-control"
                  v-model="gestion.actuarealizadas"
                >
                </textarea>
          </div>
             

              <label class="col-5 col-form-label">Actuaciones jurídicas realizadas </label>
               <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                   class="form-control"
                  v-model="gestion.actjuridirealzadas"
                >
                </textarea>
          </div>
            
              <label class="col-5 col-form-label">Resultado de actuación</label>
               <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                   class="form-control"
                  v-model="gestion.resulactuacion"
                >
                </textarea>
          </div>
              
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Cerrar
              </button>
              <button
                type="button"
                class="btn btn-primary"
                @click="agregargestion()"
                data-dismiss="modal"
              >
                Guardar Cambios
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de asignar gestion -->
      <!--modal de MOSTRAR EL RESTO DE CAMPOS-->
      <div
        class="modal fade"
        id="MOSTRARModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">FECHAS</h5>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">Fecha de radicado:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fecharadicado"
                disabled
              />

              <label class="col-5 col-form-label">Fecha de recepcionado:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fecharecepcionado"
                disabled
              />

              <label class="col-5 col-form-label">Fecha de reparto:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fechareparto"
                disabled
              />

              <label class="col-5 col-form-label">Fecha de publicación:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fechapublicacion"
                disabled
              />

              <label class="col-5 col-form-label">Fecha de retiro:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fecharetiro"
                disabled
              />
              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL RESTO DE CAMPOS -->

      <!--modal de MOSTRAR EL RECLAMANTE-->
      <div
        class="modal fade"
        id="MOSTRARModalRECLAMANTE"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Datos del Reclamante
              </h5>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">Nombre del reclamante:</label>
              <input
                placeholder="nombre de persona"
                v-model="recepcion.prinom"
                disabled
              />

              <label class="col-5 col-form-label"
                >Apellido del reclamante:</label
              >
              <input
                placeholder="nombre de persona"
                v-model="recepcion.priape"
                disabled
              />

              <label class="col-5 col-form-label">Enfoque diferencial:</label>
              <input
                placeholder="enfoque diferencial"
                v-model="recepcion.reclamante.enfodifervictima"
                disabled
              />

              <label class="col-5 col-form-label">Genero:</label>
              <input
                placeholder="genero"
                v-model="recepcion.reclamante.genevictima"
                disabled
              />

              <label class="col-5 col-form-label">Edad:</label>
              <input
                placeholder="edad"
                v-model="recepcion.reclamante.edadvictima"
                disabled
              />

              <label class="col-5 col-form-label">Discapacidad:</label>
              <input
                placeholder="discapacidad"
                v-model="recepcion.reclamante.discapavictima"
                disabled
              />

              <label class="col-5 col-form-label">Estrato:</label>
              <input
                placeholder="estrato"
                v-model="recepcion.reclamante.estravictima"
                disabled
              />

              <label class="col-5 col-form-label">Embarazo:</label>
              <input
                placeholder="embarazo"
                v-model="recepcion.reclamante.embaravictima"
                disabled
              />

              <label class="col-5 col-form-label">Grupo Etnico:</label>
              <input
                placeholder="grupo etnico"
                v-model="recepcion.reclamante.grupetnicovictima"
                disabled
              />

              <label class="col-5 col-form-label">Entidad que reclama:</label>
              <input
                placeholder="entidad"
                v-model="recepcion.reclamante.persoentidreclama"
                disabled
              />

              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL RECLAMANTE -->

      <!--modal de MOSTRAR EL RECEPCIONISTA-->
      <div
        class="modal fade"
        id="MOSTRARModalRECEP"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Buscar Recepcionador
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input
                type="hidden"
                placeholder="id recep"
                v-model="recepcion.id"
                disabled
              />
              <label class="col-12 col-form-label"
                >Oprima el ícono para ver todos los datos de su
                Recepcionador</label
              >
              <center>
                <button
                  class="btn btn-sm"
                  data-toggle="modal"
                  data-target="#MOSTRARModalRE"
                  @click="buscarrecep()"
                  title="Mostrar recepcionista"
                >
                  <i class="fas fa-eye fa-5x" style="color: black"></i>
                </button>
              </center>

              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL RECE -->
      <!--modal de MOSTRAR EL RECE -->
      <div
        class="modal fade"
        id="MOSTRARModalRE"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
         data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Datos del Recepcionista
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
                
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">Primer nombre:</label>
              <input
                placeholder="Nombre de persona"
                v-model="usurecep.usuario.persona.prinom"
                disabled
              />
              <label class="col-5 col-form-label">Segundo nombre:</label>
              <input
                placeholder="Nombre de persona"
                v-model="usurecep.usuario.persona.segnom"
                disabled
              />
              <label class="col-5 col-form-label">Primer Apellido:</label>
              <input
                placeholder="Apellido de persona"
                v-model="usurecep.usuario.persona.priape"
                disabled
              />
              <label class="col-5 col-form-label">Segundo Apellido:</label>
              <input
                placeholder="Apellido de persona"
                v-model="usurecep.usuario.persona.segape"
                disabled
              />

              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    @click="limpiar()"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL RECEP -->
    </div>
  </div>
</template>

<script >
export default {
  data() {
    return {
      usurecep: {
        id: "",
        usuario: {
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
      },
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

      observaciones: {
        id: "",
        obsrv: "",
        recp_id: "",
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
        estado: "",
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
      gestion: {
        id: "",
        amplhechos: "",
        fechentrevasesor: "",
        tipotramite: "",
        asuntotramite: "",
        motivoarchivo: "",
        fechaarchivo: "",
        obsrvtramite: "",
        actuarealizadas: "",
        actjuridirealzadas: "",
        resulactuacion: "",
        entidadelantramite: "",
        recp_id: "",
      },

      esta: false,
      estado: "disable",
      recepcioness: [],
      errors: [],
    };
  },
  created() {
    axios.get("/api/recepcionest").then((res) => {
      this.recepcioness = res.data;
    });
  },
  methods: {
    buscarrecep() {
      axios.get("/api/recepcionRE/" + this.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          console.log(res.data[0]);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usurecep.usuario.persona = person;
          this.esta = true;
        }
      });
    },

    limpiar() {
      (this.usurecep.usuario.persona.cedula = ""),
        (this.usurecep.usuario.persona.prinom = ""),
        (this.usurecep.usuario.persona.segnom = ""),
        (this.usurecep.usuario.persona.priape = ""),
        (this.usurecep.usuario.persona.segape = "");
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
      axios.get("/api/area/" + this.recepcion.area.nombre).then((res) => {
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
        recla_id: this.recepcion.reclamante.id,
        estado: this.recepcion.estado,
        area_id: this.recepcion.area.id,
      };
      this.recepcion.recepcionado = "";
      this.recepcion.fecharadicado = "";
      this.recepcion.fecharecepcionado = "";
      this.recepcion.consultorio = "";
      this.recepcion.fechareparto = "";
      this.recepcion.fechapublicacion = "";
      this.recepcion.fecharetiro = "";
      this.recepcion.reclamante = "";
      this.recepcion.area = "";
      this.recepcion.estado = "";

      axios.post("/api/recepcion", params).then((res) => {
        if (res.data == null) {
          alert("La recepcion No se registro porque tiene errores");
        } else {
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "¡La recepción se ha registrado con EXITO!!",
            showConfirmButton: false,
          });
        }
        this.recepcioness.push(res.data);
      });
    },

    ver() {
      Swal.fire("Good job!", "You clicked the button!", "success");
    },

    agregargestion() {
      const params = {
        amplhechos: this.gestion.amplhechos,
        fechentrevasesor: this.gestion.fechentrevasesor,
        tipotramite: this.gestion.tipotramite,
        asuntotramite: this.gestion.asuntotramite,
        motivoarchivo: this.gestion.motivoarchivo,
        fechaarchivo: this.gestion.fechaarchivo,
        obsrvtramite: this.gestion.obsrvtramite,
        actuarealizadas: this.gestion.actuarealizadas,
        actjuridirealzadas: this.gestion.actjuridirealzadas,
        resulactuacion: this.gestion.resulactuacion,
        entidadelantramite: this.gestion.entidadelantramite,
        recp_id: this.recepcion.id,
      };

      axios.post("/api/gestion", params).then((res) => {
        if (res.data == null) {
          alert("La Gestión NO se ha registrado");
        } else {
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "¡La Gestión se ha registrado Exitosamente en el Caso!!",
            showConfirmButton: false,
          });
        }
        this.gestion.amplhechos = "";
        this.gestion.fechentrevasesor = "";
        this.gestion.tipotramite = "";
        this.gestion.asuntotramite = "";
        this.gestion.motivoarchivo = "";
        this.gestion.fechaarchivo = "";
        this.gestion.obsrvtramite = "";
        this.gestion.actuarealizadas = "";
        this.gestion.actjuridirealzadas = "";
        this.gestion.resulactuacion = "";
        this.gestion.entidadelantramite = "";
      });
    },

    eliminar(recepcion, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Recepcion del area de: ${recepcion.area.nombre}`
      );
      if (confirmacion) {
        axios.delete("/api/recepcion/" + recepcion.id).then(() => {
          this.recepcioness.splice(index, 1);
          alert("La recepción se ha eliminado con exito");
        });
      }
    },

    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
    },
    editar() {
      const params = {
        obsrv: this.observaciones.obsrv,
        recp_id: this.recepcion.id,
      };

      axios.post("/api/observaciones", params).then((res) => {
        if (res.data == null) {
          alert("La Observacion No se registro porque tiene errores");
        } else {
          alert("La Observacion se ha registrado con EXITO");
        }
      });
    },
  },
};
</script>