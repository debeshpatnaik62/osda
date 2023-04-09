<?php
/* ================================================
  File Name           : addCalender.php
  Description         : This is used for add Category .
  Designed By         :
  Designed On         : 
  Devloped By         : Rahul Kumar Saw
  Devloped On         : 24-March-2023
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet         : 
  Javscript Functions : ckeditor.js, validatorchklist.js
  includes            : util.php,addCalenderInner.php      

  ================================================== */

require 'addCalenderInner.php';
$arrayWeek    = array('0'=>array('Sunday',6),'1'=>array('Monday',0),'2'=>array('Tuesday',1),'3'=>array('Wednesday',2),'4'=>array('Thursday',3),'5'=>array('Friday',4),'6'=>array('Saturday',5));
?>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/bootstrap-year-calendar.min.css">
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/clockpicker.css">
<script src="<?php echo APP_URL; ?>js/clockpicker.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        loadNavigation('<?php echo $strTab; ?> Calender');
        
        /// auric 
        dateTime('clock');
        $('.clockpicker').clockpicker();
             
        $('#btnConfirmOk').on('click',function()
        {
             $(this).closest('#confirmModal').find(".modal-body").html('<center><img src="<?php echo APPURL;?>img/loading.gif"><p> Loading... <p></center>');
              $('#hdnQs').val('U');
              $('form').submit();
              return false;
        });
          
          
          ////
          
          $('.chkweekItem').on('click',function()
          {
              
              var holidayData=this.value;
             // var weekendIsChecked = $('input[name="txtChk[]"]:checked').length;
             //if(weekendIsChecked>0){
                    fetchCalenderEvent(<?php echo $id; ?>);
               // }
              //calendarFunList('','',holidayData);
          });   

     });

    function getCalenderName(){
  
    var calName=$('#selVendorName').find("option:selected").text();
    $("#txtCalandarName").val(calName);
  
    }
   // Function to validate all field 
    function validator()
    { 
        
        var timefrom = new Date();
        var workingTimeFrom = $('#txtTmFrom').val().split(":");
        timefrom.setHours((parseInt(workingTimeFrom[0]) - 1 + 24) % 24);
        timefrom.setMinutes(parseInt(workingTimeFrom[1]));

        var timeto = new Date();
         var workingTimeTo = $('#txtTmTo').val().split(":");
        timeto.setHours((parseInt(workingTimeTo[0]) - 1 + 24) % 24);
        timeto.setMinutes(parseInt(workingTimeTo[1]));
            
            if(!selectDropdown('selVendorName','Select Vendor'))
            return false;
            if(!blankCheck('txtTmFrom', 'Working time can not be left blank'))
            return false;
            if(!blankCheck('txtTmTo', 'Working time can not be left blank'))
            return false;
            if(timefrom>timeto){
                
                viewAlert("Start Working Time should't be greater then End Working Time");
                return false;
             }
            //===== confirmalert for add/update page
            if(<?php echo $id; ?>==0)
            {
                confirmAlert("Are you sure you wish to submit ?");
                $('#hdnQs').val('U');
            }
            if(<?php echo $id?>!=0 || <?php echo $id?> >0)
            {
                confirmAlert("Are you sure you wish to update ?");
                $('#hdnQs').val('U');
            } 
    }
        
