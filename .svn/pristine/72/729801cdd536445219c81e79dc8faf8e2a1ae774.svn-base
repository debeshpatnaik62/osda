<?php
/* ================================================
  File Name         	  : addLogo.php
  Description		  : This is used for add Logo.
  Designed & Devloped By  : T Ketaki Debadarshini
  Designed & Devloped On  : 17-Nov-2015
  Update History          : <Updated by>		<Updated On>		<Remarks>
  Style sheet             : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions     : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes		  : header.php, navigation.php, util.php, footer.php,addNewsInner.php

  ================================================== */

require 'addLogoInner.php';
?>
       
    <script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
    <script language="javascript" type="text/javascript" >
    $(document).ready(function () {
        loadNavigation('<?php echo $strTab; ?> Logo');
        pageHeader   = "<?php echo $strTab; ?> Logo";
        strFirstLink = "Manage Application";
        strLastLink  = "Manage Logo"; 
        
        indicate = 'yes';
        $('#txtTitle').focus();
<?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>');
<?php }if ($flag == 1 && $id != 0) { ?>
            window.location.href = '<?php echo APP_URL; ?>viewLogo/<?php echo $glId; ?>/<?php echo $plId; ?>';
<?php }  
           if($id==0){
          ?>
            $('#userImage').hide();  $('#userImage1').hide(); $('#userImage2').hide(); $('#userImage3').hide(); $('#userImage4').hide();
        <?php }
           ?>
         });
   </script>
  <script language="javascript" type="text/javascript">
       function validator() {

                if (!blankCheck('txtTitle', 'Title')) {
                    return false;
                }
               
                if (!checkSpecialChar('txtTitle')) {
                    return false;
                }
               
                if (!checkSpecialChar('txtTitleO')) {
                    return false;
                }
                <?php if($id==0){ ?>
                    if (!blankCheck('fileDocument', 'Upload Admin Logo'))
                        return false;
                    if (!blankCheck('fileDocumentH', 'Upload Home Page Logo'))
                        return false;
                   if (!blankCheck('fileDocumentO', 'Upload Home Page Odia Logo'))
                        return false;
                   
                    if (!blankCheck('fileDocumentInner', 'Upload Inner Page Logo'))
                        return false;
                   if (!blankCheck('fileDocumentInnerO', 'Upload Inner Page Odia Logo'))
                        return false;
                    
            <?php }?>

             if ($('#fileDocument').val() != '')
                {
                    if (!IsCheckFile('fileDocument', 'upload a valid filetype', 'gif,jpeg,jpg,jpeg,png'))
                    {
                        return false;
                    }
                    
                    var fileSize_inKB = Math.round(($("#fileDocument")[0].files[0].size / 1024));
                    if (fileSize_inKB > (1024*2))
                    {
                        viewAlert('Admin Logo File size should not be greater than 2 MB.');
                            return false;
                    }
                }
            if ($('#fileDocumentH').val() != '') {
              
                    if (!IsCheckFile('fileDocumentH', 'upload a valid filetype', 'gif,jpeg,jpg,jpeg,png'))
                    {
                        return false;
                    }
                    
                    var fileSize_inKBH = Math.round(($("#fileDocumentH")[0].files[0].size / 1024));
                    if (fileSize_inKBH > (1024*2))
                    {
                        viewAlert('Default Web Logo File size should not be greater than 2 MB.');
                            return false;
                    }
              }
               if ($('#fileDocumentO').val() != '') {
              
                    if (!IsCheckFile('fileDocumentO', 'upload a valid filetype', 'gif,jpeg,jpg,jpeg,png'))
                    {
                        return false;
                    }
                    
                    var fileSize_inKBO = Math.round(($("#fileDocumentO")[0].files[0].size / 1024));
                    if (fileSize_inKBO > (1024*2))
                    {
                        viewAlert('Black Theme Web Logo File size should not be greater than 2 MB.');
                            return false;
                    }
              }
           
          
         }
  </script>            
 
