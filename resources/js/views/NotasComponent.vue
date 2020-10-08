<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Listado de notas</h2>
    </div>
    
    <div class="container">
      <div class="row">
        <div class="card-body col">
          <div class="container row">            
              <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>Cédula</th>
                    <th>Primer Nombre</th> 
                    <th>Segundo Nombre</th> 
                    <th>Primer Apellido</th> 
                    <th>Segundo Apellido</th>    
                    <th>Calificaciones</th>        
                  </tr>
                </thead>
                <tbody>       
                  <tr v-for="(recepcion) in recepcioness" :key="recepcion.index">                                     
                    <td>{{ recepcion.cedula }}</td>
                    <td>{{ recepcion.prinom }}</td>
                    <td>{{ recepcion.segnom }}</td>
                    <td>{{ recepcion.priape }}</td>
                    <td>{{ recepcion.segape }}</td>                   
                    <td>
                       <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#aggnotasmodal"
                        @click="editarForm(recepcion)"
                        title="Mostrar Calificaciónes"
                      >
                       <i class="fas fa-eye fa-2x" style="color: black"></i>                       
                      </button>
                    </td>                
                  </tr> 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
     

       <!--modal de agg NOTAS AL ESTUDIANTE -->
      <div
        class="modal fade"
        id="aggnotasmodal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Agregar Notas
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

          <label class="col-5 col-form-label">Nota primer corte</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Nota primer corte" v-model="recepcion.notpricort" disabled />
          </div>


          <label class="col-5 col-form-label">Nota segundo corte</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Nota segundo corte"
              v-model="recepcion.notsegcort" disabled
            />
          </div>
          <label class="col-5 col-form-label">Nota tercer corte</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Nota tercer corte"
              v-model="recepcion.nottercort" disabled
            />
          </div>
        
             
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
          
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
      <!--modal de agg NOTAS AL ESTUDIANTE -->

    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {

      recepcion: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",
        estado:"",

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
    axios.get("/api/recepcionn").then((res) => {
      this.recepcioness = res.data;
      console.log(this.recepcioness);
    });
    
  },
  methods: {   
   
    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
    },
    
  },
};
</script>