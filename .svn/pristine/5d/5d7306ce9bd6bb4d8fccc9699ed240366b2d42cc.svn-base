<?php

  //print_r($_SESSION);exit;
    include_once( CLASS_PATH.'clsSkillTP.php');
    $objTP        = new clsSkillTP;  
    $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit          =($id>0)?'Submit':'Submit';
    $strReset           =($id>0)?'Cancel':'Reset';
    $strTab             =($id>0)?'Edit Program':'Add Program';
    //$strclick           =($id>0)?"window.location.href='". APP_URL."viewInstituteCourse/".$glId."/".$plId."';":" getCoursesDetails(0);";
    $strClick           = ($id>0)?"window.location='". APP_URL."viewBanner/".$glId."/".$plId."/".$id."'":"";


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
    $insId          = $_SESSION['institute_id'];
    $privilege      = $_SESSION['userPrivilege'];
    if($privilege>2)
    {
        $tpId = $insId;
    }
    else
    {
        $tpId = 0;
    }
    if($id>0)
    {    
    $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>20,'id'=>$id);

    $result     = $objTP->manageskillTP('RR', $arrConditions); 
      
     
        if ($result->num_rows > 0) {

            $row            = $result->fetch_array();
            $strProgram     = $row['vchProgramName'];
            $startDate      = $row['dtmStartDate'];
            $endDate        = $row['dtmEndDate'];
            $programFee     = $row['intProgramFee'];
            $tpId           = $row['intTPId'];
            $openProgram    = $row['tinOpenProgram'];
            $txtStudentFee  = $row['intStudentFee'];
            $txtStudentQty  = $row['intStudentQty'];
            $txtTrainFee    = $row['intTrainFee'];
            $txtTrainQty    = $row['intTrainQty'];
            $txtInstituteFee= $row['intInsFee'];
            $txtInsQty      = $row['intInsQty'];
        }
        
    }
    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
        {      $partnerId=$tpId;//$id;
               $result              = $objTP->addUpdateTPProgram($id,$partnerId);
               $outMsg              = $result['msg']; 
               $flag                = $result['flag'];
               $data                = $result['returnParams'];
               $strProgram          = $data['programName'];
               $startDate           = $data['startDate'];
               $endDate             = $data['endDate'];
               $openProgram         = $data['openProgram'];
               $txtStudentFee       = $data['txtStudentFee'];
               $txtStudentQty       = $data['txtStudentQty'];
               $txtTrainFee         = $data['txtTrainFee'];
               $txtTrainQty         = $data['txtTrainQty'];
               $txtInstituteFee     = $data['txtInstituteFee'];
               $txtInsQty           = $data['txtInsQty'];
              

               $redirectLoc    =  APP_URL."viewTrainingProgram/".$glId."/".$plId;
               
        }
 
?>