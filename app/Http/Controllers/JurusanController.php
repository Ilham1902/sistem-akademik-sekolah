<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::select('*')
        ->orderBy('nama_jurusan', 'asc')->paginate(5);
        return view('admin.data umum.jurusan.index',[
            'title' => 'Data Jurusan',
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data umum.jurusan.create',[
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
            'kode_jurusan' => 'required|unique:jurusan',
            'nama_jurusan' => 'required'
        ]);

        jurusan::create($validateData);

        return redirect('/data_umum/jurusan')->with('success', 'Jurusan Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = DB::table('siswa')
        ->join('jurusan', 'jurusan.kode_jurusan', '=', 'siswa.jurusan')
        ->join('kelas', 'kelas.kode_kelas', '=', 'siswa.kode_kelas')
        ->where('id_jurusan', $id)
        ->paginate();

        $jurusan = jurusan::where('id_jurusan', $id)->get();

        return view('admin.data umum.jurusan.show',[
            'title' => 'Data Siswa per-Jurusan',
            'siswa' => $siswa,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = jurusan::select('*')->where('id_jurusan', $id)->get();
        return view('admin.data umum.jurusan.edit', [
            'title' => 'Ubah Jurusan',
            'jurusan' => $jurusan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('jurusan')->where('id_jurusan',  $id)->update([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect('/data_umum/jurusan')->with('success', 'Data Jurusan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jurusan')->where('id_jurusan', $id)->delete();

        return redirect('/data_umum/jurusan')->with('success', 'Jurusan Berhasil Dihapus');
    }
}
