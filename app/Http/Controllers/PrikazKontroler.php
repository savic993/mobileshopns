<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Grad;
use App\Model\Slajder;

class PrikazKontroler extends Controller
{
	private $podaci;

    public function __construct()
    {
        $slajder = new Slajder();
        $this->podaci['slajder'] = $slajder->dohvatiSlajdove();
    }

    public function prijava()
    {
    	return view('pages.prijava',$this->podaci);
    }

    public function registracija()
    {
    	$model = new Grad();
    	$this->podaci['gradovi'] = $model->dohvatiGradove();

        
    	return view('pages.registracija',$this->podaci);
    }

    public function autor()
    {
        return view('pages.autor',$this->podaci);
    }

   
}
