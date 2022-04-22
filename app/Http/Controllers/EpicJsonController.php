<?php

namespace App\Http\Controllers;

use App\EpicJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
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
      'Authorization'=>'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJ1cm46b2lkOmZoaXIiLCJjbGllbnRfaWQiOiJkOWYwN2JlNi0yOGNkLTQ2OWEtYjJjMS1jNjU5NWNjODE5MDEiLCJlcGljLmVjaSI6InVybjplcGljOk9wZW4uRXBpYy1jdXJyZW50IiwiZXBpYy5tZXRhZGF0YSI6IkFLX28wc09JN2tmc3p3cXA0aDdjbVN6d1I3aThUbU9mcjRQemQwNmFsYm5XbzJFdnptQk5pN2VoUVdsenZDeXZDaU5LTUlmTWVfOU9UZ1J3bF9fcFQ1UVk1eFE2U2RsYkRQVnRjOFdqbEI4bTdYZ3cycEJyWDZUMEFSaWtXMDJfIiwiZXBpYy50b2tlbnR5cGUiOiJhY2Nlc3MiLCJleHAiOjE2NTAwMjE5NTIsImlhdCI6MTY1MDAxODM1MiwiaXNzIjoidXJuOm9pZDpmaGlyIiwianRpIjoiZmIyOWY3OGMtYjg0NS00ZjlkLWE3NjctMjM1NjE1MTc2YjlhIiwibmJmIjoxNjUwMDE4MzUyLCJzdWIiOiJldk5wLUtoWXdPT3FBWm4xcFoyZW51QTMifQ.Vm_OD966ivu31fgsPQtnpLglmithUdDoPNJfeU06uBFfOhWsPU3ar5j_gvEMRckV3O0_xJkaI-GrDrzcsLA3mO_iepEkkVGKZnLVlY0O4OoyDyVOAqS5xVL2F-Zs2HWf5RZdJSS1PkPoF4PTdyiSK6EW6wpRQi08VP02zkmTBLOVhN9ZEB5bQGSGqUQQFJxBiUscrOVEj6_KctWkp6zu7wiuKXChRzCfWjmNPzStumka2jgHNi6OvWeOdEHn53d4l-aLG6GfW1K9ebGMQYCm7Yvd-kMH7u9usHRRRHY9rkUMJ4FNM0biqWDT2YP2QqxyabSNINUDsdm2CsiWUHx0IQ',]
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
          $epicJson = new EpicJson;
          $epicJsonId = EpicJson::where('reference_id', '=', $epicArray[$l]['ref_id'])->first();
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
