<?php
	/* ================================================
	File Name         	  : addDistrict.php
	Description		  : This is used for add district details
	Designed By		  : 
        Designed On		  : 
        Devloped By		  : T Ketaki Debadarshini
        Devloped On		  : 21-Sept-2016
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
						
	Style sheet               :                               
	Javscript Functions       : validatorchklist.js
	includes                  : util.php, addDistrictInner.php

	==================================================*/
	
        require 'addDistrictInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
        $(document).ready(function () {
               
                pageHeader   = "<?php echo $strTab; ?> District";
                strFirstLink = "Manage Master";
                strLastLink  = "District"; 
                
                $('#txtDistrict').focus();              
                indicate = 'yes';
                
             <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
             <?php }  ?>
        
             TextCounter('txtDescription','lblChar1',500);
             TextCounter('txtDescriptionO','lblChar2',750);
	});
        function validator()
            {
                       
                if (!blankCheck('txtDistrict', 'District Name can not be left blank'))
                    return false;
                if (!checkSpecialChar('txtDistrict'))
                    return false;
                if (!maxLength('txtDistrict',70, 'District'))
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
              <a href="<?php echo APP_URL;?>viewDistrict/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
          </div>
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12">              
              
               
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtDistrict">District Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtDistrict" name="txtDistrict" maxlength="70" placeholder="" class="form-control" value="<?php echo $strDistrict; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtDistrictO">District Name in Odia</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtDistrictO" name="txtDistrictO" maxlength="100" placeholder="" class="form-control odia" value="<?php echo $strDistrictO; ?>">
                  
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

 
