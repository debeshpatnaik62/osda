
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<?php
require SITE_PATH.'controller/classBind.php';
 
/*class clsMsgBoard {
*/	$objStory     = new clsClassPortal;	

	$result = $objStory-> getSuccess();
	//}
?>