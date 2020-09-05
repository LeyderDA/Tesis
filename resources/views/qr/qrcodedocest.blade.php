
@extends('layouts.app')
@section('content')

      <center>
        <!--------------------------------------------->
        <div class="card" style="width: 350px;">
            <div class="card-header">
              MOSTRANDO QR LISTO PARA ESCANEAR
            </div>
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p>
                {!!QrCode::size(300)->generate("$id") !!}
              </p>
                <a href="/RecepDoc"  class="btn btn-primary">Volver</a>
            </div>
          </div>
        <!--------------------------------------------->
      </center>

@endsection
