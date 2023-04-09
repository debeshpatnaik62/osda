<?php
/* ================================================
  File Name           : venueTag.php
  Description         : This is used for add Venue details.
  Designed By         :
  Designed On         : 
  Devloped By         : Rahul Kumar Saw
  Devloped On         : 20-April-2021
  Update History      : <Updated by>        <Updated On>        <Remarks>
  Style sheet         : 
  Javscript Functions : ckeditor.js, validatorchklist.js
  includes            : util.php,addVenueInner.php           :

  ================================================== */

require 'venueTagInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script src="<?php echo APP_URL; ?>js/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/jquery.timepicker.css">
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  Venue Tagged";
        strFirstLink = "Manage Venue";
        strLastLink  = "Venue Tagged"; 
        loadNavigation('<?php echo $strTab; ?> Venue Tagged');
        
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
           fillRegistrationPhase('<?php echo $intRegdType; ?>','selRegdType');
         
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } 
       if($id>0) { ?>
        fillDistricts('<?php echo $distId; ?>','ddlDist');
        fillIndiaSkill('<?php echo $skillId;?>','selSkill');
        fillVenueName('<?php echo $venueId;?>','ddlVenue','<?php echo $distId; ?>');
        fillAssignedMembers('ddlCourseName1',0,'<?php echo $skillId;?>','<?php echo $distId;?>','<?php echo $venueId;?>');  
        <?php } ?> 

        });
     //function to validate the venue tagged
        function validator()
        {     
         
            if(!selectDropdown('ddlDist', 'Select District'))
             return false;
            if(!selectDropdown('ddlVenue', 'Select Venue'))
             return false;
            if(!selectDropdown('selSkill', 'Select Skill'))
             return false;
            /*if(!selectDropdown('selRegdType', 'Select Registration Type'))
             return false;*/


            if (!blankCheck('txtExamDate', 'Exam Date cannot be left blank'))
                return false;
            if (!checkSpecialChar('txtExamDate'))
                return false;
            /*if (!selectDropdown('selLevel','Select Level'))
                return false;*/
            if(!blankCheck('ddlCourseName1','Please Tag Applicant'))
                return false;
            //selectAll('ddlCourseName1',true);
           
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
            if($('#ddlDist').val()==0)
            {
              viewAlert("Please select District",'ddlDist');
              return false;
            }
            else if($('#ddlVenue').val()==0)
            {
              viewAlert("Please select Venue ",'ddlVenue');
              return false;
            }
            else if($('#selSkill').val()==0)
            {
              viewAlert("Please select Skill ",'selSkill');
              return false;
            }
            else
            {
              fillMembers('ddlCourseName',$('#ddlDist').val(),$('#selSkill').val(),$('#selRegdType').val());
              //fillCountMembers();
              countAssignedMembers('',0,$('#selSkill').val(),$('#ddlDist').val(),$('#ddlVenue').val()); 
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
      $("#ddlVenue").val(0);
      $("#selSkill").val(0);
      $("#txtExamDate").html('');
      $("#ddlCourseName").html('');
      $("#ddlCourseName1").html('');
      return false;
    });
  });

  function setCapacity(elm){
    
    var dataVal=$('#'+elm+' option:selected').data('value');
    var dataId=$('#'+elm+' option:selected').data('id');

        $('#txtSeatNumberTot').html(dataVal);
        $('#txtSeatNumberAvail').html(dataId);
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
                <a href="<?php echo APP_URL; ?>viewVenueTag/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
                <a href="<?php echo APP_URL ?>candidatTagData/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Tag Data</a> 
                <a href="<?php echo APP_URL ?>sendEmailCandidateDetails/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View Email Details</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
              <div class="searchTable" id="searchPanel">
                <div class="form-group" >
                    
                    <div class="col-sm-2">
                      <label class="control-label no-padding-right" for="ddlDist">Select District</label>
                        <select class="form-control" name="ddlDist" id="ddlDist" onchange="fillVenueName(0,'ddlVenue',this.value)">
                            <option value="0">- Select -</option> 
                            
                        </select>
                          <span class="mandatory">*</span>              
                    </div>
                
                    
                    <div class="col-sm-3">
                      <label class="control-label no-padding-right" for="txtName">Venue Name </label>
                       
                        <select class="form-control" name="ddlVenue" id="ddlVenue" onchange="setCapacity(this.id);" >
                            <option value="0">- Select Venue -</option> 
                            
                        </select>
                          <span class="mandatory">*</span>  
                            <p class="text-info mb-0" id="txtSeat" >(<span id="txtSeatNumberAvail">0</span> out of <span id="txtSeatNumberTot">0</span> Seats are Available)</p>          
                    </div>
                                  
                    
                    <div class="col-sm-3">
                      <label class="control-label no-padding-right" for="selSkill">Skill</label>
                        <select class="form-control" name="selSkill" id="selSkill" >
                                <option value="0">--Select Skill--</option>
                                
                        </select> 
                        <span class="mandatory">*</span>        
                    </div>

                    <div class="col-sm-3">
                      <label class="control-label no-padding-right" for="selRegdType">Registration Type</label>
                        <select class="form-control" name="selRegdType" id="selRegdType" >
                                <option value="0">--All--</option>
                                       
                        </select>
                                 
                    </div>

                    <div class="col-sm-1">
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

              <!-- <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="selLevel">Tag For Level</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selLevel" id="selLevel" >
                                <option value="">--Select Level--</option>
                                <option value="L1" <?php if($level=='L1')echo 'selected="selected"'; ?>>Level-1</option>
                                <option value="L2" <?php if($level=='L2')echo 'selected="selected"'; ?>>Level-2</option>        
                                <option value="L3" <?php if($level=='L3')echo 'selected="selected"'; ?>>Level-3</option>        
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div> -->

              <label><span id="showzp" style="margin-left:10px;" class="badge badge-primary"></span> </label>
                <div class="form-group" >
                <label class="col-sm-2 control-label no-padding-right" for="ddlCourseName">Tag Applicant </label>
                <div class="col-sm-4"> <span class="colon">:</span>
                  <select id="ddlCourseName" multiple class="form-control" name="ddlCourseName" style="height:300px;">
                  </select>
                  <span class="mandatory">*</span> </div>
                <div class="col-sm-1 center"> <a href="javascript:void(0);" class="btn btn-xs btn-info" style="margin-top:8px; width:86px;padding: 4px;font-size: 1.3rem;" onclick="assignCourse();">Select</a> <br>
                  <a href="javascript:void(0);" class="btn btn-xs btn-warning " style="margin-top:8px; width:86px;padding: 4px;font-size: 1.3rem;" onclick="removeCourse();" id="btnRemove">Remove</a> <br>
                  <a href="javascript:void(0);" class="btn btn-xs btn-primary" style="margin-top:8px; width:86px;padding: 4px;font-size: 1.3rem;" onclick="assignAll();">Select All</a> <br>
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

