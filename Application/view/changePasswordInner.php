<?php
/* =========================================================================================
	File Name         	  : changePasswordInner.php
	Description               : This page is to change the password.	
	Date Created		  : 09-Feb-2016
	Created By		  : Rasmi Ranjan Swain
	Developed By		  : Rasmi Ranjan Swain
	Developed On		  : 09-Feb-2016
	Update History		  :
	<Updated by>		    <Updated On>		<Remarks>
	
	Include Files    	  : customModel.php,config.php
	Functions Used		  : manageUser(),isBlank(),chkLength(),isSpclChar()
	========================================================================================*/
	//include_once(CLASS_PATH.'clsUserProfile.php');
	$objUser			= new clsUserProfile;
	$userId				= USER_ID;	
	$outMsg				= '';
	$errFlag			= 0;
	if(isset($_POST['btnSubmit']))
	{
		$txtOldPassword		= trim($_POST["htxtOldPwd"]);
		$txtNewPassword		= trim($_POST["htxtNewPwd"]);	
		
		$isBlankOPwd		= $objUser->isBlank($txtOldPassword);
		$isBlankNPwd		= $objUser->isBlank($txtNewPassword);
		$chkLengthNPwd		= $objUser->chkLength('MIN',$txtNewPassword,8);
		$spclCharOPwd		= $objUser->isSpclChar($txtOldPassword);
		$spclCharNPwd		= $objUser->isSpclChar($txtNewPassword);
		if($isBlankOPwd>0 || $isBlankNPwd>0)
		{
			$outMsg				= "Mandatory field should not be blank.";
			$errFlag			= 1;
		}
		else if($spclCharOPwd>0 || $spclCharNPwd >0)
		{
			$outMsg				= "Special Characters are not allowed.";
			$errFlag			= 1;
		}
		else if($chkLengthNPwd>0)
		{
			$outMsg				= "Password shouldn't be less than 8 characters";
			$errFlag			= 1;
		}
		
                $txtPassword     = $txtOldPassword;//md5($_REQUEST["txtOldPwd"]);
                $txtmNewPassword = $txtNewPassword;//md5($_REQUEST["txtNewPwd"]);
              
		if($errFlag==0)
		{
                    $vbResult = $objUser->manageUser('VP',$userId,'0','0','0','0','','0','','','','','','','','','','','',$txtPassword,'0','0','0','0','0','0','0');
                    if (mysqli_num_rows($vbResult) == 0) {
                        $outMsg  = 'Incorrect Old password';
                        $errFlag = 1;
                    } else {
                        $vpRow     = mysqli_fetch_array($vbResult);
                        $chkPass   = $vpRow['INT_PASSWORD_CHECK'];
                        $strUserid = $vpRow['VCH_USER_ID'];
                       
                        $cpResult  = $objUser->manageUser('CP','0','0','0','0','0','','0','','','','','','','','','','',$strUserid,$txtmNewPassword,'0','0','0','1','1','0','0');
                        if ($cpResult) {
                            $cpRow = mysqli_fetch_row($cpResult);

                           // if ($chkPass == 0)
                              //  echo  "<script>location.href='".APP_URL."dashboard/'</script>" ;
                           // else
                                $outMsg	= "Password Changed Successfully"; 
                            
                            /*$Subject 	 = "Password Details";
                            $strFrom	 = portalEmail;
                            
                            $MailMessage.= "<div style='margin-bottom:10px'>Below is the password Details</div>";
                            $MailMessage.= "<table cellspacing='0' cellpadding='2'>";
                            $MailMessage.= "<tr>";
                            $MailMessage.= "<td>User ID :</td>";
                            $MailMessage.= "<td>".$strUserid."</td>";
                            $MailMessage.= "</tr>";
                            $MailMessage.= "<tr>";
                            $MailMessage.= "<td>Password : </td>";
                            $MailMessage.= "<td>".$txtNewPassword."</td>";
                            $MailMessage.= "</tr>";
                            $MailMessage.= "</table>";
                            $MailMessage.= "<div style='margin-bottom:10px'>Don't Reply on this mail</div>";
                            if(sendMail=='Y')
                                     $objUser->Sendmail($strFrom, $strEmail, $Subject, $MailMessage,$row[0]);*/
                            
                            //$errFlag	=0;
                        }
                    }
                   	
		}
	}
?>