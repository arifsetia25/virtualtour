@extends('template.template')
@include('sweetalert::alert')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" aria-label="breadcrumb">
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Panorama</li>
                </ol>
            </div>
            <!-- Tombol add Panorama -->
            <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">[+]
                    Panorama</a>
            </div>
            <!-- -->
        </div>
        <!-- Modal / Popup -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Panorama</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form action="{{ route('upload.gambar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Input Gambar Panorama</label>
                                <input class="form-control " type="file" id="formFile" name="gambar">
                                @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="Title Gambar" name="title">
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- end form-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                    @if (Session::has('message'))
                    <script>
                        swal("Message", "{{ Session::get('message') }}", 'success', {
                            button: true,
                            button: "Ok",
                            timer: 3000,
                        });
                    </script>
                    @endif
                </div>
            </div>
        </div>
        <!--  end modal -->
        <!-- alert jika ada error -->
        @if ($errors->any())
        <div>
            <ul>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>

            </ul>
        </div>
        @endif
        <!-- end alert -->

        <!-- menampilkan data ke tabel -->
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Panorama</th>
                        <th>Title</th>
                        <th>Hotspot/Infospot</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                    @forelse ($panorama as $data)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>
                            <!-- menampilkan gambar dari folder public/storage/images -->
                            <img src="{{ asset('storage/images/'.$data -> gambar) }}" alt="gambar awal" width="150px">
                        </td>
                        <td>{{$data->title}}</td>
                        <td>1203012</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success">Edit</button>
                            <a href="{{ route('panorama.show', $data->id) }}"><button type="button" class="btn btn-info">Info</button></a>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Products belum Tersedia.
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $panorama->links() }}


    </div>
</div>
@endsection