<?php
    /* ================================================
        File Name             : viewInstGallery.php
        Description	      : This is used for view Institute Gallery.
        Author Name           : Arpita Rath
        Date Created          : 28-March-2017
        Devloped On           : 28-March-2017
        Devloped By           : Arpita Rath
        Update History	      : <Updated by>		<Updated On>		<Remarks>

        Style sheet           : 
        Javscript Functions   : loadAjax.js
        includes              : header.php, util.php, viewInstGalleryInner.php
 ==================================================*/
    include_once('viewInstGalleryInner.php');
?>

<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<script language="javascript">
    $(document).ready(function () {

            pageHeader   = "View Institute Gallery";
            strFirstLink = "Manage Application";
            strLastLink  = " Institute Gallery"; 

            loadNavigation('View Institute Gallery');

            <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
             //deleteMe     = "yes";
             <?php }?>
             printMe		= "yes";
             <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>
                  <?php } ?>

              publishMe   = "yes";
              unpublishMe = "yes"; 
              archiveMe   = "yes";   

            if('<?php echo $outMsg;?>'!='')                
                viewAlert('<?php echo $outMsg;?>');

            <?php if ($redirectPage != '') { ?>
             $('#alertModal').on('hidden.bs.modal', function () {
                 window.location.href = '<?php echo $redirectPage; ?>';
             });

          <?php } ?>

          //fill the districts details
                fillDistricts('<?php echo $intDist; ?>','ddlDist');
        //fill the education details
                fillInstitute('<?php echo $intInst; ?>','ddlInst','<?php echo $intDist; ?>');

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
                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=2) { ?>
                    <a href="<?php echo APP_URL?>addInstGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <?php }?>
                <a href="javascript:void(0);" class="btn btn-info active">View</a> 
                 <a href="<?php echo APP_URL?>archiveInstGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
            </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>

                <div class="searchTable">
              <div class="form-group">

                <label class="col-sm-1 control-label no-padding-right" for="ddlDist">District</label>
                <div class="col-sm-3"> 
                    <span class="colon">:</span>
                    <select class="form-control" name="ddlDist" id="ddlDist" onchange="fillInstitute(0,'ddlInst',this.value);">
                       <option value="0">- All -</option>                                 
                    </select>
                 </div>  

                 <label class="col-sm-1 control-label no-padding-right" for="ddlInst"> Institute</label>
                    <div class="col-sm-3">       
                    <span class="colon">:</span>  
                    <select class="form-control" name="ddlInst" id="ddlInst">
                        <option value="0">- All -</option>                                 
                     </select>
                    </div>            
                      
                    <div class="col-sm-2">
                      <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                      <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewInstGallery/<?php echo $glId . '/' . $plId; ?>' ">
                   </div>                
              </div>
            </div>

                <div class="legandBox">     
                    <span class="greenLegend">&nbsp;</span>Published &nbsp;     
                    <span class="yellowLegend">&nbsp;</span> Unpublished &nbsp;
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
                                <th>District</th>
                                <th>Institute</th>                       
                                <th>Caption in English</th>
                                <th>Caption in Odia</th>
                                <th>Image</th>
<!--                                <th>Description In English</th>
                                <th>Description In Odia</th>                                 -->
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                             if($row['intPubStatus']==2)
                                $style  = 'class="greenBorder"';
                            else
                                $style  = 'class="yellowBorder"'; 
                                $ctr++;                           
                               
                                ?>
                            <tr <?php echo $style; ?>>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intInstGalId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intInstGalId'];?>" name="hdnPubStatus<?php echo $row['intInstGalId'];?>" value=""/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td><?php echo $objInstGal->getName('vchDistrictname', 'm_district', 'intDistrictid', $row['intDistId'],'0');?></td> 
                                <td><?php echo $objInstGal->getName('vchInstituteName', 't_institute_details', 'intInstituteId', $row['tinInstId'],'0'); ?></td> 
                                <td><?php echo htmlspecialchars_decode($row['vchCaptionE'], ENT_QUOTES); ?></td>
                                <td class="odia"><?php echo $row['vchCaptionO']; ?></td>
                                <td align="center" width="150">
                                    <?php if($row['vchImage']!=''){ ?>
                                    <a href="<?php echo APP_URL ?>uploadDocuments/instGallery/<?php echo $row['vchImage'];?>" target="_blank" title="Category Photo"><img src="<?php echo APP_URL ?>uploadDocuments/instGallery/<?php echo $row['vchImage'];?>" alt="<?php echo $row['vchCaptionE']; ?>" width="98" height="80" /></a>
                                    <?php }else echo '&nbsp;';?>
                                </td>
<!--                                <td>
                                    <?php  
                                           // $descE = htmlspecialchars_decode($row['vchDescriptionE'], ENT_QUOTES); 
                                           // echo $objInstGal->wardWrap($descE, 150); 
                                       ?>
                                </td>

                                <td class="odia">
                                    <?php 
                                               // $descO =  $row['vchDescriptionO']; 
                                               // echo $objInstGal->wardWrap($descO, 150);
                                        ?>
                                </td>-->
                                
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addInstGallery/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intInstGalId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
                            </tr>
                        <?php } ?>
                         </tbody>
                    </table>
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    
                    <input name="hdn_msgid" id="hdn_msgid" type="hidden" />
                    
                <?php } else { ?>
                    <div class="noRecord">No record found</div>
            <?php } ?>
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objInstGal->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                            <?php echo $objInstGal->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
