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
$tpl = LoadTpl("template/cp_kapasitas.html");



nocache;



//nilai
$filenya = "kapasitas.php";
$judul = "Kapasitas"; 
$judulku = $judul; 
$tmpkd = nosql($_REQUEST['tmpkd']);
$utgl = nosql($_REQUEST['utgl']);
$ubln = nosql($_REQUEST['ubln']);
$uthn = nosql($_REQUEST['uthn']);






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
        <li class="breadcrumb-item"><a href="kapasitas.php">Kapasitas</a></li>
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


//detail tempat
$qyukx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
						"WHERE kd = '$tmpkd'");
$ryukx = mysqli_fetch_assoc($qyukx);
$tyukx = mysqli_num_rows($qyukx);
$tempat_kd = balikin($ryukx['kd']);
$tempat_nama = balikin($ryukx['nama']);


echo '<p>
Tempat Wisata : 
<br>';			
echo "<select name=\"tempat\" class=\"btn btn-warning\" onChange=\"MM_jumpMenu('self',this,0)\">";
echo '<option value="'.$tempat_kd.'">'.$tempat_nama.'</option>';

//list 
$qyuk = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
						"ORDER BY nama ASC");
$ryuk = mysqli_fetch_assoc($qyuk);

do
	{
	//nilai
	$yuk_kd = balikin($ryuk['kd']);
	$yuk_nama = balikin($ryuk['nama']);

	echo '<option value="'.$filenya.'?tmpkd='.$yuk_kd.'&sekolah='.$yuk_nama.'">'.$yuk_nama.'</option>';
	}
while ($ryuk = mysqli_fetch_assoc($qyuk));


echo '</select>
</p> 


<p>
Bulan : 
<br>';

echo "<select name=\"ubln\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";
echo '<option value="'.$ubln.'">'.$arrbln[$ubln].'</option>';
for ($ibln=1;$ibln<=12;$ibln++)
	{
	echo '<option value="'.$filenya.'?tmpkd='.$tmpkd.'&ubln='.$ibln.'">'.$arrbln[$ibln].'</option>';
	}
echo '</select>';

//tahun
echo "<select name=\"uthn\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";
echo '<option value="'.$uthn.'">'.$uthn.'</option>';
for ($ithn=$tahun-1;$ithn<=$tahun;$ithn++)
	{
	echo '<option value="'.$filenya.'?tmpkd='.$tmpkd.'&ubln='.$ubln.'&uthn='.$ithn.'">'.$ithn.'</option>';
	}
echo '</select>
</p>';


//jika null
if (empty($tmpkd))
	{
	echo '<h3>
	<font color="red">
	Silahkan Pilih Dahulu Tempat Wisata...
	</font>
	</h3>';
	}
	


else if (empty($ubln))
	{
	echo '<p>
	<font color="red"><strong>BULAN Belum Dipilih...!!</strong></font>
	</p>';
	}
	
else if (empty($uthn))
	{
	echo '<p>
	<font color="red"><strong>TAHUN Belum Dipilih...!!</strong></font>
	</p>';
	}
