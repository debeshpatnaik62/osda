<?php
    /* ================================================
    File Name         	: addNewsInner.php
    Description		: This page is used to add News Details.
    Developed By	: T Ketaki Debadarshini 
    Developed On	: 23-April-2016
    Update History	:
    <Updated by>		<Updated On>		<Remarks>

    Class Used		: clsNews
    Functions Used	: readNews(),addUpdateNews(
    ==================================================*/	
    //========== create object of clsNews class===============	
    include_once( CLASS_PATH.'clsNews.php');
    $objNews        = new clsNews;	
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
    $intNewsType   =0;
    
    if ($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewNews/".$glId."/".$plId. "'</script>";  

    //========== Default variable ===============				
    $intWinStatus    = 1;
    $flag            = 0;  
    $errFlag         = 0;
    $intLinkType     = 1;
    $intTempletType  = 1;	
    	
    //=========== For editing ======================
    if(isset($_REQUEST['ID']))
    {
        $btnValue	 = 'Update';
        $strTab          = 'Edit';		

        //============ Read value for updation ===========	
        $result          = $objNews->readNews($id);
        $strHeadLineE    =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
        $strHeadLineH    =  $result['strHeadLineH'];

        $strFileName     =  $result['strFileName'];
        $fileExt         = pathinfo($strFileName, PATHINFO_EXTENSION);

        $strExpDate      =  $result['strExpDate']; 
        $strDetailE      =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES);
        $strDetailH      =  $result['strDetailH']; 
        $strNewsDate     =  $result['strNewsDate']; 
        $strSource       =  $result['strSource'];
        $intNewsType     =$result['intCategoryId']; 
        $strSourceNameE  =  $result['strSourceNameE'];
        $strSourceNameO  = $result['strSourceNameO'];
        
        $strSnippetE       = $result['strSnippet'];
        $strSnippetO       = $result['strSnippetO'];
        $redirectLoc	 =  APP_URL."viewNews/".$glId."/".$plId;
        
    }

    //============ Button Submit ===================
    if(isset($_POST['btnSubmit']))
    {
       $result              = $objNews->addUpdateNews($id);
       $outMsg              =  $result['msg']; 
       $flag                =  $result['flag'];
       $intNewsType         =  $result['intCategoryId'];
       $strHeadLineE        =  htmlspecialchars_decode($result['strHeadLineE'],ENT_QUOTES);
       $strFileName         =  $result['strFileName'];
       $strExpDate          =  $result['strExpDate'];
       $strDetailE          =  htmlspecialchars_decode($result['strDetailE'],ENT_QUOTES); 
       $strNewsDate         =  $result['strNewsDate']; 
       $strCaption          =  $result['strCaption'];
       $strPlace            =  $result['strPlace'];
       $strSourceNameE      =  $result['strSourceNameE'];
       $strSourceNameO      =  $result['strSourceNameO'];
       $strSnippetE      =  $result['strSnippet'];
       $strSnippetO      =  $result['strSnippetO'];
       
       if($flag==0 && $id>0)
        $redirectLoc	=  APP_URL."viewNews/".$glId."/".$plId."/".$id;  
       else if($flag==0 && $id==0)  
          $redirectLoc	=  APP_URL."viewNews/".$glId."/".$plId;
    }
?>