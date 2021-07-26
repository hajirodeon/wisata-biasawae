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

require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");
	




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika artikel : beri komentar
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'artikelkomentar'))
	{
	//ambil nilai
	$nil1 = cegah($_GET['e_nil1']);
	$nil2 = cegah($_GET['e_nil2']);
	$ongkoku = cegah($_GET['e_ongko']);
	$artkd = cegah($_GET['artkd']);
	$namaku = cegah($_GET['e_nama']);
	$emailku = cegah($_GET['e_email']);
	$isiku = cegah($_GET['e_isi']);
	$xyz = md5("$artkd$namaku$emailku$isiku");

	
	
	//jika admin, gak boleh
	if (($namaku == "admin") OR ($namaku == "administrator"))
		{
		echo '<p>
		<font color="red">
		<strong>Silahkan Dicek Lagi...!!</strong>
		</font>
		</p>';			
		}
		
	else
		{
		$ongkokux = $nil1 + $nil2;
		
		//jika betul
		if ($ongkoku == $ongkokux)
			{
			//insert
			mysqli_query($koneksi, "INSERT INTO cp_artikel_komentar(kd, kd_artikel, nama, email, isi, postdate) VALUES ".
							"('$xyz', '$artkd', '$namaku', '$emailku', '$isiku', '$today')");
		
		
			?>
	
		
			<script language='javascript'>
			//membuat document jquery
			$(document).ready(function(){
	
				$("#iformnya").hide();
						
			});
			
			</script>
				
		
		
			<?php
			//update jumlah komentar
			$qku = mysqli_query($koneksi, "SELECT * FROM cp_artikel_komentar ".
									"WHERE kd_artikel = '$artkd' ".
									"AND aktif = 'true'");
			$rku = mysqli_fetch_assoc($qku);				
			$tku = mysqli_num_rows($qku);
			
			//update
			mysqli_query($koneksi, "UPDATE cp_artikel SET jml_komentar = '$tku' ".
							"WHERE kd = '$artkd'");
			
			
			
			
			
			
			echo '<p>
			<font color="green">
			<strong>Komentar Akan Muncul dalam Daftar Komentar, Setelah Melewati Verifikasi Admin. 
			<br>
			Terima Kasih....</strong>
			</font>
			</p>';
			}
			
		else
			{
			echo '<p>
			<font color="red">
			<strong>Silahkan Jawab Perhitungan Matematika dengan Benar...!!</strong>
			</font>
			</p>';
			}
		}
		
		
	exit();
	}











//jika bukutamu
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'bukutamu'))
	{
	//ambil nilai
	$nil1 = cegah($_GET['e_nil1']);
	$nil2 = cegah($_GET['e_nil2']);
	$ongkoku = cegah($_GET['e_ongko']);
	$artkd = cegah($_GET['artkd']);
	$namaku = cegah($_GET['e_nama']);
	$emailku = cegah($_GET['e_email']);
	$alamatku = cegah($_GET['e_alamat']);
	$telpku = cegah($_GET['e_telp']);
	$situsku = cegah($_GET['e_situs']);
	$isiku = cegah($_GET['e_isi']);
	$xyz = md5("$artkd$namaku$emailku$isiku");

	
	
	//jika admin, gak boleh
	if (($namaku == "admin") OR ($namaku == "administrator"))
		{
		echo '<p>
		<font color="red">
		<strong>Silahkan Dicek Lagi...!!</strong>
		</font>
		</p>';			
		}
		
	else
		{
		$ongkokux = $nil1 + $nil2;
		
		//jika betul
		if ($ongkoku == $ongkokux)
			{
			//insert
			mysqli_query($koneksi, "INSERT INTO cp_bukutamu(kd, nama, alamat, telp, email, situs, isi, postdate) VALUES ".
							"('$xyz', '$namaku', '$alamatku', '$telpku', '$emailku', '$situsku', '$isiku', '$today')");
		
		
			?>
	
		
			<script language='javascript'>
			//membuat document jquery
			$(document).ready(function(){
	
				$("#iformnya").hide();
						
			});
			
			</script>
				
		
		
			<?php
			echo '<p>'.$xyz.' '.$namaku.'
			<font color="green">
			<strong>Terima Kasih Telah Mengisi Buku Tamu....</strong>
			</font>
			</p>';
			}
			
		else
			{
			echo '<p>
			<font color="red">
			<strong>Silahkan Jawab Perhitungan Matematika dengan Benar...!!</strong>
			</font>
			</p>';
			}
		}
		
		
	exit();
	}















//jika artikel suka
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'artikelsuka'))
	{
	//ambil nilai
	$artkd = cegah($_GET['artkd']);

	//update
	mysqli_query($koneksi, "UPDATE cp_artikel SET jml_suka = jml_suka + 1 ".
					"WHERE kd = '$artkd'");
		
	echo '<p>
	<font color="green">
	<strong>Saya Suka Artikel ini...</strong>
	</font>
	</p>';


		
	exit();
	}









//jika artikel gak suka
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'artikelgaksuka'))
	{
	//ambil nilai
	$artkd = cegah($_GET['artkd']);

		
	echo '<p>
	<font color="red">
	<strong>Saya Tidak Suka Artikel ini...</strong>
	</font>
	</p>';


		
	exit();
	}













exit();
?>