<?php

namespace App\Http\Controllers;

class request_id
{
   
    
    public function get_id(){
        session_start();
        return $_SESSION['id_usuario'];
    }


}