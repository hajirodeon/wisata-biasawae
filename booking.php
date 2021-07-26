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
$filenya = "booking.php";
$judul = "Booking"; 
$judulku = $judul; 
$tmpkd = nosql($_REQUEST['tmpkd']);







//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika simpan
if ($_POST['btnSMP'])
	{
	//nilai
	$tmpkd = nosql($_POST['tmpkd']);
	$e_pintu = cegah($_POST['e_pintu']);
	$c_tgl1 = cegah($_POST['c_tgl1']);
	$c_tgl2 = cegah($_POST['c_tgl2']);
	$c_ketua = cegah($_POST['c_ketua']);
	$c_bangsa = cegah($_POST['c_bangsa']);
	$c_tgllahir = cegah($_POST['c_tgllahir']);
	$c_kelamin = cegah($_POST['c_kelamin']);
	$c_jenisid = cegah($_POST['c_jenisid']);
	$c_noid = cegah($_POST['c_noid']);
	$c_telp = cegah($_POST['c_telp']);
	$c_jmlwni = cegah($_POST['c_jmlwni']);
	$c_jmlwna = cegah($_POST['c_jmlwna']);



	
	//pecah
	$pecahku = explode("xgmringx", $c_tgl1);
	$pecahku1 = trim($pecahku[0]);
	$pecahku2 = trim($pecahku[1]);
	$pecahku3 = trim($pecahku[2]);
	$tglmasuk = "$pecahku3:$pecahku2:$pecahku1";
	$tglmasukx = "$pecahku3-$pecahku2-$pecahku1";
	
	
	
	//cek, hari libur atao kerja
	$qdtf = mysqli_query($koneksi, "SELECT * FROM tempat_kapasitas ".
							"WHERE tempat_kd = '$tmpkd' ".
							"AND DATE_FORMAT(tglnya, '%d') = '$pecahku1' ".
							"AND DATE_FORMAT(tglnya, '%m') = '$pecahku2' ".
							"AND DATE_FORMAT(tglnya, '%Y') = '$pecahku3'");
	$rdtf = mysqli_fetch_assoc($qdtf);
	$tdtf = mysqli_num_rows($qdtf);
	$dtf_statusnya = balikin($rdtf['statusnya']);

	if ($dtf_statusnya == "KERJA")
		{
		//detail tempat
		$qyukx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
								"WHERE kd = '$tmpkd'");
		$ryukx = mysqli_fetch_assoc($qyukx);
		$tempat_nama = cegah($ryukx['nama']);
		$wni_harga = cegah($ryukx['harga_kerja_wni']);
		$wna_harga = cegah($ryukx['harga_kerja_wna']);
		}
	else
		{
		//detail tempat
		$qyukx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
								"WHERE kd = '$tmpkd'");
		$ryukx = mysqli_fetch_assoc($qyukx);
		$tempat_nama = cegah($ryukx['nama']);
		$wni_harga = cegah($ryukx['harga_libur_wni']);
		$wna_harga = cegah($ryukx['harga_libur_wna']);
		}




	
	//pecah
	$pecahku = explode("xgmringx", $c_tgl2);
	$pecahku1 = trim($pecahku[0]);
	$pecahku2 = trim($pecahku[1]);
	$pecahku3 = trim($pecahku[2]);
	$tglpulang = "$pecahku3:$pecahku2:$pecahku1";
	$tglpulangx = "$pecahku3-$pecahku2-$pecahku1";
	


	//cek, hari libur atao kerja
	$qdtf = mysqli_query($koneksi, "SELECT * FROM tempat_kapasitas ".
							"WHERE tempat_kd = '$tmpkd' ".
							"AND DATE_FORMAT(tglnya, '%d') = '$pecahku1' ".
							"AND DATE_FORMAT(tglnya, '%m') = '$pecahku2' ".
							"AND DATE_FORMAT(tglnya, '%Y') = '$pecahku3'");
	$rdtf = mysqli_fetch_assoc($qdtf);
	$tdtf = mysqli_num_rows($qdtf);
	$dtf_statusnya = balikin($rdtf['statusnya']);

	if ($dtf_statusnya == "KERJA")
		{
		//detail tempat
		$qyukx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
								"WHERE kd = '$tmpkd'");
		$ryukx = mysqli_fetch_assoc($qyukx);
		$tempat_nama = cegah($ryukx['nama']);
		$wni_harga = cegah($ryukx['harga_kerja_wni']);
		$wna_harga = cegah($ryukx['harga_kerja_wna']);
		}
	else
		{
		//detail tempat
		$qyukx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
								"WHERE kd = '$tmpkd'");
		$ryukx = mysqli_fetch_assoc($qyukx);
		$tempat_nama = cegah($ryukx['nama']);
		$wni_harga = cegah($ryukx['harga_libur_wni']);
		$wna_harga = cegah($ryukx['harga_libur_wna']);
		}








	
	
	
	//pecah
	$pecahku = explode("xgmringx", $c_tgllahir);
	$pecahku1 = $pecahku[0];
	$pecahku2 = $pecahku[1];
	$pecahku3 = $pecahku[2];
	$tgllahir = "$pecahku3:$pecahku2:$pecahku1";
	
	
	
	
	




	//buat booking
	$bookkd = $x;
	
	//kasi random, trus jadikan huruf
	$niku = rand(1111,9999);
	

	$nil1 = substr($niku,0,1);
	$nil2 = substr($niku,1,1);
	$nil3 = substr($niku,2,1);
	$nil4 = substr($niku,3,1);



	$pecah1 = $arrrkoloma[$nil1];
	$pecah2 = $arrrkoloma[$nil2];
	$pecah3 = $arrrkoloma[$nil3];
	$pecah4 = $arrrkoloma[$nil4];


	
	
	$bookkode = "$c_telp$pecah1$pecah2$pecah3$pecah4";


	
	
	
	//list, tiap tempat beda kendaraan dan beda tarif 
  	$qkuy = mysqli_query($koneksi, "SELECT * FROM tempat_kendaraan ".
  							"WHERE tempat_kd = '$tmpkd' ".
  							"ORDER BY nama ASC");
	$rkuy = mysqli_fetch_assoc($qkuy);
	
	do
		{
		$y_no = $y_no + 1;
		$y_kd = cegah($rkuy['kd']);
		$y_nama = cegah($rkuy['nama']);
		$y_harga = cegah($rkuy['harga']);
		$xyz = "$x$y_no";


		$c_jmlmotor = cegah($_POST['c_jmlmotor'.$y_kd.'']);
		$c_subtotal = $c_jmlmotor * $y_harga; 
		
		
		//insert
		mysqli_query($koneksi, "INSERT INTO orderan_kendaraan(kd, orderan_kd, tempat_kd, ".
						"tempat_nama, kendaraan, jml, ".
						"harga, subtotal, postdate) VALUES ".
						"('$xyz', '$bookkd', '$tmpkd', ".
						"'$tempat_nama', '$y_nama', '$c_jmlmotor', ".
						"'$y_harga', '$c_subtotal', '$today')");
		}
	while ($rkuy = mysqli_fetch_assoc($qkuy));





	//ketahui subtotal motor
	$qkup = mysqli_query($koneksi, "SELECT SUM(subtotal) AS totalnya ".
										"FROM orderan_kendaraan ".
										"WHERE orderan_kd = '$bookkd'");
	$rkup = mysqli_fetch_assoc($qkup);
	$kup_subtotal = nosql($rkup['totalnya']);	



	
	

	//hitung jumlah tanggal booking
	$date1 = date_create($tglmasukx);
	$date2 = date_create($tglpulangx);
	$diff=date_diff($date1,$date2);
	$months = $diff->format("%m months");
	$years = $diff->format("%y years");
	$days = $diff->format("%d days");
	
	$jml_hari = $days + 1;




	
	
	//ketahui subtotal wni wna
	$wni_subtotal = $jml_hari * ($wni_harga * $c_jmlwni);
	$wna_subtotal = $jml_hari * ($wna_harga * $c_jmlwna);
	
	



	//totalnya..
	$totalnya = $kup_subtotal + $wni_subtotal + $wna_subtotal; 





	
	//set expire booking : 3jam
	$u_durasi2 = 180;//menit
	 
	//saat ini...			
	$asal = "$jam:$menit:$detik";

	$tujuan = date('H:i:s',strtotime($asal . '+'.$u_durasi2.' minutes'));
	
	//pecah
	$tujuanku = explode(":", $tujuan);
	$tujuan_jam = trim($tujuanku[0]);
	$tujuan_menit = trim($tujuanku[1]);
	$tujuan_detik = $ku_detikku;




	//update waktu akhir
	$waktu_akhir = "$tahun-$bulan-$tanggal $tujuan_jam:$tujuan_menit:$tujuan_detik";
	
	
	



	//entry
	mysqli_query($koneksi, "INSERT INTO orderan(kd, kodebooking, booking_postdate, ".
					"booking_expire, tempat_kd, tempat_nama, ".
					"tempat_pintu_masuk, tgl_berangkat, tgl_pulang, ".
					"o_nama, o_bangsa, o_tgl_lahir, ".
					"o_kelamin, o_jenis_id, o_no_id, ".
					"o_telp, o_jml_wni, o_jml_wna, ".
					"wni_harga, wna_harga, subtotal_wni, ".
					"subtotal_wna, subtotal_kendaraan, bayar_total, ".
					"postdate) VALUES ".
					"('$bookkd', '$bookkode', '$today', ".
					"'$waktu_akhir', '$tmpkd', '$tempat_nama', ".
					"'$e_pintu', '$tglmasuk', '$tglpulang', ".
					"'$c_ketua', '$c_bangsa', '$tgllahir', ".
					"'$c_kelamin', '$c_jenisid', '$c_noid', ".
					"'$c_telp', '$c_jmlwni', '$c_jmlwna', ".
					"'$wni_harga', '$wna_harga', '$wni_subtotal', ".
					"'$wna_subtotal', '$kup_subtotal', '$totalnya', ".
					"'$today')");



	//re-direct
	$ke = "booking2.php?bookkd=$bookkd&bookkode=$bookkode";
	xloc($ke);
	exit();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////













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
  



