<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = kelas::select('*')->orderBy('nama_kelas', 'asc')->paginate(5);
        return view('admin.data umum.kelas.index',[
            'title' => 'Data Kelas',
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data umum.kelas.create',[
            'title' => 'Tambah Kelas'
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
        $validateData = $request->validate([
            'kode_kelas' => 'required|unique:kelas',
            'nama_kelas' => 'required'
        ]);

        kelas::create($validateData);

        return redirect('/data_umum/kelas')->with('success', 'Kelas Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(kelas $kelas, $id)
    {
        $siswa = DB::table('siswa')
        ->join('kelas', 'kelas.kode_kelas', '=', 'siswa.kode_kelas')
        ->where('id_kelas', $id)
        ->paginate(10);
        return view('admin.data umum.kelas.show',[
            'title' => 'Data Siswa per-Kelas',
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(kelas $kelas, $id)
    {
        // alternatif menggunakan db
        // $kelas = DB::table('kelas')->where('id_kelas', $id)->get();
        // model
        $kelas = kelas::select('*')->where('id_kelas', $id)->get();
        return view('admin.data umum.kelas.edit', [
            'title' => 'Ubah Kelas',
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('kelas')->where('id_kelas',  $id)->update([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas
        ]);

        return redirect('/data_umum/kelas')->with('success', 'Data Kelas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kelas')->where('id_kelas', $id)->delete();

        return redirect('/data_umum/kelas')->with('success', 'Kelas Berhasil Dihapus');
    }
}
