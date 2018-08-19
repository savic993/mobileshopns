<?php

/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Slajder
{
	public $id_slajda;
	public $putanja;
	public $cena;
	public $naslov;
	public $tekst;

	public function dohvatiSlajdove()
	{
		$rez = DB::table('slider')
			->get();
		return $rez;
	}

	public function dohvatiSlajd()
	{
		$rez = DB::table('slider')
			->where([
				['id_slajda', '=' , $this->id_slajda]
			])
			->get();
		return $rez;
	}

	public function insert()
	{
		$rez = DB::table('slider')
			->insert([
				'putanja' => $this->putanja,
				'cena' => $this->cena,
				'naslov' => $this->naslov,
				'tekst' => $this->tekst,
				'datumUnosa' => date("Y-m-d"),
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}

	public function delete()
	{
		$rez = DB::table('slider')
			->where('id_slajda', '=', $this->id_slajda)
			->delete();
		return $rez;
	}

	public function find()
	{
		$rez = DB::table('slider')
			->where([
				['id_slajda', '=', $this->id_slajda]
			])
			->get();
		return $rez;
	}

	public function update()
	{
		$rez = DB::table('slider')
			->where('id_slajda', '=', $this->id_slajda)
			->update([
				'cena' => $this->cena,
				'naslov' => $this->naslov,
				'tekst' => $this->tekst,
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}
	
}