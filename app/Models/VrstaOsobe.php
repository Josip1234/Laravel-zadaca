<?php 
namespace App\Models;
class VrstaOsobe{

    public function __construct(public int $id, public string $vrsta)
    {
        $this->id=$id;
        $this->vrsta=$vrsta;
    }
}