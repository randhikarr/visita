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
            position: relative;
        }
        
        /* Locate Me Button */
        .locate-me-btn {
            position: absolute;
            top: 80px;
            right: 10px;
            z-index: 1000;
            background: white;
            border: 2px solid #667eea;
            border-radius: 10px;
            padding: 12px 20px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            font-weight: 600;
            color: #667eea;
            transition: all 0.3s;
        }
        
        .locate-me-btn:hover {
            background: #667eea;
            color: white;
            transform: scale(1.05);
        }
        
        .locate-me-btn i {
            margin-right: 5px;
        }
        
        /* User Location Marker Style */
        .user-marker {
            width: 40px !important;
            height: 40px !important;
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
                <div id="map">
                    <!-- Locate Me Button -->
                    <button class="locate-me-btn" onclick="getUserLocation()" title="Tampilkan lokasi saya">
                        <i class="fa fa-crosshairs"></i> Lokasi Saya
                    </button>
                </div>
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
        let userMarker = null;
        let userLocation = null;

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
                        <div style="margin-top: 10px; display: flex; gap: 10px;">
                            <a href="{{ route('museum') }}" style="color: #667eea; text-decoration: none; font-weight: 600; font-size: 13px;">Lihat Detail →</a>
                            <a href="#" onclick="openGoogleMaps(${lat}, ${lng}, '${museum.nama_museum.replace(/'/g, "\\'")}'); return false;" 
                               style="color: #34a853; text-decoration: none; font-weight: 600; font-size: 13px;">
                               <i class="fa fa-map-marker"></i> Petunjuk Arah
                            </a>
                        </div>
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
                        <a href="#" onclick="openGoogleMaps(${museum.latitude}, ${museum.longitude}, '${museum.nama_museum.replace(/'/g, "\\'")}'); return false;" 
                           style="color: #34a853; text-decoration: none; font-weight: 600; font-size: 13px; margin-top: 5px; display: inline-block;">
                           <i class="fa fa-map-marker"></i> Buka di Google Maps
                        </a>
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
        
        // Get User's Current Location
        function getUserLocation() {
            if (!navigator.geolocation) {
                alert('Geolocation tidak didukung oleh browser Anda');
                return;
            }
            
            const btn = document.querySelector('.locate-me-btn');
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mencari...';
            btn.disabled = true;
            
            navigator.geolocation.getCurrentPosition(
                // Success callback
                function(position) {
                    userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    
                    // Remove old user marker if exists
                    if (userMarker) {
                        map.removeLayer(userMarker);
                    }
                    
                    // Create custom user location icon
                    const userIcon = L.divIcon({
                        className: 'user-marker',
                        html: `<div style="background: #4285f4; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; border: 4px solid white; box-shadow: 0 2px 10px rgba(0,0,0,0.3); position: relative;">
                            <i class="fa fa-user"></i>
                            <div style="position: absolute; width: 80px; height: 80px; background: rgba(66, 133, 244, 0.2); border-radius: 50%; animation: pulse 2s infinite;"></div>
                        </div>
                        <style>
                            @keyframes pulse {
                                0% { transform: scale(0.8); opacity: 1; }
                                100% { transform: scale(1.5); opacity: 0; }
                            }
                        </style>`,
                        iconSize: [40, 40]
                    });
                    
                    // Add user marker
                    userMarker = L.marker([userLocation.lat, userLocation.lng], { icon: userIcon }).addTo(map);
                    userMarker.bindPopup(`
                        <div style="text-align: center; padding: 10px;">
                            <strong>📍 Lokasi Anda</strong><br>
                            <small style="color: #666;">Lat: ${userLocation.lat.toFixed(6)}, Lng: ${userLocation.lng.toFixed(6)}</small>
                        </div>
                    `).openPopup();
                    
                    // Center map to user location
                    map.setView([userLocation.lat, userLocation.lng], 15);
                    
                    // Reset button
                    btn.innerHTML = '<i class="fa fa-crosshairs"></i> Lokasi Saya';
                    btn.disabled = false;
                    
                    // Show nearest museums
                    showNearestMuseums();
                },
                // Error callback
                function(error) {
                    btn.innerHTML = '<i class="fa fa-crosshairs"></i> Lokasi Saya';
                    btn.disabled = false;
                    
                    let errorMsg = 'Gagal mendapatkan lokasi';
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            errorMsg = "Izin lokasi ditolak. Silakan izinkan akses lokasi di browser Anda.";
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMsg = "Informasi lokasi tidak tersedia.";
                            break;
                        case error.TIMEOUT:
                            errorMsg = "Request timeout. Coba lagi.";
                            break;
                    }
                    alert(errorMsg);
                }
            );
        }
        
        // Calculate distance between two points (Haversine formula)
        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // Radius bumi dalam km
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a = 
                Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon/2) * Math.sin(dLon/2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            return R * c;
        }
        
        // Show nearest museums from user location
        function showNearestMuseums() {
            if (!userLocation || museums.length === 0) return;
            
            // Calculate distance for each museum
            const museumsWithDistance = museums.map(museum => ({
                ...museum,
                distance: calculateDistance(
                    userLocation.lat, 
                    userLocation.lng, 
                    parseFloat(museum.latitude), 
                    parseFloat(museum.longitude)
                )
            }));
            
            // Sort by distance
            museumsWithDistance.sort((a, b) => a.distance - b.distance);
            
            // Update museum list with distance info
            const container = document.getElementById('museum-list-container');
            let html = '<h4 style="color: #667eea; margin-bottom: 15px;"><i class="fa fa-location-arrow"></i> Museum Terdekat dari Anda:</h4>';
            
            museumsWithDistance.slice(0, 5).forEach((museum, index) => {
                const originalIndex = museums.findIndex(m => m.id === museum.id);
                html += `
                    <div class="museum-item" onclick="focusMuseum(${originalIndex})">
                        <h5>
                            ${index + 1}. ${museum.nama_museum}
                            <span style="background: #667eea; color: white; padding: 3px 10px; border-radius: 15px; font-size: 11px; margin-left: 10px;">
                                ${museum.distance.toFixed(1)} km
                            </span>
                        </h5>
                        <p><i class="fa fa-map-marker"></i> ${museum.alamat || 'Alamat tidak tersedia'}</p>
                        <p><i class="fa fa-clock-o"></i> ${museum.jam_operasional || 'Jam tidak tersedia'}</p>
                        <p><i class="fa fa-ticket"></i> ${museum.harga_tiket || 'Harga tidak tersedia'}</p>
                        <a href="#" onclick="openGoogleMaps(${museum.latitude}, ${museum.longitude}, '${museum.nama_museum.replace(/'/g, "\\'")}'); return false;" 
                           style="color: #34a853; text-decoration: none; font-weight: 600; font-size: 13px; margin-top: 5px; display: inline-block;">
                           <i class="fa fa-map-marker"></i> Petunjuk Arah (${museum.distance.toFixed(1)} km)
                        </a>
                    </div>
                `;
            });
            
            container.innerHTML = html;
        }
        
        // Open Google Maps with directions
        function openGoogleMaps(lat, lng, name) {
            // If user location is available, show directions from user to museum
            if (userLocation) {
                // Google Maps directions URL
                const url = `https://www.google.com/maps/dir/?api=1&origin=${userLocation.lat},${userLocation.lng}&destination=${lat},${lng}&travelmode=driving`;
                window.open(url, '_blank');
            } else {
                // Just open the location on Google Maps
                const url = `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
                window.open(url, '_blank');
            }
        }

        // Initialize map when page loads
        document.addEventListener('DOMContentLoaded', initMap);
    </script>
</body>
</html>
