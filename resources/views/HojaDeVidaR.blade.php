@extends('layouts.app')
@section('content')
<div style="background-color:#003366">
          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
              <br />   
              <h1 class="text-center mb-2 card-title">Datos</h1>
                  </div>
                  <div class="card-body row">     
                
                    <div class="container">
                        <div class="card-body col">
                          <div clas="container row">
                            <div class="table table-reponsive">                                                
                              <?php $content = DB::table('fotos_estudiantes')->select('id','Foto')->where('est_id',$Reclamante->id)->get(); ?>                              
                              @foreach($content as $contenido)                             
                                         
                             <center>
                                <img src="/storage/FotosEstudiantes/{{$contenido->Foto}}" width="200" height="200">
                             </center>
                               
                             </a>          
                            @endforeach 
                              
                            <?php $per = DB::table('personas')->select('id','cedula','prinom','segnom','priape','segape','tel','direc')->where('id',$Reclamante->per_id)->get(); ?>  
                            @foreach($per as $persona)                             
                              <center>
                                <br>                  
                                <br>
                                <h5 class="text mb-2 card-title">Cédula: {{$persona->cedula}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Primer Nombre: {{$persona->prinom}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Segundo Nombre: {{$persona->segnom}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Primer Apellido: {{$persona->priape}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Segundo Apellido: {{$persona->segape}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Celular: {{$persona->tel}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Dirección: {{$persona->direc}}</h5>
                                <br>
                                  </center>                        
                          
                           
                           </a>          
                          @endforeach 

                          </div>
                        </div>
                      </div>
           
          </div> 
                
       </div>
      </div>
      </div> 
      <div style="height:6px; width:100%; background-color:#ad3333"></div>
@endsection

