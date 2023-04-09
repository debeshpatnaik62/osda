<?php
    /* ================================================
    File Name         	: addFaqInner.php
    Description		: This page is used to add Faqs.
    Developed By	: T Ketaki Debadarshini
    Developed On	: 30-Nov-2015
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsFaq
    Functions Used	: readFaq(),addUpdateFaq()
    ==================================================*/	
	//========== create object of clsFaq class===============	
        include_once( CLASS_PATH.'clsFaq.php');
	$objFaq  = new clsFaq;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	$strReset       = ($id>0)?'Cancel':'Reset';
	$strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewFaq/".$glId."/".$plId. "';":"";
        //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objFaq->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewFaq/".$glId."/".$plId. "'</script>"; 
	
	//========== Default variable ===============				
	
	$flag            = 0;  
        $errFlag         = 0;
	$outMsg          = '';	
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
            $btnValue	 = 'Update';
            $strTab	 = 'Edit';		

        //============ Read value for updation ===========	
            $result          = $objFaq->readFaq($id);
            $strHeadLineE    =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);    
            $strHeadLineO    =  $result['strHeadLineH'];    
            $strFileName     =  $result['strFileName'];
            $strDetailE      =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES);
            $strDetailH     =  htmlspecialchars_decode($result['strDetailH'],ENT_QUOTES);
            
             $redirectLoc	=  APP_URL."viewFaq/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result        = $objFaq->addUpdateFaq($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag'];  
           
           if($flag==0 && $id>0)
              $redirectLoc	=  APP_URL."viewFaq/".$glId."/".$plId;  
            else if($flag==0 && $id==0)  
                $redirectLoc	=  APP_URL."viewFaq/".$glId."/".$plId;
           
	}
        ?>