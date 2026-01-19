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

                $this->ZapisiNeuspjele($request,"Neuspjeli pokušaj prikaza osobe: {$osoba->id} {$osoba->ime} {$osoba->prezime}");
                return response('Broj osoba koje nemaju datum rođenja promašuje dozvoljeni broj.',403);

            }

            $datumR=$osoba->datumRodjenja;
            //zamjena -,/ ili . ako postoji u datumu
            $novi_string=str_replace(['-','/','.',':','[',']'],'',$datumR);
           
             //ako je string prazan ili ako nije brojčana vrijednost povećaj brojač 
             if(empty($datumR) || $datumR===''){
                $brojOsobeBezDr++;
             }else if(str_contains($datumR[0],'-') || str_contains($datumR[0],'/') || str_contains($datumR[0],'.') || str_contains($datumR[0],':') ||
              str_contains($datumR[0],'[') || str_contains($datumR[0],']') ){
                $brojOsobeBezDr++;
             }else if((int)is_numeric($novi_string)===0){
                 $brojOsobeBezDr++;
             }
             //moglo bi se validirati dani
             //prvo bi se trebalo provjeriti dali je godina prijestupna
             //pa mjesece ali to bi malo zakompliciralo stvari pa 
             //ostavljam samo ovakvu validaciju
            
        
           
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
