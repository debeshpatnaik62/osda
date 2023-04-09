﻿<?php
/* ================================================
  File Name         	  : addTranslate.php
  Description		  : This is used for translate Details.
  Designed By		  :
  Designed On		  :
  Devloped By		  : Samir Kumar
  Devloped On		  : 14-SEP-2018
  Update History		  :	<Updated by>		<Updated On>		<Remarks>

  Style sheet                  : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions          : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes                     :	header.php, navigation.php, util.php, footer.php,addBannerInner.php

  ================================================== */

require 'addTranslateInner.php';
?>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<style>
    .fix-btn{position: fixed;right: 30px;}  

</style>
<script language="javascript">
    $(document).ready(function () {
        //getWebURL();
        $('#loader-div').html('<center><img src="' + appURL + '/img/loading.gif"><p> Loading... <p></center>');
        setTimeout(function () {
            checkdbPage();
        }, 500);
        getPagepercent();
        //        Website search
        //getWebsiteDetails('<?php echo $intProjectId; ?>', 'selWebsiteId');
        // Website search
        loadNavigation('<?php echo $strTab; ?> Translation Editor');
        pageHeader = "<?php echo $strTab; ?>  Translation Editor";
        strFirstLink = "Manage Application";
        strMiddleLink = "Manage Translation Editor";
        strLastLink = "<?php echo $strTab; ?>";

        //$('#selWebsiteId').focus();
        $('#less1').hide();
        indicate = 'yes';

        $('#btnConfirmOk').on('click', function () {
            $(this).closest('#confirmModal').find(".modal-body").html('<center><img src="<?php echo APP_URL; ?>img/loading.gif"><p> Loading... <p></center>');
            $('#hdnQs').val('U');
            $('form').submit();
        });
<?php if ($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc; ?>');
<?php } ?>


        //Add more offices row
        $('.addMore').on('click', function () {
            var totRowNo = $('#appendTr tr').length;
            if (!validate())
                return false;

            var cloneRow = $('.addTr:last').clone(true);
            $(this).closest('tr').after(cloneRow);
            $('.addTr:last').find('.remove').show();
            $('.addTr:last').find('.moreEmail').val('');
            $('.addTr:last').find('.morePhone').val('');
            $('.addTr:last').find('.moreFax').val('');
            $.each($('#appendTr tr'), function (e) {
                var rowNo = Number(e) + 1;
                $(this).find('.moreEmail').attr('id', 'txtEmail' + rowNo);
                $(this).find('.morePhone').attr('id', 'txtPhone' + rowNo);
                $(this).find('.moreFax').attr('id', 'txtFax' + rowNo);
                $(this).find('.moreEmail').attr('name', 'txtEmail' + rowNo);
                $(this).find('.morePhone').attr('name', 'txtPhone' + rowNo);
                $(this).find('.moreFax').attr('name', 'txtFax' + rowNo);
                $(this).find('.lblSlNo').text(rowNo);
                $(this).find('.addMore').attr('id', 'more' + rowNo);
                $(this).find('.remove').attr('id', 'less' + rowNo);
                $('#more' + Number(rowNo - 1)).hide();
                $('#less' + Number(rowNo - 1)).show();

            });
        });

//================== Remove row ===========
        $('.remove').click(function () {
            $(this).closest('tr').remove();
            $('.uploadConf').hide();
            var totRowNo = $('#appendTr tr').length;
            $.each($('#appendTr tr'), function (e) {
                var rowNo = Number(e) + 1;
                $(this).find('.moreEmail').attr('id', 'txtEmail' + rowNo);
                $(this).find('.morePhone').attr('id', 'txtPhone' + rowNo);
                $(this).find('.moreFax').attr('id', 'txtFax' + rowNo);
                $(this).find('.moreEmail').attr('name', 'txtEmail' + rowNo);
                $(this).find('.morePhone').attr('name', 'txtPhone' + rowNo);
                $(this).find('.moreFax').attr('name', 'txtFax' + rowNo);
                $(this).find('.lblSlNo').text(rowNo);
                $(this).find('.addMore').attr('id', 'more' + rowNo);
                $(this).find('.remove').attr('id', 'less' + rowNo);
            });
            if (totRowNo == 1)
            {
                $('#more1').show();
                $('#less1').hide();
            } else
                $('#more' + totRowNo).show();
        });

<?php
if ($emailCtr > 0) {
    $plCtr = 0;
    for ($i = 0; $i < $emailCtr; $i++) {
        ?>
        <?php
        $plCtr++;
        if ($plCtr > 1) {
            ?>
                    $('.addMore:last').click();
        <?php } ?>
                $('#txtEmail<?php echo $plCtr; ?>').val('<?php echo $emailArr[$i]; ?>');
                $('#txtPhone<?php echo $plCtr; ?>').val('<?php echo $phoneArr[$i]; ?>');

                $('#txtFax<?php echo $plCtr; ?>').val('<?php echo $faxArr[$i]; ?>');
        <?php
    }
}
?>
    });


