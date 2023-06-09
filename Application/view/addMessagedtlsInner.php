<?php
    /* ================================================
    File Name         	: addMessagedtlsInner.php
    Description		: This page is used to add Employer Speaks details.
    Developed By	: T Ketaki Debadarshini
    Developed On	: 17-Sept-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsMsgBoard
    Functions Used	:  readMsgBoard, addUpdateMessage ,getPermission
    ==================================================*/	
	//========== create object of clsMsgBoard class===============	
        include_once( CLASS_PATH.'clsMsgBoard.php');
	$objMsg         = new clsMsgBoard;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	$strReset       = ($id>0)?'Cancel':'Reset';
	$strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewMessagedetails/".$glId."/".$plId."';":"$('#userImage').hide();";
        //========== Permission ===============	
         $glId          = $_REQUEST['GL'];
         $plId          = $_REQUEST['PL'];
         $pageName      = $_REQUEST['PAGE'].'.php';
         $userId        = $_SESSION['adminConsole_userID'];   
         $explPriv      = $objMsg->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
         $noAdd         = $explPriv['add'];
     
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewMessagedetails/".$glId."/".$plId. "'</script>"; 
	//========== Default variable ===============	
	$flag            = 0;  
        $errFlag         = 0;
	$outMsg          = '&nbsp;';	
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
            $btnValue	 = 'Update';
            $strTab	 = 'Edit';		

            //============ Read value for updation ===========	
            $result             = $objMsg->readMsgBoard($id);
            $intDist             =  $result['distId'];
            $intInst            =  $result['instId'];
            $strHeadLineE       =  $result['strHeadLineE'];    
            $strHeadLineO       =  $result['strHeadLineO'];
            $strFileName        =  $result['strFileName'];            
            $strDesignationE    =  $result['strDesignationE'];    
            $strDesignationO    =  $result['strDesignationO'];
            $strOrgE            =  $result['strOrgE'];
            $strOrgO            =  $result['strOrgO'];           
            $strDetailE         =  $result['strDetailE'];
            $strDetailO         = $result['strDetailO'];
            $redirectLoc	=  APP_URL."viewMessagedetails/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result        =  $objMsg->addUpdateMessage($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
           
            if($flag==0 && $id>0)
            $redirectLoc	=  APP_URL."viewMessagedetails/".$glId."/".$plId;  
           else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewMessagedetails/".$glId."/".$plId;
         
	}
  ?>