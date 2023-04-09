<?php
    /* ================================================
    File Name         	: addReportInner.php

    ==================================================*/	
    //========== create object of clsReport class===============	
    include_once( CLASS_PATH.'clsReport.php');
    $objReport        = new clsReport;	
    $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit      = ($id>0)?'Update':'Submit';
    $strReset       = ($id>0)?'Cancel':'Reset';
    $strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewReport/".$glId."/".$plId. "';":"$('#userImage').hide();clearEditors();";
    //========== Permission ===============	
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = $_SESSION['adminConsole_userID'];   
    $explPriv      = $objReport->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewReport/".$glId."/".$plId. "'</script>";  

    //========== Default variable ===============				
    $intWinStatus    = 1;
    $flag            = 0;  
    $errFlag         = 0;
    $intLinkType     = 1;
    $intTempletType  = 1;	
    $outMsg          = '';
    $intReportCategoryId=0;
    $selSelectCategory=0;
    //=========== For editing ======================
    if(isset($_REQUEST['ID']))
    {
        $btnValue	 = 'Update';
        $strTab          = 'Edit';		

        //============ Read value for updation ===========	
        $result          = $objReport->readReport($id);
       //print_r($result);exit;
        $strReportHeadline    =  htmlspecialchars_decode($result['strReportHeadline'],ENT_QUOTES);
        $strReportHeadlineO   =  htmlspecialchars_decode($result['strReportHeadlineO'],ENT_QUOTES);
        

        $strReportImage     =  $result['strReportImage'];
        $fileExt         = pathinfo($strReportImage, PATHINFO_EXTENSION);

  
        $strReportFile     =  $result['strReportFile'];
        $fileExt         = pathinfo($strReportFile, PATHINFO_EXTENSION);

       
        $strPublishDate     =  $result['strPublishDate']; 
       
        $intReportCategoryId     = $result['intSelectCategoryId'];

        $strDescE            =  $result['strDescE'];
        $strDescO            =  $result['strDescO'];
        
    }

    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
    {
       $result              = $objReport->addReport($id);
       $outMsg              =  $result['msg']; 
       $flag                =  $result['flag'];          
       $strReportHeadline   =  htmlspecialchars_decode($result['strReportHeadline'],ENT_QUOTES);
       $strReportHeadlineO  =  htmlspecialchars_decode($result['strReportHeadlineO'],ENT_QUOTES);
       $strReportImage         =  $result['strReportImage'];
        $strReportFile       =  $result['strReportFile'];
      
       $strPublishDate         =  $result['strPublishDate']; 
       $strCaption          =  $result['strCaption'];
       $strPlace            =  $result['strPlace'];

       $strCaption          =  $result['strCaption'];
       $strPlace            =  $result['strPlace'];

       $strDescE            =  $result['strDescE'];
       $strDescO            =  $result['strDescO'];
       
       if($flag==0 && $id>0)
        $redirectLoc	=  APP_URL."viewReport/".$glId."/".$plId."/".$id;  
       else if($flag==0 && $id==0)  
          $redirectLoc	=  APP_URL."viewReport/".$glId."/".$plId;
    }
?>