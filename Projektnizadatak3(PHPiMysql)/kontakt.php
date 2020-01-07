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
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.7890741539636!2d15.966758816056517!3d45.795453279106205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d68b5d094979%3A0xda8bfa8459b67560!2sUl.+Vrbik+VIII%2C+10000%2C+Zagreb!5e0!3m2!1shr!2shr!4v1509296660756" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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

				<input type="posaljite" value="Pošaljite">
			</form>
		</div>
	</main>
	
				<hr>
			
			<a href="index.php"><img </a>
			<h2>Povratak na početnu</h2>
	


</body>
</html>';
?>