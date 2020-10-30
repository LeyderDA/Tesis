
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>Crear Firma</title>
        <link href="{{ asset('css/firma.css') }}" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="./js/numeric-1.2.6.min.js"></script> 
		<script src="./js/bezier.js"></script>
		<script src="./js/jquery.signaturepad.js"></script> 		
		<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
		<script src="./js/json2.min.js"></script>				
		<style type="text/css">
			body{
				font-family:monospace;
				text-align:center;
			}
			#btnSaveSign {
				color: #fff;
				background: #1006a0;
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

		<h2>Crea tu firma ahora</h2>
		
		<div id="signArea" >
			<h2 class="tag-ingo">Ponga la firma debajo</h2>
			<div id="figuras" class="sig sigWrapper" style="height:auto;">
				<div class="typed"></div>
				<canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
            </div>
            <br>
            <br>
            <input type="button" class="btn tw" id="btnSave2" value="Descargar imagen">
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
        <h4 class="mb-2 card-title">¿Te Equivocaste? 
           
        </h4> 
        <a href="/CrearFir" >Resetear Firma</a>
		
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
    <center> 
        <a href="/home"  class="btn btn-primary"  >Salir</a>
      </center> 
</html>
