<?php

namespace App\Http\Controllers\Admin;

use App\Catalogue;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Mail\CatalogueMail;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Period;
use Analytics;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $registeredusers = DB::select("
          SELECT COUNT(*) registeredusers from users

        ");

        $comparetolastweek = DB::select("select COUNT(*) comparetolastweek from users
                                        where created_at between date_sub(now(),INTERVAL 1 WEEK) and now()");

        $totalproducts = DB::select("
         select COUNT(*) totalproducts from products
         ");

        $totalorders = DB::select("
         select COUNT(*) totalorders from orders
         ");
        $compareorder = DB::select("select COUNT(*) compareorder from orders
                                    where created_at between date_sub(now(),INTERVAL 1 WEEK) and now();");

//        $newordertoday = DB::select("select COUNT(*) todayorder from orders where order_completed = 0
//                                        and created_at between date_sub(now(),INTERVAL 1 DAY ) and now()");
        $date = \Carbon\Carbon::today()->subDays(1);
        $newordertoday = Orders::where('created_at','>=',$date)->where('order_completed',0)->get();

        $date = \Carbon\Carbon::today()->subDays(7);
        $currencytoweek = Currency::where('created_at','>=',$date)->latest()->take(7)->get();
        $performonsite = $this->sessionsAndUsers();
        $sessionsandduration = $this->performQuery();


        return view('Admin.pages.home', compact('sessionsandduration','performonsite','newordertoday','registeredusers','currencytoweek', 'comparetolastweek', 'totalproducts', 'totalorders', 'compareorder'));
    }

    public function sessionsAndUsers()
    {
        return $performonsite = Analytics::performQuery(Period::months(1), 'ga:sessions', ['metrics' => 'ga:sessions,ga:sessionDuration,ga:exitRate,ga:users']);
    }

    public function performQuery()
    {
        return $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
//            ['metrics' => 'ga:sessions, ga:pageviews',
//                'dimensions' => 'ga:yearMonth'],
            ['metrics' => 'ga:pageviews, ga:sessionDuration',
                'filters' => 'ga:medium==referral',
                'sort' => 'ga:pageviews',
                'dimensions' => 'ga:source']
        );
    }

    public function catalogue()
    {
        return view('Admin.pages.Catalogue.index');
    }

    public function addcatalogue(Request $request)
    {
        $catalogue = new Catalogue();
        $catalogue->name = $request->name;
        $catalogue->lastname = $request->lastname;
        $catalogue->email = $request->email;
        $catalogue->tel = $request->phone;
        $catalogue->adres = $request->adres;
        $catalogue->save();

        Mail::to($request->email)->send(new CatalogueMail($catalogue));

        return back()->with('success', 'Talebiniz İletildi!');
    }

    public function readcatalogue()
    {
        $catalogues = Catalogue::all();
        return view('Admin.pages.Catalogue.index', compact(['catalogues']));
    }

    public function delcatalogue($id)
    {
        $catalogue = Catalogue::find($id);
        $catalogue->delete();
        return back();
    }

    public function registereusers()
    {
        $registeredusers = DB::select("
          SELECT COUNT(*) from users

        ");
        return view('admin.home', compact('registeredusers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
