<?php
    /* ================================================
    File Name             : viewCalender.php
    Description         : This is used for view Calender details.
    Author Name           : Rahul kumar Saw
    Date Created          : 
    Devloped On           : 03-04-2023
    Devloped By           : Rahul kumar Saw
    Update History        : <Updated by>    <Updated On>    <Remarks>

    Javscript             : validatorchklist.js
    includes          : util.php,viewCalenderInner.php

    ==================================================*/
    require_once 'viewCalenderInner.php';
    $pageName     = 'View Holiday';
    $firstNav     = 'Manage Grievance';
    $secondNav    = 'Manage Holiday';
?>
<style type="text/css">
    .hideNow{
        display: none;
    }
</style>
<script src="<?php echo APP_URL; ?>js/loadComponent.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>js/clipboard.min.js"></script> 
<script>
    $(document).ready(function () 
    { 
             loadNavigation('<?php echo $pageName; ?>','<?php echo $firstNav; ?>','<?php echo $secondNav; ?>');

             //loadHeader('<?php echo $pageName;?>'); 

             viewSearchPannel('<?php echo $openFlag; ?>', 'searchPanel', 'chkSearch');   
           
            if('<?php echo $outMsg;?>'!='')
              viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
              
            //fillVendorName('selVendorName',0,'<?php echo $vendorId;?>'); 
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
               
                <a href="<?php echo APP_URL?>addCalender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Add</a>
                <a href="javascript:void(0);" class="btn btn-info active">View</a>
                 </div>
                <?php include('includes/util.php'); ?>
                <div class="hr hr-solid"></div>
                
                <input type="hidden" id="title" value="Holiday Details" />    
                <div class="table-responsive" id="viewTable">
                <?php if ($result->num_rows > 0) {
          
            $ctr = $intRecno; ?>   
          <table class="table  table-bordered table-hover" cellpadding="2" cellspacing="0">
            <tr>  
                <th width="40" rowspan="2" class="noPrint"><label class="position-relative"> <input type="checkbox" class="ace chkAll"><span class="lbl"></span></label></th>
                <th width="40" rowspan="2">Sl.#</th>
                <th rowspan="2">Vendor Name</th>
                 <th rowspan="2">Weekend</th>
                <th colspan="2">Working time</th>
                <th rowspan="2" width="120" class="noPrint">Action</th>
            </tr>
            <tr>
                   <th rowspan="">From</th>
                  <th colspan="">To</th>
            </tr>
          
            <tbody>
            <?php 
              $arrayWeek=array('0'=>'Monday','1'=>'Tuesday','2'=>'Wednesday','3'=>'Thursday','4'=>'Friday','5'=>'Saturday','6'=>'Sunday');
                while ($row = $result->fetch_array()) 
                { 
                   //echo'<pre>'; print_r($row['vchHolidayWeek']);    echo'</pre>';                
                    
                    $intId         =$row['intId'];
                    $intOrgId     = $row['intOrgId'];
                    $vchName      =   (!empty($row['vchName']))?ucfirst(htmlspecialchars_decode($row['vchName'],ENT_QUOTES)):'---';
                    $timeFrom     = (!empty($row['timeFrom']))? $row['timeFrom']: "--" ;
                    $timeTo       = (!empty($row['timeTo']))?$row['timeTo']: "--" ;
                    $holidayWeek    =$row['vchHolidayWeek'] ;
                    //echo $holidayWeek;
                    if($holidayWeek!=""){
                        $allHoliday=explode(',',$holidayWeek);
                      
                        $data='';
                       if(count($allHoliday)>0){
                       foreach( $allHoliday as $allHoliday){
                           $data.=$arrayWeek[$allHoliday].' ,';
                       }
                       }
                       else{
                           $data=$arrayWeek[$holidayWeek];
                       }
                       //echo $data;
                    }else{
                        $data='--';
                    }

                     $data = substr($data,0,-1);

                      $ctr++;
            ?>    
            <tr>
                 <td class="noPrint">
                    <label class="position-relative">
                       <input type="checkbox" class="ace chkItem" value="<?php echo $intId;?>"><span class="lbl"></span>
                       <input type="hidden" id="hdnPubStatus<?php echo $intId;?>" name="hdnPubStatus<?php echo $intId;?>" value=""/>
                      </label>
                 </td>
                <td><?php echo $ctr; ?></td>
                <td><?php echo $vchName; ?></td>
                <td><?php echo $data;?></td>
                <td><?php echo date('h:i A',strtotime($timeFrom)); ?></td>
                <td><?php echo date('h:i A',strtotime($timeTo)); ?></td>
                <td class="noPrint" align="">
                    <a href="<?php echo APP_URL; ?>addCalender/<?php echo $row['intId']; ?>" class="btn btn-sm btn-auric-blue" data-toggle="tooltip" data-placement="top" title="Click here to Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <!-- <a href="<?php echo APP_URL; ?>addCalender/<?php echo $row['intId']; ?>/view" class="btn btn-sm btn-auric-blue" data-toggle="tooltip" data-placement="top" title="Click here to View Details">View</a> -->                            
                </td> 

            </tr>
            </tbody>
            <?php } ?>
          </table>
                    <input type="hidden" id="hdnAction" name="hdnAction" value="">
                    <input type="hidden" id="hdnDel" name="hdnDel" value="">
                    <input name="hdn_ids" id="hdn_ids" type="hidden" />
                    <input name="hdn_qs" id="hdn_qs" type="hidden" />
                    <input name="hdn_PageNo" id="hdn_PageNo" type="hidden" value="<?php echo $intPgno; ?>" />
                    <input name="hdn_RecNo" id="hdn_RecNo" type="hidden" value="<?php echo $intRecno; ?>" />
                    <input name="hdn_IsPaging" id="hdn_IsPaging" type="hidden" value="<?php echo $isPaging; ?>" />
            <?php } else { ?>
                <div class="noRecord">No record found</div>
            <?php } ?> 
        </div>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <div class="row noPrint">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="sample-table-2_info">
                            <?php if ($intTotalRec > $intPgSize) { ?><a href="#" onClick="AlternatePaging();"><?php echo ($isPaging == 0) ? "Show All" : "Show Paging"; ?></a>/ <?php } ?> 
                                <?php echo $objCareer->getPageNumbers($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>
                                                    </div>
                                                </div>
                                <?php if ($isPaging == 0 && $intTotalRec > $intPgSize) { ?>
                                                    <div class="col-xs-6">
                                                        <div class="dataTables_paginate paging_bootstrap">
                                                            <ul class="pagination">
                                    <?php echo $objCareer->getPaging($intTotalRec, $intCurrPage, $intPgSize, $isPaging); ?>                    
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