<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address;

class addressescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { //       $validated = 
        $request->validate([
            'Address' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
        ]);

         address::create([
            'address'=>$request->input('Address'),
            'price' =>$request->input('price'),
            'city_id'=>$request->user()->profile()->from,
            'user_id'=>$request->user()->id
        ]);
        //  address::create([
        //     'address'=>$request->input('Address'),
        //     'price' =>$request->input('price'),
        //     'city_id'=>$request->user()->profile()->from,
        //     'user_id'=>$request->user()->id
        // ]);
        return redirect()->back()->with('status', 'Done Add a Address!');
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
