<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController as Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ImageGaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $images = Gallery::all();
        return view('Admin.pages.Gallery.gallery',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('Admin.pages.Gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);

        $file =  request()->file('file');
        if($file->isValid()){

            $filename= $file->getClientOriginalName() ;
            $extention= $file->getClientOriginalExtension();
            $newfilename= random_int(1,2000).time().'.'.$extention;
            $helper = new Helper();
            $helper->imageupload( $file ,$newfilename,'gallery');
            // $file->move('uploads/gallery/',$newfilename);

            $img = Gallery::create([
                'name'=>$newfilename
            ]);

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
        //
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

    function fetch()
    {
         $images = Gallery::all();
        $output = '<div class="row">';
        foreach($images as $image)
        {

            $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="'.asset('/storage/uploads/thumbnail/gallery/small/' . $image->name).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn  remove_image" data-name="'.$image->name.'" data-id="'.$image->id.'">Sil</button>
            </div>
      ';
        }
        $output .= '</div>';
        echo $output;
    }

    function delete(Request $request)
    {
        if($request->get('name') && $request->get('id'))
        {
            $image = Gallery::find($request->get('id'));
           $deleted = $image->delete();
           if($deleted){
           \File::delete(public_path('storage/uploads/gallery/' . $request->get('name')));
               \File::delete(public_path('storage/uploads/thumbnail/gallery/large/' . $request->get('name')));
               \File::delete(public_path('storage/uploads/thumbnail/gallery/medium/' . $request->get('name')));
               \File::delete(public_path('storage/uploads/thumbnail/gallery/small/' . $request->get('name')));
           }else{
              return 'Fotograf silinemedi';
           }


        }
    }
}//end class
