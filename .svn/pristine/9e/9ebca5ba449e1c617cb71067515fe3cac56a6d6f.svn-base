<?php
/*plugin*/
/*
  Website Name : Odisha Skill Developement Authority (OSDA)
  Date Created : 4rd Dec 2018
  Author : Rumana Parween
 */
?>



<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/success-story.css">
<!--start:: contarea-->

<section class="container contarea">


	<p class="bigfont <?php echo $odiaClass;?>"><?php echo $succesStoryDesc;?></p>


  <?php
            if ($intTotalRec > 0) {
                        ?>
	<div class="row">
            <?php
                                        $count = 1;
                                        mysqli_data_seek($totalStoryRes, 0);
                                        while ($row = $totalStoryRes->fetch_array()) {
                                            // echo $intTotalRec;
                                            $intStoryId = $row['intStoryId'];
                                            $strAlias = $row['vchAlias'];
                                            $strImage = $row['vchImageFile'];
                                            $strName = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? $row['vchNameO'] : htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);
                                            $strClass = ($_SESSION['lang'] == 'O' && $row['vchNameO'] != '') ? 'odia' : '';

                                            $strSnippet = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? $row['vchSnippetO'] : htmlspecialchars_decode($row['vchSnippet'], ENT_QUOTES);
                                            $strSnippetClass = ($_SESSION['lang'] == 'O' && $row['vchSnippetO'] != '') ? 'odia' : '';

                                            $strDesc = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? urldecode($row['vchDescriptionO']) : htmlspecialchars_decode($row['vchDescriptionE'], ENT_QUOTES);
                                            $strDesClass = ($_SESSION['lang'] == 'O' && $row['vchDescriptionO'] != '') ? 'odia' : '';
                                                $descCount    = ($_SESSION['lang']=='O' && $descO != '')?100:70;
                                            $strDesignation = ($_SESSION['lang'] == 'O' && $row['vchDesignationO'] != '') ? urldecode($row['vchDesignationO']) : htmlspecialchars_decode($row['vchDesignation'], ENT_QUOTES);
                                            $strDesigClass  = ($_SESSION['lang'] == 'O' && $row['vchDesignationO'] != '') ? 'odia' : '';
                                           
                                            
                                            $strHeading = $strStoryViewDetailslbl;
                                            $strMoreHeading = $strMoreStorylbl;
                                            $strHeadClass = ($_SESSION['lang'] == 'O') ? 'odia' : '';

                                            $strNameE = htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);

                                            $strPageredir = ($_POST['navPage'] != '') ? $_POST['navPage'] : 'my-story';
                                            ?>
            
                                                <div class=" col-lg-3 col-sm-6 col-xs-6">
                                                        <div class="story">
                                                                <a href="<?php echo SITE_URL; ?>success-stories-details/<?php echo $strAlias; ?>">
                                                                        <div class="storyimg">
                                                                                <img src="<?php echo APP_URL; ?>uploadDocuments/successStory/<?php echo $strImage; ?>" alt="<?php echo $strName; ?>">
                                                                        </div>
                                                                        <h3 class="<?php echo $strClass;?>"><?php echo $strName; ?></h3>
                                                                        <div class="text-muted <?php echo $strDesigClass;?>"><?php echo $strDesignation;?></div>
                                                                        <p class="<?php echo $strDesClass;?>"><?php echo $objStory->wardWrap(strip_tags($strDesc),$descCount); ?></p>
                                                                        <button type="button" class=" osda--border <?php echo $odiaClass;?>" onclick="goToDetails('<?php echo $intStoryId;?>');"><?php echo $readMoreStorylbl;?></button>
                                                                        <div class="clearfix"></div>
                                                                </a>
                                                        </div>
                                                </div>
                                        <?php }?>
        </div>
            <?php }else{?>
        <div class="row"> <div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center"><?php echo $strNoRecordlbl; ?></div></div>
            <?php }?>
		
		
	</div>
</section>





<!--end:: contarea-->
<!--start::Footer-->
<?php include 'include/footer.php' ?>

</body>

</html>