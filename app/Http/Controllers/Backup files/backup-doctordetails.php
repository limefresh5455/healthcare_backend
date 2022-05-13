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
        'doctor_name' => 'required',
        'address'=> 'required',
        'specialist' => 'required',
        'phone' => 'required|digits:10',
        'Facility1' => 'required',
        'Facility2' => 'required',
      ]);
      if($validator->fails()){
         return response()->json([
            "error" => 'validation_error',
            "message" => $validator->errors(),
         ], 422);
      }
      try{
         $doctordetail = new DoctorDetail;
         $doctordetail->doctor_name=$req->input('doctor_name');
         $doctordetail->address=$req->input('address');
         $doctordetail->specialist=$req->input('specialist');
         $doctordetail->phone=$req->input('phone');
         $doctordetail->facility1=$req->input('facility1');
         $doctordetail->facility2=$req->input('facility2');
         $doctordetail->hospital_name=$req->input('hospital_name');
         $doctordetail->surgery_detail=$req->input('surgery_detail');
         $doctordetail->surgery_time=$req->input('surgery_time');
         $doctordetail->surgery_date=$req->input('surgery_date');
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
      $doctordetail->doctor_name=$req->input('doctor_name');
      $doctordetail->address=$req->input('address');
      $doctordetail->specialist=$req->input('specialist');
      $doctordetail->phone=$req->input('phone');
      $doctordetail->Facility1=$req->input('Facility1');
      $doctordetail->Facility2=$req->input('Facility2');
      $doctordetail->hospital_name=$req->input('hospital_name');
      $doctordetail->surgery_detail=$req->input('surgery_detail');
      $doctordetail->surgery_time=$req->input('surgery_time');
      $doctordetail->Surgery_date=$req->input('Surgery_date');
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
