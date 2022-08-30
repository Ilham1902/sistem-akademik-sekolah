<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class cetak_absen_siswa_pdf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $kelas = kelas::select('*')
        ->where('id_kelas', $id)
        ->get();

        foreach ($kelas as $k) {

                $siswa = DB::table('presensi_siswa')
                ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'presensi_siswa.mata_pelajaran')
                ->join('kelas', 'kelas.kode_kelas', '=', 'presensi_siswa.kelas')
                ->join('guru', 'guru.nip', '=', 'presensi_siswa.nip')
                ->join('opsi_kehadiran', 'opsi_kehadiran.kode_kehadiran', '=', 'presensi_siswa.kehadiran')
                ->where('presensi_siswa.kelas', $k->kode_kelas)
                ->orderBy('nama_mata_pelajaran', 'asc')
                ->paginate(10);
        }

        $data = PDF::loadview('admin.absen.siswa.pdf',[
            'data' => 'Laporan Presensi Siswa',
            'title' => 'Download PDF',
            'kelas' => $kelas,
            'siswa' => $siswa
        ]);

        return $data->download('laporan.pdf');
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
