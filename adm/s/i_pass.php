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
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/adm.php");





//jika simpan
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'simpan'))
	{
	//ambil nilai
	$passlama = cegah($_GET["passlama"]);
	$passbaru = cegah($_GET["passbaru"]);
	$passbaru2 = cegah($_GET["passbaru2"]);


	//cek
	//nek null
	if ((empty($passlama)) OR (empty($passbaru)) OR (empty($passbaru2)))
		{
		//pesan
		echo "<font color=red><b>Input Tidak Lengkap. Harap Diulangi...!!</b></font>";
		exit();
		}

	//nek pass baru gak sama
	else if ($passbaru != $passbaru2)
		{
		//pesan
		echo "<font color=red><b>Password Baru Tidak Sama. Harap Diulangi...!!</b></font>";
		exit();
		}
	else
		{
		//ambil nilai
		$passlama = md5(cegah($_GET["passlama"]));
		$passbaru = md5(cegah($_GET["passbaru"]));
		$passbaru2 = md5(cegah($_GET["passbaru2"]));



		//query
		$q = mysqli_query($koneksi, "SELECT * FROM adminx ".
							"WHERE kd = '$kd6_session' ".
							"AND usernamex = '$username6_session' ".
							"AND passwordx = '$passlama'");
		$row = mysqli_fetch_assoc($q);
		$total = mysqli_num_rows($q);



		//cek
		if ($total != 0)
			{
			//perintah SQL
			mysqli_query($koneksi, "UPDATE adminx SET passwordx = '$passbaru' ".
							"WHERE kd = '$kd6_session' ".
							"AND usernamex = '$username6_session'");

			//pesan
			echo "<font color=red><b>PASSWORD BERHASIL DIGANTI.</b></font>";
			exit();
			}
		else
			{
			//pesan
			echo "<font color=red><b>PASSWORD LAMA TIDAK COCOK. HARAP DIULANGI...!!!</b></font>";
			exit();
			}
		}
		
	
	
	exit();
	}
?>