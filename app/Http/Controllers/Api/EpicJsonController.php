<?php

namespace App\Http\Controllers\Api;

use App\EpicJson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
class EpicJsonController extends Controller
{
  

    function searchepic($name){
      return EpicJson::select('epic_jsons.*', 'doctordetails.reference_id as doctor_id')
      ->leftJoin('doctordetails', 'doctordetails.reference_id', "=", 'epic_jsons.reference_id')
      ->where("full_name","like","%".$name."%")->get();
    }
    
    function listepic() {
      return EpicJson::all();
    }
    
}
