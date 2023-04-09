<?php
 /* ================================================
	  File Name                 : addInstGallery.php
	  Description               : This is used for Manage Institute Gallery.
	  Designed By               :
	  Designed On               :
	  Developed By		    : Arpita Rath
	  Developed On		    : 28-March-2017
	  Update History            :	<Updated by>		<Updated On>		<Remarks>
            1                       T Ketaki Debadarshini       19-April-2017           Multiple image upload 
	  Style sheet               : 
	  Javscript Functions       :  validatorchklist.js
	  includes                  :  util.php,addInstGalleryInner.php			
  ================================================== */
      include_once('addInstGalleryInner.php');
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script src="<?php echo APP_URL; ?>js/ajaxfileupload.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  Institute Gallery";
        strFirstLink = "Manage Application";
        strLastLink  = "Institute Gallery";
        loadNavigation('<?php echo $strTab; ?>  Institute Gallery');
        $('#txtName').focus();
        
        indicate = 'yes';
        <?php if ($outMsg != '' && isset($_REQUEST['btnSubmit'])) { ?>
            viewAlert('<?php echo $outMsg;?>','','<?php echo $redirectLoc;?>');
        <?php } ?>
          <?php if ($id == 0) { ?>        
                    $('.userImage').hide();
          <?php } else { ?>
              $('.userImage').show();
                 //   $('#imgMsg').css('margin-left', '110px');
          <?php } ?>

        //fill the districts details
        fillDistricts('<?php echo $intDist; ?>','ddlDist');
        //fill the education details
        fillInstitute('<?php echo $intInst; ?>','ddlInst','<?php echo $intDist; ?>');
        
      //fill the gallery images
        getInstGalleryDetails('<?php echo $intInst; ?>'); 
       
        $('#btnReset').on('click',function(){
           getInstGalleryDetails(0); 
          });
          
        
     });

        //function to validate 
          function validator()
          {
              
              var totRowNumber = $('.addTr').length;
        
                for (var i = 0; i <totRowNumber; i++)
                {
                    if(!selectDropdown('ddlDist','Select District'))
          	 	 return false;
                    if(!selectDropdown('ddlInst', 'Select Institute'))
                       return false;

                    if(!checkSpecialChar('txtCaption_'+ Number(i)))
                        return false;
                    if(!maxLength('txtCaption_'+ Number(i), 100, 'Caption in English'))
                        return false;
                    if(!maxLength('txtCaption_'+ Number(i), 120, 'Caption in Odia'))
                        return false;  
                    
                    
                    if (!blankCheck('hdnImageFile_'+ Number(i), 'Please Upload Image'))
                        return false;

                    if ($('#fileDocument_'+ Number(i)).val() != '')
                    {

                        if (!IsCheckFile('fileDocument_'+ Number(i), 'Invalid file types. Upload only ', 'jpeg,jpg,gif'))
                            return false;
                        var fileSize_inKB = Math.round(($("#fileDocument_"+ Number(i))[0].files[0].size / 1024));
                        if (fileSize_inKB > 1024)
                        {
                            viewAlert('File size cannot be more than 1MB.');
                            return false;
                        }
                    } 
                   

                }
                return true;
                
      

          }

          function readImage(input,imgElm) {

                $('#'+imgElm).show();
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#'+imgElm).attr('src', e.target.result);
                       // $('#imgMsg').css('margin-left', '110px');
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
                <a href="javascript:void(0);" class="btn btn-info active"><?php echo $strTab; ?></a> 
                <a href="<?php echo APP_URL; ?>viewInstGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
                <a href="<?php echo APP_URL?>archiveInstGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">Archive</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlDist">Select District</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlDist" id="ddlDist" onchange="fillInstitute(0,'ddlInst',this.value);">
                            <option value="0">- Select -</option> 
                            
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-2 control-label no-padding-right" for="ddlInst">Select Institute</label>
                    <div class="col-sm-4">
                        <span class="colon">:</span>
                        <select class="form-control" name="ddlInst" id="ddlInst" onchange="getInstGalleryDetails(this.value);">
                            <option value="0">- Select -</option> 
                           
                        </select>
                         <span class="mandatory">*</span>             
                    </div>
                </div>
               <!--   <div class="form-group divImage">
                    <label class="col-sm-2 control-label no-padding-right">Upload Image</label>
                    <div class="col-sm-8">
                       <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB. &nbsp;  Recommended Image width = 650px)</span>
                    </div>
                </div> --> 
                
                <div class="form-group">
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
				<tr>
                                    <th >Caption </th>	
                                    <th >Caption in Odia </th>
                                    <th >Upload Image <span class="viewMandatory">*</span>                                    <span class="red">(jpeg,jpg,gif file only and Max size file Size 1 MB. &nbsp;  Recommended Image width = 650px)</span></th>
                                    <th width="120"></th>
                                    <th width="80">Add More</th>
				</tr>
                            </thead>
                            <tbody id="appendddiv">

                         

                            </tbody>
                    </table>
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

