<?php
  /* ================================================
		File Name         	: addEventGalleryInner.php
		Description		: This is used for Manage Event Gallery.
		Developed By		: Ashis kumar Patra
		Developed On		: 27-03-2017
		Update History		:
		<Updated by>		<Updated On>		<Remarks>

		Class Used              : clsEventGallery
		Functions Used		: readInstGal(),addUpdateInstGal(),
   *            Notes                   : intDist is used as event id on this module
	==================================================*/ 
	   include_once(CLASS_PATH.'clsEventVideoGallery.php');

    //========== create object ==================//	   
            $objInstGal         = new  clsEventGallery;
            $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
            $strSubmit          = ($id>0)?'Update':'Submit';
            $strReset           = ($id>0)?'Cancel':'Reset';
            $strTab             = ($id>0)?'Edit':'Add';
//            $strclick           = ($id>0)?"window.location.href='". APP_URL."viewEventGallery/".$glId."/".$plId."';":"$('.userImage,.uploadConf').hide();$('.hdnImageFile').val('');";

   //========== Default variable ===============	
	    $flag               = 0;  
            $errFlag            = 0;
	    $outMsg             = '';	
            $intInst            = 0;
  //======================= Permission ===========================*/
            $glId               = $_REQUEST['GL'];
            $plId               = $_REQUEST['PL'];
            $pageName           = $_REQUEST['PAGE'].'.php';
            $userId             = $_SESSION['adminConsole_userID'];
            $explPriv           = $objInstGal->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
            $noAdd              = $explPriv['add'];

//            if($noAdd == 1 && $id==0)
//           	 echo "<script>location.href = '".APP_URL."viewEventGallery/".$glId."/".$plId. "'</script>"; 
   

//============ Button Submit ===================
		if(isset($_POST['btnSubmit']))
		{
	           $result          = $objInstGal->addUpdateEventGal($id);
	           $outMsg          = $result['msg']; 
	           $flag            = $result['flag'];
	           $intEventId      = $result['intEventId'];
	           $strCaptionE     = $result['vchCaptionE'];
	           $strCaptionO     = $result['vchCaptionO'];
	           //$strDescE        = $result['strDescE'];
	          // $strDescO        = $result['strDescO'];
	           
//	           if($flag==0 && $id>0)
//	            $redirectLoc	=  APP_URL."viewEventGallery/".$glId."/".$plId;  
//	           else if($flag==0 && $id==0)  
//	              $redirectLoc	=  APP_URL."viewEventGallery/".$glId."/".$plId;
	           
		}		
?>