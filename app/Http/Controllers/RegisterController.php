<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\kelas;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('auth.register',[
            'title' => 'Register'
        ]);
    }

    public function RegisterSiswa() {
        $kelas = kelas::all();
        $jurusan = jurusan::all();
        return view('auth.registerSiswa', [
            'title' => 'Register Siswa',
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }

    public function RegisterGuru() {
        return view('auth.registerGuru', [
            'title' => 'Register Guru'
        ]);
    }


    public function registerUserSiswa (Request $request){

        $level = "siswa";
        $validateData = $request->validate([
            'username' => 'required',
            'nisn' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required',
       ]);

       $validateData['password'] = bcrypt($validateData['password']);
       $validateData['level'] = $level;

       User::create($validateData);

        DB::table('siswa')->insert([
            'NISN' => $request->nisn,
            'jurusan' => $request->jurusan,
            'nama' => $request->username,
            'email' => $request->email,
            'kode_kelas' => $request->kelas
        ]);

       return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login!');

    }

    public function registerUserGuru (Request $request){

        $level = "guru";
        $validateData = $request->validate([
            'username' => 'required',
            'nip' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required',
       ]);

       $validateData['password'] = bcrypt($validateData['password']);
       $validateData['level'] = $level;

       User::create($validateData);

       DB::table('guru')->insert([
        'nip' => $request->nip,
        'nama' => $request->username,
        'email' => $request->email,
        'jabatan' => $level
    ]);

       return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login!');

    }

}
