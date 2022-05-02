<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\DoctorDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DoctorDetailController extends Controller
{
    function doctorAdd(Request $req) {
      $validator =  Validator::make($req->all(),[
        'mr_id' => 'required',
      ]);
      if($validator->fails()){
         return response()->json([
            "error" => 'validation_error',
            "message" => $validator->errors(),
         ], 422);
      }
      try{
         $doctordetail = new DoctorDetail;
         $doctordetail->mr_id=$req->input('mr_id');
         $doctordetail->reference_id=$req->input('reference_id');
         $result = $doctordetail->save();
         return response()->json(['success' => true, 'message' => 'Register Successfully'], 200);
      } catch(Exception $e){
        return response()->json([
          "error" => "could_not_register",
          "message" => "Unable to register user"
        ], 400);
      }
    } 

    function list() {
      return DoctorDetail::all();
    }

    function update(Request $req,$id) {
      $doctordetail=DoctorDetail::find($id);
      $doctordetail->mr_id=$req->input('mr_id');
      $doctordetail->reference_id=$req->input('reference_id');
      $result = $doctordetail->save();
      if($result){
        return ["result"=>"Update Recorded"];
      }else {
        return ["result"=>"Not Updated Record"];
      }
    }

    function delete($id) {
      $device=DoctorDetail::find($id);
      $result=$device->delete();
      if($result){
        return ["result"=>"Record has been deleted"];
      }else {
        return ["result"=>"Record has not been delete"];
      }
    }

    function search($name){
      return DoctorDetail::where("doctor_name","like","%".$name."%")->get();
    }


    function getData($id)
    {
    return DoctorDetail::find($id)
    ->join('epic_jsons','epic_jsons.reference_id','=','doctordetails.reference_id')
    ->join('surgery_details','doctordetails.mr_id','=','surgery_details.mr_id')
    ->where('surgery_details.mr_id', '=', $id)
    ->get();
    }

   // surgery_details
}
