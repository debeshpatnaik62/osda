<?php
	/* ================================================
	File Name         	: addSkillCategoryInner.php
	Description		      : This page is used to add Skill Category.
	Developed By		: Rahul Kumar Saw
	Developed On		: 22-June-2022
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsSkillCategory
	Functions Used		: 
	==================================================*/	
	include_once( CLASS_PATH.'clsSkill.php');
	$objGalleryCat      = new clsSkillCategory;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewSkillCategory/".$glId."/".$plId. "';":"";
	//========== Default variable ===============	
	$flag               = 0;  
        $errFlag            = 0;
	$outMsg             = '&nbsp;';	
        $intStatus          = 2;
       //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objGalleryCat->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewSkillCategory/".$glId."/".$plId. "'</script>"; 
	
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result              = $objGalleryCat->readSkillCategory($id);
           $strCategory         = $result['strCategory'];  
           $intCattype          = $result['intCattype'];  
           $strDescription      = $result['strDescription'];
           
           $strCategoryO        = $result['strCategoryO'];  
           $strDescriptionO     = $result['strDescriptionO'];
           
           $intStatus            = $result['intStatus'];
            $redirectLoc	 =  APP_URL."viewSkillCategory/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result          = $objGalleryCat->addUpdateSkillCategory($id);
           $outMsg          = $result['msg']; 
           $flag            = $result['flag'];
           $strCategory     = htmlspecialchars_decode($result['strCategory'],ENT_QUOTES);  
           $strDescription  = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
           $intStatus       = $result['intStatus'];
           
           if($flag==0 && $id>0)
            $redirectLoc	=  APP_URL."viewSkillCategory/".$glId."/".$plId."/".$id;  
           else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewSkillCategory/".$glId."/".$plId;
            
	}
       
?>