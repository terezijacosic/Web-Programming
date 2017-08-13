<?php

require_once 'kol_zad2_baza.php';

$db = DB::getConnection();
$st = $db->query('SELECT id, igrac1, igrac2, koef1, koef2 FROM zadatak2');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Zadatak</title>
</head>
<body>

	<table>
		<tr><th>Igrač1</th><th>Igrač2</th></tr>

		<?php
    $koeficijent = (int)$_POST['ulozeno'];
    foreach ($st->fetchAll() as $row)
    {
      if ( isset($_POST['p' . $row['id']]))
      {
        if( $_POST['p' . $row['id']] == "prvi")
        {
          echo '<tr><td><span style="color:blue">('. $row['koef1'].') '.$row['igrac1'].'</span></td>'.
  					   '<td>('. $row['koef2'].') '.$row['igrac2'] .'</td></tr>';

          $koeficijent *= $row['koef1'];
        }

        else
        {
          echo '<tr><td>('. $row['koef1'].') '.$row['igrac1'].'</td>'.
               '<td><span style="color:blue">('. $row['koef2'].') '.$row['igrac2'] .'</span></td></tr>';

          $koeficijent *= $row['koef2'];

        }
      }
    }
		?>
	</table>

  <?php echo "Moguće je osvojiti ". $koeficijent ." kuna."; ?>

</body>
</html>
