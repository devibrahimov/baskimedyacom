<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\About;
use App\Http\Requests\AboutValidateRequest;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = 'about';
        $about = About::first();

        return view('Admin.pages.About.about',compact(['menu','about']));
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
     * @return \Illuminate\Http\Response
     */
    public function store(AboutValidateRequest $request)
    {

        $about = new About();

        $about->header = request('header');
        $about->content = request('content');

        if(request()->hasFile('image')){
            $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);
            $image = request()->file('image');
            $newimagename = time().'.'.$image->extension();

            if($image->isValid()){
                $directory = 'uploads/setting/';

                $image->move($directory,$newimagename);
                $about->image = $newimagename;

                $about->save() ;
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(AboutValidateRequest $request, About $about)
    {

        $about->header = request('header');
        $about->content = request('content');

        if(request()->hasFile('image')){
            $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);
            $image = request()->file('image');
            $newimagename = time().'.'.$image->extension();

            if($image->isValid()){
                $directory = 'uploads/setting/';

                $image->move($directory,$newimagename);
                $about->image = $newimagename;

            }
        }

        $about->save() ;
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
