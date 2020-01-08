<?php
	
	if (isset($action) && $action != '') {
		$query  = "SELECT * FROM novosti";
		$query .= " WHERE id=" . $_GET['action'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
			print '
			<div class="novosti">
				<img src="novosti/' . $row['slika'] . '" alt="' . $row['naslov'] . '" naslov="' . $row['naslov'] .'"date="' . $row['date'] . '">
				<h2>' . $row['naslov'] . '</h2>
				<p>'  . $row['opis'] . '</p>
				<p>'  . $row['date'].'</p>
				<hr>
			</div>';
	}
	else {
		print '<h1>Novosti</h1>';
		$query  = "SELECT * FROM novosti";
		$query .= " WHERE arhiva='N'";
		$query .= " ORDER BY date DESC";
		$result = @mysqli_query($MySQL, $query);
		while($row = @mysqli_fetch_array($result)) {
			print '
			<div class="novosti">
				<img src="novosti/' . $row['slika'] . '" alt="' . $row['naslov'] . '" naslov="' . $row['naslov'] . '"date="' . $row['date'] .'">
				<h2>' . $row['naslov'] . '</h2>';
				if(strlen($row['opis']) > 300) {
					echo substr(strip_tags($row['opis']), 0, 300).'... <a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">Više</a>';
				} else {
					echo strip_tags($row['opis']);
				}
				print '
						<hr>
			</div>';
		}
	}
?>