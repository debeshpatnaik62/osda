<?php
  /* ================================================
  File Name       : viewQuestion.php
  Description     : This is used to view question details.
  Author Name     : Rahul Kumar Saw
  Date Created    : 27-Aug-2021
  Devloped By     : Rahul Kumar Saw
  Devloped On     : 27-Aug-2021
  <Updated by>    <Updated On>    <Remarks>
  Style sheet               : 
  JS File       : 
  includes      : 
  ==================================================*/
     
?>
       
         <div class="form-group p-sm border-bottom no-padding"> 
           
        <div class="bigger-150">
      <?php echo ucwords(strtolower(htmlspecialchars_decode($resultStud['vchFirstName'],ENT_QUOTES).' '.htmlspecialchars_decode($resultStud['vchMiddleName'],ENT_QUOTES)).' '.htmlspecialchars_decode($resultStud['vchLastName'],ENT_QUOTES)); ?>  
          </div>
            
          <h5><i class="fa fa-phone"></i> +91-<?php echo $resultStud['vchPhoneno']; ?></h5>
          <h5><i class="fa fa-envelope"></i> <?php echo $resultStud['vchEmailId']; ?></h5>
          <h5>Acknowledgement No : <b><?php echo $resultStud['vchAckNo']; ?></b></h5>
        </div> 
        <!--    START : PROFILE BUILDER    -->
        
         <div class="form-con row pdn-lft0">
                
                <div id="viewTable">
        
                <?php if (mysqli_num_rows($result) > 0) {
                    $ctr = 0; ?>
                    <table class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">Sl.#</th>
                                <th>Question Name</th>
                                <th>Option</th> 
                            </tr>
                        </thead>
                  <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) {

                                $ctr++; 
                                ?>
                            <tr>
                                <td><?php echo $ctr; ?></td>
                                <td><?php echo $row['vchQuestion'];?></td>
                                <td>
                                  <input type="radio" onclick="" value="1" class="" name="rbtnType<?php echo $ctr; ?>" id="rbtnTypeY<?php echo $ctr; ?>">
                                   <span class="lbl"> Correct</span>
                                   <input type="radio" onclick="" value="0" class="" name="rbtnType<?php echo $ctr; ?>" id="rbtnTypeN<?php echo $ctr; ?>" checked>
                                   <span class="lbl"> Incorrect</span>
                                </td>                        
                    </tr>
                        <?php } ?>
                         </tbody>
                    </table>
                    <input type="hidden" name="hdnTotalQuestion" value="<?php echo $ctr; ?>">
                    <input type="submit" id="btnSubmitQuestion" name="btnSubmitQuestion" value="Submit" class="btn btn-success" />
                    <input name="hdn_ids" id="hdn_ids" type="hidden" value="<?php echo $applicantId;?>" />
                <?php } else { ?>
                    <div class="noRecord">No questions availabe</div>
            <?php } ?>
        </div>
        </div>
            <!--    END OF PROFILE BUILDER    -->
            
            
     