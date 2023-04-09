<?php
    /* ================================================
    File Name         	: addReportCategoryInner.php
    Description		: This page is used to add ReportCategorys.
    Developed By	:Raviteja Peri
    Developed On	: 06-Dec-2018
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsReportCategory
    Functions Used	: readReportCategory(),addUpdateReportCategory()
    ==================================================*/	
	//========== create object of clsReportCategory class===============	
        include_once( CLASS_PATH.'clsReportCategory.php');
	$objReportCategory  = new clsReportCategory;	
        $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit      = ($id>0)?'Update':'Submit';
	$strReset       = ($id>0)?'Cancel':'Reset';
	$strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewReportCategory/".$glId."/".$plId. "';":"";
        //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objReportCategory->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewReportCategory/".$glId."/".$plId. "'</script>"; 
	
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
            $result          = $objReportCategory->readReportCategory($id);
            $strCategoryName    =  htmlspecialchars_decode($result['strCategoryName'],ENT_QUOTES);    
            $strDescription    =  $result['strDescription'];    
           // $strFileName     =  $result['strFileName'];
            /*$strDetailE      =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES);
            $strDetailH     =  htmlspecialchars_decode($result['strDetailH'],ENT_QUOTES);
            */
             $redirectLoc	=  APP_URL."viewReportCategory/".$glId."/".$plId;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result        = $objReportCategory->addUpdateReportCategory($id);
           $outMsg        =  $result['msg']; 
           $flag          =  $result['flag'];  
           
           if($flag==0 && $id>0)
              $redirectLoc	=  APP_URL."viewReportCategory/".$glId."/".$plId;  
            else if($flag==0 && $id==0)  
                $redirectLoc	=  APP_URL."viewReportCategory/".$glId."/".$plId;
           
	}
        ?>