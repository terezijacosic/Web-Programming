<?php require_once 'view/_header.php';
		
	foreach( $listaRecenzija as $rec )
	{
		for ( $i = 1; $i <=5; $i++ )
		{
			if ( $rec->ocjena == $i )
			{
				?> <img src="<?php echo $i; ?>.png" alt="zvijezda" > <?php
				break;
			}
		}
		
		echo  ' ' . $rec->korisnicko_ime .'</br>'
			  . $rec->tekst	. '</br></br>' ;
	}
?>

	<h4>Napisi novu recenziju</h4>
<form method="post" action="index.php?rt=recenzije/novaRecenzija">
	
	<textarea name="tekst" id="tekst" rows="5" cols="40"></textarea>
	</br></br>
	
	<label for="ocjena">Ocijenite ovaj proizvod:</label> </br>
	<label for="ocjena1"><input type="radio" name="ocjena" value="1"> 1 </label>
	<label for="ocjena2"><input type="radio" name="ocjena" value="2"> 2 </label>
	<label for="ocjena3"><input type="radio" name="ocjena" value="3"> 3 </label>
	<label for="ocjena4"><input type="radio" name="ocjena" value="4"> 4 </label>
	<label for="ocjena5"><input type="radio" name="ocjena" value="5"> 5 </label> 
	</br></br>
	
	<button type="submit" >Pošalji recenziju</button>
</form>
	
	</br></br>
	<a href="index.php?rt=proizvodi">Natrag na popis svih proizvoda</a>
	
<?php require_once 'view/_footer.php'; ?> 
