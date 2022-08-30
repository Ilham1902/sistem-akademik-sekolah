@extends('layouts.main')

@section('body')
    <h3>Data Umum > Data Mata Pelajaran</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-header">
            <a href="/data_umum/mata_pelajaran/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Mata Pelajaran</a>
        </div>
        <div class="card-body">
            <table class="table table-responsive">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th rowspan="2">NO</th>
                    <th rowspan="2">kode Mata Pelajaran</th>
                    <th rowspan="2">Nama Mata Pelajaran</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                <tr class="table-dark text-center border-dark">
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            @foreach ($mapel as $mp)
                <tr class="text-center">
                    <td>{{ $i }}</td>
                    <td>{{ $mp->kode_mata_pelajaran }}</td>
                    <td>{{ $mp->nama_mata_pelajaran }}</td>

                    <td><a href="/data_umum/mata_pelajaran/{{ $mp->id_mata_pelajaran }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                    <td><form action="/data_umum/mata_pelajaran/{{ $mp->id_mata_pelajaran }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus Mata Pelajaran?')"><i class="bi bi-trash3"></i></button>
                    </form></td>

                </tr>
                <?php $i++ ?>
            @endforeach
            </table>

            Halaman : {{ $mapel->currentPage() }} <br>
            Jumlah Data : {{ $mapel->total() }} <br>
            Data Per Halaman : {{ $mapel->perPage() }}<br><br>


            {{ $mapel->links() }}

        </div>
@endsection
