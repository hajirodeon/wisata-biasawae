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
$filenya = "kapasitas.php";
$judul = "[MASTER] Kapasitas";
$judulku = "$judul";
$judulx = $judul;
$kd = nosql($_REQUEST['kd']);
$s = nosql($_REQUEST['s']);
$tempatkd = nosql($_REQUEST['tempatkd']);
$utgl = nosql($_REQUEST['utgl']);
$ubln = nosql($_REQUEST['ubln']);
$uthn = nosql($_REQUEST['uthn']);




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika batal
if ($_POST['btnBTL'])
	{
	//nilai
	$tempatkd = nosql($_POST['tempatkd']);
	$ubln = nosql($_POST['ubln']);
	$uthn = nosql($_POST['uthn']);

	//re-direct
	$ke = "$filenya?tempatkd=$tempatkd&ubln=$ubln&uthn=$uthn";
	xloc($ke);
	exit();
	}





//jika edit simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$s = nosql($_POST['s']);
	$utgl = nosql($_POST['utgl']);
	$ubln = nosql($_POST['ubln']);
	$uthn = nosql($_POST['uthn']);
	$tgl_u = "$uthn:$ubln:$utgl";
	$tempatkd = nosql($_POST['tempatkd']);
	$uket = cegah($_POST['uket']);
	$ustatus = cegah($_POST['e_status']);

	//cek digit
	//tgl
	if (strlen($utgl) == 1)
		{
		$utglx = "0$utgl";
		}
	else
		{
		$utglx = $utgl;
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




	//jika null
	if ((empty($uket)) OR (empty($ustatus)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diperhatikan...!!";
		$ke = "$filenya?s=edit&tempatkd=$tempatkd&ubln=$ubln&uthn=$uthn";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//detail tempat
		$qx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
										"WHERE kd = '$tempatkd'");
		$rowx = mysqli_fetch_assoc($qx);
		$e_tempat_nama = cegah($rowx['nama']);
		
		
		
		
		//cek
		$qcc = mysqli_query($koneksi, "SELECT * FROM tempat_kapasitas ".
								"WHERE tempat_kd = '$tempatkd' ".
								"AND DATE_FORMAT(tglnya, '%d') = '$utglx' ".
								"AND DATE_FORMAT(tglnya, '%m') = '$ublnx' ".
								"AND DATE_FORMAT(tglnya, '%Y') = '$uthn'");
		$rcc = mysqli_fetch_assoc($qcc);
		$tcc = mysqli_num_rows($qcc);

		//jika update
		if ($tcc != 0)
			{
			//query
			mysqli_query($koneksi, "UPDATE tempat_kapasitas ".
							"SET jml = '$uket', ".
							"statusnya = '$ustatus' ".
							"WHERE tempat_kd = '$tempatkd' ".
							"AND DATE_FORMAT(tglnya, '%d') = '$utglx' ".
							"AND DATE_FORMAT(tglnya, '%m') = '$ublnx' ".
							"AND DATE_FORMAT(tglnya, '%Y') = '$uthn'");
			}
		//jika baru
		else
			{
			//entry
			mysqli_query($koneksi, "INSERT INTO tempat_kapasitas(kd, tempat_kd, tempat_nama, ".
							"tglnya, jml, statusnya, postdate) VALUES ".
							"('$x', '$tempatkd', '$e_tempat_nama', ".
							"'$tgl_u', '$uket', '$ustatus', '$today')");
			}


		//re-direct
		$ke = "$filenya?tempatkd=$tempatkd&ubln=$ubln&uthn=$uthn";
		xloc($ke);
		exit();
		}
	}

	
	
	
//jika hapus
if ($s == "hapus")
	{
	//cek digit
	//tgl
	if (strlen($utgl) == 1)
		{
		$utglx = "0$utgl";
		}
	else
		{
		$utglx = $utgl;
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


	//hapus
	mysqli_query($koneksi, "DELETE FROM tempat_kapasitas ".
					"WHERE tempat_kd = '$tempatkd' ".
					"AND DATE_FORMAT(tglnya, '%d') = '$utglx' ".
					"AND DATE_FORMAT(tglnya, '%m') = '$ublnx' ".
					"AND DATE_FORMAT(tglnya, '%Y') = '$uthn'");

	//re-direct
	$ke = "$filenya?tempatkd=$tempatkd&ubln=$ubln&uthn=$uthn";
	xloc($ke);
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






<script language='javascript'>
//membuat document jquery
$(document).ready(function(){


	  $('#uket').bind('keyup paste', function(){
        this.value = this.value.replace(/[^0-9]/g, '');
  		});

		
});

</script>




  
<?php
//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">


<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>

<p>
Tempat Wisata : 
<br>';

echo "<select name=\"tempat\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-success\">";

//detail
$qx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
					"WHERE kd = '$tempatkd'");
$rowx = mysqli_fetch_assoc($qx);
$e_tempat = balikin($rowx['nama']);


echo '<option value="'.$tempatkd.'">'.$e_tempat.'</option>';

//list user
$qkuy = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
						"ORDER BY nama ASC");
$rkuy = mysqli_fetch_assoc($qkuy);

do
	{
	$y_kd = cegah($rkuy['kd']);
	$y_kode = cegah($rkuy['kode']);
	$y_nama = cegah($rkuy['nama']);
		
	echo '<option value="'.$filenya.'?tempatkd='.$y_kd.'">'.$y_nama.'</option>';
	}
