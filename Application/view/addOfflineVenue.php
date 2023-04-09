<?php 
    /* ================================================
  File Name      : addOfflineVenue.php
  Description    : This is used to add bulk data.
  Designed By    : Rahul Kumar Saw
  Devloped On    : 06-05-2021
  Devloped By    : Rahul Kumar Saw

  includes      : header.php, navigation.php, util.php, footer.php      :

    ==================================================*/
    include('addOfflineVenueInner.php');
?>
<script src="<?php echo APP_URL;?>js/excanvas.js"></script>
<script src="<?php echo APP_URL;?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL;?>js/excellentexport.min.js"></script>
<script src="<?php echo APP_URL;?>js/exporting.js"></script>
<script language="javascript">
    $(document).ready(function () {
      //pageHeader = "Bulk Update data";
                strFirstLink = "Manage Events";
                strLastLink = "Add Offline Venue";
        loadNavigation('Add Offline Venue');
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#chkbxAll').click(function(){
            if($(this).is(":checked")){
              $('.chkbxSelected').prop('checked',true);
            }
            else if($(this).is(":not(:checked)")){
                $('.chkbxSelected').prop('checked',false);
            }
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
               <a href="<?php echo APP_URL ?>addVenue/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <a href="<?php echo APP_URL; ?>viewVenue/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a>
            </div>
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="iso" style="overflow: hidden;">
<?php 
if(isset($_POST['btnSubmit']) && isset($flag) && $flag==1)
{
    print_r($excel_data); ?>
   <input type="hidden" id="hdnVenueRow" name="hdnVenueRow" value='<?php echo $arrRow; ?>'/>
     <div class="col-sm-12">
            <input type="submit" id="btnSubmit1" name="btnSubmit1" value="Submit" class="btn btn-success"/>
            <input type="submit" id="btnBack" name="btnBack" value="Cancel" class="btn btn-danger" onsubmit="<?php echo $strclick; ?>" />
     </div>

<?php }
else
{ ?>
  
    <div style="text-align: right">
      <a class="btn btn-success" download href="<?php echo APP_URL ?>uploadDocuments/bulk/venue_master_details.xls">Download Excel xls Format</a>
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

  <div class="clearfix"></div>
  <div id ="duplicate" name="duplicate" class="collapse">
    <div class="form-group">
      <h3>Duplicate Record Details
      <a class="btn-info btn-sm pull-right" title="Download" download="Export_<?php echo time();?>.xls" href="#" onclick="return ExcellentExport.excel(this, 'dataTable', 'Sheet Name Here');"><i class="fa fa-download"></i> Download</a> </h3>
      <div class="table-responsive" class='viewtable'>
        <table id='dataTable' class="table table-striped table-bordered table-hover">
          <tr>
            <!-- <th class="noPrint">Sl#</th> -->
            <th>District *</th>
            <th>Project</th>
            <th>Sector</th>
            <th>AWC</th>
            <th>Sex *</th>
            <th>Name *</th>
            <th>Husband - Father Name</th>
            <th>Mobile Number *</th>
            <th>Aadhaar Card No.</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Date of Joining</th>
            <th>Category *</th>
            <th>Experience (In Year)</th>
            <th>Qualification *</th>
            <th>Address</th>
            <th>Pin Code</th>
            <th>Training Type</th>
            <th>Institute Name</th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>
    <?php
    for($i=0; $i<count($dupAdhar); $i++) {
      ?>
      <tr>
        <!-- <td class="noPrint" ><?php echo $i+1; ?></td> -->
        <td><?php echo $dupDistrict[$i]; ?></td>
        <td><?php echo $dupBlock[$i]; ?></td>
        <td><?php echo $dupGp[$i]; ?></td>
        <td><?php echo $dupVillage[$i]; ?></td>
        <td><?php echo $dupSex1[$i]; ?></td>
        <td><?php echo $dupName[$i]; ?></td>
        <td><?php echo $dupHusband[$i]; ?></td>
        <td><?php echo $dupPhnNo[$i]; ?></td>
        <td><?php echo $dupAdhar[$i]; ?></td>
        <td><?php echo $dupEmail[$i]; ?></td>
        <td><?php echo $dupDob1[$i]; ?></td>
        <td><?php echo $dupDoj1[$i]; ?></td>
        <td><?php echo $dupCategory[$i]; ?></td>
        <td><?php echo $dupExpInMonth[$i]; ?></td>
        <td><?php echo $dupQualification[$i]; ?></td>
        <td><?php echo $dupAddress[$i]; ?></td>
        <td><?php echo $dupPinCode[$i]; ?></td>
        <td><?php echo $dupType[$i]; ?></td>
        <td><?php echo $dupInstName[$i]; ?></td>
        <td><?php echo $dupStartDate[$i]; ?></td>
        <td><?php echo $dupEndDate[$i]; ?></td>
      </tr>
    <?php }
    ?>
        </table>

      </div>
    </div>
    <div class="clearfix"></div>
  </div>

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
