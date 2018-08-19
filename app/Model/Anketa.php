<?php

/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Anketa
{
	public $id_anketa;
	public $pitanje;
	public $aktivna;
	public $id_odgovor;
	public $rezultat;

	public function dohvatiAnketu()
	{
		$rez = DB::table('anketa')
			->where([
				['aktivna', '=', 1]
			])
			->get();
		return $rez;
	}

	public function dohvatiAnkete()
	{
		$rez = DB::table('anketa')
			->get();
		return $rez;
	}

	public function insertAnketa()
	{
		$id = DB::table('anketa')
			->insertGetId([
				'pitanje' => $this->pitanje,
				'aktivna' => 1
			]);
		return $id;
	}

	public function glas($rezultat)
	{
		$rez = DB::table('rezultat')
		->where([
			['id_anketa', '=', $this->id_anketa],
			['id_odgovor', '=', $this->id_odgovor]
		])
		->update([
			'rezultat' => $rezultat + 1
		]);
		return $rez;
	}

	public function findPitanje()
	{
		$rez = DB::table('anketa')
			->where([
				['aktivna', '=', 1]
			])
			->get();
		return $rez;
	}

	public function find()
	{
		$rez = DB::table('rezultat')
			->where([
				['id_anketa', '=', $this->id_anketa],
				['id_odgovor', '=', $this->id_odgovor]
			])
			->get();
		return $rez;
	}

	public function insert()
	{
		$rez = DB::table('rezultat')
			->insert([
				'id_anketa' => $this->id_anketa,
				'id_odgovor' => $this->id_odgovor,
				'rezultat' => 1
			]);
		return $rez;
	}

	public function update($id_anketa)
	{
		$rez = DB::table('anketa')
			->where('id_anketa', '=', $id_anketa)
			->update([
				'aktivna' => 0
			]);
		return $rez;
	}

	public function findAnketa()
	{
		$rez = DB::table('anketa')
			->where([
				['id_anketa', '=', $this->id_anketa]
			])
			->get();
		return $rez;
	}

	public function delete()
	{
		$rez = DB::table('anketa')
			->where('id_anketa', '=', $this->id_anketa)
			->delete();
		return $rez;
	}

	public function updateAnketa()
	{
		$rez = DB::table('anketa')
			->where('id_anketa', '=', $this->id_anketa)
			->update([
				'pitanje' => $this->pitanje,
				'aktivna' => $this->aktivna
			]);
		return $rez;
	}
}