<?php
/* * ******************************************
  File Name  	: addBanner.php
  Description	: This page is used to add the banner
  Created By	: Rahul Kumar Saw
  Created On	: 08-06-2018
  Developed By  : Rahul Kumar Saw
  Developed On  : 08-06-2018
 * ****************************************** */
  include_once('addBannerInner.php');

?>
<script type="text/javascript" src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo APP_URL; ?>ckeditor/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {

        pageHeader   = "<?php echo $strTab; ?> Banner";
        strFirstLink = "Manage Application";
        strLastLink  = "Banner";


       indicate     = 'yes';

        $("select option[value='<?php echo $intPgName;?>']").attr("selected","selected");

        <?php if($id>0) { ?>
           $('#txtBnCpEng').focusTextToEnd();
        <?php } ?>

        <?php if ($outMsg != '') { ?>
                viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>

        setTextCounter();

        $('#btnConfirmOkAjax').on('click',function(){
             $('#hdnImageFile').val('');
             $('#fileFeaturedImage').val('');
             $('#imageFile').hide();
             $('#close').hide();
             $('#imgMsg').css('margin-left', '0px');
	      });
//////////////////////////////
         /*$('#btnConfirmOkAjax').on('click',function(){
             $('#hdnMobileImage').val('');
             $('#fileMobileImage').val('');
             $('#mobileImage').hide();
             $('#close').hide();
             $('#imgMsg').css('margin-left', '0px');
        });*/

        $('#btnConfirmOk').on('click',function()
        {
            $(this).closest('#confirmModal').find(".modal-body").html('<center><img src="<?php echo APP_URL;?>img/loading.gif"><p> Loading... <p></center>');
            $('#hdnQs').val('U');
            $('form').submit();
            return false;
        });

        $('#divLnkExtTypY').hide();
        // show hide for link type

        shohideDownlinkType(<?php echo $intLinkType;?>);
        ShowHideLnkTyp(<?php echo $intWebLinkType;?>);
        //set Alignment option
        $("#selAlignment").val('<?php echo $strAlignment;?>');

         // Function for delete image
          $('#close').click(function () {

             $('#fileFeaturedImage').val('');
              $('#hdnImageFile').val('');
              $('#imageFile').hide();
              $(this).hide();
              $('#imgMsg').css('margin-left', '0px');
         });

/////////////////////////

      
           $('#closeMobImg').click(function () {

             $('#fileMobileImage').val('');
              $('#hdnMobileImage').val('');
              $('#mobileImage').hide();
              $(this).hide();
              $('#imgMobMsg').css('margin-left', '0px');
         });


          // Function for load page name
         $.fillPageNm('selPgNm','<?php echo $intPgName; ?>');

         // reset image field
         $('.btnReset').click(function() {
               $('#hdnImageFile').val('');
               $('#imageFile').hide();
               $('#close').hide();
               $('#imgMsg').css('margin-left', '0px');

                $('#fileMobileImage').val('');
              $('#hdnMobileImage').val('');
              $('#mobileImage').hide();
               $('#imgMobMsg').css('margin-left', '0px');
               $('#lblChar1,#lblChar2,#lblChar3').html(500);
               shohideDownlinkType(1);
               ShowHideLnkTyp(1);
         });


       //  /////////

      
         // onblur check special character
         $('#txtBnCpEng').blur(function(){
             if(!checkSpecialChar('txtBnCpEng'))
                        return false;
         });
          /*$('#txtBnCpOdia').blur(function(){
             if(!checkSpecialChar('txtBnCpOdia'))
                        return false;
         });*/
         $('#txtDescpEng').blur(function(){
             if(!checkSpecialChar('txtDescpEng'))
                        return false;
         });
         /*$('#txtDescpOdia').blur(function(){
             if(!checkSpecialChar('txtDescpOdia'))
                        return false;
         });*/
         $('#txtLink').blur(function(){
             if(!checkSpecialChar('txtLink'))
                        return false;
         });
      });  // end of document ready

            // load text counter
            function setTextCounter(){
               TextCounter('txtDescpEng','lblChar1',500);
            }

