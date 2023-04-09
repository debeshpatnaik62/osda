<?php
	/* ================================================
	File Name         	: addSkillInstituteInner.php
	Description		    : This page is used to add skill institute name
	Developed By		: Rahul Kumar Saw
	Developed On		: 20-Aug-2020
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsSkillMaster
	==================================================*/	
	include(CLASS_PATH."clsSkillMaster.php");
	$objInstitute      = new clsSkillMaster;	
    $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
    $strclick           =($id>0)?"window.location.href='". APP_URL."viewSkillInstitute/".$glId."/".$plId."';":"";
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
        $explPriv      = $objInstitute->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewSkillInstitute/".$glId."/".$plId."'</script>";   
       
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result          = $objInstitute->readSkillInstitute($id);
           $strDistrict     = $result['strDistrict'];  
           $strInstitute    = $result['strInstitute'];  
           $strDescription  = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
         
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result          = $objInstitute->addUpdateSkillInstitute($id);
           $outMsg          = $result['msg']; 
           $flag            = $result['flag'];
           $strDistrict     = $result['strDistrict'];  
           $strInstitute    = htmlspecialchars_decode($result['strInstitute'],ENT_QUOTES);  
           $strDescription  = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
           
             if($flag==0 && $id>0)
	          $redirectLoc	=  APP_URL."viewSkillInstitute/".$glId."/".$plId."/".$id;  
	         else if($flag==0 && $id==0)  
	          $redirectLoc	=  APP_URL."viewSkillInstitute/".$glId."/".$plId;
        
	}
       
?>