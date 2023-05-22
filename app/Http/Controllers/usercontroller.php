<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

class usercontroller extends Controller
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
    public function index()
    {
        return view('user.show',['users' => User::all()]);
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
        // dd($id);
        $user = User::findOrFail($id);
        if($user->role == 'admin'){
            $user->role = 'user';
        }else{
            $user->role = 'admin';
        }
        $user->save();
        // dd($user);
        return redirect()->back()->with('status', 'Done Make The ACC '.$user->role.'!');
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
        //dd(Auth::user());
        //$request->password = Hash::make($request->password);
        if($request->email === Auth::user()->email){
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],//, 'unique:users'
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }else{
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],//
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        //dd($request);
        $user = User::findorfail($id);
        //$validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user->fill($validated);
        $user->save();

        // $request->session()->flash('status', 'Done! change');
        return redirect()->route('profile.index')->with('status', 'Done! change');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // $profile = profile::findOrFail($id);
        // $profile->delete();

        session()->flash('status', 'user was deleted!');

        return redirect()->route('profile.index')->with('status', 'user was deleted!');
    }
}
