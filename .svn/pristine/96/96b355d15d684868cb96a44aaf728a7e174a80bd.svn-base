<?php

  //print_r($_SESSION);exit;
    include_once( CLASS_PATH.'clsSkillTP.php');
    $objTP        = new clsSkillTP;  
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
    $explPriv       = $objTP->checkPrivilege($userId, $glId, $plId, $pageName, 'V');
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
        
        $vchOrgName          = (isset($_REQUEST['vchOrgName']) && $_REQUEST['vchOrgName']!= '')?$_REQUEST['vchOrgName']:'';   
        $tinApproveStatus          = (isset($_REQUEST['tinApproveStatus']) && $_REQUEST['tinApproveStatus']!= '')?$_REQUEST['tinApproveStatus']:'';   
        /*$strStartDt         = (isset($_REQUEST['txtStartDt'])&& $_REQUEST['txtStartDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtStartDt'])):'0000-00-00';
        $strEndDate         = (isset($_REQUEST['txtEndDt'])&& $_REQUEST['txtEndDt']!='')?date('Y-m-d',strtotime($_REQUEST['txtEndDt'])):'0000-00-00';*/
        $vchRefNumber      = (isset($_POST['vchRefNumber']) && $_POST['vchRefNumber']!= '')?$_POST['vchRefNumber']:'';
   
         //============= search function =================
         if(isset($_REQUEST['btnSearch']))
        {
            $intPgno    = 1;
            $intRecno   = 0;
        }

        // ============= update program request status=========By::Rahul ON::23-11-2021

         if(isset($_REQUEST['hdnAction']) && ($_REQUEST['hdnAction']=='U' || $_REQUEST['hdnAction']=='R'))
        {
        
        $intAppId   = (isset($_POST['proStatusId']) && $_POST['proStatusId']!= '')?$_POST['proStatusId']:0;
        $intRejId   = (isset($_POST['proRejectId']) && $_POST['proRejectId']!= '')?$_POST['proRejectId']:0;
        $userTId     = (isset($_POST['userId']) && $_POST['userId']!= '')?$_POST['userId']:'';
        $remark     = (isset($_POST['txtRemark']) && $_POST['txtRemark']!= '')?$_POST['txtRemark']:'';
        if($intAppId>0)
        {
            $programStatus   = 1;
            $intId           = $intAppId;
        } else if($intRejId >0)
        {
            $programStatus   = 2;
            $intId           = $intRejId;
        }
        
        $arrSConditions=array('intId'=>$intId ,'programStatus'=>$programStatus,'userId'=>$userTId,'remark'=>$remark,'updatedBy'=>$userId);

            $result     = $objTP->manageskillTP('AS', $arrSConditions);

            if ($result)
             {
                $numRow = $result->fetch_array();
                $msg = $numRow[0];
                $arrEConditions=array('Id'=>$intId);
                $resultE     = $objTP->manageskillTP('R', $arrEConditions);
                $row         = $resultE->fetch_array();
                $orgName     = $row['vchConName'];
                $perEmail    = $row['vchConEmail'];
                $perMobile   = $row['vchConMobile'];
                $orgUserId   = $row['vchUserId'];
                $pwd         = 'admin@123';

                
                if (SEND_MAIL == "Y")
                {                        
                            $strUserTo[] = $perEmail;
                            $strUserFrom = DEVELOP_EMAIL;
                            $url         = APP_URL;
                            $strsubject = "OSDA :: Training Partner Registration Status" ;

                            $strUserMessage = "Dear <strong>" . $orgName . "</strong></br>";
                            $strUserMessage .= "<div> <br>";
                            $strUserMessage .= "</div>";
                            if($programStatus==1)
                            {
                            $strUserMessage .= 'Your Registration request has been approved and your user id is <strong> '.$orgUserId.' </strong> and Passward is <strong> '.$pwd.' </strong> Now you can login the application by clicking on this <a href='.$url.'><strong> Login </strong> </a></br></br>';
                            }
                            else 
                            {
                            $strUserMessage .= 'Your Registration request has been rejected by the OSDA Officer and the remarks is '.$remark;                           
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
                            //print_r($mailUserRes);exit;
                }
                if(SEND_MESSAGE=='Y')
                { 
                        if($programStatus==1)
                        {
                        $templateId  = '1007510988930490904';
                        $mobileMessage = 'Your Registration request has been approved and your User Id is '.$orgUserId.' and Password is '.$pwd.'. Team OSDA';
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
        $outMsg = $objTP->deleteskillTP($qs,$ids);
    }        
        if($isPaging==0){
           
            $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>20,'vchOrgName'=>$vchOrgName,'vchRefNumber'=>$vchRefNumber,'tinApproveStatus'=>$tinApproveStatus);

            $result     = $objTP->manageskillTP('PG', $arrConditions); 
    }
                
    else
    {
            $intPgno    = 1;
            $intRecno   = 0;
            $arrConditions=array('reportID'=>$intRecno ,'pageCount'=>0,'vchOrgName'=>$vchOrgName,'vchRefNumber'=>$vchRefNumber,'tinApproveStatus'=>$tinApproveStatus);
            $result                 = $objTP->manageskillTP('V',$arrConditions);
          //  print_r($result);exit;
    }
           $intPgSize                   = 20;

       $totalResult                 = $objTP->manageskillTP('V',$arrConditions);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;
      
        
        
    
?>