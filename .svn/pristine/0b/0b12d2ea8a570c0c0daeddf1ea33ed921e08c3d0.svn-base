<?php
/* ================================================
  File Name           : controller.php
  Description		  : This is used for manage all classes. 
  Devloped By		  : Rasmi Ranjan Swain
  Devloped On	      : 28-Aug-2015
  Update History	  :	<Updated by>		<Updated On>		<Remarks>
           1              T Ketaki Debadarshini         16-Aug-2017       Page url permission checked
  ================================================== */

header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');   
header("X-XSS-Protection: 1; mode=block");
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);
//  ini_set('session.cookie_secure',1);



// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);

include_once("model/customModel.php");
class Controller {

    public function __construct() {
        $this->invoke();
    }

// === Function for call pages and created by Rasmi Ranjan Swain on On==16-May-2016==
    public function invoke() {
        include('config.php');
        //include_once("controller/commonClass.php");
        $page   = (isset($_REQUEST['PAGE']) && $_REQUEST['PAGE'] != '') ? $_REQUEST['PAGE'] : 'home';
        $glId	= (isset($_REQUEST['GL']) && $_REQUEST['GL']>0)?$_REQUEST['GL']:'';	
        $plId   = (isset($_REQUEST['PL']) && $_REQUEST['PL']>0)?$_REQUEST['PL']:'';	
        $dcId   = (isset($_REQUEST['ID']) && $_REQUEST['ID']>0)?$_REQUEST['ID']:''; 
      
       
        if ($page == 'home') 
            include 'view/index.php';
         else if (file_exists("view/" . $page . ".php") && $page!='error' && $page!='viewApplication' && $page!='viewQuestionDetails' && $page!='tpDetails'  && $page!='instituteDetails') {
             
              include 'sessionCheck.php';
              include_once("excelImport.php");
              // cahnge password logout from all system
             $objUser        = new clsUserProfile;
             $intSessionUserId   = (USER_ID!='' && USER_ID>0)?USER_ID:0;
             $upwd = $_SESSION['userPassword'];  
             $resultU = $objUser->manageUser('VP',$intSessionUserId,'0','0','0','0','','0','','','','','','','','','','','','','0','0','0','0','0','0','0');
             if(mysqli_num_rows($resultU)>0)
             { 
                    $row        = mysqli_fetch_assoc($resultU);
                    $strId      = $row["INT_ID"];
                    $strPass    = $row["VCH_PASSWORD"];

            }
            if($strPass!=$upwd)
            {
                session_destroy();
                header("Location:" . APP_URL);exit;

            } 
             $intPermittedCount = 0;
             if($_SESSION['adminPrivilege'] !=1 && ($page!='dashboard' || $page!='changePassword')){ 
                $objSearchPer       = new clsUserPermission;
                $strSearchPg        = $page.".php";
                $intSessionUserId   = (USER_ID!='' && USER_ID>0)?USER_ID:0;
                $adminPerResult	= $objSearchPer->managePermission('CPP',0,$intSessionUserId,0,0,0,0,0,0,0,0,$strSearchPg); 
                if($adminPerResult->num_rows >0){
                    $permissionRow     = $adminPerResult->fetch_array();
                    $intPermittedCount = $permissionRow[0];
                }
             }

          
             /*   $newSessionId           = session_id();
                $hdnPrevSessionId       = $_POST['hdnPrevSessionId'];
                
             
               if(($hdnPrevSessionId!='' && $newSessionId == $hdnPrevSessionId) || ($hdnPrevSessionId==''))
                {*/
                   
                       
                        include('includes/header.php');
                        if( $_SESSION['adminPrivilege'] !=1){
                            if(($intPermittedCount>0 && $_SESSION['adminPrivilege'] !=1) || ($intPermittedCount ==0 && ($page=='dashboard' || $page=='changePassword'))){
                               include 'view/' . $page . '.php';
                            }else{
                                echo '<script>alert("You are not authorised to access this page.");</script>'; 
                                include 'view/dashboard.php';
                            }
                        }else
                             include 'view/' . $page . '.php';
                        
                        include('includes/footer.php');
                   
               /*  }else if($hdnPrevSessionId!='' && ($newSessionId != $hdnPrevSessionId)){
                     echo '<script>alert("Operation failed due to session mismatch");</script>'; 
                    // session_destroy();
                     include 'view/error.php';
                     exit;
                 }*/
              
        }
         else if ($page == 'proxy') {
            include ('proxy.php');
        }
        else if ($page =='mobileProxy') {            
            include ('mobileProxy.php');
        }else if ($page == 'viewApplication' || $page == 'viewQuestionDetails' || $page == 'tpDetails' || $page == 'instituteDetails'){ 
            
            include 'sessionCheck.php';
                
            if (file_exists("view/" . $page . "Inner.php")) 
            {
                    include 'view/' . $page . 'Inner.php';              
            }
            include 'view/' . $page . '.php';
            
        }
        else 
        {  
           // session_destroy();
            include 'view/error.php';
            exit;
        }
          
    }

}


