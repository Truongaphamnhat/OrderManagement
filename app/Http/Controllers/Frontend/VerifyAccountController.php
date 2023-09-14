<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNewPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VerifyAccountController extends Controller
{
    public function newPassword(Request $request){

        $email = $request->email;
        // dump($email);
        // Thời gian xác thực khi gửi đến mail khoản 2-3p ??

        if(!$email){
            return abort(404);
        }
        return view('backend.auth.verify_account');
    }

    public function updateNewPassword(UpdateNewPassword $request){

        // dd($request->all());

        $email = $request->email;

        if(!$email){
            return abort(404);
        }

        $user = User::where('email', $email)->first();

        if(!$user){
            return abort(404);
        }
        
        $user->password = bcrypt($request->password);
        $user->status = User::STATUS_ACTIVE;
        $user->updated_at = Carbon::now();

        $user->save();

        return redirect()->route('get.index');
        
    }
}
