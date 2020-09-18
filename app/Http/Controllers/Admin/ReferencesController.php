<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController as Helper;
use Illuminate\Http\Request;
use App\References;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = References::all();
        return view('Admin.pages.References.references', compact('references',$references));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('References.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png',
            'name' => 'required'
        ]);

        $references = new References([
            'image' => $request->file('image'),
            'name' => $request->get('name')
        ]);

        $file = request()->file('image');
        if ($file->isValid()) {
            $filename = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $newfilename = random_int(1, 2000) . time() . '.' . $extention;
            $helper = new Helper();
            $helper->imageupload($file, $newfilename, 'references');
            $img = References::create([
                'name' => $references->name,
                'image' => $newfilename
            ]);
            return redirect('yonetim/references')->with('success', 'Basariyla Eklendi!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $references = Reference::find($id);
        return view('yonetim/references', compact('refereneces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( int $id)
    {

        $reference = References::find($id);
        $helper = new Helper() ;

        $imagedel = $helper->deleteimages($reference->image ,'references');

       if(!$imagedel){
           return back()->with('error', 'Referans Firması Resimleri Silinirken hata oluştu!');
       }
        $delete  = $reference->delete();

        if(!$delete){
        return back()->with('error', 'Referans Firması  Silinemedi!');
        }
        return back()->with('success', 'Referans Firması Başariyla Silindi!');

    }




    public function referenceupdate(Request $request){

        $request->validate([
            'name' => 'required|string|max:100'
        ]);


        $name  = $request->name;
        $referenceid=$request->referenceid;

        $reference=References::find($referenceid);
        $reference->name = $name;
        if(request()->hasFile('image')){
            $file  =  $request->file('image');
            $this->validate(request(),['file'=>'image|mimes:jpg,jpeg,png']);
        if ($file->isValid()) {
            $filename = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $newfilename = random_int(1, 2000) . time() . '.' . $extention;

            $helper = new Helper();
            $helper->imageupload($file, $newfilename, 'references');



            $helper->imageupload( $file,$newfilename,'references');


            $reference->image = $newfilename;
            $save = $reference->save();
            $helper->deleteimages($request->imagename ,'references');

            return back()->with('success', 'Basariyla Yenilendi!');
        }
        }
        $save = $reference->save();
        return back()->with('success', 'Basariyla Yenilendi!');

    }






}
