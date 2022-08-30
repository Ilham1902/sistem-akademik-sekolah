@extends('layouts.main')

@section('body')
    <h3>Informasi</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
        <div class="card-body">

            @foreach ($informasi as $info)

                <h3 class="text-center">{{ $info->judul }}</h3>
                <p class="mt-4">{!! $info->isi !!}</p>
                <div class="float-end">
                    <p>{{ $info->tanggal_buat }}</p>
                    <p class="mt-5">{{ $info->nama_kepsek }}</p>
                </div>
        </div>
            @endforeach
    </div>
@endsection
