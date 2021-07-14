<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen - Berita RRI</title>
  </head>
  <body>
    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-ej5o{border-color:#ffffff;font-family:"Times New Roman", Times, serif !important;;text-align:center;vertical-align:top}
    .tg .tg-apg4{border-color:#ffffff;font-family:"Times New Roman", Times, serif !important;;font-size:18px;text-align:center;
    vertical-align:top}
    </style>
    <table class="tg" style="undefined;table-layout: fixed; width: 100%">
      <colgroup>
      <col style="width: 20%">
      <col style="width: 70%">
      <col style="width: 10%">
      </colgroup>
      <thead>
        <tr>
          <th style="width: 20%" class="tg-ej5o" rowspan="2"><img src="asset/RRI_Pro_1_Palembang.png" width="100"></th>
          <th style="width: 70%" class="tg-apg4">RRI RADIO TANGGAP BENCANA COVID 19<br>HASTAG INDONESIA TATANAN KEHIDUPAN BARU <br><span style="font-weight:bold">DAFTAR ACARA SIARAN PROGRAMA 1</span></th>
          <th style="width: 10%" class="tg-ej5o" rowspan="2"></th>
        </tr>
        <tr>
          <td class="tg-apg4"><span style="font-weight:bold">Pusat Peemberdayaan Masyarakat FM.92,4 Mhz-1287 Khz</span></td>
        </tr>
      </thead>
    </table>
    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-xeyn{border-color:inherit;font-family:"Times New Roman", Times, serif !important;;font-size:12px;font-weight:bold;
    text-align:center;vertical-align:top}
    .tg .tg-2c25{border-color:inherit;font-family:"Times New Roman", Times, serif !important;;font-size:12px;font-weight:bold;
    text-align:left;vertical-align:top}
    </style>
    <table class="tg" style="undefined;table-layout: fixed; width: 100%">
      <colgroup>
      <col style="width: 92px">
      <col style="width: 292px">
      <col style="width: 78px">
      <col style="width: 78px">
      <col style="width: 340px">
      </colgroup>
      <thead>
        <tr>
          <th class="tg-xeyn" colspan="5"><span style="font-style:italic"><?= $query2['tanggal'] ?></span></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="tg-xeyn" rowspan="2">WAKTU<br>WIB</td>
          <td class="tg-xeyn" colspan="3"><span style="font-weight:bold">MATERI SIARAN</span></td>
          <td class="tg-xeyn" rowspan="2">KETERANGAN</td>
        </tr>
        <tr>
          <td class="tg-xeyn">PROGRAM</td>
          <td class="tg-xeyn">FRAME</td>
          <td class="tg-xeyn">DURASI</td>
        </tr>
        <tr>
          <td class="tg-xeyn"><?= $query2['pukul'] ?></td>
          <td class="tg-xeyn">WARTA BERITA DAERAH <br>
            <?php
            $no=1;
            foreach($query->result() as $q) { ?>
            <?=$no++ ?>. <?= $q->ringkasan_laporan ?><br>
            <?php } ?>
          </td>
          <td class="tg-xeyn"><?= $query2['frame'] ?></td>
          <td class="tg-xeyn"><?= $query2['durasi'] ?></td>
          <td class="tg-2c25">Pembaca Berita  :  <?= $query2['pembaca_berita'] ?></td>
        </tr>
        <tr>
          <td class="tg-xeyn"><?= $query3['pukul'] ?></td>
          <td class="tg-xeyn">WARTA BERITA OLAHRAGA <br>
            <?php
            $no=1;
            foreach($query1->result() as $q) { ?>
            <?=$no++ ?>. <?= $q->ringkasan_laporan ?><br>
            <?php } ?>
          </td>
          <td class="tg-xeyn"><?= $query3['frame'] ?></td>
          <td class="tg-xeyn"><?= $query3['durasi'] ?></td>
          <td class="tg-2c25">Pembaca Berita  :  <?= $query3['pembaca_berita'] ?></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>