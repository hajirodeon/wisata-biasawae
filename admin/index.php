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
$tpl = LoadTpl("../template/login_admin.html");




//nocache;

//nilai
$filenya = "$sumber/admin/index.php";
$filenyax = "$sumber/admin/i_login.php";
$filenya_ke = $sumber;
$judul = "LOGIN ADMIN";
$judulku = $judul;









//isi *START
ob_start();

?>

	
	<script language='javascript'>
	//membuat document jquery
	$(document).ready(function(){
	
		$("#btnOK").on('click', function(){
			
			$("#formx").submit(function(){
				$.ajax({
					url: "<?php echo $filenyax;?>?aksi=simpan",
					type:$(this).attr("method"),
					data:$(this).serialize(),
					success:function(data){					
						$("#ihasil").html(data);
						}
					});
				return false;
			});
		
		
		});	
	


	
	});
	
	</script>
	


<?php
//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" id="formx">


<p>
Username :
<br>
<input name="usernamex" id="usernamex" type="text" size="15" class="btn btn-info btn-block">
</p>


<p>
Password :
<br>
<input name="passwordx" id="passwordx" type="password" size="15" class="btn btn-info btn-block">
</p>


<p>
<input name="btnOK" id="btnOK" type="submit" value="LANJUT &gt;&gt;&gt;" class="btn btn-danger">
</p>


<div id="ihasil"></div>

</form>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../inc/niltpl.php");


//diskonek
xclose($koneksi);
exit();
?>