<?php
/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Meni
{
	public $id_meni;
	public $link;
	public $naziv;
	public $pozicija;

	public function dohvatiMenije()
	{
		$rez = DB::table('meni')
			->get();
		return $rez;
	}

	public function insert()
	{
		$rez = DB::table('meni')
			->insert([
				'link' => $this->link,
				'naziv_meni' => $this->naziv,
				'pozicija' => $this->pozicija,
				'datumUnosa' => date("Y-m-d"),
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}

	public function delete()
	{
		$rez = DB::table('meni')
			->where('id_meni', '=', $this->id_meni)
			->delete();
		return $rez;
	}

	public function find()
	{
		$rez = DB::table('meni')
			->where([
				['id_meni', '=', $this->id_meni]
			])
			->get();
		return $rez;
	}

	public function update()
	{
		$rez = DB::table('meni')
			->where('id_meni', '=', $this->id_meni)
			->update([
				'link' => $this->link,
				'naziv_meni' => $this->naziv,
				'pozicija' => $this->pozicija,
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}
}