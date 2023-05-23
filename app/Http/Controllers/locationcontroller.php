<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use App\Models\city;
use App\Models\college;
use App\Models\profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class locationcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from = $request->user()->profile()->from;
        $citty = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('cities', 'profiles.from', '=', 'cities.id')
            ->join('colleges', 'colleges.city_id', '=', 'cities.id')
            ->select('cities.*','colleges.*')
            ->where('users.id', '=',Auth::user()->id)
            ->get();
        $colleges = college::select('*')->where('city_id','=',$from)->get();
        $cities = city::all();
        return view('location.show')->with(['cities' => $cities,'colleges'=>$colleges,'coll'=>$citty]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
}
