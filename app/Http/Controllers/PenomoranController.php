<?php

namespace App\Http\Controllers;

use App\Models\Penomoran; 
use Illuminate\Http\Request;

class PenomoranController extends Controller
{
    /**
     * Menampilkan daftar semua data penomoran (Halaman Index)
     */
    public function index()
    {
        $allData = Penomoran::all();
        return view('penomoran.index', compact('allData'));
    }

    /**
     * Menampilkan form untuk menambah data baru (Halaman Create)
     */
    public function create()
    {
        return view('penomoran.create'); 
    }

    /**
     * Menyimpan data yang dikirim dari form ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'penomoran'    => 'required|string|unique:penomoran,penomoran',
            'tanggal_pibk' => 'required|date',
        ], [
            // Pesan error kustom (opsional)
            'penomoran.unique' => 'Nomor PIBK ini sudah terdaftar di sistem.',
        ]);

        // 2. Simpan ke Database
        Penomoran::create([
            'penomoran'    => $request->penomoran,
            'tanggal_pibk' => $request->tanggal_pibk,
        ]);

        // 3. Redirect kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('penomoran.index')->with('success', 'Data penomoran berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman cetak untuk satu data penomoran
     */
    public function print($id)
    {
        $data = Penomoran::findOrFail($id);
        return view('penomoran.print', compact('data'));
    }

    /**
     * Menampilkan detail data penomoran
     */
    public function show($id)
    {
        $data = Penomoran::findOrFail($id);
        return view('penomoran.show', compact('data'));
    }

    /**
     * Menampilkan form untuk mengedit data penomoran
     */
    public function edit($id)
    {
        $data = Penomoran::findOrFail($id);
        return view('penomoran.edit', compact('data'));
    }

    /**
     * Memperbarui data penomoran di database
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi Input
        $request->validate([
            'penomoran'    => 'required|string|unique:penomoran,penomoran,' . $id,
            'tanggal_pibk' => 'required|date',
        ], [
            'penomoran.unique' => 'Nomor PIBK ini sudah terdaftar di sistem.',
        ]);

        // 2. Cari dan Update Data
        $data = Penomoran::findOrFail($id);
        $data->update([
            'penomoran'    => $request->penomoran,
            'tanggal_pibk' => $request->tanggal_pibk,
        ]);

        // 3. Redirect kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('penomoran.index')->with('success', 'Data penomoran berhasil diperbarui!');
    }

    /**
     * Menghapus data penomoran dari database
     */
    public function destroy($id)
    {
        $data = Penomoran::findOrFail($id);
        $data->delete();

        // Redirect kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('penomoran.index')->with('success', 'Data penomoran berhasil dihapus!');
    }
}