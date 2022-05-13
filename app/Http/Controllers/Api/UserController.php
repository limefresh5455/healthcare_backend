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
            'password' => 'required|string|min:7',
            'company'=> 'required',
            'intelli_badge_ID' => 'required',
            'not_a_subs_one' => 'required',
            'symplr_badge_ID' => 'required',
            'not_a_subs_two' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false, 
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
            $registration->first_name=$req->input('first_name');
            $registration->last_name=$req->input('last_name');
            $registration->phone_no=$req->input('phone_no');
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
                return response()->json(['success' => false, 'message' => $validator->errors()], 401);
            }
            if (!$token = auth('api')->attempt($validator->validated())) {
                return response()->json(['success' => false, 'message' => ['message' => ['Invalid user credientials']]], 401);
            }
            $userDetail = auth('api')->user();
            User::where('id', $userDetail->id)  // find your user by their email
             ->update(['access_token' => $token]);
            return response()->json([
                'success' => true,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user_id' => $userDetail->id,
                'message' => 'Logged In Successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => $e->getMessage()]], 422);
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
            User::where('id', $user->id)  // find your user by their email
            ->update(['access_token' => null]);
            return response()->json(['success' => true, 'message' => 'Logout Successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something Went Wrong']], 422);
        }
    }

     function image(Request $req)
     { 
        return $req->file('file')->store('apiDocs'); 
     }

     function updateData(Request $req, $id){
        try {
        $user = JWTAuth::parseToken()->authenticate();    
        $users = User::where('id', $user->id)->first();
        $users->name=$req->input('first_name').' '.$req->input('last_name');
        $users->email=$req->input('email');
        $users->first_name=$req->input('first_name');
        $users->last_name=$req->input('last_name');
        $users->phone_no=$req->input('phone_no');
        if($req->hasFile('images')){
            $image = $req->file('images');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
            $image_path = "/images/" . $image_name;
            
            $users->images=$image_path;
        }
        $result = $users->save();
        return response()->json(['success' => true, 'message' => 'Updated Successfully'], 200);
    } catch(Exception $e){
        return response()->json([
            "error" => "could_not_register",
            "message" => "Unable to Update register user"
        ], 400);
    }
}

     
    public function change_password(Request $req)
    {   
      $validator = Validator::make($req->all(),[
            'old_password'=>'required',
            'password'=>'required|min:7|max:100',
            'confirm_password'=>'required|same:password'
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=>'Validations fails',
                'error'=>$validator->errors(0)
            ],200);
        }
        
       // $user=$req->user();
        $user = JWTAuth::parseToken()->authenticate();
        $users = User::where('id', $user->id)->first();
        
        if(Hash::check($req->old_password,$users->password)){
            
            $users->update([
                'password'=>Hash::make($req->password)
            ]);
            return response()->json([
                'message'=>'Password Successfully Updated', 
             ],400);
        }else{
            return response()->json([
               'message'=>'Old password does not matched', 
            ],400);
        }     
    }
    
    function getData(Request $req)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $users = User::where('access_token', $user->access_token)->first();
        
        //return view('stud_view',['users'=>$users]);
        return response()->json(['success' => true, 
        "data" => $users], 200);
    }

    }

