<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class ProvincesandDistrictsController extends Controller
{



    public function getajaxdistrict(Request $request)
    {
        if ($request->provinceno) {

            $selected_provience = $request->provinceno;

             $select_district = $request->district_no;

            $dbdata = District::where('province_no', '=', $selected_provience)->get();

            $districts = '';

            $selected = '';
            foreach ($dbdata as  $district) {

            if ($district->district_no == $select_district){
               $selected = 'selected ';
                }

                $districts .= '<option ' . $selected . '  value="' . $district->district_no . '">' . $district->name . '</option>';
                $selected = '';
            }


            return $districts;
        }
        else {

            $dbdata = District::where('province_no', '=', $request->provinceno)->get();


            $districts = '';
            $selected = '';

            foreach ($dbdata as $key => $district) {

                reset($dbdata);
                if ($key === key($dbdata)){
                        $selected = 'selected';
                }
                $districts .= '<option ' . $selected . ' value="' . $district->district_no . '">' . $district->name . '</option>';

            }
            return $districts;


        }

    }
} //endclass
