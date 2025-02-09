@extends('template.template')
@section('content')
<div class="card">
    <div class="card-header">
        Form Update Data
    </div>
    <div class="card-body">
        <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Fasilitas</label>
                <textarea class="form-control" name="fasilitas" placeholder="Masukkan Detail Fasilitas" id="exampleFormControlTextarea1" rows="3">{{$informasi->fasilitas}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Tiket</label>
                <textarea class="form-control" name="tiket" placeholder="Masukkan Detail Harga Tiket" id="exampleFormControlTextarea1" rows="3">{{$informasi->tiket}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection