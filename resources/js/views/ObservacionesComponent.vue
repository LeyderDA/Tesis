<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Visualizando observaciones de casos</h2>
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
                      <th>Id Recepción</th>
                      <th>Observación</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(observaciones,index) in observacioness" :key="observaciones.index">
                      <td>{{observaciones.recepcion.id}}</td>
                      <td>{{observaciones.obsrv}}</td>

                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(observaciones,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(observaciones,index)"
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Observación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">Observaciones</label>
                <input placeholder="Observación" v-model="observaciones.obsrv" />
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
          alert("La Observación se ha eliminado con exito");
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
            alert("La Observación se ha actualizado con EXITO");
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