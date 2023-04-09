<?php
    /* ================================================
    File Name         	: addSectorInner.php
    Description		: This page is used to add sector details.
    Developed By	: T Ketaki Debadarshini
    Developed On	: 22-March-2017
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		:  clsSector
    Functions Used	:  readSector, addUpdateSector 
    ==================================================*/	
	//========== create object of clsSector class===============	
        include_once( CLASS_PATH.'clsSector.php');
	$objSector         = new clsSector;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	$strReset       = ($id>0)?'Cancel':'Reset';
	$strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewSector/".$glId."/".$plId."';":"$('#userImage').hide();";
        
	//========== Default variable ===============	
	$flag            = 0;  
        $errFlag         = 0;
	$outMsg          = '';	
        $intStatus       = 2;

  //========== Permission ===============   
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objSector->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
               echo "<script>location.href = '".APP_URL."viewSector/".$glId."/".$plId. "'</script>";     
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
            $btnValue       = 'Update';
            $strTab         = 'Edit';		

            //============ Read value for updation ===========	
            $result             = $objSector->readSector($id);
            $strHeadLineE       =  htmlspecialchars_decode($result['vchSecotrName'],ENT_QUOTES);    
            $strHeadLineO       =  $result['vchSecotrNameO'];
            $strFileName        =  $result['vchImage'];
            $strAlias           =  htmlspecialchars_decode($result['vchSecotrAlias'],ENT_QUOTES);  
            $strDescription     =  htmlspecialchars_decode($result['vchDescription'],ENT_QUOTES);   
            $strDescriptionO    =  $result['vchDescriptionO'];
            $strMappingCOde     = $result['vchSectormapCOde'];
           
            $intStatus          =  $result['tinPublishStatus'];
            
            $redirectLoc	=  APP_URL."viewSector/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result        =  $objSector->addUpdateSector($id);
           
            $strHeadLineE    =  $result['strHeadlineE'];    
            $strHeadLineO    =  $result['strHeadLineO'];
            $intStatus       =  $result['intStatus'];
            $strAlias        =  $result['strAlias'];
            $strDescription  =  $result['strDescription'];    
            $strDescriptionO =  $result['strDescriptionO'];
            $strMappingCOde  = $result['mappingCode'];
           
           
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag']; 
           
           if($flag==0 && $id>0)
                $redirectLoc	=  APP_URL."viewSector/".$glId."/".$plId;  
           else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewSector/".$glId."/".$plId;
         
	}
  ?>