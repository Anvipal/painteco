<?php
define('NO_CACHE', true);
define('DO_PICT_CACHE', true);

// $exp = time() - 2592000 ; 
// $exp = gmdate ( "D, d M Y H:i:s", $exp ); 
// header ( "Expires:". $exp. " GMT" ); 

require_once ('_config.inc.php');

	ini_set("display_errors", true);
	ini_set("memory_limit", "32M");
	error_reporting(E_ALL);


$img =  		isset($_GET["i"]) 			? trim($_GET["i"]) : "";			// bildes faila nosaukums
$type = 		isset($_GET["type"])		? trim($_GET["type"]) : "";			// pie kuras sadalas bilde pieder: brands, vategories, gallery, just photos
$looksmall = 	isset($_GET["looksmall"]) 	? trim($_GET["looksmall"]) : 0;		// flags, noziimee, ka jaatgiez bildi origonaalaa izmeeraa.
$w = 			isset($_GET["w"]) 			? $_GET["w"] : 0;					// tiek padots kad proporcijas nav janem veraa, vienkaarsi jasamazinaa liidz sitai veertiibai.
$h = 			isset($_GET["h"]) 			? $_GET["h"] : 0;					// tiek padots kad proporcijas nav janem veraa, vienkaarsi jasamazinaa liidz sitai veertiibai.
$maxw = 		isset($_GET["maxw"]) 		? $_GET["maxw"] : 0;				// maksimālais platums, ja proporcijas jaievero
$maxh = 		isset($_GET["maxh"]) 		? $_GET["maxh"] : 0;				// maksimālais augstums, ja proporcijas jaievero
$thumb = 		isset($_GET["thumb"]) 		? intval($_GET["thumb"]) : 0;		// vai jaatgriez thimbnail tipa bildi


if($h==0) $h = $maxh;

switch($type) {

	case"cat": 		$path = PATH_CATEGORIES; break;
	case"brand": 	$path = PATH_BRANDS; break;
	case"gal": 		$path = PATH_GALLERY; break;
	case"brick":	$path = PATH_WOOD_BRICKS; break;
	case"pattern":	$path = PATH_WOOD_PATTERNS; break;
	case"":			$path = PATH_PHOTOS; break;	
}


$array = explode(".", $img);
$nr = count($array);



$file_extension = ($array[$nr-1]);							// Store passed file extension.

$file_name = str_replace(".".$file_extension, "", $img);	// Strore passed file only name part(without extension).



if($looksmall==1) {

	header("Content-type: image/pjpeg");
	echo implode('', file($path.$img));
}



if(DO_PICT_CACHE) {
	
	if(!is_dir($path.PICT_CACHE_FOLDER)) {
		if (!mkdir($path.PICT_CACHE_FOLDER, 0777)) {
		    die('Sorry, erroroccured, please try later.');
		}
	}
	
	if(!is_dir($path.PICT_CACHE_FOLDER.$file_name)) {
		if (!mkdir($path.PICT_CACHE_FOLDER.$file_name, 0777)) {
		    die('Sorry, erroroccured, please try later.');
		}
	}
}


// Works if relly created! DO_PICT_CACHE is true.
$cached_folder_path = $path.PICT_CACHE_FOLDER.$file_name."/";



