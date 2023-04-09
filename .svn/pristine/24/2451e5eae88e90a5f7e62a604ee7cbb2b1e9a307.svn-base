<?php
    
	//========== create object of clsCareer class===============	
        include_once( CLASS_PATH.'clsCareer.php');
       // print_r($_REQUEST);exit;
	      $objCareer  = new clsCareer;	
        $id             = (!empty($_REQUEST['ID']))?$_REQUEST['ID']:0;

        $strSubmit      = ($id>0)?'Update':'Submit';
	      $strReset       = ($id>0)?'Cancel':'Reset';
	      $strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewCareer/".$glId."/".$plId. "';":"$('#userImage').hide();";
        //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objCareer->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewCareer/".$glId."/".$plId. "'</script>"; 
	
	//========== Default variable ===============				
	
	     $flag            = 0;  
       $errFlag         = 0;
	     $outMsg          = '';	
  
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
            $btnValue	 = 'Update';
            $strTab	   = 'Edit';		

        //============ Read value for updation ===========	
            $result      = $objCareer->readCareer($id);
            $strName     = htmlspecialchars_decode($result['strName'],ENT_QUOTES);    
            $strNameO    = htmlspecialchars_decode($result['strNameO'],ENT_QUOTES);      
            $strTickerName = htmlspecialchars_decode($result['strTickerName'],ENT_QUOTES);      
            $strTickerNameO = htmlspecialchars_decode($result['strTickerNameO'],ENT_QUOTES);      
            $strExternal   = htmlspecialchars_decode($result['strExternal'],ENT_QUOTES);      
            $strDocument = $result['strDocument'];
            $strOpenDate = $result['strOpenDate'];
            $strEndDate  = $result['strEndDate'];
            $fileExt     = pathinfo($strDocument, PATHINFO_EXTENSION);
            $redirectLoc	 =  APP_URL."viewCareer/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{

           $result        = $objCareer->addUpdateCareer($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag'];  
          
           if($flag==0 && $id>0)
              $redirectLoc	=  APP_URL."viewCareer/".$glId."/".$plId."/".$id;  
            else if($flag==0 && $id==0)  
                $redirectLoc	=  APP_URL."viewCareer/".$glId."/".$plId;
           
	}
        ?>