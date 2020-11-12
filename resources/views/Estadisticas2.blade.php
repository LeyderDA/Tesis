<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .nav-link{
            color:#000;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .nav-link:hover{
            background-color:#929292;
            border-radius: 0px;
            color:#fff;
            font-weight: bold;
            height: 30px;
        }
     
    </style>

</head>

@section('content')
<div style="background-color:#ad3333"> 
     <div style="height:30px; width:100%; background-color:#003366"></div>

          <div class="container" style="margin-top:-24px; height:30px">
              <div>
              <br />
              <br />
              <br />   
<div class="row col-5" style="width: 500px; height:500px">
    <canvas id="myChart" width="500" height="400"></canvas>  
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <script>
    
        <?php echo $script_graficar2 ?>
       

</script>




    <center>
        <a href="/home"  class="btn btn-primary">Volver</a>
    </center>




