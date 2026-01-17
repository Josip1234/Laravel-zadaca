<?php 
namespace App\Models;
class VrstaOsobe{

    public function __construct(public int $id, public String $vrsta)
    {
        $this->id=$id;
        $this->vrsta=$vrsta;
    }
}