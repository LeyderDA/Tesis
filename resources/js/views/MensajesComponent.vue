<template>
  <div class="card" style="margin-top:25px">
    <div>
      <br />
      <h2 class="text-center mb-2 card-title">Notificaciones</h2>
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
                      <th>Mensaje</th>                     
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(notificaciones, index) in mensajess"
                      :key="notificaciones.index"
                    >
                     
                      <td>{{notificaciones.mensaje}}</td>
                      <td>

                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(notificaciones, index)"
                          title="Eliminar notificación"
                        >
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

        
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      notificaciones: {
        id: "",
        mensajes: "",
       
      },
      mensajess: [],
      errors: [],
    };
  },
  created() {
    axios.get("/api/notificaciones").then((res) => {
      this.mensajess = res.data;
     
    });
  },
  methods: {
    eliminar(notificaciones, index) {
      const confirmacion = confirm(
        `Confirma Eliminar notificacion`
      );
      if (confirmacion) {
        axios.delete("/api/notificaciones/" +  notificaciones.id).then(() => {
          this.mensajess.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La notificación se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
   
    
  },
};
</script>