<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class welcomecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citty = DB::table('cities')
            ->join('colleges', 'cities.id', '=', 'colleges.city_id')
            ->select('cities.*', 'colleges.*')
            ->get();
         $model = DB::table('profiles')
            ->select('car_model')
            ->where('car_model', '!=', null)
            ->distinct()
            ->orderBy('car_model', 'desc')
            ->get();
        //  dd($citty);
        return view('welcome')->with(['cities' => $citty, 'models'=>$model]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->search != null) {
            $citty = DB::table('cities')
                ->join('colleges', 'cities.id', '=', 'colleges.city_id')
                ->select('cities.*', 'colleges.*')
                ->get();
            $model = DB::table('profiles')
                ->select('car_model')
                ->where('car_model', '!=', null)
                ->distinct()
                ->orderBy('car_model', 'desc')
                ->get();
            $users = DB::table('users')
                ->join('profiles', 'users.id', '=', 'profiles.user_id')
                ->join('cities', 'profiles.from', '=', 'cities.id')
                ->join('colleges', 'colleges.city_id', '=', 'cities.id')
                ->join('addresses', 'addresses.user_id', '=', 'users.id')
                ->select('users.name', 'users.email', 'profiles.phone', 'addresses.price', 'profiles.car_type', 'profiles.car_model', 'cities.city', 'colleges.college', 'addresses.address')
                ->where('colleges.id', '=', $request->Cityselect)
                ->where('addresses.address', 'like', '%' . $request->search . '%')
                ->where('profiles.car_model', '>=', $request->modelselect)
                ->orderBy('price', 'asc')
                ->get();
                // print_r(json_decode($users,1));
                if(empty(json_decode($users,1))){//empty(json_decode($users,1)
                    $users = DB::table('users')
                            ->join('profiles', 'users.id', '=', 'profiles.user_id')
                            ->join('cities', 'profiles.from', '=', 'cities.id')
                            ->join('colleges', 'colleges.city_id', '=', 'cities.id')
                            ->join('addresses', 'addresses.user_id', '=', 'users.id')
                            ->select('users.name', 'users.email', 'profiles.phone', 'addresses.price', 'profiles.car_type', 'profiles.car_model', 'cities.city', 'colleges.college', 'addresses.address')
                            ->where('colleges.id', '=', $request->Cityselect)
                            ->where('addresses.address', 'like', '%' . $request->search . '%')
                            ->orderBy('price', 'asc')
                            ->get();
                }
            // dd($users);
            return view('welcome')->with(['cities' => $citty, 'users' => $users, 'models'=>$model, 'status' => 'Get Results :)']);
        } else {
            $citty = DB::table('cities')
                ->join('colleges', 'cities.id', '=', 'colleges.city_id')
                ->select('cities.*', 'colleges.*')
                ->get();
            $model = DB::table('profiles')
                ->select('car_model')
                ->where('car_model', '!=', null)
                ->distinct()
                ->orderBy('car_model', 'desc')
                ->get();
            // dd($citty);
            return view('welcome')->with(['cities' => $citty, 'models'=>$model, 'statuss' => 'ReSearch for Results :)']);
        }
    }
}
