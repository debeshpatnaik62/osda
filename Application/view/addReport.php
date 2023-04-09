<?php
/* ================================================
  File Name             : addReport.php
  Description     : This is used for add Report details.
  Designed By     :
  Designed On     : 
  Devloped By             : Raviteja Peri
  
  Update History          : <Updated by>    <Updated On>    <Remarks>
 
  Style sheet             : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions     : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes      : header.php, navigation.php, util.php, footer.php,addReportInner.php

  ================================================== */

    require 'addReportInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
        $(document).ready(function () {
                        
                pageHeader   = "<?php echo $strTab; ?> Report";
                strFirstLink = "Manage Application";
                strLastLink  = "Report"; 
                
               
                $('#selType').focus();
               
                indicate = 'yes';
              <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                    viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
                <?php } ?>  
            <?php
                   
             if($id==0){
            ?>
                $('#userImage').hide();
                $('#userFile').hide();
        <?php } else {?>
                $('#imgMsg').css('margin-left', '110px');
            <?php }?>
        fillReport('<?php echo $intReportCategoryId; ?>','ddlLocation');
           
            /*       
            TextCounter('txtDescription','lblChar1',500);
            TextCounter('txtDescriptionH','lblChar2',750);   */   
     $('#closeimg').click(function () {
            if (!confirm('Are you sure to delete selected Image'))
                return false;
            $('#hdnReportImage').val('');
            $('#userImage').hide();
            $(this).hide();
          
        });  
  });
              
   
    /* to clear all ckeditor fields on rform reset*/
            function clearEditors(){
                     for (instance in CKEDITOR.instances){
                               CKEDITOR.instances[instance].setData(" ");
                      }
             }
    function validator()
    {
      if(!selectDropdown('ddlLocation', 'Select Category'))
            return false;
              

        if (!blankCheck('txtReportHeadline', 'Headline can not be left blank'))
            return false;
        if (!checkSpecialChar('txtReportHeadline'))
            return false;
        if (!maxLength('txtReportHeadline', 250, 'Headline '))
            return false;
        if (!checkSpecialChar('txtReportHeadlineO'))
            return false;
        if (!maxLength('txtReportHeadlineO', 250, 'Headline In Odia'))
            return false;
      /*if('<?php echo $id;?>'==0){
        if (!blankCheck('strReportImage', 'Please Upload a report image'))
            return false;
      }*/

      /*if ($('#strReportImage').val() != '')
            {*/
                if (!IsCheckFile('strReportImage', 'Invalid file types. Upload only ', 'jpg,jpeg,png'))
                    return false;
                var fileSize_inKB = Math.round(($("#strReportImage")[0].files[0].size / 1024));
                    if (fileSize_inKB > 1024)
                    {
                        alert('File size cannot be more than 1MB.');
                        return false;
                    }
          //  }




          /*if('<?php echo $id;?>'==0){       
          if (!blankCheck('strReportFile', 'please choose a file'))
            return false;
        }*/

     /* if ($('#strReportFile').val() != '')
        {*/
            if (!IsCheckFile('strReportFile', 'Invalid file types. Upload only ', 'docx,pdf'))
                return false;
            var fileSize_inKB = Math.round(($("#strReportFile")[0].files[0].size / 1024));
            if (fileSize_inKB > 20480)
            {
                viewAlert('File size should not be greater than 20MB.');
                return false;
            }
        //}

        if (!blankCheck('strPublishDate', 'please choose a date'))
            return false;

        //if (!blankCheck('txtDescription', 'Description can not be left blank'))
           //return false;
       /*
       if (!blankCheck('txtPublishDate', 'Publish Date can not left blank'))
            return false;*/



       
                        
    }
     function readImage(input) {
           
           $('#userImage').show();
           if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                   $('#userImage').attr('src', e.target.result);
                   //$('#imgMsg').css('margin-left', '210px');
               }

               reader.readAsDataURL(input.files[0]);
           }
       }

       function readFile(input) {

        var found = input.files[0].name.lastIndexOf('.') + 1;
        var extension = (found > 0 ? input.files[0].name.substr(found) : "");

        if(extension!='pdf')
        {
            $('#userFile').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#userFile').attr('src', e.target.result);
                    $('#imgMsg').css('margin-left', '210px');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
       else
       {
          $('#userFile').hide();
          $('#closeimg').hide();                   
       }
    }
      
</script>
<script type="text/javascript">
 //---- Date picker function
  $(document).ready(function () { 
        
    
    var date = new Date();
    //var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    //--- Date function
    $('.date-picker').datepicker({
         autoclose: true,
         todayHighlight: true,
         startDate:0,
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
          <a href="<?php echo APP_URL; ?>viewReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
    <?php include('includes/util.php'); ?>
      <div class="hr hr-solid"></div>
      
        <div class="col-xs-12">
           <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlLocation">Select Category</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlCategory" id="ddlLocation">
                            <option value="0">- Select -</option>  
                           <!--  <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option> -->
                        </select>
                                      
                    </div><span class="red"> *</span> 
                </div>

          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtReportHeadline">Report Headline</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtReportHeadline" name="txtReportHeadline" maxlength="250" placeholder="" class="form-control" value="<?php echo $strReportHeadline; ?>">
              <span class="mandatory">*</span> </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtReportHeadlineO">Report Headline In Odia</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtReportHeadlineO" name="txtReportHeadlineO" maxlength="250" placeholder="" class="form-control" value="<?php echo $strReportHeadlineO; ?>">
              </div>
          </div>
          
          
       

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="strReportImage">Report Image</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="strReportImage" name="strReportImage" placeholder="" class="form-control" onChange="readImage(this);">
                        <input type="hidden" name="hdnReportImage" id="hdnReportImage" value="<?php echo $strReportImage; ?>"/>
                     <!--  <span class="mandatory">*</span>  -->
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                        <?php if (($id > 0) && ($strReportImage!='')){ 
                          ?>
                            <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/Report/' . $strReportImage; ?>">
                        <?php } else { ?>
                            <!-- <img id="userImage" width="120" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" > -->
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>
                    </div>
                    
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                       <span class="red">(jpeg,jpg,png file only and Max size file Size 1 MB)</span>
                    </div>

                </div> 


 

      <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="strReportFile">Report File</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="file" id="strReportFile" name="strReportFile" placeholder="" class="form-control" onChange="readFile(this);">
              <input type="hidden" name="hdnReportFile" id="hdnReportFile" value="<?php echo $strReportFile; ?>"/>
                       <!--  <span class="mandatory">*</span> -->
            </div>
            <div class="help-inline col-xs-12 col-sm-6">
              
        <?php if(($id > 0) && ($strReportFile!='')) {
                           ?>
                 <img id="userFile"  alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL;?>uploadDocuments/Report/<?php echo $strReportFile;?>" target="_blank" id="userFile">
              <?php if($fileExt=='pdf'){?>
              <img src="<?php echo APP_URL;?>img/pdf.png" alt="" width="16" height="16" border="0" align="absmiddle">
              <?php } else{?>
              <img src="<?php echo APP_URL;?>img/wordIcon.jpg" alt="" width="20" height="20" border="0" align="absmiddle">
              <?php }?>
              </a>
             
              
              <?php } else { ?>
                     <img id="userFile" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
              <?php } ?> 
              <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a> </div>

                   
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"></label>
            <div class="col-sm-4">
         <span class="red">(docx,pdf file only and Max size file Size 20 MB.)</span> </div>

          </div>








           <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right" for="txtPublishDate">Publish Date</label>
                  <div class="col-sm-4"> <span class="colon">:</span>
                    <div class="input-group">
                      <input type="text" data-date-format="dd-mm-yyyy"  id="strPublishDate" name="strPublishDate" class="form-control date-picker" value="<?php echo $strPublishDate; ?>" autocomplete="off">
                      <span class="input-group-addon"> <span class="add-on"><i class="fa fa-calendar"></i></span> <a class="add-on" href="javascript:void(0);"></i></a> </span> </div>
                     
                      <span class="mandatory">*</span> 
          </div>
        </div>

        <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description in English</label>
                  <div class="col-sm-10">
                      <span class="colon">:</span>
                      <textarea class="ckeditor form-control" id="txtDescription" name="txtDescription" rows="10" ><?php echo $strDescE; ?></textarea>
                      <span class="mandatory">*</span>
                  </div>
              </div> 
                <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionO">Description in Odia</label>
                  <div class="col-sm-10">
                      <span class="colon">:</span>
                      <textarea class="ckeditor form-control odia"  id="txtDescriptionO" name="txtDescriptionO" rows="10"><?php echo $strDescO; ?></textarea>
                      
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