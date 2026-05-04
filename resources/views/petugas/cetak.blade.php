<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Tugas - {{ $petugas->nama }}</title>
    <style>
        @page { size: A4; margin: 2cm; }
        body { font-family: 'Times New Roman', serif; line-height: 1.5; color: black; }
        .header { text-align: center; border-bottom: 3px double black; margin-bottom: 30px; padding-bottom: 10px; }
        .header h2, .header h3 { margin: 0; text-transform: uppercase; }
        .title { text-align: center; font-weight: bold; text-decoration: underline; margin-bottom: 20px; }
        .content { margin-top: 30px; }
        .table-data { margin: 20px 0 20px 40px; }
        .table-data td { padding: 5px; }
        .footer { margin-top: 50px; text-align: right; margin-right: 50px; }
        @media print { .btn-print { display: none; } }
        .btn-print { background: #444; color: white; padding: 10px 20px; border: none; cursor: pointer; margin: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <button class="btn-print" onclick="window.print()">Cetak Dokumen (PDF)</button>

    <div class="header">
        <h3>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</h3>
        <h3>DIREKTORAT JENDERAL BEA DAN CUKAI</h3>
        <p style="font-size: 12px; margin: 5px;">KANTOR WILAYAH / KANTOR PELAYANAN TERKAIT</p>
    </div>

    <div class="title">SURAT TUGAS</div>

    <div class="content">
        <p>Sehubungan dengan pelaksanaan tugas kedinasan, dengan ini Kepala Kantor memberikan tugas kepada:</p>
        
        <table class="table-data">
            <tr>
                <td width="150">Nama</td>
                <td>: <strong>{{ $petugas->nama }}</strong></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>: {{ $petugas->nip }}</td>
            </tr>
            <tr>
                <td>Pangkat / Gol.</td>
                <td>: {{ $petugas->pangkat }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: {{ $petugas->jabatan }}</td>
            </tr>
        </table>

        <p>Untuk melaksanakan kegiatan pemantauan dan administrasi data pada sistem PKCDT sesuai dengan ketentuan yang berlaku di lingkungan Direktorat Jenderal Bea dan Cukai.</p>
        
        <p>Demikian Surat Tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.</p>
    </div>

    <div class="footer">
        <p>Dikeluarkan di: Tempat Tugas<br>
        Pada tanggal: {{ date('d F Y') }}</p>
        <br><br><br>
        <p>( __________________________ )</p>
    </div>
</body>
</html>