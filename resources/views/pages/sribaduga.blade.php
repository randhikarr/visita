<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sri Baduga - Visita</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <style>
        :root {
            --visita-orange: #d6642a; /* Oranye sesuai gambar navigasi */
            --visita-beige: #f4f1de;  /* Krem sesuai background peta */
            --visita-text: #3d405b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--visita-beige);
            margin: 0;
            padding: 0;
        }

        /* --- NAVBAR STYLE (Full Oranye) --- */
        .navbar_visita {
            background-color: var(--visita-orange) !important;
            padding: 15px 0;
            border: none;
        }

        .navbar-brand-visita {
            font-size: 40px;
            font-weight: 800;
            color: white !important;
            letter-spacing: -2px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .nav-link-visita {
            color: white !important;
            font-weight: 500;
            text-transform: uppercase;
            margin-right: 20px;
            font-size: 14px;
        }

        /* --- CONTENT STYLE (Wikipedia Style) --- */
        .main-container {
            background-color: white;
            padding: 40px;
            margin-top: 30px;
            margin-bottom: 50px;
            border-radius: 4px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .wiki-title {
            font-family: 'Georgia', serif;
            font-size: 32px;
            border-bottom: 1px solid #a2a9b1;
            margin-bottom: 20px;
            padding-bottom: 5px;
            font-weight: normal;
        }

        /* Infobox Style */
        .infobox {
            background: #f8f9fa;
            border: 1px solid #a2a9b1;
            padding: 5px;
            width: 100%;
            font-size: 0.88rem;
        }

        .infobox-header {
            background: var(--visita-orange);
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            font-size: 1rem;
        }

        .infobox-image-container {
            text-align: center;
            padding: 10px;
            background: white;
        }

        .infobox-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .infobox-table th {
            text-align: left;
            background: #eee;
            width: 40%;
            padding: 8px;
            border: 1px solid #a2a9b1;
            font-weight: 600;
        }

        .infobox-table td {
            padding: 8px;
            border: 1px solid #a2a9b1;
        }

        /* Button Style */
        .btn-ticket {
            background-color: var(--visita-orange);
            color: white !important;
            padding: 12px 30px;
            border-radius: 4px;
            font-weight: bold;
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-ticket:hover {
            opacity: 0.85;
            transform: translateY(-2px);
            text-decoration: none;
        }

        /* Responsive Fix */
        @media (max-width: 768px) {
            .infobox {
                margin-top: 30px;
                float: none;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar_visita">
        <div class="container">
            <a class="navbar-brand-visita" href="{{ route('beranda') }}">VISITA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="fa fa-bars" style="color:white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link nav-link-visita" href="{{ route('beranda') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-visita" href="{{ route('museum') }}">Museum</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-visita" href="{{ route('lokasi') }}">Lokasi</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-visita" href="{{ route('tiket.saya') }}">Tiket Saya</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="main-container">
            <h1 class="wiki-title">Museum Sri Baduga</h1>

            <div class="row">
                <div class="col-md-8">
                    <p>
                        <strong>Museum Sri Baduga</strong> merupakan pusat pelestarian sejarah dan budaya Jawa Barat yang terletak di seberang Lapangan Tegallega, Bandung. Didirikan pada tahun 1974, museum ini menyimpan ribuan koleksi yang menggambarkan perjalanan kehidupan masyarakat Sunda dari masa prasejarah hingga era kolonial.
                    </p>
                    <p>
                        Dengan arsitektur khas rumah panggung Sunda (Suhan Jangkung), museum ini tidak hanya berfungsi sebagai ruang pamer, tetapi juga pusat edukasi dan penelitian. Koleksi unggulannya meliputi berbagai peninggalan arkeologi, etnografi, numismatik, dan seni rupa yang tertata secara kronologis di tiga lantai bangunan.
                    </p>
                    
                    <a href="{{ route('lokasi') }}" class="btn-ticket">Check Lokasi</a>
                </div>

                <div class="col-md-4">
                    <div class="infobox">
                        <div class="infobox-header">Museum Sri Baduga</div>
                        <div class="infobox-image-container">
                            <img src="{{ asset('images/sribaduga.JPG') }}" alt="Sri Baduga" class="img-fluid">
                        </div>
                        <table class="infobox-table">
                            <tr>
                                <th>Alamat</th>
                                <td>Jl. BKR No. 185, Bandung</td>
                            </tr>
                            <tr>
                                <th>Dibuka</th>
                                <td>1974</td>
                            </tr>
                            <tr>
                                <th>Jam Buka</th>
                                <td>Senin - Minggu<br>08:00 - 16:00</td>
                            </tr>
                            <tr>
                                <th>Harga Tiket</th>
                                <td>Rp 3.000 - Rp 5.000</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>Sejarah & Budaya</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>