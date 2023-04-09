<?php


include_once 'addInfocusInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">


<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //pageHeader = "Add Highlights";
        strFirstLink = "Manage Application";
        strLastLink = "Infocus";
        loadNavigation('<?php echo $strTab; ?> Infocus');
        indicate = 'yes';
        $('#txtName').focus();
       /* <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 
            
    <?php if($id=='0') {?>
            $('#userImage').hide();
            <?php }?>
            });*/
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
                if (!blankCheck('txtName', 'Name In English can not be left blank'))
                    return false;
                if (!maxLength('txtName', 60, 'Name '))
                    return false;
                   if (!blankCheck('txtNameO', 'Name in Odia can not be left blank'))
                    return false;
                if (!maxLength('txtNameO', 100, 'Name in Odia '))
                    return false;
               if (!blankCheck('vchTitle', 'Title can not be left blank'))
                    return false;
                if (!maxLength('vchTitle', 60, 'Title '))
                    return false;
                 if (!maxLength('vchTitleO', 100, 'TitleO '))
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
                //if (!blankCheck('txtDescription', 'Description can not be left blank'))
                    //return false;
                }
               /* if (!maxLength('txtDescription', 500, 'Description'))
                    return false;
                 if (!blankCheck('txtDate', 'please choose a date'))
            return false;


               var remark       = CKEDITOR.instances['txtDescription'].getData();
                 if(remark=='')
                        {
                                viewAlert('Description in English can not left blank');
                                $('#txtDescription').focus();
                                return false;
                        }
                 
             

             function readImage(input) {

                $('#userImage').show();
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#userImage').attr('src', e.target.result);
                        $('#imgMsg').css('margin-left', '110px');
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
<script type="text/javascript">
 //---- Date picker function
  $(document).ready(function () { 
        
    
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    //--- Date function
    $('.date-picker').datepicker({
         autoclose: true,
         todayHighlight: true,
         startDate:today,
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

<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
            <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> 
            <a href="<?php echo APP_URL; ?>viewInfocus/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
           
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtName">Name in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtName" name="txtName" maxlength="60" placeholder="" class="form-control" value="<?php echo $strName; ?>">
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
                    <label class="col-sm-2 control-label no-padding-right" for="vchImage">Upload Image</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="vchImage" name="vchImage" placeholder="" class="form-control" onChange="readImage(this);">
                        <input type="hidden" name="hdnImage" id="hdnImage" value="<?php echo $strImage; ?>"/>
                      <span class="mandatory">*</span> 
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                        <?php if ($id > 0) { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/Infocus/' . $strImage; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>
                    </div>
                    
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB)</span>
                    </div>
                </div> 





               <!-- <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right" for="txtDate"> Date</label>
                  <div class="col-sm-4"> <span class="colon">:</span>
                    <div class="input-group">
                      <input type="text" data-date-format="dd-mm-yyyy"  id="txtDate" name="txtDate" class="form-control date-picker" value="<?php echo $strDate; ?>" autocomplete="off">
                      <span class="input-group-addon"> <span class="add-on"><i class="fa fa-calendar"></i></span> <a class="add-on" href="javascript:void(0);"></i></a> </span> </div>
                     
                      <span class="mandatory">*</span> 
          </div>
        </div>

         
 -->


                
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


