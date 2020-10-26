<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Listado de gestiones</h2>
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
                      <th>Fecha entrevista Asesor</th>
                      <th>Asunto</th>
                      <th>Tipo de tramite</th>
                      <th>Motivo de archivo</th>
                      <th>Fecha del archivo</th>
                      <th>Entidad reclamante</th>
                      <th>Ver los otros campos</th>
                      <th>Recepción</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(gestion, index) in gestioness"
                      :key="gestion.index"
                    >
                      <td>{{ gestion.fechentrevasesor }}</td>
                      <td>{{ gestion.asuntotramite }}</td>
                      <td>{{ gestion.tipotramite }}</td>
                      <td>{{ gestion.motivoarchivo }}</td>
                      <td>{{ gestion.fechaarchivo }}</td>
                      <td>{{ gestion.entidadelantramite }}</td>
                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#MOSTRARModalResto"
                          @click="editarForm(gestion, index)"
                          title="Mostrar el resto de datos de la Gestión"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>
                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#MOSTRARModalRecp"
                          @click="editarForm(gestion, index)"
                          title="Mostrar el resto de datos de la Gestión"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(gestion, index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(gestion, index)"
                        >
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
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Editar Gestion
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
                <label class="col-5 col-form-label">Ampliación de hechos</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Ampliación de hechos"
                    v-model="gestion.amplhechos"
                  />
                </div>
                <label class="col-6 col-form-label"
                  >Fecha entrevista asesor</label
                >

                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    type="Date"
                    placeholder="fecha entrevista asesor"
                    v-model="gestion.fechentrevasesor"
                  />
                </div>

                <label class="col-6 col-form-label">Tipo de tramite</label>
                <br />
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Tipo de tramite"
                    v-model="gestion.tipotramite"
                  />
                </div>

                <label class="col-5 col-form-label">Asunto tramite</label>

                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Asunto tramite"
                    v-model="gestion.asuntotramite"
                  />
                </div>

                <label class="col-5 col-form-label">Motivo archivo</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Motivo archivo"
                    v-model="gestion.motivoarchivo"
                  />
                </div>

                <label class="col-5 col-form-label">Fecha archivo</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    type="Date"
                    placeholder="Fecha archivo"
                    v-model="gestion.fechaarchivo"
                  />
                </div>
                <label class="col-5 col-form-label"
                  >Entidad en que se adelanta el tramite</label
                >
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Entidad tramite"
                    v-model="gestion.entidadelantramite"
                  />
                </div>

                <label class="col-6 col-form-label"
                  >Observación del tramite</label
                >

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

                <label class="col-6 col-form-label"
                  >Actuaciones realizadas</label
                >

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

                <label class="col-5 col-form-label">Atuaciones juridicas</label>

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

                <label class="col-5 col-form-label"
                  >Resultados de la actuación</label
                >
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
                <button
                  type="button"
                  class="btn btn-danger"
                  data-dismiss="modal"
                >
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
                <h5 class="modal-title" id="exampleModalLabel">
                  Mostrar Recepcion
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
                <label class="col-5 col-form-label">ID</label>
                <input placeholder="ID" v-model="gestion.recepcion.id" />

                <label class="col-5 col-form-label">Recepcionado</label>
                <input
                  placeholder="Recepcionado"
                  v-model="gestion.recepcion.recepcionado"
                />

                <label class="col-5 col-form-label">Fecha de Radicado</label>
                <input
                  placeholder="Fecha de Radicado"
                  v-model="gestion.recepcion.fecharadicado"
                />

                <label class="col-5 col-form-label">Fecha Recepcionado</label>
                <input
                  placeholder="Fecha Recepcionado"
                  v-model="gestion.recepcion.fecharecepcionado"
                />

                <label class="col-5 col-form-label">Consultorio</label>
                <input
                  placeholder="Consultorio"
                  v-model="gestion.recepcion.consultorio"
                />

                <label class="col-5 col-form-label">Fecha Reparto</label>
                <input
                  placeholder="Fecha Reparto"
                  v-model="gestion.recepcion.fechareparto"
                />

                <label class="col-5 col-form-label">Fecha Publicación</label>
                <input
                  placeholder="Fecha Publicación"
                  v-model="gestion.recepcion.fechapublicacion"
                />

                <label class="col-5 col-form-label">Fecha Retiro</label>
                <input
                  placeholder="Fecha Retiro"
                  v-model="gestion.recepcion.fecharetiro"
                />
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-dismiss="modal"
                >
                  Cerrar
                </button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--modal de MOSTRAR RESTO DE CAMPOS-->
        <div
          class="modal fade"
          id="MOSTRARModalResto"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gestión</h5>
              </div>
              <div class="modal-body">
                <div class="col-6 form-group">
                  <input
                    type="hidden"
                    class="form-control"
                    placeholder="Recepción"
                    v-model="gestion.recepcion.id"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label"
                  >Primera Actuación (*)</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    type="date"
                    v-model="gestion.fechpriact"
                  />
                </div>

                <label class="col-5 col-form-label">N.Actuaciones (*)</label>
                <div class="col-12 form-group">
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Entidad del tramite"
                    v-model="gestion.n_act"
                  />
                </div>

                <label class="col-5 col-form-label">N.Asesorias (*)</label>
                <div class="col-12 form-group">
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Entidad del tramite"
                    v-model="gestion.n_aseso"
                  />
                </div>

                <label class="col-5 col-form-label">N.Autorizaciones (*)</label>
                <div class="col-12 form-group">
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Entidad del tramite"
                    v-model="gestion.n_autor"
                  />
                </div>

                <label class="col-5 col-form-label">Asesor (*)</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Entidad del tramite"
                    v-model="gestion.asesor"
                  />
                </div>

                <label class="col-5 col-form-label">Ampliación de hechos</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Ampliación de hechos"
                    v-model="gestion.amplhechos"
                    disabled
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
                    disabled
                  >
                  </textarea>
                </div>

                <label class="col-5 col-form-label"
                  >Actuaciones Realizadas</label
                >

                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="gestion.actuarealizadas"
                    disabled
                  >
                  </textarea>
                </div>

                <label class="col-5 col-form-label"
                  >Actuaciones Juridicas</label
                >

                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="gestion.actjuridirealzadas"
                    disabled
                  >
                  </textarea>
                </div>

                <label class="col-5 col-form-label"
                  >Resultado de actuación</label
                >

                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="gestion.resulactuacion"
                    disabled
                  >
                  </textarea>
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
        <!--modal de MOSTRAR RESTO DE CAMPOS -->

        <!--modal de MOSTRAR recepcion-->
        <div
          class="modal fade"
          id="MOSTRARModalRecp"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Datos de la Recepción
                </h5>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">Estado:</label>
                <br />
                <div class="col-6">
                  <select
                    class="form-control"
                    placeholder="Estado"
                    type="boolean"
                    v-model="gestion.estado"
                    disabled
                  >
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>

                <label class="col-5 col-form-label">Fecha de radicado:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fecharadicado"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label"
                  >Fecha de recepcionado:</label
                >
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fecharecepcionado"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Fecha de reparto:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fechareparto"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label"
                  >Fecha de publicación:</label
                >
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fechapublicacion"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Fecha de retiro</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fecharetiro"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Recepcionado en:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="gestion.recepcionado"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Consultorio:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="gestion.consultorio"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Area:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="gestion.nombre"
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
        <!--modal de MOSTRAR recepcion -->
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
        fechpriact: "",
        n_act: "",
        n_aseso: "",
        n_autor: "",
        asesor: "",

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

    eliminar(gestion, index) {
      const confirmacion = confirm(
        `Confirma Eliminar la Gestión con el asunto: ${gestion.asuntotramite}`
      );
      if (confirmacion) {
        axios.delete("/api/gestion/" + gestion.id).then(() => {
          this.gestioness.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La Gestión se ha eliminado con exito",
            showConfirmButton: false,
          });
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
        motivoarchivo: this.gestion.motivoarchivo,
        fechaarchivo: this.gestion.fechaarchivo,
        obsrvtramite: this.gestion.obsrvtramite,
        actuarealizadas: this.gestion.actuarealizadas,
        actjuridirealzadas: this.gestion.actjuridirealzadas,
        resulactuacion: this.gestion.resulactuacion,
        entidadelantramite: this.gestion.entidadelantramite,
        fechpriact: this.gestion.fechpriact,
        n_act: this.gestion.n_act,
        n_aseso: this.gestion.n_aseso,
        n_autor: this.this.gestion.n_autor,
        asesor: this.gestion.asesor,
      };
      axios
        .put("/api/gestion/" + this.gestion.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "La gestión no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La Gestión se ha actualizado con EXITO",
              showConfirmButton: false,
            });
          }
          axios.get("/api/gestionSUPER").then((res) => {
            this.gestioness = res.data;
          });
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