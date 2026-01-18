<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;
use App\Services\OsobaService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;
use function Termwind\parse;

class AnalizirajOsobu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $osobe=(new OsobaService())->getAll();
        //broji osobe koje nemaju datum rođenja
        $brojOsobeBezDr=0;


        foreach ($osobe as $osoba) {

            if($brojOsobeBezDr>2){

                $this->ZapisiNeuspjele($request,"Neuspjeli pokušaj prikaza");
                return response('Broj osoba koje nemaju datum rođenja promašuje dozvoljeni broj.',403);

            }

            $datumR=$osoba->datumRodjenja;

            if(empty($datumR) || $datumR=='' || $datumR==null || $datumR!=date("Y-m-d",strtotime($datumR)) || $datumR!=date("d.m.Y",strtotime($datumR)) ){

                $brojOsobeBezDr++;

            }
           
        }
        return $next($request);
    }
    public function ZapisiNeuspjele(Request $request,string $vrijednost){
        Log::warning('403 Zabranjeno',[
                'poruka'=>$vrijednost,
                'ruta'=>$request->path(),
                'ip adresa'=>$request->ip()
        ]);
    }
}
