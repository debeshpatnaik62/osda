<?php
/*plugin*/

/* ================================================
  File Name         : skill-compete-register.php
  Description       : This is to add the skill competetion form
  Date Created      : 06-Jan-2019
  Created By        : Ashis kumar Patra
  Developed by      : Ashis kumar Patra
  Developed on      : 06-Jan-2019
  Update History    :
  <Updated by>        <Updated On>    <Remarks>

  ================================================== */
include_once( 'skill-compete-registerInner.php' );
$strPageTtlcls = $strLangCls;
$strPageTitle = $strRegisterlbl;
?>
 
<!doctype html>
<html lang="en">
    <?php include 'include/header.php' ?>
   
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/register.css">
    <style type="text/css">
        .custom-control-input:disabled~.custom-control-label::before {background-color: #ffc7c3 !important;}
        .robotics {display: none;}
        .mandatory{color: rgba(255,0,4,1);font-size: 14px;font-weight: bold;padding-left: 5px;}
    </style>
    <form name="frmOsda" id="frmOsda" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <!--start:: contarea-->

        <section class="container contarea">
            <!-- <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card p-5 text-center">
                        <img src="<?php echo SITE_URL;?>images/triangle.png" width="76px" style="margin: 0 auto;">
                        <h3 style="color: #cf5ad8;">Thank you for your interests in Odisha Skills Competition.</h3>
                        <p class="text-center">Registrations for Odisha Skills 2021 is closed. We look forward to your participation for next season</p>
                    </div>
                </div> id="remove-form" style="display: none;"
            </div> -->
            <div class="row" >
                <div class="col-md-12 col-sm-12">
                    <h3 class="screenreader <?php echo $strLangCls; ?>"><?php echo $strSkillComplbl; ?></h3>
                    <img src="<?php echo SITE_URL; ?>images/registerbanner.jpg" alt="Register for Odisha Skills Competition - Odisha 2022" width="100%"/>
                    <h3 class="screenreader registration-img mt-0<?php echo $strLangCls; ?>"><span>Eligibility:</span> Born on after 1<sup>st</sup>  Jan 2002/*1999 | <span>Last date for registrations:</span> 31th October, 2022</h3> 
                </div>


                <div class="col-md-12 col-sm-12 mt-3">
                    <div class="d-flex justify-content-between">
                         <h3 class="screenreader osda--heading <?php echo $strLangCls; ?>" tabindex="13"> <?php echo $strSkillInfolbl; ?></h3>
                          <div class="star mt-1"> <span>*</span><?php echo $strIndicatelbl; ?></div> 
                    </div>
                   
                    <div class="clearfix"></div>
               
                    <div class="form-horizontal skillCompeteForm">
                    <?php if ($skillResults->num_rows > 0) { ?>
                        <div class="registerlist">
                            <div class="row">
                                <?php
                                $prevCatId = '';
                                $catCounter = 0;

                                while ($skillRow = $skillResults->fetch_array()) {

                                    $strskillName = ($_SESSION['lang'] == 'O' && $skillRow['vchSkillNameO'] != '') ? $skillRow['vchSkillNameO'] : htmlspecialchars_decode($skillRow['vchSkillName'], ENT_QUOTES);
                                    $strSkillCategory = ($_SESSION['lang'] == 'O' && $skillRow['vchSkillCategoryO'] != '') ? $skillRow['vchSkillCategoryO'] : htmlspecialchars_decode($skillRow['vchSkillCategory'], ENT_QUOTES);
                                    $currentCatId = $skillRow['intSkillCategory'];
                                    $chkAry = array(28,33,22,23,47,48,50,51,52,21);
                                    $manadateMark = (in_array($skillRow['intSkillId'], $chkAry)) ? '<span class="mandatory">*</span>' : '';
                                    $tooltip = (in_array($skillRow['intSkillId'], $chkAry)) ? 'data-toggle=\'tooltip\' data-placement=\'top\' data-original-title="'.$strBornmsg.'"' : '';
                                    if ($prevCatId != $currentCatId) {
                                        if ($prevCatId != '') {
                                            ?>
                                            </ul> <div class="clearfix"></div></div>
                                        <?php
                                        $catCounter++;

                                        if ($catCounter != 0 && $catCounter % 2 == 0) {
                                            ?>      
                                        </div><div class="col-lg-4 col-md-6 pr-0">
                                        <?php
                                        }
                                    }
                                    if ($catCounter == 0) {
                                        ?>
                                        <div class="col-lg-4 col-md-6 pr-0">
                                        <?php } ?>
                                        <div class="listitems">
                                            <div class="headers <?php echo $strLangCls; ?>"><?php echo $strSkillCategory; ?></div>
                                            <ul>
                                            <?php } ?>
                                            <li> 
                                                <div class="custom-control custom-checkbox">
                                                    <input data-val="<?php echo htmlspecialchars_decode($skillRow['vchSkillName'], ENT_QUOTES); ?>" class="custom-control-input chkSkillset" type="checkbox" id="chkSkillset_<?php echo $skillRow['intSkillId']; ?>" <?php echo $tooltip; ?> name="chkSkillset[]" value="<?php echo $skillRow['intSkillId']; ?>" <?php echo (($skillRow['intSkillId']== $strSkills ) ? 'checked' : ''); ?> onclick="return skillChange(this);">
                                                    <label class="custom-control-label <?php echo $strLangCls; ?>" for="chkSkillset_<?php echo $skillRow['intSkillId']; ?>" class="screenreader"><?php echo ($_SESSION['lang'] == 'O' && $skillRow['vchSkillNameO'] != '') ? $skillRow['vchSkillNameO'] : htmlspecialchars_decode($skillRow['vchSkillName'], ENT_QUOTES); ?><?php echo $manadateMark; ?></label>
                                                </div>
                                            </li>

                                        <?php $prevCatId = $currentCatId;
                                    }
                                    ?>
                                        <div class="clearfix"></div>  </div>
                            </div>                                      
                        <?php } ?>
                    </div>
                </div>               




                <div class="clearfix"></div>

                <div class="borderbox">
                    <div class="form-group row check-edit">
                        <div class="col-sm-6">  
                            <label class="screenreader <?php echo $strLangCls; ?>" for="selDistrict" tabindex="79">
                            <?php echo $strDistrictlbl; ?>
                            </label>
                            <span class="required">*</span>
                            <select class="form-control" name="selDistrict" id="selDistrict" onchange="fillBlocks('0', this.value, 'selBlock');">
                                <option value="0" class="<?php echo $strLangCls; ?>">--<?php echo $strSelectlbl; ?>--</option>
                            </select>

                            <div class="clearfix"></div>
                        </div>

                        <div class="col-sm-6">
                            <label class="screenreader <?php echo $strLangCls; ?>" tabindex="41">
                            <?php echo $strBlock; ?>
                            </label>
                            <span class="required">*</span>
                            <select class="form-control" name="selBlock" id="selBlock">
                                <option value="0" class="screenreader <?php echo $strLangCls; ?>" tabindex="42">--<?php echo $strSelectlbl; ?>--</option>
                            </select>

                        </div>  
                    </div>
                </div>
                <em class="text-danger <?php echo $strLangCls; ?>">
                <?php echo $strExamcenter; ?>
                </em>
                <p class="text-info" id="robotnote" style="display: none;"><em><?php echo $noteforrobotics; ?></em></p>

                <div class="clearfix"></div>
                <div class="form-group row mb-2">
                    <h3 class="screenreader osda--heading mt-4 mb-0 <?php echo $strLangCls; ?>" tabindex="80">
                        <?php echo $strApplicantinfolbl; ?>
                    </h3>
                    

                    <hr/>
                </div>
                <div class="form-group row">


                    <!--demo accordion-->
                    <!--  FORM Applicant Information START HERE -->

                    <div class="panel panel-default skillcompetepanel">
                        <div class="panel-heading" >
                            <h5 class="panel-title p-1"> <a data-toggle="collapse" class="<?php echo $strLangCls; ?>" href="#applicant1" id="firstappl"> <?php echo $applicant; ?></a> </h5>
                        </div>

                        <div id="applicant1" class="panel-collapse in">
                            <div class="panel-body check-edit">

                                <div id="tobeHide">


                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="screenreader <?php echo $strLangCls; ?>" for="txtFirstName" tabindex="84">
                                            <?php echo $strFirstNamelbl; ?>
                                            </label>

                                            <span class="required">*</span>
                                            <input type="text" class="form-control" placeholder="<?php echo $strFirstNamelbl; ?>" id="txtFirstName" name="txtFirstName" value="<?php echo $txtFirstName; ?>" maxlength="30"> 

                                        </div>

                                        <div class="col-sm-6">
                                            <label class="screenreader <?php echo $strLangCls; ?>">
                                            <?php echo $strLastNamelbl; ?>
                                            </label>
                                            <input type="text" class="form-control" placeholder="<?php echo $strLastNamelbl; ?>" id="txtLastName" name="txtLastName" value="<?php echo $txtLastName; ?>" maxlength="30">    

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-6">  
                                            <span class="required">*</span>
                                            <label class="<?php echo $strLangCls; ?>"><input type="radio" id="rdoGender1" name="rdoGender" value="1" <?php echo (($rdoGender == 1) ? 'checked' : ''); ?>>   <?php echo $strMalelbl; ?>  </label>
                                            <label class="<?php echo $strLangCls; ?>"><input type="radio" id="rdoGender2" name="rdoGender" value="2" <?php echo (($rdoGender == 2) ? 'checked' : ''); ?>>   <?php echo $strFemalelbl; ?> </label>
                                            <label class="<?php echo $strLangCls; ?>"><input type="radio" id="rdoGender3" name="rdoGender" value="3" <?php echo (($rdoGender == 3) ? 'checked' : ''); ?>>  <?php echo $strOtherslbl; ?>   </label>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="screenreader <?php echo $strLangCls; ?>">
                                            <?php echo $strEmaillbl; ?>
                                            </label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $txtEmail; ?>" maxlength="50">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">

                                            <div class="form-group row">
                                                <label class="screenreader  <?php echo $strLangCls; ?>">
                                                <?php echo $strMobnolbl; ?>
                                                </label>
                                                <span class="required">*</span>
                                                <input type="text" class="form-control" id="txtPhone" name="txtPhone" value="<?php echo $txtPhone; ?>"  maxlength="10" onKeyPress="return isNumberKey(event);">
                                            </div> 

                                            <div class="form-group row">
                                                <label class="screenreader <?php echo $strLangCls; ?>" for="txtDob" tabindex="84">
                                                <?php echo $strDoblbl; ?>
                                                </label>

                                                <span class="required">*</span>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control datepicker" data-date-format="dd-mm-yyyy" id="txtDob" name="txtDob" value="<?php echo ($txtDob != '') ? date('d-m-Y', strtotime($txtDob)) : ''; ?>" maxlength="15" autocomplete="off"> <i class="fa fa-calendar"></i>
                                                    <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
                                                </div>

                                            </div>


                                        </div>

                                        <div class="col-sm-6">
                                            <label class="screenreader <?php echo $strLangCls; ?>">
                                            <?php echo $strProfilepiclbl; ?>
                                            </label>

                                            <span class="required">*</span>
                                            <label class="uploadImg">
                                                <input type="file" name="fileUploadPhoto" id="fileUploadPhoto"  onchange="uploadFileToTempRegd('skillCopmetition_Profile', this.id, 'hdnProfilePic', 'jpg,jpeg,png', 'loaderProfilePic', '1024', 1, 2, 'dispProfileimg', 1, 'spnProfilePic');" value="<?php echo $profilePhoto;?>"/>
                                                <img src="<?php echo SITE_URL; ?>images/demo-profile.png" id="dispProfileimg" width="100" height="100"/>

                                                <input type="hidden" class="hdnProfilePic" id="hdnProfilePic" name="hdnProfilePic" value="<?php echo $profilePhoto;?>" />
                                                <img id="loaderProfilePic" class="loaderProfilePic loader" src="<?php echo SITE_URL; ?>images/loading.gif" style="display: none;">
                                                <i class="fa fa-check uploadConf spnProfilePic" id="spnProfilePic" style="display: none;" ></i>
                                            </label>

                                            <br>

                                            <span class="red <?php echo $strLangCls; ?>">(<?php echo $strProfileVallbl; ?>)</span>

                                        </div>
                                    </div>


                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label class="screenreader" for="txtAadharNo"><?php echo $strAadharLevel; ?></label>    

                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="txtAadharNo" name="txtAadharNo" value="<?php echo $selIdProof; ?>" maxlength="12" onKeyPress="return isNumberKey(event);">
                                            <!-- <input type="hidden" id="hidAadharNo"  name="hidAadharNo" value="<?php echo $selIdProof; ?>" maxlength="20"> -->

                                        </div>

                                        <div class="col-sm-6">
                                            <label class="screenreader <?php echo $strLangCls; ?>">
                                            <?php echo $strAadharUploadLevel; ?>
                                            </label>

                                            <span class="required">*</span>
                                            <input type="file" class="form-control" id="fileDocument" name="fileDocument" onchange="uploadFileToTemp('skillcomp_idproof', this.id, 'hdnIdProofPic', 'jpg,jpeg,pdf', 'loaderIdProof', '2048', 1, 2, '', 1, 'spnIdProof');" value="<?php echo $fileDocument;?>">
                                            <input type="hidden" class="hdnIdProofPic" id="hdnIdProofPic" name="hdnIdProofPic" value="<?php echo $fileDocument;?>" />
                                            <img id="loaderIdProof" class="loaderIdProof loader" src="<?php echo SITE_URL; ?>images/loading.gif" style="display: none;">
                                            <i class="fa fa-check uploadConf spnIdProof" id="spnIdProof" ></i>    

                                            <span class="red <?php echo $strLangCls; ?>">(<?php echo $strfiletypelbl; ?>)</span>
                                        </div>

                                    </div>  



                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label class="screenreader <?php echo $strLangCls; ?>" for="selQualificationpop">
                                            <?php echo $strQualificationlbl; ?>
                                            </label>

                                            <span class="required">*</span>
                                            <select class="form-control" name="selQualification" id="selQualification" onChange="setQualifyId('hdnQualification','txtAcademicInstitute','hidInsId','institute-datalist',this.value)" >
                                                <option value="0" class="<?php echo $strLangCls; ?>">--<?php echo $strSelectlbl; ?>--</option>

                                            </select>

                                        </div>



                                        <div class="col-sm-6">
                                            <label class="screenreader <?php echo $strLangCls; ?>" for="txtAcademicInstitute">
                                            <?php echo $strAcademiclbl; ?>
                                            </label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="txtAcademicInstitute" name="txtAcademicInstitute" value="<?php echo $txtAcademicInstitute; ?>"  maxlength="100" >                              
                                            <span id="institute-datalist" style="display:none"></span>
                                            <input type="hidden" id="hidInsId"  name="hidInsId" value="0" maxlength="20">
<!--                                                 <select class="form-control" name="txtAcademicInstitute" id="txtAcademicInstitute" >
                                                 <option value="0" class="<?php echo $strLangCls; ?>">--<?php echo $strSelectlbl; ?>--</option>

                                             </select>-->
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <!--collapse 2  start-->


                        <div class="panel-heading robotics mt-3">
                            <h5 class="panel-title osda--heading p-3"> <a data-toggle="collapse" href="#applicant2" id="secondappl" class="<?php echo $strLangCls; ?>">Applicant 2 Information </a> </h5>
                        </div>


                        <div id="applicant2" class="panel-collapse in">
                            <div class="panel-body robotics">

                                <div class="form-group row">

                                    <div class="col-sm-6 setReq">
                                        <label class="screenreader <?php echo $strLangCls; ?>" for="txtFirstNamepop" tabindex="84">
                                        <?php echo $strFirstNamelbl; ?>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?php echo $strFirstNamelbl; ?>" id="txtFirstNamepop" name="txtFirstNamepop" value="<?php echo $txtFirstNamepop; ?>" maxlength="30" autocomplete="off">
                                        <span class="required">*</span> 
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="screenreader <?php echo $strLangCls; ?>" for="txtLastNamepop" tabindex="85">
                                        <?php echo $strLastNamelbl; ?>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?php echo $strLastNamelbl; ?>" id="txtLastNamepop" name="txtLastNamepop" value="<?php echo $txtLastNamepop; ?>" maxlength="30" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6">  
                                        <span class="required">*</span>
                                        <label class="<?php echo $strLangCls; ?>"><input type="radio" id="rdoGender1pop" name="rdoGenderpop" value="1" <?php echo (($rdoGenderpop == 1) ? 'checked' : ''); ?>>   <?php echo $strMalelbl; ?>  </label>
                                        <label class="<?php echo $strLangCls; ?>"><input type="radio" id="rdoGender2pop" name="rdoGenderpop" value="2" <?php echo (($rdoGenderpop == 2) ? 'checked' : ''); ?>>   <?php echo $strFemalelbl; ?> </label>
                                        <label class="<?php echo $strLangCls; ?>"><input type="radio" id="rdoGender3pop" name="rdoGenderpop" value="3" <?php echo (($rdoGenderpop == 3) ? 'checked' : ''); ?>>  <?php echo $strOtherlbl; ?>  </label>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="screenreader <?php echo $strLangCls; ?>">
                                        <?php echo $strEmaillbl; ?>
                                        </label>

                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="txtEmailpop" name="txtEmailpop" value="<?php echo $txtEmailpop; ?>" maxlength="50">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="screenreader  <?php echo $strLangCls; ?>">
                                        <?php echo $strMobnolbl; ?>
                                        </label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="txtPhonepop" name="txtPhonepop" value="<?php echo $txtPhonepop; ?>"  maxlength="10" onKeyPress="return isNumberKey(event);">                                
                                        <label class="screenreader <?php echo $strLangCls; ?>" for="txtDobpop" tabindex="84">
                                        <?php echo $strDoblbl; ?>
                                        </label>

                                        <span class="required">*</span>
                                        <div class='input-group date'>  
                                            <input type="text" class="form-control datepicker" data-date-format="dd-mm-yyyy" id="txtDobpop" name="txtDobpop" value="<?php echo ($txtDobpop != '') ? date('d-m-Y', strtotime($txtDobpop)) : ''; ?>"  maxlength="15" >     

                                            <span class="input-group-addon">  <span class="glyphicon glyphicon-calendar"></span></span>
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="screenreader <?php echo $strLangCls; ?>">
                                        <?php echo $strProfilepiclbl; ?>
                                        </label>

                                        <span class="required">*</span>
                                        <label class="uploadImg">

                                            <input type="file" name="fileUploadPhoto1" id="fileUploadPhoto1"  onchange="uploadFileToTempRegd('skillCopmetition_Profile', this.id, 'hdnProfilePic1', 'jpg,jpeg,gif,png', 'loaderProfilePic', '1024', 1, 2, 'dispProfileimg1', 1, 'spnProfilePic1');"/>
                                            <img src="<?php echo SITE_URL; ?>images/demo-profile.png" id="dispProfileimg1" width="100" height="100"/>

                                            <input type="hidden" class="hdnProfilePic1" id="hdnProfilePic1" name="hdnProfilePic1" value="" />
                                            <img id="loaderProfilePic" class="loaderProfilePic loader" src="<?php echo SITE_URL; ?>images/loading.gif" style="display: none;">
                                            <i class="fa fa-check uploadConf spnProfilePic1" id="spnProfilePic1" ></i>
                                        </label><br>

                                        <span class="red <?php echo $strLangCls; ?>">(<?php echo $strProfileVallbl; ?>)</span>

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label class="screenreader" for="txtAadharNopop"><?php echo $strAadharLevel; ?></label>    

                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="txtAadharNopop" name="txtAadharNopop" value="<?php echo $selIdProofpop; ?>" onKeyPress="return isNumberKey(event);" maxlength="12">

                                    </div>

                                    <div class="col-sm-6">
                                        <label class="screenreader <?php echo $strLangCls; ?>">
                                        <?php echo $strAadharUploadLevel; ?>
                                        </label>

                                        <span class="required">*</span>
                                        <input type="file" class="form-control" id="fileDocumentpop" name="fileDocumentpop"   onchange="uploadFileToTemp('skillcomp_idproof', this.id, 'hdnIdProofPicpop', 'jpg,jpeg,pdf', 'loaderIdProofpop', '1024', 1, 2, '', 1, 'spnIdProofpop');"/>
                                        <input type="hidden" class="hdnIdProofPic" id="hdnIdProofPicpop" name="hdnIdProofPicpop" value="" />
                                        <img id="loaderIdProofpop" class="loaderIdProofpop loader" src="<?php echo SITE_URL; ?>images/loading.gif" style="display: none;">
                                        <i class="fa fa-check uploadConf spnIdProofpop" id="spnIdProofpop" ></i>    

                                        <span class="red <?php echo $strLangCls; ?>">(<?php echo $strfiletypelbl; ?>)</span>
                                    </div>

                                </div>



                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label class="screenreader <?php echo $strLangCls; ?>" for="selQualificationpop">
                                        <?php echo $strQualificationlbl; ?>
                                        </label>

                                        <span class="required">*</span>
                                        <select class="form-control" name="selQualificationpop" id="selQualificationpop" onChange="setQualifyIdPop('hdnQualificationpop','txtAcademicInstitutepop','hidInsIdpop','institute-datalistpop',this.value)">
                                            <option value="0" class="<?php echo $strLangCls; ?>">--<?php echo $strSelectlbl; ?>--</option>

                                        </select>

                                    </div>



                                    <div class="col-sm-6">
                                        <label class="screenreader <?php echo $strLangCls; ?>" for="txtAcademicInstitutepop">
                                        <?php echo $strAcademiclbl; ?>
                                        </label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="txtAcademicInstitutepop" name="txtAcademicInstitutepop" value="<?php echo $txtAcademicInstitutepop; ?>"  maxlength="100" >
                                        <span id="institute-datalistpop" style="display:none"></span>
                                        <input type="hidden" id="hidInsIdpop"  name="hidInsIdpop" value="0" maxlength="20">
<!--                                                 <select class="form-control" name="txtAcademicInstitute" id="txtAcademicInstitute" >
                                             <option value="0" class="<?php echo $strLangCls; ?>">--<?php echo $strSelectlbl; ?>--</option>

                                         </select>-->
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="clearfix"></div>  
                        <br>

                        <div class="form-group row captcha_form_padding">
                            <div class="col-sm-6 col-xs-12">  <span class="required">*</span>
                                <input name="txtSkillCaptcha" type="text" class="passwordinput form-control  <?php echo $strLangCls; ?>" style="width:100%;" id="txtSkillCaptcha" onKeyUp="return blockspecialchar_first(this);"  maxlength="20" placeholder="<?php echo $queryCaptcha; ?>"/>
                            </div>
                            <div class="col-sm-6 col-xs-10 captcha_form ">
                                <div class="captchaimg-sec screenreader"> 
                                    <div class="captcha_refresh pull-right" style="cursor: pointer;">
                                        <i class="fa fa-refresh" id="reload" onClick="generateCaptcha();" aria-hidden="true" style=""></i>
                                    </div>
                                    <img src="<?php echo APP_URL; ?>includes/captcha.php"  style="display: none;" />
                                    <img src="<?php echo APP_URL; ?>includes/captcha.php" alt="captcha image" align="absmiddle" style="" id="captchaImage"/>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <!--<div class="col-sm-12">  

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="agreeCheck" name="agreeCheck" <?php //echo ($rdoWorkSatuspop == 1) ? 'checked' : ''; ?> value="1">
                                <label class="custom-control-label" for="agreeCheck"><?php //echo $agreemsgLbl; ?></label>
                            </div>


                        </div>-->
                        <div class="clearfix"></div>


                        <div class="orm-group row text-center captcha_form ">
                            <div class="col-sm-12">  
                                <button type="submit" class="btn-blue hvr-rectangle-in mt10  screenreader osda--btn " id="btnSubmitSkill" name="btnSubmitSkill" onclick="return validateSkill();" tabindex="230"><?php echo $strSubmitFormlbl; ?></button>
                            </div>
                            <input type="hidden" name="hdnFromdate" id="hdnFromdate" value="1996-01-01" maxlength="10">
                            <input type="hidden" name="hdnTodate" id="hdnTodate" value="1999-01-01" maxlength="10">
                             <input type="hidden" name="hdnSkill" id="hdnSkill" value="<?php echo $hdnStrSkill; ?>" >
                            <input type="hidden" name="hdnQualification" id="hdnQualification" value="0" >
                            <input type="hidden" name="hdnQualificationpop" id="hdnQualificationpop" value="0" >
                            <input type="hidden"  id="agreeCheck" name="agreeCheck" value="0">
                        </div>

                    <?php if($compId>0) { ?>
                    <div class="card bg-light p-4 mb-4 mt-5">
                        <h4 class="mb-4"><?php echo $disclamir;?> :</h4>
                        <ul class="list-type-arrow">
                            <li><?php echo $disPoint1;?></li>
                            <li><?php echo $disPoint2;?></li>
                            <li><?php echo $disPoint3;?></li>
                        </ul>
              

                    </div>
                <?php } ?>

                        <!--collapse 2 end--> 


                    </div>
                    <!--==================== FORM Applicant Information END HERE ==================-->
                    <div class="clearfix"></div>
                </div>

            </div> 

            </div>
            </div>
        </section>

        <!--end:: contarea-->
        <!--start::Footer-->
        <?php include 'include/footer.php' ?>
        <!--Script for datepicker-->
        <script src="<?php echo APP_URL; ?>js/bootstrap-datepicker.min.js"></script> 
        <?php if ($_SESSION['lang'] == 'O') { ?>
            <?php include('includes/datepickermenus-odia.php'); ?>
        <?php } ?>
                <script src="<?php echo APP_URL; ?>js/ajaxfileupload.js" defer></script>
                <script type="text/javascript" language="javascript">

                    $(function () {
                        <?php if($compId > 0){ ?>
                            $('.check-edit input, .check-edit select').each(function() {
                                if($(this).attr('id') == 'txtAadharNo' || $(this).attr('id')=='selDistrict' || $(this).attr('id')=='selBlock'){
                                    $(this).attr('readonly','true')
                                }
                                else{
                                    $(this).attr('disabled','true')
                                }
                            });
                        <?php } ?>
                        $("[data-toggle='tooltip']").tooltip();
                    });
                                        $(document).ready(function () {
                                            <?php if ($outMsg != '' && isset($_REQUEST['btnSubmitSkill'])) { ?>
                                                    viewAlert('<?php echo $outMsg; ?>', '', '<?php echo $redirectLoc; ?>');
                                            <?php } ?>



                                        $('.datepicker').datepicker({
                                            autoclose: true,
                                            todayHighlight: true
                                        });

                                        $('.datepicker').on('click', function (e) {
                    <?php if ($_SESSION['lang'] == 'O') { ?>
                                                $('.datepicker').addClass(' odianum');

                    <?php } else { ?>
                                                $('.datepicker').removeClass(' odianum');
                    <?php } ?>

                                        });                                                                          
                                        fillDistricts('<?php echo $selDistrict; ?>', 'selDistrict');
                                        fillBlocks('<?php echo $selBlock; ?>', '<?php echo $selDistrict; ?>', 'selBlock');

                                        fillSkillQualification('<?php echo $selQualification; ?>', 'selQualification');
                                        //setQualifyId('hdnQualification','txtAcademicInstitute','hidInsId','institute-datalist','<?php echo $selQualification; ?>');
                                        <?php if(empty($compId) && $selQualification>0){ ?>
                                        setQualifyId('hdnQualification','<?php echo $txtAcademicInstitute;?>','hidInsId','institute-datalist','<?php echo $selQualification; ?>','<?php echo $txtAcademicInstitute;?>');
                                    <?php } ?>
                                        fillSkillQualification('<?php echo $selQualificationpop; ?>', 'selQualificationpop');

                                        $('.uploadConf').hide();

                                        setTimeout(function () {

                                            if ($('#chkSkillset_28,#chkSkillset_26,#chkSkillset_12,#chkSkillset_23').is(":checked")) {
                                                $('.robotics').show();
                                                $('#robotnote').show();
                                                $('#firstappl').html('<?php echo $firstParticipant; ?>');
                                                $('#secondappl').html('<?php echo $secondParticipant; ?>');
                                            } else {
                                                $('.robotics').hide();
                                                $('#robotnote').hide();
                                                $('#firstappl').html('<?php echo $applicant; ?>');
                                            }

                                        }, 300);

                                         $('#txtAcademicInstitute').on('keyup', function (e) {
                                        
                                          var QualifyId=$('#hdnQualification').val();
                                            if (!checkSpecialChar('txtAcademicInstitute'))
                                                return false;
                                            fillSkillInstitutes('institute-datalist', this.value, 0, 'hidInsId', 'txtAcademicInstitute',QualifyId);
                                        });

                                        $('#txtAcademicInstitutepop').on('keyup', function (e) {
                                             var QualifyIdpop=$('#hdnQualificationpop').val();
                                            if (!checkSpecialChar('txtAcademicInstitutepop'))
                                                return false;
                                            fillSkillInstitutes('institute-datalistpop', this.value, 0, 'hidInsIdpop', 'txtAcademicInstitutepop',QualifyIdpop);
                                        });


                                    });                     
                                    //function to calculate age
                                    function calcAge(dateString) {
                                        var birthday = +new Date(dateString);
                                        return ~~((new Date('2018-01-01') - birthday) / (31557600000));
                                    }
                                    //function to validate the form
                                    function validateSkill() {

                                        if ($('input[name="chkSkillset[]"]:checked').length <= 0) {

                                            viewAlert('Please select at least one Skill', 'chkSkillset_1', '');
                                            return false;
                                        }


                                        if (!selectDropdown('selDistrict', 'Select District'))
                                            return false;
                                        if (!selectDropdown('selBlock', 'Select Block'))
                                            return false;


                                        if (!blankCheck('txtFirstName', 'Please enter First Name'))
                                            return false;
                                        if (!checkSpecialChar('txtFirstName'))
                                            return false;
                                        if (!maxLength('txtFirstName', 30, 'First Name'))
                                            return false;

                                        
                                        if (!checkSpecialChar('txtLastName'))
                                            return false;
                                        if (!maxLength('txtLastName', 30, 'Last Name'))
                                            return false;

                                        if ($('input[name=rdoGender]:checked').length <= 0) {

                                            viewAlert('Please select gender', 'rdoGender1', '');
                                            return false;
                                        }

                                        if (!blankCheck('txtEmail', 'Please enter Email ID'))
                                            return false;
                                        if (!checkSpecialChar('txtEmail'))
                                            return false;

                                        if (!validEmail('txtEmail'))
                                            return false;
                                        if (!maxLength('txtEmail', 50, 'Email ID'))
                                            return false;

                                        if (!blankCheck('txtPhone', 'Please enter Mobile No'))
                                            return false;
                                        if (!checkSpecialChar('txtPhone'))
                                            return false;
                                        if (!equalLength('txtPhone', 10, 'Enter a valid mobile no'))
                                            return false;

                                        if ($('#hdnProfilePic').val() == '') {

                                            viewAlert('Please upload profile photo', 'fileUploadPhoto', '');
                                            return false;
                                        }
                                       

                                        if (!blankCheck('txtDob', 'Please enter Date of Birth'))
                                            return false;
                                        if (!checkSpecialChar('txtDob'))
                                            return false;
                                        if (!maxLength('txtDob', 30, 'Date of Birth'))
                                            return false;

                                        var txtDob = $('#txtDob').val();
                                        var resary = txtDob.split("-");

                                        if (txtDob != '') {

                                            var dobDate = new Date(resary[ 2 ] + '-' + resary[ 1 ] + '-' + resary[ 0 ]);

                                            if ($('#chkSkillset_28,#chkSkillset_33,#chkSkillset_22,#chkSkillset_23,#chkSkillset_47,#chkSkillset_48,#chkSkillset_50,#chkSkillset_51,#chkSkillset_52,#chkSkillset_21').is(":checked")) {

                                                var firstDate = new Date('1999-01-01');
                                                var datedisplay = '01/01/1999';
                                            } else {
                                                var firstDate = new Date('2002-01-01');
                                                var datedisplay = '01/01/2002';
                                            }
                                            var secondDate = new Date();//('2005-01-01');

                                            if (dobDate > secondDate) {
                                                viewAlert("Applicant should be born after " + datedisplay + '', '');
                                                return false;
                                            } else if (dobDate < firstDate) {
                                                viewAlert("Applicant should be born after " + datedisplay +  '', '');
                                                return false;
                                            }

                                        }

                                        if (!blankCheck('txtAadharNo', 'Please enter 12 digit Aadhar Number'))
                                            return false;
                                        if (!checkSpecialChar('txtAadharNo'))
                                            return false;
                                        if (!maxLength('txtAadharNo', 12, 'Aadhar Number'))
                                            return false;

                                        if (!blankCheck('hdnIdProofPic', 'Upload scanned copy of your Adhaar card '))
                                            return false;

                                        if ($('#hdnIdProofPic').val() == '') {

                                            viewAlert('Upload scanned copy of your Adhaar card', 'fileDocument', '');
                                            return false;
                                        }

                                        if (!selectDropdown('selQualification', 'Select Education Qualification'))
                                            return false;

                                        if (!blankCheck('txtAcademicInstitute', 'Please Enter Name of your Academic Institution'))
                                            return false;


                                        if ($('#chkSkillset_28,#chkSkillset_26,#chkSkillset_12,#chkSkillset_23,#chkSkillset_47,#chkSkillset_52').is(":checked")) {

                                            if (!blankCheck('txtFirstNamepop', 'Please enter First Name of second applicant'))
                                                return false;
                                            if (!checkSpecialChar('txtFirstNamepop'))
                                                return false;
                                            if (!maxLength('txtFirstNamepop', 30, 'Second applicant First Name'))
                                                return false;
                                            
                                            if (!checkSpecialChar('txtLastNamepop'))
                                                return false;
                                            if (!maxLength('txtLastNamepop', 30, 'Second applicant Last Name'))
                                                return false;


                                            if ($('input[name=rdoGenderpop]:checked').length <= 0) {

                                                viewAlert('Please select gender of Second applicant', 'rdoGenderpop1', '');
                                                return false;
                                            }
                                            if (!blankCheck('txtEmailpop', 'Please enter Email ID of Second applicant'))
                                                return false;
                                            if (!checkSpecialChar('txtEmailpop'))
                                                return false;

                                            if (!validEmail('txtEmailpop'))
                                                return false;
                                            if (!maxLength('txtEmailpop', 50, 'Second applicant Email ID'))
                                                return false;

                                            if (!blankCheck('txtPhonepop', 'Please enter Mobile No of Second applicant'))
                                                return false;
                                            if (!checkSpecialChar('txtPhonepop'))
                                                return false;
                                            if (!equalLength('txtPhonepop', 10, 'Enter a valid mobile no of Second applicant'))
                                                return false;

                                            if ($('#hdnProfilePic1').val() == '') {

                                            viewAlert('Please upload profile photo of Second applicant', 'fileUploadPhoto1', '');
                                            return false;
                                            }

                                            if (!blankCheck('txtDobpop', 'Please enter Date of Birth of Second applicant'))
                                                return false;
                                            if (!checkSpecialChar('txtDobpop'))
                                                return false;
                                            if (!maxLength('txtDobpop', 30, 'Date of Birth'))
                                                return false;

                                            var txtDobpop = $('#txtDobpop').val();
                                            var resary = txtDobpop.split("-");

                                            if (txtDobpop != '') {

                                                var dobDatepop = new Date(resary[ 2 ] + '-' + resary[ 1 ] + '-' + resary[ 0 ]);

                                               if ($('#chkSkillset_28,#chkSkillset_33,#chkSkillset_22,#chkSkillset_23,#chkSkillset_47,#chkSkillset_48,#chkSkillset_50,#chkSkillset_51,#chkSkillset_52,#chkSkillset_21').is(":checked")) {


                                                    var firstDate = new Date('1999-01-01');
                                                    var datedisplay = '01/01/1999';
                                                } else {
                                                    var firstDate = new Date('2002-01-01');
                                                    var datedisplay = '01/01/2002';
                                                }
                                                var secondDate = new Date();

                                                if (dobDatepop > secondDate) {
                                                    viewAlert("Applicant should be born after " + datedisplay +  '', '');
                                                    return false;
                                                } else if (dobDatepop < firstDate) {
                                                    viewAlert("Applicant should be born after " + datedisplay +  '', '');
                                                    return false;
                                                }

                                            }

                                            if (!blankCheck('txtAadharNopop', 'Please enter 12 digit Aadhar Number of Second applicant'))
                                                return false;
                                            if (!checkSpecialChar('txtAadharNopop'))
                                                return false;
                                            if (!maxLength('txtAadharNopop', 12, 'Aadhar Number'))
                                                return false;


                                            if (!blankCheck('hdnIdProofPicpop', 'Please upload the document of identity proof of Second applicant'))
                                                return false;

                                            if ($('#hdnIdProofPicpop').val() == '') {

                                                viewAlert('Please upload the document of identity proof ', 'fileDocumentpop', '');
                                                return false;
                                            }
                                            if (!selectDropdown('selQualificationpop', 'Select Education Qualification of Second applicant'))
                                                return false;

                                            if (!blankCheck('txtAcademicInstitutepop', 'Please Enter Name of Academic Institution of Second pplicant'))
                                            return false;
                                        }

                                          if (!blankCheck('txtSkillCaptcha', 'Please enter Captcha Code'))
                                                return false;
                                    }


                                    function skillChange(obj) {

                                        $('#hdnSkill').val($(obj).data('val'));
                                        if ($('input[name="chkSkillset[]"]:checked').length > 1) {
                                            $('.chkSkillset').prop('checked', false);
                                            $(obj).prop('checked', true);
                                             viewAlert('Participant can choose  only one Skill', 'chkSkillset_1', '');

                                        }
                                        if ($('#chkSkillset_28,#chkSkillset_26,#chkSkillset_12,#chkSkillset_23,#chkSkillset_47,#chkSkillset_52').is(":checked")) {
                                        
                                            $('.robotics').show();
                                            $('#robotnote').show();
                                            $('#firstappl').html('<?php echo $firstParticipant; ?>');
                                            $('#secondappl').html('<?php echo $secondParticipant; ?>');
                                        } else {

                                            $('.robotics').hide();
                                            $('#robotnote').hide();
                                            $('#firstappl').html('<?php echo $applicant; ?>');
                                        }
                                    }

                                    function setQualifyId(ctrlId,txtFieldId,hdnInstituteId,$dataBindCtrlId,val,selVal=0){
                                           $('#'+ctrlId).val(val);
                                           $('#'+txtFieldId).val('');
                                           $('#'+hdnInstituteId).val('');
                                           var QualifyId=val;
                                           fillSkillInstitutes($dataBindCtrlId, this.value, selVal, 'hidInsId', txtFieldId,QualifyId);
                                    }

                                    function setQualifyIdPop(ctrlId,txtFieldId,hdnInstituteId,$dataBindCtrlId,val){
                                           $('#'+ctrlId).val(val);
                                           $('#'+txtFieldId).val('');
                                           $('#'+hdnInstituteId).val('');
                                           var QualifyId=val;
                                           fillSkillInstitutes($dataBindCtrlId, this.value, 0, 'hidInsIdpop', txtFieldId,QualifyId);
                                    }

            $(function() {
                $('#remove-form').remove();
            });
        </script>
    </body>

</html>