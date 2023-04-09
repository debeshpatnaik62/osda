<?php
	/* ================================================
	File Name         	: addCourseTaggedInner.php
	Description		: This page is used to add course details.
	Developed By		: T Ketaki Debadarshini
	Developed On		: 21-March-2017
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsCourse
	Functions Used		: readCourse(),addUpdateCourse(),
	==================================================*/	
	include_once( CLASS_PATH.'clsCourse.php');
	$objCourse          = new clsCourse;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'NIC Tag';
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
      
        /*if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewCourse/".$glId."/".$plId. "'</script>"; */ 
       
	//=========== For editing ======================
	/*if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result               = $objCourse->readCourse($id);
           
           $strCourseName        = htmlspecialchars_decode($result['vchCourseNameE'],ENT_QUOTES);
           $strCourseNameO       = $result['vchCourseNameO'];
           $strDuration          = $result['intDuration']; 
           $strDurationHr        = $result['decDurationHr'];
           $strSnippet           = htmlspecialchars_decode($result['vchDescriptionE'],ENT_QUOTES);  
           $strSnippetO          = $result['vchDescriptionO'];
           $strCourseAlias       = htmlspecialchars_decode($result['vchCourseAlias'],ENT_QUOTES);  
           $intType              = $result['intCategoryId']; 
           $intEligibility       = $result['intEligibility'];
                   $intCourseType        = $result['intCourseType'];
                   $strMappingCOde     =   $result['vchCourseMapId'];
           //$redirectLoc          = APP_URL."viewCourse/".$glId."/".$plId."/".$id;
	}*/


  
    $courseName =  $objCourse->fillCourseTagged('0');
    $courseArray = $courseName['courseArray'];
//print_r($courseArray);
    $niccourseArray  =  $objCourse->fillNICCourse($selVal);
    $nicCourseName   =  $niccourseArray['nicCourseArray'];
/*
    $samsCourseArray  =  $objCourse->fillSamsCourse($selVal);
    $samsCourseName   =  $samsCourseArray['samsCourseArray'];
*/
//print_r($nicCourseName);

    //$result          = $objCourse->manageCourse('TVD',0,0,'','','',0,0,'','',0,0,0,0,'','0.0', 0);
    
    /*if (mysqli_num_rows($resultTagged) > 0) 
    {

                       $ctr =0;          
                       while($row = mysqli_fetch_array($resultTagged))
                       {
                           $osdaVal                = $row['intOSDACourseId'];
                           $samsval                = $row['intSAMSCourseId'];
                           $nicval                  = $row['intNICCourse'];
                           $nic                 = $row['nicCourse'];
                           $sams                = $row['samsCourse'];
                           $osda                 = $row['osdaCourse']; 
                           $courseId            = $row['intCourseId'];
                           $ctr++; 
                       }
                
    }*/
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