/* * ****Class to manage Location ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 10-Sept-2015       '
' Procedure Used        : USP_LOCATION_MASTER       '
* ************************************************** */

class clsLocation extends Model {
    
    // Function To Manage Location By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function manageLocation($action, $locationId, $locName,$locName_h, $description,$createdBy) {
        $locationSql = "CALL USP_LOCATION_MASTER('$action',$locationId,'$locName','$locName_h','$description',$createdBy,@OUT);";
       // echo $locationSql;
        $errAction          = Model::isSpclChar($action);
        $errCategory      = Model::isSpclChar($locName);
        $errDescription        = Model::isSpclChar($description);
        
        if ($errAction > 0 || $errCategory > 0 || $errDescription > 0)
            header("Location:" . APP_URL . "error");
        else {
            $locResult = Model::executeQry($locationSql);
            return $locResult;
        }
    }

// Function To Add Upadate Location By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function addUpdateLocation($locationId) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $userId                = $_SESSION['adminConsole_userID'];
            $txtLocation           = htmlspecialchars(addslashes($_POST['txtLocation']), ENT_QUOTES);
            $blankLocation         = Model::isBlank($txtLocation);
            $errLocation           = Model::isSpclChar($_POST['txtLocation']);

            $lenLocation           = Model::chkLength('max', $txtLocation,50);
            $txtDescription        = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
            $errDescription        = Model::isSpclChar($_POST['txtDescription']); 
           // $radStatus             = $_POST['radStatus'];

            $outMsg                 = '';
            $flag                   = ($locationId != 0) ? 1 : 0;
            $action                 = ($locationId == 0) ? 'A' : 'U';
            $errFlag                = 0 ;
            if($blankCategory >0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Mandatory Fields should not be blank";
            }
            else if($lenLocation>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Length should not excided maxlength";
            }
            else if($errLocation>0 || $errDescription>0)
            {
                    $errFlag		= 1;
                    $outMsg			= "Special Characters are not allowed";
            }

            if($errFlag==0){
                  $dupResult = $this->manageLocation('C',$locationId,$txtLocation,'','',$userId);

                if ($dupResult) {
                    $numRows = $dupResult->fetch_array();
                    if ($numRows > 0) {
                        $outMsg = 'Location wih this name already exists';
                        $errFlag = 1;
                    } else {
                        $result = $this->manageLocation($action,$locationId,$txtLocation,'',$txtDescription,$userId);
                        if ($result)
                            $outMsg = ($action == 'A') ? 'Location added successfully ' : 'Location updated successfully';

                        }
                    }
            }
         }else{
                header("Location:" . APP_URL . "error");
           }    
        $strLocation          = ($errFlag == 1) ? $txtLocation : '';
        $strDescription       = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'strLocation' => $strLocation, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To read Location  By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function readLocation($id) {

        $result = $this->manageLocation('R',$id,'','','',0);
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $strLocation       = $row['VCH_LOCATION'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
           // $intStatus        = $row['INT_PUBLISH_STATUS'];            
        }
        $arrResult = array( 'strLocation' => $strLocation, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To Delete Location  By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function deleteLocation($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageLocation($action,$explIds[$ctr],'','','',$userId); 
                $row = mysqli_fetch_array($result);

                if ($row[0] == 0)
                    $delRec++;

                $ctr++;

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Location(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Location(s) can not be deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Location(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Location(s) unpublished successfully';

            return $outMsg;
         }else{
                header("Location:" . APP_URL . "error");
           }  
    }
    
}


/* * ****Class to manage Department ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 10-Sept-2015       '
' Procedure Used        : USP_DEPARTMENT_MASTER       '
* ************************************************** */

class clsDepartment extends Model {
    
    // Function To Manage Department By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function manageDepartment($action,$deptId,$locationId,$deptName,$deptName_h,$description,$publishon,$createdBy) {
        $deptSql = "CALL USP_DEPARTMENT_MASTER('$action',$deptId,$locationId,'$deptName','$deptName_h','$description',$publishon,$createdBy,@OUT);";
        //echo $deptSql;
        $errAction        = Model::isSpclChar($action);
        $errdeptName      = Model::isSpclChar($deptName);
        $errLocationid    = Model::isSpclChar($locationId);
        $errDescription   = Model::isSpclChar($description);
        
        if ($errAction > 0 || $errdeptName > 0 || $errDescription > 0 || $errLocationid>0)
            header("Location:" . APP_URL . "error");
        else {
            $deptResult = Model::executeQry($deptSql);
            return $deptResult;
        }
    }

// Function To Add Upadate Department By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function addUpdateDepartment($deptId) {
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
        $userId                = $_SESSION['adminConsole_userID'];
        
        $ddlLocation           = $_POST['ddlLocation'];
        
        $txtDepartment           = htmlspecialchars(addslashes($_POST['txtDepartment']), ENT_QUOTES);
        $blankDepartment         = Model::isBlank($txtDepartment);
        $errDepartment           = Model::isSpclChar($_POST['txtDepartment']);
        $lenDepartment           = Model::chkLength('max', $txtDepartment,50);
        
        $txtDescription          = htmlspecialchars(addslashes($_POST['txtDescription']), ENT_QUOTES);
        $errDescription          = Model::isSpclChar($_POST['txtDescription']); 
       // $radStatus             = $_POST['radStatus'];
        
        $outMsg                 = '';
        $flag                   = ($deptId != 0) ? 1 : 0;
        $action                 = ($deptId == 0) ? 'A' : 'U';
        $errFlag                = 0 ;
        if($blankDepartment >0 || $ddlLocation==0)
        {
                $errFlag		= 1;
                $outMsg			= "Mandatory Fields should not be blank";
        }
        else if($lenDepartment>0)
        {
                $errFlag		= 1;
                $outMsg			= "Length should not excided maxlength";
        }
        else if($errDepartment>0 || $errDescription>0)
        {
                $errFlag		= 1;
                $outMsg			= "Special Characters are not allowed";
        }
      
         if($errFlag==0){
             $dupResult = $this->manageDepartment('C',$deptId,$ddlLocation,$txtDepartment,'','',0,$userId);

            if ($dupResult) {
                
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'Department wih this name already exists';
                    $errFlag = 1;
                } else {
                    $result = $this->manageDepartment($action,$deptId,$ddlLocation,$txtDepartment,'',$txtDescription,0,$userId);
                    if ($result)
                        $outMsg = ($action == 'A') ? 'Department added successfully ' : 'Department updated successfully';

                    }
                }
         }
        }else{
                header("Location:" . APP_URL . "error");
           }    
        $intLocation          = ($errFlag == 1) ? $ddlLocation : 0;
        $strDepartment          = ($errFlag == 1) ? htmlentities($txtDepartment) : '';
        $strDescription       = ($errFlag == 1) ? htmlentities($txtDescription) : '';       
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'intLocation' => $intLocation,'strDepartment' => $strDepartment, 'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To read Department  By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function readDepartment($id) {

        $result = $this->manageDepartment('R',$id,0,'','','',0,0);      
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $strDepartment     = $row['VCH_DEPARTMENT_NAME'];
            $intLocation       = $row['INT_LOCATION_ID'];
            $strDescription    = htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_QUOTES);
                 
        }
        $arrResult = array( 'intLocation' => $intLocation,'strDepartment' => $strDepartment,'strDescription' => $strDescription);
        return $arrResult;
    }

