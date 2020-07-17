<template>
  <div class="card">
    <div>
      <h4 class="text-center mb-2 card-title">Registrando Estudiante</h4>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <div class="col-6 form-group">
            <input class="form-control" placeholder="Cedula" v-model="estudiante.persona.cedula" />
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
                      <th>Id estudiante</th>
                      <th>Nombre Persona</th>
                      <th>Apellido Persona</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(estudiante,index) in estudiantess" :key="estudiante.index">
                      <td>{{estudiante.id}}</td>
                      <td>{{estudiante.persona.prinom}}</td>
                      <td>{{estudiante.persona.priape}}</td>

                      <td>   
                        <button class="btn btn-danger btn-sm" @click="eliminar(estudiante,index)">
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
                <input placeholder="Cedula" v-model="estudiante.persona.cedula" />
                <input placeholder="Nombre" v-model="estudiante.persona.prinom" />
                <input placeholder="Nombre" v-model="estudiante.persona.priape" />
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
      estudiante: {
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
        }
      },

      esta: false,
      estado: "disable",
      estudiantess: [],
      errors: []
    };
  },
  created() {
    axios.get("/api/estudiante").then(res => {
      this.estudiantess = res.data;
    });
  },
  methods: {
    buscar() {
      axios.get("/api/persona/" + this.estudiante.persona.cedula).then(res => {
        if (res.data[0] == null) {
          this.estudiante.persona.cedula = "";
          this.estudiante.persona.prinom = "";
          console.log(this.estudiante.persona.cedula);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.estudiante.persona = person;
          this.esta = true;
        }
      });
    },

   agregar() {
      const params = {
        
        per_id: this.estudiante.persona.id
      };
      this.estudiante.per_id = "";

      axios.post("/api/estudiante", params).then(res => {
        if (res.data == null) {
          alert("El Estudiante no se ha registrado con exito");
        } else {
          alert("El Estudiante se ha registrado");
        }
        this.estudiantess.push(res.data);
      });
    },

    eliminar(estudiante, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Estudiante: ${estudiante.persona.prinom}`
      );
      if (confirmacion) {
        axios.delete("/api/estudiante/" + estudiante.id).then(() => {
          this.estudiantess.splice(index, 1);
          alert("El Estudiante se ha eliminado con exito");
        });
      }
    }, 
  }
};
</script>