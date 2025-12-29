<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Museum - Admin Visita</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f5f7fa; }
        
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .admin-navbar { display: flex; justify-content: space-between; align-items: center; }
        .admin-logo { display: flex; align-items: center; color: white; }
        .admin-logo img { height: 50px; margin-right: 15px; }
        .admin-logo h2 { font-family: 'Baloo Chettan 2', cursive; font-weight: 700; font-size: 28px; margin: 0; }
        
        .admin-nav-links { display: flex; align-items: center; list-style: none; gap: 30px; }
        .admin-nav-links a { color: white; text-decoration: none; font-weight: 500; font-size: 16px; transition: all 0.3s; padding: 8px 15px; border-radius: 5px; }
        .admin-nav-links a:hover { background: rgba(255,255,255,0.2); }
        .admin-nav-links a.active { background: rgba(255,255,255,0.15); }
        
        .logout-btn { background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s; }
        
        .page-header { background: white; padding: 25px 30px; margin: 30px 0; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .page-header h1 { font-family: 'Baloo Chettan 2', cursive; font-size: 32px; font-weight: 700; color: #333; margin: 0; }
        
        .content-box { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 25px; border: none; border-radius: 10px; text-decoration: none; font-weight: 600; transition: all 0.3s; display: inline-block; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4); color: white; text-decoration: none; }
        
        .btn-warning { background: #ffc107; color: #333; padding: 8px 15px; border: none; border-radius: 8px; font-size: 14px; margin-right: 5px; text-decoration: none; display: inline-block; font-weight: 600; }
        .btn-danger { background: #dc3545; color: white; padding: 8px 15px; border: none; border-radius: 8px; font-size: 14px; cursor: pointer; font-weight: 600; }
        
        .table { width: 100%; margin-top: 20px; border-collapse: separate; border-spacing: 0 10px; }
        .table thead tr { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .table thead th { padding: 15px; text-align: left; font-weight: 600; }
        .table thead th:first-child { border-radius: 10px 0 0 10px; }
        .table thead th:last-child { border-radius: 0 10px 10px 0; }
        
        .table tbody tr { background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.05); transition: all 0.3s; }
        .table tbody tr:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .table tbody td { padding: 15px; border: none; }
        .table tbody tr td:first-child { border-radius: 10px 0 0 10px; }
        .table tbody tr td:last-child { border-radius: 0 10px 10px 0; }
        
        .alert { padding: 15px 20px; border-radius: 10px; margin-bottom: 20px; border-left: 4px solid; }
        .alert-success { background: #e8f5e9; color: #2e7d32; border-left-color: #2e7d32; }
    </style>
</head>
<body>
    <div class="admin-header">
        <div class="container">
            <div class="admin-navbar">
                <div class="admin-logo">
                    <img src="{{ asset('images/visita2.png') }}" alt="Visita">
                    <h2>Admin Panel</h2>
                </div>
                <ul class="admin-nav-links">
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="{{ route('admin.museums') }}" class="active"><i class="fa fa-building"></i> Kelola Museum</a></li>
                    <li><a href="{{ route('beranda') }}" target="_blank"><i class="fa fa-globe"></i> Lihat Website</a></li>
                </ul>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="fa fa-sign-out"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container" style="padding: 0 15px;">
        <div class="page-header">
            @if(session('success'))
                <div class="alert alert-success"><i class="fa fa-check-circle"></i> {{ session('success') }}</div>
            @endif
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1>Kelola Museum ({{ $museums->total() }})</h1>
                <a href="{{ route('admin.museums.create') }}" class="btn-primary">
                    <i class="fa fa-plus"></i> Tambah Museum
                </a>
            </div>
        </div>

        <div class="content-box">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Museum</th>
                        <th>Alamat</th>
                        <th>Harga Tiket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($museums as $index => $museum)
                        <tr>
                            <td>{{ $museums->firstItem() + $index }}</td>
                            <td><strong>{{ $museum->nama_museum }}</strong></td>
                            <td>{{ Str::limit($museum->alamat, 50) }}</td>
                            <td>{{ $museum->harga_tiket }}</td>
                            <td>
                                <a href="{{ route('admin.museums.edit', $museum->id) }}" class="btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.museums.delete', $museum->id) }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" style="text-align: center; padding: 40px;">Belum ada data museum</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div style="margin-top: 20px;">{{ $museums->links() }}</div>
        </div>
    </div>
    <div style="height: 50px;"></div>
</body>
</html>