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
$tpl = LoadTpl("../../template/admin.html");


nocache;

//nilai
$filenya = "profil.php";
$judul = "[SETTING]. Profil";
$judulku = "$judul";




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//simpan
if ($_POST['btnSMP'])
	{
	//ambil nilai
	$e_nama = cegah($_POST["e_nama"]);
	$e_isi = cegah($_POST["e_isi"]);
	$e_alamat = cegah($_POST["e_alamat"]);
	$e_telp = cegah($_POST["e_telp"]);
	$e_fax = cegah($_POST["e_fax"]);
	$e_email = cegah($_POST["e_email"]);
	$e_web = cegah($_POST["e_web"]);
	$e_fb = cegah($_POST["e_fb"]);
	$e_twitter = cegah($_POST["e_twitter"]);
	$e_youtube = cegah($_POST["e_youtube"]);
	$e_instagram = cegah($_POST["e_instagram"]);
	$e_wa = cegah($_POST["e_wa"]);


	$namabaru = "logo.jpg";


	//cek
	//nek null
	if ((empty($e_nama)) OR (empty($e_telp)) OR (empty($e_email)) OR (empty($e_wa)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}

	else
		{
		//perintah SQL
		mysqli_query($koneksi, "UPDATE cp_profil SET judul = '$e_nama', ".
						"isi = '$e_isi', ".
						"filex = '$namabaru', ".
						"alamat = '$e_alamat', ".
						"telp = '$e_telp', ".
						"fax = '$e_fax', ".
						"email = '$e_email', ".
						"web = '$e_web', ".
						"fb = '$e_fb', ".
						"twitter = '$e_twitter', ".
						"youtube = '$e_youtube', ".
						"instagram = '$e_instagram', ".
						"wa = '$e_wa', ".
						"postdate = '$today'");


		//auto-kembali
		xloc($filenya);
		exit();
		}
	}
	
	
	
	
	
	
	
	
	






//simpan
if ($_POST['btnSMP2'])
	{
	//ambil nilai
	$e_lat = cegah($_POST["e_lat"]);
	$e_long = cegah($_POST["e_long"]);


	//cek
	//nek null
	if (empty($e_lat) OR empty($e_long))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}

	else
		{
		//perintah SQL
		mysqli_query($koneksi, "UPDATE cp_profil SET x_lat = '$e_lat', ".
									"x_long = '$e_long'");


		//auto-kembali
		xloc($filenya);
		exit();
		}
	}
	
	
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






//isi *START
ob_start();






     	
echo '<form action="'.$filenya.'" method="post" name="formx">';


//detail
$qku = mysqli_query($koneksi, "SELECT * FROM cp_profil");
$rku = mysqli_fetch_assoc($qku);
$ku_judul = balikin($rku['judul']);
$ku_isi = balikin($rku['isi']);
$ku_web = balikin($rku['web']);
$ku_email = balikin($rku['email']);
$ku_alamat = balikin($rku['alamat']);
$ku_alamat2 = balikin($rku['alamat_googlemap']);
$ku_telp = balikin($rku['telp']);
$ku_fax = balikin($rku['fax']);
$ku_fb = balikin($rku['fb']);
$ku_twitter = balikin($rku['twitter']);
$ku_youtube = balikin($rku['youtube']);
$ku_wa = balikin($rku['wa']);
$ku_instagram = balikin($rku['instagram']);
$latitude = balikin($rku['x_lat']);
$longitude = balikin($rku['x_long']);

echo '<div class="row">

<div class="col-md-6">


<p>
Judul : 
<br>
<input name="e_nama" type="text" size="20" value="'.$ku_judul.'" class="btn btn-success">
</p>


<p>
Sekilas / Tagline / Semboyan : 
<br>
<input name="e_isi" type="text" size="50" value="'.$ku_isi.'" class="btn btn-success">
</p>


<p>
Alamat : 
<br>
<input name="e_alamat" type="text" size="30" value="'.$ku_alamat.'" class="btn btn-success">
</p>

<p>
Telepon : 
<br>
<input name="e_telp" type="text" size="20" value="'.$ku_telp.'" class="btn btn-success">
</p>


<p>
Fax : 
<br>
<input name="e_fax" type="text" size="20" value="'.$ku_fax.'" class="btn btn-success">
</p>


<p>
WEB : 
<br>
<input name="e_web" type="text" size="30" value="'.$ku_web.'" class="btn btn-success">
</p>


</div>

<div class="col-md-6">


<p>
E-Mail : 
<br>
<input name="e_email" type="text" size="30" value="'.$ku_email.'" class="btn btn-success">
</p>



<p>
FB : 
<br>
<input name="e_fb" type="text" size="30" value="'.$ku_fb.'" class="btn btn-success">
</p>


<p>
Twitter : 
<br>
<input name="e_twitter" type="text" size="30" value="'.$ku_twitter.'" class="btn btn-success">
</p>


<p>
Youtube : 
<br>
<input name="e_youtube" type="text" size="30" value="'.$ku_youtube.'" class="btn btn-success">
</p>

<p>
WA : 
<br>
<input name="e_wa" type="text" size="30" value="'.$ku_wa.'" class="btn btn-success">
</p>


<p>
Instagram : 
<br>
<input name="e_instagram" type="text" size="30" value="'.$ku_instagram.'" class="btn btn-success">
</p>


</div>

</div>


<p>
<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
</p>
</form>

<hr>



<div class="row">

<div class="col-md-12">


<h3>PETA GOOGLE MAP</h3>';

echo '<form action="'.$filenya.'" method="post" name="formx2">

<p>
Lat : 
<br>
<input name="e_lat" type="text" size="10" value="'.$latitude.'" class="btn btn-success">
</p>


<p>
Long : 
<br>
<input name="e_long" type="text" size="10" value="'.$longitude.'" class="btn btn-success">
</p>


<p>
<input name="btnSMP2" type="submit" value="SIMPAN" class="btn btn-danger">
</p>


</form>';





	
	
	
/*
//update ke profil
mysqli_query($koneksi, "UPDATE cp_profil SET x_lat = '$latitude', ".
				"x_long = '$longitude'");
 * 
 */ 
?>



<style>
  #map {
    height: 100%;
  }
</style>

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&&callback=initMap&key=<?php echo $keyku;?>"></script>





<style>
 #map-canvas {
        width: 100%;
        height: 400px;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script>
var map;
function initialize() {
        var myLatLng = {lat: <?php echo $latitude;?>, lng: <?php echo $longitude;?>};

        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          zoom: 20,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: '<?php echo $ku_nama;?>'
        });

}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <div id="map-canvas"></div>


</div>


</div>



<?php
//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");

//diskonek
xfree($qbw);
xclose($koneksi);
exit();
?>