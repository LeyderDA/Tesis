<template>
  <div class="card" style="margin-top: 25px">
    <div>
      <h2 class="text-center mb-2 card-title">Listado de gestiones</h2>
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
                      <th>Fecha entrevista Asesor</th>
                      <th>Asunto</th>
                      <th>Tipo de tramite</th>
                      <th>Motivo de archivo</th>
                      <th>Fecha del archivo</th>
                      <th>Entidad reclamante</th>
                      <th>Ver los otros campos</th>
                      <th>Recepción</th>
                      <th>Opciones</th>
                      <th>Agregar Archivos</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(gestion, index) in gestioness"
                      :key="gestion.index"
                    >
                      <td>{{ gestion.fechentrevasesor }}</td>
                      <td>{{ gestion.asuntotramite }}</td>
                      <td>{{ gestion.tipotramite }}</td>
                      <td>{{ gestion.motivoarchivo }}</td>
                      <td>{{ gestion.fechaarchivo }}</td>
                      <td>{{ gestion.entidadelantramite }}</td>
                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#MOSTRARModalResto"
                          @click="editarForm(gestion, index)"
                          title="Mostrar el resto de datos de la Gestión"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>
                      <td>
                        <button
                          class="btn btn-sm"
                          data-toggle="modal"
                          data-target="#MOSTRARModalRecp"
                          @click="editarForm(gestion, index)"
                          title="Mostrar el resto de datos de la Gestión"
                        >
                          <i class="fas fa-eye fa-2x" style="color: black"></i>
                        </button>
                      </td>
                      <td>
                        <button
                          class="btn btn-success btn-sm"
                          data-toggle="modal"
                          data-target="#editarModal"
                          @click="editarForm(gestion, index)"
                        >
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button
                          class="btn btn-danger btn-sm"
                          @click="eliminar(gestion, index)"
                        >
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                      <td>
                        <a :href="'/add_archivosGesti/' + gestion.id">
                          <i
                            title="Agregar Archivos"
                            class="fas fa-save fa-2x"
                            style="color: black"
                          ></i>
                        </a>

                        <a :href="'/view_arch_gest/' + gestion.id">
                          <i
                            title="Ir a los archivos"
                            class="fas fa-arrow-alt-circle-right fa-2x"
                            style="color: black"
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
        <div
          class="modal fade"
          id="editarModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Editar Gestion
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
                    v-model="gestion.id"
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

                <label class="col-5 col-form-label"
                  >Primera Actuación (*)</label
                >
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

                <label class="col-5 col-form-label"
                  >Asunto de tramite (*)</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Asunto de tramite"
                    v-model="gestion.asuntotramite"
                  />
                </div>

                <label class="col-5 col-form-label"
                  >Motivo de archivo (*)</label
                >
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
                  @click="editar()"
                  data-dismiss="modal"
                >
                  Guardar Cambios
                </button>
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
                <h5 class="modal-title" id="exampleModalLabel">
                  Mostrar Recepcion
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
                <label class="col-12 col-form-label">ID</label>
                <input placeholder="ID" v-model="gestion.recepcion.id" />

                <label class="col-12 col-form-label">Recepcionado</label>
                <input
                  placeholder="Recepcionado"
                  v-model="gestion.recepcion.recepcionado"
                />

                <label class="col-12 col-form-label">Fecha de Radicado</label>
                <input
                  placeholder="Fecha de Radicado"
                  v-model="gestion.recepcion.fecharadicado"
                />

                <label class="col-12 col-form-label">Fecha Recepcionado</label>
                <input
                  placeholder="Fecha Recepcionado"
                  v-model="gestion.recepcion.fecharecepcionado"
                />

                <label class="col-12 col-form-label">Consultorio</label>
                <input
                  placeholder="Consultorio"
                  v-model="gestion.recepcion.consultorio"
                />

                <label class="col-12 col-form-label">Fecha Reparto</label>
                <input
                  placeholder="Fecha Reparto"
                  v-model="gestion.recepcion.fechareparto"
                />

                <label class="col-12 col-form-label">Fecha Publicación</label>
                <input
                  placeholder="Fecha Publicación"
                  v-model="gestion.recepcion.fechapublicacion"
                />

                <label class="col-12 col-form-label">Fecha Retiro</label>
                <input
                  placeholder="Fecha Retiro"
                  v-model="gestion.recepcion.fecharetiro"
                />
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-dismiss="modal"
                >
                  Cerrar
                </button>
              </div>
            </div>
          </div>
        </div>
        <!--cierro modal de buscar -->

        <!--modal de MOSTRAR RESTO DE CAMPOS-->
        <div
          class="modal fade"
          id="MOSTRARModalResto"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gestión</h5>
              </div>
              <div class="modal-body">
                <div class="col-12 form-group">
                  <input
                    type="hidden"
                    class="form-control"
                    placeholder="Recepción"
                    v-model="gestion.recepcion.id"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label"
                  >Primera Actuación (*)</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    type="date"
                    v-model="gestion.fechpriact"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">N.Actuaciones (*)</label>
                <div class="col-12 form-group">
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Entidad del tramite"
                    v-model="gestion.n_act"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">N.Asesorias (*)</label>
                <div class="col-12 form-group">
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Entidad del tramite"
                    v-model="gestion.n_aseso"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label"
                  >N.Autorizaciones (*)</label
                >
                <div class="col-12 form-group">
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Entidad del tramite"
                    v-model="gestion.n_autor"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">Asesor (*)</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Entidad del tramite"
                    v-model="gestion.asesor"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label"
                  >Ampliación de hechos</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Ampliación de hechos"
                    v-model="gestion.amplhechos"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">Observaciones</label>

                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="gestion.obsrvtramite"
                    disabled
                  >
                  </textarea>
                </div>

                <label class="col-12 col-form-label"
                  >Actuaciones Realizadas</label
                >

                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="gestion.actuarealizadas"
                    disabled
                  >
                  </textarea>
                </div>

                <label class="col-12 col-form-label"
                  >Actuaciones Juridicas</label
                >

                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="gestion.actjuridirealzadas"
                    disabled
                  >
                  </textarea>
                </div>

                <label class="col-12 col-form-label"
                  >Resultado de actuación</label
                >

                <div class="col-12 form-group">
                  <textarea
                    rows="3"
                    cols="50"
                    type="text"
                    class="form-control"
                    v-model="gestion.resulactuacion"
                    disabled
                  >
                  </textarea>
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
        <!--modal de MOSTRAR RESTO DE CAMPOS -->

        <!--modal de MOSTRAR recepcion-->
        <div
          class="modal fade"
          id="MOSTRARModalRecp"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Datos de la Recepción
                </h5>
              </div>
              <div class="modal-body">
                <label class="col-5 col-form-label">Estado</label>
                <br />
                <div class="col-12">
                  <select
                    class="form-control"
                    placeholder="Estado"
                    type="boolean"
                    v-model="gestion.estado"
                    disabled
                  >
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
                <label class="col-5 col-form-label">Area:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="gestion.nombre"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Fecha de radicado:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fecharadicado"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label"
                  >Fecha de recepcionado:</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fecharecepcionado"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Fecha de reparto:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fechareparto"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label"
                  >Fecha de publicación:</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fechapublicacion"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Fecha de retiro</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    type="date"
                    v-model="gestion.fecharetiro"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Recepcionado en:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="gestion.recepcionado"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Consultorio:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="gestion.consultorio"
                    disabled
                  />
                </div>

                <label class="col-5 col-form-label">Nota primer Corte:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Nota primer Corte"
                    v-model="gestion.notpricort"
                    disabled
                  />
                </div>
                <label class="col-5 col-form-label">Nota segundo Corte:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Nota segundo Corte"
                    v-model="gestion.notsegcort"
                    disabled
                  />
                </div>
                <label class="col-5 col-form-label">Nota tercer Corte:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="Nota tercer Corte"
                    v-model="gestion.nottercort"
                    disabled
                  />
                </div>
                     <label class="col-12 col-form-label"
                  >Institución Jurídica:</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="gestion.instjuri"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Trámite Jurídico:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="recepcion"
                    v-model="gestion.tramitejuri"
                    disabled
                  />
                </div>
                <br />
                <label class="col-12 col-form-label"
                  >Abogado en formación quien recepciona:</label
                >
                <br />
                <center>
                  <button
                    class="btn btn-sm"
                    data-toggle="modal"
                    data-target="#MOSTRARModalRECEP"
                    @click="editarForm(gestion)"
                    title="Mostrar quien recepciona"
                  >
                    <i class="fas fa-user fa-3x" style="color: black"></i>
                  </button>
                </center>

                <br />

                <label class="col-5 col-form-label">Usuario:</label>

                <center>
                  <button
                    class="btn btn-sm"
                    data-toggle="modal"
                    data-target="#MOSTRARModalRECLAMANTE"
                    @click="editarForm(gestion, index)"
                    title="Mostrar los datos del usuario"
                  >
                    <i class="fas fa-user fa-3x" style="color: black"></i>
                  </button>
                </center>

                <br />
                <label class="col-12 col-form-label"
                  >Abogado en formación asignado:
                </label>
                <center>
                  <a
                    :href="'/HojaDeVidaROLES/' + gestion.usu_id"
                    target="_blank"
                    ><i
                      title="Ver Usuario"
                      class="fas fa-user fa-3x"
                      style="color: black"
                    ></i
                  ></a>
                </center>
                <br />
                <label class="col-12 col-form-label">Docente:</label>
                <br />
                <center>
                  <button
                    class="btn btn-sm"
                    data-toggle="modal"
                    data-target="#MOSTRARModalDOC"
                    @click="editarForm(gestion)"
                    title="Mostrar docente"
                  >
                    <i class="fas fa-user fa-3x" style="color: black"></i>
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
        <!--modal de MOSTRAR recepcion -->
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
                      :href="'/HojaDeVidaR/' + gestion.recla_id"
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
                    placeholder="email"
                    v-model="gestion.email"
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
                    v-model="gestion.prinom"
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
                    v-model="gestion.priape"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label"
                  >Enfoque diferencial:</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="enfoque diferencial"
                    v-model="gestion.enfodifervictima"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Genero:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="genero"
                    v-model="gestion.genevictima"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Edad:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="edad"
                    v-model="gestion.edadvictima"
                    disabled
                  />
                </div>
                <label class="col-12 col-form-label">Discapacidad:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="discapacidad"
                    v-model="gestion.discapavictima"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">Estrato:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="estrato"
                    v-model="gestion.estravictima"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">Embarazo:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="embarazo"
                    v-model="gestion.embaravictima"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label">Grupo Etnico:</label>
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="grupo etnico"
                    v-model="gestion.grupetnicovictima"
                    disabled
                  />
                </div>

                <label class="col-12 col-form-label"
                  >Entidad que reclama:</label
                >
                <div class="col-12 form-group">
                  <input
                    class="form-control"
                    placeholder="entidad"
                    v-model="gestion.persoentidreclama"
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
                <h5 class="modal-title" id="exampleModalLabel">
                  Buscar Docente
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
                  v-model="gestion.recp_id"
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
                  v-model="gestion.recp_id"
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


        <!--modal de AGREGAR ARCHIVOS -->
        <div
          class="modal fade"
          id="AGGARCH"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Datos de la Recepción
                </h5>
              </div>
              <div class="modal-body">
                <div class="col-12 form-group">
                  <input
                    type="hidden"
                    class="form-control"
                    v-model="gestion.id"
                  />
                </div>
                <label class="col-12 col-form-label">Agregar Archivos </label>
                <label class="col-12 col-form-label">
                  <i class="fas fa-image fa-2x"></i>
                  <i class="fas fa-file-pdf fa-2x"></i>
                  <i class="fas fa-file-word fa-2x"></i>
                  <i class="fas fa-file-excel fa-2x"></i>
                </label>
                <div class="col-12 form-group">
                  <vue-dropzone
                    ref="myVueDropzone"
                    id="dropzone"
                    :options="dropzoneOptions"
                  ></vue-dropzone>
                </div>

                <div class="col-12 form-group">
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
                      @click="agregarArchivo()"
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
        <!--modal de AGREGAR ARCHIVOS -->
      </div>
    </div>
  </div>
