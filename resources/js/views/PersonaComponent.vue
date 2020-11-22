<template>
 <div class="card" style="margin-top:25px">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Persona</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label">Cédula (*):</label>

          <div class="col-6 form-group">
            <input       
              class="form-control"
              placeholder="Cédula"
              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
              v-model="personas.cedula"            
            />
          </div>

          <label class="col-5 col-form-label">Primer Nombre (*):</label>
          <div class="col-6 form-group">
            <input
             
              class="form-control"
              placeholder="Primer Nombre"
              v-model="personas.prinom"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
               (event.charCode >= 97 && event.charCode <= 122)||
              event.charCode == [241]|| event.charCode == [209]||            
              event.charCode == [32] ||event.charCode == [239])"
            />
          </div>

          <label class="col-5 col-form-label">Segundo Nombre:</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Segundo Nombre"
              v-model="personas.segnom"
               onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
               (event.charCode >= 97 && event.charCode <= 122)||
              event.charCode == [241]|| event.charCode == [209]||            
              event.charCode == [32] ||event.charCode == [239])"
            />
          </div>

          <label class="col-5 col-form-label">Primer Apellido (*):</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Primer Apellido"
              v-model="personas.priape"
               onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                (event.charCode >= 97 && event.charCode <= 122)||
              event.charCode == [241]|| event.charCode == [209]||            
              event.charCode == [32] ||event.charCode == [239])"
            />
          </div>

          <label class="col-5 col-form-label">Segundo Apellido:</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Segundo Apellido"
              v-model="personas.segape"
               onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || 
                (event.charCode >= 97 && event.charCode <= 122)||
              event.charCode == [241]|| event.charCode == [209]||            
              event.charCode == [32] ||event.charCode == [239])"
            />
          </div>

          <label class="col-5 col-form-label">Teléfono (*):</label>

          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Teléfono"
              v-model="personas.tel"
              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
            />
          </div>

          <label class="col-5 col-form-label">Dirección (*):</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              placeholder="Dirección"
              v-model="personas.direc"
            />
          </div>
        </div>
      </form>

      <div class="row justify-content-center col">
        <div class="col-6 form-group" v-if="true">
          <button
           class="btn btn-primary btn-block" 
           @click="agregar()"
          
          
           >
            Guardar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    errors: [];
    return {
      personas: {
        id: "",
        cedula: "",
        prinom: "",
        segnom: "",
        priape: "",
        segape: "",
        tel: "",
        direc: "",
      },
      personass: [],
      errors: [],
    };
  },
  methods: {
    isFormValidCedula: function () {
      return this.personas.cedula = "";
    },
   

    
     
    agregar() {
      if (
        
        !this.personas.cedula ||
        !this.personas.prinom ||
        !this.personas.priape ||
        !this.personas.tel ||
        !this.personas.direc
      ) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios estan marcados de color ROJO",
          showConfirmButton: true,
        });
      } else {
        const params = {
          cedula: this.personas.cedula,
          prinom: this.personas.prinom,
          segnom: this.personas.segnom,
          priape: this.personas.priape,
          segape: this.personas.segape,
          tel: this.personas.tel,
          direc: this.personas.direc,
        };
        this.personas.cedula = "";
        this.personas.prinom = "";
        this.personas.segnom = "";
        this.personas.priape = "";
        this.personas.segape = "";
        this.personas.tel = "";
        this.personas.direc = "";

        axios.post("/api/persona", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "La persona no se ha registrado con exito",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La persona se ha creado y guardado",
              showConfirmButton: false,
            });
          }
          this.personass.push(res.data);
        });
      }
    },
  },
};
</script>