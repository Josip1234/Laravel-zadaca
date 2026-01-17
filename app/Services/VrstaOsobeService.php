<?php
namespace App\Services;
use App\Models\VrstaOsobe;

class VrstaOsobeService{
    public function getAll():array{
        return [
            new VrstaOsobe(1,"Logističar"),
            new VrstaOsobe(2,"Branitelj"),
            new VrstaOsobe(3,"Upravitelj"),
            new VrstaOsobe(4,"Konzul")
        ];
    }
}