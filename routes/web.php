<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//


Route::group(['prefix' => 'login'], function () {   //'middleware' =>  'admin' ,

    Route::get('/', 'AdmincontrollController@loginpage')->name('admin.login');
    Route::post('/', 'AdmincontrollController@login');
    Route::post('/cikis', 'AdmincontrollController@logout')->name('admin.logout');

});


Route::group(['middleware' => ['admin'], 'prefix' => 'yonetim'], function () {   //'middleware' =>  'admin' ,

    Route::get('/', 'Admin\AdminController@index')->name('admin.home');

    Route::resource('/user', 'Admin\User\UserController');
    Route::get('/admins', 'Admin\User\UserController@admins')->name('user.admins');

    Route::resource('/about', 'Admin\AboutController');
    Route::resource('/setting', 'Admin\SettingController');
    Route::resource('/services', 'Admin\ServicesController');
    Route::resource('/slider', 'Admin\SliderController');
    Route::resource('/gallery', 'Admin\ImageGaleryController');
    Route::resource('/information', 'Admin\InformationController');
    Route::resource('/category', 'Admin\Product\CategoryController');
    Route::resource('/product', 'Admin\Product\ProductController');
    Route::resource('/references', 'Admin\ReferencesController');

    Route::post('/referencesupdate', 'Admin\ReferencesController@referenceupdate')->name('reference.updatemethod');
    // PRODUCT IMAGE ROUTES
    Route::get('/productimageupload/{id}', 'Admin\Product\ProductController@imagesuploadpage')->name('product.images');
    Route::post('/productimagestore', 'Admin\Product\ProductController@imagestore')->name('product.imagestore');
    Route::get('/productimagefetch', 'Admin\Product\ProductController@imagefetch')->name('product.imagefetch');

    Route::post('/productimageupdate', 'Admin\Product\ProductController@productimageupdate')->name('product.imageupdate');

    Route::get('/productimagedelete', 'Admin\Product\ProductController@imagedelete')->name('product.imagedelete');
    Route::post('/productimagesdelete', 'Admin\Product\ProductController@productimagedelete')->name('product.productimagedelete');

    Route::resource('/options', 'Admin\Product\OptionController');
    Route::resource('/additionaloptions', 'Admin\Product\AdditionalOptionsController');
    Route::get('/statictics', 'Admin\StatisticsController@index')->name('statistics.index');

    Route::get('informationcat', 'Admin\InformationController@createcategory')->name('inform.category');
    Route::post('informationcat', 'Admin\InformationController@storecategory')->name('inform.addcategory');
    Route::get('informationcat/{id}', 'Admin\InformationController@editcategory')->name('inform.edit');
    Route::post('informationcat/{id}/edit', 'Admin\InformationController@updatecategory')->name('inform.update');
    Route::delete('informationcat/{id}', 'Admin\InformationController@deletecategory')->name('inform.delete');

    Route::get('/gallerys', 'Admin\ImageGaleryController@fetch')->name('gallery.fetch');
    Route::get('/galleryss', 'Admin\ImageGaleryController@delete')->name('gallery.delete');

});


Route::get('/', 'Site\SiteController@index')->name('site.index');
Route::get('/hakkımızda', 'Site\AboutController@index')->name('site.about');
Route::get('/urunler', 'Site\Product\ProductsController@index')->name('site.product');
Route::get('product/{id}/{slug}', ['as' => 'showProducts', 'uses' => 'Site\Product\ProductsController@show']);
Route::get('/iletisim', 'Site\ContactController@index')->name('site.contact');
Route::get('/galeri', 'Site\GalleryController@index')->name('site.gallery');
Route::get('/hizmetlerimiz', 'Site\ServicesController@index')->name('site.services');
Route::get('/bilgilendirme', 'Site\SiteController@information')->name('site.information');

Route::get('/katalog', 'Site\SiteController@catalogue')->name('site.catalogue');
Route::get('/kataloglar', 'Admin\AdminController@catalogue')->name('admin.catalogue');
Route::post('/katalogekle', 'Admin\AdminController@addcatalogue')->name('catalogue.add');
Route::get('/katalogliste', 'Admin\AdminController@readcatalogue')->name('catalogue.read');
Route::delete('katalogsil/{id}', 'Admin\AdminController@delcatalogue')->name('catalogue.delete');



Route::group(['prefix' => 'kullanici'], function () {

    Route::get('/giris', 'Site\LoginController@index')->name('site.login');
    Route::post('/giris', 'Site\LoginController@control');
    Route::post('/cikis', 'Site\LoginController@logout')->name('site.logout');
    Route::get('/kayıt', 'Site\SignUpController@index')->name('site.signup');
    Route::post('/kayıt', 'Site\SignUpController@store');
    Route::post('/districts', 'ProvincesandDistrictsController@getajaxdistrict')->name('get.districts');
    Route::get('/aktiflestir/{token}', 'Site\SignUpController@activate')->name('user.activate');

    //auth
    Route::get('/sepet/{id}', 'Site\Product\BasketController@index')->name('site.addtocart');


    Route::group(['middleware' => ['auth']], function () {
        Route::post('/sepet', 'Site\Product\BasketController@addtocart')->name('product.addtocart');
        Route::get('/{slug}/{id}', 'Site\UserController@index')->name('user.profil');
        Route::get('/basket/get/{id}', 'Site\Product\BasketController@basketfetch')->name('basket.fetch');
        Route::get('/basket/remove/{id}', 'Site\Product\BasketController@basketremove')->name('basket.fetch');
        Route::post('/changepassword', 'Site\UserController@changepassword')->name('password.change');
        Route::post('/accountupdate', 'Site\UserController@updateinform')->name('user.accountchange');
        Route::post('/companyupdate', 'Site\UserController@updatecompany')->name('user.companychange');
    });
});
/*
Route::resource('/contact','site\ContactController');
Route::resource('/about','site\AboutController');*/


Route::get('/profil', function () {
    return view('Site.pages.User.profil');
//    $user = \App\User::find(1);
    //  return new  App\Mail\UserRegisterMail($user) ;
});
//
//Route::get('/clear-cache', function() {
//    $exitCode = Artisan::call('cache:clear');
//    // return what you want
//});

Route::get('/kur','Currencies@index')->name('kur.index');
Route::get('/kurkaydet','Currencies@store')->name('kur.save');

Route::get('/mail',function (){
    $contact = \App\Catalogue::find(1);
   return new App\Mail\CatalogueMail($contact);
});

Route::get('/contact-mail',function (){
    $contact = \App\Contact::find(1);
   return new App\Mail\ContactMail($contact);
});
