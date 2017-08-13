<?php require_once 'view/_header.php'; ?>

	<form method="post" action="index.php?rt=recenzije/pokaziRecenzije">
	<?php

	$i=0;

	foreach( $listaProizvoda as $proizvod )
	{
		$prosjek = $listaProsjeka[$i];  //  zasto ovo ne funkcionira??
		$prosjek = is_int( $prosjek ) ? $prosjek : floor( $prosjek ) + 0.5;

			echo '<h4>' . $proizvod->naziv . '</h4>'
									. $proizvod->cijena . ' kn  <br> ' ; ?>


			<img src="<?php echo $prosjek; ?>.png" alt="zvijezda" >

			<button type="submit" name="id_pr" value="<?php echo $proizvod->id_pr; ?>">
					Pogledaj recenzije ( <?php echo $brojRecenzija[$i]; ?> ) </button><br>

		<?php		echo $proizvod->opis . '<br><br>';
			++$i;
	}

 require_once 'view/_footer.php'; ?>
