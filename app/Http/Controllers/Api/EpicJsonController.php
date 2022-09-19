<?php

namespace App\Http\Controllers\Api;

use App\EpicJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Helpers;
class EpicJsonController extends Controller
{
  
    function searchepic($name, $userId){
      $test = EpicJson::select('epic_jsons.*')
      ->where("full_name","like","%".$name."%")->get();
      foreach($test as $val){
        $test[0]['doctor'] = Helpers::checkValidUser($val->reference_id, $userId);
      }
      return $test;
    }
    
    function listepic() {
      return EpicJson::all();
    }
    
}
