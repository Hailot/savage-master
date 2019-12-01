<?php

namespace App\Http\Controllers;

use App\Gear;
use App\Http\Requests\StoreGear;
use Illuminate\Http\Request;

class GearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gears = Gear::all();

        return view('gear.browse')->with('gears',$gears);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gear.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGear $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        Gear::create($validated);

        return redirect()->route('gear.index')->with('status','Gear Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gear  $gear
     * @return \Illuminate\Http\Response
     */
    public function show(Gear $gear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gear  $gear
     * @return \Illuminate\Http\Response
     */
    public function edit(Gear $gear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gear  $gear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gear $gear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gear  $gear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gear $gear)
    {
        //
    }
}
