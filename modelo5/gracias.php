<?php 

if (!empty($_POST)) {

	extract($_POST, EXTR_PREFIX_ALL, 'p');

	if ($p_nombre != '' && $p_apellido != '') {

		function invalid_email($email)
		{
			return !filter_var($email, FILTER_VALIDATE_EMAIL);
		}

		if (!ctype_digit($p_dni) || strlen($p_dni) != 8 || $p_dni[0] == 9) {
			die('<script>sessionStorage.setItem("campo", "DNI"); window.history.back();</script>');
		}

		if (!ctype_digit($p_cel) || strlen($p_cel) != 9 || $p_cel[0] != 9) {
			die('<script>sessionStorage.setItem("campo", "Celular"); window.history.back();</script>');
		}
		if (strlen($p_mensaje) > 300) {
			die('<script>sessionStorage.setItem("campo", "Mensaje"); window.history.back();</script>');
		} else if (invalid_email($p_mail)) {
			die('<script>window.history.back(); sessionStorage.setItem("campo", "correo");</script>');
		}

		$mysqli = new mysqli("localhost", "usuario/root", "contraseña", "nombredebasededatos");
		$mysqli->set_charset('utf8');
		$mysqli->query("INSERT INTO tabla VALUES (DEFAULT,'$p_nombre','$p_apellido','$p_dni','$p_cel','$p_mail','$p_mensaje',NOW())");

	} else {
		die('<script>sessionStorage.setItem("resend", true); window.history.back();</script>');
	}
} else {
	header("Location: /pasaporteoh", true, 303);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Gracias</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
	<link rel="icon" href="https://i0.wp.com/opaloperu.com/wp-content/uploads/2017/07/cropped-favicon.png?fit=32%2C32&amp;ssl=1" sizes="32x32">
	<style>	
		#comprob{
			display: inline-block;
			position: absolute;
			height: 100%;
			width: 33px;
			left: 0;
			transform: translateX(-50%) scale(0.7);
		}
		@font-face {
		    font-family: 'ITC';
		    src: url('fonts/ITCAvantGardeStd-Bk.woff2') format('woff2'),
		        url('fonts/ITCAvantGardeStd-Bk.woff') format('woff');
		    font-weight: normal;
		    font-style: normal;
		}

		.itc{font-family: 'ITC';}

		input[type="number"]::-webkit-outer-spin-button,
		input[type="number"]::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}

		input[type="number"] {
		    -moz-appearance: textfield;
		}

		body{
			background-image: url("img/fondo-web3.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position-x:40%;
			background-color:#EFEFEF;
		}

		.registro {
			
			background-size: 100% 100%;	
			background-color: rgb(0,0,0, 0.08);
		}

		#txtdatos{
			color: white;
			font-size: 1.15em;
			font-weight: 500;
			padding-top: 15px;
			text-align: center;
		}
		.form-control{
			font-size:0.8rem;
		}

		.registro .enviar{
			font-size: 1.2em;
			background-color: #B32216 !important;
		}
		#img-derecha{
			margin-bottom:5vh;
			margin-top:15vh;
		}


		/* Media queries */
		
		@media(max-width: 546px){
			body{
				min-height: 100vh;
				background-image: url("img/fondo-mobile3.jpg");
				background-repeat: no-repeat;
				background-position:top;
				background-size: contain;
			}
			#img-izquierda{
				height:100%;
			}
			#img-derecha{
				width: 90% !important;
				margin-bottom:3vh;
				margin-top:1vh;
			}

			.container-fluid .text-justify{
				font-size: 8.5px !important;
			}
			.mobile{
				height:40px;		
			}
		}
		@media(max-width: 767px) and (min-width:547px ){
			body{
				min-height: 100vh;
				background-image: url("img/fondo-mobile3.jpg");
				background-repeat: no-repeat;
				background-position:top;
				background-size: 100% 90%;
			}
			#img-izquierda{
				
			}
			#img-derecha{
				margin-bottom:3vh;
				margin-top:1vh;
			}
		}	
		@media(max-width: 991px) and (min-width:768px ){
			body{
				min-height: 100vh;
				background-image: url("img/fondo-mobile3.jpg");
				background-repeat: no-repeat;
				background-size: 100% 100%;
			}
			#img-izquierda{
				
			}
			#img-derecha{
				margin-top:5vh;
			}
			
		}
		@media (min-width: 992px){
			#img-derecha{
				margin-top:5vh;
				margin-bottom:1vh;
			}
		}
	</style>
	<link rel="stylesheet" href="css/big.css"/>
