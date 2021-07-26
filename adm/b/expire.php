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

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/adm.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/admin.html");

nocache;

//nilai
$filenya = "expire.php";
$judul = "[BOOKING] Expire";
$judulku = "$judul";
$judulx = $judul;
$kd = nosql($_REQUEST['kd']);
$s = nosql($_REQUEST['s']);
$kunci = cegah($_REQUEST['kunci']);
$kunci2 = balikin($_REQUEST['kunci']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}





//jika cari
if ($_POST['btnCARI'])
	{
	//nilai
	$kunci = cegah($_POST['kunci']);


	//re-direct
	$ke = "$filenya?kunci=$kunci";
	xloc($ke);
	exit();
	}





//jika hapus
if ($_POST['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);
	$page = nosql($_POST['page']);
	$ke = "$filenya?page=$page";

	//ambil semua
	for ($i=1; $i<=$jml;$i++)
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);

		//del
		mysqli_query($koneksi, "DELETE FROM orderan ".
						"WHERE kd = '$kd'");
		}

	//auto-kembali
	xloc($filenya);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();


//require
require("../../template/js/jumpmenu.js");
require("../../template/js/checkall.js");
require("../../template/js/swap.js");
?>


  
  <script>
  	$(document).ready(function() {
    $('#table-responsive').dataTable( {
        "scrollX": true
    } );
} );
  </script>
  
<?php
$waktunow = "$tahun-$bulan-$tanggal 00:00:00";



//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika null
if (empty($kunci))
	{
	$sqlcount = "SELECT * FROM orderan ".
					"WHERE tgl_expire < '$waktunow' ".
					"AND bayar_postdate IS NULL ".
					"ORDER BY postdate DESC";
	}
	
else
	{
	$sqlcount = "SELECT * FROM orderan ".
					"WHERE tgl_expire < '$waktunow' ".
					"AND bayar_postdate IS NULL ".
					"AND (tempat_nama LIKE '%$kunci%' ".
					"OR tempat_pintu_masuk LIKE '%$kunci%' ".
					"OR kodebooking LIKE '%$kunci%' ".
					"OR booking_postdate LIKE '%$kunci%' ".
					"OR booking_expire LIKE '%$kunci%' ".
					"OR tgl_berangkat LIKE '%$kunci%' ".
					"OR tgl_pulang LIKE '%$kunci%' ".
					"OR o_nama LIKE '%$kunci%' ".
					"OR o_bangsa LIKE '%$kunci%' ".
					"OR o_tgl_lahir LIKE '%$kunci%' ".
					"OR o_kelamin LIKE '%$kunci%' ".
					"OR o_jenis_id LIKE '%$kunci%' ".
					"OR o_no_id LIKE '%$kunci%' ".
					"OR o_telp LIKE '%$kunci%' ".
					"OR o_jml_wni LIKE '%$kunci%' ".
					"OR o_jml_wna LIKE '%$kunci%' ".
					"OR subtotal_wni LIKE '%$kunci%' ".
					"OR subtotal_wna LIKE '%$kunci%' ".
					"OR subtotal_kendaraan LIKE '%$kunci%' ".
					"OR bayar_total LIKE '%$kunci%') ".
					"ORDER BY postdate DESC";
	}
	
	

//query
$p = new Pager();
$start = $p->findStart($limit);

$sqlresult = $sqlcount;

$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
$pages = $p->findPages($count, $limit);
$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
$pagelist = $p->pageList($_GET['page'], $pages, $target);
$data = mysqli_fetch_array($result);



echo '<form action="'.$filenya.'" method="post" name="formx">
<p>
<input name="kunci" type="text" value="'.$kunci2.'" size="20" class="btn btn-success" placeholder="Kata Kunci...">
<input name="btnCARI" type="submit" value="CARI" class="btn btn-danger">
<input name="btnBTL" type="submit" value="RESET" class="btn btn-info">
</p>



<div class="table-responsive">          
<table class="table" border="1">
<thead>

