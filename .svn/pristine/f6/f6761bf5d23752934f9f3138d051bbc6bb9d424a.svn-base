<?php
 /* ================================================
	  File Name         	  : viewMember.php
	  Description	          : This is used for view Become a Member.
	  Author Name	          : Arpita Rath
	  Date Created		      : 30-03-2017 
	  Devloped By		      : Arpita Rath
	  Devloped On		      : 30-03-2017
	  Update History		  :
	  <Updated by>		<Updated On>		<Remarks>
	 *       
	  Style sheet             : 
	  Javscript Functions     : 
	  includes                : viewMemberInner.php
  ================================================== */
    include_once('viewMemberInner.php');
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('Become a Member');
        pageHeader   = "Become a Member";
        strFirstLink = "Manage Application";
        strLastLink  = "Become a Member";
       
        deleteMe     = "yes";
        printMe      = "yes";
        
      //fill the sector details
            fillSector('<?php echo $intSector; ?>','ddlSector');

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
          	<a href="javascript:void(0);" class="btn btn-info active">View</a>
          </div>

            <?php include('includes/util.php'); ?>
              <div class="hr hr-solid"></div>     

              <div class="searchTable" >
                <div class="form-group">
                   
                    <label class="col-sm-2 control-label no-padding-right" for="txtSearch">Search By Name/E-mail</label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <input type="text" class="form-control" maxlength="80" name="txtSearch" id="txtSearch" value="<?php echo $strName; ?>"/>
                    </div>  

                    <label class="col-sm-1 control-label no-padding-right" for="ddlSector">Sector</label>
                       <div class="col-sm-2"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="ddlSector" id="ddlSector">
                              <option value="0">- All -</option>                                 
                           </select>
                        </div>

                    <label class="col-sm-1 control-label no-padding-right" for="txtStartDt">Date </label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                          <div class="input-group">
                             <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='0000-00-00')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                              <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                          </div>
                      </div>
                      
      
                    <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewMember/<?php echo $glId . '/' . $plId; ?>' ">
                    </div>
                </div>
            </div>                     

            <div id="viewTable">
            	<?php if($result->num_rows > 0) { 
                    $ctr = $intRecno;
            	?>
            	<table class="table table-striped table-bordered table-hover">
            		<thead>
            			<tr>
            			 <th width="20" class="noPrint">
	            			   <label class="position-relative">
	                               <input type="checkbox" class="ace chkAll"><span class="lbl"></span>
	                           </label>
                         </th>  
                         <th width="20">Sl.#</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Mobile</th>
                         <th>Sector</th>
                         <!-- <th>Course</th> -->
                         <th>Why</th>
                         <th>Created On</th>
                        </tr>
            		</thead>
            		<tbody>
            			<?php while($row = $result->fetch_array()) {
                             $ctr++;   
            			 ?>
            			<tr>
            			   <td class="noPrint">
                                <label class="position-relative">
                                 <input type="checkbox" class="ace chkItem" value="<?php echo $row['intMemberId']; ?>"><span class="lbl"></span></label>
                           </td>
                           <td><?php echo $ctr; ?></td>

                           <td><?php echo htmlspecialchars_decode($row['vchName'], ENT_QUOTES); ?></td>

                           <td><a href="mailto:<?php echo $row['vchEmail'];?>" title="<?php echo $row['vchEmail'];?>"><?php echo htmlspecialchars_decode($row['vchEmail'], ENT_QUOTES); ?></td>

                           <td>
                           <?php if($row['vchPhone'] != '') { 
                            echo $row['vchPhone']; ?>
                              <?php } else { ?>
                                <?php echo '--'; ?>
                              <?php } ?>
                            </td>
                           
                           <td>
                             <?php if($row['intSectorId'] != 0) { 
                                echo $objMember->getName('vchSecotrName','t_sector','intSectorId',$row['intSectorId'],'0');
                                ?>  (<?php echo $objMember->getName('vchCourseNameE','t_course_details','intCourseId',$row['intCourseId'],'0'); ?>)



                             <?php } else { ?>
                                <?php echo '--'; ?>
                             <?php } ?>

                           </td>


                           <td>
                              <?php if ($row['vchDesc'] != '') { ?>
                                            <a href="#myModal<?php echo $row['intMemberId']; ?>" role="button" data-toggle="modal"><?php $desc =  htmlspecialchars_decode($row['vchDesc'], ENT_QUOTES); 
                                              echo $description = $objMember->wardWrap($desc, 100);
                                            ?></a>

                                            <div class="modal fade" id="myModal<?php echo $row['intMemberId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close noPrint" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only noPrint">Close</span></button>
                                                            <h4 class="modal-title noPrint" id="myModalLabel">Contents</h4>
                                                        </div>
                                                        <div class="modal-body noPrint" id="divContent">
            <?php echo htmlspecialchars_decode($row['vchDesc'], ENT_QUOTES); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <?php echo htmlspecialchars_decode($row['vchDesc'], ENT_NOQUOTES); ?>
        <?php } ?>   

                                    </td>

                           <td><?php echo date('d-M-Y', strtotime($row['stmCreatedOn'])); ?></td>

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
                <?php if ($result->num_rows > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objMember->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <?php echo $objMember->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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