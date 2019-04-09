<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Korisnik;
use Illuminate\Database\QueryException;
use Validator;

class LoginKontroler extends Controller
{
    public function logovanje(Request $request)
    {
        if ($request->has('btnPrijava')) 
        {
            $model = new Korisnik();
            $model->username = $request->get("tbUsername");
            $model->password = $request->get("tbLozinka");
            $korisnik = $model->logovanje();
           
            if ($korisnik) 
            {
                $request->session()->put('korisnik', $korisnik);
                return ($korisnik->uloga == "Administrator") ? redirect(route('grad')) : redirect(route('home'));
            }
            else
            {
                return redirect()->back()->with("error", "Pogresno korisnicko ime ili lozinka.");
            }
        }
    }

    public function odjava(Request $request)
    {
        $request->session()->forget('korisnik');
        $request->session()->flush();
        return redirect(route('pocetna'));
    }

    public function registracija(Request $request)
    {
        $pravila = [
            'tbImePrezime' => [
                'required',
                'min:7',
                'max:50',
                'regex:/[A-Z][a-z]{2,}\s[A-Z][a-z]{4,}/'
            ],
            'tbKorisnickoIme' => [
                'required',
                'alpha',
                'min:7',
                'max:50',
                'regex:/[a-zA-Z\d]{6,}/'
            ],
            'tbLozinka' => [
                'required',
                'min:6',
                'regex:/[a-zA-Z\d]{6,}/'
            ], 
            'tbEmail' => [
                'required',
                'email',
                'regex:/\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+/'
            ],
            'tbAdresa' => [
                'required',
                'min:7',
                'max:50',
                'regex:/[A-Z][a-z]{2,}\s[A-Z][a-z]{3,}\s(\d){1,3}/'
            ]
        ];

        $messages = [
            "tbLozinka.regex" => 'Lozinka mora sadrzati slova, jedno veliko slovo i broj',
            "tbImePrezime.regex" => "Ime i prezime nisu u dobrom formatu",
            "tbEmail.regex" => "Email nije u dobrom formatu",
            "tbAdresa.regex" => "Adresa nije u dobrom formatu",
            "tbLozinka.regex" => "Lozinka nije u dobrom formatu",
            'required' => 'Polje :attribute je obavezno',
            'max' => 'Polje ne sme biti vece od :max',
            'min' => 'Polje ne sme biti manje od :min',            
            'email' => 'Email nije validan'
        ];

        $validator = Validator::make($request->all(), $pravila, $messages);
        $validator->validate();

        try
        {
            $korisnik = new Korisnik();

            $korisnik->imePrezime = $request->post("tbImePrezime");
            $korisnik->username = $request->post("tbKorisnickoIme");
            $korisnik->password = $request->post("tbLozinka");
            $korisnik->email = $request->post("tbEmail");
            $korisnik->id_grad = $request->post("ddlGrad");
            $korisnik->adresa = $request->post("tbAdresa");
            $korisnik->id_uloga = 2;

            $korisnik->registracija();
            return redirect()->back()->with("success", "Uspesno ste se registrovali.");
        }
        catch(QueryException $e)
        {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "Registracija nije uspela");
        }
        
    }
}
