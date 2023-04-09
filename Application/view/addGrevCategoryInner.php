<?php
    /* ================================================
    File Name     : addGrevCategoryInner.php
    Description		: This page is used to add Complaint Category.
    Developed By	: Rahul Kumar Saw
    Developed On	: 24-March-2023
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: 
    Functions Used	:  
    ==================================================*/	
	//========== create object of clsTicker class===============	
        include_once( CLASS_PATH.'clsGrevCategory.php');
        $objGrev      = new clsGrevCategory;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	    $strReset       = ($id>0)?'Cancel':'Reset';
	    $strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewGrevCategory/".$glId."/".$plId."';":"$('#userImage').hide();";
        //========== Permission ===============	
         $glId          = $_REQUEST['GL'];
         $plId          = $_REQUEST['PL'];
         $pageName      = $_REQUEST['PAGE'].'.php';
         $userId        = $_SESSION['adminConsole_userID'];   
         $explPriv      = $objGrev->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
         $noAdd         = $explPriv['add'];
     
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewGrevCategory/".$glId."/".$plId. "'</script>"; 
  	//========== Default variable ===============	
  	$flag            = 0;  
    $errFlag         = 0;
  	$outMsg          = '&nbsp;';	
  	//=========== For editing ======================
	//=========== For editing ======================
    if(isset($_REQUEST['ID']))
    {
           
            //============ Read value for updation ===========  
           $result              = $objGrev->readGrevCategory($id);
           $strCategory         = $result['strCategory'];  
           $strCategoryO        = $result['strCategoryO'];  
           $strDescription      = $result['strDescription'];
           $strDescriptionO     = $result['strDescriptionO'];
           
           $intStatus           = $result['intStatus'];
           $redirectLoc         =   APP_URL."viewGrevCategory/".$glId."/".$plId;
    }

    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
    {
           $result          = $objGrev->addUpdateGrevCategory($id);
           $outMsg          = $result['msg']; 
           $flag            = $result['flag'];
           $strCategory     = htmlspecialchars_decode($result['strCategory'],ENT_QUOTES);  
           $strCategoryO     = htmlspecialchars_decode($result['strCategoryO'],ENT_QUOTES);  
           $strDescription  = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
           $strDescriptionO  = htmlspecialchars_decode($result['strDescriptionO'],ENT_QUOTES);
           $intStatus       = $result['intStatus'];
           
           if($flag==0 && $id>0)
            $redirectLoc    =  APP_URL."viewGrevCategory/".$glId."/".$plId."/".$id;  
           else if($flag==0 && $id==0)  
              $redirectLoc  =  APP_URL."viewGrevCategory/".$glId."/".$plId;
            
    }
  ?>