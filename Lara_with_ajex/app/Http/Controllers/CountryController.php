<?php

namespace App\Http\Controllers;

use App\Models\country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['country'] = DB::table('countries')->get();
        return view('country_list', $data);
    }


    public function getState(Request $request)
    {
        $cid = $request->post('cid');
        // echo $cid;
        $state = DB::table('states')->where('conuntry_id', $cid)->get();
        $html = '  <option value="">select the state</option>';
            foreach ($state as $list) {
                $html .= '  <option value="' . $list->state_id . '">' . $list->state_name . '</option>';
            }
        echo $html;
    }

    public function getCity(Request $request){
        $sid=$request->post('sid');
     $city=DB::table('cities')->where('state_id',$sid)->get();
     $html=' <option value="">select the city</option>';
     foreach($city as $list){
         $html.='<option value="'.$list->city_id.'">'.$list->city_name.'</option>';
     }
     echo $html;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(country $country)
    {
        //
    }
}
