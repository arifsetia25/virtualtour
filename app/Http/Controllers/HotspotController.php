<?php

namespace App\Http\Controllers;

use App\Models\Koordinate;
use App\Models\Panorama;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotspotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $hotspot = Panorama::latest()->paginate(10);
        $panoramas = Panorama::with('coordinates')->get();

        // $panorama = Panorama::latest()->paginate(10);
        // $koordinates = Koordinate::latest();
        // $data = DB::table('panoramas')
        //     ->leftJoin('koordinates', 'panoramas.id', '=', 'koordinates.panorama_id')
        //     ->select(
        //         'panoramas.id as id',
        //         'panoramas.gambar as gambar',
        //         'panoramas.title as title',
        //         'koordinates.koordinat_x as x',
        //         'koordinates.koordinat_y as y',
        //         'koordinates.koordinat_z as z'
        //     )
        //     ->get();


        return view('admin.panorama.hotspot', compact('panoramas', 'hotspot'));
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
    public function store(Request $request, String $id) {}

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
        $coordinate = Koordinate::findOrFail($id); // Cari koordinat berdasarkan ID
        $coordinate->delete(); // Hapus data

        return redirect()->route('hotspot.index')->with('success', 'Koordinat berhasil dihapus.');
    }
}
