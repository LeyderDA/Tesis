<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Reclamante</h2>
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
                      <th>Enf.Diferencial</th>
                      <th>Genero</th>
                      <th>Edad</th>
                      <th>Discapacidad</th>
                      <th>Estrato</th>
                      <th>Embarazo</th>
                      <th>Grupo Etnico</th>
                      <th>Entidad Reclamante</th>
                      <th>Persona Relacionada</th>
                      <th>Opciones</th>
                       <th>Agregar Archivos</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(reclamante, index) in reclamantess"
                      :key="reclamante.index"
                    >
                      <td>{{ reclamante.enfodifervictima }}</td>
                      <td>{{ reclamante.genevictima }}</td>
                      <td>{{ reclamante.edadvictima }}</td>
                      <td>{{ reclamante.discapavictima }}</td>
                      <td>{{ reclamante.estravictima }}</td>
                      <td>{{ reclamante.embaravictima }}</td>
                      <td>{{ reclamante.grupetnicovictima }}</td>
                      <td>{{ reclamante.persoentidreclama }}</td>

                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#mostrarpersonaModal"
                          @click="editarForm(reclamante, index)"
                          title="Mostrar los datos del Reclamante"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>

                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(reclamante, index)"
                          title="Editar datos del Reclamante"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(reclamante, index)"
                          title="Eliminar Reclamante"
                        >
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#AGGARCH"
                          @click="editarForm(reclamante, index)"
                          title="Agregar archivos"
                        >
                          <i class="fas fa-save fa-2x" style="color: black"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
                <label class="col-12 col-form-label">Enfoque diferencial</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="enfoque diferencial"
                    v-model="reclamante.enfodifervictima"
                  />
                </div>
                <label class="col-12 col-form-label">Genero</label>

<div class="col-12">
            <select
              class="form-control"
              type="text"
              v-model="reclamante.genevictima"
            >
              <option value="">Selecciona</option>
              <option value="M">M</option>
              <option value="F">F</option>
            </select>
          </div>
          <br>
                <label class="col-12 col-form-label">Edad</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="edad"
                    v-model="reclamante.edadvictima"
                  />

                  
                </div>
<label class="col-12 col-form-label">Discapacidad</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="discapacidad"
                    v-model="reclamante.discapavictima"
                  />
                </div>
                <label class="col-12 col-form-label">Estrato</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="estrato"
                    v-model="reclamante.estravictima"
                  />
                </div>
                <label class="col-12 col-form-label">Embarazo</label>

                <div class="col-12">
            <select
              class="form-control"
              type="text"
              v-model="reclamante.embaravictima"
            >
              <option value="">Selecciona</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
          <br />
                <label class="col-12 col-form-label">Grupo Etnico</label>

               
          <div class="col-12">
            <select
              class="form-control"
              type="text"
              v-model="reclamante.grupetnicovictima"
            >
              <option value="">Selecciona</option>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>
          <br />
                <label class="col-12 col-form-label">Entidad que reclama</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="entidad"
                    v-model="reclamante.persoentidreclama"
                  />
                </div>
                <label class="col-12 col-form-label">Cedula</label>

                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="cedula"
                    v-model="reclamante.persona.cedula"
                    disabled
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
                <input
                  placeholder="Nombre"
                  v-model="reclamante.persona.prinom"
                />
                <input
                  placeholder="Cedula"
                  v-model="reclamante.persona.cedula"
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

        <!--segundo modal - mostrar persona -->
        <div
          class="modal fade"
          id="mostrarpersonaModal"
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
                <label class="col-12 col-form-label">Cedula</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Primer nombre"
                    v-model="reclamante.persona.cedula"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">Primer nombre</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Primer nombre"
                    v-model="reclamante.persona.prinom"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Segundo nombre</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Segundo nombre"
                    v-model="reclamante.persona.segnom"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Primer apellido</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Primer apellido"
                    v-model="reclamante.persona.priape"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Segundo apellido</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Segundo apellido"
                    v-model="reclamante.persona.segape"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Teléfono</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Teléfono"
                    v-model="reclamante.persona.tel"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Dirección</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Dirección"
                    v-model="reclamante.persona.direc"
                    disabled
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
        <!--cierro modal de mostrar persona -->
         <!--modal de AGREGAR ARCHIVOS -->
        <div
          class="modal fade"
          id="AGGARCH"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Agregar Archivos
                </h5>
              </div>
              <div class="modal-body">
                <div class="col-12 form-group">
                  <input class="form-control" v-model="reclamante.id" />
                </div>
                <label class="col-12 col-form-label">Agregar Archivos </label>
                <label class="col-12 col-form-label">
                  <i class="fas fa-image fa-2x"></i>
                  <i class="fas fa-file-pdf fa-2x"></i>
                  <i class="fas fa-file-word fa-2x"></i>
                  <i class="fas fa-file-excel fa-2x"></i>
                </label>
                <div class="col-12 form-group">
                  <vue-dropzone
                    ref="myVueDropzone"
                    id="dropzone"
                    :options="dropzoneOptions"
                  ></vue-dropzone>
                </div>

                <div class="col-12 form-group">
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
                      @click="agregarArchivo()"
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
        <!--modal de AGREGAR ARCHIVOS -->
      </div>
    </div>
  </div>
</template>
<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
  components: {
    vueDropzone: vue2Dropzone,
  },
  data() {
    return {
       dropzoneOptions: {
        url: "http://127.0.0.1:8000/api/archivoR",
        thumbnailWidth: 150,
        maxFilesize: 200,
        headers: { "My-Awesome-Header": "header value" },
        autoProcessQueue: false,
      },
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
       archivosReclamantes: {
        archivoRe: "",
        recla_id: "",
      },

      esta: false,
      estado: "disable",
      reclamantess: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/reclamante").then((res) => {
      this.reclamantess = res.data;
    });
  },
  methods: {
    agregarArchivo() {
      if (!this.reclamante.id) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios son necesarios",
          showConfirmButton: true,
        });
      } else {
        this.$refs.myVueDropzone.processQueue();
        let imagen = this.$refs.myVueDropzone.getAcceptedFiles();

        const params = {
          recla_id: this.reclamante.id,
          archivoRe: imagen.length > 0 ? imagen[0].name : "",
        };
       
       

        axios.post("/api/archivoRecla", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "El archivo no se ha agregado con exito",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El archivo se a guardado",
              showConfirmButton: false,
            });
            axios.get("/api/gestion").then((res) => {
              this.gestioness = res.data;
            });
          }
        });
      }
    },
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
    agregar() {
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
      this.reclamante.per_id = "";

      axios.post("/api/reclamante", params).then((res) => {
        if (res.data == null) {
          swal({
            type: "error",
            timer: 3000,
            title: "PARECE QUE HAY UN ERROR",
            text: "El reclamante NO se ha registrado con exito",
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
    },

    eliminar(reclamante, index) {
      const confirmacion = confirm(
        `Confirma Eliminar al reclamante: ${reclamante.persona.prinom}`
      );
      if (confirmacion) {
        axios.delete("/api/reclamante/" + reclamante.id).then(() => {
          this.reclamantess.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "El Reclamante se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
    editarForm(reclamante, index) {
      this.reclamante = reclamante;
      this.reclamante.index = index;
    },
    editar() {
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
      axios
        .put("/api/reclamante/" + this.reclamante.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "El Reclamante no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El Reclamante se ha actualizado",
              showConfirmButton: false,
            });
          }
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.id[0]);
          }
        });
    },
  },
};
</script>