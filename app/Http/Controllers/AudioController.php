<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Panorama;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function index()
    {
        $panoramaID = Panorama::select('id', 'title')->get(); //mengambil data id dan title pada tabel panorama
        $panoramas = Panorama::with('audio')->get();
        return view('admin.audio.audio', compact('panoramaID', 'panoramas'));
    }

    public function uploadAudio(Request $request)
    {
        $request->validate([
            'audio' => 'required|mimetypes:audio/mpeg|max:10240',
            'title' => 'required',
            'panorama_id' => 'required'
        ]);

        $audio = $request->file('audio');
        $audio->storeAs('public/audio', $audio->getClientOriginalName());


        Audio::create([
            'audio' => $audio->getClientOriginalName(),
            'title' => $request->title,
            'panorama_id' => $request->panorama_id
        ]);

        return redirect()->route('audio')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        // Cari data berdasarkan ID
        $panoramaID = Panorama::select('id', 'title')->get(); //mengambil data id dan title pada tabel panorama
        $audio = Audio::findOrFail($id);

        // Return view ke form edit
        return view('admin.audio.edit', compact('audio', 'panoramaID'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'audio' => 'required|mimetypes:audio/mpeg|max:10240',
            'title' => 'required',
            'panorama_id' => 'required'
        ]);
        $audio = Audio::findOrFail($id);
        $audio->title = $request->title;
        $audio->panorama_id = $request->panorama_id;

        // Jika ada file foto baru yang diupload
        if ($request->hasFile('audio')) {
            // Hapus audio lama jika ada
            if ($audio->audio && file_exists(public_path('storage/audio/' . $audio->audio))) {
                unlink(public_path('storage/audio/' . $audio->audio));
            }

            // Upload foto baru
            $file = $request->file('audio');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('storage/audio/'), $filename);

            // Simpan nama file ke database
            $audio->audio = $filename;
        }
        $audio->save();

        return redirect()->route('audio')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari data panorama berdasarkan ID

        $audio = Audio::findOrFail($id);
        $audio->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
