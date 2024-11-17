<?php

namespace App\Http\Controllers;

use App\Models\Koordinate;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Panorama;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PanoramaController extends Controller
{
    public function index(): View
    {
        $panorama = Panorama::latest()->paginate(10);
        return view('admin.panorama.panorama', compact('panorama'));
    }

    public function uploadGambar(Request $request): RedirectResponse
    {
        $request->validate([
            'gambar' => 'required|mimes:jpg,jpeg,png,gif',
            'title' => 'required'
        ]);

        // $file = $request->file('gambar');

        // // Ubah nama file untuk menghindari serangan berbasis nama file
        // $extension = $file->getClientOriginalExtension();
        // $filename = time() . '.' . $extension;
        // $path = $file->storeAs('gambars', $filename, 'public');

        $image = $request->file('gambar');
        $image->storeAs('public/images', $image->getClientOriginalName());

        Panorama::create([
            'gambar' => $image->getClientOriginalName(),
            'title' => $request->title
        ]);

        return redirect()->route('panorama')->with(['message', 'Data berhasil disimpan']);
    }

    public function show($id)
    {
        $panorama = Panorama::find($id);
        $koordinat = Koordinate::Where('panorama_id', $id)
            ->leftJoin('panoramas', function($join) {
                $join->on('koordinates.panorama_id', '=', 'panoramas.id')
                    ->where('koordinates.tipe', 'Link');
            })
            ->select('panoramas.gambar as target_gambar', 'koordinates.*')->get();
            
        $options_tipe = [
            '1' => 'Info',
            '2' => 'Link'
        ];
        $target = Panorama::select('id', 'title')->get();


        return view('admin.panorama.showPanorama', compact('panorama', 'koordinat', 'options_tipe', 'target'));
    }

    public function storeHotspot(Request $request, $id)
    {
        file_put_contents("hotspot.txt", $request->tipe);
        $request->validate([
            'koordinat' => 'required',
            'tipe' => 'required',
            //  'keterangan' => 'required_if:tipe,Info|string',
            // 'target' => 'required_if:tipe,Link|string',
        ]);

        $panorama = Panorama::find($id)->value('gambar');
        $point = $request->input('koordinat');
        file_put_contents("point.txt", $request->target);
        $pointExplode = explode(", ", $point);
        file_put_contents("hotspot.txt", print_r($pointExplode, true));
        Koordinate::create([
            'koordinat_x' => $pointExplode[0],
            'koordinat_y' => $pointExplode[1],
            'koordinat_z' => $pointExplode[2],
            'tipe' => $request->tipe,
            'keterangan' => $request->keterangan,
            'panorama_id' => $id,
            'target' => $request->target,
        ]);

        return redirect()->route('panorama.show', ['id' => $id])->with('success', 'Data Berhasil di simpan!');
    }
}
