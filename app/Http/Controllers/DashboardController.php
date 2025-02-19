<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Galeri;
use App\Models\Koordinate;
use App\Models\Panorama;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlah_koordinat = Koordinate::all()->count();
        $jumlah_panorama = Panorama::all()->count();
        $jumlah_galeri = Galeri::all()->count();
        $jumlah_audio = Audio::all()->count();
        return view('admin.dashboard', compact('jumlah_panorama', 'jumlah_koordinat', 'jumlah_galeri', 'jumlah_audio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
