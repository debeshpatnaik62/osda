<?php
/* ================================================
  File Name                 : addInstituteRegistration.php
  Description               : This is used for Manage Institute Tag Program details.
  Designed By               :
  Designed On               :
  Developed By              : Rahul Kumar Saw
  Developed On              : 30-Nov-2021
  Update History            : <Updated by>    <Updated On>    <Remarks>

  Style sheet               : 
  Javscript Functions       :  validatorchklist.js
  includes                  :  util.php,addInstituteRegistrationInner.php       :

  ================================================== */
    require("addInstituteRegistrationInner.php");
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "Tag Program";
        strFirstLink = "Manage Application";
        strLastLink  = "Manage Program";
        loadNavigation('Tag Program');
        $('#txtName').focus();
        
        indicate = 'yes';
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php 
            } 
        ?>
        //fillProgramName('','ddlProgram1');
         //================== Add more row ===========
          $('.addMore').on('click', function(){
            var rowId = $(this).closest("tr")[0].rowIndex;
                   
            var totRowNo    = $('#appendTr tr').length;
            //$('#hdnTotalProgram').val(totRowNo);   
            $('#hdnTotalProgram').val(Number(totRowNo)+1);                               
            if(Number(totRowNo)>=10)

            {
                viewAlert("Cannot add more than 10 rows");
                return false;
            }

            $('.addTr:last').clone(true).appendTo('#appendTr');
            $('.addTr:last').find('.remove').show();
            $('.addTr:last').find('.clsddlProgram').val('0');
            $('.addTr:last').find('.clsSeatAvail').val('');
            $('.addTr:last').find('.clsSeatNeed').val('');
            $('.addTr:last').find('.clsTxtProgramFee').val('');
            $('.addTr:last').clone(true).find('.clsddlProgram').prop('selectedIndex', 0);
            $.each($('#appendTr tr'),function(e){

                var rowNo   = Number(e)+1;
                var onchange = "setProgFee(this.id,'txtPFee"+rowNo+"','txtSeat"+rowNo+"');checkPreviousProgram(this.id);";
                $(this).find('.clsddlProgram').attr('id','ddlProgram'+rowNo);
                $(this).find('.clsddlProgram').attr('name', 'ddlProgram' + rowNo);
                $(this).find('.clsddlProgram').attr('onchange', onchange);
                $(this).find('.clsSeatAvail').attr('id','txtSeat'+rowNo);
                $(this).find('.clsSeatAvail').attr('name', 'txtSeat' + rowNo);
                $(this).find('.clsSeatNeed').attr('id','txtNeedSeat'+rowNo);
                $(this).find('.clsSeatNeed').attr('name', 'txtNeedSeat' + rowNo);
                $(this).find('.clsTxtProgramFee').attr('id','txtPFee'+rowNo);
                $(this).find('.clsTxtProgramFee').attr('name', 'txtPFee' + rowNo);
                $(this).find('.lblSlNo').text(rowNo);   
                $(this).find('.addMore').attr('id','addMore'+rowNo);
                $(this).find('.remove').attr('id','remove'+rowNo);
                $('#addMore'+Number(rowNo-1)).hide();
                $('#remove'+Number(rowNo-1)).show();                            
            });

        });

       //================== Remove row ===========

        $('.remove').click(function(){                   

            $(this).closest('tr').remove();
            var totRowNo    = $('#appendTr tr').length;
            $('#hdnTotalProgram').val(totRowNo);
            $.each($('#appendTr tr'),function(e){
                var rowNo   = Number(e)+1;
                // if (!blankCheck('txtAreaName'+totRowNo, 'Area Name'))               
                //       return false; 
                $(this).find('.clsddlProgram').attr('id', 'ddlProgram' + rowNo);
                $(this).find('.clsddlProgram').attr('name', 'ddlProgram' + rowNo);
                $(this).find('.clsSeatAvail').attr('id','txtSeat'+rowNo);
                $(this).find('.clsSeatAvail').attr('name', 'txtSeat' + rowNo);
                $(this).find('.clsSeatNeed').attr('id','txtNeedSeat'+rowNo);
                $(this).find('.clsSeatNeed').attr('name', 'txtNeedSeat' + rowNo);
                $(this).find('.clsTxtProgramFee').attr('id','txtPFee'+rowNo);
                $(this).find('.clsTxtProgramFee').attr('name', 'txtPFee' + rowNo);
                $(this).find('.addMore').attr('id', 'addMore' + rowNo);
                $(this).find('.remove').attr('id', 'remove' + rowNo);
                $(this).find('.lblSlNo').text(rowNo);

            }); 
            if(totRowNo==1)
            {
                    $('#addMore1').show();
                    $('#remove1').hide();
            }
            else
                    $('#addMore'+totRowNo).show();                   

        });         
   });
   

   function setProgFee(sourceId,targetId,seatId)
   { 
     var srId =  $('#'+sourceId).find(":selected").attr('data-val');
     var availSeat =  $('#'+sourceId).find(":selected").attr('data-id');
     
     $('#'+targetId).val(srId).prop('readonly',true);   
     $('#'+seatId).val(availSeat).prop('readonly',true);   

   }

    function validateTPProgram()
    { 
        var totRowNumber = $('.addTr').length;

        for (var i = 1; i <=totRowNumber; i++)
        {
            var availSeat = $('#ddlProgram'+ i).find(":selected").attr('data-id');
            var requireSeat = $('#txtNeedSeat'+ i).val();
            //alert(i);
          if(!selectDropdown('ddlProgram'+ i, 'Select Program name ' + i))
           return false;  
           if (!blankCheck('txtNeedSeat'+ i, 'Please enter seat requirement ' + i))
            return false;    
            if(parseInt(requireSeat) > parseInt(availSeat))
             { 
                viewAlert("You can not add more then available seat.");
                return false;
             }
        
        }
        var totRowNumber = $('.addTr').length;
        $("#hdnTotalProgram").val(totRowNumber);
        return true;
    }

    function checkPreviousProgram(id)
    {
       
       var totRowNumber = $('.addTr').length;
     
       if(totRowNumber>1)
       {
            for (var i = 0; i < totRowNumber; i++)
            {
               
                var curDes = $('#ddlProgram'+ Number(i)).val();
                //console.log(id+' '+'selCourse_'+ Number(i))
                
                if($('#'+id).val() == curDes && id!='ddlProgram'+ Number(i))
                {
                    viewAlert('This Program already selected');
                   $('#'+id).prop('selectedIndex', '0');
                     $('#'+id).focus();
                    return false;
                }
            }
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
                <a href="javascript:void(0);" class="btn btn-info active">Tag Program</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
              <h3> Institute Details </h3>
              <div id="viewTable">
              <div id="divTraingDetails">
                    <div class="alert alert-info" id="searchInfo">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="100"><label>Institute Name</label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo $strName;?> </td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>Email Id</label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo $strEmail;?></td>
                                <td width="50">&nbsp;</td>
                                
                            </tr>
                            <tr>
                                <td width="100"><label>Contact No.</label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo $strMobile;?></td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>PAN Number </label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo $strPan; ?></td>
                                <td width="50">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="100"><label>Registration No.</label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo $strRegd;?></td>
                                <td width="50">&nbsp;</td>
                                <td width="100"><label>Institute Address</label></td>
                                <td width="20" align="center">:</td>
                                <td><?php echo $strAddress;?></td>
                                <td width="50">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             </div>
       </div>
                
                <div class="form-group">
                  <table class="table table-striped table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="50">Sl.#</th>
                    <th width="200">Tag Program </th>  
                    <th width="200">Available  Seat </th>  
                    <th width="200">Seat Requirement </th>  
                    <th width="200">Program Fee (In <span><i class="fa fa-rupee"></i></span>) </th>  
                    <th width="80">Add More</th>                     
                  </tr>
                  </thead>
                <tbody id="appendTr">
                   <?php  if(mysqli_num_rows($resultView) > 0) {
                          $ctr = 1;
                         while($rowView =  $resultView->fetch_array())
                         {   

                                $programId       =  $rowView['intProgramId']; 
                                $status          =  $rowView['tinApproveStatus']; 
                                $proposedSeat    =  $rowView['intProposedSeat']; 
                                $bookedSeat      =  $rowView['intBookedSeat']; 
                                if($status==1)
                                {
                                    $finalSeat = $bookedSeat;
                                    //$display  = 'disabled';
                                }
                                else
                                {
                                    $finalSeat = $proposedSeat;
                                    //$display  = '';
                                }
                               
                                
                   ?>
                   <input type="hidden" id="hdnStatus" name="hdnStatus[]" value="<?php echo $status;?>" />
                  <tr class="addTr">
                      <td><input type="hidden" name="addUpdate" id="addUpdate" value="0"><label class="lblSlNo"><?php echo $ctr; ?></label></td>
                    <td>
                      <select class="form-control clsddlProgram" name="ddlProgram<?php echo $ctr; ?>" id="ddlProgram<?php echo $ctr; ?>" onchange="setProgFee(this.id,'txtPFee<?php echo $ctr; ?>','txtSeat<?php echo $ctr; ?>');checkPreviousProgram(this.id);">
                            <option value="0">- Select -</option> 
                            
                        </select>
                    </td>
                    <td>
                      <input type="text" id="txtSeat<?php echo $ctr; ?>" name="txtSeat<?php echo $ctr; ?>" maxlength="6" placeholder="" class="clsSeatAvail form-control" value="">
                    </td>

                    <td>
                      <input type="text" id="txtNeedSeat<?php echo $ctr; ?>" name="txtNeedSeat<?php echo $ctr; ?>" maxlength="6" placeholder="" class="clsSeatNeed form-control" value="<?php echo $finalSeat;?>" <?php echo $display;?>>
                    </td>

                    <td>
                      <input type="text" id="txtPFee<?php echo $ctr; ?>" name="txtPFee<?php echo $ctr; ?>" maxlength="6" placeholder="" class="clsTxtProgramFee form-control" value="<?php echo $programFee; ?>">
                    </td>

                    <td class="center">
                    <a href="javascript:void(0);" id="addMore<?php echo $ctr; ?>" class="btn btn-xs btn-info addMore" data-rel="tooltip" title="" data-original-title="Add More" > <i class="icon-white icon-plus-sign"></i> </a> &nbsp;

                    <a href="javascript:void(0);" id="remove<?php echo $ctr; ?>" class="btn btn-xs btn-danger remove" data-rel="tooltip" title="" data-original-title="Remove" > <i class="icon-white  icon-minus-sign"></i> </a>
                    </td>
                  </tr>
                  <script type="text/javascript">
                 
                    fillProgramName('<?php echo $programId;?>','ddlProgram<?php echo $ctr; ?>');
                    setTimeout(function(){
                      setProgFee('ddlProgram<?php echo $ctr; ?>','txtPFee<?php echo $ctr; ?>','txtSeat<?php echo $ctr; ?>') ;
                    },1000);
                                 
                  
                </script>
                  <?php $ctr++; }  
                } else { ?>
                   <tr class="addTr">
                      <td><input type="hidden" name="addUpdate" id="addUpdate" value="0"><label class="lblSlNo">1</label></td>
                    <td>
                      <select class="form-control clsddlProgram" name="ddlProgram1" id="ddlProgram1" onchange="setProgFee(this.id,'txtPFee1','txtSeat1');checkPreviousProgram(this.id);">
                            <option value="0">- Select -</option> 
                            
                        </select>
                    </td>
                    <td>
                      <input type="text" id="txtSeat1" name="txtSeat1" maxlength="6" placeholder="" class="clsSeatAvail form-control" value="">
                    </td>
                    <td>
                      <input type="text" id="txtNeedSeat1" name="txtNeedSeat1" maxlength="6" placeholder="" class="clsSeatNeed form-control" value="">
                    </td>
                     <td>
                      <input type="text" id="txtPFee1" name="txtPFee1" maxlength="6" placeholder="" class="clsTxtProgramFee form-control" value="">
                    </td>
                    <td class="center">
                    <a href="javascript:void(0);" id="addMore1" class="btn btn-xs btn-info addMore" data-rel="tooltip" title="" data-original-title="Add More"> <i class="icon-white icon-plus-sign"></i> </a> &nbsp;

                    <a href="javascript:void(0);" id="remove1" class="btn btn-xs btn-danger remove" data-rel="tooltip" title="" data-original-title="Remove"> <i class="icon-white  icon-minus-sign"></i> </a>
                    </td>
                  </tr>
                  <script type="text/javascript">
                 
                    fillProgramName('0','ddlProgram1');               
                  
                </script>
                  <?php } ?>
                                           
              </tbody>
          </table>
           <input type="hidden" id="hdnTotalProgram" name="hdnTotalProgram"/>
        </div> 
                
                

                <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validateTPProgram();"/>
                        <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strclick; ?>" />
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

