<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Kelas;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi mencari mahasiswa dan menampilkan data menggunakan pagination

        // $cari = $request->cari;

        // if($cari){
        //     $mahasiswas = Mahasiswa::where('nama', 'LIKE', '%'.$cari.'%')->paginate(5);
        //     // ->orWhere('kelas', 'LIKE', '%'.$cari.'%')
        //     // ->orWhere('jurusan', 'LIKE', '%'.$cari.'%')->paginate(5);
        // }else{
        //     $mahasiswas = Mahasiswa::orderBy('nim', 'asc')->paginate(5);
        // }
        // return view('mahasiswas.index', compact('mahasiswas','cari')); 
        
        //yang semula Mahasiswa::all(), diubah menjadi with yang menyatakan relasi
        $mahasiswa = Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('nim', 'asc')->paginate(3);
        return view('mahasiswas.index', ['mahasiswa' => $mahasiswa,'paginate' => $paginate]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapat data dari tabel kelas
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'tglLahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            ]);

            $mahasiswa = new Mahasiswa;
            $mahasiswa->nim = $request->get('nim');
            $mahasiswa->nama = $request->get('nama');
            $mahasiswa->tglLahir = $request->get('tglLahir');
            $mahasiswa->jurusan = $request->get('jurusan');
            $mahasiswa->no_handphone = $request->get('no_handphone');
            $mahasiswa->email = $request->get('email');
            
            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');
    
            //fungsi eloquent untuk menambahkan data dengan relasi belongsTo
            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();
    
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        // code sebelum di relasi --> $Mahasiswa = Mahasiswa::find($Nim);
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        return view('mahasiswas.detail', ['Mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.edit', compact('mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'tglLahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            ]);

            $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
            $mahasiswa->nim = $request->get('nim');
            $mahasiswa->nama = $request->get('nama');
            $mahasiswa->tglLahir = $request->get('tglLahir');
            $mahasiswa->jurusan = $request->get('jurusan');
            $mahasiswa->no_handphone = $request->get('no_handphone');
            $mahasiswa->email = $request->get('email');
            
            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');
    
            //fungsi eloquent untuk update data dengan relasi belongsTo
            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswa.index')
                -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request){
        $cari = $request -> cari;
        $paginate = Mahasiswa::where('nama','like',"%". $cari . "%") -> paginate(5);
        return view(view: 'mahasiswas.index', data: compact('paginate','cari'));
    }

    public function mhsMatkul($nim){

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('mahasiswas.nilai', ['mahasiswa' => $mahasiswa]);

    }
};
