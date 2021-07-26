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

	
	

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");



//ambil nilai
$kd = nosql($_REQUEST['kd']);



$foldernya = "../../filebox/artikel/$kd/";
			
			
//buat folder...
if (!file_exists('../../filebox/artikel/'.$kd.'')) {
    mkdir('../../filebox/artikel/'.$kd.'', 0777, true);
	}




$namabaru = "$kd-1.png";




//hapus dulu...
unlink($foldernya.$namabaru);









		  
//upload.php;
if(isset($_FILES["image_upload"]["name"])) 
{
 $name = $_FILES["image_upload"]["name"];
 $size = $_FILES["image_upload"]["size"];
 $ext = end(explode(".", $name));
 $allowed_ext = array("png", "jpg", "jpeg");
 if(in_array($ext, $allowed_ext))
 {
//  if($size < (1024*1024))
  if($size < (5120*5120))
  {
   $new_image = '';
   $new_name = $namabaru;
   $path = "../../filebox/artikel/$kd/$new_name";
   


   list($width, $height) = getimagesize($_FILES["image_upload"]["tmp_name"]);
   if($ext == 'png')
   {
    $new_image = imagecreatefrompng($_FILES["image_upload"]["tmp_name"]);
   }
   if($ext == 'jpg' || $ext == 'jpeg')  
            {  
               $new_image = imagecreatefromjpeg($_FILES["image_upload"]["tmp_name"]);  
            }
            $new_width=400;
            $new_height = 400;
            $tmp_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($tmp_image, $path, 100);
            imagedestroy($new_image);
            imagedestroy($tmp_image);
            echo '<img src="'.$path.'" width="100" height="100">';

			
  }
  else
  {
   echo 'Image File size must be less than 5 MB';
  }
 }
 else
 {
  echo 'Invalid Image File';
 }
}
else
{
 echo 'Please Select Image File';
}





?>
