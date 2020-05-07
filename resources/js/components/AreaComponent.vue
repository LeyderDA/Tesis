<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Modulo Area</div>

          <div class="card-body row">
            <div class="col-6">
              <input
                class="form-control"
                placeholder="nombre del documento"
                v-model="area.nombrearea"
              />
            </div>
            <div class="col-6" v-if="true">
              <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
            </div>
            <br />
            <div class="container">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(area) in areas" :key="area.id">
                    <th>{{area.id}}</th>
                    <td>{{area.nombrearea}}</td>
                    <td>
                      <button class="btn btn-s btn-primary">ojo</button>
                    </td>
                  </tr>
                </tbody>
              </table>
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
      area: {
        id: "",
        nombrearea: ""
      },
      areas: [],
      //registro: true, //me describe el compartamieto del boton si va a guardar o va a editar
      errors: []
    };
  },
  created() {
    axios.get("/api/area").then(res => {
      this.areas = res.data;
    });
  },
  methods: {
    agregar() {
      //alert(this.area.nombrearea);
      const params = { nombrearea: this.area.nombrearea };
      // let ar = { nombrearea: this.area.nombrearea, id: this.area.id };
      this.area.nombrearea = "";

      axios.post("/api/area", params).then(res=>{
                    if(res.data == null){
                        alert('el tipo de documento no se ha registrado con exito')
                    }else{
                        alert('el tipo de documento se ha registrado')
                    }
                    this.areas.push(res.data)
                })

      //this.areas.push(ar);
    }
  }
};
</script>