<?php
/* ================================================
  File Name         	  : addSector.php
  Description		  : This is used for add sector details.
  Designed By		  :
  Designed On		  : 
  Devloped By             : T Ketaki Debadarshini
  Devloped On             : 22-March-2017
  Update History	  :	<Updated by>		<Updated On>		<Remarks>
  Style sheet             : 
  Javscript Functions       : validatorchklist.js
  includes                  : util.php,addSectorInner.php			  :

  ================================================== */

    require 'addSectorInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  Sector";
        strFirstLink = "Manage Application";
        strLastLink  = " Manage Sector"; 
        loadNavigation('<?php echo $strTab; ?> Sector');
        
        indicate = 'yes';
        $('#txtHeadlineE').focus();
       
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>    
            
    <?php if($id=='0') {?>
            $('#userImage').hide();
            <?php }?>
        
       fillMappingSector('<?php echo $strMappingCOde;?>','ddlMappingData','NIC');
                
          TextCounter('txtDescription','lblChar1',500);
          TextCounter('txtDescriptionO','lblChar2',750);       
     });
        function validator()
        {              
            if (!blankCheck('txtHeadlineE', 'Sector Name can not be left blank'))
                return false;
            if (!checkSpecialChar('txtHeadlineE'))
                return false;
            if (!maxLength('txtHeadlineE', 80, 'Sector Name '))
                return false;
            
            if (!blankCheck('txtAlias', 'Sector Alias can not be left blank'))
                return false;
            if (!checkSpecialChar('txtAlias'))
                return false;
            if (!maxLength('txtAlias', 80, 'Sector Alias '))
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

              if (!maxLength('txtDescription', 500,'Description'))
                    return false;
              if (!checkSpecialChar('txtDescription'))
                return false;
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
            <a href="<?php echo APP_URL; ?>viewSector/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineE">Sector Name </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtHeadlineE" onkeyup="convertToSlug(this.value, 'txtAlias');" name="txtHeadlineE" maxlength="80" placeholder="" class="form-control" value="<?php echo $strHeadLineE; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineO">Sector Name in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtHeadlineO"  name="txtHeadlineO" maxlength="100" placeholder="" class="form-control odia" value="<?php echo $strHeadLineO; ?>">
                      
                    </div>
                </div> 
               <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtAlias">Sector Alias </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtAlias" onchange="convertToSlug(this.value, 'txtAlias');" name="txtAlias" maxlength="80" placeholder="" class="form-control" value="<?php echo $strAlias; ?>">
                        <span class="mandatory">*</span>
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
                            <img id="userImage" width="100" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/sector/' . $strFileName; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="100" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>
                    </div>
     
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB . &nbsp;  Recommended Image width = 70px and height = 70px )</span>
                    </div>
                </div> 

                <!--Modified On 11-June-2019 BY Ashis kumar Patra to add Mapping Id with NIC-->

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlMappingData">Map Sector</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlMappingData" id="ddlMappingData" >
                            <option value="0">- Select -</option> 
                            
                        </select>
                    </div>
                </div> 
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtDescription" name="txtDescription" style="height:100px;" onKeyUp="return TextCounter('txtDescription','lblChar1',500)" onMouseUp="return TextCounter('txtDescription','lblChar1',500)"><?php echo $strDescription;?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span>
                        
                    </div>
                </div> 	 
               <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionO">Description in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control odia" id="txtDescriptionO" name="txtDescriptionO" style="height:100px;" onKeyUp="return TextCounter('txtDescriptionO','lblChar2',750)" onMouseUp="return TextCounter('txtDescriptionO','lblChar2',750)" ><?php echo $strDescriptionO;?></textarea>
                       <span class="red">Maximum <span id="lblChar2">750</span> characters </span>
                        
                    </div>
                </div>
                <div class="form-group">
                   <label class="col-sm-2 control-label no-padding-right" for="radStatus">Publish Status</label>
                   <div class="col-sm-8">
                   <span class="colon">:</span>
                    <div class="radio">
                       <label>
                           <input type="radio" name="radStatus" id="radStatus" class="ace" value="2" <?php if ($intStatus == 2) { ?>checked="checked" <?php } ?>/>
                           <span class="lbl"> Active</span>
                       </label>
                       <label>
                          <input type="radio" name="radStatus" id="radStatus" class="ace" value="1" <?php if ($intStatus == 1) { ?>checked="checked" <?php } ?>/>
                           <span class="lbl"> Inactive</span>
                       </label>

                   </div>
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


