<template>
   <div class="card" style="margin-top:25px">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando una nueva Gestión</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">


          <label class="col-5 col-form-label">Recepción</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Recepción" v-model="gestion.recepcion.id" />
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
            <input class="form-control" placeholder="Tipo de tramite" v-model="gestion.tipotramite" />
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


          <label class="col-5 col-form-label">Motivo de archivo</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="c"
              type="date"
              v-model="gestion.fechaarchivo"
            />
          </div>


          <label class="col-5 col-form-label">Observaciones</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Observaciones" v-model="gestion.obsrvtramite" />
          </div>


          <label class="col-5 col-form-label">Actuaciones</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Actuaciones" v-model="gestion.actuarealizadas" />
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

                <label class="col-5 col-form-label">fecha entrevista asesor</label>
                <input placeholder="fecha entrevista asesor" v-model="gestion.fechentrevasesor" />

                <label class="col-5 col-form-label">Tipo de tramite</label>
                <input placeholder="Tipo de tramite" v-model="gestion.tipotramite" />

                <label class="col-5 col-form-label">Asunto tramite</label>
                <input placeholder="Asunto tramite" v-model="gestion.asuntotramite" />

                <label class="col-5 col-form-label">Motivo archivo</label>
                <input placeholder="Motivo archivo" v-model="gestion.motivoarchivo" />

                <label class="col-5 col-form-label">Fecha archivo</label>
                <input placeholder="Fecha archivo" v-model="gestion.fechaarchivo" />

                <label class="col-5 col-form-label">Observación del tramite</label>
                <input placeholder="Observación del tramite" v-model="gestion.obsrvtramite" />

                <label class="col-5 col-form-label">Actuaciones realizadas</label>
                <input placeholder="Actuaciones realizadas" v-model="gestion.actuarealizadas" />

                <label class="col-5 col-form-label">Atuaciones juridicas</label>
                <input placeholder="Atuaciones juridicas" v-model="gestion.actjuridirealzadas" />

                <label class="col-5 col-form-label">Resultados de la actuación</label>
                <input placeholder="Resultados de la actuacion" v-model="gestion.resulactuacion" />

                <label class="col-5 col-form-label">Entidad tramite</label>
                <input placeholder="Entidad tramite" v-model="gestion.entidadelantramite" />
                
                <label class="col-5 col-form-label">Id de recepción</label>
                <input placeholder="Id de recepción" v-model="gestion.recepcion.id" />

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
                <input
                  placeholder="Fecha Recepcionado"
                  v-model="gestion.recepcion. fecharecepcionado"
                />

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

  methods: {
    buscar() {
      axios.get("/api/recepcion/" + this.gestion.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          this.gestion.recepcion.id = "";
          this.gestion.recepcion.recepcionado = "";
          this.gestion.recepcion.fecharadicado = "";
          this.gestion.recepcion.fecharecepcionado = "";
          this.gestion.recepcion.consultorio = "";
          this.gestion.recepcion.fechareparto = "";
          this.gestion.recepcion.fechapublicacion = "";
          this.gestion.recepcion.fecharetiro = "";
          console.log(this.gestion.recepcion.id);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let recep = res.data[0];
          this.gestion.recepcion = recep;
          this.esta = true;
        }
      });
    },
    agregar() {
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
        recp_id: this.gestion.recepcion.id,
      };
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
      this.gestion.recepcion.id = "";

      axios.post("/api/gestion", params).then((res) => {
        if (res.data == null) {
           swal({
        type: 'error',
        "timer":3000,
        "title":"PARECE QUE HAY UN ERROR",
        "text":"La Gestión NO se ha registrado",
        "showConfirmButton":false
        });
        } else {
           swal({
        type: 'success',
        "timer":3000,
        "title":"EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
        "text":"¡La Gestión se ha registrado Exitosamente en el Caso!!",
        "showConfirmButton":false
        });
        }
        this.gestioness.push(res.data);
      });
    },
  },
};
</script>