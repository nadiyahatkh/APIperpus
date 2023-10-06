<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Rak;
use App\Models\Anggota;
use App\Models\Petugas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Anggota::create([
            "kode_anggota" => "234567890",
            "nama_anggota" => "Nadiyah Atikah",
            "jk_anggota" => "P",
            "jurusan_anggota" => "AKL",
            "no_telp_anggota" => "081909042380",
            "alamat_anggota" => "Ranco Indah"
           ]);
    
           Anggota::create([
            "kode_anggota" => "123456788",
            "nama_anggota" => "Fadiyah",
            "jk_anggota" => "L",
            "jurusan_anggota" => "RPL",
            "no_telp_anggota" => "0828044560",
            "alamat_anggota" => "Condet"
           ]);
    
           Petugas::create([
            "nama_petugas" => "Ikhsan",
            "jabatan_petugas" => "Kepala Perpus",
            "no_telp_petugas" => "08280842382",
            "alamat_petugas" => "Kebon Pala"
           ]);
    
           Petugas::create([
            "nama_petugas" => "Fadiyah Irbat",
            "jabatan_petugas" => "Operator",
            "no_telp_petugas" => "0827072372",
            "alamat_petugas" => "Condet Budaya"
           ]);
    
    
           Buku::create([
            "kode_buku" => "12345",
            "judul_buku" => "Kisah Fadiyah",
            "penulis_buku" => "Nadiyah",
            "penerbit_buku" => "Gramedia",
            "tahun_penerbit" => "2019",
            "stok" => 32
           ]);
    
           Buku::create([
            "kode_buku" => "12346",
            "judul_buku" => "kisah Nadiyah",
            "penulis_buku" => "Ust Saiful Nazar",
            "penerbit_buku" => "Mizan",
            "tahun_penerbit" => "2022",
            "stok" => 34
           ]);
    
           Rak::create([
             "nama_rak" => "Biografi",
             "lokasi_rak" => "lt-2",
             "buku_id" => 1,
           ]);
    
         
           Rak::create([
            "nama_rak" => "Agama",
            "lokasi_rak" => "lt-3",
            "buku_id" => 2,
          ]);
    
          Peminjaman::create([
            "tanggal_peminjaman" => "2023-10-02",
            "tanggal_kembali" => "2023-10-07",
            "buku_id" => 1,
            "anggota_id" => 1,
            "petugas_id" => 1,
          ]);
    
          Peminjaman::create([
            "tanggal_peminjaman" => "2023-10-01",
            "tanggal_kembali" => "2023-10-04",
            "buku_id" => 2,
            "anggota_id" => 2,
            "petugas_id" => 2,
          ]);
    
          Pengembalian::create([
             "tanggal_pengembalian" => "2023-10-08",
             "denda" => 35000,
             "buku_id" => 1,
             "anggota_id" => 1,
             "petugas_id" => 1
          ]);
    
          Pengembalian::create([
            "tanggal_pengembalian" => "2023-10-04",
            "denda" => 0,
            "buku_id" => 2,
            "anggota_id" => 2,
            "petugas_id" => 2
         ]);
    }
}
