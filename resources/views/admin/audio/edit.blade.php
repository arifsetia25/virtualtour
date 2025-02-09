@extends('template.template')
@section('content')
<div class="card">
    <div class="card-header">
        Form Update Data Audio
    </div>
    <div class="card-body">
        <form action="{{ route('audio.update', $audio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Audio</label>
                <input class="form-control" type="file" name="audio">
                @error('audio')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Title Audio</label>
                <input type="text" class="form-control " placeholder="Keterangan" name="title" value="{{$audio->title}}">
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Pilih Panorama</label>
                <select name="panorama_id" id="exampleFormControlSelect1" class="form-select">
                    @foreach ($panoramaID as $item)
                    <option value="{{ $item->id }}" {{$audio->panorama_id == $item->id ? 'selected':''}}>{{ $item->title }}</option>
                    @endforeach
                </select>
                @error('panorama_id')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror

                <!-- end form-->
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection