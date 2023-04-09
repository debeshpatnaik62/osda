<?php
    /* ================================================
    File Name         	  : addSkillEventInner.php
    Description		      : This is used for add news details for Events Only.
    Designed By		      :
    Designed On		      : 
    Devloped By           : Rahul Kumar Saw
    Devloped On           : 13-Dec-2021
    Update History        : <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsSkillEvent
    Functions Used	: readSkillEvent(),addUpdateSkillEvent(
    ==================================================*/	
    //========== create object of clsSkillEvent class===============	
    include_once( CLASS_PATH.'clsSkillEvent.php');
    $objEvent        = new clsSkillEvent;	
    $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit      = ($id>0)?'Update':'Submit';
    $strReset       = ($id>0)?'Cancel':'Reset';
    $strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewSkillEvent/".$glId."/".$plId. "';":"$('#userImage').hide();clearEditors();";
    //========== Permission ===============	
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = $_SESSION['adminConsole_userID'];   
    $explPriv      = $objEvent->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewSkillEvent/".$glId."/".$plId. "'</script>";  

    //========== Default variable ===============				
    $intWinStatus    = 1;
    $flag            = 0;  
    $errFlag         = 0;
    $intLinkType     = 1;
    $intTempletType  = 1;	
    $outMsg          = '';	
    //=========== For editing ======================
    if(isset($_REQUEST['ID']))
    {
        $btnValue	 = 'Update';
        $strTab          = 'Edit';		

        //============ Read value for updation ===========	
        $result          = $objEvent->readSkillEvent($id);
        $strHeadLineE    =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
        $strHeadLineH    =  htmlspecialchars_decode($result['strHeadLineH'],ENT_QUOTES);

        $strFileName     =  $result['strFileName'];
        $fileExt         = pathinfo($strFileName, PATHINFO_EXTENSION);

        $strDetailE      =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES);
        $strDetailH      =  htmlspecialchars_decode($result['strDetailH'],ENT_QUOTES);
        $strStratDate    =  $result['strstartDate']; 
        $strEndDate      =  $result['strendDate'];
        
        $redirectLoc	 =  APP_URL."viewSkillEvent/".$glId."/".$plId;
    }

    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
    {
       $result              = $objEvent->addUpdateSkillEvent($id);
       $outMsg              =  $result['msg']; 
       $flag                =  $result['flag'];          
       $strHeadLineE        =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
       $strHeadLineH        =  htmlspecialchars_decode($result['strHeadLineH'],ENT_QUOTES);
       $strFileName         =  $result['strFileName'];
       $strDetailE          =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES);
       $strDetailH          =  htmlspecialchars_decode($result['strDetailH'],ENT_QUOTES);
       $strStratDate        =  $result['strStartDate']; 
       $strEndDate          =  $result['strEndDate'];
       
       if($flag==0 && $id>0)
        $redirectLoc	=  APP_URL."viewSkillEvent/".$glId."/".$plId."/".$id;  
       else if($flag==0 && $id==0)  
          $redirectLoc	=  APP_URL."viewSillEvent/".$glId."/".$plId;
    }
?>