<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <!-- Header Area-->
    <!-- Login Area-->
    <div id="row">
         <div class="col-xs-12">
        <div class="top_tab_container"> 
            <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
            <a href="<?php echo APP_URL; ?>viewLogo/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
        </div>
         <?php include('includes/util.php'); ?>
       <div class="hr hr-solid"></div>
                
        <div class="col-xs-12"> 
               <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTitle">Logo Title</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" name="txtTitle" id="txtTitle" autocomplete="off" class="form-control" onFocus="{
                                      this.className = 'form-control';
                                  }" onBlur="{
                                              this.className = 'form-control';
                                          }" value="<?php echo $strTitle; ?>" maxlength="100" onKeyUp="return blockspecialchar_first(this);"  />
                        <span class="mandatory">*</span>
                    </div>
                </div> 
            <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTitleO">Logo Title in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" name="txtTitleO" id="txtTitleO" autocomplete="off" class="form-control odia"  value="<?php echo $strTitleO; ?>" maxlength="100" onKeyUp="return blockspecialchar_first(this);"  />
                        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="fileDocument">Upload Admin Logo</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="fileDocument" name="fileDocument" placeholder="" class="form-control" onChange="readImage(this,'userImage');">
                        <input type="hidden" id="hdnfileLogo" name="hdnfileLogo" value="<?php echo $strFileName; ?>"/>
                         <span class="mandatory">*</span>
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                       <?php if ($id > 0) { ?>
                        <img id="userImage" src="<?php echo APP_URL . 'uploadDocuments/Logo/' . $strFileName; ?>" alt="<?php echo $strTitle; ?>" width="120" height="65" border="0" align="absmiddle" style="width:217px; height:62px;">
                        
                        <?php } else { ?>
                            <img id="userImage" width="120" height="65"  alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                             
                        <span class="mandatory" id="man">(* Upload only jpg,png,gif files upto 2MB)</span>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="fileDocumentH">Upload Default Web Logo</label>
                        <div class="col-sm-4">
                            <span class="colon">:</span>
                            <input type="file" id="fileDocumentH" name="fileDocumentH" placeholder="" class="form-control" onChange="readImage(this,'userImage1');">
                            <input type="hidden" id="hdnfileLogoH" name="hdnfileLogoH" value="<?php echo $strFileNameH; ?>"/>
                             <span class="mandatory">*</span>
                        </div>
                        <div class="help-inline col-xs-12 col-sm-6">
                           <?php if ($id > 0) { ?>
                            <img id="userImage1"  src="<?php echo APP_URL . 'uploadDocuments/Logo/' . $strFileNameH; ?>" alt="<?php echo $strTitle; ?>" width="120" height="65" border="0" align="absmiddle" style="width:217px; height:62px;">

                            <?php }  else { ?>
                            <img id="userImage1" width="120" height="65"  alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>

                            <span class="mandatory" id="man">(* Upload only jpg,png,gif files upto 2MB)</span>

                        </div>

                    </div>
                   <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="fileDocumentO">Upload Black Theme Web Logo</label>
                        <div class="col-sm-4">
                            <span class="colon">:</span>
                            <input type="file" id="fileDocumentO" name="fileDocumentO" placeholder="" class="form-control" onChange="readImage(this,'userImage2');">
                            <input type="hidden" id="hdnfileLogoO" name="hdnfileLogoO" value="<?php echo $strFileNameO; ?>"/>
                             <span class="mandatory">*</span>
                        </div>
                        <div class="help-inline col-xs-12 col-sm-6">
                           <?php if ($id > 0) { ?>
                            <img id="userImage2"  src="<?php echo APP_URL . 'uploadDocuments/Logo/' . $strFileNameO; ?>" alt="<?php echo $strTitle; ?>" width="120" height="65" border="0" align="absmiddle" style="width:217px; height:62px;">

                            <?php }  else { ?>
                            <img id="userImage2" width="120" height="65"  alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>

                            <span class="mandatory" id="man">(* Upload only jpg,png,gif files upto 2MB)</span>

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
            
       </div>
    </div> 
</div>
        
<script language="javascript" type="text/javascript">
     function readImage(input,imgElement) {
     //alert('rewrwe');
    $('#'+imgElement).show();
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+imgElement).attr('src', e.target.result);
           // $('#imgMsg').css('margin-left', '110px');
        }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>