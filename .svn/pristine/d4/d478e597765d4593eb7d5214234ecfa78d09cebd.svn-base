<?php
/* ================================================
  File Name         	  : addFaq.php
  Description		  : This is used for add Faq.
  Designed By		  :
  Designed On		  : 
  Devloped By             :T Ketaki Debadarshini
  Devloped On             : 30-Nov-2015
  Update History	  :	<Updated by>		<Updated On>		<Remarks>
  Style sheet             : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions     : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes	          :	header.php, navigation.php, util.php, footer.php,addFaqInner.php

  ================================================== */

require 'addFaqInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        //pageHeader = "Add Highlights";
        strFirstLink = "Manage Application";
        strLastLink = "FAQ";
        loadNavigation('<?php echo $strTab; ?> FAQ');
        indicate = 'yes';
        $('#txtHeadlineE').focus();
      /*displayCkeditor('txtDetailsE');
      displayCkeditor('txtDetailsH');*/

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
                if (!blankCheck('txtHeadlineE', 'Question can not be left blank'))
                    return false;
                if (!checkSpecialChar('txtHeadlineE'))
                    return false;
                if (!maxLength('txtHeadlineE', 250, 'Headline '))
                    return false;
//                if (!blankCheck('txtDetailsE', 'Answer can not be left blank'))
//                   return false;
//                if (!checkSpecialChar('txtDetailsE'))
//                   return false;  
//                if (!maxLength('txtDetailsE', 500, 'Answer'))   
//                   return false;    
                 var remark		= CKEDITOR.instances['txtDetailsE'].getData();
                 if(remark=='')
                        {
                                viewAlert('Answer can not left blank');
                                $('#txtDescription').focus();
                                return false;
                        }
                 
             }
   $(function() {
    if (typeof CKEDITOR != 'undefined') {
        $('form').on('reset', function(e) {
            if ($(CKEDITOR.instances).length) {
                for (var key in CKEDITOR.instances) {
                    var instance = CKEDITOR.instances[key];
                    if ($(instance.element.$).closest('form').attr('name') == $(e.target).attr('name')) {
                        instance.setData(instance.element.$.defaultValue);
                    }
                }
            }
        });
    }
});
             
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
            <a href="<?php echo APP_URL; ?>viewFaq/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
            <a href="<?php echo APP_URL; ?>archieveFaq/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
            <a href="<?php echo APP_URL; ?>submited-query/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Submitted Query</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
           
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineE">Question </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtHeadlineE" name="txtHeadlineE" maxlength="250" placeholder="" class="form-control" value="<?php echo $strHeadLineE; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineH">Question in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtHeadlineH" name="txtHeadlineH" maxlength="300" placeholder="" class="form-control odia" value="<?php echo $strHeadLineO; ?>">
                       
                    </div>
                </div>  
                
                <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="txtDetailsE">Answer</label>
                  <div class="col-sm-10">
                      <span class="colon">:</span>
                      <textarea class="ckeditor form-control" id="txtDetailsE" name="txtDetailsE" rows="10" ><?php echo $strDetailE; ?></textarea>
                      <span class="mandatory">*</span>
                  </div>
              </div> 
                <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="txtDetailsH">Answer in Odia</label>
                  <div class="col-sm-10">
                      <span class="colon">:</span>
                      <textarea class="ckeditor form-control odia"  id="txtDetailsH" name="txtDetailsH" rows="10"><?php echo $strDetailH; ?></textarea>
                      
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


