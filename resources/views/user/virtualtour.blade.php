<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Tour Curug Cipeuteuy</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/105/three.js"></script>
    <script src="{{ asset('assets/js/panolens.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* html,
        body {
            margin: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: #000;
        } */

        #panorama {
            width: 100%;
            height: 100vh;
            position: relative;
            /* position: fixed;
            top: 0;
            left: 0; */
        }

        .custom-infospot {
            width: 10%;
            background: white;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            text-indent: 20px;
        }


        #sidebar {
            position: fixed;
            top: 0;
            left: -300px;
            /* Sidebar hidden by default */
            width: 300px;
            height: 100%;
            background-color: #f8f9fa;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            transition: all 0.3s ease;
            /* Smooth slide-in/out animation */
            z-index: 1000;
        }

        #sidebar.active {
            left: 0;
            /* Show sidebar */
        }

        #main-content {
            margin-top: 10px;
            margin-left: 0;
            transition: all 0.3s ease;
        }

        /* 
        #main-content.with-sidebar {
            margin-left: 300px;
            /* Adjust main content when sidebar is visible */
        /* } */

        .toggle-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
        }

        .card img {
            max-height: 150px;
            object-fit: cover;
        }

        .clickable-point {
            width: 15px;
            height: 15px;
            background-color: red;
            border-radius: 50%;
            position: absolute;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .clickable-point:hover {
            transform: scale(1.2);
        }
    </style>
</head>

<body>

    <!-- Toggle Button -->
    <button class="btn btn-primary toggle-btn" data-bs-toggle="modal" data-bs-target="#imageModal">
        ☰ Menu
    </button>

    <!-- Sidebar -->
    <!-- <div id="sidebar">
        
    </div> -->

    <!-- Modal (Popup) -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Peta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{asset('assets/img/mapping.jpeg')}}" alt="Guide Map" class="img-fluid">
                    <!-- Titik klik -->
                    <!-- spot foto atas 1 -->
                    <div class="clickable-point" style="top: 540px; right: 185px;" onclick="navigateTo(153)"></div>
                    <!-- spot foto atas 2 -->
                    <div class="clickable-point" style="top: 510px; right: 150px;" onclick="navigateTo(157)"></div>
                    <!-- spot foto atas 3 -->
                    <div class="clickable-point" style="top: 520px; right: 85px;" onclick="navigateTo(176)"></div>
                    <!-- air terjun -->
                    <div class="clickable-point" style="top: 545px; left: 537px;" onclick="navigateTo(138)"></div>
                    <!-- kolam -->
                    <div class="clickable-point" style="top: 588px; left: 470px;" onclick="navigateTo(132)"></div>
                    <!-- camping -->
                    <div class="clickable-point" style="bottom: 210px; right: 230px;" onclick="navigateTo(190)"></div>
                    <!-- area pentas -->
                    <div class="clickable-point" style="bottom: 90px; left: 470px;" onclick="navigateTo(201)"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function navigateTo(id) {
            window.location.href = '/virtualtour?id=' + id;
        }
    </script>

    <div id="main-content">

        <div id="panorama"></div>

        @foreach ($dataAudio as $data)
        <audio id="myAudio" src="{{asset('storage/audio/'. $data->audio)}}" loop autoplay></audio>
        @endforeach

        <div id="data-container" data-items='@json($koordinat)'></div>

        <script>
            let container = document.getElementById('data-container');
            const items = JSON.parse(container.getAttribute('data-items'));
            let audios = document.getElementById("myAudio");
            const image = "{{ asset('storage/images/'. $panorama->gambar) }}";

            // Membuat panorama objects
            const panorama = new PANOLENS.ImagePanorama(image);

            // Membuat viewer
            const PanoImage = document.querySelector('#panorama');
            const viewer = new PANOLENS.Viewer({
                container: PanoImage,
                controlBar: true,
                output: 'overlay',

            });
            viewer.add(panorama);

            items.forEach(function(item) {
                var icon = item.tipe == 'Info' ? PANOLENS.DataImage.Info : PANOLENS.DataImage.Arrow;
                infospot = new PANOLENS.Infospot(500, icon);
                infospot.position.set(parseFloat(item.koordinat_x), parseFloat(item.koordinat_y), parseFloat(item.koordinat_z));

                if (item.tipe == "Link") {
                    infospot.addEventListener('click', () => {
                        window.location.href = "/virtualtour?id=" + item.target;
                    });

                } else {
                    infospot.addHoverElement(createCustomTooltip(item.keterangan));
                }
                panorama.add(infospot);
            });
            viewer.setPanorama(panorama)

            // Atur default rotasi (arah pandangan awal)
            panorama.addEventListener('load', () => {
                // Atur posisi kamera dengan Three.js
                viewer.camera.position.set(4952.99, -583.83, -170.41); // Ganti nilai sesuai kebutuhan
                viewer.camera.lookAt(panorama.position); // Pastikan kamera mengarah ke panorama
            });

            // Fungsi untuk membuat tooltip kustom
            function createCustomTooltip(text) {
                const element = document.createElement('div');
                element.classList.add('custom-infospot');
                element.innerHTML = `<p>${text}</p>`;
                return element;
            }



            // const sidebar = document.getElementById('sidebar');
            // const mainContent = document.getElementById('main-content');
            // const toggleSidebar = document.getElementById('toggle-btn');



            // toggleSidebar.addEventListener('click', () => {
            //     sidebar.classList.toggle('active');
            //     mainContent.classList.toggle('with-sidebar');
            // });
        </script>
    </div>

</body>

</html>