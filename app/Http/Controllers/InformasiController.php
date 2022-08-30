<?php

namespace App\Http\Controllers;

use App\Models\informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = informasi::select('*')->get();
        return view('admin.informasi.index',[
            'title' => 'Informasi',
            'informasi' => $informasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informasi.create',[
            'title' => 'Buat Informasi'
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
            'judul' => 'required',
            'isi' => 'required|max:15000',
            'tanggal_buat' => 'required',
            'nama_kepsek' => 'required',
        ]);

        informasi::create($validateData);

        return redirect('/informasi')->with('success', 'Informasi Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function show(informasi $informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // mengambil data informasi berdasarkan id yang dipilih
	    $informasi = DB::table('informasi')->where('id_informasi',$id)->get();
        return view('admin.informasi.edit',[
            'title' => 'Edit Informasi',
            'informasi' => $informasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('informasi')->where('id_informasi', $id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal_buat' => $request->tanggal_buat,
            'nama_kepsek' => $request->nama_kepsek
        ]);

        return redirect('/informasi')->with('success', 'Informasi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('informasi')->where('id_informasi', $id)->delete();

        return redirect('/informasi')->with('success', 'Informasi Berhasil Dihapus');
    }
}
