@extends('layout')

@section('content')
    <h1>Daftar Dosen Program Studi</h1>
    
    <p>Filter Keahlian: 
        <a href="{{ route('dosen.index') }}">Semua</a> | 
        <a href="{{ route('dosen.index', ['keahlian' => 'AI']) }}">AI</a> | 
        <a href="{{ route('dosen.index', ['keahlian' => 'Web']) }}">Web</a> | 
        <a href="{{ route('dosen.index', ['keahlian' => 'Jaringan']) }}">Jaringan</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Keahlian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $d)
                <tr>
                    <td>{{ $d['nidn'] }}</td>
                    <td>{{ $d['nama'] }}</td>
                    <td>{{ $d['keahlian'] }}</td>
                    <td>
                        <!-- Named Route ke Detail Dosen NIDN 10 Digit -->
                        <a href="{{ route('dosen.show', ['nidn' => $d['nidn']]) }}">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data dosen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection