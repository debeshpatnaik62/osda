<?php
/* ================================================
        File Name             : viewNanoUnicorn.php
        Description	      : This is used view Nano Unicorn Details.
        Author Name           : Ashis kumar Patra
        Date Created          : 15-Feb-2019
        Devloped On           : 15-Feb-2019
        Devloped By           : Ashis kumar Patra
        Update History	      : <Updated by>		<Updated On>		<Remarks>

        Style sheet           : 
        Javscript Functions   : loadAjax.js,validatorchklist.js,ckeditor.js
        includes              : header.php, util.php, viewNanoUnicornInner.php
 ==================================================*/
    require 'viewNanoUnicornInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
	$(document).ready(function () {
		pageHeader = "View Nano Unicorn";
                strFirstLink = "Manage Nano Unicorn";
                strLastLink = "Nano Unicorn";
               loadNavigation('View Nano Unicorn');
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
                    <a href="<?php echo APP_URL?>addNanoUnicorn/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a>
                <a href="<?php echo APP_URL; ?>viewNanoUnicornDetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Applicants</a>
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                <div class="searchTable">
                    <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right" for="vchTitle">Title</label>
                        <div class="col-sm-3"> <span class="colon">:</span>
                            <input type="text" id="vchTitle" name="vchTitle" maxlength="250" class="form-control" value="<?php echo $strTitle; ?>">
                        </div>
                   
                        <div class="col-sm-2">
                            <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                            <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewNanoUnicorn/<?php echo $glId . '/' . $plId; ?>' ">
                        </div>
                    </div>
                </div>
                <div class="legandBox">			
                    <span class="greenLegend">&nbsp;</span>Published Nano Unicorn(s)&nbsp;			
                    <span class="yellowLegend">&nbsp;</span> Unpublished Nano Unicorn(s) &nbsp;
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
                                <th>Title</th> 
                                <th>Title In Odia</th>
                                <th>Image</th>
                                <th>Audio</th>
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
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intNanoUnicornId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intNanoUnicornId'];?>" name="hdnPubStatus<?php echo $row['intNanoUnicornId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>

                               <td> <?php  echo htmlspecialchars_decode($row['vchName'],ENT_NOQUOTES);?> </td>
                               <td> <?php  echo htmlspecialchars_decode($row['vchNameO'],ENT_NOQUOTES);?> </td>

                                <td align="center">
                                    <?php if($row['vchImage']!='')
                                     {
                                        
                                    ?>
                                            <a href="<?php echo APP_URL ?>uploadDocuments/NanoUnicorn/<?php echo $row['vchImage'];?>" target="_blank" title="Nano Unicorn Photo"><img src="<?php echo APP_URL ?>uploadDocuments/NanoUnicorn/<?php echo $row['vchImage'];?>" alt="<?php echo $row['vchTitle']; ?>" width="150" height="80" /></a>
                                     <?php } else { echo '--';}?>
                                </td>

                                <td align="center">
                                    <?php if($row['vchAudio']!='')
                                     {
                                        
                                    ?>
                                            <a href="<?php echo APP_URL ?>uploadDocuments/NanoUnicorn/<?php echo $row['vchAudio'];?>" target="_blank" title="Nano Unicorn Photo"><img src="<?php echo SITE_URL.'images/audio.png'; ?>" alt="<?php echo $row['vchTitle']; ?>" width="50" height="40" /></a>
                                     <?php } else { echo '--';}?>
                                </td>
                          
                                
                  

                                
                                 <td> 
                                    
                                    <?php if ($row['vchDescription'] != '') { ?>
                                            <a href="#myModal<?php echo $row['intNanoUnicornId']; ?>" role="button" data-toggle="modal">
                                            <?php $strMessage =  htmlspecialchars_decode($row['vchDescription'], ENT_QUOTES); 
                                              echo $shortmsg = $objNanounicorn->wardWrap($strMessage, 100);
                                            ?></a>

                                            <div class="modal fade" id="myModal<?php echo $row['intNanoUnicornId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        </div>
                                                        <div class="modal-body noPrint" id="divContent">
                                                     <?php echo htmlspecialchars_decode($row['vchDescription'], ENT_QUOTES); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <?php echo htmlspecialchars_decode($row['vchDescription'], ENT_NOQUOTES); ?>
                                      <?php } ?>   
                                 </td> 


                               
                                  <td> 
                                    
                                    <?php if ($row['vchDescriptionO'] != '') { ?>
                                            <a href="#myModalO<?php echo $row['intNanoUnicornId']; ?>" role="button" data-toggle="modal">
                                            <?php $strMessage =  htmlspecialchars_decode($row['vchDescriptionO'], ENT_QUOTES); 
                                              echo $shortmsg = $objNanounicorn->wardWrap($strMessage, 100);
                                            ?></a>

                                            <div class="modal fade" id="myModalO<?php echo $row['intNanoUnicornId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            
                                                        </div>
                                                        <div class="modal-body noPrint" id="divContent">
           
            
                                            <?php echo htmlspecialchars_decode($row['vchDescriptionO'], ENT_NOQUOTES); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <?php echo htmlspecialchars_decode($row['vchDescriptionO'], ENT_NOQUOTES); ?>
                              <?php } ?>   
                                 </td> 



                                <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addNanoUnicorn/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intNanoUnicornId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>

                                
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
    <?php echo $objNanounicorn->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objNanounicorn->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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

