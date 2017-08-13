<?php

require_once 'db.class.php';
require_once 'proizvod.class.php';
require_once 'recenzija.class.php';

class Service
{
	public function getProductById( $id_pr )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_pr, naziv, opis, cijena FROM proizvodi WHERE
								id_pr=:id_pr, naziv=:naziv, opis=:opis, cijena=:cijena' );
			$st->execute( array( 'id_pr' => $id_pr, 'naziv' => $naziv, 'opis' => $opis, 'cijena' => $cijena ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Proizvod( $row['id_pr'], $row['naziv'], $row['opis'], $row['cijena'] );
	}


	public function getAllProducts( )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT id_pr, naziv, opis, cijena FROM proizvodi' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$listaProizvoda = array();
		while( $row = $st->fetch() )
		{
			$listaProizvoda[] = new Proizvod( $row['id_pr'], $row['naziv'], $row['opis'], $row['cijena'] );

		}

		return $listaProizvoda;
	}


	
	public function getAVG( $listaProizvoda )
	{
		$poljeAVG = array();
		foreach ($listaProizvoda as $row) {
		$id_pr = $row->id_pr;

		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT AVG(id_pr) FROM recenzije WHERE id_pr=:id_pr' );
			$st->execute( array( 'id_pr' => $id_pr ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

			$average = $st->fetch();
			$poljeAVG[] = $average[0];
	}

		return $poljeAVG;
	}




	public function getBrojRecenzija( $listaProizvoda )
{
	$poljeBrojRecenzija = array();
	foreach ($listaProizvoda as $row) {
		$id_pr = $row->id_pr;

		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT COUNT(id_pr) FROM recenzije WHERE id_pr=:id_pr' );
			$st->execute( array( 'id_pr' => $id_pr ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
			$koliko = $st->fetch();
			$poljeBrojRecenzija[] = $koliko[0];
	}
	return $poljeBrojRecenzija;
}



	public function getRecenzijaById( $id_pr )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT  id_rec, id_pr, korisnicko_ime, ocjena, tekst FROM recenzije WHERE id_pr=:id_pr' );
			$st->execute( array( 'id_pr' => $id_pr ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$listaRecenzija = array();
		while ( $row = $st->fetch() )
		{
			$listaRecenzija[] = new Recenzija( $row['id_rec'], $row['id_pr'], $row['korisnicko_ime'], $row['ocjena'], $row['tekst']);
		}

		return $listaRecenzija;
	}


	public function dodajNovuRecenziju( $id_pr, $ocjena_proizvoda, $tekst_recenzije )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'INSERT INTO recenzije(id_pr, korisnicko_ime, ocjena, tekst) VALUES (:id_pr, :korisnicko_ime, :ocjena, :tekst)' );
			$st->execute( array( 'id_pr' => $id_pr, 'korisnicko_ime' => 'gost', 'ocjena' => $ocjena_proizvoda, 'tekst' => $tekst_recenzije ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

	}

};

?>
