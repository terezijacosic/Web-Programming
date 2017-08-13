<?php

	session_start();


	if ( !isset($_SESSION['prica']) )
	{
		$prica = array();
		$_SESSION['prica'] = $prica;
	//	$_SESSION['brojac'] = 0;
	}

	if ( isset($_POST['rijec']) && preg_match('/^[a-zA-Z]+$/', $_POST['rijec']) )
	{
		$prica = $_SESSION['prica'];
	//	$brojac = $_SESSION['brojac']; //echo $brojac;

		if ( isset($_POST['boja']) )
			$boja = $_POST['boja'];

		else
			$boja = 'B';

		$prica[] = array( $_POST['rijec'] => $boja);

		$_SESSION['prica'] = $prica;
	//	$_SESSION['brojac'] = $brojac + 1; //echo $_SESSION['brojac'];

		ispis( $prica );

	}

	function ispis( $prica )
	{
		$colors  = array('B' => 'blue', 'G' => 'green','Y' => 'yellow', 'R' => 'red');

		foreach ( $prica as $element ) {
			//element je polje s jednim clanom, tj.parom kljuc->vrijednost
			foreach ($element as $key => $value) {
				if ( $value === '' )
					echo $key . " ";

				else if ( $value === 'B' || $value === 'R' || $value === 'G' || $value === 'Y' )
					echo '<span style="background-color:'. $colors[$value] . '">' . $key . '</span>' . " ";
				//echo $value;
				//else echo $key . " ";
			}
		}
	}


	if ( isset($_POST['resetiraj']))
	{
		session_unset();
		session_destroy();
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Zadatak</title>
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		Unesi novu rijec: <input type="text" name="rijec" /> </br>
		Unesi boju nove rijeci: <input type="text" name="boja" /> </br>
		<button type="submit" name="posalji">Posalji</button>
	</form>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	 	<input type="hidden" name="resetiraj" /> </br>
		<button type="submit" >Resetiraj</button>
	</form>



</body>
</html>
