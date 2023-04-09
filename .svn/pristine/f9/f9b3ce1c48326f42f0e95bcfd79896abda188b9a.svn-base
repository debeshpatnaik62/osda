<?php
/* ================================================
  File Name           : addTicker.php
  Description         : This is used for add Venue details.
  Designed By         :
  Designed On         : 
  Devloped By         : Rahul Kumar Saw
  Devloped On         : 22-March-2021
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet         : 
  Javscript Functions : ckeditor.js, validatorchklist.js
  includes            : util.php,addVenueInner.php           :

  ================================================== */

require 'addTickerInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  Ticker";
        strFirstLink = "Manage Application";
        strLastLink  = "Ticker"; 
        loadNavigation('<?php echo $strTab; ?> Ticker');
        
        indicate = 'yes';
        $('#txtHeadlineE').focus();
      
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>    

     });
     //function to validate the employee directory
        function validator()
        {     

             if (!blankCheck('txtMessage', 'Ticker Message can not be left blank'))
                return false;
            if (!checkSpecialChar('txtMessage'))
                return false;
            if (!maxLength('txtMessage', 200, 'Ticker Message'))
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
                <a href="<?php echo APP_URL; ?>viewTicker/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMessage">Ticker Message In English </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtMessage" name="txtMessage" maxlength="200" placeholder="" class="form-control" value="<?php echo $strMessage; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div> 
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMessageO">Ticker Message In Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtMessageO" name="txtMessageO" maxlength="500" placeholder="" class="form-control odia" value="<?php echo $strMessageO; ?>">
                      
                    </div>
                </div> 

                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtUrl">Page Link</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtUrl" name="txtUrl" maxlength="200" placeholder="" class="form-control" value="<?php echo $strUrl; ?>">
                      
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


