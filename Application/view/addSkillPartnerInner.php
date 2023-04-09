<?php
    /* ================================================
    File Name         	: addSkillPartnerInner.php
    Description		: This page is used to add News Details.
    Developed By	: Rahul Kumar Saw
    Developed On	: 25-July-2022
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsSkillPartner
    Functions Used	: readSkillPartner(),addUpdateSkillPartner(
    ==================================================*/	
    include_once( CLASS_PATH.'clsSkillPartner.php');
    $objPartner     = new clsSkillPartner;	
    $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit      = ($id>0)?'Update':'Submit';
    $strReset       = ($id>0)?'Cancel':'Reset';
    $strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewSkillPartner/".$glId."/".$plId. "';":"$('#userImage').hide();clearEditors();";
    //========== Permission ===============	
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = $_SESSION['adminConsole_userID'];   
    $explPriv      = $objPartner->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];
    $intNewsType   =0;
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewSkillPartner/".$glId."/".$plId. "'</script>";  

    //========== Default variable ===============				
    $intWinStatus    = 1;
    $flag            = 0;  
    $errFlag         = 0;
    $intLinkType     = 1;
    $intTempletType  = 1;	
    	
    //=========== For editing ======================
    if(isset($_REQUEST['ID']))
    {
        $btnValue	 = 'Update';
        $strTab          = 'Edit';		

        //============ Read value for updation ===========	
        $result          = $objPartner->readSkillPartner($id);
        $strHeadLineE    =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
        $strHeadLineH    =  $result['strHeadLineH'];

        $strFileName     =  $result['strFileName'];
        $fileExt         = pathinfo($strFileName, PATHINFO_EXTENSION);
        $strDetailE      =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES);
        $strDetailH      =  $result['strDetailH']; 
        $strSource       =  $result['strSource'];
        $intNewsType     =$result['intCategoryId'];
        
        $redirectLoc	 =  APP_URL."viewSkillPartner/".$glId."/".$plId;
        
    }

    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
    {
       $result              = $objPartner->addUpdateSkillPartner($id);
       $outMsg              =  $result['msg']; 
       $flag                =  $result['flag'];
       $intNewsType         =  $result['intCategoryId'];
       $strHeadLineE        =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
       $strHeadLineH        =  htmlspecialchars_decode($result['strHeadLineH'],ENT_QUOTES);
       $strFileName         =  $result['strFileName'];
       $strDetailE          =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES); 
       $strDetailH          =  htmlspecialchars_decode($result['strDetailH'],ENT_QUOTES); 
       if($flag==0 && $id>0)
        $redirectLoc	=  APP_URL."viewSkillPartner/".$glId."/".$plId."/".$id;  
       else if($flag==0 && $id==0)  
          $redirectLoc	=  APP_URL."viewSkillPartner/".$glId."/".$plId;
    }
?>