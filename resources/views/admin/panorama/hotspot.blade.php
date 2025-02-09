@extends('template.template')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" aria-label="breadcrumb">
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hotspot</li>
                </ol>
            </div>
        </div>

        <!-- flash konfirmasi hapus data -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- end flash -->

        <!-- menampilkan data ke tabel -->
        <div class="card border-0 shadow-lg rounded">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Panorama</th>
                                <th>Title</th>
                                <th>Hotspot/Koordinat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp


                            @foreach ($panoramas as $panorama)
                            @php
                            $rowspan = $panorama->coordinates->count();
                            @endphp
                            @foreach ($panorama->coordinates as $key => $coordinate)
                            <tr>
                                @if ($key === 0)
                                <td rowspan="{{$rowspan}}">{{++$no}}</td>
                                <td rowspan="{{ $rowspan }}">
                                    <img src="{{ asset('storage/images/' . $panorama->gambar) }}" alt="{{ $panorama->title }}" width="200" height="120">
                                </td>
                                <td rowspan="{{ $rowspan }}">{{ $panorama->title }}</td>
                                @endif
                                <td>{{ $coordinate->koordinat_x }}, {{$coordinate->koordinat_y}}, {{$coordinate->koordinat_z}} </td>
                                <td>
                                    <!-- Tombol Hapus -->
                                    <form action="{{route('hotspot.destroy', $coordinate->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus koordinat ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    {{ $hotspot->links() }}
                </div>
            </div>
        </div>
        <!-- end tampil -->
    </div>
</div>
@endsection