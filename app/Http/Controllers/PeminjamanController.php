<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamanData = Peminjaman::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Data",
            "data" => $peminjamanData
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data =$request->all();
        Peminjaman::create([
            "tanggal_peminjaman" => $request->tanggal_peminjaman,
            "tanggal_kembali" => $request->tanggal_kembali,
            "buku_id" => $request->buku_id,
            "anggota_id" => $request->anggota_id,
            "petugas_id" => $request->petugas_id
        ]);
        
        if(!$data) return response()->json([
            "Message" => "Gagal membuat data"
        ],500);
        return response()->json([
            "Message" => "Berhasil Membuat data",
            "Data" => $data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Peminjaman::find($id);

        if(!$data) return response()->json([
            "message" => "Tidak Menemukan Data Peminjaman"
        ],500);

        return response()->json([
            "message" => "Berhasil Menemukan Data Peminjaman",
            "data" => $data
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Peminjaman::find($id);
        $updatedData = $data->update([
            "tanggal_peminjaman" => $request->tanggal_peminjaman,
            "tanggal_kembali" => $request->tanggal_kembali,
            "buku_id" => $request->buku_id,
            "anggota_id" => $request->anggota_id,
            "petugas_id" => $request->petugas_id
        ]);

        if(!$updatedData) return response()->json([
             "Message" => "Gagal Mengupdate Data Peminjaman"
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data Peminjaman",
            "data" => $updatedData
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataToDelete = Peminjaman::findOrFail($id);
        $deleteProced = $dataToDelete->delete();
        
        if(!$deleteProced) return response()->json([
          "Message" => "Gagal Menghapus Data Peminjaman!"
        ],500);

        return response()->json([
           "Message" => "Berhasil Menghapus Data Peminjaman!"
        ],200);

    }
}
