<?php

// Manualno inicijaliziramo bazu ako već nije.
require_once '../../model/db.class.php';

$db = DB::getConnection();

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS proizvodi (' .
		'id_pr int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'naziv varchar(255) NOT NULL,' .
		'opis varchar(1000) NOT NULL,' .
		'cijena int NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #1: " . $e->getMessage() ); }

echo "Napravio tablicu proizvodi.<br />";

try
{
	$st = $db->prepare(
		'CREATE TABLE IF NOT EXISTS recenzije (' .
		'id_rec int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
		'id_pr int NOT NULL,' .
		'korisnicko_ime varchar(20) NOT NULL,' .
		'ocjena int NOT NULL,' .
		'tekst varchar(1000) NOT NULL)'
	);

	$st->execute();
}
catch( PDOException $e ) { exit( "PDO error #2: " . $e->getMessage() ); }

echo "Napravio tablicu recenzije.<br />";



try
{
	$st = $db->prepare( 'INSERT INTO proizvodi( naziv, opis, cijena) VALUES ( :naziv, :opis, :cijena)' );

	$st->execute( array( 'naziv' => 'Prekrivač za krevet',
				'opis' => 'Pamučni prekrivač (100% obnovljiv materijal), dimenzija 150x250 cm.', 'cijena' => "60"));
	$st->execute( array(  'naziv' => 'Poplun',
				'opis' => 'Hladniji poplun, ispuna 100% poliester, tkanina 65% poliester, 35% pamuk.', 'cijena' => "100"));
	$st->execute( array(  'naziv' => 'Jastuk',
				'opis' => 'Mekši jastuk, ispuna 100% poliester, tkanina 55% liocelno vlakno, 45% pamuk.', 'cijena' => "50"));
	$st->execute( array( 'naziv' => 'Plahta',
				'opis' => 'Plahta s fiksnom navlakom, sastav 45% poliester, 55% pamuk. Dostupno u više boja.', 'cijena' => "30"));
	$st->execute( array('naziv' => 'Ukrasna jastučnica',
				'opis' => 'Pamučna jastučnica s različitim dizajnom na svakoj strani, dimenzije 50x50 cm.', 'cijena' => "20"));
}
catch( PDOException $e ) { exit( "PDO error #4: " . $e->getMessage() ); }

echo "Ubacio proizvode u tablicu proizvodi.<br />";


try
{
	$st = $db->prepare( 'INSERT INTO recenzije( id_pr, korisnicko_ime, ocjena, tekst) VALUES ( :id_pr, :korisnicko_ime, :ocjena, :tekst)' );

	$st->execute( array( 'id_pr' => '1', 'korisnicko_ime' => 'Maja', 'ocjena' => '5',
				'tekst' => 'Preporučujem, u lijepim je pastelnim bojama, stvarno ga dugo imamo.'));
	$st->execute( array( 'id_pr' => '4', 'korisnicko_ime' => 'Ela', 'ocjena' => '2',
				'tekst' => 'Crvena i kraljevsko plava plahta puštaju boju kod pranja.'));
	$st->execute( array( 'id_pr' => '5', 'korisnicko_ime' => 'Josipa', 'ocjena' => '5',
				'tekst' => 'Prelijepi dizajn i ugodni materijal!'));
}
catch( PDOException $e ) { exit( "PDO error #5: " . $e->getMessage() ); }

echo "Ubacio recenzije u tablicu recenzije.<br />";


?>
