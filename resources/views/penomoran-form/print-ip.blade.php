<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat IP - {{ $penomoran->penomoran ?? '' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 10pt; background: #fff; color: #000; }
        .page { width: 210mm; min-height: 297mm; margin: 0 auto; padding: 12mm; }
        .title { text-align: center; font-size: 13pt; font-weight: bold; margin-bottom: 10px; }
        .subtitle { text-align: center; font-size: 10pt; margin-bottom: 16px; }
        .section { margin-bottom: 14px; }
        .section h2 { font-size: 10pt; font-weight: bold; margin-bottom: 6px; }
        .section table { width: 100%; border-collapse: collapse; }
        .section table td { padding: 6px 8px; vertical-align: top; border: 1px solid #000; }
        .section table th { padding: 6px 8px; vertical-align: top; border: 1px solid #000; background: #f1f1f1; text-align: left; }
        .details { width: 100%; margin-bottom: 12px; border-collapse: collapse; }
        .details td { padding: 6px 8px; vertical-align: top; }
        .signature { width: 100%; margin-top: 20px; }
        .signature td { width: 50%; padding: 10px 8px; vertical-align: top; }
        .no-print { margin-bottom: 12px; }
        .btn-print { display: inline-block; padding: 10px 16px; background: #1d4ed8; color: #fff; border-radius: 5px; text-decoration: none; font-weight: bold; }
        @media print {
            body { margin: 0; }
            .page { width: 100%; padding: 10mm; margin: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="no-print">
        <a class="btn-print" href="javascript:window.print();">Cetak Surat IP</a>
    </div>

    <div class="title">SURAT IP</div>
    <div class="subtitle">Surat Pemberitahuan Impor</div>

    <table class="details">
        <tr>
            <td style="width: 35%;"><strong>Nomor IP</strong></td>
            <td>{{ $penomoran->penomoran ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal IP</strong></td>
            <td>{{ $penomoran->tanggal_pibk ? \Carbon\Carbon::parse($penomoran->tanggal_pibk)->translatedFormat('d F Y') : '-' }}</td>
        </tr>
        <tr>
            <td><strong>Kantor Pabean</strong></td>
            <td>130100</td>
        </tr>
    </table>

    <div class="section">
        <h2>A. Pengirim</h2>
        <table>
            <tr>
                <th>Nama / Alamat</th>
            </tr>
            <tr>
                <td>
                    {{ $penomoran->pengirim?->nama_pengirim ?? '-' }}<br>
                    {!! nl2br(e($penomoran->pengirim?->alamat_pengirim ?? '')) !!}
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>B. Penerima</h2>
        <table>
            <tr>
                <th>Nama / Alamat</th>
            </tr>
            <tr>
                <td>
                    {{ $penomoran->penerima?->nama_penerima ?? '-' }}<br>
                    {!! nl2br(e($penomoran->penerima?->alamat_penerima ?? '')) !!}
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>C. Pemberitahu</h2>
        <table>
            <tr>
                <td>{{ $penomoran->pemberitahu?->identitas_pemberitahu ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>D. Surat Izin</h2>
        <table>
            <tr>
                <th>Nomor Surat Izin PJT / NP-PPJK</th>
                <th>Tanggal</th>
            </tr>
            <tr>
                <td>{{ $penomoran->suratIzin?->nomor_surat_izin_pjt_ppjk ?? '-' }}</td>
                <td>{{ $penomoran->suratIzin?->tanggal_surat_izin_pjt_ppjk ? \Carbon\Carbon::parse($penomoran->suratIzin->tanggal_surat_izin_pjt_ppjk)->translatedFormat('d F Y') : '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>E. Pengangkutan</h2>
        <table>
            <tr>
                <th>Cara Pengangkutan</th>
                <th>Nama Sarana</th>
                <th>Voy/Flight</th>
            </tr>
            <tr>
                <td>{{ strtoupper($penomoran->pengangkutan?->cara_pengangkutan ?? '-') }}</td>
                <td>{{ $penomoran->pengangkutan?->nama_sarkut ?? '-' }}</td>
                <td>{{ $penomoran->pengangkutan?->no_flight ?? '-' }}</td>
            </tr>
            <tr>
                <th>Pelabuhan Muat</th>
                <th colspan="2">Pelabuhan Bongkar</th>
            </tr>
            <tr>
                <td>{{ $penomoran->pengangkutan?->pelabuhan_muat ?? '-' }}</td>
                <td colspan="2">{{ $penomoran->pengangkutan?->pelabuhan_bongkar ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>F. BC 1.1 / PIB</h2>
        <table>
            <tr>
                <th>No. BC 1.1</th>
                <th>Tgl BC 1.1</th>
            </tr>
            <tr>
                <td>{{ $penomoran->pib?->nomor_bc11 ?? '-' }}</td>
                <td>{{ $penomoran->pib?->tanggal_bc11 ? \Carbon\Carbon::parse($penomoran->pib->tanggal_bc11)->translatedFormat('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <th>Invoice</th>
                <th>BL/AWB</th>
            </tr>
            <tr>
                <td>{{ $penomoran->pib?->invoice ?? '-' }}</td>
                <td>{{ $penomoran->pib?->nomor_bl_awb ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>G. Uraian Barang</h2>
        <table>
            <tr>
                <th style="width: 10%;">No</th>
                <th>Uraian</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Berat</th>
            </tr>
            @forelse($penomoran->uraianBarangs as $index => $item)
                <tr>
                    <td class="center">{{ $index + 1 }}</td>
                    <td>{{ $item->uraian_barang ?? '-' }}</td>
                    <td>{{ $item->jumlah_kemasan ?? '-' }}</td>
                    <td>{{ $item->satuan_kemasan ?? '-' }}</td>
                    <td>{{ $item->berat ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">- Tidak ada data uraian barang -</td>
                </tr>
            @endforelse
        </table>
    </div>

    <div class="signature">
        <table>
            <tr>
                <td>
                    <strong>Pejabat PFPD</strong><br><br><br>
                    {{ $penomoran->pfpd?->nama_pfpd ?? '-' }}<br>
                    NIP {{ $penomoran->pfpd?->nip_pfpd ?? '-' }}
                </td>
                <td>
                    <strong>Pemeriksa</strong><br><br><br>
                    {{ $penomoran->pemeriksa?->nama_pemeriksa ?? '-' }}<br>
                    NIP {{ $penomoran->pemeriksa?->nip_pemeriksa ?? '-' }}
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
