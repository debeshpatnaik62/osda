<?php
	/* ================================================
	File Name         	  : addBlock.php
	Description		  : This is used for add block details
	Designed By		  : 
        Designed On		  : 
        Devloped By		  : T Ketaki Debadarshini
        Devloped On		  : 21-Sept-2016
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
						
	Style sheet               :                               
	Javscript Functions       : validatorchklist.js
	includes                  : util.php, addBlockInner.php

	==================================================*/
	
        require 'addBlockInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
        $(document).ready(function () {
               
                pageHeader   = "<?php echo $strTab; ?> Block";
                strFirstLink = "Manage Master";
                strLastLink  = "Block"; 
                
                $('#ddlDistrict').focus();              
                indicate = 'yes';
                
             <?php if($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
             <?php }  ?>
        
             TextCounter('txtDescription','lblChar1',500);
             TextCounter('txtDescriptionO','lblChar2',750);
             
             fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
               
	});
        function validator()
            {
                if(!selectDropdown('ddlDistrict', 'Select District'))
                    return false;        
                if (!blankCheck('txtBlock', 'Block Name can not be left blank'))
                    return false;
                if (!checkSpecialChar('txtBlock'))
                    return false;
                if (!maxLength('txtBlock',70, 'Block'))
                    return false;                
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
          <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> 
              <a href="<?php echo APP_URL;?>viewBlock/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
          </div>
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12">              
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlDistrict">Select District</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDistrict" id="ddlDistrict">
                            <option value="0">-- Select --</option>  
                        </select>  
                        <span class="mandatory"> *</span> 
                    </div> 
                </div>
               
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtBlock">Block Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtBlock" name="txtBlock" maxlength="70" placeholder="" class="form-control" value="<?php echo $strBlock; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtBlockO">Block Name in Odia</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtBlockO" name="txtBlockO" maxlength="100" placeholder="" class="form-control odia" value="<?php echo $strBlockO; ?>">
                 
                </div>
              </div>
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtDescription" name="txtDescription" style="height:100px;"  onKeyUp="return TextCounter('txtDescription','lblChar1',500)" onMouseUp="return TextCounter('txtDescription','lblChar1',500)"><?php echo $strDescription;?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span>
                        
                    </div>
                </div> 	  
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionO">Description in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control odia" id="txtDescriptionO" name="txtDescriptionO" style="height:100px;"  onKeyUp="return TextCounter('txtDescriptionO','lblChar2',750)" onMouseUp="return TextCounter('txtDescriptionO','lblChar2',750)"><?php echo $strDescriptionO;?></textarea>
                        <span class="red">Maximum <span id="lblChar2">750</span> characters </span>
                        
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

 
