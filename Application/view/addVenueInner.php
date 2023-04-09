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
	//========== create object of clsMsgBoard class===============	
        include_once( CLASS_PATH.'clsVenue.php');
        $objVenue        = new clsVenue;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	      $strReset       = ($id>0)?'Cancel':'Reset';
	      $strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewVenue/".$glId."/".$plId."';":"$('#userImage').hide();";
        //========== Permission ===============	
         $glId          = $_REQUEST['GL'];
         $plId          = $_REQUEST['PL'];
         $pageName      = $_REQUEST['PAGE'].'.php';
         $userId        = $_SESSION['adminConsole_userID'];   
         $explPriv      = $objVenue->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
         $noAdd         = $explPriv['add'];
     
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewVenue/".$glId."/".$plId. "'</script>"; 
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
            $result          = $objVenue->readSkillVenue($id);
            
            $intDist            =  $result['intDistrictId'];
            $strName            =  htmlspecialchars_decode($result['vchVenueName'],ENT_QUOTES);
            $strNameO           =  htmlspecialchars_decode($result['vchVenueNameO'],ENT_QUOTES);    
            $strOfficerName           =  htmlspecialchars_decode($result['vchOfficerName'],ENT_QUOTES);
            $strMobile           =  htmlspecialchars_decode($result['vchOfficerMobile'],ENT_QUOTES);
            $strAddress           =  htmlspecialchars_decode($result['vchAddress'],ENT_QUOTES);
            $strEmailId           =  htmlspecialchars_decode($result['vchEmailId'],ENT_QUOTES);
            $strMapAddress           =  htmlspecialchars_decode($result['vchMapAddress'],ENT_QUOTES);
            $strCapacity         =  $result['intCapacity'];            
            $intPinCode          =  $result['intPinCode'];            
            $strCity             =  $result['vchCity'];            
            
            $redirectLoc	=  APP_URL."viewVenue/".$glId."/".$plId."/".$id;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result        =  $objVenue->addUpdateVenue($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
           
            $intDist            =  $result['intDist'];
            $strName            =  $result['strName'];
            $strNameO           =  $result['strNameO'];    
            $strCapacity        =  $result['intCapacity'];
            $strOfficerName     =  $result['txtOfficerName'];
            $strMobile          =  $result['txtMobile'];
            $strEmailId         =  $result['txtEmailId'];
            $strMapAddress      =  $result['txtMapAddress'];
            $strAddress         =  $result['strAddress'];
            if($flag==0 && $id>0)
                $redirectLoc	=  APP_URL."viewVenue/".$glId."/".$plId."/".$id;  
            else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewVenue/".$glId."/".$plId;
         
	}
  ?>