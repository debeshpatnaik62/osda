<?php
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');   
header("X-XSS-Protection: 1; mode=block");
// Prevents javascript XSS attacks aimed to steal the session ID
//  ini_set('session.cookie_secure',1);



// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
  ini_set('session.use_only_cookies', 1);
	include_once("controller/controller.php");	
	$controller = new Controller();
        //exit('123');
?>