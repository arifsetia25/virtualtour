@extends('template.templateUser')
@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('home')}}"><img src=" {{ asset('assets/img/logo.png')}}" alt="" srcset="" style="width: 50%;"></a>

    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-text">
        <h1>Selamat Datang di Curug Cipeuteuy</h1>
        <p class="mb-5 pb-2">Keindahan alam yang menenangkan hati</p>
        <a href="{{route('virtualtour')}}" class="btn btn-primary mt-4 m-3">Virtual Tour</a>
        <a href="{{url('sejarah')}}" class="btn btn-primary mt-4 m-3">Sejarah</a>
        <a href="{{ url('informasi')}}" class="btn btn-primary mt-4 m-3">Informasi</a>
    </div>
</div>

@endsection