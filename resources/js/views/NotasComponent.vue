<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Listado de Notas</h2>
    </div>
    <div class="card-body row">

      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Area</th>
                      <th>Recepcion</th>
                      <th>Estudiante</th>
                      <th>Primer Corte</th>
                      <th>Segundo Corte</th>
                      <th>Tercer Corte</th>           
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(notas,index) in notass" :key="notas.index"> 
                        <td>{{notas.nombre}}</td>
                        <td>  
                          <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalRecp"
                        @click="editarForm(notas, index)"
                        title="Mostrar Recepción"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                      </td> 
                      <td>  
                          <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalEstudiante"
                        @click="editarForm(notas, index)"
                        title="Mostrar Estudiante"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>                     
                      </td>                   
                        <td>{{notas.notapricort}}</td>
                        <td>{{notas.notasegcort}}</td>
                        <td>{{notas.notateracort}}</td>                    
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(notas)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(notas,index)">
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Notas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">Nota primer corte</label>
                  <input placeholder="Nota primer corte" v-model="notas.notapricort" />

                  <label class="col-5 col-form-label">Nota segundo corte</label>
                  <input  placeholder="Nota segundo corte" v-model="notas.notasegcort" />

                  <label class="col-5 col-form-label">Nota tercer corte</label>
                  <input  placeholder="Nota tercer corte" v-model="notas.notateracort" />    
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
         <!--segundo modal-->
         <!--modal de MOSTRAR recepcion-->
      <div
        class="modal fade"
        id="MOSTRARModalRecp"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Recepción</h5>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">Estado</label>
              <div class="col-6">
                <select
                  class="form-control"
                  placeholder="Estado"
                  type="boolean"
                  v-model="notas.estado" disabled
                >
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>

              <label class="col-5 col-form-label">Fecha de radicado:</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="notas.fecharadicado" disabled
              />

              <label class="col-5 col-form-label">Fecha de recepcionado:</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="notas.fecharecepcionado" disabled
              />

              <label class="col-5 col-form-label">Fecha de reparto:</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="notas.fechareparto" disabled
              />

              <label class="col-5 col-form-label">Fecha de publicación:</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="notas.fechapublicacion" disabled
              />

              <label class="col-5 col-form-label">Fecha de retiro</label>
              <input
                placeholder="recepcion"
                type="date"
                v-model="notas.fecharetiro" disabled
              />

              <label class="col-5 col-form-label">Recepcionado en:</label>
              <input placeholder="recepcion" v-model="notas.recepcionado" disabled />

              <label class="col-5 col-form-label">Consultorio:</label>
              <input placeholder="recepcion" v-model="notas.consultorio" disabled />

              <label class="col-5 col-form-label">Area:</label>
              <input placeholder="recepcion" v-model="notas.nombre" disabled />

              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR recepcion -->


      <!--modal de MOSTRAR estudiante-->
      <div
        class="modal fade"
        id="MOSTRARModalEstudiante"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Recepción</h5>
            </div>
            <div class="modal-body">
              
            <label class="col-5 col-form-label">Cédula:</label>
              <input
                placeholder="recepcion"

                v-model="notas.cedula" disabled
              />

              <label class="col-5 col-form-label">Primer Nombre:</label>
              <input
                placeholder="recepcion"

                v-model="notas.prinom" disabled
              />

              <label class="col-5 col-form-label">Segundo Nombre:</label>
              <input
                placeholder="recepcion"

                v-model="notas.segnom" disabled
              />

              <label class="col-5 col-form-label">Primer Apellido:</label>
              <input
                placeholder="recepcion"
                v-model="notas.priape" disabled
              />

              <label class="col-5 col-form-label">Segundo Apellido:</label>
              <input
                placeholder="recepcion"

                v-model="notas.segape" disabled
              />

              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR estudiante -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
       notas: {
        id: "",
        notapricort: "",
        notasegcort: "",
        notateracort: "",
        usu_id: "",

        user: {
          id: "",
          username: "",
          email: "",
          email_verified_at: "",
          password: "",
          rol_id: "",
          per_id: "",         
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
        },
    },

      esta: false,
      estado: "disable",
      notass: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/notas").then((res) => {
      this.notass = res.data;
      console.log(this.notass);
    });
  },
  methods: {

    eliminar(notas, index) {
      const confirmacion = confirm(`Confirma Eliminar Fila de Notas: ${notas.id}`);
      if (confirmacion) {
        axios.delete("/api/notas/" + notas.id).then(() => {
          this.notass.splice(index, 1);
          alert("Las Notas se han eliminado con exito");
        });
      }
  },
    editarForm(notas, index) {
      this.notas = notas;
      this.notas.index = index;
    },
    editar() {
      const params = {            
        notapricort: this.notas.notapricort,
        notasegcort: this.notas.notasegcort,
        notateracort: this.notas.notateracort
      };
      axios
        .put("/api/notas/" + this.notas.id, params)
        .then((res) => {
          
          if (res.data == null) {
            alert("Las notas no se han actualizado");
          } else {
            alert("Las notas se han actualizado con EXITO");
          }
axios.get("/api/notas").then((res) => {
      this.notass = res.data;
      console.log(this.notass);
    });
         
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