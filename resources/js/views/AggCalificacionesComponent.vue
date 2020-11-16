<template>
  <div class="card" style="margin-top: 25px">
    <div>
      <br />
      <h2 class="text-center mb-2 card-title">Agregar Calificaciones</h2>
    </div>

    <div class="container">
      <div class="row">
        <div class="card-body col">
          <div class="container row">
            <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>Área</th>
                    <th>Recepción</th>
                    <th>Nombre Estudiante</th>
                    <th>Apellido Estudiante</th>
                    <th>Datos Estudiante</th>
                    <th>Agregar Calificación</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="recepcion in recepcioness" :key="recepcion.index">
                    <td>{{ recepcion.nombre }}</td>
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
                    <td>{{ recepcion.prinom }}</td>
                    <td>{{ recepcion.priape }}</td>
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#estudiante"
                        @click="editarForm(recepcion)"
                        title="Mostrar los datos del Estudiante"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>
                    <td>
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#aggnotasmodal"
                        @click="editarForm(recepcion)"
                        title="Agregar Calificación"
                      >
                        <i class="fas fa-plus fa-3x" style="color: black"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!--modal de MOSTRAR LA RECEPCION-->
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
                Datos de la Recepción
              </h5>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">Estado de la Recepción</label>
              <div class="col-12">
                <select
                  class="form-control"
                  placeholder="Estado"
                  type="boolean"
                  v-model="recepcion.estado"
                  disabled
                >
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
              <label class="col-12 col-form-label">Institución Jurídica:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Institución Jurídica"
                  readonly="readonly"
                  v-model="recepcion.instjuri"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Trámite Jurídico:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Trámite Jurídico"
                  readonly="readonly"
                  v-model="recepcion.tramitejuri"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Recepcionado en:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  v-model="recepcion.recepcionado"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Consultorio:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  v-model="recepcion.consultorio"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Fecha de radicado:</label>
              <div class="col-12 form-group">
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
              <div class="col-12 form-group">
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
              <div class="col-12 form-group">
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
              <div class="col-12 form-group">
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
              <div class="col-12 form-group">
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
      <!--modal de MOSTRAR LA RECEPCION -->

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
              <input
                type="hidden"
                class="form-control"
                placeholder="Recepción"
                v-model="recepcion.id"
                disabled
              />

              <label class="col-5 col-form-label">Nota primer corte</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nota primer corte"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)||
              event.charCode == [46]"
                  v-model="recepcion.notpricort"
                />
              </div>

              <label class="col-5 col-form-label">Nota segundo corte</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nota segundo corte"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)||
              event.charCode == [46]"
                  v-model="recepcion.notsegcort"
                />
              </div>
              <label class="col-5 col-form-label">Nota tercer corte</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nota tercer corte"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)||
              event.charCode == [46]"
                  v-model="recepcion.nottercort"
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
                @click="editar()"
                data-dismiss="modal"
              >
                Guardar Cambios
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de agg NOTAS AL ESTUDIANTE -->

      <!--modal de mostrar AL ESTUDIANTE -->

      <div
        class="modal fade"
        id="estudiante"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Datos del estudiante
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
              <br />

              <div>
                <center>
                  <a :href="'/HojaDeVidaROLES/' + recepcion.usu_id" target="_blank"
                    ><i
                      title="Ver Usuario"
                      class="fas fa-user fa-5x"
                      style="color: black"
                    ></i
                  ></a>
                </center>
              </div>

              <br />
              <label class="col-5 col-form-label">Cédula</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="cédula"
                  v-model="recepcion.cedula"
                  disabled
                />
              </div>

               <label class="col-5 col-form-label">Email</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="email"
                  v-model="recepcion.email"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Primer Nombre</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Primer Nombre"
                  v-model="recepcion.prinom"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Segundo Nombre</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Segundo Nombre"
                  v-model="recepcion.segnom"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Primer Apellido</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Primer Apellido"
                  v-model="recepcion.priape"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Segundo Apellido</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Segundo Apellido"
                  v-model="recepcion.segape"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Dirección</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Dirección"
                  v-model="recepcion.direc"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Teléfono</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Teléfono"
                  v-model="recepcion.tel"
                  disabled
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

      <!--modal de mostrar AL ESTUDIANTE -->
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
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
    axios.get("/api/recepcionn").then((res) => {
      this.recepcioness = res.data;
      console.log(this.recepcioness);
    });
  },
  methods: {
    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
    },
    editar() {
      const params = {
        notpricort: this.recepcion.notpricort,
        notsegcort: this.recepcion.notsegcort,
        nottercort: this.recepcion.nottercort,
      };

      axios
        .put("/api/recepcion2/" + this.recepcion.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "EL PROCESO SE NO REALIZÓ PORQUE TIENE ERRORES",
              text: "La Calificación NO se ha realizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La Calificación se ha realizado",
              showConfirmButton: false,
            });
          }
          axios.get("/api/recepcionn").then((res) => {
            this.recepcioness = res.data;
            console.log(this.recepcioness);
          });
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.recepcionado[0]);
          }
        });
    },
  },
};
</script>