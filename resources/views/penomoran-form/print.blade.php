<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PIBK - {{ $penomoran->penomoran }}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 10mm;
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 11pt;
            color: #000;
        }
        .no-print {
            display: block;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
        .action-buttons {
            text-align: center;
            margin: 16px 0;
        }
        .action-buttons button {
            cursor: pointer;
            border: 1px solid #444;
            background: #f4f4f4;
            color: #000;
            padding: 8px 14px;
            margin: 0 4px;
            border-radius: 4px;
            font-size: 10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .table-border th,
        .table-border td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }
        .table-border th {
            font-weight: bold;
            text-align: left;
        }
        .header-title {
            text-align: center;
            font-weight: bold;
            font-size: 14pt;
            margin-bottom: 4px;
        }
        .header-subtitle {
            text-align: center;
            font-size: 9pt;
            font-weight: bold;
            line-height: 1.3;
            margin: 0;
        }
        .subsection-title {
            font-weight: bold;
            font-size: 10pt;
            padding: 6px 0;
            margin: 10px 0 4px;
        }
        .field-label {
            font-weight: bold;
        }
        .value-cell {
            min-height: 1.2em;
        }
        .signature-table td {
            padding: 18px 8px;
            text-align: center;
            border: 1px solid #000;
            min-height: 90px;
        }
        .signature-table td span {
            display: inline-block;
            margin-top: 50px;
            border-top: 1px solid #000;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="action-buttons no-print">
        <button type="button" onclick="window.print();">Cetak</button>
        <button type="button" onclick="window.history.back();">Kembali</button>
    </div>

    <div>
        <div class="header-title">Pemberitahuan Impor Barang Khusus (PIBK)</div>
        <p class="header-subtitle">A. Untuk 1. Barang Pindahan Penumpang 2. Barang Kiriman Melalui PJT 3. Barang Impor Sementara Dibawa</p>
        <p class="header-subtitle">4. Barang Impor Tertentu 5. Barang Pribadi Penumpang 6. Lainnya</p>
    </div>

    <table class="table-border">
        <tr>
            <td style="width: 50%;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">B. DATA PEMBERITAHUAN</td>
                    </tr>
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">
                            <span style="text-transform: uppercase; font-weight: bold;">1. Nama, Alamat Pengirim Barang</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->pengirim->nama_pengirim ?? '-' }} , {{ $penomoran->pengirim->alamat_pengirim ?? '-' }}</span>
                        </td> 
                    </tr>
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">
                            <span style="text-transform: uppercase; font-weight: bold;">2. Identitas Pengirim Barang</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->pengirim->jenis_identitas_pengirim ?? '-' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">
                            <span style="text-transform: uppercase; font-weight: bold;">3. Nama, Alamat Penerima Barang</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->penerima->nama_penerima ?? '-' }} <br> {{ $penomoran->penerima->alamat_penerima ?? '-' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="field-label" colspan="2"style="width: 100%;">
                            <span style="text-transform: uppercase; font-weight: bold;">4. Identitas Pemberitahu</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->pemberitahu->identitas_pemberitahu ?? '-' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">
                            <span style="text-transform: uppercase; font-weight: bold;">5. Nama, Alamat Pemberitahu</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->pemberitahu->nama_pemberitahu ?? '-' }} <br> {{ $penomoran->pemberitahu->alamat_pemberitahu ?? '-' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">
                            <span style="text-transform: uppercase; font-weight: bold;">6. No. & Tgl. Surat Izin PJT/PPJK</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->suratIzin->nomor_surat_izin_pjt_ppjk ?? '-' }} / {{ $penomoran->suratIzin->tanggal_surat_izin_pjt_ppjk?->format('d-m-Y') ?? '-' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">
                            <span style="text-transform: uppercase; font-weight: bold;">7. Cara Pengangkutan</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ ucfirst($penomoran->pengangkutan->cara_pengangkutan ?? '-') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">
                            <span style="text-transform: uppercase; font-weight: bold;">8. Nama Sarana Pengangkut & No. Voy/Flight</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->pengangkutan->nama_sarkut ?? '-' }} / {{ $penomoran->pengangkutan->no_flight ?? '-' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="field-label" style="width: 50%;">
                            <span style="text-transform: uppercase; font-weight: bold;">9. Pelabuhan Muat</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->pengangkutan->pelabuhan_muat ?? '-' }}</span>
                        </td>
                        <td class="field-label" style="width: 50%;">
                            <span style="text-transform: uppercase; font-weight: bold;">10. Pelabuhan Bongkar</span>
                            <br>
                            <span style="text-transform: none; font-weight: normal;">{{ $penomoran->pengangkutan->pelabuhan_bongkar ?? '-' }}</span>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 40%; vertical-align: top;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td class="field-label" colspan="2" style="width: 100%;">D. DIISI OLEH BEA DAN CUKAI</td>
                    </tr>
                    <tr>                        
                        <td class="field-label" style="width: 30%;">No.</td>
                        <td class="field-label">%WB</td>
                    </tr>
                    <tr>
                        <td class="value-cell" colspan="3" style="height: 90px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="field-label">Tgl</td>
                        <td class="value-cell">&nbsp;</td>
                        <td class="value-cell">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="field-label">Kantor Pabean</td>
                        <td class="value-cell" colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="field-label">No. BC 1.1</td>
                        <td class="value-cell" colspan="2">{{ $penomoran->pib->nomor_bc11 ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="field-label">Tgl</td>
                        <td class="value-cell" colspan="2">{{ $penomoran->pib->tanggal_bc11?->format('d-m-Y') ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="field-label">Pos</td>
                        <td class="value-cell" colspan="2">{{ $penomoran->pib->nomor_pos ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="subsection-title">5. URAIAN BARANG</div>
    <table class="table-border">
        <thead>
            <tr>
                <th style="width: 5%; text-align: center;">No</th>
                <th style="width: 50%;">Uraian Barang</th>
                <th style="width: 15%; text-align: center;">Jumlah & Jenis Satuan</th>
                <th style="width: 15%; text-align: right;">Nilai CIF</th>
                <th style="width: 15%; text-align: right;">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penomoran->uraianBarangs as $idx => $barang)
                <tr>
                    <td style="text-align: center;">{{ $idx + 1 }}</td>
                    <td>{{ $barang->uraian_barang ?? '-' }}</td>
                    <td style="text-align: center;">{{ $barang->jumlah_kemasan ?? '-' }} {{ $barang->satuan_kemasan ?? '' }}</td>
                    <td style="text-align: right;">{{ number_format($barang->nilai_cif ?? 0, 2) }}</td>
                    <td style="text-align: right;">{{ number_format($barang->total ?? 0, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="subsection-title">E. HASIL PEMERIKSAAN / PENETAPAN PEJABAT BEA DAN CUKAI</div>
    <table class="table-border">
        <tr>
            <td class="field-label" style="width: 20%;">Hari</td>
            <td class="value-cell" style="width: 30%;">{{ $penomoran->pemeriksaan->hari ?? '-' }}</td>
            <td class="field-label" style="width: 20%;">Jumlah & Jenis Satuan</td>
            <td class="value-cell" style="width: 30%;">{{ $penomoran->pemeriksaan->jumlah_satuan_barang ?? '-' }} {{ $penomoran->pemeriksaan->satuan_barang ?? '' }}</td>
        </tr>
        <tr>
            <td class="field-label">Tanggal</td>
            <td class="value-cell">{{ $penomoran->pemeriksaan->tanggal?->format('d-m-Y') ?? '-' }}</td>
            <td class="field-label">Nilai Pabean</td>
            <td class="value-cell">{{ number_format($penomoran->pib->nilai_cif ?? 0, 2) }}</td>
        </tr>
        <tr>
            <td class="field-label">Nama</td>
            <td class="value-cell">{{ $penomoran->pemeriksaan->nama ?? '-' }}</td>
            <td class="field-label">Pos Tarif</td>
            <td class="value-cell">{{ $penomoran->uraianBarangs->first()?->pos_tarif_hs ?? '-' }}</td>
        </tr>
        <tr>
            <td class="field-label">Jam Mulai</td>
            <td class="value-cell">{{ $penomoran->pemeriksaan->jam_mulai_periksa?->format('H:i') ?? '-' }}</td>
            <td class="field-label">Tipe / BM, Cukai, PPN, PPMBM, PPh</td>
            <td class="value-cell">{{ number_format($penomoran->uraianBarangs->first()?->bm ?? 0, 2) }}, {{ number_format($penomoran->uraianBarangs->first()?->cukai ?? 0, 2) }}, {{ number_format($penomoran->uraianBarangs->first()?->ppn ?? 0, 2) }}, {{ number_format($penomoran->uraianBarangs->first()?->ppnbm ?? 0, 2) }}, {{ number_format($penomoran->uraianBarangs->first()?->pph ?? 0, 2) }}</td>
        </tr>
        <tr>
            <td class="field-label">Jam Selesai</td>
            <td class="value-cell">{{ $penomoran->pemeriksaan->jam_selesai_periksa?->format('H:i') ?? '-' }}</td>
            <td class="field-label">Keterangan</td>
            <td class="value-cell">{{ $penomoran->pemeriksaan->kondisi_segel ?? '-' }}</td>
        </tr>
        <tr>
            <td class="field-label">Lokasi</td>
            <td class="value-cell">{{ $penomoran->pemeriksaan->lokasi_pemeriksaan ?? '-' }}</td>
            <td class="field-label">Jenis Kemasan</td>
            <td class="value-cell">{{ $penomoran->pemeriksaan->jenis_kemasan ?? '-' }}</td>
        </tr>
    </table>

    <div class="subsection-title">F. UNTUK PEJABAT BEA DAN CUKAI</div>
    <table class="signature-table">
        <tr>
            <td>
                <div><strong>PFPD</strong></div>
                <div>{{ $penomoran->pfpd->nama_pfpd ?? '' }}</div>
                <div>NIP: {{ $penomoran->pfpd->nip_pfpd ?? '' }}</div>
                <span></span>
            </td>
            <td>
                <div><strong>Pemeriksa</strong></div>
                <div>{{ $penomoran->pemeriksa->nama_pemeriksa ?? '' }}</div>
                <div>NIP: {{ $penomoran->pemeriksa->nip_pemeriksa ?? '' }}</div>
                <span></span>
            </td>
            <td>
                <div><strong>Pejabat Penerima</strong></div>
                <div>{{ $penomoran->jaminan->pejabat_penerima ?? '' }}</div>
                <span></span>
            </td>
        </tr>
    </table>

    <div style="text-align: center; font-size: 9pt; margin-top: 8px;">Dokumen ini dicetak pada {{ now()->format('d-m-Y H:i:s') }}</div>
</body>
</html>
