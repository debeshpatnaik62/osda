<?php

    /* ================================================
    File Name         	: addLogoInner.php
    Description		: This page is used to Add logo deails.
    Developed By	: T Ketaki Debadarshini
    Developed On	: 17-Nov-2015
    Update History	:
    <Updated by>	<Updated On>		<Remarks>

    Class Used		: commonClass,manageLogo
    ================================================== */
   //============ Create object of class ============
   include_once( CLASS_PATH.'clsLogo.php');
   $obj        = new clsLogo;
   $id = 0;
   
   
    //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];
        $explPriv      = $obj->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewLogo/".$glId."/".$plId."'</script>";                             
               
        //========== Default variable ===============				
	$intWinStatus    = 1;
	$flag            = 0;  
        $errFlag         = 0;
        $intLinkType     = 1;
        $intTempletType  = 1;	
  
    $pubStatus      = 0;
    $outMsg          = '';
    //=========== For editing ======================
    
    //Fetch the Dafault Record
        $Resultdefault   = $obj->manageLogo('VA',$id,'','','','','','','',0,0,0,0);
       // $dafault = mysqli_num_rows($Resultdefault); 
     if(mysqli_num_rows($Resultdefault)>0)
        {
            $defaultrow         = mysqli_fetch_array($Resultdefault);

            $id             = $defaultrow['INT_LOGO_ID'];  
            $strTitle       = $defaultrow['VCH_LOGO_TITLE']; 
            $strTitleO       = $defaultrow['VCH_LOGO_TITLE_O']; 
            
            $strFileName    = $defaultrow['VCH_IMAGE']; 
            $strFileNameH   = $defaultrow['VCH_IMAGE_H']; 
            $strFileNameO   = $defaultrow['VCH_IMAGE_O']; 
            
            $strFileDocumentInner    =  $defaultrow['VCH_INNERIMAGE'];
            $strFileDocumentInnerO   =  $defaultrow['VCH_INNERIMAGE_O'];
           
        }
        
        $strSubmit      = ($id>0)?'Update':'Submit';
        $strReset       = ($id>0)?'Cancel':'Reset';
        $strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewLogo/".$glId."/".$plId."';":"";
	/*if(isset($_REQUEST['ID']))
	{
            $btnValue	 = 'Update';
            $strTab	 = 'Edit';
            $result = $obj->manageLogo('R', $id, '','','','','',0,0,0,0);
             $res =       mysqli_num_rows($result);
       
        }
        */
      
        
   //============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
            $result                  = $obj->addUpdateLogo($id);
            $outMsg                  =  $result['msg']; 
            $flag                    =  $result['flag'];          
            $strTitle                =  htmlspecialchars_decode($result['strTitle'],ENT_QUOTES);
            $strFileName             =  $result['strFileName'];
            $strFileNameH            =  $result['strFileNameH'];
            $strFileNameO            =  $result['strFileNameO'];
            
            $strFileDocumentInner    =  $result['strFileDocumentInner'];
            $strFileDocumentInnerO   =  $result['strFileDocumentInnerO'];
        }

    

?>

