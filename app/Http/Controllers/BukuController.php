<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookData = Buku::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Buku",
            "data" => $bookData
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        Buku::create([
            "kode_buku" => $request->kode_buku,
            "judul_buku" => $request->judul_buku,
            "penulis_buku" => $request->penulis_buku,
            "penerbit_buku" => $request->penerbit_buku,
            "tahun_penerbit" => $request->tahun_penerbit,
            "stok" => $request->stok
        ]);
        
        if(!$data) return response()->json([
            "Message" => "Gagal membuat"
        ],500);
        return response()->json([
            "Message" => "Berhasil Membuat Buku",
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
        $data = Buku::find($id);

        if(!$data) return response()->json([
            "message" => "Tidak Menemukan Data"
        ],500);

        return response()->json([
            "message" => "Berhasil Menemukan Data",
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
        $data = Buku::find($id);
        $updateData = $data->update([
            "kode_buku" => $request->kode_buku,
            "judul_buku" => $request->judul_buku,
            "penulis_buku" => $request->penulis_buku,
            "penerbit_buku" => $request->penerbit_buku,
            "tahun_penerbit" => $request->tahun_penerbit,
            "stok" => $request->stok,
        ]);

        if(!$updateData) return response()->json([
            "Message" => "Gagal Mengupdate Data",
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data",
            "data" => $updateData
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataToDelete = Buku::findOrFail($id);
        $deleteProced = $dataToDelete->delete();

        if(!$deleteProced) return response()->json([
            "message" => "Gagal menghapus",
        ],500);

        return response()->json([
            "message" => "Berhasil menghapus"
        ],200);
    }
}
