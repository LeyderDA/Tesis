<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Listado de Recepciones</h2>
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
                    <th>Recepcionado en</th>
                    <th>Consultorio</th>
                    <th>Reclamante</th>
                    <th>Area</th>
                    <th>Ver los otros campos</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(recepcion, index) in recepcioness"
                    :key="recepcion.index"
                  >
                    <td>{{ recepcion.id }}</td>
                    <td>{{ recepcion.recepcionado }}</td>
                    <td>{{ recepcion.consultorio }}</td>
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalRECLAMANTE"
                        @click="editarForm(recepcion, index)"
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
                        title="Mostrar el resto de campos"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>
                    <td>
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#editarModal"
                        @click="editarForm(recepcion, index)"
                        title="Editar Recepción"
                      >
                        <i class="fas fa-pencil-alt fa-1.5x"></i>
                      </button>
                      <button
                        class="btn btn-danger btn-sm"
                        @click="eliminar(recepcion, index)"
                        title="Eliminar Recepción"
                      >
                        <i class="fas fa-trash-alt fa-1.5x"></i>
                      </button>
                      <br />
                      <a :href="'/recepcionqr/' + recepcion.id">
                        <i
                          class="fas fa-qrcode fa-2x fa-align-center"
                          style="color: black"
                          title="Mostrar QR de la Recepción"
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
      <!--modal de editar -->
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
                Editar Recepción
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
              <label class="col-5 col-form-label">Define el estado</label>
              <div class="col-6">
                <select
                  class="form-control"
                  placeholder="Estado"
                  type="boolean"
                  v-model="recepcion.estado"
                >
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>

              <label class="col-5 col-form-label">Fecha de radicado:</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="recepcion.fecharadicado"
              />

              <label class="col-5 col-form-label">Fecha de recepcionado:</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="recepcion.fecharecepcionado"
              />

              <label class="col-5 col-form-label">Fecha de reparto:</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="recepcion.fechareparto"
              />

              <label class="col-5 col-form-label">Fecha de publicación:</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="recepcion.fechapublicacion"
              />

              <label class="col-5 col-form-label">Fecha de retiro</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="recepcion.fecharetiro"
              />

              <label class="col-5 col-form-label">Recepcionado en:</label>
              <input placeholder="recepcion" v-model="recepcion.recepcionado" />

              <label class="col-5 col-form-label">Consultorio:</label>
              <input placeholder="recepcion" v-model="recepcion.consultorio" />

              <label class="col-5 col-form-label">ID Reclamante:</label>
              <input placeholder="recepcion" v-model="recepcion.reclamante.id" />

              <!--buscar reclamante -->
              <div class="col-5 form-group" v-if="true">
                <button
                  class="btn btn-primary btn-block"
                  data-toggle="modal"
                  data-target="#buscarModalrecl"
                  @click="buscarrecl()"
                >
                  B.Reclamante
                </button>
              </div>
              <!--buscar reclamante -->

              <label class="col-5 col-form-label">Area:</label>
              <input placeholder="recepcion" v-model="recepcion.area.nombre" />

              <!--buscar area -->
              <div class="col-5 form-group" v-if="true">
                <button
                  class="btn btn-primary btn-block"
                  data-toggle="modal"
                  data-target="#buscarModalarea"
                  @click="buscararea()"
                >
                  Buscar Area
                </button>
              </div>
              <!--buscar area -->
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
      <!--modal de editar -->

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

      <!--modal de area -->
      <div
        class="modal fade"
        id="buscarModalarea"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mostrar Area</h5>
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
              <input placeholder="Id" v-model="recepcion.area.id" />
              <input placeholder="Nombre" v-model="recepcion.area.nombre" />
              <input placeholder="Area Id" v-model="recepcion.area_id" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--cierro modal de area -->

      <!--modal - el de buscar reclamante -->
      <div
        class="modal fade"
        id="buscarModalrecl"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Mostrar Persona
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
                placeholder="Id Docente"
                v-model="recepcion.reclamante.id"
              />
              <input
                placeholder="Id Persona"
                v-model="recepcion.reclamante.per_id"
              />

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--cierro modal de buscar -->
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
        recla_id: "",
        area_id: "",

        reclamante: {
          id: "",
          enfodifervictima: "",
          genevictima: "",
          edadvictima: "",
          discapavictima: "",
          estravictima: "",
          embaravictima: "",
          grupetnicovictima: "",
          persoentidreclama: "",
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

      esta: false,
      estado: "disable",
      recepcioness: [],
      errors: [],
    };
  },
  created() {
    axios.get("/api/recepcionSUPER").then((res) => {
      this.recepcioness = res.data;
      console.log(res.data);
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

    eliminar(recepcion, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Recepcion del area de: ${recepcion.area.nombre}`
      );
      if (confirmacion) {
        axios.delete("/api/recepcion/" + recepcion.id).then(() => {
          this.recepcioness.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La recepción se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
    },
    editar() {
      const params = {
        recepcionado: this.recepcion.recepcionado,
        fecharadicado: this.recepcion.fecharadicado,
        fecharecepcionado: this.recepcion.fecharecepcionado,
        consultorio: this.recepcion.consultorio,
        fechareparto: this.recepcion.fechareparto,
        fechapublicacion: this.recepcion.fechapublicacion,
        fecharetiro: this.recepcion.fecharetiro,
        estado: this.recepcion.estado,
        recla_id: this.recepcion.reclamante.id,
        area_id: this.recepcion.area.id,
      };
      axios
        .put("/api/recepcion/" + this.recepcion.id, params)
        .then((res) => {
          if (res.data == null) {
              swal({
            type: "error",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La recepcion no se ha actualizado",
            showConfirmButton: false,
          });

          } else {
            swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La Recepción se ha actualizado",
            showConfirmButton: false,
          });

          }
          axios.get("/api/recepcionSUPER").then((res) => {
            this.recepcioness = res.data;
            console.log(res.data);
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