</template>
<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
  components: {
    vueDropzone: vue2Dropzone,
  },
  data() {
    return {
     
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
      archivosGestiones: {
        archivoGe: "",
        ges_id: "",
      },
      esta: false,
      gestioness: [],

      errors: [],
    };
  },
  created() {
    axios.get("/api/gestion").then((res) => {
      this.gestioness = res.data;
    });
  },
  methods: {
    agregarArchivo() {
      if (!this.gestion.id) {
        swal({
          type: "error",
          timer: 20000,
          title: "TE FALTA LLENAR CAMPOS OBLIGATORIOS",
          text: "Los campos obligatorios son necesarios",
          showConfirmButton: true,
        });
      } else {
        this.$refs.myVueDropzone.processQueue();
        let imagen = this.$refs.myVueDropzone.getAcceptedFiles();

        const params = {
          ges_id: this.gestion.id,
          archivoGe: imagen.length > 0 ? imagen[0].name : "",
        };

        this.gestion.id = "";

        axios.post("/api/archivoges", params).then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "El archivo no se ha agregado con exito",
              showConfirmButton: false,
            });
          } else {
            this.$refs.myVueDropzone.removeAllFiles(true);
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "El archivo se a guardado",
              showConfirmButton: false,
            });
            axios.get("/api/gestion").then((res) => {
              this.gestioness = res.data;
            });
          }
        });
      }
    },
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

    eliminar(gestion, index) {
      console.log(gestion);
      const confirmacion = confirm(
        `Confirma Eliminar la Gestión con el asunto: ${gestion.asuntotramite}`
      );
      if (confirmacion) {
        const params = {
          gest_id: gestion.id,
          amplhechos: gestion.amplhechos,
          fechentrevasesor: gestion.fechentrevasesor,
          tipotramite: gestion.tipotramite,
          asuntotramite: gestion.asuntotramite,
          motivoarchivo: gestion.motivoarchivo,
          fechaarchivo: gestion.fechaarchivo,
          obsrvtramite: gestion.obsrvtramite,
          actuarealizadas: gestion.actuarealizadas,
          actjuridirealzadas: gestion.actjuridirealzadas,
          resulactuacion: gestion.resulactuacion,
          entidadelantramite: gestion.entidadelantramite,
          recp_id: gestion.recp_id,
          fechpriact: gestion.fechpriact,
          n_act: gestion.n_act,
          n_aseso: gestion.n_aseso,
          n_autor: gestion.n_autor,
          asesor: gestion.asesor,
        };

        axios.post("/api/gestionRespaldo", params).then((res) => {
          if (res.data == null) {
            // alert("La Gestión NO se ha registrado");
          } else {
            // swal({
            //   type: "success",
            //   timer: 3000,
            //   title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            //   text: "¡La Gestión se ha registrado Exitosamente en el Caso!!",
            //   showConfirmButton: false,
            // });
          }
        });

        axios.delete("/api/gestion/" + gestion.id).then(() => {
          this.gestioness.splice(index, 1);
          swal({
            type: "success",
            timer: 3000,
            title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
            text: "La Gestión se ha eliminado con exito",
            showConfirmButton: false,
          });
        });
      }
    },
        buscarrecep() {
      axios.get("/api/recepcionRE/" + this.gestion.recp_id).then((res) => {
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
      axios.get("/api/recepcionDO/" + this.gestion.recp_id).then((res) => {
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
    limpiame() {
      this.usurecep.usuario.persona = "";
    },
    editarForm(gestion, index) {
      this.gestion = gestion;
      this.gestion.index = index;
    },
    editar() {
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
        fechpriact: this.gestion.fechpriact,
        n_act: this.gestion.n_act,
        n_aseso: this.gestion.n_aseso,
        n_autor: this.gestion.n_autor,
        asesor: this.gestion.asesor,
      };
      axios
        .put("/api/gestion/" + this.gestion.id, params)
        .then((res) => {
          if (res.data == null) {
            swal({
              type: "error",
              timer: 3000,
              title: "PARECE QUE HAY UN ERROR",
              text: "La gestión no se ha actualizado",
              showConfirmButton: false,
            });
          } else {
            swal({
              type: "success",
              timer: 3000,
              title: "EL PROCESO SE REALIZÓ SATISFACTORIAMENTE",
              text: "La Gestión se ha actualizado con EXITO",
              showConfirmButton: false,
            });
          }
          axios.get("/api/gestionSUPER").then((res) => {
            this.gestioness = res.data;
          });
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            //let mensaje='Error con alguno de los campos';

            alert(this.errors.asuntotramite[0]);
          }
        });
    },
  },
};
</script>