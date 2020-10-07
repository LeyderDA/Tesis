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

                      <th>Primer Corte</th>
                      <th>Segundo Corte</th>
                      <th>Tercer Corte</th>           
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(notas,index) in notass" :key="notas.index">

                        
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