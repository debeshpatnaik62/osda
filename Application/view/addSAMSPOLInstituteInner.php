<?php
	/* ================================================
	File Name         	: addCourseTaggedInner.php
	Description		: This page is used to add course details.
	Developed By		: Rahul Kumar Saw
	Developed On		: 2-August-2019
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsCourse
	Functions Used		: manageCourse(),addCourseTagged(),
	==================================================*/	
	include_once( CLASS_PATH.'clsInstitute.php');
	$objInstitute          = new clsInstitute;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'SAMS Polytechnic Institute Tag';
        //$strclick           =($id>0)?"window.location.href='". APP_URL."viewCourse/".$glId."/".$plId."';":"";
		
	$intCourseType = 1;
	//========== Default variable ===============	
	$flag               = 0;  
        $errFlag            = 0;
	$outMsg             = '';	

   //========== Permission ===============  
      $glId   = $_REQUEST['GL'];
      $plId   = $_REQUEST['PL'];
      $pageName = $_REQUEST['PAGE']. '.php';
      $userId   = $_SESSION['adminConsole_userID'];
      $explPriv = $objInstitute->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
      $noAdd     = $explPriv['add'];

  
    $instituteName      =  $objInstitute->fillInstituteITIOSDA('2');
    $instituteNameArray = $instituteName['instituteArray'];

    $samsInstituteArray  =  $objInstitute->fillSamsITIInstitute('2');
    $samsInstituteName =  $samsInstituteArray['samsInstituteArray'];
    
   // echo "<pre>";print_r($samsInstituteName);echo "</pre>";
//print_r($samsInstituteName);

    $result          = $objInstitute->manageInstitute('TVD',0,0,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',0,'',0,0,0,'');
    $resultArray=array();
                    if (mysqli_num_rows($result) > 0) 
                    {

                       $ctr =0;          
                       while($row = mysqli_fetch_array($result))
                       {
                           $samsid                                         = $row['intSAMSPOLInstituteId'];
                           $resultArray[$samsid]['osdaVal']                = $row['intOSDAInstituteId'];
                           $ctr++; 
                           //echo "<pre>";print_r($row['intSAMSPOLInstituteId']."hii".$row['intOSDAInstituteId']);echo "</pre>";
                       }
                
                    }
	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result              = $objInstitute->addInstituteTagged($id);
           $outMsg              = $result['msg']; 
           $flag                = $result['flag'];
           
          /* $intOsda             = $result['intOsda']; 
           $intSAMS             = $result['intSAMS'];
           $ddlMappingData      = $result['ddlMappingData'];*/
           
	}
       
?>