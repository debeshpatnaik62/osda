<?php
	/* ================================================
	File Name         	: addStoryInner.php
	Description		: This page is used to add success story details.
	Developed By		: T Ketaki Debadarshini
	Developed On		: 17-Sep-2016
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsStory
	Functions Used		: readTopic(),addUpdateTopic(),
	==================================================*/	
	include_once( CLASS_PATH.'clsStory.php');
	$objStory           = new clsStory;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
        $strclick           =($id>0)?"window.location.href='". APP_URL."viewStories/".$glId."/".$plId."';":"$('#userImage').hide();";
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
        $explPriv      = $objStory->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewStories/".$glId."/".$plId. "'</script>"; 
        
        
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result              = $objStory->readStory($id);
           $strName             = $result['strName']; 
           $strNameO            = $result['strNameO'];
           $strSnippet          = $result['strSnippet'];
           $strSnippetO         = $result['strSnippetO'];  
           $strDescription      = $result['strDescription'];  
           $strFileName         = $result['strFileName'];
           $strDescriptionO     = $result['strDescriptionO'];
           $strPlace            = $result['strPlace'];
           $strPlaceO           = $result['strPlaceO'];
           $intDistrictId        = $result['intDistrictId'];            
           $intInstituteId       = $result['intInstituteId']; 
           $strNameAlias          = $result['strNameAlias'];
           $strDesignation      = $result['strDesignation'];
           $strDesignationO     = $result['strDesignationO'];
           $strEmployer         = $result['strEmployer'];  
           $strEmployerO        = $result['strEmployerO'];  
           
           $intStatus           = $result['intStatus'];  
           
           $redirectLoc         =  APP_URL."viewStories/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result              = $objStory->addUpdateStory($id);
           $outMsg              = $result['msg']; 
           $flag                = $result['flag'];
           
           $strName             = $result['strName']; 
           $strNameO            = $result['strNameO'];
           $strSnippet          = $result['strSnippet'];
           $strSnippetO         = $result['strSnippetO'];  
           $strDescription      = $result['strDescription'];  
           $strFileName         = $result['strFileName'];
           $strDescriptionO     = $result['strDescriptionO'];
           $strPlace            = $result['strPlace'];
           $strPlaceO           = $result['strPlaceO'];
           
            $intDistrictId        = $result['intDistrict'];            
           $intInstituteId        = $result['intInstitute']; 
           $strNameAlias          = $result['strNameAlias'];
           
           $strDesignation      = $result['strDesignation'];
           $strDesignationO     = $result['strDesignationO'];
           $strEmployer         = $result['strEmployer'];  
           $strEmployerO        = $result['strEmployerO'];  
           
           if($flag==0 && $id>0)
            $redirectLoc	=  APP_URL."viewStories/".$glId."/".$plId;  
           else if($flag==0 && $id==0)  
            $redirectLoc	=  APP_URL."viewStories/".$glId."/".$plId;
           
	}
       
?>