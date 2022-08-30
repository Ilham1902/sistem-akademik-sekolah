<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = mapel::select('*')->orderBy('nama_mata_pelajaran', 'asc')->paginate(5);
        return view('admin.data umum.mata pelajaran.index', [
            'title' => 'Mata Pelajaran',
            'mapel' => $mapel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data umum.mata pelajaran.create',[
            'title' => 'Tambah Mata Pelajaran'
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
            'kode_mata_pelajaran' => 'required|unique:mata_pelajaran',
            'nama_mata_pelajaran' => 'required'
        ]);

        mapel::create($validateData);

        return redirect('/data_umum/mata_pelajaran')->with('success', 'Mata Pelajaran Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(mapel $mapel,$id)
    {
        $mapel = mapel::select('*')->where('id_mata_pelajaran', $id)->get();
        return view('admin.data umum.mata pelajaran.edit', [
            'title' => 'Ubah Mata Pelajaran',
            'mapel' => $mapel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('mata_pelajaran')->where('id_mata_pelajaran',  $id)->update([
            'kode_mata_pelajaran' => $request->kode_mata_pelajaran,
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran
        ]);

        return redirect('/data_umum/mata_pelajaran')->with('success', 'Data Mata Pelajaran Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mata_pelajaran')->where('id_mata_pelajaran', $id)->delete();

        return redirect('/data_umum/mata_pelajaran')->with('success', 'Mata Pelajaran Berhasil Dihapus');
    }
}
