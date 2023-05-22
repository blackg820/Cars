<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\city;
use App\Models\college;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class profilecontroller extends Controller
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
        // $user_id = Auth::user()->id;
        // $from = profile::select('from')->where('user_id','=',$user_id)->get();
        // $cityname = city::select('city')->where('id','=',$from)->get();
        $colleges = college::select('*')
        ->where('city_id','=',$from)
        ->distinct()
        ->get();
        $cities = city::all();
        // dd($citty[0]);
        $citty = $citty[0]??null;
        return view('profile.show')->with(['cities' => $cities,'colleges'=>$colleges,'coll'=>$citty]);//,'city_id'=>$from,'cityname'=>$cityname
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
        $validated = $request->validate([
            'from' => ['required', 'string', 'max:255'],
            'to' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'car_type'=>['required', 'string'],
            'car_model'=>['required', 'numeric']
        ]);
        $user = profile::findorfail($id);

        $user->fill($validated);
        $user->save();

        // $request->session()->flash('status', 'Done! change');
        return redirect()->route('profile.index')->with('status', 'Done! change');
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
