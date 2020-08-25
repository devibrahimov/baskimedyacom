<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use App\Http\Controllers\Helper\HelperController as Helper ;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $sliders= Slider::all();
        return view('Admin.pages.Slider.index',compact(['sliders']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider();

        $slider->queue = request('queue');
        $slider->spamtext = request('spam');
        $slider->header = request('header');
        $slider->content = request('content');
        $slider->url = request('url');

        if(request()->hasFile('image')){
            $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);

            $image = request()->file('image');
            if($image->isValid()){


                $newimagename = time().'.'.$image->extension();
                //image upload in helper controller
                $helper = new Helper();
                $helper->imageupload( $image ,$newimagename,'slider');


                $slider->image = $newimagename;

                $messages = $slider->save() ;
                if(!$messages){
                    return redirect()->route('slider.create')->with('error','İşlem Başarısız. Slider eklenemedi !');
                }else{
                    return redirect()->route('slider.create')->with('success','Slider başarı ile eklendi.İsterseniz yenisini ekleyebilirsiniz !');

                }

            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('Admin.pages.Slider.edit',compact(['slider']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {

        $slider->queue = request('queue');
        $slider->spamtext = request('spam');
        $slider->header = request('header');
        $slider->content = request('content');
        $slider->url = request('url');

        if(request()->hasFile('image')){
            $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);

            $image = request()->file('image');
            if($image->isValid()){


                $newimagename = time().'.'.$image->extension();
                //image upload in helper controller
                $helper = new Helper();
                $helper->imageupload( $image ,$newimagename,'slider');


                $slider->image = $newimagename;



            }
        }
        $messages = $slider->save() ;
        if(!$messages){
            return redirect()->back()->with('error','Güncelleme Başarısız!');
        }else{
            return redirect()->back()->with('success','Slider başarı ile güncellendi');

        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $image = $slider->image;

        $helper = new Helper();
        $imagesdeleted = $helper->deleteimages($image,'slider');

        if ($imagesdeleted==true){
            $slider->delete();
            return  redirect()->route('slider.index')->with('success','silme işlemi başarılı');
        }

    }
}
