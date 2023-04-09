<?php

  //print_r($_SESSION);exit;
    include_once( CLASS_PATH . 'clsSkillInsRegd.php');
    $objIns = new clsSkillInsRegd;
 
    $id           = (isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))?htmlspecialchars($_REQUEST['ID'],ENT_QUOTES):0;  
    $isPaging      = 0;
    $pgFlag    = 0;
    $intPgno       = 1;
    $intRecno      = 0;
    $ctr       = 0;
    //======================= Permission ===========================*/
    $glId           = $_REQUEST['GL'];
    $plId           = $_REQUEST['PL'];
    $pageName       = $_REQUEST['PAGE'].'.php';
    $userId         = $_SESSION['adminConsole_userID'];
    $explPriv       = $objIns->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
    $editPriv       = $explPriv['edit'];
    $deletePriv     = $explPriv['delete'];
    $noAdd          = $explPriv['add'];
    $noActive       = $explPriv['active'];
     $noPublish      = $explPriv['publish'];
    //======================= Pagination ===========================*/
    
    if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
        $isPaging=1;
    if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
    {
        $intPgno=$_REQUEST['hdn_PageNo'];
        $pgFlag = 1;
    }
    if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
    {   
        $intRecno=$_REQUEST['hdn_RecNo'];
        $pgFlag = 1;
    }
    if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
    {
        $intRecno   = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
        $intPgno    = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;     
    }
    else    
        unset($_SESSION['paging']);
        
        $vchInsName          = (isset($_REQUEST['vchInsName']) && $_REQUEST['vchInsName']!= '')?$_REQUEST['vchInsName']:'';   
        $vchRefNumber      = (isset($_POST['vchRefNumber']) && $_POST['vchRefNumber']!= '')?$_POST['vchRefNumber']:'';
        $tinApproveStatus          = (isset($_REQUEST['tinApproveStatus']) && $_REQUEST['tinApproveStatus']!= '')?$_REQUEST['tinApproveStatus']:''; 
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
        {
            $intPgno    = 1;
            $intRecno   = 0;
        }

        // ============= update Institute program request status=========By::Rahul ON::23-11-2021

        if(isset($_REQUEST['hdnAction']) && ($_REQUEST['hdnAction']=='U' || $_REQUEST['hdnAction']=='R'))
        {
        
        $intAppId       = (isset($_POST['proStatusId']) && $_POST['proStatusId']!= '')?$_POST['proStatusId']:0;
        $intRejId       = (isset($_POST['proRejectId']) && $_POST['proRejectId']!= '')?$_POST['proRejectId']:0;
        $intProgramId   = (isset($_POST['programId']) && $_POST['programId']!= '')?$_POST['programId']:0;
        $userTId        = (isset($_POST['userId']) && $_POST['userId']!= '')?$_POST['userId']:'';
        $remark         = (isset($_POST['txtRemark']) && $_POST['txtRemark']!= '')?$_POST['txtRemark']:'';
        $allotSeat      = (isset($_POST['txtSeatPro']) && $_POST['txtSeatPro']!= '')?$_POST['txtSeatPro']:'0';
        if($intAppId>0)
        {
            $programStatus   = 1;
            $intId           = $intAppId;
        } else if($intRejId >0)
        {
            $programStatus   = 2;
            $intId           = $intRejId;
        }
        
        $arrSConditions=array('intId'=>$intId ,'programStatus'=>$programStatus,'userId'=>$userTId,'remark'=>$remark,'updatedBy'=>$userId,'programId'=>$intProgramId,'bookedSeat'=>$allotSeat);

            $result     = $objIns->manageSkillInsRegd('AS', $arrSConditions);

            if ($result)
             {
                $numRow = $result->fetch_array();
                $msg = $numRow[0];
                $arrEConditions=array('Id'=>$intId);
                $resultE     = $objIns->manageSkillInsRegd('R', $arrEConditions);
                $row         = $resultE->fetch_array();
                $insName     = $row['vchInsName'];
                $perEmail    = $row['vchConEmail'];
                $perMobile   = $row['vchConMobile'];
                $insUserId   = $row['vchUserId'];
                $pwd         = 'admin@123';

                
                if (SEND_MAIL == "Y")
                {       
                            $strUserTo[] = $perEmail;
                            $strUserFrom = DEVELOP_EMAIL;
                            $url         = APP_URL;
                            $strsubject = "OSDA :: Institute Registration Status" ;

                            $strUserMessage = "Dear <strong>" . $insName . "</strong></br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            if($programStatus==1)
                            {
                            $strUserMessage .= 'Your Registration request has been approved and your user id is <strong> '.$insUserId.' </strong> and Passward is <strong> '.$pwd.' </strong> Now you can login the application by clicking on this <a href='.$url.'><strong> Login </strong></a></br></br>';
                            }
                            else 
                            {
                            $strUserMessage .= 'Your Registration request has been rejected by the OSDA and the remarks is '.$remark;                           
                            }
                            
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            $strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

                            $userdata['from'] = $strUserFrom;
                            $userdata['to'] = $strUserTo;
                            $userdata['name'] = 'Odisha Skill Development Authority';
                            $userdata['sub'] = $strsubject;
                            $userdata['message'] = $strUserMessage;
                            $jsUserData = json_encode($userdata);
                            $mailUserRes = Model::sendAuthMailSkillDevelop($jsUserData);

                }
                if(SEND_MESSAGE=='Y')
                {

                    if($programStatus==1)
                        {
                        $templateId  = '1007510988930490904';
                        $mobileMessage = 'Your Registration request has been approved and your User Id is '.$insUserId.' and Password is '.$pwd.'. Team OSDA';
                        }
                        else 
                        {
                        $templateId  = '1007810326873361707';
                        $mobileMessage = 'Your Registration request has been rejected by the OSDA Officer and the remarks is '.$remark.'. Team OSDA';                          
                        } 
                         $mobileNo=$perMobile.",";
                         $sms = Model::sendSkillSMS($mobileNo,$mobileMessage,$templateId);                                  
                        
                }
                    // mail and sms sent function end
             }
           
        }
         //============= Delete/Active/Inactive function =================
     
    if(isset($_REQUEST['hdn_qs'])&& $_REQUEST['hdn_qs']!='' )
    {
        $qs = $_REQUEST['hdn_qs'];
        $ids    = $_REQUEST['hdn_ids'];
        $outMsg = $objIns->deleteskillInsRegd($qs,$ids);
    }        
        if($isPaging==0){
           
            $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>20,'vchInsName'=>$vchInsName,'vchRefNumber'=>$vchRefNumber,'tinApproveStatus'=>$tinApproveStatus);

            $result     = $objIns->manageSkillInsRegd('PG', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>0,'vchInsName'=>$vchInsName,'vchRefNumber'=>$vchRefNumber,'tinApproveStatus'=>$tinApproveStatus);
            $result                 = $objIns->manageSkillInsRegd('V',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 20;

       $totalResult                 = $objIns->manageSkillInsRegd('V',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>