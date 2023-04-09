<?php
/* ================================================
	File Name         	  : indexInner.php
	Description		  : This is for Login.	
	
 *      Devloped By               : T Ketaki Debadarshini
 *      Devloped On               : 31-Aug-2015
	Update History		  :
	<Updated by>				<Updated On>		<Remarks>
 *          1 T Ketaki Debadarshini             05-April-2017           Google recaptcha implemented
	include Class             :  clsUserProfile
	Functions                 : doLogin(),forgotPassword();
	==================================================*/

	
        //=========== Unset session values ==============
	unset($_SESSION['adminConsole_userID']);
	unset($_SESSION['adminConsole_UserName']);
	unset($_SESSION['adminConsole_FullName']);
    unset($_SESSION['userPrivilege']);
	unset($_SESSION['portalType']);
	unset($_SESSION['adminPrivilege']);
    unset($_SESSION['userImage']);
	unset($_SESSION['userPassword']);
        session_regenerate_id();

        
	//====== Button click ===========================
	 //google recaptcha
       // require_once SITE_PATH. '/controller/autoload.php'; 
      //  $recaptcha     = new \ReCaptcha\ReCaptcha(RE_CAPTHA_SCRTKEY);
         
        
         $displayFlag = 0;
         $objUser        = new clsUserProfile;	
        /* Login */
        if(isset($_POST['btnLogin']))
        {            
           
           
            $strCaptcha		= $_POST["txtCaptcha"];
            $strUser        = trim($_POST['htxtuserID']);
            //$enterPass      = $_POST['henterPassword'];
            
            if($_SESSION['captcha']==$strCaptcha)
            {
                $displayFlag            = 1;
                $strUser                = trim($_POST['htxtuserID']);
                $strPass                = trim($_POST['htxtPassword']);
                $intsalt                = $_SESSION['salt'];

                $blankUser              = Model::isBlank($strUser);
                $errUser                = Model::isSpclChar($strUser);
                $lenUser                = Model::chkLength('max',$strUser,50);
                $flag                   = 0;
                if($blankUser > 0)
                {                                
                    $flag           = 1;
                    $out_msg        = "Mandatory Fields should not be blank";

                }
                else if($lenUser>0)
                {

                    $flag           = 1;
                    $out_msg        = "Length should not exceed maxlength";
                }
                else if($errUser>0)
                {                                 
                    $flag           = 1;
                    $out_msg        = "Special Characters are not allowed";
                }

                if($flag==0){
                        $result	= $objUser->manageUser('VP','0','0','0','0','0','','0','','','','','','','','','','',$strUser,'','0','0','0','0','0','0','0');
                        if(mysqli_num_rows($result)>0)
                        {
                                $row		= mysqli_fetch_assoc($result);
                                $strId		= $row["INT_ID"];
                                $strUserId      = $row["VCH_USER_ID"];
                                $strPassword	= $row["VCH_PASSWORD"];	
                                $strFullname	= $row['VCH_FULL_NAME'];
                                $intDesignation	= $row['INT_DESIGNATION_ID'];
                                $strImage       = $row['VCH_IMAGE'];
                                $strCheckPass	= $row['INT_PASSWORD_CHECK'];
                                $privilege  	= $row['INT_PREVILIGE_STATUS'];
                                $adminPrivilege	= $row['INT_ADMIN_PRIVILEGE'];
                                $pubstatus      = $row['INT_PUBLISH_STATUS'];		
                                $portalType 	= $row['INT_PORTAL_TYPE'];	
                                $instituteId    = $row['INT_INSTITUTE_ID'];	
                                if($strUserId==$strUser && $pubstatus ==1)
                                        $flag=1;		
                                else
                                        $flag=0;

                                if($flag==1 && md5($strPassword.$intsalt)==$strPass)		
                                {

                                        session_regenerate_id();
                                        $_SESSION['adminConsole_userID']	= $strId;
                                        $_SESSION['institute_id']           = $instituteId;
                                        $_SESSION['adminConsole_UserName']	= $strFullname;
                                        $_SESSION['userPrivilege']              = $privilege;
                                        $_SESSION['portalType']                 = $portalType;
                                        $_SESSION['adminPrivilege']             = $adminPrivilege;
                                        $_SESSION['userImage']                  = $strImage;
                                        $_SESSION['userPassword']               = $strPassword;

                                        $Logtxt = "LoginUser->".$strUser.":: LoginTime->".date('d-M-Y H:i:s')."Attempt->Success=======";
                                        $logFilePath=APP_PATH."loginLogs/loginFile.txt";
                                       
                                        file_put_contents($logFilePath, $Logtxt.PHP_EOL, FILE_APPEND | LOCK_EX);

                                        if($strCheckPass==0)
                                        header("Location: ".APP_URL."changePassword");
                                        else
                                        header("Location: ".APP_URL."dashboard/");

                                }
                                else
                                {
                                        if($pubstatus ==1)
                                                $out_msg = 'Authentication Failed';//'Invalid User ID and Password';
                                        else
                                                $out_msg = 'You are not Authorised User';

                                                $Logtxt = "LoginUser->".$strUser.":: LoginTime->".date('d-M-Y H:i:s')."::Attempt->Failure::"."Message->".$out_msg."======";
                                }	
                        }
                        else
                        {
                                $out_msg = 'This user is not active';
                                $Logtxt = "LoginUser->".$strUser.":: LoginTime->".date('d-M-Y H:i:s')."::Attempt->Failure::"."Message->".$out_msg."======";					
                        }
                }
            }
            else
            {
                    $out_msg		= "The Captcha code is invalid! Please try it again"; 
                    $Logtxt = "LoginUser->".$strUser.":: LoginTime->".date('d-M-Y H:i:s')."::Attempt->Success::"."Message->".$out_msg."======";
            } 
            $logFilePath=APP_PATH."loginLogs/loginFile.txt";
            file_put_contents($logFilePath, $Logtxt.PHP_EOL , FILE_APPEND | LOCK_EX);   
            
        }	
        
        /* Forgot Password */
        if(isset($_POST['btnFPassword']))
	{
            $displayFlag        = 2;
            $strUser		= trim($_POST['htxtuserID']);
            $strEmail		= trim($_POST["txtEmailID"]);				
            $strPass		= "osda@123";
            $strMD5Pass		= md5($strPass);
            $MailMessage	= "";
            $headers		= "";	
          
            $strCaptcha		= $_POST["txtCaptcha"];
            if($_SESSION['captcha']==$strCaptcha)
            {
                $blankUser              = Model::isBlank($strUser);
                $errUser                = Model::isSpclChar($strUser);
                $lenUser                = Model::chkLength('max',$strUser,50);
                $flag                   = 0;
                if($blankUser > 0)
                {                                
                    $flag               = 1;
                    $out_msg_fp         = "Mandatory Fields should not be blank";

                }
                else if($lenUser>0)
                {

                    $flag              = 1;
                    $out_msg_fp        = "Length should not exceed maxlength";
                }
                else if($errUser>0)
                {                                 
                    $flag               = 1;
                    $out_msg_fp         = "Special Characters are not allowed";
                }

                if($flag==0){
                    $result             = $objUser->manageUser('VP','0','0','0','0','0','','0','','','','','','','','','','',$strUser,'','0','0','0','0','0','0','0');

                    if(mysqli_num_rows($result)>0)
                    {
                        $row		= mysqli_fetch_assoc($result);
                        $strUserId	= $row["VCH_USER_ID"];
                        $strEmailId	= $row["VCH_EMAIL"];
                    }

                    if($strEmailId!=$strEmail)
                    {
                        $out_msg_fp     = 'Incorrect Email Id';

                    }
                    else						
                    {	
                         $result	= $objUser->manageUser('CP','0','0','0','0','0','','0','','','','','','','','','','',$strUser,$strMD5Pass,'0','0','0','0','1','0','0');

                        if($result)
                        {
                            $Subject="Password Details";
                            $strFrom= portalEmail;
                            $MailMessage.="<div style='margin-bottom:10px'>Dear</div>";
                            $MailMessage.="<div style='margin-bottom:10px'>Below is the password Details</div>";
                            $MailMessage.="<table cellspacing='0' cellpadding='2'>";
                            $MailMessage.="<tr>";
                            $MailMessage.="<td>User ID&nbsp;</td>";
                            $MailMessage.="<td>".$strUser."</td>";
                            $MailMessage.="</tr>";
                            $MailMessage.="<tr>";
                            $MailMessage.="<td>Password&nbsp;</td>";
                            $MailMessage.="<td>".$strPass."</td>";
                            $MailMessage.="</tr>";
                            $MailMessage.="</table>";
                            $MailMessage.="<div style='margin-bottom:20px'>Please change your password Immediately after login.</div>";
                            $MailMessage.="<div style='margin-bottom:10px'>Don't Reply on this mail</div>";	
                            if(sendMail=='Y')
                              $objUser->Sendmail($strFrom,$strEmail,$Subject,$MailMessage);

                            $out_msg_fp         ="Please check mail to get Password";
                        }
                    }
                  }
                }
                else
                {
                        $out_msg_fp		= "The Captcha code is invalid! Please try it again"; 
                }    
               
            
        }
	
    
?>