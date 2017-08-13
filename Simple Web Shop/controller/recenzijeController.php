<?php

require_once 'model/service.class.php';

class RecenzijeController
{

	public function pokaziRecenzije( )
	{
		$ls = new Service();


		if( !isset( $_POST['id_pr'] )  || !preg_match( '/^[0-9]+$/', $_POST['id_pr'] ) )
		{
			//header( 'Location: index.php');
			echo 'ovdje je greska';
			exit();
		}

		$id_pr = $_POST['id_pr'];

		$title = 'Recenzije proizvoda koji ste odabrali';
		$listaRecenzija = $ls->getRecenzijaById( $id_pr );

		$_SESSION['proizvod'] = $id_pr;

		require_once 'view/recenzije_index.php';
	}


	public function novaRecenzija( )
	{
		$ls = new Service();

		// Ako nemamo id proizvoda, preusmjeri na početnu stranicu
		if( !isset( $_SESSION['proizvod' ] ) )
		{
			//header( 'Location: index.php');
			echo 'session nije postavljen' ;
			exit();
		}

		$id_pr = $_SESSION[ 'proizvod' ];

		// Ako nam se ne šalje ocjena ispravnog oblika, nešto ne valja
		if( !isset( $_POST['ocjena'] ) || !isset( $_POST['tekst'] ) )
		{
			//header( 'Location: index.php');
			echo 'Neki post nije postavljen';
			exit();
		}

		$ocjena_proizvoda = $_POST['ocjena'];
		$tekst_recenzije = $_POST['tekst'];

		$ls->dodajNovuRecenziju( $id_pr, $ocjena_proizvoda, $tekst_recenzije );

		header( 'Location:  index.php' ); //zasad
		exit();
	}
};

?>
