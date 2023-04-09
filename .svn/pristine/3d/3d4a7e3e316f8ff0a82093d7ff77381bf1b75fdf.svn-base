<?php
	/* ================================================
	File Name         	  : addGallery.php
	Description		  : This is used for add Gallery Images Details.
	Designed By		  : 
        Designed On		  : 
        Devloped By		  : T Ketaki Debadarshini
        Devloped On		  : 19-Feb-2016
	Update History		  :	<Updated by>		<Updated On>		<Remarks>
					
	Style sheet                 : bootstrap.min.css, font-awesome.min.css, ace.min.css, custom.css                                          
	Javscript Functions          : jquery.min.js, bootstrap.min.js, custom.js,  loadcomponent.js
	includes			  :	header.php, navigation.php, util.php, footer.php,addGallerycategoryInner.php

	==================================================*/
	
     require 'addGalleryInner.php';
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
        $(document).ready(function () {
                //loadNavigation('<?php //echo $strTab;?> Gallery');
                pageHeader   = "<?php echo $strTab; ?> Media Gallery";
                strFirstLink = "Manage Application";
                strLastLink  = "Media Gallery"; 
                
                fillCategory('<?php echo $intCategory; ?>','selCategory','0');
               
                $('#selType').focus();
               
                indicate = 'yes';
              <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
                    viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
                <?php } ?>  
            <?php
                   
             if($id==0){
            ?>
                $('#userImage').hide();
        <?php } else {?>
                $('#imgMsg').css('margin-left', '110px');
            <?php }?>
        
           showTypeDetails('<?php echo $intType; ?>');
             <?php if($intType==3){ ?> 
                ShowHideLnkType2('<?php echo $intLinkType; ?>');
               <?php }?>
                   
            TextCounter('txtDescription','lblChar1',500);
            TextCounter('txtDescriptionH','lblChar2',750);       
	});
         function ShowHideLnkType2(linkType) {
                if (linkType == '1')
                {
                    $(".URL").hide();
                    $(".upload").show();
                }
                else if (linkType == '2')
                {
                    $(".URL").show();
                    $(".upload").hide();
                }
            }
            function showTypeDetails(idVal)
            {               
                if (idVal == 1)
                {
                    $(".uploadAudio").show();
                    $(".upload").hide();
                    $(".URL").hide();                   
                    $("#lnkTyp").hide();
                    $(".divImage").hide();
                    $("#categoryDiv").hide();
                }
                else if (idVal == 2)
                {
                    $(".uploadAudio").hide();
                    $(".upload").hide();
                    $(".URL").hide();
                   
                    $("#lnkTyp").hide();
                    $(".divImage").show();               
                    $("#categoryDiv").show();
                }              
                else if (idVal == 3)
                {
                    ShowHideLnkType2(1);
                    $(".uploadAudio").hide();
                    $(".upload").show();
                    $(".URL").hide();
                    $("#lnkTyp").show();
                    $(".divImage").show();
                    $("#categoryDiv").show();
                }
                else
                {
                    $(".uploadAudio").hide();
                    $(".upload").hide();
                    $(".URL").hide();
                   
                    $("#lnkTyp").hide();
                    $(".divImage").hide();
                }
            }
           function validator()
            {
                if(!selectDropdown('selType', 'Select Type'))
                    return false; 
                
                if ($('#selType').val() ==2 || $('#selType').val() ==3)
                  {
                      if(!selectDropdown('selCategory', 'Select Category'))
                         return false;   
                  }
                  
                  
                  
               // if (!blankCheck('txtCaption', 'Caption can not be left blank'))
              //      return false;
                if (!checkSpecialChar('txtCaption'))
                    return false;
                if (!maxLength('txtCaption',120, 'Caption'))
                    return false;  
               //if (!checkSpecialChar('txtCaptionH'))
                //    return false;
                
                if ($('#selType').val() ==1)
                  {
                       <?php if($id == 0){?>
                        if (!blankCheck('fileAudio', 'Please Upload Audio File'))
                             return false;
                        <?php }  ?>   
                      
                      if ($('#fileAudio').val() != '')
                        {

                             if (!IsCheckFile('fileAudio', 'Invalid file types. Upload only ', 'mp3,mp4,wav'))
                                   return false;
                             var fileSize_inKB = Math.round(($("#fileAudio")[0].files[0].size / 1024));
                             if (fileSize_inKB > 10240)
                             {
                                 viewAlert('Audio File size cannot be more than 10MB.');
                                 return false;
                             }
                       } 
                  }
                else if ($('#selType').val() ==2 || $('#selType').val() ==3)
                  {
                       <?php if($id == 0){?>
                        if (!blankCheck('fileDocument', 'Please Upload Image.'))
                             return false;
                        <?php }  ?>   
                      
                      if ($('#fileDocument').val() != '')
                        {

                             if (!IsCheckFile('fileDocument', 'Invalid file types. Upload only ', 'jpeg,jpg,gif'))
                                   return false;
                             var fileSize_inKB = Math.round(($("#fileDocument")[0].files[0].size / 1024));
                             if (fileSize_inKB > 1024)
                             {
                                 alert('Image File size cannot be more than 1MB.');
                                 return false;
                             }
                       } 
                  }
                if ($('#selType').val() ==3)
                  {
                        var linkType = $('input:radio[name=rbtLnkType]:checked').val();
                        if (linkType == '1')
                        {
                            if('<?php echo $id;?>'== '0' || '<?php echo $strvideo;?>'=='' )
                            {
                                if(!blankCheck('filevideo','Please Upload video'))
                                        return false;
                            }
                           if ($('#filevideo').val() != '')
                            {
                                if(!IsCheckFile('filevideo', 'upload a valid filetype','mp4'))			
                                {
                                    $("#filevideo").focus();
                                    return false;
                                }
                                var videofileSize_inKB = Math.round(($("#filevideo")[0].files[0].size / 1024));
                                if (videofileSize_inKB > 10240)
                                {
                                    viewAlert('Video File size cannot be more than 10MB.');
                                    return false;
                                }	
                            } 
                        }
                        else
                        {
                           if (!blankCheck('txtEmbedCode', 'You Tube Embed Code can not be left blank')) {
                                return false;
                            }
                            if (!validURL('txtEmbedCode', 'Please enter a valid URL(Ex : http://www.google.com)'))
                                return false;
                        }
                  }
               if (!maxLength('txtDescription', 500,'Description'))
                    return false;
               if (!checkSpecialChar('txtDescription'))
                 return false;
               //if (!checkSpecialChar('txtDescriptionH'))
               //  return false;

            }  
        function readImage(input) {
                $('#userImage').show();
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#userImage').attr('src', e.target.result);
                        $('#imgMsg').css('margin-left', '5px');
                    }
                    reader.readAsDataURL(input.files[0]);
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
               
                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=2) { ?>
                    <a href="javascript:void(0);" class="btn btn-info active">Add</a>
                <?php }?>
               
                <a href="<?php echo APP_URL;?>viewGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>
                 <a href="<?php echo APP_URL?>archieveGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">Archive</a> 
            
             </div>
           
          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12"> 
               
               
               <div class="form-group" id="categoryDiv">
                    <label class="col-sm-2 control-label no-padding-right" for="selCategory">Select Category</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selCategory" id="selCategory" >
                            <option value="0">- Select -</option>
                        </select>
                             <span class="mandatory">*</span>          
                    </div>
                </div>
		<div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="selType">Select Media Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="selType" id="selType" onChange="showTypeDetails(this.value);">
                            <option value="0" <?php if($intType==0) echo 'selected="selected"'; ?>>- Select -</option>  
