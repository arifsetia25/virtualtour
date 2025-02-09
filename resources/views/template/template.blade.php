<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Tour Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/105/three.js"></script>
    <script src="{{ asset('assets/js/panolens.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/cc1d8ebad0.js" crossorigin="anonymous"></script>

    <style>
        body {
            overflow-x: hidden;

        }

        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #1A2135;
            transition: left 0.3s;
        }

        .sidebar.active {
            left: 0;
        }

        .content {
            margin-left: 0;
            transition: margin-left 0.3s;
        }

        .content.active {
            margin-left: 250px;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px;
        }

        .divider {
            border: none;
            border-top: 1px solid #999999;
            /* Warna garis */
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <div class="sidebar" id="sidebar">
        <div class="p-2">
            <a href="{{ route('dashboard.index') }}" class="logo">
                <img src="{{ asset('assets/img/logo_curug_cipeuteuy.jpg') }}" alt="navbar brand" class="navbar-brand" height="60px" width="180px" />
            </a>
            <ul class="nav flex-column p-3 ">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard.index') }}"><i class="fas fa-home" style="color: #fafafa;"></i> Dashboard</a>
                </li>
                <hr class="divider">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('panorama') }}"><i class="fa-solid fa-panorama" style="color: #fafafa;"></i> Panorama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('hotspot') }}"><i class="fa-solid fa-location-dot" style="color: #fafafa;"></i> Koordinat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('audio') }}"><i class="fa-solid fa-file-audio" style="color: #fafafa;"></i> Audio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('admin/informasi') }}"><i class="fa-solid fa-images" style="color: #fafafa;"></i> Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('admin/galeri') }}"><i class="fa-solid fa-circle-info" style="color: #fafafa;"></i> Galeri</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="content" id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="btn" style="margin: 5px;" id="toggleSidebar"><i class="fa-solid fa-bars fa-lg"></i></button>
            <div class="ms-auto">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/img/profile.jpg" width="30px" height="30px" alt="..." class="avatar-img rounded-circle" />
                    </button>
                    <span style="padding-right: 10px;">
                        <span class="op-7">Hi,</span>
                        <span class="fw-bold">{{Auth::user()->name}}</span>
                    </span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            @yield('content')
        </div>

        <!-- <footer class="footer">
            <p>© 2024 Semua Hak Dilindungi</p>
        </footer> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#toggleSidebar').click(function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });
        });
    </script>
</body>

</html>