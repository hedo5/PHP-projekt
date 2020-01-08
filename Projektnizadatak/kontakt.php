<?php
print '
<!DOCTYPE HTML>
<html>

	<head>
	    <link rel="stylesheet" href="new1.css">
		<title>360 fotografija</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Matej Hedzet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	
<body>

	<main>
		<h1>Kontakt</h1>
		<div id="kontakt">
			<iframe src="https://www.google.com/maps/embed/v1/place?q=Botine%C4%8Dka%20&key=AIzaSyDaQvy42HhB-NuChseu6nHrJ8dpq62XjxM" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			<form action="http://vvg.hr" id="kontakt" name="kontakt" method="POST">
				<label for="ime">Ime *</label>
				<input type="text" id="ime" name="ime" placeholder="Vaše me.." required>

				<label for="Prezime">Prezime *</label>
				<input type="text" id="Prezime" name="Prezime" placeholder="Vaše prezime.." required>
				
				<label for="prezime">Vaš E-mail *</label>
				<input type="email" id="email" name="email" placeholder="Vaš e-mail.." required>

				<label for="drzava">Država</label>
				<select id="drzava" name="drzava">
				  <option value="">Please select</option>
				  <option value="BE">Belgija</option>
				  <option value="HR" selected>Croatia</option>
				  <option value="LU">Luxembourg</option>
				  <option value="HU">Mađarska</option>
				</select>

				<label for="poruka">Vaša poruka</label>
				<textarea id="poruka" name="poruka" placeholder="Napišite poruku.." style="height:200px"></textarea>

				<input type="submit" value="Pošaljite">
			</form>
		</div>
	</main>
	
				<hr>
			
			<a href="index.php"><img </a>
			<h2>Povratak na početnu</h2>
	


</body>
</html>';
?>