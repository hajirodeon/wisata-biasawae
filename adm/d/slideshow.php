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

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/adm.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/admin.html");

nocache;

//nilai
$filenya = "slideshow.php";
$judul = "[MASTER] Data SlideShow";
$judulku = "$judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$kunci = cegah($_REQUEST['kunci']);
$kd = nosql($_REQUEST['kd']);
$kategori = cegah($_REQUEST['kategori']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek baru
if ($_POST['btnBR'])
	{
	//nilai
	$ke = "$filenya?s=baru&kd=$x";
	
	
	//re-direct
	xloc($ke);
	exit();
	}



//nek batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}



//jika simpan
if ($_POST['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$page = nosql($_POST['page']);
	$e_kd = nosql($_POST['e_kd']);
	$e_nama = cegah($_POST['e_nama']);
	$e_isi = cegah($_POST['e_isi']);
	$e_urlnya = cegah($_POST['e_urlnya']);
	



	$namabaru = "$e_kd-1.jpg";


	//nek null
	if ((empty($e_nama)) OR (empty($e_isi)))
		{
		//re-direct
		$pesan = "Belum Ditulis. Harap Diulangi...!!";
		$ke = "$filenya?s=$s&kd=$e_kd";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//jika baru
		if ($s == "baru")
			{
			//insert
			/*
			mysqli_query($koneksi, "INSERT INTO cp_m_slideshow(kd, nama, isi, filex, urlnya, postdate) VALUES ".
							"('$e_kd', '$e_nama', '$e_isi', '$namabaru', '$e_urlnya', '$today')");
			 * 
			 */

			 
			mysqli_query($koneksi, "INSERT INTO `cp_m_slideshow` (`kd`, `filex`, `nama`, `isi`, `postdate`, `urlnya`) ".
							"VALUES ('$e_kd', '$namabaru', '$e_nama', '$e_isi', '$today', '$e_urlnya');");



			//re-direct
			xloc($filenya);
			exit();
			}
			
			
				
				
		//jika update
		if ($s == "edit")
			{
			mysqli_query($koneksi, "UPDATE cp_m_slideshow SET nama = '$e_nama', ".
							"isi = '$e_isi', ".
							"urlnya = '$e_urlnya', ".
							"filex = '$namabaru', ".
							"postdate = '$today' ".
							"WHERE kd = '$e_kd'");


			//re-direct
			xloc($filenya);
			exit();
			}

		}
	}

	
	
	

//jika hapus
if ($_POST['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);
	$ke = $filenya;

	//ambil semua
	for ($i=1; $i<=$jml;$i++)
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);

		//del
		mysqli_query($koneksi, "DELETE FROM cp_m_slideshow ".
						"WHERE kd = '$kd'");
		}


	//auto-kembali
	xloc($ke);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();


?>


  
  <script>
  	$(document).ready(function() {
    $('#table-responsive').dataTable( {
        "scrollX": true
    } );
} );
  </script>
  
<?php
//require
require("../../template/js/jumpmenu.js");
require("../../template/js/checkall.js");
require("../../template/js/swap.js");


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (($s == "baru") OR ($s == "edit"))
	{
	//edit
	$qx = mysqli_query($koneksi, "SELECT * FROM cp_m_slideshow ".
						"WHERE kd = '$kd'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_kd = nosql($rowx['kd']);
	$e_nama = balikin($rowx['nama']);
	$e_urlnya = balikin($rowx['urlnya']);
	$e_isi = balikin($rowx['isi']);
	$e_filex1 = balikin($rowx['filex']);


	//jika edit / baru
	//nek null foto
	if (empty($e_filex1))
		{
		$nil_foto = "$sumber/template/img/bg-black.png";
		}
	else
		{
		$nil_foto = "$sumber/filebox/slideshow/$e_kd/$e_filex1";
		}
		
		

	
	echo '<div class="row">

	<div class="col-md-4">
	
	
	<form action="'.$filenya.'" method="post" name="formx2">

	<p>
	NAMA : 
	<br>
	<input name="e_nama" type="text" size="30" value="'.$e_nama.'" class="btn btn-success">
	</p>
	
	<p>
	KETERANGAN : 
	<br>

	<input name="e_isi" type="text" size="30" value="'.$e_isi.'" class="btn btn-success">
	</p>
	
	
	<p>
	RE-DIRECT URL : 
	<br>

	http://<input name="e_urlnya" type="text" size="30" value="'.$e_urlnya.'" class="btn btn-success">
	</p>
	

	<input name="s" type="hidden" value="'.$s.'">
	<input name="e_kd" type="hidden" value="'.$kd.'">
	<input name="page" type="hidden" value="'.$page.'">


	<p>
	<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
	<input name="btnBTL" type="submit" value="BATAL" class="btn btn-info">
	
	</form>
	
	
	</div>

	<div class="col-md-8">';
	?>


		
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	
	
		<style type="text/css">
		.thumb-image{
		 float:left;
		 width:150px;
		 height:150px;
		 position:relative;
		 padding:5px;
		}
		</style>
		
		
		
		
			<table border="0" cellspacing="0" cellpadding="3">
			<tr valign="top">
			<td width="100">
				<div id="image-holder"></div>
			</td>
			
	
			</tr>
			</table>
		
		<script>
		$(document).ready(function() {
			
			
		        $("#image_upload").on('change', function() {
	          //Get count of selected files
	          var countFiles = $(this)[0].files.length;
	          var imgPath = $(this)[0].value;
	          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	          var image_holder = $("#image-holder");
	          image_holder.empty();
	          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	            if (typeof(FileReader) != "undefined") {
	              //loop for each file selected for uploaded.
	              for (var i = 0; i < countFiles; i++) 
	              {
	                var reader = new FileReader();
	                reader.onload = function(e) {
	                  $("<img />", {
	                    "src": e.target.result,
	                    "class": "thumb-image"
	                  }).appendTo(image_holder);
	                }
	                image_holder.show();
	                reader.readAsDataURL($(this)[0].files[i]);
	              }
	              
	
		    
	            } else {
	              alert("This browser does not support FileReader.");
	            }
	          } else {
	            alert("Pls select only images");
	          }
	        });
	        
	        
	
	
	        
	        
	        
	      });
	</script>
	
	<?php
	echo '<div id="loading" style="display:none">
	<img src="'.$sumber.'/template/img/progress-bar.gif" width="100" height="16">
		</div>
		
		
	   <form method="post" id="upload_image" enctype="multipart/form-data">
	<input type="file" name="image_upload" id="image_upload" class="btn btn-success" />
	
	   </form>
	   
	   <hr>';
	
	?>
	
	
	<script>  
	$(document).ready(function(){
		
		
		
	       $('#image-holder').load("<?php echo $sumber;?>/adm/d/i_slideshow.php?aksi=lihat1&kd=<?php echo $kd;?>");
	
	
	
	        
	    $('#upload_image').on('change', function(event){
	     event.preventDefault();
	     
			$('#loading').show();
	
	
		
		     $.ajax({
		      url:"i_slideshow_upload.php?kd=<?php echo $kd;?>",
		      method:"POST",
		      data:new FormData(this),
		      contentType:false,
		      cache:false,
		      processData:false,
		      success:function(data){
				$('#loading').hide();
		       $('#preview').load("<?php echo $sumber;?>/adm/d/i_slideshow.php?aksi=lihat&kd=<?php echo $kd;?>");
		       	
		      }
		     })
		    });
		    
		    
	});  
	</script>


	<?php	
	echo '<p>
	NB. File Image dengan Resolusi 1920 x 1280 pixel
	</p>
	
	
	</div>
	
	</div>';
	}
	
	
else
	{
	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT * FROM cp_m_slideshow ".
					"ORDER BY postdate DESC";
	$sqlresult = $sqlcount;
	
	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);



	$warnatext = "orange";
	
	echo '<form action="'.$filenya.'" enctype="multipart/form-data" method="post" name="formx">
	
	
	<p>
	<input name="btnBR" type="submit" value="BUAT BARU" class="btn btn-danger">
	<hr>
	</p>
	<div class="table-responsive">          
		  <table class="table" border="1">
		    <thead>
				
	<tr bgcolor="'.$warnaheader.'">
	<td width="16">&nbsp;</td>
	<td width="30">&nbsp;</td>
	<td><strong><font color="'.$warnatext.'">NAMA</font></strong></td>
	<td><strong><font color="'.$warnatext.'">KETERANGAN</font></strong></td>
	<td width="100"><strong><font color="'.$warnatext.'">IMAGE</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">POSTDATE</font></strong></td>
	</tr>
	
		    </thead>
		    <tbody>';
	
	if ($count != 0)
		{
		do {
			if ($warna_set ==0)
				{
				$warna = $warna01;
				$warna_set = 1;
				}
			else
				{
				$warna = $warna02;
				$warna_set = 0;
				}
	
			$nomer = $nomer + 1;
			$e_kd = nosql($data['kd']);
			$e_nama = balikin($data['nama']);
			$e_isi = balikin($data['isi']);
			$filex1 = balikin($data['filex']);
			$e_urlnya = balikin($data['urlnya']);
			$e_postdate = balikin($data['postdate']);

	
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>
			<input type="checkbox" name="item'.$nomer.'" value="'.$e_kd.'">
	        </td>
			<td>
			<a href="'.$filenya.'?s=edit&kd='.$e_kd.'"><img src="'.$sumber.'/template/img/edit.gif" width="16" height="16" border="0"></a>
			</td>
			<td>'.$e_nama.'</td>
			<td>
			'.$e_isi.'
			<hr>
			'.$e_urlnya.'
			</td>
			<td>
			<p>
			<img src="'.$sumber.'/filebox/slideshow/'.$e_kd.'/'.$filex1.'" width="150" height="150">
			</p>

			</td>
			<td>'.$e_postdate.'</td>
	        </tr>';
			}
		while ($data = mysqli_fetch_assoc($result));
		}
	
	
	echo '</tbody>
		  </table>
		  </div>
		  
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
	<td>
	<strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'
	<input name="jml" type="hidden" value="'.$count.'">
	<br>
	<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$count.')" class="btn btn-primary">
	<input name="btnBTL" type="reset" value="BATAL" class="btn btn-success">
	<input name="btnHPS" type="submit" value="HAPUS" class="btn btn-danger">
	</td>
	</tr>
	</table>
	
	
	</form>';
	}
	

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");



//null-kan
xclose($koneksi);
exit();
?>