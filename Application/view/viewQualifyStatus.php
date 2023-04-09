<?php
 /* ================================================
	  File Name         	  : viewQualifyStatus.php
	  Description	          : This is used for view skill competiton details
	  Author Name	          : T Ketaki Debadarshini
	  Date Created		  : 24-Jan-2018 
	  Devloped By		  : T Ketaki Debadarshini
	  Devloped On		  : 24-Jan-2018 
	  Update History		  :
	  <Updated by>		<Updated On>		<Remarks>
	 *       
	  Style sheet             : 
	  Javscript Functions     : 
	  includes                : viewQualifyStatusInner.php
  ================================================== */
    include_once('viewQualifyStatusInner.php');
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>


<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Skill Result');
        pageHeader   = "View Skill Result";
        strFirstLink = "Manage Events";
        strLastLink  = "Skill Result";
       
        //deleteMe     = "yes";
        printMe      = "yes";
        downloadMe    = "yes";
        
        
        <?php if ($msg != '' && isset($_REQUEST['btnUpdate'])) { ?>
            viewAlert('<?php echo $msg; ?>', '', '');
         <?php }  ?>

        if('<?php echo $outMsg;?>'!='')                
	        viewAlert('<?php echo $outMsg;?>');
            
    

        $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            
         //View Applicant details 
        $('.dispProfilemodal').on('click',function(){
               var applicantId     = $(this).data( "applicant" );
              $("#dispProfile").load('<?php echo APP_URL;?>viewApplication/'+applicantId);
        });
        
        
        
      fillIndiaSkill('<?php echo $intSkill;?>','selSkill');
      fillDistricts('<?php echo $intDistrict; ?>', 'selDistrict');
      fillBlocks('<?php echo $intBlock; ?>', '<?php echo $intDistrict; ?>', 'selBlock');
      
      
    });

    function markUpdation(intId)
      {
          $('#applicantId').val(intId);
          var status = $("#mark"+intId).val();
          $("#mark").val(status);
          $('#frmOGP').submit();
      } 

 </script>
 <script src="<?php echo SITE_URL; ?>js/loadAjax.js"></script>

 <div class="page-content">
    <div class="page-header">
        <h1 id="title" class="col-sm-5"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
               
                <a href="javascript:void(0);" class="btn btn-info active">View</a>           
                
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable" >
                <div class="form-group">                   
                    <label class="col-sm-3 control-label no-padding-right" for="txtSearch">Search By Name/ Aadhar ID/ Registration No.</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="80" name="txtSearch" id="txtSearch" value="<?php echo $strName; ?>"/>
                    </div>       
    
                    <label class="col-sm-2 control-label no-padding-right" for="selQualify">Result </label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selQualify" id="selQualify" >
                                <option value="">--All--</option>
                                <option value="1">Qualified</option>
                                <option value="0">Not Qualified</option>
                                
                        </select>        
                    </div> 

                    <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewQualifyStatus/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                </div>
                
            </div>     


            <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno;
                    ?>
                    <table class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Applicant Details</th>
                                <th>Acknowledgement No</th>
                                <th>Skill(s)</th>                               
                                <th>Aadhar ID</th>
                                <th>District</th>
                                <th>Result</th>
                                <th>Mark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           while ($row = $result->fetch_array()) {
                            //print_r($row);exit;
                                $ctr ++;
                                ?>
                                <tr>
                                    <td class="noPrint">
                                        <label class="position-relative">
                                            <input type="checkbox" class="ace chkItem" value="<?php echo $row['intCompetitionId']; ?>"><span class="lbl"></span></label>
                                    </td>
                                    <td><?php echo $ctr; ?></td>

                                    <td>
                                        
                                        <div class="media-body pull-left"> 
                                        <a data-toggle="modal" style="cursor:pointer;" data-target="#modalProfile" data-applicant="<?php echo $objCompete->encrypt($row['intCompetitionId']); ?>" class="dispProfilemodal">
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchMiddleName'], ENT_QUOTES).' '.htmlspecialchars_decode($row['vchLastName'], ENT_QUOTES); ?></h4>
                                        </a> 
                                            <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchPhoneno']; ?></small><br/>
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES); ?></small> 
                                      </div>
                                      
                                       
                                    </td>
                                     <td><?php echo htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars_decode($row['strSkills'], ENT_QUOTES); ?></td>
                                    
                                    <td><?php echo htmlspecialchars_decode($row['vchAadharId'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars_decode($row['vchDistrictName'], ENT_QUOTES); ?></td>
                                    <td><?php echo ($row['intQualify']==0)?'Not Qualified':'Qualified'; ?>
                                    </td>
                                    <td> 
                                        <div style="display: flex;"> 
                                        <input type="text" name="mark" id="mark<?php echo $row['vchAckNo'];?>" style="width: 100px" class="form-control" value="<?php echo $row['intMarks'];?>">                     
                                       
                                        <input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-success noPrint" value="SAVE" style="margin-left:5px;" onclick="markUpdation('<?php echo $row['vchAckNo'];?>')" >
                                        </div>
                                    </td> 
                                    
                                   
                                </tr>
    <?php } ?>
                        </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input name="hdnAction" id="hdnAction" type="hidden" />
                    <input type="hidden" name="applicantId" id="applicantId" value="">
                    <input type="hidden" name="mark" id="mark" value="">
                    
                    
            <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
            </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                                    <?php echo $objCompete->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                        <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objCompete->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
                                </ul>
                            </div>
                        </div>
                <?php } ?>
                </div>
<?php } ?>
            <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
 
 <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInUp">
        <div class="modal-header" >
            
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <a href="javascript:void(0)" title="Print" onclick="printModal('myModalLabel','dispProfile');" class="btn btn-success btn-sm pull-right" style="margin-right:10px;"><i class="icon-white icon-print"></i> Print</a>
                <h4 class="modal-title" id="myModalLabel">Applicant Details</h4>
                
<!--        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
		
        <h3 class="modal-title pull-left" id="myModalLabel">Applicant Details</h3>-->
      </div>
        <div class="modal-body" id="dispProfile" style="padding: 1px 31px 19px 28px !important;">
          <div class="center" style="height:100px; font-size:24px;"><i class="fa fa-spinner fa-spin"></i></div>
          
          
      </div>
    </div>
   
  </div>
</div>
 
