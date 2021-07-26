<?php
//////////////////////////////////////////////////////////////////////
// WISATA-BIASAWAE v1.0, Web informasi wisata dan booking           //
// Cocok untuk kelola booking online objek wisata.                  //
// baik tempat wisata yang dikelola dinas pariwisata maupun bumdes  //
//////////////////////////////////////////////////////////////////////
// Dikembangkan oleh : Agus Muhajir                                 //
// E-Mail : hajirodeon@gmail.com                                    //
// HP/SMS/WA : 081-829-88-54                                        //
// source code : http://github.com/hajirodeon                       //
//////////////////////////////////////////////////////////////////////



session_start();


//ambil nilai
require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");
require("inc/class/paging.php");
$tpl = LoadTpl("template/cp_booking.html");



nocache;



//nilai
$filenya = "booking2.php"; 
$judulku = $judul; 
$bookkd = nosql($_REQUEST['bookkd']);
$bookkode = nosql($_REQUEST['bookkode']);
$judul = "Rincian Booking : $bookkode";










//artikel image ////////////////////////////////////////////////////////////////////////////////////////
ob_start();



//kasi random
$qyuk2 = mysqli_query($koneksi, "SELECT * FROM cp_g_foto ".
						"ORDER BY RAND()");
$ryuk2 = mysqli_fetch_assoc($qyuk2);
$yuk2_kd = nosql($ryuk2['kd']);
$yuk2_nama = balikin($ryuk2['nama']);
$yuk2_filex = balikin($ryuk2['filex']);


$ku_filex2 = "$sumber/filebox/foto/$yuk2_kd/$yuk2_filex";


echo $ku_filex2;

//isi
$i_artikel_image = ob_get_contents();
ob_end_clean();
















//brcrumb ////////////////////////////////////////////////////////////////////////////////////////
ob_start();


echo '<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="'.$sumber.'"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a></li>
        <li class="breadcrumb-item"><a href="booking.php">Booking</a></li>
    </ol>
</nav>';

					
					
//isi
$i_artikel_bcrumb = ob_get_contents();
ob_end_clean();
















//isi *START
ob_start();

require("template/js/jumpmenu.js");
require("template/js/number.js");

?>


  
  <script>
  	$(document).ready(function() {
    $('#table-responsive').dataTable( {
        "scrollX": true
    } );
} );
  </script>
  



<?php
echo '<form action="'.$filenya.'" method="post" name="formx2" id="formx2" enctype="multipart/form-data">';

//detail 
$qyukx = mysqli_query($koneksi, "SELECT * FROM orderan ".
						"WHERE kd = '$bookkd' ".
						"AND kodebooking = '$bookkode'");
$ryukx = mysqli_fetch_assoc($qyukx);
$tyukx = mysqli_num_rows($qyukx);


