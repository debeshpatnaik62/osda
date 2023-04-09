<?php
/* ================================================
  File Name             : addTimeline.php
  Description         : This is used for add Timeline  Details.
  Designed By         :
  Designed On         :
  Devloped By         : Ashis kumar Patra
  Devloped On         : 04-12-2018
  Update History      : <Updated by>    <Updated On>    <Remarks>

  Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes          : header.php, navigation.php, util.php, footer.php,addNewsInner.php

  ================================================== */

require 'addTimelineInner.php';
?>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {

        pageHeader = "<?php echo $strTab; ?> Journey So Far";
        strFirstLink = "Manage Application";
        strLastLink = "Journey So Far";


        indicate = 'yes';
        $('#txtHeadline').focus();
        /*$('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        });*/
<?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc; ?>');
<?php }
        if ($id == 0 || $strFileName =='') {
        ?>
                    $('#userImage').hide();
                    $('#closeimg').hide();
        <?php } else { ?>
              $('#userImage').show();
              $('#closeimg').show();
               $('#closeimg').css('margin-left', '50px')
             $('#imgMsg').css('margin-left', '110px');
        <?php } ?> 

         
        $('#closeimg').click(function () {
            if (!confirm('Are you sure to delete selected File'))
                return false;
            $('#hdnImageFile').val('');
            $('#userImage').hide();
            $(this).hide();
          
        });  


    });

    function validator()
    {

        if (!blankCheck('txtDate', 'Date can not be left blank'))
            return false;
        else if (!checkSpecialChar('txtDate'))
            return false;


<?php if ($id == 0) { ?>
//            if (!blankCheck('fileDocument', 'Please Upload Image'))
//                return false;
<?php } ?>
<?php if ($id > 0) { ?>
            $("#fileDocument").html('<img src="<?php echo APP_URL; ?>uploadDocuments/Timeline/<?php echo $vchImageName; ?>" width="100%" height="80%"/>');
<?php } ?>
        if ($('#fileDocument').val() != '')
        {

            if (!IsCheckFile('fileDocument', 'Invalid file types. Upload only ', 'jpeg,jpg,gif'))
                return false;
            var fileSize_inKB = Math.round(($("#fileDocument")[0].files[0].size / 1024));
            if (fileSize_inKB > 1024)
            {
                viewAlert('File size cannot be more than 1MB.');
                return false;
            }
        }
        var remark = CKEDITOR.instances['txtDescriptionE'].getData();
        if (remark == '')
        {
            viewAlert('Description  can not left blank');
            $('#txtDescriptionE').focus();
            return false;
        }


    }

    /*function readImage(input) {

        $('#newsImg').show();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#newsImg').attr('src', e.target.result);
                //$('#imgMsg').css('margin-left', '110px');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }*/

      function readImage(input) {

        var found = input.files[0].name.lastIndexOf('.') + 1;
        var extension = (found > 0 ? input.files[0].name.substr(found) : "");

       
            $('#userImage').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#userImage').attr('src', e.target.result);
                    $('#imgMsg').css('margin-left', '210px');
                }
                reader.readAsDataURL(input.files[0]);
            }
        
            else
            {
               $('#userImage').hide();
               $('#closeimg').hide();                   
            }
    }
   getNewsCategory('selNewsType','<?php echo $intNewsType;?>'); 

    $(function() {
    if (typeof CKEDITOR != 'undefined') {
        $('form').on('reset', function(e) {
            if ($(CKEDITOR.instances).length) {
                for (var key in CKEDITOR.instances) {
                    var instance = CKEDITOR.instances[key];
                    if ($(instance.element.$).closest('form').attr('name') == $(e.target).attr('name')) {
                        instance.setData(instance.element.$.defaultValue);
                    }
                }
            }
        });
    }
});
</script>   
<script type="text/javascript">
 //---- Date picker function
  $(document).ready(function () { 
        
    
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    //--- Date function
    $('.date-picker').datepicker({
         autoclose: true,
         todayHighlight: true
    });

$('form').find('input[type=text],textarea,select').not('.date-picker, .dashboard-control').filter(':visible:first').focus();
        $('form').find('.date-picker').on('keypress', function () {
            return false;
        });
        $('form').find('.fa-calendar').closest('.input-group-addon').on('click', function () {
            $(this).closest('.input-group').find('.date-picker').focus();
        });


});
</script>

<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
                <?php if ($adminConsole_Privilege == 0 || $adminConsole_Privilege == 1 || $intPermission != 2) { ?>
                    <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a>
                <?php } ?>

                <a href="<?php echo APP_URL; ?>viewTimeline/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>



            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">




                <!-- <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSlug">Publish Date </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <div class="input-group">
                            <input class="form-control date-picker" id="txtDate" name="txtDate" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $strDate; ?>" readonly>
                            <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 

                        </div>
                        <span class="mandatory">*</span>
                    </div>
                </div> -->



           <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right" for="txtSlug">Publish Date</label>
                  <div class="col-sm-4"> <span class="colon">:</span>
                    <div class="input-group">
                      <input type="text" data-date-format="dd-mm-yyyy"  id="txtDate" name="txtDate" class="form-control date-picker" value="<?php echo $strDate; ?>" autocomplete="off">
                      <span class="input-group-addon"> <span class="add-on"><i class="fa fa-calendar"></i></span> <a class="add-on" href="javascript:void(0);"></i></a> </span> </div>
                     
                      <span class="mandatory">*</span> 
          </div>
        </div>



                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="fileDocument">Upload Image</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="fileDocument" name="fileDocument" placeholder="" class="form-control" onChange="readImage(this);">
                        <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strFileName; ?>"/>
                       
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                        <?php if ($id > 0) { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/Timeline/' . $strFileName; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                           <span class="close-btn"><img src="<?php echo APP_URL;?>img/close-btn.png" width="16" height="16" alt="Close" id="closeimg" style="cursor: pointer;"></span>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>

                    </div>

                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                        <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB)</span>
                    </div>
                </div>

                <div class="form-group contentval1 contentActive">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionE">Description English </label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>
                        <textarea class="ckeditor" cols="90" id="txtDescriptionE" name="txtDescriptionE" rows="10"><?php echo $strDescriptionE; ?></textarea>

                        <span class="mandatory">*</span>                  
                    </div>
                </div>
                
                <div class="form-group contentval1 contentActive">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionO">Description Odia </label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>
                        <textarea class="ckeditor" cols="90" id="txtDescriptionO" name="txtDescriptionO" rows="10"><?php echo $strDescriptionO; ?></textarea>
<!-- 
                        <span class="mandatory">*</span>  -->                 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();"/>
                        <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strclick; ?>" />
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