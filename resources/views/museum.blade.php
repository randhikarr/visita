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
    
    <style>
        /* CSS untuk memastikan Pagination berada di bawah dan rapi */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap; /* Memaksa satu baris */
            margin: 40px 0 60px 0; /* Memberi jarak bawah agar tidak menempel footer */
            gap: 15px;
            width: 100%;
        }
        
        .pagination-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #ffae00 0%, #ffecae 100%);
            color: white !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        
        .pagination-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgb(255, 232, 138);
        }
        
        .pagination-btn:disabled {
            background: #e0e0e0;
            color: #a0a0a0 !important;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .page-numbers {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        
        .page-number {
            min-width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: white;
            color: #ffb300;
            border: 2px solid #ffc400;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .page-number.active {
            background: linear-gradient(135deg, #ffd000 0%, #ffe571 100%);
            color: white;
            border-color: transparent;
        }

        .pagination-info {
            font-weight: 600;
            color: #ffffff;
            font-size: 14px;
            padding: 0 10px;
        }

        /* Merapikan Search Box agar di tengah */
        .search_form_wrapper {
            max-width: 700px;
            margin: 0 auto 40px auto;
        }
    </style>
</head>
<body>
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
                </div>
            </nav>
        </div>
    </div>

    <div class="market_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="market_taital">Daftar Museum di Bandung</h1>
                </div>
            </div>

            <div class="search_form_wrapper">
                <form class="search_input_group" onsubmit="searchMuseum(event)"> 
                    <input type="text" id="searchInput" class="search_text_lokasi" placeholder="Cari museum..." name="search">
                    <button type="submit" class="search_bt_lokasi">Cari</button>
                </form>
            </div>

            <div id="loading" class="text-center py-5" style="display: none;">
                <div class="spinner-border text-primary" role="status"></div>
                <p class="mt-3">Memuat data museum...</p>
            </div>

            <div id="error-message" class="alert alert-danger" style="display: none;"></div>

            <div id="museums-container"></div>

            <div id="pagination-container" class="pagination-container"></div>
        </div>
    </div>

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

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        const API_URL = 'http://localhost:8000/api/museums';
        let allMuseums = [];
        let filteredMuseums = [];
        let currentPage = 1;
        const itemsPerPage = 6;

        document.addEventListener('DOMContentLoaded', loadMuseums);

        async function loadMuseums() {
            const loading = document.getElementById('loading');
            const errorMessage = document.getElementById('error-message');
            loading.style.display = 'block';

            try {
                const response = await fetch(API_URL);
                const result = await response.json();

                if (result.status === 'success' && result.data.length > 0) {
                    allMuseums = result.data;
                    filteredMuseums = allMuseums;
                    displayMuseums();
                } else {
                    document.getElementById('museums-container').innerHTML = '<p class="text-center">Museum tidak ditemukan.</p>';
                }
            } catch (error) {
                errorMessage.textContent = 'Gagal memuat data API.';
                errorMessage.style.display = 'block';
            } finally {
                loading.style.display = 'none';
            }
        }

        function displayMuseums() {
            const container = document.getElementById('museums-container');
            const totalPages = Math.ceil(filteredMuseums.length / itemsPerPage);
            const startIndex = (currentPage - 1) * itemsPerPage;
            const museumsToDisplay = filteredMuseums.slice(startIndex, startIndex + itemsPerPage);

            let html = '';
            museumsToDisplay.forEach((museum, index) => {
                html += `
                    <div class="market_section_${index + 2} mb-5">
                        <div class="reservasi-flex">
                            <div class="reservasi-image">
                                <img src="${museum.foto_url || '{{ asset('images/greyart.jpeg') }}'}" 
                                     style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px;"
                                     onerror="this.src='{{ asset('images/greyart.jpeg') }}'">
                            </div>
                            <div class="reservasi-text">
                                <h3 style="color: #333; font-weight: 700; margin-bottom:15px;">${museum.nama_museum}</h3>
                                <p style="color: #555; line-height: 1.6;">${museum.deskripsi || 'Deskripsi belum tersedia.'}</p>
                                <p style="margin-top:10px;"><strong><i class="fa fa-map-marker"></i> Alamat:</strong> ${museum.alamat || '-'}</p>
                                <p><strong><i class="fa fa-clock-o"></i> Jam Operasional:</strong> ${museum.jam_operasional || '-'}</p>
                                <p><strong><i class="fa fa-ticket"></i> Harga Tiket:</strong> ${museum.harga_tiket || '-'}</p>
                            </div>
                        </div>
                        <div class="seemore_bt_reservasi">
                            <a href="#" onclick="openGoogleMaps(${museum.latitude}, ${museum.longitude}); return false;">
                                <i class="fa fa-location-arrow"></i> Petunjuk Lokasi
                            </a>
                        </div>
                    </div>
                `;
            });
            container.innerHTML = html;
            displayPagination(totalPages);
        }

        function displayPagination(totalPages) {
            const paginationContainer = document.getElementById('pagination-container');
            if (totalPages <= 1) {
                paginationContainer.style.display = 'none';
                return;
            }
            paginationContainer.style.display = 'flex';

            let html = `
                <button class="pagination-btn" onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>
                    <i class="fa fa-chevron-left"></i> Sebelumnya
                </button>
                <div class="page-numbers">
            `;

            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    html += `<div class="page-number ${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">${i}</div>`;
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    html += '<span style="color:#764ba2">...</span>';
                }
            }

            html += `
                </div>
                <div class="pagination-info"> Hal. ${currentPage} / ${totalPages} </div>
                <button class="pagination-btn" onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>
                    Berikutnya <i class="fa fa-chevron-right"></i>
                </button>
            `;
            paginationContainer.innerHTML = html;
        }

        function changePage(page) {
            currentPage = page;
            displayMuseums();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function searchMuseum(event) {
            event.preventDefault();
            const term = document.getElementById('searchInput').value.toLowerCase().trim();
            filteredMuseums = allMuseums.filter(m => m.nama_museum.toLowerCase().includes(term));
            currentPage = 1;
            displayMuseums();
        }

        function openGoogleMaps(lat, lng) {
            const url = `https://www.google.com/maps?q=${lat},${lng}`;
            window.location.href = url; // Terbuka di tab yang sama
        }
    </script>
</body>
</html>