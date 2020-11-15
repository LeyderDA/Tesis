<template>
  <div class="card" style="margin-top: 25px">
    <div>
      <br />
      <h2 class="text-center mb-2 card-title">Listado de roles</h2>
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
                      <th>Rol</th>
                      <th>Email</th>
                      <th>Nombre Persona</th>
                      <th>Apellido Persona</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(usuario, index) in usuarioss"
                      :key="usuario.index"
                    >
                      <td>{{ usuario.username }}</td>
                      <td>
                        <div class="col-11">
                          <select
                            disabled
                            class="form-control"
                            placeholder="Rol"
                            type="integer"
                            v-model="usuario.rol_id"
                          >
                            <option value="">Selecciona un Rol</option>
                            <option value="1">Director</option>
                            <option value="2">Administrativo</option>
                            <option value="3">Docente</option>
                            <option value="4">Estudiante</option>
                          </select>
                        </div>
                      </td>
                      <td>{{ usuario.email }}</td>
                      <td>{{ usuario.persona.prinom }}</td>
                      <td>{{ usuario.persona.priape }}</td>

                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(usuario, index)"
                          title="Editar los datos del usuario"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(usuario, index)"
                          title="Eliminar reclamante"
                        >
                          <i class="fas fa-trash-alt"></i>
                        </button>

                        <a :href="'/add_archivos/' + usuario.id">
                          <i
                            title="Agregar Foto"
                          
                            class="fas fa-archive fa-2x"
                            style="color: black"
                          ></i>
                        </a>
                        <a :href="'/HojaDeVidaROLES/' + usuario.id" target="_blank"
                          ><i
                            title="Ver Usuario"
                            class="fas fa-user fa-2x"
                            style="color: black"
                          ></i
                        ></a>
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
                <label class="col-12 col-form-label">Username</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Username"
                    v-model="usuario.username"
                  />
                </div>

                <label class="col-12 col-form-label">Email</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Email"
                    v-model="usuario.email"
                  />
                </div>

                <label class="col-12 col-form-label">Rol</label>
                <div class="col-12">
                  <select
                    class="form-control"
                    placeholder="Rol"
                    type="integer"
                    v-model="usuario.rol_id"
                  >
                    <option value="">Selecciona un Rol</option>
                    <option value="2">Administrativo</option>
                    <option value="3">Docente</option>
                    <option value="4">Estudiante</option>
                  </select>
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
                  :disabled="!valida()"
                >
                  Guardar Cambios
                </button>
              </div>
            </div>
          </div>
        </div>
        <!--segundo modal - el de buscar -->
        <div
          class="modal fade"
          id="buscarModal"
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
                <input placeholder="Nombre" v-model="usuario.persona.prinom" />
                <input
                  placeholder="Cedula"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                  v-model="usuario.persona.cedula"
                />
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
        <!--cierro modal de buscar -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
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
    axios.get("/api/user").then((res) => {
      this.usuarioss = res.data;
    });
  },
  methods: {
    valida: function () {
      var exp1 = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;

      if (exp1.test(this.usuario.email)) {
        console.log("Email Correcto");
        return true;
      } else {
        console.log("ERRORES");
        return false;
      }
    },

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