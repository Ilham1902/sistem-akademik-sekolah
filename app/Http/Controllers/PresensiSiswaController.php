<?php

namespace App\Http\Controllers;

use App\Models\kehadiran;
use App\Models\presensi_siswa;
use App\Models\siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PresensiSiswaController extends Controller
{
    public function index() {
        $jam_mengajar = DB::table('jadwal_mengajar')->select('jam');

        $jadwal_mengajar = DB::table('jadwal_mengajar')
        ->join('kelas','kelas.kode_kelas', '=', 'jadwal_mengajar.kode_kelas')
        ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'jadwal_mengajar.kode_mata_pelajaran')
        ->join('guru', 'guru.nip', '=', 'jadwal_mengajar.nip')
        ->where('kelas.kode_kelas', '=', Auth::user()->kelas)
        ->get();

        $user = DB::table('siswa')
        ->join('jurusan', 'jurusan.kode_jurusan', '=', 'siswa.jurusan')
        ->where('NISN', Auth::user()->nisn)
        ->get();

        $tanggal = Carbon::now()->translatedFormat('l, d F Y');
        $history = DB::table('presensi_siswa')
                    ->join('kelas','kelas.kode_kelas', '=', 'presensi_siswa.kelas')
                    ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'presensi_siswa.mata_pelajaran')
                    ->join('guru', 'guru.nip', '=', 'presensi_siswa.nip')
                    ->join('opsi_kehadiran', 'opsi_kehadiran.kode_kehadiran', '=', 'presensi_siswa.kehadiran')
                    ->where('nisn', '=', Auth::user()->nisn)->paginate(10);


        return view('siswa.presensi.index',[
            'title' => 'Presensi',
            'jadwal_mengajar' => $jadwal_mengajar,
            'user' => $user,
            'history' => $history,
            'tanggal' => $tanggal,
            'jam_mengajar' => $jam_mengajar,
        ]);
    }

    public function store(Request $request)
    {
        // $tanggal = Carbon::now()->translatedFormat('l, d F Y');
        $jam = date("H:i");
        // $nisn = Auth::user()->nisn;

        if ($jam > '07:00:00') {
            $kehadiran = "Telat";
        } else {
            $kehadiran = "Hadir";
        }

        presensi_siswa::select('*')->get();
        DB::table('presensi_siswa')->update([
            // 'tanggal' => $tanggal,
            'jam_presensi' => $jam,
            // 'nisn' => $nisn,
            // 'nama_siswa' => Auth::user()->username,
            // 'kelas' => $request->kelas,
            // 'mata_pelajaran' => $request->mata_pelajaran,
            'kehadiran' => $kehadiran
        ]);

        return redirect('/presensi_siswa')->with('success', 'Presensi Telah Terekam');
    }

    public function edit($id) {

        $kehadiran = kehadiran::select('*')->get();
        $tanggal = Carbon::now()->translatedFormat('l, d F Y');
        $history = DB::table('presensi_siswa')
        ->join('kelas','kelas.kode_kelas', '=', 'presensi_siswa.kelas')
        ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'presensi_siswa.mata_pelajaran')
        ->join('guru', 'guru.nip', '=', 'presensi_siswa.nip')
        ->where('id_presensi', $id)->paginate(10);

        return view('siswa.presensi.edit',[
            'title' => 'Presensi',
            'history' => $history,
            'tanggal' => $tanggal,
            'kehadiran' => $kehadiran
        ]);
    }

    public function update(Request $request, $id)
    {
        $jam = date("H:i:s");

        DB::table('presensi_siswa')->where('id_presensi', $id)->update([
            'jam_presensi' => $jam,
            'kehadiran' => $request->kehadiran
        ]);

        return redirect('/presensi_siswa')->with('success', 'Presensi Telah Terekam');
    }

}
