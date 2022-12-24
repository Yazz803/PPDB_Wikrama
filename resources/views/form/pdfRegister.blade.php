
<br>
<body style="font-family: sans-serif">    
<center>
    <table width="94%" border="0">
        <tr>
            <td rowspan="4" width="10%">
                <center><div><img src="https://ppdb.smkwikrama.sch.id/img/wk.png" width="100px"></div></center>
            </td>
            <td>
                <b>PANITIA PENERIMAAN PESERTA DIDIK BARU</b><br>
                <b>SMK WIKRAMA BOGOR TP. 2023-2024</b><br>
                Jl. Raya Wangun Kel. Sindangsari Kec. Bogor Timur Kota Bogor <br>
                Email : prohumasi@smkwikrama.sch.id | Website : http://smkwikrama.sch.id/
            </td>
        </tr>
       
    </table>
</center>
<br>
    <center><b>TANDA BUKTI PENDAFTARAN</b></center>
    <center><b>SMK Wikrama Bogor TP. 2023-2024</b></center>
    <br>
    <table width="75%" border="0" style="margin-left:3%;margin-right:2%;float:left">
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
            <td>{{ now()->format('d F Y H:i:s') }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NOMOR SELEKSI</b></td>
            <td width="3%">:</td>
            <td>{{ $biodata->no_seleksi }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NAMA LENGKAP</b></td>
            <td width="3%">:</td>
            <td>{{ $biodata->nama }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NISN</b></td>
            <td width="3%">:</td>
            <td>{{ $biodata->nisn }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>ASAL SEKOLAH</b></td>
            <td width="3%">:</td>
            <td>{{ $biodata->asal_sekolah }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NO HP</b></td>
            <td width="3%">:</td>
            <td>{{ $biodata->nomor_hp }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>EMAIL</b></td>
            <td width="3%">:</td>
            <td>{{ $biodata->email }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NO HP Ayah</b></td>
            <td width="3%">:</td>
            <td>{{ $biodata->nomor_hp_ayah }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NO HP Ibu</b></td>
            <td width="3%">:</td>
            <td>{{ $biodata->nomor_hp_ibu }}</td>
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
            <td colspan="3"><b>A. Akun Anda</b></td>
        </tr>
        <tr>
            <td colspan="3">Akses<a style="font: blue; text-decoration: none;" href="https://ppdb.smkwikrama.sch.id/student"> ppdb.smkwikrama.sch.id/student</a>, login gunakan</td>
        </tr>
        <tr>
            <td colspan="3">Username : {{ $biodata->email }}</td>
        </tr>
        <tr>
      
            <td colspan="3">Password : {{ $biodata->nisn }}</td>
        </tr>
        <tr>
            <td colspan="3">Akun ini digunakan untuk mengecek status pendaftaran pada SIM PPDB SMK Wikrama Bogor.</td>
        </tr>
    </table>
    <table width="80%" border="0" style="margin-top: 20px">
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
            <td>Pembayaran uang seleksi sebesar Rp. 200.563 melalui transfer bank:
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
                Praktis transfer pembayaran biaya seleksi, bebas biaya admin gunakan QRIS"
                scan barcode QRIS melalui Mobile Banking atau e-wallet
            </td>
        </tr>
    </table>
    <br>
    <table width="37%" border="0">
        
        
    </table>
    <br>
    <table width="37%" border="0" style="margin-left:60%;">
        
        
    </table>
</body>