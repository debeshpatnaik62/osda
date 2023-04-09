<?php
	/* ================================================
	File Name         	: addBlockInner.php
	Description		: This page is used to add block details
	Developed By		: T Ketaki Debadarshini
	Developed On		: 21-Sept-2016
	Update History		:
	<Updated by>		<Updated On>		<Remarks>

	Class Used		: clsBlock
	Functions Used		: readBlock(),addUpdateBlock(),
	==================================================*/
//print_r($_REQUEST);exit;
	include_once( CLASS_PATH.'clsBlock.php');
	$objBlock           = new clsBlock;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
        $strclick           =($id>0)?"window.location.href='". APP_URL."viewBlock/".$glId."/".$plId. "';":"";
	//========== Default variable ===============	
	$flag               = 0;  
        $errFlag            = 0;
	$outMsg             = '';	
        $intDistid          = 0;
       
       //========== Permission ===============	
        $glId               = $_REQUEST['GL'];
        $plId               = $_REQUEST['PL'];
        $pageName           = $_REQUEST['PAGE'].'.php';
        $userId             = $_SESSION['adminConsole_userID'];
        $explPriv           = $objBlock->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd              = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewBlock/".$glId."/".$plId. "'</script>";   
       
	//=========== For editing ======================
	if($id>0)
	{
           
            //============ Read value for updation ===========	
           $result              = $objBlock->readBlock($id);           
           
           $intDistid           = $result['intDistid'];  
           $strBlock            = $result['strBlock'];  
           $strDescription      = $result['strDescription'];
           $strBlockO           = $result['strBlockO'];  
           $strDescriptionO     = $result['strDescriptionO'];
           
           $redirectLoc         =  APP_URL."viewBlock/".$glId."/".$plId."/".$id;
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result              = $objBlock->addUpdateBlock($id);
           $outMsg              = $result['msg']; 
           $flag                = $result['flag'];
           
           $intDistid           = $result['intDistid'];  
           $strBlock            = $result['strBlock'];  
           $strDescription      = $result['strDescription'];
           $strBlockO           = $result['strBlockO'];  
           $strDescriptionO     = $result['strDescriptionO'];
           
         if($flag==1 && $id>0){
              $redirectLoc	=  APP_URL."viewBlock/".$glId."/".$plId."/".$id;  
            }else if ($flag==1 && $id==0) {
              //$redirectLoc	=  APP_URL."viewBlock";  
            }else { $redirectLoc	=  APP_URL."viewBlock/".$glId."/".$plId;}
        
	}
       
?>