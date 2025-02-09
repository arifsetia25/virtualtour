@extends("template.template")
@section("content")

<style>
    /* html,
        body {
            margin: 0;
            width: 100%;
            height: 100%;

        } */

    #panorama {
        width: 100%;
        height: 100vh;
        position: relative;
        /* position: fixed;
            top: 0;
            left: 0; */
    }
</style>

<div id="panorama"></div>

<div id="data-container" data-items='@json($koordinat)'></div>

<script>
    document.getElementById('toggleSidebar').click();
    let container = document.getElementById('data-container');
    const items = JSON.parse(container.getAttribute('data-items'));

    const image = "{{ asset('storage/images/'. $panorama->gambar) }}";

    // Membuat panorama objects
    const panorama = new PANOLENS.ImagePanorama(image);


    // Membuat viewer
    const PanoImage = document.querySelector('#panorama');
    const viewer = new PANOLENS.Viewer({
        container: PanoImage,
        controlBar: true,
        output: 'overlay'
    });
    viewer.add(panorama);


    // const raycaster = new THREE.Raycaster();
    // // Event listener untuk klik
    // panorama.addEventListener('click', function(event) {
    //     const intersects = viewer.raycaster.intersectObject(panorama, true);
    //     if (intersects.length > 0) {
    //         // const position = intersects[0].point; // Mendapatkan koordinat x, y, z
    //         // const koordinat_x = position.koordinat_x;
    //         // const koordinat_y = position.koordinat_y;
    //         // const koordinat_z = position.koordinat_z;

    //         // // Format koordinat menjadi satu baris
    //         // const coordinates = "${koordinat_x}, ${koordinat_y}, ${koordinat_z}";

    //         // // Menampilkan koordinat di input
    //         // document.getElementById('koordinat').value = coordinates;

    //         // console.log(`Koordinat berhasil diambil: ${coordinates}`);
    //     }
    // });

    items.forEach(function(item) {
        var icon = item.tipe == 'Info' ? PANOLENS.DataImage.Info : PANOLENS.DataImage.Arrow;
        infospot = new PANOLENS.Infospot(300, icon);
        infospot.position.set(parseFloat(item.koordinat_x), parseFloat(item.koordinat_y), parseFloat(item.koordinat_z));
        infospot.addHoverText(item.keterangan);

        panorama.add(infospot);
    });
    viewer.setPanorama(panorama);

    // Atur default rotasi (arah pandangan awal)
    panorama.addEventListener('load', () => {
        // Atur posisi kamera dengan Three.js
        viewer.camera.position.set(4952.99, -583.83, -170.41); // Ganti nilai sesuai kebutuhan
        viewer.camera.lookAt(panorama.position);
    });

    // const raycaster = new THREE.Raycaster();
    // const mouse = new THREE.Vector2();

    // viewer.container.addEventListener('click', (event) => {
    //     // Calculate mouse position in normalized device coordinates (-1 to +1)
    //     mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    //     mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

    //     // Update the raycaster with the camera and mouse position
    //     raycaster.setFromCamera(mouse, viewer.camera);

    //     // Calculate intersections
    //     const intersects = raycaster.intersectObject(panorama, true);

    //     if (intersects.length > 0) {
    //         const intersect = intersects[0];
    //         console.log('Click position in 3D space:', intersect.point);
    //     }
    // });
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

<h5>Silahkan Hover Pada Gambar untuk Mendapatkan Titik Koordinat</h5>
<!-- form input hotspot/infospot -->
<div class="card shadow " style="width: 100%; margin-bottom: 10px;">
    <div class="d-flex flex-row mb-3 justify-content-between" style="margin: 20px;">
        <h5 class="card-header p-2">Tambah Infospot/Hotspot</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('store.hotspot', $panorama->id) }}" method="POST" enctype="multipart/form-data" id="dynamicForm">
            @csrf
            <div class="row mb-3">
                <label for="inputtext" class="col-sm-2 col-form-label">Input X, Y, Z</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputtext" name="koordinat" id="koordinat">
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
                    <textarea class="form-control" name="keterangan" placeholder="Masukan Keterangan" id="floatingTextarea2" style="height: 100px"></textarea>
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
@endsection