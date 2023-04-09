<?php
/* ================================================
  File Name                 : addPage.php
  Description               : This is used for add the Page Name and content details.
  Devloped By               : T Ketaki Debadarshini
  Devloped On               : 23-Nov-2015
  Update History            :	<Updated by>		<Updated On>		<Remarks>
 
  Style sheet               : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css
  Javscript Functions       : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
  includes                  : header.php, navigation.php, util.php, footer.php,addPageInner.php			  :

  ================================================== */
require("addPageInner.php");
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo APP_URL; ?>js/loadAjax.js"></script>
<script language="javascript">
    $(document).ready(function () {
       loadNavigation('<?php echo $strTab; ?> Pages');
        strFirstLink = "Manage Link";
        strLastLink  = "Pages";
        indicate = 'yes';
        
        displayCkeditor('txtContentE'); 
      // displayCkeditor('txtContentH'); 

       
        
	$('#deletePage').hide(); $('#deletePageH').hide();
        $('.clsActive').show();  $('.clsActiveH').show();
        $('.clsDeactive').hide();
        $('.clsDeactiveH').hide();
        
        $('#txtTitle_e').focus();
        $('#divUrl').hide();
        $('#pluginDrp').hide();
        
        ShowHideTempTyp('<?php echo $intTempletType; ?>');
        ShowHideLnkTyp('<?php echo $intLinkType; ?>');
        
            
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>   
            
        <?php if ($strFileName == '') { ?>
                    $('#userImage').hide();
        <?php } else { ?>
                    $('#imgMsg').css('margin-left', '110px');
        <?php } ?>
          // getContent('txtContentE','<?php echo $id ?>',1,1);
           readPageContent('<?php echo $id ?>');
           readPageContentH('<?php echo $id ?>');

            // Function to close image
        $('#close').click(function () {
            if (!confirm('Are you sure to delete selected File'))
                return false;
            $('#hdnImageFile').val('');
            $('#imageFile').hide();
            $(this).hide();
            $('#imgMsg').css('margin-left', '0px');
        });
         $('#closemeta').click(function () {
            if (!confirm('Are you sure to delete selected File'))
                return false;
            $('#hdnMetaImageFile').val('');
            $('#imagemetaFile').hide();
            $(this).hide();
            $('#imgMsg').css('margin-left', '0px');
        });
        
        setTimeout(function(){ $("select option[value='<?php echo $strPluginName;?>']").attr("selected","selected"); }, 1000);
  
 	$('.addMore').on("click",function(){
         addContentDetail();
        
    }); 
        $('.addMoreH').on("click",function(){
            addContentDetailH();
        });
        
	$('#deletePage').on("click",function(){
		var lastPage	= $(".contentLabel:last").val();
		if(lastPage<=2)
			$(this).hide();
		var prevPage	= Number(lastPage)-1;
		$('#hdnPageId'+lastPage).remove();
		$('#hdnContentId'+lastPage).remove();
		$('#hdnPagevalue'+lastPage).remove();
		$('#hdnCurrentId').val(prevPage);
		$('#conBTn'+lastPage).removeClass('clsActive');
		 $('#conBTn'+lastPage).removeClass('contentLabel');
		 $('#conBTn'+lastPage).addClass('clsDeactive');
		 $('#conBTn'+lastPage).removeClass('activeBtn');
		 $('#conBTn'+prevPage).addClass('activeBtn');
		 $('.clsActive').show();
		 $('.clsDeactive').hide();
		 arrcontent.splice(-1,1);
		 var arrayVal	= arrcontent[Number(prevPage)-1];
		 CKEDITOR.instances['txtContentE'].setData(arrayVal);
	});


        var editor = CKEDITOR.instances['txtContentE'];
        if (editor) {
            editor.on('change', function(event) { 
                var currId  = $('#hdnCurrentId').val();
                var page    = currId-1;
               var page_content   = CKEDITOR.instances['txtContentE'].getData(); 
               if(arrcontent.length==page)
               {
                   $('#hdnPageId'+currId).val(currId);
                   $('#hdnPagevalue'+currId).val(page_content);
                    arrcontent[page] = page_content; 
               }
               else
               {
                   $('#hdnPageId'+currId).val(currId);
                   $('#hdnPagevalue'+currId).val(page_content);
                    arrcontent[page] = page_content; 
                }

            });
        } 
        /* For Hindi Content */
        
        $('#deletePageH').on("click",function(){
            var lastPageH	= $(".contentLabelH:last").val();
            if(lastPageH<=2)
                    $(this).hide();
            var prevPageH	= Number(lastPageH)-1;
            $('#hdnPageIdH'+lastPageH).remove();
            $('#hdnContentIdH'+lastPageH).remove();
            $('#hdnPagevalueH'+lastPageH).remove();
            $('#hdnCurrentIdH').val(prevPageH);
            $('#conBTnH'+lastPageH).removeClass('clsActiveH');
            $('#conBTnH'+lastPageH).removeClass('contentLabelH');
            $('#conBTnH'+lastPageH).addClass('clsDeactiveH');
            $('#conBTnH'+lastPageH).removeClass('activeBtnH');
            $('#conBTnH'+prevPageH).addClass('activeBtnH');
            $('.clsActiveH').show();
            $('.clsDeactiveH').hide();
            arrcontentH.splice(-1,1);
            var arrayValH	= arrcontentH[Number(prevPageH)-1];
            CKEDITOR.instances['txtContentH'].setData(arrayValH);
	});                
        
        var editorH = CKEDITOR.instances['txtContentH'];
        if (editorH) {
            editorH.on('change', function(event) { 
               var currIdH  = $('#hdnCurrentIdH').val();
               var pageH    = currIdH-1;
               var page_contentH   = CKEDITOR.instances['txtContentH'].getData(); 
               if(arrcontentH.length==pageH)
               {
                   $('#hdnPageIdH'+currIdH).val(currIdH);
                   $('#hdnPagevalueH'+currIdH).val(page_contentH);
                   arrcontentH[pageH] = page_contentH; 
               }
               else
               {
                   $('#hdnPageIdH'+currIdH).val(currIdH);
                   $('#hdnPagevalueH'+currIdH).val(page_contentH);
                   arrcontentH[pageH] = page_contentH; 
               }
            });
        } 
    
         TextCounter('txtMetaDescription','lblChar1',500);
         TextCounter('txtSnippet','lblChar2',500);
         TextCounter('txtSnippetO','lblChar3',750);
 });
  // Create dynamic page
    
    
    function addContentDetail()
    {
	
         totalRecord = $('.contentLabel').length;
        if(totalRecord>=10)
        {
            alert("Maximum 10 Page can be added.");
            return false;
        }
        counter        = totalRecord+1;
        var prvCounter     = counter-1;
        var newTextBoxDiv  = '';
        var page_content   = CKEDITOR.instances['txtContentE'].getData();
        $('#hdnPagevalue'+prvCounter).val(page_content); 
        $('#hdnPageId'+prvCounter).val(prvCounter);  
            if(page_content!="")
            {
                 $('#deletePage').show();
                 $(".contentLabel").removeClass('activeBtn');
                 $('#conBTn'+counter).addClass('clsActive');
                 $('#conBTn'+counter).addClass('contentLabel');
                 $('#conBTn'+counter).removeClass('clsDeactive');
				 $('#conBTn'+counter).addClass('activeBtn');
                 $('.clsActive').show();
                 $('.clsDeactive').hide();
                //newTextBoxDiv+=' <input type="button" class="btn btn-xs contentLabel" name="conBTn' + counter + '" id="conBTn' + counter + '" value="'+counter+'"> ';
                newTextBoxDiv+='<input type="hidden" id="hdnPageId' + counter + '" name="hdnPageId[]" value="' + counter + '"/>';
                newTextBoxDiv+='<input type="hidden" id="hdnContentId' + counter + '" name="hdnContentId[]" value="0"/>';
                //newTextBoxDiv+='<input type="hidden" id="hdnPagevalue' + counter + '" name="hdnPagevalue[]" value="'+escapeHtmlEntities(page_content)+'"/>';
                newTextBoxDiv+='<input type="hidden" id="hdnPagevalue' + counter + '" name="hdnPagevalue[]" />';
                
             // arrcontent.push(escapeHtmlEntities(page_content));
                arrcontent[Number(prvCounter)-1]=page_content;
                 $("#groupPageMore").append(newTextBoxDiv);                 
                 CKEDITOR.instances['txtContentE'].setData('');
                $('#hdnCurrentId').val(counter);
            }
        
        else
        {
            if(Number(validFlag)!=1)
            { 
                alert("Page"+prvCounter+" Content can not be left blank");
                $('#conBTn'+prvCounter).focus();
                return false;
            }
        }
    }
  
    // Function to validate
    function validator()
    {		
        if (!blankCheck('txtTitle_e', 'Page Name can not left blank'))
            return false;
//        if(!checkValidPage('txtTitle_e'))
//            return false;
        if (!checkSpecialChar('txtTitle_e'))
            return false;
        //if (!checkSpecialChar('txtTitle_o'))
         //   return false;
        if (!maxLength('txtTitle_e', 80, 'Page Name.'))
            return false;
        if (!blankCheck('txtPageAlias', 'Page Alias can not left blank'))
            return false;
	if(!checkValidPage('txtPageAlias'))
            return false;
	if (!maxLength('txtPageAlias', 50,'Page Alias'))
            return false;
        
        if (!blankCheck('txtTagline', 'Tagline can not be left blank'))
            return false;
         if (!checkSpecialChar('txtTagline'))
            return false;
        if (!maxLength('txtTagline', 80, 'Tagline '))
            return false;
        if (!blankCheck('txtTaglineO', 'Tagline in Odia can not be left blank'))
            return false;
        
        /*if (!blankCheck('txtSnippet', 'Snippet can not be left blank'))
            return false;*/
        if (!checkSpecialChar('txtSnippet'))
            return false;
	if (!maxLength('txtSnippet', 750,'Snippet'))
           return false;
        //if (!checkSpecialChar('txtSnippetO'))
           // return false;
        
	if (!checkSpecialChar('txtMetaTitle'))
            return false;
	if (!maxLength('txtMetaTitle', 120,'Meta Title'))
            return false;
	if (!checkSpecialChar('txtMetaTitle'))
            return false;
        if (!checkSpecialChar('txtMetaType'))
            return false;
	if (!maxLength('txtMetaType', 80,'Meta Type'))
            return false;
	if (!checkSpecialChar('txtMetaType'))
            return false;
	if (!maxLength('txtMetaKey', 200,'Meta Key Word'))
            return false;
	if (!checkSpecialChar('txtMetaKey'))
            return false;
	if (!maxLength('txtMetaDescription', 500,'Meta Description'))
           return false;
        if (!checkSpecialChar('txtMetaDescription'))
            return false;
        
        var imgFile = $("#fileFeaturedImage").val();
        if (imgFile != '')
        {
            if (!IsCheckFile('fileFeaturedImage', 'Upload a valid image', 'gif,jpeg,jpg,pjpeg'))
                return false;
            var fileSize_inKB = Math.round(($("#fileFeaturedImage")[0].files[0].size / 1024));
            if (fileSize_inKB > 1024)
            {
                alert('File size should not be greater than 1MB.');
                return false;
            }
        }
         var imgMetaFile = $("#fileMetaImage").val();
        if (imgMetaFile != '')
        {
            if (!IsCheckFile('fileMetaImage', 'Upload a valid image', 'gif,jpeg,jpg,pjpeg,png'))
                return false;
            var fileSize_inKB = Math.round(($("#fileMetaImage")[0].files[0].size / 2048));
            if (fileSize_inKB > 1024)
            {
                alert('File size should not be greater than 1MB.');
                return false;
            }
        }
        var linkType = $('input:radio[name=rbtLnkType]:checked').val();
        var templateType = $('input:radio[name=radTemplateType]:checked').val();
        if (linkType == '2')
        {
            if (!blankCheck('txtURL', 'URL can not left blank'))
                return false;
            if (!checkSpecialChar('txtURL'))
                return false;
            if (!validURL('txtURL', 'Please enter a valid URL(Ex : http://www.google.com)'))
                return false;
        }
        if (linkType == '1' && templateType == '1')
        {
            var contentFlag	= 0;
            var lengthFlag	= 0;
            var pgNum		= 0;
            $('input[name="hdnPagevalue[]"]').each(function(){
                    pgNum++;
                    var contentVal	= $(this).val();
                    if(contentVal=='')
                    {
                            contentFlag++;
                            return false;
                    }
                    if(contentVal.length>65535)
                    {
                            lengthFlag++;
                            return false;
                    }

            });
            if (contentFlag>0)
            {
                viewAlert("Content can not be left blank in page "+pgNum);
		$("#txtContentE").focus();
                return false;
            }
            if(lengthFlag>0)
            {
                viewAlert("Maximum 65535 characters can be added in page "+pgNum);
                $("#txtContentE").focus();
                return false;
            }
            /*var contentFlagO	= 0;
            var lengthFlagO	= 0;
            var pgNumO		= 0;
             $('input[name="hdnPagevalueH[]"]').each(function(){
                    pgNumO++;
                    var contentValO	= $(this).val();
                    if(contentValO=='')
                    {
                            contentFlagO++;
                            return false;
                    }
                    if(contentValO.length>65535)
                    {
                            lengthFlagO++;
                            return false;
                    }

            });
            if (lengthFlagO>0)
            {
                alert("Content can not be left blank in page "+pgNum);
		$("#txtContentH").focus();
                return false;
            }
            if(lengthFlagO>0)
            {
                alert("Maximum 65535 characters can be added in page "+pgNum);
                $("#txtContentH").focus();
                return false;
            }*/

        }
        if (linkType == '1' && templateType == '2')
        {
            if (!selectDropdown('selPluginName', 'Select Plugin Name'))
                return false;

        }


    }
   function checkValidPage(controlId)
	{
		var numPattern          = new RegExp(/^[-_a-zA-Z]+$/);
		var txtVal		= $('#'+controlId).val();
		if(txtVal!='')
		{
			if (numPattern.test(txtVal)==true) 
				return true;
			else 
			{
				alert("Please enter a valid Alias Name");
				$('#'+controlId).focus();
				return false;
			}
		}
		else
			return true;
	}
      // Function to Read image
    function readImage(input,imgElement) {
        $('#'+imgElement).show();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+imgElement).attr('src', e.target.result);
               // $('#imgMsg').css('margin-left', '110px');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    /**
 * This will fix the CKEDITOR not handling the input[type=reset] clicks.
 */