// Function To Delete Department  By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function deleteDepartment($action, $ids) {
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageDepartment($action,$explIds[$ctr],0,'','','',0,$userId); 
                $row = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;
                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Department(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Department(s) can not be deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Department(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Department(s) unpublished successfully';

            return $outMsg;
          }else{
                header("Location:" . APP_URL . "error");
            }  
        }
    
}

/* * ****Class to manage Designation ********************
'By                     : T Ketaki Debadarshini	'
'On                     : 10-Sept-2015       '
' Procedure Used        : USP_DESIGNATION_MASTER       '
* ************************************************** */

class clsDesignation extends Model {
    
    // Function To Manage Designation By::T Ketaki Debadarshini   :: On:: 10-Sept-2015
    public function manageDesignation($action,$desgId,$locationId,$deptId,$desgName,$desgName_h,$publishon,$createdBy) {
        $desgSql = "CALL USP_DESIGNATION_MASTER('$action',$desgId,$locationId,$deptId,'$desgName','$desgName_h',$publishon,$createdBy,@OUT);";
        //echo $desgSql;
        $errAction        = Model::isSpclChar($action);
        $errdesgName      = Model::isSpclChar($desgName);
        
        $errLocationid    = Model::isSpclChar($locationId);
        $errDept          = Model::isSpclChar($deptId);
     
        if ($errAction > 0 || $errdesgName > 0 || $errLocationid>0 || $errDept>0)
            header("Location:" . APP_URL . "error");
        else {
            $desgResult = Model::executeQry($desgSql);
            return $desgResult;
        }
    }

// Function To Add Upadate Designation By::T Ketaki Debadarshini   :: On:: 11-Sept-2015
    public function addUpdateDesignation($desgId) {
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {     
        
        $userId                = $_SESSION['adminConsole_userID'];
        
        $ddlLocation            = $_POST['ddlLocation'];
        $ddlDept                = $_POST['ddlDepartment'];
        $txtDesignation         = htmlspecialchars(addslashes($_POST['txtDesignation']), ENT_QUOTES);
        $blankDesignation       = Model::isBlank($txtDesignation);
        $errDesignation         = Model::isSpclChar($_POST['txtDesignation']);
        $lenDesignation         = Model::chkLength('max', $txtDesignation,50);
       
        
        $outMsg                 = '';
        $flag                   = ($desgId != 0) ? 1 : 0;
        $action                 = ($desgId == 0) ? 'A' : 'U';
        $errFlag                = 0 ;
        if($blankDesignation >0 || $ddlLocation==0 || $ddlDept==0)
        {
                $errFlag		= 1;
                $outMsg			= "Mandatory Fields should not be blank";
        }
        else if($lenDesignation>0)
        {
                $errFlag		= 1;
                $outMsg			= "Length should not excided maxlength";
        }
        else if($errDesignation>0)
        {
                $errFlag		= 1;
                $outMsg			= "Special Characters are not allowed";
        }
      
         if($errFlag==0){
            $dupResult = $this->manageDesignation('C',$desgId,$ddlLocation,$ddlDept,$txtDesignation,'',0,$userId);
            if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'Designation wih this name already exists';
                    $errFlag = 1;
                } else {
                    $result = $this->manageDesignation($action,$desgId,$ddlLocation,$ddlDept,$txtDesignation,'',0,$userId);
                    if ($result)
                        $outMsg = ($action == 'A') ? 'Designation added successfully ' : 'Designation updated successfully';

                    }
                }
         }
      }else{
                header("Location:" . APP_URL . "error");
           }       
        $intLocation     = ($errFlag == 1) ? $ddlLocation : 0;
        $intDept         = ($errFlag == 1) ? $ddlDept : 0;
        $strDesignation  = ($errFlag == 1) ? htmlentities($txtDesignation) : '';
      
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag,'intLocation' => $intLocation,'intDept' => $intDept, 'strDesignation' => $strDesignation);
        return $arrResult;
    }

