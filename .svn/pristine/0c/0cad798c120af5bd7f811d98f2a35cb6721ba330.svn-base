<?php
/* ================================================
        File Name             : addNanoUnicornInner.php
        Description	      : This is used add Nano Unicorn Details.
        Author Name           : Ashis kumar Patra
        Date Created          : 15-Feb-2019
        Devloped On           : 15-Feb-2019
        Devloped By           : Ashis kumar Patra
        Update History	      : <Updated by>		<Updated On>		<Remarks>
       Class Used             : clsNanoUnicorn
      Functions Used          : readNanoUnicornDetails(),addUpdateNanoUnicornDetails()
 ==================================================*/
    
	//========== create object of clsNanounicorn class===============	
        include_once( CLASS_PATH.'clsNanoUnicorn.php');
       // print_r($_REQUEST);exit;
	$objNanounicorn  = new clsNanoUnicorn;	
        $id             = (!empty($_REQUEST['ID']))?$_REQUEST['ID']:0;

        $strSubmit      = ($id>0)?'Update':'Submit';
	$strReset       = ($id>0)?'Cancel':'Reset';
	$strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewNanoUnicorn/".$glId."/".$plId. "';":"$('#userImage').hide();";
        //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objNanounicorn->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewNanoUnicorn/".$glId."/".$plId. "'</script>"; 
	
	//========== Default variable ===============				
	
	$flag            = 0;  
        $errFlag         = 0;
	$outMsg          = '';	
        /*$intPhilosophyId=0;
          $vchTitle=0;*/
        
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
            $btnValue	 = 'Update';
            $strTab	 = 'Edit';		

        //============ Read value for updation ===========	
            $result          = $objNanounicorn->readNanoUnicornDetails($id);
           // print_r($result);exit;
            $strTitle    =  htmlspecialchars_decode($result['strTitle'],ENT_QUOTES);  
            $strTitleO   =  htmlspecialchars_decode($result['strTitleO'],ENT_QUOTES);    
            $strImage    =  $result['strImage'];
            $strAudio    =  $result['strAudio'];
            $fileExt     =  pathinfo($strImage, PATHINFO_EXTENSION);
            $strDescription      =  htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
            $strDescriptionO     =  urldecode($result['strDescriptionO']);
            
             $redirectLoc	=  APP_URL."viewNanoUnicorn/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
       
           $result        =  $objNanounicorn->addUpdateNanoUnicornDetails($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag'];  
           
           if($flag==0 && $id>0)
              $redirectLoc	=  APP_URL."viewNanoUnicorn/".$glId."/".$plId;  
            else if($flag==0 && $id==0)  
                $redirectLoc	=  APP_URL."viewNanoUnicorn/".$glId."/".$plId;
           
	}
        ?>