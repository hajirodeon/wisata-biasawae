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
require("../inc/config.php");
require("../inc/fungsi.php");
require("../inc/koneksi.php");





//nocache;

//nilai
$filenya = "$sumber/admin/login.php";
$filenya_ke = $sumber;
$judul = "LOGIN ADMIN";
$judulku = $judul;






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika simpan
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'simpan'))
	{
	//ambil nilai
	$euser = cegah($_GET['usernamex']);
	$epass = md5(cegah($_GET['passwordx']));

	
	//empty
	if ((empty($euser)) OR (empty($epass)))
		{
		echo '<b>
		<font color="red">GAGAL. SILAHKAN ULANGI LAGI...!!</font>
		</b>';
		exit();	
		} 
	else
		{
		//query
		$q = mysqli_query($koneksi, "SELECT * FROM adminx ".
							"WHERE usernamex = '$euser' ".
							"AND passwordx = '$epass'");
		$row = mysqli_fetch_assoc($q);
		$total = mysqli_num_rows($q);
	
		//cek login
		if (!empty($total))
			{
			session_start();
	
			//bikin session
			$_SESSION['kd6_session'] = nosql($row['kd']);
			$_SESSION['username6_session'] = $euser;
			$_SESSION['pass6_session'] = $epass;
			$_SESSION['adm_session'] = "Administrator";
			$_SESSION['hajirobe_session'] = $hajirobe;
	


			//re-direct
			$ke = "../adm/index.php";
			xloc($ke);
			exit();
			}
		else
			{
			echo '<b>
			<font color="red">PASSWORD SALAH. SILAHKAN ULANGI LAGI...!!</font>
			</b>';
			exit();	
			}
								
								
		}	

	
	exit();
	}





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







//diskonek
exit();
?>