<?php
	/* ================================================
	File Name       : addRegistrationPhase.php
	Description		  : This is used for add Registration Phase
	Designed By		  : 
  Designed On		  : 
  Devloped By		  : Rahul Kumar Saw
  Devloped On		  : 31-May-2022
	Update History	:	<Updated by>		<Updated On>		<Remarks>

	==================================================*/
	
     require 'addRegistrationPhaseInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
        $(document).ready(function () {
               
                pageHeader   = "<?php echo $strTab; ?> Event";
                strFirstLink = "Manage Skill Competition";
                strLastLink  = "Registration Event"; 
                
                $('#txtPhase').focus();              
                indicate = 'yes';
             <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg; ?>','','<?php echo $redirectLoc;?>');
            <?php }  ?>
	});
        function validator()
            {
                /*if(!selectDropdown('ddlYear', 'Select District'))
                    return false; */           
                if (!blankCheck('txtPhase', 'Registration Name can not be left blank'))
                    return false;
                if (!checkSpecialChar('txtPhase'))
                    return false;
                if (!maxLength('txtPhase',50, 'Panel'))
                    return false;                
                if (!maxLength('ddlYear', 250,'Address'))
                    return false;
                if (!checkSpecialChar('ddlYear'))
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
          <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> <a href="<?php echo APP_URL;?>viewRegistrationPhase/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a></div>
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12">              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtPhase">Phase Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtPhase" name="txtPhase" maxlength="50" placeholder="" class="form-control" value="<?php echo $strPhase; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlYear">Registration Year</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>

                        <?php $already_selected_value = $txtYear;
                        $earliest_year = 2025;?>
                        <select class="form-control" name="ddlYear" id="ddlYear" >
                          <!-- <option value="0">- Select -</option>  -->
                          <?php foreach (range(date('Y'), $earliest_year) as $x) { 
                            print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
                        }?>
                        </select>
                         <span class="mandatory">*</span>

                        
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

 
