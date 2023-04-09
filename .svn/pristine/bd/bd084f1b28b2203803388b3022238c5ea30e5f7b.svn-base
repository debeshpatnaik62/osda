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
	include_once( CLASS_PATH.'clsCourse.php');
	$objCourse          = new clsCourse;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'SAMS ITI Tag';
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
      $explPriv = $objCourse->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
      $noAdd     = $explPriv['add'];

  
    $courseName =  $objCourse->fillCourseTagged('0');
    $courseArray = $courseName['courseArray'];

    $niccourseArray  =  $objCourse->fillNICCourse($selVal);
    $nicCourseName   =  $niccourseArray['nicCourseArray'];

    $samsCourseArray  =  $objCourse->fillSamsCourse($selVal,'11');
    $samsCourseName   =  $samsCourseArray['samsCourseArray'];
    
//echo "<pre>";print_r($courseArray);echo "</pre>";

    $result          = $objCourse->manageCourse('TVD',0,0,'','','',0,0,'','',0,0,0,0,'','0.0', 0);
    $resultArray=array();
                    if (mysqli_num_rows($result) > 0) 
                    {

                       $ctr =0;          
                       while($row = mysqli_fetch_array($result))
                       {
                           //$resultArray[$ctr]['osdaVal']                = $row['intOSDACourseId'];
                           //$resultArray[$ctr]['samsval']                = $row['intSAMSITICourseId'];
                           
                           $samsid                                         = $row['intSAMSITICourseId'];
                           $resultArray[$samsid]['osdaVal']                = $row['intOSDACourseId'];
                           $ctr++; 
                       }
                
                    }
    //print_r($samsval);
//echo $selval;
	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result              = $objCourse->addCourseTagged($id);
           $outMsg              = $result['msg']; 
           $flag                = $result['flag'];
           
           $intOsda             = $result['intOsda']; 
           $intSAMS             = $result['intSAMS'];
           $ddlMappingData      = $result['ddlMappingData'];
           
	}
       
?>