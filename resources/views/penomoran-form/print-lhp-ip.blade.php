{{-- resources/views/print/lhp_ip.blade.php --}}
{{-- Route: GET /penomoran-form/{id}/print-lhp-ip --}}
{{--
    Controller contoh:
    public function printLhpIp($id) {
        $penomoran   = \App\Models\Penomoran::findOrFail($id);
        $pemeriksaan = $penomoran->pemeriksaan;   // hasOne
        $uraianBarang= $penomoran->uraianBarang;  // hasMany
        $pib         = $penomoran->pib;           // hasOne
        $pfpd        = $penomoran->pfpd;          // hasOne
        return view('print.lhp_ip', compact('penomoran','pemeriksaan','uraianBarang','pib','pfpd'));
    }
--}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LHP IP – {{ $penomoran->penomoran ?? '' }}</title>
    <style>
        /* ===== RESET & BASE ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            color: #000;
            background: #fff;
        }

        /* ===== PAGE SETUP ===== */
        @page {
            size: A4 portrait;
            margin: 2cm 2.5cm 2cm 3cm;
        }

        .page {
            width: 21cm;
            min-height: 29.7cm;
            margin: 0 auto;
            padding: 1.5cm 2cm 1.5cm 2.5cm;
            background: #fff;
        }

        @media print {
            body { background: #fff; }
            .no-print { display: none !important; }
            .page {
                width: 100%;
                padding: 0;
                margin: 0;
                box-shadow: none;
            }
        }

        /* ===== HEADER KEMENTERIAN ===== */
        .header-instansi {
            text-align: left;
            line-height: 1.4;
            margin-bottom: 4px;
        }
        .header-instansi p {
            font-size: 10.5pt;
        }

        /* ===== JUDUL SURAT ===== */
        .judul-surat {
            text-align: center;
            margin: 12px 0 6px 0;
        }
        .judul-surat p {
            font-size: 12pt;
            font-weight: bold;
            line-height: 1.5;
        }

        /* ===== GARIS BAWAH JUDUL ===== */
        .garis-judul {
            border-top: 2px solid #000;
            margin: 6px 0 12px 0;
        }

        /* ===== INFO SURAT (2 kolom) ===== */
        .info-surat {
            width: 100%;
            margin-bottom: 8px;
        }
        .info-surat table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-surat td {
            padding: 1.5px 0;
            vertical-align: top;
            font-size: 11pt;
        }
        .info-surat .col-label  { width: 34%; }
        .info-surat .col-titik  { width: 3%;  text-align: center; }
        .info-surat .col-value  { width: 63%; }

        /* Divider antara blok kiri dan kanan */
        .info-dua-kolom {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 4px;
        }
        .info-dua-kolom td {
            vertical-align: top;
            padding: 1.5px 0;
            font-size: 11pt;
        }
        .info-dua-kolom .blok-kiri  { width: 47%; }
        .info-dua-kolom .blok-kanan { width: 47%; padding-left: 8px; }
        .info-dua-kolom .blok-pemisah { width: 6%; }

        /* ===== SECTION TITLE ===== */
        .section-title {
            font-size: 11pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 10px 0 4px 0;
        }

        /* ===== TABEL HASIL PEMERIKSAAN ===== */
        .tabel-pemeriksaan {
            width: 100%;
            border-collapse: collapse;
            margin: 6px 0;
            font-size: 10.5pt;
        }
        .tabel-pemeriksaan th,
        .tabel-pemeriksaan td {
            border: 1px solid #000;
            padding: 4px 5px;
            vertical-align: top;
        }
        .tabel-pemeriksaan th {
            text-align: center;
            font-weight: bold;
            font-size: 10.5pt;
        }
        .tabel-pemeriksaan td.center { text-align: center; }

        /* ===== CONTOH & FOTO ===== */
        .contoh-foto {
            width: 100%;
            border-collapse: collapse;
            margin: 6px 0;
        }
        .contoh-foto td {
            font-size: 11pt;
            padding: 1.5px 0;
            vertical-align: top;
        }
        .contoh-foto .col-label { width: 20%; }
        .contoh-foto .col-titik { width: 3%; text-align: center; }
        .contoh-foto .col-value { width: 25%; }
        .contoh-foto .col-spacer { width: 5%; }
        .contoh-foto .col-label2 { width: 12%; }
        .contoh-foto .col-titik2 { width: 3%; text-align: center; }
        .contoh-foto .col-value2 { width: 32%; }

        /* ===== KESIMPULAN ===== */
        .kesimpulan-box {
            margin: 6px 0 12px 0;
        }
        .kesimpulan-box p {
            font-size: 11pt;
            text-align: justify;
            line-height: 1.5;
        }

        /* ===== TTD AREA ===== */
        .ttd-section {
            width: 100%;
            margin-top: 16px;
            border-collapse: collapse;
        }
        .ttd-section td {
            vertical-align: top;
            font-size: 11pt;
            padding: 2px 0;
        }
        .ttd-kiri  { width: 50%; }
        .ttd-kanan { width: 50%; }

        .ttd-item table { width: 100%; border-collapse: collapse; }
        .ttd-item td { font-size: 11pt; padding: 1.5px 0; vertical-align: top; }
        .ttd-item .lbl  { width: 40%; }
        .ttd-item .sep  { width: 5%; text-align: center; }
        .ttd-item .val  { width: 55%; }

        .ttd-nama-jabatan {
            margin-bottom: 4px;
            font-size: 11pt;
        }

        .ttd-kotak {
            height: 60px;
            border-bottom: 1px solid #000;
            width: 180px;
            margin-bottom: 4px;
        }

        /* ===== PRINT BUTTON (non-print only) ===== */
        .print-btn {
            display: inline-block;
            margin: 16px auto;
            padding: 10px 28px;
            background: #1a4d8f;
            color: #fff;
            font-size: 11pt;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }
        .print-btn:hover { background: #153e72; }
        .print-wrapper {
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>

{{-- Tombol Print (tidak muncul saat cetak) --}}
<div class="print-wrapper no-print">
    <button class="print-btn" onclick="window.print()">🖨 Cetak / Print</button>
</div>

<div class="page">

    {{-- ===== KOP SURAT ===== --}}
    <div class="header-instansi">
        <p>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</p>
        <p>DIREKTORAT JENDERAL BEA DAN CUKAI</p>
        <p>KANTOR WILAYAH DJBC ACEH</p>
        <p>KANTOR PENGAWASAN DAN PELAYANAN BEA DAN CUKAI TIPE MADYA PABEAN C BANDA ACEH</p>
    </div>

    <div class="garis-judul"></div>

    {{-- ===== JUDUL ===== --}}
    <div class="judul-surat">
        <p>LAPORAN HASIL PEMERIKSAAN</p>
        <p>BARANG IMPOR BAWAAN PENUMPANG/AWAK SARANA PENGANGKUT</p>
    </div>

    <div style="margin-bottom:10px;"></div>

    {{-- ===== INFO BAGIAN ATAS (Nomor, Tanggal, Dokumen, Nomor Dok) ===== --}}
    <div class="info-surat">
        <table>
            <tr>
                <td class="col-label">Nomor</td>
                <td class="col-titik">:</td>
                <td class="col-value">
                    {{-- Kolom 1 (penomoran) + Kolom 4 (tanggal_pibk format) --}}
                    {{ $penomoran->penomoran ?? '-' }}{{ $penomoran->tanggal_pibk
                        ? \Carbon\Carbon::parse($penomoran->tanggal_pibk)->format('/Y')
                        : '' }}
                </td>
            </tr>
            <tr>
                <td class="col-label">Tanggal</td>
                <td class="col-titik">:</td>
                <td class="col-value">
                    {{ $penomoran->tanggal_pibk
                        ? \Carbon\Carbon::parse($penomoran->tanggal_pibk)->translatedFormat('d F Y')
                        : '-' }}
                </td>
            </tr>
            <tr>
                <td class="col-label">Dokumen</td>
                <td class="col-titik">:</td>
                <td class="col-value">PIBK</td>
            </tr>
            <tr>
                <td class="col-label">Nomor</td>
                <td class="col-titik">:</td>
                <td class="col-value">
                    {{-- nomor PIBK = penomoran + nomor_bc11 --}}
                    {{ $penomoran->penomoran ?? '-' }}{{ optional($penomoran->pib)->nomor_bc11 ? '-' . optional($penomoran->pib)->nomor_bc11 : '' }}
                </td>
            </tr>
        </table>
    </div>

    {{-- ===== INFO DUA KOLOM (Hari/Tgl, Jam Mulai, Selesai, Lokasi, Kemasan, Segel, Barang) ===== --}}
    @php
        $pm   = $penomoran->pemeriksaan;   // relasi hasOne ke tabel pemeriksaan
        $ub   = $penomoran->uraianBarang;  // relasi hasMany  ke tabel uraian_barang (first)
        $ub1  = is_iterable($ub) ? $ub->first() : $ub;
    @endphp

    <table class="info-dua-kolom">
        {{-- Baris 1 --}}
        <tr>
            <td class="blok-kiri">
                <table>
                    <tr>
                        <td style="width:55%">Hari/tanggal</td>
                        <td style="width:5%; text-align:center">:</td>
                        <td>
                            {{ optional($pm)->hari ?? '-' }}
                            /
                            {{ optional($pm)->tanggal
                                ? \Carbon\Carbon::parse($pm->tanggal)->translatedFormat('d F Y')
                                : '-' }}
                        </td>
                    </tr>
                </table>
            </td>
            <td class="blok-pemisah"></td>
            <td class="blok-kanan"></td>
        </tr>
        {{-- Baris 2 --}}
        <tr>
            <td class="blok-kiri">
                <table>
                    <tr>
                        <td style="width:55%">Jam mulai periksa</td>
                        <td style="width:5%; text-align:center">:</td>
                        <td>{{ optional($pm)->jam_mulai_periksa
                            ? \Carbon\Carbon::parse(optional($pm)->jam_mulai_periksa)->format('H:i')
                            : '-' }}</td>
                    </tr>
                </table>
            </td>
            <td class="blok-pemisah"></td>
            <td class="blok-kanan"></td>
        </tr>
        {{-- Baris 3 --}}
        <tr>
            <td class="blok-kiri">
                <table>
                    <tr>
                        <td style="width:55%">Jam selesai periksa</td>
                        <td style="width:5%; text-align:center">:</td>
                        <td>{{ optional($pm)->jam_selesai_periksa
                            ? \Carbon\Carbon::parse(optional($pm)->jam_selesai_periksa)->format('H:i')
                            : '-' }}</td>
                    </tr>
                </table>
            </td>
            <td class="blok-pemisah"></td>
            <td class="blok-kanan"></td>
        </tr>
        {{-- Baris 4 --}}
        <tr>
            <td class="blok-kiri">
                <table>
                    <tr>
                        <td style="width:55%">Lokasi</td>
                        <td style="width:5%; text-align:center">:</td>
                        <td>{{ optional($pm)->lokasi_pemeriksaan ?? '-' }}</td>
                    </tr>
                </table>
            </td>
            <td class="blok-pemisah"></td>
            <td class="blok-kanan"></td>
        </tr>
        {{-- Baris 5 --}}
        <tr>
            <td class="blok-kiri">
                <table>
                    <tr>
                        <td style="width:55%">Jumlah Kemasan yang diperiksa</td>
                        <td style="width:5%; text-align:center">:</td>
                        <td>
                            {{ optional($ub1)->jumlah_kemasan ?? '-' }}
                            {{ optional($ub1)->satuan_kemasan ? '/ ' . $ub1->satuan_kemasan : '' }}
                        </td>
                    </tr>
                </table>
            </td>
            <td class="blok-pemisah"></td>
            <td class="blok-kanan"></td>
        </tr>
        {{-- Baris 6 --}}
        <tr>
            <td class="blok-kiri">
                <table>
                    <tr>
                        <td style="width:55%">Kondisi segel</td>
                        <td style="width:5%; text-align:center">:</td>
                        <td>{{ optional($pm)->kondisi_segel ?? '-' }}</td>
                    </tr>
                </table>
            </td>
            <td class="blok-pemisah"></td>
            <td class="blok-kanan"></td>
        </tr>
        {{-- Baris 7 --}}
        <tr>
            <td class="blok-kiri">
                <table>
                    <tr>
                        <td style="width:55%">Jumlah dan jenis barang yang diperiksa</td>
                        <td style="width:5%; text-align:center">:</td>
                        <td>
                            {{ optional($pm)->jumlah_satuan_barang ?? '-' }}
                            {{ optional($pm)->satuan_barang ? ', ' . $pm->satuan_barang : '' }}
                            {{ optional($ub1)->uraian_barang ? ', ' . $ub1->uraian_barang : '' }}
                        </td>
                    </tr>
                </table>
            </td>
            <td class="blok-pemisah"></td>
            <td class="blok-kanan"></td>
        </tr>
    </table>

    {{-- ===== HASIL PEMERIKSAAN ===== --}}
    <div class="section-title">Hasil Pemeriksaan</div>

    <table class="tabel-pemeriksaan">
        <thead>
            <tr>
                <th style="width:5%">No.</th>
                <th style="width:22%">Jumlah, Jenis, Ukuran Kemasan</th>
                <th style="width:26%">Uraian Barang</th>
                <th style="width:12%">Jumlah satuan Barang</th>
                <th style="width:15%">Spesifikasi</th>
                <th style="width:10%">Negara Asal</th>
                <th style="width:10%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $uraianList = is_iterable($penomoran->uraianBarang) ? $penomoran->uraianBarang : collect([$penomoran->uraianBarang]);
            @endphp
            @forelse($uraianList as $index => $barang)
            <tr>
                <td class="center">{{ $index + 1 }}</td>
                <td>
                    {{-- jumlah_kemasan + jenis_kemasan (dari pemeriksaan) + ukuran_kemasan --}}
                    {{ $barang->jumlah_kemasan ?? '-' }}
                    {{ optional($pm)->jenis_kemasan ? ', ' . $pm->jenis_kemasan : '' }}
                    {{ optional($pm)->ukuran_kemasan ? ', ' . $pm->ukuran_kemasan : '' }}
                </td>
                <td>
                    {{-- Deskripsi dari catatan pemeriksaan atau uraian_barang --}}
                    @if(optional($pm)->catatan)
                        {{ $pm->catatan }}
                    @else
                        {{ $barang->uraian_barang ?? '-' }}
                    @endif
                </td>
                <td class="center">
                    {{ optional($pm)->jumlah_satuan_barang ?? '-' }}
                    {{ optional($pm)->satuan_barang ? ' ' . $pm->satuan_barang : '' }}
                </td>
                <td>{{ optional($pm)->spesifikasi ?? '-' }}</td>
                <td class="center">{{ optional($penomoran->pib)->negara_asal_barang ?? '-' }}</td>
                <td>{{ optional($pm)->keterangan ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td class="center">1</td>
                <td>-</td>
                <td>-</td>
                <td class="center">-</td>
                <td>-</td>
                <td class="center">-</td>
                <td>-</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- ===== CONTOH & FOTO ===== --}}
    <table class="contoh-foto">
        <tr>
            <td class="col-label">Contoh</td>
            <td class="col-titik">:</td>
            <td class="col-value">{{ optional($pm)->contoh ?? '-' }}</td>
            <td class="col-spacer"></td>
            <td class="col-label2">FOTO</td>
            <td class="col-titik2">:</td>
            <td class="col-value2">{{ optional($pm)->foto ?? '-' }}</td>
        </tr>
    </table>

    {{-- ===== KESIMPULAN ===== --}}
    <table style="width:100%; border-collapse:collapse; margin-top:4px;">
        <tr>
            <td style="width:20%; font-size:11pt; vertical-align:top;">Kesimpulan</td>
            <td style="width:3%; text-align:center; vertical-align:top;">:</td>
            <td style="width:77%; font-size:11pt; vertical-align:top;"></td>
        </tr>
    </table>
    <div class="kesimpulan-box">
        <p>
            Jumlah dan jenis barang sesuai pemberitahuan AWB nomor
            {{ optional($penomoran->pib)->nomor_bl_awb ?? '-' }}
            tanggal
            {{ optional($penomoran->pib)->tanggal_bl_awb
                ? \Carbon\Carbon::parse($penomoran->pib->tanggal_bl_awb)->translatedFormat('d F Y')
                : '-' }}
        </p>
    </div>

    {{-- Spacer --}}
    <div style="height: 24px;"></div>

    {{-- ===== LOKASI & TANGGAL ===== --}}
    <p style="font-size:11pt; margin-bottom:2px;">
        {{ optional($ub1)->kota_pibk ?? 'Banda Aceh' }},
        {{ $penomoran->tanggal_pibk
            ? \Carbon\Carbon::parse($penomoran->tanggal_pibk)->translatedFormat('d F Y')
            : '-' }}
    </p>
    <p style="font-size:11pt; margin-bottom:14px;">Pejabat Pemeriksa Barang</p>

    {{-- ===== TANDA TANGAN ===== --}}
    <table class="ttd-section">
        <tr>
            <td class="ttd-kiri">
                {{-- Tanda Tangan Pemeriksa --}}
                <div style="height:60px;"></div>
                <table>
                    <tr>
                        <td style="width:20%; font-size:11pt;">Tanda tangan</td>
                        <td style="width:5%; text-align:center;">:</td>
                        <td style="font-size:11pt;"></td>
                    </tr>
                    <tr>
                        <td style="font-size:11pt;">Nama</td>
                        <td style="text-align:center;">:</td>
                        <td style="font-size:11pt;">
                            <strong>{{ optional($penomoran->pfpd)->nama_pfpd ?? '-' }}</strong>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="ttd-kanan">
                {{-- Kosong / bisa diisi pihak lain --}}
            </td>
        </tr>
    </table>

</div>{{-- end .page --}}

<script>
    // Auto-print jika ada query ?print=1
    if (new URLSearchParams(window.location.search).get('print') === '1') {
        window.onload = () => window.print();
    }
</script>

</body>
</html>