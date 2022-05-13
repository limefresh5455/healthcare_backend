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
      'Authorization'=>'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJ1cm46b2lkOmZoaXIiLCJjbGllbnRfaWQiOiJkOWYwN2JlNi0yOGNkLTQ2OWEtYjJjMS1jNjU5NWNjODE5MDEiLCJlcGljLmVjaSI6InVybjplcGljOk9wZW4uRXBpYy1jdXJyZW50IiwiZXBpYy5tZXRhZGF0YSI6ImhHMUFuaFloSmUzV0RCY2RQOGdBbm16Y3BzcVhqOHV3STZYdWtkUXZoZnV4UTVPYm84ZWRoSWJ4c2NoTU5Zb29IOExyT2lwT1JFUG0xX1Vqek1wVTdKVFktdFN5Zk8tYWJtUmFZUDBvV1NLb0V5dGQ0RzBBYWJfRmF3eFdQVDlSIiwiZXBpYy50b2tlbnR5cGUiOiJhY2Nlc3MiLCJleHAiOjE2NTA5ODQwNzQsImlhdCI6MTY1MDk4MDQ3NCwiaXNzIjoidXJuOm9pZDpmaGlyIiwianRpIjoiM2UzN2YwODktYWYzYy00M2VlLWIzNDYtODc0YmY4Zjg0ZmNmIiwibmJmIjoxNjUwOTgwNDc0LCJzdWIiOiJldk5wLUtoWXdPT3FBWm4xcFoyZW51QTMifQ.FxJ03TodeiSf2tNddFciJoEMZRZ7yyKXq48q5tav-fHs08x4isTDfrd4RQqKrjAk0tEAQ2UDaMN0O8ZRm5SPiLurWHdfAKtEG5z0Rqk2R_LtUWi0aXm3IToEaLy-uChoG6nFRNpylrGdVRfAt-pGEY9ffHPCaMKbAmK7cjgGEtC5iet5EzB0kF11i4C-4gD_Gi9aCU1oqUawPWXQCjD_SPVOwhT5YJOkwqkJQXqx8UZyv0GhwpRS9miEM7-wiqh8bl_OxxEK4R8-xJvaOK4ULKw-J11h1738lUHorIFDoilmwBkbWdq10Yy2UDX76y69uKzYfZf0X6lQE4ihAIW4kw',]
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
            $epicJson->full_name = $epicArray[$l]['fullName'];
            $epicJson->last_name = $epicArray[$l]['lastName'];
            $epicJson->first_name = $epicArray[$l]['firstName'];
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