switch($thumb) {
	case'1':
	
		header("Content-type: image/pjpeg");
		if(!DO_PICT_CACHE) {
		
			ImageJpeg(CroppedThumbnail($path.$img,$maxw,$maxh), "", 100);
		}
		else {
		
			// make md5 hash for requested query string(which contain full filename) - it will be certain params photo minimized identificator.
			$hashed_file_name = md5($_SERVER['QUERY_STRING']).".".$file_extension;
			
			if(is_file($cached_folder_path.$hashed_file_name)) {
			
				echo implode('',file($cached_folder_path.$hashed_file_name));
			}
			else {
			
				ob_start();
					ImageJpeg(CroppedThumbnail($path.$img,$maxw,$maxh), "", 100);
					$image_data = ob_get_contents();
				ob_end_clean();
				file_put_contents($cached_folder_path.$hashed_file_name, $image_data);
				echo $image_data;
			}
		}
		
	break;	
	default:
	
		if(!DO_PICT_CACHE) {	
		
			$size = getimagesize($path.$img);
			switch ($size[2]) {
			
				case 1: $src_img=ImageCreateFromGif($path.$img);  break;
				case 2: $src_img=ImageCreateFromJpeg($path.$img); break;
				case 3: $src_img=ImageCreateFromPng($path.$img);  break;
				default: 										  exit;
			}

			if(!$w && !$h && $maxw) $w = ImageSX($src_img) > $maxw ? $maxw : ImageSX($src_img);
			if(!$w && !$h && $maxh) $h = ImageSY($src_img) > $maxh ? $maxh : ImageSY($src_img);
			if(!$w) $w = ($h / ImageSY($src_img)) * ImageSX($src_img);
			if(!$h) $h = ($w / ImageSX($src_img)) * ImageSY($src_img);

			if ($maxw && $w > $maxw) {
			
				$h = $h * $maxw / $w;
				$w = $maxw;
			}
			
			if ($maxh && $h > $maxh) {
			
				$w = $w * $maxh / $h;
				$h = $maxh;
			}

			$dst_img=ImageCreateTrueColor($w,$h); 
			ImageCopyResampled($dst_img,$src_img,0,0,0,0,$w,$h,ImageSX($src_img),ImageSY($src_img)); 
			
			#if ($type == "" && $_GET['maxw'] > 133) 
			#	$dst_img = set_watermark($dst_img, $w, $h);

			imagedestroy($src_img);
			header("Content-type: image/pjpeg"); 
			ImageJpeg($dst_img, "", 100); 		
			imagedestroy($dst_img);	
		}		
		else {
		
			// make md5 hash for requested query string(which contain full filename) - it will be certain params photo minimized identificator.
			$hashed_file_name = md5($_SERVER['QUERY_STRING']).".".$file_extension;
			header("Content-type: image/pjpeg");
			
			if(is_file($cached_folder_path.$hashed_file_name)) {
			
				echo implode('',file($cached_folder_path.$hashed_file_name));
			}
			else {
			
				ob_start();
					$size = getimagesize($path.$img);
					switch ($size[2]) {
					
						case 1: $src_img=ImageCreateFromGif($path.$img);  break;
						case 2: $src_img=ImageCreateFromJpeg($path.$img); break;
						case 3: $src_img=ImageCreateFromPng($path.$img);  break;
						default: 										  exit;
					}

					if(!$w && !$h && $maxw) $w = ImageSX($src_img) > $maxw ? $maxw : ImageSX($src_img);
					if(!$w && !$h && $maxh) $h = ImageSY($src_img) > $maxh ? $maxh : ImageSY($src_img);
					if(!$w) $w = ($h / ImageSY($src_img)) * ImageSX($src_img);
					if(!$h) $h = ($w / ImageSX($src_img)) * ImageSY($src_img);

					if ($maxw && $w > $maxw) {
					
						$h = $h * $maxw / $w;
						$w = $maxw;
					}
					
					if ($maxh && $h > $maxh) {
					
						$w = $w * $maxh / $h;
						$h = $maxh;
					}

					$dst_img=ImageCreateTrueColor($w,$h); 
					ImageCopyResampled($dst_img,$src_img,0,0,0,0,$w,$h,ImageSX($src_img),ImageSY($src_img)); 
					
					#if ($type == "" && $_GET['maxw'] > 133) 
					#	$dst_img = set_watermark($dst_img, $w, $h);

					imagedestroy($src_img);
					ImageJpeg($dst_img, "", 100); 		
					imagedestroy($dst_img);
				$image_data = ob_get_contents();
				ob_end_clean();
				file_put_contents($cached_folder_path.$hashed_file_name, $image_data);
				echo $image_data;
			}
		}		
}




#  get file extension
function parse_filename($filename) {

	$array = explode(".", $filename);
	$nr = count($array);

	return ($array[$nr-1]);
}


function CroppedThumbnail($imgSrc,$thumbnail_width,$thumbnail_height) { //$imgSrc is a FILE - Returns an image resource.
	

    //getting the image dimensions  
    list($width_orig, $height_orig, $file_type) = getimagesize($imgSrc);   
	switch ($file_type) {
	
		case 1: $myImage=ImageCreateFromGif($imgSrc);  break;	// Gif
		case 2: $myImage=ImageCreateFromJpeg($imgSrc);  break;
		case 3: $myImage=ImageCreateFromPng($imgSrc);  break;
		default: exit;
	}	
    $ratio_orig = $width_orig/$height_orig;	//vidal:  1.3
    

    if ($thumbnail_width/$thumbnail_height > $ratio_orig) {
       $new_height = $thumbnail_width/$ratio_orig;
       $new_width = $thumbnail_width;
    } else {
       $new_width = $thumbnail_height*$ratio_orig;
       $new_height = $thumbnail_height;
    }
    
    $x_mid = $new_width/2;  //horizontal middle
    $y_mid = $new_height/2; //vertical middle

    $process = imagecreatetruecolor(round($new_width), round($new_height)); 
    imagecopyresampled($process, $myImage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
    $thumb = imagecreatetruecolor($thumbnail_width, $thumbnail_height); 
    imagecopyresampled($thumb, $process, 0, 0, ($x_mid-($thumbnail_width/2)), ($y_mid-($thumbnail_height/2)), $thumbnail_width, $thumbnail_height, $thumbnail_width, $thumbnail_height);

    imagedestroy($process);
    imagedestroy($myImage);
    return $thumb;
}



function set_watermark($img_orig, $w, $h) {

	$watermark = imagecreatefrompng('images/watermark.png');  
	$watermark_width = imagesx($watermark);  
	$watermark_height = imagesy($watermark);  
	$image = imagecreatetruecolor($watermark_width, $watermark_height);  

	$dest_x = $w - $watermark_width - 5;
	$dest_y = $h - $watermark_height - 5; 
	imagecopymerge($img_orig, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, 60);  
	return $img_orig;
}

?>