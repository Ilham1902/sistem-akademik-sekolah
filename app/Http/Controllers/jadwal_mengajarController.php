<?php

namespace App\Http\Controllers;

use App\Models\jadwal_mengajar;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\guru;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class jadwal_mengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal_mengajar = DB::table('jadwal_mengajar')
        ->join('kelas','kelas.kode_kelas', '=', 'jadwal_mengajar.kode_kelas')
        ->join('mata_pelajaran', 'mata_pelajaran.kode_mata_pelajaran', '=', 'jadwal_mengajar.kode_mata_pelajaran')
        ->join('guru', 'guru.NIP', '=', 'jadwal_mengajar.nip')
        ->orderBy('jam', 'asc')->paginate(5);

        return view('admin.jadwal mengajar.index', [
            'title' => 'Jadwal Mengajar',
            'jadwal_mengajar' => $jadwal_mengajar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = DB::table('kelas')->get();
        $mata_pelajaran = DB::table('mata_pelajaran')->get();
        $guru = DB::table('guru')->get();
        return view('admin.jadwal mengajar.create',[
            'title' => 'Tambah Jadwal Mengajar',
            'kelas' => $kelas,
            'mata_pelajaran' => $mata_pelajaran,
            'guru' => $guru
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
        $tanggal = Carbon::now()->translatedFormat('l, d F Y');
        DB::table('jadwal_mengajar')->insert([
            'tanggal' => $tanggal,
            'jam' => $request->jam,
            'kode_kelas' => $request->kelas,
            'kode_mata_pelajaran' => $request->mata_pelajaran,
            'nip' => $request->guru
        ]);

        $guru = guru::select('*')->get();
        // Tidak Hadir
        $kehadiran = "OP-004";

        foreach ($guru as $gr) {
            if ($request->guru == $gr->nip) {
                DB::table('absen_guru')->insert([
                    'tanggal' => $tanggal,
                    'nip' => $gr->nip,
                    'nama_guru' => $gr->nama,
                    'kelas' => $request->kelas,
                    'mata_pelajaran' => $request->mata_pelajaran,
                    'kehadiran' => $kehadiran
                ]);
            }
        }


        $siswa = siswa::select('*')->get();
        // Tidak Hadir
        $kehadiran = "OP-004";

        foreach ($siswa as $sw) {

            if ($request->kelas === $sw->kode_kelas) {
                DB::table('presensi_siswa')->insert([
                    'tanggal' => $tanggal,
                    'nisn' => $sw->NISN,
                    'nama_siswa' => $sw->nama,
                    'kelas' => $request->kelas,
                    'mata_pelajaran' => $request->mata_pelajaran,
                    'nip' => $request->guru,
                    'kehadiran' => $kehadiran
                ]);
            }
        }


        return redirect('/jadwal_mengajar')->with('success', 'Kelas Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jadwal_mengajar  $jadwal_mengajar
     * @return \Illuminate\Http\Response
     */
    public function show(jadwal_mengajar $jadwal_mengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwal_mengajar  $jadwal_mengajar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal_mengajar = jadwal_mengajar::select('*')->where('id_mengajar', $id)->get();
        $kelas = kelas::select('*')->get();
        $mata_pelajaran = mapel::select('*')->get();
        $guru = guru::select('*')->get();
        return view('admin.jadwal mengajar.edit', [
            'title' => 'Edit Jadwal Mengajar',
            'jadwal_mengajar' => $jadwal_mengajar,
            'kelas' => $kelas,
            'mata_pelajaran' => $mata_pelajaran,
            'guru' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwal_mengajar  $jadwal_mengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('jadwal_mengajar')->where('id_mengajar',  $id)->update([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'kode_kelas' => $request->kelas,
            'kode_mata_pelajaran' => $request->mata_pelajaran,
            'nip' => $request->guru
        ]);

        return redirect('/jadwal_mengajar')->with('success', 'Data Jadwal Mengajar Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal_mengajar  $jadwal_mengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jadwal_mengajar')->where('id_mengajar', $id)->delete();

        return redirect('/jadwal_mengajar')->with('success', 'Jadwal Mengajar Berhasil Dihapus');
    }
}
