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
                      <th>Titulo</th>
                      <th>Descripción</th>
                      <th>Ir a Comentarios</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="foro in foross" :key="foro.index">
                      <td>{{ foro.titulo }}</td>
                      <td>{{ foro.descripcion }}</td>
                      <td>
                        <a :href="'/comentarios/' + foro.id">
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

        usuario: {
          username: "",
          email: "",
          password: "",
          rol_id: "",
          per_id: "",
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