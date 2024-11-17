<?php

namespace App\Http\Controllers;

use App\Models\Koordinate;
use App\Models\Panorama;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class HotspotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.showPanorama');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $id)
    {
        $request->validate([
            'koordinat' => 'required',
            'keterangan' => 'required'
        ]);

        $panorama = Panorama::all()->find($id);
        Koordinate::create([
            'koordinat_x' => $request->x,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
