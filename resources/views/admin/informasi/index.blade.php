@extends('layouts.main')

@section('body')
    <h3>Informasi</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-header">
            <a href="/informasi/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Buat Informasi</a>
        </div>
        <div class="card-body">

            @foreach ($informasi as $info)

                <h3 class="text-center">{{ $info->judul }}</h3>
                <p class="mt-4">{!! $info->isi !!}</p>
                <div class="float-end">
                    <p>{{ $info->tanggal_buat }}</p>
                    <p class="mt-5">{{ $info->nama_kepsek }}</p>
                </div>
        </div>
                <div class="card-footer">
                    <a href="/informasi/{{ $info->id_informasi }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Ubah Informasi</a>
                    <form action="/informasi/{{ $info->id_informasi }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus informasi?')"><i class="bi bi-trash3"></i> Hapus</button>
                    </form>
                </div>
            @endforeach
    </div>
@endsection
