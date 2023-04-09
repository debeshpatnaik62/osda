<?php
	/* ================================================
	File Name         	: addGalleryInner.php
	Description		: This page is used to add Gallery Images.
	Developed By		: T Ketaki Debadarshini
	Developed On		: 19-Feb-2016
	Update History		:
	<Updated by>		<Updated On>		<Remarks>
     
	Class Used		: clsGallery
	Functions Used		: readGallery(),addUpdateGallery(),
	==================================================*/	
	include_once( CLASS_PATH.'clsGallery.php');
	$objGallery      = new clsGallery;	
        $id                 = (isset($_REQUEST['ID']))?$_REQUEST['ID']:0;
        $strSubmit          =($id>0)?'Update':'Submit';
	$strReset           =($id>0)?'Cancel':'Reset';
	$strTab             =($id>0)?'Edit':'Add';
        $strclick       = ($id>0)?"window.location.href='". APP_URL."viewGallery/".$glId."/".$plId. "';":"$('#userImage').hide();";
	//========== Default variable ===============	
	$flag               = 0;  
        $errFlag            = 0;
	$outMsg             = '&nbsp;';	
        $intCategory        = 0;
        $intType         = 0;
        $intLinkType        = 1;
       //========== Permission ===============	
        $glId          = $_REQUEST['GL'];
        $plId          = $_REQUEST['PL'];
        $pageName      = $_REQUEST['PAGE'].'.php';
        $userId        = $_SESSION['adminConsole_userID'];   
        $explPriv      = $objGallery->checkPrivilege($userId, $glId, $plId, $pageName, 'A');
        $noAdd         = $explPriv['add'];
    
        if($noAdd == 1 && $id==0)
           echo "<script>location.href = '".APP_URL."viewGallery/".$glId."/".$plId. "'</script>"; 

	
        
        //=========== For editing ======================
	if(isset($_REQUEST['ID']))
	{
           
            //============ Read value for updation ===========	
           $result           = $objGallery->readGallery($id);
           $strCaption       = htmlspecialchars_decode($result['strCaption'],ENT_QUOTES);  
           $strDescription   = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
           $strCaptionH       = htmlspecialchars_decode($result['strCaptionH'],ENT_QUOTES);  
           $strDescriptionH   = $result['strDescriptionH'];
           $flag             = $result['flag'];
           $strFileName      =  $result['strFileName'];
           $intCategory      = $result['intCategory'];
           $intType      = $result['intType'];
           if($intType==1)
            $strAudio      = $result['strThumbFileName'];
           else if($intType==3)
            $strvideo      = $result['strThumbFileName'];
           
           $strEmbedCode      = $result['strEmbedurl'];
           $intLinkType = $result['intVideolinktype'];
	}
        
        //============ Button Submit ===================
	if(isset($_POST['btnSubmit']))
	{
           
           $result          = $objGallery->addUpdateGallery($id);
           $outMsg          = $result['msg']; 
           $flag            = $result['flag'];
           $strCaption     = htmlspecialchars_decode($result['strCaption'],ENT_QUOTES);  
           $strDescription     = htmlspecialchars_decode($result['strDescription'],ENT_QUOTES);
           $strFileName   =  $result['strFileName'];
           $intCategory      = $result['intCategory'];
           $intLocation      = $result['intLocation'];
          
           if($flag==0 && $id>0)
            $redirectLoc	=  APP_URL."viewGallery/".$glId."/".$plId;  
           else if($flag==0 && $id==0)  
              $redirectLoc	=  APP_URL."viewGallery/".$glId."/".$plId;
	}
       
?>