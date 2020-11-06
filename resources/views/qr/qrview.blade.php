<head>
<meta charset="utf-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
  
<style type="text/css">
body{
  font-family:monospace;
  text-align:center;
}
#signArea{
      
  width:304px;
  margin: 50px auto;
}
.sign-container {
  width: 60%;
  margin: auto;
}
.sign-preview {
          
  width: 150px;
  height: 50px;
  border: solid 1px #CFCFCF;
  margin: 10px 5px;
}
.tag-ingo {
          
  font-family: cursive;
  font-size: 12px;
  text-align: left;
  font-style: oblique;
}
</style>

</head>

@extends('layouts.app')
@section('content')
<div  class="container">
<div class="row">
    <div  class="card-body col">
      <div clas="container row">
        <div class="table text-center table-reponsive">
          <table id="figuras" class="table text-center">
           
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
          <font face="arial">
            <input type="button" class="btn btn-primary" id="btnSave2" value="Descargar Reporte">
        </font>
        </div>
      </div>
    </div>
  </div>  
  <a href="/home"  class="btn btn-primary">Volver</a>
</div>

<script>
  document.getElementById('figuras').contentEditable = 'true';document.getElementById('figuras').designMode='on';
  $(function() {
    $("#btnSave2").click(function() {
      html2canvas($("#figuras"), {
        onrendered: function(canvas) {
          saveAs(canvas.toDataURL(), 'Report_Gest_Recep.png');
        }
      });
    });
    function saveAs(uri, filename) {
      var link = document.createElement('a');
      if (typeof link.download === 'string') {
        link.href = uri;
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      } else {
        window.open(uri);
      }
    }
  });
  </script>
   

  @endsection