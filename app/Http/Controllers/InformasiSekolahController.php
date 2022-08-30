<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informasi;

class InformasiSekolahController extends Controller
{
    public function index()
    {
        $informasi = informasi::select('*')->get();
        return view('guru.informasi.index',[
            'title' => 'Informasi Sekolah',
            'informasi' => $informasi
        ]);
    }
}
