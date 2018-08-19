<?php

/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Korpa
{
	public $datumUnosa;
	public $datumIzmene;
	public $id_korisnik;
	
	public function dohvatiNarucbine()
	{
		$rez = DB::table('korpa')
			->join('model', 'korpa.idModel', '=', 'model.id_model')
			->join('proizvodjac', 'korpa.idProizvodjac', '=', 'proizvodjac.id_proizvodjac')
			->join('korisnik', 'korpa.idKorisnik', '=', 'korisnik.id_korisnik')
			->join('grad', 'korisnik.id_grad', '=', 'grad.id_grad')
			->get();
		return $rez;
	}

	public function naruci($proizvodjac, $model, $korisnik)
	{
		$rez = DB::table('korpa')
		->insert([
			'idKorisnik' => $korisnik,
			'idModel' => $model,
			'idProizvodjac' => $proizvodjac,
			'datumUnosa' => date("Y-m-d"),
			'datumIzmene' => date("Y-m-d")
		]);
		return $rez;
	}

	public function dohvatiNarucene($korisnik)
	{
		$rez = DB::table('korpa')
		->join('model', 'korpa.idModel', '=', 'model.id_model')
		->join('proizvodjac', 'korpa.idProizvodjac', '=', 'proizvodjac.id_proizvodjac')
		->join('korisnik', 'korpa.idKorisnik', '=', 'korisnik.id_korisnik')
		->where([
			['idKorisnik', '=', $korisnik]
		])
		->get();
		return $rez;
	}

	public function korpa()
	{
		$rez = DB::table('korpa')
		->join('model', 'korpa.idModel', '=', 'model.id_model')
		->join('proizvodjac', 'korpa.idProizvodjac', '=', 'proizvodjac.id_proizvodjac')
		->join('korisnik', 'korpa.idKorisnik', '=', 'korisnik.id_korisnik')
		->where([
			['idKorisnik', '=', $this->id_korisnik]
		])
		->count();
		return $rez;
	}

	public function delete()
	{
		$rez = DB::table('korpa')
			->where('idKorpa', '=', $this->idKorpa)
			->delete();
		return $rez;
	}

}