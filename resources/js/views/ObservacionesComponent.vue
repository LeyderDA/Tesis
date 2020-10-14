<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">
        Visualizando observaciones de casos
      </h2>
    </div>
    <div class="card-body row">
      <form></form>
      <div class="row justify-content-center col"></div>
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Ver Recepción</th>
                      <th>Observación</th>

                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(observaciones, index) in observacioness"
                      :key="observaciones.index"
                    >
                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#MOSTRARModalRecp"
                          @click="editarForm(observaciones, index)"
                          title="Mostrar Recepción"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>

                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#MOSTRARModal"
                          @click="editarForm(observaciones, index)"
                          title="Mostrar Recepción"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>

                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(observaciones, index)"
                          title="Editar Observación"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(observaciones, index)"
                          title="Eliminar Observación"
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
                <h5 class="modal-title" id="exampleModalLabel">Recepción</h5>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">Estado</label>
                <br />
                <div class="col-6">
                  <select
                    class="form-control"
                    placeholder="Estado"
                    type="boolean"
                    v-model="observaciones.estado"
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
                    v-model="observaciones.fecharadicado"
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
                    v-model="observaciones.fecharecepcionado"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Fecha de reparto:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="observaciones.fechareparto"
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
                    v-model="observaciones.fechapublicacion"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Fecha de retiro</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="observaciones.fecharetiro"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Recepcionado en:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="observaciones.recepcionado"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Consultorio:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="observaciones.consultorio"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Area:</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="observaciones.nombre"
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
                <h5 class="modal-title" id="exampleModalLabel">
                  Editar Observación
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
                <label class="col-5 col-form-label">Observación</label>

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
      </div>
    </div>

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
            <h5 class="modal-title" id="exampleModalLabel">
              Editar Observación
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
            <label class="col-5 col-form-label">Observación</label>

            <div class="col-12 form-group">
              <textarea
                rows="3"
                cols="50"
                type="text"
                class="form-control"
                v-model="observaciones.obsrv"
                disabled
              >
              </textarea>
            </div>
          </div>

          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      observaciones: {
        id: "",
        obsrv: "",
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
      observacioness: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/observaciones").then((res) => {
      this.observacioness = res.data;
    });
  },
  methods: {
    eliminar(observaciones, index) {
      const confirmacion = confirm(
        `Confirma Eliminar la observacion: ${observaciones.obsrv}`
      );
      if (confirmacion) {
        axios.delete("/api/observaciones/" + observaciones.id).then(() => {
          this.observacioness.splice(index, 1);

          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "¡La Observación se ha eliminado con exito!!",
            showConfirmButton: false,
          });
        });
      }
    },
    editarForm(observaciones, index) {
      this.observaciones = observaciones;
      this.observaciones.index = index;
    },
    editar() {
      const params = {
        obsrv: this.observaciones.obsrv,
      };
      axios
        .put("/api/observaciones/" + this.observaciones.id, params)
        .then((res) => {
          if (res.data == null) {
            alert("La Observación no se ha actualizado");
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "¡La Observación se ha actualizado con EXITO!!",
              showConfirmButton: false,
            });
          }
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