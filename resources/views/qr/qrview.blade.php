@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="card-body col">
      <div clas="container row">
        <div class="table text-center table-reponsive">
          <table class="table text-center">
            <caption>Datos traidos de la tabla de Gestiones</caption>
            <div>
                <h2 class="text-center mb-2 card-title">Gestiones asignadas a la Recepción</h2>
            </div>
            <thead>
              <tr>
                <th>Ampliación de hechos</th>
                <th>Fecha entrevista Asesor</th>
                <th>Tipo de tramite</th>
                <th>Asunto del tramite</th>
                <th>Motivo de archivo</th>
                <th>Fecha del archivo</th>
                <th>Observaciones</th>
                <th>Actuaciones realizadas</th>
                <th>Actuaciones Juridicas</th>
                <th>Resultados de la actuación</th>
                <th>Entidad reclamante</th>   
              </tr>
            </thead>
            <tbody>
                @foreach ($recepcion as $recep)
              <tr >
                <td>{{$recep->amplhechos}}</td>
                <td>{{$recep->fechentrevasesor}}</td>
                <td>{{$recep->tipotramite}}</td>
                <td>{{$recep->asuntotramite}}</td>
                <td>{{$recep->motivoarchivo}}</td>
                <td>{{$recep->fechaarchivo}}</td>
                <td>{{$recep->obsrvtramite}}</td>
                <td>{{$recep->actuarealizadas}}</td>
                <td>{{$recep->actjuridirealzadas}}</td>
                <td>{{$recep->resulactuacion}}</td>
                <td>{{$recep->entidadelantramite}}</td>
                
                               
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <a href="/home"  class="btn btn-primary">Volver</a>
</div>
  @endsection