// Function To read Designation  By::T Ketaki Debadarshini   :: On:: 11-Sept-2015
    public function readDesignation($id) {

        $result = $this->manageDesignation('R',$id,0,0,'','',0,0);      
        if (mysqli_num_rows($result) > 0) {

            $row               = mysqli_fetch_array($result);
            $intDept           = $row['INT_DEPARTMENT_ID'];
            $intLocation       = $row['INT_LOCATION'];
            $strDesignation    = htmlspecialchars_decode($row['VCH_DESIGNATION_NAME'],ENT_QUOTES);
                 
        }
        $arrResult = array( 'intLocation' => $intLocation,'intDept' => $intDept, 'strDesignation' => $strDesignation);
        return $arrResult;
    }

// Function To Delete Designation  By::T Ketaki Debadarshini   :: On:: 11-Sept-2015
    public function deleteDesignation($action, $ids) {
       $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {     
            $ctr = 0;
            $userId = $_SESSION['adminConsole_userID'];
            $explIds = explode(',', $ids);
            $delRec = 0;
            foreach ($explIds as $indIds) {
                $result = $this->manageDesignation($action,$explIds[$ctr],0,0,'','',0,$userId); 
                $row = mysqli_fetch_array($result);
                if ($row[0] == 0)
                    $delRec++;

                $ctr++;
            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg .= 'Designation(s) deleted successfully';
                else
                    $outMsg .= 'Dependency record exist. Designation(s) can not be deleted';
            }
            else if ($action == 'AC')
                $outMsg = 'Designation(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'Designation(s) unpublished successfully';

            return $outMsg;
        }else{
              header("Location:" . APP_URL . "error");
         }   
    }
    
}

