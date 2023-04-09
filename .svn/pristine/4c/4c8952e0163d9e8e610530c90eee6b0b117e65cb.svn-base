<?php
	/* ================================================
	File Name       : addSkillBannerInner.php
	Description		  : This page is used to add banner Images.
	Developed By		: Rahul Kumar Saw
	Developed On		: 27-July-2022
	Update History		:
	<Updated by>		<Updated On>		<Remarks>
     
	Class Used		: clsSkillBanner
	Functions Used		: readSkillBanner(),addUpdateSkillBanner(),
	==================================================*/	
	include_once( CLASS_PATH.'clsSkillBanner.php');
	$objSkillBanner      = new clsSkillBanner;	
  $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
  $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
  $strclick       = ($id>0)?"window.location.href='". APP_URL."viewSkillBanner/".$glId."/".$plId. "';":"$('#userImage').hide();";
	//========== Default variable ===============	
	$flag               = 0;  
  $errFlag            = 0;
	$outMsg             = '&nbsp;';	
  $intCategory        = 0;
  $intType         = 0;
  $intLinkType        = 1;
 //========== Permission ===============	
  $glId          = $_REQUEST['GL'];
  $plId          = $_REQUEST['PL'];
  $pageName      = $_REQUEST['PAGE'].'.php';
  $userId        = $_SESSION['adminConsole_userID'];   
  $explPriv      = $objSkillBanner->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
  $noAdd         = $explPriv['add'];

  if($noAdd == 1 && $id==0)
     echo "<script>location.href = '".APP_URL."viewSkillBanner/".$glId."/".$plId. "'</script>"; 

	
        
  //=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
     //============ Read value for updation ===========	
     $result           = $objSkillBanner->readSkillBanner($id);
     $strCaption       = htmlspecialchars_decode($result['strCaption'],ENT_QUOTES);  
     $strDescription   = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
     $strCaptionH       = htmlspecialchars_decode($result['strCaptionH'],ENT_QUOTES);  
     $strDescriptionH   = $result['strDescriptionH'];
     $flag             = $result['flag'];
     $strFileName      =  $result['strFileName'];
     $intCategory      = $result['intCategory'];
     $intType      = $result['intType'];
     $intModule      = $result['intModule'];
     if($intType==1)
      $strAudio      = $result['strThumbFileName'];
     else if($intType==3)
      $strvideo      = $result['strThumbFileName'];
     
     $strEmbedCode      = $result['strEmbedurl'];
     $intLinkType = $result['intVideolinktype'];
     $redirectLoc =  APP_URL."viewSkillBanner/".$glId."/".$plId;
	}
        
  //============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           
     $result          = $objSkillBanner->addUpdateSkillBanner($id);
     $outMsg          = $result['msg']; 
     $flag            = $result['flag'];
     $strCaption     = htmlspecialchars_decode($result['strCaption'],ENT_QUOTES);  
     $strDescription     = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
     $strFileName   =  $result['strFileName'];
     $intCategory      = $result['intCategory'];
     $intModule      = $result['intModule'];
    
     if($flag==0 && $id>0)
      $redirectLoc	=  APP_URL."viewSkillBanner/".$glId."/".$plId;  
     else if($flag==0 && $id==0)  
        $redirectLoc	=  APP_URL."viewSkillBanner/".$glId."/".$plId;
	}
       
?>