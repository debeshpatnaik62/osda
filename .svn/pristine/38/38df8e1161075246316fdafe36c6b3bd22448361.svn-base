<?php
/* ================================================
  File Name         	  : addMessagedtls.php
  Description		  : This is used for add Employer Speaks details.
  Designed By		  :
  Designed On		  : 
  Devloped By             : T Ketaki Debadarshini
  Devloped On             : 17-Sept-2016
  Update History	  :	<Updated by>		<Updated On>		<Remarks>
  Style sheet             : 
  Javscript Functions       : ckeditor.js, validatorchklist.js
  includes                  : util.php,addMessagedtlsInner.php			  :

  ================================================== */
require 'addMessagedtlsInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<!-- <script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script> -->
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  Employer Speaks";
        strFirstLink = "Manage Application";
        strLastLink  = " Employer Speaks"; 
        loadNavigation('<?php echo $strTab; ?> Employer Speak');
        
        indicate = 'yes';
        $('#txtHeadlineE').focus();
       
        TextCounter('txtDetailsE','lblChar1',2000);
        TextCounter('txtDetailsO','lblChar2',2500);    

         //fill the districts details
           fillDistricts('<?php echo $intDist; ?>','ddlDist');
        //fill the education details
           fillInstitute('<?php echo $intInst; ?>','ddlInst','<?php echo $intDist; ?>');
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>    
            
    <?php if($id=='0') {?>
            $('#userImage').hide();
            <?php }?>
     });
        function validator()
        {              
            if (!blankCheck('txtHeadlineE', 'Name  can not be left blank'))
                return false;
            if (!checkSpecialChar('txtHeadlineE'))
                return false;
            if (!maxLength('txtHeadlineE', 300, 'Name '))
                return false;  
             if (!checkSpecialChar('txtHeadlineO'))
                return false;

             if (!checkSpecialChar('txtDesignationE'))
                return false;
             if (!checkSpecialChar('txtDesignationO'))
                return false;
             if(!blankCheck('txtOrgE', 'Organization Name can not be left blank'))
                 return false;
             if (!checkSpecialChar('txtOrgE'))
                 return false;
             if (!checkSpecialChar('txtOrgO'))
                 return false;

              <?php if($id==0){ ?>
            if (!blankCheck('fileDocument', 'Please Upload  Image'))
                return false;
            <?php }?>
            if ($('#fileDocument').val() != '')
            {
                if (!IsCheckFile('fileDocument', 'Invalid file types. Upload only ', 'jpg,jpeg,gif'))
                    return false;
                var fileSize_inKB = Math.round(($("#fileDocument")[0].files[0].size / 1024));
                    if (fileSize_inKB > 1024)
                    {
                        viewAlert('File size cannot be more than 1MB.');
                        return false;
                    }
            }
            if (!blankCheck('txtDetailsE', 'Message in English can not be left blank'))
                 return false;
            if (!checkSpecialChar('txtDetailsE'))
                 return false;
            if (!maxLength('txtDetailsE', 2000, 'Message in English'))
                 return false;
            if (!checkSpecialChar('txtDetailsO'))
                 return false;           
            if (!maxLength('txtDetailsO', 2500, 'Message in Odia')) 
                 return false; 

         }
         function readImage(input) {
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
             <a href="<?php echo APP_URL; ?>viewMessagedetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
              <a href="<?php echo APP_URL; ?>archieveMsgdetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a></div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">     
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineE">Name </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtHeadlineE" name="txtHeadlineE" maxlength="80" placeholder="" class="form-control" value="<?php echo $strHeadLineE; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineO">Name in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtHeadlineO" name="txtHeadlineO" maxlength="100" placeholder="" class="form-control odia" value="<?php echo $strHeadLineO; ?>">
                      
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDesignationE">Designation </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtDesignationE" name="txtDesignationE" maxlength="100" placeholder="" class="form-control" value="<?php echo $strDesignationE; ?>">
                       
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDesignationO">Designation in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtDesignationO" name="txtDesignationO" maxlength="200" placeholder="" class="form-control odia" value="<?php echo $strDesignationO; ?>">
                      
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtOrgE">Organization </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtOrgE" name="txtOrgE" maxlength="100" placeholder="" class="form-control" value="<?php echo $strOrgE; ?>">
                       <span class="mandatory">*</span>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtOrgO">Organization in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtOrgO" name="txtOrgO" maxlength="300" placeholder="" class="form-control odia" value="<?php echo $strOrgO; ?>">
                      
                    </div>
                </div> 

                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlDist">Select District</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDist" id="ddlDist" onchange="fillInstitute(0,'ddlInst',this.value);">
                            <option value="0">- Select -</option> 
                            
                        </select>
                         <!-- <span class="mandatory">*</span>   -->           
                    </div>
                </div>

                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlInst">Select Institute</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlInst" id="ddlInst">
                            <option value="0">- Select -</option> 
                           
                        </select>
                         <!-- <span class="mandatory">*</span>          -->    
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
                            <img id="userImage" width="100" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/messageBoard/' . $strFileName; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="100" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>
                    </div>
     
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB . &nbsp;  Recommended Image width = 450px)</span>
                    </div>
                </div> 
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDetailsE">Message in English</label>
                    <div class="col-sm-6">
                        <span class="colon">:</span>
                        <textarea class="form-control" rows="10" id="txtDetailsE" name="txtDetailsE" onKeyUp="return TextCounter('txtDetailsE','lblChar1',2000)" onMouseUp="return TextCounter('txtDetailsE','lblChar1',2000)"><?php echo $strDetailE; ?></textarea>
                        <span class="red">Maximum <span id="lblChar1">2000</span> characters </span> <span class="mandatory">*</span> 
                    </div>
                </div>  
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDetailsO">Message in Odia</label>
                    <div class="col-sm-6">
                        <span class="colon">:</span>
                        <textarea class="form-control odia" rows="10" id="txtDetailsO" name="txtDetailsO" onKeyUp="return TextCounter('txtDetailsO','lblChar2',2500)" onMouseUp="return TextCounter('txtDetailsO','lblChar2',2500)"><?php echo $strDetailO; ?></textarea>
                        <span class="red">Maximum <span id="lblChar2">2500</span> characters </span>
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


