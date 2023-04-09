<?php
    /* ================================================
    File Name     : addVenueInner.php
    Description		: This page is used to add Venue details.
    Developed By	: Rahul Kumar Saw
    Developed On	: 22-March-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsVenue
    Functions Used	:  
    ==================================================*/	
	//========== create object of clsTicker class===============	
        include_once( CLASS_PATH.'clsTicker.php');
        $objTicker      = new clsTicker;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	      $strReset       = ($id>0)?'Cancel':'Reset';
	      $strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewTicker/".$glId."/".$plId."';":"$('#userImage').hide();";
        //========== Permission ===============	
         $glId          = $_REQUEST['GL'];
         $plId          = $_REQUEST['PL'];
         $pageName      = $_REQUEST['PAGE'].'.php';
         $userId        = $_SESSION['adminConsole_userID'];   
         $explPriv      = $objTicker->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
         $noAdd         = $explPriv['add'];
     
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewTicker/".$glId."/".$plId. "'</script>"; 
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
            $result          = $objTicker->readTicker($id);
            
            $strMessage       =  $result['strMessage'];
            $strMessageO      =  $result['strMessageO'];
            $strUrl           =  $result['strUrl'];
            
            $redirectLoc	=  APP_URL."viewTicker/".$glId."/".$plId."/".$id;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result        =  $objTicker->addUpdateTicker($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
           
            $strMessage       =  $result['strMessage'];
            $strMessageO      =  $result['strMessageO'];
            $strUrl           =  $result['strUrl']; 
            if($flag==0 && $id>0)
                $redirectLoc	=  APP_URL."viewTicker/".$glId."/".$plId."/".$id;  
            else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewTicker/".$glId."/".$plId;
         
	}
  ?>