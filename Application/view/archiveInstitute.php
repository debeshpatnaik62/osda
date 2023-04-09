<?php
/* ================================================
  File Name         	  : archiveInstitute.php
  Description		  : This is used for view the institute details.
  Author Name		  : T Ketaki Debadarshini
  Date Created		  : 23-March-2017
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, archiveInstituteInner.php

  ================================================== */
    require("archiveInstituteInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('Archive Institutes');
        pageHeader = "Archive Institutes";
        strFirstLink = "Manage Application";
        strLastLink = "Manage Institutes";
        $('[data-rel=tooltip]').tooltip(); 
         
	 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
           deleteMe	= "yes";
            <?php }?>
           printMe      = "yes";
            <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
          enableMe	="yes";    

        <?php }?>

         if('<?php echo $outMsg;?>'!='')                
                 viewAlert('<?php echo $outMsg;?>');

         <?php if ($redirectPage != '') { ?>
          $('#alertModal').on('hidden.bs.modal', function () {
              window.location.href = '<?php echo $redirectPage; ?>';
          });

       <?php } ?>
       fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
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
                    <a href="<?php echo APP_URL ?>addInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
              <?php }?>
              <a href="<?php echo APP_URL ?>viewInstitutes/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">View</a>
              <a href="javascript:void(0);" class="btn btn-info active">Archive</a>  
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            
            <div class="searchTable">
              <div class="form-group">

                  <label class="col-sm-1 control-label no-padding-right" for="ddlDistrict">District</label>
                       <div class="col-sm-2"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="ddlDistrict" id="ddlDistrict">
                              <option value="0">- All -</option>                                 
                           </select>
                        </div>

                        <label class="col-sm-1 control-label no-padding-right" for="selType">Type</label>
                        <div class="col-sm-2"> 
                            <span class="colon">:</span>
                            <select class="form-control" name="selType" id="selType">
                                <option value="0">--All--</option>
                                <option value="1" <?php if($intType==1) echo 'selected="selected"'; ?> > Govt.</option>
                                <option value="2" <?php if($intType==2) echo 'selected="selected"'; ?>>Private</option>                                
                            </select>
                         </div>

                   <label class="col-sm-2 control-label no-padding-right" for="txtInstName"> Institute Name</label>
                      <div class="col-sm-2"> <span class="colon">:</span> 
                          <input type="text" class="form-control" maxlength="80" name="txtInstName" id="txtInstName" value="<?php echo $strInstName; ?>"/>
                      </div>  
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>archiveInstitute/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
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
                                <th>Institute Name </th>  
                                <th>Institute Name in Odia</th> 
                                <th>District</th> 
                                <th>Type</th> 
                                <th>Year of Est.</th> 
                                <th>Principle</th> 
                                <th>Email-id</th> 
                                <th>Phone No</th>
                                <th>Website</th>
                                <th>Image</th> 
                                
                                <th>Created On </th>
                               
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                           
                                $ctr++; 
                                ?>
                            <tr>
                                <td class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['intInstituteId'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['intInstituteId'];?>" name="hdnPubStatus<?php echo $row['intInstituteId'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                                <td><?php echo $ctr; ?></td>
                                <td> 
                                 <?php
                                      if($row['vchDescriptionE']!='')
                                      {
                                     ?>
                                        <a href="#myModal<?php echo $row['intInstituteId']; ?>" role="button" data-toggle="modal"><?php echo htmlspecialchars_decode($row['vchInstituteName'],ENT_QUOTES); ?></a>
                                        
                                        <div style="display:none;" class="modal fade" id="myModal<?php echo $row['intInstituteId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                  <h4 class="modal-title" id="myModalLabel">Description</h4>
                                                </div>
                                                  <div class="modal-body" id="divContent">
                                                    <?php echo htmlspecialchars_decode($row['vchDescriptionE'],ENT_QUOTES);?>
                                                   <?php
                                                     if($row['vchDescriptionO']!='')
                                                     {
                                                   ?>
                                                      <h5 class="modal-title" id="myModalLabel"><b>Description in Odia </b></h5> 
                                                      <span class="odia"> <?php echo $row['vchDescriptionO'];?> </span>
                                                    <?php
                                                     }
                                                    ?>
                                                 </div>

                                              </div>
                                            </div>
                                          </div>
                                        <?php }else{ ?>
                                        <?php echo htmlspecialchars_decode($row['vchInstituteName'],ENT_QUOTES); ?>
                                        <?php } ?>
                                
                                </td>
                                
                                <td class="odia"><?php  echo $row['vchInstituteNameO'];?> </td>  
                                <td ><?php  echo htmlspecialchars_decode($row['vchDistrictname'],ENT_QUOTES);?> </td>  
                                <td > <?php  if($row['tinInstituteType']==1){echo 'Govt';} else if($row['tinInstituteType']==2){ echo 'PolyTecnic';}else if($row['tinInstituteType']==3){ echo 'PIA';}?> </td>  
                                <td ><?php  echo $row['intEstYear'];?> </td>  
                                 <td ><?php  echo htmlspecialchars_decode($row['vchPrincipalName'],ENT_QUOTES);?> </td> 
                                <td ><?php  echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES);?> </td>  
                                <td ><?php  echo htmlspecialchars_decode($row['vchPhoneno'],ENT_QUOTES);?> </td>  
                                <td ><?php  echo htmlspecialchars_decode($row['vchWebsite'],ENT_QUOTES);?> </td>  
                                
                                <td align="center" width="150">
                                    <?php if($row['vchImage']!=''){ ?>
                                    <a href="<?php echo APP_URL ?>uploadDocuments/institute/<?php echo $row['vchImage'];?>" target="_blank" title="Category Photo"><img src="<?php echo APP_URL ?>uploadDocuments/institute/<?php echo $row['vchImage'];?>" alt="<?php echo $row['vchInstituteName']; ?>" width="98" height="80" /></a>
                                    <?php }else echo '&nbsp;';?>
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
    <?php echo $objInstitute->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
    <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
        <?php echo $objInstitute->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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
