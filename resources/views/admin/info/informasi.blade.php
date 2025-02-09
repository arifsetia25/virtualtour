@extends('template.template')
@section('content')
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" aria-label="breadcrumb">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Informasi</li>
        </ol>
    </div>
    <!-- Tombol add Panorama -->
    @if ($isAddButtonVisible)
    <div class="ms-md-auto py-2 py-md-0">
        <a href="#" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data</a>
    </div>
    @endif
    <!-- -->
</div>
<!-- Modal / Popup -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Masukkan Detail Fasilitas" id="exampleFormControlInput1" name="fasilitas" style="height: 100px"></textarea>

                        @error('fasilitas')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Masukkan Detail Harga Tiket" id="examplleFormControlInput2" name="tiket" style="height: 100px"></textarea>

                        @error('tiket')
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
<!-- alert success -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- end alert -->
<!-- menampilkan data ke tabel -->
<div class="card border-0 shadow-lg rounded">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Fasilitas</th>
                        <th>Harga Tiket</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                    @forelse ($informasi as $data)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$data->fasilitas }}</td>
                        <td>{{$data->tiket}}</td>
                        <td class="text-center">
                            <a href="{{ route('edit.informasi', $data->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('informasi.destroy', $data->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data belum Tersedia.
                    </div>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>


@endsection