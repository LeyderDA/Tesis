<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Recepcion</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label">Escoge el area</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Area" v-model="recepcion.area.nombre" />
          </div>

          <label class="col-5 col-form-label">Fecha radicado</label>

          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de radicado"
              v-model="recepcion.fecharadicado"
            />
          </div>

          <label class="col-5 col-form-label">Fecha recepcionado</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha recepcionado"
              v-model="recepcion.fecharecepcionado"
            />
          </div>

          <label class="col-5 col-form-label">Fecha reparto</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha reparto"
              v-model="recepcion.fechareparto"
            />
          </div>

          <label class="col-5 col-form-label">Fecha de publicación</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de publicación"
              v-model="recepcion.fechapublicacion"
            />
          </div>

          <label class="col-5 col-form-label">Fecha de retiro</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              placeholder="Fecha de retiro"
              v-model="recepcion.fecharetiro"
            />
          </div>

          <label class="col-5 col-form-label">Recepcionado en</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Recepcionado en"
              v-model="recepcion.recepcionado"
            />
          </div>

          <label class="col-5 col-form-label">Consultorio</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Consultorio" v-model="recepcion.consultorio" />
          </div>


          <label class="col-5 col-form-label">Ingresa el ID del reclamante</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Reclamante" v-model="recepcion.reclamante.id" />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <!--buscar area -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalarea"
            @click="buscararea()"
          >Buscar Area</button>
        </div>
        <!--buscar area -->

       

        <!--buscar reclamante -->
        <div class="col-2 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalrecl"
            @click="buscarrecl()"
          >B.Reclamante</button>
        </div>
        <!--buscar recepcionador -->

        <div class="col-6 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
        </div>
      </div>
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div class="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Fecha de Radicado</th>
                      <th>Fecha de Recepcionado</th>
                      <th>Fecha de Reparto</th>
                      <th>Fecha de Publicación</th>
                      <th>Fecha de Retiro</th>
                      <th>Recepcionado en</th>
                      <th>Consultorio</th>
                      <th>Reclamante</th>
                      <th>Area</th>
                      
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(recepcion,index) in recepcioness" :key="recepcion.index">
                      <td> {{recepcion.id}}</td>
                      <td>{{recepcion.fecharadicado}}</td>
                      <td>{{recepcion.fecharecepcionado}}</td>
                      <td>{{recepcion.fechareparto}}</td>
                      <td>{{recepcion.fechapublicacion}}</td>
                      <td>{{recepcion.fecharetiro}}</td>
                      <td>{{recepcion.recepcionado}}</td>
                      <td>{{recepcion.consultorio}}</td>
                      <td>{{recepcion.reclamante.id}}</td>
                      <td>{{recepcion.area.nombre}}</td>      
                     <!-- <td>
                       <qr-code size="150" text="recepcion.id"></qr-code>
                      </td> -->
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(recepcion,index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(recepcion,index)">
                          <i class="fas fa-trash-alt"></i>
                        </button>

                       <!-- <button class="btn btn-sm" @click="qr(recepcion)">
                          <i class="fa fa-check-circle verde"></i>
                        </button>-->
                        
                        <a :href="'/recepcionqr/'+recepcion.id">hiii</a>

                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--modal de editar -->
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Recepción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">Fecha de radicado</label>
                <input placeholder="recepcion" type="date" v-model="recepcion.fecharadicado" />

                <label class="col-5 col-form-label">Fecha de recepcionado</label>
                <input placeholder="recepcion" type="date" v-model="recepcion.fecharecepcionado" />

                <label class="col-5 col-form-label">Fecha de reparto</label>
                <input placeholder="recepcion" type="date" v-model="recepcion.fechareparto" />

                <label class="col-5 col-form-label">Fecha de publicación</label>
                <input placeholder="recepcion" type="date" v-model="recepcion.fechapublicacion" />

                <label class="col-5 col-form-label">Fecha de retiro</label>
                <input placeholder="recepcion" type="date" v-model="recepcion.fecharetiro" />

                <label class="col-5 col-form-label">Recepcionado en</label>
                <input placeholder="recepcion" v-model="recepcion.recepcionado" />

                <label class="col-5 col-form-label">Consultorio</label>
                <input placeholder="recepcion" v-model="recepcion.consultorio" />


                <label class="col-5 col-form-label">ID Reclamante</label>
                <input placeholder="recepcion" v-model="recepcion.reclamante.id" />

                <!--buscar reclamante -->
                <div class="col-5 form-group" v-if="true">
                  <button
                    class="btn btn-primary btn-block"
                    data-toggle="modal"
                    data-target="#buscarModalrecl"
                    @click="buscarrecl()"
                  >B.Reclamante</button>
                </div>
                <!--buscar reclamante -->

                <label class="col-5 col-form-label">Area</label>
                <input placeholder="recepcion" v-model="recepcion.area.nombre" />

                <!--buscar area -->
                <div class="col-5 form-group" v-if="true">
                  <button
                    class="btn btn-primary btn-block"
                    data-toggle="modal"
                    data-target="#buscarModalarea"
                    @click="buscararea()"
                  >Buscar Area</button>
                </div>
                <!--buscar area -->
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
        <!--modal de editar -->

        <!--modal de area -->
        <div
          class="modal fade"
          id="buscarModalarea"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Id" v-model="recepcion.area.id" />
                <input placeholder="Nombre" v-model="recepcion.area.nombre" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de area -->

        <!--modal - el de buscar reclamante -->
        <div
          class="modal fade"
          id="buscarModalrecl"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Id Docente" v-model="recepcion.reclamante.id" />
                <input placeholder="Id Persona" v-model="recepcion.reclamante.per_id" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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

      recepcion: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",

        reclamante: {
          id: "",
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
    };
  },
  created() {
    axios.get("/api/recepcionSUPER").then((res) => {
      this.recepcioness = res.data;
    });
  },
  methods: {
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
      const params = {
        recepcionado: this.recepcion.recepcionado,
        fecharadicado: this.recepcion.fecharadicado,
        fecharecepcionado: this.recepcion.fecharecepcionado,
        consultorio: this.recepcion.consultorio,
        fechareparto: this.recepcion.fechareparto,
        fechapublicacion: this.recepcion.fechapublicacion,
        fecharetiro: this.recepcion.fecharetiro,
        recla_id: this.recepcion.reclamante.id,
        area_id: this.recepcion.area.id,
      };
      this.recepcion.recepcionado = "";
      this.recepcion.fecharadicado = "";
      this.recepcion.fecharecepcionado = "";
      this.recepcion.consultorio = "";
      this.recepcion.fechareparto = "";
      this.recepcion.fechapublicacion = "";
      this.recepcion.fecharetiro = "";
      this.recepcion.reclamante = "";
      this.recepcion.area = "";

      axios.post("/api/recepcion", params).then((res) => {
        if (res.data == null) {
          alert("La recepcion No se registro porque tiene errores");
        } else {
          alert("La recepción se ha registrado con EXITO");
        }
        this.recepcioness.push(res.data);
      });
    },

    eliminar(recepcion, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Recepcion del area de: ${recepcion.area.nombre}`
      );
      if (confirmacion) {
        axios.delete("/api/recepcion/" + recepcion.id).then(() => {
          this.recepcioness.splice(index, 1);
          alert("La recepción se ha eliminado con exito");
        });
      }
    },
    qr(recepcion) {
        windows.location.href("/recepcionqr/" + recepcion.id);
        //this.$router.push("/recepcionqr/" + recepcion.id);
        //axios.get("/api/recepcionqr/" + recepcion.id);
        //alert("hiii");
    },
    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
    },
    editar() {
      const params = {
        recepcionado: this.recepcion.recepcionado,
        fecharadicado: this.recepcion.fecharadicado,
        fecharecepcionado: this.recepcion.fecharecepcionado,
        consultorio: this.recepcion.consultorio,
        fechareparto: this.recepcion.fechareparto,
        fechapublicacion: this.recepcion.fechapublicacion,
        fecharetiro: this.recepcion.fecharetiro,
        recla_id: this.recepcion.reclamante.id,
        area_id: this.recepcion.area.id,
      };
      axios
        .put("/api/recepcion/" + this.recepcion.id, params)
        .then((res) => {
          if (res.data == null) {
            alert("La recepcion no se ha actualizado");
          } else {
            alert("La Recepción se ha actualizado");
          }

          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.recepcionado = "";
          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.fecharadicado = "";
          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.fecharecepcionado = "";
          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.consultorio = "";
          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.fechareparto = "";
          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.fechapublicacion = "";
          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.fecharetiro = "";
          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.reclamante = "";
          this.recepcioness[this.recepcion.index] = res.data;
          this.recepcion.area = "";
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.recepcionado[0]);
          }
        });
    },
  },
};
</script>