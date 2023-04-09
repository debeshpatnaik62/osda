<?php
  /* ------------------------------------------------------------------------
      File Name           : photoGalleryInner.php
      Description         : This page is to view photo Gallery.
      Author Name         : Ashis kumar Patra.
      Date Created        : 18-12-2018
      Update History      :
      <Updated by>           <Updated On>       <Remarks>
 -------------------------------------------------------------------------- */
 //======= include class for Gallery Category ============ //
        include_once(CLASS_PATH.'clsGallery.php');

 //========== create object for gallery category ===========//   
       $objPhotoGal = new clsGalleryCategory;
       $catId = (isset($_REQUEST['ID']) && $_REQUEST['ID'] != '')?$_REQUEST['ID']:0;

//======================= Pagination ===========================*/	
        $intPgno       = 1;
        $intRecno      = 0;
        $intPgSize     = 20;	

	if($_REQUEST['hdn_IsPaging']!="" && $_REQUEST['hdn_IsPaging'] >0)
		$isPaging   = 1;
	if($_REQUEST['hdn_PageNo']!=""  && $_REQUEST['hdn_PageNo'] >0)
	{
		$intPgno=$_REQUEST['hdn_PageNo'];
		$pgFlag     = 1;
	}
	if($_REQUEST['hdn_RecNo']!=""  && $_REQUEST['hdn_RecNo'] >0)
	{	
		$intRecno   = $_REQUEST['hdn_RecNo'];
		$pgFlag     = 1;
	}
	if($isPaging==0 && $_REQUEST['hdn_PageNo']=='' && $_REQUEST['ID']>0)
	{
		$intRecno   = (isset($_SESSION['paging']['recNo']) && $_SESSION['paging']['recNo']>0)?$_SESSION['paging']['recNo']:$intRecno;
		$intPgno    = (isset($_SESSION['paging']['pageNo']) && $_SESSION['paging']['pageNo']>0)?$_SESSION['paging']['pageNo']:$intPgno;		
	}
	else	
		unset($_SESSION['paging']);
//===============================================
	 if($isPaging==0)	
            $result		= $objPhotoGal->manageGalleryCategory('VAG', $intRecno,0, '', '','', '',2 ,0);
	 else
	  {
	  	  $intPgno	= 1;
          $intRecno	= 0;
          $result      = $objPhotoGal->manageGalleryCategory('VAC', 0,0, '', '','', '',2 ,0);
	  }	
	  $totalResult      = $objPhotoGal->manageGalleryCategory('VAC', 0,0, '', '','', '',2 ,0);
       $intTotalRec                 = mysqli_num_rows($totalResult); 
       $intCurrPage                 = $intPgno;
       $_SESSION['paging']['recNo'] = $intRecno;
       $_SESSION['paging']['pageNo']= $intPgno;

?>