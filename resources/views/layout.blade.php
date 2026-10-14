<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Profil Prodi</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f8f9fa; }
        nav { background: #81198e; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        nav a { color: white; margin-right: 15px; text-decoration: none; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .container { background: white; padding: 20px; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <nav>
        <!-- Navigasi Menggunakan Named Route -->
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('profil') }}">Visi & Misi</a>
        <a href="{{ route('dosen.index') }}">Daftar Dosen</a>
        <a href="{{ route('berita') }}">Berita Terbaru</a>
        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
        <a href="{{ route('admin.pengaturan') }}">Admin Pengaturan</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>