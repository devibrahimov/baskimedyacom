<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginControlRequest;
use Illuminate\Http\Request;
use Auth ;
class AdmincontrollController extends Controller
{
    public function loginpage()
    {
        return view('Admin.login');
    }

    public function login(LoginControlRequest  $request)
    {

        if(Auth::guard('admin')->attempt([
            'email'=>$request->email ,
            'password'=>$request->passwd,
            'role'=> 1
        ])){
          request()->session()->regenerate();
            return redirect()->intended('/yonetim');
        }else{
            $error = [
                'email'=>'email hatasi',
                'password'=>'Sifre hatasi',
                'role'=> 'Yönetici Yetkiniz alınmıştır'
            ];

            return back()->withInput()->withErrors($error);
        }

    }

    public function logout(){
       auth('admin')->logout();
//       \request()->session()->flush();
//       \request()->session()->regenerate();
       return redirect()->route('site.index');
    }
}
