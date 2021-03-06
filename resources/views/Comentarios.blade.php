@extends('layouts.app')
@section('content')
<div style="background-color:#003366">
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
                              <h5>Archivos del Foro</h5>
                              <?php $content = DB::table('archivos_foro')->select('id','archivoFo')->where('foro_id',$foro->id)->get(); ?>                              
                              @foreach($content as $contenido)                             
                              <h5 class="mb-2 card-title"><a href="/storage/ForoArchivos/{{$contenido->archivoFo}}" target="_blank"></h5>                           
                                <?php 
                                 $pizza  = $contenido->archivoFo;
                                 $porciones = explode("_", $pizza);
                                 $part1 = $porciones[0]; 
                                 $part2 = $porciones[1];                      
                                   echo $part2; // porción3
                                 ?>
                             </a>          
                            @endforeach 
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
                                <center>
                                  <h2 class="mb-2 card-title">Comentarios</h2>
                                </center>
                                
                                <br>
                                {{-- Link para acceder a los .css  --}}
                            
                                <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
                                <div  id="commentarea"> </div>
                              
                                <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                                <script type="text/javascript">
                                $(document).ready(function() {
                                    function changeNumber() {
                                        $.ajax({
                                            type: "GET",
                                            url: "/getComent/<?php echo $foro->id ?>",
                                            data: "_token = <?php echo csrf_token() ?>",
                                            success: function(data) {
                                                $('#commentarea').html(data);
                                            }
                                        });
                                    }
                                    setInterval(changeNumber, 3000);
                                });
                                </script>
                                

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
                  <form action="{{ url('/add_comentarios/'.$foro->id) }}" method="post">
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
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar Comentario</button>

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

