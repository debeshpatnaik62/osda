<?php
 /* ================================================
	  File Name         	  : viewpublishResults.php
	  Description	          : This is used for update competition results
	  Author Name	          : Ashis kumar Patra
	  Date Created		  : 16-April-2018 
	  Devloped By		  : Ashis kumar Patra
	  Devloped On		  : 16-April-2018
	  Update History		  :
	  <Updated by>		<Updated On>		<Remarks>
	 *       
	  Style sheet             : 
	  Javscript Functions     : 
	  includes                : viewpublishResultsInner.php
  ================================================== */
    include_once('viewPublishResultsInner.php');
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Results');
        pageHeader   = "View Results";
        strFirstLink = "Manage Events";
        strLastLink  = "View Results";
       
        deleteMe     = "yes";
        printMe      = "yes";
        
      
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
        
        
        
      fillEvents('<?php echo $intEventId;?>','selSkill');
   
      
    });
    
    //============ Function to block character entry in the field on key press ===============	
function isNumberKey(event)
{
  
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
     return false;
   }

	 return true;
}


// ****************** function forUpdating Results ***************** //
	function publishResults(action)
	{	
		var PIds='';
		$('.chkItem').each(function(){
			if($(this).is(':checked')){
                           
				PIds	+= $(this).val()+',';
                          }
                            
		});
		if(PIds.length>0)
		{
            PIds        	= PIds.substring(0,PIds.length - 1);
            var pidVal      =  PIds.split(',');
            var totalcount  = pidVal.length;
			
			
                     if(action=='UR')
			{
                            var falseCount=0;

                             $('.chkItem').each(function(){ 
                                 if($(this).is(':checked')){
                                        var val= $(this).closest('tr').find(".txtSerialNo").val();
                                        if(val==''){
                                            viewAlert('Result Field cannot be left blank');
                                          falseCount++;
                                      }
                                          
                                    }
                                    
                              }); 
                              if(falseCount==0){
                                  
                                  confirmAlert('Are you sure to update the Result(s)');
                                  $('#btnConfirmOk').on('click',function(){
                                            $("#hdn_ids").val(PIds);
                                            $("#hdn_qs").val(action);
                                            $('#frmOGP').submit();
                                    });
                                  
                            }
                    
			}
			
		}
		else
		{
			viewAlert('Please select a record!');
			
		}		
	}
 </script>

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
                    <label class="col-sm-3 control-label no-padding-right" for="txtSearch">Search By Name/ Acknowledgement No</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="80" name="txtSearch" id="txtSearch" value="<?php echo $strName; ?>"/>
                    </div>  

                    <label class="col-sm-1 control-label no-padding-right" for="selSkill">Event</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selSkill" id="selSkill" >
                                <option value="0">--All--</option>
                                
                        </select>        
                    </div>    
                    <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewPublishResults/<?php echo $glId . '/' . $plId; ?>' ">
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
                                <th>Competator Details</th>
                                <th>Acknowledgement No</th>
                               
                                <th>Profile Photo</th>
                                
                                <th>Registered On </th>
                                <th>Results</th>
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
                                        
                                                
                                        <h4><?php echo htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES); ?></h4>
                                        
                                            <small class="text-primary"><i class="fa fa-phone"></i> +91- <?php echo $row['vchPhoneno']; ?></small><br/>
                                        <small class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES); ?></small> 
                                      </div>
                                      
                                       
                                    </td>
                                     <td><?php echo htmlspecialchars_decode($row['vchAckNo'], ENT_QUOTES); ?></td>
                                    <td>
                                        <a href="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$row['vchProfilePhoto']; ?>" target="_blank" alt="<?php echo htmlspecialchars_decode($row['vchFirstName'], ENT_QUOTES); ?>">
                                            <img src="<?php echo APP_URL.'uploadDocuments/skillCompetition/'.$row['vchAckNo'].'/'.$row['vchProfilePhoto']; ?>" width="80px" height="80px">
                                           
                                        </a>
                                    </td>
                                   
                                    </td>
                                    <td><?php echo date('d-M-Y', strtotime($row['stmCreatedOn'])); ?></td>
                                     <td><input type="text"  onkeypress="return isNumberKey(event);" name="txtSLNo<?php echo $row['intCompetitionId'];?>" id="txtSLNo<?php echo $row['INT_ID'];?>" value="<?php if($row['floatResult']!=0)echo $row['floatResult'];?>" style="width:50px" class="txtSerialNo" Autocomplete="off"/></td>
                             
                                </tr>
    <?php } ?>
                        </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input type="button" name="btnUpdateSl" id="btnUpdateSl" class="btn btn-success noPrint" value="Update Results" onClick="return publishResults('UR');"/>
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
 
 
 
