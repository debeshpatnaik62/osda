<?php
	/* ================================================
	File Name         	: addDistrictInner.php
	Description		: This page is used to add disrtict details
	Developed By		: T Ketaki Debadarshini
	Developed On		: 21-Sept-2016
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsDistrict
	Functions Used		: readDistrict(),addUpdateDistrict(),
	==================================================*/	
	include_once( CLASS_PATH.'clsDistrict.php');
	$objDist            = new clsDistrict;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
        $strclick           =($id>0)?"window.location.href='". APP_URL."viewDistrict';":"";
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
        $explPriv      = $objDist->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewDistrict'</script>";   
       
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result              = $objDist->readDistrict($id);
           
           $strDistrict         = $result['strDistrict'];  
           $strDescription      = $result['strDescription'];
           $strDistrictO        = $result['strDistrictO'];  
           $strDescriptionO     = $result['strDescriptionO'];
           
           $redirectLoc         =  APP_URL."viewDistrict/".$id;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result              = $objDist->addUpdateDistrict($id);
           $outMsg              = $result['msg']; 
           $flag                = $result['flag'];
           
           $strDistrict         = $result['strDistrict'];  
           $strDescription      = $result['strDescription'];
           $strDistrictO        = $result['strDistrictO'];  
           $strDescriptionO     = $result['strDescriptionO'];
           
           if($flag==1 && $id>0){
           
		 $redirectLoc	=  APP_URL."viewDistrict/".$glId."/".$plId."/".$id;  
            }else if ($flag==1 && $id==0) {
                
            }else { $redirectLoc	=  APP_URL."viewDistrict/".$glId."/".$plId;}
        
	}
       
?>