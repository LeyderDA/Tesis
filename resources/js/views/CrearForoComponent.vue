<template>
  <div class="card">
    <div>
      <br />
      <h2 class="text-center mb-2 card-title">Crear Foro</h2>
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
                      <th>Username</th>
                      <th>Crear Foro</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(usuario, index) in usuarioss"
                      :key="usuario.index"
                    >
                      <td>{{ usuario.username }}</td>

                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#ModalAggForo"
                          @click="editarForm(usuario, index)"
                          title="Crear Foro"
                        >
                          <i class="fas fa-share-square"></i>
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
          id="ModalAggForo"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Editar Usuario
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
                <div class="col-8 form-group">
                  <input
                    class="form-control"
                    placeholder="id"
                    v-model="usuario.id"
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
      foro: {},

      usuario: {
        id: "",
        username: "",
        email: "",
        email_verified_at: "",
        password: "",
        rol_id: "",
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

      esta: false,
      estado: "disable",
      usuarioss: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/miusuario").then((res) => {
      this.usuarioss = res.data;
    });
  },
  methods: {
    eliminar(usuario, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Usuario: ${usuario.username}`
      );
      if (confirmacion) {
        axios.delete("/api/user/" + usuario.id).then(() => {
          this.usuarioss.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "El usuario se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
    editarForm(usuario, index) {
      this.usuario = usuario;
      this.usuario.index = index;
    },
    editar() {
      const params = {
        username: this.usuario.username,
        email: this.usuario.email,
        rol_id: this.usuario.rol_id,
      };
      axios
        .put("/api/user/" + this.usuario.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "El Usuario no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El Usuario se ha actualizado",
              showConfirmButton: false,
            });
          }
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            alert(this.errors.username[0]);
            alert(this.errors.email[0]);
          }
        });
    },
  },
};
</script>