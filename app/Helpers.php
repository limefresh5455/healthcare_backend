<?php // Code within app\Helpers\Helper.php

namespace App;

use App\DoctorDetail;

class Helpers
{
    public static function checkValidUser($refId, $userId){
        return DoctorDetail::where('mr_id','=',$userId)->where('reference_id','=',$refId)->first();
    }
}