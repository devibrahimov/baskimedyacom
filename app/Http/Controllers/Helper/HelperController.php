<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class HelperController extends Controller
{       //kullanilan library
    //https://artisansweb.net/create-thumbnail-in-laravel-using-intervention-image-library/
    //
   public function imageupload($image,$newimagename,$basedirectory){


       $filenamewithextension =   $image->getClientOriginalName();

       //get filename without extension
       $filename = pathinfo($filenamewithextension,PATHINFO_FILENAME);

       //get file extension
       $extension =   $image->getClientOriginalExtension();

       //Upload File
      // $image->storeAs('/public/uploads/'.$basedirectory.'/',$newimagename);
      //$this->createThumbnail($image,'products', 1000, 1000);

       $image->storeAs('/public/uploads/thumbnail/'.$basedirectory.'/small/',$newimagename);
       $image->storeAs('/public/uploads/thumbnail/'.$basedirectory.'/medium/',$newimagename);
       $image->storeAs('/public/uploads/thumbnail/'.$basedirectory.'/large/',$newimagename);

       //create small thumbnail
       $smallthumbnailpath = public_path('/storage/uploads/thumbnail/'.$basedirectory.'/small/'.$newimagename);

       $this->createThumbnail($image,$smallthumbnailpath, 260, 280);

       //create medium thumbnail
       $mediumthumbnailpath = public_path('/storage/uploads/thumbnail/'.$basedirectory.'/medium/'.$newimagename);
       $this->createThumbnail($image,$mediumthumbnailpath, 540, 540);

       //create large thumbnail
       $largethumbnailpath = public_path('/storage/uploads/thumbnail/'.$basedirectory.'/large/'.$newimagename);
       $this->createThumbnail($image,$largethumbnailpath, 800, 800);

   }



    public function createThumbnail($image,$path, $width, $height)
    {
//var_dump($image->getRealPath());die;
        $img = Image::make($image->getRealPath())->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

public function deleteimages($image,$directory){



      $deleted = \File::delete(public_path('/storage/uploads/'.$directory.'/'.$image));
      $deleted = \File::delete(public_path('/storage/uploads/thumbnail/'.$directory.'/small/'.$image));
      $deleted = \File::delete(public_path('/storage/uploads/thumbnail/'.$directory.'/medium/'.$image));
      $deleted = \File::delete(public_path('/storage/uploads/thumbnail/'.$directory.'/large/'.$image));

     if ($deleted)
     {
         return true ;
     }

}
}//end class


