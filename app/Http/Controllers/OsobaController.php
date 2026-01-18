<?php

namespace App\Http\Controllers;

use App\Services\OsobaService;
use Illuminate\Http\Request;

class OsobaController extends Controller
{
    public function prikazVrstaOsoba(){
           $vrste=(new OsobaService())->dohvatiVrste();
           $output="<h3>Prikaz Vrsta osoba</h3>";
           $output.="<ul>";
           foreach ($vrste as $vrsta) {
            $output.="<li>";
            $output.=$vrsta->id;
            $output.=" ";
            $output.=$vrsta->vrsta;
            $output.="</li>";
           }
           $output.="</ul>";
           return nl2br($output);
    }
    public function prikazOsobaSVrstamaOsoba(){
         $osobe=(new OsobaService())->getAll();
             $output="<h3>Prikaz svih osoba</h3>";
             $output.="<table border='1'>";
             $output.="<thead>
                <tr>
                <th>Broj osobe</th>
                <th>Ime</th>
                <th>Prezime</th>
                  <th>Datum rođenja</th>
                <th>Vrsta osobe</th>
                </tr>
                </thead><tbody>
                ";
                foreach($osobe as $osoba){
                   $output.="<tr>";
                   $output.="
                     <td>{$osoba->id}</td>
                    <td>{$osoba->ime}</td>
                    <td>{$osoba->prezime}</td>
                    <td>{$osoba->datumRodjenja}</td>
                    <td>{$osoba->vrstaOsobe->vrsta}</td>";
                   $output.="</tr>";
                }
             $output.="</tbody></table>";
            
         return $output;
    }
}






