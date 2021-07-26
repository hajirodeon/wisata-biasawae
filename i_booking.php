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


//terbaru
$qyuk2 = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
						"ORDER BY nama ASC");
$ryuk2 = mysqli_fetch_assoc($qyuk2);

do
	{
	//nilai
	$yuk2_kd = nosql($ryuk2['kd']);
	$yuk2_filex = balikin($ryuk2['filex']);
	$yuk2_judul = balikin($ryuk2['nama']);
	$yuk_judul2 = seo_friendly_url($yuk2_judul);
	
	echo '<div class="single-blog-post d-flex">
        <div class="post-thumbnail">
            <img src="'.$sumber.'/filebox/tempat/'.$yuk2_kd.'/'.$yuk2_filex.'" alt="'.$yuk2_judul.'">
        </div>
        <div class="post-content">
            <a href="booking.php?tmpkd='.$yuk2_kd.'&'.$yuk_judul2.'" class="post-title">'.$yuk2_judul.'</a>
        </div>
    </div>';

	}
while ($ryuk2 = mysqli_fetch_assoc($qyuk2));
?>                            
