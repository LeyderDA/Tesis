<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Recepciones</h2>
    </div>
    <label class="col-5 col-form-label">Busca por QR</label>
    <a :href="'/qr'">
      <i class="fas fa-search  fa-3x" style="color: black;"></i>
    </a>

    <div class="container">
      <div class="row">
        <div class="card-body col">
          <div class="container row">            
              <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Recepcionado en</th>
                    <th>Consultorio</th>
                    <th>Reclamante</th>
                    <th>Area</th>
                    <th>Fechas</th>
                    <th>Agregar observación</th>
                    <th>Mostrar QR</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(recepcion) in recepcioness" :key="recepcion.index">

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
                        <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#observacionModal"
                        @click="editarForm(recepcion)"
                        title="Agregar una Observación"
                      >
                        <i  class="fas fa-thumbtack fa-3x" style="color: black;"></i>                       
                      </button>
                    <td>
                      <a :href="'/recepcionqr/'+recepcion.id"> 
                        <i class="fas fa-qrcode fa-3x" style="color: black;"></i>
                      </a>

                      
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

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
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">Id de recepcion</label>
              <input placeholder="recepcion" v-model="recepcion.id" />

              <label class="col-5 col-form-label">Fecha de radicado</label>
              <input placeholder="recepcion" type="date" v-model="recepcion.fecharadicado" />

              <label class="col-5 col-form-label">Fecha de recepcionado</label>
              <input placeholder="recepcion" type="date" v-model="recepcion.fecharecepcionado" />

              <label class="col-5 col-form-label">Fecha de reparto</label>
              <input placeholder="recepcion" type="date" v-model="recepcion.fechareparto" />

              <label class="col-5 col-form-label">Fecha de publicación</label>
              <input placeholder="recepcion" type="date" v-model="recepcion.fechapublicacion" />

              <label class="col-5 col-form-label">Fecha de retiro</label>
              <input placeholder="recepcion" type="date" v-model="recepcion.fecharetiro" />

              <label class="col-5 col-form-label">Recepcionado en</label>
              <input placeholder="recepcion" v-model="recepcion.recepcionado" />

              <label class="col-5 col-form-label">Consultorio</label>
              <input placeholder="recepcion" v-model="recepcion.consultorio" />

              <label class="col-5 col-form-label">ID Reclamante</label>
              <input placeholder="recepcion" v-model="recepcion.reclamante.id" />

              <label class="col-5 col-form-label">Area</label>
              <input placeholder="recepcion" v-model="recepcion.area.nombre" />

              <label
                class="col-12 col-form-label"
              >-----------------------------------------------------------------------</label>
              <h2 class="text-center mb-2 card-title">Agregar Observación</h2>
              <label
                class="col-12 col-form-label"
              >-----------------------------------------------------------------------</label>
              <label class="col-5 col-form-label">Observacion:</label>
              <input placeholder="Observación" v-model="observaciones.obsrv" />
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
        estado:"",

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
    axios.get("/api/recepcion").then((res) => {
      this.recepcioness = res.data;
    });
  },
  methods: {
    
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
        this.observaciones.obsrv = "";
      });
    },
  },
};
</script>