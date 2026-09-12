<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;

class ImageHelper extends Model
{   
	var $image; 
	var $image_type;  

	/**
	 * Returns false when the file cannot be decoded, so callers can bail out
	 * instead of passing a null image into resize(), which is a fatal error
	 * on PHP 8.
	 */
	public function load($filename) 
	{  
		$this->image = null;
		$image_info = @getimagesize($filename);
		if( $image_info === false )
		{
			return false;
		}
		$this->image_type = $image_info[2];
		if( $this->image_type == IMAGETYPE_JPEG )
		{   
			$this->image = imagecreatefromjpeg($filename);
		} 
		elseif( $this->image_type == IMAGETYPE_GIF )
		{   
			$this->image = imagecreatefromgif($filename);
		} 
		elseif( $this->image_type == IMAGETYPE_PNG ) 
		{ 
			$this->image = imagecreatefrompng($filename);
		}
		// Animated WebP cannot be decoded by GD; imagecreatefromwebp()
		// returns false there and the guard below reports it as unreadable.
		elseif( defined('IMAGETYPE_WEBP') && $this->image_type == IMAGETYPE_WEBP
			&& function_exists('imagecreatefromwebp') )
		{
			$this->image = @imagecreatefromwebp($filename);
		}
		if( !$this->image )
		{
			$this->image = null;
			return false;
		}
		return true;
	}
	public function saveImage($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null)
	{  
		if( $image_type == IMAGETYPE_JPEG ) { imagejpeg($this->image,$filename,$compression);
		} 

		elseif( $image_type == IMAGETYPE_GIF ) {   imagegif($this->image,$filename);
		} 
		elseif( $image_type == IMAGETYPE_PNG ) 
		{ 
			imagepng($this->image,$filename);
		} 
		if( $permissions != null)
		{  
			chmod($filename,$permissions); 
		}
	}
	public function output($image_type=IMAGETYPE_JPEG)
	{ 
		if( $image_type == IMAGETYPE_JPEG )
		{ 
			imagejpeg($this->image); 
		} 
		elseif( $image_type == IMAGETYPE_GIF )
		{   
			imagegif($this->image);
		} 
		elseif( $image_type == IMAGETYPE_PNG )
		{  
			imagepng($this->image);
		}
	}
	public function getWidth() 
	{   
		return imagesx($this->image);
	}
	public function getHeight()
	{ 
		return imagesy($this->image); 
	}
	public function resizeToHeight($height)
	{ 
		$ratio = $height / $this->getHeight();
		$width = $this->getWidth() * $ratio;
		$this->resize($width,$height); 
	}  
	public function resizeToWidth($width)
	{
		$ratio = $width / $this->getWidth();
		$height = $this->getheight() * $ratio; 
		$this->resize($width,$height); 
	}  
	public function scale($scale) 
	{
		$width = $this->getWidth() * $scale/100;
		$height = $this->getheight() * $scale/100;
		$this->resize($width,$height);
	}   
	public function resize($width,$height)
	{ 
		$new_image = imagecreatetruecolor($width, $height);
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $new_image;
	}  
} 
	
?> 