<?php
// print_r($_REQUEST);
// exit();
    /* ================================================
    File Name       : addGrevSubCategoryInner.php
    Description		: This page is used to add Venue details.
    Developed By	: Rahul Kumar Saw
    Developed On	: 22-March-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: 
    Functions Used	:  
    ==================================================*/	
	//========== create object of clsGrevSubCategory class===============	
        include_once( CLASS_PATH.'clsGrevSubCategory.php');
        $objConfig      = new clsGrevSubCategory;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	    $strReset       = ($id>0)?'Cancel':'Reset';
	    $strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewGrevSubCategory/".$glId."/".$plId."';":"";
        //========== Permission ===============	
         $glId          = $_REQUEST['GL'];
         $plId          = $_REQUEST['PL'];
        
         $pageName      = $_REQUEST['PAGE'].'.php';

         $userId        = $_SESSION['adminConsole_userID'];  
         

         $explPriv      = $objConfig->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
         

         $noAdd         = $explPriv['add'];
         print_r($explPriv);
        //  print_r($_REQUEST);
        exit(); 
     
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewGrevSubCategory/".$glId."/".$plId. "'</script>"; 
  	//========== Default variable ===============	
  	$flag            = 0;  
    $errFlag         = 0;
  	$outMsg          = '&nbsp;';	
  	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
	
            //============ Read value for updation ===========	
            $result          = $objConfig->readGrevSubCategory($id);


           $strCategory         = $result['strCategory'];  
           $strCategoryO        = $result['strCategoryO'];  
           $strDescription      = $result['strDescription'];
           $strDescriptionO     = $result['strDescriptionO'];
           
           $intStatus           = $result['intStatus'];
           $redirectLoc         =   APP_URL."viewGrevSubCategory/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
        // print_r($_REQUEST);
// exit();
        
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
           
           $strCategory     = htmlspecialchars_decode($result['txtSubCategory'],ENT_QUOTES);  
           $strCategoryO     = htmlspecialchars_decode($result['txtSubCategory_O'],ENT_QUOTES);  
           $strDescription  = htmlspecialchars_decode($result['txtDescription'],ENT_QUOTES);
           $strDescriptionO  = htmlspecialchars_decode($result['txtDescriptionO'],ENT_QUOTES);
           $intStatus       = $result['intStatus'];

            if($flag==0 && $id>0)
                $redirectLoc	=  APP_URL."viewGrevSubCategory/".$glId."/".$plId."/".$id;  
            else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewGrevSubCategory/".$glId."/".$plId;
         
	}
  ?>