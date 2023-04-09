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
    <!--start:: contarea-->

    <section class="container contarea">

<!--
        <div class="row">
            <p class="snippet">Based on our experience of last one year, we found that the students of Odisha high level demonstrated high level of learning potential and work ethics and they are ready to work extra in their quest for knowledge, provided career opportunities are available to them. SDI Bhubaneswar’s focus is making them employable for jobs in the industry. Based on ourlast experience of last one year, we found that the students of Odisha demonstrated high level of learning extra potential and work ethics and they are ready to work extra in their ethics.</p>
            <div class="purpleline"></div>
        </div>
-->

        <div class="row">
            <div class="col-sm-12">
                   <div class="stories">
                       <?php
                       if($storyresult['vchImageFile']){?>
                       <img src="<?php echo APP_URL.'uploadDocuments/successStory/'.$storyresult['vchImageFile']; ?>"/>
                       <?php }?>
                       <div class="storyimgg">
                        <p class="<?php echo ($_SESSION['lang']=='O' && $storyresult['vchDesignationO']!='')?'odia':''; ?>"><?php echo ($_SESSION['lang']=='O' && $storyresult['vchDesignationO']!='')?$storyresult['vchDesignationO']:htmlspecialchars_decode(strtoupper($storyresult['vchDesignation']),ENT_QUOTES); ?></p>
						<h3 class="<?php echo ($_SESSION['lang']=='O' && $storyresult['vchNameO']!='')?'odia':''; ?>"><?php echo ($_SESSION['lang']=='O' && $storyresult['vchNameO']!='')?$storyresult['vchNameO']:htmlspecialchars_decode(strtoupper($storyresult['vchNameE']),ENT_QUOTES); ?></h3>
                       </div>
                   </div>
            </div>
            <div class="col-sm-12 text-center">
                 <h2 class="<?php echo ($_SESSION['lang']=='O' && $storyresult['vchSnippetO']!='')?'odia':''; ?>">
                             <?php echo ($_SESSION['lang']=='O' && $storyresult['vchSnippetO']!='')?$storyresult['vchSnippetO']:htmlspecialchars_decode($storyresult['vchSnippet'],ENT_QUOTES); ?>
                         </h2>
                <p class="<?php echo ($_SESSION['lang']=='O' && $storyresult['vchSnippetO']!='')?'odia':''; ?>"><?php echo ($_SESSION['lang']=='O' && $storyresult['vchDescriptionO']!='')?urldecode($storyresult['vchDescriptionO']):htmlspecialchars_decode($storyresult['vchDescriptionE'],ENT_QUOTES); ?></p>
            </div>
        </div>



        <div class="row">
              <h2></h2>
           
            <div class="storypersons">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        if ($intTotalRec > 0) {
                            ?>
                            <div class="carousel-item active">

                                <div class="persons">

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

                                            $strDesignation = ($_SESSION['lang'] == 'O' && $row['vchDesignationO'] != '') ? urldecode($row['vchDesignationO']) : htmlspecialchars_decode($row['vchDesignation'], ENT_QUOTES);
                                            $strDesigClass = ($_SESSION['lang'] == 'O' && $row['vchDesignationO'] != '') ? 'odia' : '';

                                            $strHeading = $strStoryViewDetailslbl;
                                            $strMoreHeading = $strMoreStorylbl;
                                            $strHeadClass = ($_SESSION['lang'] == 'O') ? 'odia' : '';

                                            $strNameE = htmlspecialchars_decode($row['vchNameE'], ENT_QUOTES);

                                            $strPageredir = ($_POST['navPage'] != '') ? $_POST['navPage'] : 'my-story';
                                            ?>
                                            <div class="persindiv <?php echo ($intPersonId==$intStoryId)?'activestory':'';?>">
                                                <div class="personimg">
                                                    <a href="<?php echo SITE_URL; ?>success-stories-details/<?php echo $strAlias; ?>"><img src="<?php echo APP_URL; ?>uploadDocuments/successStory/<?php echo $strImage; ?>"  alt="<?php echo $strAlias; ?>"/></a>
                                                </div>
                                                <a href="<?php echo SITE_URL; ?>success-stories-details/<?php echo $strAlias; ?>">  <h3> <?php echo $strName; ?></h3>
                                                    <p><?php echo $strDesignation; ?></p></a>
                                                <div class="clearfix"></div>
                                            </div>


        <?php if ($count % 6 == 0 && $count < $intTotalRec) { ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">

                                        <div class="persons">

                                            <div class="row">      

            <?php
        }


        $count++;
    }
    ?>
                                    </div>
                                </div>
                            </div>

<?php } else {?>
    <div class="noRecord <?php echo $strLangCls; ?>"><?php echo $strNorecordlbl; ?></div>
<?php } ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"><strong><i class="fa fa-angle-left" aria-hidden="true"></i></strong></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"><strong><i class="fa fa-angle-right" aria-hidden="true"></i></strong></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>

    </section>


    <!--end:: contarea-->



    <!--start::Footer-->
<?php include 'include/footer.php' ?>

</body>
</html>
