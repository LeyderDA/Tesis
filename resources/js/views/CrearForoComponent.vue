<template>
  <div class="card">
    <br />
    <div>
      <h2 class="text-center mb-2 card-title">Crear Foro</h2>
    </div>
    <div class="card-body row">
      <div class="row justify-content-center col"></div>
      <br />
      <div class="container">
        <div class="row">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Crear Foro</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(usuario, index) in usuarioss"
                      :key="usuario.index"
                    >
                      <td>{{ usuario.username }}</td>

                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#ModalAggForo"
                          @click="editarForm(usuario, index)"
                          title="Crear Foro"
                        >
                          <i class="fas fa-save fa-3x"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div
          class="modal fade"
          id="ModalAggForo"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Crear un nuevo Foro
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input
                  type="hidden"
                  class="form-control"
                  placeholder="id"
                  v-model="usuario.id"
                />
                <label class="col-5 col-form-label">Escoge el area (*)</label>
                <div class="col-12 form-group">
                  <select v-model="area.id" class="form-control" id="area">
                    <option value="">Selecciona</option>
                    <option v-for="area in areass" :key="area.index">
                      {{ area.id }}-{{ area.nombre }}
                    </option>
                  </select>
                </div>
                <label class="col-5 col-form-label">Título (*)</label>
                <div class="col-12 form-group">
                  <input class="form-control" v-model="foro.titulo" />
                </div>

                <label class="col-12 col-form-label">Define el estado (*)</label>
                <div class="col-12">
                  <select
                    class="form-control"
                    placeholder="Estado"
                    type="boolean"
                    v-model="foro.estadoFo"
                  >
                    <option value="">Selecciona</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
                <br />
                <label class="col-5 col-form-label">Descripción (*)</label>
                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="foro.descripcion"
                  >
                  </textarea>
                </div>

               
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-danger"
                    data-dismiss="modal"
                  >
                    Cerrar
                  </button>
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="agregar()"
                    data-dismiss="modal"
                  >
                    Guardar Cambios
                  </button>
                </div>
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
      area: {
        id: "",
        nombre: "",
      },

      foro: {
        titulo: "",
        descripcion: "",
        estadoFo: "",
        doc_id: "",
        archivo: "",
        
      },

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

      esta: false,
      estado: "disable",
      usuarioss: [],
      areass: [],
      errors: [],
    };
  },

  created() {
    axios.get("/api/miusuario").then((res) => {
      this.usuarioss = res.data;
    });
    axios.get("/api/area").then((res) => {
      this.areass = res.data;
      console.log(res.data);
    });
  },
  methods: {
    eliminar(usuario, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Usuario: ${usuario.username}`
      );
      if (confirmacion) {
        axios.delete("/api/user/" + usuario.id).then(() => {
          this.usuarioss.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "El usuario se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
    editarForm(usuario, index) {
      this.usuario = usuario;
      this.usuario.index = index;
    },
    agregar() {
      if (
        !this.area.id ||
        !this.foro.titulo ||
        !this.foro.descripcion ||
        !this.foro.estadoFo ||
        !this.usuario.id
      ) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios estan marcados de color ROJO",
          showConfirmButton: true,
        });
      } else {
      
        const params = {
          area_id: this.area.id.substr(0, 1),
          titulo: this.foro.titulo,
          descripcion: this.foro.descripcion,
          estadoFo: this.foro.estadoFo,
          doc_id: this.usuario.id,
         
        };

        this.foro.titulo = "";
        this.foro.descripcion = "";
        this.foro.fechapublicación = "";
        this.foro.estadoFo = "";
        this.usuario.id = "";
        this.area.id = "";

        axios.post("/api/foro", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "El foro no se ha registrado con exito",
              showConfirmButton: false,
            });
          } else {
            
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El Foro se ha creado y guardado",
              showConfirmButton: false,
            });
          }
        });
      }
    },
  },
};
</script>