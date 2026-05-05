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
        $allData = Penomoran::with(['diisiBc', 'dataPemberitahuan'])->get();
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
            'nama_barang'          => 'nullable|string',
            'alamat_pengiriman'    => 'nullable|string',
            'identitas_penerima'   => 'nullable|string|max:255',
            'nama_penerima'        => 'nullable|string|max:255',
            'alamat_penerima'      => 'nullable|string',
            'identitas_pemberitahu'=> 'nullable|string|max:255',
            'nama_pemberitahu'     => 'nullable|string|max:255',
            'alamat_pemberitahu'   => 'nullable|string',
            'no_tgl_izin_pjt'      => 'nullable|string|max:255',
            'cara_pengangkut'      => 'nullable|string|max:255',
            'nama_sarana_angkut'   => 'nullable|string|max:255',
            'no_flight'            => 'nullable|string|max:255',
            'pelabuhan_muat'       => 'nullable|string|max:255',
            'pelabuhan_bongkar'    => 'nullable|string|max:255',
        ], [
            'penomoran.unique' => 'Nomor PIBK ini sudah terdaftar di sistem.',
        ]);

        // 2. Simpan ke Database
        $penomoran = Penomoran::create([
            'penomoran'    => $request->penomoran,
            'tanggal_pibk' => $request->tanggal_pibk,
        ]);

        $penomoran->dataPemberitahuan()->create($request->only([
            'nama_barang',
            'alamat_pengiriman',
            'identitas_penerima',
            'nama_penerima',
            'alamat_penerima',
            'identitas_pemberitahu',
            'nama_pemberitahu',
            'alamat_pemberitahu',
            'no_tgl_izin_pjt',
            'cara_pengangkut',
            'nama_sarana_angkut',
            'no_flight',
            'pelabuhan_muat',
            'pelabuhan_bongkar',
        ]));

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
        $data = Penomoran::with(['diisiBc', 'dataPemberitahuan'])->findOrFail($id);
        return view('penomoran.print', compact('data'));
    }

    /**
     * Menampilkan detail data penomoran
     */
    public function show($id)
    {
        $data = Penomoran::with(['diisiBc', 'dataPemberitahuan'])->findOrFail($id);
        return view('penomoran.show', compact('data'));
    }

    /**
     * Menampilkan form untuk mengedit data penomoran
     */
    public function edit($id)
    {
        $data = Penomoran::with(['diisiBc', 'dataPemberitahuan'])->findOrFail($id);
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
            'nama_barang'          => 'nullable|string',
            'alamat_pengiriman'    => 'nullable|string',
            'identitas_penerima'   => 'nullable|string|max:255',
            'nama_penerima'        => 'nullable|string|max:255',
            'alamat_penerima'      => 'nullable|string',
            'identitas_pemberitahu'=> 'nullable|string|max:255',
            'nama_pemberitahu'     => 'nullable|string|max:255',
            'alamat_pemberitahu'   => 'nullable|string',
            'no_tgl_izin_pjt'      => 'nullable|string|max:255',
            'cara_pengangkut'      => 'nullable|string|max:255',
            'nama_sarana_angkut'   => 'nullable|string|max:255',
            'no_flight'            => 'nullable|string|max:255',
            'pelabuhan_muat'       => 'nullable|string|max:255',
            'pelabuhan_bongkar'    => 'nullable|string|max:255',
        ], [
            'penomoran.unique' => 'Nomor PIBK ini sudah terdaftar di sistem.',
        ]);

        // 2. Cari dan Update Data
        $data = Penomoran::findOrFail($id);
        $data->update([
            'penomoran'    => $request->penomoran,
            'tanggal_pibk' => $request->tanggal_pibk,
        ]);

        $data->dataPemberitahuan()->updateOrCreate(
            ['penomoran_id' => $data->id],
            $request->only([
                'nama_barang',
                'alamat_pengiriman',
                'identitas_penerima',
                'nama_penerima',
                'alamat_penerima',
                'identitas_pemberitahu',
                'nama_pemberitahu',
                'alamat_pemberitahu',
                'no_tgl_izin_pjt',
                'cara_pengangkut',
                'nama_sarana_angkut',
                'no_flight',
                'pelabuhan_muat',
                'pelabuhan_bongkar',
            ])
        );

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