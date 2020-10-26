@extends('layouts.app')
@section('content')
<div style="background-color:#dadada">

          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
              <br />   
              <h1 class="text-center mb-2 card-title">Título del Foro: {{$foro->titulo}}</h1>
                  </div>
                  <div class="card-body row">     
                    <br />
                    <div class="container">
                        <div class="card-body col">
                          <div clas="container row">
                            <div class="table table-reponsive">     

                                <h4 class="mb-2 card-title">Descripción del foro:</h4>
                              <label class="col-12 col-form-label">{{$foro->descripcion}}</label>
                              <br>
                              <br>

                              <h4 class="mb-2 card-title">    Agregar Comentario 
                                    <button
                                      class="btn btn-sm"
                                      data-toggle="modal"
                                      data-target="#AGGCOMENTARIO"
                                      title="Agregar Comentario al Foro"
                                      >
                                      <i class="far fa-comments fa-2x" style="color: black"></i>
                                      </button>
                                </h4>                              
                          </div>
                        </div>
                      </div>
            <!--modal de asignar comentario -->
            <div
            class="modal fade"
            id="AGGCOMENTARIO"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar Comentario</h5>
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
                  <label class="col-5 col-form-label">Comentario</label>
                  <div class="col-12 form-group">
                    <textarea
                      rows="3"
                      cols="50"
                      type="text"
                      class="form-control"
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
                    data-dismiss="modal"
                  >
                    Agregar Comentario
                  </button>
                </div>
              </div>
            </div>
            <!--modal de asignar comentario -->
          </div> 
          <center> 
            <a href="/home"  class="btn btn-primary"  >Salir</a>
          </center>        
       </div>
      </div>
      </div> 
      <div style="height:6px; width:100%; background-color:#ad3333"></div>
@endsection

