<?php
/* ================================================
  File Name           : candidateTag.php
  Description         : This is used for tag candidate with panel.
  Designed By         :
  Designed On         : 
  Devloped By         : Rahul Kumar Saw
  Devloped On         : 05-Aug-2021
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet         : 
  Javscript Functions : ckeditor.js, validatorchklist.js
  includes            : util.php,addVenueInner.php           :
03374
  ================================================== */

require 'candidateTagInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>

<script src="<?php echo APP_URL; ?>js/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/jquery.timepicker.css">
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  Candidate Tag";
        strFirstLink = "Manage Skill Competition";
        strLastLink  = "Candidate Tag"; 
        loadNavigation('<?php echo $strTab; ?> Candidate Tag');
        
        indicate = 'yes';
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true,
          startDate: new Date()
        });
        
        $('.time-picker').timepicker({ 'step': 30 });
        $('.time-picker').timepicker('option', { useSelect: true });

        $('#txtHeadlineE').focus();

        $('#btnSubmit').click(function(){
        selectAll('ddlCourseName1', true);
        });
      
         //fill the districts details
           fillDistricts('<?php echo $intDist; ?>','ddlDist');
           fillIndiaSkill('<?php echo $intSkill;?>','selSkill');
           fillPanel('<?php echo $strPanel; ?>','ddlPanel','0','0');
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } 
       if($id>0) { ?>
        fillDistricts('<?php echo $distId; ?>','ddlDist');
        fillIndiaSkill('<?php echo $skillId;?>','selSkill');
        fillPanel('<?php echo $strPanel; ?>','ddlPanel','0','0');
        //fillAssignedMembers('ddlCourseName1',0,'<?php echo $skillId;?>','<?php echo $distId;?>','<?php echo $venueId;?>');  
        <?php } ?> 

        });
     //function to validate the venue tagged
        function validator()
        {     
            if(!selectDropdown('selLevelType', 'Select Level'))
             return false;
           if(!selectDropdown('selVenue', 'Select Venue'))
             return false;
            if(!selectDropdown('ddlPanel', 'Select Panel Name'))
             return false;
           /* if(!selectDropdown('selVenue', 'Select District'))
             return false;*/
            if(!selectDropdown('selSkill', 'Select Skill'))
             return false;

           if (!blankCheck('txtExamDate', 'Exam Date cannot be left blank'))
                return false;
            if (!checkSpecialChar('txtExamDate'))
                return false;
            
            if(!blankCheck('ddlCourseName1','Please Tag Applicant'))
                return false;
            selectAll('ddlCourseName1',true);
           
         }

          selectAll('ddlCourseName1', true);
          function selectAll(selectBox,selectAll) { 
          // have we been passed an ID 
          if (typeof selectBox == "string") { 
            selectBox = document.getElementById(selectBox);
          } 
          // is the select box a multiple select box? 
          if (selectBox.type == "select-multiple")
          { 
              for (var i = 0; i < selectBox.options.length; i++) { 
                 selectBox.options[i].selected = selectAll; 
              } 
          } 
          }

         function fillCountMembers(){
       
            if($("#selSkill").val()==0){
             
              setTimeout(function(){
              $('#showzp').hide();
              }, 300);
            }
        if($("#selSkill").val()!=0){
             $('#showzp').show();
           var txt = $("#selSkill option:selected").text();
            //alert($("#ddlCourseName option").length);
            var totalMember = $("#ddlCourseName option").length;
            $('#showzp').html('Total No. of'+' '+txt+' : '+totalMember);
        }
       }

         function serachDetails()
          {
            if($('#selLevelType').val()==0)
            {
              viewAlert("Please select Level",'selLevelType');
              return false;
            }
            if($('#selVenue').val()==0)
            {
              viewAlert("Please select Venue Name",'selVenue');
              return false;
            }
            if($('#ddlPanel').val()==0)
            {
              viewAlert("Please select Panel Name",'ddlPanel');
              return false;
            }
            /*else if($('#ddlDist').val()==0)
            {
              viewAlert("Please select District ",'ddlDist');
              return false;
            }*/
            else if($('#selSkill').val()==0)
            {
              viewAlert("Please select Skill ",'selSkill');
              return false;
            }
            /*else if($('#selLevelType').val()==0)
            {
              viewAlert("Please select qualified level ",'selLevelType');
              return false;
            }*/
            else
            {
              fillCandidate('ddlCourseName',$('#ddlDist').val(),$('#selSkill').val(),$('#selLevelType').val());
              //fillCountMembers();
            }
          }


          function assignCourse()
          {
              var userCount = $("#ddlCourseName option:selected").length;
              var ddlCourseName = 'ddlCourseName';
              var selAll = 'ddlCourseName1'
              var selectedLen = $("#" + selAll + " > option:selected").length;
              
              
              if (userCount == '0' || (userCount == 1 && ($("#ddlCourseName").val() == 0)))
              {
                  viewAlert('Please select Applicant Name');
                  $('#ddlCourseName').focus();
                  return false;
              }
              
              $("#" + ddlCourseName + " > option:selected").each(function () {
                  var userVal = this.value;
                  if (userVal != 0) {
                      var flag = 0;
                      $("#" + selAll + " > option").each(function () {
                          var selectUser = this.value;
                          if (selectUser == userVal)
                              flag = 1;
                      });
                      if (flag == 0)
                          $(this).remove().appendTo("#" + selAll);
                      
                      else
                          viewAlert('This Applicant name is already selected');
                  }
              });
                     
              $('#countMember').html($("#ddlCourseName1 option").length);
             
          }

          //function to assign all by Rahul Kumar Saw On 21-Apr-2021
    function assignAll()
    {
        var userCount = $("#ddlCourseName").length;
        var ddlCourseName = 'ddlCourseName';
        var selAll = 'ddlCourseName1'
        var selectedLen = $("#" + selAll + " > option:selected").length;
        
        
        if (userCount == '0' || (userCount == 1 && ($("#ddlCourseName").val() == 0)))
        {
            viewAlert('Please select Applicant name');
            $('#ddlCourseName').focus();
            return false;
        }
      else
      {
        var options = $('#ddlCourseName option').sort().clone();
          $('#ddlCourseName1').append(options);
        $('#ddlCourseName option').remove();
        
      }
        
        $("#" + ddlCourseName + " > option:selected").each(function () {
            var userVal = this.value;
            if (userVal != 0) {
                var flag = 0;
                $("#" + selAll + " > option").each(function () {
                    var selectUser = this.value;
                    if (selectUser == userVal)
                        flag = 1;
                });
                if (flag == 0)
                    $(this).remove().appendTo("#" + selAll);
                
                else
                    viewAlert('This Applicant name is already selected');
            }
        });
               
        $('#countMember').html($("#ddlCourseName1 option").length);
       
    }
  //function to Remmove all by Rahul Kumar Saw On 21-Apr-2021
  function removeAll()
    {
        if ($('#ddlCourseName1').val() == 0)
        {
            viewAlert("Please select Applicant name");
            $('#ddlCourseName1').focus();
            return false;
        }
        var ddlCourseName = 'ddlCourseName';
        var selAll = 'ddlCourseName1'
    var options = $('#ddlCourseName1 option').sort().clone();
      $('#ddlCourseName').append(options);
    $('#ddlCourseName1 option').remove();
        
       $('#countMember').html($("#ddlCourseName1 option").length);
    }
  //function to Remmove by Rahul Kumar Saw On 21-Apr-2021
    function removeCourse()
    {
        if ($('#ddlCourseName1').val() == 0)
        {
            viewAlert("Please select Applicant name");
            $('#ddlCourseName1').focus();
            return false;
        }
        var ddlCourseName = 'ddlCourseName';
        var selAll = 'ddlCourseName1'

        $("#" + selAll + " > option:selected").each(function () {
            var userVal = this.value;
            if (userVal != 0) {
                var flag = 0;
                $("#" + ddlCourseName + " > option").each(function () {
                    var selectUser = this.value;
                    if (selectUser == userVal)
                        flag = 1;
                });
                if (flag == 0)
                    $(this).remove().appendTo("#" + ddlCourseName);
                else
                    $(this).remove();
                    //viewAlert('This Trainee is exist in destination list');
            }
        });
        
       $('#countMember').html($("#ddlCourseName1 option").length);
    }
    
    $(document).ready(function() {
    $("#btnReset").click(function() {
      $('#frmOGP')[0].reset();
      $("#ddlDist").val(0);
      $("#ddlPanel").val(0);
      $("#selSkill").val(0);
      $("#txtExamDate").html('');
      $("#ddlCourseName").html('');
      $("#ddlCourseName1").html('');
      return false;
    });
  });

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
                <a href="<?php echo APP_URL; ?>viewPanelTag/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
                <a href="<?php echo APP_URL; ?>panelTagData/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Panel Tag Data</a>
                <a href="<?php echo APP_URL; ?>sendEmailDetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Email Details</a>
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
              <div class="searchTable" id="searchPanel">
                <div class="form-group" >
                    <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="selLevelType">Select Level</label>
                        <select class="form-control" name="selLevelType" id="selLevelType" onchange="fillVenue(0,'selVenue',this.value)">
                                <option value="0">--All--</option>
                                <option value="2" <?php if($intLevelType==2)echo 'selected="selected"'; ?>>Level-2</option>
                                <option value="3" <?php if($intLevelType==3)echo 'selected="selected"'; ?>>Level-3</option>               
                        </select>
                        <span class="mandatory">*</span>
                                 
                    </div>
                    <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="selVenue">Venue Name</label>
                        <select class="form-control" name="selVenue" id="selVenue" onchange="fillPanel(0,'ddlPanel',$('#selLevelType').val(),this.value)" >
                            <option value="0">- Select -</option>                             
                        </select>
                        <span class="mandatory">*</span>
                   </div>

                   <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="ddlPanel">Panel Name</label>
                        <select class="form-control" name="ddlPanel" id="ddlPanel">
                           <option value="0">- All -</option>                                 
                        </select>
                        <span class="mandatory">*</span>
                   </div>

                   <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="ddlDist">Select District</label>
                        <select class="form-control" name="ddlDist" id="ddlDist">
                            <option value="0">- Select -</option> 
                            
                        </select>
                          <!-- <span class="mandatory">*</span> -->              
                    </div>                                  
                    
                    <div class="col-sm-3">
                      <label class="control-label no-padding-right" for="selSkill">Skill</label>
                        <select class="form-control" name="selSkill" id="selSkill" >
                                <option value="0">--Select Skill--</option>
                                
                        </select> 
                        <span class="mandatory">*</span>        
                    </div>

                    

                    <!-- <div class="col-sm-3">
                      <label class="control-label no-padding-right" for="selLevelType">Qualified Level</label>
                        <select class="form-control" name="selLevelType" id="selLevelType" >
                                <option value="0">--All--</option>
                                <option value="1" <?php if($intLevelType==1)echo 'selected="selected"'; ?>>L1</option>
                                <option value="2" <?php if($intLevelType==2)echo 'selected="selected"'; ?>>L2</option>               
                        </select>
                        <span class="mandatory">*</span>
                                 
                    </div> -->

                    <div class="col-sm-1">
                      <label></label>
                        <input class="btn btn-success margin-left-10 mt-2" id="btnSearch" name="btnSearch" type="button" value="Show" onclick="serachDetails();"/>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtExamDate">Exam Date</label>
                <div class="col-sm-4"> <span class="colon">:</span>
                  <div class="input-group">
                    <input type="text" data-date-format="dd-mm-yyyy" name="txtExamDate" id="txtExamDate" class="form-control date-picker" value="<?php echo $examDate; ?>">
                    <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
                  <span class="mandatory">*</span> </div>
                <label class="col-sm-1 control-label no-padding-right" for="txtExamTime">Exam Time</label>
                <div class="col-sm-2"> <span class="colon">:</span>
                  <div class="input-group">
                    <input type="text" name="txtExamTime" id="txtExamTime" class="form-control time-picker" value="<?php echo $examTime; ?>">
                    <span class="mandatory" style="margin: 8px -12px 0px 0px;">*</span>
                  </div>
                   </div>
              </div>

              <label><span id="showzp" style="margin-left:10px;" class="badge badge-primary"></span> </label>
                <div class="form-group" >
                <label class="col-sm-2 control-label no-padding-right" for="ddlCourseName">Tag Applicant </label>
                <div class="col-sm-4"> <span class="colon">:</span>
                  <select id="ddlCourseName" multiple class="form-control" name="ddlCourseName" style="height:300px;">
                  </select>
                  <span class="mandatory">*</span> </div>
                <div class="col-sm-1 center"> <a href="javascript:void(0);" class="btn btn-xs btn-info" style="margin-top:8px;width:86px;padding: 4px;font-size: 1.3rem;" onclick="assignCourse();">Select</a> <br>
                  <a href="javascript:void(0);" class="btn btn-xs btn-warning " style="margin-top:8px;width:86px;padding: 4px;font-size: 1.3rem;" onclick="removeCourse();" id="btnRemove">Remove</a> <br>
                  <a href="javascript:void(0);" class="btn btn-xs btn-primary" style="margin-top:8px;width:86px;padding: 4px;font-size: 1.3rem;" onclick="assignAll();">Select All</a> <br>
                  <a href="javascript:void(0);" class="btn btn-xs btn-warning " style="margin-top:8px; width:86px;padding: 4px;font-size: 1.3rem;" onclick="removeAll();" id="btnRemove">Remove All</a> </div>
                <div class="col-sm-4">
                  <select id="ddlCourseName1" multiple class="form-control" name="ddlCourseName1[]" style="height:300px;">
                  </select>
                </div>
                <div class="col-sm-1 center"> <span id="countMember" class="badge badge-primary" ></span> </div>
              </div>
              <div class="form-group" id="btnDisplay" >
                <div class="col-sm-2 no-padding-right"></div>
                <div class="col-sm-4">
                  <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="btn btn-success" onclick="return validator();" />
                  <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="Reset" onclick="<?php echo $strclick; ?>" />
                  <input type="hidden" id="hdnTotalLevel" name="hdnTotalLevel" value="<?php echo $totalLavel; ?>"/>
                  <input type="hidden" id="hdnDistTotalLevel" name="hdnDistTotalLevel" value="<?php echo $totalDistRes; ?>"/>
                  <input type="hidden" id="hdnAction" name="hdnAction" />
                  <input type="hidden" id="hdnIDval" name="hdnIDval"/>
                  <input type="hidden" id="hdnTraineeCatId" name="hdnTraineeCatId"/>
                </div>
              </div> 
               
            </div>
       
            <div class="hr hr32 hr-dotted"></div>
            <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.page-content -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#chkbxAll').click(function(){
            if($(this).is(":checked")){
              $('.chkbxSelected').prop('checked',true);
            }
            else if($(this).is(":not(:checked)")){
                $('.chkbxSelected').prop('checked',false);
            }
        });
    });
</script>

