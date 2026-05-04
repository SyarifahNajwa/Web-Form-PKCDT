<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Penomoran</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; color: #1f2937; }
        .header { text-align: center; margin-bottom: 28px; }
        .header h1 { font-size: 18px; margin-bottom: 8px; }
        .header h2 { font-size: 24px; margin-bottom: 4px; }
        .detail-card { border: 1px solid #d1d5db; border-radius: 16px; padding: 24px; max-width: 720px; margin: 0 auto; }
        .detail-row { display: flex; justify-content: space-between; gap: 16px; margin-bottom: 14px; }
        .detail-label { font-weight: 700; color: #374151; width: 170px; }
        .detail-value { color: #111827; }
        .footer { margin-top: 32px; text-align: center; font-size: 12px; color: #4b5563; }
        @media print {
            body { margin: 0; }
            .detail-card { border-color: #9ca3af; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1>KANTOR PELAYANAN BEA DAN CUKAI TIPE C</h1>
        <h2>FORM CETAK PENOMORAN PIBK</h2>
        <p>Tanggal Cetak: {{ date('d-m-Y') }}</p>
    </div>

    <div class="detail-card">
        <div class="detail-row">
            <span class="detail-label">Nomor Penomoran</span>
            <span class="detail-value">{{ $data->penomoran }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Tanggal PIBK</span>
            <span class="detail-value">{{ $data->tanggal_pibk->format('d/m/Y') }}</span>
        </div>
        @if($data->nama_pfpd && $data->nip_pfpd)
        <div class="detail-row">
            <span class="detail-label">Nama PFPD</span>
            <span class="detail-value">{{ $data->nama_pfpd }},{{ $data->nip_pfpd }}</span>
        </div>
        @endif
        @if($data->diisiBc)
        <div class="detail-row">
            <span class="detail-label">Nomor BC11</span>
            <span class="detail-value">{{ $data->diisiBc->nomor_bc11 }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Nomor POS</span>
            <span class="detail-value">{{ $data->diisiBc->nomor_pos }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Invoice</span>
            <span class="detail-value">{{ $data->diisiBc->invoice }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Tanggal Invoice</span>
            <span class="detail-value">{{ optional($data->diisiBc->tanggal_invoice)->format('d/m/Y') }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Nomor BL/AWB</span>
            <span class="detail-value">{{ $data->diisiBc->nomor_bl_awb }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Tanggal BL/AWB</span>
            <span class="detail-value">{{ optional($data->diisiBc->tanggal_bl_awb)->format('d/m/Y') }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Negara Asal</span>
            <span class="detail-value">{{ $data->diisiBc->negara_asal }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Valuta</span>
            <span class="detail-value">{{ $data->diisiBc->valuta }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">FOB</span>
            <span class="detail-value">{{ $data->diisiBc->fob }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Freight</span>
            <span class="detail-value">{{ $data->diisiBc->freight }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Asuransi</span>
            <span class="detail-value">{{ $data->diisiBc->asuransi }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Nilai CIF</span>
            <span class="detail-value">{{ $data->diisiBc->nilai_cif }}</span>
        </div>
        @endif
        <div class="detail-row">
            <span class="detail-label">ID Data</span>
            <span class="detail-value">{{ $data->id }}</span>
        </div>
    </div>

    <div class="footer">
        <p>Dicetak oleh: {{ auth()->user()->name ?? 'Admin' }} | Waktu: {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>
