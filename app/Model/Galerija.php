<?php

/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Galerija
{
	public $id_proizvodjac;
	public $putanja;
	public $alt;
	public $id_model;
	public $id_slika;

	public function dohvatiGaleriju()
	{
		$rez = DB::table('proizvodjac')
			->join('model','proizvodjac.id_proizvodjac', '=', 'model.id_proizvodjac')
			->join('slika', 'model.id_model', '=', 'slika.id_model')
			->where([
				['proizvodjac.id_proizvodjac', '=', $this->id_proizvodjac]
			])
			->select('proizvodjac.*','slika.putanjaV','slika.alt','model.naziv_model')
			->get();
		return $rez;
	}

	public function dohvatiGalerije()
	{
		$rez = DB::table('slika')
			->join('model','slika.id_model', '=', 'model.id_model')
			->get();
		return $rez;
	}

	public function insert()
	{
		$rez = DB::table('slika')
		->insert([
			'putanjaV' => $this->putanja,
			'alt' => $this->alt,
			'id_model' => $this->id_model,
			'datumUnosa' => date("Y-m-d"),
			'datumIzmene' => date("Y-m-d")
		]);
		return $rez;
	}

	public function delete()
	{
		$rez = DB::table('slika')
			->where('id_slika', '=', $this->id_slika)
			->delete();
		return $rez;
	}

	public function find()
	{
		$rez = DB::table('slika')
			->where(
				'id_slika', '=', $this->id_slika
			)
			->get();
		return $rez;
	}
}