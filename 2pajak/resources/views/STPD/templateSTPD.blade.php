<html>
<body>
<center>

    <p style="font-size:16px">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</p>
    <p style="font-size:16px">DIREKTORAT JENDRAL PAJAK<br> </p>
    <p style="font-size:14px">KANTOR PELAYANAN PAJAK</p>
    <p style="font-size:14px"-----------------------</p>
    <hr>
    <p style="font-size:16px"><b>SURAT TAGIHAN PAJAK</b></p>
    <p style="font-size:16px"><b>PAJAK PENGHASILAN</b></p>
    <hr>
</center>
<p style="font-size:12px">I. Telah dilakukan penelitian/pemeriksaan atas pelaksanaan kewajiban Pajak Penghasilan:</p>
<p style="font-size:12px">    Nama Wajib Pajak : <?php echo $_REQUEST["namaWP"]; ?></p>
<p style="font-size:12px">    NPWP : <?php echo $_REQUEST["NPWP"]; ?></p>
<p style="font-size:12px">II. Dari penelitian/pemeriksaan tersebut diatas, jumlah yang masih harus dibayar adalah sebagai berikut : </p>
<p style="font-size:12px">1. Anggaran Pajak/Pokok yang harus dibayar :<?php echo $_REQUEST["AnggaranPajak"]; ?> </p>
<p style="font-size:12px">2. Telah dibayar : <?php echo $_REQUEST["TelahDibayar"]; ?></p>
<p style="font-size:12px">3. Kurang dibayar : <?php echo $_REQUEST["AnggaranPajak"]-$_REQUEST["TelahDibayar"]; ?></p>
<p style="font-size:12px">4. Denda : <?php echo $_REQUEST["Denda"]; ?></p>

<h></h>
<br><br>
<p style="font-size:14px" align ="right">
    <right>
        a.n Direktur Jendral Pajak<br>
        Kepala Kantor/<br>
        Kepala Seksi<br><br><br><br>...................
    </right>
</p>
</center>
</body>

</html>