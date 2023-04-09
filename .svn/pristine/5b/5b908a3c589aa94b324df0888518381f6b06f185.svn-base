<?php
    /* ================================================
    File Name       : addQuestionInner.php
    Description		: This page is used to add Question Details.
    Developed By	: Rahul Kumar Saw
    Developed On	: 26-08-2021
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsQuestion
    Functions Used	: readQuestion(),addUpdateQuestion(),
    ==================================================*/	
	//========== create object of clsQuestion class===============
	   include_once(CLASS_PATH.'clsQuestion.php'); 	
		$objQuestion      = new clsQuestion;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
		$strReset       = ($id>0)?'Cancel':'Reset';
		$strTab         = ($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewQuestion/".$glId."/".$plId."';":"";
       
        //========== Permission ===============	
        $glId          	 = $_REQUEST['GL'];
        $plId            = $_REQUEST['PL'];
        $pageName        = $_REQUEST['PAGE'].'.php';
        $userId          = USER_ID;
        $explPriv        = $objQuestion->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd           = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewQuestion/".$glId."/".$plId."'</script>";                     
               
	//========== Default variable ===============	
        $intPrivilege    = 0;
		$flag            = 0;  
		$errFlag         = 0;
		$outMsg          = '&nbsp;';	
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
        $btnValue	= 'Update';
        $strTab	 	= 'Edit';
        //============ Read value for updation ===========	
        $result          	=  $objQuestion->readQuestion($id);
        $docRes             =  $objQuestion->readDoc($id);
        $strQuestionNo     	=  $result['strQuestionNo']; 
        $intQuestionType      =  $result['strQuestionType'];
        $strOpeningDate 	=  $result['strOpeningDate'];
        $strClosingDate  	=  $result['strClosingDate']; 
        $strOpeningTime     =  $result['strOpeningTime'];
        $strClosingTime     =  $result['strClosingTime']; 	
        $strDescription     =  $result['strDescription'];
        $strDescriptionH    =  $result['strDescriptionH'];
		$strQuestionTitle     =  $result['strQuestionTitle'];
		$strQuestionTitle_O   =  $result['strQuestionTitle_O'];
		$intSlNo            =  $result['intSlNo'];
		$redirectLoc	 	=  APP_URL."viewQuestion/".$glId."/".$plId."/".$id;	
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
	    $result        		=  $objQuestion->addUpdateQuestion($id);
	    $outMsg        		=  $result['msg']; 
	    $flag          		=  $result['flag'];
	    $intSkillId     	=  $result['selSkillId'];
	    $strQuestion        =  $result['strQuestion'];   		 
        $redirectLoc	 	=  APP_URL."viewQuestion/".$glId."/".$plId."/".$id;
	}
        ?>