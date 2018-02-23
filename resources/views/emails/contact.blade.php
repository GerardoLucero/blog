<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Mensaje recibido</title>
</head>
<body>
	<h1>Te responderemos a a brevedad posible</h1>

	<p>
		Nombre: {{ $msg->nombre }} <br>

		Email: {{ $msg->email }} <br>

		Mensaje: {{ $msg->mensaje }} <br>

	</p>
</body>
</html>