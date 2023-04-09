<?php
/* ================================================
  File Name         	  : viewInstitutes.php
  Description		  : This is used for view the institute details.
  Author Name		  : T Ketaki Debadarshini
  Date Created		  : 23-March-2017
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, viewInstitutesInner.php

  ================================================== */
    require("viewInstitutesInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Institutes');
        pageHeader      = "View Institutes";
        strFirstLink    = "Manage Application";
        strLastLink     = "Manage Institutes";
        $('[data-rel=tooltip]').tooltip(); 
         
	 <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission==3) { ?>
           archiveMe        = "yes";
            <?php }?>
           printMe          = "yes";
            <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=1) { ?>		                
           publishMe        = "yes"
           unpublishMe      = "yes"

        <?php }?>

         if('<?php echo $outMsg;?>'!='')                
                 viewAlert('<?php echo $outMsg;?>');

         <?php if ($redirectPage != '') { ?>
          $('#alertModal').on('hidden.bs.modal', function () {
              window.location.href = '<?php echo $redirectPage; ?>';
          });

       <?php } ?>
       
     
        $('#selType').on('change',function(){
           
              if($(this).val()==2){
                  $('.dispPrvType').show();
              }else{
                  $('.dispPrvType').hide();
              }
            }); 
      

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
              <a href="javascript:void(0);" class="btn btn-info active">View</a>
              <a href="<?php echo APP_URL ?>archiveInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>

            <div class="searchTable">
              <div class="form-group">

                  <label class="col-sm-2 control-label no-padding-right" for="ddlDistrict">District</label>
                       <div class="col-sm-2"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="ddlDistrict" id="ddlDistrict">
                              <option value="0">- All -</option>                                 
                           </select>
                        </div>

                        <label class="col-sm-2 control-label no-padding-right" for="selType">Type</label>
                        <div class="col-sm-2"> 
                            <span class="colon">:</span>
                            <select class="form-control" name="selType" id="selType" >
                                <option value="0">--All--</option>
                                <?php
                                foreach ($aryInstituteType as $key => $value) {
                                    if($intPIAstatus==$key) 
                                        $strSelected = 'selected="selected"';
                                    else
                                        $strSelected = '';
                                    echo '<option value="'.$key.'" '.$strSelected.'>'.$value.'</option>  ';
                                }
                                ?>
                            </select>
                            
                         </div>
                        
                       </div> 
                       <div class="form-group">
                   <label class="col-sm-2 control-label no-padding-right" for="txtInstName"> Institute Name</label>
                      <div class="col-sm-2"> <span class="colon">:</span> 
                          <input type="text" class="form-control" maxlength="80" name="txtInstName" id="txtInstName" value="<?php echo $strInstName; ?>"/>
                      </div>  
                      
                  

                  <label class="col-sm-2 control-label no-padding-right" for="selStatus">Status</label>
                       <div class="col-sm-2"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="selStatus" id="selStatus">
                              <option value="0">- Select -</option>
                              <option value="2" <?php echo ($intStatus == 2)?'selected="selected"':'';?>> Active </option>
                              <option value="1" <?php echo ($intStatus == 1)?'selected="selected"':'';?>> In active </option>                                 
                           </select>
                        </div>

                    <!-- <label class="col-sm-1 control-label no-padding-right" for="selScheme">Scheme</label>
                      <div class="col-sm-2"> 
                           <span class="colon">:</span>
                           <select class="form-control" name="selScheme" id="selScheme">
                              <option value="0">- Select -</option>
                              <option value="1"> OSDA </option>
                              <option value="2"> DDU-GKY </option>
                              <option value="3"> PMKVY </option>
                              <option value="4"> PMKK </option>                                 
                           </select>
                      </div> -->

                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                        <input class="btn btn-danger" name="btnClear" type="button" value="Clear" onclick="window.location.href ='<?php echo APP_URL; ?>viewInstitutes/<?php echo $glId . '/' . $plId; ?>' ">
                     </div>                
              </div>
            </div>
			
          <div class="legandBox">			
                <span class="greenLegend">&nbsp;</span>Published Institute(s) &nbsp;			
                <span class="yellowLegend">&nbsp;</span> Unpublished Institute(s) &nbsp;
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
                                <th>Institute Name In English</th>  
                                <th>Institute Name In Odia</th> 
                                <!-- <th>Alias </th>  --> 
                                <th>District</th> 
                                <th>Type</th> 
                                <!-- <th>Year of Est.</th> 
                                <th>Principal</th> 
                                <th>Contact Details</th> --> 
