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

	
	

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
	
nocache;




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//lihat gambar
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'lihat1'))
	{
	//edit
	$qx = mysqli_query($koneksi, "SELECT * FROM cp_profil");
	$rowx = mysqli_fetch_assoc($qx);
	$e_filex1 = balikin($rowx['filex']);



	//jika edit / baru
	//nek null foto
	if (empty($e_filex1))
		{
		$nil_foto = "$sumber/template/img/bg-black.png";
		}
	else
		{
		$nil_foto = "$sumber/filebox/logo/$e_filex1";
		}
		

	echo '<img src="'.$nil_foto.'" height="200">';
	}
	
	
	

?>