<?php
/* ================================================
  File Name                 : addInstitute.php
  Description               : This is used for add the institute details.
  Designed By               :
  Designed On               :
  Developed By		    : T Ketaki Debadarshini
  Developed On		    : 21-March-2017
  <Updated by>				<Updated On>		<Remarks>
    1   T KEtaki Debadarshini           08-Jan-2018            Training Partner & Training Center Details updated

  Style sheet               :  datepicker.css
  Javscript Functions       :  validatorchklist.js,bootstrap-datepicker.min.js
  includes                  :  util.php,addInstituteInner.php			  :

  ================================================== */
  //print_r($_SESSION);
    require("addInstituteInner.php");

?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script language="javascript">
    $(document).ready(function () {

        <?php if(USER_PRIVILEGE!=2) { ?>
        $('.piadiv').hide();
       <?php } else { ?>
            $('.piadiv').show();
        <?php } ?>
        loadNavigation('<?php echo $strTab; ?> Institutes');
        pageHeader   = "<?php echo $strTab; ?> Institutes";
        strFirstLink = "Manage Application";
        strLastLink  = "Manage Institutes";
        
        $('#radStatus').focus();
        indicate = 'yes';
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php 
            } 
        ?>
        <?php if($id=='0' || $strFileName=='') {    ?>
            $('#userImage').hide();
        <?php } if($intPIAStatus==3 ){ ?>  
       
            $('.piadiv').show();
         <?php }else if($intPIAStatus==5 ){  ?>
             
             $('.clsNoPartner').hide(); 
            <?php } ?> 
        TextCounter('txtSnippet','lblChar1',500);
        TextCounter('txtSnippetO','lblChar2',750);    
        TextCounter('txtAddress','lblChar3',500);
        TextCounter('txtAddressO','lblChar4',750);   


        fillDistricts('<?php echo $intDistid; ?>','ddlDistrict');
        
         //fill the education details
        fillInstitutePartner('<?php echo $intParentId; ?>','ddlPartner');

        $('#radStatus').on('change',function(){ 

            
            if($('#radStatus').val() == 3) {
                $('.piadiv').show();
                 $('.clsNoPartner').show(); 
            }else if($('#radStatus').val() == 5){
                   $('.clsNoPartner').hide(); 
            }else {
                  $('.clsNoPartner').show(); 
                  $('.piadiv').hide();
               
            }	
        })
    
      
   });
   
   //function to validate the form
       function validator()
        {
                var selVal = $("#radStatus").val();
               // var piaVal = $("input[name='radPIAStatus']:checked").val();
               
                if(!selectDropdown('radStatus', 'Select Institute Type'))
                        return false;  
                    
                if(!selectDropdown('ddlType', 'Select Institute Type'))
                        return false;      
                    
                if(selVal == 3){
                    
                    if(!selectDropdown('ddlPartner', 'Select Training Partner'))
                      return false;      
                    
                    var checkLength	= $("input[name='radPIAStatus[]']:checked").length;
                    if(checkLength==0)
                    {
                        alert('Select Scheme Details');
                        return false;
                    }
                }    

                if(selVal != 5){
                    if(!selectDropdown('ddlDistrict', 'Select District'))
                        return false;  
                }

                if (!blankCheck('txtName', 'Institute Name can not be left blank'))
                    return false;

                if (!checkSpecialChar('txtName'))
                    return false;

                if (!maxLength('txtName', 120, 'Institute Name'))
                    return false;

                if (!blankCheck('txtAlias', 'Institute Alias can not be left blank'))
                    return false;

                if (!checkSpecialChar('txtAlias'))
                    return false;

                if (!maxLength('txtAlias', 120, 'Institute Alias'))
                    return false;
           
                if(selVal != 5){    
                        if (!checkSpecialChar('txtYear'))
                                return false;
                        var curdate = new Date();
                        var curYear = curdate.getFullYear();
                        if ($("#txtYear").val()>curYear)
                        {
                            viewAlert("Year of Establishment should not be greater than current year ");
                            $("#txtYear").focus();
                            return false;
                        }

                        if (!checkSpecialChar('txtPrincpleName'))
                                return false;
                        if (!maxLength('txtPrincpleName', 100, 'Principal Name'))
                                return false;

                        if (!maxLength('txtPrincpleNameO', 120, 'Principal Name in Odia'))
                                return false;

                        if (!validEmail('txtEmail'))
                            return false;
                        if (!checkSpecialChar('txtEmail'))
                            return false;


                        if (!validatePhone('txtPhoneno','Invalid Phone No'))
                            return false;
                        if (!validMobileNo('txtMobileNo','Invalid Mobile No'))
                            return false;
                        var phone   =  $('#txtPhoneno').val();
                        var mobile  =  $('#txtMobileNo').val();


                        if (!checkSpecialChar('txtWebsite'))
                            return false;
                        if (!validURL('txtWebsite', 'Please enter a valid URL(Ex : http://www.google.com)'))
                            return false;

                        <?php if($id==0){ ?>
                       // if (!blankCheck('fileDocument', 'Please Upload  Image'))
                         //   return false;
                        <?php }?>
                        if ($('#fileDocument').val() != '')
                        {
                            if (!IsCheckFile('fileDocument', 'Invalid file types. Upload only ', 'jpg,jpeg,gif'))
                                return false;
                        }

                        //if (!blankCheck('txtLat', 'Latitude  can not be left blank'))
                        //    return false;
                        if (!checkSpecialChar('txtLat'))
                            return false;
                        if (!maxLength('txtLat', 40, 'Latitude'))
                            return false;

                       // if (!blankCheck('txtLong', 'Longitude  can not be left blank'))
                        //    return false;
                        if (!checkSpecialChar('txtLong'))
                            return false;
                        if (!maxLength('txtLong', 40, 'Longitude'))
                            return false;


                        if (!blankCheck('txtSnippet', 'Description can not be left blank'))
                                return false;
                        if (!checkSpecialChar('txtSnippet'))
                                return false;
                        if (!maxLength('txtSnippet', 500, 'Description'))
                                return false;

                        if (!maxLength('txtSnippetO', 750, 'Description in Odia'))
                                return false;
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
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
                <a href="<?php echo APP_URL; ?>viewInstitutes/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
                <a href="<?php echo APP_URL ?>archiveInstitute/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">Archive</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12"> 		 
		<div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="radStatus">Institute Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="radStatus" id="radStatus" >
                            <?php if(USER_PRIVILEGE!=2) { ?>
                            <option value="0" >- Select -</option> 
                            <?php 
                                foreach ($aryInstituteType as $key => $value) {
                                    if($intPIAStatus==$key) 
                                        $strSelected = 'selected="selected"';
                                    else
                                        $strSelected = '';
                                    echo '<option value="'.$key.'" '.$strSelected.'>'.$value.'</option>  ';
                                } } else { ?>
                        <option value="3" >Training Center</option>
                    <?php } ?>
                        </select>
                    
                        <span class="mandatory">*</span>             
                    </div>
                </div> 
                <div class="form-group ">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlType">Type</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlType" id="ddlType">
                            <?php if(USER_PRIVILEGE!=2) { ?>
                            <option value="0">- Select -</option> 
                            <option value="1"  <?php if ($intType == 1) echo 'selected="selected"'; ?>>Govt.</option> 
                            <option value="2"  <?php if ($intType == 2) echo 'selected="selected"'; ?>>Private</option> 
                            <?php } else { ?>
                            <option value="2"  <?php if ($intType == 2) echo 'selected="selected"'; ?>>Private</option>
                            <?php } ?>    
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>     
                 
                <div class="form-group clsNoPartner piadiv" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlPartner">Training Partner</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlPartner" id="ddlPartner" >
                            <option value="0">- Select -</option> 
                           
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>   
	        <div class="form-group clsNoPartner piadiv" >
                   <label class="col-sm-2 control-label no-padding-right" for="radPIAStatus">Scheme Details</label>
                   <div class="col-sm-8">
                   <span class="colon">:</span>
                    <div class="checkbox">
                        
                         <?php if(USER_PRIVILEGE!=2) {
                              foreach ($arySchemeType as $key => $value) {
                         ?>
                            <label>
                                <input type="checkbox" name="radPIAStatus[]" id="radPIAStatus<?php echo $key; ?>" class="ace radPIAStatus" value="<?php echo $key; ?>"   <?php if(in_array($key,$chk_string)){ echo 'checked="checked"'; }?> />
                                <span class="lbl"> <?php echo $value; ?></span>
                            </label>
                         <?php
                                } } elseif(PORTAL_TYPE==1){
                         ?>
                        <label>
                                <input type="checkbox" name="radPIAStatus[]" id="radPIAStatus1; ?>" class="ace radPIAStatus" value="1"   <?php if($chk_string[0]==1){ echo 'checked="checked"'; }?> />
                                <span class="lbl"> OSDA</span>
                            </label>
                        <?php
                                } elseif(PORTAL_TYPE==2){
                         ?>
                        <label>
                                <input type="checkbox" name="radPIAStatus[]" id="radPIAStatus2; ?>" class="ace radPIAStatus" value="2"   <?php if($chk_string[0]==2){ echo 'checked="checked"'; }?> />
                                <span class="lbl"> DDU-GKY</span>
                            </label>
                       <?php
                                } elseif(PORTAL_TYPE==3){
                         ?>
                        <label>
                                <input type="checkbox" name="radPIAStatus[]" id="radPIAStatus3; ?>" class="ace radPIAStatus" value="3"   <?php if($chk_string[0]==3){ echo 'checked="checked"'; }?> />
                                <span class="lbl"> PMKVY</span>
                            </label>
                                     
                       <?php } elseif(PORTAL_TYPE==4) {?>
                        <label>
                                <input type="checkbox" name="radPIAStatus[]" id="radPIAStatus4; ?>" class="ace radPIAStatus" value="4"   <?php if($chk_string[0]==4){ echo 'checked="checked"'; }?> />
                                <span class="lbl"> PMKK</span>
                            </label>
                       <?php } ?>     
                       <span class="mandatory">*</span>           
                   </div>
                   </div>
                </div>
                <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlDistrict">Select District</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDistrict" id="ddlDistrict" >
                            <option value="0">- Select -</option> 
                            
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div> 
                
                <div class="form-group ">
                    <label class="col-sm-2 control-label no-padding-right" for="txtName">Institute Name </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtName" name="txtName" placeholder="" onkeyup="convertToSlug(this.value, 'txtAlias');" class="form-control" maxlength="100" value="<?php echo $strName; ?>">
                        <span class="mandatory">*</span> </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-2 control-label no-padding-right" for="txtNameO">Institute Name in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtNameO" name="txtNameO" placeholder="" class="form-control odia" maxlength="150" value="<?php echo $strNameO; ?>">
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-2 control-label no-padding-right" for="txtAlias">Institute Alias </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtAlias" name="txtAlias" placeholder="" class="form-control" maxlength="120" value="<?php echo $strAlias; ?>">
                        <span class="mandatory">*</span> </div>
                </div>
                
                <div class="form-group noPIA clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtYear">Year of Establishment</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                     
                        <input type="text" id="txtYear" name="txtYear" placeholder="" onkeypress="return isNumberKey(event);" class="form-control" maxlength="4" value="<?php echo $strYear; ?>"> 
<!--                      <span class="mandatory">*</span> -->
                    </div>
                  </div>
                
                <div class="form-group noPIA clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtPrincpleName">Principal Name </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtPrincpleName" name="txtPrincpleName" placeholder="" class="form-control" maxlength="100" value="<?php echo $strPrincipleName; ?>">
                        <!--<span class="mandatory">*</span>--> 
                    </div>
                </div>
                <div class="form-group noPIA clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtPrincpleNameO">Principal Name in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtPrincpleNameO" name="txtPrincpleNameO" placeholder="" class="form-control odia" maxlength="150" value="<?php echo $strPrincipleNameO; ?>">
                    </div>
                </div>
                
                <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtEmail">Email-id </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtEmail" name="txtEmail" placeholder="" class="form-control" maxlength="70" value="<?php echo $strEmail; ?>">
                    </div>
                </div>
                <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtMobileNo">Mobile No </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtMobileNo" name="txtMobileNo" placeholder="" class="form-control" maxlength="10" onkeypress="return isNumberKey(event);" value="<?php echo $strMobileno; ?>">
                         </div>
                </div>
                <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtPhoneno">Phone No </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtPhoneno" name="txtPhoneno" placeholder="" class="form-control" maxlength="15"  value="<?php echo $strPhoneno; ?>">
                         </div>
                </div>
                <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(Enter valid phone No. &nbsp;Ex: 0674-3246014)</span>
                    </div>
                </div>
                <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtWebsite">Website</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                      <input type="text" id="txtWebsite" name="txtWebsite" maxlength="70" placeholder="" class="form-control" value="<?php echo $strWebsite; ?>">
                    </div>
                </div>
                 <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtPincode">Pincode </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtPincode" name="txtPincode" placeholder="" class="form-control" maxlength="6" onkeypress="return isNumberKey(event);" value="<?php echo $strPincode; ?>">
                         </div>
                </div>
                <div class="form-group noPIA ImageDiv clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="fileDocument">Upload Image</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <input type="file" id="fileDocument" name="fileDocument" placeholder="" class="form-control" onChange="readImage(this);">
                        <input type="hidden" name="hdnImageFile" id="hdnImageFile" value="<?php echo $strFileName; ?>"/>
                        <!--<span class="mandatory">*</span>-->
                    </div>
                    <div class="help-inline col-xs-12 col-sm-6 noPIA" id="uploadImg">
                        <?php if ($id > 0 && $strFileName!='') { ?>
                            <img id="userImage" width="100" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" src="<?php echo APP_URL . 'uploadDocuments/institute/' . $strFileName; ?>">
                        <?php } else { ?>
                            <img id="userImage" width="100" height="80" alt="" class="passportPhoto mgnLft_10 mgnTop_10" >
                        <?php } ?>
                        <a href="javascript:void(0);" id="userImgClose" class="imgClose" style="display:none;">X</a>
                    </div>
     
                </div>
                <div class="form-group noPIA clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right"></label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB . &nbsp;  Recommended Image width = 640px)</span>
                    </div>
                </div>
				
		<div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtLat">Latitude </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtLat" name="txtLat" onkeypress="return isNumberKey_Decimal(event)"  class="form-control" maxlength="100" value="<?php echo $strLat; ?>">
                        <!--<span class="mandatory">*</span>--> 
                    </div>
                </div>
				
		<div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtLong">Longitude </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <input type="text" id="txtLong" name="txtLong" onkeypress="return isNumberKey_Decimal(event)"  class="form-control" maxlength="100" value="<?php echo $strLong; ?>">
                        <!--<span class="mandatory">*</span>--> 
                    </div>
                </div>
<!--Modified On 11-June-2019 BY Ashis kumar Patra to add Mapping Id with NIC-->

                <!-- <div class="form-group" id="divMapping">
                    <label class="col-sm-2 control-label no-padding-right" for="ddlMappingData">Select Institute</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlMappingData" id="ddlMappingData" >
                            <option value="0">- Select -</option> 
                            
                        </select>
                    </div>
                </div>  -->

				

                <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtAddress">Address</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtAddress" rows="3" name="txtAddress" onKeyUp="return TextCounter('txtAddress','lblChar3',500)" onMouseUp="return TextCounter('txtAddress','lblChar3',500)" placeholder="" class="form-control"><?php echo $strAddress; ?></textarea>
                        <span class="red">Maximum <span id="lblChar3">500</span> characters </span>
                        <span class="mandatory">*</span> 
                    </div>
                </div>
                
                <div class="form-group clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtAddressO">Address in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtAddressO" onKeyUp="return TextCounter('txtAddressO','lblChar4',750)" onMouseUp="return TextCounter('txtAddressO','lblChar4',750)" rows="3" name="txtAddressO" placeholder="" class="form-control odia" ><?php echo $strAddressO; ?></textarea>
                        <span class="red">Maximum <span id="lblChar4">750</span> characters </span>
                    </div>
                </div>
                
                <div class="form-group noPIA clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippet">Description</label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtSnippet" rows="3" name="txtSnippet" onKeyUp="return TextCounter('txtSnippet','lblChar1',500)" onMouseUp="return TextCounter('txtSnippet','lblChar1',500)" placeholder="" class="form-control"><?php echo $strSnippet; ?></textarea>
                        <span class="red">Maximum <span id="lblChar1">500</span> characters </span> 
                        <span class="mandatory">*</span> 
                    </div>
                </div>
                
                <div class="form-group noPIA clsNoPartner">
                    <label class="col-sm-2 control-label no-padding-right" for="txtSnippetO">Description in Odia </label>
                    <div class="col-sm-4"> <span class="colon">:</span>
                        <textarea id="txtSnippetO" onKeyUp="return TextCounter('txtSnippetO','lblChar2',750)" onMouseUp="return TextCounter('txtSnippetO','lblChar2',750)" rows="3" name="txtSnippetO" placeholder="" class="form-control odia" ><?php echo $strSnippetO; ?></textarea>
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

