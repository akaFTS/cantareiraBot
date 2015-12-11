<?php

namespace App\Classes;

use Goutte\Client;

class Mananciais {
	
	public static function getChuvas(){

		// $crawler = $client->request('GET', 'http://www2.sabesp.com.br/mananciais/DivulgacaoSiteSabesp.aspx');
  //       $tabela = $crawler->filter("table.tabDados");
  //       $cells = $tabela->filter(".guardaImgBgDetalhe");
		$chuvas = array();
		$obj = new stdClass();
		$obj->nome = "Cantareira";
		$obj->cod = "cnt";
		$obj->hoje = "4.2mm";
		$obj->acum = "90mm";
		$obj->media = "200mm";
		$chuvas[] = $obj;
		$obj = new stdClass();
		$obj->nome = "Alto Tietê";
		$obj->cod = "alt";
		$obj->hoje = "0.2mm";
		$obj->acum = "40mm";
		$obj->media = "195mm";
		$chuvas[] = $obj;
		return $chuvas;

	}

}