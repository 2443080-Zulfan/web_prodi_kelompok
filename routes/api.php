<?php

use Illuminate\Support\Facades\Route;

// Data dummy (Pengganti database untuk Dosen di API)
$dosen = [
    ['nidn' => '1111111111', 'nama' => 'Dr. Andi Saputra', 'keahlian' => 'AI'],
    ['nidn' => '2222222222', 'nama' => 'Budi Santoso, M.Kom', 'keahlian' => 'Web'],
    ['nidn' => '3333333333', 'nama' => 'Prof. Citra Lestari', 'keahlian' => 'AI'],
    ['nidn' => '4444444444', 'nama' => 'Dewi Anggraini, M.T', 'keahlian' => 'Jaringan'],
];

// Rute API Dosen (Mengembalikan format JSON)
Route::get('/dosen', function () use ($dosen) {
    return response()->json([
        'status' => 'success', 
        'total' => count($dosen), 
        'data' => $dosen
    ]);
});