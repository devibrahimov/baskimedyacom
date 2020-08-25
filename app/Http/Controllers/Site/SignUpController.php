<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\UserRegisterMail;
use App\Province;
use App\User;
use App\UserInform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Helper\TCKimlikNoSinifi as TCKimlikNoSinifi;

class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        return view('Site.pages.Login.signuplast',compact(['provinces']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegisterRequest $request)
    {

        # KULLANIICI BILGILERI ILKIN VERILER USERS TABLOSUNE GERI AKALANLARI ISE
        # USER_INFORMATIONS ABLOSUNA KAYDOLACAKTIR
        #KAYIT ISHLEMI BASHARILI OLDUKTAN SONRA EMAIL VERIFIED EDILECEKTIR
        # VE SITENIN ANA SAYFASINA YONLENDIRILECEKTIR

        #EMAILDEN VERILEN LINK ISE SITEYE OUTO LOGIN YAPTIRARAK ANA SAYFAYA YONLRDIRECEKTIR
        $tc = new TCKimlikNoSinifi();
        $tcvalidate = $tc->TCKimlikNoDogrulaCurl($request->passportid,$request->name,$request->surname) ;
        if (!$tcvalidate){
            return back()->with('error', 'TC Kimlik Numarasını Yalnış girdiniz');
        }

        $user = new User();

        $user->name = request('name');
        $user->surname = request('surname');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->email_verified_at =  now();
        $user->token =  md5(random_int(1,600));
        $user->role = 0;

        $user->save();
        $userlastid = $user->id ;
        $userinform= new UserInform();

        $userinform->user_id =  $userlastid;
        $userinform->tckimlik = $request->passportid ;
        $userinform->user_province = $request->province ;
        $userinform->user_district = $request->district ;
        $userinform->gsm = $request->gsm ;
        $userinform->gsm2 = $request->gsm2 ;
        $userinform->phone = $request->phone ;
        $userinform->phone2 = $request->phone2 ;
        $userinform->save();





        Mail::to($request->email)->send(new UserRegisterMail($user));
        $userdata = [
            'email'=> $user->email,
            'name'=> $user->name
        ] ;
       // auth()->login($user);
        return redirect()->to('/')->with('activation',$userdata);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function activate($token){
        $user = User::where('token','=',$token)->first();
        if (!is_null($user)){
            $user->token = null ;
            $user->active = 1 ;
            $user->save();
            auth()->login($user);
            return redirect()->route('site.index')->with('mesaj','');
        }
    }
}
