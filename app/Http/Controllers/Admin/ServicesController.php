<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SericesRequestValidator;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Helper\HelperController as Helper ;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('Admin.pages.Services.index',compact(['services']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.Services.create',compact([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SericesRequestValidator $request)
    {
        $service = new Service();

        $service->name = request('name');
        $service->slug = Str::slug(request('name'));
        $service->header = request('header');
        $service->content = request('content');

        $requestdata = ['title'=>request('metatitle') ,'description'=>request('metadescription')];
        $metajson = json_encode($requestdata);
        $service->meta = $metajson;


        if(request()->hasFile('image')){
            $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);

            $image = request()->file('image');
            if($image->isValid()){


                $newimagename = time().'.'.$image->extension();
                //image upload in helper controller
                $helper = new Helper();
                $helper->imageupload( $image ,$newimagename,'services');


                $service->image = $newimagename;

                $messages = $service->save() ;
                if(!$messages){
                    return redirect()->route('services.create')->with('error','İşlem Başarısız. Hizmet eklenemedi !');
                }else{
                    return redirect()->route('services.create')->with('success','Hizmet başarı ile eklendi.İsterseniz yenisini ekleyebilirsiniz !');

                }

            }
        }

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
        $service =Service::find($id);
        return view('Admin.pages.Services.edit',compact(['service']));
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
        $service =Service::find($id);

        $service->name = request('name');
        $service->slug = Str::slug(request('name'));
        $service->header = request('header');
        $service->content = request('content');

        $requestdata = ['title'=>request('metatitle') ,'description'=>request('metadescription')];
        $metajson = json_encode($requestdata);
        $service->meta = $metajson;

        if(request()->hasFile('image')){
            $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);

            $image = request()->file('image');
            if($image->isValid()){


                $newimagename = time().'.'.$image->extension();
                //image upload in helper controller
                $helper = new Helper();
                $helper->imageupload( $image ,$newimagename,'services');
                $helper->deleteimages($service->image ,'services');


                $service->image = $newimagename;

                } //end if
        }//end if
        $service->save() ;
        return redirect()->route('services.index')->with('success','Güncellemeniz başarı ile sonuçlandı !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $image = $service->image;

        $helper = new Helper();
       $imagesdeleted = $helper->deleteimages($image,'services');

       if ($imagesdeleted==true){
           $service->delete();
        return  redirect()->route('services.index')->with('success','silme işlemi başarılı');
       }


    }
}
