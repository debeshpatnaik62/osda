<?php
include_once 'addPhilosophyInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //pageHeader = "Add Highlights";
        strFirstLink = "Manage Application";
        strLastLink = "Vision";
        loadNavigation('<?php echo $strTab; ?> Vision');
        indicate = 'yes';
        $('#vchTitle').focus();
      //displayCkeditor('vchDescription');
      //displayCkeditor('vchDescriptionO');

        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php }
          
        if ($id == 0) {
        ?>
                    $('#userImage').hide();
        <?php } else { ?>
                    $('#imgMsg').css('margin-left', '110px');
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
                if (!blankCheck('vchTitle', 'Title can not be left blank'))
                    return false;
                if (!maxLength('vchTitle', 60, 'Title '))
                    return false;
                 if (!maxLength('vchTitleO', 100, 'TitleO '))
                    return false;
                   if (!blankCheck('vchTagline', 'Tagline can not be left blank'))
                    return false;
                if (!maxLength('vchTagline', 100, 'Tagline '))
                    return false;
                 if (!maxLength('vchTaglineO', 200, 'TaglineO '))
                    return false;
                
                  <?php if($id==0){ ?>
            if (!blankCheck('vchImage', 'Please Upload  Image'))
                return false;
            <?php }?>
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
                

                 var remark		= CKEDITOR.instances['vchDescription'].getData();
                 if(remark=='')
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
            }
        
       else
       {
          $('#userImage').hide();
          $('#closeimg').hide();                   
       }
    }
   getNewsCategory('selNewsType','<?php echo $intNewsType;?>');  
         /**
 * This will fix the CKEDITOR not handling the input[type=reset] clicks.
 */
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
            <a href="<?php echo APP_URL; ?>viewPhilosophy/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
           <!--  <a href="<?php echo APP_URL; ?>archievePhilosophy/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
            <a href="<?php echo APP_URL; ?>submited-query/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Submitted Query</a> -->
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
           
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchTitle">Title </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="vchTitle" name="vchTitle" maxlength="60" placeholder="" class="form-control" value="<?php echo $strTitle; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchTitleO">Title In Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="vchTitleO" name="vchTitleO" maxlength="60" placeholder="" class="form-control" value="<?php echo $strTitleO; ?>">
                       
                    </div>
                </div>  



                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchTagline">Tagline</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="vchTagline" name="vchTagline" maxlength="100" placeholder="" class="form-control Tag" value="<?php echo $strTagline; ?>">
                              <span class="mandatory">*</span>
                    </div>
                </div>  



                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="vchTaglineO">Tagline In Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="vchTaglineO" name="vchTaglineO" maxlength="100" placeholder="" class="form-control Tag" value="<?php echo $strTaglineO; ?>">
                             
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
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/Philosophy/' . $strImage; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>

                    </div>

                </div>



                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB . &nbsp;  Recommended Image width = 1110px and height = 556px )</span>

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


