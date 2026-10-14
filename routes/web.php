<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Data dummy (Pengganti database untuk Dosen)
$dosen = [
    ['nidn' => '1111111111', 'nama' => 'Dr. Andi Saputra', 'keahlian' => 'AI'],
    ['nidn' => '2222222222', 'nama' => 'Budi Santoso, M.Kom', 'keahlian' => 'Web'],
    ['nidn' => '3333333333', 'nama' => 'Prof. Citra Lestari', 'keahlian' => 'AI'],
    ['nidn' => '4444444444', 'nama' => 'Dewi Anggraini, M.T', 'keahlian' => 'Jaringan'],
];

// 1. Rute Beranda dan Profil (Mendukung / dan /profil)
Route::get('/', function () {
    return view('welcome'); // Ganti dengan nama view beranda Anda
})->name('home');

Route::get('/profil', function () {
    return view('profil'); // Buat view 'profil.blade.php' yang berisi visi misi
})->name('profil');

// 2. Rute Dosen (Filter Keahlian)
Route::get('/dosen', function (Request $request) use ($dosen) {
    $keahlian = $request->query('keahlian');
    
    // Filter jika ada query string keahlian
    $data = $keahlian 
        ? array_filter($dosen, fn($d) => strtoupper($d['keahlian']) === strtoupper($keahlian)) 
        : $dosen;
        
    return view('dosen.index', ['data' => $data]); // Buat view 'dosen/index.blade.php'
})->name('dosen.index');

// 3. Rute Detail Dosen (Regex NIDN 10 Digit)
Route::get('/dosen/{nidn}', function ($nidn) use ($dosen) {
    $detailDosen = collect($dosen)->firstWhere('nidn', $nidn);
    
    // Jika dosen tidak ditemukan di array, kembalikan 404
    if (!$detailDosen) {
        abort(404);
    }
    
    return view('dosen.detail', ['dosen' => $detailDosen]); // Buat view 'dosen/detail.blade.php'
})->where('nidn', '^[0-9]{10}$')->name('dosen.show'); 
// where() di atas memaksa nidn harus tepat 10 digit angka. Jika kurang/lebih, otomatis 404.

// 4. Rute Berita (Parameter Opsional)
Route::get('/berita/{kategori?}', function ($kategori = 'terbaru') {
    // Kategori default adalah 'terbaru' jika URL hanya /berita
    return view('berita', ['kategori' => $kategori]); // Buat view 'berita.blade.php'
})->name('berita');

// 5. Rute Grup Admin (Prefix 'admin')
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Buat view 'admin/dashboard.blade.php'
    })->name('dashboard'); // Name route menjadi 'admin.dashboard'

    Route::get('/pengaturan', function () {
        return view('admin.pengaturan'); // Buat view 'admin/pengaturan.blade.php'
    })->name('pengaturan'); // Name route menjadi 'admin.pengaturan'
});

