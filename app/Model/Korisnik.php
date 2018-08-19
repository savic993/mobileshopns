<?php

/**
* 
*/
namespace App\Model;
use Illuminate\Support\Facades\DB;

class Korisnik
{
	public $id_korisnik;
	public $username;
	public $email;
	public $password;
    public $imePrezime;
    public $id_grad;
    public $adresa;
    public $id_uloga;

	public function logovanje()
	{
		$rez = DB::table('korisnik')
				->join('uloga','korisnik.id_uloga', '=', 'uloga.id_uloga')
				->where([
					['username', '=', $this->username],
					['password', '=', md5($this->password)]
				])
				->select('korisnik.*','uloga.naziv_uloga as uloga')
				->get()
				->first();
		return $rez;
	}

	public function registracija()
	{
		$rez = DB::table('korisnik')
			->insert([
				'ime_prezime' => $this->imePrezime,
				'username' => $this->username,
				'password' => md5($this->password),
				'email' => $this->email,
				'id_grad' => $this->id_grad,
				'adresa' => $this->adresa,
				'id_uloga' => $this->id_uloga,
				'datumUnosa' => date("Y-m-d"),
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}

	public function dohvatiKorisnike()
	{
		$rez = DB::table('korisnik')
			->join('grad', 'korisnik.id_grad', '=', 'grad.id_grad')
			->get();
			return $rez;
	}

	public function delete()
	{
		$rez = DB::table('korisnik')
			->where('id_korisnik', '=', $this->id_korisnik)
			->delete();
		return $rez;
	}

	public function find()
	{
		$rez = DB::table('korisnik')
			->where([
				['id_korisnik', '=', $this->id_korisnik]
			])
			->get();
		return $rez;
	}

	public function update()
	{
		$rez = DB::table('korisnik')
			->where('id_korisnik', '=', $this->id_korisnik)
			->update([
				'id_uloga' => $this->id_uloga,
				'datumIzmene' => date("Y-m-d")
			]);
		return $rez;
	}

}