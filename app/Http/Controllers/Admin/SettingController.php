<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingValidate;
use App\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $menu = 'setting';
        $setting = Setting::first();

        return view('Admin.pages.About.setting',compact(['menu','setting']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SettingValidate $request)
    {


        $setting = new Setting();

        $setting->name = request('name');
        $setting->slogan = request('slogan');
        $setting->metatitle = request('metatitle');
        $setting->metadescription = request('metadescription');
        $setting->email = request('email');
        $setting->website = request('website');
        $setting->number = request('number');
        $setting->fax = request('fax');
        $setting->map = request('map');
        $setting->phone = request('phone');
        $setting->address = request('address');
        $setting->facebook = request('facebook');
        $setting->instagram = request('instagram');
        $setting->youtube = request('youtube');
        $setting->about = request('about');

        if(request()->hasFile('logo')){
        $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);
            $image = request()->file('logo');
            $newimagename = time().'.'.$image->extension();

            if($image->isValid()){
                $directory = 'uploads/setting/';

                $image->move($directory,$newimagename);
                $setting->logo = $newimagename;

                $setting->save() ;
                return back();
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingValidate $request, setting $setting)
    {

        $setting->name = request('name');
        $setting->slogan = request('slogan');
        $setting->metatitle = request('metatitle');
        $setting->metadescription = request('metadescription');
        $setting->email = request('email');
        $setting->website = request('website');
        $setting->number = request('number');
        $setting->fax = request('fax');
        $setting->map = request('map');
        $setting->phone = request('phone');
        $setting->address = request('address');
        $setting->facebook = request('facebook');
        $setting->instagram = request('instagram');
        $setting->youtube = request('youtube');
        $setting->about = request('about');


        if(request()->hasFile('logo')){
           $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);
            $image = request()->file('logo');
            $newimagename = time().'.'.$image->extension();

            if($image->isValid()){
                $directory = 'uploads/setting/';

                $image->move($directory,$newimagename);
                $setting->logo = $newimagename;

            }
        }

        $setting->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
