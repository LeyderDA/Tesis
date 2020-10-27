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
                                <h3 class="mb-2 card-title">Descripción del foro:</h3>
                              <label class="col-12 col-form-label">{{$foro->descripcion}}</label>
                              <br>
                              <br>
                              <h5 class="mb-2 card-title">Documentos del foro<a href="/{{$foro->archivo}}" target="_blank"></h5>                           
                               <?php 
                                $pizza  = $foro->archivo ;
                                $porciones = explode("/", $pizza);
                                $part1 = $porciones[0]; 
                                $part2 = $porciones[1];
                                $part3 = $porciones[2];
                                  echo $part3; // porción3
                                ?>
                            </a>
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
                                <br>
                                <h4 class="mb-2 card-title">    Comentarios </h4>
                                <br>                             
                                     
                                    <p> 
                                      <?php $content = DB::table('comentario')->select('coment','usua_id')->where('for_id',$foro->id)->get(); ?>
                                            @foreach($content as $contenido)
                                                  {{$contenido->coment}} 
                                                                                            
                                                        <?php $content1 = DB::table('users')->select('username')->where('id',$contenido->usua_id)->get(); ?>
                                                          @foreach($content1 as $contenido1)
                                                          <br>
                                                          
                                                          <i class="fas fa-user fa-1x"></i>
                                                          
                                                            {{$contenido1->username}}
                                                              
                                                        <br>
                                                        @endforeach 
                                                          
                                            <br>
                                          @endforeach    
                                      </p>                              
                                                                          
                                  
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
                  <form action="{{ url('/comentarios/crear') }}" method="post">
                    {{ csrf_field() }}
                  <input type="hidden" name="for_id" value="{{$foro->id}}">
                  <label class="col-5 col-form-label">Comentario</label>
                  <div class="col-12 form-group">
                    <textarea
                      name="coment"
                      rows="3"
                      cols="50"
                      type="text"
                      class="form-control"
                    >
                    </textarea>
                    <button type="submit" class="btn btn-primary">Submit</button>

                    {{-- <button
                    type="submit"
                    class="btn btn-primary"
                    data-dismiss="modal"
                  >
                    Agregar Comentario
                  </button> --}}
                  </form>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Cerrar
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

