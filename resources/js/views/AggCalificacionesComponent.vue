<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Recepciones</h2>
    </div>
    <label class="col-5 col-form-label">Busca por QR</label>
    <a :href="'/qr'">
      <i class="fas fa-search  fa-3x" style="color: black;"></i>
    </a>
    <div class="container">
      <div class="row">
        <div class="card-body col">
          <div class="container row">            
              <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>

                    <th>Recepcionado en</th>
                    <th>Consultorio</th>
                    
                  </tr>
                </thead>
                <tbody>       
                  <tr v-for="(recepcion) in recepcioness" :key="recepcion.index">                        
                    
                    <td>{{ recepcion.recepcionado }}</td>
                    <td>{{ recepcion.consultorio }}</td>
 
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
     

      <!--modal de MOSTRAR EL RESTO DE CAMPOS-->
      <div
        class="modal fade"
        id="MOSTRARModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">FECHAS</h5>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">Fecha de radicado:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fecharadicado"
                disabled
              />

              <label class="col-5 col-form-label">Fecha de recepcionado:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fecharecepcionado"
                disabled
              />

              <label class="col-5 col-form-label">Fecha de reparto:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fechareparto"
                disabled
              />

              <label class="col-5 col-form-label">Fecha de publicación:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fechapublicacion"
                disabled
              />

              <label class="col-5 col-form-label">Fecha de retiro:</label>
              <input
                placeholder="recepcion"
                type="date"
                readonly="readonly"
                v-model="recepcion.fecharetiro"
                disabled
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
      <!--modal de MOSTRAR EL RESTO DE CAMPOS -->

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

            <label class="col-5 col-form-label">Id Recepción</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Recepción" v-model="recepcion.id" disabled />
          </div>


          <label class="col-5 col-form-label">Nota primer corte</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Nota primer corte" v-model="notas.notapricort" />
          </div>


          <label class="col-5 col-form-label">Nota segundo corte</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Nota segundo corte"
              v-model="notas.notasegcort"
            />
          </div>
          <label class="col-5 col-form-label">Nota tercer corte</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Nota tercer corte"
              v-model="notas.notateracort"
            />
          </div>
        
             
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                @click="limpiar()"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>

              <button
                type="button"
                class="btn btn-primary"
                @click="agregarNOTAS()"
                data-dismiss="modal"
              >
                Guardar Cambios
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
       notas: {
        
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
    agregarNOTAS() {
      const params = {
        notapricort: this.notas.notapricort,
        notasegcort: this.notas.notasegcort,
        notateracort: this.notas.notateracort,
        recp_id: this.recepcion.id,
      };
      axios.post("/api/notas", params).then((res) => {
        if (res.data == null) {
          alert("La nota no se ha registrado con exito");
        } else {
          alert("La nota se ha registrado");
        }
      });
    },
      limpiar(){

},
    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
    },
  },
};
</script>