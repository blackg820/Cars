<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd($request->user()->role);
        if(in_array($request->user()->role, ['owner', 'admin'])){
            $users = DB::table('users')
            ->where('role', '!=', 'owner')
            ->where('role', '!=', 'admin')
            ->count();
            $colleges = DB::table('colleges')
            ->select('college')
            ->distinct()
            ->count();
            $cars = DB::table('profiles')
            ->select('car_type')
            ->where('car_type', '!=', null)
            ->count();
            $address = DB::table('addresses')
            ->select('address')
            ->distinct()
            ->count();
            $arr = ['users' => $users, 'cars' => $cars, 'addresses' => $address, 'colleges' =>$colleges];
        }else{
            $arr = [];
        }
        // dd($arr);
        return view('home')->with($arr);
    }

}
