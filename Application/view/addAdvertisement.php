<?php
/* ================================================
  File Name         	  : addAdvertisement.php
  Description		  : This is used for add Advertisement details.
  Designed By		  :
  Designed On		  : 
  Devloped By             : T Ketaki Debadarshini 
  Devloped On             : 24-Jan-2018 
  Update History          : <Updated by>		<Updated On>		<Remarks>
 
  Style sheet             : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions     : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes		  : header.php, navigation.php, util.php, footer.php,addAdvertisementInner.php

  ================================================== */

    require 'addAdvertisementInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
          pageHeader   = "<?php echo $strTab; ?> Advertisement";
        strFirstLink = "Manage Advertisement";
        strLastLink  = "Add Advertisement";
        
        loadNavigation('<?php echo $strTab; ?> Advertisement');
        indicate = 'yes';
        $('#txtHeadlineE').focus();
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        });
       
		
    <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
    <?php } ?>  
        
    <?php if($intAdvtId=='0' || $strlargeImage=='') {?>
                 $('#userImage').hide();
            <?php }?>
        
        displaySection('<?php echo $intType; ?>');      
   });
    
    function validator()
    {
        
        if (!blankCheck('txtFrmDate', 'From date can not be left blank.'))
            return false;

        if (!blankCheck('txtToDate', 'To date can not be left blank.'))
            return false;
        
       
        if (!compareDate('txtFrmDate', 'txtToDate', 'From Date ', 'To Date ',''))
            return false;

        if (!blankCheck('txtDuration', 'Duration can not be left blank.'))
            return false;

        if (!checkSpecialChar('txtDuration'))
            return false;

        if (!maxLength('txtDuration', 'Duration ', 5))
            return false;


         var linkType = $('input:radio[name=radType]:checked').val()

         if (linkType == 1) {
            if ('<?php echo $intAdvtId; ?>' == '' || '<?php echo $strlargeImage; ?>' == '')
            {
                if (!blankCheck('fileDocument', 'Image can not be left blank.'))
                    return false;


            }
            if (!IsCheckFile('fileDocument', 'Invalid file types. Upload only ', 'gif,jpeg,jpg'))
                    return false;

                var fileSize_inKB = Math.round(($("#fileDocument")[0].files[0].size/1024));


                if (fileSize_inKB > 1024)
                {
                    viewAlert('File size should not be greater than 1MB.','fileDocument');
                    return false;
                }
        }else if (linkType == 2) {

           if('<?php echo $intAdvtId; ?>' == '' || '<?php echo $strlargeImage; ?>' == '')
            {
                if (!blankCheck('filevideo', 'Video can not be left blank.'))
                    return false;
            }
            if(!IsCheckFile('filevideo', 'Invalid file types. Upload only ','mp4'))			
             {
                $("#filevideo").focus();
                return false;
             }
            var videoSize_inKB = Math.round(($("#filevideo")[0].files[0].size / 1024));

           // console.log(videoSize_inKB);
            if (videoSize_inKB > (1024*3))
            {
                viewAlert('File size should not be greater than 3MB.','filevideo');
                return false;
            }
            
            
        }  
        
         if (!validURL('txtSource', 'Please enter a valid Link Url'))
                return false;


    }
    function readImage(input) {

        var found = input.files[0].name.lastIndexOf('.') + 1;
        var extension = (found > 0 ? input.files[0].name.substr(found) : "");

        if(extension!='pdf')
        {
            $('#userImage').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#userImage').attr('src', e.target.result);
                    $('#imgMsg').css('margin-left', '210px');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
       else
       {
          $('#userImage').hide();
          $('#closeimg').hide();                   
       }
    }
    function displaySection(intType){
                
            if(intType==1){
                $('.divVideo').hide(); 
                $('.divImage').show(); 
            }else{
                $('.divVideo').show(); 
                $('.divImage').hide(); 
            }
        }      
</script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<div class="page-content">
  <div class="page-header">
    <h1 id="title"></h1>
  </div>
  <div class="row">
    <div class="col-xs-12"> 
      <!-- PAGE CONTENT BEGINS -->
      <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> 
          <a href="<?php echo APP_URL; ?>viewAdvertisement/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
 
      <?php include('includes/util.php'); ?>
      <div class="hr hr-solid"></div>
      
        <div class="col-xs-12">
            
          <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="radWinStatus">Advt. Type</label>
                <div class="col-sm-4">
                    <span class="colon">:</span>
                    <div class="radio">
                        <label>
                            <input name="radType" type="radio" class="ace" onclick="displaySection(1);" value="1" <?php if($intType==1){ echo 'checked="checked"'; } ?>>
                            <span class="lbl"> Image</span>
                        </label>
                        <label>
                            <input name="radType" type="radio" class="ace" onclick="displaySection(2);" value="2" <?php if($intType==2){ echo 'checked="checked"'; } ?>>
                            <span class="lbl"> Video</span>
                        </label>
                    </div>
                </div>
            </div> 
            
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtFrmDate">From Date</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <div class="input-group">
                  <input type="text" data-date-format="dd-mm-yyyy" name="txtFrmDate" id="txtFrmDate" readonly="true" class="form-control date-picker" value="<?php echo $strFromdate; ?>">
                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
              <span class="mandatory">*</span> </div>
          </div>
            
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtToDate">To Date</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <div class="input-group">
                  <input type="text" data-date-format="dd-mm-yyyy" name="txtToDate" id="txtToDate" readonly="true" class="form-control date-picker" value="<?php echo $strToDate; ?>">
                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
              <span class="mandatory">*</span> </div>
          </div>  

          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtDuration">Duration (in Second)</label>
            <div class="col-sm-4"> <span class="colon">:</span>
                <input type="text" id="txtDuration" name="txtDuration"  maxlength="5"  onkeyup="return isNumberKey(event);" onkeypress="return isNumberKey(event);"  placeholder="" class="form-control" value="<?php echo $txtDuration; ?>">
              <span class="mandatory">*</span> </div>
          </div>
            
         
          
          <div class="form-group divImage" >
            <label class="col-sm-2 control-label no-padding-right" for="fileDocument">Upload Image</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="file" id="fileDocument" name="fileDocument" placeholder="" class="form-control" onChange="readImage(this);">
              <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strlargeImage; ?>"/>
                                      <span class="mandatory">*</span> 
            </div>
            <div class="help-inline col-xs-12 col-sm-6">
              
            <?php if (($intAdvtId > 0) && ($strlargeImage!='')) { 

              ?>
                            
                <img id="userImage" width="80" height="70" alt="" class="mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/mobAds/image/' . $strlargeImage; ?>">
              
             
             
              &nbsp;<span class="close-btn"><img src="<?php echo APP_URL;?>img/close-btn.png" width="16" height="16" alt="Close" id="closeimg" style="cursor: pointer;"></span>
              <?php } else { ?>
              <img id="userImage" width="200" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
              <?php } ?>
              </div>
          </div>
          <div class="form-group divImage">
            <label class="col-sm-2 control-label no-padding-right"></label>
            <div class="col-sm-8"> <span class="red">(Only gif,jpeg,jpg Files upto 1 MB)</span> </div>
          </div>
            
             <div class="form-group divVideo" >
                <label class="col-sm-2 control-label no-padding-right" for="filevideo"> Upload Video</label>
                <div class="col-sm-4"> <span class="colon">:</span>
                    <input type="file"  id="filevideo" name="filevideo" class="form-control" />
                    <input type="hidden" name="hdnvideoFile" id="hdnvideoFile" value="<?php echo $strlargeImage; ?>"/>
            
                   <span class="mandatory">*</span>
                  </div>
                
                    <div class="help-inline col-xs-12 col-sm-6">
              
                        <?php if (($intAdvtId > 0) && $intType == 2) { 

                          ?>

                            <a href="<?php echo APP_URL; ?>uploadDocuments/mobAds/video/<?php echo $strlargeImage ?>" target="_blank"> <i class="fa fa-2x fa-video-camera"></i> </a>
                          <?php } ?>
            
                    </div>
            </div>
             <div class="form-group divVideo">
            <label class="col-sm-2 control-label no-padding-right"></label>
            <div class="col-sm-8"> <span class="red">&nbsp; (mp4 files upto 3 MB only)</span> </div>
          </div>
            
          
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtSource">Page Link Url</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtSource" name="txtSource" maxlength="100" placeholder="" class="form-control" value="<?php echo $strSource; ?>">
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
