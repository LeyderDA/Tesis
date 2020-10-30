@extends('layouts.app')
@section('content')
<div style="background-color:#dadada">
          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
                
              <h1 class="text-center mb-2 card-title">Archivos de la Gestión</h1>     
                  </div>
                  <div class="card-body row">             
                    <div class="container">
                        <div class="card-body col">
                          <div clas="container row">
                            <div class="table table-reponsive">                                           
                              <center>
                                <?php $content = DB::table('archivos_gestiones')->select('id','archivoGe')->where('ges_id',$Gest->id)->get(); ?>                              
                                @foreach($content as $contenido)                             
                                <h1 class="mb-2 card-title"><a href="/{{$contenido->archivoGe}}" target="_blank"></h1>                           
                                  <?php 
                                   $pizza  = $contenido->archivoGe;
                                   $porciones = explode("/", $pizza);
                                   $part1 = $porciones[0]; 
                                   $part2 = $porciones[1];
                                   $part3 = $porciones[2];
                                     echo $part3; // porción3
                                   ?>
                               </a>          
                              @endforeach 
                              </center> 
                              <br>                                                             
                          </div>
                        </div>
                      </div>
                      <center> 
                        <a href="/home"  class="btn btn-primary"  >Salir</a>
                      </center>
          </div>       
       </div>
      </div>
      </div> 
      <div style="height:6px; width:100%; background-color:#ad3333"></div>
@endsection

