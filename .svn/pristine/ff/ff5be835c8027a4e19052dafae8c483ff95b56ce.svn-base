<?php
 /* ================================================
	  File Name                 : addEventGallery.php
	  Description               : This is used for Manage Institute Gallery.
	  Designed By               :
	  Designed On               :
	  Developed By		    : Ashis kumar Patra
	  Developed On		    : 28-March-2017
	  Update History            :	<Updated by>		<Updated On>		<Remarks>
            
	  Style sheet               : 
	  Javscript Functions       :  validatorchklist.js
	  includes                  :  util.php,addInstGalleryInner.php			
  ================================================== */
      include_once('addEventGalleryInner.php');
      
?>
<script src="<?php echo APP_URL; ?>js/validatorchklist.js"></script>
<script src="<?php echo APP_URL; ?>js/ajaxfileupload.js"></script>
<script language="javascript">
    $(document).ready(function () {
        
        pageHeader   = "<?php echo $strTab; ?>  Event Gallery";
        strFirstLink = "Manage Application";
        strLastLink  = "Institute Gallery";
        loadNavigation('<?php echo $strTab; ?>  Event Gallery');
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

      
        //fill the gallery images
            getEventGalleryDetails('<?php echo $id;?>'); 
       
        $('#btnReset').on('click',function(){
             getEventGalleryDetails(0); 
          });
          
        
     });

        //function to validate 
          function validator()
          {
              
              var totRowNumber = $('.addTr').length;
        
                for (var i = 0; i <totRowNumber; i++)
                {
                    
                    if(!checkSpecialChar('txtCaption_'+ Number(i)))
                        return false;
                    if(!maxLength('txtCaption_'+ Number(i), 200, 'Caption in English'))
                        return false;
                    if(!maxLength('txtCaption_'+ Number(i), 220, 'Caption in Odia'))
                       return false;
                    if (!blankCheck('videoURL_0', 'URL can not left blank'))
                      return false;
                    if (!checkSpecialChar('videoURL_0'))
                       return false;
                    if (!validURL('videoURL_0', 'Please enter a valid URL(Ex : http://www.google.com)'))
                       return false;
                    

                }
                return true;
                
      

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
                <a href="<?php echo APP_URL; ?>viewEventGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info">View</a> 
                <a href="<?php echo APP_URL?>archieveEventGallery/<?php echo $glId; ?>/<?php echo $plId; ?>" class="btn btn-info ">Archive</a> 
            </div>
            <?php include('includes/util.php'); ?>
            <div class="hr hr-solid"></div>
            <div class="col-xs-12">
               
                 
                
                <div class="form-group">
                    <table class="table table-striped table-bordered table-hover">
                            <thead>
				<tr>
                                    <th >Caption </th>	
                                    <th >Caption in Odia </th>
                                    <th >Upload URL <span class="viewMandatory">*</span></th>
                                  
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