while ($rkuy = mysqli_fetch_assoc($qkuy));
	
echo '</select>
</p>';


echo "<p>
Bulan : 
<br>

<select name=\"ubln\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-success\">";
echo '<option value="'.$ubln.'">'.$arrbln[$ubln].'</option>';
for ($ibln=1;$ibln<=12;$ibln++)
	{
	echo '<option value="'.$filenya.'?tempatkd='.$tempatkd.'&ubln='.$ibln.'">'.$arrbln[$ibln].'</option>';
	}
echo '</select>';

//tahun
echo "<select name=\"uthn\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-success\">";
echo '<option value="'.$uthn.'">'.$uthn.'</option>';
for ($ithn=$tahun-1;$ithn<=$tahun;$ithn++)
	{
	echo '<option value="'.$filenya.'?tempatkd='.$tempatkd.'&ubln='.$ubln.'&uthn='.$ithn.'">'.$ithn.'</option>';
	}
echo '</select>
</p>

</td>
</tr>
</table>
<br>';

//cek
if (empty($tempatkd))
	{
	echo '<p>
	<font color="red"><strong>TEMPAT WISATA Belum Dipilih...!!</strong></font>
	</p>';
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
	//jika edit
	if ($s == "edit")
		{
		//cek digit
		//tgl
		if (strlen($utgl) == 1)
			{
			$utglx = "0$utgl";
			}
		else
			{
			$utglx = $utgl;
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
								"WHERE tempat_kd = '$tempatkd' ".
								"AND DATE_FORMAT(tglnya, '%d') = '$utglx' ".
								"AND DATE_FORMAT(tglnya, '%m') = '$ublnx' ".
								"AND DATE_FORMAT(tglnya, '%Y') = '$uthn'");
		$rdtf = mysqli_fetch_assoc($qdtf);
		$tdtf = mysqli_num_rows($qdtf);
		$dtf_ket = balikin($rdtf['jml']);
		$dtf_statusnya = balikin($rdtf['statusnya']);

		echo '<p>
		Tanggal : <strong>'.$utgl.'</strong>
		</p>
			
		<p>
		Status Hari : 
		<br>
		<select name="e_status" class="btn btn-success">
		<option value="'.$dtf_statusnya.'" selected>'.$dtf_statusnya.'</option>
		<option value="KERJA">KERJA</option>
		<option value="LIBUR">LIBUR</option>
		</select>	
		</p>
		
		
	
		<p>
		Jumlah Kapasitas :
		<br>
		<input name="uket" id="uket" type="text" value="'.$dtf_ket.'" class="btn btn-success">
		</p>
		
		<br>
		
		<p>
		<input name="utgl" type="hidden" value="'.$utgl.'">
		<input name="ubln" type="hidden" value="'.$ubln.'">
		<input name="uthn" type="hidden" value="'.$uthn.'">
		<input name="s" type="hidden" value="'.$s.'">
		<input name="tempatkd" type="hidden" value="'.$tempatkd.'">
		<input name="btnBTL" type="submit" value="BATAL" class="btn btn-primary">
		<input name="btnSMP" type="submit" value="SIMPAN >>" class="btn btn-danger">
		</p>';
		}

	//lihat
	else
		{
		echo '<div class="table-responsive">          
		  <table class="table" border="1">
		    <thead>
			<tr bgcolor="'.$warnaheader.'">
		    <td width="30"><strong>TANGGAL</strong></td>
			<td width="75"><strong>HARI</strong></td>
			<td width="50"><strong>STATUS</strong></td>
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
									"WHERE tempat_kd = '$tempatkd' ".
									"AND DATE_FORMAT(tglnya, '%d') = '$utglx' ".
									"AND DATE_FORMAT(tglnya, '%m') = '$ublnx' ".
									"AND DATE_FORMAT(tglnya, '%Y') = '$uthn'");
			$rdtf = mysqli_fetch_assoc($qdtf);
			$tdtf = mysqli_num_rows($qdtf);
			$dtf_ket = balikin($rdtf['jml']);
			$dtf_statusnya = balikin($rdtf['statusnya']);


			//jika ada
			if ($tdtf != 0)
				{
				$dtf_ketx = "$dtf_ket <br> [<a href=\"$filenya?s=edit&tempatkd=$tempatkd&utgl=$i&ubln=$ubln&uthn=$uthn\" title=\"Edit\"><img src=\"$sumber/img/edit.gif\" width=\"16\" height=\"16\" border=\"0\"></a>]. 
				[<a href=\"$filenya?s=hapus&tempatkd=$tempatkd&utgl=$i&ubln=$ubln&uthn=$uthn\" title=\"Hapus\"><img src=\"$sumber/img/delete.gif\" width=\"16\" height=\"16\" border=\"0\"></a>]";
				}
			else
				{
				$dtf_ketx = "- [<a href=\"$filenya?s=edit&tempatkd=$tempatkd&utgl=$i&ubln=$ubln&uthn=$uthn\" title=\"Tulis : $dino\"><img src=\"$sumber/img/edit.gif\" width=\"16\" height=\"16\" border=\"0\"></a>]";
				}


			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td valign="top" align="center"><strong>'.$i.'.</strong></td>
			<td valign="top"><strong>'.$dino.'</strong></td>
			<td valign="top"><strong>'.$dtf_statusnya.'</strong></td>
			<td valign="top">
			'.$dtf_ketx.'
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
	}





echo '</form>';






//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");


//null-kan
xclose($koneksi);
exit();
?>