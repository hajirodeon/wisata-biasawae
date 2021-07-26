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

	
	



if($_POST["save"])
	{
	$type = $_POST["type"];
	if($_POST["name"] and ($type=="JPG" or $type=="PNG"))
		{
		$img = base64_decode($_POST["image"]);
		$myFile = "../../filebox/equation/".$_POST["name"].".".$type ;
		header('Content-Type: image/jpeg');

		$fh = fopen($myFile, 'w');
		fwrite($fh, $img);
		fclose($fh);
		echo "../../filebox/equation/".$_POST["name"].".".$type;
		}
	}
else
	{
	$img = base64_decode($_POST["image"]);
	header('Content-Type: image/jpeg');
	header("Content-Disposition: attachment; filename=$img" );
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	header("Pragma: public");
	echo base64_decode($_POST["image"]);
	}
?>
