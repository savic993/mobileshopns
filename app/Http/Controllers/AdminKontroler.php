<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Slajder;
use App\Model\Anketa;
use App\Model\Grad;
use App\Model\Meni;
use App\Model\Korisnik;
use App\Model\Telefon;
use App\Model\Proizvodjac;
use App\Model\Galerija;
use App\Model\Korpa;
use App\Model\Uloga;
use App\Model\Odgovori;
use Illuminate\Support\Facades\File;

class AdminKontroler extends Controller
{
	private $podaci;
    private $model;

    public function __construct()
    {
        $slajder = new Slajder();
        $this->podaci['slajder'] = $slajder->dohvatiSlajdove();
    }

    public function grad()
    {
        $grad = new Grad();
        $this->podaci['gradovi'] = $grad->dohvatiGradove();
    	return view('admin.grad',$this->podaci);
    }

    public function unosGrad(Request $request)
    {            
            $ime = $request->get("tbGrad");
            $broj = $request->get("tbPosBr");

            //uraditi validaciju

            $grad = new Grad();
            $grad->ime_grad = $ime;
            $grad->pos_broj = $broj;
            $rez = $grad->insert();

            if($rez)
            {
                return redirect()->back()->with('success', 'Uspesan unos');
            }
            else
            {
                return redirect()->back()->with('error', 'Doslo je do greske');
            }
    }

