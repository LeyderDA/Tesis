<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Modulo Area</div>
          <div class="card-body row">
            <label class="col-5 col-form-label">Nombre del area</label>
            <div class="col-6">
              <input
                class="form-control"
                placeholder="nombre del area"
                v-model="areas.nombre"
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
                  <tr v-for="(areas,index) in areass" :key="areas.index">
                    <th>{{areas.id}}</th>
                    <td>{{areas.nombre}}</td>
                    <td>
                      <button class="btn btn-success btn-sm"  data-toggle="modal" data-target="#editarModal" @click="editarForm(areas,index)">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                      <button class="btn btn-danger btn-sm" @click="eliminar(areas,index)">
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
    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <label class="col-5 col-form-label">Nombre del area</label>
        <input
                class="form-control"
                placeholder="nombre del Area"
                v-model="areas.nombre"
              />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="editar()" data-dismiss="modal">Guardar Cambios</button>
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
      areas: {
        id: "",
        nombre: ""
      },
      areass: [],
      //registro: true, //me describe el compartamieto del boton si va a guardar o va a editar
      errors: []
    };
  },
  created() {
    axios.get("/api/area").then(res => {
      this.areass = res.data;
    });
  },
  methods: {
    agregar() {
      //alert(this.area.nombrearea);
      const params = { nombre: this.areas.nombre };
      // let ar = { nombrearea: this.area.nombrearea, id: this.area.id };
      this.areas.nombre = "";

      axios.post("/api/area", params).then(res => {
        if (res.data == null) {
          alert("el tipo de documento no se ha registrado con exito");
        } else {
          alert("el tipo de documento se ha registrado");
        }
        this.areass.push(res.data);
      });

      //this.areas.push(ar);
    },

    eliminar(areas, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Area: ${areas.nombre}`
      );
      if (confirmacion) {
        axios.delete("/api/area/" + areas.id).then(() => {
          this.areass.splice(index, 1);
          alert("el area se ha eliminado con exito");
        });
      }
    },
    editarForm(areas,index){
        this.areas=areas;
        this.areas.index=index;
    },
    editar() {
      const params = { nombre: this.areas.nombre };
       axios.put("/api/area/" + this.areas.id, params)
       .then(res => {
          if (res.data == null) {
            alert("el area no se ha actualizado");
          } else {
            alert("el area se ha actualizado");
          }
          //alert(this.area.index)
          this.areass[this.areas.index] = res.data;
          this.areas.nombre='';
          //this.$refs.editarModal.modal('dispose');
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.nombre[0]);
          }
        });
    }
  }
};
</script>