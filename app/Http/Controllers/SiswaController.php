<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\kelas;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = siswa::select('*')
        ->join('kelas', 'kelas.kode_kelas', '=', 'siswa.kode_kelas')
        ->join('jurusan', 'jurusan.kode_jurusan', '=', 'siswa.jurusan')
        ->orderBy('nama', 'asc')
        ->paginate(5);
        return view('admin.siswa.index',[
            'title' => 'Data Siswa',
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = kelas::select('*')->get();
        $jurusan = jurusan::select('*')->get();
        return view('admin.siswa.create',[
            'title' => 'Tambah Siswa',
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('siswa')->insert([
            'NISN' => $request->NISN,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'kode_kelas' => $request->kelas,
        ]);

        return redirect('/data_siswa')->with('success', 'Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa, $id)
    {
        $siswa = siswa::select('*')->where('id_siswa', $id)->get();
        $kelas = kelas::select('*')->get();
        $jurusan = jurusan::select('*')->get();
        return view('admin.siswa.edit',[
            'title' => 'Edit Siswa',
            'siswa' => $siswa,
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('siswa')->where('id_siswa', $id)->update([
            'NISN' => $request->NISN,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'kode_kelas' => $request->kelas,
        ]);

        return redirect('/data_siswa')->with('success', 'Data Siswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('siswa')->where('id_siswa', $id)->delete();

        return redirect('/data_siswa')->with('success', 'Siswa Berhasil Dihapus');
    }
}
