<template>
  <div class="card">
    <div>
      <h4 class="text-center mb-2 card-title">Registrando una nueva Gestión</h4>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Recepción" v-model="gestion.recepcion.id" />
          </div>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Ampliación de hechos"
              v-model="gestion.amplhechos"
            />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Fecha entrevista"
              type="date"
              v-model="gestion.fechentrevasesor"
            />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Tipo de tramite" v-model="gestion.tipotramite" />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Asunto de tramite"
              v-model="gestion.asuntotramite"
            />
          </div>

          <div class="col-6">
            <select
              class="form-control"
              placeholder="Estado"
              type="boolean"
              v-model="gestion.estado"
            >
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Motivo de archivo"
              v-model="gestion.motivoarchivo"
            />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Fecha de archivo"
              type="date"
              v-model="gestion.fechaarchivo"
            />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Observaciones" v-model="gestion.obsrvtramite" />
          </div>

          <div class="col-6 form-group">
            <input class="form-control" placeholder="Actuaciones" v-model="gestion.actuarealizadas" />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Actuaciones Juridicas"
              v-model="gestion.actjuridirealzadas"
            />
          </div>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Resultado de actuación"
              v-model="gestion.resulactuacion"
            />
          </div>

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
                      <th>Estado del tramite</th>
                      <th>Motivo de archivo</th>
                      <th>Fecha del archivo</th>
                      <th>Observaciones</th>
                      <th>Actuaciones realizadas</th>
                      <th>Actuaciones Juridicas</th>
                      <th>Resultados de la actuación</th>
                      <th>Entidad reclamante</th>
                      <th>ID de Recepción</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(gestion,index) in gestioness" :key="gestion.index">
                      <td>{{gestion.amplhechos}}</td>
                      <td>{{gestion.fechentrevasesor}}</td>
                      <td>{{gestion.tipotramitee}}</td>
                      <td>{{gestion.asuntotramite}}</td>
                      <td>{{gestion.estado}}</td>
                      <td>{{gestion.motivoarchivo}}</td>
                      <td>{{gestion.fechaarchivo}}</td>
                      <td>{{gestion.obsrvtramite}}</td>
                      <td>{{gestion.actuarealizadas}}</td>
                      <td>{{gestion.actjuridirealzadas}}</td>
                      <td>{{gestion.resulactuacion}}</td>
                      <td>{{gestion.entidadelantramite}}</td>
                      <td>{{gestion.recepcion.id}}</td>
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(gestion,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(gestion,index)">
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Gestion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Username" v-model="gestion.amplhechos" />
                <input placeholder="Username" v-model="gestion.fechentrevasesor" />
                <input placeholder="Username" v-model="gestion.tipotramite" />
                <input placeholder="Username" v-model="gestion.asuntotramite" />
                <input placeholder="Username" v-model="gestion.estado" />
                <input placeholder="Username" v-model="gestion.motivoarchivo" />
                <input placeholder="Username" v-model="gestion.fechaarchivo" />
                <input placeholder="Username" v-model="gestion.obsrvtramite" />
                <input placeholder="Username" v-model="gestion.actuarealizadas" />
                <input placeholder="Username" v-model="gestion.actjuridirealzadas" />
                <input placeholder="Username" v-model="gestion.resulactuacion" />
                <input placeholder="Username" v-model="gestion.entidadelantramite" />
                <input placeholder="Username" v-model="gestion.recepcion.id" />
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
                <input placeholder="ID" v-model="gestion.recepcion.id" />
                <input placeholder="Recepcionado" v-model="gestion.recepcion.recepcionado" />
                <input placeholder="Fecha de Radicado" v-model="gestion.recepcion.fecharadicado" />
                <input
                  placeholder="Fecha Recepcionado"
                  v-model="gestion.recepcion. fecharecepcionado"
                />
                <input placeholder="Consultorio" v-model="gestion.recepcion.consultorio" />
                <input placeholder="Fecha Reparto" v-model="gestion.recepcion.fechareparto" />
                <input placeholder="Fecha Publicación" v-model="gestion.recepcion.fechapublicacion" />
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
      estado: "disable",
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
        estado: this.gestion.estado,
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
      this.gestion.estado = "";
      this.gestion.motivoarchivo = "";
      this.gestion.fechaarchivo = "";
      this.gestion.obsrvtramite = "";
      this.gestion.actuarealizadas = "";
      this.gestion.actjuridirealzadas = "";
      this.gestion.resulactuacion = "";
      this.gestion.entidadelantramite = "";
      this.gestion.recepcion.id = "";
      console.log(this.gestion.estado);

      axios.post("/api/gestion", params).then((res) => {
        if (res.data == null) {
          alert("La Gestión NO se ha registrado");
        } else {
          alert("¡La Gestión se ha registrado Exitosamente en el Caso!!");
        }
        this.gestioness.push(res.data);
      });
    },

    eliminar(gestion, index) {
      const confirmacion = confirm(
        `Confirma Eliminar la Gestión con el asunto: ${gestion.asuntotramite}`
      );
      if (confirmacion) {
        axios.delete("/api/gestion/" + gestion.id).then(() => {
          this.gestioness.splice(index, 1);
          alert("La Gestión se ha eliminado con exito");
        });
      }
    },
    editarForm(gestion, index) {
      this.gestion = gestion;
      this.gestion.index = index;
    },
    editar() {
      const params = {
        amplhechos: this.gestion.amplhechos,
        fechentrevasesor: this.gestion.fechentrevasesor,
        tipotramite: this.gestion.tipotramite,
        asuntotramite: this.gestion.asuntotramite,
        estado: this.gestion.estado,
        motivoarchivo: this.gestion.motivoarchivo,
        fechaarchivo: this.gestion.fechaarchivo,
        obsrvtramite: this.gestion.obsrvtramite,
        actuarealizadas: this.gestion.actuarealizadas,
        actjuridirealzadas: this.gestion.actjuridirealzadas,
        resulactuacion: this.gestion.resulactuacion,
        entidadelantramite: this.gestion.entidadelantramite,
        recp_id: this.gestion.recepcion.id,
      };
      axios
        .put("/api/gestion/" + this.gestion.id, params)
        .then((res) => {
          if (res.data == null) {
            alert("La gestión no se ha actualizado");
          } else {
            alert("La Gestión se ha actualizado con EXITO");
          }

          this.gestioness[this.gestion.index] = res.data;
          this.gestion.amplhechos = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.fechentrevasesor = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.tipotramite = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.asuntotramite = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.estado = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.motivoarchivo = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.fechaarchivo = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.obsrvtramite = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.actuarealizadas = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.actjuridirealzadas = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.resulactuacion = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.entidadelantramite = "";
          this.gestioness[this.gestion.index] = res.data;
          this.gestion.recepcion.id = "";
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.asuntotramite[0]);
          }
        });
    },
  },
};
</script>