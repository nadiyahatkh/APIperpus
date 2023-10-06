<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamanData = Pengembalian::all();
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
        Pengembalian::create([
            "tanggal_pengembalian" => $request->tanggal_pengembalian,
            "denda" => $request->denda,
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
        $data = Pengembalian::find($id);

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
        $data = Pengembalian::find($id);
        $updatedData = $data->update([
            "tanggal_pengembalian" => $request->tanggal_pengembalian,
            "denda" => $request->denda,
            "buku_id" => $request->buku_id,
            "anggota_id" => $request->anggota_id,
            "petugas_id" => $request->petugas_id
        ]);

        if(!$updatedData) return response()->json([
             "Message" => "Gagal Mengupdate Data Pengembalian"
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data Pengembalian",
            "data" => $updatedData
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataToDelete = Pengembalian::findOrFail($id);
        $deleteProced = $dataToDelete->delete();
        
        if(!$deleteProced) return response()->json([
          "Message" => "Gagal Menghapus Data Pengembalian!"
        ],500);

        return response()->json([
           "Message" => "Berhasil Menghapus Data Pengembalian!"
        ],200);

    }
}
