<?php
/* ================================================
  File Name           : addGrevCategory.php
  Description         : This is used for add Category .
  Designed By         :
  Designed On         : 
  Devloped By         : Rahul Kumar Saw
  Devloped On         : 24-March-2023
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet         : 
  Javscript Functions : ckeditor.js, validatorchklist.js
  includes            : util.php,addGrevCategoryInner.php           :

  ================================================== */

require 'addGrevCategoryInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "Complaint Category";
        strFirstLink = "Manage Grievance";
        strLastLink  = "Complaint Category"; 
        loadNavigation('<?php echo $strTab; ?> Complaint Category');
        
        indicate = 'yes';
        $('#txtHeadlineE').focus();
      
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>    

     });
     //function to validate the category
        function validator()
        {     

             if (!blankCheck('txtCategory', 'Category can not be left blank'))
                return false;
            if (!checkSpecialChar('txtCategory'))
                return false;
            if (!maxLength('txtCategory', 200, 'Category Name'))
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
                <a href="<?php echo APP_URL; ?>viewGrevCategory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCategory">Category Name (In English)</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtCategory" name="txtCategory" maxlength="200" placeholder="" class="form-control" value="<?php echo $strCategory; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCategory_O">Category Name (In Odia)</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtCategory_O" name="txtCategory_O" maxlength="200" placeholder="" class="form-control odia" value="<?php echo $strCategoryO; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description (In English)</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" maxlength="500" type="text" name="txtDescription" id="txtDescription" value=""><?php echo $strDescription; ?></textarea>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionO">Description (In Odia)</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control odia" maxlength="500" type="text" name="txtDescriptionO" id="txtDescriptionO" value=""><?php echo $strDescriptionO; ?></textarea>
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


