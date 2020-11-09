@extends('layouts.app')
@section('content')
<div style="background-color:#003366">
          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
              <br />   
              <h1 class="text-center mb-2 card-title">Hoja de vida</h1>
                  </div>
                  <div class="card-body row">     
                    <br />
                    <div class="container">
                        <div class="card-body col">
                          <div clas="container row">
                            <div class="table table-reponsive">     
                                <h3 class="mb-2 card-title">Descripción del foro:</h3>
                              <label class="col-12 col-form-label">{{$User->username}}</label>
                              <br>
                              <br>
                              <h5>Archivos del Foro</h5>
                              <?php $content = DB::table('fotos_estudiantes')->select('id','Foto')->where('est_id',$User->id)->get(); ?>                              
                              @foreach($content as $contenido)                             
                              <h5 class="mb-2 card-title"><a href="/storage/ForoArchivos/{{$contenido->Foto}}" target="_blank"></h5>                           
                                <?php 
                                 $pizza  = $contenido->Foto;
                                 $porciones = explode("_", $pizza);
                                 $part1 = $porciones[0]; 
                                 $part2 = $porciones[1];                      
                                   echo $part2; // porción3
                                 ?>

                             <img src="/storage/FotosEstudiantes/{{$contenido->Foto}}">
                             </a>          
                            @endforeach 
                              
                              
                                

                          </div>
                        </div>
                      </div>
           
          </div> 
          <center> 
            <a href="/home"  class="btn btn-primary"  >Salir</a>
          </center>        
       </div>
      </div>
      </div> 
      <div style="height:6px; width:100%; background-color:#ad3333"></div>
@endsection

