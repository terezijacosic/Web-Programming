<?php

class Recenzija
{
	protected $id_rec, $id_pr, $korisnicko_ime, $ocjena, $tekst;

	function __construct( $id_rec, $id_pr, $korisnicko_ime, $ocjena, $tekst )
	{
		$this->id_rec = $id_rec;
		$this->id_pr = $id_pr;
		$this->korisnicko_ime = $korisnicko_ime;
		$this->ocjena = $ocjena;
		$this->tekst = $tekst;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $value ) { $this->$prop = $value; return $this; }
}

?>

