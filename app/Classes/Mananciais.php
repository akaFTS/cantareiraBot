<?php

namespace App\Classes;

use Goutte\Client;
use \stdClass;

class Mananciais {
	
	public static function getChuvas(){

		$client = new Client();
		$crawler = $client->request('GET', 'http://www2.sabesp.com.br/mananciais/DivulgacaoSiteSabesp.aspx');
        $cells = $crawler->filter("table.tabDados")->filter(".guardaImgBgDetalhe");
		$chuvas = array();
		$nomes = ["Cantareira", "Alto Tietê", "Guarapiranga", "Alto Cotia", "Rio Grande", "Rio Claro"];
		for($i = 0; $i < 6; $i++){
			$obj = new stdClass();
			$obj->nome = $nomes[$i];
			$obj->hoje = $cells->eq($i*4 + 1)->text();
			$obj->acum = $cells->eq($i*4 + 2)->text();
			$obj->media = $cells->eq($i*4 + 3)->text();
			$chuvas[] = $obj;
		}
		return $chuvas;

	}

}