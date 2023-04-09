<?php 
/* * ****Class to manage User Profile details********************
  '	By	 	       : Ashok Kumar Samal	'
  '	On	 	       : 23-JUL-2016        '
  ' Procedure Used : USP_USER_PROFILE   '
 * ************************************************** */
class clsUserProfile extends Model {

// Function To Manage user Details By::Rasmi Ranjan Swain   :: :: On:: 23-May-2016
    public function manageUser($action,$userId,$portalType,$portalDepId,$deptId,$desgId,$fullName,$gender,$birthdate,$joindate,$qualification,$specialization,$hobby,$image,$ofcphone,$mobno,$email,$address,$loginId,$passwd,$publishsts,$publishon,$adminPrevilage,$passwordChk,$createdBy,$archiveSts,$slno)
    {
        $userSql = "CALL USP_USER_PROFILE('$action','$userId','$portalType','$portalDepId','$deptId','$desgId','$fullName','$gender','$birthdate','$joindate','$qualification','$specialization','$hobby','$image','$ofcphone','$mobno','$email','$address','$loginId','$passwd','$publishsts','$publishon','$adminPrevilage','$passwordChk',$createdBy,$archiveSts,$slno,@out);";
       //echo $userSql;exit;
        $errLoginid          = Model::isSpclChar($loginId);
        $errAction           = Model::isSpclChar($action);
      
        if ($errAction > 0 || $errLoginid > 0)
            header("Location:" . APP_URL . "error");
        else {
            $userResult = Model::executeQry($userSql);
            return $userResult;
        }
    }
    
    // Function To Add Update user Details  By::Rasmi Ranjan Swain   :: On::01-Sep-2015    
    function getUserSlNo()
    {
            $maxSLResult	= $this->manageUser('CM',0,0,0,0,0,'','0','','','','','','','','','','','','','0','0','0','0','0','0','0');
            $maxSLRow		= mysqli_fetch_array($maxSLResult);
            $maxSlNo		= ($maxSLRow['MAX_SL']>0)?$maxSLRow['MAX_SL']:1;
            return $maxSlNo;
    }
    
    // Function To Add Update user Details  By::Rasmi Ranjan Swain   :: On::31-Aug-2015    
    