</script>
<div class="page-content">
    <div class="page-header">
        <h1 id="title"></h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="top_tab_container"> 
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a>
                <a href="<?php echo APP_URL; ?>viewCalender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-3">
             <div class="form-group">
                <label for="selCopyFrom">Select Vendor  <span class="text-danger">*</span></label>
                <select name="selVendorName" id="selVendorName" class="form-control"  onchange="getCalenderName()" <?php if($viewData == 'view'){?> disabled <?php }?> >
                    <option value="0">- Select -</option>
                    <option value="1" <?php if($vendorId==1) echo 'selected="selected"'; ?> >OSDA</option>
                </select>
                <input type="hidden" class="form-control" id="txtCalandarName" name="txtCalandarName" value="<?php echo $vchName; ?>" placeholder="Calandar Name" >
            </div> 
                <div class="form-group" style="display:none">
                   <label for="txtCalandarName">Calandar Name  <span class="text-danger">*</span></label>
                   <input type="text" class="form-control" id="txtCalandarNamed" name="txtCalandarNamed" value="<?php echo $vchName; ?>" placeholder="Calandar Name" >
                </div>
             
                <div class="form-group">
                   <label for="txtCalandarName">Holiday </label><br/>
                   <?php $k=0;
                   foreach ($arrayWeek as $arrayWeek){
                      
                     if($strHolidayWeek!=''){
                     $holidayList=explode(',',$strHolidayWeek);
                    if(count($holidayList)>0){
                            if (in_array($arrayWeek[1], $holidayList)){
                                //echo $k;
                                 $select='checked';
                            }else{
                                 $select='';
                            }
                        } 
                     }
?>            
                    <span class="checkbox-inline" style="margin-left:0px;">
                       
                        <input type="checkbox" name="txtChk[]" class="ace chkweekItem" id="txtChk<?php echo $k; ?>" data-val='<?php echo $k; ?>' value="<?php echo $arrayWeek[1]; ?>" <?php echo $select; ?>  <?php if($viewData == 'view'){?> disabled <?php }?> >
                        <label for="txtChk<?php echo $k; ?>"><?php echo $arrayWeek[0]; ?></label>  
                      
                    </span>
                   
                    <?php  $k++;} ?>
                   
                </div> 
             
                    <label for="WorkingTime">Working Time  <span class="text-danger">*</span></label>
                <div class="form-group">
                    <div class="col-sm-6" style="padding-left: 0px;">
                        <div class="input-group <?php if($viewData != 'view'){?> clockpicker <?php }?>" data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" id="txtTmFrom" name="txtTmFrom" value="<?php echo $strTmFrom; ?>" class="form-control" autocomplete="off"  <?php if($viewData == 'view'){?> disabled <?php }?> >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                        </div>
                    </div>
                    <div class="col-sm-6" style="padding-right: 0px;">
                        <div class="input-group <?php if($viewData != 'view'){?> clockpicker <?php }?> " data-placement="bottom" data-align="top" data-autoclose="true">
                            <input type="text" id="txtTmTo" name="txtTmTo" value="<?php echo $strTmTo; ?>" class="form-control" autocomplete="off"  <?php if($viewData == 'view'){?> disabled <?php }?> >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                     </div>
                 </div>
                 <input type="hidden" id="hdnViewData" name="hdnViewData" value="<?php echo $viewData; ?>" />
                 <?php if($viewData != 'view'){?>
                 <div class="form-group">                            
                    <input type="hidden" id="hdnAddData" name="hdnAddData" />
                    <input type="hidden" id="hdnQs" name="hdnQs" />
                   <input type="button" class="btn btn-primary" value="<?php echo $strSubmit; ?>" name="btnSave" id="btnSave" onclick="validator();" />
                </div> 
                 <?php }?>
         </div>
           <div class="col-xs-9">
            <!-- PAGE CONTENT BEGINS -->  

                    <div class="panel panel-inverse innerpagebox" data-sortable-id="table-basic-1">

                    <div class="panel-heading" style="margin-top: -10px;">
                    <div class="row">
                      <div class="col-sm-6">
                        <div ><p class="text-primary mrgn-btm0 pull-left"><span class="fixed_span  mrgn-lft0"></span>Fixed Holiday  &nbsp; &nbsp;  </p>
                        <p class="text-primary0 mrgn-btm0 pull-left mrgn-btm0"><span class="optional_span  mrgn-lft0"></span>Optional Holiday</p></div>
                        </div>
                        <?php if($viewData != 'view'){?>
                      <div class="col-sm-6">
                       <p class=" text-right mrgn-btm0"><span class="text-danger">* Click on date for add holiday</span> &nbsp; | &nbsp; <span class="text-danger">* Right click on date for update or delete holiday</span></p>  
                      </div>
                        <?php }?>
                    </div>
                    
                    </div>
         <div class="panel-body"> 
            
             <div class="" id="viewTable">         

                <div id="calendar" class="calendar"  style="overflow:initial"></div>
<!-- modal popup box -->
    <div class="modal modal-fade" id="event-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Holiday </h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="event-index">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="min-date" class="col-sm-4 control-label">Holiday Name</label>
                        <div class="col-sm-7">
                            <span class="colon">:</span>
                            <input id="event-name" max-length="50" name="event-name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="ddl-holiday">Holiday Type</label>
                        <div class="col-sm-7">
                            <span class="colon">:</span>
                            <select id="ddl-holiday" name="ddl-holiday" class="form-control">
                             <!-- <option value="0">Select</option> -->
                              <option value="1">Fixed Holiday</option>
                              <option value="2">Optional Holiday</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="min-date" class="col-sm-4 control-label">Dates</label>
                        <div class="col-sm-7">
                            <span class="colon">:</span>
                            <!-- data-provide="datepicker"-->
                            <div class="input-group input-daterange"  data-provide="datepicker">
                                <input id="event-start-date" name="event-start-date" type="text" data-date-format="dd-mm-yyyy" class="form-control date-picker" value="<?php echo date('Y-m-d'); ?>">
                                <span class="input-group-addon">to</span>
                                <input id="event-end-date" name="event-end-date" type="text" data-date-format="dd-mm-yyyy" class="form-control date-picker" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
               <div class="col-sm-4">
                </div>
              <div class="col-sm-8 text-left">
               <button type="button" class="btn btn-auric-blue btn-sm" id="save-event">
                    Save
                </button>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
               </div>


            </div>
        </div>
    </div>
</div>

<!-- modal popup box end -->
            </div>
        </div>
        <!-- /.col --> 
    </div>

            <div class="hr hr32 hr-dotted"></div>
            <!-- PAGE CONTENT ENDS -->
        </div>
            <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.page-content -->

<script type="text/javascript" src="<?php echo APP_URL; ?>js/bootstrap-popover.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>js/bootstrap-year-calendar.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>js/loadAjax.js"></script>

<script type="text/javascript">  
$(function() {
        pageHeader   = "Manage Holiday";
        strFirstLink = "Manage Grievance";
        strLastLink  = "Manage Holiday";
    var currentYear = new Date().getFullYear();
    
        fetchCalenderEvent(<?php echo $id; ?>);
    
    
    $('#save-event').click(function() {
        saveEvent();        
    });
          <?php if($outMsg != '' && $_POST['hdnQs']=='U') { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>
        
});   
</script>
<style type="text/css">
.optional_span{
    width: 15px;
    height: 15px;
    float: left;
    background-color: #D2AC2B;
    margin: 2px 4px 0px 10px;
    border: #ccc 1px solid;
}
.fixed_span{
   width: 15px;
    height: 15px;
    float: left;
    background-color: #064469;
    margin: 2px 4px 0px 10px;
    border: #ccc 1px solid;
}
</style>

