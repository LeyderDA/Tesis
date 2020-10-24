@extends('layouts.app')
@section('content')

<div class="card">
    <div>
      <br />
      <h1 class="text-center mb-2 card-title">Título del Foro: {{$foro->titulo}}</h1>
    </div>
    <div class="card-body row">     
      <br />
      <div class="container">
          <div class="card-body col">
            <div clas="container row">
              <div class="table text-center table-reponsive">                   
                <h4 class="text-center mb-2 card-title">Descripción del foro: {{$foro->descripcion}}</h4>
               
                    <button
                      class="btn btn-sm"
                      data-toggle="modal"
                      data-target="#AGGCOMENTARIO"
                      title="Agregar Comentario al Foro"
                    >
                      <i class="far fa-comments fa-3x" style="color: black"></i>
                    </button>
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
                    Guardar Cambios
                  </button>
                </div>
              </div>
            </div>
 <!--modal de asignar comentario -->
          </div>         
       </div>
    </div>

<a href="/home"  class="btn btn-primary">Volver</a>
@endsection