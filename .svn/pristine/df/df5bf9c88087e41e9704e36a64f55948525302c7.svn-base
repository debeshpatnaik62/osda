<?php
/* ================================================
  File Name         	  : addNews.php
  Description		  : This is used for add news details.
  Designed By		  :
  Designed On		  : 
  Devloped By             : T Ketaki Debadarshini 
  Devloped On             : 23-April-2016
  Update History          : <Updated by>		<Updated On>		<Remarks>
 
  Style sheet             : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions     : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes		  : header.php, navigation.php, util.php, footer.php,addNewsInner.php

  ================================================== */

    require 'addNewsInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<link rel="stylesheet" href="<?php echo APP_URL; ?>css/datepicker.css">
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        strFirstLink = "Manage Application";
        strLastLink = "News";
        loadNavigation('<?php echo $strTab; ?> News');
        indicate = 'yes';
        $('#txtHeadlineE').focus();
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        });
//        displayCkeditor('txtDetailsE');  
//        displayCkeditor('txtDetailsH'); 
        TextCounter('txtSnippet','lblChar1',500);
        TextCounter('txtSnippetO','lblChar2',750);  
        ShowHideLnkTyp('<?php echo $intNewsType;?>');
		
    <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
    <?php } ?>  
        
    <?php if($id=='0' || $strFileName=='') {?>
                 $('#userImage').hide();
            <?php }?>
        $('#closeimg').click(function () {
            if (!confirm('Are you sure to delete selected File'))
                return false;
            $('#hdnImageFile').val('');
            $('#userImage').hide();
            $(this).hide();
          
        });  
       
              
   });
    /* to clear all ckeditor fields on rform reset*/
            function clearEditors(){
                     for (instance in CKEDITOR.instances){
                               CKEDITOR.instances[instance].setData(" ");
                      }
             }
             
     function ShowHideLnkTyp(linkType)
    {
        

        if (linkType == '1')
        {
            $(".sourceLabel1").html('Source Name');
            $(".sourceLabel2").html('Source Name in Odia');
            $(".sourceLabel3").html('News Image');
            $(".sourceLabel4").html('News Date');
            $('.biswaDiv').hide();
            $('.NewsUrlDiv').show();
            $('.txtSnippet').val('');
            $('.txtSnippetO').val('');
            
        }
        else if (linkType == '2')
        {
            $(".sourceLabel1").html('Author Name');
            $(".sourceLabel2").html('Author Name in Odia');
            $(".sourceLabel3").html('Upload Image');
            $(".sourceLabel4").html('Published Date');
            $('.biswaDiv').show();
            $('.NewsUrlDiv').hide();
        }else{
           $(".sourceLabel1").html('Source Name');
            $(".sourceLabel2").html('Source Name in Odia');
            $(".sourceLabel3").html('News Image');
            $(".sourceLabel4").html('News Date');
            $('.biswaDiv').hide();
            $('.NewsUrlDiv').show();
            $('.txtSnippet').val('');
            $('.txtSnippetO').val(''); 
        }
    }        
             
          
    function validator()
    {
        var linkType= $('#selNewsType').val();
        
         if (!blankCheck('txtHeadlineE', 'Headline  can not left blank'))
            return false;
        if (!checkSpecialChar('txtHeadlineE'))
            return false;
        if (!maxLength('txtHeadlineE', 250, 'Headline '))
            return false;
        
         if(linkType==2){
             
             var dateLevel='Published';
             var DescLevel='Description'; 
         if (!blankCheck('txtSourceNameE', 'Author Name can not be left blank'))
                return false;
        if (!checkSpecialChar('txtSourceNameE'))
            return false;
        if (!maxLength('txtSourceNameE', 80, 'Author Name'))
            return false;
         if (!maxLength('txtSourceNameO', 100, 'Author Name in Odia'))
                return false;
          if (!blankCheck('txtSnippet', 'Snippet can not be left blank'))
                return false;
            if (!checkSpecialChar('txtSnippet'))
                return false;
             
             
         }else{
            var dateLevel='News';
             var DescLevel='News details';
             if (!checkSpecialChar('txtSourceNameE'))
                return false;
            if (!validURL('txtSource', 'Please enter a valid Source Url'))
            return false;  
            
         }
          
        if ($('#fileDocument').val() != '')
        {
            if (!IsCheckFile('fileDocument', 'Invalid file types. Upload only ', 'jpg,jpeg,pdf'))
                return false;
            var fileSize_inKB = Math.round(($("#fileDocument")[0].files[0].size / 1024));
            if (fileSize_inKB > 1024)
            {
                viewAlert('File size should not be greater than 1MB.');
                return false;
            }
        }   
            
      
       if (!blankCheck('txtNewsDate', dateLevel+' Date can not left blank'))
            return false;
       if (!compareCurDate('txtNewsDate', dateLevel+' Date', 'g'))
                    return false;
       
       
        var newsDrelats   = CKEDITOR.instances['txtDetailsE'].getData();
        if(newsDrelats == ''){
                viewAlert(DescLevel+' can not left blank');
                return false;
            }                
    }
    function readImage(input) {

        var found = input.files[0].name.lastIndexOf('.') + 1;
        var extension = (found > 0 ? input.files[0].name.substr(found) : "");

        if(extension!='pdf')
        {
            $('#userImage').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#userImage').attr('src', e.target.result);
                    $('#imgMsg').css('margin-left', '210px');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
       else
       {
          $('#userImage').hide();
          $('#closeimg').hide();                   
       }
    }
   getNewsCategory('selNewsType','<?php echo $intNewsType;?>');       
</script>
<script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script>
<div class="page-content">
  <div class="page-header">
    <h1 id="title"></h1>
  </div>
  <div class="row">
    <div class="col-xs-12"> 
      <!-- PAGE CONTENT BEGINS -->
      <div class="top_tab_container"> <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab;?></a> 
          <a href="<?php echo APP_URL; ?>viewNews/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
          <a href="<?php echo APP_URL; ?>archieveNews/<?php echo $glId; ?>/<?php echo  $plId; ?>" class="btn btn-info">Archive</a></div>
 
      <?php include('includes/util.php'); ?>
      <div class="hr hr-solid"></div>
      
        <div class="col-xs-12">
                <div class="form-group" id="newsTypeDiv">
                    <label class="col-sm-2 control-label no-padding-right" for="selNewsType">News Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selNewsType" id="selNewsType" onChange="ShowHideLnkTyp(this.value);">
                            <option value="0">- Select -</option>
                        </select>
                        <span class="mandatory">*</span>               
                    </div>
                </div>
            
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineE">Headline</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtHeadlineE" name="txtHeadlineE" maxlength="250" placeholder="" class="form-control" value="<?php echo $strHeadLineE; ?>">
              <span class="mandatory">*</span> </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtHeadlineH">Headline in Odia</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtHeadlineH" name="txtHeadlineH" maxlength="300" placeholder="" class="form-control odia" value="<?php echo $strHeadLineH; ?>">
            </div>
          </div>
          
          
           <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right sourceLabel1" for="txtSourceNameE">Source Name</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtSourceNameE" name="txtSourceNameE" maxlength="80" placeholder="" class="form-control" value="<?php echo $strSourceNameE; ?>">
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right sourceLabel2" for="txtSourceNameO">Source Name in Odia</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtSourceNameO" name="txtSourceNameO" maxlength="100" placeholder="" class="form-control odia" value="<?php echo $strSourceNameO; ?>">
            </div>
          </div>  
          <div class="form-group NewsUrlDiv">
            <label class="col-sm-2 control-label no-padding-right" for="txtSource">Source Url</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="text" id="txtSource" name="txtSource" maxlength="250" placeholder="" class="form-control" value="<?php echo $strSource; ?>">
            </div>
          </div>
            
            <div class="form-group biswaDiv">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippet"> Snippet</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtSnippet" rows="3" name="txtSnippet" onKeyUp="return TextCounter('txtSnippet','lblChar1',500)" onMouseUp="return TextCounter('txtSnippet','lblChar1',500)" placeholder="" class="form-control"><?php echo $strSnippetE; ?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span> <span class="mandatory">*</span> 
                    </div>
                </div>
                <div class="form-group biswaDiv">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippetO"> Snippet in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtSnippetO" onKeyUp="return TextCounter('txtSnippetO','lblChar2',750)" onMouseUp="return TextCounter('txtSnippetO','lblChar2',750)" rows="3" name="txtSnippetO" placeholder="" class="form-control odia" ><?php echo $strSnippetO; ?></textarea>
                        <span class="red">Maximum <span id="lblChar2">750</span> characters </span>
                    </div>
                </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right sourceLabel3" for="fileDocument">News Photo</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <input type="file" id="fileDocument" name="fileDocument" placeholder="" class="form-control" onChange="readImage(this);">
              <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strFileName; ?>"/>
              <!--                        <span class="mandatory">*</span>--> 
            </div>
            <div class="help-inline col-xs-12 col-sm-6">
              
			  <?php if (($id > 0) && ($strFileName!='')) { 
                              if($fileExt!='pdf')
                               {
                            ?>
                            
              <img id="userImage" width="80" height="70" alt="" class="mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/news/' . $strFileName; ?>">
              
              <?php 
                                }else {
                              ?>
              <a href="<?php echo APP_URL;?>uploadDocuments/news/<?php echo $row['vchImageFile'];?>" target="_blank" id="userImage">
              <?php if($fileExt=='pdf'){?>
              <img src="<?php echo APP_URL;?>img/pdf.png" alt="" width="16" height="16" border="0" align="absmiddle">
              <?php } else{?>
              <img src="<?php echo APP_URL;?>img/wordIcon.jpg" alt="" width="20" height="20" border="0" align="absmiddle">
              <?php }?>
              </a>
              <?php 
                                }
                            ?>
              &nbsp;<span class="close-btn"><img src="<?php echo APP_URL;?>img/close-btn.png" width="16" height="16" alt="Close" id="closeimg" style="cursor: pointer;"></span>
              <?php } else { ?>
              <img id="userImage" width="200" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
              <?php } ?>
              <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a> </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"></label>
            <div class="col-sm-8"> <span class="red">(jpg,jpeg,pdf file only and Max size file Size 1 MB. &nbsp;  Recommended Image width = 538px and height = 432px)</span> </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right sourceLabel4" for="txtNewsDate">News Date</label>
            <div class="col-sm-4"> <span class="colon">:</span>
              <div class="input-group">
                  <input type="text" data-date-format="dd-mm-yyyy" name="txtNewsDate" id="txtNewsDate" readonly="true" class="form-control date-picker" value="<?php echo $strNewsDate; ?>">
                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
              <span class="mandatory">*</span> </div>
          </div>
         
          
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtDetailsE">Details in English </label>
            <div class="col-sm-10"> <span class="colon">:</span>
              <textarea class="ckeditor form-control" id="txtDetailsE" name="txtDetailsE" rows="10"><?php echo $strDetailE; ?></textarea>
              <span class="mandatory">*</span> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right" for="txtDetailsO">Details in Odia</label>
            <div class="col-sm-10"> <span class="colon">:</span>
              <textarea class="ckeditor form-control" id="txtDetailsH" name="txtDetailsH" rows="10"><?php echo $strDetailH; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2 no-padding-right"></div>
            <div class="col-sm-4">
              <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();"/>
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
