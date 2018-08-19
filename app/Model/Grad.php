<?php

/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Grad
{
	public $id_grad;
	public $ime_grad;
	public $pos_broj;

	public function dohvatiGradove()
	{
		$rez = DB::table('grad')
			->get();
		return $rez;
	}

	public function insert()
	{
		$rez = DB::table('grad')
		->insert([
			'ime_grad' => $this->ime_grad,
			'pos_br' => $this->pos_broj,
			'datumUnosa' => date("Y-m-d"),
			'datumIzmene' => date("Y-m-d")
		]);
		return $rez;
	}

	public function delete()
	{
		$rez = DB::table('grad')
			->where('id_grad', '=', $this->id_grad)
			->delete();
		return $rez;
	}

	public function find()
	{
		$rez = DB::table('grad')
			->where([
				['id_grad', '=', $this->id_grad]
			])
			->get();
		return $rez;
	}

	public function update()
	{
		$rez = DB::table('grad')
			->where('id_grad', '=', $this->id_grad)
			->update([
				'ime_grad' => $this->ime_grad,
				'pos_br' => $this->pos_broj,
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}
}