<?php
/* ================================================
  File Name         	  : addSkillNews.php
  Description		        : This is used for add skill related news details.
  Designed By		        :
  Designed On		        : 
  Devloped By             : Rahul Kumar Saw
  Devloped On             : 25-July-2022
  Update History          : <Updated by>		<Updated On>		<Remarks>
 
  Style sheet             : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions     : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes		  : header.php, navigation.php, util.php, footer.php,addNewsInner.php

  ================================================== */

    require 'addSkillPartnerInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        strFirstLink = "Manage Skill CMS";
        strLastLink = "Partner Information";
        loadNavigation('<?php echo $strTab; ?> Partner Information');
        indicate = 'yes';
        $('#selNewsType').focus();
		
    <?php if ($outMsg != '') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
    <?php } ?>  
        
    <?php if($id=='0' || $strFileName=='') {?>
                 $('#userImage').hide();
            <?php }?>
        $('#closeimg').click(function () {
            if (!confirm('Are you sure to delete selected File'))
                return false;
            $('#hdnImageFile').val('');
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
        if(!selectDropdown('selNewsType','Select Partner Type'))
            return false;
        
         if (!blankCheck('txtHeadlineE', 'Headline  can not left blank'))
            return false;
        if (!checkSpecialChar('txtHeadlineE'))
            return false;
        if (!maxLength('txtHeadlineE', 250, 'Headline '))
            return false;
        <?php if($id==0){ ?>
          if (!blankCheck('fileDocument', 'Please Upload  Image'))
              return false;
        <?php }?>
        if ($('#fileDocument').val() != '')
        {
            if (!IsCheckFile('fileDocument', 'Invalid file types. Upload only ', 'jpg,jpeg,png'))
                return false;
            var fileSize_inKB = Math.round(($("#fileDocument")[0].files[0].size / 1024));
            if (fileSize_inKB > 1024)
            {
                viewAlert('File size should not be greater than 1MB.');
                return false;
            }
        }   
                           
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
</script>
<div class="page-content">
  <div class="page-header">
    <h1 id="title"></h1>
  </div>
  <div class="row">
    <div class="col-xs-12"> 
      <!-- PAGE CONTENT BEGINS -->
      <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> 
          <a href="<?php echo APP_URL; ?>viewSkillPartner/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
      <?php include('includes/util.php'); ?>
      <div class="hr hr-solid"></div>
      
        <div class="col-xs-12">
                <div class="form-group" id="newsTypeDiv">
                    <label class="col-sm-2 control-label no-padding-right" for="selNewsType">Partner Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selNewsType" id="selNewsType">
                            <option value="0">- Select -</option>
                            <option value="1" <?php if($intNewsType==1)echo 'selected="selected"'; ?>>Skill Competition</option>
                            <option value="2" <?php if($intNewsType==2)echo 'selected="selected"'; ?>>Digitall Skilling</option>
                        </select>
                        <span class="mandatory">*</span>               
                    </div>
                </div>
            
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineE">Name</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtHeadlineE" name="txtHeadlineE" maxlength="250" placeholder="" class="form-control" value="<?php echo $strHeadLineE; ?>">
              <span class="mandatory">*</span> </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineH">Name in Odia</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtHeadlineH" name="txtHeadlineH" maxlength="300" placeholder="" class="form-control odia" value="<?php echo $strHeadLineH; ?>">
            </div>
          </div>
          
        
          <div class="form-group ">
            <label class="col-sm-2 control-label no-padding-right" for="txtSource"> Url</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtSource" name="txtSource" maxlength="250" placeholder="" class="form-control" value="<?php echo $strSource; ?>">
            </div>
          </div>
            
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right sourceLabel3" for="fileDocument">Partner Photo</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="file" id="fileDocument" name="fileDocument" placeholder="" class="form-control" onChange="readImage(this);">
              <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strFileName; ?>"/>
              <span class="mandatory">*</span> 
            </div>
            <div class="help-inline col-xs-12 col-sm-6">
              
			  <?php if (($id > 0) && ($strFileName!='')) { 
                              if($fileExt!='pdf')
                               {
                            ?>
                            
              <img id="userImage" width="80" height="70" alt="" class="mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/Partner/' . $strFileName; ?>">
              
              <?php 
                                }else {
                              ?>
              <a href="<?php echo APP_URL;?>uploadDocuments/Partner/<?php echo $row['vchImageFile'];?>" target="_blank" id="userImage">
              <?php if($fileExt=='pdf'){?>
              <img src="<?php echo APP_URL;?>img/pdf.png" alt="" width="16" height="16" border="0" align="absmiddle">
              <?php } else{?>
              <img src="<?php echo APP_URL;?>img/wordIcon.jpg" alt="" width="20" height="20" border="0" align="absmiddle">
              <?php }?>
              </a>
              <?php 
                                }
                            ?>
              &nbsp;<span class="close-btn"><img src="<?php echo APP_URL;?>img/close-btn.png" width="16" height="16" alt="Close" id="closeimg" style="cursor: pointer;"></span>
              <?php } else { ?>
              <img id="userImage" width="200" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
              <?php } ?>
              <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a> </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"></label>
            <div class="col-sm-8"> <span class="red">(jpg,jpeg,png file only and Max size file Size 1 MB.)</span> </div>
          </div>
         
          
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtDetailsE">Details in English </label>
            <div class="col-sm-10"> <span class="colon">:</span>
              <textarea class="ckeditor form-control" id="txtDetailsE" name="txtDetailsE" rows="10"><?php echo $strDetailE; ?></textarea>
              <span class="mandatory">*</span> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtDetailsO">Details in Odia</label>
            <div class="col-sm-10"> <span class="colon">:</span>
              <textarea class="ckeditor form-control" id="txtDetailsH" name="txtDetailsH" rows="10"><?php echo $strDetailH; ?></textarea>
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
