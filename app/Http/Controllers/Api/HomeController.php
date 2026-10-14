<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function search(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $hasil = $q !== ''
            ? Mahasiswa::query()
                ->where(function ($query) use ($q) {
                    $query->where('nama', 'like', "%{$q}%")
                        ->orWhere('nim', 'like', "%{$q}%");
                })
                ->orderBy('nim')
                ->get()
            : collect();

        return view('search', compact('q', 'hasil'));
    }

    public function produk(?string $kategori = null)
    {
        return view('products.index', [
            'kategori' => $kategori ?: 'semua',
        ]);
    }
}
