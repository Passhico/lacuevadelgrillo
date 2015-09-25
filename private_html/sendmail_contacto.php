<html>
	<head>

	</head>

	<body>
	
	Su mensaje Ha sido enviado, en breve recibirá respuesta a su consulta.
<?php
		$nombre = $_POST['fullname'];
		$mail = $_POST['emailaddress'];
	

		$header = 'From: ' . $mail . " \r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$header .= "Mime-Version: 1.0 \r\n";
		$header .= "Content-Type: text/plain";

		$mensaje = "Este mensaje fue enviado por " . $nombre;
		$mensaje .= "Su e-mail es: " . $mail . " \r\n";
		$mensaje .= "Mensaje: " . $_POST['message'] . " \r\n";
		$mensaje .= "Enviado el " . date('d/m/Y', time());

		$para = 'pascual@lacuevadelgrillo.com';
		$asunto = 'Pruebas formulario contacto';

		mail($para, $asunto, utf8_decode($mensaje), $header);

		echo 'Estamos a su servicio';

?>
</body>

</html>
