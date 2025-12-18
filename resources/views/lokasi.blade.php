<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Lokasi Museum - Visita</title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <style>
        #map {
            width: 100%;
            height: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .museum-list {
            margin-top: 30px;
        }
        .museum-item {
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }
        .museum-item:hover {
            background-color: #f8f9fa;
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .museum-item h5 {
            color: #333;
            font-size: 18px;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .museum-item p {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .museum-item i {
            margin-right: 5px;
            color: #667eea;
        }
    </style>
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
    
    <!-- Main Content -->
    <div class="banner_taital_main">
        <div class="container">
            <h2 class="banner_taital_2">Peta Lokasi Museum di Bandung</h2>
            
            <!-- Search Form -->
            <div class="search_form_wrapper">
                <form class="search_input_group" onsubmit="searchMuseum(event)"> 
                    <input type="text" id="searchInput" class="search_text_lokasi" placeholder="Cari museum..." name="search">
                    <button type="submit" class="search_bt_lokasi">Cari</button>
                </form>
            </div>
            
            <!-- Map -->
            <div class="map_main_lokasi mt-4">
                <div id="map"></div>
            </div>

            <!-- Museum List -->
            <div class="museum-list">
                <h3>Daftar Museum</h3>
                <div id="museum-list-container">
                    <p class="text-center">Memuat data museum...</p>
                </div>
            </div>
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
    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        const API_URL = 'http://localhost:8000/api/museums';
        let map;
        let markers = [];
        let museums = [];

        // Initialize Map
        function initMap() {
            // Center: Bandung
            map = L.map('map').setView([-6.9175, 107.6191], 13);

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            // Load museums
            loadMuseums();
        }

        // Load Museums from API
        async function loadMuseums() {
            try {
                const response = await fetch(API_URL);
                const result = await response.json();

                if (result.status === 'success' && result.data.length > 0) {
                    museums = result.data;
                    displayMarkersOnMap(museums);
                    displayMuseumList(museums);
                } else {
                    document.getElementById('museum-list-container').innerHTML = 
                        '<p class="text-center">Tidak ada museum tersedia.</p>';
                }
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('museum-list-container').innerHTML = 
                    '<p class="text-center text-danger">Gagal memuat data. Pastikan server Laravel running.</p>';
            }
        }

        // Display Markers on Map
        function displayMarkersOnMap(museumData) {
            // Clear existing markers
            markers.forEach(marker => map.removeLayer(marker));
            markers = [];

            const bounds = [];

            museumData.forEach((museum, index) => {
                const lat = parseFloat(museum.latitude);
                const lng = parseFloat(museum.longitude);
                const position = [lat, lng];

                // Create custom icon
                const icon = L.divIcon({
                    className: 'custom-marker',
                    html: `<div style="background: #667eea; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; border: 3px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.3);">${index + 1}</div>`,
                    iconSize: [30, 30]
                });

                // Create marker
                const marker = L.marker(position, { icon: icon }).addTo(map);

                // Popup content
                const popupContent = `
                    <div style="padding: 10px; min-width: 250px;">
                        <h5 style="margin: 0 0 10px 0; color: #333; font-size: 16px;">${museum.nama_museum}</h5>
                        <p style="margin: 5px 0; font-size: 13px;"><strong>📍 Alamat:</strong><br>${museum.alamat || 'Tidak tersedia'}</p>
                        <p style="margin: 5px 0; font-size: 13px;"><strong>🕐 Jam:</strong><br>${museum.jam_operasional || 'Tidak tersedia'}</p>
                        <p style="margin: 5px 0; font-size: 13px;"><strong>🎫 Tiket:</strong> ${museum.harga_tiket || 'Tidak tersedia'}</p>
                        <a href="{{ route('museum') }}" style="color: #667eea; text-decoration: none; font-weight: 600; font-size: 13px;">Lihat Detail →</a>
                    </div>
                `;

                marker.bindPopup(popupContent);

                // Store marker and add to bounds
                markers.push(marker);
                bounds.push(position);
            });

            // Fit map to show all markers
            if (bounds.length > 0) {
                map.fitBounds(bounds, { padding: [50, 50] });
            }
        }

        // Display Museum List
        function displayMuseumList(museumData) {
            const container = document.getElementById('museum-list-container');
            let html = '';

            museumData.forEach((museum, index) => {
                html += `
                    <div class="museum-item" onclick="focusMuseum(${index})">
                        <h5>${index + 1}. ${museum.nama_museum}</h5>
                        <p><i class="fa fa-map-marker"></i> ${museum.alamat || 'Alamat tidak tersedia'}</p>
                        <p><i class="fa fa-clock-o"></i> ${museum.jam_operasional || 'Jam tidak tersedia'}</p>
                        <p><i class="fa fa-ticket"></i> ${museum.harga_tiket || 'Harga tidak tersedia'}</p>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        // Focus on Museum
        function focusMuseum(index) {
            const museum = museums[index];
            const lat = parseFloat(museum.latitude);
            const lng = parseFloat(museum.longitude);
            
            map.setView([lat, lng], 16);
            markers[index].openPopup();

            // Smooth scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Search Museum
        function searchMuseum(event) {
            event.preventDefault();
            const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();

            if (!searchTerm) {
                displayMarkersOnMap(museums);
                displayMuseumList(museums);
                return;
            }

            const filtered = museums.filter(museum => 
                museum.nama_museum.toLowerCase().includes(searchTerm) ||
                (museum.alamat && museum.alamat.toLowerCase().includes(searchTerm))
            );

            displayMarkersOnMap(filtered);
            displayMuseumList(filtered);

            if (filtered.length === 0) {
                document.getElementById('museum-list-container').innerHTML = 
                    '<p class="text-center">Tidak ada museum yang cocok dengan pencarian.</p>';
            }
        }

        // Initialize map when page loads
        document.addEventListener('DOMContentLoaded', initMap);
    </script>
</body>
</html>