/* * ****Class to manage User Profile details********************
  '	By	 	 : T Ketaki Debadarshini	'
  '	On	 	 : 31-Aug-2015        '
  ' Procedure Used       : USP_USER_PROFILE            '
 * ************************************************** */
class clsUserProfile extends Model {

// Function To Manage user Details By::T Ketaki Debadarshini   :: On::31-Aug-2015    
    public function manageUser($action,$userId,$portalType,$locId,$deptId,$desgId,$fullName,$gender,$birthdate,$joindate,$qualification,$specialization,$hobby,$image,$ofcphone,$mobno,$email,$address,$loginId,$passwd,$publishsts,$publishon,$adminPrevilage,$passwordChk,$createdBy,$archiveSts,$slno)
    {
        $userSql = "CALL USP_USER_PROFILE('$action','$userId','$portalType','$locId','$deptId','$desgId','$fullName','$gender','$birthdate','$joindate','$qualification','$specialization','$hobby','$image','$ofcphone','$mobno','$email','$address','$loginId','$passwd','$publishsts','$publishon','$adminPrevilage','$passwordChk',$createdBy,$archiveSts,$slno,@out);";
     //echo  $userSql;exit;
        $errLoginid          = Model::isSpclChar($loginId);
      //  $errPassword         = Model::isSpclChar($passwd);
        $errAction           = Model::isSpclChar($action);
        
        $errLocid            = Model::isSpclChar($locId);
        $errDeptid           = Model::isSpclChar($deptId);
        $errDesgid           = Model::isSpclChar($desgId);
        $errGender           = Model::isSpclChar($gender);
        
        $errBirthdt          = Model::isSpclChar($birthdate);
        $errQualifctn        = Model::isSpclChar($qualification);
        $errImage            = Model::isSpclChar($image);
      
        if ($errAction > 0 || $errLoginid > 0 || $errLocid>0 || $errDeptid>0 || $errDesgid>0 || $errGender>0 || $errBirthdt>0 || $errQualifctn>0 || $errImage>0)
            header("Location:" . APP_URL . "error");
        else {
            $userResult = Model::executeQry($userSql);
            return $userResult;
        }
    }
    
    // Function To Add Update user Details  By::T Ketaki Debadarshini   :: On::01-Sep-2015    
    function getUserSlNo()
    {
            $maxSLResult	= $this->manageUser('CM',0,0,0,0,0,'','0','','','','','','','','','','','','','0','0','0','0','0','0','0');
            $maxSLRow		= mysqli_fetch_array($maxSLResult);
            $maxSlNo		= ($maxSLRow['MAX_SL']>0)?$maxSLRow['MAX_SL']:1;
            return $maxSlNo;
    }
    
    // Function To Add Update user Details  By::T Ketaki Debadarshini   :: On::31-Aug-2015    
    
