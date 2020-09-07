@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="card-body col">
      <div clas="container row">
        <div class="table text-center table-reponsive">
          <table class="table text-center">
            <caption>Datos traidos de la tabla de Observaciones</caption>
            <div>
                <h2 class="text-center mb-2 card-title">Gestiones asignadas a la Recepción</h2>
            </div>
            <thead>
              <tr>
                <th>Observación</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($recepcion as $recep)
              <tr > 
                <td>{{$recep->obsrv}}</td>                  
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