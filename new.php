<?php
$isview = false;
$qq = $_POST["qq"];
if(isset($_POST["qq"])){
	$isview = true; 
}else{
	$isview = false;
}
if($isview){ ?> 

<?php
$dst_path = 'background.png';
$src_path = "http://q2.qlogo.cn/headimg_dl?bs=qq&dst_uin=" . $qq . "&spec=100";
$dst = imagecreatefromstring(file_get_contents($dst_path));
$src = imagecreatefromstring(file_get_contents($src_path));
list($src_w, $src_h) = getimagesize($src_path);
imagecopymerge($dst, $src, 200, 39, 0, 0, $src_w, $src_h, 100);
$thumb = imagecreatetruecolor(120, 80);
ImageCopyResized($thumb, $dst, 0, 0, 0, 0, 120, 80, 343, 229);
list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
header('Content-Type: image/png');
imagepng($thumb);
imagedestroy($dst);
imagedestroy($src);
imagedestroy($thumb);
?>


<?php }else{ ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="pragma" content="no-cache" /> 
<meta http-equiv="cache-control" content="no-cache" /> 
<meta http-equiv="expires" content="0" /> 
<title>Nyamoe丢锅图生成器 Beta v1.0</title> 
</head>

<body>
<form method="post" style="margin:0px;">背锅的QQ 
<input type="text" name="qq" /> <input type="submit" value="丢锅！" /> 
</form>  
</body> 
</html> 
<?php 
} ?>
