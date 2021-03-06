
<!DOCTYPE html>
<html>
  <head>
    <title>Lector QR</title>   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lector.css') }}" rel="stylesheet">
  </head>
  <body>
    
    <br>
    <center>
      <div class="col-4">
        <select class="form-control" id="exampleFormControlSelect1" >
          <option value="">Selecciona el filtro de busqueda</option>
          <option value="1">Buscar Gestiones de una Recepción</option>
          <option value="2">Buscar Observaciones de una Recepción</option>
          <option value="3">Buscar Recepciones de un Docente o un Administrativo</option>
          <option value="4">Buscar Recepciones de un Estudiante</option>
        </select>
      </div>
    </center>  
    <video id="preview"></video>
    <!-- <script src="instascan.min.js"></script> -->
    <!-- {{ asset('js/instascan.min.js') }} -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
    
    x = new Boolean(true);
   
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        //alert(content);
        //window.location.href=content;
        if(x){
          x=false;  
          var opc = document.getElementById('exampleFormControlSelect1').value;
          if(opc==1){
            window.location.replace('qr/1;'+content);
          }else if(opc==2){
            window.location.replace('qr/2;'+content);
          }else if(opc==3){
            window.location.replace('qr/3;'+content);
          }else if(opc==4){
            window.location.replace('qr/4;'+content);
          }
          
        }      
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        //alert(e);
    });
   </script>
  <center>
   <a href="/home"  id="btn" class="btn btn-primary">Volver</a>
  </center>
  </body>
</html>

