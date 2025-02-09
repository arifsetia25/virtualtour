<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Curug Cipeuteeuy</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .hidden {
            opacity: 0;
            transform: translateY(-10px);
            pointer-events: none;
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
            <h1>Sejarah Curug Cipeuteuy</h1>
        </div>
    </div>

    <!-- Bagian Border dan Tulisan Artikel -->
    <div class="container mt-4">
        <div class="border p-4 mb-2 bg-white shadow" style="max-width: 800px; margin:auto;">
            <h2 class="h4 fw-semibold pb-2">Sejarah Objek Wisata Alam Curug Cipeuteuy</h2>
            <p class="text-muted" style="line-height: 28px;">
                Objek wisata curug cipeuteuy merupakan salah satu objek wisata yang terletak di Desa Bantaragung,
                Kecamatan Sindangwangi, Kabupaten Majalengka, Provinsi Jawa Barat. Terletak di kaki gunung Ciremai,
                objek wisata ini menawarkan pemandangan alam dan air terjun yang asri. Objek wisata ini berdiri pada tahun 2010,
                yang berada di kawasan Taman Nasional Gunung Ciremai dan dikelola oleh Mitra Pariwisata Gunung Ciremai.
            </p>
            <p class="text-muted" style="line-height: 28px;">
                Setelah itu beralih pengelolaan kepada Koperasi Agung Lestari yang beranggotakan dari masyarakat setempat.
                Pada awalnya kawasan hutan di sekitar curug cipeuteuy merupakan hutan produksi yang dikelola oleh PERUM Perhutani. Dalam memproduksi hasil hutan, masyarakat sekitar diikutsertakan pada kegiatan tersebut. Namun kegiatan tersebut harus dihentikan karena tingginya tingkat ketergantungan masyarakat dalam memanfaatkan hasil hutan. Kemudian kawasan hutan produksi tersebut diubah statusnya menjadi kawasan konservasi taman nasional.
                Dengan adanya objek wisata curug cipeuteuy dapat dijadikan sebagai salah satu alternatif untuk dijadikan sumber penghasilan masyarakat sekitar.
            </p>

        </div>
    </div>

    <!-- footer -->
    <footer class="bg-dark text-light pb-2">
        <div class="container">
            <div class="row">
                <div class="text-center pt-2">
                    <p class="mb-0">copyright &copy; 2024 Objek Wisata Curug Cipeuteuy.</p>
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