<template>
   <div class="card" style="margin-top:25px">
    <div>
      <h1 class="text-center mb-2 card-title">Registrando Asignación</h1>
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
                      <th>Area</th>
                      <th>Datos de la Recepción</th>
                      <th>Datos del Asignado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(usurecep, index) in usurecepss"
                      :key="usurecep.index"
                    >
                      <td>{{ usurecep.nombre }}</td>
                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#MOSTRARModalRE"
                          @click="editarForm(usurecep, index)"
                          title="Mostrar los datos del la recepción"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>
                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#MOSTRARModalUSU"
                          @click="editarForm(usurecep, index)"
                          title="Mostrar los datos del Usuario"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>
                      <td>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(usurecep, index)"
                          title="Eliminar asignación"
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

        <!--segundo modal - el de MOSTRAR USUARIO-->
        <div
          class="modal fade"
          id="MOSTRARModalUSU"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Mostrar Usuario
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
                <label class="col-12 col-form-label">Username</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="USERNAME"
                    v-model="usurecep.username"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Cedula</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Cedula"
                    v-model="usurecep.cedula"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Primer nombre</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Primer nombre"
                    v-model="usurecep.prinom"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Segundo nombre</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Segundo nombre"
                    v-model="usurecep.segnom"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Primer apellido</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Primer apellido"
                    v-model="usurecep.priape"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Segundo apellido</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Segundo apellido"
                    v-model="usurecep.segape"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">Teléfono</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Teléfono"
                    v-model="usurecep.tel"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Dirección</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Dirección"
                    v-model="usurecep.direc"
                    disabled
                  />
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
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de MOSTRAR USUARIO -->
        <!--segundo modal - el de MOSTRAR RECEPCION-->
        <div
          class="modal fade"
          id="MOSTRARModalRE"
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
                <label class="col-12 col-form-label">Define el estado</label>
                <div class="col-12">
                  <select
                    class="form-control"
                    placeholder="Estado"
                    type="boolean"
                    v-model="usurecep.estado"
                    disabled
                  >
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>

                <label class="col-12 col-form-label">Fecha de radicado:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="usurecep.fecharadicado"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label"
                  >Fecha de recepcionado:</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="usurecep.fecharecepcionado"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Fecha de reparto:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="usurecep.fechareparto"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label"
                  >Fecha de publicación:</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="usurecep.fechapublicacion"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Fecha de retiro</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="usurecep.fecharetiro"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Recepcionado en:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="usurecep.recepcionado"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Consultorio:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="usurecep.consultorio"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Area:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="usurecep.nombre"
                    disabled
                  />
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
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de MOSTRAR RECEPCION -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      usurecep: {
        id: "",
        recp_id: "",
        usu_id: "",

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
        usuario: {
          id: "",
          username: "",
          email: "",
          email_verified_at: "",
          password: "",
        },
      },

      esta: false,
      estado: "disable",
      usurecepss: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/asigrecep").then((res) => {
      this.usurecepss = res.data;
    });
  },
  methods: {
    editarForm(usurecep, index) {
      this.usurecep = usurecep;
      this.usurecep.index = index;
    },

    eliminar(usurecep, index) {
      const confirmacion = confirm(
        `Confirma Eliminar la asignacion con id de usuario: ${usurecep.usu_id}`
      );
      if (confirmacion) {
        axios.delete("/api/asigrecep/" + usurecep.id).then(() => {
          this.usurecepss.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La asignación se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
  },
};
</script>