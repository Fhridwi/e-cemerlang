<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPembayaran;

class KategoriPembayaranController extends Controller
{
    public function index()
    {
        return response()->json(KategoriPembayaran::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|unique:kategori_pembayarans,nama',
            'nominal' => 'required|numeric|min:0',
            'periode' => 'required|string|in:bulanan,semester,tahunan'
        ]);

        $kategori = KategoriPembayaran::create($request->all());

        return response()->json([
            'message' => 'Kategori pembayaran berhasil ditambahkan',
            'data' => $kategori
        ], 201);
    }

    public function show(KategoriPembayaran $kategoriPembayaran)
    {
        return response()->json($kategoriPembayaran);
    }

    public function update(Request $request, KategoriPembayaran $kategoriPembayaran)
    {
        $request->validate([
            'nama' => 'sometimes|string|unique:kategori_pembayarans,nama,' . $kategoriPembayaran->id,
            'nominal' => 'sometimes|numeric|min:0',
            'periode' => 'sometimes|string|in:bulanan,semester,tahunan'
        ]);

        $kategoriPembayaran->update($request->all());

        return response()->json([
            'message' => 'Kategori pembayaran berhasil diperbarui',
            'data' => $kategoriPembayaran
        ]);
    }

    public function destroy(KategoriPembayaran $kategoriPembayaran)
    {
        $kategoriPembayaran->delete();

        return response()->json(['message' => 'Kategori pembayaran berhasil dihapus']);
    }
}
