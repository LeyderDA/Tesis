@extends('layouts.app')
   <body style="background-color:#003366;">
    @section('content')
    <div style="background-color:#dadada">
    <div class="container" style="margin-top:-24px; height:30px">
        <div class="row justify-content-center" >

            <div class="row justify-content-center">
            <!--<div class="col-md-12">-->
             <?php 
                session_start();
                $_SESSION['id_usuario'] = auth()->id();
              ?>
        
           <?php 
                if(auth()->User()->rol_id == 1){
                   echo '<principal-v/>';
                }else if(auth()->User()->rol_id == 2){
                   echo '<opcionesadmin-v/>';
                }else if(auth()->User()->rol_id == 3){
                   echo '<opcionesest-v/>';
                }else if(auth()->User()->rol_id == 4){
                   echo '<opcionesdoc-v/>';
                } 
            ?> 

            <!--</div>-->
            
        </div>
      </div>
    
      </div>
      <div style="height:6px; width:100%; background-color:#ad3333"></div>

    @endsection

</body>