<!--                                <th>Website</th>-->
                                <th>Image</th> 
                                
                                <th>Created On </th>
                                <th width="30" class="noPrint">Edit</th>
                                <th width="10">Tagged</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            if($row['tinPublishStatus']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"'; 
                                $ctr++; 
                                
                                $strSeparator   = ($row['vchPhoneno']!='' && $row['vchMobileNo']!='')?'/':'<br>';
                                
                                ?>
                            <tr <?php echo $style;?>>
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
                                        <a href="#myModal<?php echo $row['intInstituteId']; ?>" role="button" data-toggle="modal">
                                            <?php 
                                                 echo htmlspecialchars_decode($row['vchInstituteName'],ENT_QUOTES); 
                                            ?>
                                        </a>
                                        
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
                                        <?php }   
                                        echo (($row['tinIsPIA']==3 && $row['intParentId']>0)?'<br><em>'.htmlspecialchars_decode($row['strTrainingPartner'],ENT_QUOTES).'(Training Partner)</em>':''); 
                                        
                                        ?>
                                    
                                </td>
                                
                                <td class="odia"><?php  echo $row['vchInstituteNameO'];?> </td>  
                               <!--  <td ><?php  //echo htmlspecialchars_decode($row['vchInstituteAlias'],ENT_QUOTES);?> </td>   -->
                                <td ><?php  echo htmlspecialchars_decode($row['vchDistrictname'],ENT_QUOTES);?> </td>  
                                <td >
                                    <?php  if($row['tinInstituteType']==1){echo 'Govt';} else if($row['tinInstituteType']==2){ echo 'Private';}?> 
                                    <?php  echo ' '.$aryInstituteType[$row['tinIsPIA']].'<br>'; ?> 
									
                                        <?php 
                                        
                                        if($row['piaDetails']!=''){
                                            $display_array = explode (',', $row['piaDetails']);
                                       
                                            $display_string = array();

                                            foreach ($display_array as $key => $value) {
                                                                                                    
                                                    array_push($display_string, $arySchemeType[$value]);   
                                               }

                                            echo (count($display_string) > 0) ? '(' . implode(', ', $display_string) . ')' : ' '; 

                                        }

                                        ?> 
							   
								   
                                </td>  
                                <!-- <td ><?php  //echo ($row['intEstYear']>0)?$row['intEstYear']:'--';?> </td>  
                                <td ><?php  //echo htmlspecialchars_decode($row['vchPrincipalName'],ENT_QUOTES);?> </td> 
                                <td ><?php  //echo htmlspecialchars_decode($row['vchEmailId'],ENT_QUOTES).(($row['vchPhoneno']!='')?'<br>'.htmlspecialchars_decode($row['vchPhoneno'],ENT_QUOTES):'').$strSeparator.(($row['vchMobileNo']!='')?htmlspecialchars_decode($row['vchMobileNo'],ENT_QUOTES):'').(($row['vchWebsite']!='')?'<br>'.htmlspecialchars_decode($row['vchWebsite'],ENT_QUOTES):'');?> </td> -->  
                               
<!--                                <td ><?php  //echo htmlspecialchars_decode($row['vchWebsite'],ENT_QUOTES);?> </td>  
                                -->
                                <td align="center" width="100">
                                    <?php if($row['vchImage']!=''){ ?>
                                    <a href="<?php echo APP_URL ?>uploadDocuments/institute/<?php echo $row['vchImage'];?>" target="_blank" title="Institute Photo"><img src="<?php echo APP_URL ?>uploadDocuments/institute/<?php echo $row['vchImage'];?>" alt="<?php echo $row['vchInstituteName']; ?>" width="98" height="80" /></a>
                                    <?php }else echo '&nbsp;';?>
                                </td>
                                 
                                <td><?php echo date("d-M-Y",strtotime($row['stmCreatedOn']))?></td>
                                <?php if($row['piaDetails']==1 && USER_PRIVILEGE==2 && PORTAL_TYPE==1) { ?>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intInstituteId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
                              <?php } else if($row['piaDetails']==2 && USER_PRIVILEGE==2 && PORTAL_TYPE==2) {?>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intInstituteId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>

                                <?php } else if($row['piaDetails']==3 && USER_PRIVILEGE==2 && PORTAL_TYPE==3) {?>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intInstituteId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>

                                <?php } else if($row['piaDetails']==4 && USER_PRIVILEGE==2 && PORTAL_TYPE==4) {?>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intInstituteId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>

                              <?php } else if(USER_PRIVILEGE==0) { ?>
                                <td align="center" valign="middle" class="noPrint"><a href="<?php echo APP_URL?>addInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['intInstituteId'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
                              <?php } else { ?>
                                <td><?php echo "--";?></td>
                              <?php } ?>
                                <td width="10">
                                <?php if($row['vchInsMapCode']>0){?>
                                   <!--  <i class="link.png" aria-hidden="true"></i> -->
                                   <img src="<?php echo SITE_URL; ?>images/link.png" alt="link image" width="15px" height="15px"/>
                                <?php }else{?>

                                <?php }?>
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
