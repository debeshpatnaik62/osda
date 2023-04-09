<?php
    /* ================================================
    File Name     : venueTagInner.php
    Description		: This page is used to add Venue Tag details.
    Developed By	: Rahul Kumar Saw
    Developed On	: 21-Apr-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsVenuetagged
    Functions Used	:  
    ==================================================*/	
	//========== create object of clsMsgBoard class===============	
        include_once( CLASS_PATH.'clsVenueTagged.php');
       // print_r($_REQUEST);exit;
        $objVenueTag        = new clsVenueTagged;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;

        $strSubmit      = ($id>0)?'Update':'Submit';
	      $strReset       = ($id>0)?'Cancel':'Reset';
	      $strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewVenueTag/".$glId."/".$plId."';":"$('#userImage').hide();";
        //========== Permission ===============	
         $glId          = $_REQUEST['GL'];
         $plId          = $_REQUEST['PL'];

         $venueId        = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
         $skillId        = (isset($_REQUEST['GL']))?$_REQUEST['GL']:0;
         $distId         = (isset($_REQUEST['PL']))?$_REQUEST['PL']:0;

         $pageName      = $_REQUEST['PAGE'].'.php';
         $userId        = $_SESSION['adminConsole_userID'];   
         $explPriv      = $objVenueTag->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
         $noAdd         = $explPriv['add'];
     
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewVenueTag/".$glId."/".$plId. "'</script>"; 
  	//========== Default variable ===============	
  	$flag            = 0;  
    $errFlag         = 0;
  	$outMsg          = '&nbsp;';	
  //=========== For editing ======================
    if(isset($_REQUEST['ID']))
    {
        //============ Read value for updation ===========  
       
      $skillId   = $skillId;
      $distId    = $distId;
      $venueId   = $venueId;
      $result    = $objVenueTag->manageVenueTagged('R',0,'',0,$skillId,$distId,$venueId,'1000-01-01','00:00:00',0,'','',0);
      if ($result->num_rows > 0) {
      $row       =  $result ->fetch_array();
      $examDate  =  date("d-m-Y",strtotime($row['stmExamDate']));
      $examTime  = date("H:i:s",strtotime($row['stmExamTime']));
      $intRegdType = $row['intRegdType'];
      $level     = $row['intLevel'];
      }
      $redirectLoc  = APP_URL."viewVenueTag/".$glId."/".$plId;
    }

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{//echo $id;exit;
           $result        =  $objVenueTag->addUpdateVenueTagged($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
           
            /*$intDist            =  $result['intDist'];
            $strName            =  $result['strName'];
            $strNameO           =  $result['strNameO'];    
            $strCapacity        =  $result['intCapacity'];
            $strOfficerName     =  $result['txtOfficerName'];
            $strMobile          =  $result['txtMobile'];
            $strEmailId         =  $result['txtEmailId'];
            $strMapAddress      =  $result['txtMapAddress'];
            $strAddress         =  $result['strAddress'];*/
            if($flag==0 && $id>0)
                $redirectLoc	=  APP_URL."viewVenueTag/".$glId."/".$plId."/".$id;  
            else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewVenueTag/".$glId."/".$plId;
         
	}
  ?>