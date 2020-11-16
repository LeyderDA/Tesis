<template>
  <div class="card" style="margin-top: 25px">
    <div>
      <h2 class="text-center mb-2 card-title">
        Realizar una consulta por rango
      </h2>
    </div>
    <div class="card-body row">
      <form>
        <div class="row">
          <label class="col-5 col-form-label">Fecha de inicio:</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              v-model="fechas.fecha_ini"
            />
          </div>

          <label class="col-5 col-form-label">Fecha de fin:</label>
          <div class="col-6 form-group">
            <input
              class="form-control"
              type="date"
              v-model="fechas.fecha_fin"
            />
          </div>
          <a :href="'/rango/' + fechas.fecha_ini + '/' + fechas.fecha_fin" >
            <i
              title="ir al rango"
              class="fas fa-archive fa-2x"
              style="color: black"
            ></i>
          </a>
        </div>
      </form>

      <br />
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      fechas: {
        fecha_ini: "",
        fecha_fin: "",
      },
      gestion: {
        id: "",
        amplhechos: "",
        fechentrevasesor: "",
        tipotramite: "",
        asuntotramite: "",
        motivoarchivo: "",
        fechaarchivo: "",
        obsrvtramite: "",
        actuarealizadas: "",
        actjuridirealzadas: "",
        resulactuacion: "",
        entidadelantramite: "",
        recp_id: "",

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
      },

      esta: false,
      gestioness: [],

      errors: [],
    };
  },

  methods: {
    buscar() {
      axios.get("/api/recepcion/" + this.gestion.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          this.gestion.recepcion.id = "";
          this.gestion.recepcion.recepcionado = "";
          this.gestion.recepcion.fecharadicado = "";
          this.gestion.recepcion.fecharecepcionado = "";
          this.gestion.recepcion.consultorio = "";
          this.gestion.recepcion.fechareparto = "";
          this.gestion.recepcion.fechapublicacion = "";
          this.gestion.recepcion.fecharetiro = "";
          console.log(this.gestion.recepcion.id);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let recep = res.data[0];
          this.gestion.recepcion = recep;
          this.esta = true;
        }
      });
    },
    agregar() {
      const params = {
        amplhechos: this.gestion.amplhechos,
        fechentrevasesor: this.gestion.fechentrevasesor,
        tipotramite: this.gestion.tipotramite,
        asuntotramite: this.gestion.asuntotramite,
        motivoarchivo: this.gestion.motivoarchivo,
        fechaarchivo: this.gestion.fechaarchivo,
        obsrvtramite: this.gestion.obsrvtramite,
        actuarealizadas: this.gestion.actuarealizadas,
        actjuridirealzadas: this.gestion.actjuridirealzadas,
        resulactuacion: this.gestion.resulactuacion,
        entidadelantramite: this.gestion.entidadelantramite,
        recp_id: this.gestion.recepcion.id,
      };
      this.gestion.amplhechos = "";
      this.gestion.fechentrevasesor = "";
      this.gestion.tipotramite = "";
      this.gestion.asuntotramite = "";
      this.gestion.motivoarchivo = "";
      this.gestion.fechaarchivo = "";
      this.gestion.obsrvtramite = "";
      this.gestion.actuarealizadas = "";
      this.gestion.actjuridirealzadas = "";
      this.gestion.resulactuacion = "";
      this.gestion.entidadelantramite = "";
      this.gestion.recepcion.id = "";

      axios.post("/api/gestion", params).then((res) => {
        if (res.data == null) {
          swal({
            type: "error",
            timer: 3000,
            title: "PARECE QUE HAY UN ERROR",
            text: "La Gestión NO se ha registrado",
            showConfirmButton: false,
          });
        } else {
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "¡La Gestión se ha registrado Exitosamente en el Caso!!",
            showConfirmButton: false,
          });
        }
        this.gestioness.push(res.data);
      });
    },
  },
};
</script>