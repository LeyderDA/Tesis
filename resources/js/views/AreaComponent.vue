<template>

  <div class="container" style="margin-top:25px">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Modulo Área</div>
          <div class="card-body row">
            <label class="col-5 col-form-label">Nombre del área (*)</label>
            <div class="col-6">
              <input
                class="form-control"
                placeholder="nombre del área"
                v-model="areas.nombre"
              />
            </div>
            <br />
            <br />
            <br />

            <div class="col-12" v-if="true">
              <center>
                <button class="btn btn-primary btn-block" @click="agregar()">
                  Guardar
                </button>
              </center>
            </div>
            <br />
            <br />
            <br />
            <div class="container">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(areas, index) in areass" :key="areas.index">
                    <td></td>
                    <td></td>
                    <td>{{ areas.nombre }}</td>
                    <td>
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#editarModal"
                        @click="editarForm(areas, index)"
                      >
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                      <button
                        class="btn btn-danger btn-sm"
                        @click="eliminar(areas, index)"
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
            <h5 class="modal-title" id="exampleModalLabel">Editar Area</h5>
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
            <label class="col-5 col-form-label">Nombre del area</label>
            <div class="col-6 form-group">
              <input
                class="form-control"
                placeholder="nombre del Area"
                v-model="areas.nombre"
              />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
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
</template>
<script>
export default {
  data() {
    return {
      areas: {
        id: "",
        nombre: "",
      },
      areass: [],
      //registro: true, //me describe el compartamieto del boton si va a guardar o va a editar
      errors: [],
    };
  },
  created() {
    axios.get("/api/area").then((res) => {
      this.areass = res.data;
    });
  },
  methods: {
    agregar() {
      if (!this.areas.nombre) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios estan marcados con un (*)",
          showConfirmButton: true,
        });
      } else {
        const params = { nombre: this.areas.nombre };
        this.areas.nombre = "";

        axios.post("/api/area", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "EL PROCESO SE NO REALIZÓ PORQUE TIENE ERRORES",
              text: "El ÁREA no se ha registrado con exito",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El ÁREA se ha registrado",
              showConfirmButton: false,
            });
          }
          this.areass.push(res.data);
        });
      }
    },

    eliminar(areas, index) {
      console.log(areas);
      const confirmacion = confirm(`Confirma Eliminar Area: ${areas.nombre}`);
      console.log(areas.nombre);
      if (confirmacion) {
        axios.delete("/api/area/" + areas.id).then(() => {
          this.areass.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "El area se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
    editarForm(areas, index) {
      this.areas = areas;
      this.areas.index = index;
    },
    editar() {
      const params = { nombre: this.areas.nombre };
      axios
        .put("/api/area/" + this.areas.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "EL PROCESO SE NO REALIZÓ PORQUE TIENE ERRORES",
              text: "El area no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El area se ha actualizado",
              showConfirmButton: false,
            });
          }
          //alert(this.area.index)
          this.areass[this.areas.index] = res.data;
          this.areas.nombre = "";
          //this.$refs.editarModal.modal('dispose');
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.nombre[0]);
          }
        });
    },
  },
};
</script>