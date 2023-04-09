<?php

    require 'employerInner.php';
?>

<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "View Employer";
                strFirstLink = "Manage Application";
                strLastLink = "Employer";
               loadNavigation('View Employer');
                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
		//archiveMe	= "yes";
		printMe		= "yes";     		                
		publishMe       = "yes";
                unpublishMe     = "yes";
                deleteMe = "yes";
               
                <?php }?>
		
		$('.showModal').click(function(){
			$('#myModal1').modal();			
		});
                $('.showModal2').click(function () {
                    $('#myModal2').modal();
                });
               if('<?php echo $outMsg;?>'!='')                
                    viewAlert('<?php echo $outMsg;?>');

                <?php if ($redirectPage != '') { ?>
                 $('#alertModal').on('hidden.bs.modal', function () {
                     window.location.href = '<?php echo $redirectPage; ?>';
                 });
                 <?php } ?>
                   
                  $('.date-picker').datepicker({
                        autoclose: true,
                        todayHighlight: true
                    });  

              
              
	});
        
        
</script>
    <div class="page-content">
        <div class="page-header">
            <h1 id="title" class="col-sm-5"></h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container">
               <!-- <?php  if ($noAdd != '1') { ?>
                    <a href="<?php echo APP_URL?>addemployer/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?> -->
                <a href="<?php echo APP_URL?>contact/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Student</a>
                <a href="javascript:void(0);" class="btn btn-info active">View Employer</a>
                <a href="<?php echo APP_URL?>training-partner/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Training Partner</a>
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="txtCompanyName">Company Name</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <input type="text" id="txtCompanyName" name="txtCompanyName" maxlength="250" class="form-control" value="<?php echo $strCompanyName; ?>">
                        </div>
                            <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Search By Name/Mobile No</label>
                            <div class="col-sm-3"> <span class="colon">:</span> 
                                <input type="text" class="form-control" maxlength="80" name="txtSearch" id="txtSearch" value="<?php echo $strSearch; ?>"/>
                            </div> 
                      
                    </div>
                    <div class="form-group">                   
                               

                            <label class="col-sm-2 control-label no-padding-right" for="txtStartDt">Date From</label>
                                <div class="col-sm-3"> <span class="colon">:</span>
                                    <div class="input-group">
                                        <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!=BLANK_DATE)?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                         <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                                    </div>
                               </div>

                            <label class="col-sm-2 control-label no-padding-right" for="txtEndDt">Date To</label>
                               <div class="col-sm-3"> <span class="colon">:</span>
                                   <div class="input-group">
                                       <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!=BLANK_DATE)?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                                   </div>
                               </div>   

                            <div class="col-sm-2">
                                <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                                <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewEmployerRegistration/<?php echo $glId . '/' . $plId; ?>' ">
                            </div>
                        </div>
                    
                </div>
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published employer(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished employer(s) &nbsp;
                </div>
                <div id="viewTable">
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Company Name</th>
                                <th>Name</th> 
                                <th>Email</th> 
                                <th>Mobile Number</th>
                                <th>Designation</th>
                                <th>Skill</th>
                                <th>No.Of.Candidates</th> 
                                <th>Message</th>
                                <th>Post Date</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            
                            if($row['tinPublishStatus']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                ?>
                            <tr <?php echo $style;?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intId'];?>" name="hdnPubStatus<?php echo $row['intId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchCompanyName'],ENT_NOQUOTES);?> </td>  
                                <td> <?php  echo htmlspecialchars_decode($row['vchName'],ENT_NOQUOTES);?> </td>  
                                <td> <?php  echo htmlspecialchars_decode($row['vchEmail'],ENT_NOQUOTES);?> </td>
                                 <td> <?php  echo htmlspecialchars_decode($row['vchMobile'],ENT_NOQUOTES);?> </td> 
                               <td> <?php  echo htmlspecialchars_decode($row['vchDesignation'],ENT_NOQUOTES);?> </td>
                               <?php
                              
                                $skills= ($row['vchSkills']!='')?explode('::', $row['vchSkills']):'';
                                $txtSkill='';
                                for($i=0;$i<count($skills);$i++){
                                    $txtSkill.= "<strong>".($i+1)."</strong>. ".$skills[$i]."<br/>";
                                }
                                ?>
                              
                               <td width="180"> <?php echo htmlspecialchars_decode($txtSkill,ENT_NOQUOTES);?> </td>
                              <?php
                               if($row['vchCandidates']==1){
                                $candidates="0-10";
                               } else if($row['vchCandidates']==2){
                                $candidates="11-20";
                                } else if($row['vchCandidates']==3){
                                    $candidates="21-50";
                                } else if($row['vchCandidates']==4){
                                    $candidates="50-100";
                                } else if($row['vchCandidates']==5){
                                    $candidates="100+";
                               }
                               ?>
                               <td> <?php  echo htmlspecialchars_decode($candidates,ENT_NOQUOTES);?> </td>
                                <td>
                                    
                                    <?php if ($row['vchMessage'] != '') { ?>
                                            <a href="#myModal<?php echo $row['intId']; ?>" role="button" data-toggle="modal">
                                            <?php $strMessage =  htmlspecialchars_decode($row['vchMessage'], ENT_QUOTES); 
                                              echo $shortmsg = $objEmployer->wardWrap($strMessage, 100);
                                            ?></a>

                                            <div class="modal fade" id="myModal<?php echo $row['intId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        </div>
                                                        <div class="modal-body noPrint" id="divContent">
                                                     <?php echo htmlspecialchars_decode($row['vchMessage'], ENT_QUOTES); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <?php echo htmlspecialchars_decode($row['vchMessage'], ENT_NOQUOTES); ?>
                                      <?php } ?>   
                                 </td> 
                                 <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                
                            </tr>

                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
    <?php echo $objEmployer->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objEmployer->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
         
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-Name" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="divContent">

            </div>

        </div>
    </div>
</div>

