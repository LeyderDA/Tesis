<template>
  <div class="card" style="margin-top: 25px">
    <div>
      <h2 class="text-center mb-2 card-title">Recepciones</h2>
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
                    <th>Agregar Gestión</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="recepcion in recepcioness" :key="recepcion.index">
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
                        title="Mostrar recepcionista"
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
                        data-target="#AggModal"
                        @click="editarForm(recepcion)"
                        title="Agregar Gestión"
                      >
                        <i class="fas fa-save fa-3x" style="color: black"></i>
                      </button>
                    </td>
                    <td>
                      <button
                        class="btn btn-success btn-sm"
                        data-toggle="modal"
                        data-target="#IRFORO"
                        @click="editarForm(recepcion)"
                        title="Ir a foro"
                      >
                        <i
                          class="fab fa-foursquare fa-2x"
                          style="color: black"
                        ></i>
                      </button>
                      <a :href="'/recepcionqr/' + recepcion.id">
                        <i
                          class="fas fa-qrcode fa-2x"
                          style="color: black"
                          title="Mostrar QR de la gestión"
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

      <!-- PUENTE AL FORO -->
      <div
        class="modal fade"
        id="IRFORO"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Foro</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <input
              type="hidden"
              class="form-control"
              placeholder="ID AREA"
              v-model="recepcion.area_id"
              disabled
            />

            <div class="modal-body">
              <label class="col-12 col-form-label"
                >Oprima el ícono para VER EL FORO</label
              >
              <center>
                <button
                  class="btn btn-sm"
                  data-toggle="modal"
                  data-target="#FOROMOSTRAR"
                  @click="buscaForo()"
                  title="Mostrar Foro"
                >
                  <i class="fas fa-eye fa-5x" style="color: black"></i>
                </button>
              </center>
            </div>

            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-danger"
                @click="limpiarforo()"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--PUENTE AL FORO -->
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
      <!-- IR AL FORO -->
      <div
        class="modal fade"
        id="FOROMOSTRAR"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Foro</h5>
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
              <div class="col-12 form-group">
                <input type="hidden" class="form-control" v-model="foro.id" />
              </div>

              <label class="col-5 col-form-label">Título</label>
              <div class="col-12 form-group">
                <input class="form-control" v-model="foro.titulo" disabled />
              </div>

              <label class="col-5 col-form-label">Estado</label>
              <div class="col-12">
                <select
                  class="form-control"
                  placeholder="Estado"
                  type="boolean"
                  v-model="foro.estadoFo"
                  disabled
                >
                  <option value="">Selecciona</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>

              <label class="col-5 col-form-label">Descripción</label>
              <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                  class="form-control"
                  v-model="foro.descripcion"
                  disabled
                >
                </textarea>
              </div>

              <center>
                <a :href="'/view_foro/' + foro.id" title="Agregar Comentario">
                  <i class="fas fa-arrow-alt-circle-right fa-5x"></i>
                </a>
              </center>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--IR AL FORO -->

      <!--modal de asignar gestion -->
      <div
        class="modal fade"
        id="AggModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Agregar Gestión
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
              <div class="col-12 form-group">
                <input
                  type="hidden"
                  class="form-control"
                  placeholder="Recepción"
                  v-model="recepcion.id"
                  disabled
                />
              </div>

              <label class="col-5 col-form-label"
                >Ampliación de hechos (*)</label
              >

              <div class="col-12">
                <select
                  class="form-control"
                  type="text"
                  v-model="gestion.amplhechos"
                >
                  <option value="">Selecciona</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>
              <br />

              <label class="col-5 col-form-label">Fecha entrevista (*)</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Fecha entrevista"
                  type="date"
                  v-model="gestion.fechentrevasesor"
                />
              </div>

              <label class="col-5 col-form-label">Primera Actuación (*)</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  type="date"
                  v-model="gestion.fechpriact"
                />
              </div>

              <label class="col-5 col-form-label">N.Actuaciones (*)</label>
              <div class="col-12 form-group">
                <input
                  type="number"
                  min="0"
                  class="form-control"
                  placeholder="N.Actuaciones"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                  v-model="gestion.n_act"
                />
              </div>

              <label class="col-5 col-form-label">N.Asesorias (*)</label>
              <div class="col-12 form-group">
                <input
                  type="number"
                  min="0"
                  class="form-control"
                  placeholder="N.Asesorias"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                  v-model="gestion.n_aseso"
                />
              </div>

              <label class="col-5 col-form-label">N.Autorizaciones (*)</label>
              <div class="col-12 form-group">
                <input
                  type="number"
                  min="0"
                  class="form-control"
                  placeholder="N.Autorizaciones"
                  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                  v-model="gestion.n_autor"
                />
              </div>

              <label class="col-5 col-form-label">Asesor (*)</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Asesor"
                  v-model="gestion.asesor"
                />
              </div>

              <label class="col-5 col-form-label">Tipo de tramite (*)</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Tipo de tramite"
                  v-model="gestion.tipotramite"
                />
              </div>

              <label class="col-5 col-form-label">Asunto de tramite (*)</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Asunto de tramite"
                  v-model="gestion.asuntotramite"
                />
              </div>

              <label class="col-5 col-form-label">Motivo de archivo (*)</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Motivo de archivo"
                  v-model="gestion.motivoarchivo"
                />
              </div>

              <label class="col-5 col-form-label">Fecha de archivo (*)</label>
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Fecha de archivo"
                  type="date"
                  v-model="gestion.fechaarchivo"
                />
              </div>
              <label class="col-5 col-form-label"
                >Entidad del tramite (*)</label
              >
              <div class="col-12 form-group">
                <input
                  class="form-control"
                  placeholder="Entidad del tramite"
                  v-model="gestion.entidadelantramite"
                />
              </div>

              <label class="col-5 col-form-label">Observaciones (*)</label>
              <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                  class="form-control"
                  v-model="gestion.obsrvtramite"
                >
                </textarea>
              </div>

              <label class="col-5 col-form-label"
                >Actuaciones realizadas (*)</label
              >
              <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                  class="form-control"
                  v-model="gestion.actuarealizadas"
                >
                </textarea>
              </div>

              <label class="col-5 col-form-label"
                >Actuaciones jurídicas realizadas (*)
              </label>
              <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                  class="form-control"
                  v-model="gestion.actjuridirealzadas"
                >
                </textarea>
              </div>

              <label class="col-5 col-form-label"
                >Resultado de actuación (*)</label
              >
              <div class="col-12 form-group">
                <textarea
                  rows="3"
                  cols="50"
                  type="text"
                  class="form-control"
                  v-model="gestion.resulactuacion"
                >
                </textarea>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Cerrar
              </button>
              <button
                type="button"
                class="btn btn-primary"
                @click="agregargestion()"
                data-dismiss="modal"
              >
                Guardar Cambios
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--modal de asignar gestion -->
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

              <label class="col-12 col-form-label">Tramite Jurídico:</label>
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
    </div>
  </div>
