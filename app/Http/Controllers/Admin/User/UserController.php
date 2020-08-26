<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $menu = '1';
        $users = User::siteusers();

        return view('Admin.pages.User.users',compact(['users']));
    }

    public function admins()
    {

        $menu = '1';
        $users = User::adminusers();

        return view('Admin.pages.User.users',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('Admin.pages.User.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'name'=>'required|string|max:50',
        'email'=>'required|email|max:50|unique:users',
        'phone'=>'required|numeric|unique:users',
        'password'=>'required|string|max:80',
        'rdio'=>'required|boolean'
    ],
        [
            'name.required'=> 'İsim alanını boş bırakamazsınız!',
            'name.string'=> 'İsim alanında hatalı bilgi girdiniz!',
            'name.max'=> 'İsim alanında gereyinden Fazla karakter girdiniz.Maksimum 50!',
            'email.required'=> 'Email alanını boş bırakamazsınız! ',
            'email.unique'=> 'bu Email daha önce kullanıldı.Bir Email tekrar kullanılamaz ',
            'phone.unique'=> 'bu Telefon numarası daha önce kullanıldı.Bir Telefon numarası tekrar kullanılamaz ',
            'phone.number'=> 'Telefon alanında + ve rakamlardan başka karakter kullanamazsınız!',
            'password.required'=>'Şifre alanı gereklidir.Boş bırakamazsınız',
            'rdio.required'=>'Kullanıcı tipi seçmediniz!'
     ]);
        if ($validator->fails()) {
            return redirect()->route('user.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();

        $user->name = request('name');
        $user->phone = request('phone');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->email_verified_at =  now();
        $user->token =  Hash::make(random_int(1,60));
        $user->role = request('rdio');

         $user->save();
        auth()->login($user);
        return back();

    }//end store

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        return view('Admin.pages.User.edituser',compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|numeric',
            'rdio'=>'required|boolean'
        ],
            [
                'name.required'=> 'İsim alanını boş bırakamazsınız!',
                'name.string'=> 'İsim alanında hatalı bilgi girdiniz!',
                'name.max'=> 'İsim alanında gereyinden Fazla karakter girdiniz.Maksimum 50!',
                'email.required'=> 'Email alanını boş bırakamazsınız! ',
                'email.unique'=> 'bu Email daha önce kullanıldı.Bir Email tekrar kullanılamaz ',
                'phone.unique'=> 'bu Telefon numarası daha önce kullanıldı.Bir Telefon numarası tekrar kullanılamaz ',
                'phone.number'=> 'Telefon alanında + ve rakamlardan başka karakter kullanamazsınız!',
                'passwd.required'=>'Şifre alanı gereklidir.Boş bırakamazsınız',
                'rdio.required'=>'Kullanıcı tipi seçmediniz!'
            ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);

        $user->name = request('name');
        $user->phone = request('phone');
        $user->email = request('email');
        $user->role = request('rdio');

        if ($user->password != NULL)
            $user->password = Hash::make(request('password'));

        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user =  USer::find($id);
        $remove =  $user->delete();
        return back();

    }
}
