@extends('layouts.app')
@section('content')
<div style="background-color:#dadada">
          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
              <br />   
              <h1 class="text-center mb-2 card-title">Archivos del Reclamante</h1>
              <label class="col-12 col-form-label">{{$Recla->enfodifervictima}}</label>
                  </div>
                  <div class="card-body row">     
                    <br />
                    <div class="container">
                        <div class="card-body col">
                          <div clas="container row">
                            <div class="table table-reponsive">              
                              <br>
                              <br>
                              <?php $content = DB::table('archivos_reclamantes')->select('id','archivoRe')->where('recla_id',$Recla->id)->get(); ?>

                              @foreach($content as $contenido)
                              <p class="color">
                                    {{$contenido->id}}     
                                    {{$contenido->archivoRe}}                                   
                                         
                                </p>                                      
                            @endforeach  
                             
                              <br>
                                                             
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

