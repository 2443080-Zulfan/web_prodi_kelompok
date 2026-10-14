@extends('layout', ['title' => '404'])

@section('content')
<section class="empty-page">
    <p class="eyebrow">ERROR 404</p>
    <h1>Halaman tidak ditemukan</h1>
    <p>URL yang kamu buka tidak tersedia atau data dosen tidak ditemukan.</p>
    <a class="button" href="{{ route('home') }}">Kembali ke beranda</a>
</section>
@endsection
