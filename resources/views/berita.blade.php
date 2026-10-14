@extends('layout')

@section('content')
    <h1>Berita Program Studi</h1>
    <p>Kategori Berita: <strong>{{ ucfirst($kategori) }}</strong></p>
    
    <p>Lihat Kategori Lain:
        <a href="{{ route('berita', ['kategori' => 'akademik']) }}">Akademik</a> | 
        <a href="{{ route('berita', ['kategori' => 'kegiatan']) }}">Kegiatan</a> | 
        <a href="{{ route('berita') }}">Terbaru (Default)</a>
    </p>
@endsection