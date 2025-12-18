<?php
// ============================================
// FILE 2: resources/views/museum.blade.php
// ============================================
// Copy code di bawah ini ke file museum.blade.php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Museum - Visita</title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>
<body>
    <!-- Header -->
    <div class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ route('beranda') }}">
                    <img src="{{ asset('images/visita2.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('museum') }}">Museum</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('lokasi') }}">Lokasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tiket.saya') }}">Tiket Saya</a></li>
                    </ul>
                    <a href="{{ route('login') }}" class="btn btn-brand ms-lg-3">LOG IN</a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Museum List Section -->
    <div class="market_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="market_taital">Daftar Museum di Bandung</h1>
                </div>
            </div>

            <!-- Search Box -->
            <div class="search_form_wrapper mb-4">
                <form class="search_input_group" onsubmit="searchMuseum(event)"> 
                    <input type="text" id="searchInput" class="search_text_lokasi" placeholder="Cari museum..." name="search">
                    <button type="submit" class="search_bt_lokasi">Cari</button>
                </form>
            </div>

            <!-- Loading State -->
            <div id="loading" class="text-center py-5" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p class="mt-3">Memuat data museum...</p>
            </div>

            <!-- Error State -->
            <div id="error-message" class="alert alert-danger" style="display: none;"></div>

            <!-- Museum List Container -->
            <div id="museums-container"></div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer_section layout_padding margin_top90">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="location_text">
                        <ul>
                            <li><a href="#"><span class="padding_left_10"><i class="fa fa-map-marker"></i></span>Jalan kemana aja asal sama kamu</a></li>
                            <li><a href="#"><span class="padding_left_10"><i class="fa fa-phone"></i></span>(+62) 1234567890</a></li>
                            <li><a href="#"><span class="padding_left_10"><i class="fa fa-envelope"></i></span>visita@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="newslatter_main">
                        <h1 class="useful_text">Follow Us</h1>
                        <div class="footer_social_icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">2025 Visita. All Rights Reserved.</p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        const API_URL = 'http://localhost:8000/api/museums';
        let allMuseums = [];

        // Load museums saat halaman dimuat
        document.addEventListener('DOMContentLoaded', loadMuseums);

        async function loadMuseums() {
            const loading = document.getElementById('loading');
            const errorMessage = document.getElementById('error-message');
            const container = document.getElementById('museums-container');

            loading.style.display = 'block';
            errorMessage.style.display = 'none';
            container.innerHTML = '';

            try {
                const response = await fetch(API_URL);
                const result = await response.json();

                if (result.status === 'success' && result.data.length > 0) {
                    allMuseums = result.data;
                    displayMuseums(allMuseums);
                } else {
                    container.innerHTML = '<p class="text-center">Tidak ada museum tersedia.</p>';
                }
            } catch (error) {
                console.error('Error:', error);
                errorMessage.textContent = 'Gagal memuat data museum. Pastikan server Laravel berjalan di http://localhost:8000';
                errorMessage.style.display = 'block';
            } finally {
                loading.style.display = 'none';
            }
        }

        function displayMuseums(museums) {
            const container = document.getElementById('museums-container');
            let html = '';

            museums.forEach((museum, index) => {
                html += `
                    <div class="market_section_${index + 2} mb-4">
                        <div class="reservasi-flex">
                            <div class="reservasi-image">
                                <img src="${museum.foto_url || '{{ asset('images/greyart.jpeg') }}'}" 
                                     alt="${museum.nama_museum}"
                                     style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;"
                                     onerror="this.src='{{ asset('images/greyart.jpeg') }}'">
                            </div>
                            <div class="reservasi-text">
                                <h3 style="color: #333; font-weight: 600; margin-bottom: 15px;">${museum.nama_museum}</h3>
                                <p style="margin-bottom: 10px; color: #666;">${museum.deskripsi || 'Deskripsi tidak tersedia.'}</p>
                                <p style="margin-bottom: 5px;"><strong><i class="fa fa-map-marker"></i> Alamat:</strong> ${museum.alamat || 'Tidak tersedia'}</p>
                                <p style="margin-bottom: 5px;"><strong><i class="fa fa-clock-o"></i> Jam Operasional:</strong> ${museum.jam_operasional || 'Tidak tersedia'}</p>
                                <p style="margin-bottom: 5px;"><strong><i class="fa fa-ticket"></i> Harga Tiket:</strong> ${museum.harga_tiket || 'Tidak tersedia'}</p>
                                <p style="margin-bottom: 5px;"><strong><i class="fa fa-location-arrow"></i> Koordinat:</strong> ${museum.latitude}, ${museum.longitude}</p>
                            </div>
                        </div>
                        <div class="seemore_bt_reservasi">
                            <a href="#" onclick="bookTicket(${museum.id}, '${museum.nama_museum}'); return false;">Pesan Sekarang</a>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        function bookTicket(museumId, museumName) {
            alert(`Fitur pemesanan tiket untuk ${museumName} akan segera hadir!\n\nID Museum: ${museumId}`);
            // Nanti bisa redirect ke halaman reservasi
            // window.location.href = '{{ route("reservasi") }}?museum=' + museumId;
        }

        function searchMuseum(event) {
            event.preventDefault();
            const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();

            if (!searchTerm) {
                displayMuseums(allMuseums);
                return;
            }

            const filtered = allMuseums.filter(museum => 
                museum.nama_museum.toLowerCase().includes(searchTerm) ||
                (museum.alamat && museum.alamat.toLowerCase().includes(searchTerm)) ||
                (museum.deskripsi && museum.deskripsi.toLowerCase().includes(searchTerm))
            );

            if (filtered.length > 0) {
                displayMuseums(filtered);
            } else {
                document.getElementById('museums-container').innerHTML = 
                    '<p class="text-center">Tidak ada museum yang cocok dengan pencarian "' + searchTerm + '"</p>';
            }
        }
    </script>
</body>
</html>