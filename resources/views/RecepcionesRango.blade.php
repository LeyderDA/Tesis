

<h5 class="text mb-2 card-title">fecha: {{$FechaIni}}</h5>
<h5 class="text mb-2 card-title">fecha: {{$FechaFin}}</h5>

@extends('layouts.app')
@section('content')
<div style="background-color:#003366">
          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
              <br />   
              <h1 class="text-center mb-2 card-title">Consulta</h1>
                  </div>
                  <div class="card-body row">     
                
                    <div class="container">
                        <div class="card-body col">
                          <div clas="container row">
                            <div class="table table-reponsive">                                                
                              <?php $content = DB::table('recepciones')->select('consultorio')->where('created_at','>=',$FechaIni)->where('created_at','<=',$FechaFin)
                              ->get(); ?>                              
                              @foreach($content as $contenido)                             
                                         
                             <center>
                                {{$contenido->consultorio}}
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

