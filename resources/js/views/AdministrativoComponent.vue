<template>
  <div class="card">
    <div>
      <h2 class="text-center mb-2 card-title">Registrando Administrativo</h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Cedula" v-model="administrativo.persona.cedula" />
          </div>
        </div>
      </form>
      <div class="row justify-content-center col">
        <div class="col-6 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModal"
            @click="buscar()"
          >Buscar</button>
        </div>

        <div class="col-6 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
        </div>
      </div>
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Id Administrativo</th>
                      <th>Nombre Persona</th>
                      <th>Apellido Persona</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(administrativo,index) in administrativoss" :key="administrativo.index">
                      <td>{{administrativo.id}}</td>
                      <td>{{administrativo.persona.prinom}}</td>
                      <td>{{administrativo.persona.priape}}</td>

                      <td>   
                        <button class="btn btn-danger btn-sm" @click="eliminar(administrativo,index)">
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

        <!--segundo modal - el de buscar -->
        <div
          class="modal fade"
          id="buscarModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input placeholder="Cedula" v-model="administrativo.persona.cedula" />
                <input placeholder="Nombre" v-model="administrativo.persona.prinom" />
                <input placeholder="Nombre" v-model="administrativo.persona.priape" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      administrativo: {
        id: "",
        per_id: "",

        persona: {
          id: "",
          cedula: "",
          prinom: "",
          segnom: "",
          priape: "",
          segape: "",
          tel: "",
          direc: ""
        },
      },

      esta: false,
      estado: "disable",
      administrativoss: [],
      errors: []
    };
  },
  created() {
    axios.get("/api/administrativo").then(res => {
      this.administrativoss = res.data;
    });
  },
  methods: {
    buscar() {
      axios.get("/api/persona/" + this.administrativo.persona.cedula).then(res => {
        if (res.data[0] == null) {
          this.administrativo.persona.cedula = "";
          this.administrativo.persona.prinom = "";
          console.log(this.administrativo.persona.cedula);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.administrativo.persona = person;
          this.esta = true;
        }
      });
    },

   agregar() {
      const params = {
        
        per_id: this.administrativo.persona.id
      };
      this.administrativo.per_id = "";

      axios.post("/api/administrativo", params).then(res => {
        if (res.data == null) {
          alert("El Administrativo no se ha registrado con exito");
        } else {
          alert("El Administrativo se ha registrado");
        }
        this.administrativoss.push(res.data);
      });
    },

    eliminar(administrativo, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Administrativo: ${administrativo.persona.prinom}`
      );
      if (confirmacion) {
        axios.delete("/api/administrativo/" + administrativo.id).then(() => {
          this.administrativoss.splice(index, 1);
          alert("El Administrativo se ha eliminado con exito");
        });
      }
    }, 
  }
};
</script>