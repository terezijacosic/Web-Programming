<?php

require_once 'model/service.class.php';

class ProizvodiController
{

	public function index()
	{
		$ls = new Service();

		$title = 'Popis svih proizvoda';
		$listaProizvoda = $ls->getAllProducts();
		$listaProsjeka = $ls->getAVG( $listaProizvoda );
		$brojRecenzija = $ls->getBrojRecenzija( $listaProizvoda );


		require_once 'view/proizvodi_index.php';
	}

};

?>
