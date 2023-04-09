<?php
$adminConsole_Privilege         = $_SESSION['adminConsole_Privilege'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title><?php echo TITLE;?></title>
<meta name="description" content="overview &amp; stats">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<!-- bootstrap & fontawesome -->

<link rel="stylesheet" href="<?php echo APP_URL;?>css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- text fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300">
<!-- ace styles -->
<link rel="stylesheet" href="<?php echo APP_URL;?>css/ace.min.css">
<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php //echo APP_URL;?>css/ace-part2.min.css" />
		<![endif]-->
<link rel="stylesheet" href="<?php echo APP_URL;?>css/ace-skins.min.css">
<link rel="stylesheet" href="<?php echo APP_URL;?>css/ace-rtl.min.css">
<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php //echo APP_URL;?>css/ace-ie.min.css" />
		<![endif]-->
<!-- custom styles -->
<link href="<?php echo APP_URL;?>css/custom.css" rel="stylesheet">
<!-- ace settings handler -->

<script src="<?php echo APP_URL;?>js/jquery.min.js"></script>

<script src="<?php echo APP_URL;?>js/ace-extra.min.js"></script>
<script src="<?php echo APP_URL;?>js/bootstrap.min.js"></script>
<!-- extra custom script -->
<script src="<?php echo APP_URL;?>js/custom.js"></script>
<script src="<?php echo APP_URL;?>js/loadComponent.js"></script>
<!-- <script src="<?php// echo APP_URL;?>js/clock.js"></script> -->
<script src="<?php echo APP_URL;?>js/loadAjax.js"></script>
 <script type="text/javascript" src="<?php echo SITE_URL;?>js/AprantDynamic.js" ></script>
  <link href="<?php echo SITE_URL; ?>css/oriya.css" rel="stylesheet">

<script>
	$(document).ready(function () {
		dateTime('clock');
		$('form').find('.radio,input[type=text],textarea,select').not('.date-picker').filter(':visible:first').focus();
		$('form').find('input[type=text],textarea').attr('autocomplete','off'); 
                getLogo();
		$('.userSetting').click(function(){
			$('.user-menu').toggle();
                          /* For home page logo */
                     
		});   

		
	});
	var splArr 	= [ "'", "<", ">", "%", "--" ];
	function viewAlert(msg, ctrlId,redLoc)
	{		
		$('#btnAlertOk').off('click');
		if(typeof(ctrlId)=='undefined')
		{
			ctrlId	= '';
		}
		if(typeof(redLoc)=='undefined')
		{
			redLoc	= '';
		}
		$('#alertModal').modal({backdrop: 'static', keyboard: false});
		$('.alertMessage').html(msg);
		$('#btnAlertOk').on('click',function(){
			if(ctrlId !='')
			{
				$('#'+ctrlId).focus();
			}
			if(redLoc!='')
			{
				window.location.href =redLoc;
			}
		});
		
	}
	function confirmAlert(msg)
	{
		$('#confirmModal').modal({backdrop: 'static', keyboard: false});
		$('.confirmMessage').html(msg);

	}

  function confirmAlert2(msg,href)
  {
    $('#confirmModal').modal({backdrop: 'static', keyboard: false});
    $('.confirmMessage').html(msg);
    $('#btnConfirmOk').attr('href',href);
    $('#btnConfirmOk').removeAttr('data-dismiss');
    return false;
  }

</script>
</head>
<body class="no-skin">
    <form class="form-horizontal" role="form" name="frmOGP" id="frmOGP" method="post" enctype="multipart/form-data" autocomplete="off">


<div id="navbar" class="navbar navbar-default navbar-fixed-top">
  <script type="text/javascript">
	try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>
  <div class="navbar-container" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler"> <span class="sr-only">Toggle sidebar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    
    <div class="navbar-header pull-left" id="header"> <a href="<?php echo APP_URL;?>dashboard" class="navbar-brand" title="OSDA">  </a>
    <div class="pull-left text_logo" >   
        <h1 class="logo"> <span id="homePageLogo" ></span>
      </h1>
    </div> </div>
    <!-- language Div-->

        <!-- language div End-->
    <div class="navbar-buttons navbar-header pull-right" role="navigation" style="margin-top:15px;">
       
       <ul class="nav ace-nav settingNav">   
    
        <li class="userSetting">
            <a data-toggle="dropdown" href="javascript: void(0);" class="dropdown-toggle">
               <?php
             
                if($_SESSION['userImage']=='')
                {
               ?>
                <img class="nav-user-photo" src="<?php echo APP_URL;?>img/noPhptoThumbnail.jpg" alt="Profile Photo">
             <?php
                }
              else
               {
             ?>
                 <img class="nav-user-photo" src="<?php echo APP_URL.'uploadDocuments/UserProfile/'.$_SESSION['userImage'];?>" alt="Profile Photo">
              <?php
                }
              ?>
         <span class="user-info"> 
		Welcome <?php echo $_SESSION['adminConsole_UserName']; ?>	

      <i class="ace-icon fa fa-caret-down"></i>
		
         </span> 
         </a>
        
          <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">           
              
              <li> <a href="javascript:void(0);"  onclick="goToPage('<?php echo APP_URL;?>changePassword',0,0,'Change Password','');"> <i class="ace-icon fa fa-key"></i> Change Password </a> </li>
              <li class="divider"></li>
              <li> <a href="<?php echo APP_URL;?>home"> <i class="ace-icon fa fa-power-off"></i> Logout </a> </li>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /.navbar-container -->
</div>

<div class="main-container" id="main-container">
     <input type="hidden" name="hdnPrevSessionId" id="hdnPrevSessionId" value="<?php echo session_id(); ?>" />
    
    <script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>
    <?php include('includes/left_panel.php'); ?>
  <div class="main-content">
  <?php include('includes/navigation.php'); ?>
  
  