@extends('layout')

@section('content')
    <h1>Detail Dosen</h1>
    <p><strong>NIDN:</strong> {{ $dosen['nidn'] }}</p>
    <p><strong>Nama:</strong> {{ $dosen['nama'] }}</p>
    <p><strong>Keahlian:</strong> {{ $dosen['keahlian'] }}</p>
    <br>
    <a href="{{ route('dosen.index') }}">← Kembali ke Daftar Dosen</a>
@endsection