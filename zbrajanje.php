<?php

session_start();

if( !isset($_POST['novi_broj']) )
{
	echo "Niste unijeli broj!";
	$_SESSION['zbroj'] = 0;
}

else if (isset($_POST['novi_broj']) && is_numeric($_POST['novi_broj']))
{
	$broj =(int) $_POST['novi_broj'];
	$_SESSION['zbroj'] += $broj;
	$zbroj = $_SESSION['zbroj'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Zadatak</title>
</head>
<body>

	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
		Unesite broj:
		<input type="text" name="novi_broj" />
		<button type="submit">Pošalji</button>
	</form>

	<?php
if ( isset($zbroj))
	echo "<br>Dosadašnji zbroj je " . $zbroj . ".";
	 ?>

</body>
</html>
