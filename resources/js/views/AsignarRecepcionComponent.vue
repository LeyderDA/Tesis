<template>
  <div class="card">
    <div>
      <h1 class="text-center mb-2 card-title">Registrando Asignación</h1>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label">RECEPCIÓN:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="ID RECEPCION" v-model="usurecep.recepcion.id" />
          </div>
            <label class="col-5 col-form-label">USUARIO:</label>
          <div class="col-6 form-group">
            <input class="form-control" placeholder="USUARIO" v-model="usuario.persona.cedula" />
          </div>

        </div>
      </form>
      <div class="row justify-content-center col">
        <div class="col-12 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalRE"
            @click="buscarrecep()"  :disabled="!isFormValidrecepcion()"
          >Buscar Recepción</button>
        </div>

        <div class="col-12 form-group" v-if="true">
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#buscarModalUSU"
            @click="buscarusuced()" :disabled="!isFormValidusuario()"
          >Buscar Usuario</button>
        </div>

        <div class="col-12 form-group" v-if="true">
          <button class="btn btn-primary btn-block" @click="agregar()">Guardar</button>
        </div>
        </div>
        <br />


        <!--segundo modal - el de buscar RECEPCION-->
        <div
          class="modal fade"
          id="buscarModalRE"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Recepción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                 <label class="col-5 col-form-label">RELLENAR</label>
                <input placeholder="ID" v-model="usurecep.recepcion.id" />

                <label class="col-5 col-form-label">RECEPCIONADO</label>
                <input placeholder="RECEPCIONADO" v-model="usurecep.recepcion.recepcionado" />

                <label class="col-5 col-form-label">FECHA DE RADICADO</label>
                <input placeholder="FECHA DE RADICADO" v-model="usurecep.recepcion.fecharadicado" />

                <label class="col-5 col-form-label">FECHA DE RECEPCIONADO</label>
                <input placeholder="FECHA DE RECEPCIONADO" v-model="usurecep.recepcion.fecharecepcionado" />

                <label class="col-5 col-form-label">CONSULTORIO</label>
                <input placeholder="CONSULTORIO" v-model="usurecep.recepcion.consultorio" />

                <label class="col-5 col-form-label">FECHA DE REPARTO</label>
                <input placeholder="FECHA DE REPARTO" v-model="usurecep.recepcion.fechareparto" />

                <label class="col-5 col-form-label">FECHA DE PUBLICACIÓN</label>
                <input placeholder="FECHA DE PUBLICACIÓN" v-model="usurecep.recepcion.fechapublicacion" />

                <label class="col-5 col-form-label">FECHA DE RETIRO</label>
                <input placeholder="FECHA DE RETIRO" v-model="usurecep.recepcion.fecharetiro" />

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--segundo modal - el de buscar USUARIO-->
        <div
          class="modal fade"
          id="buscarModalUSU"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mostrar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">ID USUARIO</label>
                <input placeholder="ID USUARIO" v-model="usuario.persona.id" />

                <label class="col-5 col-form-label">USERNAME</label>
                <input placeholder="USERNAME" v-model="usuario.persona.username" />

                <label class="col-5 col-form-label">CEDULA</label>
                <input placeholder="USERNAME" v-model="usuario.persona.cedula" />

                <label class="col-5 col-form-label">NOMBRE</label>
                <input placeholder="USERNAME" v-model="usuario.persona.prinom" />

                <label class="col-5 col-form-label">APELLIDO</label>
                <input placeholder="USERNAME" v-model="usuario.persona.priape" />
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

</template>
<script>
export default {
  data() {
    return {
usuario: {
        id: "",
        username: "",
        email: "",
        email_verified_at: "",
        password: "",
        rol_id: "",
        per_id: "",

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


      usurecep: {
        id: "",
        recp_id: "",
        usu_id: "",

        recepcion: {
          id: "",
          recepcionado: "",
          fecharadicado: "",
          fecharecepcionado: "",
          consultorio: "",
          fechareparto: "",
          fechapublicacion: "",
          fecharetiro: "",
        },
        usuario: {
          id: "",
          username: "",
          email: "",
          email_verified_at: "",
          password: "",
        },
      },

      esta: false,
      estado: "disable",
      usurecepss: [],

      errors: [],
    };
  },
  methods: {
    buscarusu() {
      axios.get("/api/user/" + this.usurecep.usuario.id).then((res) => {
        if (res.data[0] == null) {
          this.usurecep.usuario.id = "";
          this.usurecep.usuario.username = "";
          console.log(this.usurecep.usuario.id);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usurecep.usuario = person;
          this.esta = true;
        }
      });
    },


      buscarusuced() {
      axios.get("/api/user2/" + this.usuario.persona.cedula).then((res) => {
        if (res.data[0] == null) {
          this.usuario.id = "";
          this.usuario.username = "";
          this.usuario.cedula = "";
          this.usuario.prinom = "";
          this.usuario.priape = "";
          console.log(this.usuario);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usuario.persona = person;
          this.esta = true;
        }
      });
    },

           isFormValidusuario: function(){
            return this.usuario.persona.cedula!="";
          },

           isFormValidrecepcion: function(){
            return this.usurecep.recepcion.id!="";
          },

    buscarrecep() {
      axios.get("/api/recepcion/" + this.usurecep.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          this.usurecep.recepcion.id = "";
          this.usurecep.recepcion.recepcionado = "";
          this.usurecep.recepcion.fecharadicado = "";
          this.usurecep.recepcion.fecharecepcionado = "";
          this.usurecep.recepcion.consultorio = "";
          this.usurecep.recepcion.fechareparto = "";
          this.usurecep.recepcion.fechapublicacion = "";
          this.usurecep.recepcion.fecharetiro = "";
          console.log(this.usurecep.recepcion.id);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usurecep.recepcion = person;
          this.esta = true;
        }
      });
    },
    agregar() {
      // alert(this.personas.prinom);
      const params = {
        recp_id: this.usurecep.recepcion.id,
        usu_id: this.usurecep.usuario.id,
      };
      this.usurecep.recepcion.id = "";
      this.usurecep.usuario.id = "";

      axios.post("/api/asigrecep", params).then((res) => {
        if (res.data == null) {
            swal({
            type: 'error',
            "timer":3000,
            "title":"PARECE QUE HAY UN ERROR",
            "text":"La asignacion no se ha registrado con exito",
            "showConfirmButton":false
             });
        } else {
            swal({
            type: 'success',
            "timer":3000,
            "title":"EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            "text":"La asignacion se ha registrado",
            "showConfirmButton":false
             });
        }
        this.usurecepss.push(res.data);
      });
    },
  },
};
</script>