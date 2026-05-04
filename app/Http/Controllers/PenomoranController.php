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
        $allData = Penomoran::with('diisiBc')->get();
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
            'penomoran'      => 'required|string|unique:penomoran,penomoran',
            'tanggal_pibk'   => 'required|date',
            'nama_pfpd'      => 'nullable|string|max:255',
            'nip_pfpd'       => 'nullable|string|max:255',
            'nomor_bc11'     => 'nullable|string|max:255',
            'nomor_pos'      => 'nullable|string|max:255',
            'invoice'        => 'nullable|string|max:255',
            'tanggal_invoice'=> 'nullable|date',
            'nomor_bl_awb'   => 'nullable|string|max:255',
            'tanggal_bl_awb' => 'nullable|date',
            'negara_asal'    => 'nullable|string|max:255',
            'valuta'         => 'nullable|string|max:5',
            'fob'            => 'nullable|numeric',
            'freight'        => 'nullable|numeric',
            'asuransi'       => 'nullable|numeric',
            'nilai_cif'      => 'nullable|numeric',
        ], [
            'penomoran.unique' => 'Nomor PIBK ini sudah terdaftar di sistem.',
        ]);

        // 2. Simpan ke Database
        $penomoran = Penomoran::create([
            'penomoran'    => $request->penomoran,
            'tanggal_pibk' => $request->tanggal_pibk,
            'nama_pfpd'    => $request->nama_pfpd,
            'nip_pfpd'     => $request->nip_pfpd,
        ]);

        $penomoran->diisiBc()->create($request->only([
            'nomor_bc11',
            'nomor_pos',
            'invoice',
            'tanggal_invoice',
            'nomor_bl_awb',
            'tanggal_bl_awb',
            'negara_asal',
            'valuta',
            'fob',
            'freight',
            'asuransi',
            'nilai_cif',
        ]));

        // 3. Redirect kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('penomoran.index')->with('success', 'Data penomoran berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman cetak untuk satu data penomoran
     */
    public function print($id)
    {
        $data = Penomoran::with('diisiBc')->findOrFail($id);
        return view('penomoran.print', compact('data'));
    }

    /**
     * Menampilkan detail data penomoran
     */
    public function show($id)
    {
        $data = Penomoran::with('diisiBc')->findOrFail($id);
        return view('penomoran.show', compact('data'));
    }

    /**
     * Menampilkan form untuk mengedit data penomoran
     */
    public function edit($id)
    {
        $data = Penomoran::with('diisiBc')->findOrFail($id);
        return view('penomoran.edit', compact('data'));
    }

    /**
     * Memperbarui data penomoran di database
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi Input
        $request->validate([
            'penomoran'      => 'required|string|unique:penomoran,penomoran,' . $id,
            'tanggal_pibk'   => 'required|date',
            'nama_pfpd'      => 'nullable|string|max:255',
            'nip_pfpd'       => 'nullable|string|max:255',
            'nomor_bc11'     => 'nullable|string|max:255',
            'nomor_pos'      => 'nullable|string|max:255',
            'invoice'        => 'nullable|string|max:255',
            'tanggal_invoice'=> 'nullable|date',
            'nomor_bl_awb'   => 'nullable|string|max:255',
            'tanggal_bl_awb' => 'nullable|date',
            'negara_asal'    => 'nullable|string|max:255',
            'valuta'         => 'nullable|string|max:5',
            'fob'            => 'nullable|numeric',
            'freight'        => 'nullable|numeric',
            'asuransi'       => 'nullable|numeric',
            'nilai_cif'      => 'nullable|numeric',
        ], [
            'penomoran.unique' => 'Nomor PIBK ini sudah terdaftar di sistem.',
        ]);

        // 2. Cari dan Update Data
        $data = Penomoran::findOrFail($id);
        $data->update([
            'penomoran'    => $request->penomoran,
            'tanggal_pibk' => $request->tanggal_pibk,
            'nama_pfpd'    => $request->nama_pfpd,
            'nip_pfpd'     => $request->nip_pfpd,
        ]);

        $data->diisiBc()->updateOrCreate(
            ['penomoran_id' => $data->id],
            $request->only([
                'nomor_bc11',
                'nomor_pos',
                'invoice',
                'tanggal_invoice',
                'nomor_bl_awb',
                'tanggal_bl_awb',
                'negara_asal',
                'valuta',
                'fob',
                'freight',
                'asuransi',
                'nilai_cif',
            ])
        );

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