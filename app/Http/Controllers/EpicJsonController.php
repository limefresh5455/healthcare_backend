<?php

namespace App\Http\Controllers;

use App\epicJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
class EpicJsonController extends Controller
{


    function list()
    {     
      return view('list');
    }
 
    function submitData(Request $req)
    {
      $given  = $req['given'];
      $name  = $req['name'];
      $data = Http::withHeaders([
      'Content-Type'=>'application/json',
      'Accept'=>'application/json+fhir',
      'Authorization'=>'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJ1cm46b2lkOmZoaXIiLCJjbGllbnRfaWQiOiJkOWYwN2JlNi0yOGNkLTQ2OWEtYjJjMS1jNjU5NWNjODE5MDEiLCJlcGljLmVjaSI6InVybjplcGljOk9wZW4uRXBpYy1jdXJyZW50IiwiZXBpYy5tZXRhZGF0YSI6IjU2SElCcThVTWJvUkNBNmk0eEVLU1htSmdnMTdJLU1UZklJNnNzT3FzMmhEeFROSlVWNUxoUjJlYk9kbzBwS0Z1WURqemJFbHZ1dTdxVVpKVVFydjlFQ1BSa3BQLUdlVVNYaTVhOHo4LXF0clZZeUNxSUhCZTk4ZWo4R0pSclBEIiwiZXBpYy50b2tlbnR5cGUiOiJhY2Nlc3MiLCJleHAiOjE2NTAwMTcxOTksImlhdCI6MTY1MDAxMzU5OSwiaXNzIjoidXJuOm9pZDpmaGlyIiwianRpIjoiYzQ3NmQ2MzQtNDkxZS00MGYwLWI4ODktM2Y3NzYyZGQzYzE5IiwibmJmIjoxNjUwMDEzNTk5LCJzdWIiOiJldk5wLUtoWXdPT3FBWm4xcFoyZW51QTMifQ.EYwILf0bGg0hXUNctPextf9PpP0mGrH1OO_-N5GyXyUT-5w4ZsEC-4s-cEFHT7E1hNT8A8hBM51d422fgfpTLpWt2EQTZMbvX_oDmfUp9UW2mLuSDE2PcIPW8yZ_42AP-lepO5T30c5HWFzp3GQaph2neOnIk44Qzkszgf4j0BqKIHaSH2Rnbxx6tUmOxeCa7ZPBHAGwUg0joyqfndOerp7iEZPsvn-bjzACiGdS2n2GKrMsA7j-clQONDg7ySbiJZsyGAB5_jLriW0lbe0LHxr8C6cGURKq1rzm8vI5oQSRwBSDJ66oItAcSTpD-wPmGuFUrB_jEz53qUjuHNbRxg',]
      )->get("https://fhir.epic.com/interconnect-fhir-oauth/api/FHIR/R4/Practitioner?given=$given&name=$name")->json();
      try{
        $epicArray = array();
        for($i = 0 ; $i < count($data['entry']); $i++)  
        {
          if(isset($data['entry'][$i]['link'])){
            $epicArray[$i]['fullUrl'] = $data['entry'][$i]['fullUrl'];
            $epicArray[$i]['resourceType'] = $data['entry'][$i]['resource']['resourceType'];
            if( isset($data['entry'][$i]['resource']['id']) ){
              $epicArray[$i]['ref_id'] = $data['entry'][$i]['resource']['id'];
            }
            if( isset($data['entry'][$i]['resource']['active']) ){
              $epicArray[$i]['status'] = $data['entry'][$i]['resource']['active'];
            }
            if( isset($data['entry'][$i]['resource']['gender']) ){
              $epicArray[$i]['gender'] = $data['entry'][$i]['resource']['gender'];
            }else{
              $epicArray[$i]['gender'] = "";
            }
            if(isset($data['entry'][$i]['resource']['name'])){
              for($j =0 ; $j < count($data['entry'][$i]['resource']['name']); $j++)
              {
                $epicArray[$i]['fullName'] = $data['entry'][$i]['resource']['name'][$j]['text'];
                $epicArray[$i]['lastName'] = $data['entry'][$i]['resource']['name'][$j]['family'];
                for($k =0 ; $k < count($data['entry'][$i]['resource']['name'][$j]['given']); $k++)
                {
                  $epicArray[$i]['firstName'] = $data['entry'][$i]['resource']['name'][$j]['given'][$k];
                }
              }
            }
            if( isset($data['entry'][$i]['resource']['communication']) ){
              for($t =0 ; $t < count($data['entry'][$i]['resource']['communication']); $t++)
              {
                $epicArray[$i]['communication'] = $data['entry'][$i]['resource']['communication'][$t]['text'];
              }
            }else{
              $epicArray[$i]['communication'] = "";
            }
          }                   
        }
        for ($l = 0; $l < count($epicArray); $l++) {
          $epicJson = new epicJson;
          $epicJsonId = epicJson::where('reference_id', '=', $epicArray[$l]['ref_id'])->first();
          if ($epicJsonId === null) {
            $epicJson->fullUrl = $epicArray[$l]['fullUrl'];
            $epicJson->resourcetype = $epicArray[$l]['resourceType'];
            $epicJson->reference_id = $epicArray[$l]['ref_id'];
            $epicJson->active = $epicArray[$l]['status'];
            $epicJson->gender = $epicArray[$l]['gender'];
            $epicJson->FullName = $epicArray[$l]['fullName'];
            $epicJson->LastName = $epicArray[$l]['lastName'];
            $epicJson->FirstName = $epicArray[$l]['firstName'];
            $epicJson->communication = $epicArray[$l]['communication'];
            $result = $epicJson->save();
          }
        }
      } catch(Exception $e){
          return response()->json([
              "error" => "could_not_register",
              "message" => "Unable to register user"
          ], 400);
      }
    }
}
