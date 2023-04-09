<?php
/* ================================================
  File Name           : viewGrevCategory.php
  Description		  : This is used for view the grievance category details.
  Author Name		  : Rahul Kumar Saw
  Date Created		  : 03-April-2023
  Update History	  : <Updated by>		<Updated On>		<Remarks>

  Style sheet           : 
  Javscript Functions   : 
  includes              : util.php, viewGrevCategoryInner.php

  ================================================== */
    require("viewGrevCategoryInner.php");
?>

<script language="javascript">
    $(document).ready(function () {
        loadNavigation('View Ticker');
        pageHeader   = "Complaint Category";
        strFirstLink = "Manage Grievance";
        strLastLink  = "Complaint Category";
        $('[data-rel=tooltip]').tooltip(); 
         
       
           printMe          = "yes";
           deleteMe         = "yes";		                
           publishMe        = "yes";
           unpublishMe      = "yes";

         if('<?php echo $outMsg;?>'!='')                
            viewAlert('<?php echo $outMsg;?>');
    });


     function validSl(totalVal)
      {
        var flag  = 0;
        $('.txtSLNo').each(function(){
          if(Number(this.value)==0)
          {
            alert('Sl Number must be greater than zero');
            this.focus();
            flag  = 1;
            return false;
          }
          if(Number(this.value)>Number(totalVal))
          {
            alert('Sl Number cannot greater than total records');
            this.focus();
            flag  = 1;
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
            
              <a href="<?php echo APP_URL ?>addGrevCategory/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a> 
            
              <a href="javascript:void(0);" class="btn btn-info active">View</a>
             
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>

			
           <div class="legandBox">			
                <span class="greenLegend">&nbsp;</span>Published Category(s) &nbsp;			
                <span class="yellowLegend">&nbsp;</span> Unpublished Category(s) &nbsp;
            </div> 
             <div id="viewTable">
                <?php if ($result->num_rows > 0) {
                    $ctr = $intRecno; ?>
                    <!-- <input type="button" name="btnUpdateSl" id="btnUpdateSl" class="btn btn-success noPrint" value="Update Sl. Number" onclick="return validSl(<?php echo $intTotalRec;?>)" style="margin-bottom:5px;"> -->
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20" class="noPrint">
                                    <label class="position-relative">
                                    <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label>
                                </th>
                                <th width="20">Sl.#</th>
                                <th>Category Name (In English)</th>  
                                <th>Category Name (In Odia)</th>  
                                <th>Description (In English)</th>                                 
                                <th>Description (In Odia)</th>                                 
                                <th>Created On </th>
                                <th width="30" class="noPrint">Edit</th>
                            </tr>
                        </thead>
              		<tbody>
                        <?php while ($row = $result->fetch_array()) {
                            
                            if($row['INT_PUBLISH_STATUS']==2)
                                $style	= 'class="greenBorder"';
                            else
                                $style	= 'class="yellowBorder"';
                                $ctr++; 
                                
                              
                         ?>
                            <tr>
                                <td <?php echo $style;?> class="noPrint">
                                    <label class="position-relative">
                                        <input type="checkbox" class="ace chkItem" value="<?php echo $row['INT_CATEGORY_ID'];?>"><span class="lbl"></span>
                                        <input type="hidden" id="hdnPubStatus<?php echo $row['INT_CATEGORY_ID'];?>" name="hdnPubStatus<?php echo $row['INT_CATEGORY_ID'];?>" value="<?php echo $row['tinPublishStatus'];?>"/>
                                    </label>
                                </td>
                               <td><?php echo $ctr;?>
                                <!-- <input type="text" class="txtSLNo" onkeypress="return isNumberKey(event);" name="txtSLNo<?php echo $row['intId'];?>" id="txtSLNo<?php echo $row['intId'];?>" value="<?php echo $row['intSlNo']; ?>" style="width:100%" maxlength="5"/> -->
                              </td>
                               <td> <?php  echo htmlspecialchars_decode($row['VCH_CATEGORY_NAME'],ENT_NOQUOTES);?> </td>
                                <td class="odia"> <?php  echo htmlspecialchars_decode($row['VCH_CATEGORY_NAME_O'],ENT_NOQUOTES);?> </td>                            
                                <td> <?php  echo htmlspecialchars_decode($row['VCH_DESCRIPTION'],ENT_NOQUOTES);?> </td>
                                <td class="odia"> <?php  echo htmlspecialchars_decode($row['VCH_DESCRIPTION_O'],ENT_NOQUOTES);?> </td>  
                                <td><?php echo date("d-M-Y",strtotime($row['DTM_CREATED_ON']))?></td>
                                
                               <td align="center" valign="middle" class="noPrint" style="<?php echo $editPriv; ?>"><a href="<?php echo APP_URL?>addGrevCategory/<?php echo $glId; ?>/<?php echo $plId; ?>/<?php echo $row['INT_CATEGORY_ID'] ?>" data-rel="tooltip" title="" data-original-title="Edit" class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </a></td>
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
            <?php if($result->num_rows > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                            <?php echo $objGrev->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                        </div>
                    </div>
                     <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                <?php echo $objGrev->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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