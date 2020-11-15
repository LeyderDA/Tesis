<template>
  <div class="card" style="margin-top: 25px">
    <div>
      <br />
      <h4 class="mb-2 card-title">Observaciones</h4>

      <button
        class="btn btn-sm"
        data-toggle="modal"
        data-target="#mostrarobsModal"
        @click="editarForm(reclamante, index)"
        title="Mostrar Observaciones"
      >
        <i class="fas fa-eye fa-2x" style="color: black"></i>
      </button>
      <!--modal para editar -->
      <div
        class="modal fade"
        id="mostrarobsModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Observaciones</h5>
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
              <label class="col-12 col-form-label"
                >-El campo de contraseña no se va a habilitar si tienes un
                formato de correo invalido.</label
              >
              <label class="col-12 col-form-label"
                >-La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, 
                al menos una minúscula, al menos una mayúscula y al menos un carácter no alfanumérico.
                </label
              >
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
      <!--cierro modal de editar -->

      <h1 class="text-center mb-2 card-title">Registrando Rol</h1>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label">Nombre de Usuario (*):</label>
          <div class="col-6 form-group">
            <input
              type="text"
              class="form-control"
              placeholder="Nombre de Usuario"
              v-model="usuario.username"
            />
          </div>

          <label class="col-5 col-form-label">Email (*):</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Email"
              v-model="usuario.email"
              :state="false"
            />
          </div>

          <label class="col-5 col-form-label">password (*):</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="password"
              placeholder="Password"
              v-model="usuario.password"
              :disabled="!isFormValidcampContra()"
            />
          </div>

          <label class="col-5 col-form-label">Rol (*):</label>
          <div class="col-6">
            <select
              class="form-control"
              placeholder="Rol"
              type="integer"
              v-model="usuario.rol_id"
            >
              <option value>Selecciona un Rol</option>
              <option value="1">Director</option>
              <option value="2">Administrativo</option>
              <option value="3">Estudiante</option>
              <option value="4">Docente</option>
            </select>
          </div>
          <br />
          <br />

          <label class="col-5 col-form-label">Cedula (*)</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Cedula"
              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
              v-model="usuario.persona.cedula"
            />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <div class="col-6 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModal"
            @click="buscar()"
            :disabled="!isFormValidCedula()"
          >
            Buscar
          </button>
        </div>

        <div class="col-6 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            @click="agregar()"
            :disabled="!valida()"
          >
            Guardar
          </button>
        </div>
      </div>
      <br />
      <div class="container">
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
                <label class="col-5 col-form-label">Username</label>
                <input placeholder="Username" v-model="usuario.username" />

                <label class="col-5 col-form-label">Email</label>
                <input
                  type="email"
                  placeholder="Email"
                  v-model="usuario.email"
                />

                <label class="col-5 col-form-label">Rol</label>
                <div class="col-6">
                  <select
                    class="form-control"
                    placeholder="Rol"
                    type="integer"
                    v-model="usuario.rol_id"
                  >
                    <option value>Selecciona un Rol</option>
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
                  data-dismiss="modal"
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
                <label class="col-5 col-form-label"> Primer Nombre</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Nombre"
                    v-model="usuario.persona.prinom"
                  />
                </div>
                <label class="col-5 col-form-label">Segundo Nombre</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Nombre"
                    v-model="usuario.persona.segnom"
                  />
                </div>

                <label class="col-5 col-form-label">Primer Apellido</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Nombre"
                    v-model="usuario.persona.priape"
                  />
                </div>

                <label class="col-5 col-form-label">Primer Apellido</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Nombre"
                    v-model="usuario.persona.segape"
                  />
                </div>
                <label class="col-5 col-form-label">Cédula</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Cedula"
                    v-model="usuario.persona.cedula"
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

  methods: {
    buscar() {
      axios.get("/api/persona/" + this.usuario.persona.cedula).then((res) => {
        if (res.data[0] == null) {
          this.usuario.persona.cedula = "";
          this.usuario.persona.prinom = "";
          console.log(this.usuario.persona.cedula);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usuario.persona = person;
          this.esta = true;
        }
      });
    },
    isFormValidCedula: function () {
      return this.usuario.persona.cedula != "";
    },

    isFormValidcampContra: function () {
      var exp1 = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
      if (exp1.test(this.usuario.email)) {
        return true;
      } else {
        return false;
      }
    },

    valida: function () {
      var exp1 = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
      var exp = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
      if (exp1.test(this.usuario.email)) {
        console.log("Email Correcto");
      }
      if (exp.test(this.usuario.password)) {
        console.log("Contraseña correcta");
        return true;
      } else {
        console.log("ERRORES");
        return false;
      }
    },

    // validaPassword: function(){

    //     var exp = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
    //     if(exp.test(this.usuario.password)){
    //       console.log("Contraseña correcta");
    //       return true;
    //     } else{
    //       console.log('Incorrect cla');
    //       return false;
    //     }
    // },

    agregar() {
      if (
        !this.usuario.username ||
        !this.usuario.email ||
        !this.usuario.password ||
        !this.usuario.rol_id ||
        !this.usuario.persona.cedula
      ) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios estan marcados con un (*)",
          showConfirmButton: true,
        });
      } else {
        const params = {
          username: this.usuario.username,
          email: this.usuario.email,
          password: this.usuario.password,
          rol_id: this.usuario.rol_id,
          per_id: this.usuario.persona.id,
        };
        this.usuario.username = "";
        this.usuario.email = "";
        this.usuario.password = "";
        this.usuario.rol_id = "";
        this.usuario.per_id = "";
        this.usuario.persona.cedula = "";

        axios.post("/api/user", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "El usuario no se ha registrado con exito",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El usuario se ha registrado",
              showConfirmButton: false,
            });
          }
          this.usuarioss.push(res.data);
        });
      }
    },
  },
};
</script>