

@extends('layouts.app')
@section('content')

    <div style="height:30px; width:100%; background-color:#003366"></div>
<div style="height:6px; width:100%; background-color:#ad3333"></div>
 
    <div class="container">
        <div class="row">
            <div class="card-body col">
              <div clas="container row">
                <div class="table text-center table-reponsive">
                  <table id="figuras" class="table text-center">
                    <caption>Datos traidos de la tabla de Recepciones</caption>
                    <div>
                        <h2 class="text-center mb-2 card-title">Recepciones</h2>
                    </div>
                    <thead>
                      <tr>
                        <th>recepcionado</th>
                        <th>fecha de recepcionado</th>
                        <th>fecha de radicado</th>
                        <th>consultorio</th>
                        <th>fechareparto</th>
                        <th>fechapublicacion</th>
                        <th>fecharetiro</th>
                        <th>estado</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $content = DB::table('recepciones')
                        ->select('recepcionado',
                        'fecharadicado',
                        'fecharecepcionado',
                        'consultorio',
                        'fechareparto',
                        'fechapublicacion',
                        'fecharetiro',
                        'estado'
        
                        )
                        ->where('created_at','>=',$FechaIni)->where('created_at','<=',$FechaFin)
                        ->get(); ?>                                                            
                        @foreach($content as $recep)                                             
                        <tr >                
                          <td>{{$recep->recepcionado}}</td>   
                          <td>{{$recep->fecharecepcionado}}</td>   
                          <td>{{$recep->fecharadicado}}</td>   
                          <td>{{$recep->consultorio}}</td>   
                          <td>{{$recep->fechareparto}}</td>  
                          <td>{{$recep->fechapublicacion}}</td>  
                          <td>{{$recep->fecharetiro}}</td>   
                          <td>{{$recep->estado}}</td>                                         
                        </tr>                             
                       </a>          
                      @endforeach
                        
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
          <a href="/Reportes"  class="btn btn-primary">Volver</a>
        </div>
    
@endsection


