<?php
/*plugin*/
/*
Website Name : Odisha Skill Developement Authority (OSDA)
Date Created : 6th Dec 2018
Author : MRD
*/
?>

<!doctype html>
<html lang="en">
<?php include 'include/header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/focus.css">
<!--start:: contarea-->

<section class="container contarea">
<?php 
 if ($result->num_rows > 0) {
                    $ctr = $intRecno; ?>
<div class="row">

  <?php while ($focusRow = $result->fetch_array()) {
                            
                                $ctr++; 
            $intFocusId     = $focusRow["intId"];
            $strFocTitleE = ($focusRow['vchTitle'] != '') ? htmlspecialchars_decode($focusRow['vchTitle'], ENT_QUOTES) : '';
            $strFocTitle = ($_SESSION['lang'] == 'O' && $focusRow['vchTitleO'] != '') ? $focusRow['vchTitleO'] : $strFocTitleE;
            $strFocTitlecls=($_SESSION['lang'] == 'O' && $focusRow['vchTitleO'] != '')?'odia':'';
            
            $strFocNameE = ($focusRow['vchName'] != '') ? htmlspecialchars_decode($focusRow['vchName'], ENT_QUOTES) : '';

            $strFocName = ($_SESSION['lang'] == 'O' && $focusRow['vchNameO'] != '') ? $focusRow['vchNameO'] : $strFocNameE;
            $strFocNamecls=($_SESSION['lang'] == 'O' && $focusRow['vchNameO'] != '')?'odia':'';
            
            $strImageFile = ($focusRow['vchImage'] != '') ? APP_URL . 'uploadDocuments/Infocus/' . $focusRow['vchImage'] : '';
            $strDesccls = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? 'odia' : '';
            $strFocDescE = ($focusRow['vchDescription'] != '') ? htmlspecialchars_decode($focusRow['vchDescription'], ENT_QUOTES) : '';
            
            $strFocDesc = ($_SESSION['lang'] == 'O' && $focusRow['vchDescriptionO'] != '') ? $focusRow['vchDescriptionO'] : $strFocDescE;
                                
                                ?>
                <div class="focusinner" id="focused-<?php echo $intFocusId;?>">
                   <div class="row">
                    <div class="col-sm-4">
                        <div class="focusimg">
                                <img src="<?php echo $strImageFile;?>" alt="<?php echo $strFocName;?>">

                        </div>
                        </div>

                        <div class="col-sm-8">
                        <div class="focusimgcontent">
                                                <h3 class="<?php echo $strFocNamecls;?>"><?php echo $strFocName;?></h3>
                                                <h4 class="<?php echo $strFocTitlecls;?>"><?php echo $strFocTitle;?></h4>
                                                <div class="borderr"></div>
                                                <div class="">
                                                        <p class="<?php echo $strDesccls;?>"><?php echo $strFocDesc;?></p>
                                                </div>
                                        </div>
                    </div>
                   </div>			
                </div>
  <?php } ?>


<!--<div class="focusinner" id="Employer">
    <div class="row">
     <div class="col-sm-4">
	<div class="focusimg">
		<img src="images/Employer.jpg" alt="image">
	</div>
	</div>
	
	 <div class="col-sm-8">
	<div class="focusimgcontent">
				<h3>Shahi Exports</h3>
				<h4>Focused Employer</h4>
				<div class="borderr"></div>
				<div class="">
					<p>The textiles and apparel sector employs more than 119 million workers in India, with women making up roughly 35 percent of the workforce. The garment sector is also the largest employer of low-skilled and semi-skilled female workers. As these units generate more employment, in recent years the Govt has given priority for establishment of textile units in Odisha. People specifically girls ‘skilled in Odisha’ are part of many major textile units in India, be it in Coimbatore, Chennai, Tirupur of in Bhubaneswar too.</p>
					
					<p>Shahi Exports Pvt Limited is one such employer whose employees are basically trained in either Govt or private it is of the state. Around 60% of its workforce is women that to skilled in Odisha. Shahi Export is a training partner under DDU-GKY, Odisha for last years and has been hiring trained operators from Odisha. Recently it has established its own manufacturing unit at Bhuabneswar. According the officials of Shahi Exports, operators from Odisha are clearly focused on the work. They are quick to learn and enhance their skill in short period and are much disciplined.</p>
					
					
				</div>
			</div>
	</div>
	</div>
</div>



<div class="focusinner" id="TrainingPartner">
    <div class="row">
     <div class="col-sm-4">
	<div class="focusimg">
		<img src="images/TrainingPartner.jpg" alt="image">
	</div>
	</div>
	
	 <div class="col-sm-8">
	<div class="focusimgcontent">
				<h3>Abbey West Services</h3>
				<h4>Focused Training Partners</h4>
				<div class="borderr"></div>
				<div class="">
					<p>Abbey West Services (AWS) delved into skill development sector in 2010. It has established partnership with Ministry of Rural Development in 2014 to start imparting skill development training for rural youths belonging to down trodden families under Deen Dayal Upadhyay Grameen Kaushalya Yojana (DDU-GKY). It has now successfully completed of three projects under DDU-GKY and trained 2081 rural youths out of which 1445 have been successfully placed in various industries. Abbey West believes that those who have been sidelined from society should be nurtured and given a second chance to come back to main stream of the society. And that can be done through skilling Therefore; the organization has trained more than 7000 students and provided employment to more than 5000 students across various industries. Abbey West has 11centers in all over Odisha and they provide candidates basic training in Hospitality, Electrical, Industrial Sewing Machine, Finisher & Checker, and Beauty Care & Wellness etc. sectors. Annually they train around 5000 people.</p>
					
					<p>Recently, the organization has launched a project for destitute women-ET WISH. The project ET WISH (Employability Training of Women in Shelter Homes) aims to bring about both the social & economical upliftment of women in shelter homes by means of skill development training. A specific module was designed to gain the necessary Attitude, Skills & Knowledge to perform at the job from day one. The training programme included IT, soft skill, literacy & digital numeracy as well as theory & practical in Hospitality etc. The biggest positive is 26 out of 27 candidates who joined this programme have found employment in hotel & hospital industry.

				        <br>To know more, Go to www.yousucceed.co.in</p>
					
					
				</div>
			</div>
	</div>
	</div>
</div>



<div class="focusinner" id="official">
    <div class="row">
     <div class="col-sm-4">
	<div class="focusimg">
		<img src="images/official.jpg" alt="image">
	</div>
	</div>
	
	 <div class="col-sm-8">
	<div class="focusimgcontent">
				<h3>Mrs Jeetamitra Satapathy</h3>
				<h4>Focused Official</h4>
				<div class="borderr"></div>
				<div class="">
					<p>‘Proper guidance and good practice would definitely make Odisha youth the best in the World’. </p>
					<p>For Mrs Jeetamitra Satapathy, Principal ITI, Bhubaneswar skill is something which is very much needed in every profession; it should not be restricted to ITI or Polytechnic courses only. She is confident that Odia youth can be game changers in any field all they want is proper guidance so that their competencies can be chiseled out. Proper skill training is an answer to it. with a proper focus the skill sector now youths can present themselves as “Skilled In Odisha’ and can be a global brand. Giving an inference to the recently concluded ‘Skill Odisha-2018’ competitions, she said the result and the interest of our youth for making something new and excels in their own sphere shows their faith in skilling. Skill can definitely enhance anyone’s socio-economic standard. </p>
					<p>Mrs Satpathy has a numerous feathers in her hat. One of the major achievements that she feels proud is establishment of the ITI at Kudurpur, Jatni. This ITI is the only in the state that is dedicated to differently abled youth. According to her it was difficult to establish this centre and also manage the trainees there, but in the end when she sees trainees out of that ITI establish themselves in the main stream, it makes for immensely happy. She was also instrumental in adding 500 more seats to ITI Bhubaneswar centre after taking charge there as the principal. Her list of achievement is quite a few which include establishing the 1st ever ITI institute at Nayagarh which is considered to be one of the best in the state now. She feels happy when she finds employability for all the trainees passed out from the institute. </p>
					<p>The ITIs are now putting major thrust on improving the will power of the students and also provide opportunities for the holistic development of trainees. She is very optimistic of her students who are going to compete in the regional or world level skill competitions and is sure that they will definitely come out as winners in them and make the brand ‘Skilled In Odisha’ fly high.</p>
					
				</div>
			</div>
		</div>	
		</div>
</div>-->



</div>
 <?php }else{?>
    
    <div class="row"> <div class="col-md-12 col-sm-12 noRecord <?php echo $strLangCls; ?>" align="center"><?php echo $strNoRecordlbl; ?></div></div>
 <?php }?>

</section>

<!--end:: contarea-->



<!--start::Footer-->
<?php include 'include/footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html>