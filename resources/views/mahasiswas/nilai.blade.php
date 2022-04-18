@extends('mahasiswas.layout')
@section('content')
<div class="container mt-3">
        <h3 class="text-center mb-5">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h3>
        <h2 class="text-center mb-4">KARTU HASIL STUDI (KHS)</h2>

        <br><br><br>

        <b>Nama :</b> {{ $mahasiswa->nama}}<br>
        <b>NIM : </b>{{ $mahasiswa->nim}}<br>
        <b>Kelas : </b> {{ $mahasiswa->kelas->nama_kelas}}<br>

        <br>
        <table class="table table-bordered">
            <tr>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
            </tr>
            @foreach ($mahasiswa -> matakuliah as $nilai)
            <tr>
            <td>{{ $nilai->nama_matkul }}</td>
            <td>{{ $nilai->sks }}</td>
            <td>{{ $nilai->semester }}</td>
            <td>{{ $nilai->pivot->nilai }}</td>
            </tr>
            @endforeach
            </table>
            <br>
        <center><a class="btn btn-danger" href="{{ route('cetak_pdf', $mahasiswa->nim) }}"> Cetak Ke PDF</a></center>
    </div>
@endsection 