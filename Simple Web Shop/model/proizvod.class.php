<?php

class Proizvod
{
	protected $id_pr, $naziv, $opis, $cijena;

	function __construct( $id_pr, $naziv, $opis, $cijena )
	{
		$this->id_pr = $id_pr;
		$this->naziv = $naziv;
		$this->opis = $opis;
		$this->cijena = $cijena;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>
