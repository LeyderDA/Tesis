<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Recepciones</h2>
    </div>
    <label class="col-5 col-form-label">Busca por QR</label>
    <a :href="'/qr'">
      <i class="fas fa-search fa-3x" style="color: black"></i>
    </a>
    <div class="container">
      <div class="row">
        <div class="card-body col">
          <div class="container row">
            <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>Estudiante</th>
                    <th>Recepcionado</th>
                    <th>Consultorio</th>
                    <th>Reclamante</th>
                    <th>Recepcionista</th>
                    <th>Area</th>
                    <th>Fechas</th>
                    <th>Agregar observación</th>
                    <th>Mostrar QR</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="recepcion in recepcioness" :key="recepcion.index">
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalEST"
                        @click="editarForm(recepcion)"
                        title="Mostrar Estudiante"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>
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
                        data-target="#observacionModal"
                        @click="editarForm(recepcion)"
                        title="Agregar una Observación"
                      >
                        <i
                          class="fas fa-thumbtack fa-3x"
                          style="color: black"
                        ></i>
                      </button>
                    </td>

                    <td>
                      <a :href="'/recepcionqr/' + recepcion.id">
                        <i class="fas fa-qrcode fa-3x" style="color: black"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="usurecep.usuario.persona.prinom"
                  disabled
                />
              </div>
              <label class="col-5 col-form-label">Segundo nombre:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="usurecep.usuario.persona.segnom"
                  disabled
                />
              </div>
              <label class="col-5 col-form-label">Primer Apellido:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="usurecep.usuario.persona.priape"
                  disabled
                />
              </div>
              <label class="col-5 col-form-label">Segundo Apellido:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="usurecep.usuario.persona.segape"
                  disabled
                />
              </div>

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

      <!--modal de MOSTRAR EL ESTUDIANTE-->
      <div
        class="modal fade"
        id="MOSTRARModalEST"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Buscar Estudiante
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
                Estudiante</label
              >
              <center>
                <button
                  class="btn btn-sm"
                  data-toggle="modal"
                  data-target="#MOSTRARModalES"
                  @click="buscarestudiante()"
                  title="Mostrar Estudiante"
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
      <!--modal de MOSTRAR EL ESTUDIANTE -->
      <!--modal de MOSTRAR EL ESTUDIANTE -->
      <div
        class="modal fade"
        id="MOSTRARModalES"
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
                Datos del Estudiante
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
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="estudiante.usuario.persona.prinom"
                  disabled
                />
              </div>
              <label class="col-5 col-form-label">Segundo nombre:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="estudiante.usuario.persona.segnom"
                  disabled
                />
              </div>
              <label class="col-5 col-form-label">Primer Apellido:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="estudiante.usuario.persona.priape"
                  disabled
                />
              </div>
              <label class="col-5 col-form-label">Segundo Apellido:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="estudiante.usuario.persona.segape"
                  disabled
                />
              </div>

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
      <!--modal de MOSTRAR EL ESTUDIANTE -->

      <!--modal de asignar observacion -->
      <div
        class="modal fade"
        id="observacionModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Observaciones</h5>
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
                placeholder="recepcion"
                v-model="recepcion.id"
                disabled
              />

              <label class="col-5 col-form-label"
                >Digita la observación (*)</label
              >

              <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                  class="form-control"
                  v-model="observaciones.obsrv"
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
                @click="editar()"
                data-dismiss="modal"
              >
                Guardar Cambios
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de asignar observacion -->

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
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fecharadicado"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Fecha de recepcionado:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fecharecepcionado"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Fecha de reparto:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fechareparto"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Fecha de publicación:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fechapublicacion"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Fecha de retiro:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fecharetiro"
                  disabled
                />
              </div>
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
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="nombre de persona"
                  v-model="recepcion.prinom"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label"
                >Apellido del reclamante:</label
              >
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="nombre de persona"
                  v-model="recepcion.priape"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Enfoque diferencial:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="enfoque diferencial"
                  v-model="recepcion.reclamante.enfodifervictima"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Genero:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="genero"
                  v-model="recepcion.reclamante.genevictima"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Edad:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="edad"
                  v-model="recepcion.reclamante.edadvictima"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Discapacidad:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="discapacidad"
                  v-model="recepcion.reclamante.discapavictima"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Estrato:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="estrato"
                  v-model="recepcion.reclamante.estravictima"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Embarazo:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="embarazo"
                  v-model="recepcion.reclamante.embaravictima"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Grupo Etnico:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="grupo etnico"
                  v-model="recepcion.reclamante.grupetnicovictima"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Entidad que reclama:</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="entidad"
                  v-model="recepcion.reclamante.persoentidreclama"
                  disabled
                />
              </div>

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

      <!--modal de agg NOTAS AL ESTUDIANTE -->
      <div
        class="modal fade"
        id="aggnotasmodal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar Notas</h5>
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
              <label class="col-5 col-form-label">Id Recepción</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Recepción"
                  v-model="recepcion.id"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Nota primer corte</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Nota primer corte"
                  v-model="notas.notapricort"
                />
              </div>

              <label class="col-5 col-form-label">Nota segundo corte</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Nota segundo corte"
                  v-model="notas.notasegcort"
                />
              </div>
              <label class="col-5 col-form-label">Nota tercer corte</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Nota tercer corte"
                  v-model="notas.notateracort"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>

              <button
                type="button"
                class="btn btn-primary"
                @click="agregarNOTAS()"
                data-dismiss="modal"
              >
                Guardar Cambios
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de agg NOTAS AL ESTUDIANTE -->
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      estudiante: {
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
      notas: {},

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
      notass: [],
      errors: [],
    };
  },
  created() {
    axios.get("/api/recepcion").then((res) => {
      this.recepcioness = res.data;
      console.log(this.recepcioness);
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

    buscarestudiante() {
      axios.get("/api/recepcionEST/" + this.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          console.log(res.data[0]);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.estudiante.usuario.persona = person;
          this.esta = true;
        }
      });
    },

    limpiar() {
      this.usurecep.usuario.persona.prinom = "";
      this.usurecep.usuario.persona.segnom = "";
      this.usurecep.usuario.persona.priape = "";
      this.usurecep.usuario.persona.segape = "";
    },

    agregarNOTAS() {
      const params = {
        notapricort: this.notas.notapricort,
        notasegcort: this.notas.notasegcort,
        notateracort: this.notas.notateracort,
        recp_id: this.recepcion.id,
      };

      axios.post("/api/notas", params).then((res) => {
        if (res.data == null) {
          alert("La nota no se ha registrado con exito");
        } else {
          alert("La nota se ha registrado");
        }
      });
    },

    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
    },

    editar() {
      if (!this.observaciones.obsrv||!this.recepcion.id) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios estan marcados con un (*)",
          showConfirmButton: true,
        });
      } else {
        const params = {
          obsrv: this.observaciones.obsrv,
          recp_id: this.recepcion.id,
        };

        axios.post("/api/observaciones", params).then((res) => {
          if (res.data == null) {
            alert("La Observacion No se registro porque tiene errores");
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "¡La Observacion se ha registrado con EXITO!!",
              showConfirmButton: false,
            });
          }
          this.observaciones.obsrv = "";
        });
      }
    },
  },
};
</script>