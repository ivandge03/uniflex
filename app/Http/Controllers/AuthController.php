<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $r) {
        $r->validate(['email'=>'required|email','password'=>'required']);
        $user = User::where('email',$r->email)->first();
        if (!$user || !Hash::check($r->password, $user->password)) {
            return response()->json(['message'=>'Invalid credentials'], 401);
        }
        $token = $user->createToken('uniflex')->plainTextToken;
        return response()->json(['token'=>$token,'user'=>['id'=>$user->id,'name'=>$user->name,'email'=>$user->email]]);
    }

    public function me(Request $r) { return $r->user(); }

    public function logout(Request $r) {
        $r->user()->currentAccessToken()?->delete();
        return response()->json(['ok'=>true]);
    }
}
