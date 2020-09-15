<?php

namespace App\Http\Controllers\Site;

use App\CompanyInform;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Province;
use App\UserInform;
use  Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\User ;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index($slug , $userid){
      //  $id = Crypt::decrypt( $request->input('unm'));

        $id = Crypt::decrypt($userid);

        $user = DB::table('users')
            ->join('user_informations' , 'users.id' , '=' ,'user_informations.user_id')
            ->join('company_inform' , 'users.id' , '=' ,'company_inform.user_id')
            ->where('users.id','=',$id)
            ->select('users.*','user_informations.*','company_inform.*')
            ->first();
     // $user = $user[0];
        $provinces = Province::all();

        $orders = Orders::where('user_id','=',$user->user_id)->get();



        $breadcrump = ['thispage' => $user->name ,
            'thispageURL' => route('user.profil',[ Str::slug($user->name) , Crypt::encrypt( $user->user_id)]) ];


        return view('Site.pages.User.profil',compact(['user','provinces','breadcrump','orders']));
    }

    public function changepassword(Request $request){

//        $this->validate($request->all(), [
//            'password'=>'required|string|max:80|',
//            'newpassword'=>'required|string|max:80|confirmed|different:password'
//        ],[
//            'password.required'=> 'Eski Şifrenizi Boş Bırakamazsınız',
//            'newpassword.confirmed' => 'Girdiyiniz Şifre Tekrarı Eşleşmiyor'
//        ]);

        $id = Crypt::decrypt($request->uid);

        $user = User::findOrFail($id);

        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->newpassword)
            ])->save();

            $request->session()->flash('success', 'Şifreniz Yenilendi.Siteye tekrar giriş edin');
            auth()->logout();
            return redirect()->back();

        } else {
            $request->session()->flash('error', 'Şifre Yenilenemedi.Tekrar deneyin');
            return redirect()->back();
        }
    }


    public function updateinform(Request $request){

        $userid = $request->uid;
        $user = User::find($userid);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;

        $user->save();
        $userinformid =  $request->unfid;
        $userinform= UserInform::find($userinformid);
        $userinform->user_province = $request->province ;
        $userinform->user_district = $request->district ;
       // $userinform->gsm = $request->gsm ;
        $userinform->gsm2 = $request->gsm2 ;
        $userinform->phone = $request->phone ;
        $userinform->phone2 = $request->phone2 ;
        $userinform->save();
        return back();
    }

    public function updatecompany(Request $request){
        $userid = $request->uid;

        $CompanyInform = CompanyInform::where('user_id','=',$userid)->first();

        $CompanyInform->company_name = $request->company_name ;
        $CompanyInform->address1 = $request->address1 ;
        $CompanyInform->address2 = $request->address2 ;
        $CompanyInform->postcode = $request->postcode ;
        $CompanyInform->vergino = $request->vergino ;
        $CompanyInform->vergidairesi = $request->vergidairesi ;
        $CompanyInform->save();

        return 'OK';
        }
}
