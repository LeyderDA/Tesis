@section('content')
<div style="background-color:#dadada">
     <div style="height:6px; width:100%; background-color:#ad3333"></div>

          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
              <br />   
<div class="row col-5" style="width: 500px; height:500px">
    <canvas id="myChart" width="400" height="400"></canvas>  
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
<?php echo $script_graficar ?>
</script>


<a href="/home"  class="btn btn-primary">Volver</a>




