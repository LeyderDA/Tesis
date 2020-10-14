<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Usuario:</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label">Nombre de Usuario:</label>
          <div class="col-6 form-group">
            <input
            type="text"
              class="form-control"
              placeholder="Nombre de Usuario"
              v-model="usuario.username"
            />
          </div>

          <label class="col-5 col-form-label">Email:</label>
          <div class="col-6 form-group">
            <input
            
              class="form-control"
              placeholder="Email"
              v-model="usuario.email"
            />
          </div>

          <label class="col-5 col-form-label">password:</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="password"
              placeholder="Password"
              v-model="usuario.password"
            />
          </div>

          <label class="col-5 col-form-label">Rol:</label>
          <div class="col-6">
            <select
              class="form-control"
              placeholder="Rol"
              type="integer"
              v-model="usuario.rol_id"
            >
              <option value>Selecciona un Rol</option>
              <option value="2">Administrativo</option>
              <option value="3">Estudiante</option>
              <option value="4">Docente</option>
            </select>
          </div>
           <br />
            <br />

          <label class="col-5 col-form-label">Cedula</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Cedula"
              v-model="usuario.persona.cedula"
            />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <div class="col-12 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModal"
            @click="buscar()" :disabled="!isFormValidCedula()"
          >
            Buscar
          </button>
        </div>

        <div class="col-12 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">
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
                <input placeholder="Email" v-model="usuario.email" />

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
                <input placeholder="Nombre" v-model="usuario.persona.prinom" />
                <input placeholder="Cedula" v-model="usuario.persona.cedula" />
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
    isFormValidCedula: function(){
            return this.usuario.persona.cedula!="";
          },
    agregar() {
      // alert(this.personas.prinom);
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
            type: 'error',
            "timer":3000,
            "title":"PARECE QUE HAY UN ERROR",
            "text":"El usuario no se ha registrado con exito",
            "showConfirmButton":false
             });
        } else {
          swal({
           type: 'success',
            "timer":3000,
            "title":"EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            "text":"El usuario se ha registrado",
            "showConfirmButton":false
             });
        }
        this.usuarioss.push(res.data);
      });
    },
  },
};
</script>