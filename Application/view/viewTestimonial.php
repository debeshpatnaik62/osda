<?php

    require 'viewTestimonialInner.php';
?>

<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "View Testimonial";
                strFirstLink = "Manage Skill CMS";
                strLastLink = "Testimonial";
               loadNavigation('View Testimonial');
                
		        printMe		= "yes";     		                
		        publishMe   = "yes";
                unpublishMe = "yes";
                deleteMe    = "yes";
               
		
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
               <?php  if ($noAdd != '1') { ?>
                    <a href="<?php echo APP_URL?>addTestimonial/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a>
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="txtName">Name</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <input type="text" id="txtName" name="txtName" maxlength="100" class="form-control" value="<?php echo $strName; ?>">
                        </div>
                   
                        <div class="col-sm-2">
                            <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                            <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewTestimonial/<?php echo $glId . '/' . $plId; ?>' ">
                        </div>
                    </div>
                </div>
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published Testimonial(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished Testimonial(s) &nbsp;
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
                                <th>Name</th>    
                                <th>Name In Odia </th> 
                                <th>Testimonial Type</th>
                                <th>Designation</th> 
                                <th>Designation In Odia</th> 
                                 <th>Image</th>
                                <th>Description In English </th>
                                <th>Description in Odia</th>
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
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intId'];?>" name="hdnPubStatus<?php echo $row['intId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> <?php  echo htmlspecialchars_decode($row['vchName'],ENT_NOQUOTES);?> </td>  
                                
                                 <td> <?php  echo htmlspecialchars_decode($row['vchNameO'],ENT_NOQUOTES);?> </td> 
                                 <td><?php  echo $row['intCategoryId']==1?'Skill Competition' : 'Digitall Skill'; ?></td> 
                                  <td> <?php  echo htmlspecialchars_decode($row['vchDesignation'],ENT_NOQUOTES);?> </td>
                               <td> <?php  echo htmlspecialchars_decode($row['vchDesignationO'],ENT_NOQUOTES);?> </td>

                                <td align="center">
                                    <?php if($row['vchImage']!='')
                                     {
                                         $vchImage =pathinfo($row['vchImage'], PATHINFO_EXTENSION);
                                         if($vchImage!='pdf')
                                         {
                                    ?>
                                            <a href="<?php echo APP_URL ?>uploadDocuments/Testimonial/<?php echo $row['vchImage'];?>" target="_blank" Name="Testimonial Photo"><img src="<?php echo APP_URL ?>uploadDocuments/Testimonial/<?php echo $row['vchImage'];?>" alt="<?php echo $row['vchName']; ?>" width="150" height="80" /></a>
                                    <?php 
                                         }
                                        else {
                                       ?>
                                           <a href="<?php echo APP_URL;?>uploadDocuments/Testimonial/<?php echo $row['vchImage'];?>" target="_blank"><?php if($vchImage=='pdf'){?><img src="<?php echo APP_URL;?>img.png" alt="" width="16" height="16" border="0" align="absmiddle"><?php } else{?><img src="<?php echo APP_URL;?>img/wordIcon.jpg" alt="" width="20" height="20" border="0" align="absmiddle"><?php }?></a>
   
                                   <?php 
                                         }  
                                    }else echo '&nbsp;';?>
                                </td>                                
                                 <td> <?php   echo htmlspecialchars_decode($row['vchDescription'], ENT_QUOTES);  ?>
                                 </td> 
                                  <td> <?php echo htmlspecialchars_decode($row['vchDescriptionO'], ENT_QUOTES); ?>
                                 </td> 
                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addTestimonial/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intId'] ?>" data-rel="tooltip" Name="" data-original-Name="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
            <?php echo $objTestimonial->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                </div>
                            </div>
            <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                <div class="col-xs-6">
                                    <div class="dataTables_paginate paging_bootstrap">
                                        <ul class="pagination">
                <?php echo $objTestimonial->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
