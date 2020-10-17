<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Persona</h2>
    </div>
    <div class="card-body row">
      <form action="" v-on:submit.prevent="agregar">
        <div class="row">
          <label class="col-5 col-form-label">Cédula:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Cédula" v-model="personas.cedula" />
          </div>

          <label class="col-5 col-form-label">Primer Nombre:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Primer Nombre" v-model="personas.prinom" />
          </div>

          <label class="col-5 col-form-label">Segundo Nombre:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Segundo Nombre" v-model="personas.segnom" />
          </div>

          <label class="col-5 col-form-label">Primer Apellido:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Primer Apellido" v-model="personas.priape" />
          </div>

          <label class="col-5 col-form-label">Segundo Apellido:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Segundo Apellido" v-model="personas.segape" />
          </div>

          <label class="col-5 col-form-label">Teléfono:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Teléfono" v-model="personas.tel" />
          </div>

          <label class="col-5 col-form-label">Dirección:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Dirección" v-model="personas.direc" />
          </div>
        </div>
      </form>
      <ul>
        <li v-for="error in errors" :key="error">{{error}}</li>
      </ul>
      <div class="row justify-content-center col">
        <div class="col-6 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
        </div>
      </div>
    </div>
  </div>  
</template>
<script>
export default {
  data() {
    errors: []
    return {
      personas: {
        id: "",
        cedula: "",
        prinom: "",
        segnom: "",
        priape: "",
        segape: "",
        tel: "",
        direc: ""
      },
      personass: [],
      errors: []
    };
  },
  methods: {
    agregar() {
      if(!this.personas.cedula){
        this.errors.push('LA CEDULA ES OBLIGARORIA')
      }
      if(!this.personas.prinom){
        this.errors.push('EL PRIMER NOMBRE ES OBLIGARORIO')
      }
      if(!this.personas.priape){
        this.errors.push('EL PRIMER APELLIDO ES OBLIGATORIO')
      }
      if(!this.personas.tel){
        this.errors.push('EL TELEFONO ES OBLIGATORIO')
      }
      if(!this.personas.direc){
        this.errors.push('LA DIRECCIÓN ES OBLIGATORIA')
      }else{
            const params = {
        cedula: this.personas.cedula,
        prinom: this.personas.prinom,
        segnom: this.personas.segnom,
        priape: this.personas.priape,
        segape: this.personas.segape,
        tel: this.personas.tel,
        direc: this.personas.direc
      };
      this.personas.cedula = "";
      this.personas.prinom = "";
      this.personas.segnom = "";
      this.personas.priape = "";
      this.personas.segape = "";
      this.personas.tel = "";
      this.personas.direc = "";

      axios.post("/api/persona", params).then(res => {
        if (res.data == null) {
           swal({
            type: 'error',
            "timer":3000,
            "title":"PARECE QUE HAY UN ERROR",
            "text":"La persona no se ha registrado con exito",
            "showConfirmButton":false
             });
        } else {
            swal({
            type: 'success',
            "timer":3000,
            "title":"EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            "text":"La persona se ha creado y guardado",
            "showConfirmButton":false
             });
        }
        this.personass.push(res.data);
      });
      }
    },
  }
};
</script>