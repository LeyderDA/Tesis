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
                    <th>Fecha de Radicado</th>
                    <th>Fecha de Recepcionado</th>
                    <th>Fecha de Reparto</th>
                    <th>Fecha de Publicación</th>
                    <th>Fecha de Retiro</th>
                    <th>Recepcionado en</th>
                    <th>Consultorio</th>
                    <th>Reclamante</th>
                    <th>Area</th>
                    <th>Mostrar QR y agregar Gestión</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(recepcion) in recepcioness" :key="recepcion.index">
                    <td>{{recepcion.recp_id}}</td>
                    <td>{{recepcion.fecharadicado}}</td>
                    <td>{{recepcion.fecharecepcionado}}</td>
                    <td>{{recepcion.fechareparto}}</td>
                    <td>{{recepcion.fechapublicacion}}</td>
                    <td>{{recepcion.fecharetiro}}</td>
                    <td>{{recepcion.recepcionado}}</td>
                    <td>{{recepcion.consultorio}}</td>
                    <td>{{recepcion.reclamante.id}}</td>
                    <td>{{recepcion.area.nombre}}</td>
                    <td>
                      <a :href="'/recepcionqr/'+recepcion.recp_id">
                        <i class="fas fa-qrcode fa-3x" style="color: black;" title="Mostrar QR de la gestión"></i>
                      </a> 
                                           
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#AggModal"
                        @click="editarForm(recepcion)"
                        title="Agregar Gestión"
                      >   
                        <i class="fas fa-save fa-3x" style="color: black;"></i>
                      </button>
                    </td>
                    <td></td>
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
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Guardar Gestion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

              <label class="col-5 col-form-label">Recepción</label>
              <div class="col-6 form-group">
                <input class="form-control" placeholder="Recepción" v-model="recepcion.recp_id" />
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


              <label class="col-5 col-form-label">Observaciones</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Observaciones"
                  v-model="gestion.obsrvtramite"
                />
              </div>


              <label class="col-5 col-form-label">Actuaciones</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Actuaciones"
                  v-model="gestion.actuarealizadas"
                />
              </div>


              <label class="col-5 col-form-label">Actuaciones Juridicas</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Actuaciones Juridicas"
                  v-model="gestion.actjuridirealzadas"
                />
              </div>


              <label class="col-5 col-form-label">Resultado de actuación</label>
              <div class="col-6 form-group">
                <input
                  class="form-control"
                  placeholder="Resultado de actuación"
                  v-model="gestion.resulactuacion"
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
            </div>



            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button
                type="button"
                class="btn btn-primary"
                @click=" agregargestion()"
                data-dismiss="modal"
              >Guardar Cambios</button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de asignar gestion -->
    </div>
  </div>
  
 
  
</template>




<script >

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

    axios.get("/api/recepcion").then((res) => {
      this.recepcioness = res.data;    
    });
  },
  methods: {
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
          alert("La recepción se ha registrado con EXITO");
        }
        this.recepcioness.push(res.data);
      });
    },

    ver(){
      Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
  )
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
        recp_id: this.recepcion.recp_id,
      };     

      axios.post("/api/gestion", params).then((res) => {
        if (res.data == null) {
          alert("La Gestión NO se ha registrado");
        } else {
          alert("¡La Gestión se ha registrado Exitosamente en el Caso!!");
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