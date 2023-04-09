<?php
/* ================================================
    File Name         	  : addImpLinks.php
    Description		        : This is used for add Imp Link details.
    Designed By		        : Arpita Rath
    Designed On		        : 27-03-2017
    Devloped By           : Arpita Rath
    Devloped On           : 27-03-2017
    Update History		    :	<Updated by>		<Updated On>		<Remarks>

    Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
    Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
    includes	            : header.php, navigation.php, util.php, footer.php,addLinkInner.php

  ================================================== */
        include_once('addImpLinksInner.php');
?>
<script src="<?php echo APPURL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
     
        pageHeader   = "<?php echo $strTab; ?> Important Links";
        strFirstLink = "Manage Application";
        strLastLink  = "Important Links"; 
        
        indicate = 'yes';          
         
<?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg; ?>','','<?php echo $redirectLoc; ?>');
<?php } ?>
            
            });
            
         
            
            function validator()
            {

                if (!blankCheck('txtHeadlineE', 'Link name can not left blank'))
                    return false;
                if (!checkSpecialChar('txtHeadlineE'))
                    return false;
                if (!maxLength('txtHeadlineE', 120, 'Link name'))
                    return false;                
                if (!maxLength('txtHeadlineH', 150, 'Link name in odia'))
                   return false;
                   
                if($('#txtURL').val()=='http://')
                {
                 if (!blankCheck('txtURL', 'URL can not left blank'))
                return false;
                }
                if (!checkSpecialChar('txtURL'))
                    return false;
                if (!validURL('txtURL','Please enter a valid URL'))
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
            <a href="<?php echo APP_URL; ?>viewImpLinks/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
             <a href="<?php echo APP_URL; ?>archiveImpLinks/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a></div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
               
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineE">Link Name in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtHeadlineE" name="txtHeadlineE" maxlength="120" placeholder="" class="form-control" value="<?php echo $strHeadLineE; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineH">Link Name in Odia </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtHeadlineH" name="txtHeadlineH" maxlength="150" placeholder="" class="form-control odia" value="<?php echo $strHeadLineO; ?>">

                    </div>
                </div>
          
                
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtURL">URL</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtURL" name="txtURL" placeholder="" class="form-control" value="<?php echo $strURL; ?>">
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


