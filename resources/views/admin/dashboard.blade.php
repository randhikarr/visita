<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Visita</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f5f7fa;
        }
        
        /* Header Section */
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
            font-size: 14px;
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        
        /* Welcome Section */
        .welcome-section {
            background: white;
            padding: 30px;
            margin: 30px 0;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .welcome-section h1 {
            font-family: 'Baloo Chettan 2', cursive;
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .welcome-section p {
            color: #666;
            font-size: 16px;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
            transition: all 0.3s;
            border-top: 4px solid;
        }
        
        .stat-card:nth-child(1) {
            border-top-color: #667eea;
        }
        
        .stat-card:nth-child(2) {
            border-top-color: #764ba2;
        }
        
        .stat-card:nth-child(3) {
            border-top-color: #f093fb;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            font-size: 48px;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .stat-number {
            font-size: 42px;
            font-weight: 700;
            font-family: 'Baloo Chettan 2', cursive;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #666;
            font-size: 16px;
            font-weight: 500;
        }
        
        /* Recent Museums Section */
        .recent-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .section-header h2 {
            font-family: 'Baloo Chettan 2', cursive;
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin: 0;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .museum-list {
            list-style: none;
            padding: 0;
        }
        
        .museum-item {
            padding: 20px;
            border-bottom: 1px solid #eee;
            transition: all 0.3s;
        }
        
        .museum-item:last-child {
            border-bottom: none;
        }
        
        .museum-item:hover {
            background: #f8f9fa;
            border-radius: 10px;
        }
        
        .museum-item h4 {
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 18px;
        }
        
        .museum-item p {
            color: #666;
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .museum-item small {
            color: #999;
            font-size: 13px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        
        .empty-state i {
            font-size: 64px;
            margin-bottom: 15px;
            color: #ddd;
        }
        
        /* Alert */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid;
        }
        
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left-color: #2e7d32;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .stats-grid {
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
                    <li><a href="{{ route('admin.dashboard') }}" class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a></li>
                    <li><a href="{{ route('admin.museums') }}">
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
        <!-- Welcome Section -->
        <div class="welcome-section">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif
            
            <h1>Selamat Datang, {{ auth()->guard('admin')->user()->name }}! 👋</h1>
            <p>Kelola data museum dan monitoring statistik Visita</p>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fa fa-building"></i>
                </div>
                <div class="stat-number">{{ $stats['total_museums'] }}</div>
                <div class="stat-label">Total Museum</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fa fa-gift"></i>
                </div>
                <div class="stat-number">{{ $stats['free_museums'] }}</div>
                <div class="stat-label">Museum Gratis</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fa fa-ticket"></i>
                </div>
                <div class="stat-number">{{ $stats['paid_museums'] }}</div>
                <div class="stat-label">Museum Berbayar</div>
            </div>
        </div>

        <!-- Recent Museums -->
        <div class="recent-section">
            <div class="section-header">
                <h2>Museum Terbaru</h2>
                <a href="{{ route('admin.museums.create') }}" class="btn-primary">
                    <i class="fa fa-plus"></i> Tambah Museum
                </a>
            </div>

            @if($recent_museums->count() > 0)
                <ul class="museum-list">
                    @foreach($recent_museums as $museum)
                        <li class="museum-item">
                            <h4>
                                <i class="fa fa-building" style="color: #667eea; margin-right: 8px;"></i>
                                {{ $museum->nama_museum }}
                            </h4>
                            <p>
                                <i class="fa fa-map-marker" style="color: #764ba2; margin-right: 5px;"></i>
                                {{ $museum->alamat ?: 'Alamat tidak tersedia' }}
                            </p>
                            <p>
                                <i class="fa fa-ticket" style="color: #f093fb; margin-right: 5px;"></i>
                                {{ $museum->harga_tiket ?: 'Harga tidak tersedia' }}
                            </p>
                            <small>
                                <i class="fa fa-clock-o"></i>
                                Ditambahkan {{ $museum->created_at->diffForHumans() }}
                            </small>
                        </li>
                    @endforeach
                </ul>
                
                <div style="text-align: center; margin-top: 20px;">
                    <a href="{{ route('admin.museums') }}" class="btn-primary">
                        Lihat Semua Museum <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            @else
                <div class="empty-state">
                    <i class="fa fa-building"></i>
                    <p>Belum ada museum yang ditambahkan</p>
                    <a href="{{ route('admin.museums.create') }}" class="btn-primary" style="margin-top: 15px;">
                        <i class="fa fa-plus"></i> Tambah Museum Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer Spacing -->
    <div style="height: 50px;"></div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>