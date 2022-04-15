<?php

namespace App\Http\Controllers;

use App\EpicJson;
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
      'Authorization'=>'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJ1cm46b2lkOmZoaXIiLCJjbGllbnRfaWQiOiJkOWYwN2JlNi0yOGNkLTQ2OWEtYjJjMS1jNjU5NWNjODE5MDEiLCJlcGljLmVjaSI6InVybjplcGljOk9wZW4uRXBpYy1jdXJyZW50IiwiZXBpYy5tZXRhZGF0YSI6Ikk4dFVMWWZEM2lZYjV0QU1VOURjcVRIbS0yUWdndEltbTdBNzlpS2tKZTZkQzBRMnd2MXhkMHpweDItZFZHZHdOLWE0VnNaWjk0TXZaTFBIY2FnN0ZLNVduVWF6aFZfS3JPbVJDZXNNUHJsNE1leERoUGhQNUo1dTBQYkJNdDRTIiwiZXBpYy50b2tlbnR5cGUiOiJhY2Nlc3MiLCJleHAiOjE2NTAwMjIwOTIsImlhdCI6MTY1MDAxODQ5MiwiaXNzIjoidXJuOm9pZDpmaGlyIiwianRpIjoiYWYzMTcwMjktN2IxMC00MjQ1LWJjNTUtNzAzMjJjOTI5ZGQ5IiwibmJmIjoxNjUwMDE4NDkyLCJzdWIiOiJldk5wLUtoWXdPT3FBWm4xcFoyZW51QTMifQ.UJ4kHD-VhfBpf76ShWm5h20Q9OI62IXSdtw9aq60MeauBA8gyYfYSbPu2dups448Sn9HOZyIhmyQd8Fc9AVXYtbDs5MEcC7Utxje-BMhAMrATVV3QaR9O92dkqEczKjWllBtXnuqF0gO5gDc1Ek0K-QQY9jkc2UdvaOKsbdW4kGetg1GpRS0lcdylgWliBR6ZYvH3EpydfJD25647eA6kXbPok0XPoOTuLjFLAyF88lejn0z8mmrCmafAWfaZlR0niHaaMihXB15tKllDb6pOgoIw8rx77bi2oOX-del5rgEL6meEo9WmeDJOHEy5E8FmmvOioIcfe46yY6XZunpgg',]
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
