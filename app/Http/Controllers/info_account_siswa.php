<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class info_account_siswa extends Controller
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
        ->where('nisn', Auth::user()->nisn)->get();
        return view('siswa.info_account.index',[
            'title' => 'Info Account',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = DB::table('kelas')->get();
        $siswa = siswa::select('*')
        ->join('kelas', 'kelas.kode_kelas', '=', 'siswa.kode_kelas')
        ->where('nisn', Auth::user()->nisn)->get();

        return view('siswa.info_account.edit',[
            'title' => 'Edit Account',
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('siswa')->where('id_siswa',  $id)->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kode_kelas' => $request->kelas,
            'tahun_masuk' => $request->tahun_masuk,
            'alamat' => $request->alamat,
            'email' => $request->email
        ]);

        $siswa = siswa::select('*')->get();

        foreach($siswa as $sw) {
            DB::table('users')->where('nisn', $sw->NISN)->update([
                'username' => $request->nama,
                'kelas' => $request->kelas,
                'email' => $request->email
            ]);
        }

        return redirect('/info_account_siswa')->with('success', 'Biodata Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
