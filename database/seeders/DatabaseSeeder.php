<?php

namespace Database\Seeders;

use App\Models\guru;
use App\Models\informasi;
use App\Models\jadwal_mengajar;
use App\Models\jurusan;
use App\Models\kehadiran;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'username' => 'admin',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('admin'),
            'level' => 'admin'
        ]);

        User::create([
            'username' => 'Ilham,S.Kom',
            'nip' => '9999',
            'email' => 'ilhamuntung1902@gmail.com',
            'password' => bcrypt('101000'),
            'level' => 'guru'
        ]);

        User::create([
            'username' => 'wahyu',
            'nisn' => '123456',
            'kelas' => 'KL-001',
            'email' => 'wahyu123@gmail.com',
            'password' => bcrypt('wahyu'),
            'level' => 'siswa'
        ]);

        informasi::create([
            'judul' => 'PEMBAYARAN BIAYA SEKOLAH SEMESTER GANJIL TA.2021/2022',
            'isi' => '<div><strong>Assalamualaikum Wr.Wb.<br>&nbsp; &nbsp; &nbsp;</strong>Memperhatikan kalender akademik tahun 2021/2022, bahswa pelaksanaan <strong>Ujian Tengah Semester (UTS) Ganjil TA 2021/2022 </strong>akan dilaksanakan tanggal <strong>06 s/d 12 Desember 2021</strong>. Untuk itu perlu kami informasikan kepada seluruh siswa terkait dengan pembayaran biaya sekolah:<br><br></div><ol><li>Salah satu syarat untuk mengikuti <strong>UTS </strong>adalah melunasi seluruh biaya sekolah Semester Ganjil T.A.2021/2022 (termasuk tunggakan semester sebelumnya), apabila belum bisa melunasinya,minimal adalah melakukan pembayaran 50% dari tagihan semester berjalan.</li><li>Pembayaran biaya semester ganjil 2021/2022 paling lambat tanggal <strong>30 November 2021</strong> via Setor Tunai atau transfer bank dengan beberapa alternatif sebagai berikut:<ul><li><strong>BRI </strong>dengan <strong>Nomor Rek: 0261.02.000.722.30.8 atas nama : SMK EKUIN PANGERAN JAYAKARTA </strong>dengan <strong>kode BRI : 002;</strong></li></ul></li><li>Bukti Transfer diserahkan ke kasir atau dikirim via <em>Whatsapp </em>ke <strong>081226560805,</strong> dengan mencantumkan <strong>Nama Lengkap + Kelas </strong>pada bukti Transfer untuk ditukar dengan kwitansi pembayaran.</li></ol><div>Demikian info yang saya dapat sampaikan. Atas perhatiannya terimakasih.<br><strong><em>Billahitaufiq Wal Hidayah<br>Wassalamualaikum Wr.Wb</em></strong></div><div><br></div>',
            'tanggal_buat' => 'Bekasi, 17 November 2021',
            'nama_kepsek' => 'Sofyan Sauri,S.pdi'
        ]);

        kelas::create([
            'kode_kelas' => 'KL-001',
            'nama_kelas' => '10 TKJ A'
        ]);
        kelas::create([
            'kode_kelas' => 'KL-002',
            'nama_kelas' => '10 TKJ B'
        ]);

        mapel::create([
            'kode_mata_pelajaran' => 'MP-001',
            'nama_mata_pelajaran' => 'Bahasa Indonesia'
        ]);

        siswa::create([
            'NISN' => 123456,
            'nama' => 'wahyu',
            'tempat_lahir' => 'Padang',
            'tanggal_lahir' => '10 Oktober 2000',
            'email' => 'wahyu123@gmail.com',
            'alamat' => 'jl.Albahar bekasi utara kota bekasi',
            'tahun_masuk' => '2022',
            'kode_kelas' => 'KL-001'
        ]);

        guru::create([
            'nip' => '9999',
            'nama' => 'Ilham,S.Kom',
            'tempat_lahir' => 'Padang',
            'tanggal_lahir' => '10 Oktober 2000',
            'no_wa' => '081226560805',
            'email' => 'ilhamuntung1902@gmail.com',
            'alamat' => 'jl.Albahar bekasi utara kota bekasi',
            'jabatan' => 'guru'
        ]);

        jurusan::create([
            'kode_jurusan' => 'JR-001',
            'nama_jurusan' => 'Akutansi'
        ]);

        jurusan::create([
            'kode_jurusan' => 'JR-002',
            'nama_jurusan' => 'Teknik Komputer & Jaringan'
        ]);

        kehadiran::create([
            'kode_kehadiran' => 'OP-001',
            'nama_kehadiran' => 'Hadir'
        ]);
        kehadiran::create([
            'kode_kehadiran' => 'OP-002',
            'nama_kehadiran' => 'Izin'
        ]);        kehadiran::create([
            'kode_kehadiran' => 'OP-003',
            'nama_kehadiran' => 'Sakit'
        ]);        kehadiran::create([
            'kode_kehadiran' => 'OP-004',
            'nama_kehadiran' => 'Tidak Hadir'
        ]);

    }
}
