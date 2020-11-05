<?php
$all = DB::table('comentario')->where ('for_id','=',3)->get();
        $info = "";
        foreach($all as $contenido){
            $info = $info." "." <p class='color'>";
            $info = $info." ".$contenido->coment;                                       
                    $content1 = DB::table('users')->select('username')->where('id',$contenido->usua_id)->get();
                    foreach($content1 as $contenido1){
                        $info = $info." ".$info."<br><i class='fas fa-user fa-2x'></i>";                                                
                        $info = $info." ".$contenido1->username."<br>";
                    }
            $info = $info." "."</p>";                                      
         } 
         echo $info;
?>


