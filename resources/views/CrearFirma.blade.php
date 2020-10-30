
<div style="height:30px; width:100%; background-color:#dadada"></div>
<div style="height:6px; width:100%; background-color:#ad3333"></div>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <br>
        <br>
        <br>
        <title>Crear Firma</title>
        <link href="{{ asset('css/firma.css') }}" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="./js/numeric-1.2.6.min.js"></script> 
		<script src="./js/bezier.js"></script>
		<script src="./js/jquery.signaturepad.js"></script> 		
		<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
        <script src="./js/json2.min.js"></script>	
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    






		<style type="text/css">
			body{
				font-family:monospace;
				text-align:center;
			}
			#btnSaveSign {
				color: rgb(0, 0, 0);
				background: #000000;
				padding: 5px;
				border: none;
				border-radius: 5px;
				font-size: 20px;
				margin-top: 10px;
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
	<body>

        
        <font face="arial">
            <h2>¡CREA TU FIRMA AHORA!</h2>
        </font>

       
		
		<div id="signArea" >
            <br>
            <center>
                <div>
                    <h2 class="tag-ingo">Ponga la firma debajo</h2>
                </div>
            </center>
            
                
          
			
			<div id="figuras" class="sig sigWrapper" style="height:auto;">
				<div class="typed"></div>
				<canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
            </div>
            <br>
            <br>
            <font face="arial">
                <input type="button" class="btn btn-primary" id="btnSave2" value="Descargar Firma">
            </font>
            

           
		</div>
		
		
		
		<div class="sign-container">
		<?php
		$image_list = glob("./doc_signs/*.png");
		foreach($image_list as $image){
			//echo $image;
		?>
		<img src="<?php echo $image; ?>" class="sign-preview" />
		<?php
		
		}
		?>
        </div>
        
           
            <font face="arial">
                <h4 class="mb-2 card-title">¿Te Equivocaste? 
            </font>
        </h4> 
        <font face="arial">
            <a href="/CrearFir" >Resetear Firma</a>
        </font>

       
		
		<script>
            document.getElementById('figuras').contentEditable = 'true';document.getElementById('figuras').designMode='on';
            $(function() {
              $("#btnSave2").click(function() {
                html2canvas($("#figuras"), {
                  onrendered: function(canvas) {
                    saveAs(canvas.toDataURL(), 'Firma.png');
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
		<script>
			$(document).ready(function() {
				$('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
			});
			
			$("#btnSaveSign").click(function(e){
				html2canvas([document.getElementById('sign-pad')], {
					onrendered: function (canvas) {
						var canvas_img_data = canvas.toDataURL('image/png');
						var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
						//ajax call to save image inside folder
						$.ajax({
							url: 'save_sign.php',
							data: { img_data:img_data },
							type: 'post',
							dataType: 'json',
							success: function (response) {
							   window.location.reload();
							}
						});
					}
				});
            });
            



		  </script> 
		

    </body>
    <br>
    <br>
    <font face="arial">
        <center> 
            <a href="/home"  class="btn btn-primary"  >Salir</a>
          </center> 
    </font>

   
</html>

