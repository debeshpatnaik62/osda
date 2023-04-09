<?php


include_once 'addTestimonialInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //pageHeader = "Add Highlights";
        strFirstLink = "Manage Skill CMS";
        strLastLink = "Testimonial";
        loadNavigation('<?php echo $strTab; ?> Testimonial');
        indicate = 'yes';
        $('#selNewsType').focus();
       
        <?php if ($outMsg != '') { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 

         <?php if($id=='0' || $strImage=='') {?>
                 $('#userImage').hide();
            <?php }?>
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
                if(!selectDropdown('selNewsType','Select Testimonial Type'))
                    return false;
                if (!blankCheck('txtName', 'Name In English can not be left blank'))
                    return false;
                if (!maxLength('txtName', 100, 'Name '))
                    return false;
                if (!blankCheck('txtNameO', 'Name in Odia can not be left blank'))
                    return false;
                if (!maxLength('txtNameO', 100, 'Name in Odia '))
                    return false;
               if (!blankCheck('txtDesignation', 'Designation can not be left blank'))
                    return false;
                if (!maxLength('txtDesignation', 100, 'Designation '))
                    return false;
                 if (!maxLength('txtDesignationO', 200, 'DesignationO '))
                    return false;

                <?php if($id==0){ ?>
                if (!blankCheck('vchImage', 'Please Upload  Image'))
                    return false;
                <?php }?>
                   
                if ($('#vchImage').val() != '')
                {

                    if (!IsCheckFile('vchImage', 'Invalid file types. Upload only ', 'jpeg,jpg,gif,png'))
                        return false;
                    var fileSize_inKB = Math.round(($("#vchImage")[0].files[0].size / 1024));
                    if (fileSize_inKB > 1024)
                    {
                        viewAlert('File size cannot be more than 1MB.');
                        return false;
                    }
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
            }
        
       else
       {
          $('#userImage').hide();
          $('#closeimg').hide();                   
       }
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
            <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> 
            <a href="<?php echo APP_URL; ?>viewTestimonial/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
           
            <div class="col-xs-12">
                <div class="form-group" id="newsTypeDiv">
                    <label class="col-sm-2 control-label no-padding-right" for="selNewsType">Partner Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selNewsType" id="selNewsType">
                            <option value="0">- Select -</option>
                            <option value="1" <?php if($catId==1)echo 'selected="selected"'; ?>>Skill Competition</option>
                            <option value="2" <?php if($catId==2)echo 'selected="selected"'; ?>>Digitall Skilling</option>
                        </select>
                        <span class="mandatory">*</span>               
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtName">Name in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtName" name="txtName" maxlength="100" placeholder="" class="form-control" value="<?php echo $strName; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtNameO">Name in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtNameO" name="txtNameO" maxlength="100" placeholder="" class="form-control Tag" value="<?php echo $strNameO; ?>">
                              <span class="mandatory">*</span>
                    </div>
                </div>  


                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDesignation">Designation </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtDesignation" name="txtDesignation" maxlength="100" placeholder="" class="form-control" value="<?php echo $strTitle; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDesignationO">Designation In Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtDesignationO" name="txtDesignationO" maxlength="200" placeholder="" class="form-control" value="<?php echo $strTitleO; ?>">
                       
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
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/Testimonial/' . $strImage; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,gif,png file only and Max size file Size 1 MB)</span>
                    </div>
                </div> 
                
                <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description in English</label>
                  <div class="col-sm-10">
                      <span class="colon">:</span>
                      <textarea class="ckeditor form-control" id="txtDescription" name="txtDescription" rows="10" ><?php echo $strDescription; ?></textarea>
                      <!-- <span class="mandatory">*</span> -->
                  </div>
              </div> 
                <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionO">Description in Odia</label>
                  <div class="col-sm-10">
                      <span class="colon">:</span>
                      <textarea class="ckeditor form-control odia"  id="txtDescriptionO" name="txtDescriptionO" rows="10"><?php echo $strDescriptionO; ?></textarea>
                      
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


