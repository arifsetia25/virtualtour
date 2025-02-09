<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{

    public function main()
    {
        $informasi = Informasi::all();
        $foto = Galeri::all();
        return view('user.informasi', compact('informasi', 'foto'));
    }

    public function index()
    {
        $informasi = Informasi::select('id', 'fasilitas', 'tiket')->get();
        $isAddButtonVisible = $informasi->isEmpty(); // Tombol hanya terlihat jika tabel kosong.
        return view('admin.info.informasi', compact('informasi', 'isAddButtonVisible'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'fasilitas' => 'required',
            'tiket' => 'required',

        ]);

        Informasi::create([
            'fasilitas' => $request->fasilitas,
            'tiket' => $request->tiket,

        ]);

        return redirect()->route('admin/informasi')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        // Cari data berdasarkan ID
        $informasi = Informasi::findOrFail($id);

        // Return view ke form edit
        return view('admin.info.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fasilitas' => 'required|string|max:255',
            'tiket' => 'required|string',

        ]);

        $informasi = Informasi::findOrFail($id);
        $informasi->fasilitas = $request->fasilitas;
        $informasi->tiket = $request->tiket;
        $informasi->save();

        return redirect()->route('admin/informasi')->with('success', 'Data berhasil diperbarui.');
    }
    public function destroy($id)
    {
        // Cari data panorama berdasarkan ID
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data panorama dan koordinat berhasil dihapus.');
    }
}