<!--                            <option value="1" <?php if($intType==1) echo 'selected="selected"'; ?>>Audio</option>-->
                            <option value="2" <?php if($intType==2) echo 'selected="selected"'; ?>>Photo</option>
                            <option value="3" <?php if($intType==3) echo 'selected="selected"'; ?>>Video</option>
                        </select>
                           <span class="mandatory">*</span>            
                    </div>
                </div>             
                
               
                <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtCaption">Caption in English </label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtCaption" name="txtCaption" maxlength="120" placeholder="" class="form-control" value="<?php echo $strCaption; ?>">
<!--                  <span class="mandatory">*</span>-->
                </div>
              </div>
                 <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="txtCaptionH">Caption in Odia</label>
                <div class="col-sm-4">
                <span class="colon">:</span>
                <input type="text" id="txtCaptionH" name="txtCaptionH" maxlength="200" placeholder="" class="form-control odia" value="<?php echo $strCaptionH; ?>">
<!--                  <span class="mandatory">*</span>-->
                </div>
              </div>
               <div class="form-group divImage" >
                    <label class="col-sm-2 control-label no-padding-right" for="fileDocument">Upload Image</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="fileDocument" name="fileDocument" placeholder="" class="form-control" onChange="readImage(this);">
                        <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strFileName; ?>"/>
                        <span class="mandatory">*</span>
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                        <?php if ($id > 0) { ?>
                            <img id="userImage" width="200" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/gallery/' . $strFileName; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="200" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>
                    </div>
                   
                </div>
                 <div class="form-group divImage">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB. &nbsp;  Recommended Image width = 1024px and height = 768px)</span>
                    </div>
                </div> 
               <div class="form-group" id="lnkTyp">
                    <label class="col-sm-2 control-label no-padding-right" for="rbtLnkType">Link Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <div class="radio">
                            <label>
                                <input name="rbtLnkType" id="rbtLnkType" type="radio" class="ace" value="1"  onClick="ShowHideLnkType2(this.value);" <?php if ($intLinkType == 1) { ?>checked="checked"<?php } ?> >
                                <span class="lbl"> Internal</span>
                            </label>
                            <label>
                                <input name="rbtLnkType" id="rbtLnkType" type="radio" value="2" class="ace" onClick="ShowHideLnkType2(this.value);" <?php if ($intLinkType == 2) { ?>checked="checked"<?php } ?> >
                                <span class="lbl"> External</span>
                            </label>
                        </div>

                    </div>
                </div>
                <div class="form-group uploadAudio" >
                    <label class="col-sm-2 control-label no-padding-right" for="fileAudio">Upload Audio</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="fileAudio" name="fileAudio" class="form-control" >
                        <input type="hidden" name="hdnAudioFile" id="hdnAudioFile" value="<?php echo $strAudio; ?>"/>
                        
                        <span class="mandatory">*</span>
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6">
                         <?php if ($id != '' && $intType == 1) { ?>
                                <a href="<?php echo APP_URL; ?>uploadDocuments/Video/AudioFile/<?php echo $strAudio ?>" target="_blank"> 
                                 <img src="<?php echo APP_URL;?>img/headphones-128.png" alt="" width="50" height="50" border="0" align="absmiddle"> </a>
                         <?php } ?>
                    </div>
                </div>
                 <div class="form-group uploadAudio">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                       <span class="red">* &nbsp; (mp3,mp4,wav files upto 10 MB only)</span>
                    </div>
                </div> 
                <div class="form-group upload" >
                    <label class="col-sm-2 control-label no-padding-right" for="filevideo">Upload Video</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="filevideo" name="filevideo" class="form-control" >
                        <input type="hidden" name="hdnvideoFile" id="hdnvideoFile" value="<?php echo $strvideo; ?>"/>
                        <?php if ($id != '' && $intLinkType == 1 && $intType == 3) { ?>
                                <a href="<?php echo APP_URL; ?>uploadDocuments/Video/VideoFile/<?php echo $strvideo ?>" target="_blank"> <img src="<?php echo APP_URL; ?>uploadDocuments/Video/ThumbImage/<?php echo $strFileName ?>" alt="" width="50" height="50" border="0" align="absmiddle"> </a>
                        <?php } ?>
                        <span class="mandatory">*</span>
                    </div>
                    
                </div>
                 <div class="form-group upload">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-4">
                       <span class="red">* &nbsp; (mp4 files upto 10 MB only)</span>
                    </div>
                </div>

                <div class="form-group URL" style="display: none;">
                    <label class="col-sm-2 control-label no-padding-right" for="txtEmbedCode">You Tube Embed Code</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtEmbedCode" name="txtEmbedCode" style="height:100px;" ><?php echo $strEmbedCode;?></textarea>
                      <span class="mandatory">*</span>
                    </div>
                </div> 
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescription">Description in English</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control" id="txtDescription" name="txtDescription" style="height:100px;" onKeyUp="return TextCounter('txtDescription','lblChar1',500)" onMouseUp="return TextCounter('txtDescription','lblChar1',500)"><?php echo $strDescription;?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span>
                        
                    </div>
                </div> 
               
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="txtDescriptionH">Description in Odia</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <textarea class="form-control odia" id="txtDescriptionH" name="txtDescriptionH" style="height:100px;" onKeyUp="return TextCounter('txtDescriptionH','lblChar2',750)" onMouseUp="return TextCounter('txtDescriptionH','lblChar2',750)"><?php echo $strDescriptionH;?></textarea>                      
                       <span class="red">Maximum <span id="lblChar2">750</span> characters </span>
                        
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

 
