<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\mapel;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class DataAbsenGuru extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = kelas::all();
        $mapel = mapel::all();
        $kehadiran = kehadiran::all();

        $presensi = DB::table('absen_guru')
        ->join('kelas', 'kelas.kode_kelas', '=', 'absen_guru.kelas')
        ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'absen_guru.mata_pelajaran')
        ->join('opsi_kehadiran', 'opsi_kehadiran.kode_kehadiran', '=', 'absen_guru.kehadiran')
        ->paginate(5);

        return view('admin.absen.guru.index',[
            'title' => 'Data Absen Siswa',
            'kelas' => $kelas,
            'mapel' => $mapel,
            'kehadiran' => $kehadiran,
            'presensi' => $presensi
        ]);
    }

    public function cetak()
    {
        $kelas = kelas::all();
        $mapel = mapel::all();
        $kehadiran = kehadiran::all();

        $presensi = DB::table('absen_guru')
        ->join('kelas', 'kelas.kode_kelas', '=', 'absen_guru.kelas')
        ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'absen_guru.mata_pelajaran')
        ->join('opsi_kehadiran', 'opsi_kehadiran.kode_kehadiran', '=', 'absen_guru.kehadiran')
        ->paginate(5);

        $data = PDF::loadview('admin.absen.guru.cetak_pdf',[
            'data' => 'Laporan Presensi Guru',
            'title' => 'Download PDF',
            'kelas' => $kelas,
            'mapel' => $mapel,
            'kehadiran' => $kehadiran,
            'presensi' => $presensi
        ]);

        return $data->download('laporan.pdf');
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
        //
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
        //
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
