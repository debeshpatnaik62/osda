<?php
	/* ================================================
	File Name       : addPanelMember.php
	Description		  : This is used for add panel member name
	Designed By		  : 
  Designed On		  : 
  Devloped By		  : Rahul Kumar Saw
  Devloped On		  : 04-Aug-2021
	Update History	:	<Updated by>		<Updated On>		<Remarks>

	==================================================*/
	
     require 'addPanelMemberInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
        $(document).ready(function () {
               
                pageHeader   = "<?php echo $strTab; ?> Panel Member";
                strFirstLink = "Manage Skill Competition";
                strLastLink  = "Panel Member"; 
                
                //$('#txtPanelMember').focus();              
                indicate = 'yes';
             <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg; ?>','','<?php echo $redirectLoc;?>');
            <?php }  ?>
        
             TextCounter('txtDescription','lblChar1',500);
             fillPanel('<?php echo $strPanel; ?>','ddlPanel','0','<?php echo $intVenue;?>');
             fillVenue('<?php echo $intVenue;?>','selVenue','<?php echo $level; ?>');

             <?php if($id != 0){?>
             fillIndiaSkill('<?php echo $intSkill;?>','selSkill1');
            <?php }else{?>
              fillIndiaSkill(0,'selSkill1');
            <?php }?>


          // Function to add moredocument
            $('.removeMoreDoc').hide();
            $(document).on('click', '.addMoreDoc', function(event) {    
            var cloneBox  = $(this).closest('.addTr3').clone(true);
             var totRowNo = $('.addTr3').length;

           /* <?php if($id==0) { ?>
            if (!blankCheck('selSkill'+totRowNo, 'Skill cannot be left blank'))
                      return false;   
             <?php } ?>*/

             if (!validatorSkill())
              return false;
              $('.addTr3:last').after(cloneBox);      
              $('.addTr3:last').find('.removeMoreDoc').show();
              $.each($('.addTr3'),function(e){
                            var rowNo = Number(e)+1;     
                            $('.addTr3:last').find('.Skill').val('');
                            $(this).find('.Skill').attr('id','selSkill'+rowNo);   
                            $(this).find('.Skill').attr('name','selSkill'+rowNo); 
                  $(this).find('.spnDesg').attr('id','spnDesg'+rowNo);  
                            $(this).find('.addMoreDoc').attr('id','moreDoc'+rowNo);
                  $(this).find('.removeMoreDoc').attr('id','lessDoc'+rowNo);
                  $('#spnDesg'+rowNo).html(rowNo);
                  $('#lessDoc' + Number(rowNo - 1)).show();
                  $('#moreDoc' + Number(rowNo - 1)).hide();
                  
                    });  
              var totRowNo = $('.addTr3').length;
                    if (totRowNo == 1)
                    {
                        $('#moreDoc1').show();
                        $('#lessDoc1').hide();
                    }
                    else
                        $('#moreDoc' + totRowNo).show();  
            });
    //remove document
           $(document).on('click', '.removeMoreDoc', function(event) {   
            if(!confirm("Are you sure to remove this record"))
            return false;
            $(this).closest('.addTr3').remove();
                  $.each($('.addTr3'),function(e){
                          var rowNo = Number(e)+1;  
                $(this).find('.Skill').attr('id','selSkill'+rowNo); 
                $(this).find('.spnDesg').attr('id','spnDesg'+rowNo);   
                          $(this).find('.Skill').attr('name','selSkill'+rowNo); 
                          $(this).find('.addMoreDoc').attr('id','moreDoc'+rowNo);
                $(this).find('.removeMoreDoc').attr('id','lessDoc'+rowNo);
                $('#spnDesg'+rowNo).html(rowNo);
                $('#lessDoc'+ Number(rowNo - 1)).show();
                $('#moreDoc'+ Number(rowNo - 1)).hide();
                  });  
            var totRowNo = $('.addTr3').length;
                  if (totRowNo == 1)
                  {
                      $('#moreDoc1').show();
                      $('#lessDoc1').hide();
                  }
                  else
                      $('#moreDoc' + totRowNo).show(); 
              });

      	});

        function validatorSkill()
            {
               var totalRow = $('.addTr3').length;
               console.log(totalRow);
              for (var i=1;i<=totalRow;i++)
              {
                
                if (!selectDropdown('selSkill'+i, 'Skill '+i+' cannot be left blank'))
                return false;
              }
              $("#hdnTotalSkill").val(totalRow);
              return true;
            }
            
        function validator()
            {
                if(!selectDropdown('selLevel', 'Select Level'))
                    return false;
                if(!selectDropdown('selVenue', 'Select Venue'))
                    return false;
                if(!selectDropdown('ddlPanel', 'Select Panel'))
                    return false;            
                if (!blankCheck('txtPanelMember', 'Panel Member Name can not be left blank'))
                    return false;
                if (!checkSpecialChar('txtPanelMember'))
                    return false;
                if (!maxLength('txtPanelMember',200, 'Panel'))
                    return false; 
                if (!blankCheck('txtPanelMobile', 'Mobile Number can not be left blank'))
                    return false; 
                if (!checkSpecialChar('txtPanelMobile'))
                    return false;
                if (!blankCheck('txtPanelEmail', 'Email Id can not be left blank'))
                    return false; 
                if (!checkSpecialChar('txtPanelEmail'))
                    return false;
                if (!blankCheck('txtPanelCollege', 'Institute / College Name can not be left blank'))
                    return false; 
                if (!checkSpecialChar('txtPanelCollege'))
                    return false;
                if (!blankCheck('txtPanelTrade', 'Trade can not be left blank'))
                    return false; 
                if (!checkSpecialChar('txtPanelTrade'))
                    return false;              
                if (!maxLength('txtDescription', 250,'Address'))
                    return false;
                if (!checkSpecialChar('txtDescription'))
                     return false;

                var totalRow = $('.addTr3').length;
                $("#hdnTotalSkill").val(totalRow);
            }

            
           
  </script>
    <div class="page-content">
      <div class="page-header">
        <h1 id="title"></h1>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> <a href="<?php echo APP_URL;?>viewPanelMember/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a></div>
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12">              
              <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="selLevel">Select Level </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selLevel" id="selLevel" onchange="fillVenue(0,'selVenue',this.value)" >
                            <option value="0">- Select -</option> 
                            <option value="2" <?php if($level==2) echo 'selected="selected"'; ?>>Level-2</option> 
                            <option value="3" <?php if($level==3) echo 'selected="selected"'; ?>>Level-3</option> 
                            
                        </select>
                          <span class="mandatory">*</span>              
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="selVenue">Select Venue </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selVenue" id="selVenue" onchange="fillPanel(0,'ddlPanel',$('#selLevel').val(),this.value)" >
                            <option value="0">- Select -</option>                             
                        </select>
                          <span class="mandatory">*</span>              
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlPanel">Panel Name</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlPanel" id="ddlPanel" >
                            <option value="0">- Select -</option> 
                            
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div> 
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtPanelMember">Panel Member Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtPanelMember" name="txtPanelMember" maxlength="200" placeholder="" class="form-control" value="<?php echo $strPanelMember; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtPanelMobile"> Mobile No. </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtPanelMobile" name="txtPanelMobile" maxlength="10" placeholder="" class="form-control" value="<?php echo $strMobile; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtPanelEmail">Email Id </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtPanelEmail" name="txtPanelEmail" maxlength="200" placeholder="" class="form-control" value="<?php echo $strEmailId; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtPanelCollege">Institute / College Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtPanelCollege" name="txtPanelCollege" maxlength="200" placeholder="" class="form-control" value="<?php echo $strCollege; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtYoexperience">Year of experience </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtYoexperience" name="txtYoexperience" maxlength="2" placeholder="" class="form-control" value="<?php echo $experience; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtLocation">Location </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtLocation" name="txtLocation" maxlength="200" placeholder="" class="form-control" value="<?php echo $strLocation; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtPanelTrade">Branch / Trade Name </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtPanelTrade" name="txtPanelTrade" maxlength="200" placeholder="" class="form-control" value="<?php echo $strTrade; ?>">
                  <span class="mandatory">*</span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtWeightage">Weightage (in %)</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtWeightage" name="txtWeightage" maxlength="3" placeholder="" class="form-control" value="<?php echo $weightage; ?>">
                </div>
              </div>

              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtDescription" name="txtDescription" style="height:100px;" onKeyUp="return TextCounter('txtDescription','lblChar1',250)" onMouseUp="return TextCounter('txtDescription','lblChar1',250)"><?php echo $strDescription;?></textarea>
                        <span class="red">Maximum <span id="lblChar1">250</span> characters </span>
                        
                    </div>
                </div>

          <?php 
          if($resultSkill->num_rows>0){
            $y = 1;
           while($row1 = $resultSkill->fetch_array()){
            $intSkillId     = $row1['intSkillId'];
        ?>
        <script type="text/javascript">
          $(function(){  
            fillIndiaSkill('<?php echo $intSkillId;?>','selSkill<?php echo $y?>');
            //fillEligibility('selSkill<?php echo $y?>','<?php echo $intSkillId;?>');
          })
        </script>
        <div id="appendTr3">
          <span class="addTr3">
          <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="selSkill">Skill <span id="spnDesg1" class="spnDesg"><?php echo $y;?></span> </label>
                <div class="col-sm-3"> <span class="colon">:</span>
                    <select id="selSkill<?php echo $y;?>" class="form-control Skill" name="selSkill<?php echo $y;?>">
                      <option value="0">--Select--</option>
                    </select><!-- <span class="mandatory">*</span> -->
                </div>  
                        
            <div class="col-sm-1" >
              <a href="javascript:void(0);" class="btn btn-xs btn-success addMoreDoc" title="Add More" id="moreDoc1"> <i class="ace-icon fa fa-plus bigger-120"></i> </a> <a href="javascript:void(0);" class="btn btn-xs btn-danger removeMoreDoc" title="Remove" id="lessDoc1"> <i class="ace-icon fa fa-minus bigger-120"></i> </a>
              </div> 
              </div>
          </span>
        </div>
      <?php $y++; }?>
        <?php }else{?>
          <div id="appendTr3">
          <span class="addTr3">
          <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="selSkill">Skill <span id="spnDesg1" class="spnDesg">1</span> </label>
                <div class="col-sm-3"> <span class="colon">:</span>
                    <select id="selSkill1" class="form-control Skill" name="selSkill1">
                      <option value="0">--Select--</option>
                    </select><!-- <span class="mandatory">*</span> -->
                </div>  
                        
            <div class="col-sm-1" >
              <a href="javascript:void(0);" class="btn btn-xs btn-success addMoreDoc" title="Add More" id="moreDoc1"> <i class="ace-icon fa fa-plus bigger-120"></i> </a> <a href="javascript:void(0);" class="btn btn-xs btn-danger removeMoreDoc" title="Remove" id="lessDoc1"> <i class="ace-icon fa fa-minus bigger-120"></i> </a>
              </div> 
              </div>
          </span>
        </div>
        <?php }?>


           
              
              <div class="form-group">
                <div class="col-sm-2 no-padding-right"></div>
                <div class="col-sm-4">
                  <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();"/>
                  <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strclick; ?>" />
                </div>
              </div>
              <input type="hidden" id="hdnTotalSkill" name="hdnTotalSkill"/>
            </div>
          <div class="hr hr32 hr-dotted"></div>
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.page-content -->

 
