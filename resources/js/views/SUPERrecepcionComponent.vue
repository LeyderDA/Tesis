<template>
  <div class="card" style="margin-top: 25px">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Recepcion</h2>
    </div>
    <div class="card-body row">
      <form id="miForm">
        <div class="row">
          <label class="col-5 col-form-label">Define el estado (*)</label>
          <div class="col-6">
            <select
              class="form-control"
              placeholder="Estado"
              type="boolean"
              v-model="recepcion.estado"
            >
              <option value="">Selecciona</option>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>
          <br />
          <br />

          <label class="col-5 col-form-label">Fecha radicado (*)</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de radicado"
              v-model="recepcion.fecharadicado"
            />
          </div>

          <label class="col-5 col-form-label">Fecha recepcionado (*)</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha recepcionado"
              v-model="recepcion.fecharecepcionado"
            />
          </div>
          <label class="col-5 col-form-label">Fecha reparto (*)</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha reparto"
              v-model="recepcion.fechareparto"
            />
          </div>
          <label class="col-5 col-form-label">Fecha de publicación (*)</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de publicación"
              v-model="recepcion.fechapublicacion"
            />
          </div>
          <label class="col-5 col-form-label">Fecha de retiro (*)</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de retiro"
              v-model="recepcion.fecharetiro"
            />
          </div>
          <label class="col-5 col-form-label">Recepcionado en (*)</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Recepcionado en"
              v-model="recepcion.recepcionado"
            />
          </div>
          <label class="col-5 col-form-label">Consultorio (*)</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Consultorio"
              v-model="recepcion.consultorio"
            />
          </div>
          <label class="col-5 col-form-label">Escoge el area (*)</label>
          <div class="col-6 form-group">
            <select v-model="area.id" class="form-control" id="area">
              <option value="">Selecciona</option>
              <option v-for="area in areass" :key="area.index">
                {{ area.id }}-{{ area.nombre }}
              </option>
            </select>
          </div>

          <label class="col-5 col-form-label"
            >Ingresa el cedula del reclamante (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Cc Reclamante"
              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
              v-model="usuario.persona.cedula"
            />
          </div>

          <label class="col-5 col-form-label"
            >Ingresa el cedula del estudiante (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Cc Estudiante"
              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
              v-model="usuarioo.persona.cedula"
            />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <!--buscar reclamante -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalRE"
            @click="buscarreclaced()"
            :disabled="!isFormValidReclamante()"
          >
            B.Reclamante
          </button>
        </div>
        <!--buscar recepcionador -->

        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalUSU"
            @click="buscarusuced()"
          >
            Buscar Usuario
          </button>
        </div>

        <div class="col-6 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">
            Guardar
          </button>
        </div>
      </div>
      <br />
      <div class="container">
        <!--segundo modal - el de buscar RECLAMANTE-->
        <div
          class="modal fade"
          id="buscarModalRE"
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
                <label class="col-5 col-form-label">ID RECLAMANTE</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="ID USUARIO"
                    v-model="usuario.persona.id"
                  />
                </div>

                <label class="col-5 col-form-label">CEDULA</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="USERNAME"
                    v-model="usuario.persona.cedula"
                  />
                </div>

                <label class="col-5 col-form-label">NOMBRE</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="USERNAME"
                    v-model="usuario.persona.prinom"
                  />
                </div>

                <label class="col-5 col-form-label">APELLIDO</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="USERNAME"
                    v-model="usuario.persona.priape"
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
        <!--cierro modal de buscar RECLAMANTE-->
        <!--segundo modal - el de buscar USUARIO-->
        <div
          class="modal fade"
          id="buscarModalUSU"
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
                <label class="col-5 col-form-label">ID</label>
                <div class="col-6 form-group">
                  <input class="form-control" v-model="usuarioo.persona.id" />
                </div>
                <label class="col-5 col-form-label">CEDULA</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    v-model="usuarioo.persona.cedula"
                  />
                </div>
                <label class="col-5 col-form-label">Primer Nombre</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    v-model="usuarioo.persona.prinom"
                  />
                </div>
                <label class="col-5 col-form-label">Segundo Nombre</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    v-model="usuarioo.persona.segnom"
                  />
                </div>
                <label class="col-5 col-form-label">Primer Apellido</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    v-model="usuarioo.persona.priape"
                  />
                </div>
                <label class="col-5 col-form-label">Segundo Apellido</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    v-model="usuarioo.persona.segape"
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
      area: {
        id: "",
        nombre: "",
      },
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

      usuarioo: {
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

      recepcion: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",
        estado: "",

        reclamante: {
          id: "",
          enfodifervictima: "",
          genevictima: "",
          edadvictima: "",
          discapavictima: "",
          estravictima: "",
          embaravictima: "",
          grupetnicovictima: "",
          persoentidreclama: "",
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
        area: {
          id: "",
          nombre: "",
        },
      },
      esta: false,
      estado: "disable",
      recepcioness: [],
      errors: [],
      areass: [],
    };
  },
  created() {
    axios.get("/api/area").then((res) => {
      this.areass = res.data;
      console.log(res.data);
    });
  },
  methods: {
    buscarusuced() {
      axios.get("/api/user3/" + this.usuarioo.persona.cedula).then((res) => {
        if (res.data[0] == null) {
          this.usuarioo.persona.id = "";
          this.usuarioo.persona.cedula = "";
          this.usuarioo.persona.prinom = "";
          this.usuarioo.persona.segnom = "";
          this.usuarioo.persona.priape = "";
          this.usuarioo.persona.segape = "";
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let personn = res.data[0];
          this.usuarioo.persona = personn;
          this.esta = true;
        }
      });
    },
    buscarreclaced() {
      axios
        .get("/api/reclamante2/" + this.usuario.persona.cedula)
        .then((res) => {
          if (res.data[0] == null) {
            this.usuario.persona.id = "";
            this.usuario.persona.username = "";
            this.usuario.persona.cedula = "";
            this.usuario.persona.prinom = "";
            this.usuario.persona.priape = "";
            console.log(this.usuario);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.usuario.persona = person;
            this.esta = true;
          }
        });
    },

    limpiar() {
      this.usuario.persona.cedula = "";
    },

    buscarrecl() {
      axios
        .get("/api/reclamante/" + this.recepcion.reclamante.id)
        .then((res) => {
          if (res.data[0] == null) {
            this.recepcion.reclamante.id = "";
            this.recepcion.reclamante.per_id = "";
            console.log(this.recepcion.reclamante);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.recepcion.reclamante = person;
            this.esta = true;
          }
        });
    },
    isFormValidArea: function () {
      return this.recepcion.area.nombre != "";
    },
    isFormValidReclamante: function () {
      return this.usuario.persona.cedula != "";
    },
    buscararea() {
      axios.get("/api/area/" + this.recepcion.area.nombre).then((res) => {
        if (res.data[0] == null) {
          this.recepcion.area.id = "";
          this.recepcion.area.nombre = "";
          console.log(this.recepcion.area);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.recepcion.area = person;
          this.esta = true;
        }
      });
    },
    agregar() {
      if (
        !this.recepcion.recepcionado ||
        !this.recepcion.fecharadicado ||
        !this.recepcion.fecharecepcionado ||
        !this.recepcion.consultorio ||
        !this.recepcion.fechareparto ||
        !this.recepcion.fechapublicacion ||
        !this.recepcion.fecharetiro ||
        !this.recepcion.estado ||
        !this.usuario.persona.id ||
        !this.usuarioo.persona.id ||
        !this.area.id
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
          recepcionado: this.recepcion.recepcionado,
          fecharadicado: this.recepcion.fecharadicado,
          fecharecepcionado: this.recepcion.fecharecepcionado,
          consultorio: this.recepcion.consultorio,
          fechareparto: this.recepcion.fechareparto,
          fechapublicacion: this.recepcion.fechapublicacion,
          fecharetiro: this.recepcion.fecharetiro,
          estado: this.recepcion.estado,
          recla_id: this.usuario.persona.id,
          usu_id: this.usuarioo.persona.id,
          area_id: this.area.id.substr(0, 1),
        };
        this.recepcion.recepcionado = "";
        this.recepcion.fecharadicado = "";
        this.recepcion.fecharecepcionado = "";
        this.recepcion.consultorio = "";
        this.recepcion.fechareparto = "";
        this.recepcion.fechapublicacion = "";
        this.recepcion.fecharetiro = "";
        this.recepcion.reclamante.id = "";
        this.area.id = "";
        this.recepcion.area.nombre = "";
        this.recepcion.estado = "";
        this.usuario.persona.cedula = "";
        this.usuarioo.persona.cedula = "";
        this.usuarioo.persona.id = "";
        this.usuario.persona.id = "";

        axios.post("/api/recepcion", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "La recepcion No se registro porque tiene errores",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "Se guardo la recepción",
              showConfirmButton: false,
            });
          }
        });
      }
    },
  },
};
</script>