<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="20">&nbsp;</td>
<td width="200"><strong><font color="'.$warnatext.'">POSTDATE</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">TEMPAT WISATA</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">PINTU MASUK</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">KODE BOOKING</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">BOOKING POSTDATE</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">BOOKING EXPIRE</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">TGL BERANGKAT</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">TGL PULANG</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">NAMA KETUA</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">BANGSA</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">TGL LAHIR</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">KELAMIN</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">IDENTITAS</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">TELPON</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">JML WNI</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">JML WNA</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">SUBTOTAL WNI</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">SUBTOTAL WNA</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">SUBTOTAL KENDARAAN</font></strong></td>
<td width="200"><strong><font color="'.$warnatext.'">TOTAL</font></strong></td>
</tr>
</thead>
<tbody>';

if ($count != 0)
	{
	do 
		{
		if ($warna_set ==0)
			{
			$warna = $warna01;
			$warna_set = 1;
			}
		else
			{
			$warna = $warna02;
			$warna_set = 0;
			}

		$nomer = $nomer + 1;
		$i_kd = nosql($data['kd']);
		$i_tempat_kd = balikin($data['tempat_kd']);
		$i_tempat = balikin($data['tempat_nama']);
		$i_postdate = balikin($data['postdate']);
		$i_pintu_masuk = balikin($data['tempat_pintu_masuk']);
		$i_kodebooking = balikin($data['kodebooking']);
		$i_booking_postdate = balikin($data['booking_postdate']);
		$i_booking_expire = balikin($data['booking_expire']);
		$i_tgl_berangkat = balikin($data['tgl_berangkat']);
		$i_tgl_pulang = balikin($data['tgl_pulang']);
		$i_o_nama = balikin($data['o_nama']);
		$i_o_bangsa = balikin($data['o_bangsa']);
		$i_o_tgl_lahir = balikin($data['o_tgl_lahir']);
		$i_o_kelamin = balikin($data['o_kelamin']);
		$i_o_jenis_id = balikin($data['o_jenis_id']);
		$i_o_no_id = balikin($data['o_no_id']);
		$i_o_telp = balikin($data['o_telp']);
		$i_o_jml_wni = balikin($data['o_jml_wni']);
		$i_o_jml_wna = balikin($data['o_jml_wna']);
		$i_subtotal_wni = balikin($data['subtotal_wni']);
		$i_subtotal_wna = balikin($data['subtotal_wna']);
		$i_subtotal_kendaraan = balikin($data['subtotal_kendaraan']);
		$i_total = balikin($data['bayar_total']);

		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>
		<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
        </td>
		<td>'.$i_postdate.'</td>
		<td>'.$i_tempat.'</td>
		<td>'.$i_pintu_masuk.'</td>
		<td>
		'.$i_kodebooking.'
		
		<a href="booking_pdf.php?bookkd='.$i_kd.'&bookkode='.$i_kodebooking.'" class="btn btn-danger" target="_blank">LIHAT PDF >></a>
		</td>
		<td>'.$i_booking_postdate.'</td>
		<td>'.$i_booking_expire.'</td>
		<td>'.$i_tgl_berangkat.'</td>
		<td>'.$i_tgl_pulang.'</td>
		<td>'.$i_o_nama.'</td>
		<td>'.$i_o_bangsa.'</td>
		<td>'.$i_o_tgl_lahir.'</td>
		<td>'.$i_o_kelamin.'</td>
		<td>'.$i_o_jenis_id.':'.$i_o_no_id.'</td>
		<td>'.$i_o_telp.'</td>
		<td>'.$i_o_jml_wni.'</td>
		<td>'.$i_o_jml_wna.'</td>
		<td align="right">'.xduit2($i_subtotal_wni).'</td>
		<td align="right">'.xduit2($i_subtotal_wna).'</td>
		<td align="right">'.xduit2($i_subtotal_kendaraan).'</td>
		<td align="right">'.xduit2($i_total).'</td>
		</tr>';
		}
	while ($data = mysqli_fetch_assoc($result));
	}


echo '</tbody>
  </table>
  </div>


<table width="500" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
<strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'
<br>

<input name="jml" type="hidden" value="'.$count.'">
<input name="s" type="hidden" value="'.$s.'">
<input name="kd" type="hidden" value="'.$kdx.'">
<input name="page" type="hidden" value="'.$page.'">

<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$count.')" class="btn btn-primary">
<input name="btnBTL" type="reset" value="BATAL" class="btn btn-success">
<input name="btnHPS" type="submit" value="HAPUS" class="btn btn-danger">
</td>
</tr>
</table>
</form>';


//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");


//null-kan
xclose($koneksi);
exit();
?>