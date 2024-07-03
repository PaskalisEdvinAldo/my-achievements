@extends('layouts.main')

@section('title', 'MyAchievements | Events')

@section('lombacontainer')

<link rel="stylesheet" href="{{ asset('css/fullscreenimage.css') }}">
        <!-- Section-->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Competition Lists</h1>
                <a href="{{ route('events.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="bi bi-plus-square text-white-600"></i> Register Event</a>
            </div>
            <div class="container-fluid px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="fullscreenable card-img-top" src="img/Ramadhan.png" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">LOMBA POSTER DIGITAL</h5>
                                    Registration : 15 - 27 Maret 2024 <br>
                                    Start Date : 28 - 29 Maret 2024 <br>
                                    Announcement : 30 Maret 2024
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Offline</div>
                            <img class="fullscreenable card-img-top" src="img/Ilmiah.jpg" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">LOMBA KARYA ILMIAH NASIONAL</h5>
                                    Registration : 05 Februari - 20 Maret 2024 <br>
                                    Start Date : 30 April 2024 <br>
                                    Announcement : 27 Mei 2024
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Online</div>
                            <img class="fullscreenable card-img-top" src="img/OBSI.jpg" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">OLIMPIADE BAHASA DAN SAINS SE-INDONESIA</h5>
                                    Registration : 22 Februari - 20 April 2024 <br>
                                    Start Date : 21 April 2024 <br>
                                    Announcement : 23 April 2024
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="fullscreenable card-img-top" src="img/Matematika.png" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">OLIMPIADE MATEMATIKA SE-JAWA TIMUR TERBUKA 2023</h5>
                                    Start Date : 27 Agustus 2023 <br>
                                    Semifinal & Final Date: 28 Oktober 2023
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    const fullscreenableImages = document.querySelectorAll('.fullscreenable');

    // Tambahkan event listener untuk setiap gambar
    fullscreenableImages.forEach(img => {
        img.addEventListener('click', () => {
            // Buat elemen div untuk latar belakang hitam semi-transparan
            const fullscreenContainer = document.createElement('div');
            fullscreenContainer.classList.add('fullscreen-image');

            // Buat elemen gambar untuk ditampilkan dalam mode fullscreen
            const fullscreenImg = document.createElement('img');
            fullscreenImg.src = img.src;

            // Tambahkan elemen gambar ke dalam elemen kontainer fullscreen
            fullscreenContainer.appendChild(fullscreenImg);

            // Tambahkan elemen kontainer fullscreen ke dalam body dokumen
            document.body.appendChild(fullscreenContainer);

            // Hilangkan elemen fullscreen ketika gambar fullscreen diklik
            fullscreenContainer.addEventListener('click', () => {
                fullscreenContainer.remove();
            });
        });
    });
</script>
@endsection