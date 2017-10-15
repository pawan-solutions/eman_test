<?php

App::uses('AppHelper', 'View');
class ImageHelper extends AppHelper {
	var $cacheDir = 'imagecache'; // relative to IMAGES_URL path

/**
 * Automatically resizes an image and returns formatted IMG tag
 *
 * @param string $dir Path to the directory, relative to the webroot directory.  for ex "img" or "img/myphotos"
 * @param string $photo image name for ex abc.jpg or with dir myphotos/abc.jpg
 * @param integer $width Image of returned image
 * @param integer $height Height of returned image
 * @param boolean $aspect Maintain aspect ratio (default: true)
 * @param boolean $crop returned image will be croped for given width n height.
 * @access public
 */
	function resize($dir, $photo, $width, $height, $aspect = true, $crop=null) {
		$width_d=$width;
		$height_d=$height;
		$types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
		//$dir= str_replace("/",DS,str_replace("\\",DS,$dir));
		$photo= str_replace("/",DS,str_replace("\\",DS,$photo));
		$fullpath=IMAGES.$dir.DS;
		$fullpathphoto=$fullpath.$photo;
		$fullurl=SITE_URL."img/".$dir.'/';
		$fullpathphoto = $fullpath.$photo;
		if(!file_exists($fullpathphoto) || empty($photo)) {
			$fullpathphoto=DEFAULT_IMAGE_PATH;
		}
		if (!($size = getimagesize($fullpathphoto))) {
			return ""; // image doesn't exist
		}
		if($height==null)
			$height=$size[1];
		if($aspect) {
			if(($size[1]/$height) > ($size[0]/$width)) {
				$width = ceil(($size[0]/$size[1]) * $height);
			} else {
				$height = ceil($width / ($size[0]/$size[1]));
			}
		}
		if($crop) {
			if(($size[1]/$height) < ($size[0]/$width)) {
				$width = ceil(($size[0]/$size[1]) * $height);
			} else {
				$height = ceil($width / ($size[0]/$size[1]));
			}
		}
		$res1 = is_dir($fullpath.$this->cacheDir);
		if($res1 != 1) {
			$res2= mkdir($fullpath.$this->cacheDir, 0755, true);
		}
		$relfile = $fullurl.$this->cacheDir.'/'.$width.'x'.$height.'_'.basename($photo); // relative file
		$cachefile = $fullpath.$this->cacheDir.DS.$width.'x'.$height.'_'.basename($photo);  // location on server

		if (file_exists($cachefile)) {
			$csize = getimagesize($cachefile);
			$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
			if (@filemtime($cachefile) < @filemtime($fullpathphoto)) // check if up to date
				$cached = false;
		} else {
			$cached = false;
		}
		$flag=0;
		if (!$cached) {
			$resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
			if(!$resize) {
				$flag=1;
			}
		} else {
			$resize = false;
		}
		if ($resize) {
			$image = call_user_func('imagecreatefrom'.$types[$size[2]], $fullpathphoto);
			if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
				imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
				if($crop) {
					$temp1 = imagecreatetruecolor ($width_d, $height_d);
					imagecopy($temp1, $temp, 0, 0, 0, 0, $width, $height);
				}
			} else {
				$temp = imagecreate ($width, $height);
				imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
				if($crop) {
					$temp1 = imagecreatetruecolor ($width_d, $height_d);
					imagecopy($temp1, $temp, 0, 0, 0, 0, $width, $height);
				}
			}
			if($crop) {
				 call_user_func("image".$types[$size[2]], $temp1, $cachefile);
				 imagedestroy ($temp1);
			} else {
				call_user_func("image".$types[$size[2]], $temp, $cachefile);
				 imagedestroy ($temp);
			}
			imagedestroy ($image);
		}
		if($flag==1) {
			return $fullurl.$photo;
		} else {
			return $relfile;
		}
	}
}