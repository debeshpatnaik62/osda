<?php
    /* ================================================
    File Name         	: addAdvertisementInner.php
    Description		: This page is used to add Advertisement Details.
    Developed By	: T Ketaki Debadarshini 
    Developed On	: 24-Jan-2018 
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsAdvertisement
    Functions Used	: readAdvertisement(),addUpdateAdvertisement(
    ==================================================*/	
    //========== create object of clsNews class===============	
     include_once(CLASS_PATH.'clsAdvertisement.php');

//============= create object ===================//
     $objAdvt             = new  clsAdvertisement;

    $intAdvtId             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit      = ($id>0)?'Update':'Submit';
    $strReset       = ($id>0)?'Cancel':'Reset';
    $strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewNews/".$glId."/".$plId. "';":"$('#userImage').hide();clearEditors();";
    //========== Permission ===============	
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = $_SESSION['adminConsole_userID'];   
    $explPriv      = $objAdvt->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewAdvertisement/".$glId."/".$plId. "'</script>";  

    //========== Default variable ===============				
    $intType        = 1;
    $flag            = 0;  
    $errFlag         = 0;
   
    $outMsg          = '';	
    //=========== For editing ======================
    if(isset($_REQUEST['ID']))
    {
        $btnValue	 = 'Update';
        $strTab          = 'Edit';		

        //============ Read value for updation ===========	
        $result          = $objAdvt->readAdvertisement($intAdvtId);
        
        $intType        = $result['tinType'];
        $strFromdate    = date('d-m-Y',  strtotime($result['dtmFromDate']));
        $strToDate      = date('d-m-Y',  strtotime($result['dtmToDate']));
        $txtDuration    = $result['vchDuration'];
        
        $strlargeImage  = $result['vchUploadFile'];
       
        $fileExt         = pathinfo($strlargeImage, PATHINFO_EXTENSION);       
        $strSource       =  $result['vchPagelink'];
        
        $redirectLoc	 =  APP_URL."viewAdvertisement/".$glId."/".$plId;
    }

    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
    {
       $result              = $objAdvt->addUpdateAdvertisement($intAdvtId);
       $outMsg              =  $result['msg']; 
       $flag                =  $result['flag'];          
       $intType             = $result['radType'];
       $strFromdate         = $result['txtFrmDate'];
       $strToDate           = $result['txtToDate'];
       $txtDuration         = $result['txtDuration'];

       $strlargeImage       = $result['strFile'];
       $strSource           =  $result['txtSource'];
       
       if($flag==0 && $id>0)
        $redirectLoc	=  APP_URL."viewAdvertisement/".$glId."/".$plId."/".$id;  
       else if($flag==0 && $id==0)  
          $redirectLoc	=  APP_URL."viewAdvertisement/".$glId."/".$plId;
    }
?>