    public function addUpdateuser($id)
    {
        
        $arrResult         	= array();
        $numLOId   			= 0;
        $numDEPId  			= $_POST['DdlDepartment'];
        $numDESId  			= $_POST['DdlDesignation'];
        $txtName   			= htmlspecialchars(addslashes($_POST['txtName']), ENT_QUOTES);
        $radGender 			= $_POST['radGender'];
        $hdnPassWord 		= $_POST['hdnPassWord'];
        $intSlno 			= $_POST['hdnSLNo'];
		$txtDOB				= $_POST['txtDOB'];
        $txtBirthDate       = $this->dbDateFormat($txtDOB);
		$txtJoinDate        = '';
        $txtQualification   = htmlspecialchars($_POST['txtQualification'],ENT_QUOTES);
        $txtSpecialisation  = '';
        $txtHobby           = '';
        $txtImageFile       = $_FILES['fileDocument']['name'];
        if ($txtImageFile != '') {
            $extension          = pathinfo($txtImageFile, PATHINFO_EXTENSION);
            $formattedFileName  = 'USER_' . time() . '.' . $extension;
        }
        $prevImageFile      = $_POST['hdnImageFile'];
        $txtPhNo            = htmlspecialchars($_POST['txtOffPh'],ENT_QUOTES);
        $txtMobileNo        = htmlspecialchars($_POST['txtMobile'],ENT_QUOTES);
        $txtEmail           = $_POST['txtEmail'];
        $txtAddress         = '';
        $txtUserId          = htmlspecialchars($_POST['txtUser'],ENT_QUOTES);
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
       
        
        $radStatus          = 1;
        $ImageSize          = $_FILES['fileDocument']['size'];
        $ImageTemp          = $_FILES['fileDocument']['tmp_name'];        					
        $chkPrev            = $_POST['chkPrevilige'];        
        $adminPrivilege     = 0;
        $privilege          = 3;
        
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
        $errName             = Model::isSpclChar($txtName);     
        $errQualification    = Model::isSpclChar($_POST['txtQualification']);
        $errPhNo             = Model::isSpclChar($_POST['txtOffPh']);
        $errMobileNo         = Model::isSpclChar($_POST['txtMobile']);
        $errEmail            = Model::isSpclChar($_POST['txtEmail']);
        $publishon           = 0 ;
        $outMsg              = '';
        $errFlag             = 0 ;
        $flag                = ($id != 0) ? 1 : 0;
        $action              = ($id == 0) ? 'A' : 'U';
        
       
        if($txtName == ''){
            $errFlag        = 1;
            $outMsg         = "Mandatory Fields should not be blank";
        }
        else if($errName>0 || $errQualification>0 || $errPhNo>0 || $errMobileNo>0 || $errEmail>0)
        {
            $outMsg	= "Special Characters are not allowed";
            $errFlag	= 1;
        }
         else if ($ImageSize > size1MB) {
            $errFlag               = 1;
            $flag                  = 1;
            $outMsg = 'File size can not more than 1 MB';
        }
        $dupResult = $this->manageUser('CD',$id,0,0,0,0,$txtName,'0','','','','','','','','','','','','','0','0','0','0','0','0','0');
        
        if($errFlag==0){
                if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                if ($numRows > 0) {
                    $outMsg = 'User already exists';
                    $errFlag = 1;
                    $flag   = 1;
                } else {
					$radPortalType          = $_POST['radPortalType'];
        			$ddlPortalDepartment    = ($radPortalType==2)?$_POST['ddlPortalDepartment']:0;
                    $result = $this->manageUser($action,$id,$radPortalType,$ddlPortalDepartment,$numDEPId,$numDESId,$txtName,$radGender,$txtBirthDate,$txtJoinDate,$txtQualification,$txtSpecialisation,$txtHobby,$formattedFileName,$txtPhNo,$txtMobileNo,$txtEmail,'',$txtUserId,$encrypted_pass,$radStatus,$privilege,$adminPrivilege,0,USER_ID,0,$intSlno);
                    if ($result)
                        $outMsg = ($action == 'A') ? 'User added successfully ' : 'User updated successfully';
                    if ($txtImageFile != '') {
                        if (file_exists("uploadDocuments/UserProfile/" . $prevImageFile) && $prevImageFile != '') {
                            unlink("uploadDocuments/UserProfile/" . $prevImageFile);
                        }
                        move_uploaded_file($ImageTemp, "uploadDocuments/UserProfile/" . $formattedFileName);
                    }
                }
            }
        }
        
     
        $intLocId       		= ($errFlag == 1) ? $numLOId : 0;
        $intDeptId      		= ($errFlag == 1) ? $numDEPId : 0;
        $intDesigId      		= ($errFlag == 1) ? $numDESId : 0;
        $strFullname     		= ($errFlag == 1) ? htmlentities($txtName) : '';
        $intGender       		= ($errFlag == 1) ? $radGender : 1;
        $strDateofjoin   		= ($errFlag == 1) ? htmlentities($txtJoinDate) : '';
        $strDateofbirth   		= ($errFlag == 1) ? htmlentities($txtBirthDate) : '';
        $strQualification  		= ($errFlag == 1) ? htmlentities($txtQualification): '';

