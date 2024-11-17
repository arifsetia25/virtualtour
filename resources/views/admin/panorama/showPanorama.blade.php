@extends('template.template')
<style>
    #panorama {
        width: 100%;
        height: 80vh;
        margin: 0;
        padding: 0;
    }
</style>
@section('content')
<div class="container">
    <div class="page-inner">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('panorama') }}">Panorama</a></li>
                <li class="breadcrumb-item active" aria-current="page">addSpot</li>
            </ol>
        </div>
        <div id="panorama"></div>

        <!-- <script>
            const panorama = new PANOLENS.Viewer({
                container: document.getElementById('panorama'),
            });

            const panoramaData = {
                type: 'equirectangular',
                url: "{{ asset('storage/images/'. $panorama->gambar) }}",
            };

            panorama.add(panoramaData);
        </script> -->
        <!-- Menampilkan Gambar dengan Panorama Viewer -->
        <!-- <img src="{{ asset('storage/images/'. $panorama->gambar) }}" alt="" srcset=""> -->
        <div id="data-container" data-items='@json($koordinat)'></div>

        <script>
            let container = document.getElementById('data-container');
            const items = JSON.parse(container.getAttribute('data-items'));

            const image = "{{ asset('storage/images/'. $panorama->gambar) }}";
            // Membuat panorama objects
            const panorama = new PANOLENS.ImagePanorama(image);
            // const panorama2 = new PANOLENS.ImagePanorama();


            // Membuat viewer
            const PanoImage = document.querySelector('#panorama');
            const viewer = new PANOLENS.Viewer({
                container: PanoImage,
                controlBar: true,
            });
            viewer.add(panorama);
            // viewer.add(panorama, panorama2);
            // panorama.link(panorama2, new THREE.Vector3(2000, 0, 0));

            var panoramaLinkList = [];
            items.forEach(function(item) {
                if (item.target_gambar) {
                    let imageLink = "{{ asset('storage/images/') }}" + item.target_gambar;
                    const panoramaLink = new PANOLENS.ImagePanorama(imageLink);
                    panoramaLinkList[item.id] = panoramaLink;
                    viewer.add(panoramaLink);
                }
            })

            //const panorama2 = new PANOLENS.ImagePanorama(pano2);
            //const panorama3 = new PANOLENS.ImagePanorama(pano3);

            // var InfospotPositions = [
            //     new THREE.Vector3(-2136.66, 16.30, 890.14),
            //     new THREE.Vector3(-3000.32, 19.90, -400.88),
            //     new THREE.Vector3(-3136.66, 296.38, -298.74),
            //     new THREE.Vector3(-5002.55, 150.32, 690.15),
            // ];

            // var Position = [
            //     new THREE.Vector3(-2000.32, 108.37, 590.42),
            // ];

            // const infospot = new PANOLENS.Infospot(-2000.32, PANOLENS.DataImage.Info);
            // infospot.position.copy(Position);
            // infospot.addHoverText('Ini adalah panorama');
            // infospot.addEventListener('click', onfocus);
            // panorama.add(infospot);


            items.forEach(function(item) {
                if (item.tipe == 'Info') {
                    infospot = new PANOLENS.Infospot(300, PANOLENS.DataImage.Info);
                    infospot.position.set(parseFloat(item.koordinat_x), parseFloat(item.koordinat_y), parseFloat(item.koordinat_z));
                    infospot.addHoverText(item.keterangan);
                    panorama.add(infospot);
                } else {
                    panorama.link(panoramaLinkList[item.id], new THREE.Vector3(
                        parseFloat(item.koordinat_x),
                        parseFloat(item.koordinat_y),
                        parseFloat(item.koordinat_z)
                    ));

                    // const infospot1 = new PANOLENS.Infospot(300, PANOLENS.DataImage.Info);
                    // infospot.addHoverText('Pergi ke pemandangan selanjutnya!');
                    // infospot.addEventListener('click', function() {
                    //     viewer.setPanorama(panoramaList[item.id]); // Ganti panorama ke panorama2 saat diklik
                    // });
                    // panorama.add(infospot);
                }


                // Get Google Map API Key - https://developers.google.com/maps/documentation/javascript/get-api-key


            });
            viewer.setPanorama(panorama);

            const raycaster = new THREE.Raycaster();
            const mouse = new THREE.Vector2();

            panorama.addEventListener('click', (event) => {
                // Calculate mouse position in normalized device coordinates (-1 to +1)
                // mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
                // mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

                // Update the raycaster with the camera and mouse position
                // raycaster.setFromCamera(mouse, viewer.camera);

                // Calculate intersections
                // const intersects = raycaster.intersectObject(panorama, true);

                const intersects = event.intersects;

                if (intersects.length > 0) {
                    const intersect = intersects[0];
                    navigator.clipboard.writeText(intersect.point.x + ", " + intersect.point.y + ", " + intersect.point.z);
                }
            });
        </script>


        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
        @endif
        <br>
        <h5>Silahkan Klik Pada Gambar untuk Mendapatkan Titik Koordinat</h5>
        <!-- form input hotspot/infospot -->
        <div class="card" style="width: 100%;">
            <div class="d-flex flex-row mb-3 justify-content-between" style="margin: 20px;">
                <h5 class="card-header p-2">Tambah Infospot/Hotspot</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('store.hotspot', $panorama->id) }}" method="POST" enctype="multipart/form-data" id="dynamicForm">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputtext" class="col-sm-2 col-form-label">Input X, Y, Z</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputtext" name="koordinat">
                        </div>
                        @error('koordinat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="dropdown" class="col-sm-2 col-form-label">Pilih tipe</label>
                        <div class="col-sm-3">
                            <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="tipe" id="tipe" onchange="handleDropdownChange(this.value)">
                                <option selected> -- Pilih Tipe --</option>
                                @foreach ($options_tipe as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tipe')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <script>
                        function handleDropdownChange(value) {
                            let keterangan = document.getElementById('keterangan');
                            if (value == 'Info') {
                                keterangan.style.display = 'block';
                                link_target.style.display = 'none';
                            } else if (value == 'Link') {
                                keterangan.style.display = 'none';
                                link_target.style.display = 'block';
                            } else {
                                keterangan.style.display = 'block';
                                link_target.style.display = 'none';
                            }
                        }
                    </script>
                    <div id="keterangan" class="row mb-3">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keterangan">
                        </div>
                        @error('keterangan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div id="link_target" class="row mb-3" style="display: none;">
                        <label for="dropdown" class="col-sm-2 col-form-label">Pilih Link Target</label>
                        <div class="col-sm-10">
                            <select name="target" id="dropdown" class="col-sm-2 col-form-label">
                                @foreach ($target as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('link_target')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection