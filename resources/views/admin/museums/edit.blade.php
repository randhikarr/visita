<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Museum - Admin Visita</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f5f7fa; }
        
        /* Admin Header */
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .admin-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-logo {
            display: flex;
            align-items: center;
            color: white;
        }
        
        .admin-logo img {
            height: 50px;
            margin-right: 15px;
        }
        
        .admin-logo h2 {
            font-family: 'Baloo Chettan 2', cursive;
            font-weight: 700;
            font-size: 28px;
            margin: 0;
        }
        
        .admin-nav-links {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 30px;
        }
        
        .admin-nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s;
            padding: 8px 15px;
            border-radius: 5px;
        }
        
        .admin-nav-links a:hover {
            background: rgba(255,255,255,0.2);
        }
        
        .admin-nav-links a.active {
            background: rgba(255,255,255,0.15);
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        
        /* Page Header */
        .page-header {
            background: white;
            padding: 25px 30px;
            margin: 30px 0;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .page-header h1 {
            font-family: 'Baloo Chettan 2', cursive;
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin: 0;
        }
        
        .page-header p {
            color: #666;
            margin: 10px 0 0 0;
        }
        
        /* Form Box */
        .form-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            max-width: 800px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
            font-size: 15px;
        }
        
        .form-group label i {
            margin-right: 8px;
            color: #667eea;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .form-group small {
            color: #999;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }
        
        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 14px 30px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
            padding: 14px 30px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
            color: white;
            text-decoration: none;
        }
        
        /* Alert */
        .alert-danger {
            background: #ffebee;
            color: #c62828;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid #c62828;
        }
        
        .alert-danger ul {
            margin: 10px 0 0 20px;
        }
        
        /* Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .admin-nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Admin Header -->
    <div class="admin-header">
        <div class="container">
            <div class="admin-navbar">
                <div class="admin-logo">
                    <img src="{{ asset('images/visita2.png') }}" alt="Visita">
                    <h2>Admin Panel</h2>
                </div>
                
                <ul class="admin-nav-links">
                    <li><a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a></li>
                    <li><a href="{{ route('admin.museums') }}" class="active">
                        <i class="fa fa-building"></i> Kelola Museum
                    </a></li>
                    <li><a href="{{ route('beranda') }}" target="_blank">
                        <i class="fa fa-globe"></i> Lihat Website
                    </a></li>
                </ul>
                
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container" style="padding: 0 15px;">
        <!-- Page Header -->
        <div class="page-header">
            <h1>✏️ Edit Museum</h1>
            <p>Update informasi museum yang sudah ada</p>
        </div>

        <!-- Form -->
        <div class="form-box">
            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert-danger">
                    <strong><i class="fa fa-exclamation-circle"></i> Terjadi kesalahan:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit Form -->
            <form method="POST" action="{{ route('admin.museums.update', $museum->id) }}">
                @csrf
                @method('PUT')

                <!-- Nama Museum -->
                <div class="form-group">
                    <label>
                        <i class="fa fa-building"></i> Nama Museum *
                    </label>
                    <input 
                        type="text" 
                        name="nama_museum" 
                        value="{{ old('nama_museum', $museum->nama_museum) }}" 
                        placeholder="Contoh: Museum Geologi Bandung" 
                        required
                    >
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <label>
                        <i class="fa fa-align-left"></i> Deskripsi
                    </label>
                    <textarea 
                        name="deskripsi" 
                        placeholder="Deskripsi singkat tentang museum..."
                    >{{ old('deskripsi', $museum->deskripsi) }}</textarea>
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label>
                        <i class="fa fa-map-marker"></i> Alamat Lengkap
                    </label>
                    <textarea 
                        name="alamat" 
                        rows="3" 
                        placeholder="Jl. Contoh No.123, Kota Bandung..."
                    >{{ old('alamat', $museum->alamat) }}</textarea>
                </div>

                <!-- Latitude & Longitude -->
                <div class="form-grid">
                    <div class="form-group">
                        <label>
                            <i class="fa fa-location-arrow"></i> Latitude *
                        </label>
                        <input 
                            type="number" 
                            step="any" 
                            name="latitude" 
                            value="{{ old('latitude', $museum->latitude) }}" 
                            placeholder="-6.9175" 
                            required
                        >
                        <small>Contoh: -6.9175</small>
                    </div>

                    <div class="form-group">
                        <label>
                            <i class="fa fa-location-arrow"></i> Longitude *
                        </label>
                        <input 
                            type="number" 
                            step="any" 
                            name="longitude" 
                            value="{{ old('longitude', $museum->longitude) }}" 
                            placeholder="107.6191" 
                            required
                        >
                        <small>Contoh: 107.6191</small>
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div class="form-group">
                    <label>
                        <i class="fa fa-clock-o"></i> Jam Operasional
                    </label>
                    <input 
                        type="text" 
                        name="jam_operasional" 
                        value="{{ old('jam_operasional', $museum->jam_operasional) }}" 
                        placeholder="Senin-Jumat: 09.00-17.00 WIB"
                    >
                </div>

                <!-- Harga Tiket -->
                <div class="form-group">
                    <label>
                        <i class="fa fa-ticket"></i> Harga Tiket
                    </label>
                    <input 
                        type="text" 
                        name="harga_tiket" 
                        value="{{ old('harga_tiket', $museum->harga_tiket) }}" 
                        placeholder="Rp 10.000 atau Gratis"
                    >
                </div>

                <!-- URL Foto -->
                <div class="form-group">
                    <label>
                        <i class="fa fa-image"></i> URL Foto Museum
                    </label>
                    <input 
                        type="url" 
                        name="foto_url" 
                        value="{{ old('foto_url', $museum->foto_url) }}" 
                        placeholder="https://example.com/foto.jpg"
                    >
                    <small>Link gambar dari internet</small>
                </div>

                <!-- Action Buttons -->
                <div style="margin-top: 35px;">
                    <button type="submit" class="btn-primary">
                        <i class="fa fa-save"></i> Update Museum
                    </button>
                    <a href="{{ route('admin.museums') }}" class="btn-secondary">
                        <i class="fa fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Spacing -->
    <div style="height: 50px;"></div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
