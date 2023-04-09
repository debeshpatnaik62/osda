<?php

/*================================================
  File Name           : classBind.php
  Description		  : Page to manage class bind.
  Date Created		  : 28-Aug-2015
  Designed By		  : Rasmi Ranjan Swain 
  Update History	  : getNewsCategory
  <Updated by>		<Updated On>		<Remarks>

  Javscript Functions   :
  includes              :

  ================================================== */
include_once("model/customModel.php");


class clsClassBind extends Model {

	/*
        Function to check duplicate location
        By: Rasmi Ranjan Swain 
        On: 03-Sep-2015
        */
	public function checkDuplicateLocation()
	{    
		$locObj	   	= new clsLocation();
		$errFlag   = 0;
		$locName   =  htmlspecialchars(addslashes($_REQUEST['locname']), ENT_QUOTES);    
		$dupResult = $locObj->manageLocation('CD',0,$locName,'','',USER_ID,0,0,0);
                if ($dupResult) {
                $numRows = $dupResult->fetch_array();
                        if ($numRows > 0) {
                                $errFlag = 1;
                        }
                }
            echo json_encode(array('errFlag'=>$errFlag));  
	} 

    /*
        Function to get all users
        By: Rasmi Ranjan Swain 
        On: 03-Sep-2015
        */
	public function getAllUsers($userId,$defaultLabel)
	{    
            
            if($defaultLabel!='')
                $selectLabel     = $defaultLabel;
            else
                $selectLabel     ='Select';

            $data      = "<option value='0'>--".$selectLabel."--</option>";
            $selUserId = $userId;             
           // $sql       = "CALL USP_USER_PROFILE('XM',0,0,0,0,0,'','0','','','','','','','','','','','','','0',0,'0','0','0','0','0',@out);";
            $objUser   = new clsUserProfile;
            $result    = $objUser->manageUser('XM',0,0,0,0,0,'',0,'','','','','','','','','','','','',0,'0',0,0,0,0,0); 
            while($row = $result->fetch_array())
            {
                $userId     = $row['INT_ID'];
                $userName   = $row['VCH_FULL_NAME'];
                if($userId == $selUserId)
                    $selected = "selected";
                else                     
                    $selected = "";
                $data       .= '<option value="'.$userId.'" '.$selected.'>'.$userName.'</option>';
            }
            echo json_encode(array('result'=>$data));  
	}   
    
     /*
        Function to get users permission details
        By: Rasmi Ranjan Swain 
        On: 03-Sep-2015
        */
	public function getPermissions()
	{                    
            $objUser    = new clsUserProfile;
          
            $userId     = $_REQUEST['userId'];
            $result     = '';
            $userRes    = $objUser->manageUser('R',$userId,0,0,0,0,'',0,'','','','','','','','','','','','',0,'0',0,0,0,0,0); 
            $userres	= mysqli_fetch_array($userRes);
            $useprivilege = $userres['INT_ADMIN_PRIVILEGE'];

         
            $objPermission    = new clsUserPermission;
            $perResult	= $objPermission->managePermission('DG','0',$userId,0,0,0,0,0,0,0,0,'');
            if(mysqli_num_rows($perResult)>0)
            {		
                while($perRow	= mysqli_fetch_array($perResult))
                {
                    $ctr	= 0;
                    $adminGl		= $perRow['GL_ID'];
                  
                    $adminPLResult	= $objPermission->managePermission('S','0',$userId,$adminGl,0,0,0,0,0,0,0,'');
                    if(mysqli_num_rows($adminPLResult)>0)
                    {
                        while($adminPLRow	= mysqli_fetch_array($adminPLResult))
                        {
                                $adminPL		= $adminPLRow['INT_PL_ID'];
                                $author			= $adminPLRow['INT_AUTHOR'];
                                $editor			= $adminPLRow['INT_EDITOR'];
                                $publisher		= $adminPLRow['INT_PUBLISHER'];
                                $manager		= $adminPLRow['INT_MANAGER'];
                                $privilege		= $adminPLRow['INT_PRIVILEGE'];
                                $result			.= $adminGl.','.$adminPL.','.$author.','.$editor.','.$publisher.','.$manager.','.$privilege.'[=]';										
                        }
                    }		
                }		
            }	
            $res= $useprivilege.'[==]'.$result;
           // echo $res;
            echo json_encode(array('result'=>$res));  
	}   
        /*
      Function to get published page.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */

    public function getPublishedPage() {
        $data = '';
        $ids = '';
        include_once(CLASS_PATH.'clsLinks.php');
        $objPages        = new clsPages;
      
        $result = $objPages->managePage('PL','0','','','',0,'','0','','','',0,0,0,0,'0000-00-00','0000-00-00','','','','','','','0','',0,'','');
        while ($row = mysqli_fetch_array($result)) {
            $pageId = $row['intPageId'];
            $pageTitle = htmlspecialchars_decode($row['vchTitle'], ENT_NOQUOTES);
            $data .= '<div id="pageNameById' . $pageId . '">';
            $data .= '<input type="checkbox" name="chkPageName[]" id="chkPageId' . $pageId . '" class="checkBoxForPage" value="' . $pageId . '" />';
            $data .= '  ' . $pageTitle;
            $data .= '</div>';

            $ids .= ',' . $pageId;
        }
        $result = $data . '~::~' . $ids;

        echo json_encode(array('result' => $result));
    }

    /*
      Function to get published page.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */

    public function getAssignedMenuList($parentId, $menuType, $linkType) {
        $data = '';
        $closeBtn = '';
        $divId = '';
        include_once(CLASS_PATH.'clsLinks.php');
        $objPages        = new clsGlobalLink;
        $result = $objPages->manageGL('V',0,0,$parentId, $menuType, 0, $linkType, '');
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $menuId = $row['intId'];
                $pageId = $row['intPageId'];
                $pageTitle = htmlspecialchars_decode($row['vchTitle'], ENT_NOQUOTES);
                /* For main menu */
                if ($menuType == 1) { 
                    
                    if($linkType == 'globalLink')                    
                        $onChangeFunction = 'onclick="deleteFromMainMenu('.$menuId.','.$pageId.');"';
                    
                    else if($linkType == 'primaryLink')                    
                        $onChangeFunction = 'onclick="removeFromMainMenu('.$pageId.');deleteMenu('.$menuId.');"';
                    else if($linkType == 'secondaryLink')                    
                        $onChangeFunction = 'onclick="removeFromMainMenu('.$pageId.');deleteMenu('.$menuId.');"';
                    $divId = 'mainMenuItem' . $pageId . '';
                    $divClass    = 'ui-sortable-handle mainMenuItem';
					if($linkType == 'globalLink') 
                   		$hdnFld = '<input type="hidden" name="mainMenuArr[]" id="hdnMainMenuId' . $pageId . '" class="mainMenuClass" value="' . $pageId . '">';
					else if($linkType == 'primaryLink')
						$hdnFld = '<input type="hidden" name="mainMenuArr'.$parentId.'_'.$row['tinMenuType'].'[]" id="hdnMainMenuId' . $pageId . '" data-menu="'.$row['tinMenuType'].'" class="mainMenuClass'.$parentId.'_'.$row['tinMenuType'].'" value="' . $pageId . '">';
                                        else if($linkType == 'secondaryLink')
						$hdnFld = '<input type="hidden" name="mainMenuArr'.$parentId.'[]" id="hdnMainMenuId' . $pageId . '" class="mainMenuClass'.$parentId.'" value="' . $pageId . '">';
                    $closeBtn = '<span style="float:right;cursor:pointer;" data-rel="tooltip" data-original-title="Delete" title=""><img src="' . APP_URL . 'img/close-btn.png" width="16" height="16" alt="Close" '.$onChangeFunction.'"></span>';
                    
                }

                /* For bottom menu */ else if ($menuType == 2) {
                    
                     if($linkType == 'globalLink') {                   
                       $divId = 'bottomMenuItem' . $pageId . '';
                    
                        $divClass    = 'ui-sortable-handle bottomMenuItem';
                       $hdnFld = '<input type="hidden" name="bottomMenuArr[]" id="hdnBottomMenuId' . $pageId . '" class="bottomMenuClass" value="' . $pageId . '">';
                       $closeBtn = '<span style="float:right;cursor:pointer;"  data-rel="tooltip" data-original-title="Delete" title=""><img src="' . APP_URL . 'img/close-btn.png" width="16" height="16" alt="Close" onclick="removeFromBottomMenu(' . $pageId . ');deleteMenu(' . $menuId . ');"></span>';

                     }   
                     else if($linkType == 'primaryLink'){ 
                         
                         $onChangeFunction = 'onclick="removeFromMainMenu('.$pageId.');deleteMenu('.$menuId.');"';
                         $divId = 'mainMenuItem' . $pageId . '';
                         $divClass    = 'ui-sortable-handle mainMenuItem';
                         $hdnFld = '<input type="hidden" name="mainMenuArr'.$parentId.'_'.$row['tinMenuType'].'[]" id="hdnMainMenuId' . $pageId . '" data-menu="'.$row['tinMenuType'].'" class="mainMenuClass'.$parentId.'_'.$row['tinMenuType'].'" value="' . $pageId . '">';
                         $closeBtn = '<span style="float:right;cursor:pointer;" data-rel="tooltip" data-original-title="Delete" title=""><img src="' . APP_URL . 'img/close-btn.png" width="16" height="16" alt="Close" '.$onChangeFunction.'"></span>';
                                
                     }
                    
                }

                /* For top menu */ else if ($menuType == 3) {
                    $divId = 'topMenuItem' . $pageId . '';
                     $divClass    = 'ui-sortable-handle topMenuItem';
                    $hdnFld = '<input type="hidden" name="topMenuArr[]" id="hdnTopMenuId' . $pageId . '" class="topMenuClass" value="' . $pageId . '">';
                    $closeBtn = '<span style="float:right;cursor:pointer;"  data-rel="tooltip" data-original-title="Delete" title=""><img src="' . APP_URL . 'img/close-btn.png" width="16" height="16" alt="Close" onclick="removeFromTopMenu(' . $pageId . ');deleteMenu(' . $menuId . ');"></span>';
                }

                /* For home portlet */  if ($menuType == 4) {
                    $divId       = 'homePortletItem' . $pageId . '';
                    $divClass    = 'ui-sortable-handle homePortletItem';
                    $hdnFld = '<input type="hidden" name="homePortletArr[]" id="hdnHomePortletId' . $pageId . '" class="homePortletClass" value="' . $pageId . '">';
                    $closeBtn = '<span style="float:right;cursor:pointer;" data-rel="tooltip" data-original-title="Delete" title=""><img src="' . APP_URL . 'img/close-btn.png" width="16" height="16" alt="Close" onclick="removeFromHomePortlet(' . $pageId . ');deleteMenu(' . $menuId . ');"></span>';
                }

                $data .= '<div class="'.$divClass.'" id="' . $divId . '">' . $pageTitle . $hdnFld . $closeBtn . '</div>';
            }
        } else
            {
                /* For main menu */
                    if($menuType == 1)
                        $data = '<div id="emptyTextMainMenu" style="margin-left: 7px;">No menus assigned</div>';
                    
                    /* For bottom menu */
                    else if($menuType == 2)
                       $data = '<div id="emptyTextBottomMenu" style="margin-left: 7px;">No menus assigned</div>';
                    
                    /* For top menu */
                    else if($menuType == 3)
                        $data = '<div id="emptyTextTopMenu" style="margin-left: 7px;">No menus assigned</div>';
                    
                    /* For home portlet */
                    else if($menuType == 4)
                        $data = '<div id="emptyTextHomePortlet" style="margin-left: 7px;">No menus assigned</div>';
                    
            }

        echo json_encode(array('result' => $data));
    }

    /*
      Function to get global menu  page.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */

    public function getGlobalMenuList($menuType, $linkType) {
        $data = '';
        include_once(CLASS_PATH.'clsLinks.php');
        $objPages        = new clsGlobalLink;
        $result = $objPages->manageGL('VA',0,0,0, $menuType, 0, $linkType, '');
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $pageId     = $row['intPageId'];
                $pageTitle  = htmlspecialchars_decode($row['vchTitle'], ENT_QUOTES);
                
                $strExtmenu = ($row['tinMenuType']==1)?' (Main Menu)':' (Footer Menu)';
                
                $data .= '<option value="' . $pageId . '" data-menu="'.$row['tinMenuType'].'">' . $pageTitle.$strExtmenu. '</option>';
            }
        } else {
             $data = '<div class="center">No menus assigned</div>';
        }
        echo json_encode(array('result' => $data));
    }

    /*
      Function to delete Menu.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */

    public function deleteMenu($id) {
        $data = '';
        include_once(CLASS_PATH.'clsLinks.php');
        $objPages        = new clsGlobalLink;
        $result          = $objPages->manageGL('D',$id,0,0, 0, 0, 0,'');
    }
