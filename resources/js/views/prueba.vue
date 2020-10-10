<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Recepcionista</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="card-body col">
          <div class="container row">
            
            <div class="table text-center table-reponsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    
                    <th>Recepcionista</th>

                  </tr>
                </thead>
                <tbody>
                  <tr v-for="usurecep in recepcioness" :key="usurecep.index">
                   
                


                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalRECEP"
                        
                        title="Mostrar recepcionista"
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
          
       <!--modal de MOSTRAR EL RECEPCIONISTA-->
      <div
        class="modal fade"
        id="MOSTRARModalRECEP"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
               Buscar Recepcionador
              </h5>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">Recepcion:</label>
              <input
                placeholder="id recep"
                v-model="usurecep.id"
               
              />
                     <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalRE"
                        @click="buscarrecep()"
                        title="Mostrar recepcionista"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>

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
      <!--modal de MOSTRAR EL RECE -->
      <div
        class="modal fade"
        id="MOSTRARModalRE"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Datos del Recepcionista
              </h5>
            </div>
            <div class="modal-body">
              <label class="col-5 col-form-label">nombre:</label>
              <input
                placeholder="nombre de persona"
                v-model="usurecep.usuario.persona.prinom"
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
      <!--modal de MOSTRAR EL RECEP -->
          
    </div>
  </div>
</template>

<script >
export default {
  data() {
    return {
      usurecep: {
          id: "",
         usuario: {
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
      },
     

     
    
   
       

      esta: false,
      estado: "disable",
      recepcioness: [],
      errors: [],
    };
  },
  created() {
    axios.get("/api/recepcionest").then((res) => {
      this.recepcioness = res.data;
     
    });
  },
  methods: {


    buscarrecep() {
      axios.get("/api/recepcionRE/" + this.usurecep.id)
        .then((res) => {
          if (res.data[0] == null) {
            console.log(res.data[0]);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.usurecep.usuario.persona = person;
            this.esta = true;
            
          }
        });
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


  },
};
</script>