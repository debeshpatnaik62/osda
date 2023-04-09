<?php
	/* ================================================
	File Name         	: addPanelInner.php
	Description		    : This page is used to add panel name
	Developed By		: Rahul Kumar Saw
	Developed On		: 04-Aug-2021
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used			: clsPanel
	==================================================*/	
	include(CLASS_PATH."clsPanel.php");
	$objPanel           = new clsPanel;	
    $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
    $strclick           =($id>0)?"window.location.href='". APP_URL."viewPanel/".$glId."/".$plId."';":"";
	//========== Default variable ===============	
	$flag               = 0;  
    $errFlag            = 0;
	$outMsg             = '';	
    $intStatus          = 2;
       //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];
        $explPriv      = $objPanel->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewPanel/".$glId."/".$plId."'</script>";   
       
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result        = $objPanel->readPanel($id);
           $strPanel     	= $result['strPanel'];    
           $strAddress  	= htmlspecialchars_decode($result['strAddress'],ENT_QUOTES);
           $levelId       =  $result['intLevel']; 
           $venue         =  $result['intVenue'];
            if($levelId=='L2')
            {
              $level = 2;
            }          
            else if($levelId=='L3')
            {
              $level = 3;
            }
            else
            {
              $level = 0;
            }
         
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result          = $objPanel->addUpdatePanel($id);
           $outMsg          = $result['msg']; 
           $flag            = $result['flag'];  
           $strPanel    	= htmlspecialchars_decode($result['strPanel'],ENT_QUOTES);  
           $strAddress  	= htmlspecialchars_decode($result['strAddress'],ENT_QUOTES);
           $level           =  $result['intLevel'];
           $venue           =  $result['intVenue'];
             if($flag==0 && $id>0)
	          $redirectLoc	=  APP_URL."viewPanel/".$glId."/".$plId."/".$id;  
	         else if($flag==0 && $id==0)  
	          $redirectLoc	=  APP_URL."viewPanel/".$glId."/".$plId;
        
	}
       
?>