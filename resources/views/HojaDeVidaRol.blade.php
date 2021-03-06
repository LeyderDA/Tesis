@extends('layouts.app')
@section('content')
<div style="background-color:#003366">
          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
              <br />   
              <h1 class="mb-3 card-title">Datos</h1>
                  </div> 
                  <div class="card-body row">                     
                    <div class="container">
                        <div class="card-body col">
                          <div clas="container row">
                            <div class="table table-reponsive">                                                
                              <?php $content = DB::table('fotos_roles')->select('id','Fotorol')->where('usu_rol_id',$UserRol->id)->get(); ?>                              
                              @foreach($content as $contenido)                                                                                                  
                                <img src="/storage/FotosRoles/{{$contenido->Fotorol}}" width="200" height="200">                                                     
                             </a>          
                            @endforeach                               
                            <?php $per = DB::table('personas')->select('id','cedula','prinom','segnom','priape','segape','tel','direc')->where('id',$UserRol->per_id)->get(); ?>  
                            @foreach($per as $persona)                                                        
                                <br>
                                <br> 
                                <h5 class="text mb-2 card-title">Usuario: {{$UserRol->username}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Email: {{$UserRol->email}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Cédula: {{$persona->cedula}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Nombre: {{$persona->prinom}} {{$persona->segnom}}  {{$persona->priape}} {{$persona->segape}}</h5>
                                <br>                               
                                <h5 class="text mb-2 card-title">Celular: {{$persona->tel}}</h5>
                                <br>
                                <h5 class="text mb-2 card-title">Dirección: {{$persona->direc}}</h5>
                                <br>                                                                                                         
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

