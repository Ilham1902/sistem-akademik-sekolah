@extends('layouts.main')

@section('body')

    <h3>Data Presensi Siswa</h3>
    <hr>

    <table class="table table-responsive">
        <tr>
            <td><strong>Tanggal</strong></td>
            <td><strong>:</strong></td>
            <td><strong>{{ $tanggal }}</strong></td>
        </tr>
        <tr>
            <td><strong>Kelas</strong></td>
            <td><strong>:</strong></td>
            @foreach ($kelas as $kl)
                <td><strong>{{ $kl->nama_kelas }}</strong></td>
            @endforeach
            </tr>
            <tr>
                <td><strong>Jumlah Siswa</strong></td>
                <td><strong>:</strong></td>
                <td><strong>{{ $siswa->total() }}</strong></td>
            </tr>
        </table>

    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

    <div class="card-header">
        @foreach ($kelas as $kl)
        <a href="/rekap_absen_siswa/{{ $kl->id_kelas }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        @endforeach
    </div>

    <div class="card-body">

        <table class="table table-responsive">
            <?php $i = 1 ?>
            <tr class="table-dark border-dark text-center">
                <th>NO</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th>Kehadiran</th>
            </tr>
            @foreach ($siswa as $s)
                <form action="/rekap_absen_siswa/{{ $s->id_presensi }}" method="post">
                    @method('put')
                    @csrf

                    <tr class="text-center">
                        <td>{{ $i }}</td>
                        <td>{{ $s->nisn }}</td>
                        <td>{{ $s->nama_siswa }}</td>
                        <td>{{ $s->nama_kelas }}</td>
                        <td>{{ $s->nama_mata_pelajaran }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>
                            <div class="mb-3">
                                <select class="form-select" name="kehadiran" aria-label="Default select example">
                                    @foreach ($kehadiran as $hadir)
                                    <option value="{{ $hadir->kode_kehadiran }}" @selected($s->kehadiran === $hadir->kode_kehadiran)>{{ $hadir->nama_kehadiran }}</option>
                                    @endforeach
                                </select>
                                @error('kehadiran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </td>

                    </tr>
                    <?php $i++ ?>
                @endforeach
                </table>

                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan Presensi</button>
                </div>

        </form>
            Halaman : {{ $siswa->currentPage() }} <br>
            Jumlah Data : {{ $siswa->total() }} <br>
            Data Per Halaman : {{ $siswa->perPage() }}<br><br>


            {{ $siswa->links() }}

            </div>
    </div>

    </div>
@endsection