</head>
<body>
	<div class="container mx-auto">
		<div class="row pt-4">
			<div class="col-lg-6 pt-lg-5 d-lg-none">
				<img src="img/agente.png" id="img-izquierda" class="pt-3 pt-lg-0" style="width:100%">
			</div>
			<div class="col-lg-5 offset-lg-6 itc mt-5">	
				<div class="contenedor">
					<div class="promocion text-center">
						<img src="img/derecha.png" id="img-derecha" class="" style="width:100%">
					</div>
					<br>
					<div class="registro px-3 pb-3">
						<div class="text-center py-3">
							<img src="img/texto-registro.png" id="img-derecha" class="my-3" style="width:90%">
						</div>
						<div class="contenedor">
					<br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block">
					<div class="registro px-3 py-5">
						<br><br><br class="d-none d-sm-block"><br class="d-none d-sm-block">
						<p  class="text-center" style="color:white;font-size:50px;">Registro Exitoso</p>
						<br><br><br><br>
					</div>
					<br class="d-none b-lg-block"><br class="d-none b-lg-block"><br class="d-none b-lg-block"><br class="d-none b-lg-block"><br class="d-none b-lg-block">
				</div>
				<br>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
	<div class="container-fluid legal" style="padding-bottom: 8px">
		<div class="row no-gutters">
			<div class="col-lg-1 offset-lg-11 text-center mb-lg-3 mb-5">
				<img src="img/logo2.png" class="img-fluid mt-2">
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
					<h3 class="modal-title" id="exampleModalLabel">Políticas de Privacidad</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body" style="font-size: 11.5px; text-align: justify;">
					Se informa que los datos personales proporcionados a OPALO PERÚ S.A.C. quedan incorporados al  banco de datos de clientes de OPALO PERÚ S.A.C., en el claro y expreso entendimiento que OPALO PERÚ S.A.C. estará facultada a utilizar dicha información para efectos de la gestión de los productos y/o servicios solicitados y/o contratados incluyendo evaluaciones financieras, procesamiento de datos, formalizaciones contractuales, cobro de deudas, gestión de operaciones financieras y remisión de correspondencia, entre otros, la misma que podrá ser realizada a través de terceros.<br><br>
					Asimismo, garantizándose el pleno ejercicio de los derechos previstos en la Ley de Protección de Datos Personales (Ley N°29733) y su Reglamento (Decreto Supremo No. 003-2013-JUS) y/o de la norma que las sustituya o reglamente, el titular de los datos personales otorga también su consentimiento previo, inequívoco, expreso e informado a OPALO PERÚ S.A.C. para utilizar y entregar, en tanto esta autorización no sea revocada, sus datos personales, incluyendo datos sensibles, que hubieran sido proporcionados directamente a OPALO PERÚ S.A.C., para el desarrollo y/o tratamiento de acciones y/o relaciones comerciales, la realización de estudios de mercado y de riesgo crediticio, elaboración de perfiles de compra y evaluaciones financieras, la remisión, directa o por intermedio de terceros (vía medio físico, electrónico o telefónico) de publicidad, información, obsequios, ofertas y/o promociones (personalizadas o generales) de productos y/o servicios de OPALO PERÚ S.A.C. y/o de terceros con quienes mantenga relaciones comerciales y/o de otras empresas del Grupo Intercorp y sus socios estratégicos, entre las que se encuentran aquellas difundidas en el portal de la Superintendencia del Mercado de Valores (www.smv.gob.pe) así como en el portal www.intercorp.com.pe/es. Para tales efectos, el titular de los datos personales autoriza a OPALO PERÚ S.A.C. la cesión, transferencia o comunicación de sus datos personales, a dichos terceros y empresas, y entre ellos.<br><br>
					El titular de datos personales podrá revocar la autorización para el tratamiento de sus datos personales en cualquier momento, de conformidad con lo previsto en la Ley de Protección de Datos Personales (Ley No. 29733) y su Reglamento (Decreto Supremo No. 003-2013-JUS) y/o de la norma que las sustituya o reglamente. Para ejercer este derecho, o cualquier otro previsto en dichas normas, incluyendo los de acceso, rectificación u oposición, el titular de datos personales podrá presentar su solicitud mediante el envío de una comunicación expresa y por escrito a OPALO PERÚ S.A.C. que deberá ser entregada en cualquiera de los centros de atención al cliente y/o a la siguiente dirección de correo electrónico: “datoscliente.tarjetaoh@financierauno.pe”.
					
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script>
		$(function(){
			$('[data-toggle="popover"]').popover();

			if(sessionStorage.resend){
				$('button[type="submit"]').get(0).click();
				delete sessionStorage.resend;
			}
			else if('campo' in sessionStorage){
				alert("Ingrese un "+sessionStorage.campo+" válido");
				delete sessionStorage.campo;
			}			

			$('input').change(function(){ 
				this.value = $.trim(this.value); 
			}); 
			$('[data-rel=popover]').popover({
				html: true,
				trigger: "hover"
			});
		});
	</script>
</body>
</html>




