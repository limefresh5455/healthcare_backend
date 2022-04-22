<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct() {
        
    }

    function register(Request $req) {
        $validator =  Validator::make($req->all(),[
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'company'=> 'required',
            'intelli_badge_ID' => 'required',
            'not_a_subs_one' => 'required',
            'symplr_badge_ID' => 'required',
            'not_a_subs_two' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ], 422);
        }
        try{
            $registration = new User;
            $registration->email = $req->input('email');
            $registration->password = Hash::make($req->input('password'));
            $registration->company = $req->input('company');
            $registration->intelli_badge_ID = $req->input('intelli_badge_ID');
            $registration->not_a_subs_one = $req->input('not_a_subs_one');
            $registration->symplr_badge_ID = $req->input('symplr_badge_ID');
            $registration->not_a_subs_two = $req->input('not_a_subs_two');
            $registration->save();
            return response()->json(['success' => true, 'message' => 'Register Successfully'], 200);
        } catch(Exception $e){
            return response()->json([
                "error" => "could_not_register",
                "message" => "Unable to register user"
            ], 400);
        }
    }
   
    public function login(Request $request) {
        try {
            $post = $request->all();
            $validator = Validator::make($post, [
                'email' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => ['message' => $validator->errors()]], 401);
            }
            if (!$token = auth('api')->attempt($validator->validated())) {
                return response()->json(['success' => false, 'error' => ['message' => 'Invalid user credientials']], 401);
            }
            $userDetail = auth('api')->user();
            return response()->json([
                'success' => true,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user_id' => $userDetail->id,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => \Config::get('constants.SOMETHING_WENT_WRONG')]], 422);
        }
    }

    public function logout(Request $request) {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!empty($user)) {
                $accessToken = $request->header('authorization');
                $token = str_replace('Bearer ', '', $accessToken);
                JWTAuth::invalidate($token);
            }
            auth('api')->logout();
            return response()->json(['success' => true, 'message' => 'Logout Successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something Went Wrong']], 422);
        }
    }

     function updateData(Request $req, $id){
        try {
        $Userdetail=User::find($id);
        $Userdetail->email=$req->input('email');
        $Userdetail->password = Hash::make($req->input('password'));
        $Userdetail->company=$req->input('company');
        $Userdetail->intelli_badge_ID=$req->input('intelli_badge_ID');
        $Userdetail->not_a_subs_one=$req->input('not_a_subs_one');
        $Userdetail->symplr_badge_ID=$req->input('symplr_badge_ID');
        $Userdetail->not_a_subs_two=$req->input('not_a_subs_two');
        $result = $Userdetail->save();
        return response()->json(['success' => true, 'message' => 'Updated Successfully'], 200);
    } catch(Exception $e){
        return response()->json([
            "error" => "could_not_register",
            "message" => "Unable to Update register user"
        ], 400);
    }}
    }

