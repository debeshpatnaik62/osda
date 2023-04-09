<?php 
/*
    File Name               : cronSkillEmail.php
    Description             : This is to send email and update status.
    Author Name             : Rahul Kumar Saw
    Date Created            : 24-May-2022
    Update History          : <Updated by>            <Updated On>        <Remarks>
                       
    Created By              : Rahul Kumar Saw
    Created On              : 24-May-2022
    ---------------------------------------------------------------------------------*/
   //print_r($_REQUEST);exit;
    error_reporting(E_ALL);
    date_default_timezone_set('Asia/Kolkata');
    ini_set("display_errors", 0);
    ini_set('max_input_vars', '20000');
    $rootPath   = $_SERVER['DOCUMENT_ROOT'];
    $dir        = 'OSDA/';
    include_once($rootPath.'/'.$dir."config.php");
    //when our script started to run.
     $executionStartTime = microtime(true);
    
    include_once( CLASS_PATH.'clsVenueTagged.php');
    $objVenueTag         = new clsVenueTagged;
   $id             = (isset($_REQUEST['PARAM']))?$_REQUEST['PARAM']:0;
   $idArr          = $objVenueTag->decrypt($id);
   $exId           = explode('=', $idArr);
   $venueID        = $exId[0];
   $examDate       = $exId[1];

    $result              = $objVenueTag->manageVenueTagged('E',0,'',0,0,0,$venueID,$examDate,'00:00:00',0,'','',0);
    $count               = $result->num_rows;
    try 
    {
        if ($count > 0) 
        {
           $query1      = '';         
            while ($row = $result->fetch_array()) 
            {
                $applicantname = $row['applicantName'];
                $emailId       = $row['vchEmailId'];
                $mobileNo      = $row['vchPhoneno'];
                $tagId         = $row['intTagId'];
                $applicantId   = $row['intApplicantId'];

                if (SEND_MAIL == "Y")
                {       
                    $strUserTo[] = $emailId;
                    $strUserFrom = SKILLCOM_EMAIL;
                    $url         = SITE_URL."skill-competition-login";
                    $strsubject = "OSDA :: Skill Competition Venue Details" ;

                    $strUserMessage = "Dear <strong>" . $applicantname . "</strong></br>";
                    $strUserMessage .= "<div> <br>";
                    $strUserMessage .= "</div>";
                    
                    $strUserMessage .= 'Your exam center allocated now you can login the application by clicking on this <a href='.$url.'> Login </a></br></br>';
                    
                    $strUserMessage .= "<div> <br>";
                    $strUserMessage .= "</div>";
                    $strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

                    $userdata['from'] = $strUserFrom;
                    $userdata['to'] = $strUserTo;
                    $userdata['name'] = 'Odisha Skill Development Authority';
                    $userdata['sub'] = $strsubject;
                    $userdata['message'] = $strUserMessage;
                    $jsUserData = json_encode($userdata);
                    $mailUserRes = Model::sendAuthMailSkillComp($jsUserData);
                    $mailResp   = json_decode($mailUserRes);
                    
                    if($mailResp->msg=='Success') {
                    $resultUpdate = $objVenueTag->manageVenueTagged('UE',0,'',$applicantId,0,0,$venueID,$examDate,'00:00:00',0,'','',0);
                    }

                }
            }
                            $count        =  $resultUpdate->num_rows; 
                            $resultUpdate =  $resultUpdate->fetch_array();
                            if($resultUpdate['@P_STATUS']>0){
                                 $msg="Email Sent Successfully. ";
                                 
                                 $executionEndTime = microtime(true);
                 
                        
                                $seconds = $executionEndTime - $executionStartTime;
                             
                                echo $msg." this script took $seconds to execute.";


                             }else{
                                 echo "Some error occured updating the email status"; 
                             }
        }
    }catch(Exception $e)
    {
                echo $e->getMessage();
    }












