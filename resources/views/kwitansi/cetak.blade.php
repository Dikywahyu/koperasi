<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url('file://{{ public_path("kwitansi.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100%;
            font-family: sans-serif;
        }

        .content {
            position: absolute;
            top: 100px;
            left: 80px;
            color: black;
        }

        .summary {
            padding: 80px 100px 10px 120px;
            color: #00058b;
            margin-top: -0.5cm;
            margin-left: -1.2cm;
            font-size: 25px;
        }

        td,
        th {
            padding: 12px 8px;
            /* Tambahkan padding vertikal */
            line-height: 0.3;
            /* Tambahkan tinggi baris */
            font-size: 17px;
        }
    </style>
</head>

<body>
    <div style="padding: 100px; color: black; margin-top:3.2cm; margin-left:-1.2cm">
        <table class="info-table" style="width:100%">
            <tr>
                <td>Nomor Transaksi</td>
                <td>: {{ $kwitansi->nomor_transaksi }}</td>
                <td> </td>
                <td>Donasi Bulan</td>
                <td>: {{ strtoupper(tanggal_indo($kwitansi->donasi->bulan_donasi, 'F Y')) }}</td>
            </tr>
            <tr>
                <td>Kode Donatur</td>
                <td>: {{ $kwitansi->donasi->donatur->kode_donatur }}</td>
                <td> </td>
                <td>Zisco</td>
                <td>: {{ $kwitansi->donasi->zisco->nama ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Donatur</td>
                <td>: {{ $kwitansi->donasi->donatur->nama }}</td>
            </tr>
            <tr>
                <td>Kode Instansi</td>
                <td>: {{ $kwitansi->donasi->donatur->instansi->nama ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Instansi</td>
                <td>: {{ $kwitansi->donasi->donatur->instansi->nama ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $kwitansi->donasi->donatur->alamat }}</td>
            </tr>
        </table>
    </div>
    <div style="padding: 0px 100px 0px 100px; color: black; margin-top:-0.7cm; margin-left:-1.2cm">
        <table class="donasi-table">
            <tbody>
                <tr>
                    <td style="  width: 70px; text-align: center">1</td>
                    <td style="  width: 220px;">{{ strtoupper($kwitansi->donasi->jenisDonasi->jenis) }}</td>
                    <td style="  width: 270px;">{{ strtoupper($kwitansi->donasi->jenisDonasi->nama) }}</td>
                    <td style="  width: 120px;">Rp. {{ number_format($kwitansi->donasi->nominal, 0, ',', '.') }}</td>
                    <td style="  width: 50px;">1</td>
                    <td style="  width: 120px;">Rp. {{ number_format($kwitansi->donasi->nominal, 0, ',', '.') }}</td>
                    <td style="  width: 180px;"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="summary">
        <strong>Rp. {{ number_format($kwitansi->donasi->nominal, 0, ',', '.') }}</strong><br>
        <br><br>
        <i>{{ strtoupper(terbilang($kwitansi->donasi->nominal)) }} RUPIAH</i>

    </div>
</body>

</html>