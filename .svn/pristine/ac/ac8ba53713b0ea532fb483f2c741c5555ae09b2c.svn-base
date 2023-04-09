<?php
    
	//========== create object of clsTestimonial class===============	
        include_once( CLASS_PATH.'clsTestimonial.php');
       // print_r($_REQUEST);exit;
	      $objTestimonial  = new clsTestimonial;	
        $id             = (!empty($_REQUEST['ID']))?$_REQUEST['ID']:0;

        $strSubmit      = ($id>0)?'Update':'Submit';
      	$strReset       = ($id>0)?'Cancel':'Reset';
      	$strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewTestimonial/".$glId."/".$plId. "';":"$('#userImage').hide();";
        //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objTestimonial->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewTestimonial/".$glId."/".$plId. "'</script>"; 
	
	//========== Default variable ===============				
	
	$flag            = 0;  
        $errFlag         = 0;
	$outMsg          = '';	
  
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
            $btnValue	 = 'Update';
            $strTab	 = 'Edit';		

        //============ Read value for updation ===========	
            $result          = $objTestimonial->readTestimonial($id);
           // print_r($result);exit;
            $strName    =  htmlspecialchars_decode($result['strName'],ENT_QUOTES);    
            $strNameO   =  $result['strNameO'];  
            $catId      = $result['catId'];  
            $strTitle   =  htmlspecialchars_decode($result['strTitle'],ENT_QUOTES);  
            $strTitleO  =  htmlspecialchars_decode($result['strTitleO'],ENT_QUOTES); 
            $strImage     =  $result['strImage'];
            $fileExt      = pathinfo($strImage, PATHINFO_EXTENSION);
            $strDescription      =  htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
            $strDescriptionO     =  htmlspecialchars_decode($result['strDescriptionO'],ENT_QUOTES);
            $redirectLoc	 =  APP_URL."viewTestimonial/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result        = $objTestimonial->addUpdateTestimonial($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag'];
           $catId      = $result['catId'];  
           if($flag==0 && $id>0)
              $redirectLoc	=  APP_URL."viewTestimonial/".$glId."/".$plId."/".$id;  
            else if($flag==0 && $id==0)  
                $redirectLoc	=  APP_URL."viewTestimonial/".$glId."/".$plId;
           
	}
?>