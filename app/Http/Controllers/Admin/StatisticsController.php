<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Period;
class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mostViewedPages = $this->mostViewedPages();
        $analyticsData = $this->performQuery();
        $performonsite = $this->sessionsAndUsers();
        $browserandoperatingsystem = $this->browserAndOperationSystem();
        $arraydata = array_count_values($mostViewedPages);
        $pages = [];
        $pageconut = [];
        foreach ($arraydata as $key => $val) {
            array_push($pages, $key);
            array_push($pageconut, $val);
        }

        $totalorders = DB::select("
         select COUNT(*) totalorders from orders
         where created_at between date_sub(now(),INTERVAL 1 WEEK) and now()");

        $pages = str_replace('Baskimedya.com |', '', $pages);
        return view('Admin.pages.Statistics.index', compact(['pages', 'pageconut', 'totalorders', 'analyticsData', 'performonsite', 'browserandoperatingsystem']));
    }

    public function mostViewedPages()
    {
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        $pageTitle = [];

        foreach ($analyticsData as $a) {
            array_push($pageTitle, $a["pageTitle"]);
        }
        return $pageTitle;
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

    public function sessionsAndUsers()
    {
        return $performonsite = Analytics::performQuery(Period::months(1), 'ga:sessions', ['metrics' => 'ga:sessions,ga:sessionDuration,ga:exitRate,ga:users']);
    }

    public function browserAndOperationSystem()
    {
        return $browserandoperatingsystem = Analytics::performQuery(Period::months(1), 'ga:sessions',
            ['metrics' => 'ga:sessions',
                'dimensions' => 'ga:browser,ga:operatingSystem,ga:operatingSystemVersion']);
        //ga:browser,ga:browserVersion,ga:operatingSystem,ga:operatingSystemVersion
    }


//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
