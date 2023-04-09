<?php
	/* ================================================
	File Name         	: addRegistrationPhaseInner.php
	Description		    : This page is used to add Registration Phase
	Developed By		: Rahul Kumar Saw
	Developed On		: 31-May-2022
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used			: clsRegistration
	==================================================*/	
	include(CLASS_PATH."clsSkillCompetition.php");
	$objRegistartion    = new clsSkillCompetition;	
    $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
    $strclick           =($id>0)?"window.location.href='". APP_URL."viewRegistrationPhase/".$glId."/".$plId."';":"";
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
        $explPriv      = $objRegistartion->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewRegistrationPhase/".$glId."/".$plId."'</script>";   
       
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result          = $objRegistartion->readRegistrationPhase($id);
           $strPhase     	= $result['strPhase'];    
           $txtYear  	    = $result['txtYear'];
         
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result          = $objRegistartion->addUpdateRegistartionPhase($id);
           $outMsg          = $result['msg']; 
           $flag            = $result['flag'];  
           $strPhase    	= htmlspecialchars_decode($result['strPhase'],ENT_QUOTES);  
           $txtYear  	    = htmlspecialchars_decode($result['txtYear'],ENT_QUOTES);
           
             if($flag==0 && $id>0)
	          $redirectLoc	=  APP_URL."viewRegistrationPhase/".$glId."/".$plId."/".$id;  
	         else if($flag==0 && $id==0)  
	          $redirectLoc	=  APP_URL."viewRegistrationPhase/".$glId."/".$plId;
        
	}
       
?>