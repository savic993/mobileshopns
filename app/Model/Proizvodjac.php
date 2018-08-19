<?php
/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Proizvodjac
{
	public $id_proizvodjac;
	public $naziv_proizvodjac;
	public $putanja;

	public function dohvatiProizvodjace()
	{
		$rez = DB::table('proizvodjac')
			->get();
		return $rez;
	}

	public function insert()
	{
		$rez = DB::table('proizvodjac')
			->insert([
				'naziv_proizvodjac' => $this->naziv_proizvodjac,
				'putanja' => $this->putanja,
				'datumUnosa' => date("Y-m-d"),
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}
}