</template>

<script >
export default {
  data() {
    return {
      foro: {
        id: "",
        titulo: "",
        descripcion: "",
        estadoFo: "",
        area: {
          id: "",
          nombre: "",
        },

        usuario: {
          username: "",
          email: "",
          password: "",
          rol_id: "",
          per_id: "",
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

      observaciones: {
        id: "",
        obsrv: "",
        recp_id: "",
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
        reclamante: {
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
            direc: "",
          },
        },

        area: {
          id: "",
          nombre: "",
        },
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
        fechpriact: "",
        n_act: "",
        n_aseso: "",
        n_autor: "",
        asesor: "",
      },

      esta: false,
      estado: "disable",
      recepcioness: [],
      errors: [],
      foross: [],
    };
  },
  created() {
    axios.get("/api/recepcionest").then((res) => {
      this.recepcioness = res.data;
    });
  },
  methods: {
    isFormValidForo: function () {
      return this.foro.id != "";
    },
    limpiame() {
      this.usurecep.usuario.persona = "";
    },

    limpiarforo() {
      this.foro.estadoFo = "";
      this.foro.id = "";
      this.foro.titulo = "";
      this.foro.descripcion = "";
    },

    buscaForo() {
      console.log(this.recepcion.area_id);
      axios.get("/api/forobusq/" + this.recepcion.area_id).then((res) => {
        if (res.data[0] == null) {
          swal({
            type: "error",
            timer: 20000,
            title: "NO TIENES UN FORO DISPONIBLE",
            text: "El docente de esta Area no tiene foros activos",
            showConfirmButton: true,
          });

          console.log(res.data[0]);
          this.esta = false;
        } else {
          console.log(res.data[0]);
          let forito = res.data[0];
          this.foro = forito;
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

    limpiar() {
      (this.usurecep.usuario.persona.cedula = ""),
        (this.usurecep.usuario.persona.prinom = ""),
        (this.usurecep.usuario.persona.segnom = ""),
        (this.usurecep.usuario.persona.priape = ""),
        (this.usurecep.usuario.persona.segape = "");
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

    agregar() {
      const params = {
        recepcionado: this.recepcion.recepcionado,
        fecharadicado: this.recepcion.fecharadicado,
        fecharecepcionado: this.recepcion.fecharecepcionado,
        consultorio: this.recepcion.consultorio,
        fechareparto: this.recepcion.fechareparto,
        fechapublicacion: this.recepcion.fechapublicacion,
        fecharetiro: this.recepcion.fecharetiro,
        recla_id: this.recepcion.reclamante.id,
        estado: this.recepcion.estado,
        area_id: this.recepcion.area.id,
      };
      this.recepcion.recepcionado = "";
      this.recepcion.fecharadicado = "";
      this.recepcion.fecharecepcionado = "";
      this.recepcion.consultorio = "";
      this.recepcion.fechareparto = "";
      this.recepcion.fechapublicacion = "";
      this.recepcion.fecharetiro = "";
      this.recepcion.reclamante = "";
      this.recepcion.area = "";
      this.recepcion.estado = "";

      axios.post("/api/recepcion", params).then((res) => {
        if (res.data == null) {
          alert("La recepcion No se registro porque tiene errores");
        } else {
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "¡La recepción se ha registrado con EXITO!!",
            showConfirmButton: false,
          });
        }
        this.recepcioness.push(res.data);
      });
    },

    ver() {
      Swal.fire("Good job!", "You clicked the button!", "success");
    },

    agregargestion() {
      if (
        !this.gestion.amplhechos ||
        // !this.gestion.fechentrevasesor ||
        !this.gestion.tipotramite ||
        !this.gestion.asuntotramite ||
        !this.gestion.motivoarchivo ||
        // !this.gestion.fechaarchivo ||
        !this.gestion.obsrvtramite ||
        !this.gestion.actuarealizadas ||
        !this.gestion.actjuridirealzadas ||
        !this.gestion.resulactuacion ||
        !this.gestion.entidadelantramite ||
        !this.recepcion.id ||
        // !this.gestion.fechpriact ||
        !this.gestion.n_act ||
        !this.gestion.n_aseso ||
        !this.gestion.n_autor ||
        !this.gestion.asesor
      ) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios estan marcados con un (*)",
          showConfirmButton: true,
        });
      } else {
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
          recp_id: this.recepcion.id,
          fechpriact: this.gestion.fechpriact,
          n_act: this.gestion.n_act,
          n_aseso: this.gestion.n_aseso,
          n_autor: this.gestion.n_autor,
          asesor: this.gestion.asesor,
        };

        axios.post("/api/gestion", params).then((res) => {
          if (res.data == null) {
            alert("La Gestión NO se ha registrado");
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "¡La Gestión se ha registrado Exitosamente en el Caso!!",
              showConfirmButton: false,
            });
          }
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
          this.gestion.fechpriact = "";
          this.gestion.n_act = "";
          this.gestion.n_aseso = "";
          this.gestion.n_autor = "";
          this.gestion.asesor = "";
        });
      }
    },

    eliminar(recepcion, index) {
      const confirmacion = confirm(
        `Confirma Eliminar Recepcion del area de: ${recepcion.area.nombre}`
      );
      if (confirmacion) {
        axios.delete("/api/recepcion/" + recepcion.id).then(() => {
          this.recepcioness.splice(index, 1);
          alert("La recepción se ha eliminado con exito");
        });
      }
    },

    editarForm(recepcion, index) {
      this.recepcion = recepcion;
      this.recepcion.index = index;
    },
    editar() {
      const params = {
        obsrv: this.observaciones.obsrv,
        recp_id: this.recepcion.id,
      };

      axios.post("/api/observaciones", params).then((res) => {
        if (res.data == null) {
          alert("La Observacion No se registro porque tiene errores");
        } else {
          alert("La Observacion se ha registrado con EXITO");
        }
      });
    },
  },
};
</script>