<?php
/* ================================================
  File Name                 : addStory.php
  Description               : This is used for add success story details.
  Designed By               :
  Designed On               :
  Developed By		    : T Ketaki Debadarshini
  Developed On		    : 17-Sep-2016
  Update History            :	<Updated by>		<Updated On>		<Remarks>

  Style sheet               : 
  Javscript Functions       : ckeditor.js, validatorchklist.js
  includes                  : util.php,addStoryInner.php			  :

  ================================================== */
require("addStoryInner.php");
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('<?php echo $strTab; ?> Success Story');
        pageHeader   = "<?php echo $strTab; ?> Success Story";
        strFirstLink = "Manage Institutions";
        strLastLink  = "Success Stories";
        
        $('#txtName').focus();

//        displayCkeditor('txtDetailsE');
//        displayCkeditor('txtDetailsO');
        indicate = 'yes';
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } 
        if ($id == 0) {
        ?>
                    $('#userImage').hide();
        <?php } else { ?>
                    $('#imgMsg').css('margin-left', '110px');
        <?php } ?>
            
         //fill the districts details
        fillDistricts('<?php echo $intDistrictId; ?>','ddlDistrict');
        //fill the education details
        fillInstitute('<?php echo $intInstituteId; ?>','ddlInstitute','<?php echo $intDistrictId; ?>');    
            
        TextCounter('txtSnippet','lblChar1',500);
        TextCounter('txtSnippetO','lblChar2',750);    

   });
        function validator()
        {

            if (!blankCheck('txtName', 'Name can not be left blank'))
                return false;
            if (!checkSpecialChar('txtName'))
                return false;
            if (!maxLength('txtName', 100, 'Name'))
                return false;
            
             if (!blankCheck('txtNameAlias', 'Alias can not be left blank'))
                return false;
            if (!checkSpecialChar('txtNameAlias'))
                return false;
            if (!maxLength('txtNameAlias', 70, 'Alias '))
                return false;

            if (!blankCheck('txtPlace', 'Place can not be left blank'))
                return false;
            if (!checkSpecialChar('txtPlace'))
                return false;

             if(!selectDropdown('ddlDistrict', 'Select Institute District'))
             return false;  
         
            if(!selectDropdown('ddlInstitute', 'Select Training Institute'))
             return false;  
         
            if (!blankCheck('txtDesignation', 'Designation can not be left blank'))
                return false;
            if (!checkSpecialChar('txtDesignation'))
                return false;
            if (!blankCheck('txtEmployer', 'Employer can not be left blank'))
                return false;
            if (!checkSpecialChar('txtEmployer'))
                return false;

        <?php if ($id == 0) { ?>
                if (!blankCheck('fileDocument', 'Please Upload Image'))
                    return false;
        <?php } ?>
            if ($('#fileDocument').val() != '')
            {

                if (!IsCheckFile('fileDocument', 'Invalid file types. Upload only ', 'jpeg,jpg,gif,png'))
                    return false;
                var fileSize_inKB = Math.round(($("#fileDocument")[0].files[0].size / 1024));
                if (fileSize_inKB > 1024)
                {
                    viewAlert('File size cannot be more than 1MB.');
                    return false;
                }
            }

            if (!blankCheck('txtSnippet', 'Snippet can not be left blank'))
                return false;
            if (!checkSpecialChar('txtSnippet'))
                return false;
            if (!maxLength('txtSnippet', 500, 'Snippet'))
                return false;


        }
      
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

<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
                <a href="<?php echo APP_URL; ?>viewStories/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
                <a href="<?php echo APP_URL ?>archiveStory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a> 
                <a href="<?php echo APP_URL; ?>share-your-story/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Shared Story</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtName">Name </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtName" name="txtName" onkeyup="convertToSlug(this.value, 'txtNameAlias');" placeholder="" class="form-control" maxlength="70" value="<?php echo $strName; ?>">
                        <span class="mandatory">*</span> </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtNameO">Name in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtNameO" name="txtNameO" placeholder="" class="form-control odia" maxlength="100" value="<?php echo $strNameO; ?>">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtNameAlias">Page Alias </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtNameAlias" name="txtNameAlias" placeholder="" class="form-control" maxlength="70" value="<?php echo $strNameAlias; ?>">
                        <span class="mandatory">*</span> </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtPlace">Place </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtPlace" name="txtPlace" placeholder="" class="form-control" maxlength="70" value="<?php echo $strPlace; ?>">
                        <span class="mandatory">*</span> </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtPlaceO">Place in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtPlaceO" name="txtPlaceO" placeholder="" class="form-control odia" maxlength="100" value="<?php echo $strPlaceO; ?>">
                    </div>
                </div>
                
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlDistrict">Select Institute District</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDistrict" id="ddlDistrict" onchange="fillInstitute(0,'ddlInstitute',this.value);">
                            <option value="0">- Select -</option> 
                            
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlInstitute">Select Training Institute </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlInstitute" id="ddlInstitute">
                            <option value="0">- Select -</option> 
                           
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDesignation">Designation </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtDesignation" name="txtDesignation" placeholder="" class="form-control" maxlength="70" value="<?php echo $strDesignation; ?>">
                        <span class="mandatory">*</span> </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDesignationO">Designation in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtDesignationO" name="txtDesignationO" placeholder="" class="form-control odia" maxlength="100" value="<?php echo $strDesignationO; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtEmployer">Employer </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtEmployer" name="txtEmployer" placeholder="" class="form-control" maxlength="70" value="<?php echo $strEmployer; ?>">
                        <span class="mandatory">*</span> </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtEmployerO">Employer in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtEmployerO" name="txtEmployerO" placeholder="" class="form-control odia" maxlength="100" value="<?php echo $strEmployerO; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="fileDocument">Upload Image</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="fileDocument" name="fileDocument" placeholder="" class="form-control" onChange="readImage(this);">
                        <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strFileName; ?>"/>
                        <span class="mandatory">*</span>
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                        <?php if ($id > 0) { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/successStory/' . $strFileName; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,png,gif file only and Max size file Size 1 MB . &nbsp;  Recommended Image width = 820px and height = 470px )</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippet">Snippet</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtSnippet" rows="3" name="txtSnippet" onKeyUp="return TextCounter('txtSnippet','lblChar1',500)" onMouseUp="return TextCounter('txtSnippet','lblChar1',500)" placeholder="" class="form-control"><?php echo $strSnippet; ?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span> <span class="mandatory">*</span> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippetO">Snippet in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtSnippetO" onKeyUp="return TextCounter('txtSnippetO','lblChar2',750)" onMouseUp="return TextCounter('txtSnippetO','lblChar2',750)" rows="3" name="txtSnippetO" placeholder="" class="form-control odia" ><?php echo $strSnippetO; ?></textarea>
                        <span class="red">Maximum <span id="lblChar2">750</span> characters </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDetailsE">Description </label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>
                        <textarea class="ckeditor form-control" id="txtDetailsE" name="txtDetailsE" rows="10"><?php echo $strDescription; ?></textarea>

                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDetailsO">Description in Odia</label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>
                        <textarea class="ckeditor form-control" id="txtDetailsO" name="txtDetailsO" rows="10"><?php echo $strDescriptionO; ?></textarea>

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

