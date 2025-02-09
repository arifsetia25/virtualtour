@extends('template.template')
@section('content')

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" aria-label="breadcrumb">
    <div>
        <h3 class="fw-bold mb-3 ps-4">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active ps-4" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<div class="row m-2">
    <!-- <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Visitors</p>
                                    <h4 class="card-title">1,294</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
    <!-- <div class="col-sm-6 col-md-3">
        <a href="{{route('panorama')}}">
            <div class="card card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fa-solid fa-panorama"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Panorama</p>
                                <h4 class="card-title">{{ $jumlah_panorama }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> -->

    <div class="col-md-3">
        <a href="{{ url("panorama")}}" style="text-decoration: none;">
            <div class="card card-round text-white bg-primary mb-3" style="height: 120px; width: 250px;">
                <div class="card-header fs-5">Panorama</div>
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-panorama fa-2x me-2"></i>
                    <h3 class="card-title mb-0">{{ $jumlah_panorama }}</h3>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ url("hotspot")}}" style="text-decoration: none;">
            <div class="card text-white bg-success mb-3" style="height: 120px; width: 250px;">
                <div class="card-header fs-5">Koordinat</div>
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-location-dot fa-2x me-2"></i>
                    <h3 class="card-title mb-0">{{$jumlah_koordinat}}</h3>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ url("admin/galeri")}}" style="text-decoration: none;">
            <div class="card card-round text-white bg-danger mb-3" style="height: 120px; width: 250px;">
                <div class="card-header fs-5">Galeri Foto</div>
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-panorama fa-2x me-2"></i>
                    <h3 class="card-title mb-0">{{ $jumlah_galeri }}</h3>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ url("audio")}}" style="text-decoration: none;">
            <div class="card card-round text-white bg-warning mb-3" style="height: 120px; width: 250px;">
                <div class="card-header fs-5">Audio</div>
                <div class="card-body d-flex align-items-center">
                    <i class="fa-solid fa-panorama fa-2x me-2"></i>
                    <h3 class="card-title mb-0">{{ $jumlah_audio }}</h3>
                </div>
            </div>
        </a>
    </div>
</div>


@endsection