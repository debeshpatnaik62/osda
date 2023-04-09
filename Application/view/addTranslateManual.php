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

//require 'addContactUsInner.php';
?>
<script src="<?php echo APPURL; ?>js/loadAjax.js"></script>
<script src="<?php echo APPURL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //        Website search
        //getWebsiteDetails('<?php echo $intProjectId; ?>', 'selWebsiteId');
        // Website search
        loadNavigation('<?php echo $strTab; ?> Contact Us');
        pageHeader = "<?php echo $strTab; ?>  Contact Us";
        strFirstLink = "Manage Application";
        strMiddleLink = "Manage Translation Editor";
        strLastLink = "<?php echo $strTab; ?>";

        //$('#selWebsiteId').focus();
        $('#less1').hide();
        indicate = 'yes';
        $('#btnConfirmOk').on('click', function () {
            $(this).closest('#confirmModal').find(".modal-body").html('<center><img src="<?php echo APPURL; ?>img/loading.gif"><p> Loading... <p></center>');
            $('#hdnQs').val('U');
            $('form').submit();
        });
<?php if ($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc; ?>');
<?php } ?>


        //Add more offices row
        $('.addMore').on('click', function () {
            var totRowNo = $('#appendTr tr').length;
            // if (!validate())
            //     return false;

            var cloneRow = $('.addTr:last').clone(true);
            $(this).closest('tr').after(cloneRow);
            $('.addTr:last').find('.remove').show();
            $('.addTr:last').find('.txtEnglish').val('');
            $('.addTr:last').find('.txtHindi').val('');
            $('.addTr:last').find('.txtOdia').val('');
            $.each($('#appendTr tr'), function (e) {
                var rowNo = Number(e) + 1;
                $(this).find('.hdnIds').attr('id', 'hdnIds' + rowNo);
                $(this).find('.txtEnglish').attr('id', 'txtEnglish' + rowNo);
                $(this).find('.txtHindi').attr('id', 'txtHindi' + rowNo);
                $(this).find('.txtOdia').attr('id', 'txtOdia' + rowNo);
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
            <li><a href="<?php echo APPURL; ?>registerPage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="">Register Page</a></li>
            <li class="active"><a href="<?php echo APPURL; ?>viewTranslation/<?php echo $glId; ?>/<?php echo $plId; ?>" class="">Progress</a></li>
        </ul>
        <div class="hr hr-solid"></div>
        <div class="tab-content">
            <div class="tab-pane pad-btm fade active in" id="demo-bsc-tab-1">
                <div class="row">
                    <div class="col-xs-12"> 
                        <a href="<?php echo APPURL; ?>viewTranslation/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i></a>
                            <div class="form-group clearfix">
                                <label class="col-sm-2 control-label" for="mapAddress"><strong>WebPage URL</strong> </label>
                                <div class="col-sm-4">
                                    <span class="colon">:</span>
                                    <label class="form-control-static" ><?php echo $vchPageURL;?></label>
                                </div>
                            </div>
                           
                       <div  class="table-responsive form-group">
                            <div id="moreContactDiv">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="3%">Sl#</th>
                                            <th width="22%">English *</th>
                                            <th width="22%">Hindi</th>
                                            <th width="22%">Odia</th>
                                            <th width="22%">Add / Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody id="appendTr">
                                        <tr class="addTr">
                                            <td><label class="lblSlNo">1</label></td>
                                            <td>
                                                <input type="hidden" class="hdnIds" value="0" name="hdnIds[]" id="hdnIds1"/>
                                                <textarea class="form-control txtEnglish" id="txtEnglish1" name="txtEnglish[]" rows="5"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control txtHindi" id="txtHindi1" name="txtHindi[]" rows="5"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control txtOdia" id="txtOdia1" name="txtOdia[]" rows="5"></textarea>
                                            </td>
                                            <td class="center addDel"><a href="javascript:void(0);" class="btn btn-xs btn-info addMore" title="Add More" id="more1"> <i class="fa fa-plus" aria-hidden="true"></i> </a> &nbsp; <a href="javascript:void(0);" class="btn btn-xs btn-danger remove" title="Remove" id="less1"> <i class="fa fa-times" aria-hidden="true"></i> </a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>  

                        <div class="form-group clearfix">
                            <div class="col-sm-2 no-padding-right"></div>
                            <div class="col-sm-4">
                                <input type="hidden" name="hdnQs" id="hdnQs" value="0" />
                                <input type="hidden" id="hdnPageId" name="hdnPageId" value="<?php echo $intpageId;?>">
                                <input type="hidden" id="hdnPageUrl" name="hdnPageUrl" value="<?php echo $vchPageURL;?>">
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
                                        var totRowNumber = $('.addMore').length;
                                        for (var i = 1; i <= totRowNumber; i++)
                                        {
                                            if (!blankCheck('txtEnglish' + Number(i), 'English Text can not be left blank'))
                                            return false;
                                        }
                                        // if (!blankCheck('txtEnglish', 'English Text can not be left blank'))
                                        //     return false;
                                        confirmAlert("Are you sure to submit ?");
                                    }



                                    // function validate()
                                    // {
                                    //     var totRowNumber = $('.addMore').length;
                                    //     $('#hdnContactCnt').val(totRowNumber);

                                    //     for (var i = 1; i <= totRowNumber; i++)
                                    //     {
                                    //         if (!blankCheck('txtEmail' + Number(i), 'Email can not left blank'))
                                    //             return false;
                                    //         if (!validEmail('txtEmail' + Number(i)))
                                    //             return false;

                                    //         if (!blankCheck('txtPhone' + Number(i), 'Phone can not left blank'))
                                    //             return false;

                                    //         if (!maxLength('txtPhone' + Number(i), 14, 'Phone'))
                                    //             return false;
                                    //         if (!minLength('txtPhone' + Number(i), 10, 'Phone'))
                                    //             return false;
                                    //         /*if (!blankCheck('txtFax' + Number(i), 'Fax can not left blank'))
                                    //             return false;
                                    //         */    
                                    //         if (!maxLength('txtFax' + Number(i), 14, 'Fax'))
                                    //             return false;
                                    //         if (!minLength('txtFax' + Number(i), 10, 'Fax'))
                                    //             return false;
                                    //         if (!validFaxNo('txtFax' + Number(i)))
                                    //             return false;
                                    //     }
                                    //     return true;
                                    // }
                                    // function charAdress(controlId)
                                    // {
                                    //     var pattern = new RegExp(/[\+? *[1-9]+]?[0-9 ]+/);
                                    //     var address = $('#' + controlId).val();
                                    //     if (address != '')
                                    //     {
                                    //         if (pattern.test(address) == true)
                                    //             return true;
                                    //         else
                                    //         {
                                    //             viewAlert("Please enter a valid Address", controlId);
                                    //             $('#' + controlId).focus();
                                    //             return false;
                                    //         }
                                    //     }
                                    //     else
                                    //         return true;
                                    // }
                                    // function validFaxNo(controlId)
                                    // {
                                    //     var pattern = new RegExp(/[\+? *[1-9]+]?[0-9 ]+/);
                                    //     var fax = $('#' + controlId).val();
                                    //     if (fax != '')
                                    //     {
                                    //         if (pattern.test(fax) == true)
                                    //             return true;
                                    //         else
                                    //         {
                                    //             viewAlert("Please enter a valid fax number", controlId);
                                    //             $('#' + controlId).focus();
                                    //             return false;
                                    //         }
                                    //     }
                                    //     else
                                    //         return true;
                                    // }
                                    // function matchIframe(controlId)
                                    // {
                                    //     //alert(23)
                                    //     var mapAddress = $('#' + controlId).val();
                                    //     // alert(mapAddress);
                                    //     var pattern = new RegExp(/(<iframe)/g);
                                    //     if (pattern.test(mapAddress) == true)
                                    //     {
                                    //         $('#' + controlId).focus();
                                    //         viewAlert("Enter only the source for the iFrame");
                                    //         return false;
                                    //     }
                                    //     else
                                    //         return true;
                                    // }


    </script>



