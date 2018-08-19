<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Grad;
use App\Model\Telefon;
use App\Model\Meni;
use App\Model\Slajder;
use App\Model\Proizvodjac;
use App\Model\Anketa;
use App\Model\Korpa;
use \Psy\Util\Json;
use Illuminate\Database\QueryException;

class AjaxKontroler extends Controller
{
    private $podaci;

	public function ajaxTelefoni($offset)
    {
    	$telefon = new Telefon();
    	$telefon->offset = $offset;
    	$this->podaci['telefoni'] = $telefon->paginacija();
    	return view('korisnik.ajax.telefoniAjax',$this->podaci);
    }

    public function filter(Request $request)
    {
        $proizvodjac = $request->post("proizvodjac");
        $model = $request->post("model");
        $telefon = new Telefon();
        $telefon->id_proizvodjac = $proizvodjac;
        $telefon->id_model = $model;
        try 
        {
            return Json::encode($this->podaci['filter'] = $telefon->filter());    
        } 
        catch (QueryException $e) {
             \Log::error("Greska pri izvrsavanju upita " . $e->getMessage());
                return redirect()->back()->with('warning', "Doslo je do greske na serveru.");
        }
        
    }

    public function anketa(Request $request)
    {
        $id_odgovor = $request->post("id_odgovor");
        $id_anketa = $request->post("id_anketa");
        $anketa = new Anketa();
        $anketa->id_anketa = $id_anketa;
        $anketa->id_odgovor = $id_odgovor;
        try 
        {
            $this->podaci['rezultat'] = $anketa->find();

            if ($this->podaci['rezultat'][0]->rezultat != NULL) {
                $anketa->glas($this->podaci['rezultat'][0]->rezultat);
                return Json::encode($this->podaci['rezultat'] = $anketa->find());
            }
            else
            {
                $anketa->insert();
                return Json::encode($this->podaci['rezultat'] = $anketa->find());
            }  
        } 
        catch (QueryException $e) {
            \Log::error("Greska pri izvrsavanju upita " . $e->getMessage());
            return redirect()->back()->with('warning', "Doslo je do greske na serveru.");
        }
       
    }

    public function korpa(Request $request)
    {
        $id_korisnik = $request->session()->get('korisnik')->id_korisnik;
        $korpa = new Korpa();
        $korpa->id_korisnik = $id_korisnik;
        try
        {
            return Json::encode($this->podaci['naruceno'] = $korpa->korpa());
        }
        catch(QueryException $e)
        {
            \Log::error("Greska pri izvrsavanju upita " . $e->getMessage());
            return redirect()->back()->with('warning', "Doslo je do greske na serveru.");
        }
        
    }

    public function search(Request $request)
    {
        $unos = $request->get('uneto');
        $telefon = new Telefon();
        try
        {
            return $telefon->search($unos);
        }
        catch(QueryException $e)
        {
            \Log::error("Greska pri izvrsavanju upita " . $e->getMessage());
            return redirect()->back()->with('warning', "Doslo je do greske na serveru.");
        }
        
    }
}
