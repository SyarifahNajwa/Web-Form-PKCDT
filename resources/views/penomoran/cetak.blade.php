<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Penomoran</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1>KANTOR PELAYANAN BEA DAN CUKAI TIPE C</h1>
        <h2>LAPORAN PENOMORAN PIBK</h2>
        <p>Tanggal Cetak: {{ date('d-m-Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor PIBK</th>
                <th>Tanggal PIBK</th>
            </tr>
        </thead>
        <tbody>
            @forelse($allData as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->penomoran }}</td>
                <td>{{ $data->tanggal_pibk->format('d/m/Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center;">Tidak ada data penomoran.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak oleh: {{ auth()->user()->name ?? 'Admin' }} | Tanggal: {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>