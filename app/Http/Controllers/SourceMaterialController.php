<?php

namespace App\Http\Controllers;

use App\SourceMaterial;
use App\SourceMaterialType;
use Illuminate\Http\Request;
use Storage;

class SourceMaterialController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('source-materials.index');
    }

    public function getFiles($type) {
        return SourceMaterialType::with(['sourceMaterials', 'subtypes'])
            ->find($type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SourceMaterial $sourceMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(SourceMaterial $sourceMaterial) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SourceMaterial $sourceMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(SourceMaterial $sourceMaterial) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SourceMaterial $sourceMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SourceMaterial $sourceMaterial) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SourceMaterial $sourceMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(SourceMaterial $sourceMaterial) {
        //
    }
}
