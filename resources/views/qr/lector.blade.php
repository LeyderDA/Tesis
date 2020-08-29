<!DOCTYPE html>
<html>
  <head>

    <title>Instascan</title>

<style>

#preview{
   width:500px;
   height: 500px;
   margin:0px auto;
}

</style>
  </head>
  <body>
      <select class="form-control" id="exampleFormControlSelect1" >
        <option value="1">Recepcion</option>
        <option value="2">Gestion</option>
      </select>

    <video id="preview"></video>
    <!-- <script src="instascan.min.js"></script> -->
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
            window.location.replace('qr/'+content);
          }else{
            alert("gestion notoi");
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

<div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
  </label>
</div>
  </body>
</html>