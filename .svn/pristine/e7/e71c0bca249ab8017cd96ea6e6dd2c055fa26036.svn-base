<?php
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 7th Dec 2018
Author : MRD
*/
?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/tender.css">
<script src="<?php echo SITE_URL;?>js/loadAjax.js" type="text/javascript"></script>
<!--start:: contarea-->
<style>
.myTable thead {
	background: linear-gradient(to right top, #663891, #76388f, #85388c, #923989, #9e3a86);
	color: white;
}
</style>
<form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off">
<section class="container contarea">
 <?php if($result->num_rows > 0) { ?>

  <?php  while ($row = $result->fetch_array()) {
                      
                         $tenderDocument = $row['TenderDocument'];//!empty($row['TenderDocument'])?APP_URL.'uploadDocuments/tender/'.$row['TenderDocument']:'';
                       $document = explode(",", $tenderDocument);
                        $docCount       = count($document);
                        $title 			=!empty($row['VCH_TENDER_TITLE'])?htmlspecialchars_decode($row['VCH_TENDER_TITLE'],ENT_QUOTES):'';
                        $titleO 		=!empty($row['VCH_TENDER_TITLE_O'])?htmlspecialchars_decode($row['VCH_TENDER_TITLE_O'],ENT_QUOTES):'';
                        $descriptionE 	=!empty($row['VCH_DESCRIPTION_E'])?htmlspecialchars_decode($row['VCH_DESCRIPTION_E'],ENT_QUOTES):'';
                        $descriptionO 	=!empty($row['VCH_DESCRIPTION_O'])?htmlspecialchars_decode($row['VCH_DESCRIPTION_O'],ENT_QUOTES):'';
                        //$strEndDate     = ($row['DTM_CLOSING_DATETIME']=='0000-00-00 00:00:00' || $row['DTM_CLOSING_DATETIME']=='' )?'--':date('d-M-Y ',strtotime($row['DTM_CLOSING_DATETIME']));

                        $strEndDate     = ($_SESSION['lang']=='O')?'<span class="'.$strNumLangCls.'">'.date('d',strtotime($row['DTM_CLOSING_DATETIME'])).'</span> '.$objTender->getOdiaMonths(date('n',strtotime($row['DTM_CLOSING_DATETIME']))).' <span class="'.$strNumLangCls.'">'.date('Y',strtotime($row['DTM_CLOSING_DATETIME'])).'</span>':date('dS M  Y',strtotime($row['DTM_CLOSING_DATETIME']));


                        $desc         	= ($_SESSION['lang'] == 'O' && $descriptionO!='') ? $descriptionO:$descriptionE;
                        $headline     	= ($_SESSION['lang'] == 'O' && $titleO!='') ? $titleO:$title;
                        
                      ?>
  <div class="news-list box--shadow">
    <div class="news-desc">
      <h4 class="title"> <?php echo $headline; ?> </h4>
      <span><?php echo $lastSubdate;?> - <?php echo $strEndDate; ?></span>
      
      
      <div class="date">
        <?php 
							foreach($document as $documName){
							$doc  = APP_URL . 'uploadDocuments/tender/' . $documName;
							$ext  = strtolower(pathinfo($doc, PATHINFO_EXTENSION));                     
							?>
        <?php if(!empty($doc) && $ext=='pdf') { ?>
        <a href="<?php echo $doc; ?>" target="_blank" title="<?php echo $documName; ?>"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
        <?php } elseif (!empty($doc) && $ext=='rar') {  ?>
        <a href="<?php echo $doc; ?>" target="_blank" title="<?php echo $documName; ?>"> <i class="fa fa-file-archive-o" aria-hidden="true"></i></a>
        <?php } elseif (!empty($doc) && $ext=='docx' || $ext=='doc') {  ?>
        <a href="<?php echo $doc; ?>" target="_blank" title="<?php echo $documName; ?>"> <i class="fa fa-file-word-o" aria-hidden="true"></i></a>  
        <?php } else echo '--'; ?>
        <?php } ?>
      </div>
    </div>
    <div class="clearfix"></div>
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
        <?php echo $objTender->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?> </div>
    </div>
    <div class="clearfix"></div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_bootstrap">
        <ul class="pagination">
          <?php echo $objTender->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
        </ul>
      </div>
    </div>
    <?php } ?>
  </div>
  <?php } ?>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
   <div class="alert alert-primary mt-3">
    <p class="mb-4 mt-3"><a href="https://skillodisha.webex.com/skillodisha/j.php?RGID=rd9bfb905cb36f0e51c683057c3cf6060" target="_blank"><?php echo $eoiMsg;?></a></p>
  </div> 
</section>
</form>
<div class="clearfix"></div>
<!--end:: contarea-->

<!--start::Footer-->
<?php include 'include/footer.php' ?>

</body>
</html>