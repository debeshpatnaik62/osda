<?php
	/* ================================================
	File Name         	: addPanelMemberInner.php
	Description		    : This page is used to add panel member details
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
    $strclick           =($id>0)?"window.location.href='". APP_URL."viewPanelMember/".$glId."/".$plId."';":"";
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
        $intVenue      = 0;
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewPanelMember/".$glId."/".$plId."'</script>";   
       
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result          = $objPanel->readPanelMember($id);
           $strPanel    	  = htmlspecialchars_decode($result['strPanel'],ENT_QUOTES);  
           $strPanelMember 	= htmlspecialchars_decode($result['strPanelMember'],ENT_QUOTES);
           $strMobile    	  = htmlspecialchars_decode($result['strMobile'],ENT_QUOTES);
           $strEmailId  	  = htmlspecialchars_decode($result['strEmailId'],ENT_QUOTES);
           $strCollege    	= htmlspecialchars_decode($result['strCollege'],ENT_QUOTES);
           $strTrade    	  = htmlspecialchars_decode($result['strTrade'],ENT_QUOTES);
           $strDescription  = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
           $experience      = htmlspecialchars_decode($result['experience'],ENT_QUOTES);
           $weightage       = htmlspecialchars_decode($result['weightage'],ENT_QUOTES);
           $strLocation 	  = htmlspecialchars_decode($result['strLocation'],ENT_QUOTES);
           $levelId         =  $result['level'];
           $intVenue        = htmlspecialchars_decode($result['intVenue'],ENT_QUOTES);
           $resultSkill     =  $objPanel->readSkill($id);
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
           $result          = $objPanel->addUpdatePanelMember($id);
           $outMsg          = $result['msg']; 
           $flag            = $result['flag'];  
           $strPanel    	= htmlspecialchars_decode($result['intPanel'],ENT_QUOTES);  
           $strPanelMember 	= htmlspecialchars_decode($result['txtPanelMember'],ENT_QUOTES);
           $strMobile    	= htmlspecialchars_decode($result['txtPanelMobile'],ENT_QUOTES);
           $strEmailId  	= htmlspecialchars_decode($result['txtPanelEmail'],ENT_QUOTES);
           $strCollege    	= htmlspecialchars_decode($result['txtPanelCollege'],ENT_QUOTES);
           $strTrade    	= htmlspecialchars_decode($result['txtPanelTrade'],ENT_QUOTES);
           $strDescription 	= htmlspecialchars_decode($result['txtDescription'],ENT_QUOTES);
           $experience      = htmlspecialchars_decode($result['txtYoexperience'],ENT_QUOTES);
           $weightage       = htmlspecialchars_decode($result['txtWeightage'],ENT_QUOTES);
           $strLocation     = htmlspecialchars_decode($result['txtLocation'],ENT_QUOTES);  
           $level           = htmlspecialchars_decode($result['level'],ENT_QUOTES);  
           $intVenue        = htmlspecialchars_decode($result['intVenue'],ENT_QUOTES);  
           
         if($flag==0 && $id>0)
          $redirectLoc	=  APP_URL."viewPanelMember/".$glId."/".$plId."/".$id;  
         else if($flag==0 && $id==0)  
          $redirectLoc	=  APP_URL."viewPanelMember/".$glId."/".$plId;
        
	}
       
?>