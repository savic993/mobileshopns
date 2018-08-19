<?php 

/**
* 
*/

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Odgovori
{
	public $id_odgovor;
	public $odgovor;
	public $id_anketa;

	public function dohvatiOdgovore()
	{
		$rez = DB::table('odgovori')
			->join('anketa', 'odgovori.id_anketa', '=', 'anketa.id_anketa')
			->where([
				['aktivna', '=', 1]
			])
			->get();
		return $rez;
	}

	public function insertOdgovor($odgovor, $id_anketa)
	{
		$rez = DB::table('odgovori')
			->insert([
				'odgovor' => $odgovor,
				'id_anketa' => $id_anketa
			]);
		return $rez;
	}
}