</script>
<div id="page-content">

    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    
    <div class="fixed-tab fixed">
        <div class="col-xs-11">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
                <a href="<?php echo APP_URL; ?>registerPage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Register Page</a>
                <a href="<?php echo APP_URL; ?>viewTranslation/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info active">Progress</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-11">
            <!-- PAGE CONTENT BEGINS -->
            <!-- <div class="top_tab_container"> <a href="<?php echo APP_URL; ?>registerPage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Register Page</a>
                <a href="<?php echo APP_URL; ?>viewTranslation/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info active">Progress</a>
            </div> -->

            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">      
                <div class="lang-status-bar" style="margin-bottom: 10px;">
                    <a href="<?php echo APP_URL; ?>viewTranslation/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i></a> 
                   <!--<input type="button" id="btnSubmit" name="btnSubmit" value="Save" class="btn btn-success defaultBtn fix-btn" style="display: none;" onclick="return submitData();" />-->

                    <a class="btn btn-success pull-right" id="btnSubmit" title="" style="display: none; margin-right: 5px;" onclick="return submitData();"> Save </a> 
                    <div style="margin-top: 5px;" class="pull-left">Hindi Status <span id="hindiStat" class="label label-warning"></span> &nbsp;  &nbsp;  &nbsp;   Odia Status <span id="odiaStat" class="label label-success"></span></div>
                    <div class="clearfix"></div>
                </div>
                <iframe id="urlData" src="<?php echo $vchPageURL; ?>" width="950" height="600">
                    alternative content for browsers which do not support iframe.
                </iframe>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="3%">Sl#</th>
                            <th width="22%">English</th>
                            <th width="22%">Hindi</th>
                            <th width="22%">Odia</th>
                        </tr>
                    </thead>
                    <tbody id="appendTr">
                    </tbody>
                </table>
                <div id="loader-div"></div>


                <div class="form-group clearfix">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="hidden" name="hdnQs" id="hdnQs" value="0" />
                        <input type="hidden" id="hdnPageId" name="hdnPageId" value="<?php echo $intpageId; ?>">
                        <input type="hidden" id="hdnPageUrl" name="hdnPageUrl" value="<?php echo $vchPageURL; ?>">

                    </div>
                </div>
            </div>
            <div class="hr hr32 hr-dotted"></div>
            <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</div>
<!-- /.page-content -->

<div id="sendhtml" style="display: none;"></div>


<script type="text/javascript">
    function submitData() {
        //confirmAlert("Are you sure to submit ?");
        ajxSubmitData();
    }
    </script>
<script>
    // $(window).scroll(function() {
    //     if ($(this).scrollTop()) {
    //       $('.fixed-tab').toggleClass('fixed');
    //     } else {
    //       $('.fixed-tab').removeClass('fixed');
    //     }
    // });

</script>


