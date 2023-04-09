<?php 
include $_SERVER['DOCUMENT_ROOT'].'/'.'OSDA/'."phpqrcode/qrlib.php";
$decode = $_REQUEST['text'];
$ecc = 'H';
$pixel_size = 20;
$frame_size = 5;
$fileName2           = 'QR_'.$decode.'.png';
$url            = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$details        = parse_url($url);
$dir            = explode("/",$details["path"]);
@define('DEV_ENV', 'D');
$dirName        = (DEV_ENV=='D')? $dir[1]:'';
define('APP_PATH',$_SERVER['DOCUMENT_ROOT'] .'/'.$dirName.'/'.'Application/');
$file = APP_PATH."uploadDocuments/QR/".$fileName2;
//return $file;
if(!empty($decode)){
	// create a QR Code with this text and display it
    QRcode::png($decode, $file, $ecc, $pixel_size, $frame_size); 
}else{
	QRcode::png('Proxy');
}
echo "success"; exit;
?>