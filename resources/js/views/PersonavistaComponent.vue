<template>
  <div class="card">
    
    <div>
      <br>
      <h2 class="text-center mb-2 card-title">Listado de personas</h2>
    </div>
    <div class="card-body row">
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Cédula</th>
                      <th>Primer nombre</th>
                      <th>Segundo nombre</th>
                      <th>Primer apellido</th>
                      <th>Segundo apellido</th>
                      <th>Teléfono</th>
                      <th>Dirección</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(personas, index) in personass"
                      :key="personas.index"
                    >
                      <td>{{ personas.cedula }}</td>
                      <td>{{ personas.prinom }}</td>
                      <td>{{ personas.segnom }}</td>
                      <td>{{ personas.priape }}</td>
                      <td>{{ personas.segape }}</td>
                      <td>{{ personas.tel }}</td>
                      <td>{{ personas.direc }}</td>
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(personas, index)"
                          title="Editar datos de la persona"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(personas, index)"
                          title="Eliminar una persona"
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
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Editar Persona
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

                <label class="col-12 col-form-label">Cedula</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Cedula"
                    v-model="personas.cedula"
                  />
                </div>
                <label class="col-12 col-form-label">Primer nombre</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Primer nombre"
                    v-model="personas.prinom"
                  />
                </div>
                <label class="col-12 col-form-label">Segundo nombre</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Segundo nombre"
                    v-model="personas.segnom"
                  />
                </div>
                <label class="col-12 col-form-label">Primer apellido</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Primer apellido"
                    v-model="personas.priape"
                  />
                </div>
                <label class="col-12 col-form-label">Segundo apellido</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Segundo apellido"
                    v-model="personas.segape"
                  />
                </div>
                <label class="col-12 col-form-label">Teléfono</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Teléfono"
                    v-model="personas.tel"
                  />
                </div>
                <label class="col-12 col-form-label">Dirección</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Dirección"
                    v-model="personas.direc"
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      personas: {
        id: "",
        cedula: "",
        prinom: "",
        segnom: "",
        priape: "",
        segape: "",
        tel: "",
        direc: "",
      },
      personass: [],
      errors: [],
    };
  },
  created() {
    axios.get("/api/persona").then((res) => {
      this.personass = res.data;
    });
  },
  methods: {
    eliminar(personas, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Persona: ${personas.prinom}`
      );
      if (confirmacion) {
        axios.delete("/api/persona/" + personas.id).then(() => {
          this.personass.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La persona se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
    editarForm(personas, index) {
      this.personas = personas;
      this.personas.index = index;
    },
    editar() {
      const params = {
        cedula: this.personas.cedula,
        prinom: this.personas.prinom,
        segnom: this.personas.segnom,
        priape: this.personas.priape,
        segape: this.personas.segape,
        tel: this.personas.tel,
        direc: this.personas.direc,
      };
      axios
        .put("/api/persona/" + this.personas.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "La persona no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La persona se ha actualizado",
              showConfirmButton: false,
            });
          }
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            alert(this.errors.id[0]);
            alert(this.errors.cedula[0]);
            alert(this.errors.prinom[0]);
            alert(this.errors.segnom[0]);
            alert(this.errors.priape[0]);
            alert(this.errors.segape[0]);
            alert(this.errors.tel[0]);
            alert(this.errors.direc[0]);
          }
        });
    },
  },
};
</script>