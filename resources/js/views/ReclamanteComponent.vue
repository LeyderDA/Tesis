<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Reclamante</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label"
            >Enfoque diferencial (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Enfoque diferencial"
              v-model="reclamante.enfodifervictima"
            />
          </div>

          <label class="col-5 col-form-label"
            >Genero (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Genero"
              v-model="reclamante.genevictima"
            />
          </div>

          <label class="col-5 col-form-label"
            >Edad (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Edad"
              v-model="reclamante.edadvictima"
            />
          </div>

          <label class="col-5 col-form-label"
            >Discapacidad (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Discapacidad"
              v-model="reclamante.discapavictima"
            />
          </div>

          <label class="col-5 col-form-label"
            >Estrato (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Estrato"
              v-model="reclamante.estravictima"
            />
          </div>

          <label class="col-5 col-form-label"
            >Embarazo (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Embarazo"
              v-model="reclamante.embaravictima"
            />
          </div>

          <label class="col-5 col-form-label"
            >Grupo Etnico (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Grupo Etnico"
              v-model="reclamante.grupetnicovictima"
            />
          </div>

          <label class="col-5 col-form-label"
            >Entidad o persona que reclama (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Entidad o persona que reclama"
              v-model="reclamante.persoentidreclama"
            />
          </div>

          <label class="col-5 col-form-label"
            >Cedula (*)</label
          >
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Cedula"
              v-model="reclamante.persona.cedula"
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
            :disabled="!isFormValidPersona()"
          >
            Buscar
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
        <div class="row">
          <div class="card-body col"></div>
        </div>
        <!--modal para editar -->
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
                  Editar Reclamante
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
                <label class="col-5 col-form-label">Enfoque diferencial</label>
                <input
                  placeholder="enfoque diferencial"
                  v-model="reclamante.enfodifervictima"
                />

                <label class="col-5 col-form-label">Genero</label>
                <input placeholder="genero" v-model="reclamante.genevictima" />

                <label class="col-5 col-form-label">Edad</label>
                <input placeholder="edad" v-model="reclamante.edadvictima" />

                <label class="col-5 col-form-label">Discapacidad</label>
                <input
                  placeholder="discapacidad"
                  v-model="reclamante.discapavictima"
                />

                <label class="col-5 col-form-label">Estrato</label>
                <input
                  placeholder="estrato"
                  v-model="reclamante.estravictima"
                />

                <label class="col-5 col-form-label">Embarazo</label>
                <input
                  placeholder="embarazo"
                  v-model="reclamante.embaravictima"
                />

                <label class="col-5 col-form-label">Grupo Etnico</label>
                <input
                  placeholder="grupo etnico"
                  v-model="reclamante.grupetnicovictima"
                />

                <label class="col-5 col-form-label">Entidad que reclama</label>
                <input
                  placeholder="entidad"
                  v-model="reclamante.persoentidreclama"
                />

                <label class="col-5 col-form-label">Cedula</label>
                <input
                  placeholder="cedula"
                  v-model="reclamante.persona.cedula"
                />
                <div class="col-6 form-group" v-if="true">
                  <button
                    class="btn btn-primary btn-block"
                    data-toggle="modal"
                    data-target="#buscarModal"
                    @click="buscar()"
                    :disabled="!isFormValidPersona()"
                  >
                    Buscar
                  </button>
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
        <!--cierro modal de editar -->
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
                <label class="col-5 col-form-label">Primer nombre</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder=" Primer Nombre"
                    v-model="reclamante.persona.prinom"
                  />
                </div>

                <label class="col-5 col-form-label">Segundo nombre</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Segundo nombre"
                    v-model="reclamante.persona.segnom"
                  />
                </div>

                <label class="col-5 col-form-label">Primer apellido</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Primer apellido"
                    v-model="reclamante.persona.priape"
                  />
                </div>

                <label class="col-5 col-form-label">Segundo apellido</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Segundo apellido"
                    v-model="reclamante.persona.segape"
                  />
                </div>

                <label class="col-5 col-form-label">Cedula</label>
                <div class="col-6 form-group">
                  <input
                    class="form-control"
                    placeholder="Cedula"
                    v-model="reclamante.persona.cedula"
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

      esta: false,
      estado: "disable",
      reclamantess: [],

      errors: [],
    };
  },
  methods: {
    buscar() {
      axios
        .get("/api/persona/" + this.reclamante.persona.cedula)
        .then((res) => {
          if (res.data[0] == null) {
            this.reclamante.persona.cedula = "";
            this.reclamante.persona.prinom = "";
            console.log(this.reclamante.persona.cedula);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.reclamante.persona = person;
            this.esta = true;
          }
        });
    },

    isFormValidPersona: function () {
      return this.reclamante.persona.cedula != "";
    },

    agregar() {
      if (
        !this.reclamante.enfodifervictima ||
        !this.reclamante.genevictima ||
        !this.reclamante.edadvictima ||
        !this.reclamante.discapavictima ||
        !this.reclamante.estravictima ||
        !this.reclamante.embaravictima ||
        !this.reclamante.grupetnicovictima ||
        !this.reclamante.persoentidreclama ||
        !this.reclamante.persona.cedula
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
          enfodifervictima: this.reclamante.enfodifervictima,
          genevictima: this.reclamante.genevictima,
          edadvictima: this.reclamante.edadvictima,
          discapavictima: this.reclamante.discapavictima,
          estravictima: this.reclamante.estravictima,
          embaravictima: this.reclamante.embaravictima,
          grupetnicovictima: this.reclamante.grupetnicovictima,
          persoentidreclama: this.reclamante.persoentidreclama,
          per_id: this.reclamante.persona.id,
        };

        this.reclamante.enfodifervictima = "";
        this.reclamante.genevictima = "";
        this.reclamante.edadvictima = "";
        this.reclamante.discapavictima = "";
        this.reclamante.estravictima = "";
        this.reclamante.embaravictima = "";
        this.reclamante.grupetnicovictima = "";
        this.reclamante.persoentidreclama = "";
        this.reclamante.persona.cedula = "";

        axios.post("/api/reclamante", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "El reclamante no se ha registrado con exito",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El reclamante se ha registrado",
              showConfirmButton: false,
            });
          }
          this.reclamantess.push(res.data);
        });
      }
    },
  },
};
</script>