    public function addUpdateuser($id)
    {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {       
        $userId             = $_SESSION['adminConsole_userID'];
        $arrResult          = array();
        $numLOId            = $_POST['DdlLocation'];
       // $numLOId   =0;
        $numDEPId           = $_POST['DdlDepartment'];
        $numDESId           = $_POST['DdlDesignation'];
        $txtName            = $_POST['txtName'];
        $radGender          = $_POST['radGender'];
        $hdnPassWord        = $_POST['hdnPassWord'];

        $intSlno            = $_POST['hdnSLNo'];
        $txtBirthDate       = ''; 
        $txtJoinDate        = '';
        $txtQualification   = $_POST['txtQualification'];
        $txtSpecialisation  = '';
        $txtHobby           = '';
        $txtImageFile       = $_FILES['fileDocument']['name'];
        if ($txtImageFile != '') {
            $extension          = pathinfo($txtImageFile, PATHINFO_EXTENSION);
            $formattedFileName  = 'USER_' . time() . '.' . $extension;
        }
        
       
       
        $prevImageFile      = $_POST['hdnImageFile'];
        $txtPhNo            = $_POST['txtOffPh'];
        $txtMobileNo        = $_POST['txtMobile'];
        $txtEmail           = $_POST['txtEmail'];
        $txtAddress         = '';
        $txtUserId          = $_POST['txtUser'];
        $txtPassword        = $_POST['txtPassword'];
        
        if (isset($_REQUEST['login']))
        {
            if($hdnPassWord != '')
                $encrypted_pass = $hdnPassWord;
            else
                $encrypted_pass = md5($txtPassword);
        }
        else
        {
            $encrypted_pass = '';
        }    
        
        $txtConfirmpass  = $_POST['txtConfirmPwd'];
        
        if ($txtImageFile == '' && $id != '')       
            $formattedFileName= $prevImageFile;
       
        
        $radStatus       = 1;
        $ImageSize       = $_FILES['fileDocument']['size'];
        $ImageTemp       = $_FILES['fileDocument']['tmp_name'];        					
        $chkPrev         = $_POST['chkPrevilige'];
        $fileMimetype    = mime_content_type($ImageTemp);
        $adminPrivilege  = 0;
        $privilege       = 3;
        
        if (isset($_REQUEST['login'])) 
        {
            if (isset($chkPrev))
            {
                $adminPrivilege = 1;
                $privilege      = 1;
            }
            else
            {
                $privilege      = 2;
            }
        }
        $slno = 0;
        //=========== Check special character ============
        $errName            = Model::isSpclChar($_POST['txtName']);  
        $errUserid          = Model::isSpclChar($_POST['txtUser']);   
        $errQualification   = Model::isSpclChar($_POST['txtQualification']);
        $errPhNo            = Model::isSpclChar($_POST['txtOffPh']);
        $errMobileNo        = Model::isSpclChar($_POST['txtMobile']);
        $errEmail           = Model::isSpclChar($_POST['txtEmail']);
        $publishon          = 0 ;
        $outMsg            = '';
        $errFlag           = 0 ;
        $flag              = ($id != 0) ? 1 : 0;
        $action            = ($id == 0) ? 'A' : 'U';
        
       
        if($txtName == ''){
            $errFlag        = 1;
            $outMsg         = "Mandatory Fields should not be blank";
        }
        else if($errName>0 || $errUserid>0 || $errQualification>0 || $errPhNo>0 || $errMobileNo>0 || $errEmail>0)
        {
            $outMsg	= "Special Characters are not allowed";
            $errFlag	= 1;
        }else if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $txtImageFile!='') {
                $errFlag               = 1;
                $flag                  = 1;
                $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif';
            
        }else if ($ImageSize > SIZE1MB) {
            $errFlag               = 1;
            $flag                  = 1;
            $outMsg = 'File size can not more than 1 MB';
        }
        
        if($errFlag==0 && $userId>0){
                $dupResult = $this->manageUser('CD',$id,0,0,0,0,$txtName,'0','','','','','','','','','','','','','0','0','0','0','0','0','0');
                if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'User already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
                    $result = $this->manageUser($action,$id,0,$numLOId,$numDEPId,$numDESId,$txtName,$radGender,$txtBirthDate,$txtJoinDate,$txtQualification,$txtSpecialisation,$txtHobby,$formattedFileName,$txtPhNo,$txtMobileNo,$txtEmail,'',$txtUserId,$encrypted_pass,$radStatus,$privilege,$adminPrivilege,0,$userId,0,$intSlno);
                    if ($result){
                        
                        $flag   = 0;
                        $outMsg = ($action == 'A') ? 'User added successfully ' : 'User updated successfully';
                    if ($formattedFileName != '') {
                        if (file_exists("uploadDocuments/UserProfile/" . $prevImageFile) && $_FILES['fileDocument']['name'] != '') {
                            unlink("uploadDocuments/UserProfile/" . $prevImageFile);
                        }
                        move_uploaded_file($ImageTemp, "uploadDocuments/UserProfile/" . $formattedFileName);
                       
                      }
                    }  
                }
            }
        }
       }else{
                header("Location:" . APP_URL . "error");
           }           
        $intLocId       = ($errFlag == 1) ? $numLOId : 0;
        $intDeptId      = ($errFlag == 1) ? $numDEPId : 0;
        $intDesigId      = ($errFlag == 1) ? $numDESId : 0;
        $strFullname     = ($errFlag == 1) ? htmlentities($txtName) : '';
        $intGender       = ($errFlag == 1) ? $radGender : 1;
        $strDateofjoin   = ($errFlag == 1) ? $txtJoinDate : '';
        $strDateofbirth   = ($errFlag == 1) ? $txtBirthDate : '';
        $strQualification  = ($errFlag == 1) ? htmlentities($txtQualification) : '';

        $intSlno          = ($errFlag == 1) ? $intSlno : '';
        $strHobby        = ($errFlag == 1) ? htmlentities($txtHobby) : '';
        $strPhno    = ($errFlag == 1) ? htmlentities($txtPhNo) : '';
        $strMobno   = ($errFlag == 1) ? htmlentities($txtMobileNo) : '';
        $strEmail   = ($errFlag == 1) ? htmlentities($txtEmail) : '';
        $strFileName   = ($errFlag == 1) ? htmlentities($formattedFileName) : '';
        $strUserid    = ($errFlag == 1) ? htmlentities($txtUserId) : '';
        $strPassword    = ($errFlag == 1) ? htmlentities($encrypted_pass) : '';
        $intAdminpre  = ($errFlag == 1) ? htmlentities($adminPrivilege) : '';
        $intPrevilage   = ($errFlag == 1) ? htmlentities($privilege) : '';
        
        $arrResult = array('msg' => $outMsg, 'flag' => $errFlag, 'intLocId' => $intLocId,'intDeptId' => $intDeptId,'intDesigId' => $intDesigId,'strFullname' => $strFullname,'intGender' => $intGender,'strQualification' => $strQualification,'intSlno' => $intSlno,'strPhno' => $strPhno, 'strMobno' => $strMobno, 'strEmail' => $strEmail, 'strFileName' => $strFileName, 'strUserid' => $strUserid, 'intAdminpre' => $intAdminpre, 'intPrevilage' => $intPrevilage);
        return $arrResult;
    
    }
    
    // Function To read user Details  By::T Ketaki Debadarshini   :: On::2-Aug-2015     
    public function readUser($id)
    {
        $result = $this->manageUser('R',$id,0,0,0,0,'',0,'','','','','','','','','','','','',0,'0',0,0,0,0,0);
        if (mysqli_num_rows($result) > 0) {

            $row                = mysqli_fetch_array($result);
            $intLocId           = $row['INT_LOCATION_ID'];
            $intDeptId          = $row['INT_DEPARTMENT_ID'];
            $intDesigId         = $row['INT_DESIGNATION_ID'];
            $strFullname        = $row['VCH_FULL_NAME'];
            $intGender          = $row['VCH_GENDER'];
            $strDateofjoin      = $row['VCH_DATE_OF_JOIN'];
            $strDateofbirth     = $row['VCH_DATE_OF_BIRTH'];
            $strQualification   = $row['VCH_QUALIFICATION'];
            $intSlno            = $row['INT_SLNO'];
            $strHobby           = $row['VCH_HOBBY'];
            $strPhno            = $row['VCH_PH_NO'];
            $strMobno            = $row['VCH_MOBILE_NO'];
            $strEmail           = $row['VCH_EMAIL'];
            $strFileName        = $row['VCH_IMAGE'];
            $strUserid          = $row['VCH_USER_ID'];
            $strPassword         = $row['VCH_PASSWORD'];
            $intAdminpre        = $row['INT_ADMIN_PRIVILEGE'];
            $intPrevilage       = $row['INT_PREVILIGE_STATUS'];
        }

        $arrResult = array('intLocId' => $intLocId,'strPassword' => $strPassword,'intDeptId' => $intDeptId,'intDesigId' => $intDesigId,'strFullname' => $strFullname,'intGender' => $intGender,'strQualification' => $strQualification,'intSlno' => $intSlno,'strPhno' => $strPhno, 'strMobno' => $strMobno, 'strEmail' => $strEmail, 'strFileName' => $strFileName, 'strUserid' => $strUserid, 'intAdminpre' => $intAdminpre, 'intPrevilage' => $intPrevilage);
        return $arrResult;
      }
      
      // Function To Delete User and Other actions  By::T Ketaki Debadarshini   :: On:: 28-Aug-2015
    public function deleteUser($action, $ids) {
      $newSessionId           = session_id();
      $hdnPrevSessionId       = $_POST['hdnPrevSessionId']; 
      if($newSessionId == $hdnPrevSessionId) {   
            $ctr = 0; 
            $userId = ($_SESSION['adminConsole_userID']!='')?$_SESSION['adminConsole_userID']:0;
            $explIds = explode(',', $ids);
            $delRec = 0;
                
            
            foreach ($explIds as $indIds) {
                $slNumber = 0;
                $indvidualID = $explIds[$ctr];
                if ($action == 'US') {
                    $slNumber = $_POST['txtSLNo' . $indvidualID];
                    //echo $indvidualID;		
                }
                $result1 = $this->manageUser('R',$explIds[$ctr],0,0,0,0,'',0,'','','','','','','','','','','','',0,'0',0,0,$userId,0,0);
                $row = mysqli_fetch_array($result1);
                $strImageFile = $row['VCH_IMAGE'];
                
                $result = $this->manageUser($action,$explIds[$ctr],0,0,0,0,'',0,'','','','','','','','','','','','',0,'0',0,0,$userId,0,$slNumber);

                $row = mysqli_fetch_array($result);
                if ($row[0]=='0')
                    $delRec++;

                 $ctr++;
                 
                if ($action == 'D' && $strImageFile != '') {
                    if (file_exists("uploadDocuments/UserProfile/" . $strImageFile)) {
                       // unlink("uploadDocuments/UserProfile/" . $strImageFile);
                    }
                }

            }

            if ($action == 'D') {
                if ($delRec > 0)
                    $outMsg = 'User(s) deleted successfully';

            }
            else if ($action == 'AC')
                $outMsg = 'User(s) activated successfully';
            else if ($action == 'IN')
                $outMsg = 'User(s) inactivated successfully';
            else if ($action == 'P')
                $outMsg = 'User(s) published successfully';
            if($action=='US')		
	    $outMsg	= 'Serial number updated successfully';	

             return $outMsg;
         }else{
                header("Location:".APP_URL."error");
           }  
     }
    
 }