//----- Function for keep cursor at the end of text By:: Arpita Rath On:: 27-11-2017
  (function($)
  {
     $.fn.focusTextToEnd = function()
     {
         this.focus();
         var $thisVal = this.val();
         this.val('').val($thisVal);
         return this;
     }
   }(jQuery));

                // Function to validate all field
                function validator()
                {
                   //--- Banner Caption validation
                    if(!blankCheck('txtBnCpEng', 'Banner caption can not be left blank'))
                        return false;
                    // if(!checkSpecialChar('txtBnCpEng'))
                    //     return false;
                    if(!maxLength('txtBnCpEng', 350, 'Banner caption'))
                        return false;
                      if(!blankCheck('txtBnCpOdia', 'Banner caption In Odia can not be left blank'))
                        return false;
                    //   if(!checkSpecialChar('txtBnCpOdia'))
                    //     return false;
                      if(!maxLength('txtBnCpOdia', 750, 'Banner caption In Odia'))
                        return false;

                   //--- Description Validation
                    
                     var bannerDetails   = CKEDITOR.instances['txtDescpEng'].getData();
                     if(bannerDetails == ''){
                            viewAlert('Banner Description can not be left blank');
                            return false;
                        } 
                    if(!maxLength('txtDescpEng', 500, 'Description'))
                        return false;

                      

                     // --- Link Type
                    var linkType     = $('input:radio[name=rbtLnkType]:checked').val();
                    if (linkType == '1')
                    {
                        if (!blankCheck('txtLink', 'Link URL can not be left blank'))
                            return false;
                        if (!checkSpecialChar('txtLink'))
                            return false;
                        if (!maxLength('txtLink', 50, 'Link text'))
                            return false;
                    }

                    // --- Web Link Type
                    var linkWebType = $('input:radio[name=rbtWebLnkType]:checked').val();
                    if (linkType == '1' && linkWebType == '1')
                    {
                        /*if($("#selPgNm").val()==0){
                            if (!blankCheck('txtUrlName', 'Internal Url can not be left blank'))
                              return false;
                        }
                        if($("#txtUrlName").val()==''){*/
                            if(!selectDropdown('selPgNm', 'Select Page Name'))
                              return false;
                        //}
                    }

                    if(linkType == '1' && linkWebType == '2')
                    {
                        if (!blankCheck('txtWebUrl', 'Web Url can not be left blank'))
                            return false;
                        if (!validURL('txtWebUrl', 'Please enter a valid URL(Ex : http://www.google.com)'))
                            return false;
                        if (!maxLength('txtWebUrl', 250, 'Web Url'))
                            return false;
                    }
                    if (!selectDropdown('selAlignment', 'Select Alignment'))
                            return false;

                    // --- Banner Image
                     var fileFeaturedImage1 = $('#hdnImageFile').val();
                      if(fileFeaturedImage1=='')
                       {
                            if(!blankCheck('fileFeaturedImage', 'Please Upload Image'))
                            return false;
                       }
                       var imgMetaFile = $("#fileFeaturedImage").val();
                       if (imgMetaFile != '')
                       {
                          if (!IsCheckFile('fileFeaturedImage', 'Not a valid image', 'jpeg,jpg,png'))
                              return false;
                          var fileSize_inKB = Math.round(($("#fileFeaturedImage")[0].files[0].size / 1024));
                          if (fileSize_inKB > 5120)
                          {
                              viewAlert('File size should not be greater than 5MB.');
                               return false;
                          }
                       }


                       var fileMobileImage1 = $('#hdnMobileImage').val();
                       // console.log(fileMobileImage1);
                        if(fileMobileImage1=='')
                         {
                              if(!blankCheck('fileMobileImage', 'Please Upload Mobile Image'))
                              return false;
                         }
                         var imgMetaMobile = $("#fileMobileImage").val();
                         if (imgMetaMobile != '')
                         {
                            if (!IsCheckFile('fileMobileImage', 'Not a valid image', 'jpeg,jpg,png'))
                                return false;
                            var fileSize_inKB = Math.round(($("#fileMobileImage")[0].files[0].size / 1024));
                            if (fileSize_inKB > 5120)
                            {
                                viewAlert('File size should not be greater than 5MB.');
                                 return false;
                            }
                         }


                }

                function checkValidPage(controlId)
                {
                    var numPattern = new RegExp(/^[-_a-zA-Z]+$/);
                    var txtVal = $('#' + controlId).val();
                    if (txtVal != '')
                    {
                        if (numPattern.test(txtVal) == true)
                            return true;
                        else
                        {
                            viewAlert("Please enter a valid alias name");
                            $('#' + controlId).focus();
                            return false;
                        }
                    }
                    else
                        return true;
                }
                // Function to Read image
                function readImage(input, imgElement)
                {
                    $('#' + imgElement).show();
                    if (input.files && input.files[0])
                    {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#' + imgElement).attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                        $('#'+imgElement).next("#close").show();
                    }
                }


    // Function for show hide Link Type
    function shohideDownlinkType(typeId){

      if(typeId==1){
           $("#divLnkTypY").show();
           $("#divLnkTxtY").show();
           $("#divLnkExtTypY").show();
           $('#divLnkIntTypY').show();
           $("#divWinStat").show();
           if(<?php echo $intWebLinkType;?>==1){
           $("#divLnkIntTypY").show();
           $("#divLnkExtTypY").hide();
           }
      }
       if(typeId==2){
           $("#divLnkTypY").hide();
           $("#divLnkTxtY").hide();
           $("#divLnkExtTypY").hide();
           $('#divLnkIntTypY').hide();
           $("#divWinStat").hide();
           if(<?php echo $intWebLinkType;?>==2){
             $("#divLnkIntTypY").hide();
             $("#divLnkExtTypY").show();
           }
      }
   }

    // Function for show hide Internal Or External Link
    function ShowHideLnkTyp(linkType)
    {
      if(linkType==1){
           $("#divLnkIntTypY").show();
           $("#divLnkExtTypY").hide();

           if(<?php echo $intLinkType;?>==2){
                $("#divLnkIntTypY").hide();
           }
      }
       if(linkType==2){
           $("#divLnkIntTypY").hide();
           $("#divLnkExtTypY").show();

           if(<?php echo $intWebLinkType;?>==1){
            $("#txtWebUrl").val('http://');
           }
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
      <div class="top_tab_container">

                <?php  if($adminConsole_Privilege==0|| $adminConsole_Privilege==1 ||$intPermission!=2) { ?>
                    <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a>
                <?php }?>

                <a href="<?php echo APP_URL;?>viewBanner/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a>

             </div>

          <?php include('includes/util.php'); ?>
          <div class="hr hr-solid"></div>
           <div class="col-xs-12">

                <div class="form-group">
                    <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="txtBnCpEng">Banner Caption</label>
                     <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                       <textarea  id="txtBnCpEng" name="txtBnCpEng" placeholder="" class="form-control" maxlength="350" value="<?php echo $strBnCpEng; ?>"><?php echo $strBnCpEng; ?></textarea>
                       <span class="mandatory">*</span>
                    </div>

                </div>

                 <div class="form-group">
                    <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="txtBnCpOdia">Banner Caption In Odia</label>
                     <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                       <textarea  id="txtBnCpOdia" name="txtBnCpOdia" placeholder="" class="form-control" maxlength="750" value="<?php echo $strBnCpOdia; ?>"><?php echo $strBnCpOdia; ?></textarea>
                       <span class="mandatory">*</span>
                    </div>

                </div>
<!-- 
               <div class="form-group">

                    <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="txtDescpEng">Description </label>
                       <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                      <input type="text" class="form-control" id="txtDescpEng" name="txtDescpEng" maxlength="200" value="<?php echo $strDescpEng; ?>">
                      <span class="mandatory">*</span>
                    </div>
                </div> -->
                 <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="txtDescpEng">Description in English</label>
                  <div class="col-sm-10">
                      <span class="colon">:</span>
                      <textarea class="ckeditor form-control odia"  id="txtDescpEng" maxlength="200" name="txtDescpEng" rows="10"><?php echo $strDescpEng; ?></textarea>
                       <span class="mandatory">*</span>
                  </div>
              </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right" for="txtDescpOdia">Description in Odia</label>
                  <div class="col-sm-10">
                      <span class="colon">:</span>
                      <textarea class="ckeditor form-control odia"  id="txtDescpOdia" maxlength="300" name="txtDescpOdia" rows="10"><?php echo $strDescpOdia; ?></textarea>
                      
                  </div>
              </div> 


                 <div class="form-group">
                    <label class="col-lg-2 control-label no-padding-right" for="rbtLnkType">Link Exist</label>
                     <div class="col-lg-4"><span class="colon">: </span>
                        <div class="radio">
                            <label for="rbtLnkType1">
                            <input name="rbtLnkType" id="rbtLnkType1" type="radio" class="ace" value="1" checked="checked" onclick="shohideDownlinkType(this.value);" >

                            <span class="lbl"> Yes</span></label>
						            </div>
                        <div class="radio">
                            <label for="rbtLnkType2">
                            <input name="rbtLnkType" id="rbtLnkType2" type="radio" value="2" class="ace" <?php if ($intLinkType == 2) { ?>checked="checked"<?php } ?>  onclick="shohideDownlinkType(this.value);" >
                             <span class="lbl"> No</span></label>
                        </div>

                    </div>

                </div>

               <div class="form-group">


                    <div id="divLnkTxtY">
                    <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="txtLink">Link URL</label>
                    <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                       <input type="text" id="txtLink" name="txtLink" placeholder="" class="form-control" maxlength="50" value="<?php echo $strLink; ?>">
                       <span class="mandatory">*</span>

                    </div>
                    </div>
                </div>


                 <div class="form-group" id="divLnkTypY">
                    <label class="col-lg-2 control-label no-padding-right" for="rbtLnkType">Choose Type</label>
                    <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                        <div class="radio">
                            <label for="rbtWebLnkType1">
                            <input name="rbtWebLnkType" id="rbtWebLnkType1" type="radio" class="ace" value="1"  onclick="ShowHideLnkTyp(this.value);" checked="checked" >
                            <span class="lbl"> Internal</span></label>
						            </div>
                        <div class="radio">
                            <label for="rbtWebLnkType2">
                            <input name="rbtWebLnkType" id="rbtWebLnkType2" type="radio" value="2" class="ace" onclick="ShowHideLnkTyp(this.value);" <?php if ($intWebLinkType == 2) { ?>checked="checked"<?php } ?> >
                            <span class="lbl"> External</span></label>
                        </div>

                    </div>
                 </div>

                  <div class="form-group" id="divWinStat">
                    <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="rbtWinStat">Window Status</label>
                    <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                        <div class="radio">
                            <label for="rbtWinStatus1">
                            <input name="rbtWinStatus" id="rbtWinStatus1" type="radio" class="ace" value="1" checked="checked" >
                             <span class="lbl"> Same</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label for="rbtWinStatus2">
                            <input name="rbtWinStatus" id="rbtWinStatus2" type="radio" value="2" class="ace" <?php if ($intWinStatus == 2) { ?>checked="checked"<?php } ?> >
                            <span class="lbl"> New</span>
                            </label>
                        </div>

                    </div>
                 </div>

<!--                    <div class="form-group">
                    <div id="divLnkIntTypY">
                        <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="selPgNm">Select Page </label>
                       <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                            <select class="form-control" id="selPgNm" name="selPgNm">
                              <option value="0">- Select -</option>
                             <?php
                             if ($dirFiles = opendir(SITE_PATH.'view'))
                            {
                                while (false !== ($fileName = readdir($dirFiles)))
                                {
                                    if ($fileName != "." && $fileName != "..")
                                    {

                                        $commentsArr = $objBanner->getFileComments(SITE_PATH.'view/'.$fileName);
                                        $arrFile = explode('.',$fileName);
                                        if(sizeof($commentsArr) > 0 && $commentsArr[0] == '/*plugin*/')
                                        {
                                    ?>
                                    <option value="<?php echo $arrFile[0];?>" <?php echo ($intPgName==$arrFile[0])?'selected':'';?>><?php echo ucfirst(strtolower($arrFile[0])); ?></option>
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
                        <label class="col-sm-1 control-label no-padding-right" for="txtUrl">URL</label>
                        <div class="col-sm-3">
                            <span class="colon">:</span>
                             <input type="text" id="txtUrlName" name="txtUrlName" placeholder="" class="form-control" maxlength="250" value="<?php //echo $strUrlName; ?>">
                        </div>
                        <div class="col-sm-6 col-sm-offset-5">
                            <span class="text-danger">(Either select page name or enter page url its' mandatory)</span>
                        </div>
                    <div id="divLnkExtTypY">
                      <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="txtWebUrl">Web URL </label>
                     <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                           <input type="text" id="txtWebUrl" name="txtWebUrl" placeholder="" class="form-control" maxlength="250" value="<?php echo $strWebUrl; ?>">
                           <span class="mandatory">*</span>
                      </div>
                    </div>
                </div>    -->

<!--                <div class="form-group">

                     <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="selAlignment">Alignment </label>
                     <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                        <select class="form-control" id="selAlignment" name="selAlignment">
                            <option value="0" selected="selected">--Select--</option>
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                            <option value="top">Extreme Right</option>
                        </select>
                          <span class="mandatory">*</span>
                    </div>


                </div>-->


               <div class="form-group">

                    <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="fileFeaturedImage"> Choose Image </label>
                    <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                        <input type="file" id="fileFeaturedImage" name="fileFeaturedImage" placeholder="" class="form-control" onchange="readImage(this,'imageFile');">
                        <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strImageFile; ?>"/>
                        <span class="mandatory">*</span>
                        <span class="red">(jpeg, jpg, png file only and max size 5 MB)</span>

                    </div>
                    <div class="help-inline col-xs-2 col-sm-2">
                        <?php if($id != '' && $strImageFile != '') {
                             $display = '';
                          } else {
                             $display = 'style="display:none;"';
                          } ?>
                       <img src="<?php echo APP_URL; ?>uploadDocuments/banner/<?php echo $strImageFile; ?>" width="200" height="200" alt="" class="img-banner-preview desktop" id="imageFile" align="absmiddle" <?php echo $display;?>>
                        &nbsp;<img src="<?php echo APP_URL; ?>img/close-btn.png" width="16" height="16" alt="Close" class="ico-close" id="close" <?php echo $display;?>>
                        <span id="imgMsg"></span>
                    </div>
                </div>

                <div class="form-group">

                     <label class="col-lg-2 col-md-3 col-sm-2 control-label" for="fileMobileImage"> Choose Mobile Image </label>
                     <div class="col-lg-4 col-md-4 col-sm-4"><span class="colon">: </span>
                         <input type="file" id="fileMobileImage" name="fileMobileImage" placeholder="" class="form-control" onchange="readImage(this,'mobileImage');">
                         <input type="hidden" name="hdnMobileImage" id="hdnMobileImage" value="<?php echo $vchMobileImage; ?>"/>
                         <span class="mandatory">*</span>
                         <span class="red">(jpeg, jpg, png file only and max size 5 MB)</span>

                     </div>
                     <div class="help-inline col-xs-2 col-sm-2">
                         <?php if($id != '' && $vchMobileImage != '') {
                              $display = '';
                           } else {
                              $display = 'style="display:none;"';
                           } ?>
                        <img src="<?php echo APP_URL; ?>uploadDocuments/banner/<?php echo $vchMobileImage; ?>" width="200" height="200" alt="" class="img-banner-preview mobile" id="mobileImage" align="absmiddle" <?php echo $display;?>>
                         &nbsp;<img src="<?php echo APP_URL; ?>img/close-btn.png" width="16" height="16" alt="Close" class="ico-close" id="closeMobImg" <?php echo $display;?>>
                         <span id="imgMobMsg"></span>
                     </div>
                 </div>


                <div class="form-group">
                    <div class="col-sm-2 no-padding-right"></div>
                    <div class="col-sm-4">
                        <input type="hidden" value="0" id="hdnQs" name="hdnQs" />
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="<?php echo $strSubmit; ?>" class="btn btn-success" onclick="return validator();" />
                        <input type="reset" id="btnReset" name="btnReset"  class="btnReset btn btn-danger" value="<?php echo $strReset; ?>" onclick="<?php echo $strClick; ?>"  />
                        <input type="hidden" id="hdnSlNo" name="hdnSlNo" value="<?php echo $intSlNo; ?>"/>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
      </div>
    </div>
