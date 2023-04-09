<?php


include_once 'addCareerInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //pageHeader = "Add Highlights";
        strFirstLink = "Manage Application";
        strLastLink = "Career";
        loadNavigation('<?php echo $strTab; ?> Career');
        indicate = 'yes';
        $('#txtName').focus();
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php }
          
        if ($id == 0) {
        ?>
                    $('#userFile').hide();
        <?php } else { ?>
                    $('#imgMsg').css('margin-left', '110px');
        <?php } ?> 
            
/*
         <?php if($id=='0' || $strImage=='') {?>
                 $('#userFile').hide();
            <?php }?>*/
        $('#closeimg').click(function () {
            if (!confirm('Are you sure to delete selected File'))
                return false;
            $('#hdnImage').val('');
            $('#userImage').hide();
            $(this).hide();
          
        });  

        $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
        });
       
       
 });
            function validator()
            {
                if (!blankCheck('txtCareerName', 'Career name in english cannot be left blank'))
                    return false;
                if (!maxLength('txtCareerName', 200, 'Carrer Name '))
                    return false;
                if (!blankCheck('txtCareerNameO', 'Carrer name in Odia cannot be left blank'))
                    return false;
                if (!maxLength('txtCareerNameO', 500, 'Carrer name in Odia '))
                    return false;
                if (!compareDate('txtOpeningDate','txtClosingDate','End Date','Start Date', 'End Date cannot be less than start date' ))
                    return false;

                <?php if($id==0){ ?>
                if (!blankCheck('strReportFile', 'Please choose a file'))
                    return false;
                <?php }?>
               
                if (!IsCheckFile('strReportFile', 'Invalid file types. Upload only ', 'docx,pdf'))
                return false;
                var fileSize_inKB = Math.round(($("#strReportFile")[0].files[0].size / 1024));
                if (fileSize_inKB > 8192)
                {
                    viewAlert('File size should not be greater than 1MB.');
                    return false;
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
<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
            <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> 
            <a href="<?php echo APP_URL; ?>viewCareer/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
            <a href="<?php echo APP_URL;?>archiveCareer/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
           
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerName">Career Name in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtCareerName" name="txtCareerName" maxlength="200" placeholder="" class="form-control" value="<?php echo $strName; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCareerNameO">Career Name in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtCareerNameO" name="txtCareerNameO" maxlength="500" placeholder="" class="form-control Tag" value="<?php echo $strNameO; ?>">
                              <span class="mandatory">*</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTickerName">Ticker Name in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtTickerName" name="txtTickerName" maxlength="200" placeholder="" class="form-control" value="<?php echo $strTickerName; ?>">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTickerNameO">Ticker Name in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtTickerNameO" name="txtTickerNameO" maxlength="500" placeholder="" class="form-control Tag" value="<?php echo $strTickerNameO; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtExternalLink">External Link</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtExternalLink" name="txtExternalLink" maxlength="200" placeholder="" class="form-control" value="<?php echo $strExternal; ?>">
                    </div>
                </div>  


                <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtOpeningDate">Start Date</label>
                <div class="col-sm-4"> <span class="colon">:</span>
                  <div class="input-group">
                    <input type="text" data-date-format="dd-mm-yyyy" name="txtOpeningDate" id="txtOpeningDate" class="form-control date-picker" value="<?php echo $strOpenDate; ?>">
                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
                  <!-- <span class="mandatory">*</span> --> </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtClosingDate">End Date</label>
                <div class="col-sm-4"> <span class="colon">:</span>
                  <div class="input-group">
                    <input type="text" data-date-format="dd-mm-yyyy" name="txtClosingDate" id="txtClosingDate" class="form-control date-picker" value="<?php echo $strEndDate; ?>">
                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
                  <!-- <span class="mandatory">*</span> --> </div>
              </div>


          

               <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="strReportFile">Career Document</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                      <input type="file" id="strReportFile" name="strReportFile" placeholder="" class="form-control" onChange="readFile(this);">
                      <input type="hidden" name="hdnReportFile" id="hdnReportFile" value="<?php echo $strDocument; ?>"/>
                      <span class="mandatory">*</span>
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                      
                <?php if(($id > 0) && ($strDocument!='')) {
                                   ?>
                     <img id="userFile"  alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL;?>uploadDocuments/Career/<?php echo $strDocument;?>" target="_blank" id="userFile">
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
                 <span class="red">(docx,pdf file only and Max size file Size 1 MB.)</span> </div>

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


