<?php
/* ================================================
        File Name             : addNanoUnicorn.php
        Description	      : This is used add Nano Unicorn Details.
        Author Name           : Ashis kumar Patra
        Date Created          : 15-Feb-2019
        Devloped On           : 15-Feb-2019
        Devloped By           : Ashis kumar Patra
        Update History	      : <Updated by>		<Updated On>		<Remarks>

        Style sheet           : 
        Javscript Functions   : loadAjax.js,validatorchklist.js,ckeditor.js
        includes              : header.php, util.php, addNanoUnicornInner.php
 ==================================================*/
include_once 'addNanoUnicornInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //pageHeader = "Add Highlights";
        strFirstLink = "Manage Application";
        strLastLink = "Nano Unicorn";
        loadNavigation('<?php echo $strTab; ?> Nano Unicorn');
        indicate = 'yes';
        $('#vchTitle').focus();

<?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc; ?>');
<?php
}

if ($id == 0) {
    ?>
            $('#userImage').hide();
<?php } else { ?>
            $('#imgMsg').css('margin-left', '110px');
<?php } ?>



<?php if ($id == '0' || $strImage == '') { ?>
            $('#userImage').hide();
<?php } ?>
        $('#closeimg').click(function () {
            if (!confirm('Are you sure to delete selected File'))
                return false;
            $('#hdnImage').val('');
            $('#userImage').hide();
            $(this).hide();

        });


    });
    function validator()
    {
        if (!blankCheck('vchTitle', 'Title can not be left blank'))
            return false;
        if (!maxLength('vchTitle', 100, 'Title '))
            return false;
        if (!maxLength('vchTitleO', 180, 'TitleO '))
            return false;
/*<?php if ($id == 0) { ?>
            if (!blankCheck('vchImage', 'Please Upload  Image'))
                return false;
<?php } ?>*/
        if ($('#vchImage').val() != '')
        {

            if (!IsCheckFile('vchImage', 'Invalid file types. Upload only ', 'jpeg,jpg,gif'))
                return false;
            var fileSize_inKB = Math.round(($("#vchImage")[0].files[0].size / 1024));
            if (fileSize_inKB > 1024)
            {
                viewAlert('File size cannot be more than 1MB.');
                return false;
            }
        }

        /*if ($('#vchAudio').val() != '')
        {

            if (!IsCheckFile('vchAudio', 'Invalid file types. Upload only ', 'mp3.mpeg'))
                return false;
            var fileSize_inKB = Math.round(($("#vchAudio")[0].files[0].size / 10240));
            if (fileSize_inKB > 10240)
            {
                viewAlert('File size cannot be more than 10MB.');
                return false;
            }
        }*/


        var remark = CKEDITOR.instances['vchDescription'].getData();
        if (remark == '')
        {
            viewAlert('Description in English can not left blank');
            $('#vchDescription').focus();
            return false;
        }

    }




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
        } else
        {
            $('#userImage').hide();
            $('#closeimg').hide();
        }
    }
    getNewsCategory('selNewsType', '<?php echo $intNewsType; ?>');
    /**
     * This will fix the CKEDITOR not handling the input[type=reset] clicks.
     */
    $(function () {
        if (typeof CKEDITOR != 'undefined') {
            $('form').on('reset', function (e) {
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
<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
                <a href="<?php echo APP_URL; ?>viewNanoUnicorn/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
                <a href="<?php echo APP_URL; ?>viewNanoUnicornDetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Applicants</a>
            </div>
<?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchTitle">Name </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="vchTitle" name="vchTitle" maxlength="60" placeholder="" class="form-control" value="<?php echo $strTitle; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchTitleO">Name In Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="vchTitleO" name="vchTitleO" maxlength="60" placeholder="" class="form-control" value="<?php echo $strTitleO; ?>">

                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchImage">Upload Image</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="vchImage" name="vchImage" placeholder="" class="form-control" onChange="readImage(this);">
                        <input type="hidden" name="hdnImage" id="hdnImage" value="<?php echo $strImage; ?>"/>
                        <span class="mandatory">*</span>
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                        <?php if ($id > 0) { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/NanoUnicorn/' . $strImage; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
<?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>

                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                        <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB . &nbsp;  Recommended Image width = 400px and height = 220px )</span>

                    </div>

                </div> 


                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchAudio">Upload Audio</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="vchAudio" name="vchAudio" placeholder="" class="form-control" onChange="readImage(this);">
                        <input type="hidden" name="hdnAudio" id="hdnAudio" value="<?php echo $strAudio; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                        <span class="red">(mp3,mpeg file only and Max size file Size 10 MB .)</span>

                    </div>

                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchDescription">Description in English</label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>
                        <textarea class="ckeditor form-control" id="vchDescription" name="vchDescription" rows="10" ><?php echo $strDescription; ?></textarea>
                        <span class="mandatory">*</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchDescriptionO">Description in Odia</label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>
                        <textarea class="ckeditor form-control odia"  id="vchDescriptionO" name="vchDescriptionO" rows="10"><?php echo $strDescriptionO; ?></textarea>

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


