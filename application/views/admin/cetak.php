<!-- <html><head>
    <style>
    table {
        font-family: sans-serif;
        border: 0mm solid aqua;
        border-collapse: collapse;
    }
    table.table2 {
        border: 2mm solid aqua;
        border-collapse: collapse;
        overflow: auto;
    }
    table.layout {
        border: 0mm solid black;
        border-collapse: collapse;
    }
    td.layout {
        text-align: center;
        border: 0mm solid black;
    }
    td {
        padding: 3mm;
        border: 0.5mm solid;
        vertical-align: middle;
    }
    td.redcell {
        border: 3mm solid red;
    }
    td.redcell2 {
        border: 2mm solid red;
    }
</style>
</head>
<body>
    <h2>STIE JIC</h2>
    <h3>Data Alumni Angkatan <b><?=$getnumber['date1']; ?></b> sampai <b><?=$getnumber['date2']; ?></b></h3>
            <table border="1">
                <tbody>
                    <tr>
                        <td><small>NIM</small></td>
                        <td><small>Nama</small></td>
                        <td><small>Angkatan</small></td>
                        <td><small>Alamat</small></td>
                        <td><small>Nama Perusahaan</small></td>
                        <td><small>Alamat Perusahaan</small></td>
                        <td><small>Jabatan</small></td>
                        <td><small>Email</small></td>
                        <td><small>No Telp</small></td>
                        <?php
                                    if (isset($viewdata) && !empty($viewdata)) {
                                        foreach ($viewdata as $val) {
                                            ?>
                                            <tr>
                                                <td><small><p><?php echo $val->nim; ?></p></small></td>
                                                <td><small><p><?php echo ucwords(strtolower($val->nama)); ?></p></small></td>
                                                <td><small><p><?= empty($val->angkatan)|!isset($val->angkatan)? '-': $val->angkatan; ?></p></small></td>
                                                <td><small><p><?= empty($val->alamat_skrg)|!isset($val->alamat_skrg)? '-': $val->alamat_skrg; ?></p></small></td>
                                                <td><small><p><?= empty($val->nm_perusahaan)|!isset($val->nm_perusahaan)? '-': $val->nm_perusahaan;?></p></small></td>
                                                <td><small><p><?= empty($val->alamat_perusahaan)|!isset($val->alamat_perusahaan)? '-': $val->alamat_perusahaan;?></p></small></td>
                                                <td><small><p><?= empty($val->pekerjaan)|!isset($val->pekerjaan)? '-': $val->pekerjaan; ?></p></small></td>
                                                <td><small><p><?php echo $val->email; ?></p></small></td>
                                                <td><small><p><?= empty($val->telp)|!isset($val->telp)? '-': $val->telp; ?></p></small></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="5" class="alert alert-danger">No Records founds</td>    
                                        </tr>
                                    <?php } ?>                        
                </tbody>
            </table>
            </body>
            </html> -->

<html>
<head>
    <style>
    body {font-family: sans-serif;
        font-size: 10pt;
    }
    p { margin: 0pt; }
    table.items {
        border: 0.1mm solid #000000;
    }
    td { vertical-align: top; }
    .items td {
        border-left: 0.1mm solid #000000;
        border-right: 0.1mm solid #000000;
    }
    table thead td { background-color: #EEEEEE;
        text-align: center;
        border: 0.1mm solid #000000;
        font-variant: small-caps;
    }
    .items td.blanktotal {
        background-color: #EEEEEE;
        border: 0.1mm solid #000000;
        background-color: #FFFFFF;
        border: 0mm none #000000;
        border-top: 0.1mm solid #000000;
        border-right: 0.1mm solid #000000;
    }
    .items td.totals {
        text-align: right;
        border: 0.1mm solid #000000;
    }
    .items td.cost {
        text-align: "." center;
    }
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%">
    <tr>

        <td rowspan="5" width="5%" style="color:#0000BB; "><img src="assets/img/logo-stie2.png" width="200px" /></td>
        <td rowspan="5" width="60%"></td>
        <td colspan="3" width="35%"><span style="font-weight: bold; font-size: 12pt;">STIE Jakarta International College</span><br>Graha mandiri, 2nd  Floor<br />Jl.Imam Bonjol No.61 Menteng, Jakarta 10310, Indonesia
        </td>
    </tr>
    <tr>
        <td>Phone</td>
        <td width="5%">:</td>
        <td>+62 21 3983 4061 (Hunting)</td>
    </tr>
    <tr>
        <td>Fax</td>
        <td width="5%">:</td>
        <td>+62 21 3983 4060</td>
    </tr>
    <tr>
        <td>Website</td>
        <td width="5%">:</td>
        <td>www.jic.ac.id</td>
    </tr>
    <tr>
        <td>Email</td>
        <td width="5%">:</td>
        <td>information@jic.ac.id</td>
    </tr>

</table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
&nbsp;&nbsp;
<!-- <div style="text-align: right">Date: 13th November 2008</div> -->
<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0mm #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">STIE-JIC</span><br /><br />Data Alumni Angkatan <b><?=$getnumber['date1']; ?></b> sampai <b><?=$getnumber['date2']; ?></b></td>
<td width="10%">&nbsp;</td>
<td width="45%">&nbsp;</td>
<!-- <td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td> -->
</tr></table>
<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="10%"><small>NIM</small></td>
<td width="15%"><small>Nama</small></td>
<td width="5%"><small>Tahun Masuk</small></td>
<td width="15%"><small>Alamat</small></td>
<td width="7%"><small>Nama Perusahaan</small></td>
<td width="15%"><small>Alamat Perusahaan</small></td>
<td width="10%"><small>Jabatan</small></td>
<td width="13%"><small>Email</small></td>
<td width="10%"><small>No Telp</small></td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<?php
if (isset($viewdata) && !empty($viewdata)) {
    foreach ($viewdata as $val) {
        ?>
        <tr>
            <td><small><p><?php echo $val->nim; ?></p></small></td>
            <td><small><p><?php echo ucwords(strtolower($val->nama)); ?></p></small></td>
            <td><small><p><?= empty($val->angkatan)|!isset($val->angkatan)? '-': $val->angkatan; ?></p></small></td>
            <td><small><p><?= empty($val->alamat_skrg)|!isset($val->alamat_skrg)? '-': $val->alamat_skrg; ?></p></small></td>
            <td><small><p><?= empty($val->nm_perusahaan)|!isset($val->nm_perusahaan)? '-': $val->nm_perusahaan;?></p></small></td>
            <td><small><p><?= empty($val->alamat_perusahaan)|!isset($val->alamat_perusahaan)? '-': $val->alamat_perusahaan;?></p></small></td>
            <td><small><p><?= empty($val->pekerjaan)|!isset($val->pekerjaan)? '-': $val->pekerjaan; ?></p></small></td>
            <td><small><p><?php echo $val->email; ?></p></small></td>
            <td><small><p><?= empty($val->telp)|!isset($val->telp)? '-': $val->telp; ?></p></small></td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="5" class="alert alert-danger">No Records founds</td>    
    </tr>
<?php } ?> 
</tbody>
</table>
<!-- <div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div> -->
</body>
</html>
