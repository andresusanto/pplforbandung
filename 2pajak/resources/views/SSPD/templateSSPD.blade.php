<html>
<body>
<center>

    <p style="font-size:16px">PEMERINTAH PROVINSI JAWA BARAT BANDUNG</p>
    <p style="font-size:16px">DINAS Pendapatan Kota Bandung<br> </p>
    <p style="font-size:14px">Jl. Wastukakencana No. 2 Bandung 9999</p>
    <hr>
    </center>
    <p style="font-size:14px">Laporan 54321</p>
<center>
    <p style="font-size:16px"><b>Pajak Lunas</b></p>
    <p style="font-size:16px"><b>(SSPD)</b></p>
</center>
    <p style="font-size:12px">Nama Wajib Pajak : <?php echo $_REQUEST["namaWP"]; ?></p>
    <p style="font-size:12px">Alamat : <?php echo $_REQUEST["alamatWP"]; ?></p>
    <p style="font-size:12px">RT : <?php echo $_REQUEST["RT"]; ?></p>
    <p style="font-size:12px">RW :  <?php echo $_REQUEST["RW"]; ?></p>
    <p style="font-size:12px">KodePos : <?php echo $_REQUEST["KodePos"]; ?></p>
    <p style="font-size:12px">NPWP : <?php echo $_REQUEST["NPWP"]; ?></p>
    <p style="font-size:12px">Jenis Pajak : <?php echo $_REQUEST["JenisPajak"]; ?></p>
    <p style="font-size:12px">Nama Objek : <?php echo $_REQUEST["NamaObjek"]; ?></p>
    <p style="font-size:12px">Masa Pajak : <?php echo $_REQUEST["MasaObjek"]; ?></p>
    <p style="font-size:12px">Tahun Pajak : <?php echo $_REQUEST["TahunPajak"]; ?></p>
    <p style="font-size:12px">SKPDKB : <?php echo $_REQUEST["SKPDKB"]; ?></p>
    <p style="font-size:12px">SKPDKBT : <?php echo $_REQUEST["SKPDKBT"]; ?></p>
    <p style="font-size:12px">STPD : <?php echo $_REQUEST["STPD"]; ?></p>
    <p style="font-size:12px">Lainnya : <?php echo $_REQUEST["Lainnya"]; ?></p>
    <p style="font-size:12px">Besar Setoran : <?php echo $_REQUEST["BesarSetoran"]; ?></p>
    <h></h>
    <br><br>
<table>
    <col width="130">
    <col width="80">

    <tr>
        <td>
            Disetujui Oleh :<br><br><br><br><center> <?php echo $_REQUEST["namaWP"]; ?></center>
        </td>
    </tr>
</table>
</center>
</body>

</html>