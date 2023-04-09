<?php
	/* ================================================
	File Name         	: addSkillInner.php
	Description		: This page is used to add Skill Name.
	Developed By		: Rahul Kumar Saw
	Developed On		: 22-June-2022
	Update History		:
	<Updated by>		<Updated On>		<Remarks>
     
	Class Used		: clsSkill
	Functions Used		: 
	==================================================*/	
	include_once( CLASS_PATH.'clsSkill.php');
	$objGallery      = new clsSkill;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
      	$strReset           =($id>0)?'Cancel':'Reset';
      	$strTab             =($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewSkill/".$glId."/".$plId. "';":"$('#userImage').hide();";
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
        $explPriv      = $objGallery->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
        if($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewSkill/".$glId."/".$plId. "'</script>"; 

	
        
        //=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result           = $objGallery->readSkill($id);
           $strCaption       = htmlspecialchars_decode($result['strCaption'],ENT_QUOTES);  
           $strDescription   = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
           $strCaptionH       = htmlspecialchars_decode($result['strCaptionH'],ENT_QUOTES);  
           $strDescriptionH   = $result['strDescriptionH'];
           $flag             = $result['flag'];
           $intCategory      = $result['intCategory'];
           $redirectLoc =  APP_URL."viewSkill/".$glId."/".$plId;
	}
        
        //============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           
           $result          = $objGallery->addUpdateSkill($id);
           $outMsg          = $result['msg']; 
           $flag            = $result['flag'];
           $strCaption      = htmlspecialchars_decode($result['strCaption'],ENT_QUOTES);  
           $strCaptionH     = htmlspecialchars_decode($result['strCaptionH'],ENT_QUOTES);  
           $strDescription  = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
           $strDescriptionH = htmlspecialchars_decode($result['strDescriptionH'],ENT_QUOTES);
           $intCategory     = $result['intCategory'];
          
           if($flag==0 && $id>0)
            $redirectLoc	=  APP_URL."viewSkill/".$glId."/".$plId;  
           else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewSkill/".$glId."/".$plId;
	}
       
?>