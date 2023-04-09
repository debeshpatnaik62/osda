<?php
/* ================================================
  File Name         	  : addReportCategory.php
  Description		  : This is used for add ReportCategory.
  Designed By		  :
  Designed On		  : 
  Devloped By             :Raviteja Peri
  Devloped On             : 06-Dec-2018
  Update History	  :	<Updated by>		<Updated On>		<Remarks>
  Style sheet             : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions     : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes	          :	header.php, navigation.php, util.php, footer.php,addReportCategoryInner.php

  ================================================== */

require 'addReportCategoryInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //pageHeader = "Add Highlights";
        strFirstLink = "Manage Application";
        strLastLink = "ReportCategory";
        loadNavigation('<?php echo $strTab; ?> ReportCategory');
        indicate = 'yes';
        $('#txtCategoryName').focus();
     

        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?> 
            
    <?php if($id=='0') {?>
            $('#userImage').hide();
            <?php }?>
            //TextCounter('txtDetailsE','lblChar1',1000);
            //TextCounter('txtDetailsH','lblChar2',2000); 
            });
            function validator()
            {
                if (!blankCheck('txtCategoryName', 'CategoryName can not be left blank'))
                    return false;
                if (!checkSpecialChar('txtCategoryName'))
                    return false;
                if (!maxLength('txtCategoryName', 30, 'CategoryName '))
                    return false;
  
              //   var remark		= CKEDITOR.instances['txtDetailsE'].getData();
                 if(remark=='')
                        {
                                viewAlert('Description can not left blank');
                                $('#txtDescription').focus();
                                return false;
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
            <a href="<?php echo APP_URL; ?>viewReportCategory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
            <!-- <a href="<?php echo APP_URL; ?>archieveReportCategory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
            <a href="<?php echo APP_URL; ?>submited-query/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Submitted Query</a> -->
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
           
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtCategoryName">CategoryName </label>
                    <div class="col-sm-3">
                        <span class="colon">:</span>
                        <input type="text" id="txtCategoryName" name="txtCategoryName" maxlength="30" placeholder="" class="form-control" value="<?php echo $strCategoryName; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description</label>
                    <div class="col-sm-3">
                        <span class="colon">:</span>
                        <textarea type="text" id="txtDescription" name="txtDescription" maxlength="120" placeholder="" class="form-control odia" style="height:100px";><?php echo $strDescription; ?></textarea>
                       
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