<script language='javascript'>
//membuat document jquery
$(document).ready(function(){

	$('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        autoclose: true,
        startDate: new Date()
    })


	$("#c_tgl1").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#c_tgl2").datepicker('setStartDate', startDate);
        if($("#c_tgl1").val() > $("#c_tgl2").val()){
          $("#c_tgl2").val($("#c_tgl1").val());
        }
    });
    
    
	$('#c_tgl1x').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        autoclose: true,
    })


	$('#c_tgl2x').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        autoclose: true,
    })

    
	$('#c_tgllahir').datepicker({
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        autoclose: true,
    })



	  $('#c_telp').bind('keyup paste', function(){
        this.value = this.value.replace(/[^0-9]/g, '');
  		});

		
});

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
</p> ';


//jika null
if (empty($tmpkd))
	{
	echo '<h3>
	<font color="red">
	Silahkan Pilih Dahulu Tempat Wisata...
	</font>
	</h3>';
	}
	
else
	{
	echo '<p>
	Pintu Masuk : 
	<br>
	<select name="e_pintu" class="btn btn-warning">
	<option value="" selected></option>';

	//list 
  	$qkuy = mysqli_query($koneksi, "SELECT * FROM tempat_pintu_masuk ".
  							"WHERE tempat_kd = '$tmpkd' ".
  							"ORDER BY nama ASC");
	$rkuy = mysqli_fetch_assoc($qkuy);
	
	do
		{
		$y_kd = cegah($rkuy['kd']);
		$y_kode = cegah($rkuy['kode']);
		$y_nama = cegah($rkuy['nama']);
		$y_nama2 = balikin($rkuy['nama']);
			
		echo '<option value="'.$y_nama.'">'.$y_nama2.'</option>';
		}
	while ($rkuy = mysqli_fetch_assoc($qkuy));
	
	echo '</select>	
	</p>

	
	<p>
	<div class="table-responsive">
	Kendaraan : 
	
	          
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="200"><strong><font color="'.$warnatext.'">NAMA</font></strong></td>
	<td><strong><font color="'.$warnatext.'">JUMLAH</font></strong></td>
	</tr>
	</thead>
	<tbody>';
	
	
	//list 
  	$qkuy = mysqli_query($koneksi, "SELECT * FROM tempat_kendaraan ".
  							"WHERE tempat_kd = '$tmpkd' ".
  							"ORDER BY nama ASC");
	$rkuy = mysqli_fetch_assoc($qkuy);
	
	do
		{
		$y_kd = cegah($rkuy['kd']);
		$y_nama = cegah($rkuy['nama']);

		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$y_nama.'</td>
		<td>

		<select name="c_jmlmotor'.$y_kd.'" id="c_jmlmotor'.$y_kd.'" class="btn btn-block btn-warning" required>
	    <option value="" selected></option>';
	    
	    for ($k=0;$k<=10;$k++)
			{
		    echo '<option value="'.$k.'">'.$k.'</option>';
		    }
	    
	    echo '</select>

		</td>
		</tr>';
	
		}
	while ($rkuy = mysqli_fetch_assoc($qkuy));
	
	echo '</tbody>
	</table>
	</div>
	
	
	</p>
		
	<hr>
	
	<p>
	
	<div class="table-responsive">          
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td><strong><font color="'.$warnatext.'">BERANGKAT</font></strong></td>
	<td><strong><font color="'.$warnatext.'">PULANG</font></strong></td>
	</tr>
	</thead>
	<tbody>';
	
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>
			<input name="c_tgl1" id="c_tgl1" type="text" value="'.$tanggal.'/'.$bulan.'/'.$tahun.'" class="btn btn-block btn-warning datepicker"  placeholder="Tanggal Berangkat" required>
		</td>
		<td>
			<input name="c_tgl2" id="c_tgl2" type="text" value="'.$tanggal.'/'.$bulan.'/'.$tahun.'" class="btn btn-block btn-warning datepicker"  placeholder="Tanggal Pulang" required>
		</td>
		</tr>';

	echo '</tbody>
	</table>
	</div>

	</p>
	
		
	<hr>
	
	<p>
	Nama Ketua Kelompok :
	<br>
	<input name="c_ketua" id="c_ketua" type="text" value="" class="btn btn-warning"  placeholder="Nama Ketua Kelompok" required>
	</p>
	
	
	<p>
	Bangsa :
	<br>
	<input name="c_bangsa" id="c_bangsa" type="text" value="" class="btn btn-warning"  placeholder="Kebangsaan" required>
	</p>
	
	<p>
	Tanggal Lahir :
	<br>
	<input name="c_tgllahir" id="c_tgllahir" type="text" value="" class="btn btn-warning"  placeholder="Tanggal Lahir" required>
	</p>
	
	
	<p>
	Jenis Kelamin :
	<br>
	<select name="c_kelamin" id="c_kelamin" class="btn btn-warning"  placeholder="Jenis Kelamin.." required>
    <option value="" selected></option>
    <option value="L">Laki-Laki</option>
    <option value="P">Perempuan</option> 
	</select>
	</p>

	
	<p>
	Identitas :
	<br>
	<select name="c_jenisid" id="c_jenisid" class="btn btn-warning"  placeholder="Jenis Identitas" required>
    <option value="" selected></option>
    <option value="KTP">KTP</option>
    <option value="SIM">SIM</option> 
	</select>
	 
	<input name="c_noid" id="c_noid" type="text" value="" class="btn btn-warning"  placeholder="Nomor Identitas" required>
	
	</p>
	
	
	<p>
	Telepon/WA :
	<br>
	<input name="c_telp" id="c_telp" type="text" value="" class="btn btn-warning"  placeholder="Telepon/WA" onkeyup="numbersonly();" required>
	</p>

	<p>
	Jumlah Anggota (WNI) :
	<br>
	<select name="c_jmlwni" id="c_jmlwni" class="btn btn-warning"  placeholder="Jumlah WNI" required>
    <option value="" selected></option>';
    
    for ($k=1;$k<=10;$k++)
		{
	    echo '<option value="'.$k.'">'.$k.'</option>';
	    }
    
    echo '</select>
	
	</p>
	

	<p>
	Jumlah Anggota (WNA) :
	<br>
	<select name="c_jmlwna" id="c_jmlwna" class="btn btn-warning"  placeholder="Jumlah WNA" required>
    <option value="" selected></option>';
    
    for ($k=0;$k<=10;$k++)
		{
	    echo '<option value="'.$k.'">'.$k.'</option>';
	    }
    
    echo '</select>
	</p>
		
	
	
	<hr>
		<input name="tmpkd" type="hidden" value="'.$tmpkd.'">
		<input name="btnSMP" type="submit" value="BOOKING SEKARANG >>" class="btn btn-danger">
	<hr>';
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


//jika null
if (empty($tmpkd))
	{
	echo "<h3>KETENTUAN BOOKING</h3>
	<hr>
	
	<p>
	Kode Booking Hanya Berlaku maksimal 3(TIGA) Jam.
	</p>
	
	<hr>
	<p>
	Bila sudah memiliki Kode Booking, Segeralah Menuju Loket Tempat Wisata Yang Dituju.
	</p>
	<hr>
	
	<p>
	Pengambilan Tiket, Setelah Menunjukkan Kode Booking dan Melakukan Pembayaran di Loket Tempat Wisata.
	</p>";	
	}

else
	{
	//detail tempat
	$qx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
						"WHERE kd = '$tmpkd'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_kd = nosql($rowx['kd']);
	$e_kode = balikin($rowx['kode']);
	$e_nama = balikin($rowx['nama']);
	$e_ket = balikin($rowx['ket']);
	$e_wni_kerja = balikin($rowx['harga_kerja_wni']);
	$e_wni_libur = balikin($rowx['harga_libur_wni']);
	$e_wna_kerja = balikin($rowx['harga_kerja_wna']);
	$e_wna_libur = balikin($rowx['harga_libur_wna']);
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
	<i>'.$e_ket.'</i>
	
	<hr>
	
	<h3>Harga Tiket</h3>
	
	<p>
	WNI, Hari Kerja : 
	<br>
	<b>'.xduit2($e_wni_kerja).'/Hari</b>
	
	</p>


	<p>
	WNI, Hari Libur : 
	<br>
	<b>'.xduit2($e_wni_libur).'/Hari</b>
	
	</p>
	
	<hr>
	
	<p>
	WNA, Hari Kerja : 
	<br>
	<b>'.xduit2($e_wna_kerja).'/Hari</b>
	
	</p>
	
	<p>
	WNA, Hari Libur : 
	<br>
	<b>'.xduit2($e_wna_libur).'/Hari</b>
	
	</p>
	
	<hr>';
	
	//list 
  	$qkuy = mysqli_query($koneksi, "SELECT * FROM tempat_kendaraan ".
  							"WHERE tempat_kd = '$tmpkd' ".
  							"ORDER BY nama ASC");
	$rkuy = mysqli_fetch_assoc($qkuy);
	
	do
		{
		$y_no = $y_no + 1;
		$y_kd = cegah($rkuy['kd']);
		$y_nama = balikin($rkuy['nama']);
		$y_harga = balikin($rkuy['harga']);
		
		echo '<p>
		'.$y_nama.' :
		<br>
		<b>'.xduit2($y_harga).'/Hari</b>
		</p>';
		}
	while ($rkuy = mysqli_fetch_assoc($qkuy));

	
	
	
	
		
	}
	
	
	
//isi
$i_terbaru = ob_get_contents();
ob_end_clean();
















require("inc/niltpl.php");


//diskonek
xclose($koneksi);
exit();
?>