    public function brisanjeGrad($id)
    {
        $grad = new Grad();
        $grad->id_grad = $id;

        $rez = $grad->delete();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesano brisanje');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function izmenaGrad($id)
    {
        $grad = new Grad();
        $grad->id_grad = $id;
        $this->podaci['grad'] = $grad->find();
        return view('admin.izmena.izmenaGrad', $this->podaci);
    }

    public function updateGrad(Request $request)
    {
        $naziv = $request->get("tbGrad");
        $pos_broj = $request->get("tbPosBr");
        $url = $request->url();
        $id_grad = explode("/", $url)[6];
        $grad = new Grad();
        $grad->id_grad = $id_grad;
        $grad->ime_grad = $naziv;
        $grad->pos_broj = $pos_broj;
        $rez = $grad->update();
        if ($rez) {
           return redirect('/admin/grad')->with('success', 'Uspesana izmena');
        }
        else
        {
            return redirect('/admin/grad')->with('error', 'Doslo je do greske');
        }
    }
    
    public function meni()
    {
        $meni = new Meni();
        $this->podaci['meni'] = $meni->dohvatiMenije();
        return view('admin.meni',$this->podaci);
    }

    public function unosMenija(Request $request)
    {
        $link = $request->get("tbRuta");
        $naziv = $request->get("tbNaziv");
        $pozicija = $request->get("tbPozicija");

        //uraditi validaciju

        $meni = new Meni();
        $meni->link = $link;
        $meni->naziv = $naziv;
        $meni->pozicija = $pozicija;
        $rez = $meni->insert();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesan unos');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function izmenaMeni($id)
    {
        $meni = new Meni();
        $meni->id_meni = $id;
        $this->podaci['meni'] = $meni->find();
        return view('admin.izmena.izmenaMeni', $this->podaci);
    }

    public function updateMeni(Request $request)
    {
        $ruta = $request->get("tbRuta");
        $naziv = $request->get("tbNaziv");
        $pozicija = $request->get("tbPozicija");
        $url = $request->url();
        $id_meni = explode("/", $url)[6];
        $meni = new Meni();
        $meni->id_meni = $id_meni;
        $meni->link = $ruta;
        $meni->naziv = $naziv;
        $meni->pozicija = $pozicija;
        $rez = $meni->update();
        if ($rez) {
           return redirect('/admin/meni')->with('success', 'Uspesana izmena');
        }
        else
        {
            return redirect('/admin/meni')->with('error', 'Doslo je do greske');
        }
    }

    public function brisanjeMeni($id)
    {
        $meni = new Meni();
        $meni->id_meni = $id;

        $rez = $meni->delete();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesano brisanje');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function korisnik()
    {
        $korisnik = new Korisnik();
        $this->podaci['korisnici'] = $korisnik->dohvatiKorisnike();
        return view('admin.korisnik',$this->podaci);
    }

    public function izmenaUloga($id)
    {
        $korisnik = new Korisnik();
        $korisnik->id_korisnik = $id;
        $this->podaci['korisnik'] = $korisnik->find();
        $uloga = new Uloga();
        $this->podaci['uloge'] = $uloga->dohvatiUloge();
        return view('admin.izmena.izmenaUloga', $this->podaci);
    }

    public function updateUloga(Request $request)
    {
        $uloga = $request->get("ddlUloga");
        $url = $request->url();
        $id_korisnik = explode("/", $url)[6];
        $korisnik = new Korisnik();
        $korisnik->id_korisnik = $id_korisnik;
        $korisnik->id_uloga = $uloga;
        $rez = $korisnik->update();
        if ($rez) {
           return redirect('/admin/korisnik')->with('success', 'Uspesana izmena');
        }
        else
        {
            return redirect('/admin/korisnik')->with('error', 'Doslo je do greske');
        }
    }

    public function brisanjeKorisnik($id)
    {
        $korisnik = new Korisnik();
        $korisnik->id_korisnik = $id;

        $rez = $korisnik->delete();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesano brisanje');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function telefon()
    {
        $telefon = new Telefon();
        $this->podaci['telefoni'] = $telefon->dohvatiTelefone();
        $proizvodjac = new Proizvodjac();
        $this->podaci['proizvodjaci'] = $proizvodjac->dohvatiProizvodjace();
        return view('admin.telefon',$this->podaci);
    }

    public function unosModela(Request $request)
    {
        $naziv = $request->get("tbNaziv");
        $proizvodjac = $request->get("ddlProizvodjac");
        $cena = $request->get("tbCena");
        $kolicina = $request->get("tbKolicina");

        //opis
        $kamera = $request->get("tbKamera");
        $procesor = $request->get("tbProcesor");
        $memorija = $request->get("tbMemorija");
        $wifi = $request->get("tbWifi");
        $boja = $request->get("tbBoja");

        $opis = $kamera.",".$procesor.",".$memorija.",".$wifi.",".$boja;

        //uraditi validaciju

        $telefon = new Telefon();
        $telefon->naziv_model = $naziv;
        $telefon->id_proizvodjac = $proizvodjac;
        $telefon->cena = $cena;
        $telefon->kolicina = $kolicina;
        $telefon->opis = $opis;
        $rez = $telefon->insert();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesan unos');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }


    }

    public function izmenaTelefon($id)
    {
        $telefon = new Telefon();
        $telefon->id_model = $id;
        $this->podaci['telefon'] = $telefon->find();
        $proizvodjac = new Proizvodjac();
        $this->podaci['proizvodjaci'] = $proizvodjac->dohvatiProizvodjace();
        $opis = $this->podaci['telefon'][0]->opis;
        $niz[] = explode(",", $opis);
        $this->podaci['telefon']->push($niz);
        return view('admin.izmena.izmenaTelefon', $this->podaci);
    }

    public function updateTelefon(Request $request)
    {
        $naziv = $request->get("tbNaziv");
        $proizvodjac = $request->get("ddlProizvodjac");
        $cena = $request->get("tbCena");
        $kolicina = $request->get("tbKolicina");

        //opis
        $kamera = $request->get("tbKamera");
        $procesor = $request->get("tbProcesor");
        $memorija = $request->get("tbMemorija");
        $wifi = $request->get("tbWifi");
        $boja = $request->get("tbBoja");

        $opis = $kamera.",".$procesor.",".$memorija.",".$wifi.",".$boja;

        $url = $request->url();
        $id_model = explode("/", $url)[6];
        $telefon = new Telefon();
        $telefon->id_model = $id_model;
        $telefon->naziv_model = $naziv;
        $telefon->id_proizvodjac = $proizvodjac;
        $telefon->cena = $cena;
        $telefon->kolicina = $kolicina;
        $telefon->opis = $opis;
        $rez = $telefon->update();
        if ($rez) {
           return redirect('/admin/telefon')->with('success', 'Uspesana izmena');
        }
        else
        {
            return redirect('/admin/telefon')->with('error', 'Doslo je do greske');
        }
    }

    public function brisanjeTelefona($id)
    {
        $telefon = new Telefon();
        $telefon->id_model = $id;

        $rez = $telefon->delete();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesano brisanje');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function unosProizvodjaca(Request $request)
    {
        $slika = $request->file('fSlika');
        $tmp_putanja = $slika->getPathName();
        $ekstenzija = $slika->getClientOriginalExtension();
        $ime_fajla = time().'.'.$ekstenzija;
        $putanja = 'images/galerije/'.$ime_fajla;
        $putanja_server = public_path($putanja); 

        File::move($tmp_putanja, $putanja_server);

        $naziv = $request->get("tbProizvodjac");

        //uraditi validaciju

        $proizvodjac = new Proizvodjac();
        $proizvodjac->naziv_proizvodjac = $naziv;
        $proizvodjac->putanja = $putanja;
        $rez = $proizvodjac->insert();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesan unos');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function anketa()
    {
        $anketa = new Anketa();
        $this->podaci['ankete'] = $anketa->dohvatiAnkete();
        return view('admin.anketa',$this->podaci);
    }

    public function unosAnketa(Request $request)
    {
        $pitanje = $request->get("tbPitanje");
        $odgovori = $request->get("tbOdgovor");

        $anketa = new Anketa();
        $aktivna = $anketa->dohvatiAnketu();
        $a = $anketa->update($aktivna[0]->id_anketa);

        $anketa->pitanje = $pitanje;
        $id_anketa = $anketa->insertAnketa();

        $odgovor = new Odgovori();

        foreach ($odgovori as $o) {
            $rez = $odgovor->insertOdgovor($o,$id_anketa);
        }

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesan unos');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function izmenaAnketa($id)
    {
        $anketa = new Anketa();
        $anketa->id_anketa = $id;
        $this->podaci['anketa'] = $anketa->findAnketa();
        return view('admin.izmena.izmenaAnketa', $this->podaci);
    }

    public function updateAnketa(Request $request)
    {
        $pitanje = $request->get("tbPitanje");
        $aktivna = $request->get("ddlAktivna");
        $url = $request->url();
        $id_anketa = explode("/", $url)[6];
        $anketa = new Anketa();
        $anketa->id_anketa = $id_anketa;
        $anketa->pitanje = $pitanje;
        $anketa->aktivna = $aktivna;
        $rez = $anketa->updateAnketa();
        if ($rez) {
           return redirect('/admin/anketa')->with('success', 'Uspesana izmena');
        }
        else
        {
            return redirect('/admin/anketa')->with('error', 'Doslo je do greske');
        }
    }

    public function brisanjeAnkete($id)
    {
        $anketa = new Anketa();
        $anketa->id_anketa = $id;

        $rez = $anketa->delete();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesano brisanje');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function slajder()
    {
        $slajder = new Slajder();
        $this->podaci['slajderi'] = $slajder->dohvatiSlajdove();
        return view('admin.slajder',$this->podaci);
    }

    public function unosSlajdera(Request $request)
    {
        $slika = $request->file('fSlika');
        $naslovSlike = $request->get("tbNaslov");
        $tmp_putanja = $slika->getPathName();
        $ekstenzija = $slika->getClientOriginalExtension();
        $ime_fajla = $naslovSlike.'.'.$ekstenzija;
        $putanja = 'images/slider/'.$ime_fajla;
        $putanja_server = public_path($putanja); 

        File::move($tmp_putanja, $putanja_server);

        $cena = $request->get("tbCena");
        $naslov = $request->get("tbNaslovSlajd");
        $tekst = $request->get("tbTekst");

        //uraditi validaciju

        $slajder = new Slajder();
        $slajder->cena = $cena;
        $slajder->naslov = $naslov;
        $slajder->tekst = $tekst;
        $slajder->putanja = $putanja;
        $rez = $slajder->insert();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesan unos');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function izmenaSlajdera($id)
    {
        $slajder = new Slajder();
        $slajder->id_slajda = $id;
        $this->podaci['slajd'] = $slajder->find();
        return view('admin.izmena.izmenaSlajdera', $this->podaci);
    }

    public function updateSlajdera(Request $request)
    {
        $cena = $request->get("tbCena");
        $naslov = $request->get("tbNaslovSlajd");
        $tekst = $request->get("tbTekst");
        $url = $request->url();
        $id_slajda = explode("/", $url)[6];
        $slajder = new Slajder();
        $slajder->id_slajda = $id_slajda;
        $slajder->cena = $cena;
        $slajder->naslov = $naslov;
        $slajder->tekst = $tekst;
        $rez = $slajder->update();
        if ($rez) {
           return redirect('/admin/slajder')->with('success', 'Uspesana izmena');
        }
        else
        {
            return redirect('/admin/slajder')->with('error', 'Doslo je do greske');
        }
    }

    public function brisanjeSlajdera($id)
    {
        $slajder = new Slajder();
        $slajder->id_slajda = $id;

        //brisanje slike sa servera
        $slajd = $slajder->find();
        File::delete($slajd[0]->putanja);

        $rez = $slajder->delete();

        

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesano brisanje');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function galerija()
    {
        $telefon = new Telefon();
        $galerija = new Galerija();
        $this->podaci['telefoni'] = $telefon->dohvatiTelefone();
        $this->podaci['galerije'] = $galerija->dohvatiGalerije();
        return view('admin.galerija',$this->podaci);
    }

    public function unosSlike(Request $request)
    {
        $slika = $request->file('fSlika');
        $tmp_putanja = $slika->getPathName();
        $ekstenzija = $slika->getClientOriginalExtension();
        $ime_fajla = time().'.'.$ekstenzija;
        $putanja = 'slike/telefoni/velikeSlike/'.$ime_fajla;
        $putanja_server = public_path($putanja); 

        File::move($tmp_putanja, $putanja_server);

        $alt = $request->get("tbOpis");
        $model = $request->get("ddlModel");

        //uraditi validaciju

        $galerija = new Galerija();
        $galerija->putanja = $putanja;
        $galerija->alt = $alt;
        $galerija->id_model = $model;
        $rez = $galerija->insert();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesan unos');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function brisanjeSlike($id)
    {
        $galerija = new Galerija();
        $galerija->id_slika = $id;

        //brisanje slike sa servera
        $slika = $galerija->find();
        File::delete($slika[0]->putanjaV);

        $rez = $galerija->delete();

        

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesano brisanje');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }

    public function narucbine()
    {
        $narucbine = new Korpa();
        $this->podaci['narucbine'] = $narucbine->dohvatiNarucbine();
        return view('admin.narucbine',$this->podaci);
    }

    public function brisanjeNarucbine($id)
    {
        $korpa = new Korpa();
        $korpa->idKorpa = $id;

        $rez = $korpa->delete();

        if($rez)
        {
            return redirect()->back()->with('success', 'Uspesano brisanje');
        }
        else
        {
            return redirect()->back()->with('error', 'Doslo je do greske');
        }
    }
}