else
	{
	echo '<div class="table-responsive">          
	  <table class="table" border="1">
	    <thead>
		<tr bgcolor="'.$warnaheader.'">
	    <td width="300"><strong>TANGGAL KUNJUNGAN</strong></td>
		<td><strong>KAPASITAS</strong></td>
		</tr>
		</thead>
    <tbody>';

	//mendapatkan jumlah tanggal maksimum dalam suatu bulan
	$tgl = 0;
	$bulan = $ubln;
	$bln = $bulan + 1;
	$thn = $uthn;

	$lastday = mktime (0,0,0,$bln,$tgl,$thn);

	//total tanggal dalam sebulan
	$tkhir = strftime ("%d", $lastday);

	//lopping tgl
	for ($i=1;$i<=$tkhir;$i++)
		{
		//ketahui harinya
		$day = $i;
		$month = $bulan;
		$year = $thn;


		//mencari hari
		$a = substr($year, 2);
			//mengambil dua digit terakhir tahun

		$b = (int)($a/4);
			//membagi tahun dengan 4 tanpa memperhitungkan sisa

		$c = $month;
			//mengambil angka bulan

		$d = $day;
			//mengambil tanggal

		$tot1 = $a + $b + $c + $d;
			//jumlah sementara, sebelum dikurangani dengan angka kunci bulan

		//kunci bulanan
		if ($c == 1)
			{
			$kunci = "2";
			}

		else if ($c == 2)
			{
			$kunci = "7";
			}

		else if ($c == 3)
			{
			$kunci = "1";
			}

		else if ($c == 4)
			{
			$kunci = "6";
			}

		else if ($c == 5)
			{
			$kunci = "5";
			}

		else if ($c == 6)
			{
			$kunci = "3";
			}

		else if ($c == 7)
			{
			$kunci = "2";
			}

		else if ($c == 8)
			{
			$kunci = "7";
			}

		else if ($c == 9)
			{
			$kunci = "5";
			}

		else if ($c == 10)
			{
			$kunci = "4";
			}

		else if ($c == 11)
			{
			$kunci = "2";
			}

		else if ($c == 12)
			{
			$kunci = "1";
			}

		$total = $tot1 - $kunci;

		//angka hari
		$hari = $total%7;

		//jika angka hari == 0, sebenarnya adalah 7.
		if ($hari == 0)
			{
			$hari = ($hari +7);
			}

		//kabisat, tahun habis dibagi empat alias tanpa sisa
		$kabisat = (int)$year % 4;

		if ($kabisat ==0)
			{
			$hri = $hri-1;
			}



		//hari ke-n
		if ($hari == 3)
			{
			$hri = 4;
			$dino = "Rabu";
			}

		else if ($hari == 4)
			{
			$hri = 5;
			$dino = "Kamis";
			}

		else if ($hari == 5)
			{
			$hri = 6;
			$dino = "Jum'at";
			}

		else if ($hari == 6)
			{
			$hri = 7;
			$dino = "Sabtu";
			}

		else if ($hari == 7)
			{
			$hri = 1;
			$dino = "Minggu";
			}

		else if ($hari == 1)
			{
			$hri = 2;
			$dino = "Senin";
			}

		else if ($hari == 2)
			{
			$hri = 3;
			$dino = "Selasa";
			}


		//nek minggu,
		if ($hri == 1)
			{
			$warna = "red";
			$mggu_attr = "disabled";
			}
		else
			{
			if ($warna_set ==0)
				{
				$warna = $e_warna01;
				$warna_set = 1;
				$mggu_attr = "";
				}
			else
				{
				$warna = $e_warna02;
				$warna_set = 0;
				$mggu_attr = "";
				}
			}


		//cek digit
		//tgl
		if (strlen($i) == 1)
			{
			$utglx = "0$i";
			}
		else
			{
			$utglx = $i;
			}


		//bln
		if (strlen($ubln) == 1)
			{
			$ublnx = "0$ubln";
			}
		else
			{
			$ublnx = $ubln;
			}


		//nilainya...
		$qdtf = mysqli_query($koneksi, "SELECT * FROM tempat_kapasitas ".
								"WHERE tempat_kd = '$tmpkd' ".
								"AND DATE_FORMAT(tglnya, '%d') = '$utglx' ".
								"AND DATE_FORMAT(tglnya, '%m') = '$ublnx' ".
								"AND DATE_FORMAT(tglnya, '%Y') = '$uthn'");
		$rdtf = mysqli_fetch_assoc($qdtf);
		$tdtf = mysqli_num_rows($qdtf);
		$dtf_ket = balikin($rdtf['jml']);
		$dtf_statusnya = balikin($rdtf['statusnya']);


		//jika libur, kasi merah
		if ($dtf_statusnya == "LIBUR")
			{
			$warna = "red";
			}


		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td valign="top" align="center"><strong>'.$dino.', '.$i.' '.$arrbln[$ubln].' '.$uthn.'</strong></td>
		<td valign="top">
		'.$dtf_ket.'
		</td>
		</tr>';
		}

	echo '</tbody>
	  </table>
	  </div>
	  
	  
	<input name="tempatkd" type="hidden" value="'.$tempatkd.'">
	<input name="ubln" type="hidden" value="'.$ubln.'">
	<input name="uthn" type="hidden" value="'.$uthn.'">
	<input name="tkhir" type="hidden" value="'.$tkhir.'">';
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



echo "<h3>KETENTUAN KAPASITAS</h3>
<hr>

<p>
Disini adalah nilai maksimal kapasitas booking per tanggal, yang diijinkan.
</p>";

	
//isi
$i_terbaru = ob_get_contents();
ob_end_clean();
















require("inc/niltpl.php");


//diskonek
xclose($koneksi);
exit();
?>