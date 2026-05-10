<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PIBK - {{ $penomoran->penomoran }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none;
            }
        }
        body {
            font-family: 'Arial', sans-serif;
            font-size: 11pt;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h3 {
            margin: 0;
            font-size: 16pt;
            font-weight: bold;
        }
        .header p {
            margin: 2px 0;
            font-size: 10pt;
        }
        .section-title {
            background-color: #f0f0f0;
            padding: 8px;
            margin-top: 15px;
            margin-bottom: 10px;
            font-weight: bold;
            border-left: 3px solid #007bff;
        }
        .info-box {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            width: 35%;
            font-weight: bold;
            padding-right: 10px;
        }
        .info-value {
            width: 65%;
            border-bottom: 1px dotted #ccc;
        }
        table {
            margin: 10px 0;
            width: 100%;
        }
        .table-bordered {
            border: 1px solid #ddd;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd;
            padding: 6px;
            font-size: 10pt;
        }
        .table-bordered th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .signature-section {
            margin-top: 40px;
            display: flex;
            justify-content: space-around;
        }
        .signature-item {
            text-align: center;
            width: 25%;
        }
        .signature-item .line {
            border-top: 1px solid #000;
            margin-top: 50px;
            margin-bottom: 5px;
        }
        .action-buttons {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="action-buttons no-print" style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.print();" class="btn btn-primary">
            <i class="bi bi-printer"></i> Cetak
        </button>
        <button onclick="window.history.back();" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </button>
    </div>

    <div class="container-fluid">
        <!-- HEADER -->
        <div class="header">
            <h3>PEMBERITAHUAN IMPOR BARANG (PIB)</h3>
            <p>Nomor Penomoran: {{ $penomoran->penomoran }}</p>
            <p>Tanggal: {{ $penomoran->tanggal_pibk ? $penomoran->tanggal_pibk->format('d-m-Y') : '-' }}</p>
        </div>

        <!-- HALAMAN 1: DATA PENGIRIM & PENERIMA -->
        <div class="section-title">1. DATA PENGIRIM & PENERIMA</div>
        <div class="row">
            <div class="col-md-6">
                <div style="margin-bottom: 20px;">
                    <h5 style="font-size: 12pt; font-weight: bold; margin-bottom: 10px;">PENGIRIM</h5>
                    <div class="info-box">
                        <div class="info-label">Nama</div>
                        <div class="info-value">{{ $penomoran->pengirim->nama_pengirim ?? '-' }}</div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Alamat</div>
                        <div class="info-value">{{ $penomoran->pengirim->alamat_pengirim ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div style="margin-bottom: 20px;">
                    <h5 style="font-size: 12pt; font-weight: bold; margin-bottom: 10px;">PENERIMA</h5>
                    <div class="info-box">
                        <div class="info-label">Jenis Identitas</div>
                        <div class="info-value">{{ $penomoran->penerima->jenis_identitas_penerima ?? '-' }}</div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Nomor Identitas</div>
                        <div class="info-value">{{ $penomoran->penerima->identitas_penerima ?? '-' }}</div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Nama</div>
                        <div class="info-value">{{ $penomoran->penerima->nama_penerima ?? '-' }}</div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Alamat</div>
                        <div class="info-value">{{ $penomoran->penerima->alamat_penerima ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HALAMAN 2: PEMBERITAHU & SURAT IZIN -->
        <div class="section-title">2. PEMBERITAHU & SURAT IZIN</div>
        <div class="row">
            <div class="col-md-6">
                <div style="margin-bottom: 20px;">
                    <h5 style="font-size: 12pt; font-weight: bold; margin-bottom: 10px;">PEMBERITAHU</h5>
                    <div class="info-box">
                        <div class="info-label">Identitas</div>
                        <div class="info-value">{{ $penomoran->pemberitahu->identitas_pemberitahu ?? '-' }}</div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Nama</div>
                        <div class="info-value">{{ $penomoran->pemberitahu->nama_pemberitahu ?? '-' }}</div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Alamat</div>
                        <div class="info-value">{{ $penomoran->pemberitahu->alamat_pemberitahu ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div style="margin-bottom: 20px;">
                    <h5 style="font-size: 12pt; font-weight: bold; margin-bottom: 10px;">SURAT IZIN PJT/PPJK</h5>
                    <div class="info-box">
                        <div class="info-label">Nomor</div>
                        <div class="info-value">{{ $penomoran->suratIzin->nomor_surat_izin_pjt_ppjk ?? '-' }}</div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Tanggal</div>
                        <div class="info-value">{{ $penomoran->suratIzin->tanggal_surat_izin_pjt_ppjk?->format('d-m-Y') ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HALAMAN 3: PENGANGKUTAN -->
        <div class="section-title">3. PENGANGKUTAN</div>
        <div class="info-box">
            <div class="info-label">Cara Pengangkutan</div>
            <div class="info-value">{{ ucfirst($penomoran->pengangkutan->cara_pengangkutan ?? '-') }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Nama Sarana Angkut</div>
            <div class="info-value">{{ $penomoran->pengangkutan->nama_sarkut ?? '-' }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">No. Voy/Flight</div>
            <div class="info-value">{{ $penomoran->pengangkutan->no_flight ?? '-' }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Pelabuhan Muat</div>
            <div class="info-value">{{ $penomoran->pengangkutan->pelabuhan_muat ?? '-' }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Pelabuhan Bongkar</div>
            <div class="info-value">{{ $penomoran->pengangkutan->pelabuhan_bongkar ?? '-' }}</div>
        </div>

        <!-- HALAMAN 4: PIB -->
        <div class="section-title">4. PIB (Pemberitahuan Impor Barang)</div>
        <div class="row">
            <div class="col-md-6">
                <h5 style="font-size: 11pt; font-weight: bold;">Dokumen PIB</h5>
                <div class="info-box">
                    <div class="info-label">Nomor BC 1.1</div>
                    <div class="info-value">{{ $penomoran->pib->nomor_bc11 ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Tanggal BC 1.1</div>
                    <div class="info-value">{{ $penomoran->pib->tanggal_bc11?->format('d-m-Y') ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Nomor Pos</div>
                    <div class="info-value">{{ $penomoran->pib->nomor_pos ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Invoice</div>
                    <div class="info-value">{{ $penomoran->pib->invoice ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Tanggal Invoice</div>
                    <div class="info-value">{{ $penomoran->pib->tanggal_invoice?->format('d-m-Y') ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Nomor BL/AWB</div>
                    <div class="info-value">{{ $penomoran->pib->nomor_bl_awb ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Tanggal BL/AWB</div>
                    <div class="info-value">{{ $penomoran->pib->tanggal_bl_awb?->format('d-m-Y') ?? '-' }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <h5 style="font-size: 11pt; font-weight: bold;">Nilai PIB</h5>
                <div class="info-box">
                    <div class="info-label">Negara Asal</div>
                    <div class="info-value">{{ $penomoran->pib->negara_asal_barang ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Valuta</div>
                    <div class="info-value">{{ $penomoran->pib->valuta ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">FOB</div>
                    <div class="info-value">{{ number_format($penomoran->pib->fob ?? 0, 2) }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Freight</div>
                    <div class="info-value">{{ number_format($penomoran->pib->freight ?? 0, 2) }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Satuan Mata Uang Freight</div>
                    <div class="info-value">{{ $penomoran->pib->freight_currency ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Asuransi</div>
                    <div class="info-value">{{ number_format($penomoran->pib->asuransi ?? 0, 2) }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Nilai CIF</div>
                    <div class="info-value">{{ number_format($penomoran->pib->nilai_cif ?? 0, 2) }}</div>
                </div>
            </div>
        </div>

        <!-- HALAMAN 5: URAIAN BARANG -->
        <div class="section-title">5. URAIAN BARANG</div>
        <table class="table-bordered">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Uraian</th>
                    <th width="8%">Jml Kemasan</th>
                    <th width="7%">Satuan Kemasan</th>
                    <th width="8%">Berat</th>
                    <th width="7%">Satuan</th>
                    <th width="10%">Nilai CIF</th>
                    <th width="8%">BM</th>
                    <th width="8%">PPN</th>
                    <th width="10%">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penomoran->uraianBarangs as $idx => $barang)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td>{{ $barang->uraian_barang }}</td>
                        <td style="text-align: center;">{{ $barang->jumlah_kemasan }}</td>
                        <td style="text-align: center;">{{ $barang->satuan_kemasan ?? '-' }}</td>
                        <td style="text-align: right;">{{ number_format($barang->berat, 2) }}</td>
                        <td style="text-align: center;">{{ $barang->satuan ?? '-' }}</td>
                        <td style="text-align: right;">{{ number_format($barang->nilai_cif, 2) }}</td>
                        <td style="text-align: right;">{{ number_format($barang->bm, 2) }}</td>
                        <td style="text-align: right;">{{ number_format($barang->ppn, 2) }}</td>
                        <td style="text-align: right;">{{ number_format($barang->total, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" style="text-align: center;">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- HALAMAN 6: PEMERIKSAAN -->
        <div class="section-title">6. PEMERIKSAAN</div>
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <div class="info-label">Hari</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->hari ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Tanggal</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->tanggal?->format('d-m-Y') ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Nama</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->nama ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Jam Mulai</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->jam_mulai_periksa?->format('H:i') ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Jam Selesai</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->jam_selesai_periksa?->format('H:i') ?? '-' }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box">
                    <div class="info-label">Lokasi</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->lokasi_pemeriksaan ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Kondisi Segel</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->kondisi_segel ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Jumlah Satuan</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->jumlah_satuan_barang ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Satuan Barang</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->satuan_barang ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Jenis Kemasan</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->jenis_kemasan ?? '-' }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Ukuran Kemasan</div>
                    <div class="info-value">{{ $penomoran->pemeriksaan->ukuran_kemasan ?? '-' }}</div>
                </div>
            </div>
        </div>

        <!-- HALAMAN 7: TANDA TANGAN -->
        <div class="section-title">7. TANDA TANGAN RESMI</div>
        <div class="signature-section">
            <div class="signature-item">
                <p><strong>PFPD</strong></p>
                <p>{{ $penomoran->pfpd->nama_pfpd ?? '' }}</p>
                <p>NIP: {{ $penomoran->pfpd->nip_pfpd ?? '' }}</p>
                <div class="line"></div>
            </div>
            <div class="signature-item">
                <p><strong>Pemeriksa</strong></p>
                <p>{{ $penomoran->pemeriksa->nama_pemeriksa ?? '' }}</p>
                <p>NIP: {{ $penomoran->pemeriksa->nip_pemeriksa ?? '' }}</p>
                <div class="line"></div>
            </div>
            <div class="signature-item">
                <p><strong>Pejabat Penerima</strong></p>
                <p>{{ $penomoran->jaminan->pejabat_penerima ?? '' }}</p>
                <div class="line"></div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px; font-size: 9pt; color: #666;">
            <p>Dokumen ini dicetak pada {{ now()->format('d-m-Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
