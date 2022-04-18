@extends('mahasiswas.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>

            <div class="float-left my-2">
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group mb-3">  
                        <input type="text" class="form-control" name="cari" size ="30" placeholder="Masukkan Nama Mahasiswa">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Search</button>
                        </div>
                    </div>   
                </form>   
            </div>

            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Tanggal_Lahir</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>No_Handphone</th>
            <th>Email</th>
            <th width="290px">Action</th>
        </tr>
        @foreach ($paginate as $mhs)
        <tr>

            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama }}</td>
            <td><img width="100px" height="100px" src="{{ asset('storage/' . $mhs->foto) }}"></td>
            <td>{{ $mhs->tglLahir }}</td>
            <td>{{ $mhs->kelas->nama_kelas }}</td>
            <td>{{ $mhs->jurusan }}</td>          
            <td>{{ $mhs->no_handphone }}</td>
            <td>{{ $mhs->email }}</td>
            <td>
            <form action="{{ route('mahasiswa.destroy',$mhs->nim) }}" method="POST">

                <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
                <a class="btn btn-warning" href="{{route('nilai',$mhs->nim) }}"> Nilai</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
    @endforeach
    </table>

        {{ $paginate->links() }}
        
@endsection
