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
		$nomes = ["Cantareira", "Guarapiranga", "Alto Cotia", "Alto Tietê", "Rio Claro", "Rio Grande"];
		$client = new Client();
		$crawler = $client->request('GET', 'http://www.apolo11.com/reservatorios.php?step=d');
		$tables = $crawler->filter("font[face='arial']");
		$data = $crawler->filter("font[face='verdana']");
		$obj = new stdClass();
		$obj->data = $data->eq(10)->text()."/".date('y');
		$obj->niveis = array();
		$tmp = array();
		for($i = 0; $i < 6; $i++){
			$nivel = new stdClass();
			$nivel->nome = $nomes[$i];
			$nivel->hoje = $tables->eq($i*9 + 16)->text();
			$nivel->ontem = $tables->eq($i*9 + 15)->text();
			$tmp[] = $nivel;
		}
		error_log($tables->eq(3)->text);
		$obj->niveis[0] = $tmp[0];
		$obj->niveis[1] = $tmp[3];
		$obj->niveis[2] = $tmp[1];
		$obj->niveis[3] = $tmp[2];
		$obj->niveis[4] = $tmp[5];
		$obj->niveis[5] = $tmp[4];

		return $obj;	
	}

}