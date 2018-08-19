<?php

/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Uloga
{
	public $id_uloga;
	public $naziv_uloga;

	public function dohvatiUloge()
	{
		$rez = DB::table('uloga')
			->get();
		return $rez;
	}
}