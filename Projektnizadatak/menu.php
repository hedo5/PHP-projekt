<?php

	print '
			<ul>
				<li><a href="index.php?menu=1">Početna stranica</a></li>
				<li><a href="index.php?menu=2">Novosti</a></li>
				<li><a href="index.php?menu=3">Kontakti</a></li>
				<li><a href="index.php?menu=4">O nama</a></li>
				<li><a href="index.php?menu=5">Galerija</a></li>';
				
				if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
			print '
			<li><a href="index.php?menu=6">Registracija</a></li>
			<li><a href="index.php?menu=7">Prijava</a></li>';
		}
				else if ($_SESSION['user']['valid'] == 'true') {
			print '
			<li><a href="index.php?menu=8">Administrator</a></li>
			<li><a href="odjava.php">Odjava</a></li>';
		}
		print '
			</ul>';
?>