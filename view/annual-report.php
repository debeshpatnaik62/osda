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
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/annual-report.css">
<!--start:: contarea-->
<section class="container contarea">
    <?php
    if($intTotalRec>0){?>
                <div class="annual-report">
                  <?php  while ($row = $totalResult->fetch_array()) {
                        $reportImage=!empty($row['vchReportImage'])?APP_URL.'uploadDocuments/Report/'.$row['vchReportImage']:'';
                        $reportFile=!empty($row['vchReportFile'])?APP_URL.'uploadDocuments/Report/'.$row['vchReportFile']:'';
                        $reportYear=date('y',strtotime($row['dtmPublishDate']));
                        $financeyear = date('Y',strtotime($row['dtmPublishDate'].' -1 year')).'-'.$reportYear;
                        $reportHeadline=!empty($row['vchReportHeadline'])?htmlspecialchars_decode($row['vchReportHeadline'],ENT_QUOTES):'';
                        $reportHeadlineO=!empty($row['vchReportHeadlineO'])?htmlspecialchars_decode($row['vchReportHeadlineO'],ENT_QUOTES):'';
                        $headline     = ($_SESSION['lang'] == 'O' && $reportHeadlineO!='') ? $reportHeadlineO:$reportHeadline;
                      ?>
                        <div class="year__report">
                            <div class="report__media">
                                <img src="<?php echo $reportImage;?>" alt="<?php echo ucfirst($headline);?>">
                            </div>
                            <div class="report__details">
                                <div class="report__content">
                                    <span><?php echo $financeyear;?></span>
                                    <h3><?php echo ucfirst($headline);?></h3>
                                    <a href="<?php echo $reportFile;?>" target="_blank" download>Download <i class="fa fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
    <?php }else{  ?>
        <div class="row"> <div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center"><?php echo $strNoRecordlbl; ?></div></div>
    <?php } ?>
    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
         <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
         <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
<?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-sm-12 text-right">
                          <div class="dataTables_info " id="sample-table-2_info">
                              <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? $strPaginglbl1 : $strPaginglbl2; ?></a>/ <?php } ?> 
                                   <?php echo $objReport->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-12">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objReport->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
                                </ul>
                            </div>
                        </div>
                <?php } ?>
                </div>
<?php } ?>
</section>

<!--end:: contarea-->
<!--start::Footer-->
<?php include 'include/footer.php' ?>
</body>
</html>
