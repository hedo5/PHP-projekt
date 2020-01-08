<?php 
	

	if (isset($_POST['_action_']) && $_POST['_action_'] == 'dodaj_novost') {
		$_SESSION['message'] = '';

		$query  = "INSERT INTO novosti (naslov, opis, arhiva)";
		$query .= " VALUES ('" . htmlspecialchars($_POST['naslov'], ENT_QUOTES) . "', '" . htmlspecialchars($_POST['opis'], ENT_QUOTES) . "', '" . $_POST['arhiva'] . "')";
		$result = @mysqli_query($MySQL, $query);
		
		$ID = mysqli_insert_id($MySQL);
		

        if($_FILES['slika']['error'] == UPLOAD_ERR_OK && $_FILES['slika']['name'] != "") {
                

			$ext = strtolower(strrchr($_FILES['slika']['name'], "."));
			
            $_slika = $ID . '-' . rand(1,100) . $ext;
			copy($_FILES['slika']['tmp_name'], "novosti/".$_slika);
			
			if ($ext == '.jpg' || $ext == '.png' || $ext == '.gif') { 
				$_query  = "UPDATE novosti SET slika='" . $_slika . "'";
				$_query .= " WHERE id=" . $ID . " LIMIT 1";
				$_result = @mysqli_query($MySQL, $_query);
				$_SESSION['message'] .= '<p>Uspješno ste dodali sliku.</p>';
			}
        }
		
		
		$_SESSION['message'] .= '<p>Uspješno ste dodali novost.</p>';
		

		header("Location: index.php?menu=7&action=2");
	}
	

	if (isset($_POST['_action_']) && $_POST['_action_'] == 'edit_news') {
		$query  = "UPDATE novosti SET naslov='" . htmlspecialchars($_POST['naslov'], ENT_QUOTES) . "', opis='" . htmlspecialchars($_POST['opis'], ENT_QUOTES) . "', arhiva='" . $_POST['arhiva'] . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($MySQL, $query);
		

        if($_FILES['slika']['error'] == UPLOAD_ERR_OK && $_FILES['slika']['name'] != "") {
                

			$ext = strtolower(strrchr($_FILES['slika']['name'], "."));
            
			$_slika = (int)$_POST['edit'] . '-' . rand(1,100) . $ext;
			copy($_FILES['slika']['tmp_name'], "news/".$_slika);
			
			
			if ($ext == '.jpg' || $ext == '.png' || $ext == '.gif') { 
				$_query  = "UPDATE news SET slika='" . $_slika . "'";
				$_query .= " WHERE id=" . (int)$_POST['edit'] . " LIMIT 1";
				$_result = @mysqli_query($MySQL, $_query);
				$_SESSION['message'] .= '<p>You successfully added slika.</p>';
			}
        }
		
		$_SESSION['message'] = '<p>Uspješno ste izmjenili novosti</p>';
		

		header("Location: index.php?menu=7&action=2");
	}

	

	if (isset($_GET['delete']) && $_GET['delete'] != '') {

        $query  = "SELECT slika FROM novosti";
        $query .= " WHERE id=".(int)$_GET['delete']." LIMIT 1";
        $result = @mysqli_query($MySQL, $query);
        $row = @mysqli_fetch_array($result);
        @unlink("novosti/".$row['slika']); 
		

		$query  = "DELETE FROM novosti";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($MySQL, $query);

		$_SESSION['message'] = '<p>Uspješno ste obrisali novost.</p>';
		

		header("Location: index.php?menu=7&action=2");
	}

	if (isset($_GET['id']) && $_GET['id'] != '') {
		$query  = "SELECT * FROM novosti";
		$query .= " WHERE id=".$_GET['id'];
		$query .= " ORDER BY date DESC";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		print '
		<h2>Sve novosti</h2>
		<div class="novosti">
			<img src="novosti/' . $row['slika'] . '" alt="' . $row['naslov'] . '" naslov="' . $row['naslov'] . '">
			<h2>' . $row['naslov'] . '</h2>
			' . $row['opis'] . '
			<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
			<hr>
		</div>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Povratak</a></p>';
	}
	

	else if (isset($_GET['add']) && $_GET['add'] != '') {
		
		print '
		<h2>Dodaj novost</h2>
		<form action="" id="news_form" name="news_form" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="dodaj_novost">
			
			<label for="naslov">naslov *</label>
			<input type="text" id="naslov" name="naslov" placeholder="Naslov.." required>

			<label for="opis">opis *</label>
			<textarea id="opis" name="opis" placeholder="Opis.." required></textarea>
				
			<label for="slika">slika</label>
			<input type="file" id="slika" name="slika">
						
			<label for="arhiva">arhiva:</label><br />
            <input type="radio" name="arhiva" value="Y"> DA &nbsp;&nbsp;
			<input type="radio" name="arhiva" value="N" checked> NE
			
			<hr>
			
			<input type="submit" value="Potvrdi">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Povratak</a></p>';
	}

	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		$query  = "SELECT * FROM novosti";
		$query .= " WHERE id=".$_GET['edit'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		$checked_arhiva = false;

		print '
		<h2>Uređivanje novosti</h2>
		<form action="" id="news_form_edit" name="news_form_edit" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="edit_news">
			<input type="hidden" id="edit" name="edit" value="' . $row['id'] . '">
			
			<label for="naslov">naslov *</label>
			<input type="text" id="naslov" name="naslov" value="' . $row['naslov'] . '" placeholder="Naslov.." required>

			<label for="opis">opis *</label>
			<textarea id="opis" name="opis" placeholder="Novosti opis.." required>' . $row['opis'] . '</textarea>
				
			<label for="slika">slika</label>
			<input type="file" id="slika" name="slika">
						
			<label for="arhiva">arhiva:</label><br />
            <input type="radio" name="arhiva" value="Y"'; if($row['arhiva'] == 'Y') { echo ' checked="checked"'; $checked_arhiva = true; } echo ' /> DA &nbsp;&nbsp;
			<input type="radio" name="arhiva" value="N"'; if($checked_arhiva == false) { echo ' checked="checked"'; } echo ' /> NE
			
			<hr>
			
			<input type="submit" value="Potvrdi">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Povratak</a></p>';
	}
	else {
		print '
		<h2>Novosti</h2>
		<div id="novosti">
			<table>
				<thead>
					<tr>
						<th width="16"></th>
						<th width="16"></th>
						<th width="16"></th>
						<th>Naslov</th>
						<th>Opis</th>
						<th>Datum</th>
						<th width="16"></th>
					</tr>
				</thead>
				<tbody>';
				$query  = "SELECT * FROM novosti";
				$query .= " ORDER BY date DESC";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '
					<tr>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><img src=" " alt="uredi"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"><img src=" " alt="obriši"></a></td>
						<td>' . $row['naslov'] . '</td>
						<td>';
						if(strlen($row['opis']) > 160) {
                            echo substr(strip_tags($row['opis']), 0, 160).'...';
                        } else {
                            echo strip_tags($row['opis']);
                        }
						print '
						</td>
						<td>' . $row['date'] . '</td>
						<td>';
							if ($row['arhiva'] == 'Y') { print '<img src="" alt="" naslov="" />'; }
                            else if ($row['arhiva'] == 'N') { print '<img src="" alt="" naslov="" />'; }
						print '
						</td>
					</tr>';
				}
			print '
				</tbody>
			</table>
			<a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;add=true" class="AddLink">Dodaj novosti</a>
		</div>';
	}
	

	@mysqli_close($MySQL);
?>