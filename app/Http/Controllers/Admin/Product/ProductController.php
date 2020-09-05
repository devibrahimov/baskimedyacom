<?php

namespace App\Http\Controllers\Admin\Product;

use App\AdditionalOption;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController as Helper;
use App\Http\Requests\ProductValidateRequest;
use App\Option;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $cats = Category::all();
        return view('Admin.pages.Product.Product.index', compact(['products', 'cats']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $options = Option::where('parent_id', '=', NULL)->get();
        $additionaloptions = AdditionalOption::where('parent_id', '=', NULL)->get();
        return view('Admin.pages.Product.Product.create', compact(['cats', 'options', 'additionaloptions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidateRequest $request)
    {
        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        $product->slug = Str::slug(request('name'));
        $product->product_code = request('product_code');
        $product->stock = request('stock');
        $product->hasmeter = request('hasmeter');
        $product->category = request('category');
        $product->parent_option = request('option');

        //metatitle ve metadescription verileri json olarak tutuluyor
        $requestdata = ['title' => request('metatitle'), 'description' => request('metadescription')];
        $metajson = json_encode($requestdata);
        $product->meta = $metajson;


        $additionaloptionJSON = json_encode($request->additional_options);
        $product->additional_options = $additionaloptionJSON;


        // IMAGE UPLOADING
        if (request()->hasFile('image')) {
            $this->validate(request(), ['file' => 'image|mimes:jpg,jpeg,png']);
            $image = request()->file('image');
            $newimagename = time() . '.' . $image->extension();

            if ($image->isValid()) {
                $helper = new Helper();
                $helper->imageupload($image, $newimagename, 'products');
                $product->image = $newimagename;

                $save = $product->save();

                if ($save)
                    return redirect()->route('product.images', $product->id);
                //->with('id',$product->id);

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $additonaloptionparents = AdditionalOption::where('parent_id', '=', NULL)->get();
        $productimages = ProductImage::where('product_id', '=', $product->id)->get();
        return view('Admin.pages.Product.Product.show', compact(['product', 'additonaloptionparents', 'productimages']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $cats = Category::all();
        $options = Option::where('parent_id', '=', NULL)->get();
        $additionaloptions = AdditionalOption::where('parent_id', '=', NULL)->get();

        $images = ProductImage::where('product_id', '=', $product->id)->get();

        $product_adops = json_decode($product->additional_options);


        return view('Admin.pages.Product.Product.edit', compact(['cats', 'options', 'additionaloptions', 'product', 'images', 'product_adops']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {


        $product->name = request('name');
        $product->price = request('price');
        $product->hasmeter = request('hasmeter');
        $product->description = request('description');
        $product->slug = Str::slug(request('name'));
        $product->product_code = request('product_code');
        $product->stock = request('stock');
        $product->category = request('category');
        $product->parent_option = request('option');

        //metatitle ve metadescription verileri json olarak tutuluyor
        $requestdata = ['title' => request('metatitle'), 'description' => request('metadescription')];
        $metajson = json_encode($requestdata);
        $product->meta = $metajson;


        $additionaloptionJSON = json_encode($request->additional_options);
        $product->additional_options = $additionaloptionJSON;
        $save = $product->save();

        if ($save) {
            return back()->with('success', 'Ürün başarı ile güncellendi');
        } else {
            return back()->with('error', 'Ürün güncellemesi başarısız oldu.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }


//PRODUCT IMAGES Processing

    public function imagesuploadpage($id)
    {
        return view('Admin.pages.Product.Product.imagesuploadpage', compact('id'));
    }

    public function imagestore(Request $request)
    {

        $this->validate(request(), ['file' => 'image|mimes:jpg,jpeg,png']);

        $file = request()->file('file');
        if ($file->isValid()) {

            $filename = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $newfilename = random_int(100, 1000) . time() . '.' . $extention;

            $thisproductimages = ProductImage::where('product_id', '=', request('product_id'))->get();
            $imagecount = $thisproductimages->count();

            if ($imagecount <= 4) {
                $helper = new Helper();
                $helper->imageupload($file, $newfilename, 'products');

                ProductImage::create([
                    'product_id' => request('product_id'),
                    'name' => $newfilename
                ]);
            }


        }

    }

    public function imagefetch(Request $request)
    {
        $images = ProductImage::where('product_id', '=', $request->product_id)->get();
        $output = '<div class="row">';

        foreach ($images as $image) {
            $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="' . asset('/storage/uploads/thumbnail/products/small/' . $image->name) . '" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn  remove_image" data-name="' . $image->name . '" data-id="' . $image->id . '">Sil</button>
            </div>
      ';
        }
        $output .= '</div>';
        echo $output;
    }


    public function imagedelete(Request $request)
    {
        if ($request->get('name') && $request->get('id')) {
            $image = ProductImage::find($request->get('id'));
            $deleted = $image->delete();
            if ($deleted) {
                \File::delete(public_path('storage/uploads/products/' . $request->get('name')));
                \File::delete(public_path('storage/uploads/thumbnail/products/large/' . $request->get('name')));
                \File::delete(public_path('storage/uploads/thumbnail/products/medium/' . $request->get('name')));
                \File::delete(public_path('storage/uploads/thumbnail/products/small/' . $request->get('name')));

                return back()->with('success', 'Ürün fotoğrafı başarı ile Silindi');
            } else {
                return back()->with('error', 'Seçilmiş olan ürün fotoğrafı silinemedi');
            }


        }
    }//end imagedelete


    public function productimagedelete(Request $request)
    {
        if ($request->get('name') && $request->get('id')) {
            $image = ProductImage::find($request->get('id'));
            $deleted = $image->delete();
            if ($deleted) {
                \File::delete(public_path('storage/uploads/products/' . $request->get('name')));
                \File::delete(public_path('storage/uploads/thumbnail/products/large/' . $request->get('name')));
                \File::delete(public_path('storage/uploads/thumbnail/products/medium/' . $request->get('name')));
                \File::delete(public_path('storage/uploads/thumbnail/products/small/' . $request->get('name')));

                return back()->with('success', 'Ürün fotoğrafı başarı ile Silindi');
            } else {
                return back()->with('error', 'Seçilmiş olan ürün fotoğrafı silinemedi');
            }


        }
    }//end imagedelete


    public function productimageupdate(Request $request)
    {

        $this->validate(request(), ['image' => 'image|mimes:jpg,jpeg,png']);

        $file = request()->file('image');

        $productid = $request->productid;

        if ($file->isValid()) {
            $helper = new Helper();
            if ($request->imagetype == 1) {
                $productimg = $request->productimg;
                $product = Product::find($productid);

                $filename = $file->getClientOriginalName();
                $extention = $file->getClientOriginalExtension();
                $newfilename = random_int(100, 1000) . time() . '.' . $extention;


                $uploading = $helper->imageupload($file, $newfilename, 'products');


                $product->image = $newfilename;
                //  return $product->image.'-----'.$newfilename;
                $save = $product->save();

                if ($save) {
                    $helper->deleteimages($productimg, 'products');
                }

                return back()->with('success', 'Ürün fotoğrafı başarı ile güncellendi');

            }

            if ($request->imagetype == 2) {

                $imageid = $request->imageid;
                $imagename = $request->imagename;
                $image = ProductImage::find($imageid);

                $filename = $file->getClientOriginalName();
                $extention = $file->getClientOriginalExtension();
                $newfilename = random_int(100, 1000) . time() . '.' . $extention;


                $helper->imageupload($file, $newfilename, 'products');

                $image->name = $newfilename;

                $save = $image->save();

                if ($save) {
                    $helper->deleteimages($imagename, 'products');
                }

                return back()->with('success', 'Ürün fotoğrafı başarı ile güncellendi');

            }

        }//isValid

    }


}//end class
