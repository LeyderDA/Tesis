@extends('layouts.app')
<body style="background-color:#003366;">
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
        
            
            </div>
            <div class="row justify-content-center">
            <div class="col-md-12">
        
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

            </div>
            
        </div>
    </div>
    @endsection

</body>

