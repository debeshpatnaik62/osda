<?php
	/* ================================================
  	File Name         	: addImpLinkInner.php
  	Description		      : This page is used to add Important Link Details.
  	Developed By		    : Arpita Rath
  	Developed On		    : 27-03-2017
  	Update History		  :
  	<Updated by>		  <Updated On>		<Remarks>

  	Class Used		      : clsLink
  	Functions Used		  : readLink(),addUpdateLink(),
	==================================================*/	
  //=========== include class path for links =============//
        include_once(CLASS_PATH.'clsImpLinks.php');
// print_r($_REQUEST);exit;
	//======= create object ================//
	      $objLink     = new clsLink;	
        $id          = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;//echo $id;exit; 
        $strSubmit   = ($id>0)?'Update':'Submit';
      	$strReset    = ($id>0)?'Cancel':'Reset';
      	$strTab	     = ($id>0)?'Edit':'Add';
        $strclick    = ($id>0)?"window.location.href='". APP_URL."viewImpLinks/".$glId."/".$plId."';":"";
	//========== Default variable ===============				
      	$intWinStatus       = 1;
      	$flag               = 0;  
        $errFlag            = 0;       
        $intTempletType     = 1;
        $intType            = 0;
	      $outMsg             = '';	
        $strURL            = "http://";
  //========== Permission ===============	
       // $glid                   = $_COOKIE['GLink'];
       //  $plId                   = $_COOKIE['PLink'];
       //  $userId                 = USER_ID;
       //  $adminConsole_Privilege = ADMIN_PRIVILEGE;
        // $explPriv      = $objLink->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        // $noAdd         = $explPriv['add'];
        
        if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewImpLinks/".$glId."/".$plId."'</script>";   
	//=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
            //============ Read value for updation ===========	
            $result             = $objLink->readLink($id);
            $intLinkId          =  $result['intLinkId'];
            $strHeadLineE       =  $result['strHeadLineE'];                      
            $strURL             =  $result['strURL'];   
            $strFileName        =  $result['strimage'];              
            $strHeadLineO       =  $result['strHeadLineH'];
            $redirectLoc  =  APP_URL."viewImpLinks/".$glId."/"."$plId/".$id;  
	}

	//============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           $result           = $objLink->addUpdateLink($id);
           $outMsg           =  $result['msg']; 
           $flag             =  $result['flag'];          
           $strHeadLineE     =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
           // $strHeadLineH        htmlspecialchars_decode($result['strHeadLineH'], ENT_QUOTES);
           $strURL           =  $result['strURL'];             
           $strFileName      =  $result['strFileName'];    


           if($flag==0 && $id>0)
               $redirectLoc  =  APP_URL."viewImpLinks/".$glId."/"."$plId/".$id;  
           else if($flag==0 && $id==0)  
              $redirectLoc  =  APP_URL."viewImpLinks/".$glId."/"."$plId";  ;       
           
	}
       
?>