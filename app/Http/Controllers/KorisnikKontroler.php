<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Meni;
use App\Model\Slajder;
use App\Model\Proizvodjac;
use App\Model\Galerija;
use App\Model\Telefon;
use App\Model\Anketa;
use App\Model\Odgovori;
use App\Model\Korpa;

class KorisnikKontroler extends Controller
{
	private $podaci;


	public function __construct()
	{
        
		$meni = new Meni();
        $slider = new Slajder();
		$this->podaci['meni'] = $meni->dohvatiMenije();
        $this->podaci['slajder'] = $slider->dohvatiSlajdove();
	}

    public function telefoni()
    {
        $proizvodjac = new Proizvodjac();
        $this->podaci['proizvodjaci'] = $proizvodjac->dohvatiProizvodjace();
        $telefon = new Telefon();
        $this->podaci['telefoni'] = $telefon->dohvatiTelefone();
        $this->podaci['broj'] = $telefon->brojTelefona();
    	return view('korisnik.telefoni', $this->podaci);
    }

    public function galerije()
    {
        $galerija = new Proizvodjac();
        $this->podaci['galerije'] = $galerija->dohvatiProizvodjace();
    	return view('korisnik.galerija', $this->podaci);
    }

    public function galerija($id)
    {
        $galerija = new Galerija();
        $galerija->id_proizvodjac = $id;
        $this->podaci['galerija'] = $galerija->dohvatiGaleriju();
        return view('korisnik.slike',$this->podaci);
    }

    public function anketa()
    {
        $anketa = new Anketa();
        $this->podaci['anketa'] = $anketa->dohvatiAnketu();
        $odgovori = new Odgovori();
        $this->podaci['odgovori'] = $odgovori->dohvatiOdgovore();
    	return view('korisnik.anketa', $this->podaci);
    }

    public function telefon($id)
    {
        $telefon = new Telefon();
        $telefon->id_model = $id;
        $this->podaci['telefon'] = $telefon->dohvatiTelefon();
        $string = $this->podaci['telefon'][0]->opis;
        $niz[] = explode(",", $string);
        $this->podaci['telefon']->push($niz);
        return view('korisnik.telefon', $this->podaci);
    }

    public function naruci($proizvodjac,$model,$korisnik)
    {
        $korpa = new Korpa();
        $this->podaci['korpa'] = $korpa->naruci($proizvodjac,$model,$korisnik);
        return redirect()->back()->with('success', 'Uspesno ste narucili telefon');
    }

    public function korpa($korisnik)
    {
        $korpa = new Korpa();
        $this->podaci['naruceno'] = $korpa->dohvatiNarucene($korisnik);
        return view('korisnik.korpa', $this->podaci);
    }
    
    public function brisanjeNarucbine($id)
    {
        $korpa = new Korpa();
        $korpa->idKorpa = $id;

        $rez = $korpa->delete();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesno ste otkazali narucbinu');
        }
    }

    public function popust($id)
    {
        $slider = new Slajder();
        $slider->id_slajda = $id;
        $this->podaci['popust'] = $slider->dohvatiSlajd();
        return view('korisnik.popust', $this->podaci);
    }

    public function popusti()
    {
        $slider = new Slajder();
        $this->podaci['popusti'] = $slider->dohvatiSlajdove();
        return view('korisnik.popusti', $this->podaci);
    }
}
