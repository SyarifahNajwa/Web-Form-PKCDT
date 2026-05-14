{{--
    CETAK SPPB - Surat Pemberitahuan Pengeluaran Barang
    VARIABEL YANG DIBUTUHKAN DI CONTROLLER:
      $penomoran → model Penomoran dengan relasi:
        - pengirim()
        - penerima()
        - pemberitahu()
        - pib()
        - uraianBarangs()
        - pemeriksaan()
        - pemeriksa()
        - pfpd()
        - jaminan()
--}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SPPB - {{ $penomoran->penomoran ?? '' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 9pt; color: #000; background: #fff; }
        .page { width: 210mm; min-height: 297mm; margin: 0 auto; padding: 12mm; }
        @media print { body { margin: 0; } .page { width: 100%; padding: 8mm; } }
        .title { text-align: center; font-size: 12pt; font-weight: bold; margin-bottom: 8px; }
        .subtitle { text-align: center; font-size: 10pt; margin-bottom: 14px; }
        .section-title { font-weight: bold; font-size: 10pt; margin: 10px 0 4px 0; }
        .box { border: 1px solid #000; padding: 8px; margin-bottom: 10px; }
        .box p { line-height: 1.4; font-size: 9pt; }
        .label { font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 6px; }
        table th, table td { border: 1px solid #000; padding: 4px 6px; vertical-align: top; font-size: 9pt; }
        table th { background: #f0f0f0; }
        .signature-row { display: flex; justify-content: space-between; margin-top: 26px; }
        .signature-block { width: 48%; text-align: center; }
        .signature-block p { margin-bottom: 4px; font-size: 9pt; }
        .signature-line { margin-top: 40px; border-top: 1px solid #000; display: inline-block; padding-top: 4px; }
    </style>
</head>
<body>
<div class="page">
    <div class="title">SURAT PEMBERITAHUAN PENGELUARAN BARANG (SPPB)</div>
    <div class="subtitle">Nomor: {{ $penomoran->penomoran ?? '-' }} /SPPB/{{ $penomoran->tanggal_pibk ? \Carbon\Carbon::parse($penomoran->tanggal_pibk)->format('Y') : date('Y') }}</div>

    <div class="section-title">1. Identitas Pengirim</div>
    <div class="box">
        <p><span class="label">Nama:</span> {{ $penomoran->pengirim?->nama_pengirim ?? '-' }}</p>
        <p><span class="label">Alamat:</span> {{ $penomoran->pengirim?->alamat_pengirim ?? '-' }}</p>
    </div>

    <div class="section-title">2. Identitas Penerima</div>
    <div class="box">
        <p><span class="label">Jenis Identitas:</span> {{ $penomoran->penerima?->jenis_identitas_penerima ?? '-' }}</p>
        <p><span class="label">Identitas:</span> {{ $penomoran->penerima?->identitas_penerima ?? '-' }}</p>
        <p><span class="label">Nama:</span> {{ $penomoran->penerima?->nama_penerima ?? '-' }}</p>
        <p><span class="label">Alamat:</span> {{ $penomoran->penerima?->alamat_penerima ?? '-' }}</p>
    </div>

    <div class="section-title">3. Data Pemberitahuan & PIB</div>
    <div class="box">
        <p><span class="label">Nomor BC 1.1:</span> {{ $penomoran->pib?->nomor_bc11 ?? '-' }}</p>
        <p><span class="label">Tanggal BC 1.1:</span> {{ $penomoran->pib?->tanggal_bc11 ? \Carbon\Carbon::parse($penomoran->pib->tanggal_bc11)->translatedFormat('d F Y') : '-' }}</p>
        <p><span class="label">Nomor Pos:</span> {{ $penomoran->pib?->nomor_pos ?? '-' }}</p>
        <p><span class="label">Invoice:</span> {{ $penomoran->pib?->invoice ?? '-' }}</p>
        <p><span class="label">Negara Asal:</span> {{ $penomoran->pib?->negara_asal_barang ?? '-' }}</p>
        <p><span class="label">Valuta:</span> {{ $penomoran->pib?->valuta ?? '-' }}</p>
    </div>

    <div class="section-title">4. Uraian Barang</div>
    <table>
        <thead>
            <tr>
                <th style="width:5%;">No</th>
                <th style="width:45%;">Uraian Barang</th>
                <th style="width:15%;">Jumlah</th>
                <th style="width:15%;">Satuan</th>
                <th style="width:20%;">Nilai CIF</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penomoran->uraianBarangs as $idx => $barang)
                <tr>
                    <td class="center">{{ $idx + 1 }}</td>
                    <td>{{ $barang->uraian_barang ?? '-' }}</td>
                    <td class="center">{{ $barang->jumlah_kemasan ?? '-' }}</td>
                    <td class="center">{{ $barang->satuan ?? ($barang->satuan_kemasan ?? '-') }}</td>
                    <td class="right">{{ $barang->nilai_cif !== null ? number_format($barang->nilai_cif, 2) : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="center">Tidak ada data uraian barang</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="section-title">5. Pemeriksaan</div>
    <div class="box">
        <p><span class="label">Tanggal Pemeriksaan:</span> {{ $penomoran->pemeriksaan?->tanggal ? \Carbon\Carbon::parse($penomoran->pemeriksaan->tanggal)->translatedFormat('d F Y') : '-' }}</p>
        <p><span class="label">Lokasi:</span> {{ $penomoran->pemeriksaan?->lokasi_pemeriksaan ?? '-' }}</p>
        <p><span class="label">Kondisi Segel:</span> {{ $penomoran->pemeriksaan?->kondisi_segel ?? '-' }}</p>
        <p><span class="label">Contoh:</span> {{ $penomoran->pemeriksaan?->contoh ?? '-' }}</p>
        <p><span class="label">Foto:</span> {{ $penomoran->pemeriksaan?->foto ?? '-' }}</p>
    </div>

    <div class="signature-row">
        <div class="signature-block">
            <p>Pejabat PFPD</p>
            <div class="signature-line">{{ $penomoran->pfpd?->nama_pfpd ?? '________________' }}</div>
            <p>NIP {{ $penomoran->pfpd?->nip_pfpd ?? '________________' }}</p>
        </div>
        <div class="signature-block">
            <p>Pemeriksa</p>
            <div class="signature-line">{{ $penomoran->pemeriksa?->nama_pemeriksa ?? '________________' }}</div>
            <p>NIP {{ $penomoran->pemeriksa?->nip_pemeriksa ?? '________________' }}</p>
        </div>
    </div>
</div>
</body>
</html>
