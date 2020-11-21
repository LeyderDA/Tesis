<template>
  <div class="card" style="margin-top: 25px">
    <div>
      <h2 class="text-center mb-2 card-title">Lista de Recepciones Activas</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="card-body col">
          <div class="container row">
            <div class="table text-center table-reponsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>Abogado en formación quien recepciona</th>
                    <th>Recepcionado</th>
                    <th>Consultorio</th>
                    <th>Usuario</th>
                    <th>Abogado en formación asignado</th>
                    <th>Docente asignado</th>
                    <th>Área</th>
                    <th>Recepción</th>
                    <th>Asignar Recepción</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(recepcion, index) in recepcioness"
                    :key="recepcion.index"
                  >
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalRECEP"
                        @click="editarForm(recepcion)"
                        title="Mostrar quien recepciona"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>
                    <td>{{ recepcion.recepcionado }}</td>
                    <td>{{ recepcion.consultorio }}</td>
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalRECLAMANTE"
                        @click="editarForm(recepcion, index)"
                        title="Mostrar los datos del usuario"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>

                    <td>
                      <div>
                        <center>
                          <a
                            :href="'/HojaDeVidaROLES/' + recepcion.usu_id"
                            target="_blank"
                            ><i
                              title="Ver Usuario"
                              class="fas fa-user fa-2x"
                              style="color: black"
                            ></i
                          ></a>
                        </center>
                      </div>
                    </td>
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModalDOC"
                        @click="editarForm(recepcion)"
                        title="Mostrar docente"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>

                    <td>{{ recepcion.area.nombre }}</td>
                    <td>
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#MOSTRARModal"
                        @click="editarForm(recepcion)"
                        title="Mostrar el resto de campos"
                      >
                        <i class="fas fa-eye fa-2x" style="color: black"></i>
                      </button>
                    </td>
                    <td>
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#PUENTE"
                        @click="editarForm(recepcion)"
                        title="Asignar caso"
                      >
                        <i class="fas fa-save fa-3x" style="color: black"></i>
                      </button>
                    </td>

                    <td>
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#editarModal"
                        @click="editarForm(recepcion, index)"
                        title="Editar Recepción"
                      >
                        <i class="fas fa-pencil-alt fa-1.5x"></i>
                      </button>
                      <br />
                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#editarModalRR"
                        @click="editarForm(recepcion, index)"
                        title="Editar Usuario"
                      >
                        <i class="fas fa-pen-alt fa-1.5x"></i>
                      </button>
                      <br />
                      <button
                        class="btn btn-danger btn-sm"
                        @click="eliminar(recepcion, index)"
                        title="Eliminar Recepción"
                      >
                        <i class="fas fa-trash-alt fa-1.5x"></i>
                      </button>

                      <button
                        class="btn btn-sm"
                        data-toggle="modal"
                        data-target="#editarModalAREA"
                        @click="editarForm(recepcion, index)"
                        title="Cambiar el Area"
                      >
                        <i class="fas fa-edit fa-2x"></i>
                      </button>

                      <a :href="'/recepcionqr/' + recepcion.id">
                        <i
                          class="fas fa-qrcode fa-2x fa-align-center"
                          style="color: black"
                          title="Mostrar QR de la Recepción"
                        ></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!--modal de MOSTRAR EL RECEPCIONISTA-->
      <div
        class="modal fade"
        id="MOSTRARModalRECEP"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Buscar Recepcionador
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
                placeholder="id recep"
                v-model="recepcion.id"
                disabled
              />
              <center>
                <label class="col-12 col-form-label">Clic en el ícono</label>
              </center>
              <center>
                <button
                  class="btn btn-sm"
                  data-toggle="modal"
                  data-target="#MOSTRARModalRE"
                  @click="buscarrecep()"
                  title="Mostrar quien recepciona"
                >
                  <i class="fas fa-eye fa-5x" style="color: black"></i>
                </button>
              </center>

              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL RECE -->

      <!-- -------------- -->
      <!--modal de MOSTRAR EL DOCENTE-->
      <div
        class="modal fade"
        id="MOSTRARModalDOC"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buscar Docente</h5>
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
                placeholder="id recep"
                v-model="recepcion.id"
                disabled
              />
              <center>
                <label class="col-12 col-form-label">Clic en el ícono</label>
              </center>
              <center>
                <button
                  class="btn btn-sm"
                  data-toggle="modal"
                  data-target="#MOSTRARModalDOO"
                  @click="buscarDOC()"
                  title="Mostrar Docente"
                >
                  <i class="fas fa-eye fa-5x" style="color: black"></i>
                </button>
              </center>

              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL DOCENTE -->
      <!-- --------------- -->

      <!--modal de MOSTRAR EL RECE -->
      <div
        class="modal fade"
        id="MOSTRARModalRE"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Datos de quien recepciona
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
                v-model="usurecep.usuario.persona.id"
                disabled
              />
              <div>
                <center>
                  <a
                    :href="'/HojaDeVidaROLES/' + usurecep.usuario.persona.id"
                    target="_blank"
                    ><i
                      title="Ver Usuario"
                      class="fas fa-user fa-5x"
                      style="color: black"
                    ></i
                  ></a>
                </center>
              </div>
              <label class="col-5 col-form-label">Usuario:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Username"
                  v-model="usurecep.usuario.persona.username"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Email:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Email"
                  v-model="usurecep.usuario.persona.email"
                  disabled
                />
              </div>
              <label class="col-5 col-form-label">Cédula:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Cédula"
                  v-model="usurecep.usuario.persona.cedula"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Primer nombre:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="usurecep.usuario.persona.prinom"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Segundo nombre:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="usurecep.usuario.persona.segnom"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Primer Apellido:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="usurecep.usuario.persona.priape"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Segundo Apellido:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="usurecep.usuario.persona.segape"
                  disabled
                />
              </div>

              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    @click="limpiame()"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL RECEP -->

      <!--modal de MOSTRAR EL DOCENTE REAL -->
      <div
        class="modal fade"
        id="MOSTRARModalDOO"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Datos del docente
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
                v-model="usurecep.usuario.persona.id"
                disabled
              />
              <div>
                <center>
                  <a
                    :href="'/HojaDeVidaROLES/' + usurecep.usuario.persona.id"
                    target="_blank"
                    ><i
                      title="Ver Usuario"
                      class="fas fa-user fa-5x"
                      style="color: black"
                    ></i
                  ></a>
                </center>
              </div>
              <label class="col-5 col-form-label">Usuario:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Username"
                  v-model="usurecep.usuario.persona.username"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label">Email:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Email"
                  v-model="usurecep.usuario.persona.email"
                  disabled
                />
              </div>
              <label class="col-5 col-form-label">Cédula:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Cédula"
                  v-model="usurecep.usuario.persona.cedula"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Primer nombre:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="usurecep.usuario.persona.prinom"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Segundo nombre:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="usurecep.usuario.persona.segnom"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Primer Apellido:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="usurecep.usuario.persona.priape"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Segundo Apellido:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="usurecep.usuario.persona.segape"
                  disabled
                />
              </div>

              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    @click="limpiame()"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL DOCENTE -->

      <!--modal de MOSTRAR EL ESTUDIANTE-->
      <div
        class="modal fade"
        id="MOSTRARModalEST"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Buscar Estudiante
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
                placeholder="id recep"
                v-model="recepcion.id"
                disabled
              />
              <center>
                <label class="col-12 col-form-label">Clic en el ícono</label>
              </center>
              <center>
                <button
                  class="btn btn-sm"
                  data-toggle="modal"
                  data-target="#MOSTRARModalES"
                  @click="buscarestudiante()"
                  title="Mostrar Estudiante"
                >
                  <i class="fas fa-eye fa-5x" style="color: black"></i>
                </button>
              </center>

              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL ESTUDIANTE -->
      <!--modal de MOSTRAR EL ESTUDIANTE -->
      <div
        class="modal fade"
        id="MOSTRARModalES"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Datos del Estudiante
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
              <label class="col-12 col-form-label">Primer nombre:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="estudiante.usuario.persona.prinom"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Segundo nombre:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Nombre de persona"
                  v-model="estudiante.usuario.persona.segnom"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Primer Apellido:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="estudiante.usuario.persona.priape"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Segundo Apellido:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Apellido de persona"
                  v-model="estudiante.usuario.persona.segape"
                  disabled
                />
              </div>

              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    @click="limpiar2()"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL ESTUDIANTE -->

      <!--modal de editar -->
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
              <h5 class="modal-title" id="exampleModalLabel">
                Editar Recepción
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
              <label class="col-12 col-form-label">Define el estado</label>
              <div class="col-12">
                <select
                  class="form-control"
                  placeholder="Estado"
                  type="boolean"
                  v-model="recepcion.estado"
                >
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>

              <label class="col-12 col-form-label">Fecha de radicado:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  v-model="recepcion.fecharadicado"
                />
              </div>
              <label class="col-12 col-form-label"
                >Fecha de recepcionado:</label
              >
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  v-model="recepcion.fecharecepcionado"
                />
              </div>
              <label class="col-12 col-form-label">Fecha de reparto:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  v-model="recepcion.fechareparto"
                />
              </div>
              <label class="col-12 col-form-label">Fecha de publicación:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  v-model="recepcion.fechapublicacion"
                />
              </div>
              <label class="col-12 col-form-label">Fecha de retiro</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  v-model="recepcion.fecharetiro"
                />
              </div>
              <label class="col-12 col-form-label">Recepcionado en:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  v-model="recepcion.recepcionado"
                />
              </div>
              <label class="col-12 col-form-label">Consultorio:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  v-model="recepcion.consultorio"
                />
              </div>

              <label class="col-12 col-form-label">Area:</label>

              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  v-model="recepcion.area.nombre"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Institución Jurídica:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Institución Jurídica"
                  v-model="recepcion.instjuri"
                />
              </div>

              <label class="col-12 col-form-label">Tramite Jurídico:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Tramite Jurídico"
                  v-model="recepcion.tramitejuri"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>

              <button
                type="button"
                class="btn btn-primary"
                @click="editar()"
                data-dismiss="modal"
              >
                Guardar Cambios
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de editar -->

      <!--modal de editar reclamante -->
      <div
        class="modal fade"
        id="editarModalRR"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Editar Recepción
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
              <label class="col-12 col-form-label"
                >En caso de que quieras cambiar el usuario digita la cédula:
              </label>

              <label class="col-12 col-form-label">Cédula del usuario:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Cédula del usuario"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                  v-model="usuario.persona.cedula"
                />
              </div>
              <br />

              <!--buscar reclamante -->
              <div class="col-12 form-group" v-if="true">
                <button
                  class="btn btn-primary btn-block"
                  data-toggle="modal"
                  data-target="#buscarModalReclam"
                  @click="buscarreclaced()"
                  :disabled="!isFormValidReclamante()"
                >
                  B.Reclamante
                  <i class="fas fa-search fa-1x" style="color: black"></i>
                </button>
              </div>
              <!--buscar reclamante -->
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>

              <button
                type="button"
                class="btn btn-primary"
                @click="editarReclamante()"
                data-dismiss="modal"
              >
                Guardar Cambios
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de editar reclamante -->

      <!--modal de editar AREA-->
      <div
        class="modal fade"
        id="editarModalAREA"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Cambiar el Area
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
              <label class="col-12 col-form-label">Area:</label>
              <div class="col-12 form-group">
                <select v-model="area.id" class="form-control" id="area">
                  <option value="">Selecciona</option>
                  <option v-for="area in areass" :key="area.index">
                    {{ area.id }}-{{ area.nombre }}
                  </option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>

              <button
                type="button"
                class="btn btn-primary"
                @click="editarArea()"
                data-dismiss="modal"
              >
                Guardar Cambios
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de editar AREA -->

      <!--MODAL PARA ASIGNAR MI CASO COMO RECEPCIONISTA-->
      <div
        class="modal fade"
        id="PUENTE"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Elige a quien vas a asignar la recepción
              </h5>
            </div>
            <div class="modal-body">
              <div class="col-12 form-group" v-if="true">
                <div class="col-12 form-group">
                  <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#aggusuPROFModal"
                    title="Asignar caso al Docente"
                  >
                    Asignar Docente
                  </button>
                </div>

                <div class="col-12 form-group">
                  <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#aggusuModal"
                    title="Asignar quien recepciona"
                  >
                    Asignar quien recepciona
                  </button>
                </div>

                <div class="col-12 form-group">
                  <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#aggabModal"
                    title="Asignar caso al Docente"
                  >
                    Asignar abogado en formación
                  </button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--MODAL PARA ASIGNAR MI CASO COMO RECEPCIONISTA-->

      <!--modal de agg usuario -->
      <div
        class="modal fade"
        id="aggusuModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Asignar Administrativo a la Recepción
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
                placeholder="recepcion"
                v-model="recepcion.id"
                disabled
              />
              <label class="col-6 col-form-label">CÉDULA (*):</label>
              <input
                placeholder="CC.RECEPCIONISTA"
                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                v-model="usuario.persona.cedula"
              />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <div class="col-12 form-group" v-if="true">
                <button
                  class="btn btn-primary btn-block"
                  data-toggle="modal"
                  data-target="#buscarModalUSU"
                  @click="buscarusucedADM()"
                  :disabled="!isFormValidusuario()"
                >
                  BUSCAR
                </button>
              </div>
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                @click="limpiatodo()"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>

              <!-- <button
                type="button"
                class="btn btn-primary"
                @click="GUARDARASIGNACION()"
                data-dismiss="modal"
              >
                ASIGNAR
              </button> -->
            </div>
          </div>
        </div>
      </div>
      <!--modal de agg usuario -->

      <!--modal de agg abogado en formacion -->
      <div
        class="modal fade"
        id="aggabModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Asignar abogado en formación a la Recepción
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
                placeholder="recepcion"
                v-model="recepcion.id"
                disabled
              />
              <label class="col-6 col-form-label">CÉDULA (*):</label>
              <input
                placeholder="Cc.Abogado en formación"
                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                v-model="usuarioo.persona.cedula"
              />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <div class="col-12 form-group" v-if="true">
                <button
                  class="btn btn-primary btn-block"
                  data-toggle="modal"
                  data-target="#buscarModalAB"
                  @click="buscarusucedAB()"
                  :disabled="!isFormValidusuario2()"
                >
                  Buscar abogado en formación
                </button>
              </div>
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                @click="limpiatodo2()"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>

              <!-- <button
                type="button"
                class="btn btn-primary"
                @click="editarEST()"
                data-dismiss="modal"
              >
                ASIGNAR
              </button> -->
            </div>
          </div>
        </div>
      </div>
      <!--modal de agg abogado en formacion -->

      <!--modal de agg PROFESOR -->
      <div
        class="modal fade"
        id="aggusuPROFModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Asignar Docente Recepción
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
                placeholder="recepcion"
                v-model="recepcion.id"
                disabled
              />

              <label class="col-5 col-form-label">CÉDULA (*):</label>
              <input
                placeholder="CC.DOCENTE"
                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                v-model="usuario.persona.cedula"
              />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />

              <div class="col-12 form-group" v-if="true">
                <button
                  class="btn btn-primary btn-block"
                  data-toggle="modal"
                  data-target="#buscarModalUSU"
                  @click="buscarusucedPROF()"
                  :disabled="!isFormValidusuario()"
                >
                  BUSCAR DOCENTE
                </button>
              </div>
            </div>
            <div class="modal-footer">
              <button
                name="CERRAR"
                class="btn btn-danger"
                @click="limpiatodo()"
                data-dismiss="modal"
                aria-label="Close"
                type="button"
              >
                CERRAR
              </button>

              <!-- <button
                type="button"
                class="btn btn-primary"
                @click="GUARDARASIGNACION()"
                data-dismiss="modal"
              >
                ASIGNAR
              </button> -->
            </div>
          </div>
        </div>
      </div>
      <!--modal de agg PROFESOR -->

      <!--modal de MOSTRAR EL RESTO DE CAMPOS-->
      <div
        class="modal fade"
        id="MOSTRARModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Recepción</h5>
            </div>
            <div class="modal-body">
              <label class="col-12 col-form-label">Institución Jurídica:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Institución Jurídica"
                  readonly="readonly"
                  v-model="recepcion.instjuri"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Trámite Jurídico:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Tramite Jurídico"
                  readonly="readonly"
                  v-model="recepcion.tramitejuri"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label"
                >Fecha de recepcionado:</label
              >
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fecharecepcionado"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Fecha de radicado:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fecharadicado"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Fecha de reparto:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fechareparto"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Fecha de publicación:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fechapublicacion"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Fecha de retiro:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="recepcion"
                  type="date"
                  readonly="readonly"
                  v-model="recepcion.fecharetiro"
                  disabled
                />
              </div>
              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL RESTO DE CAMPOS -->

      <!--modal de MOSTRAR EL RECLAMANTE-->
      <div
        class="modal fade"
        id="MOSTRARModalRECLAMANTE"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Datos del Usuario
              </h5>
            </div>
            <div class="modal-body">
              <div>
                <center>
                  <a
                    :href="'/HojaDeVidaR/' + recepcion.recla_id"
                    target="_blank"
                    ><i
                      title="Ver Usuario"
                      class="fas fa-user fa-5x"
                      style="color: black"
                    ></i
                  ></a>
                </center>
              </div>

              <label class="col-5 col-form-label">Email:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="nombre de persona"
                  v-model="recepcion.email"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label"
                >Nombre del reclamante:</label
              >
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="nombre de persona"
                  v-model="recepcion.prinom"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label"
                >Apellido del reclamante:</label
              >
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="nombre de persona"
                  v-model="recepcion.priape"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Enfoque diferencial:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="enfoque diferencial"
                  v-model="recepcion.reclamante.enfodifervictima"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Genero:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="genero"
                  v-model="recepcion.reclamante.genevictima"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Edad:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="edad"
                  v-model="recepcion.reclamante.edadvictima"
                  disabled
                />
              </div>
              <label class="col-12 col-form-label">Discapacidad:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="discapacidad"
                  v-model="recepcion.reclamante.discapavictima"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Estrato:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="estrato"
                  v-model="recepcion.reclamante.estravictima"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Embarazo:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="embarazo"
                  v-model="recepcion.reclamante.embaravictima"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Grupo Etnico:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="grupo etnico"
                  v-model="recepcion.reclamante.grupetnicovictima"
                  disabled
                />
              </div>

              <label class="col-12 col-form-label">Entidad que reclama:</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="entidad"
                  v-model="recepcion.reclamante.persoentidreclama"
                  disabled
                />
              </div>
              <br />
              <br />

              <div class="col-12 form-group">
                <div style="width: 100px; height: 30px; margin: 0 auto">
                  <button
                    name="CERRAR"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    aria-label="Close"
                    type="button"
                  >
                    CERRAR
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--modal de MOSTRAR EL RECLAMANTE -->

      <!--modal de area -->
      <div
        class="modal fade"
        id="buscarModalarea"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mostrar Area</h5>
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
              <input placeholder="Id" v-model="recepcion.area.id" />
              <input placeholder="Nombre" v-model="recepcion.area.nombre" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--cierro modal de area -->

      <!--modal - el de buscar reclamante -->
      <div
        class="modal fade"
        id="buscarModalrecl"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Mostrar Persona
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
                placeholder="Id Docente"
                v-model="recepcion.reclamante.id"
              />
              <input
                placeholder="Id Persona"
                v-model="recepcion.reclamante.per_id"
              />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--cierro modal de buscar -->

      <!--segundo modal - el de buscar usuario-->
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
              <h5 class="modal-title" id="exampleModalLabel">
                Mostrar Usuario
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
              <label class="col-12 col-form-label">USERNAME</label>
              <input
                placeholder="USERNAME"
                v-model="usuario.persona.username"
              />

              <label class="col-12 col-form-label">CEDULA</label>

              <input
                placeholder="USERNAME"
                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                v-model="usuario.persona.cedula"
              />

              <label class="col-12 col-form-label">NOMBRE</label>
              <input placeholder="USERNAME" v-model="usuario.persona.prinom" />

              <label class="col-12 col-form-label">APELLIDO</label>
              <input placeholder="USERNAME" v-model="usuario.persona.priape" />
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-primary"
                @click="GUARDARASIGNACION()"
                data-dismiss="modal"
              >
                ASIGNAR
              </button>
              <button
                type="button"
                class="btn btn-danger"
                @click="limpiatodo()"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--cierro modal de buscar -->

      <!--segundo modal - el de buscar abogado en formacion-->
      <div
        class="modal fade"
        id="buscarModalAB"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Mostrar abogado en formación
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
                placeholder="recepcion"
                v-model="recepcion.id"
                disabled
              />

              <input
                type="hidden"
                placeholder="recepcion"
                v-model="usuarioo.persona.id"
                disabled
              />
              <label class="col-12 col-form-label">USERNAME</label>
              <input
                placeholder="USERNAME"
                v-model="usuarioo.persona.username"
              />

              <label class="col-12 col-form-label">CEDULA</label>

              <input
                placeholder="USERNAME"
                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                v-model="usuarioo.persona.cedula"
              />

              <label class="col-12 col-form-label">NOMBRE</label>
              <input placeholder="USERNAME" v-model="usuarioo.persona.prinom" />

              <label class="col-12 col-form-label">APELLIDO</label>
              <input placeholder="USERNAME" v-model="usuarioo.persona.priape" />
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-primary"
                @click="editarEST()"
                data-dismiss="modal"
              >
                ASIGNAR
              </button>
              <button
                type="button"
                class="btn btn-danger"
                @click="limpiatodo2()"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--cierro modal de buscar abogado en formacion -->

      <!--segundo modal - el de buscar RECLAMANTE-->
      <div
        class="modal fade"
        id="buscarModalReclam"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Mostrar Usuario
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
              <label class="col-12 col-form-label">CÉDULA</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="CEDULA"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                  v-model="usuario.persona.cedula"
                />
              </div>

              <label class="col-12 col-form-label">NOMBRE</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="NOMBRE"
                  v-model="usuario.persona.prinom"
                />
              </div>

              <label class="col-12 col-form-label">APELLIDO</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="APELLIDO"
                  v-model="usuario.persona.priape"
                />
              </div>
            </div>
            <br />
            <br />
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--cierro modal de buscar RECLAMANTE-->
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
      estudiante: {
        id: "",
        usuario: {
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
      },

      usurecep: {
        id: "",
        usuario: {
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
      usuarioo: {
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

      recepcion: {
        id: "",
        recepcionado: "",
        fecharadicado: "",
        fecharecepcionado: "",
        consultorio: "",
        fechareparto: "",
        fechapublicacion: "",
        fecharetiro: "",
        estado: "",
        recla_id: "",
        area_id: "",
        usu_id: "",

        reclamante: {
          id: "",
          enfodifervictima: "",
          genevictima: "",
          edadvictima: "",
          discapavictima: "",
          estravictima: "",
          embaravictima: "",
          grupetnicovictima: "",
          persoentidreclama: "",
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

        area: {
          id: "",
          nombre: "",
        },
      },
      notificaiones: {
        id: "",
        mensaje: "",
        id_usuario: "",
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
      recepcioness: [],
      errors: [],
      areass: [],
    };
  },
  created() {
    axios.get("/api/area").then((res) => {
      this.areass = res.data;
      console.log(res.data);
    });
    axios.get("/api/recepcionSUPER").then((res) => {
      this.recepcioness = res.data;
      console.log(res.data);
    });
  },

  methods: {
    buscarrecep() {
      axios.get("/api/recepcionRE/" + this.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          console.log(res.data[0]);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usurecep.usuario.persona = person;
          this.esta = true;
        }
      });
    },

    buscarDOC() {
      axios.get("/api/recepcionDO/" + this.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          console.log(res.data[0]);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.usurecep.usuario.persona = person;
          this.esta = true;
        }
      });
    },

    buscarestudiante() {
      axios.get("/api/recepcionEST/" + this.recepcion.id).then((res) => {
        if (res.data[0] == null) {
          console.log(res.data[0]);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.estudiante.usuario.persona = person;
          this.esta = true;
        }
      });
    },

    buscarusucedAB() {
      axios.get("/api/user3/" + this.usuarioo.persona.cedula).then((res) => {
        if (res.data[0] == null) {
          this.usuarioo.persona.id = "";
          this.usuarioo.persona.cedula = "";
          this.usuarioo.persona.prinom = "";
          this.usuarioo.persona.segnom = "";
          this.usuarioo.persona.priape = "";
          this.usuarioo.persona.segape = "";
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let personn = res.data[0];
          this.usuarioo.persona = personn;
          this.esta = true;
        }
      });
    },

    limpiame() {
      this.usurecep.usuario.persona = "";
    },

    limpiar2() {
      this.estudiante.usuario.persona.prinom = "";
      this.estudiante.usuario.persona.segnom = "";
      this.estudiante.usuario.persona.priape = "";
      this.estudiante.usuario.persona.segape = "";
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
    buscarusucedPROF() {
      axios.get("/api/user4/" + this.usuario.persona.cedula).then((res) => {
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

    buscarusucedADM() {
      axios.get("/api/user5/" + this.usuario.persona.cedula).then((res) => {
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
    limpiar() {
      this.usuario.persona.cedula = "";
    },
    buscarreclaced() {
      axios
        .get("/api/reclamante2/" + this.usuario.persona.cedula)
        .then((res) => {
          if (res.data[0] == null) {
            this.usuario.persona.id = "";
            this.usuario.persona.username = "";
            this.usuario.persona.cedula = "";
            this.usuario.persona.prinom = "";
            this.usuario.persona.priape = "";
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

    limpiarr() {
      this.usuario.persona = "";
    },

    limpiatodo() {
      this.usuario.persona.username = "";
      this.usuario.persona.cedula = "";
      this.usuario.persona.prinom = "";
      this.usuario.persona.priape = "";
    },

    limpiatodo2() {
      this.usuarioo.persona.username = "";
      this.usuarioo.persona.cedula = "";
      this.usuarioo.persona.prinom = "";
      this.usuarioo.persona.priape = "";
    },

    isFormValidReclamante: function () {
      return this.usuario.persona.cedula != "";
    },

    GUARDARASIGNACION() {
      if (!this.recepcion.id || !this.usuario.persona.cedula) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios estan marcados con un (*)",
          showConfirmButton: true,
        });
      } else {
        const params = {
          recp_id: this.recepcion.id,
          usu_id: this.usuario.persona.id,
        };
        axios.post("/api/asigrecep", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "La asignacion no se ha registrado con exito",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La asignacion del caso se ha registrado",
              showConfirmButton: false,
            });
          }
          axios.get("/api/recepcionSUPER").then((res) => {
            this.recepcioness = res.data;
            console.log(res.data);
          });
        });

        const param = {
          mensaje: "Tienes asignada una recepción, revisa tus Recepciones",
          id_usuario: this.usuario.persona.id,
        };
        axios.post("/api/notificaciones", param).then((res) => {});
      }
    },

    buscarrecl() {
      axios
        .get("/api/reclamante/" + this.recepcion.reclamante.id)
        .then((res) => {
          if (res.data[0] == null) {
            this.recepcion.reclamante.id = "";
            this.recepcion.reclamante.per_id = "";

            console.log(this.recepcion.reclamante);
            this.esta = false;
          } else {
            console.log(res.data[0]);
            let person = res.data[0];
            this.recepcion.reclamante = person;
            this.esta = true;
          }
        });
    },
    buscararea() {
      axios.get("/api/area/" + this.recepcion.area.nombre).then((res) => {
        if (res.data[0] == null) {
          this.recepcion.area.id = "";
          this.recepcion.area.nombre = "";
          console.log(this.recepcion.area);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let person = res.data[0];
          this.recepcion.area = person;
          this.esta = true;
        }
      });
    },

    eliminar(recepcion, index) {
      console.log(recepcion);
      const confirmacion = confirm(
        `Confirma Eliminar Recepcion del area de: ${recepcion.area.nombre}`
      );

      if (confirmacion) {
        const params = {
          id_recp: recepcion.id,
          recepcionado: recepcion.recepcionado,
          fecharadicado: recepcion.fecharadicado,
          fecharecepcionado: recepcion.fecharecepcionado,
          consultorio: recepcion.consultorio,
          fechareparto: recepcion.fechareparto,
          fechapublicacion: recepcion.fechapublicacion,
          fecharetiro: recepcion.fecharetiro,
          estado: recepcion.estado,
          reclamante: recepcion.prinom,
          usuario: recepcion.usu_id,
          area: recepcion.nombre,
          notpricort: recepcion.notpricor,
          notsegcort: recepcion.notsegcort,
          nottercort: recepcion.nottercort,
        };

        axios.post("/api/recepcionRespaldo", params).then((res) => {
          if (res.data == null) {
          } else {
          }
        });
        axios.delete("/api/recepcion/" + recepcion.id).then(() => {
          this.recepcioness.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La recepción se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },

    isFormValidusuario: function () {
      return this.usuario.persona.cedula != "";
    },

    isFormValidusuario2: function () {
      return this.usuarioo.persona.cedula != "";
    },
    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
      console.log(recepcion);
    },
    editarReclamante() {
      const params = {
        recla_id: this.usuario.persona.id,
      };
      axios
        .put("/api/recepcionReclamante/" + this.recepcion.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El usuario no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El usuario se ha actualizado",
              showConfirmButton: false,
            });
          }
          axios.get("/api/recepcionSUPER").then((res) => {
            this.recepcioness = res.data;
            console.log(res.data);
          });
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.recepcionado[0]);
          }
        });
    },
    editar() {
      const params = {
        recepcionado: this.recepcion.recepcionado,
        fecharadicado: this.recepcion.fecharadicado,
        fecharecepcionado: this.recepcion.fecharecepcionado,
        consultorio: this.recepcion.consultorio,
        fechareparto: this.recepcion.fechareparto,
        fechapublicacion: this.recepcion.fechapublicacion,
        fecharetiro: this.recepcion.fecharetiro,
        estado: this.recepcion.estado,
        recla_id: this.recepcion.recla_id,
        //recla_id: this.usuario.persona.id,
        instjuri: this.recepcion.instjuri,
        tramitejuri: this.recepcion.tramitejuri,
      };
      axios
        .put("/api/recepcion/" + this.recepcion.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La recepcion no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La Recepción se ha actualizado",
              showConfirmButton: false,
            });
          }
          axios.get("/api/recepcionSUPER").then((res) => {
            this.recepcioness = res.data;
            console.log(res.data);
          });
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.recepcionado[0]);
          }
        });
    },

    // -----------------------------------------------------------------------------------------------
    editarEST() {
      const param = {
        mensaje: "Tienes asignada una recepción, revisa tus Recepciones",
        id_usuario: this.usuarioo.persona.id,
      };
      axios.post("/api/notificaciones", param).then((res) => {});
      const params = {
        usu_id: this.usuarioo.persona.id,
      };
      axios
        .put("/api/recepcionaABO/" + this.recepcion.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La recepcion no se ha asignado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La Recepción se ha asignado",
              showConfirmButton: false,
            });
          }
          axios.get("/api/recepcionSUPER").then((res) => {
            this.recepcioness = res.data;
            console.log(res.data);
          });
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.recepcionado[0]);
          }
        });
    },
    // ---

    editarArea() {
      const params = {
        area_id: this.area.id.substr(0, 1),
      };
      axios
        .put("/api/recepcionAreUpdate/" + this.recepcion.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El Area no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El Area se ha actualizado",
              showConfirmButton: false,
            });
          }
          this.area.id = "";
          axios.get("/api/recepcionSUPER").then((res) => {
            this.recepcioness = res.data;
            console.log(res.data);
          });
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.recepcionado[0]);
          }
        });
    },
  },
};
</script>