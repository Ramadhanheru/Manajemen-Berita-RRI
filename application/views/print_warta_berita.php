<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Manajemen - Berita RRI</title>
		<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
		overflow:hidden;padding:10px 5px;word-break:normal;}
		.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
		font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
		.tg .tg-zv4m{border-color:#ffffff;text-align:left;vertical-align:top}
		.tg .tg-28fx{border-color:#ffffff;font-family:"Arial Black", Gadget, sans-serif !important;;font-size:32px;text-align:center;
		vertical-align:top}
		.tg .tg-ofj5{border-color:#ffffff;text-align:right;vertical-align:top}
		</style>
	</head>
	<body>
		<center>
		<table class="tg" style="undefined;table-layout: fixed; width: 100%">
			<colgroup>
			<col style="width: 228px">
			<col style="width: 236px">
			</colgroup>
			<thead>
				<tr>
					<th class="tg-28fx" colspan="2"><span style="font-weight:bold">WARTA BERITA DAERAH</span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="tg-ofj5">HARI/TANGGAL  :</td>
					<td class="tg-zv4m"><?= $query1['hari'] ?> / <?= $query1['tanggal'] ?></td>
				</tr>
				<tr>
					<td class="tg-ofj5">PUKUL  :</td>
					<td class="tg-zv4m"><?= $query1['pukul'] ?></td>
				</tr>
				<tr>
					<td class="tg-ofj5">DESK EDITOR  :</td>
					<td class="tg-zv4m"><?= $query1['desk_editor'] ?></td>
				</tr>
			</tbody>
		</table>
		</center>
		<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
		overflow:hidden;padding:10px 5px;word-break:normal;}
		.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
		font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
		.tg .tg-g145{font-family:"Times New Roman", Times, serif !important;;text-align:center;vertical-align:top}
		.tg .tg-gh1y{font-family:"Times New Roman", Times, serif !important;;font-weight:bold;text-align:center;vertical-align:top}
		</style>
		<table class="tg" style="undefined;table-layout: fixed; width: 100%">
			<colgroup>
			<col style="width: 135px">
			<col style="width: 586px">
			</colgroup>
			<thead>
				<tr>
					<th class="tg-g145" width="20%"><span style="font-weight:bold">PETUGAS</span></th>
					<th class="tg-g145" width="80%"><span style="font-weight:bold">CUE</span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="tg-gh1y">OPERATOR</td>
					<td class="tg-gh1y">TUNE IN PEMBUKA</td>
				</tr>
				<tr>
					<td class="tg-gh1y">PENYIAR</td>
					<td class="tg-gh1y">PUKUL ENAM BELAS WAKTU INDONESIA BARAT.//</td>
				</tr>
				<tr>
					<td class="tg-gh1y">OPERATOR</td>
					<td class="tg-gh1y">PUTAR EAR CATHER</td>
				</tr>
				<tr>
					<td class="tg-gh1y">PENYIAR</td>
					<td class="tg-g145">ITULAH DIANTARANYA INFORMASI YANG KAMI HADIRKAN SORE HARI INI ['TANGGAL WARTA BERITA']  / YANG BERHASIL DIHIMPUN TIM REDAKSI RRI PALEMBANG.// BERSAMA SAYA ......................// INILAH WARTA BERITA SELENGKAPNYA.//</td>
				</tr>
				<?php foreach($query->result() as $q) { ?>
				<tr>
					<td class="tg-gh1y">OPERATOR</td>
					<td class="tg-gh1y">LAPORAN&nbsp; <?= strtoupper($q->nama); ?></td>
				</tr>
				<tr>
					<td class="tg-gh1y">PENYIAR</td>
					<td class="tg-gh1y"><?= $q->ringkasan_laporan; ?></td>
				</tr>
				<?php } ?>
				<tr>
					<td class="tg-gh1y">OPERATOR</td>
					<td class="tg-gh1y">TUNE 4 PUTAR BACKSOUND TUTUP WARTA BERITA</td>
				</tr>
				<tr>
					<td class="tg-gh1y">PENYIAR</td>
					<td class="tg-g145">PENDENGAR KEMBALI KAMI INGATKAN / UNTUK MEMUTUS MATA RANTAI PENYEBARAN COVID - 19 DI SUMATERA SELATAN / INGAT SELALU PESAN IBU UNTUK SELALU MENGGUNAKAN MASKER / MENCUCI TANGAN DENGAN SABUN DI AIR YANG MENGALIR / DAN MENJAGA JARAK DENGAN MENJAUHI KERUMUNAN / MARI BERSAMA TERAPKAN PROTOKOL KESEHATAN / KARENA SEHAT ITU MAHAL //</td>
				</tr>
				<tr>
					<td class="tg-gh1y">PENYIAR</td>
					<td class="tg-g145">SEKIAN WARTA BERITA PRODUKSI <br>RADIO REPUBLIK INDONESIA PALEMBANG.// <br>KRITIK DAN SARAN DAPAT ANDA SAMPAIKAN MELALUI <br>WHATSAPP KAMI DI NOMOR <br><span style="font-weight:bold">082179279090</span><br>MEWAKILI KERABAT KERJA YANG BERTUGAS <br>SAYA ........................................<br>MENGUCAPKAN TERIMAKASIH ATAS PERHATIAN ANDA.//<br>SELAMAT SORE DAN SAMPAI JUMPA.//</td>
				</tr>
				<tr>
					<td class="tg-gh1y"><span style="font-weight:bold">OPERATOR</span></td>
					<td class="tg-gh1y">TUNE TUTUP</td>
				</tr>
			</tbody>
		</table>
		
	</body>
</html>