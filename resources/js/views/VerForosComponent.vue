<template>
  <div class="card">
    <div>
      <br />
      <h2 class="text-center mb-2 card-title">Listado de Foros</h2>
    </div>
    <div class="card-body row">
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
                      <th></th>
                      <th>Area</th>
                      <th>Titulo</th>
                      <th>Descripción</th>
                      <th>Opciones</th>
                      <th>Agregar Archivos</th>
                      <th>Ir a Comentarios</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(foro, index) in foross" :key="foro.index">
                      <td><i class="fas fa-comment-dots fa-2x"></i></td>
                      <td>{{ foro.area.nombre }}</td>
                      <td>{{ foro.titulo }}</td>
                      <td>{{ foro.descripcion }}</td>
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(foro, index)"
                          title="Editar los datos del Foro"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(foro, index)"
                          title="Eliminar foro"
                        >
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                      <td>
                        <a :href="'/add_archivosForo/' + foro.id">
                          <i
                            title="Agregar Archivos"
                            class="fas fa-save fa-2x"
                            style="color: black"
                          ></i>
                        </a>
                      </td>

                      <td>
                        <a :href="'/view_foro/' + foro.id">
                          <i class="fas fa-arrow-alt-circle-right fa-3x"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--MODAL DE EDITAR -->
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
                <h5 class="modal-title" id="exampleModalLabel">Editar foro</h5>
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
                <label class="col-5 col-form-label">Título (*)</label>
                <div class="col-12 form-group">
                  <input class="form-control" v-model="foro.titulo" />
                </div>

                <label class="col-5 col-form-label">Define el estado (*)</label>
                <div class="col-12">
                  <select
                    class="form-control"
                    placeholder="Estado"
                    type="boolean"
                    v-model="foro.estadoFo"
                  >
                    <option value="">Selecciona</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
                <br />
                <label class="col-5 col-form-label">Descripción (*)</label>
                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="foro.descripcion"
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
        <!--MODAL DE EDITAR -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      foro: {
        id: "",
        titulo: "",
        descripcion: "",
        estadoFo: "",
        area_id: "",

        area: {
          id: "",
          nombre: "",
        },
      },

      esta: false,
      estado: "disable",
      foross: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/foro").then((res) => {
      this.foross = res.data;
      console.log(res.data);
    });
  },
  methods: {
    eliminar(foro, index) {
      const confirmacion = confirm(`Confirma Eliminar Foro: ${foro.titulo}`);
      if (confirmacion) {
        axios.delete("/api/foro/" + foro.id).then(() => {
          this.foross.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "El Foro se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
    editarForm(foro, index) {
      this.foro = foro;
      this.foro.index = index;
    },
    editar() {
      const params = {
        titulo: this.foro.titulo,
        descripcion: this.foro.descripcion,
        estadoFo: this.foro.estadoFo,
      };
      axios
        .put("/api/foro/" + this.foro.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "El Foro no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El Foro se ha actualizado",
              showConfirmButton: false,
            });
          }
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
  },
};
</script>