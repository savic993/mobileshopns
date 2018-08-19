<?php

/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Telefon
{
	public $id_model;
	public $naziv_model;
	public $id_proizvodjac;
	public $opis;
	public $cena;
	public $kolicina;
	public $putanja;
	public $naziv_proizvodjac;
	public $offset;

	public function insert()
	{
		$rez = DB::table('model')
			->insert([
				'naziv_model' => $this->naziv_model,
				'id_proizvodjac' => $this->id_proizvodjac,
				'opis' => $this->opis,
				'cena' => $this->cena,
				'kolicina' => $this->kolicina,
				'datumUnosa' => date("Y-m-d"),
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	} 
	public function paginacija()
	{
		$rez = DB::table('model')
			->join('proizvodjac', 'model.id_proizvodjac','=','proizvodjac.id_proizvodjac')
			->offset($this->offset)
			->limit(3)
			->get();
		return $rez;
	}

	public function brojTelefona()
	{
		$rez = DB::table('model')
			->join('proizvodjac', 'model.id_proizvodjac','=','proizvodjac.id_proizvodjac')
			->count();
		return $rez;
	}

	public function dohvatiTelefone()
	{
		$rez = DB::table('model')
			->join('proizvodjac', 'model.id_proizvodjac','=','proizvodjac.id_proizvodjac')
			->get();
		return $rez;
	}

	public function dohvatiTelefon()
	{
		$rez = DB::table('model')
			->join('proizvodjac', 'model.id_proizvodjac','=','proizvodjac.id_proizvodjac')
			->where([
				['id_model', '=', $this->id_model]
			])
			->get();
		return $rez;
	}

	public function brisanjeTelefona()
	{
		$rez = DB::table('model')
			->where('id_model', '=', $this->id_model)
			->delet();
		return $rez;
	}

	public function find()
	{
		$rez = DB::table('model')
			->where([
				['id_model', '=', $this->id_model]
			])
			->get();
		return $rez;
	}

	public function update()
	{
		$rez = DB::table('model')
			->where('id_model', '=', $this->id_model)
			->update([
				'naziv_model' => $this->naziv_model,
				'id_proizvodjac' => $this->id_proizvodjac,
				'opis' => $this->opis,
				'cena' => $this->cena,
				'kolicina' => $this->kolicina, 
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}
	
	public function delete()
	{
		$rez = DB::table('model')
			->where('id_model', '=', $this->id_model)
			->delete();
		return $rez;
	}

	public function filter()
	{
		$rez = DB::table('proizvodjac')
			->join('model', 'proizvodjac.id_proizvodjac', '=', 'model.id_proizvodjac')
			->where([
					['proizvodjac.id_proizvodjac', '=', $this->id_proizvodjac], 
					['id_model', '=', $this->id_model]
				])
			->get();
		return $rez;
	}

	public function search($uneto)
	{
		$rez = DB::table('proizvodjac')
			->join('model', 'proizvodjac.id_proizvodjac', '=', 'model.id_proizvodjac')
			->where('proizvodjac.naziv_proizvodjac','like','%'.$uneto.'%')
			->get();
		return $rez;
	}
}