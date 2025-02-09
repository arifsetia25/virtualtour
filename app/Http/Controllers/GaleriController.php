<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $foto = Galeri::select('id', 'galeri_foto', 'keterangan')->paginate(5);
        return view('admin.galeri.galeri', compact('foto'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'galeri_foto' => 'required|mimes:jpg,jpeg,png',
            'keterangan' => 'required'
        ]);

        // $file = $request->file('gambar');

        // // Ubah nama file untuk menghindari serangan berbasis nama file
        // $extension = $file->getClientOriginalExtension();
        // $filename = time() . '.' . $extension;
        // $path = $file->storeAs('gambars', $filename, 'public');

        $image = $request->file('galeri_foto');
        $image->storeAs('public/images', $image->hashName());

        Galeri::create([
            'galeri_foto' => $image->hashName(),
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin/galeri')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        // Cari data berdasarkan ID
        $foto = Galeri::findOrFail($id);

        // Return view ke form edit
        return view('admin.galeri.edit', compact('foto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'galeri_foto' => 'required|mimes:jpg,jpeg,png',
            'keterangan' => 'required',

        ]);
        $foto = Galeri::findOrFail($id);
        $foto->keterangan = $request->keterangan;


        // Jika ada file foto baru yang diupload
        if ($request->hasFile('galeri_foto')) {
            // Hapus foto lama jika ada
            if ($foto->galeri_foto && file_exists(public_path('storage/images/' . $foto->galeri_foto))) {
                unlink(public_path('storage/images/' . $foto->galeri_foto));
            }

            // Upload foto baru
            $file = $request->file('galeri_foto');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('storage/images/'), $filename);

            // Simpan nama file ke database
            $foto->galeri_foto = $filename;
        }
        $foto->save();

        return redirect()->route('admin/galeri')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari data panorama berdasarkan ID
        $foto = Galeri::findOrFail($id);
        $foto->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
