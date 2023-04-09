﻿<?php
/* ================================================
  File Name         	  : addTranslationManual.php
  Description		  : This is used for add Contact Details.
  Designed By		  :
  Designed On		  :
  Devloped By		  : Samir kumar
  Devloped On		  : 14-SEP-2017
  Update History		  :	<Updated by>		<Updated On>		<Remarks>

  Style sheet                  : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions          : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes                     :	header.php, navigation.php, util.php, footer.php,addBannerInner.php

  ================================================== */

require 'registerPageInner.php';
?>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //        Website search
        //getWebsiteDetails('<?php echo $intProjectId; ?>', 'selWebsiteId');
        // Website search
        loadNavigation('<?php echo $strTab; ?> Contact Us');
        pageHeader = "<?php echo $strTab; ?>  Contact Us";
        strFirstLink = "Manage Application";
        strMiddleLink = "Manage Contact Us";
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
            }
            else
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

    <div class="tab-base">
        <?php include('includes/util.php'); ?>
        <!-- PAGE CONTENT BEGINS -->

        <ul class="nav nav-tabs">
            <li class="active"><a href="<?php echo APP_URL; ?>registerPage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="">Register Page</a></li>
            <li><a href="<?php echo APP_URL; ?>viewTranslation/<?php echo $glId; ?>/<?php echo $plId; ?>" class="">Progress</a></li>
        </ul>
        <div class="hr hr-solid"></div>
        <div class="tab-content">
            <div class="tab-pane pad-btm fade active in" id="demo-bsc-tab-1">
                <div class="row">
                    <div class="col-xs-12"> 
                            <div class="form-group clearfix">
                                <label class="col-sm-2 control-label no-padding-right" for="mapAddress">Webpage URL </label>
                                <div class="col-sm-4">
                                    <span class="colon">:</span>
                                    <input type="text" name="txtwebUrl" id="txtwebUrl" class="form-control">
                                    <span class="mandatory">*</span>
                                </div>
                            </div>
                           
                            <div class="form-group clearfix">
                                <label class="col-sm-2 control-label no-padding-right" for="mapAddress">Webpage Name</label>
                                <div class="col-sm-4">
                                    <span class="colon">:</span>
                                    <input type="text" name="txtwebName" id="txtwebName" class="form-control">
                                    <span class="mandatory">*</span>
                                </div>
                            </div>


                       

                        <div class="form-group clearfix">
                            <div class="col-sm-2 no-padding-right"></div>
                            <div class="col-sm-4">
                                <input type="hidden" name="hdnQs" id="hdnQs" value="0" />
                                <!-- <input type="button" id="btnFetch" name="btnFetch" value="Fetch Content" class="btn btn-success defaultBtn" onClick="return getContentfromPage();"/> -->
                                <input type="button" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success defaultBtn" onclick="return validator();" />
                            </div>
                        </div>
                        <div class="hr hr32 hr-dotted"></div>
                        <!-- PAGE CONTENT ENDS -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    </div>
    <!-- /.page-content -->



    <script type="text/javascript">
                                    function validator()
                                    {
                                        var str = $('#txtwebUrl').val();
                                         if (!blankCheck('txtwebUrl', 'Webpage URL can not be left blank'))
                                            return false;
                                        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
                                        if(!pattern.test(str)) {
                                            viewAlert("Please enter an valid URL.");
                                            return false;
                                        }

                                        if (!blankCheck('txtwebName', 'Webpage Name can not be left blank'))
                                            return false;
                                        confirmAlert("Are you sure to submit ?");
                                    }



                                    


    </script>



