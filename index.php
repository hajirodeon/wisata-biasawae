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
$tpl = LoadTpl("template/cp_depan.html");



nocache;

//nilai
$filenya = "index.php";
$filenyax = "i_index.php";
$filenya_ke = $sumber;
$judul = "Selamat Datang di Wisata-BIASAWAE";
$judulku = $judul;






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}






/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////










//isi *START
ob_start();

require("i_terbaru.php");

//isi
$i_terbaru = ob_get_contents();
ob_end_clean();

























//isi *START
ob_start();

require("i_foto.php");

//isi
$i_foto = ob_get_contents();
ob_end_clean();













//isi *START
ob_start();

require("i_slideshow2.php");

//isi
$i_slideshow = ob_get_contents();
ob_end_clean();











//isi *START
ob_start();

require("i_booking.php");

//isi
$i_booking = ob_get_contents();
ob_end_clean();








//isi *START
ob_start();

require("i_footer.php");

//isi
$i_footer = ob_get_contents();
ob_end_clean();










require("inc/niltpl.php");


//diskonek
xclose($koneksi);
exit();
?>
