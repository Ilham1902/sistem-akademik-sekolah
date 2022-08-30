@extends('layouts.main')

@section('body')
    <h3>Data Guru</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-header">
            <a href="/data_guru/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Guru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <?php $i = 1 ?>
                <tr class="table-dark border-dark text-center">
                    <th rowspan="2">NO</th>
                    <th rowspan="2">NIP/NUPTK</th>
                    <th rowspan="2">Nama Guru</th>
                    <th rowspan="2">Tempat Lahir</th>
                    <th rowspan="2">Tanggal Lahir</th>
                    <th rowspan="2">No WA</th>
                    <th rowspan="2">Email</th>
                    <th rowspan="2">Alamat</th>
                    <th rowspan="2">Jabatan</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                <tr class="table-dark text-center border-dark">
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            @foreach ($guru as $g)
                <tr class="text-center">
                    <td>{{ $i }}</td>
                    <td>{{ $g->nip }}</td>
                    <td>{{ $g->nama }}</td>
                    <td>{{ $g->tempat_lahir }}</td>
                    <td>{{ $g->tanggal_lahir }}</td>
                    <td>{{ $g->no_wa }}</td>
                    <td>{{ $g->email }}</td>
                    <td>{{ $g->alamat }}</td>
                    <td>{{ $g->jabatan }}</td>
                    <td><a href="/data_guru/{{ $g->id_guru }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                    <td><form action="/data_guru/{{ $g->id_guru }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah kamu yakin ingin menghapus Guru?')"><i class="bi bi-trash3"></i></button>
                    </form></td>

                </tr>
                <?php $i++ ?>
            @endforeach
            </table>

            Halaman : {{ $guru->currentPage() }} <br>
            Jumlah Data : {{ $guru->total() }} <br>
            Data Per Halaman : {{ $guru->perPage() }}<br><br>


            {{ $guru->links() }}

            </div>
        </div>
    </div>
@endsection