$(function() {
    if (typeof CKEDITOR != 'undefined') {
        $('form').on('reset', function(e) {
            if ($(CKEDITOR.instances).length) {
                for (var key in CKEDITOR.instances) {
                    var instance = CKEDITOR.instances[key];
                    if ($(instance.element.$).closest('form').attr('name') == $(e.target).attr('name')) {
                        instance.setData(instance.element.$.defaultValue);
                    }
                }
            }
        });
    }
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
           
            <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a>
            <a href="<?php echo APP_URL ?>viewPage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
            <a href="<?php echo APP_URL ?>archievePage/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a> </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTitle_e"> Page Name in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtTitle_e" name="txtTitle_e" onkeyup="convertToSlug(this.value, 'txtPageAlias');"  placeholder="" class="form-control" maxlength="80" value="<?php echo $strTitleE; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTitle_h"> Page Name in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtTitle_o" name="txtTitle_H" placeholder="" class="form-control odia" maxlength="150" value="<?php echo $strTitleO; ?>">
<!--                        <span class="mandatory">*</span>-->
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtPageAlias">Page Alias</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtPageAlias" name="txtPageAlias" placeholder="" class="form-control" maxlength="50" value="<?php echo $strPageAlias; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTagline">Tagline</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtTagline" name="txtTagline" placeholder="" class="form-control" maxlength="80" value="<?php echo $strTagline; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtTaglineO">Tagline Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtTaglineO" name="txtTaglineO" placeholder="" class="form-control odia" maxlength="100" value="<?php echo $strTaglineO; ?>">
                        <span class="mandatory">*</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippet">Snippet in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtSnippet" name="txtSnippet" style="height:100px;" onKeyUp="return TextCounter('txtSnippet','lblChar2',500)" onMouseUp="return TextCounter('txtSnippet','lblChar2',500)"><?php echo $strSnippet;?></textarea>
                     <span class="red">Maximum <span id="lblChar2">500</span> characters </span>
                        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippetH">Snippet in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control odia" id="txtSnippetO" name="txtSnippetH" style="height:100px;" onKeyUp="return TextCounter('txtSnippetO','lblChar3',750)" onMouseUp="return TextCounter('txtSnippetO','lblChar3',750)"><?php echo $strSnippetO;?></textarea>
                     <span class="red">Maximum <span id="lblChar3">750</span> characters </span>
                        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMetaTitle">Meta Title</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtMetaTitle" name="txtMetaTitle" placeholder="" class="form-control" maxlength="120" value="<?php echo $strMetaTitle; ?>">
                        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMetaType">Meta Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtMetaType" name="txtMetaType" placeholder="" class="form-control" maxlength="80" value="<?php echo $strMetaType; ?>">
                       
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMetaKey">Meta Key Ward</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="text" id="txtMetaKey" name="txtMetaKey" placeholder="" class="form-control" maxlength="200" value="<?php echo $strMetaKeyword; ?>">
                        
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMetaDescription">Meta Description</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtMetaDescription" name="txtMetaDescription" style="height:100px;"  onKeyUp="return TextCounter('txtMetaDescription','lblChar1',500)" onMouseUp="return TextCounter('txtMetaDescription','lblChar1',500)"><?php echo $strMetaDescription;?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span>
                        
                    </div>
                </div> 
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="fileMetaImage"> Meta Image </label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="fileMetaImage" name="fileMetaImage" placeholder="" class="form-control" onChange="readImage(this,'imagemetaFile');">
                        <input type="hidden" name="hdnMetaImageFile" id="hdnMetaImageFile" value="<?php echo $strMetaImage; ?>"/>
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                        <?php 
                        if($id != '' && $strMetaImage != '') 
                        {
                        $display = '';
                        } 
                        else
                        {
                        $display = 'style="display:none;"';
                        }
                        ?>
                        <img src="<?php echo APP_URL;?>uploadDocuments/banner/<?php echo $strMetaImage;?>" alt="" width="52" height="65" border="0" id="imagemetaFile" align="absmiddle" <?php echo $display;?>> 
                        &nbsp;<img src="<?php echo APP_URL;?>img/close-btn.png" width="16" height="16" alt="Close" id="closemeta" <?php echo $display;?>>
                        <span id="imgMsg" class="red" >(Only gif,jpg,jpeg,png files upto 1MB)</span>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="fileFeaturedImage"> Featured Image</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="fileFeaturedImage" name="fileFeaturedImage" placeholder="" class="form-control" onChange="readImage(this,'imageFile');">
                        <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strFileName; ?>"/>
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                        <?php 
                        if($id != '' && $strFileName != '') 
                            $display = '';
                        else
                            $display = 'style="display:none;"';
                        ?>
                        <img src="<?php echo APP_URL;?>uploadDocuments/featuredImage/<?php echo $strFileName;?>" alt="" width="52" height="65" border="0" id="imageFile" align="absmiddle" <?php echo $display;?>> 
                        &nbsp;<img src="<?php echo APP_URL;?>img/close-btn.png" width="16" height="16" alt="Close" id="close" <?php echo $display;?>>
                        <span id="imgMsg" class="red" >(Only gif,jpg,jpeg files upto 1MB. <br> &nbsp;  Recommended Image width = 1920px and height = 476px )</span>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="rbtLnkType">Link Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <div class="radio">
                            <label>
                                <input name="rbtLnkType" type="radio" class="ace" value="1"  onClick="ShowHideLnkTyp(this.value);" <?php if ($intLinkType == 1) { ?>checked="checked"<?php } ?> >
                                <span class="lbl"> Internal</span>
                            </label>
                            <label>
                                <input name="rbtLnkType" type="radio" value="2" class="ace" onClick="ShowHideLnkTyp(this.value);" <?php if ($intLinkType == 2) { ?>checked="checked"<?php } ?> >
                                <span class="lbl"> External</span>
                            </label>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="radWinStatus">Window Status</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <div class="radio">
                            <label>
                                <input name="radWinStatus" type="radio" class="ace" value="1" <?php if ($intWinStatus == 1) { ?> checked="checked" <?php } ?>>
                                <span class="lbl"> Same</span>
                            </label>
                            <label>
                                <input name="radWinStatus" type="radio" value="2" class="ace" <?php if ($intWinStatus == 2) { ?> checked="checked" <?php } ?>>
                                <span class="lbl"> New</span>
                            </label>
                        </div>
                    </div>
                </div>    
                <div class="form-group" id="divUrl">
                    <label class="col-sm-2 control-label no-padding-right" for="txtURL">URL</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>                        
                        <input type="text" name="txtURL" id="txtURL" class="form-control" value="<?php echo $strURL; ?>"/>
                        <span class="mandatory">*</span>               
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="radPanelStatus">Show Right Panel</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <div class="radio">
                            <label>
                                <input name="radPanelStatus" type="radio" class="ace" value="1" <?php if ($tinShowpanel == 1) { ?> checked="checked" <?php } ?>>
                                <span class="lbl"> Yes</span>
                            </label>
                            <label>
                                <input name="radPanelStatus" type="radio" value="2" class="ace" <?php if ($tinShowpanel == 2) { ?> checked="checked" <?php } ?>>
                                <span class="lbl"> No</span>
                            </label>
                        </div>
                    </div>
                </div> 
                <div class="form-group" id="templateDiv">
                    <label class="col-sm-2 control-label no-padding-right" for="radTemplateType">Page Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <div class="radio">
                            <label>
                                <input name="radTemplateType" type="radio" class="ace" value="1" onClick="ShowHideTempTyp(this.value);" <?php if ($intTempletType == 1) { ?> checked="checked" <?php } ?>  >
                                <span class="lbl"> Content</span>
                            </label>
                            <label>
                                <input name="radTemplateType" type="radio" value="2" class="ace" onClick="ShowHideTempTyp(this.value);" <?php if ($intTempletType == 2) { ?> checked="checked" <?php } ?> >
                                <span class="lbl"> Plugin</span>
                            </label>
                            <label>
                                <input name="radTemplateType" type="radio" value="3" class="ace" onClick="ShowHideTempTyp(this.value);" <?php if ($intTempletType == 3) { ?> checked="checked" <?php } ?> >
                                <span class="lbl"> None</span>
                            </label> 

                        </div>

                    </div>
                </div>
                <div id="divContentEn">
                    <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="">Page No</label>
                    <div class="col-sm-10"> 
                       <input type="button" class="btn btn-xs contentLabel clsActive" id="conBTn1" value="1"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn2" value="2"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn3" value="3"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn4" value="4"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn5" value="5"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn6" value="6"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn7" value="7"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn8" value="8"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn9" value="9"/>
                       <input type="button" class="btn btn-xs clsDeactive" id="conBTn10" value="10"/>
                        <span  id="groupPageMore">
                            
                             <input type="hidden" id="hdnPageId1" name="hdnPageId[]" value="1"/>
                             <input type="hidden" id="hdnPagevalue1" name="hdnPagevalue[]"/>
                             <input type="hidden" id="hdnContentId1" name="hdnContentId[]" value="0"/>
                            
                        </span>
                        <input type="hidden" id="hdnCurrentId" name="hdnCurrentId" value="1"/>
                      <a href="javascript:void(0);" id="more1" class="btn btn-xs btn-info addMore" title="Add More"> <i class="icon-white icon-plus-sign"></i> </a> <a href="javascript:void(0);" id="deletePage" class="btn btn-xs btn-danger delete" title="Delete"> <i class="icon-white fa fa-times"></i> </a>  
                    </div>
                     
                </div> 
                    
                <div class="form-group contentval1 contentActive">
                    <label class="col-sm-2 control-label no-padding-right" for="txtContentE">Content in English</label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>
                        <textarea class=" " cols="50" id="txtContentE" name="txtContentE" rows="10"></textarea>
                        <span class="mandatory">*</span>                  
                    </div>
                </div>
                
                </div>
                
                <div id="divContentOd">
                    <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="">Page No</label>
                    <div class="col-sm-10"> 
                      <input type="button" class="btn btn-xs contentLabelH clsActiveH" id="conBTnH1" value="1"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH2" value="2"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH3" value="3"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH4" value="4"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH5" value="5"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH6" value="6"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH7" value="7"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH8" value="8"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH9" value="9"/>
                            <input type="button" class="btn btn-xs clsDeactiveH" id="conBTnH10" value="10"/>
                            <span  id="groupPageMoreH">
                            <input type="hidden" id="hdnPageIdH1" name="hdnPageIdH[]" value="1"/>
                            <input type="hidden" id="hdnPagevalueH1" name="hdnPagevalueH[]"/>
                            <input type="hidden" id="hdnContentIdH1" name="hdnContentIdH[]" value="0"/>
                            </span>
                            <input type="hidden" id="hdnCurrentIdH" name="hdnCurrentIdH" value="1"/>
                            <a href="javascript:void(0);" id="moreH1" class="btn btn-xs btn-info addMoreH" title="Add More"> <i class="icon-white icon-plus-sign"></i> </a> <a href="javascript:void(0);" id="deletePageH" class="btn btn-xs btn-danger deleteH" title="Delete"> <i class="icon-white fa fa-times"></i></a>
                    
                    </div>
                     
                </div> 
                    
                <div class="form-group contentval1 contentActive">
                    <label class="col-sm-2 control-label no-padding-right" for="txtContentH">Content in Odia</label>
                    <div class="col-sm-10">
                        <span class="colon">:</span>
                        <textarea class="ckeditor odia" cols="50" id="txtContentH" name="txtContentH" rows="10"></textarea>
<!--                        <span class="mandatory">*</span>-->
                    </div>
                </div>
                
                </div>
                
                
                <div class="form-group" id="pluginDrp">
                    <label class="col-sm-2 control-label no-padding-right" for="selPluginName">Select Plugin</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selPluginName" id="selPluginName">
                            <option value="0">- Select -</option>
                            <?php
                         
                             if ($dirFiles = opendir($abs_Path.'/view')) 
                            { 
                                while (false !== ($fileName = readdir($dirFiles))) 
                                {
                                    if ($fileName != "." && $fileName != "..") 
                                    {
                                      
                                        $commentsArr = $objPages->getFileComments($abs_Path.'/view/'.$fileName);                                                                                
                                        $arrFile = explode('.',$fileName);
                                        if(sizeof($commentsArr) > 0 && $commentsArr[0] == '/*plugin*/')
                                        {
                                           /* if($arrFile[0]==$strPluginName)                                            
                                               $selected = 'checked="true"';
                                            else
                                                $selected = '';*/
                                    ?>
                                    <option value="<?php echo $arrFile[0];?>" <?php //echo $selected;?> ><?php echo ucfirst(strtolower($arrFile[0])); ?></option>
                                    <?php    
                                        }
                                    }
                                }

                                closedir($dirFiles);
                            }
                            ?>  
                        </select>
                        <span class="mandatory">*</span>               
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
<script type="text/javascript">
     function ShowHideLnkTyp(linkType)
    {

        if (linkType == '1')
        {
            $("#templateDiv").show();
            $("#divUrl").hide();
            $("#selPluginName").val('');
        }
        if (linkType == '1' && $('input:radio[name=radTemplateType]:checked').val() == 1)
        {
            $("#divContentEn").show();
            $("#divContentOd").show();
            
        }
        if (linkType == '1' && $('input:radio[name=radTemplateType]:checked').val() == 2)
            $("#pluginDrp").show();
        if (linkType == '2')
        {
            $("#templateDiv").hide();
            $("#divUrl").show();
            if($('#txtURL').val=='')
            $("#txtURL").val('http://');
            $("#divContentEn").hide();   $("#divContentOd").hide();
            $("#pluginDrp").hide();
            $('#txtContentE').html('');  $('#txtContentH').html('');

        }
    }
    function ShowHideTempTyp(tempType)
    {
        if (tempType == '1')
        {
            $("#divContentEn").show(); $("#divContentOd").show();
            $("#pluginDrp").hide();
            $("#selPluginName").val('');
        }
        if (tempType == '2')
        {
            $("#pluginDrp").show();
            $("#divContentEn").hide(); $("#divContentOd").hide();
            $("#txtContent").val('');
        }
        if (tempType == '3')
        {
            $("#pluginDrp").hide();
            $("#divContentEn").hide(); $("#divContentOd").hide();
            $("#txtContent").val('');
        }
    }
    // function to get page content
    
   
    function getHiddenPage(id)
    { 
        var btnValue    = $('#'+id).val(); 
        CKEDITOR.instances['txtContentE'].setData(arrcontent[btnValue-1]);
    }
    
    var ctr = 0;
    $(".contentLabel").on("click",function(){
		$(".contentLabel").removeClass('activeBtn');
		$(this).addClass('activeBtn');
        var lastId  = $('.contentLabel:last').val();
        var idVal       = $(this).attr("id");
        var btnValue    = $('#'+idVal).val();
        var content     =arrcontent[Number(btnValue)-1]; 
        var prevContent =arrcontent[Number(btnValue)-2]; 
        if(content!='')
            CKEDITOR.instances['txtContentE'].setData(content);
        var page_content   = CKEDITOR.instances['txtContentE'].getData();
        
       // var page_content = CKEDITOR.instances['txtContentE'].getData();
        if ( btnValue!=1 && prevContent =='' )
        {
             $('#hdnPageId').val(Number(btnValue-1));
             var pageno = Number(btnValue)-1;
            alert("Page"+pageno+" Content can not be left blank");
             $('#conBTn'+pageno).focus();
            return false;
        }
        else  
        {
        $('#hdnPageId').val(btnValue);
        getHiddenPage(idVal);
        $('#hdnCurrentId').val(btnValue);
    }
       

    });


 /* For Odia Content */    
    // Create dynamic page  
    
    function addContentDetailH()
    {	
        totalRecordH = $('.contentLabelH').length;
        if(totalRecordH>=10)
        {
            alert("Maximum 10 Page can be added.");
            return false;
        }
        counterH            = totalRecordH+1;
        var prvCounterH     = counterH-1;
        var newTextBoxDivH  = '';
        var page_contentH   = CKEDITOR.instances['txtContentH'].getData();
        $('#hdnPagevalueH'+prvCounterH).val(page_contentH); 
        $('#hdnPageIdH'+prvCounterH).val(prvCounterH);          
        if(page_contentH!="")
        {
            $('#deletePageH').show();
            $(".contentLabelH").removeClass('activeBtnH');
            $('#conBTnH'+counterH).addClass('clsActiveH');
            $('#conBTnH'+counterH).addClass('contentLabelH');
            $('#conBTnH'+counterH).removeClass('clsDeactiveH');
            $('#conBTnH'+counterH).addClass('activeBtnH');
            $('.clsActiveH').show();
            $('.clsDeactiveH').hide();                
            newTextBoxDivH +='<input type="hidden" id="hdnPageIdH' + counterH + '" name="hdnPageIdH[]" value="' + counterH + '"/>';
            newTextBoxDivH +='<input type="hidden" id="hdnContentIdH' + counterH + '" name="hdnContentIdH[]" value="0"/>';                
            newTextBoxDivH +='<input type="hidden" id="hdnPagevalueH' + counterH + '" name="hdnPagevalueH[]" />';                             
            arrcontentH[Number(prvCounterH)-1]=page_contentH;
            $("#groupPageMoreH").append(newTextBoxDivH);                 
            CKEDITOR.instances['txtContentH'].setData('');
            $('#hdnCurrentIdH').val(counterH);
        }       
        else
        {
            if(Number(validFlagH)!=1)
            { 
               alert("Page"+prvCounterH+" Content can not be left blank");
               $('#conBTnH'+prvCounterH).focus();
               return false;
            }
        }
    }
        
    function getHiddenPageH(id)
    { 
        var btnValueH    = $('#'+id).val(); 
        CKEDITOR.instances['txtContentH'].setData(arrcontentH[btnValueH-1]);
    }
        
    var ctrH = 0;
    $(".contentLabelH").on("click",function(){
	$(".contentLabelH").removeClass('activeBtnH');
	$(this).addClass('activeBtnH');
        var lastIdH      = $('.contentLabelH:last').val();
        var idValH       = $(this).attr("id");
        var btnValueH    = $('#'+idValH).val();
        var contentH     = arrcontentH[Number(btnValueH)-1]; 
        var prevContentH = arrcontentH[Number(btnValueH)-2]; 
        if(contentH!='')
            CKEDITOR.instances['txtContentH'].setData(contentH);
        var page_contentH   = CKEDITOR.instances['txtContentH'].getData();     
        var page_contentH   = CKEDITOR.instances['txtContentH'].getData();
        if ( btnValueH!=1 && prevContentH =='' )
        {
            $('#hdnPageIdH').val(Number(btnValueH-1));
            var pagenoH = Number(btnValueH)-1;
            alert("Page"+pagenoH+" Content can not be left blank");
            $('#conBTnH'+pagenoH).focus();
            return false;
        }
        else  
        {
            $('#hdnPageIdH').val(btnValueH);
            getHiddenPageH(idValH);
            $('#hdnCurrentIdH').val(btnValueH);
        }       
    });

</script>

