<?php
    
	//========== create object of clsPhilosophy class===============	
        include_once( CLASS_PATH.'clsPhilosophy.php');
       // print_r($_REQUEST);exit;
	$objPhilosophy  = new clsPhilosophy;	
        $id             = (!empty($_REQUEST['ID']))?$_REQUEST['ID']:0;

        $strSubmit      = ($id>0)?'Update':'Submit';
	$strReset       = ($id>0)?'Cancel':'Reset';
	$strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewPhilosophy/".$glId."/".$plId. "';":"$('#userImage').hide();";
        //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objPhilosophy->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewPhilosophy/".$glId."/".$plId. "'</script>"; 
	
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
            $result          = $objPhilosophy->readPhilosophy($id);
           // print_r($result);exit;
            $strTitle    =  htmlspecialchars_decode($result['strTitle'],ENT_QUOTES);  
            $strTitleO    =  htmlspecialchars_decode($result['strTitleO'],ENT_QUOTES);    
            $strTagline    =  $result['strTagline'];    
             $strTaglineO    =  $result['strTaglineO'];
      
             $strImage     =  $result['strImage'];
              $fileExt         = pathinfo($strImage, PATHINFO_EXTENSION);

            $strDescription      =  htmlspecialchars_decode(stripslashes($result['strDescription']),ENT_QUOTES);
            $strDescriptionO     =  htmlspecialchars_decode(stripslashes($result['strDescriptionO']),ENT_QUOTES);
            
             $redirectLoc	=  APP_URL."viewPhilosophy/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
        //
           $result        = $objPhilosophy->addUpdatePhilosophy($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag'];  
           
           if($flag==0 && $id>0)
              $redirectLoc	=  APP_URL."viewPhilosophy/".$glId."/".$plId;  
            else if($flag==0 && $id==0)  
                $redirectLoc	=  APP_URL."viewPhilosophy/".$glId."/".$plId;
           
	}
        ?>