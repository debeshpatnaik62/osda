<?php
/* ================================================
  File Name       : viewPanelTag.php
  Description     : This is used for view the candidate tag details.
  Author Name     : Rahul Kumar Saw
  Date Created    : 05-Aug-2021
  Update History    : <Updated by>    <Updated On>    <Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, viewPanelTagInner.php

  ================================================== */
    require("sendEmailDetailsInner.php");
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Candidate Tag');
        pageHeader      = "View Candidate Tag";
        strFirstLink    = "Manage Skill Competition";
        strLastLink     = "View Candidate Tag";
        $('[data-rel=tooltip]').tooltip(); 
         
       
           printMe          = "yes";                    
           /*publishMe        = "yes";
           unpublishMe      = "yes";*/

         if('<?php echo $outMsg;?>'!='')                
                 viewAlert('<?php echo $outMsg;?>');
        $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });

       fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
       fillRegistrationPhase('<?php echo $regdType; ?>','selRegdType');
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
            
              <a href="<?php echo APP_URL ?>candidateTag/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
              <a href="<?php echo APP_URL; ?>viewPanelTag/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Email Details</a>
              <a href="<?php echo APP_URL; ?>panelTagData/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Panel Tag Data</a>
              <a href="javascript:void(0);" class="btn btn-info active">View Email Details</a>
             
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="searchTable">
              <div class="form-group">
                <label class="col-sm-1 control-label no-padding-right" for="selRegdType">Registration Type </label>
                    <div class="col-sm-2"> <span class="colon">:</span> 
                        <select class="form-control" name="selRegdType" id="selRegdType" >
                                <option value="">--All--</option>
                        </select>        
                    </div>

                     <label class="col-sm-1 control-label no-padding-right" for="ddlLevel">Level</label>
                    <div class="col-sm-2"> 
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlLevel" id="ddlLevel">
                           <option value="2" <?php if($intLevel=='2')echo 'selected="selected"'; ?>> Level-2 </option>  
                           <option value="3" <?php if($intLevel=='3')echo 'selected="selected"'; ?>> Level-3 </option>                                 

                        </select>
                     </div>
                     <label class="col-sm-1 control-label no-padding-right" for="txtStartDt">From Exam Date</label>
                        <div class="col-sm-2"> <span class="colon">:</span>
                            <div class="input-group">
                                <input class="form-control date-picker" id="txtStartDt" name="txtStartDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strStartDt!='0000-00-00')?date('d-m-Y',strtotime($strStartDt)):''; ?>">
                                 <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                            </div>
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-1 control-label no-padding-right" for="txtEndDt">To Exam Date</label>
                       <div class="col-sm-2"> <span class="colon">:</span>
                           <div class="input-group">
                               <input class="form-control date-picker" id="txtEndDt" name="txtEndDt" type="text" data-date-format="dd-mm-yyyy" value="<?php echo ($strEndDate!='0000-00-00')?date('d-m-Y',strtotime($strEndDate)):''; ?>">
                                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                           </div>
                       </div>  
                      
                      <div class="col-sm-2">
                        <input class="btn btn-success" name="btnSearch" type="submit" value="Show"/>
                     </div>                
              </div>
            </div>
         
             <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                               
                                <th width="20">Sl.#</th>
                                <th>Exam Date</th> 
                                <th>District </th>    
                                <th>Panel Name</th>                               
                                <th>Level</th> 
                                <th>Tagged Candidate </th> 
                                <th>Mail Sent Candidate </th> 
                                <th>Mail Failed Candidate </th> 
                                <th class="noPrint">Set Scheduler</th>
                            </tr>
                        </thead>
                  <tbody>
                        <?php while ($row = $result->fetch_array()) {
                            
                          
                                $ctr++; 
                                
                              
                         ?>
                            <tr>
                              
                                <td><?php echo $ctr; ?></td>
                                <td><?php echo date("d-M-Y",strtotime($row['stmExamDate']))?></td>
                                <td> 
                                    <?php echo (!empty($row['vchDistrictname']))?htmlspecialchars_decode($row['vchDistrictname'],ENT_QUOTES):'--'; ?>
                                </td>
                                <td><?php  echo htmlspecialchars_decode($row['panelName'],ENT_QUOTES);?> </td> 
                                <td><?php  echo htmlspecialchars_decode($row['intLevel'],ENT_QUOTES);?> </td>   
                               
                                <td><?php  echo $row['totalCan'];?> </td> 
                                <td><?php  echo $row['totalSent'];?> </td>
                                <td><?php  echo $row['totalCan']-$row['totalSent'];?> </td>
                               <td align="center" valign="middle" class="noPrint">
                              <a href="<?php echo SITE_URL; ?>cronSkillEmailLevel/<?php echo $objPanel->encrypt($row['intPanelId'].'='.$row['stmExamDate'].'='.$row['intLevel']) ; ?>" class="btn btn-xs btn-info" target="blank">Send Email</a>
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
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
