<?php
  /* ================================================
  File Name           : addTimelineInner.php
  Description         : This page is used to add Timeline
    Devloped By        : Ashis kumar Patra
  Devloped On         : 04-12-2018
  <Updated by>        <Updated On>    <Remarks>

  Class Used          : clsTimeline
  Functions Used      : readTimeline(),addUpdateTimeline(), deleteTimeline()
  ==================================================*/  
     include(CLASS_PATH.'clsTimeline.php');

     //============== Create Object of Blog Class =======================//

        $objTimeline            = new clsTimeline;  
        $id                 =(isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
        $strReset           =($id>0)?'Cancel':'Reset';
        $strTab             =($id>0)?'Edit':'Add';
        $strclick           = ($id > 0) ? "window.location.href='" . APP_URL . "viewTimeline/" . $glId . "/" . $plId . "';" : "$('#userImage').hide();";

     //========== Default variable ===============  
      $flag               = 0;  
      $errFlag            = 0;
      $outMsg             = '&nbsp;'; 
      $outMsg             = '&nbsp;'; 
      $pubStatus          = 2;
      $returnParams       = array();
      //$redirectLoc    =  APP_URL."viewNews/".$glId."/".$plId;

    //========== Permission =============== 

        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];
        $explPriv      = $objTimeline->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewTimeline/".$glId."/".$plId."'</script>";  
    
   //=========== For editing ======================
  
  if(isset($_REQUEST['ID']))
  { 
            //============ Read value for updation ===========  
          
      $result            = $objTimeline->readTimeline($id);
      //echo "<pre>";print_r($result);exit;
      $strDate           = $result['strDate'];
      $strFileName       = $result['strFileName'];
      $strDescriptionE    = htmlspecialchars_decode($result['strDescriptionE'],ENT_QUOTES);
      $strDescriptionO    = htmlspecialchars_decode($result['strDescriptionO'],ENT_QUOTES);
      $redirectLoc        = APP_URL."viewTimeline/".$glId."/".$plId;
  }

  //============ Button Submit ===================
  if(isset($_POST['btnSubmit']))
  {         
           $result            = $objTimeline->addUpdateTimeline($id);
          
           $outMsg            = $result['msg']; 
           $flag              = $result['flag']; 
           $returnParams      = $result['returnParams']; 
           $strDate           = $returnParams['txtDate'];
           $strFileName       = $returnParams['fileDoc'];
           $strDescriptionE   = $returnParams['txtDesc'];
           $strDescriptionO   = $returnParams['txtDescO'];
            if($flag==0 && $id>0){
              $redirectLoc	=  APP_URL."viewTimeline/".$glId."/".$plId."/".$id;  
            }else if ($flag==0 && $id==0) 
              //$redirectLoc	=  APP_URL."viewBlock";  
            $redirectLoc	=  APP_URL."viewTimeline/".$glId."/".$plId;
            

    }
?>