//jika ada
if (!empty($tyukx))
	{
	$b_kode = balikin($ryukx['kodebooking']);
	$b_booking_postdate = balikin($ryukx['booking_postdate']);
	$b_booking_expire = balikin($ryukx['booking_expire']);
	$b_tempat_kd = balikin($ryukx['tempat_kd']);
	$b_tempat_nama = balikin($ryukx['tempat_nama']);
	$b_pintu_masuk = balikin($ryukx['tempat_pintu_masuk']);
	$b_tgl_berangkat = balikin($ryukx['tgl_berangkat']);
	$b_tgl_pulang = balikin($ryukx['tgl_pulang']);
	$b_o_nama = balikin($ryukx['o_nama']);
	$b_o_bangsa = balikin($ryukx['o_bangsa']);
	$b_o_tgl_lahir = balikin($ryukx['o_tgl_lahir']);
	$b_o_kelamin = balikin($ryukx['o_kelamin']);
	$b_o_jenis_id = balikin($ryukx['o_jenis_id']);
	$b_o_no_id = balikin($ryukx['o_no_id']);
	$b_o_telp = balikin($ryukx['o_telp']);
	$b_o_jml_wni = balikin($ryukx['o_jml_wni']);
	$b_o_jml_wna = balikin($ryukx['o_jml_wna']);
	$b_o_wni_harga = balikin($ryukx['wni_harga']);
	$b_o_wna_harga = balikin($ryukx['wna_harga']);
	
	$b_o_subtotal_wni = balikin($ryukx['subtotal_wni']);
	$b_o_subtotal_wna = balikin($ryukx['subtotal_wna']);
	$b_o_subtotal_anggota = $b_o_subtotal_wni + $b_o_subtotal_wna; 
	$b_o_subtotal_kendaraan = balikin($ryukx['subtotal_kendaraan']);
	$b_o_bayar_total = balikin($ryukx['bayar_total']);


	echo '<h3>RINCIAN BOOKING</h3>

	
	<p>
	<div class="table-responsive">
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td align="center"><strong><font color="'.$warnatext.'">KODE BOOKING</font></strong></td>
	</tr>
	</thead>
	<tbody>';
	
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td align="center"><h3>'.$b_kode.'</h3>
		<br>
		Total Bayar :
		<br>
		<b>'.xduit2($b_o_bayar_total).'</b>
		</td>
		</tr>';
	
	
	echo '</tbody>
	</table>
	</div>
	
	</p>


	
	<p>
	Nama Ketua Kelompok :
	<br>
	<b>'.$b_o_nama.'</b>
	</p>
	
	
	<p>
	Bangsa :
	<br>
	<b>'.$b_o_bangsa.'</b>
	</p>
	
	<p>
	Tanggal Lahir :
	<br>
	<b>'.$b_o_tgl_lahir.'</b>
	</p>
	
	
	<p>
	Jenis Kelamin :
	<br>
	<b>'.$b_o_kelamin.'</b>
	</p>

	
	<p>
	Identitas :
	<br>
	<b>'.$b_o_jenis_id.' : '.$b_o_no_id.'</b>
	</p>
	
	
	<p>
	Telepon/WA :
	<br>
	<b>'.$b_o_telp.'</b>
	</p>


	
	<p>
	<div class="table-responsive">
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="200" align="center"><strong><font color="'.$warnatext.'">ANGGOTA</font></strong></td>
	<td width="100" align="center"><strong><font color="'.$warnatext.'">@ HARGA</font></strong></td>
	<td width="50" align="center"><strong><font color="'.$warnatext.'">JUMLAH</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">SUBTOTAL</font></strong></td>
	</tr>
	</thead>
	<tbody>';
	
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>WNI</td>
		<td align="right">'.xduit2($b_o_wni_harga).'</td>
		<td align="right">'.$b_o_jml_wni.'</td>
		<td align="right">'.xduit2($b_o_subtotal_wni).'</td>
		</tr>';
	
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>WNA</td>
		<td align="right">'.xduit2($b_o_wna_harga).'</td>
		<td align="right">'.$b_o_jml_wna.'</td>
		<td align="right">'.xduit2($b_o_subtotal_wna).'</td>
		</tr>';

	echo '<tr valign="top" bgcolor="'.$warnaheader.'">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td align="right"><strong><font color="'.$warnatext.'">'.xduit2($b_o_subtotal_anggota).'</font></strong></td>
	</tr>
	
	</tbody>
	</table>
	</div>
	
	
	</p>
	


		
	<hr>
	
	
	<p>
	<div class="table-responsive">
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="200" align="center"><strong><font color="'.$warnatext.'">KENDARAAN</font></strong></td>
	<td width="100" align="center"><strong><font color="'.$warnatext.'">@ HARGA</font></strong></td>
	<td width="50" align="center"><strong><font color="'.$warnatext.'">JUMLAH</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">SUBTOTAL</font></strong></td>
	</tr>
	</thead>
	<tbody>';
	
	
	//list 
  	$qkuy = mysqli_query($koneksi, "SELECT * FROM orderan_kendaraan ".
							"WHERE orderan_kd = '$bookkd' ".
  							"ORDER BY kendaraan ASC");
	$rkuy = mysqli_fetch_assoc($qkuy);
	
	do
		{
		$y_kd = cegah($rkuy['kd']);
		$y_nama = cegah($rkuy['kendaraan']);
		$y_jml = cegah($rkuy['jml']);
		$y_harga = cegah($rkuy['harga']);
		$y_subtotal = cegah($rkuy['subtotal']);

		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$y_nama.'</td>
		<td align="right">'.xduit2($y_harga).'</td>
		<td align="right">'.$y_jml.'</td>
		<td align="right">'.xduit2($y_subtotal).'</td>
		</tr>';
	
		}
	while ($rkuy = mysqli_fetch_assoc($qkuy));
	
	echo '<tr valign="top" bgcolor="'.$warnaheader.'">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td align="right"><strong><font color="'.$warnatext.'">'.xduit2($b_o_subtotal_kendaraan).'</font></strong></td>
	</tr>
	
	</tbody>
	</table>
	</div>
	
	
	</p>
	
	
	
	
	<hr>


	
	<p>
	<div class="table-responsive">
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td align="center"><strong><font color="'.$warnatext.'">KODE BOOKING</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">TOTAL BAYAR</font></strong></td>
	</tr>
	</thead>
	<tbody>';
	
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td align="center"><h3>'.$b_kode.'</h3></td>
		<td align="center">'.xduit2($b_o_bayar_total).'</td>
		</tr>';
	
	echo '</tbody>
	</table>
	</div>
	
	
	</p>

	<hr>
	
	
	
		<a href="booking_pdf.php?bookkd='.$bookkd.'&bookkode='.$bookkode.'" class="btn btn-danger">UNDUH PDF BOOKING</a>
	<hr>';
	}

