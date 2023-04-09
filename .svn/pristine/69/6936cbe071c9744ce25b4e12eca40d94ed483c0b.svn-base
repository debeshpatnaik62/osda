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
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/temasek-booklet.css">
<!--start:: contarea-->
<style>
	.myTable thead {
		background: linear-gradient(to right top, #663891, #76388f, #85388c, #923989, #9e3a86);
		color: white;
	}
</style>




<section class="container contarea">
	
	


	<?php
	if ( $intTotalRec > 0 ) {
		?>
	
			<?php  while ($row = $totalResult->fetch_array()) {
                      
                        $reportImage=!empty($row['vchReportImage'])?APP_URL.'uploadDocuments/Report/'.$row['vchReportImage']:'';
                        $reportFile=!empty($row['vchReportFile'])?APP_URL.'uploadDocuments/Report/'.$row['vchReportFile']:'';
                        $reportYear=date('y',strtotime($row['dtmPublishDate']));
                        $financeyear = date('Y',strtotime($row['dtmPublishDate'].' -1 year')).'-'.$reportYear;
                        $reportDate  = date('d M, Y',strtotime($row['dtmPublishDate']));
                        $reporYear = date('Y',strtotime($row['dtmPublishDate']));
                        $reporDay =date('d',strtotime($row['dtmPublishDate']));
                        $reporMonth =ltrim(date('m',strtotime($row['dtmPublishDate'])),0);

                        $reportHeadline=!empty($row['vchReportHeadline'])?htmlspecialchars_decode($row['vchReportHeadline'],ENT_QUOTES):'';
                        $reportHeadlineO=!empty($row['vchReportHeadlineO'])?htmlspecialchars_decode($row['vchReportHeadlineO'],ENT_QUOTES):'';
                        $descriptionE =!empty($row['vchDescriptionE'])?htmlspecialchars_decode($row['vchDescriptionE'],ENT_QUOTES):'';
                        $descriptionO =!empty($row['vchDescriptionO'])?htmlspecialchars_decode($row['vchDescriptionO'],ENT_QUOTES):'';
                        $desc         = ($_SESSION['lang'] == 'O' && $descriptionO!='') ? $descriptionO:$descriptionE;
                        $headline     = ($_SESSION['lang'] == 'O' && $reportHeadlineO!='') ? $reportHeadlineO:$reportHeadline;
                        
                      ?>
			
			
			
			
			
			
				<div class="news-list box--shadow">
					<?php if($reportImage!='') {?>
					<div class="news-img pr-md-4">
						<!-- <img src="<?php echo SITE_URL;?>images/bb_default3.jpg" alt=""> -->
						 <img src="<?php echo $reportImage; ?>" alt=""> 
					</div>
				<?php } ?>
					<div class="news-desc">
						<h3 class="title"><?php echo $headline; ?></h3>
						<div class="desc"> <?php echo $desc; ?></div>
						<div class="date">
							
							<?php echo ($_SESSION['lang'] == 'O')?$reporDay.'-'.$odiaMonthAry[$reporMonth].'-'.$reporYear:$reportDate;?>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>

			
			
			
			

			<?php } ?>


		
	<?php }else{  ?>
	<div class="row">
		<div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center">
			<?php echo $strNoRecordlbl; ?>
		</div>
	</div>
	<?php } ?>
	<input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>"/>
	<input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>"/>
	<input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>"/>
	<?php if (mysqli_num_rows($result) > 0) { ?>
	<div class="row noPrint">
		<div class="col-sm-12 text-right">
			<div class="dataTables_info " id="sample-table-2_info">
				<?php if ($intTotalRec > $intPgSize) { ?>
				<a href="#" onClick="AlternatePaging();">
					<?php echo ($isPaging == 0) ? $strPaginglbl1 : $strPaginglbl2; ?>
				</a>/
				<?php } ?>
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