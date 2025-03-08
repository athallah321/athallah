<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Riil PDF</title>
</head>
<body>
    <h1>Daftar Riil</h1>

    <table>
        <tr>
            <th>SPD</th>
            <td>{{ $daftarRiil->spd->no_spd }}</td>
        </tr>
        <tr>
            <th>Uraian</th>
            <td>{{ $daftarRiil->uraian }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $daftarRiil->jumlah }}</td>
        </tr>
        <tr>
            <th>Satuan</th>
            <td>{{ $daftarRiil->satuan }}</td>
        </tr>
        <tr>
            <th>Harga Satuan</th>
            <td>{{ number_format($daftarRiil->harga_satuan, 2) }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>{{ number_format($daftarRiil->total, 2) }}</td>
        </tr>
    </table>
</body>
</html>
