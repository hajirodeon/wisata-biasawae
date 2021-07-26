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



nocache;


//nilai
$filenya = "$sumber/android/i_slideshow.php";
?>



<style>
	.imagebox {
  background: black;
  padding: 0px;
  position: relative;
  text-align: center;
  width: 100%;
}

.imagebox img {
  opacity: 1;
  transition: 0.5s opacity;
}

.imagebox .imagebox-desc {
  background-color: rgba(0, 0, 0, 0.6);
  bottom: 0px;
  color: white;
  font-size: 1.2em;
  left: 0px;
  padding: 10px 15px;
  position: absolute;
  transition: 0.5s padding;
  text-align: center;
  width: 100%;
}

.imagebox:hover img {
  opacity: 0.7;
}

.imagebox:hover .imagebox-desc {
  padding-bottom: 10%;
}

</style>




<?php
//slideshow
$qyuk2 = mysqli_query($koneksi, "SELECT * FROM cp_m_slideshow ".
						"ORDER BY RAND()");
$ryuk2 = mysqli_fetch_assoc($qyuk2);


//nilai
$yuk2_kd = nosql($ryuk2['kd']);
$yuk2_filex = balikin($ryuk2['filex']);
$yuk2_urlnya = balikin($ryuk2['urlnya']);
$yuk2_nama = balikin($ryuk2['nama']);
$yuk2_isi = balikin($ryuk2['isi']);
$yuk2_postdate = balikin($ryuk2['postdate']);

echo '<div class="row">
    <div class="col-sm-12">
      <div class="imagebox">
        <a href="#hola">
          <img src="'.$sumber.'/filebox/slideshow/'.$yuk2_kd.'/'.$yuk2_filex.'"  class="category-banner img-responsive">
          <span class="imagebox-desc">'.$yuk2_nama.'</span>
        </a>
      </div>
    </div>
  </div>';



exit();
?>