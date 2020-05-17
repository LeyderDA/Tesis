<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Modulo Persona</div>

          <div class="card-body row">
            <div class="col-6">
              <input class="form-control" placeholder="primer nombre" v-model="personas.prinom" />
              <input class="form-control" placeholder="segundo nombre" v-model="personas.segnom" />
              <input class="form-control" placeholder="primer apellido" v-model="personas.priape" />
              <input class="form-control" placeholder="segundo apellido" v-model="personas.segape" />
              <input class="form-control" placeholder="Teléfono" v-model="personas.tel" />
              <input class="form-control" placeholder="Dirección" v-model="personas.direc" />
            </div>
            <div class="col-6" v-if="true">
              <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
            </div>
            <br />
            <div class="container">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Cod.Usuario</th>
                    <th scope="col">Primer nombre</th>
                    <th scope="col">segundo nombre</th>
                    <th scope="col">Primer apellido</th>
                    <th scope="col">segundo apellido</th>
                    <th scope="col">teléfono</th>
                    <th scope="col">dirección</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(personas,index) in personass" :key="personas.index">
                    <td>{{personas.id}}</td>
                    <td>{{personas.prinom}}</td>
                    <td>{{personas.segnom}}</td>
                    <td>{{personas.priape}}</td>
                    <td>{{personas.segape}}</td>
                    <td>{{personas.tel}}</td>
                    <td>{{personas.direc}}</td>
                    <td>
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#editarModal"
                        @click="editarForm(personas,index)"
                      >
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                      <button class="btn btn-danger btn-sm" @click="eliminar(personas,index)">
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
            <h5 class="modal-title" id="exampleModalLabel">Editar Persona</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input placeholder="Primer nombre" v-model="personas.prinom" />
            <input placeholder="Segundo nombre" v-model="personas.segnom" />
            <input placeholder="Primer apellido" v-model="personas.priape" />
            <input placeholder="Segundo apellido" v-model="personas.segape" />
            <input placeholder="Teléfono" v-model="personas.tel" />
            <input placeholder="Dirección" v-model="personas.direc" />
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
</template>
<script>
export default {
  data() {
    return {
      personas: {
        id: "",
        prinom: "",
        segnom: "",
        priape: "",
        segape: "",
        tel: "",
        direc: ""
      },
       personass: [],
      //registro: true, //me describe el compartamieto del boton si va a guardar o va a editar
      errors: []
      };
  },
  created() {
    axios.get("/api/persona").then(res => {
      this.personass = res.data;
    });
  },
  methods: {
    agregar() {
     // alert(this.personas.prinom);
     const params = { 
      prinom: this.personas.prinom,
      segnom: this.personas.segnom,
      priape: this.personas.priape,
      segape: this.personas.segape,
      tel: this.personas.tel,
      direc: this.personas.direc
      };
      this.personas.prinom = "";
      this.personas.segnom = "";
      this.personas.priape = "";
      this.personas.segape = "";
      this.personas.tel = "";
      this.personas.direc = "";

      axios.post("/api/persona", params).then(res => {
        if (res.data == null) {
          alert("La persona no se ha registrado con exito");
        } else {
          alert("La persona se ha registrado");
        }
        this.personass.push(res.data);
      });

    
    },

    eliminar(personas, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Persona: ${personas.prinom}`
      );
      if (confirmacion) {
        axios.delete("/api/persona/" + personas.id).then(() => {
          this.personass.splice(index, 1);
          alert("La persona se ha eliminado con exito");
        });
      }
    },
    editarForm(personas, index) {
      this.personas = personas;
      this.personas.index = index;
    },
    editar() {
      const params = { 
      prinom: this.personas.prinom ,
      segnom: this.personas.segnom,
      priape: this.personas.priape,
      segape: this.personas.segape,
      tel: this.personas.tel,
      direc: this.personas.direc
      };
      axios
        .put("/api/persona/" + this.personas.id, params)
        .then(res => {
          if (res.data == null) {
            alert("La persona no se ha actualizado");
          } else {
            alert("La persona se ha actualizado");
          }
          //alert(this.area.index)
          this.personass[this.personas.index] = res.data;
          this.personas.id = "";

          this.personass[this.personas.index] = res.data;
          this.personas.prinom = "";

          this.personass[this.personas.index] = res.data;
          this.personas.segnom = "";

          this.personass[this.personas.index] = res.data;
          this.personas.priape = "";

          this.personass[this.personas.index] = res.data;
          this.personas.segape = "";

           this.personass[this.personas.index] = res.data;
          this.personas.tel = "";

          this.personass[this.personas.index] = res.data;
          this.personas.direc = "";
          //this.$refs.editarModal.modal('dispose');
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.id[0]);
            alert(this.errors.prinom[0]);
            alert(this.errors.segnom[0]);
            alert(this.errors.priape[0]);
            alert(this.errors.segape[0]);
            alert(this.errors.tel[0]);
            alert(this.errors.direc[0]);
          }
        });
    }
  }
};
</script>