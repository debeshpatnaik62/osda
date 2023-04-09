<?php
    /* ================================================
    File Name         	: addEmpDirectoryInner.php
    Description		: This page is used to add Employer Speaks details.
    Developed By	: T Ketaki Debadarshini
    Developed On	: 15-July-2017
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsEmpDirectory
    Functions Used	:  readMsgBoard, addUpdateMessage ,getPermission
    ==================================================*/	
	//========== create object of clsMsgBoard class===============	
        include_once( CLASS_PATH.'clsEmpDirectory.php');
        $objEmpDirectory        = new clsEmpDirectory;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	$strReset       = ($id>0)?'Cancel':'Reset';
	$strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewEmpDirectory/".$glId."/".$plId."';":"$('#userImage').hide();";
        //========== Permission ===============	
         $glId          = $_REQUEST['GL'];
         $plId          = $_REQUEST['PL'];
         $pageName      = $_REQUEST['PAGE'].'.php';
         $userId        = $_SESSION['adminConsole_userID'];   
         $explPriv      = $objEmpDirectory->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
         $noAdd         = $explPriv['add'];
     
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewEmpDirectory/".$glId."/".$plId. "'</script>"; 
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
            $result          = $objEmpDirectory->readEmpDirectory($id);
            
            $intDist            =  $result['intDistrictId'];
            $strName            =  htmlspecialchars_decode($result['vchEmployeeName'],ENT_QUOTES);
            $strNameO           =  htmlspecialchars_decode($result['vchEmployeeNameO'],ENT_QUOTES);    
            $strEmail           =  htmlspecialchars_decode($result['vchEmailId'],ENT_QUOTES);
            $strPhoneno         =  $result['vchPhoneno'];            
            $strMobileno        =  $result['vchMobileNo'];  
            $intType            =  $result['intEmpType']; 
            
            $redirectLoc	=  APP_URL."viewEmpDirectory/".$glId."/".$plId."/".$id;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result        =  $objEmpDirectory->addUpdateEmpDirectory($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
           
            $intDist            =  $result['intDist'];
            $strName            =  $result['strName'];
            $strNameO           =  $result['strNameO'];    
            $strEmail           =  $result['strEmail'];
            $strPhoneno         =  $result['strPhoneno'];            
            $strMobileno        =  $result['strMobileno']; 
            $intType            =  $result['intType'];  
            if($flag==0 && $id>0)
                $redirectLoc	=  APP_URL."viewEmpDirectory/".$glId."/".$plId."/".$id;  
            else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewEmpDirectory/".$glId."/".$plId;
         
	}
  ?>