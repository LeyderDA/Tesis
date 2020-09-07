@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="card-body col">
      <div clas="container row">
        <div class="table text-center table-reponsive">
          <table class="table text-center">
            <caption>Datos traidos de la tabla de Recepciones</caption>
            <div>
                <h2 class="text-center mb-2 card-title">Gestiones asignadas a la Recepción</h2>
            </div>
            <thead>
              <tr>
                <th>Fecha de Radicado</th>
                <th>Fecha de Recepcionado</th>
                <th>Fecha de Reparto</th>
                <th>Fecha de Publicación</th>
                <th>Fecha de Retiro</th>
                <th>Recepcionado en</th>
                <th>Consultorio</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($recepcion as $recep)
              <tr >
                <td>{{$recep->fecharadicado}}</td>
                <td>{{$recep->fecharecepcionado}}</td>
                <td>{{$recep->fechareparto}}</td>
                <td>{{$recep->fechapublicacion}}</td>
                <td>{{$recep->fecharetiro}}</td>
                <td>{{$recep->recepcionado}}</td>
                <td>{{$recep->consultorio}}</td>                                         
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