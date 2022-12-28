@extends('dashboard.layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border border-dark px-4 py-3 rounded" style="background-color: #FFF">
        <h1 class="h3 mb-0 px-3 py-2 rounded font-weight-bold">Detail Pendaftaran</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Dashboard / Detail Pendaftaran</a>
    </div>

    <div class="biodata">
        <br>
        <center><b>TANDA BUKTI PENDAFTARAN</b></center>
        <center><b>SMK Wikrama Bogor TP. 2023-2024</b></center>
        <br>
        <table width="100%" border="0" style="margin-left:3%;margin-right:2%;float:left">
            <tr>
                <td colspan="3" style="padding: 10px 0;"></td>
            </tr>
            <tr>
                <td colspan="3" style="background-color: lightgray"><b>I. BIODATA CALON PESERTA DIDIK</b></td>
            </tr>
            <tr>
                <td colspan="3" style="padding: 8px 0;"></td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>TANGGAL DAFTAR</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->created_at->translatedFormat('l, d F Y H:i:s') }}</td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>NOMOR SELEKSI</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->no_seleksi }}</td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>NAMA LENGKAP</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->nama }}</td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>NISN</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->nisn }}</td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>ASAL SEKOLAH</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->asal_sekolah }}</td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>NO HP</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->nomor_hp }}</td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>EMAIL</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->email }}</td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>NO HP Ayah</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->nomor_hp_ayah }}</td>
            </tr>
            <tr>
                <td width="30%" style="font-size: 13px"><b>NO HP Ibu</b></td>
                <td width="3%">:</td>
                <td>{{ $pembayaran->biodata->nomor_hp_ibu }}</td>
            </tr>
            <tr>
                <td colspan="3" style="padding: 10px 0;"></td>
            </tr>
            <tr>
                <td colspan="3" style="background-color: lightgray"><b>II. INFORMASI DAN PERSYARATAN</b></td>
            </tr>
            <tr>
                <td colspan="3" style="padding: 8px 0;"></td>
            </tr>
            <tr>
                <td colspan="3"><b>A. Akun Peserta</b></td>
            </tr>
            <tr>
                <td colspan="3">Akses<a style="font: blue; text-decoration: none;" href="https://ppdb.smkwikrama.sch.id/student"> ppdb.smkwikrama.sch.id/student</a>, login gunakan</td>
            </tr>
            <tr>
                <td colspan="3">Username : {{ $pembayaran->biodata->email }}</td>
            </tr>
            <tr>
          
                <td colspan="3">Password : {{ $pembayaran->biodata->nisn }}</td>
            </tr>
            <tr>
                <td colspan="3">Akun ini digunakan untuk mengecek status pendaftaran pada SIM PPDB SMK Wikrama Bogor.</td>
            </tr>
        </table>
        <table width="100%" border="0" style="margin-left:3%;margin-right:2%;float:left">
            <tr>
                <td colspan="3" style="padding: 8px 0;"></td>
            </tr>
               <tr>
                <td><b>B. Foto/Scan Dokumen yang Harus Dipersiapkan</b></td>
            </tr>
            
            <tr>
                <td>
                    1. Formulir A1 - Daftar Nilai dan Kehadiran ditandatangani Kepala SMP/MTs. Asal<br>
                    2. Akta Kelahiran dalam bentuk pdf/jpeg(satu file)<br>
                    3. KTP Ayah dan ibu dipisah dalam bentuk pdf/jpeg<br>
                    4. Kartu Keluarga dalam bentuk pdf/jpeg<br>
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td colspan="3" style="background-color: white"><b>C. Biaya Seleksi</b></td>
            </tr>
            <tr>
                <td>ang seleksi sebesar Rp. 200.563 melalui transfer bank:
                </td>
            </tr>
            <tr>
                <td>
                    Bank BNI: 1324868778 A.N SMK Wikrama Sekolah.
                </td>
            </tr>
            <tr>
                <td>Pastikan nominal transfer dengan kode unik 3 digit terakhir sesuai dengan nomor seleksi</td>
            </tr>
            <tr>
                <td>
                    <div><img src="https://ppdb.smkwikrama.sch.id/img/qris.jpg" width="120px"></div>
                </td>
            </tr>
            <tr>
                <td>
                    Praktis transfer iaya seleksi, bebas biaya admin gunakan QRIS"
                    scan barcode QRIS melalui Mobile Banking atau e-wallet
                </td>
            </tr>
        </table>
    </div>
@endsection