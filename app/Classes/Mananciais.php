<?php

namespace App\Classes;

use Goutte\Client;
use \stdClass;

class Mananciais {
	
	public static function getChuvas(){

		$client = new Client();
		$crawler = $client->request('GET', 'http://www2.sabesp.com.br/mananciais/DivulgacaoSiteSabesp.aspx');
        $cells = $crawler->filter("table.tabDados")->filter(".guardaImgBgDetalhe");
        $data = $crawler->filter("#lblData")->text();
		$chuvas = new stdClass();
		$chuvas->data = $data;
		$chuvas->manans = array();
		$nomes = ["Cantareira", "Alto Tietê", "Guarapiranga", "Alto Cotia", "Rio Grande", "Rio Claro"];
		for($i = 0; $i < 6; $i++){
			$obj = new stdClass();
			$obj->nome = $nomes[$i];
			$obj->hoje = $cells->eq($i*4 + 1)->text();
			$obj->acum = $cells->eq($i*4 + 2)->text();
			$obj->media = $cells->eq($i*4 + 3)->text();
			$chuvas->manans[] = $obj;
		}
		return $chuvas;

	}

	public static function getHoje(){
		$client = new Client();
		$crawler = $client->request('GET', 'http://www.apolo11.com/reservatorios.php?step=d');
		$tables = $crawler->filter("table td b table");
		$cnt = $tables->eq(0)->text();
		return $cnt;	
	}

}