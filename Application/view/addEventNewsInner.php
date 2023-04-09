<?php
    /* ================================================
    File Name         	  : addEventNews.php
    Description		  : This is used for add news details for Events Only.
    Designed By		  :
    Designed On		  : 
    Devloped By             : Ashis kumar Patra
    Devloped On             : 13-April-2018
    Update History          : <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsEventNews
    Functions Used	: readEventNews(),addUpdateEventNews(
    ==================================================*/	
    //========== create object of clsEventNews class===============	
    include_once( CLASS_PATH.'clsEventNews.php');
    $objNews        = new clsEventNews;	
    $id             = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
    $strSubmit      = ($id>0)?'Update':'Submit';
    $strReset       = ($id>0)?'Cancel':'Reset';
    $strTab         = ($id>0)?'Edit':'Add';
    $strclick       = ($id>0)?"window.location.href='". APP_URL."viewNews/".$glId."/".$plId. "';":"$('#userImage').hide();clearEditors();";
    //========== Permission ===============	
    $glId          = $_REQUEST['GL'];
    $plId          = $_REQUEST['PL'];
    $pageName      = $_REQUEST['PAGE'].'.php';
    $userId        = $_SESSION['adminConsole_userID'];   
    $explPriv      = $objNews->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
    $noAdd         = $explPriv['add'];
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewNews/".$glId."/".$plId. "'</script>";  

    //========== Default variable ===============				
    $intWinStatus    = 1;
    $flag            = 0;  
    $errFlag         = 0;
    $intLinkType     = 1;
    $intTempletType  = 1;	
    $outMsg          = '';	
    //=========== For editing ======================
    if(isset($_REQUEST['ID']))
    {
        $btnValue	 = 'Update';
        $strTab          = 'Edit';		

        //============ Read value for updation ===========	
        $result          = $objNews->readEventNews($id);
        $strHeadLineE    =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
        $strHeadLineH    =  $result['strHeadLineH'];

        $strFileName     =  $result['strFileName'];
        $fileExt         = pathinfo($strFileName, PATHINFO_EXTENSION);

        $strExpDate      =  $result['strExpDate']; 
        $strDetailE      =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES);
        $strDetailH      =  $result['strDetailH']; 
        $strNewsDate     =  $result['strNewsDate']; 
        $strSource       =  $result['strSource'];
        $intCategory     = $result['intCategoryId'];
        
        $strSourceNameE  =  $result['strSourceNameE'];
        $strSourceNameO  = $result['strSourceNameO'];
        $redirectLoc	 =  APP_URL."viewEventNews/".$glId."/".$plId;
    }

    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
    {
       $result              = $objNews->addUpdateEventNews($id);
       $outMsg              =  $result['msg']; 
       $flag                =  $result['flag'];          
       $strHeadLineE        =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
       $strFileName         =  $result['strFileName'];
       $strDetailE          =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES); 
       $strNewsDate         =  $result['strNewsDate']; 
       $strCaption          =  $result['strCaption'];
       $strPlace            =  $result['strPlace'];
       $strSourceNameE      =  $result['strSourceNameE'];
       $strSourceNameO      =  $result['strSourceNameO'];
       
       if($flag==0 && $id>0)
        $redirectLoc	=  APP_URL."viewEventNews/".$glId."/".$plId."/".$id;  
       else if($flag==0 && $id==0)  
          $redirectLoc	=  APP_URL."viewEventNews/".$glId."/".$plId;
    }
?>