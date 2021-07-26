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
$filenya = "pass.php";
$filenyax = "i_pass.php";
$diload = "document.formx.passlama.focus();";
$judul = "[SETTING]. Ganti Password";
$judulku = "[$adm_session] ==> $judul";
$juduli = $judul;


//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
//simpan
if ($_POST['btnSMP'])
	{
	//ambil nilai
	$passlama = md5(cegah($_POST["passlama"]));
	$passbaru = md5(cegah($_POST["passbaru"]));
	$passbaru2 = md5(cegahl($_POST["passbaru2"]));

	//cek
	//nek null
	if ((empty($passlama)) OR (empty($passbaru)) OR (empty($passbaru2)))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}

	//nek pass baru gak sama
	else if ($passbaru != $passbaru2)
		{
		//re-direct
		$pesan = "Password Baru Tidak Sama. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		exit();
		}
	else
		{
		//query
		$q = mysqli_query($koneksi, "SELECT * FROM adminx ".
							"WHERE kd = '$kd6_session' ".
							"AND usernamex = '$username6_session' ".
							"AND passwordx = '$passlama'");
		$row = mysqli_fetch_assoc($q);
		$total = mysqli_num_rows($q);

		//cek
		if ($total != 0)
			{
			//perintah SQL
			mysqli_query($koneksi, "UPDATE adminx SET passwordx = '$passbaru' ".
							"WHERE kd = '$kd6_session' ".
							"AND usernamex = '$username6_session'");


			//auto-kembali
			$pesan = "PASSWORD BERHASIL DIGANTI.";
			$ke = "../index.php";
			pekem($pesan, $ke);
			exit();
			}
		else
			{
			//re-direct
			$pesan = "PASSWORD LAMA TIDAK COCOK. HARAP DIULANGI...!!!";
			pekem($pesan, $filenya);
			exit();
			}
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/





//isi *START
ob_start();


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>


<script language='javascript'>
//membuat document jquery
$(document).ready(function(){

	$("#btnSMP").on('click', function(){
		$("#formx2").submit(function(){
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



<br>
<?php
echo '<form name="formx2" id="formx2">
<p>
Password Lama : 
<br>
<input name="passlama" id="passlama" type="password" size="15" class="btn btn-success">
</p>

<p>Password Baru : <br>
<input name="passbaru" id="passbaru" type="password" size="15" class="btn btn-success">
</p>
<p>RE-Password Baru : <br>
<input name="passbaru2" id="passbaru2" type="password" size="15" class="btn btn-success">
</p>


<p>
<input name="btnSMP" id="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
<input name="btnBTL" id="btnBTL" type="reset" value="BATAL" class="btn btn-info">
</p>


<p>
<div id="ihasil"></div>
</p>

</form>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");



//diskonek
exit();
?>