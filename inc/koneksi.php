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

	
	

//KONEKSI ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$koneksi = mysqli_connect($xhostname, $xusername, $xpassword, $xdatabase);


// Check connection
if (mysqli_connect_errno()) {
  echo "Koneksi ERROR: " . mysqli_connect_error();
  exit();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




/*
//buka, harus pake https ////////////////////////////////////////////////////////////////////////////////////
if (! isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
    $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $redirect_url");
    exit();
}
//buka, harus pake https ////////////////////////////////////////////////////////////////////////////////////
*/





//Detail Sekolah ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$qdti = mysqli_query($koneksi, "SELECT * FROM cp_profil");
$rdti = mysqli_fetch_assoc($qdti);
$sek_nama = balikin($rdti['judul']);
$sek_alamat = balikin($rdti['isi']);
$sek_kontak = balikin($rdti['telp']);
$sek_kota = balikin($rdti['kota']);
$sek_filex = $rdti['filex'];



//nek null foto
if (empty($sek_filex))
	{
	$sek_filexx = "$sumber/img/foto_blank.jpg";
	}
else
	{
	$sek_filexx = "$sumber/filebox/logo/$sek_filex";
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>