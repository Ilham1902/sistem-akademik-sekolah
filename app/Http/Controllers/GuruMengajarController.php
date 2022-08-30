<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\guruMengajar;
use App\Models\kehadiran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuruMengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $jam_mengajar = DB::table('jadwal_mengajar')->select('jam')->get();
        $tanggal = Carbon::now()->translatedFormat('l, d F Y');
        $history = DB::table('absen_guru')
        ->join('kelas','kelas.kode_kelas', '=', 'absen_guru.kelas')
        ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'absen_guru.mata_pelajaran')
        ->join('opsi_kehadiran', 'opsi_kehadiran.kode_kehadiran', '=', 'absen_guru.kehadiran')
        ->where('nip', '=', Auth::user()->nip)
        ->paginate(10);

        return view('guru.mengajar.index',[
            'title' => 'Jadwal Mengajar',
            'history' => $history,
            'tanggal' => $tanggal,
            // 'jam_mengajar' => $jam_mengajar
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
     * @param  \App\Models\guruMengajar  $guruMengajar
     * @return \Illuminate\Http\Response
     */
    public function show(guruMengajar $guruMengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guruMengajar  $guruMengajar
     * @return \Illuminate\Http\Response
     */
    public function edit(guruMengajar $guruMengajar, $id)
    {

        // $kehadiran = kehadiran::select('*')->get();
        $tanggal = Carbon::now()->translatedFormat('l, d F Y');
        $history = DB::table('absen_guru')
        ->join('kelas','kelas.kode_kelas', '=', 'absen_guru.kelas')
        ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'absen_guru.mata_pelajaran')
        ->where('id_absen', $id)
        ->paginate(10);

        $kehadiran = kehadiran::select('*')->get();

        return view('guru.mengajar.edit',[
            'title' => 'Jadwal Mengajar',
            'history' => $history,
            'tanggal' => $tanggal,
            'kehadiran' => $kehadiran
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guruMengajar  $guruMengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guruMengajar $guruMengajar, $id)
    {
        $jam = date("H:i:s");

        DB::table('absen_guru')->where('id_absen', $id)->update([
            'jam_absen' => $jam,
            'kehadiran' => $request->kehadiran
        ]);

        return redirect('/mengajar')->with('success', 'Presensi Telah Terekam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guruMengajar  $guruMengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(guruMengajar $guruMengajar)
    {
        //
    }
}
