<!DOCTYPE html>
<html>

<head>
    <title>Mencetak Laporan KARTU HASIL STUDI (KHS)</title>
</head>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

</style>

<body>
    <center>
        <h2>KARTU HASIL STUDI (KHS)</h2>
    </center>
    <br>
    <b>Nama:</b> {{ $mahasiswa->nama }}<br>
    <b>NIM: </b>{{ $mahasiswa->nim }}<br>
    <b>Kelas: </b> {{ $mahasiswa->kelas->nama_kelas }}<br>

    <br><br><br>
    <table class="table table-bordered" width="700px">
        <tr>
            <th>MataKuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
        @foreach ($mahasiswa->matakuliah as $nilai)
            <tr>
                <td>{{ $nilai->nama_matkul }}</td>
                <td align="center">{{ $nilai->sks }}</td>
                <td align="center">{{ $nilai->semester }}</td>
                <td align="center">{{ $nilai->pivot->nilai }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
