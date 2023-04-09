<?php
/* ================================================
  File Name         : addTender.php
  Description		  	: This is used for add Tender details.  
  Devloped By       : Rasmi Ranjan Swain
  Devloped On       : 02-Jun-2016
  Update History	  :	<Updated by>		   <Updated On>		  <Remarks>
                  Ashok kumar Samal    22-06-2016       Department Wise User previllege

  Style sheet       : jquery.timepicker.css,datepicker.css
  JS File				    : validatorchklist.js,jquery.timepicker.min.js,
  includes	        :	addTenderInner.php
  ================================================== */

require 'addTenderInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script src="<?php echo APP_URL; ?>js/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/jquery.timepicker.css">
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<script language="javascript">
$(document).ready(function () {


     
	pageHeader   = "<?php echo $strTab; ?> Tender";
	strFirstLink = "Manage Application";
	strLastLink  = "Tender"; 
	showHidePortal('<?php echo $intPortalType; ?>')
	indicate 	= 'yes';
	showHidePortal('<?php echo $intPortalType; ?>');   
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	});
  
   $('.time-picker').timepicker({ 'step': 15 });
   $('.time-picker').timepicker('option', { useSelect: true });
	TextCounter('txtDetails','lblChar',500);
  TextCounter('txtDetailsH','lblChar',500);
	<?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
		viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
	<?php }?>  
	<?php if($id=='0') {?>
	$('#userImage').hide();
	<?php }?>

  $('.remove').hide();

 <?php if($id > 0) { ?>
    $('.remove').show();
 <?php }  ?> 

	setTimeout(function(){ 
		 	getDepartments(0,'ddlPortalDepartment','<?php echo $intPortalDeptId;?>');
      getDepartments(0,'ddlDept','<?php echo $intDepartId;?>');
		 }, 1000); 

     //================== Add more row ===========
          $('.addMore').on('click', function(){
                    var rowId = $(this).closest("tr")[0].rowIndex;
                   
            var totRowNo    = $('#appendTr tr').length;
            <?php if($id==0) { ?>
            if (!blankCheck('fileDoc'+totRowNo, 'Tender Document cannot be left blank'))
                      return false;   
             <?php } ?>                     
                            
                        $('#hdnLevel').val(Number(totRowNo)+1);                       
            if(Number(totRowNo)>=10)

            {
                viewAlert("Cannot add more than 10 rows");
                return false;
            }

            var cloneRow    = $('.addTr:last').clone(true); 
             cloneRow.find('.groupId option').remove();
             cloneRow.find('.fileDoc').val('');
             cloneRow.find('.hdnDocFile').val('');
            $(this).closest('tr').after(cloneRow);

            $('.addTr:last').find('.remove').show();
            $('.addTr:last').find('.fileDoc').val('');
            $('.addTr:last').find('.hdnDocFile').val('');
            $('.addTr:last').find('.fileDocAnchor').remove();
            $.each($('#appendTr tr'),function(e){

                var rowNo   = Number(e)+1;
                                // $(this).find('.groupId').attr('id','ddlUser'+rowNo);
                                // $(this).find('.groupId').attr('name','ddlUser'+rowNo+'[]');
                $(this).find('.fileDoc').attr('id','fileDoc'+rowNo);
                $(this).find('.hdnDocFile').attr('id','hdnDocFile'+rowNo);
                $(this).find('.lblFrom').attr('id','lblFrom'+rowNo);
                                //$(this).find('.hdnLblFrom').attr('id','hdnLblFrom'+rowNo);
                               // $(this).find('.ddlUserText').attr('id','ddlUserText'+rowNo);
                                $(this).find('.filter').attr("onclick","filter("+rowNo+")");
                $(this).find('.lblSlNo').text(rowNo);   
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
                // if (!blankCheck('txtAreaName'+totRowNo, 'Area Name'))               
                //       return false; 
                $(this).find('.fileDoc').attr('id','fileDoc'+rowNo);
                $(this).find('.hdnDocFile').attr('id','hdnDocFile'+rowNo);

                //$(this).find('.lblFrom').attr('id','lblFrom'+rowNo);
                               // $(this).find('.hdnLblFrom').attr('id','lblFrom'+rowNo);
                               // $(this).find('.groupId').attr('id','ddlUser'+rowNo);
                               // $(this).find('.groupId').attr('name','ddlUser'+rowNo+'[]');
                               // $(this).find('.lblFrom').attr('id','lblFrom'+rowNo);
                               // $(this).find('.hdnLblFrom').attr('id','hdnLblFrom'+rowNo);
                               // $(this).find('.ddlUserText').attr('id','ddlUserText'+rowNo);
                               
                               // $(this).find('.lblSlNo').text(rowNo);
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
  if(!blankCheck('txtTenderTitle','Tender Title cannot be left blank'))
     return false;
  if(!checkSpecialChar('txtTenderTitle'))
     return false;
  if(!maxLength('txtTenderTitle', 500, 'Tender Title'))
     return false;
	if (!checkSpecialChar('txtTenderNo'))
		return false;
	if (!maxLength('txtTenderNo', 50, 'Tender No '))
		return false;    
   
	
	

	var today		= new Date();
	var current_datetime	= today.getDate()+'-'+Number(today.getMonth()+1)+'-'+today.getFullYear()+'-'+today.getHours()+'-'+today.getMinutes();

	var closingtime 	    = changeTimeFormat('txtClosingTime');
	var totalclosingTime	= $('#txtClosingDate').val()+'-'+closingtime;	


	if (!blankCheck('txtOpeningDate', 'Opening Date cannot be left blank'))
		return false;
	if (!checkSpecialChar('txtOpeningDate'))
		return false;
  if (!blankCheck('txtClosingDate', 'Closing Date cannot be left blank'))
    return false;
  if (!checkSpecialChar('txtClosingDate'))
    return false;
	
	var openingtime 	= changeTimeFormat('txtOpeningTime');

  if (!compareDate('txtOpeningDate','txtClosingDate','Closing Date','Opening Date', 'Closing Date cannot be less than opening date' ))
                    return false;

  if ($('#fileDoc').val() != '')
        {
                      
           if (!IsCheckFile('fileDoc', 'Invalid file types. Upload only ', 'pdf,doc,docx'))
               return false;
              var fileSize_inKB = Math.round(($("#fileDoc")[0].files[0].size / 1024));
                  if (fileSize_inKB > 5120)
                   {
                      viewAlert('File size cannot be more than 5MB.');
                         return false;
                   }
        }    

	if (!checkSpecialChar('txtDetails'))
		return false;
	if (!maxLength('txtDetails', 500, 'Description'))
		return false;              
 }
      
</script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<div class="page-content">
  <div class="page-header">
    <h1 id="title"></h1>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> <a href="<?php echo APP_URL; ?>viewTender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> <!-- <a href="<?php echo APP_URL; ?>addendumTender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Addendum</a> <a href="<?php echo APP_URL; ?>corrigendumTender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Corrigendum</a> --> <a href="<?php echo APP_URL; ?>archiveTender/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a>
      <a href="<?php echo APP_URL; ?>tenderReport/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Tender Report</a> </div>
      <?php include('includes/util.php'); ?>
      <div class="hr hr-solid"></div>
      <div class="col-xs-12">
        <div class="addTable">
         
         <div class="form-group">
             <label class="col-sm-3 control-label no-padding-right" for="txtTenderType">Tender Type</label>
             <div class="col-sm-4"><span class="colon">:</span>
               <select class="form-control" name="intTenderType" id="intTenderType" >
                            <option value="0" <?php if($intTenderType==0) echo 'selected="selected"'; ?>>- Select -</option>
                            <option value="1" <?php if($intTenderType==1) echo 'selected="selected"'; ?>> Advertisement </option>
                            <option value="2" <?php if($intTenderType==2) echo 'selected="selected"'; ?>> Notice </option>
                            <option value="3" <?php if($intTenderType==3) echo 'selected="selected"'; ?>> RFP </option>
                            <option value="4" <?php if($intTenderType==4) echo 'selected="selected"'; ?>> EOI </option>
              </select>
             </div>
          </div>

          <div class="form-group">
             <label class="col-sm-3 control-label no-padding-right" for="txtTenderTitle">Tender Title</label>
             <div class="col-sm-4"> <span class="colon"> :</span>
                <input type="text" name="txtTenderTitle" id="txtTenderTitle" maxlength="500" class="form-control" value="<?php echo $strTenderTitle; ?>">
             <span class="mandatory">*</span></div>
          </div>

          <div class="form-group">
             <label class="col-sm-3 control-label no-padding-right" for="txtTenderTitle_O">Tender Title in Odia</label>
             <div class="col-sm-4"> <span class="colon"> :</span>
                <input type="text" name="txtTenderTitle_O" id="txtTenderTitle_O" maxlength="500" class="form-control" value="<?php echo $strTenderTitle_O; ?>">
            </div>
          </div>

          <div class="form-group">
             <label class="col-sm-3 control-label no-padding-right" for="radCourseType">Do you want to show in ticker?</label>
             <div class="col-sm-4"> <span class="colon">:</span>
              <input type="radio"  name="radShowTicker" class="ace" value="1" <?php echo ($radShowTicker==1)?'checked':''?>>                           
              <span class="lbl">Yes</span>
              <input type="radio"  name="radShowTicker" class="ace" value="0" <?php echo ($radShowTicker==0)?'checked':''?> >
              <span class="lbl">No</span> 
          </div>
          </div>

          
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="txtTenderNo">Tender No.</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtTenderNo" name="txtTenderNo" maxlength="50" placeholder="" class="form-control" value="<?php echo $strTenderNo; ?>">
              </div>
          </div>

          <!-- <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="txtHeadline">Headline</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtHeadline" name="txtHeadline" maxlength="100" placeholder="" class="form-control" value="<?php echo $strHeadLine; ?>">
              <span class="mandatory">*</span> </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="txtHeadlineH">Headline in Odia</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtHeadlineH" name="txtHeadlineH" maxlength="250" placeholder="" class="form-control odia" value="<?php echo $strHeadLineH; ?>">
            </div>
          </div> -->

            <!-- <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="txtAnnounceDt">Announce Date</label>
                    <div class="col-sm-4">
                      <span class="colon"> : </span>
                      <div class="input-group">
                       <input type="text" class="form-control date-picker" name="txtAnnounceDt" id="txtAnnounceDt" data-date-format="dd-mm-yyyy" value="<?php echo $strAnnounceDt; ?>">
                       <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                    </div> <span class="mandatory">*</span> </div>
               </div>

                <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="txtPurchaseDt">Purchase Date</label>
                    <div class="col-sm-4">
                      <span class="colon"> : </span>
                      <div class="input-group">
                       <input type="text" class="form-control date-picker" name="txtPurchaseDt" id="txtPurchaseDt" data-date-format="dd-mm-yyyy" value="<?php echo $strPurchaseDt; ?>">
                       <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> 
                    </div> <span class="mandatory">*</span> </div>
               </div>  -->         
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="txtOpeningDate">Opening Date</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <div class="input-group">
                <input type="text" data-date-format="dd-mm-yyyy" name="txtOpeningDate" id="txtOpeningDate" class="form-control date-picker" value="<?php echo $strOpeningDate; ?>">
                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
              <span class="mandatory">*</span> </div>
            <label class="col-sm-2 control-label no-padding-right" for="txtOpeningTime">Opening Time</label>
            <div class="col-sm-2"> <span class="colon">:</span>
              <div class="input-group">
                <input type="text" name="txtOpeningTime" id="txtOpeningTime" class="form-control time-picker" value="<?php echo $strOpeningTime; ?>">
              </div>
              <span class="mandatory">*</span> </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="txtClosingDate">Closing Date</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <div class="input-group">
                <input type="text" data-date-format="dd-mm-yyyy" name="txtClosingDate" id="txtClosingDate" class="form-control date-picker" value="<?php echo $strClosingDate; ?>">
                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
              <span class="mandatory">*</span> </div>
            <label class="col-sm-2 control-label no-padding-right" for="txtClosingTime">Closing Time</label>
            <div class="col-sm-2"> <span class="colon">:</span>
              <div class="input-group">
                <input type="text" name="txtClosingTime" id="txtClosingTime" class="form-control time-picker"  value="<?php echo $strClosingTime; ?>">
              </div>
              <span class="mandatory">*</span> </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="txtDetails">Description </label>
            <div class="col-sm-5"> <span class="colon">:</span>
              <textarea class="form-control" id="txtDetails" name="txtDetails" rows="3" onKeyUp="return TextCounter('txtDetails','lblChar',500)" onMouseUp="return TextCounter('txtDetails','lblChar',500)"><?php echo $strDescription; ?></textarea>
              <!-- <span class="mandatory">*</span> --><span class="red">Maximum <span id="lblChar"> 500 </span> characters</span> </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="txtDetailsH">Description in Odia</label>
            <div class="col-sm-5"> <span class="colon">:</span>
              <textarea class="form-control odia" id="txtDetailsH" name="txtDetailsH" rows="3" onKeyUp="return TextCounter('txtDetailsH','lblChar1',500);" onMouseUp="return TextCounter('txtDetailsH','lblChar1',500);"><?php echo $strDescriptionH; ?></textarea>
              <span class="red">Maximum <span id="lblChar1"> 500 </span> characters</span> </div>
          </div>

             <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="50">Sl.#</th>
                    <th width="70%">Tender Document <span class="red">(pdf,docx,doc,rar file only and Max size file Size 10 MB)</span></th>               
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
                    <td><input type="file" class="form-control fileDoc" id="fileDoc<?php echo $ctr; ?>" name="fileDoc[]" />
                       <input type="hidden" class="hdnDocFile" name="hdnDocFile[]" id="hdnDocFile<?php echo $ctr; ?>" value="<?php echo $strfileDoc; ?>"/>
                        <?php
                              if ($id != '' && $strfileDoc != '') {
                                  $display = '';
                              } else {
                                  $display = 'display:none;';
                              }                    
                        ?>

                       <a href="<?php echo APP_URL .'uploadDocuments/tender/'. $strfileDoc;  ?>" target="_blank" class="fileDocAnchor"><img id="userImage" src="<?php echo APP_URL; ?>img/pdf.png" alt=""  border="0" align="absmiddle" style="<?php echo $display; ?>"></a>

                       </td>
                    <td class="center">
                    <a href="javascript:void(0);" id="more<?php echo $ctr; ?>" class="btn btn-xs btn-info addMore" data-rel="tooltip" title="" data-original-title="Add More"> <i class="icon-white icon-plus-sign"></i> </a> &nbsp;

                    <a href="javascript:void(0);" id="less<?php echo $ctr; ?>" class="btn btn-xs btn-danger remove" data-rel="tooltip" title="" data-original-title="Remove"> <i class="icon-white  icon-remove-sign"></i> </a>
                    </td>
                  </tr>
                  <?php } } } else { ?>
                   <tr class="addTr">
                      <td><input type="hidden" name="addUpdate" id="addUpdate" value="0"><label class="lblSlNo">1</label></td>
                    <td><input type="file" class="form-control fileDoc" id="fileDoc1" name="fileDoc[]" />
                       <input type="hidden" class="hdnDocFile" name="hdnDocFile[]" id="hdnDocFile1" value="<?php echo $strfileDoc; ?>"/></td>
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
<script>
   function readImage(input) 
   {            
            $('#userImage').show();
            if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                    $('#userImage').attr('src', e.target.result);                   
                    }
                    reader.readAsDataURL(input.files[0]);
            }
    }
</script>
