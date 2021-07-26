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
$filenya = "tempat.php";
$judul = "[MASTER] Tempat Wisata";
$judulku = "$judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$kunci = cegah($_REQUEST['kunci']);
$kd = nosql($_REQUEST['kd']);
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
	$e_kode = cegah($_POST['e_kode']);
	$e_nama = cegah($_POST['e_nama']);
	$e_ket = cegah($_POST['e_ket']);
	$e_wni_kerja = cegah($_POST['e_wni_kerja']);
	$e_wni_libur = cegah($_POST['e_wni_libur']);
	$e_wna_kerja = cegah($_POST['e_wna_kerja']);
	$e_wna_libur = cegah($_POST['e_wna_libur']);
	

	$namabaru = "$e_kd-1.png";


	//nek null
	if ((empty($e_nama)) OR (empty($e_kode)) OR (empty($e_ket)))
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
			mysqli_query($koneksi, "INSERT INTO m_tempat(kd, kode, nama, ket, filex, ".
							"harga_kerja_wni, harga_libur_wni, ".
							"harga_kerja_wna, harga_libur_wna, postdate) VALUES ".
							"('$e_kd', '$e_kode', '$e_nama', '$e_ket', '$namabaru', ".
							"'$e_wni_kerja', '$e_wni_libur', ".
							"'$e_wna_kerja', '$e_wna_libur', '$today')");


			//re-direct
			xloc($filenya);
			exit();
			}
			
			
				
				
		//jika update
		if ($s == "edit")
			{
			mysqli_query($koneksi, "UPDATE m_tempat SET kode = '$e_kode', ".
							"nama = '$e_nama', ".
							"ket = '$e_ket', ".
							"filex = '$namabaru', ".
							"harga_kerja_wni = '$e_wni_kerja', ".
							"harga_libur_wni = '$e_wni_libur', ".
							"harga_kerja_wna = '$e_wna_kerja', ".
							"harga_libur_wna = '$e_wna_libur', ".
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
		mysqli_query($koneksi, "DELETE FROM m_tempat ".
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
	$qx = mysqli_query($koneksi, "SELECT * FROM m_tempat ".
						"WHERE kd = '$kd'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_kd = nosql($rowx['kd']);
	$e_kode = balikin($rowx['kode']);
	$e_nama = balikin($rowx['nama']);
	$e_ket = balikin($rowx['ket']);
	$e_wni_kerja = balikin($rowx['harga_kerja_wni']);
	$e_wni_libur = balikin($rowx['harga_libur_wni']);
	$e_wna_kerja = balikin($rowx['harga_kerja_wna']);
	$e_wna_libur = balikin($rowx['harga_libur_wna']);
	$e_filex1 = balikin($rowx['filex']);


	//jika edit / baru
	//nek null foto
	if (empty($e_filex1))
		{
		$nil_foto = "$sumber/template/img/bg-black.png";
		}
	else
		{
		$nil_foto = "$sumber/filebox/tempat/$e_kd/$e_filex1";
		}
		
		

	
	echo '<div class="row">

	<div class="col-md-4">
	
	
	<form action="'.$filenya.'" method="post" name="formx2">
	
	
	<p>
	KODE : 
	<br>
	<input name="e_kode" type="text" size="10" value="'.$e_kode.'" class="btn btn-success">
	</p>
	
	
	<p>
	NAMA : 
	<br>
	<input name="e_nama" type="text" size="30" value="'.$e_nama.'" class="btn btn-success">
	</p>
	

	<p>
	Keterangan : 
	<br>

	<textarea id="e_ket" name="e_ket" rows="5" cols="80" style="width: 100%" class="btn-success">'.$e_ket.'</textarea>
	
	</p>
	
	<hr>
	
	<h3>Harga Tiket</h3>
	
	<p>
	WNI, Hari Kerja : 
	<br>
	Rp. <input name="e_wni_kerja" type="text" size="10" value="'.$e_wni_kerja.'" class="btn btn-success">,-
	
	</p>


	<p>
	WNI, Hari Libur : 
	<br>
	Rp. <input name="e_wni_libur" type="text" size="10" value="'.$e_wni_libur.'" class="btn btn-success">,-
	
	</p>
	
	<hr>
	
	<p>
	WNA, Hari Kerja : 
	<br>
	Rp. <input name="e_wna_kerja" type="text" size="10" value="'.$e_wna_kerja.'" class="btn btn-success">,-
	
	</p>
	
	<p>
	WNA, Hari Libur : 
	<br>
	Rp. <input name="e_wna_libur" type="text" size="10" value="'.$e_wna_libur.'" class="btn btn-success">,-
	
	</p>
	
	

	
	<p>
	<hr>
	<input name="s" type="hidden" value="'.$s.'">
	<input name="e_kd" type="hidden" value="'.$kd.'">
	<input name="page" type="hidden" value="'.$page.'">

		
	<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
	<input name="btnBTL" type="submit" value="BATAL" class="btn btn-info">
	<hr>
	</p>
	
	
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
		
		
		
	       $('#image-holder').load("<?php echo $sumber;?>/adm/d/i_tempat.php?aksi=lihat1&kd=<?php echo $kd;?>");
	
	
	
	        
	    $('#upload_image').on('change', function(event){
	     event.preventDefault();
	     
			$('#loading').show();
	
	
		
		     $.ajax({
		      url:"i_tempat_upload.php?kd=<?php echo $kd;?>",
		      method:"POST",
		      data:new FormData(this),
		      contentType:false,
		      cache:false,
		      processData:false,
		      success:function(data){
				$('#loading').hide();
		       $('#preview').load("<?php echo $sumber;?>/adm/cp/i_tempat.php?aksi=lihat&kd=<?php echo $kd;?>");
		       	
		      }
		     })
		    });
		    
		    
	});  
	</script>


	<?php	
	echo '</div>
	
	</div>';
	}
	
	
else
	{
	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT * FROM m_tempat ".
					"ORDER BY nama ASC";
	$sqlresult = $sqlcount;
	
	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);




	
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
				<td width="100"><strong><font color="'.$warnatext.'">IMAGE</font></strong></td>
				<td width="50"><strong><font color="'.$warnatext.'">KODE</font></strong></td>
				<td width="200"><strong><font color="'.$warnatext.'">NAMA</font></strong></td>
				<td><strong><font color="'.$warnatext.'">KETERANGAN</font></strong></td>
				<td width="200" align="center"><strong><font color="'.$warnatext.'">WNI,HariKerja</font></strong></td>
				<td width="200" align="center"><strong><font color="'.$warnatext.'">WNI,HariLibur</font></strong></td>
				<td width="200" align="center"><strong><font color="'.$warnatext.'">WNA,HariKerja</font></strong></td>
				<td width="200" align="center"><strong><font color="'.$warnatext.'">WNA,HariLibur</font></strong></td>
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
			$e_kode = balikin($data['kode']);
			$e_nama = balikin($data['nama']);
			$e_ket = balikin($data['ket']);
			$filex1 = balikin($data['filex']);
			$e_postdate = balikin($data['postdate']);
			$e_wni_kerja = balikin($data['harga_kerja_wni']);
			$e_wni_libur = balikin($data['harga_libur_wni']);
			$e_wna_kerja = balikin($data['harga_kerja_wna']);
			$e_wna_libur = balikin($data['harga_libur_wna']);

	
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>
			<input type="checkbox" name="item'.$nomer.'" value="'.$e_kd.'">
	        </td>
			<td>
			<a href="'.$filenya.'?s=edit&kd='.$e_kd.'"><img src="'.$sumber.'/template/img/edit.gif" width="16" height="16" border="0"></a>
			</td>
			
			<td>
			<p>
			<img src="'.$sumber.'/filebox/tempat/'.$e_kd.'/'.$filex1.'" width="100%" height="100">
			</p>

			</td>
			
			<td>'.$e_kode.'</td>
			<td>'.$e_nama.'</td>
			<td>'.$e_ket.'</td>
			<td align="right">'.xduit2($e_wni_kerja).'</td>
			<td align="right">'.xduit2($e_wni_libur).'</td>
			<td align="right">'.xduit2($e_wna_kerja).'</td>
			<td align="right">'.xduit2($e_wna_libur).'</td>
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