/*
        Function to delete main Menu.
        By: T Ketaki Debadarshini 
        On: 31-Aug-2015
        */
        public function deleteFromMainMenu($menuId,$pageId) 
        {  
            include_once(CLASS_PATH.'clsLinks.php');
            $objPages        = new clsGlobalLink;
            $result = $objPages->manageGL('R',0,0,$pageId, 0, 0, 0,'');
            
            $row    = mysqli_fetch_array($result);
            $total  = $row['TOTAL'];
            if($total > 0)
            {
                echo json_encode(array('result'=>1));
            }
            else
            {
                $this->deleteMenu($menuId);
                echo json_encode(array('result'=>2));
            }
        }
     /*
        Function to get total menu records.
        By: T Ketaki Debadarshini 
        On: 31-Aug-2015
        */
        public function getTotalMenuRecords() 
        { 
            include_once(CLASS_PATH.'clsLinks.php');
            $objPages        = new clsGlobalLink;
            $result = $objPages->manageGL('CN',0,0,0,0,0,0,'');
            
            $row    = mysqli_fetch_array($result);
            $total  = $row['TOTAL'];
            echo json_encode(array('result'=>$total));
        }
    /*
      Function to Display Page content.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */

    public function getPageContent($id) {
        $arrList        = array();
        $pageArr        = array();
        include_once(CLASS_PATH.'clsLinks.php');
        $langId          = $_REQUEST['lang'];  
        $objPages        = new clsPages;
        
        $pageContent    = "";  
        if($langId==1){
            $subSql1        = $objPages->managePageContent('V1',0,$id,0,'','','');
            while($subRow1 = mysqli_fetch_array($subSql1))
            {
                $pageContent .= ($subRow1['vchContentE'] != "")?htmlspecialchars_decode(str_replace('&quot;','"',$subRow1["vchContentE"]),ENT_NOQUOTES):'';                                                                                
            }
        }else{
            $subSql2        = $objPages->managePageContent('V2',0,$id,0,'','','');
            while($subRow2  = mysqli_fetch_array($subSql2))
            {
               $pageContent .= ($subRow2['vchContentH'] != "")? urldecode($subRow2['vchContentH']):'';                                                                                
            }
        }
     
        
        $pageArr['strContent'] = $pageContent;
        echo(json_encode($pageArr));
    }
      
  
	
