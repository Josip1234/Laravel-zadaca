<?php 
namespace App\Services;

use App\Models\Osoba;
use App\Models\VrstaOsobe;
use Illuminate\Support\Arr;

class OsobaService{
    
    public function dohvatiVrste():array{
          return [
        new VrstaOsobe(1,"Logističar"),
        new VrstaOsobe(2,"Branitelj"),
        new VrstaOsobe(3,"Upravitelj"),
        new VrstaOsobe(4,"Konzul"),
        ];
    }
    public function getAll():array{
        $vrsta1=new VrstaOsobe(1,"Logističar");
        $vrsta2=new VrstaOsobe(2,"Branitelj");
        $vrsta3=new VrstaOsobe(3,"Upravitelj");
        $vrsta4=new VrstaOsobe(4,"Konzul");
        return [
            new Osoba(1,"Marko","Markić","-2000-05-05",$vrsta1),
            new Osoba(2,"Maja","Majić","",$vrsta3),
           // new Osoba(3,"Pero","Perić","",$vrsta2),
            new Osoba(3,"Pero","Perić","fwfw",$vrsta4),
            new Osoba(4,"Ana","Anić","2000-05-05",$vrsta4)
        ];
    }
}