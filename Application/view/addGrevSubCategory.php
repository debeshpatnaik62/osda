<?php
/* ================================================
  File Name           : addGrevSubCategory.php
  Description         : This is used for add SubCategory.
  Designed By         :
  Designed On         : 
  Devloped By         : Rahul Kumar Saw
  Devloped On         : 05-April-2023
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet         : 
  Javscript Functions : ckeditor.js, validatorchklist.js
  includes            : util.php,addGrevSubCategoryInner.php           :

  ================================================== */


require 'addGrevSubCategoryInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "Complain Sub Category";
        strFirstLink = "Manage Grievance";
        strLastLink  = "Complain Sub Category"; 
        loadNavigation('<?php echo $strTab; ?> Complain Sub Category');
        
        indicate = 'yes';
        $('#txtHeadlineE').focus();
      
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>    

     });
     //function to validate the sub category
        function validator()
        {     
            // This is for Select Category(in English)
            if (!selectDropdown('selectCategory', 'Select Category'))
                return false;

            // This is for Sub Category(in English)
            if ((!blankCheck('txtSubCategory', 'Sub Category can not be left blank')))
                return false;
            if (!checkSpecialChar('txtSubCategory'))
                return false;
            if (!maxLength('txtSubCategory', 200, 'Sub Category'))
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
                <a href="<?php echo APP_URL; ?>viewGrevSubCategory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <!-- <div class="col-xs-12"> -->
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="selectCategory">Select Category </label>
                    
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selectCategory" id="selectCategory" required>
                            <option value="0">--Select--</option>
                            <option value="1">Exam</option>
                            <option value="2">Result</option>
                            <option value="3">Category is not populating</option>
                        </select>   
                        <span class="mandatory">*</span>
                    </div>
                </div> 
            <!-- </div> -->

            <!-- text fields -->
            <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSubCategory">Sub Category (In English)</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtSubCategory" name="txtSubCategory" maxlength="200" placeholder="" class="form-control" value="<?php echo $strCategory; ?>">
                        <span class="mandatory">*</span>
                    </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSubCategory_O">Sub Category (In Odia)</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtSubCategory_O" name="txtSubCategory_O" maxlength="200" placeholder="" class="form-control odia" value="<?php echo $strCategoryO; ?>">
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

            <!-- buttons -->
            <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();"/>
                        <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strclick; ?>" />
                    </div>
            </div>

            <div class="hr hr32 hr-dotted"></div>
            <!-- PAGE CONTENT ENDS -->
        </div>
    </div>
</div>
