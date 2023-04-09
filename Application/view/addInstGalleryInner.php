<?php
  /* ================================================
		File Name         	: addInstGalleryInner.php
		Description		    : This is used for Manage Institute Gallery.
		Developed By		: Arpita Rath
		Developed On		: 27-03-2017
		Update History		:
		<Updated by>		<Updated On>		<Remarks>

		Class Used		    : clsInstGallery
		Functions Used		: readInstGal(),addUpdateInstGal(),
	==================================================*/ 
	   include_once(CLASS_PATH.'clsInstGallery.php');

    //========== create object ==================//	   
            $objInstGal         = new  clsInstGallery;
            $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
            $strSubmit          = ($id>0)?'Update':'Submit';
            $strReset           = ($id>0)?'Cancel':'Reset';
            $strTab             = ($id>0)?'Edit':'Add';
            $strclick           = ($id>0)?"window.location.href='". APP_URL."viewInstGallery/".$glId."/".$plId."';":"$('.userImage,.uploadConf').hide();$('.hdnImageFile').val('');";

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

            if($noAdd == 1 && $id==0)
           	 echo "<script>location.href = '".APP_URL."viewInstGallery/".$glId."/".$plId. "'</script>"; 
  //=========== For editing ======================
		if(isset($_REQUEST['ID']))
		{
	           
	        //============ Read value for updation ===========	
	           $result           = $objInstGal->readInstGal($id);   	          
	           $intDist          = $result['intDist'];
	           $intInst          = $result['intInst'];
	           $strCaptionE      = $result['strCaptionE'];
	           $strCaptionO      = $result['strCaptionO'];
	           $strFileDocument  = $result['strFileDocument'];
	           $strDescE         = $result['strDescE'];
	           $strDescO         = $result['strDescO'];

	           $redirectLoc      =  APP_URL."viewInstGallery/".$glId."/".$plId;
		}          

//============ Button Submit ===================
		if(isset($_POST['btnSubmit']))
		{
	           $result          = $objInstGal->addUpdateInstGal($id);
	           $outMsg          = $result['msg']; 
	           $flag            = $result['flag'];
	           $intDist         = $result['intDist'];
	           $intInst         = $result['intInst'];
	           $strCaptionE     = $result['strCaptionE'];
	           $strCaptionO     = $result['strCaptionO'];
	           $strDescE        = $result['strDescE'];
	           $strDescO        = $result['strDescO'];
	           
	           if($flag==0 && $id>0)
	            $redirectLoc	=  APP_URL."viewInstGallery/".$glId."/".$plId;  
	           else if($flag==0 && $id==0)  
	              $redirectLoc	=  APP_URL."viewInstGallery/".$glId."/".$plId;
	           
		}		
?>