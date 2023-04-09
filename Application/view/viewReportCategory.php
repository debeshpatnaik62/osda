<?php
    /* ================================================
    File Name         	  : viewReportCategory.php
    Description		  : This is used for view ReportCategorys.
 
    Devloped On           : 06-Dec-2018
    Devloped By           : Raviteja Peri
    Update History	  : <Updated by>		<Updated On>		<Remarks>

    Style sheet           : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
    Javscript Functions   : jquery.min.js, bootstrap.min.js, custom.js, loadcomponent.js
    includes		  : header.php, navigation.php, util.php, footer.php,viewReportCategoryInner.php

    ==================================================*/
    require 'viewReportCategoryInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "View ReportCategory";
                strFirstLink = "Manage Application";
                strLastLink = "ReportCategory";
               loadNavigation('View ReportCategory');
                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
		//archiveMe	= "yes";
		printMe		= "yes";     		                
		publishMe       = "yes"
        unpublishMe     = "yes"
        deleteMe        = "yes"
               
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
              
	});
        
        //funtion to validate the serial no
        function validSl()
           {
               var flag	= 0;
               $('.txtSerialNo').each(function(){
                       if(this.value==0 || this.value=='')
                       {
                           alert('Serial number must be greater than zero');
                           this.focus();
                           flag	= 1;
                           return false;
                       }

               });
               if(flag==0)
                       gotoDelete('US');
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
               <?php  if ($noAdd != '1') { ?>
                    <a href="<?php echo APP_URL?>addReportCategory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a>
               <!--   <a href="<?php echo APP_URL;?>archieveReportCategory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
                <a href="<?php echo APP_URL; ?>submited-query/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Submitted Query</a>  -->
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="txtCategoryName">CategoryName</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <input type="text" id="txtCategoryName" name="txtCategoryName" maxlength="30" class="form-control" value="<?php echo $strCategoryName; ?>">
                        </div>
                   
                        <div class="col-sm-2">
                            <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                            <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewReportCategory/<?php echo $glId . '/' . $plId; ?>' ">
                        </div>
                    </div>
                </div>
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published ReportCategory(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished ReportCategory(s) &nbsp;
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
                                <th>CategoryName</th>    
                                <th>Description </th>
                                 <th>SL No</th>
                                <th>Created On </th>
                                <th width="30" class="noPrint">Edit</th>
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
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intReportCategoryId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intReportCategoryId'];?>" name="hdnPubStatus<?php echo $row['intReportCategoryId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php /*if($row['vchCategoryName']!=''){?>
                                    <a href="javascript:void(0);" title="ReportCategory Details" class="showModal" onclick="getReportCategoryDetails('<?php echo $row['intReportCategoryId'];?>',1)"><?php echo htmlspecialchars_decode($row['vchCategoryName'],ENT_NOQUOTES);?></a>
                                    <?php }else{*/  echo htmlspecialchars_decode($row['vchCategoryName'],ENT_QUOTES);//}?>
                                </td>  
                                
                                <td class="odia"> <?php /*if($row['vchDescription']!=''){?>
                                    <a href="javascript:void(0);" title="ReportCategory Details" class="showModal" onclick="getReportCategoryDetails('<?php echo $row['intReportCategoryId'];?>',2)"><?php echo $row['vchDescription'];?></a>
                                    <?php }else{ */ echo $row['vchDescription'];//}?>
                                </td> 
                                <td><input type="text" maxlength="5" onkeypress="return isNumberKey(event);" name="txtSLNo<?php echo $row['intReportCategoryId'];?>" id="txtSLNo<?php echo $row['intReportCategoryId'];?>" value="<?php echo $row['intSlno'];?>" style="width:50px" class="txtSerialNo" Autocomplete="off"/></td>
                          
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addReportCategory/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intReportCategoryId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
                            </tr>
                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                     <input type="button" name="btnUpdateSl" id="btnUpdateSl" class="btn btn-success noPrint" value="Update Serial Number" onClick="validSl();"/>
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
    <?php echo $objReportCategory->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objReportCategory->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="divContent">

            </div>

        </div>
    </div>
</div>