/* * ****Class to manage User Permission********************
  '	By	 	 : T Ketaki Debadarshini	'
  '	On	 	 : 31-Aug-2015        '
  ' Procedure Used       : USP_USER_PERMISSION            '
 * ************************************************** */
class clsUserPermission extends Model {

// Function To Manage Globallink By::T Ketaki Debadarshini   :: On::31-Aug-2015    
    public function managePermission($action,$pId,$userId,$glId,$plId,$auther,$editor,$publisher,$manager,$previlage,$createdBy,$strSearchpage)
    {
        $errAction          = Model::isSpclChar($action);
        $errUserID          = Model::isSpclChar($userId);
        $errGlid            = Model::isSpclChar($glId);
        $errPlid            = Model::isSpclChar($plId);
        $errAuthor          = Model::isSpclChar($auther);
        $errEditor          = Model::isSpclChar($editor);
        
        $errPublisher       = Model::isSpclChar($publisher);
        $errManager         = Model::isSpclChar($manager);
        $errPrevilage       = Model::isSpclChar($previlage);        
        $errSearchpage      = Model::isSpclChar($strSearchpage);
        
        $permissionSql = "CALL USP_USER_PERMISSION('$action',$pId,$userId,$glId,$plId,$auther,$editor,$publisher,$manager,$previlage,$createdBy,'$strSearchpage');";
        //echo $permissionSql; exit;
        if ($errAction > 0 || $errUserID > 0 || $errGlid > 0 || $errPlid>0 || $errAuthor>0 || $errEditor>0 ||  $errPublisher > 0 || $errManager>0 || $errPrevilage>0 || $errSearchpage>0) 
            header("Location:" . APP_URL . "error");
        else {
            $permissionResult = Model::executeQry($permissionSql);
            return $permissionResult;
        }
        
    }
    
    
 }
 
 /* * ****Class to manage Admin Links********************
  '	By	 	 : T Ketaki Debadarshini	'
  '	On	 	 : 3-Sept-2015        '
  ' Procedure Used       : USP_ADMIN_GL,USP_ADMIN_PL            '
 * ************************************************** */
class clsAdminLinks extends Model {

       // Function To Manage Admin Globallink By::T Ketaki Debadarshini   :: On::3-Sept-2015  
       public function manageAdminGLinks($action,$glId,$glName)
        {
            $glSql = "CALL USP_ADMIN_GL('$action',$glId,'$glName',@out);";
            $glResult = Model::executeQry($glSql);
            return $glResult;
        }
    
      // Function To Manage Admin Primarylink By::T Ketaki Debadarshini   :: On::3-Sept-2015  
       public function manageAdminPLinks($action,$plId,$glId,$plName,$plUrl)
        {
            $plSql = "CALL USP_ADMIN_PL('$action',$plId,$glId,'$plName','$plUrl',@out);";
          //echo $plSql;
            $plResult = Model::executeQry($plSql);
            return $plResult;
        }
       
    
 }
?>