/*
      Function to show Page Content.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */
	public function showContent()
	{
                include_once(CLASS_PATH.'clsLinks.php');
		$objPage			= new clsPages;
		$pageId				= $_REQUEST['PID'];
                $pageNo				= $_REQUEST['PNO'];
		$result				= $objPage->viewPageContent($pageId,$pageNo);
                //echo 'sss';
		echo json_encode(array('content'=>$result));
	}
     /*
      Function to Read Page Content.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */
	public function readPageContent()
	{
                include_once(CLASS_PATH.'clsLinks.php');
		$objPage			= new clsPages;
		$pageId				= $_REQUEST['PID'];
		$result				= $objPage->readPageContent($pageId);
		echo json_encode(array('contentResult'=>$result));
	}
    
	
       
        /*Function to show page details 
		By: T Ketaki Debadarshini
		On: 31-Aug-2015
	 */
         public function getPage($selVal) {
             include_once(CLASS_PATH.'clsLinks.php');
            $objPages        = new clsPages;
            $result = $objPages->managePage('PL','0','','','',0,'','0','','','',0,0,0,0,'0000-00-00','0000-00-00','','','','','','','0','',0);
            
            $opt	= '<option value="0">--Select--</option>';
            $opt	.= '<option value="H">Home</option>';
            if(mysqli_num_rows($result)>0)
            {							
                    while($row	= mysqli_fetch_array($result))
                    {
                            $intPageId	= $row["intPageId"];
                            $strPageName	= ucwords(strtolower (htmlspecialchars_decode($row["vchTitle_E"],ENT_QUOTES)));
                            $select		= ($intPageId==$selVal)?'selected="selected"':'';
                            $opt .= '<option value="'.$intPageId.'" title="'.$strPageName.'" '.$select.'>'.$strPageName.'</option>';
                    }				
            }
            $link_arr["pagename"] = $opt;
            echo json_encode(array('page'=>$link_arr));
         }
  
         /*Function to fill Primary Link 
		By: Rasmi Ranjan Swain
		On: 31-Aug-2015
	 */
         public function fillPrimaryLink()
	{
                include_once(CLASS_PATH.'clsLinks.php');
		$objGL	= new  clsGlobalLink();
		$selVal		= $_REQUEST['selVal'];
                $glID		= $_REQUEST['glID'];
		$result		= $objGL->fillPrimaryLink($glID,$selVal);
		echo json_encode(array('plLink'=>$result));
	}
        /*Function to fill Primary Link 
		By: Rasmi Ranjan Swain
		On: 31-Aug-2015
	 */
         public function viewPrimaryLink()
	{

                include_once(CLASS_PATH.'clsLinks.php');
		$objGL	= new  clsGlobalLink();
                $glID		= $_REQUEST['glID'];
		$result		= $objGL->viewPL($glID);
		echo json_encode(array('plLinkVal'=>$result));
	}
        /*
      Function to Read Page Content.
      By: T Ketaki Debadarshini 
      On: 23-Nov-2015
     */
	public function readPageContentH()
	{
                include_once(CLASS_PATH.'clsLinks.php');
		$objPage			= new clsPages;
		$pageId				= $_REQUEST['PID'];
		$result				= $objPage->managePageContent('V2',0,$pageId,0,'','','');
                $arrRow = array();
                if($result->num_rows>0)
                {
                    $ctr	= 0;
                    while($row=$result->fetch_array())
                    {
                        $arrRow[$ctr]['intContentId']	= $row['intContentId'];
                        $arrRow[$ctr]['intPageId']		= $row['intPageId'];
                        $arrRow[$ctr]['intPageNo']		= $row['intPageNo'];
                       // $arrRow[$ctr]['strContent']		= htmlspecialchars_decode(str_replace('&quot;','"',$row["vchContentH"]),ENT_NOQUOTES);
                         $arrRow[$ctr]['strContent']		= urldecode($row["vchContentH"]);
                        $ctr++;
                    }
                }
                echo json_encode(array('contentResult'=>$arrRow));     
		
	}
        /*Function to View FeedBack Detail
               By: Rasmi Ranjan Swain
               On: 31-Aug-2015
        */
        public function viewFeedBackDetail()
        { 
            $feeBackId		= (isset($_REQUEST['FID']) && $_REQUEST['FID']>0)?$_REQUEST['FID']:0;
            $objFeedBack	= new ClsMangePortalFeedBack();
            $result		= $objFeedBack->viewFeedBack('V', $feeBackId, '0', '');
            $Subject		= $result[0]['strSubject'];
            $Message		= $result[0]['strMessage'];
            $Remark		= $result[0]['strRemarks'];
            $remarkDate		= date("d-M-Y",strtotime($result[0]['strUpdatedOn']));
            echo json_encode(array('strSubject'=>$Subject,'strMessage'=>$Message,'strRemark'=>$Remark,'remarkDate'=>$remarkDate));
        }
       
      
   
        
        
 /*
     Function to get home page logo.
     Created by     : Rasmi Ranjan Swain
     Created On     : 31-Aug-2015
 */   

    
     public function getLogo() { 
           include_once(CLASS_PATH.'clsLogo.php');
           $objLogo	= new clsLogo();
           $result	= $objLogo->manageLogo('V',0,'','','','','','','',0,0,0,0);
            
           $row	= mysqli_fetch_array($result);            
           $data       = '<img src="'.APP_URL.'uploadDocuments/Logo/'.$row['VCH_IMAGE'].'" alt="'.$row['VCH_LOGO_TITLE'].'" title="'.$row['VCH_LOGO_TITLE'].'" class="pull-left"  />';  
          
            echo json_encode(array('result'=>$data));

        }

        /*
            Function to check Duplicate User Id/EMail-Id.
            By: Rasmi Ranjan Swain
            On: 31-Aug-2015
           */

          public function checkDuplicateUser($userId,$contrlval,$flag) {

               $objUser			= new clsUserProfile;
              if($flag==1) //1 for user id, 2- for Email-id
                $result                 = $objUser->manageUser('S',$userId,0,0,0,0,'','0','','','','','','','','','','',$contrlval,'','0',0,'0','0','0','1','0'); 
              else
                $result                 = $objUser->manageUser('S',$userId,0,0,0,0,'','0','','','','','','','','',$contrlval,'','','','0',0,'0','0','0','1','0'); 

              $data           = mysqli_num_rows($result);
           
              echo json_encode(array('result' =>$data));
          }
         
        
         
          /*
            Function to change the password 
            By: Rasmi Ranjan Swain
            On: 21-Aug-2015
           */
            public function resetPassword($userId)
            {
                $objUser	        = new clsMangeUsers;
                
                $randompwd = bin2hex(openssl_random_pseudo_bytes(4));
                $encrypted_pass     = md5($randompwd);
                $result			= $objUser->manageUsers('UPW',$userId,'','','','','','',$encrypted_pass,0,0,0);
                if(mysqli_num_rows($result)>0)
                {							
                        while($row	= mysqli_fetch_array($result))
                        {
                            $arr['intuserId']	= $row["INT_USER_ID"];
                            $arr['strEmailid']	= $row["VCH_EMAIL"];
                            $arr['strPassword']	= $randompwd;
                            
                            if(sendMail==Y)
                              {
                                $MailMessageuser='';
                                $Subjectuser    = "Change Password .";
                                $strTo          = $arr['strEmailid'];
                                $strFrom	= portalEmail;
                                $MailMessageuser.= "Your Password has been changed. Find your Log-in Details below </br>";
                                $MailMessageuser.="<div>";
                                $MailMessageuser.="<strong>User-id &nbsp; &nbsp; &nbsp; : </strong>";
                                $MailMessageuser.=$arr['strEmailid']."<br/>";
                                $MailMessageuser.="<strong>Password &nbsp; &nbsp; &nbsp; : </strong>";
                                $MailMessageuser.=$randompwd."<br/>";
                                $MailMessageuser.="</div>";
                                //Mail to user
                                Model::Sendmail($strFrom,$strTo,$Subjectuser,$MailMessageuser);
                                 
                             }
                        }				
                }
                echo json_encode(array('user'=>$arr));
            }
            
       /*Function to fill Plugins
		By: Rasmi Ranjan Swain
		On: 09-Sept-2015
	 */
         public function fillPlugins()
	{
            $objPL	= new  clsAdminLinks;
            $result	= $objPL->manageAdminPLinks('VF',0,0,'','');
            $count      = mysqli_num_rows($result);
            
            $arrList        = array();
            $pageArr        = array();
            
            if ($count > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    
                    $pageArr['intplId']  = ($row['INT_ID']!='')?$row['INT_ID']:0;
                    $pageArr['intfunId'] = $row['INT_FN_ID'];
                    if($pageArr['intplId']==0)
                     $pageArr['strplName']  = htmlspecialchars_decode($row['VCH_NAME'], ENT_QUOTES).'(Home Page Plugin)';
                    else
                       $pageArr['strplName']  = htmlspecialchars_decode($row['VCH_NAME'], ENT_QUOTES);
                    
                    array_push($arrList, $pageArr);
                }
            } 
            echo(json_encode(array('plLinkVal'=>$arrList)));
            
	}
        
       /*Function to fill Plugin types
		By: Rasmi Ranjan Swain
		On: 09-Sept-2015
	 */
         public function getPluginTypes($funcId)
	{
            $objPlugin	= new clsPlugin;
            $result	= $objPlugin->managePlugin('FNT',0,$funcId,0,'','',0,0,0,'0000-00-00','0000-00-00','0000-00-00');
            $count      = mysqli_num_rows($result);
            
            $arrList        = array();
            $pageArr        = array();
            
            if ($count > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    
                    $pageArr['intsubCatId']  = $row['INT_SUBCAT_ID']; 
                    $pageArr['intfunId'] = $row['INT_FN_ID'];
                    $pageArr['strsubcatName']  = htmlspecialchars_decode($row['VCH_SUBCATEGORY'], ENT_QUOTES);
                    
                    array_push($arrList, $pageArr);
                }
            } 
            echo(json_encode(array('fnCategory'=>$arrList)));
            
	} 
        
     /*Function to fill location details
		By: T Ketaki Debadarshini
		On: 10-Sept-2015
	 */
         public function fillLocation()
	{
            $objLoc	= new clsLocation;
            $result	= $objLoc->manageLocation('V',0,'','','',0);
            $count      = mysqli_num_rows($result);
            
            $arrList        = array();
            $pageArr        = array();
            
            if ($count > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    
                    $pageArr['intLocId']  = $row['INT_LOCATION_ID']; 
                    $pageArr['strLocName']  = htmlspecialchars_decode($row['VCH_LOCATION'], ENT_NOQUOTES);                   
                    array_push($arrList, $pageArr);
                }
            } 
            echo(json_encode(array('result'=>$arrList)));
            
	}
         /*Function to fill Department details
		By: T Ketaki Debadarshini
		On: 11-Sept-2015
	 */
         public function getDepartments($intLocid)
	{
            $objDept	= new clsDepartment;
            $result	= $objDept-> manageDepartment('V',0,$intLocid,'','','',0,0);          
            $count      = mysqli_num_rows($result);
            
            $arrList        = array();
            $pageArr        = array();
            
            if ($count > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    
                    $pageArr['intDeptId']  = $row['INT_DEPARTMENT_ID']; 
                    $pageArr['strDeptName']  = htmlspecialchars_decode($row['VCH_DEPARTMENT_NAME'], ENT_NOQUOTES);                   
                    array_push($arrList, $pageArr);
                }
            } 
            echo(json_encode(array('result'=>$arrList)));
            
	}
        
      /*Function to fill Designation details
		By: T Ketaki Debadarshini
		On: 11-Sept-2015
	 */
         public function getDesignation($intDeptid)
	{
            $objDesg	= new clsDesignation;
            $result	= $objDesg->manageDesignation('V',0,0,$intDeptid,'','',0,0);         
            $count      = mysqli_num_rows($result);
            
            $arrList        = array();
            $pageArr        = array();
            
            if ($count > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    
                    $pageArr['intDesgId']  = $row['INT_DESIGNATION_ID']; 
                    $pageArr['strDesgName']  = htmlspecialchars_decode($row['VCH_DESIGNATION_NAME'], ENT_NOQUOTES);                   
                    array_push($arrList, $pageArr);
                }
            } 
            echo(json_encode(array('result'=>$arrList)));
            
	}  
        
	
 	/*
        Function to Fill Global Menu list.
        By: Rasmi Ranjan swain
        On: 10-JUN-2016
       */
	   
        public function fillGLLink()
            {
                $selVal			= $_REQUEST['selVal'];
                $glSql			= "CALL USP_ADMIN_GL('S',0,'',@OUT);";
                $fillResult		= Model::executeQry($glSql);
                $selOptions		= Model::FillDropdown($fillResult,$selVal);
                echo json_encode(array('globalMenu'=>$selOptions));
            }
	/*
        Function to Fill Primary Menu list.
        By: Rasmi Ranjan swain
        On: 10-JUN-2016
       */
	   
        public function fillPLLink()
             {
                     $selVal			= $_REQUEST['selVal'];
                     $glId                      = $_REQUEST['glID'];
                     $glSql			= "CALL USP_ADMIN_PL('S',0,$glId,'','',@OUT);";				
                     $fillResult		= Model::executeQry($glSql);
                     $selOptions		= Model::FillDropdown($fillResult,$selVal);
                     echo json_encode(array('primaryMenu'=>$selOptions));
             }

     /*Function to fill District details
		By: T Ketaki Debadarshini
		On: 2-Sep-2016
	 */
    public function fillDistricts()
	{
            include_once( CLASS_PATH.'clsDistrict.php');
            $objDist		= new clsDistrict;
            $result		= $objDist->manageDistrict('F',0,'','','','',0,0,0);
            $count              = $result->num_rows;
            $arrList            = array();
            $pageArr            = array();
            if ($count > 0) {
                    while ($row = $result->fetch_array()) {

                            $pageArr['intDistId']    = $row['intDistrictid']; 
                            $pageArr['strDistName']  = htmlspecialchars_decode($row['vchDistrictname'], ENT_QUOTES);                   
                            array_push($arrList,$pageArr);
                    }
            } 
            echo(json_encode(array('result'=>$arrList)));
		
	}
        
        public function getNews()
        {
                include_once( CLASS_PATH.'clsNews.php');
                $arrList		= array();
                $pageArr['news']        = array();
                $pageArr['snipet']      = array();
                $objNews		= new clsNews;
                $newsId			= $_REQUEST['ID'];
                $result			= $objNews->readNews($newsId);
                array_push($pageArr['news'], $result); 
                
                
                 echo json_encode(array('newss'=>$pageArr));
        }

        public function getGalCatDetails()
       {
            include_once( CLASS_PATH.'clsGallery.php');
           $objCat			= new clsGalleryCategory;
           $catId			= $_REQUEST['ID'];
           $result			= $objCat->readGalleryCategory($catId);
           echo json_encode(array('CatDetails'=>$result));
       }

        public function getGalleryDetails()
       { 
            include_once( CLASS_PATH.'clsGallery.php');
           $objGallery			= new clsGallery;
           $galleryId			= $_REQUEST['ID'];
           $result			= $objGallery->readGallery($galleryId);
           echo json_encode(array('GalleryDetails'=>$result));
       }
       
       /*Function to show Category details 
            By: T Ketaki Debadarshini
            On: 17-Aug-2015
     */
     public function getCategory($selVal) {
         
         include_once( CLASS_PATH.'clsGallery.php');
        $intType	= $_REQUEST['selType']; 
        $objGallerycat	= new clsGalleryCategory();

       // echo $sql;
       $result = $objGallerycat->manageGalleryCategory('F',0,$intType,'','','','',0,0);
       $opt	= '<option value="0">--Select--</option>';

        if(mysqli_num_rows($result)>0)
        {               
            while($row	= mysqli_fetch_array($result))
            {
                $intCatId	= $row["INT_CATEGORY_ID"];
                $strCatNameE	= ucwords(strtolower (htmlspecialchars_decode($row["VCH_CATEGORY_NAME"],ENT_QUOTES)));
                $strCatNameO	= htmlspecialchars_decode($row["VCH_CATEGORY_NAME_O"],ENT_QUOTES);

                $select		= ($intCatId==$selVal)?'selected="selected"':'';

                $opt .= '<option value="'.$intCatId.'" title="'.$strCatNameE.'" '.$select;

                $opt .= '>'.$strCatNameE.'</option>';

            }

        }

        echo json_encode(array('category'=>$opt));
     }
     
       /*
      Function to get FAQ details
      By: T Ketaki Debadarshini
      On: 1-Dec-2015
     */ 
      public function getFaqDetails()
	{
            include_once( CLASS_PATH.'clsFaq.php');
            $objFaq      = new clsFaq;
            $faqId	 = $_REQUEST['ID'];
            $result	 = $objFaq->readFaq($faqId);
            echo json_encode(array('faqdtl'=>$result));
	}
        
         /*Function to show Qualification details 
            By: T Ketaki Debadarshini
            On: 21-March-2017
        */
        public function fillEducation() {

           include_once( CLASS_PATH.'clsCourse.php');
           $intSelval           = $_POST['selval']; 
           $intType             = $_POST['selType']; 
           $objCourse           = new clsCourse();
           
           $result              = $objCourse->viewCourse('RQ',0,0,'','','',0,0,'','',0,0,0,0,'');
           $opt                 = '<option value="0">--Select--</option>';

           if(mysqli_num_rows($result)>0)
           {               
               while($row           = mysqli_fetch_array($result))
               {
                   $intCatId        = $row["intQualifyValue"];
                   $strCatNameE     = htmlspecialchars_decode($row["vchQualification"],ENT_QUOTES);
                   $strCatNameO     = $row["vchQualificationO"];

                   $strLabel        = ($intType==2 && $strCatNameO!='')?$strCatNameO:$strCatNameE;
                   $strClass        = ($intType==2 && $strCatNameO!='')?'odia':'';
                   
                   $select          = ($intCatId==$intSelval)?'selected="selected"':'';
                   $opt             .= '<option value="'.$intCatId.'" class="'.$strClass.'" title="'.$strCatNameE.'" '.$select;
                   $opt             .= '>'.$strLabel.'</option>';
               }

           }

           echo json_encode(array('category'=>$opt));
        }
        
       /*Function to show sector details 
            By: T Ketaki Debadarshini
            On: 22-March-2017
        */
        public function fillSector() {

           include_once(CLASS_PATH.'clsSector.php');
           $intSelval           = $_POST['selval']; 
           $objSector           = new clsSector;	
           
           $result              = $objSector->manageSector('F',0,'','','','','','',0,0);          
           $opt                 = '<option value="0">--Select--</option>';

           if(mysqli_num_rows($result)>0)
           {               
               while($row           = mysqli_fetch_array($result))
               {
                   $intCatId        = $row["intSectorId"];
                   $strCatNameE     = htmlspecialchars_decode($row["vchSecotrName"],ENT_QUOTES);
                   
                   $select          = ($intCatId==$intSelval)?'selected="selected"':'';
                   $opt             .= '<option value="'.$intCatId.'" title="'.$strCatNameE.'" '.$select;
                   $opt             .= '>'.$strCatNameE.'</option>';
               }

           }

           echo json_encode(array('category'=>$opt));
        } 
        
        /*Function to show nstitute details 
            By: T Ketaki Debadarshini
            On: 23-March-2017
        */
        public function fillInstitute() {

           include_once( CLASS_PATH.'clsInstitute.php');
           $objInstitute        = new clsInstitute;	
           $intSelval           = $_POST['selval']; 
           $intDist             = ($_POST['selDist']!='')?$_POST['selDist']:0; 
           $result              = $objInstitute->manageInstitute('F',0,$intDist,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',0,'',0,0,0,'');
           $opt                 = '<option value="0">--Select--</option>';
           $aryInstituteType          = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI'); 
           if(mysqli_num_rows($result)>0)
           {               
               while($row           = mysqli_fetch_array($result))
               {
                   $intInstituteId      = $row["intInstituteId"];
                   $strCatNameE         = htmlspecialchars_decode($row["vchInstituteName"],ENT_QUOTES).' ('.$aryInstituteType[$row['tinIsPIA']].')';
                   
                   $select              = ($intInstituteId==$intSelval)?'selected="selected"':'';
                   $opt                 .= '<option value="'.$intInstituteId.'" title="'.$strCatNameE.'" '.$select;
                   $opt                 .= '>'.$strCatNameE.'</option>';
               }

           }

           echo json_encode(array('category'=>$opt));
        } 
        
        /*Function to show nstitute details 
            By: T Ketaki Debadarshini
            On: 23-March-2017
        */
        public function fillCourse() {

           include_once( CLASS_PATH.'clsCourse.php');
           $objCourse           = new clsCourse;	
           $intSelval           = $_POST['selval']; 
           $intSector           = ($_POST['selSector']!='')?$_POST['selSector']:0;  
           $result              = $objCourse->viewCourse('V',0,$intSector,'','','',0,0,'','',0,0,0,0,'');
           $opt                 = '<option value="0">--Select--</option>';

           if(mysqli_num_rows($result)>0)
           {               
               while($row = mysqli_fetch_array($result))
               {
                   $intCourseId           = $row["intCourseId"];
                   $strCourseName         = htmlspecialchars_decode($row["vchCourseNameE"],ENT_QUOTES);
                   
                   $select              = ($intCourseId==$intSelval)?'selected="selected"':'';
                   $opt                 .= '<option value="'.$intCourseId.'" title="'.$strCourseName.'" '.$select;
                   $opt                 .= '>'.$strCourseName.'</option>';
               }

           }

           echo json_encode(array('course'=>$opt));
        } 
 
        /*********** Function for all get INSTITUE/COURSE List ***************** 
            By: T Ketaki Debadarshini
            On: 23-March-2017	  
        **********************************************************/
        public function getCoursesDetails() { 

            include_once( CLASS_PATH.'clsInstituteCourse.php');
            $objCourse           = new clsInstituteCourse;	
            $intInstituteid      = $_POST['intInstituteid']; 
          
            $result              = $objCourse->manageInstituteCourse('VA',0,0,$intInstituteid,0,0,0,0,0,'');
            $arrList             = array();
            $ctr                 = 0;
            if ($result->num_rows > 0) {
                while($row  = $result->fetch_array()){

                    $arrList[$ctr]['intInstituteId']    = $row['intInstituteId'];
                    $arrList[$ctr]['intInstCourseid']   = $row['intInstCourseid'];
                    $arrList[$ctr]['vchCourseNameE']    = htmlspecialchars_decode($row['vchCourseNameE'],ENT_QUOTES);
                    $arrList[$ctr]['intCourseId']       = $row['intCourseId'];
                    $arrList[$ctr]['intBatchNo']        = $row['intBatchNo'];
                    $arrList[$ctr]['intBatchStrength']  = $row['intBatchStrength'];
                    $arrList[$ctr]['intCourseType']     = $row['intCourseType'];

                    $ctr++;  
                }
            }
            echo json_encode(array('courseDetails'=>$arrList));
        }
        
         /*
         * Function to upload files to temporary folder
         * By : T Ketaki Debadarshini
         * On : 19-April-2015
         */
        public function uploadFileToTemp()
        {
            $error = "";
            $msg = "";            
            $url                = 'temp/';
            $formatedFileName   = $_POST["fName"]; 
            $hdnVal             = $_POST["hdnVal"]; 
            $filename           = $_POST["filename"]; 
            $fileNewName        = $_FILES[$filename]['name'] ;
            $fileTemp           = $_FILES[$filename]['tmp_name'];
            $extension          = pathinfo($fileNewName, PATHINFO_EXTENSION);
            $formattedFileName  = $formatedFileName.'_'.date("Ymd_His").'.'.$extension;
            $fileMimetype           = mime_content_type($fileTemp);
            $errFlag               = 0;
           
            //echo $fileMimetype."===".$extension;exit;
            if($fileMimetype!='image/gif' && $fileMimetype!='image/jpeg' && $fileMimetype!='image/jpg' && $fileTemp!='' && $fileMimetype!='application/pdf') {
                $errFlag               = 1;
                $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif,pdf';
                echo json_encode(array("status"=>$errFlag, "msg"=>$outMsg)); 
            }
           else{
               if($hdnVal!='' && file_exists($url.$hdnVal)){
                    unlink($url.$hdnVal);
                }
              if($fileMimetype=='image/gif' && $fileMimetype=='image/jpeg' && $fileMimetype=='image/jpg' && $fileTemp=='' && $fileMimetype=='application/pdf'){ 
                if($this->GetResizeImage($this,$url,650,0,$formattedFileName,$fileTemp)==0) //move_uploaded_file($fileTemp,$url.$formattedFileName)
                    $formattedFileName =  $formattedFileName; 
                else
                    $formattedFileName =  '';
              }else{
                        if($fileMimetype=='image/gif' && $fileMimetype=='image/jpeg' && $fileMimetype=='image/jpg' && $fileTemp=='' && $fileMimetype=='application/pdf'){
                        move_uploaded_file($fileTemp,$url.$formattedFileName);
                        $formattedFileName =  $formattedFileName;
                        }else{
                            $errFlag               = 1;
                            $outMsg                = 'Invalid file types. Upload only jpg,jpeg,gif,pdf';

                        }
              } 
                 echo json_encode(array("status"=>$errFlag,"savedFileName"=>$formattedFileName, "filePath"=>APP_URL.$url));
            } 
        }
        
         /*********** Function for all get INSTITUE Gallery List ***************** 
            By: T Ketaki Debadarshini
            On: 19-April-2017	  
        **********************************************************/
        public function getInstGalleryDetails() { 

            include_once( CLASS_PATH.'clsInstGallery.php');
            $objGallery           = new clsInstGallery;	
            $intInstituteid      = $_POST['intInstituteid']; 
          
            $result              = $objGallery->manageInstGal('V',0,0,$intInstituteid,'','','','','',0,0,0);
            $arrList             = array();
            $ctr                 = 0;
            if ($result->num_rows > 0) {
                while($row  = $result->fetch_array()){

                    $arrList[$ctr]['intInstGalId']    = $row['intInstGalId'];
                    $arrList[$ctr]['intDistId']       = $row['intDistId'];
                    $arrList[$ctr]['vchCaptionE']     = htmlspecialchars_decode($row['vchCaptionE'],ENT_QUOTES);
                    $arrList[$ctr]['tinInstId']       = $row['tinInstId'];
                    $arrList[$ctr]['vchCaptionO']     = $row['vchCaptionO'];
                    $arrList[$ctr]['vchImage']        = $row['vchImage'];

                    $ctr++;  
                }
            }
            echo json_encode(array('galleryDetails'=>$arrList));
        }
        
        /*Function to show training partner details 
            By: T Ketaki Debadarshini
            On: 08-Jan-2017
        */
        public function fillInstitutePartner() {

           include_once( CLASS_PATH.'clsInstitute.php');
           $objInstitute        = new clsInstitute;	
           $intSelval           = $_POST['selval']; 
          
           $result              = $objInstitute->manageInstitute('FP',0,0,'','',0,0,'','','','','','','','','','',0,0,0,0,'','',0,'',0,0,0,'');
           $opt                 = '<option value="0">--Select--</option>';
        
           if(mysqli_num_rows($result)>0)
           {               
               while($row           = mysqli_fetch_array($result))
               {
                   $intInstituteId      = $row["intInstituteId"];
                   $strCatNameE         = htmlspecialchars_decode($row["vchInstituteName"],ENT_QUOTES);
                   
                   $select              = ($intInstituteId==$intSelval)?'selected="selected"':'';
                   $opt                 .= '<option value="'.$intInstituteId.'" title="'.$strCatNameE.'" '.$select;
                   $opt                 .= '>'.$strCatNameE.'</option>';
               }

           } 

           echo json_encode(array('partnerDtls'=>$opt));
        } 
        
         /*Function to fill india skill details
		By: T Ketaki Debadarshini
		On:  30-Jan-2018
	 */
        public function fillIndiaSkill()
	{
            include_once( CLASS_PATH.'clsSkillCompetition.php');
            $objCompete                 = new  clsSkillCompetition;           
                           
            $result                     = $objCompete->manageSkillCompetition('SK',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');           
            $count                      = $result->num_rows;
            $arrList                    = array();
            $pageArr                    = array();
            if ($count > 0) {
                while ($row = $result->fetch_array()) {

                    $pageArr['intSkillId']          = $row['intSkillId'];                  
                    $pageArr['strSkillName']        = htmlspecialchars_decode($row['vchSkillName'], ENT_QUOTES);  
                   
                    array_push($arrList,$pageArr);
                }
                 
            }
           
	   echo(json_encode(array('result'=>$arrList)));	
	}
        
        /*********** Function for all get Event Gallery List ***************** 
            By: Ashis kumar Patra
            On: 19-April-2017	  
        **********************************************************/
        public function getEventGalleryDetails() { 

            include_once( CLASS_PATH.'clsEventVideoGallery.php');
            $objGallery           = new clsEventGallery;	
            $intEventid      = $_POST['eventId']; 
          
            $result              = $objGallery->manageEventGal('R',$intEventid,0,0,'','','','',0,0,0);
            $arrList             = array();
            $ctr                 = 0;
            if ($result->num_rows > 0) {
                while($row  = $result->fetch_array()){

                    $arrList[$ctr]['intEventGalId']   = $row['intEventGalId'];
                    $arrList[$ctr]['intEventId']      = $row['intEventId'];
                    $arrList[$ctr]['vchCaptionE']     = htmlspecialchars_decode($row['vchCaptionE'],ENT_QUOTES);
                   
                    $arrList[$ctr]['vchCaptionO']     = $row['vchCaptionO'];
                    $arrList[$ctr]['vchvideoURL']     = htmlspecialchars($row['vchImage']);
                    $ctr++;  
                }
            }
            echo json_encode(array('galleryDetails'=>$arrList));
        }
       
        
      /*Function to fill iEvent details
		By: Ashis kumar Patra
		On:  17-April-2018
	 */
        public function fillEventList()
	{
            include_once( CLASS_PATH.'clsEventDetails.php');
            $objCompete                 = new  clsEventDetails;           
                           
            $result                     = $objCompete->manageEventDetails('GE', 0, '', '', '0', 0,0,'0000-00-00','0000-00-00');           
            $count                      = $result->num_rows;
            $arrList                    = array();
            $pageArr                    = array();
            if ($count > 0) {
                while ($row = $result->fetch_array()) {

                    $pageArr['intEventId']          = $row['intEventId'];                  
                    $pageArr['strEventName']        = htmlspecialchars_decode($row['vchEventName'], ENT_QUOTES);  
                   
                    array_push($arrList,$pageArr);
                }
                 
            }
           
	   echo(json_encode(array('result'=>$arrList)));	
	} 
        
          /*************************************get language data by :: samir kumar on:: 10-09-2018************************************************************/

    public function getlangDataUrl(){
        include(CLASS_PATH . 'clsTranslate.php');
        $objTrans = new clsTranslate;
        $getUrl = ($_REQUEST['getUrl']!='')?$_REQUEST['getUrl']:'';
        $transRes = $objTrans->manageTranslate('V',0,$getUrl,'','','','','','','','');
        //$transRes = $objTrans->manageTranslate('V',0,'','','','','','','','','');
        $allLang = array();
        if($transRes->num_rows > 0){
            while ($res = $transRes->fetch_array()) {
                $data['ids']         = $res['intId'];
                $data['engLang']    = htmlspecialchars_decode($res['vchEnglish'],ENT_QUOTES);
                $data['hinLang']    = $res['vchHindi'];
                $data['odiLang']    = $res['vchOdia'];
                array_push($allLang, $data);
            }
            echo json_encode(array('langData' => $allLang));
        }else{
            echo json_encode(array('langData' => $allLang));
        }

    }


    /*************************************get language data by :: samir kumar on:: 19-09-2018************************************************************/

    public function getWebURL(){
        include(CLASS_PATH.'clsTranslate.php');
        $objTrans = new clsTranslate;
        $result = $objTrans->manageTranslate('GAU',0,'','','','','','','','','');
        $data .= '<option value="">--Select--</option>';
        while ($row = $result->fetch_array()) {
            $intId = $row['intId'];
            $vchPagename = $row['vchPagename'];
            $vchPageURL  = $row['vchPageURL'];
            if ($intId == $selUserId)
                $selected = "selected";
            else
                $selected = "";
            $data .= '<option value="' . $intId . '" ' . $selected . '>' . $vchPageURL . '</option>';
        }
        echo json_encode(array('result' => $data));

    }


     /*************************************get language data by :: samir kumar on:: 20-09-2018************************************************************/

    public function checkdbPage(){
        include(CLASS_PATH.'clsTranslate.php');
        $objTrans = new clsTranslate;
        $urlId = $_REQUEST['urlId'];
        $result = $objTrans->manageTranslate('CT',$urlId,'','','','','','','','','');
        $res = $result->fetch_array();
        echo json_encode(array('result' => $res['@P_SQL']));

    }



     /*************************************get content from DB by :: samir kumar on:: 20-09-2018************************************************************/

    public function getContentfromDb(){
        include(CLASS_PATH.'clsTranslate.php');
        $objTrans = new clsTranslate;
        $urlId = $_REQUEST['txtwebUrlId'];
        $result = $objTrans->manageTranslate('GUD',$urlId,'','','','','','','','','');
        $finalArr = array();
        while ($row = $result->fetch_array()) {
            $dtaVal['intId']        = $row['intId'];
            $dtaVal['intPageId']    = $row['intPageId'];
            $dtaVal['vchWebpage']   = $row['vchWebpage'];
            $dtaVal['vchEnglish']   = $row['vchEnglish'];
            $dtaVal['vchHindi']     = $row['vchHindi'];
            $dtaVal['vchOdia']      = $row['vchOdia'];
            array_push($finalArr, $dtaVal);
        }
        echo json_encode(array('result' => $finalArr));

    }


    /*************************************get content from DB by :: samir kumar on:: 20-09-2018************************************************************/

    public function deletePagedata(){
        include(CLASS_PATH.'clsTranslate.php');
        $objTrans = new clsTranslate;
        $pageId = $_REQUEST['pageId'];
        $result = $objTrans->manageTranslate('DPD',$pageId,'','','','','','','','','');
        $row = $result->fetch_array();
        if ($row[0] == 0) {
            $res = 200;
        }else{
            $res = 500;
        }
        echo json_encode(array('result' => $res));

    }




    


     /*************************************Translation form submit through ajax by :: samir kumar on:: 23-10-2018************************************************************/

    public function translateSubmit(){
        include(CLASS_PATH.'clsTranslate.php');
        $objTranslate = new clsTranslate;
        $errFlag      = 0;
        $txtwebUrl      = $_REQUEST['txtwebUrl'];
        $hdnPagename    = $_REQUEST['hdnPagename'];
        
        $txtEnglish     = $_REQUEST['englishVal'];

        $query = '';
        for($i=0;$i<count($txtEnglish);$i++){
            $engVal     = htmlspecialchars($_REQUEST['englishVal'][$i],ENT_QUOTES);
            $hinVal     = htmlspecialchars($_REQUEST['hindiVal'][$i]);
            $odiVal     = htmlspecialchars($_REQUEST['odiaVal'][$i]);
            $hdnIds     = ($_REQUEST['hdnIds'][$i] != '')?htmlspecialchars($_REQUEST['hdnIds'][$i]):0;
            $blankEnglish   = $objTranslate->isBlank($_REQUEST['englishVal'][$i]);
            

            if ($blankEnglish > 0) {
                $errFlag = 1;
                $flag = 1;
                $outMsg = "Mandatory Fields should not be blank";
            }
            $query     .='(' . $hdnIds . ','.$txtwebUrl.',"'.$hdnPagename.'", "'.$engVal.'", "' . $hinVal . '","' . $odiVal . '"),';   
            
        }
        if($errFlag == 0){
            $query = substr($query, 0, -1);
            $result = $objTranslate->manageTranslate('AU', 0, $hdnPagename, '', '', '', $query, '', '','', ''); 
            if($result == 1){
            echo json_encode(array('status' => 200));
            }else{
                echo json_encode(array('status' => 500));
            }   
        }else{
            echo json_encode(array('status' => 500));
        }
        
        
    }





    /*************************************Translation form submit through ajax by :: samir kumar on:: 23-10-2018************************************************************/

    public function getPagepercent(){
        include(CLASS_PATH.'clsTranslate.php');
        $objTranslate = new clsTranslate;
        $webUrl      = $_REQUEST['webUrl'];
        $result      = $objTranslate->manageTranslate('GPP',0,$webUrl,'','','','','','','','');
        if($result->num_rows > 0){
            $getRes   = $result->fetch_array();
            $hindiCnt = round($getRes['hindiCnt']).'%';
            $odiaCnt  = round($getRes['odiaCnt']).'%';
            echo json_encode(array('status' => 200, 'hindiCnt' => $hindiCnt, 'odiaCnt' => $odiaCnt));
        }else{
            echo json_encode(array('status' => 200, 'hindiCnt' => 0, 'odiaCnt' => 0));
        }
    }
    
    /*Function to get  news CAtegories.
        By: Ashis kumar Patra
        On: 12-Dec-2018'
     */
    public function getNewsCategory() {

       include_once( CLASS_PATH.'clsNews.php');
        include('view/langConverter.php');
       $objNews             = new clsNews;  
       $result              = $objNews->manageNews('NCT',0,0,'','','', '0000-00-00','0000-00-00','','',0,0,0,'0000-00-00','0000-00-00','','','','','');
       $pageArr              = array();
       if(mysqli_num_rows($result)>0)
       {   $ctr=0;            
            while($row = mysqli_fetch_array($result)){
           
            $pageArr[$ctr]['intCategoryId']          = $row["intCategoryId"];
            $pageArr[$ctr]['strNewsType']            = htmlspecialchars_decode($row["vchNewsType"],ENT_QUOTES);
             $ctr++;
           } 
       }

       echo json_encode(array('newsCatRes'=>$pageArr));
    }
    
    public function getReport($selVal) {

         include('view/langConverter.php');
         include_once(CLASS_PATH.'clsReportCategory.php');
        $intType  = $_REQUEST['selType']; 
        $objReportCategory = new clsReportCategory;

       
       $result = $objReportCategory->manageReportCategory('V',0,'','',0,0,0);
       $opt = ' <option value="0">-Select Category-</option>';
    // print_r($result);exit;
         if(mysqli_num_rows($result)>0)
        {               
            while($row  = mysqli_fetch_array($result))
            {
                $intCatId = $row["intReportCategoryId"];
        
                $strCatName     = $row["vchCategoryName"];

                $select   = ($intCatId==$selVal)?'selected="selected"':'';
                $opt .= '<option value="'.$intCatId.'" title="'.$strCatName.'" '.$select;
                $opt .= '>'.$strCatName.'</option>';
            }
             //$opt .= '<option value="0" title="All" class="'.$strLangCls.'">'.$strAlllbl.'</option>';
        }
        echo json_encode(array('category'=>$opt));
     }  



     /*Function to show Mapped Institute details 
            By: Ashis kumar Patra
            On: 11-June-2019
        */
        public function fillMappingData($selVal,$dataType,$instituteType) {

            include_once( CLASS_PATH.'clsInstitute.php');
            $objInstitute        = new clsInstitute;	
            $intSelval           =$selVal; 
            switch(trim($dataType)){
                case "NIC":
                    $action='FMD';
                break;
                case 'SAMS':
                    $action='SMD';
                break;
                default:
                break;

            }
            $result              = $objInstitute->manageInstitute($action,0,0,'','',$instituteType,0,'','','','','','','','','','',0,0,0,0,'','',0,'',0,0,0,'');
            $opt                 = '<option value="0">--Select--</option>';
           // $aryInstituteType          = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI'); 
            if(mysqli_num_rows($result)>0)
            { 
                              
                while($row           = mysqli_fetch_array($result))
                {
                    //echo  $intInstituteId."=====".$intSelval."/n";
                    $intInstituteId      = ($action=='FMD')?$row["vchInstituteCode"]:$row['intInstituteSamsCode'];
                    $strInsNameE         = htmlspecialchars_decode($row["vchInstituteName"],ENT_QUOTES);
                    $select              = ($intInstituteId==$intSelval)?'selected="selected"':'';
                    $opt                 .= '<option value="'.$intInstituteId.'" title="'.$strInsNameE.'" '.$select;
                    $opt                 .= '>'. $strInsNameE.'</option>';
                }
 
            }
            echo json_encode(array('mapData'=>$opt));
         }


    /*Function to show Mapped Sector details 
            By: Ashis kumar Patra
            On: 11-June-2019
        */
        public function fillMappingSector($selVal,$dataType) {

            include_once( CLASS_PATH.'clsSector.php');
            $objSector        = new clsSector;	
            $intSelval           =$selVal; 
            switch(trim($dataType)){
                case "NIC":
                    $action='SMD';
                break;
                case 'SAMS':

                break;
                default:
                break;

            }
            $result              = $objSector->manageSector($action,0,'','','','','','',0,1,'');
            $opt                 = '<option value="0">--Select--</option>';
           // $aryInstituteType          = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI'); 
            if(mysqli_num_rows($result)>0)
            { 
                              
                while($row           = mysqli_fetch_array($result))
                {
                   // echo  $intInstituteId."=====".$intSelval."/n";
                    $intInstituteId      = $row["vchSectorCode"];
                    $strInsNameE         = htmlspecialchars_decode($row["vchSecotrName"],ENT_QUOTES);
                    $select              = ($intInstituteId==$intSelval)?'selected="selected"':'';
                    $opt                 .= '<option value="'.$intInstituteId.'" title="'.$strInsNameE.'" '.$select;
                    $opt                 .= '>'. $strInsNameE.'</option>';
                }
 
            }
            echo json_encode(array('mapData'=>$opt));
         }


          /*Function to show Mapped Course details 
            By: Ashis kumar Patra
            On: 11-June-2019
        */
        public function fillMappingCourse($selVal,$dataType) {

            include_once( CLASS_PATH.'clsCourse.php');
            $objCourse        = new clsCourse;	
            $intSelval           =$selVal; 
            switch(trim($dataType)){
                case "NIC":
                    $action='CMD';
                break;
                case 'SAMS':

                break;
                default:
                break;

            }
            $result              = $objCourse->manageCourse($action,0,0,'','','',0,0,'','',0,0,0,0,'','0.0', 0);
           
            $opt                 = '<option value="0">--Select--</option>';
           // $aryInstituteType          = array('1'=>'I.T.I','2'=>'Polytechnic','3'=>'Training Center','4'=>'ASTI'); 
            if(mysqli_num_rows($result)>0)
            { 
                              
                while($row           = mysqli_fetch_array($result))
                {
                     
                    $intInstituteId      = $row["vchCourseCode"];
                    $intSectorId         = $row["vchSectorId"];
                    
                    $strInsNameE         = htmlspecialchars_decode(htmlspecialchars(str_replace('–','-', $row["vchCourseNameE"]),ENT_QUOTES),ENT_QUOTES);
               
                    $select              = ($intInstituteId==$intSelval)?'selected="selected"':'';
                    $opt                 .= '<option value="'.$intInstituteId.'" title="'.$strInsNameE.'" '.$select;
                    $opt                 .= '>'. $strInsNameE.'</option>';
                }
 //echo $opt;
            }
            try{
                echo json_encode(array('mapData'=>$opt));
            }catch(Exception $e){
              echo "error";
            }
           
         }



         /*Function to show sams course details 
            By: Rahul Kumar Saw
            On: 06-August-2019
        */
        public function fillSAMSCourse() {

           include_once( CLASS_PATH.'clsCourse.php');
           $objCourse           = new clsCourse;    
           $intSelval           = $_POST['selval'];
           $insType             = $_POST['insType']; 
           $result              = $objCourse->viewCourse('SV',0,0,'','','',0,0,'','',0,0,0,$insType,'');
           $opt                 = '<option value="0">--Select--</option>';

           if(mysqli_num_rows($result)>0)
           {               
               while($row = mysqli_fetch_array($result))
               {
                   $intCourseId           = $row["intCourseId"];
                   $intSamsCourseId       = $row["intSamsCourseId"];
                   $strCourseName         = htmlspecialchars_decode($row["vchCourseNameE"],ENT_QUOTES);
                   
                   $select              = ($intCourseId==$intSelval)?'selected="selected"':'';
                   $opt                 .= '<option value="'.$intCourseId.'" title="'.$strCourseName.'" '.$select;
                   $opt                 .= '>'.$strCourseName.'</option>';
               }

           }

           echo json_encode(array('samscourse'=>$opt));
        } 


        /*Function to fill All Skill institute name
          By: Rahul kumar Saw
          On: 22-Jan-2020
     */
        public function fillSkillInstituteName($intSelval)
        {
                include_once( CLASS_PATH.'clsReport.php');
                $objReport           = new  clsReport;           
                $intSelval           = $intSelval;               
                $result              = $objReport->manageReport('FI',0, 0,0,'','', '1000-01-01',0,0,0,'1000-01-01','1000-01-01');           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $intInstituteId        = $row["intInstituteId"];
                       $intSamsCourseId       = $row["intSamsCourseId"];
                       $strInstituteName      = htmlspecialchars_decode($row["vchInstituteName"],ENT_QUOTES);
                       
                       $select              = ($intInstituteId==$intSelval)?'selected="selected"':'';
                       $opt                 .= '<option value="'.$intInstituteId.'" '.$select;
                       $opt                 .= '>'.$strInstituteName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('skillInstituteResult'=>$opt));    
        } 


        /*Function to fill All Skill institute name
          By: Rahul kumar Saw
          On: 22-Jan-2020
     */
        public function fillDegreeName($intSelval)
        {
                include_once( CLASS_PATH.'clsSkillMaster.php');
                $objMaster           = new  clsSkillMaster;           
                $intSelval           = $intSelval;               
                $result              = $objMaster->manageSkillMaster('FC',0,0,'','','',0);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $intCourseId        = $row["INT_ID"];
                       $strCourseName      = htmlspecialchars_decode($row["VCH_COURSE_NAME"],ENT_QUOTES);
                       
                       $select              = ($intCourseId==$intSelval)?'selected="selected"':'';
                       $opt                 .= '<option value="'.$strCourseName.'" '.$select;
                       $opt                 .= '>'.$strCourseName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('skillCourseResult'=>$opt));    
        } 
        
        /*Function to fill All Branch name
          By: Rahul kumar Saw
          On: 22-Jan-2020
     */
        public function fillBranchName($intSelval)
        {
                include_once( CLASS_PATH.'clsSkillMaster.php');
                $objMaster           = new  clsSkillMaster;           
                $intSelval           = $intSelval;               
                $result              = $objMaster->manageSkillMaster('FB',0,0,'','','',0);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $intBranchId        = $row["INT_BRANCH_ID"];
                       $strBranchName      = htmlspecialchars_decode($row["VCH_BRANCH_NAME"],ENT_QUOTES);
                       
                       $select              = ($intBranchId==$intSelval)?'selected="selected"':'';
                       $opt                 .= '<option value="'.$intBranchId.'" '.$select;
                       $opt                 .= '>'.$strBranchName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('skillBranchResult'=>$opt));    
        } 

        /*Function to fill All Skill institute name
          By: Rahul kumar Saw
          On: 22-Jan-2020
     */
        public function fillSkillDevelopInstituteName($intSelval)
        {
                include_once( CLASS_PATH.'clsSkillMaster.php');
                $objMaster           = new  clsSkillMaster;           
                $intSelval           = $intSelval;               
                $result              = $objMaster->manageSkillMaster('FI',0,0,'','','',0);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $intInstituteId        = $row["INT_MASTER_ID"];
                       $strInstituteName      = htmlspecialchars_decode($row["VCH_INSTITUTE_NAME"],ENT_QUOTES);
                       
                       $select              = ($intInstituteId==$intSelval)?'selected="selected"':'';
                       $opt                 .= '<option value="'.$intInstituteId.'" '.$select;
                       $opt                 .= '>'.$strInstituteName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('skillDevelopInstituteResult'=>$opt));    
        } 

        /*Function to fill All Interested Course name
          By: Rahul kumar Saw
          On: 22-Jan-2020
     */
        public function fillInterestedCourseName($intSelval)
        {
                include_once( CLASS_PATH.'clsSkillMaster.php');
                $objMaster           = new  clsSkillMaster;           
                $intSelval           = $intSelval;               
                $result              = $objMaster->manageSkillMaster('FIC',0,0,'','','',0);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $intCourseId        = $row["INT_COURSE_ID"];
                       $strCourseName      = htmlspecialchars_decode($row["VCH_INTERESTED_COURSE_NAME"],ENT_QUOTES);
                       
                       $select              = ($intCourseId==$intSelval)?'selected="selected"':'';
                       $opt                 .= '<option value="'.$intCourseId.'" '.$select;
                       $opt                 .= '>'.$strCourseName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('skillInterestedCourseResult'=>$opt));    
        } 

        /*Function to fill All district name for skill
          By: Rahul kumar Saw
          On: 23-Nov-2020
     */
        public function fillSkillDistrict()
        {
                include_once( CLASS_PATH.'clsSkillInformation.php');
                $objInfo            = new  clsSkillInformation;           
                $intSelval           = $intSelval;   
                $arrConditions       = array();            
                $result              = $objInfo->manageskillInformation('FD',$arrConditions);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $hirerchyId        = $row["intDemoHierarchyValueId"];
                       $hirerchyName      = htmlspecialchars_decode($row["vchDemoHierarchyValue"],ENT_QUOTES);
                       
                       $opt                 .= '<option value="'.$hirerchyId.'" ';
                       $opt                 .= '>'.$hirerchyName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('districtName'=>$opt));    
        } 


        /*Function to fill All district name for skill
          By: Rahul kumar Saw
          On: 23-Nov-2020
     */
        public function fillSkillBlock($distId)
        {
                include_once( CLASS_PATH.'clsSkillInformation.php');
                $objInfo            = new  clsSkillInformation;           
                $intSelval           = $intSelval;   
                $arrConditions       = array('distId' =>$distId);            
                $result              = $objInfo->manageskillInformation('FB',$arrConditions);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $hirerchyId        = $row["intDemoHierarchyValueId"];
                       $hirerchyName      = htmlspecialchars_decode($row["vchDemoHierarchyValue"],ENT_QUOTES);
                       
                       $opt                 .= '<option value="'.$hirerchyId.'" ';
                       $opt                 .= '>'.$hirerchyName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('blockName'=>$opt));    
        } 


        /*Function to fill All GP name for skill
          By: Rahul kumar Saw
          On: 24-Nov-2020
     */
        public function fillSkillGp($blockId)
        {
                include_once( CLASS_PATH.'clsSkillInformation.php');
                $objInfo            = new  clsSkillInformation;           
                $intSelval           = $intSelval;   
                $arrConditions       = array('blockId' =>$blockId);            
                $result              = $objInfo->manageskillInformation('FG',$arrConditions);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $hirerchyId        = $row["intDemoHierarchyValueId"];
                       $hirerchyName      = htmlspecialchars_decode($row["vchDemoHierarchyValue"],ENT_QUOTES);
                       
                       $opt                 .= '<option value="'.$hirerchyId.'" ';
                       $opt                 .= '>'.$hirerchyName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('gpName'=>$opt));    
        } 

        /*Function to fill All village name for skill
          By: Rahul kumar Saw
          On: 24-Nov-2020
     */
        public function fillSkillVillage($gpId)
        {
                include_once( CLASS_PATH.'clsSkillInformation.php');
                $objInfo            = new  clsSkillInformation;           
                $intSelval           = $intSelval;   
                $arrConditions       = array('gpId' =>$gpId);            
                $result              = $objInfo->manageskillInformation('FV',$arrConditions);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $hirerchyId        = $row["intDemoHierarchyValueId"];
                       $hirerchyName      = htmlspecialchars_decode($row["vchDemoHierarchyValue"],ENT_QUOTES);
                       
                       $opt                 .= '<option value="'.$hirerchyId.'" ';
                       $opt                 .= '>'.$hirerchyName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('villageName'=>$opt));    
        } 


         /*Function to fill All GP name for skill
          By: Rahul kumar Saw
          On: 24-Nov-2020
     */
        public function fillJobInstituteName($instituteType)
        {
                include_once( CLASS_PATH.'clsSkillInformation.php');
                $objInfo            = new  clsSkillInformation;           
                $intSelval           = $intSelval;   
                $arrConditions       = array('instituteType' =>$instituteType);            
                $result              = $objInfo->manageskillInformation('FC',$arrConditions);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $instituteId        = $row["intInstituteId"];
                       $instituteName      = htmlspecialchars_decode($row["vchInstituteName"],ENT_QUOTES);
                       
                       $opt                 .= '<option value="'.$instituteId.'" ';
                       $opt                 .= '>'.$instituteName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('instituteName'=>$opt));    
        } 

        /*Function to fill All village name for skill
          By: Rahul kumar Saw
          On: 24-Nov-2020
     */
        public function fillJobTraining()
        {
                include_once( CLASS_PATH.'clsSkillInformation.php');
                $objInfo            = new  clsSkillInformation;           
                $intSelval           = $intSelval;   
                $arrConditions       = array();            
                $result              = $objInfo->manageskillInformation('FT',$arrConditions);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $instituteId        = $row["intId"];
                       $instituteName      = htmlspecialchars_decode($row["vchTrainingCenter"],ENT_QUOTES);
                       
                       $opt                 .= '<option value="'.$instituteId.'" ';
                       $opt                 .= '>'.$instituteName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('trainingName'=>$opt));    
        }


        /*Function to fill All Venue for skill
          By: Rahul kumar Saw
          On: 21-Apr-2021
     */
        public function fillVenueName($distId)
        { 
                include_once( CLASS_PATH.'clsVenue.php');
                $objVenue            = new  clsVenue; 

                $intSelval           = $_POST['selVal'];             
                $result              = $objVenue->manageVenue('VN',0,$distId,'','','','','',0,'','',0,0,0,0);         
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $venueId            = $row["intVenueId"];
                       $capacity           = $row["intCapacity"];
                       $venueName          = htmlspecialchars_decode($row["vchVenueName"],ENT_QUOTES);

                       $select           = ($venueId==$intSelval)?'selected="selected"':'';
                       $opt             .= '<option value="'.$venueId.'" data-value="' . $capacity . '" '.$select;
                       $opt             .= '>'.$venueName.'</option>';

                    }
                     
                }
               
           echo json_encode(array('venueName'=>$opt));    
        } 

        /*Function to fill All student skill wise and district wise
          By: Rahul kumar Saw
          On: 21-Apr-2021
        */

        public function fillMembers() { 
  
        $distId            = $_REQUEST['distId'];
        $skillId           = $_REQUEST['skillId']; 
        $regdType          = $_REQUEST['regdType']; 
        
        include_once("clsVenue.php");
        $objVenue = new clsVenue;        
       
        $result = $objVenue->manageVenue("TM",0,$distId,'','','','','',0,'','',$regdType,$skillId,0,0);
        if ($result->num_rows > 0) {
            $i = 1;
            while ($Row = $result->fetch_array()) {     
                $intMemberId  = $Row["intCompetitionId"];
                $strMemberName  = htmlspecialchars_decode($Row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($Row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($Row['vchLastName'], ENT_QUOTES);  
                
                $strAckNo       = htmlspecialchars_decode($Row['vchAckNo'], ENT_QUOTES);                                             
                //$select = ($intInstitutionId == $selVal) ? 'selected="selected"' : '';               
                 
                 //$style     = ($Row["trainingStatus"]==1)?'style="color:#d9534f;"':''; '.$style.'
                 $opts .= '<option value="' . $intMemberId . '"   title="' . $strAckNo . '">' . $i .'. '. $strMemberName .' ('. $strAckNo.') '.'</option>';
                
            $i++;
             }
        }
        else{
            $opts .= 'No Applicant details available.';
        }
      
        echo json_encode(array('timembers' => $opts));
    }


    /*
        Function to fill Applicant details.
        By: Rahul Kumar Saw
        On: 27-APRIL-2021
       */

      public function gotoAssignment() {         
          $_SESSION['skillId']         = $_REQUEST['skillId'];
          $_SESSION['distId']          = $_REQUEST['distId'];
          $_SESSION['venueId']         = $_REQUEST['venueId'];
          $_SESSION['regdType']        = $_REQUEST['regdType'];
          $_SESSION['backPath']        = $_REQUEST['backPath'];
          echo json_encode(array('TID' => $result));
      }

      /*
        Function to fill Applicant details.
        By: Rahul Kumar Saw
        On: 05-Aug-2021
       */

      public function gotoCandidate() {         
          $_SESSION['skillId']         = $_REQUEST['skillId'];
          $_SESSION['distId']          = $_REQUEST['distId'];
          $_SESSION['panelId']         = $_REQUEST['panelId'];
          $_SESSION['levelId']         = $_REQUEST['levelId'];
          $_SESSION['regdType']        = $_REQUEST['regdType'];
          $_SESSION['backPath']        = $_REQUEST['backPath'];
          echo json_encode(array('TID' => $result));
      }


       /*
      Function to fill assigned members According to skill.
      By: Rahul Kumar Saw
      On: 28-April-2021
     */
    
  public function fillAssignedMembers() { 
        include_once("clsVenue.php");
        $objVenue = new clsVenue;        
       
        
        $selVal         = $_REQUEST['selVal'];
        $distId         = $_REQUEST['distId'];
        $skillId        = $_REQUEST['skillId'];
        $venueId        = $_REQUEST['venueId'];
        $result = $objVenue->manageVenue("VT",0,$distId,'','','','','',0,'','',$venueId,$skillId,0,0);
        $intmemCount    = $result->num_rows;
        if ($result->num_rows > 0) {
            $i =1;
            while ($Row = $result->fetch_array()) {         
                $intMemberId     = $Row["intCompetitionId"];
                $vchmemberName          = htmlspecialchars_decode($Row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($Row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($Row['vchLastName'], ENT_QUOTES); 
                
                $strAckNo          = htmlspecialchars_decode($Row['vchAckNo'], ENT_QUOTES);                          
                //$select = ($intInstitutionId == $selVal) ? 'selected="selected"' : '';
                $opts .= '<option value="' . $intMemberId . '" title="' . $vchmemberName . '" >'. $i.'. ' . $vchmemberName .' ('. $strAckNo.') '.'</option>';
                  
              $i++;   
            }
        }
        else{
            $opts .= '';
        }
      
        echo json_encode(array('tiassignedMember' => $opts,'intmemCount' => $intmemCount));
    }

     /*
      Function to count assigned members According to skill.
      By: Rahul Kumar Saw
      On: 30-April-2021
     */
    
  public function countAssignedMembers() { 
        include_once("clsVenueTagged.php");
        $objVenue = new clsVenueTagged; 

        $selVal         = $_REQUEST['selVal'];
        $distId         = $_REQUEST['distId'];
        $skillId        = $_REQUEST['skillId'];
        $venueId        = $_REQUEST['venueId'];       
       
        $result = $objVenue->manageVenueTagged("CA",0,'',0,$skillId,$distId,$venueId,'1000-01-01','00:00:00',0,'','',0);
        if ($result->num_rows > 0) {
            while ($Row = $result->fetch_array()) {         
                $taggedMember     = $Row["COUNT"];
                $capacity         = $Row["capacity"];
                $available        = $capacity-$taggedMember;               
                 
            }
        }
        else{
            $available = 0;
        }
      
        echo json_encode(array('taggedMember' => $available));
    }



    /*Function to fill All student skill wise and district wise for result
          By: Rahul kumar Saw
          On: 02-Aug-2021
        */

        public function fillResultMembers() { 
  
        $distId            = $_REQUEST['distId'];
        $skillId           = $_REQUEST['skillId']; 
        $level             = $_REQUEST['level']; 
        
        include_once("clsResult.php");
        $objResult = new clsResult;        
       
        $result = $objResult->manageResult("TM",0,$distId,$skillId,'','','','','','','',$level,0,0,0,0,'','',0,0);
        if ($result->num_rows > 0) {
            $i = 1;
            while ($Row = $result->fetch_array()) {     
                $intMemberId  = $Row["intCompetitionId"];
                $strMemberName  = htmlspecialchars_decode($Row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($Row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($Row['vchLastName'], ENT_QUOTES);  
                
                $strAckNo          = htmlspecialchars_decode($Row['vchAckNo'], ENT_QUOTES);                                             
                 $opts .= '<option value="' . $intMemberId . '"   title="' . $strAckNo . '">' . $strMemberName .' ('. $strAckNo.') '.'</option>';
                
            $i++;
             }
        }
        else{
            $opts .= 'No Applicant details available.';
        }
      
        echo json_encode(array('resmembers' => $opts));
    }


    /*Function to fill All Panel name
          By: Rahul kumar Saw
          On: 05-Aug-2021
     */
        public function fillPanel($intSelval,$levelId,$venueId)
        {
                include_once( CLASS_PATH.'clsPanel.php');
                $objPanel            = new  clsPanel;           
                $intSelval           = $intSelval;               
                $result              = $objPanel->managePanel('FP',0,$levelId,$venueId,'','','','','','','','',0,0,0,0,'','',0,0);           
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $intId             = $row["intId"];
                       $strPanelName      = htmlspecialchars_decode($row["vchPanelName"],ENT_QUOTES);
                       
                       $select            = ($intId==$intSelval)?'selected="selected"':'';
                       $opt              .= '<option value="'.$intId.'" '.$select;
                       $opt              .= '>'.$strPanelName.'</option>';
                    }
                     
                }
               
           echo json_encode(array('panelName'=>$opt));    
        } 


        /*Function to fill All student skill wise and district wise for panel tagging
          By: Rahul kumar Saw
          On: 05-Aug-2021
        */

        public function fillCandidate() { 
  
        $distId            = $_REQUEST['distId'];
        $skillId           = $_REQUEST['skillId']; 
        $level             = $_REQUEST['level']; 
        
        include_once("clsVenue.php");
        $objVenue = new clsVenue;        
       
        $result = $objVenue->manageVenue("TC",0,$distId,'','','','','',0,'','','0',$skillId,$level,0);
        if ($result->num_rows > 0) {
            $i = 1;
            while ($Row = $result->fetch_array()) {     
                $intMemberId  = $Row["intCompetitionId"];
                $strMemberName= htmlspecialchars_decode($Row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($Row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($Row['vchLastName'], ENT_QUOTES);  
                
                $strAckNo     = htmlspecialchars_decode($Row['vchAckNo'], ENT_QUOTES);                                             
                //$select = ($intInstitutionId == $selVal) ? 'selected="selected"' : '';               
                 
                 //$style     = ($Row["trainingStatus"]==1)?'style="color:#d9534f;"':''; '.$style.'
                 $opts .= '<option value="' . $intMemberId . '"   title="' . $strAckNo . '">' . $i .'. '. $strMemberName .' ('. $strAckNo.') '.'</option>';
                
            $i++;
             }
        }
        else{
            $opts .= 'No Applicant details available.';
        }
      
        echo json_encode(array('ticandidate' => $opts));
    }


     /*Function to fill All Program Name
          By: Rahul kumar Saw
          On: 29-Nov-2021
        */

        public function fillProgramName($selVal) { 
        
        include_once("clsSkillTP.php");
        $objTP = new clsSkillTP;        
        $arrConditions       = array(); 
        $result = $objTP->manageskillTP("FP",$arrConditions);
        $opts                 = '<option value="0">--Select--</option>';
        if ($result->num_rows > 0) {
            $i = 1;
            while ($Row = $result->fetch_array()) {     
                $intProgramId  = $Row["intId"];
                $strProgramName= htmlspecialchars_decode($Row['vchProgramName'], ENT_QUOTES);  
                $studentFee     = $Row['intStudentFee'];
                $studentQty     = $Row['intStudentQty'];
                $trainFee       = $Row['intTrainFee'];
                $trainQty       = $Row['intTrainQty'];
                $insFee         = $Row['intInsFee'];
                $insQty         = $Row['intInsQty'];
                $appStudentFee  = $Row['intAppStudFee'];
                $appStudentQty  = $Row['intAppStudQty'];
                $appTrainFee    = $Row['intAppTrainFee'];
                $appTrainQty    = $Row['intAppTrainQty'];
                $appInsFee      = $Row['intAppInsFee'];
                $appInsQty      = $Row['intAppInsQty'];
                $proposedSeat   = $Row['intProposedSeat'];
                $bookedSeat     = $Row['intBookedSeat'];
                $restSeat       = $proposedSeat- $bookedSeat;
                $totTPAmount      = ($studentFee*$studentQty)+($trainFee*$trainQty)+($insFee*$insQty);
                $totVerifiedAmount = ($appStudentFee*$appStudentQty)+($appTrainFee*$appTrainQty)+($appInsFee*$appInsQty);
                $studProFee     = $totTPAmount/$studentQty;
                $verifiedProFee = $totVerifiedAmount/$appStudentQty;
                if($totVerifiedAmount>0)
                {
                   $strProgramFee =  $verifiedProFee;
                }
                else
                {
                    $strProgramFee = $studProFee;
                }
                if($appStudentQty>0)
                {
                    $availSeat = $appStudentQty-$bookedSeat;
                }
                else
                {
                    $availSeat = $studentQty-$bookedSeat;
                }
                $instituteFee= $Row['intInstituteFee'];
                $TPFee       = $Row['intTPFee'];
                $OSDAFee     = $Row['intOSDAFee'];
                $totalPer    = $instituteFee+$TPFee+$OSDAFee;
                $payableFee  = ($strProgramFee)-($strProgramFee)/(100/$totalPer);


                //$strProgramFee = $Row['intProgramFee'];  
                /*$studentFee     = $Row['intStudentFee'];
                $appStudFee     = $Row['intAppStudFee'];
                if($appStudFee>0)
                {
                   $strProgramFee =  $appStudFee;
                }
                else
                {
                    $strProgramFee = $studentFee;
                } */                                   
                $select = ($intProgramId == $selVal) ? 'selected="selected"' : '';               
                $opts .= '<option value="' . $intProgramId . '"   data-val="' . $payableFee . '" data-id="' . $availSeat . '" data-num="' . $appStudentQty . '"'.$select.'>' . $strProgramName .'</option>';
                
            $i++;
             }
        }
        else{
            $opts .= 'No Program name available.';
        }
      
        echo json_encode(array('tiprogram' => $opts));
    }


    /*Function to fill All approve Skill institute name
          By: Rahul kumar Saw
          On: 02-Dec-2021
     */
        public function fillApproveInstituteName($selVal)
        { //echo $selVal;exit;
                include_once("clsSkillInsRegd.php");
                $objIns = new clsSkillInsRegd;                 
                $arrConditions       = array(); 
                $result = $objIns->manageSkillInsRegd("FI",$arrConditions);          
                $opt                 = '<option value="0">--Select--</option>';
                $selectO             = ($selVal==1000)?'selected="selected"':'';
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $userId             = $row["INT_ID"];
                       $intInsId           = $row["intId"];
                       $strInsName         = htmlspecialchars_decode($row["vchInsName"],ENT_QUOTES);
                       
                       $select              = ($intInsId==$selVal)?'selected="selected"':'';
                       
                       $opt                 .= '<option value="'.$intInsId.'" '.$select;
                       $opt                 .= '>'.$strInsName.'</option>';
                       
                    }
                    $opt               .= '<option value="1000" '.$selectO.'>Others </option>';
                     
                }
               
           echo json_encode(array('skillInstitute'=>$opt));    
        } 



        /*Function to show program by institute
            By: Rahul Kumar Saw
            On: 02-DEC-2021
        */
        public function fillInstituteProgram() {

           include_once("clsSkillInsRegd.php");
           $objIns = new clsSkillInsRegd; 
           $intSelval           = $_POST['selval']; 
           $intInsId            = ($_POST['selInstitute']!='')?$_POST['selInstitute']:0; 
           //echo $intInsId;exit;
           if($intInsId=='1000')
           {
           $arrConditions       = array(); 
           $result = $objIns->manageSkillInsRegd("FOP",$arrConditions);
           $opt                 = '<option value="0">--Select--</option>';
               if(mysqli_num_rows($result)>0)
               {               
                   while($row           = mysqli_fetch_array($result))
                   {
                       //$intInstituteId      = $row["intInsId"];
                       $intProgramTagId     = $row["intProgramId"];
                       $strProgram          = htmlspecialchars_decode($row["vchProgramName"],ENT_QUOTES);
                       
                       $select              = ($intProgramTagId==$intSelval)?'selected="selected"':'';
                       $opt                 .= '<option value="'.$intProgramTagId.'" title="'.$strProgram.'" '.$select;
                       $opt                 .= '>'.$strProgram.'</option>';
                   }

               }
           } 
           else
           {                
           $arrConditions       = array('intInsId'=>$intInsId); 
           $result = $objIns->manageSkillInsRegd("FP",$arrConditions);
           $opt                 = '<option value="0">--Select--</option>';
               if(mysqli_num_rows($result)>0)
               {               
                   while($row           = mysqli_fetch_array($result))
                   {
                       $intInstituteId      = $row["intInsId"];
                       $intProgramTagId     = $row["intProgramId"];
                       $strProgram          = htmlspecialchars_decode($row["vchProgramName"],ENT_QUOTES);
                       
                       $select              = ($intProgramTagId==$intSelval)?'selected="selected"':'';
                       $opt                 .= '<option value="'.$intProgramTagId.'" title="'.$strProgram.'" '.$select;
                       $opt                 .= '>'.$strProgram.'</option>';
                   }

               }
           }

           echo json_encode(array('insProgram'=>$opt));
        }

         /*Function to fill All approve TP Name
          By: Rahul kumar Saw
          On: 03-DEC-2021
        */

        public function fillTPName($selVal) { 
        
        include_once("clsSkillTP.php");
        $objTP = new clsSkillTP;        
        $arrConditions       = array(); 
        $result = $objTP->manageskillTP("FTP",$arrConditions);
        $opts                 = '<option value="0">--Select--</option>';
        //$opts                .= '<option value="Coursera">Coursera </option>';
        //$opts                .= '<option value="SAP ERP">SAP ERP </option>';
        if ($result->num_rows > 0) {
            $i = 1;
            while ($Row = $result->fetch_array()) {     
                $intTPId  = $Row["intId"];
                $userId   = $Row["INT_ID"];
                $strTPName= htmlspecialchars_decode($Row['vchOrgName'], ENT_QUOTES);  
                                                       
                $select = ($intTPId == $selVal) ? 'selected="selected"' : '';               
                $opts .= '<option value="' . $intTPId . '"  '.$select.'>' . $strTPName .'</option>';
                
            $i++;
             }
        }
        else{
            $opts .= 'No Program name available.';
        }
      
        echo json_encode(array('tpname' => $opts));
    }


    /*Function to fill Primary Link 
        By: Rasmi Ranjan Swain
        On: 31-Aug-2015
     */
        public function fillPaymentData($regdNo,$payableFee,$strMobile,$strEmail,$instituteCode,$strInstitute,$strCourseCode,$strTPName)
        {
          $_SESSION['regdNo'] = $regdNo;
          $_SESSION["fees"]  = $payableFee;
          $_SESSION['mobileNo'] = $strMobile;

          $_SESSION['emailId'] = $strEmail;
          $_SESSION['instituteCode'] = $instituteCode;
          $_SESSION['strInstituteName'] = $strInstitute;
          $_SESSION['strCourseCode'] = $strCourseCode;
          $_SESSION['strCourseName'] = $strTPName;    
            
          $result     = $_SESSION['regdNo'].'='.$_SESSION["fees"].'='.$_SESSION['mobileNo'].'='.$_SESSION['emailId'].'='.$_SESSION['instituteCode'].'='.$_SESSION['strInstituteName'].'='.$_SESSION['strCourseCode'].'='.$_SESSION['strCourseName'];
            echo json_encode(array('payData'=>$result));
        }


        /*Function to fill TP Details
        By: Rahul Kumar Saw
        On: 27-Apr-2022
        */
        public function fillTPDetails($intId) { 
        include_once( CLASS_PATH.'clsSkillTP.php');
        $objTP        = new clsSkillTP;  
        $arrTPConditions=array('id'=>$intId);

        $resultTP     = $objTP->manageskillTP('RR', $arrTPConditions); 
      
        $data ='';
        if ($resultTP->num_rows > 0) {

            $row            = $resultTP->fetch_array();
            $strProgram     = $row['vchProgramName'];
            $studentFee     = $row['intStudentFee'];
            $studentQty     = $row['intStudentQty'];
            $trainFee       = $row['intTrainFee'];
            $trainQty       = $row['intTrainQty'];
            $insFee         = $row['intInsFee'];
            $insQty         = $row['intInsQty'];
            $appStudentFee  = $row['intAppStudFee'];
            $appStudentQty  = $row['intAppStudQty'];
            $appTrainFee    = $row['intAppTrainFee'];
            $appTrainQty    = $row['intAppTrainQty'];
            $appInsFee      = $row['intAppInsFee'];
            $appInsQty      = $row['intAppInsQty'];
            $totTPAmount      = ($studentFee*$studentQty)+($trainFee*$trainQty)+($insFee*$insQty);
            $totVerifiedAmount = ($appStudentFee*$appStudentQty)+($appTrainFee*$appTrainQty)+($appInsFee*$appInsQty);
            $studProFee     = $totTPAmount/$studentQty;
            $verifiedProFee = $totVerifiedAmount/$appStudentQty;
            if($totVerifiedAmount>0)
            {
               $programFee =  $verifiedProFee;
            }
            else
            {
                $programFee = $studProFee;
            }
            //$programFee     = $row['intProgramFee'];
            $tpName         = $row['vchTP'];
            $data ='<table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td ><label>Training Partner Name</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtTpName">'.$tpName.'</td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>Program name</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProName">'.$strProgram.'</td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>Program Fee</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProFee"> <span><i class="fa fa-rupee"></i></span> <strong>'.$this->custom_money_format($programFee).'</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" id="hdnProgFee" name="hdnProgFee" value="'.$programFee.'">';
        }
      
        echo json_encode(array('dataInfo' => $data));
    }

    /*Function to fill TP Fee Details
        By: Rahul Kumar Saw
        On: 16-June-2022
        */
        public function fillTPFeeDetails($intId) { 
        include_once( CLASS_PATH.'clsSkillTP.php');
        $objTP        = new clsSkillTP;  
        $arrTPConditions=array('id'=>$intId);

        $resultTP     = $objTP->manageskillTP('RR', $arrTPConditions); 
      
        $data ='';
        if ($resultTP->num_rows > 0) {

            $row            = $resultTP->fetch_array();
            $strProgram     = $row['vchProgramName'];
            $programFee     = $row['intProgramFee'];
            $tpName         = $row['vchTP'];
            $studentFee     = $row['intStudentFee'];
            $studentQty     = $row['intStudentQty'];
            $trainFee       = $row['intTrainFee'];
            $trainQty       = $row['intTrainQty'];
            $insFee         = $row['intInsFee'];
            $insQty         = $row['intInsQty'];
            $appStudentFee  = $row['intAppStudFee'];
            $appStudentQty  = $row['intAppStudQty'];
            $appTrainFee    = $row['intAppTrainFee'];
            $appTrainQty    = $row['intAppTrainQty'];
            $appInsFee      = $row['intAppInsFee'];
            $appInsQty      = $row['intAppInsQty'];
            $status         = $row['tinApproveStatus'];
            $totAmount      = ($studentFee*$studentQty)+($trainFee*$trainQty)+($insFee*$insQty);
            $appSAmount     =  $appStudentFee*$appStudentQty;    
            $appTAmount     =  $appTrainFee*$appTrainQty;    
            $appIAmount     =  $appInsFee*$appInsQty;    
            $finalAmount    =  ($appSAmount)+($appTAmount)+($appIAmount);    
            $data ='<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
                        <tbody>
                           <tr>
                                <td  width="200"><label>Training partner name</label></td>
                                <td width="20" align="center">:</td>
                                <td width="35%" id="txtTpName">'.$tpName.'</td> 
                                <td width="200"><label>Program name</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProName">'.$strProgram.'</td> 
                            </tr>
                            <tr>
                                <td ><label>Student fee <small>(<i class="fa fa-rupee"></i>)</small></label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtTpName">'.$this->custom_money_format($studentFee).'</td> 
                                <td ><label>Student quantity</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProName">'.$studentQty.'</td>
                            </tr> 
                            <tr>
                                <td ><label>Train of trainers fee <small>(<i class="fa fa-rupee"></i>)</small></label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtTpName">'.$this->custom_money_format($trainFee).'</td> 
                                <td ><label>Train of trainers quantity</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProName">'.$trainQty.'</td> 
                            </tr>
                            <tr>
                                <td ><label>Institute fee <small>(<i class="fa fa-rupee"></i>)</small></label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtTpName">'.$this->custom_money_format($insFee).'</td> 
                                <td ><label>Institute quantity</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProName">'.$insQty.'</td> 
                            </tr>
                            <tr>
                                <td ><label><strong>Total Amount <small>(<i class="fa fa-rupee"></i>) </strong></small></label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProName"><strong>'.$this->custom_money_format($totAmount).'</strong></td> 
                            </tr>
                        </tbody>
                    </table><input type="hidden" id="hdnSFee" name="hdnSFee" value="'.$studentFee.'"><input type="hidden" id="hdnSQty" name="hdnSQty" value="'.$studentQty.'"><input type="hidden" id="hdnTFee" name="hdnTFee" value="'.$trainFee.'"><input type="hidden" id="hdnTQty" name="hdnTQty" value="'.$trainQty.'"><input type="hidden" id="hdnIFee" name="hdnIFee" value="'.$insFee.'"><input type="hidden" id="hdnIQty" name="hdnIQty" value="'.$insQty.'"><input type="hidden" id="hdnappSFee" name="hdnappSFee" value="'.$appStudentFee.'"><input type="hidden" id="hdnappSQty" name="hdnappSQty" value="'.$appStudentQty.'"><input type="hidden" id="hdnappTFee" name="hdnappTFee" value="'.$appTrainFee.'"><input type="hidden" id="hdnappTQty" name="hdnappTQty" value="'.$appTrainQty.'"><input type="hidden" id="hdnappIFee" name="hdnappIFee" value="'.$appInsFee.'"><input type="hidden" id="hdnappIQty" name="hdnappIQty" value="'.$appInsQty.'"><input type="hidden" id="hdnappStatus" name="hdnappStatus" value="'.$status.'"><input type="hidden" id="hdnappSAmount" name="hdnappSAmount" value="'.$appSAmount.'"><input type="hidden" id="hdnappTAmount" name="hdnappTAmount" value="'.$appTAmount.'"><input type="hidden" id="hdnappIAmount" name="hdnappIAmount" value="'.$appIAmount.'"><input type="hidden" id="hdnappFAmount" name="hdnappFAmount" value="'.$this->custom_money_format($finalAmount).'">';
        }
      
        echo json_encode(array('dataInfo' => $data));
    }

     /*Function to fill registration phase Name
          By: Rahul kumar Saw
          On: 01-June-2022
        */

        public function fillRegistrationPhase($selVal) { 
        
        include_once("clsSkillCompetition.php");
        $objCompete = new clsSkillCompetition;        
        
        $result = $objCompete->manageSkillCompetition('RSE',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');
        $opts                 = '<option value="0">--Select--</option>';

        if ($result->num_rows > 0) {
            $i = 1;
            while ($Row = $result->fetch_array()) {     
                $intPhaseId  = $Row["intId"];
                $phaseName   = $Row["vchPhaseName"];
                $phaseYear   = $Row["vchPhaseYear"];
                                                 
                $select = ($intPhaseId == $selVal) ? 'selected="selected"' : '';               
                $opts .= '<option value="' . $intPhaseId . '"  '.$select.'>' . $phaseName.' ('.$phaseYear.') ' .'</option>';
                
            $i++;
             }
        }
        else{
            $opts .= 'No Phase name available.';
        }
      
        echo json_encode(array('phaseName' => $opts));
    }


     /*Function to show Category details 
            By: Rahul Kumar Saw
            On: 22-June-2022
     */
     public function fillSkillCategory($selVal) {
         
         include_once( CLASS_PATH.'clsSkill.php'); 
        $objGallerycat  = new clsSkillCategory();

       // echo $sql;
       $result = $objGallerycat->manageSkillCategory('F',0,0,'','','','',0,0);
       $opt = '<option value="0">--Select--</option>';

        if(mysqli_num_rows($result)>0)
        {               
            while($row  = mysqli_fetch_array($result))
            {
                $intCatId   = $row["INT_CATEGORY_ID"];
                $strCatNameE    = ucwords(strtolower (htmlspecialchars_decode($row["VCH_CATEGORY_NAME"],ENT_QUOTES)));
                $strCatNameO    = htmlspecialchars_decode($row["VCH_CATEGORY_NAME_O"],ENT_QUOTES);

                $select     = ($intCatId==$selVal)?'selected="selected"':'';

                $opt .= '<option value="'.$intCatId.'" title="'.$strCatNameE.'" '.$select;

                $opt .= '>'.$strCatNameE.'</option>';

            }

        }

        echo json_encode(array('skillcategory'=>$opt));
     }


     /*Function to fill All Venue for level 2 and 3
          By: Rahul kumar Saw
          On: 27-June-2022
     */
        public function fillVenue($levelId)
        { 
                include_once( CLASS_PATH.'clsPanelVenue.php');
                $objPanelVenue       = new  clsPanelVenue; 

                $intSelval           = $_POST['selVal'];             
                $result              = $objPanelVenue->managePanelVenue('VN',0,0,'','','','','',0,'','',$levelId,0,0,0);         
                $opt                 = '<option value="0">--Select--</option>';
               
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_array($result)) {

                       $venueId            = $row["intVenueId"];
                       $capacity           = $row["intCapacity"];
                       $venueName          = htmlspecialchars_decode($row["vchVenueName"],ENT_QUOTES);

                       $select           = ($venueId==$intSelval)?'selected="selected"':'';
                       $opt             .= '<option value="'.$venueId.'" data-value="' . $capacity . '" '.$select;
                       $opt             .= '>'.$venueName.'</option>';

                    }
                     
                }
               
           echo json_encode(array('venuePName'=>$opt));    
        } 


        /*
      Function to delete Menu.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */

    public function resetOTP($mobileNum) {
        include_once("clsSkillCompetition.php");
        $objCompete = new clsSkillCompetition;        
        $result = $objCompete->manageSkillCompetition('RP',0,0,0,'','','','',0,'0000-00-00','',$mobileNum,'','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');
    }

    /*
      Function to delete Menu.
      By: T Ketaki Debadarshini 
      On: 31-Aug-2015
     */

    public function resetSkillOTP($mobileNum) {
        include_once("clsSkillCompetition.php");
        $objCompete = new clsSkillCompetition;        
        $result = $objCompete->manageSkillCompetition('RPS',0,0,0,'','','','',0,'0000-00-00','',$mobileNum,'','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');
    }


    /*Function to fill Program Seat Details
        By: Rahul Kumar Saw
        On: 29-Aug-2022
        */
        public function fillProgramSeatDetails($proId,$intId) { 
        include_once( CLASS_PATH.'clsSkillTP.php');
        $objTP        = new clsSkillTP;  
        $arrTPConditions=array('id'=>$proId,'insId'=>$intId);

        $resultTP     = $objTP->manageskillTP('FPS', $arrTPConditions); 
      
        $data ='';
        if ($resultTP->num_rows > 0) {

            $row            = $resultTP->fetch_array();
            $strProgram     = $row['vchProgramName'];
            $studentFee     = $row['intStudentFee'];
            $studentQty     = $row['intStudentQty'];
            $trainFee       = $row['intTrainFee'];
            $trainQty       = $row['intTrainQty'];
            $insFee         = $row['intInsFee'];
            $insQty         = $row['intInsQty'];
            $appStudentFee  = $row['intAppStudFee'];
            $appStudentQty  = $row['intAppStudQty'];
            $appTrainFee    = $row['intAppTrainFee'];
            $appTrainQty    = $row['intAppTrainQty'];
            $appInsFee      = $row['intAppInsFee'];
            $appInsQty      = $row['intAppInsQty'];
            $bookedSeat     = $row['intBookedSeat'];
            $proposedSeat   = $row['intProposedSeat'];

            if($appStudentQty>0)
            {
                $availSeat = $appStudentQty-$bookedSeat;
                $totalSeat = $appStudentQty;
            }
            else
            {
                $availSeat = $studentQty-$bookedSeat;
                $totalSeat = $studentQty;
            }

            $data ='<table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td ><label>Total Seat</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtTpName"> <strong>'.$totalSeat.'</strong></td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>Available Seat</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProName"> <strong>'.$availSeat.'</strong></td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>Proposed Seat</label></td>
                                <td width="20" align="center">:</td>
                                <td id="txtProName"> <strong>'.$proposedSeat.'</strong></td>
                                <td width="50">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table><input type="hidden" id="hdnPropSeat" name="hdnPropSeat" value="'.$proposedSeat.'">';
        }
      
        echo json_encode(array('dataInfo' => $data));
    }


    public function getCalenderEvent()
        {
            include_once(CLASS_PATH.'clsCalender.php');
            $objClsCalender = new clsCalender;
            $wcid = $_REQUEST['wcid'];
            echo $objClsCalender->addEventCalenders('S',$wcid);           
        }


     public function getCalenderDetails() 
    {
        /*------------------------From Table-----------------*/
       include_once(CLASS_PATH.'clsCalender.php');
       $objCalender  = new clsCalender;
       $selVal   = $_REQUEST['vendorId'];
        
        $result                 = $objCalender->viewCalander('WP',$selVal,'000-00-00', '0000-00-00', '', 0,0, '');
        
        $strlblSelect           ='Select';
       
            if($result->num_rows>0)
            {             
               $row  = $result->fetch_array();
               $vendorId   =$row['intOrgId'];
               $vchName    = $row['vchName'];
               $strTmFrom  = $row['timeFrom'];
               $strTmTo    = $row['timeTo'];
               $strHolidayWeek=$row['vchHolidayWeek'];
                if($strHolidayWeek!='')
                {
                    $strHolidayWeek=$strHolidayWeek;
                }else{
                    $strHolidayWeek=1;
                }     
            } 
        echo json_encode(array('intOrgId'=>$vendorId,'vchName'=>$vchName,'strTmFrom'=>$strTmFrom,'strTmTo'=>$strTmTo,'strHolidayWeek'=>$strHolidayWeek));
        
                      
    }
    


}

?>