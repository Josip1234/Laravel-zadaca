<?php 
namespace App\Models;
class Osoba{
    
    public VrstaOsobe $vrsta;
    public function __construct(public int $id,public string $ime,public string $prezime, 
    public string $datumRodjenja, VrstaOsobe $vrstaOsobe)
    {
        $this->id=$id;
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->datumRodjenja=$datumRodjenja;
        $this->vrstaOsobe=$vrstaOsobe;  
        
        }
}