<?php 
    /* ================================================
  File Name      : addOfflineResult.php
  Description    : This is used to add bulk result data.
  Designed By    : Rahul Kumar Saw
  Devloped On    : 28-07-2021
  Devloped By    : Rahul Kumar Saw

  includes      : header.php, navigation.php, util.php, footer.php      :

    ==================================================*/
    include('addOfflineResultInner.php');
?>
<script src="<?php echo APP_URL;?>js/excanvas.js"></script>
<script src="<?php echo APP_URL;?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL;?>js/excellentexport.min.js"></script>
<script src="<?php echo APP_URL;?>js/exporting.js"></script>
<script language="javascript">
    $(document).ready(function () {
      //pageHeader = "Bulk Update data";
                strFirstLink = "Manage Events";
                strLastLink = "Add Offline Result";
        loadNavigation('Add Offline Result');
        indicate = 'yes';    

    <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit1'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
    <?php } ?>
    $('#import_btn').on('click', function () {
      $("#noteMsg").hide();
      //viewDuplicateAdhar('<?php echo $duplicateAdhar; ?>', '<?php echo $dupName; ?>');
            });
  });
</script>
<div class="page-content">
  <div class="page-header">
    <h1 id="title"></h1>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="top_tab_container"> 
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a>
                <a href="<?php echo APP_URL; ?>addMultiResult/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Skill Result</a> 
            </div>
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="iso" style="overflow: hidden;">
<?php 
if(isset($_POST['btnSubmit']) && isset($flag) && $flag==1)
{
    print_r($excel_data); ?>
   <input type="hidden" id="hdnResultRow" name="hdnResultRow" value='<?php echo $arrRow; ?>'/>
     <div class="col-sm-12">
            <input type="submit" id="btnSubmit1" name="btnSubmit1" value="Submit" class="btn btn-success"/>
            <input type="submit" id="btnBack" name="btnBack" value="Cancel" class="btn btn-danger" onsubmit="<?php echo $strclick; ?>" />
     </div>

<?php }
else
{ ?>
  
    <div style="text-align: right">
      <a class="btn btn-success" download href="<?php echo APP_URL ?>uploadDocuments/bulk/skill_result.xls">Download Excel xls Format</a>
    </div>
    <hr>
    <div class="clearfix" style="margin-top:20px;"></div>      
   
        <div class="form-group" >
           
                 <label class="col-sm-2 control-label no-padding-right" for="excelfile">Upload Document</label>
                  <div class="col-sm-3">
                        <span class="colon">:</span>
                        <input type="file" id="excelfile" name="excelfile" placeholder="" class="form-control">
                        <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strFileName; ?>"/>
                        <span class="mandatory">*</span>
                    </div>
                    
            </div>

            <div class="form-group" >
                <div class="col-sm-2 no-padding-right"></div>
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-info" id="import_btn" value="" name="btnSubmit" onclick="return validator();">Import File</button>
                </div>
              </div>
              <input type="hidden" name="hdnTraineeUserId" id="hdnTraineeUserId" value="<?php echo $id?>" />

<?php } ?>


    </div>  
</div>

<div class="clearfix"></div>
<div class="clearfix"></div>
<!-- <?php if(empty($excel_data)){ ?>
<div id="">
  <div class="tab-content" style="margin-top: 1.25rem">
<strong>NOTE:-</strong>
    <p>1. Download the given excel format</p>
    <p>2. Enter data as per the format</p>
    <p>3. In one excel keep max 100 row for fast processing</p>
    <p>4. Choose the excel file and click on import file</p>
</div>
</div>
<?php } ?> -->

</div>
<script type="text/javascript">
  function validator()
  { 
    if($('#excelfile').val()=="") 
        {
            viewAlert('Please upload excel file','excelfile');
            $('#excelfile').focus();
            return false;
        }
  }
</script>
