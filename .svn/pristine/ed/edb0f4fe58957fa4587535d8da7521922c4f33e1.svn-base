<?php
/* ================================================
  File Name         : addQuestion.php
  Description		  	: This is used for add Questions.  
  Devloped By       : Rahul Kumar Saw
  Devloped On       : 26-08-2021
  Update History	  :	<Updated by>		   <Updated On>		  <Remarks>
                      Rahul kumar Saw    26-08-2021 

  Style sheet       : jquery.timepicker.css,datepicker.css
  JS File				    : validatorchklist.js,jquery.timepicker.min.js,
  includes	        :	addQuestionInner.php
  ================================================== */

require 'addQuestionInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
$(document).ready(function () {
   
	pageHeader   = "<?php echo $strTab; ?> Question";
	strFirstLink = "Manage Skill Competition";
	strLastLink  = "Question"; 
	indicate 	= 'yes';
	
  fillIndiaSkill('0','selSkill');
	<?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
		viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
	<?php }?>  

  $('.remove').hide();

 <?php if($id > 0) { ?>
    $('.remove').show();
 <?php }  ?> 


     //================== Add more row ===========
          $('.addMore').on('click', function(){
                    var rowId = $(this).closest("tr")[0].rowIndex;
                   
            var totRowNo    = $('#appendTr tr').length;
            <?php if($id==0) { ?>
            if (!blankCheck('txtQuestion'+totRowNo, 'Question cannot be left blank'))
                      return false;   
             <?php } ?>                     
                            
              $('#hdnLevel').val(Number(totRowNo)+1);                       
            /*if(Number(totRowNo)>=10)

            {
                viewAlert("Cannot add more than 10 rows");
                return false;
            }*/

            var cloneRow    = $('.addTr:last').clone(true); 
             //cloneRow.find('.groupId option').remove();
             cloneRow.find('.txtQuestion').val('');
            $(this).closest('tr').after(cloneRow);

            $('.addTr:last').find('.remove').show();
            $('.addTr:last').find('.txtQuestion').val('');
            $.each($('#appendTr tr'),function(e){

                var rowNo   = Number(e)+1;
                $(this).find('.txtQuestion').attr('id','txtQuestion'+rowNo);
                $(this).find('.lblFrom').attr('id','lblFrom'+rowNo);
                                
                //$(this).find('.filter').attr("onclick","filter("+rowNo+")");
                $(this).find('.lblSlNo').text(rowNo);   
                $(this).find('.addMore').attr('id','more'+rowNo);
                $(this).find('.remove').attr('id','less'+rowNo);
                $('#more'+Number(rowNo-1)).hide();
                $('#less'+Number(rowNo-1)).show();                 

            });

        });
       //================== Add more row ===========

       //================== Remove row ===========

        $('.remove').click(function(){                   

            $(this).closest('tr').remove();

            var totRowNo    = $('#appendTr tr').length;
            $('#hdnLevel').val(totRowNo);
            $.each($('#appendTr tr'),function(e){
                var rowNo   = Number(e)+1;
                $(this).find('.txtQuestion').attr('id','txtQuestion'+rowNo);
                $(this).find('.addMore').attr('id','more'+rowNo);
                $(this).find('.remove').attr('id','less'+rowNo);

            }); 
            if(totRowNo==1)
            {
                    $('#more1').show();
                    $('#less1').hide();
            }
            else
                    $('#more'+totRowNo).show();
        });       
         
         $('[data-rel=tooltip]').tooltip();
 //================== Remove row ===========

});
		
function validator()
{
  if(!selectDropdown('selSkill', 'Select Skill'))
      return false;

  if(!blankCheck('txtQuestion','Question cannot be left blank'))
     return false;
  if(!checkSpecialChar('txtQuestion'))
     return false; 	
               
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
        <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> <a href="<?php echo APP_URL; ?>viewQuestion/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
      </div>
      <?php include('includes/util.php'); ?>
      <div class="hr hr-solid"></div>
      <div class="col-xs-12">
        <div class="addTable">
         
         <div class="form-group">
             <label class="col-sm-3 control-label no-padding-right" for="selSkill">Select Skill</label>
             <div class="col-sm-4"><span class="colon">:</span>
               <select class="form-control" name="selSkill" id="selSkill" >
                            <option value="0">- Select -</option>
              </select>
             </div>
          </div>     

             <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="50">Sl.#</th>
                    <th width="70%">Question</th>               
                    <th width="30%" class="center">Add / Delete</th>                   
                  </tr>
                </thead>

                <tbody id="appendTr">
                   <?php  if($id>0) {
                          $ctr = 0;
                      if($docRes->num_rows > 0) {
                         while($row =  $docRes->fetch_array())
                         {   

                                $strfileDoc     =  $row['vchDocumentE']; 
                                $ctr++;
                   ?>
                  <tr class="addTr">
                      <td><input type="hidden" name="addUpdate" id="addUpdate" value="0"><label class="lblSlNo"><?php echo $ctr; ?></label></td>
                    <td><input type="text" class="form-control txtQuestion" id="txtQuestion<?php echo $ctr; ?>" name="txtQuestion[]" />
                    </td>
                    <td class="center">
                    <a href="javascript:void(0);" id="more<?php echo $ctr; ?>" class="btn btn-xs btn-info addMore" data-rel="tooltip" title="" data-original-title="Add More"> <i class="icon-white icon-plus-sign"></i> </a> &nbsp;

                    <a href="javascript:void(0);" id="less<?php echo $ctr; ?>" class="btn btn-xs btn-danger remove" data-rel="tooltip" title="" data-original-title="Remove"> <i class="icon-white  icon-remove-sign"></i> </a>
                    </td>
                  </tr>
                  <?php } } } else { ?>
                   <tr class="addTr">
                      <td><input type="hidden" name="addUpdate" id="addUpdate" value="0"><label class="lblSlNo">1</label></td>
                    <td><input type="text" class="form-control txtQuestion" id="txtQuestion1" name="txtQuestion[]" />
                    </td>
                    <td class="center">
                    <a href="javascript:void(0);" id="more1" class="btn btn-xs btn-info addMore" data-rel="tooltip" title="" data-original-title="Add More"> <i class="icon-white icon-plus-sign"></i> </a> &nbsp;

                    <a href="javascript:void(0);" id="less1" class="btn btn-xs btn-danger remove" data-rel="tooltip" title="" data-original-title="Remove"> <i class="icon-white  icon-remove-sign"></i> </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table> 
          <div class="form-group">
            <div class="col-sm-3 no-padding-right"></div>
            <div class="col-sm-4">
              <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();"/>
              <input type="reset" id="btnReset" name="btnReset"  class="btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strclick; ?>" />
              <input type="hidden" id="hdnSlNo" name="hdnSlNo" value="<?php echo $intSlNo; ?>"/>
            </div>
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
