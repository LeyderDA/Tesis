<template>
  <div class="card">
    <div>
      <h1 class="text-center mb-2 card-title">Registrando Asignación</h1>
     </div>
     <div class="card-body row">  
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Recepción</th>
                      <th>Usuario Asignado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(usurecep,index) in usurecepss" :key="usurecep.index">
                      <td>{{usurecep.recp_id}}</td>
                      <td>{{usurecep.usu_id}}</td>
                      <td>
                        <button class="btn btn-danger btn-sm" @click="eliminar(usurecep,index)"
                         title="Eliminar asignación">
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
                <input placeholder="ID USUARIO" v-model="usurecep.usuario.id" />
                <label class="col-5 col-form-label">USERNAME</label>
                <input placeholder="USERNAME" v-model="usurecep.usuario.username" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->


        <!--segundo modal - el de MOSTRAR USUARIO-->
        <div
          class="modal fade"
          id="MOSTRARModalUSU"
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

                <label class="col-5 col-form-label">username</label>
                <input placeholder="USERNAME" v-model="usurecep.username" />

                <label class="col-5 col-form-label">Cedula</label>
                <input placeholder="Cedula" v-model="usurecep.cedula" />

                <label class="col-5 col-form-label">Primer nombre</label>
                <input placeholder="Primer nombre" v-model="usurecep.prinom" />

                <label class="col-5 col-form-label">Segundo nombre</label>
                <input placeholder="Segundo nombre" v-model="usurecep.segnom" />

                <label class="col-5 col-form-label">Primer apellido</label>
                <input placeholder="Primer apellido" v-model="usurecep.priape" />

                <label class="col-5 col-form-label">Segundo apellido</label>
                <input placeholder="Segundo apellido" v-model="usurecep.segape" />

                <label class="col-5 col-form-label">Teléfono</label>
                <input placeholder="Teléfono" v-model="usurecep.tel" />

                <label class="col-5 col-form-label">Dirección</label>
                <input placeholder="Dirección" v-model="usurecep.direc" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de MOSTRAR USUARIO -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
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
  created() {
    axios.get("/api/asigrecep").then((res) => {
      this.usurecepss = res.data;
    });
  },
  methods: {

  editarForm(usurecep, index) {
      this.usurecep = usurecep;
      this.usurecep.index = index;
    },

    eliminar(usurecep, index) {
      const confirmacion = confirm(
        `Confirma Eliminar la asignacion con id de usuario: ${usurecep.usu_id}`
      );
      if (confirmacion) {
        axios.delete("/api/asigrecep/" + usurecep.id).then(() => {
          this.usurecepss.splice(index, 1);
          swal({
            type: 'success',
            "timer":3000,
            "title":"EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            "text":"La asignación se ha eliminado con exito",
            "showConfirmButton":false
             });
        });
      }
    },
  },
};
</script>