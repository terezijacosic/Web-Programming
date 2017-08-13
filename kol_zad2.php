<?php

require_once 'kol_zad2_baza.php';

$db = DB::getConnection();
$st = $db->query('SELECT id, igrac1, igrac2, koef1, koef2 FROM zadatak2');
//$result = $st->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Zadatak</title>
</head>
<body>

	<form action="kol_zad2_izracunaj.php" method="post">
	<p>Odaberite igrače iz svake kolone i upišite iznos koji želite uložiti.<p> <br>
	<table>
		<tr><th>Igrač1</th><th>Igrač2</th></tr>

		<?php
		$i=1;
		foreach ($st->fetchAll() as $row)
		{
			echo '<tr><td>('. $row['koef1'].') '.$row['igrac1'].'<input type="radio" name="p'. $row['id'] .'" value="prvi" /></td>'.
					'<td>('. $row['koef2'].') '.$row['igrac2'].'<input type="radio" name="p'. $row['id'] .'" value="drugi" /></td></tr>';

		}

		?>
	</table>

	Unesi uloženi iznos:<input type="text" name="ulozeno" />
<button type="submit" name="izracunaj">Izračunaj</button> <br>
<button type="reset" name="resetiraj">Resetiraj</button>
</form>


</body>
</html>
