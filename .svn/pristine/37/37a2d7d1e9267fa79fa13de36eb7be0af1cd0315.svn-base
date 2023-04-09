<?php

  //print_r($_SESSION);exit;
    include_once( CLASS_PATH.'clsSkillInsRegd.php');
    $objIns        = new clsSkillInsRegd;  
    $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit          =($id>0)?'Submit':'Submit';
    $strReset           =($id>0)?'Cancel':'Reset';
    $strTab             =($id>0)?'Add':'Add';
    $strclick           =($id>0)?"window.location.href='". APP_URL."approveInstitute/".$glId."/".$plId."';":" ";
    //$strClick           = ($id>0)?"window.location='". APP_URL."addInstituteRegistration/".$glId."/".$plId."/".$id."'":"";


    $isPaging      = 0;
    $pgFlag        = 0;
    $intPgno       = 1;
    $intRecno      = 0;
    $ctr           = 0;
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
        
    $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>20,'Id'=>$id);

    $result     = $objIns->manageSkillInsRegd('R', $arrConditions); 
      
     
        if ($result->num_rows > 0) {

            $row        = $result->fetch_array();
            $strName    = $row['vchInsName'];
            $strMobile  = $row['vchInsMobile'];
            $strEmail   = $row['vchInsEmail'];
            $strPan     = $row['vchPan'];
            $strRegd    = $row['vchRegdNo'];
            $strAddress = htmlspecialchars_decode($row['vchAddress'], ENT_QUOTES);
        }

    // view added program 
    $arrPConditions=array('reportID'=>$intRecno ,'pageCount'=>20,'insId'=>$id);

    $resultView     = $objIns->manageSkillInsRegd('VPP', $arrPConditions);
    //print_r($resultView);exit;
    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
    {      $insId=$id;
           $result              = $objIns->addUpdateTagProgram($id,$insId);
           $outMsg              = $result['msg']; 
           $flag                = $result['flag'];
          
           
           /*if($flag==0 && $id>0)
                $redirectLoc    =  APP_URL."viewInstituteCourse/".$glId."/".$plId."/".$id;
           else if($flag==0 && $id==0)  */
                $redirectLoc    =  APP_URL."approveInstitute/".$glId."/".$plId;
           
    }
 
?>