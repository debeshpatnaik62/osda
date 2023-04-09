<?php
	/* ================================================
	File Name         	: addInstituteCourseInner.php
	Description		: This is used for Manage Institute Courses details.
	Developed By		: T Ketaki Debadarshini
	Developed On		: 23-March-2017
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsInstituteCourse
	Functions Used		: readCourse(),addUpdateCourse(),
	==================================================*/	
	include_once( CLASS_PATH.'clsInstituteCourse.php');
	$objCourse          = new clsInstituteCourse;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
        $strclick           =($id>0)?"window.location.href='". APP_URL."viewInstituteCourse/".$glId."/".$plId."';":" getCoursesDetails(0);";
	//========== Default variable ===============	
	$flag               = 0;  
        $errFlag            = 0;
	$outMsg             = '';	
        $instituteCourseArr = array();
        $intCourseId        = 0;
        //======================= Permission ===========================*/
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = USER_ID;
        $adminConsole_Privilege = ADMIN_PRIVILEGE;
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $instituteCourseArr     = $objCourse->readInstituteCourse($id);
          // print_r($instituteCourseArr);
           $intInstitute           = $instituteCourseArr[0]['intInstituteId'];
           $intDistid              = $instituteCourseArr[0]['intDistrictId'];
           
           
           $redirectLoc         =  APP_URL."viewInstituteCourse/".$glId."/".$plId."/".$id;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result              = $objCourse->addUpdateInstituteCourse($id);
           $outMsg              = $result['msg']; 
           $flag                = $result['flag'];
          
           
           if($flag==0 && $id>0)
                $redirectLoc	=  APP_URL."viewInstituteCourse/".$glId."/".$plId."/".$id;
           else if($flag==0 && $id==0)  
                $redirectLoc	=  APP_URL."viewInstituteCourse/".$glId."/".$plId;
           
	}
       
?>