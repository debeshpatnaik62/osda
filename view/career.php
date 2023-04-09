<!doctype html>
<html lang="en">
<?php 

/*plugin*/

include 'include/header.php' ?>
<!--start:: contarea-->
<style>
.carrer1{box-shadow: 0px 1px 5px #ccc;padding: 20px;position: relative;border-left: 3px solid #aa51b9;}
.carrer1 a{font-size: 21px;display: block;    color: #797979;}
.carrer1 a .fa{padding-left: 16px;color: #ffffff;float: right;background: linear-gradient(45deg,#643891 0,#a03a86 100%);width: 5%;position: absolute;right: 0;padding: 25px 0px;text-align: center;top: 0;bottom: 0;}
.carrer{box-shadow: 0px 1px 5px #ccc;padding: 20px;}
.carrer ul{}
.carrer ul li{}
.carrer ul li a{font-size: 21px;margin-bottom: 14px;display: block;border-bottom: 1px solid #f1f1f1;padding-bottom: 11px;}
.carrer ul li a .fa{padding-left: 16px;color: #171b76;float: right;}
.carrerDate{font-size: 15px;float: right;margin-right: 50px;color: #7d7d7d;}
h2{font-size: 35px;}	
.height50{margin-top: 50px}
.expired a .fa{background: #b7b7b7;}	
.expired .carrer1 {border-left: 3px solid #a7a7a7;}	
.expired h2{color: #9a9a9a;font-size: 35px;margin-bottom: 20px;}	
	
@media (max-width:768px) {
.carrer1 a .fa {  width: 13%;}
.expired .carrer1 {height: 100px;}	
.carrerDate {margin-right: 80px;}	
.carrer1 a {font-size: 16px;}	
}
@media (max-width:480px) {	
.expired .carrer1 {height: 150px;}	
}
	
 	
</style>
	
<section class="container contarea">
  <h2 class="osda--heading"><?php echo $currentjob;?></h2>
<br>
  
  
  <?php

	if ($intTotalRec > 0 ) {
		$ctr =0;
		?>
  <?php  while ($row = $totalResult->fetch_array()) {
                      
                         $tenderDocument = $row['vchDocument'];
                         $extLink     =!empty($row['vchExternalLink'])?htmlspecialchars_decode($row['vchExternalLink'],ENT_QUOTES):'';
                         $title 		=!empty($row['vchCareerName'])?htmlspecialchars_decode($row['vchCareerName'],ENT_QUOTES):'';
                         $titleO 		=!empty($row['vchCareerNameO'])?htmlspecialchars_decode($row['vchCareerNameO'],ENT_QUOTES):'';
                        $careerName    	= ($_SESSION['lang'] == 'O' && $titleO!='') ? $titleO:$title;
                        $strFile        = ($row['vchDocument'] != '') ? APP_URL . 'uploadDocuments/Career/' . $row['vchDocument'] : '';
                        $strEndDate     = ($row['dtmEndDate']=='0000-00-00 00:00:00' || $row['dtmEndDate']=='' )?'--':date('d-M-Y ',strtotime($row['dtmEndDate']));
                        $ext            = pathinfo($row['vchDocument'], PATHINFO_EXTENSION);
                        if(empty($extLink))
                        {
                          $link = $strFile;
                        }
                        else 
                        {
                          $link = $extLink;
                        }
                        $ctr++;
                      ?>
                      
               
                      
                <div class="innerleft bgwhite">
                    <ul>
					<li class="carrer1"> 
					
					<a href='<?php echo $link; ?>' target="_blank" title="<?php echo $careerName; ?>">
					<?php echo $ctr;?>. <?php echo $careerName;?></a> <a href='<?php echo $strFile; ?>' target="_blank" title="<?php echo $careerName; ?>"><span class="carrerDate"><?php echo $lastAppdate;?> - <?php echo $strEndDate;?></span>
					<?php if($ext=='pdf'){?>
						<i class="fa fa-file-pdf-o"></i>
						<?php } else { ?>
						<i class="fa fa-file-word-o"></i>
						<?php } ?> </a> </li>
				    </ul>
				                           
 				<div class="clear20"></div>
 				<div class="clear50 hidden-xs hidden-1024"></div>    
                </div>	
  <?php } ?>
  <?php }else{  ?>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center"> <?php echo $strNoRecordlbl; ?> </div>
  </div>
  <?php } ?>
  
  <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>"/>
  <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>"/>
  <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>"/>
  <div class="clearfix"></div>
  <?php if (mysqli_num_rows($result) > 0) { ?>
  <div class="row noPrint">
    <div class="col-sm-12 text-right">
      <div class="dataTables_info " id="sample-table-2_info">
        <?php if ($intTotalRec > $intPgSize) { ?>
        <a href="#" onClick="AlternatePaging();"> <?php echo ($isPaging == 0) ? $strPaginglbl1 : $strPaginglbl2; ?> </a>/
        <?php } ?>
        <?php echo $objCareer->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?> </div>
    </div>
    <div class="clearfix"></div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_bootstrap">
        <ul class="pagination">
          <?php echo $objCareer->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
        </ul>
      </div>
    </div>
    <?php } ?>
  </div>
  <?php } ?>
  
   
  <div class="clearfix"></div>
<div class="height50"></div>
 
 <hr> 
 
 
 
<div class="expired">
  <h2><?php echo $expiredjobs;?></h2>
  <div class="innerleft bgwhite expired">

    <?php

  if ($intTotalExpRec > 0 ) {
    $ctrExp =0;
    ?>
  <?php  while ($row = $resultExpire->fetch_array()) {
                      
                         $tenderDocument = $row['vchDocument'];
                         $title     =!empty($row['vchCareerName'])?htmlspecialchars_decode($row['vchCareerName'],ENT_QUOTES):'';
                         $titleO    =!empty($row['vchCareerNameO'])?htmlspecialchars_decode($row['vchCareerNameO'],ENT_QUOTES):'';
                        $careerName     = ($_SESSION['lang'] == 'O' && $titleO!='') ? $titleO:$title;
                        $strFile        = ($row['vchDocument'] != '') ? APP_URL . 'uploadDocuments/Career/' . $row['vchDocument'] : '';
                        $strEndDate     = ($row['dtmEndDate']=='0000-00-00 00:00:00' || $row['dtmEndDate']=='' )?'--':date('d-M-Y ',strtotime($row['dtmEndDate']));
                        $ext            = pathinfo($row['vchDocument'], PATHINFO_EXTENSION);
                        $ctrExp++;
                      ?>
                      
               
                      
                <div class="innerleft bgwhite">
                    <ul>
          <li class="carrer1"> 
          
          <a href='<?php echo $strFile; ?>' target="_blank" title="<?php echo $careerName; ?>">
          <?php echo $ctrExp;?>. <?php echo $careerName;?> <span class="carrerDate"><?php echo $expiredon;?> - <?php echo $strEndDate;?></span>
          <?php if($ext=='pdf'){?>
            <i class="fa fa-file-pdf-o"></i>
            <?php } else { ?>
            <i class="fa fa-file-word-o"></i>
            <?php } ?> </a> </li>
            </ul>
                                   
        <div class="clear20"></div>
        <div class="clear50 hidden-xs hidden-1024"></div>    
                </div>  
  <?php } ?>
  <?php }else{  ?>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center"> <?php echo $strNoRecordlbl; ?> </div>
  </div>
  <?php } ?>

	   <!-- <ul>
			<li class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/Notification for Recruitment (Dec 2019).pdf' target="_blank" title="Notification Recruitment">1. ToR for GM (Training Operations & Industry Partnerships)  <span class="carrerDate">Expired On - 12 Feb 2020</span> <i class="fa fa-file-pdf-o"></i> </a> </li>

			<li  class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/ToR for Chief Knowledge Officer.pdf' target="_blank" title="Chief Knowledge Officer">2. ToR for GM (Training Operations & Industry Partnerships) <span class="carrerDate">Expired On - 12 Feb 2020</span> <i class="fa fa-file-pdf-o"></i> </a> </li>

			<li  class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/ToR_for_Chief_Marketing_Officer.pdf' target="_blank" title="Chief Marketing Officer">3. ToR for GM (Training Operations & Industry Partnerships) <span class="carrerDate">Expired On - 12 Feb 2020</span> <i class="fa fa-file-pdf-o"></i> </a> </li>

			<li class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/GM (Training Operations & Industry Partnerships).pdf' target="_blank" title="GM (Training Operations & Industry Partnerships)">4. ToR for GM (Training Operations & Industry Partnerships) <span class="carrerDate">Expired On - 12 Feb 2020</span><i class="fa fa-file-pdf-o"></i> </a> </li>

			<li class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/GM (Learning & Quality_Assurance).pdf' target="_blank" title="GM (Learning & Quality_Assurance)">5.ToR for GM (Training Operations & Industry Partnerships)<span class="carrerDate">Expired On - 12 Feb 2020</span>  <i class="fa fa-file-pdf-o"></i> </a> </li>
	   </ul> -->
	 <div class="clear20"></div>
	 <div class="clear50 hidden-xs hidden-1024"></div>    
  </div>
</div>
  
  
  <!-- 
<div class="innerleft bgwhite">
				   <ul>
					<li class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/Notification for Recruitment (Dec 2019).pdf' target="_blank" title="Notification Recruitment">1. <?php echo $first1;?><i class="fa fa-file-pdf-o"></i> </a> </li>

					<li  class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/ToR for Chief Knowledge Officer.pdf' target="_blank" title="Chief Knowledge Officer">2. <?php echo $first2;?>  <i class="fa fa-file-pdf-o"></i> </a> </li>

					<li  class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/ToR_for_Chief_Marketing_Officer.pdf' target="_blank" title="Chief Marketing Officer">3. <?php echo $first3;?>  <i class="fa fa-file-pdf-o"></i> </a> </li>

					<li class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/GM (Training Operations & Industry Partnerships).pdf' target="_blank" title="GM (Training Operations & Industry Partnerships)">4. <?php echo $first4;?> <i class="fa fa-file-pdf-o"></i> </a> </li>

					<li class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/GM (Learning & Quality_Assurance).pdf' target="_blank" title="GM (Learning & Quality_Assurance)">5. <?php echo $first5;?>  <i class="fa fa-file-pdf-o"></i> </a> </li>

					<li class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/Procurement Specialist.pdf' target="_blank" title="Procurement Specialist">6. <?php echo $first6;?><i class="fa fa-file-pdf-o"></i> </a> </li>

					<li class="carrer1"> <a href='<?php echo SITE_URL; ?>Application/uploadDocuments/tender/Proforma_Resume.doc' target="_blank" title="Proforma Resume">7.  <?php echo $first7;?>  <i class="fa fa-file-word-o"></i> </a> </li>

				   </ul>
				                           
 <div class="clear20"></div>
 <div class="clear50 hidden-xs hidden-1024"></div>    
                </div> -->
           
</section>
<?php include 'include/footer.php' ?>
</html>