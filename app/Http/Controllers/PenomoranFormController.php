<?php

namespace App\Http\Controllers;

use App\Models\Penomoran;
use App\Models\Pengirim;
use App\Models\Penerima;
use App\Models\Pemberitahu;
use App\Models\SuratIzin;
use App\Models\Pengangkutan;
use App\Models\Pib;
use App\Models\UraianBarang;
use App\Models\Pfpd;
use App\Models\Pemeriksa;
use App\Models\Jaminan;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenomoranFormController extends Controller
{
    // Halaman 1: Penomoran
    public function page1($id = null)
    {
        if ($id) {
            $penomoran = Penomoran::findOrFail($id);
        } else {
            $penomoran = new Penomoran();
        }
        return view('penomoran-form.page1', ['penomoran' => $penomoran, 'id' => $id]);
    }

    // Halaman 2: Pengirim & Penerima
    public function page2($id)
    {
        $penomoran = Penomoran::findOrFail($id);
        $pengirim = $penomoran->pengirim ?? new Pengirim();
        $penerima = $penomoran->penerima ?? new Penerima();
        
        return view('penomoran-form.page2', [
            'penomoran' => $penomoran,
            'pengirim' => $pengirim,
            'penerima' => $penerima
        ]);
    }

    // Halaman 3: Pemberitahu & Surat Izin
    public function page3($id)
    {
        $penomoran = Penomoran::findOrFail($id);
        $pemberitahu = $penomoran->pemberitahu ?? new Pemberitahu();
        $suratIzin = $penomoran->suratIzin ?? new SuratIzin();
        
        return view('penomoran-form.page3', [
            'penomoran' => $penomoran,
            'pemberitahu' => $pemberitahu,
            'suratIzin' => $suratIzin
        ]);
    }

    // Halaman 4: Pengangkutan
    public function page4($id)
    {
        $penomoran = Penomoran::findOrFail($id);
        $pengangkutan = $penomoran->pengangkutan ?? new Pengangkutan();
        
        return view('penomoran-form.page4', [
            'penomoran' => $penomoran,
            'pengangkutan' => $pengangkutan
        ]);
    }

    // Halaman 5: PIB
    public function page5($id)
    {
        $penomoran = Penomoran::findOrFail($id);
        $pib = $penomoran->pib ?? new Pib();
        
        return view('penomoran-form.page5', [
            'penomoran' => $penomoran,
            'pib' => $pib
        ]);
    }

    // Halaman 6: Uraian Barang
    public function page6($id)
    {
        $penomoran = Penomoran::findOrFail($id);
        $uraianBarangs = $penomoran->uraianBarangs;
        
        return view('penomoran-form.page6', [
            'penomoran' => $penomoran,
            'uraianBarangs' => $uraianBarangs
        ]);
    }

    // Halaman 7: Pemeriksaan
    public function page7($id)
    {
        $penomoran = Penomoran::findOrFail($id);
        $pemeriksaan = $penomoran->pemeriksaan ?? new Pemeriksaan();
        
        return view('penomoran-form.page7', [
            'penomoran' => $penomoran,
            'pemeriksaan' => $pemeriksaan
        ]);
    }

    // Halaman 8: Petugas & Jaminan
    public function page8($id)
    {
        $penomoran = Penomoran::findOrFail($id);
        $pfpd = $penomoran->pfpd ?? new Pfpd();
        $pemeriksa = $penomoran->pemeriksa ?? new Pemeriksa();
        $jaminan = $penomoran->jaminan ?? new Jaminan();
        
        return view('penomoran-form.page8', [
            'penomoran' => $penomoran,
            'pfpd' => $pfpd,
            'pemeriksa' => $pemeriksa,
            'jaminan' => $jaminan
        ]);
    }

    // Halaman 9: Review Data
    public function page9($id)
    {
        $penomoran = Penomoran::with([
            'pengirim',
            'penerima',
            'pemberitahu',
            'suratIzin',
            'pengangkutan',
            'pib',
            'uraianBarangs',
            'pfpd',
            'pemeriksa',
            'jaminan',
            'pemeriksaan'
        ])->findOrFail($id);
        
        return view('penomoran-form.page9', ['penomoran' => $penomoran]);
    }

    // Simpan Halaman 1
    public function savePage1(Request $request)
    {
        $validated = $request->validate([
            'penomoran' => 'required|string|unique:penomoran,penomoran,' . $request->id,
            'tanggal_pibk' => 'required|date',
        ]);

        if ($request->id) {
            $penomoran = Penomoran::findOrFail($request->id);
            $penomoran->update($validated);
        } else {
            $penomoran = Penomoran::create($validated);
        }

        return redirect()->route('penomoran-form.page2', $penomoran->id);
    }

    // Simpan Halaman 2
    public function savePage2(Request $request, $id)
    {
        $penomoran = Penomoran::findOrFail($id);

        $validated = $request->validate([
            'nama_pengirim' => 'required|string',
            'alamat_pengirim' => 'required|string',
            'jenis_identitas_penerima' => 'required|string',
            'identitas_penerima' => 'required|string',
            'nama_penerima' => 'required|string',
            'alamat_penerima' => 'required|string',
        ]);

        $pengirim = $penomoran->pengirim ?? new Pengirim();
        $pengirim->penomoran_id = $id;
        $pengirim->fill([
            'nama_pengirim' => $validated['nama_pengirim'],
            'alamat_pengirim' => $validated['alamat_pengirim'],
        ])->save();

        $penerima = $penomoran->penerima ?? new Penerima();
        $penerima->penomoran_id = $id;
        $penerima->fill([
            'jenis_identitas_penerima' => $validated['jenis_identitas_penerima'],
            'identitas_penerima' => $validated['identitas_penerima'],
            'nama_penerima' => $validated['nama_penerima'],
            'alamat_penerima' => $validated['alamat_penerima'],
        ])->save();

        return redirect()->route('penomoran-form.page3', $id);
    }

    // Simpan Halaman 3
    public function savePage3(Request $request, $id)
    {
        $penomoran = Penomoran::findOrFail($id);

        $validated = $request->validate([
            'identitas_pemberitahu' => 'required|string',
            'nama_pemberitahu' => 'required|string',
            'alamat_pemberitahu' => 'required|string',
            'nomor_surat_izin_pjt_ppjk' => 'required|string',
            'tanggal_surat_izin_pjt_ppjk' => 'required|date',
        ]);

        $pemberitahu = $penomoran->pemberitahu ?? new Pemberitahu();
        $pemberitahu->penomoran_id = $id;
        $pemberitahu->fill([
            'identitas_pemberitahu' => $validated['identitas_pemberitahu'],
            'nama_pemberitahu' => $validated['nama_pemberitahu'],
            'alamat_pemberitahu' => $validated['alamat_pemberitahu'],
        ])->save();

        $suratIzin = $penomoran->suratIzin ?? new SuratIzin();
        $suratIzin->penomoran_id = $id;
        $suratIzin->fill([
            'nomor_surat_izin_pjt_ppjk' => $validated['nomor_surat_izin_pjt_ppjk'],
            'tanggal_surat_izin_pjt_ppjk' => $validated['tanggal_surat_izin_pjt_ppjk'],
        ])->save();

        return redirect()->route('penomoran-form.page4', $id);
    }

    // Simpan Halaman 4
    public function savePage4(Request $request, $id)
    {
        $penomoran = Penomoran::findOrFail($id);

        $validated = $request->validate([
            'cara_pengangkutan' => 'required|in:udara,laut,darat',
            'nama_sarkut' => 'required|string',
            'no_flight' => 'required|string',
            'pelabuhan_muat' => 'required|string',
            'pelabuhan_bongkar' => 'required|string',
        ]);

        $pengangkutan = $penomoran->pengangkutan ?? new Pengangkutan();
        $pengangkutan->penomoran_id = $id;
        $pengangkutan->fill($validated)->save();

        return redirect()->route('penomoran-form.page5', $id);
    }

    // Simpan Halaman 5
    public function savePage5(Request $request, $id)
    {
        $penomoran = Penomoran::findOrFail($id);

        $validated = $request->validate([
            'nomor_bc11' => 'required|string',
            'tanggal_bc11' => 'required|date',
            'nomor_pos' => 'required|string',
            'invoice' => 'required|string',
            'tanggal_invoice' => 'required|date',
            'nomor_bl_awb' => 'required|string',
            'tanggal_bl_awb' => 'required|date',
            'negara_asal_barang' => 'required|string',
            'valuta' => 'required|string|max:5',
            'fob' => 'required|numeric',
            'freight' => 'required|numeric',
            'asuransi' => 'required|numeric',
            'nilai_cif' => 'required|numeric',
        ]);

        $pib = $penomoran->pib ?? new Pib();
        $pib->penomoran_id = $id;
        $pib->fill($validated)->save();

        return redirect()->route('penomoran-form.page6', $id);
    }

    // Simpan Halaman 6: Uraian Barang
    public function savePage6(Request $request, $id)
    {
        $penomoran = Penomoran::findOrFail($id);

        $validated = $request->validate([
            'uraian_barang' => 'required|array',
            'uraian_barang.*' => 'required|string',
            'jumlah_kemasan' => 'required|array',
            'jumlah_kemasan.*' => 'required|numeric',
            'berat' => 'required|array',
            'berat.*' => 'required|numeric',
            'nilai_cif' => 'required|array',
            'nilai_cif.*' => 'required|numeric',
            'kota_pibk' => 'required|array',
            'kota_pibk.*' => 'required|string',
            'pemberitahu' => 'required|array',
            'pemberitahu.*' => 'required|string',
            'np' => 'required|array',
            'np.*' => 'required|string',
            'pos_tarif_hs' => 'required|array',
            'pos_tarif_hs.*' => 'required|string',
            'ndpbm' => 'required|array',
            'ndpbm.*' => 'required|numeric',
            'dalam_rupiah' => 'required|array',
            'dalam_rupiah.*' => 'required|numeric',
            'bm' => 'required|array',
            'bm.*' => 'required|numeric',
            'cukai' => 'required|array',
            'cukai.*' => 'required|numeric',
            'ppn' => 'required|array',
            'ppn.*' => 'required|numeric',
            'ppnbm' => 'required|array',
            'ppnbm.*' => 'required|numeric',
            'pph' => 'required|array',
            'pph.*' => 'required|numeric',
            'total' => 'required|array',
            'total.*' => 'required|numeric',
        ]);

        // Hapus uraian barang lama
        UraianBarang::where('penomoran_id', $id)->delete();

        // Simpan uraian barang baru
        for ($i = 0; $i < count($validated['uraian_barang']); $i++) {
            UraianBarang::create([
                'penomoran_id' => $id,
                'uraian_barang' => $validated['uraian_barang'][$i],
                'jumlah_kemasan' => $validated['jumlah_kemasan'][$i],
                'berat' => $validated['berat'][$i],
                'nilai_cif' => $validated['nilai_cif'][$i],
                'kota_pibk' => $validated['kota_pibk'][$i],
                'pemberitahu' => $validated['pemberitahu'][$i],
                'np' => $validated['np'][$i],
                'pos_tarif_hs' => $validated['pos_tarif_hs'][$i],
                'ndpbm' => $validated['ndpbm'][$i],
                'dalam_rupiah' => $validated['dalam_rupiah'][$i],
                'bm' => $validated['bm'][$i],
                'cukai' => $validated['cukai'][$i],
                'ppn' => $validated['ppn'][$i],
                'ppnbm' => $validated['ppnbm'][$i],
                'pph' => $validated['pph'][$i],
                'total' => $validated['total'][$i],
            ]);
        }

        return redirect()->route('penomoran-form.page7', $id);
    }

    // Simpan Halaman 7
    public function savePage7(Request $request, $id)
    {
        $penomoran = Penomoran::findOrFail($id);

        $validated = $request->validate([
            'hari' => 'required|string',
            'tanggal' => 'required|date',
            'nama' => 'required|string',
            'contoh' => 'required|string',
            'foto' => 'nullable|string',
            'catatan' => 'nullable|string',
            'jam_mulai_periksa' => 'required|date_format:H:i',
            'jam_selesai_periksa' => 'required|date_format:H:i',
            'lokasi_pemeriksaan' => 'required|string',
            'kondisi_segel' => 'required|string',
            'jumlah_satuan_barang' => 'required|numeric',
            'jenis_kemasan' => 'required|string',
            'ukuran_kemasan' => 'required|string',
            'spesifikasi' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $pemeriksaan = $penomoran->pemeriksaan ?? new Pemeriksaan();
        $pemeriksaan->penomoran_id = $id;
        $pemeriksaan->fill($validated)->save();

        return redirect()->route('penomoran-form.page8', $id);
    }

    // Simpan Halaman 8
    public function savePage8(Request $request, $id)
    {
        $penomoran = Penomoran::findOrFail($id);

        $validated = $request->validate([
            'nama_pfpd' => 'required|string',
            'nip_pfpd' => 'required|string',
            'nama_pemeriksa' => 'required|string',
            'nip_pemeriksa' => 'required|string',
            'pembayaran' => 'required|string',
            'jaminan' => 'required|string',
            'pejabat_penerima' => 'required|string',
        ]);

        $pfpd = $penomoran->pfpd ?? new Pfpd();
        $pfpd->penomoran_id = $id;
        $pfpd->fill([
            'nama_pfpd' => $validated['nama_pfpd'],
            'nip_pfpd' => $validated['nip_pfpd'],
        ])->save();

        $pemeriksa = $penomoran->pemeriksa ?? new Pemeriksa();
        $pemeriksa->penomoran_id = $id;
        $pemeriksa->fill([
            'nama_pemeriksa' => $validated['nama_pemeriksa'],
            'nip_pemeriksa' => $validated['nip_pemeriksa'],
        ])->save();

        $jaminan = $penomoran->jaminan ?? new Jaminan();
        $jaminan->penomoran_id = $id;
        $jaminan->fill([
            'pembayaran' => $validated['pembayaran'],
            'jaminan' => $validated['jaminan'],
            'pejabat_penerima' => $validated['pejabat_penerima'],
        ])->save();

        return redirect()->route('penomoran-form.page9', $id);
    }

    // Simpan Halaman 9 (Final Save)
    public function savePage9(Request $request, $id)
    {
        $penomoran = Penomoran::findOrFail($id);
        
        // Update any changes from page9 (edit mode)
        $validated = $request->validate([
            'penomoran' => 'required|string|unique:penomoran,penomoran,' . $id,
            'tanggal_pibk' => 'required|date',
        ]);

        $penomoran->update($validated);

        return redirect()->route('penomoran-form.list')->with('success', 'Data berhasil disimpan');
    }

    // Halaman List
    public function list()
    {
        $pnomorans = Penomoran::paginate(10);
        return view('penomoran-form.list', ['pnomorans' => $pnomorans]);
    }

    // Read/Show
    public function show($id)
    {
        return $this->page9($id);
    }

    // Print
    public function print($id)
    {
        $penomoran = Penomoran::with([
            'pengirim',
            'penerima',
            'pemberitahu',
            'suratIzin',
            'pengangkutan',
            'pib',
            'uraianBarangs',
            'pfpd',
            'pemeriksa',
            'jaminan',
            'pemeriksaan'
        ])->findOrFail($id);
        
        return view('penomoran-form.print', ['penomoran' => $penomoran]);
    }

    // Delete
    public function destroy($id)
    {
        try {
            $penomoran = Penomoran::findOrFail($id);
            $penomoran->delete();
            
            return redirect()->route('penomoran-form.list')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('penomoran-form.list')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    // Kembali ke halaman sebelumnya
    public function back($id, $page)
    {
        $page = (int)$page;
        if ($page > 1) {
            $prevPage = $page - 1;
            if ($prevPage == 1) {
                return redirect()->route('penomoran-form.edit', $id);
            } else {
                return redirect()->route('penomoran-form.page' . $prevPage, $id);
            }
        }
        return redirect()->route('penomoran-form.list');
    }
}
