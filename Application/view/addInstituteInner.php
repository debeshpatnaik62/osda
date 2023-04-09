<?php
	/* ================================================
	File Name         	: addInstituteInner.php
	Description		: This page is used to add the institute details.
	Developed By		: T Ketaki Debadarshini
	Developed On		: 23-March-2017
	Update History		:
	<Updated by>            :   Rajesh parida
	<Updated On>            : 10-oct-2017
	<Remarks>

        <Updated by>				<Updated On>		<Remarks>
            1   T KEtaki Debadarshini           08-Jan-2018            Training Partner & Training Center Details updated
	Class Used		: clsInstitute
	Functions Used		: readTopic(),addUpdateTopic(),
	==================================================*/	
	include_once( CLASS_PATH.'clsInstitute.php');
	$objInstitute       = new clsInstitute;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
        $strclick           =($id>0)?"window.location.href='". APP_URL."viewInstitutes/".$glId."/".$plId."';":"$('#userImage').hide();";
	//========== Default variable ===============	
	$flag               = 0;  
        $errFlag            = 0;
	$outMsg             = '';	
        $intType            = 1;
        $intPIAStatus       = 0;
        $intParentId        = 0;
	
        //========== Permission ===============	
        $glId                   = $_REQUEST['GL'];
        $plId                   = $_REQUEST['PL'];
        $pageName               = $_REQUEST['PAGE'].'.php';
        $userId                 = $_SESSION['adminConsole_userID'];
        $explPriv               = $objInstitute->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
	$noAdd                  = $explPriv['add'];

        if($noAdd == 1 && $id == 0)
            echo "<script>location.href = '".APP_URL."viewInstitutes/".$glId."/".$plId. "'</script>";
    
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
        //============ Read value for updation ===========	
            $result              = $objInstitute->readInstitute($id);
            $resultid            = $objInstitute->readInstitutePia($id);

            $chk_string          = array();
            while ($roes = $resultid->fetch_array()) {

                    array_push($chk_string, $roes['intIspia']);
            }

            $getcnt              = count($chk_string);
            $intDistid           = $result['intDistrictId']; 
            $strName             = htmlspecialchars_decode($result['vchInstituteName'],ENT_QUOTES);
            $strNameO            = $result['vchInstituteNameO'];
            $intType             = $result['tinInstituteType'];  
            $strYear             = (floatval($result['intEstYear'])!=0)?$result['intEstYear']:'';
            $strEmail            = htmlspecialchars_decode($result['vchEmailId'],ENT_QUOTES);
            $strAlias            = htmlspecialchars_decode($result['vchInstituteAlias'],ENT_QUOTES);
            $strPhoneno          = $result['vchPhoneno'];
            $strMobileno         = $result['vchMobileNo'];
            $strWebsite          = $result['vchWebsite'];
            $strPincode          = $result['vchPincode'];
            $intPIAStatus        = $result['tinIsPIA'];
            $strFileName         = $result['vchImage'];
            $strSnippet          = htmlspecialchars_decode($result['vchDescriptionE'],ENT_QUOTES);            
            $strSnippetO         = $result['vchDescriptionO']; 
            $strPrincipleName    = htmlspecialchars_decode($result['vchPrincipalName'],ENT_QUOTES);
            $strPrincipleNameO   = $result['vchPrincipalNameO'];
            $strAddress          = htmlspecialchars_decode($result['vchAddress'],ENT_QUOTES);  
            $strAddressO         = $result['txtAddressO']; 
            $strLat              = (floatval($result['fltLat'])!=0)?htmlspecialchars_decode($result['fltLat'],ENT_QUOTES):'';  
            $strLong             = (floatval($result['fltLong'])!=0)?htmlspecialchars_decode($result['fltLong'],ENT_QUOTES):'';    
            $redirectLoc         = APP_URL."viewInstitutes/".$glId."/".$plId."/".$id;
            
            $intParentId        = $result['intParentId'];
            $strMappingCOde     = $result['vchInsMapCode'];
           
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
            $result              = $objInstitute->addUpdateInstitute($id);
            $last_insert_id      = $result['last_insert_id'];

               //$last_insert_id	 = ($last_insert_id != "") ? $last_insert_id : $id; 
           // if($result['last_insert_id']!='' && $result['intInstType']==3 && $flag==0)
            //   $results          = $objInstitute->addUpdateInstitutePIA($result['last_insert_id'],$result['intInstType']);
		  
		   
           $outMsg              = $result['msg']; 
           $flag                = $result['flag'];
           
           $intDistid           = $result['ddlDistrict']; 
           $strName             = $result['strHeadline'];
           $strNameO            = $result['strHeadlineO'];
           $intType             = $result['intInstType'];  
           $strYear             = $result['intYear'];  
           $strEmail            = $result['strEmail'];
           $strPhoneno          = $result['strPhoneno'];
           $strWebsite          = $result['strWebsite'];
           $strPincode          = $result['strPincode'];
           $intPIAStatus        = $result['intPIAStatus'];
           $strSnippet          = $result['strDescription'];            
           $strSnippetO         = $result['strDescriptionO']; 
           $strPrincipleName    = $result['strPrincpleName'];
           $strPrincipleNameO   = $result['strPrincpleNameO'];
           $strAddress          = $result['strAddress'];  
           $strAddressO         = $result['strAddressO']; 
           $strMobileno         = $result['strMobileno'];
           $strAlias            = $result['strAlias'];  
           $strLat		= $result['strLat']; 
           $strLong		= $result['strLong']; 
           
           $intParentId         = $result['intParentId'];
           $strMappingCOde=$result['mappingCOde'];
         
           
           if($flag==1 && $id>0)
            $redirectLoc	=  '';  
           else if($flag==0 && $id==0)  
            $redirectLoc	=  APP_URL."viewInstitutes/".$glId."/".$plId;
           
	}
       
?>