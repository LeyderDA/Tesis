<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">MI USUARIO</h2>
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
                      <th>ID USUARIO</th>
                      <th>NOMBRE DE USUARIO</th>
                      <th>MOSTRAR QR</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user) in areass" :key="user.index">
                    <th>{{user.id}}</th>
                    <td>{{user.username}}</td>
                    <td>
                      <a :href="'/recepcionqr/'+user.id">
                        <i class="fas fa-qrcode"></i>
                      </a>
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
  </div>
  
</template>
<script>
export default {
  data() {
    return {
      user: {
        id: "",
        username: ""
      },
      areass: [],
      //registro: true, //me describe el compartamieto del boton si va a guardar o va a editar
      errors: []
    };
  },
  created() {
    axios.get("/api/miusuario").then(res => {
      this.areass = res.data;
    });
  },
  methods: {
    
  }
};
</script>
