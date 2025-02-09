@extends('template.template')
@section('content')
<div class="card">
    <div class="card-header">
        Form Update Data Galeri
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galeri.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Foto</label>
                <input class="form-control" type="file" name="galeri_foto">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                <input type="text" class="form-control " placeholder="Keterangan" name="keterangan" value="{{$foto->keterangan}}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection