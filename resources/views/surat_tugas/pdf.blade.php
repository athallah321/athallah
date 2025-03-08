<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.0;
            margin: 5px;
        }
        .header, .footer {
            text-align: center;
            line-height: 1.2;
        }
        .content {
            margin-top: 20px;
        }
        .title {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 10px;
            line-height: 0.2;
        }
        .table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        .table td {
            padding: 3px;
            vertical-align: top;
            text-align: left;
        }
        .table td.separator {
            padding: 0 5px; /* Memberikan jarak horizontal antara teks dan tanda ":" */
        }
        .signature {
            margin-top: 30px;
            text-align: right;
        }
        .signature p {
            margin: 5px 0;
        }
        .line-spacing-1-5 {
            line-height: 1.5;
        }
        .table td.left-indent {
            padding-left: 40px;
        }
        .table .list-kepada {
            margin-top: 10px;
        }
        .indent-right {
            padding-left: 30px;
        }
    </style>
</head>
<body>
    <div class="header" style="text-align: center;">
        <img src="{{ public_path('assets/images/kabupatenpaser.svg') }}" alt="kabupaten paser" style="width: 100px; height: auto; float: left; margin-right: -100px;">
        <div>
            <p style="margin: 0;font-size: 14px; font-weight: bold;">PEMERINTAH KABUPATEN PASER</p>
            <p style="margin: 0;font-size: 16px;">BADAN PERENCANAAN PEMBANGUNAN DAERAH</p>
            <p style="margin: 0;font-size: 16px;">PENELITIAN DAN PENGEMBANGAN</p>
            <p style="margin: 0; font-size: 12px;">Kompleks Perkantoran Telaga Ungu Jl. Kusuma Bangsa Km 5 Gedung C Lantai 1 Kav. 1-2</p>
            <p style="margin: 0;">TANA PASER</p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <hr style="border: 1px solid rgb(18, 18, 18); margin: 0px 5;">
    <div class="title">
        <h3>SURAT TUGAS</h3>
        <p>Nomor : {{ $suratTugas->no_surat }}</p>
    </div>
    <div class="content">
        <p><strong>Dasar :</strong></p>
        <p style="text-align: center; font-weight: bold;">MEMERINTAHKAN:</p>
        <table class="table">
            <tr>
                <td class="left indent-right">Kepada</td>
                <td class="separator">:</td>
                <td>
                    <table class="list-kepada">
                        @foreach ($suratTugas->pegawai as $index => $pegawai)
                        <tr>
                            <td style="width: 130px;">{{ $index + 1 }}. Nama</td>
                            <td class="separator">:</td>
                            <td>{{ $pegawai->nama }}</td>
                        </tr>
                        <tr>
                            <td>Pangkat/Golongan</td>
                            <td class="separator">:</td>
                            <td>{{ $pegawai->pangkat }} / {{ $pegawai->golongan->nama_golongan }}</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td class="separator">:</td>
                            <td>{{ $pegawai->nip }}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td class="separator">:</td>
                            <td>{{ $pegawai->jabatan }}</td>
                        </tr>
                    @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td>Pada</td>
                <td class="separator">:</td>
                <td>{{ $suratTugas->instansi }}</td>
            </tr>
            <tr>
                <td>Untuk</td>
                <td class="separator">:</td>
                <td>{{ $suratTugas->untuk }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td class="separator">:</td>
                <td class="line-spacing-1-5">
                    Berangkat Tanggal: {{ \Carbon\Carbon::parse($suratTugas->tgl_berangkat)->format('d F Y') }}<br>
                    Kembali Tanggal: {{ \Carbon\Carbon::parse($suratTugas->tgl_kembali)->format('d F Y') }}
                </td>
            </tr>
        </table>
    </div>
    <div class="signature">
        <p>Ditetapkan di Tana Paser</p>
        <p>Pada Tanggal {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
        <p>Sekretaris Bappedalitbang</p>
        <br><br>
        <br></br>
        <p><strong>Fachruddin Cholik SE.,M.SI</strong></p>
        <p>NIP: 19873621837</p>
    </div>
</body>
</html>
