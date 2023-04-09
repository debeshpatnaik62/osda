<?php
/* plugin */
/*
  Website Name : Odisha Skill Developement Authority (OSDA)
  Date Created : 4rd Dec 2018
  Author : Rumana Parween
 */
?>
<!doctype html>
<html lang="en">
    <?php include 'include/header.php' ?>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/faq.css">
    <!--start:: contarea-->

    <section class="container contarea">




        <p class="font-lgb screenreader " tabindex="13">Have any question on Skilled in Odisha? We have covered all aspects of skill development to answer your queries and guide you properly. The FAQs have been categorized in the most user-friendly manner for your convenience and ready reference. </p>




            <?php if($result->num_rows > 0)  {  $intCount       =   1; ?>
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <?php while($faqRow = $result->fetch_array()) { 
                                                 
                        $qusE           = htmlspecialchars_decode($faqRow['vchQuestionE'], ENT_QUOTES);
                        $qusO           = $faqRow['vchQuestionH'];
                        $qus            = ($_SESSION['lang']=='O' && $qusO != '')?$qusO:$qusE;
                        $qusCls         = ($_SESSION['lang']=='O' && $qusO != '')?'odia':'';
                        $ansE           = htmlspecialchars_decode($faqRow['vchAnswerE'], ENT_QUOTES);
                        $ansO           = urldecode($faqRow['vchAnswerH']);
                        $ans            = ($_SESSION['lang']=='O' && $ansO != '')?$ansO:$ansE;
                        $ansCls         = ($_SESSION['lang']=='O' && $ansO != '')?'odia':'';

                        ?>
                  
                          
                          <div class="panel panel-default faqpanel">
                          <div class="panel-heading" role="tab" id="heading<?php echo $faqRow['intFaqId'];?>">
                            <h4 class="panel-title screenreader">
                              <a role="button"  data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $faqRow['intFaqId'];?>" aria-expanded="false" aria-controls="collapse<?php echo $faqRow['intFaqId'];?>" class="collapsed <?php echo $qusCls; ?>">
                                 <i class="more-less fa fa-plus"></i>
                                  <?php echo $qus; ?>
                              </a>
                            </h4>
                          </div>
                          <div id="collapse<?php echo $faqRow['intFaqId'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $faqRow['intFaqId'];?>" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body screenreader" tabindex="<?php echo $faqRow['intFaqId'];?>"> <?php echo $ans; ?></div>
                          </div>
                        </div>

                  <?php $intCount++; } ?>
                         </div>   
                     <?php     } ?>
                        <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                        <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                        <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                        <?php if (mysqli_num_rows($result) > 0) { ?>
                          <div class="row noPrint">
                              
                              <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                  <div class="col-xs-12">
                                      <div class="dataTables_paginate paging_bootstrap">
                                          <ul class="pagination">
                                          <?php echo $objFaq->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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

<script type="text/javascript">
    function toggleIcon(e) {
        $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('fa-plus fa-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);


    function showFaqData(elm) {
        var pgName = $('.clsFaqdata' + elm).attr("id");

        //  console.log(elm+pgName);

        if (pgName != null && pgName != undefined) {
            $('#contentModal').modal();
            $(".faqObj").html('<div class="center" style="height:100px; font-size:24px;margin-top:43%;"><i class="fa fa-spinner fa-spin"></i></div>');
            $(".faqObj").load("<?php echo SITE_URL . 'faqPages/'; ?>" + pgName + ".php");
        }
    }
</script>