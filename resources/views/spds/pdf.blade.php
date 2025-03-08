<?php

$tglBerangkat = new DateTime($spds->tgl_berangkat);
$tglKembali = new DateTime($spds->tgl_kembali);
$durasi = $tglBerangkat->diff($tglKembali);

$durasiHari = $durasi->days;

$durasiJam = $durasi->h; // Jam
$durasiMenit = $durasi->i; // Menit
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perjalanan Dinas (SPD)</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 2cm;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .header {
            text-align: center;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }
        td, th {
            border: 1px solid black;
            padding: 5px;
            vertical-align: top;
            word-wrap: break-word;
        }
        td:first-child {
            width: 40%;
        }
        td:last-child {
            padding-left: 10px;
        }
        .no-border {
            border-top: none;
            border-bottom: none;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
        }
        .page-break {
            page-break-after: always;
        }
        .additional-info {
            margin-top: 20px;
        }
        .additional-info-table {
            border: 1px solid black;
            width: 100%;
        }
        .kepala {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>SURAT PERJALANAN DINAS (SPD)</h3>
        <p>Nomor: {{ $spds->no_spd }}</p>
    </div>
    <table>
        <tr>
            <td>1. Pejabat yang memberi perintah</td>
            <td>{{ $spds->pb_perintah }}</td>
        </tr>
        <tr>
            <td class="no-border">2. Nama Pegawai yang diperintahkan</td>
            <td class="no-border">{{ $spds->pegawai->nama }}</td>
        </tr>
        <tr>
            <td class="no-border">a. Pangkat dan Golongan</td>
            <td class="no-border">{{ $spds->pegawai->pangkat }} / {{ $spds->pegawai->golongan->nama_golongan }}</td>
        </tr>
        <tr>
            <td class="no-border">b. Jabatan</td>
            <td class="no-border">{{ $spds->pegawai->jabatan }}</td>
        </tr>
        <tr>
            <td class="no-border">c. Tingkat Menurut Peraturan</td>
            <td class="no-border">Tingkat IV</td>
        </tr>
        <tr>
            <td>3. Maksud Perjalanan Dinas</td>
            <td>{{ $spds->untuk }}</td>
        </tr>
        <tr>
            <td>4. Alat Angkutan yang digunakan</td>
            <td>{{ $spds->jns_transportasi }}</td>
        </tr>
        <tr>
            <td>5. Tempat Berangkat</td>
            <td>{{ $spds->asal }}</td>
        </tr>
        <tr>
            <td>6. Tempat Tujuan</td>
            <td>{{ $spds->tujuan }}</td>
        </tr>
        <tr>
            <td class="no-border">7. Lamanya Perjalanan Dinas</td>
            <td class="no-border">{{ $durasiHari }} hari</td>
        </tr>
        <tr>
            <td class="no-border">a. Tanggal Berangkat</td>
            <td class="no-border">{{ $spds->tgl_berangkat }}</td>
        </tr>
        <tr>
            <td class="no-border">b. Tanggal Kembali</td>
            <td class="no-border">{{ $spds->tgl_kembali }}</td>
        </tr>
        <tr>
            <td>8. Pengikut</td>
            <td>SKPD Terkait</td>
        </tr>
        <tr>
            <td class="no-border">9. Pembebanan Anggaran</td>
            <td class="no-border"></td>
        </tr>
        <tr>
            <td class="no-border">a. Instansi</td>
            <td class="no-border">{{ $spds->instansi }}</td>
        </tr>
        <tr>
            <td class="no-border">b. Mata Anggaran</td>
            <td class="no-border">{{ $spds->mata_anggaran }}</td>
        </tr>
        <tr>
            <td>10. Keterangan Lain-lain</td>
            <td>{{ $spds->ket }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Dikeluarkan di : {{ $spds->asal }}</p>
        <p>Pada Tanggal : {{ $spds->tgl_spd }}</p>
        <p>Kepala Badan</p>
        <br><br>
        <p>________________________</p>
    </div>
<div class="page-break"></div>

<div class="additional-info">
<table class="additional-info-table">
    <tr>
        <td style="border: 1px solid #000; width: 50%; padding: 10px;">
        </td>
        <td style="border: 1px solid #000; width: 50%; padding: 10px;">
            I Berangkat dari :<span style="flex-grow: 1; text-align: right;">{{ $spds->asal }}</span><br>
            Ke :<br>
            Pada tanggal :<br>
            Kepala :<br><br><br><br><br>
            .................................
        </td>
    </tr>

    <tr>
        <td>II Tiba di :<br>Pada tanggal :</td>
        <td>Berangkat dari :<br>Ke :<br>Pada tanggal :<br><br><br><br><br><br></td>
    </tr>
    <tr>
        <td>III Tiba di :<br>Pada tanggal :</td>
        <td>Berangkat dari :<br>Ke :<br>Pada tanggal :<br><br><br><br><br><br></td>
    </tr>
    <tr>
        <td>IV Tiba di :<br>Pada tanggal :</td>
        <td>Berangkat dari :<br>Ke :<br>Pada tanggal :<br><br><br><br><br><br>
        </td>
    </tr>
    <tr>
        <td>IV Tiba di :<br>Pada tanggal :</td>
        <td>Telah diperiksa, dengan keterangan bahwa
            perjalanan tersebut atas perintahnya dan
            semata-mata untuk kepentingan jabatan dalam
            waktu yang sesingkat-singkatnya
             <br><br><br>
                <p>Kepala Badan</p>
                <br><br>
                <p>________________________</p>
            </td>
    </tr>
    <tr>
        <td colspan="2">
            VI CATATAN LAIN-LAIN<br>
        </td>
    </tr>
</table>

</body>
</html>