        $intSlno          		= ($errFlag == 1) ? htmlentities($intSlno) : '';
        $strHobby        		= ($errFlag == 1) ? htmlentities($txtHobby) : '';
        $strPhno    			= ($errFlag == 1) ? htmlentities($txtPhNo) : '';
        $strMobno   			= ($errFlag == 1) ? htmlentities($txtMobileNo) : '';
        $strEmail   			= ($errFlag == 1) ? htmlentities($txtEmail) : '';
        $strFileName   			= ($errFlag == 1) ? htmlentities($formattedFileName) : '';
        $strUserid    			= ($errFlag == 1) ? htmlentities($txtUserId) : '';
        $strPassword    		= ($errFlag == 1) ? htmlentities($encrypted_pass ): '';
        $intAdminpre  			= ($errFlag == 1) ? htmlentities($adminPrivilege) : '';
        $intPrevilage   		= ($errFlag == 1) ? htmlentities($privilege) : '';
        
        $arrResult = array('msg' => $outMsg, 'flag' => $flag, 'intLocId' => $intLocId,'intDeptId' => $intDeptId,'intDesigId' => $intDesigId,'strFullname' => $strFullname,'intGender' => $intGender,'strQualification' => $strQualification,'intSlno' => $intSlno,'strPhno' => $strPhno, 'strMobno' => $strMobno, 'strEmail' => $strEmail, 'strFileName' => $strFileName, 'strUserid' => $strUserid, 'intAdminpre' => $intAdminpre, 'intPrevilage' => $intPrevilage);
        return $arrResult;
    
    }
    
    // Function To read user Details  By::Rasmi Ranjan Swain   :: On::2-Aug-2015     
    public function readUser($id)
    {
        $result = $this->manageUser('R',$id,0,0,0,0,'',0,'','','','','','','','','','','','',0,'0',0,0,0,0,0);
        if (mysqli_num_rows($result) > 0) {

            $row            	= mysqli_fetch_array($result);
            $intLocId       	= $row['INT_LOCATION_ID'];
			$intPortalType		= $row['INT_PORTAL_TYPE'];
			$intPortalDepId		= $row['INT_PORTAL_DEPARTMENT_ID'];
            $intDeptId      	= $row['INT_DEPARTMENT_ID'];
            $intDesigId      	= $row['INT_DESIGNATION_ID'];
            $strFullname     	= $row['VCH_FULL_NAME'];
            $intGender       	= $row['TIN_GENDER'];
            $strDateofjoin   	= $row['VCH_DATE_OF_JOIN'];
            $strDateofbirth   	= $row['VCH_DATE_OF_BIRTH'];
            $strQualification  	= $row['VCH_QUALIFICATION'];
            $intSlno          	= $row['INT_SLNO'];
            $strHobby        	= $row['VCH_HOBBY'];
            $strPhno    		= $row['VCH_PH_NO'];
            $strMobno   		= $row['VCH_MOBILE_NO'];
            $strEmail   		= $row['VCH_EMAIL'];
            $strFileName   		= $row['VCH_IMAGE'];
            $strUserid    		= $row['VCH_USER_ID'];
            $strPassword    	= $row['VCH_PASSWORD'];
            $intAdminpre  		= $row['INT_ADMIN_PRIVILEGE'];
            $intPrevilage   	= $row['INT_PREVILIGE_STATUS'];
        }

        $arrResult = array('intLocId' => $intLocId,'strPassword' => $strPassword,'intDeptId' => $intDeptId,'intDesigId' => $intDesigId,'strFullname' => $strFullname,'intGender' => $intGender,'strQualification' => $strQualification,'intSlno' => $intSlno,'strPhno' => $strPhno, 'strMobno' => $strMobno, 'strEmail' => $strEmail, 'strFileName' => $strFileName, 'strUserid' => $strUserid, 'intAdminpre' => $intAdminpre, 'intPrevilage' => $intPrevilage, 'intPortalType' => $intPortalType,'intPortalDepId' => $intPortalDepId);
        return $arrResult;
      }
      
      // Function To Delete User and Other actions  By::Rasmi Ranjan Swain   :: On:: 28-Aug-2015
    public function deleteUser($action, $ids) {
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
                        unlink("uploadDocuments/UserProfile/" . $strImageFile);
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
         }
    
 }

 ?>