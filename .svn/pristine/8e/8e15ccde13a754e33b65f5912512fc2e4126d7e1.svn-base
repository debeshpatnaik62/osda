<?php
	/* ================================================
	File Name       : addPanel.php
	Description		  : This is used for add panel name
	Designed By		  : 
  Designed On		  : 
  Devloped By		  : Rahul Kumar Saw
  Devloped On		  : 04-Aug-2021
	Update History	:	<Updated by>		<Updated On>		<Remarks>

	==================================================*/
	
     require 'addPanelInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
        $(document).ready(function () {
               
                pageHeader   = "<?php echo $strTab; ?> Panel";
                strFirstLink = "Manage Skill Competition";
                strLastLink  = "Panel"; 
                
                //$('#selLevel').focus();              
                indicate = 'yes';
             <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg; ?>','','<?php echo $redirectLoc;?>');
            <?php }  ?>
        
             TextCounter('txtAddress','lblChar1',500);
             //fillDistricts('<?php echo $strDistrict; ?>','ddlDistrict');
             fillVenue('<?php echo $venue;?>','selVenue','<?php echo $level; ?>');
	});
        function validator()
            {
                /*if(!selectDropdown('ddlDistrict', 'Select District'))
                    return false; */   
                if(!selectDropdown('selLevel', 'Select Panel Level'))
                    return false;
                if(!selectDropdown('selVenue', 'Select Venue'))
                    return false;         
                if (!blankCheck('txtPanel', 'Panel Name can not be left blank'))
                    return false;
                if (!checkSpecialChar('txtPanel'))
                    return false;
                if (!maxLength('txtPanel',200, 'Panel'))
                    return false;                
                if (!maxLength('txtAddress', 250,'Address'))
                    return false;
                if (!checkSpecialChar('txtAddress'))
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
          <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> <a href="<?php echo APP_URL;?>viewPanel/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a></div>
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12">              
            
              <!-- <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlDistrict">Select District</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDistrict" id="ddlDistrict" >
                            <option value="0">- Select -</option> 
                            
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div> --> 
              <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="selLevel">Select Level </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selLevel" id="selLevel" onchange="fillVenue(0,'selVenue',this.value)">
                            <option value="0">- Select -</option> 
                            <option value="2" <?php if($level==2) echo 'selected="selected"'; ?>>Level-2</option> 
                            <option value="3" <?php if($level==3) echo 'selected="selected"'; ?>>Level-3</option> 
                            
                        </select>
                          <span class="mandatory">*</span>              
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="selVenue">Select Venue </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selVenue" id="selVenue" >
                            <option value="0">- Select -</option>                             
                        </select>
                          <span class="mandatory">*</span>              
                    </div>
                </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtPanel">Panel Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtPanel" name="txtPanel" maxlength="200" placeholder="" class="form-control" value="<?php echo $strPanel; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtAddress">Address</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtAddress" name="txtAddress" style="height:100px;" onKeyUp="return TextCounter('txtAddress','lblChar1',250)" onMouseUp="return TextCounter('txtAddress','lblChar1',250)"><?php echo $strAddress;?></textarea>
                        <span class="red">Maximum <span id="lblChar1">250</span> characters </span>
                        
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

 
