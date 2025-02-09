<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Curug Cipeuteuy</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cc1d8ebad0.js" crossorigin="anonymous"></script>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        p {
            text-indent: 30px;
        }

        .hero {
            background: url('assets/img/backgroung_login.jpeg') no-repeat center center/cover;
            height: 50%;
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: inline-block;
        }

        .hero-text {
            position: relative;
            z-index: 2;
            text-shadow: 3px 3px 10px #000000;
        }

        .navbar {
            background-color: transparent;
            padding: 25px;
            margin-left: 15px;
            margin-right: 50px;
        }

        .navbar a {
            color: #d9d9d9;
        }

        .navbar a:hover {
            color: #ffffff;
        }

        /*untuk menyembunyikan logo ketika di scroll ke bawah pada tampilan mobile */
        .hidden {
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
        }

        /* membuat efek gelap pada gambar */
        /* .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 300px;
            transition: transform 0.3s ease;
        }

        .image-container:hover img {
            transform: scale(1.1);
        
        } */

        /* 
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .image-overlay {
            opacity: 1;
         
        }

        .image-overlay h5 {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        } */

        .custom-card {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            /* Custom shadow */
            transition: transform 0.2s ease-in-out;
        }

        .custom-card:hover {
            transform: scale(1.05);
            /* Efek hover */
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('home')}}"><img src=" {{ asset('assets/img/logo.png')}}" alt="" srcset="" style="width: 50%;" id="navbar-logo"></a>
        </div>
    </nav>
    <!-- Bagian Gambar dengan Overlay -->
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h1>Informasi Curug Cipeuteuy</h1>
        </div>
    </div>

    <!-- Bagian Border dan Tulisan Artikel -->
    <div class="row m-4">
        <div class="col-sm-6 mt-1">
            <div class="card" style="background-color: #e8e6df;">
                <div class="card-body d-flex">
                    @foreach ($informasi as $text)
                    <div class="me-3 flex-grow-1">
                        <h5 class="card-title" style="text-indent: 30px; padding-top:10px;">Fasilitas</h5>
                        <p class="card-text">
                        <ul type="none" style="line-height: 30px;">
                            @foreach (explode("\n", $text->fasilitas) as $line)
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                {{ $line }}
                            </li>
                            @endforeach
                        </ul>
                        </p>
                    </div>
                    @endforeach
                    @foreach ($informasi as $data)
                    <div class="flex-grow-1">
                        <h5 class="card-title" style="text-indent: 30px; padding-top:10px;">Harga Tiket Masuk</h5>
                        <p class="card-text">
                        <ul type="none" style="line-height: 30px;">
                            @foreach (explode("\n", $data->tiket) as $lines)
                            <li>
                                {{ $lines }}
                            </li>
                            @endforeach
                            <li>- Tiket sudah termasuk free berenang</li>
                            <li>- Anak usia 5 tahun keatas sudah wajib tiket</li>
                        </ul>
                        </p>
                        @endforeach

                        <h5 class="card-title" style="text-indent: 30px; padding-top:10px;">Tarif Parkir Kendaraan</h5>
                        <p class="card-text">
                        <ul type="none" style="line-height: 30px;">
                            <li>Motor : Rp 3.000</li>
                            <li>Mobil : Rp 10.000</li>
                        </ul>
                        </p>
                    </div>
                </div>

                <h5 class="card-title" style="text-indent: 30px; padding-top:10px;">Kontak & Sosial Media</h5>
                <p class="card-text">
                <ul type="none" style="line-height: 30px;">
                    <li><a href="https://wa.me/6281384990974" target="_blank" style="color: black; text-decoration: none;"><i class="fa-brands fa-whatsapp fa-xl" style="color: #15932e;"></i> 0813-8499-0974</a></li>
                    <li><a href="mailto:koperasiagunglestari@gmail.com" style="color : black; text-decoration : none;"><i class="fa-regular fa-envelope fa-lg" style="color: #cb1a2c;"></i> koperasiagunglestari@gmail.com</a></li>
                    <li><a href="https://www.instagram.com/curug_cipeuteuy/?hl=en" style="color:black; text-decoration:none;"><i class="fa-brands fa-instagram fa-xl" style="color: #b81e54;"></i> curug_cipeuteuy</a></li>
                    <li><a href="https://web.facebook.com/curug.cipeuteuy/?_rdc=1&_rdr#" style="color:black; text-decoration:none;"><i class="fa-brands fa-facebook fa-lg" style="color: #3b5998;"></i> curug cipeuteuy</a> </li>
                </ul>
                </p>
            </div>
        </div>
        <div class="col-sm-6 mt-1">
            <div class="card shadow-lg">
                <div class="card-body ">
                    <h5 class="card-title p-2" style="text-align: center;">Lokasi Curug Cipeuteuy</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.56282043536!2d108.3816981736598!3d-6.822903106856667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69d5a955555555%3A0x3c59b225b45ead8c!2sCurug%20Cipeuteuy!5e0!3m2!1sen!2sid!4v1733806838718!5m2!1sen!2sid" class="ratio ratio-1x1" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <div class="container mt-2 p-4">
        <p class="text-center fs-2 fw-normal" style="line-height: 60px; font-family: 'Roboto', sans-serif; ">Galeri</p>
        <div class="row g-4">
            @foreach ($foto as $data)
            <div class="col-md-4">
                <div class="card custom-card">
                    <!-- <div class="image-container"> -->
                    <img src="{{ asset('storage/images/'. $data->galeri_foto) }}" class="card-img-top" alt="Gambar 1" style="height: 15rem;">
                    <!-- <div class="image-overlay"> -->
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">{{$data->keterangan}}</h5>
                        </center>
                    </div>
                </div>
                <!-- </div> -->
                <!-- </div> -->
            </div>
            @endforeach

        </div>
    </div>
    <!-- end gallery -->

    <!-- footer -->
    <footer class="bg-dark text-light pb-2">
        <div class="container">
            <div class="row">
                <div class="text-center pt-2">
                    <p class="mb-0">Copyright &copy; 2024 Objek Wisata Curug Cipeuteuy.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Tambahkan Bootstrap JS (Opsional jika butuh interaktivitas) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Ambil elemen logo
        const logo = document.getElementById("navbar-logo");

        // Tambahkan event listener untuk mendeteksi scroll
        window.addEventListener("scroll", () => {
            // Jika posisi scroll lebih dari 50px, tambahkan class 'hidden'
            if (window.scrollY > 50) {
                logo.classList.add("hidden");
            } else {
                // Jika posisi scroll kembali ke atas, hapus class 'hidden'
                logo.classList.remove("hidden");
            }
        });
    </script>
</body>

</html>