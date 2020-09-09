<template>
  <div class="card">
          <div>
      <h2 class="text-center mb-2 card-title">Visualizando Gestiones</h2>
         </div>
            <div class="card-body row">
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Ampliación de hechos</th>
                      <th>Fecha entrevista Asesor</th>
                      <th>Tipo de tramite</th>
                      <th>Asunto del tramite</th>
                      <th>Motivo de archivo</th>
                      <th>Fecha del archivo</th>
                      <th>Observaciones</th>
                      <th>Actuaciones realizadas</th>
                      <th>Actuaciones Juridicas</th>
                      <th>Resultados de la actuación</th>
                      <th>Entidad reclamante</th>
                      <th>ID de Recepción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(gestion) in gestioness" :key="gestion.index">
                      <td>{{gestion.amplhechos}}</td>
                      <td>{{gestion.fechentrevasesor}}</td>
                      <td>{{gestion.tipotramite}}</td>
                      <td>{{gestion.asuntotramite}}</td>
                      <td>{{gestion.motivoarchivo}}</td>
                      <td>{{gestion.fechaarchivo}}</td>
                      <td>{{gestion.obsrvtramite}}</td>
                      <td>{{gestion.actuarealizadas}}</td>
                      <td>{{gestion.actjuridirealzadas}}</td>
                      <td>{{gestion.resulactuacion}}</td>
                      <td>{{gestion.entidadelantramite}}</td>
                      <td>{{gestion.recepcion.id}}</td>
                      <td>                                               
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Gestion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">Ampliación de hechos</label>
                <input placeholder="Ampliación de hechos" v-model="gestion.amplhechos" />

                <label class="col-5 col-form-label">Fecha entrevista</label>
                <input placeholder="Fecha entrevista" v-model="gestion.fechentrevasesor" />

                <label class="col-5 col-form-label">Tipo de tramite</label>
                <input placeholder="Tipo de tramite" v-model="gestion.tipotramite" />

                <label class="col-5 col-form-label">Asunto tramite</label>
                <input placeholder="Asunto tramite" v-model="gestion.asuntotramite" />

                <label class="col-5 col-form-label">Motivo archivo</label>
                <input placeholder="Motivo archivo" v-model="gestion.motivoarchivo" />

                <label class="col-5 col-form-label">Fecha archivo</label>
                <input placeholder="Fecha archivo" v-model="gestion.fechaarchivo" />

                <label class="col-5 col-form-label">Observacion del tramite</label>
                <input placeholder="Observacion del tramite" v-model="gestion.obsrvtramite" />

                <label class="col-5 col-form-label">Actuaciones</label>
                <input placeholder="Actuaciones" v-model="gestion.actuarealizadas" />

                <label class="col-5 col-form-label">Actuaciones juridicas</label>
                <input placeholder="Actuaciones juridicas" v-model="gestion.actjuridirealzadas" />

                <label class="col-5 col-form-label">Resultado de Actuación</label>
                <input placeholder="Resultado de Actuación" v-model="gestion.resulactuacion" />

                <label class="col-5 col-form-label">Entidad</label>
                <input placeholder="Entidad" v-model="gestion.entidadelantramite" />

                <label class="col-5 col-form-label">Recepción ID</label>
                <input placeholder="Recepción ID" v-model="gestion.recepcion.id" />


              </div>
              <div class="col-6 form-group" v-if="true">
                <button
                  class="btn btn-primary btn-block"
                  data-toggle="modal"
                  data-target="#buscarModal"
                  @click="buscar()"
                >Buscar</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Recepcion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">ID</label>
                <input placeholder="ID" v-model="gestion.recepcion.id" />

                <label class="col-5 col-form-label">Recepcionado</label>
                <input placeholder="Recepcionado" v-model="gestion.recepcion.recepcionado" />

                <label class="col-5 col-form-label">Fecha de Radicado</label>
                <input placeholder="Fecha de Radicado" v-model="gestion.recepcion.fecharadicado" />

                <label class="col-5 col-form-label">Fecha Recepcionado</label>
                <input placeholder="Fecha Recepcionado" v-model="gestion.recepcion. fecharecepcionado" />

                <label class="col-5 col-form-label">Consultorio</label>
                <input placeholder="Consultorio" v-model="gestion.recepcion.consultorio" />

                <label class="col-5 col-form-label">Fecha Reparto</label>
                <input placeholder="Fecha Reparto" v-model="gestion.recepcion.fechareparto" />

                <label class="col-5 col-form-label">Fecha Publicación</label>
                <input placeholder="Fecha Publicación" v-model="gestion.recepcion.fechapublicacion" />

                <label class="col-5 col-form-label">Fecha Retiro</label>
                <input placeholder="Fecha Retiro" v-model="gestion.recepcion.fecharetiro" />


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
      },

      esta: false,

      gestioness: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/gestion").then((res) => {
      this.gestioness = res.data;
    });
  },
  methods: {
   

  },
};
</script>