else
	{
	echo '<font color="red">
	<h3>TIDAK DITEMUKAN...!!</h3>
	</font>';
	}
	
echo '</form>';


//isi
$i_artikel_detail = ob_get_contents();
ob_end_clean();




























//isi *START
ob_start();

require("i_footer.php");

//isi
$i_footer = ob_get_contents();
ob_end_clean();










//isi *START
ob_start();



//detail 
$qyukx = mysqli_query($koneksi, "SELECT * FROM orderan ".
						"WHERE kd = '$bookkd' ".
						"AND kodebooking = '$bookkode'");
$ryukx = mysqli_fetch_assoc($qyukx);
$tyukx = mysqli_num_rows($qyukx);
$b_kode = balikin($ryukx['kodebooking']);
$b_booking_postdate = balikin($ryukx['booking_postdate']);
$b_booking_expire = balikin($ryukx['booking_expire']);
$b_tempat_kd = balikin($ryukx['tempat_kd']);
$b_tempat_nama = balikin($ryukx['tempat_nama']);
$b_pintu_masuk = balikin($ryukx['tempat_pintu_masuk']);
$b_tgl_berangkat = balikin($ryukx['tgl_berangkat']);
$b_tgl_pulang = balikin($ryukx['tgl_pulang']);
$b_o_nama = balikin($ryukx['o_nama']);
$b_o_bangsa = balikin($ryukx['o_bangsa']);
$b_o_tgl_lahir = balikin($ryukx['o_tgl_lahir']);
$b_o_kelamin = balikin($ryukx['o_kelamin']);
$b_o_jenis_id = balikin($ryukx['o_jenis_id']);
$b_o_no_id = balikin($ryukx['o_no_id']);
$b_o_telp = balikin($ryukx['o_telp']);
$b_o_jml_wni = balikin($ryukx['o_jml_wni']);
$b_o_jml_wna = balikin($ryukx['o_jml_wna']);
$b_o_wni_harga = balikin($ryukx['o_wni_harga']);
$b_o_wna_harga = balikin($ryukx['o_wna_harga']);
$b_o_subtotal_wni = balikin($ryukx['o_subtotal_wni']);
$b_o_subtotal_wna = balikin($ryukx['o_subtotal_wna']);
$b_o_subtotal_kendaraan = balikin($ryukx['o_subtotal_kendaraan']);
$b_o_bayar_total = balikin($ryukx['o_bayar_total']);


//detail tempat
$qx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
					"WHERE kd = '$b_tempat_kd'");
$rowx = mysqli_fetch_assoc($qx);
$e_kd = nosql($rowx['kd']);
$e_kode = balikin($rowx['kode']);
$e_nama = balikin($rowx['nama']);
$e_filex1 = balikin($rowx['filex']);


//jika edit / baru
//nek null foto
if (empty($e_filex1))
	{
	$nil_foto = "$sumber/template/img/bg-black.png";
	}
else
	{
	$nil_foto = "$sumber/filebox/tempat/$e_kd/$e_filex1";
	}
	

	
	
echo '<img src="'.$nil_foto.'" width="100%" class="img-thumbnail">

<h3>'.$e_nama.'</h3>

<hr>
<p>
Pintu Masuk : 
<br>
<b>'.$b_pintu_masuk.'</b>

</p>
<hr>


<p>
Kode Booking Dibuat pada <b>'.$b_booking_postdate.'</b>, Hanya Berlaku maksimal 3(TIGA) Jam. 

Akan Expire pada <b>'.$b_booking_expire.'</b>. 
</p>

<hr>
<p>
Bila sudah memiliki Kode Booking, Segeralah Menuju Loket Tempat Wisata Yang Dituju.
</p>
<hr>

<p>
Pengambilan Tiket, Setelah Menunjukkan Kode Booking dan Melakukan Pembayaran di Loket Tempat Wisata.
</p>


<hr>';



	
	
//isi
$i_terbaru = ob_get_contents();
ob_end_clean();
















require("inc/niltpl.php");


//diskonek
xclose($koneksi);
exit();
?>