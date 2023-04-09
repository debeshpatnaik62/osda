<?php 
include $_SERVER['DOCUMENT_ROOT'].'/'.'OSDA/'."phpqrcode/qrlib.php";
$decode = $_REQUEST['text'];
if(!empty($decode)){
	// create a QR Code with this text and display it
    QRcode::png($decode);
}else{
	QRcode::png('Proxy');
}
?>