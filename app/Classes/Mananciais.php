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
		$obj = new stdClass();
		$obj->nome = "Cantareira";
		$obj->hoje = $cells->eq(1)->text();
		$obj->acum = "90mm";
		$obj->media = "200mm";
		$chuvas[] = $obj;
		$obj = new stdClass();
		$obj->nome = "Alto Tietê";
		$obj->hoje = "0.2mm";
		$obj->acum = "40mm";
		$obj->media = "195mm";
		$chuvas[] = $obj;
		return $chuvas;

	}

}