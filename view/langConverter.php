<?php

/* =======================================================
  File Name         	  : langConverter.php
  Description		  : This is the language Converter page .
  Date Created		  : 03-April-2017
  Created By		  :
  Developed by              : Arpita Rath
  Developed on              : 05-April-2017
  Update History		  :
  <Updated by>				<Updated On>		<Remarks>
  1 T Ketaki Debadrashini             14-09-2017          Matric and non-matric added
  Include Functions	  :
  ============================================================= */
include_once('langConverter2.php'); 
//======== news page 
$odiaClass=($_SESSION['lang'] == 'O')?'odia':'';

$strOtherlbl='Others';
$strAadharUploadLevel= 'Upload a scanned copy of your Adhaar card';
$strAadharLevel='12-digit ADHAAR Number';
$ourVisonlbl='ITI Vision';
$strLangCls = '';
$strNumLangCls = '';
$strClickherelbl = 'Click Here';
$strlogotitlelbl = 'Odisha Skill Development Authority';
$strgovtofdishalbl = 'Government of Odisha';
$strhomelbl = 'Home';
$strSharelbl = 'Share';
$strBylbl = 'By';
$strReadMorelbl = 'Read More';

$strViewMorelbl = 'View More';
$strViewLesslbl= 'View Less';
$strCareer     =   'Careers';
$strReadLesslbl= 'Read Less';
$strAllMedia   ='All Media';
$strSearchByCatlbl = 'Search By Category';
$strSubmitlbl = 'Submit';
$strTypelbl = 'Type';
$strYearlbl = 'Year';
$strMonthlbl = 'Month';
$strSearchlbl = 'Search';
$strDistrictlbl = 'District';
$strBlocklbl='Block';
$strSerchCourselbl = 'Search By Course';
$strAddresslbl = 'Address';
$strProfileDeatilslbl = 'Profile Details';
$strInstTypelbl = 'Institute Type';
$strLocationlbl = 'Location';
$strAboutlbl = 'About Us';
$strKnwMorelbl = 'Know More';
$strYearEstlbl = 'Year of Establishment';
$strPrinciNamelbl = 'Principal';

$strOurLocation = 'Our Location';
$strCallus = 'Call us';
$strSendMessage = 'Send Message';
$strContactInfolbl = 'Contact Info';
$strContactDetaillbl = 'We are glad to have you around';
$strPhonelbl = 'Phone';
$strEmaillbl = 'Email';
$strWebsitelbl = 'Website';
$strCourseDetailslbl = 'Course Details';
$strCourseNamelbl = 'Course Name';
$strDurationMonthlbl = 'Duration in Month(s)';
$strBatchlbl = 'Batch';
$strSeatCntlbl = 'Seats Count';
$strEligibilitylbl = 'Eligibility';
$strDetailslbl = 'Details';
$strShareStorylbl = 'Share Your Story';
$strCourselbl = 'Course';
$strSectorlbl = 'Sector';
$strCandEligibilitylbl = 'Candidate Eligibility';
$strCourseDurationlbl = 'Course Duration';
$strDurationlbl = 'Duration';
$strMonthlbl = ' month(s)';
$strMonthInlbl = 'in month(s)';
$strHourlbl = 'hours';
$strInstitutelbl = 'Institutes';
$strInstitute1lbl = 'Institute';

$strPolitechnic  = 'Polytechnic';
$strITI          = 'ITI';
$strNoRecordlbl = 'No record available';
$exmination     = 'Your examination details will be intimated soon in second phase.';
$examList = 'Examination Centre List for 08-Feb-2020';
$strBelow10lbl = 'Below 10';
$str10thlbl = 'th';
$str10lbl = '10';
$str12thlbl = '12';
$strGraduatelbl = 'Graduate';
$strPostGradlbl = 'Post Graduate';
$strMoreStorylbl = 'More Story';
$strPlacelbl = 'Place';
$strDesignationlbl = 'Designation';
$strITINamelbl = 'ITI Name';
$strEmployerlbl = 'Employer';
$strNamelbl = 'Name';
$strEmailAddresslbl = 'Email address';
$strMobileNolbl = 'Mobile No';
$strAttachmentlbl = 'Attachment';
$strPdfMsglbl = 'pdf,doc,docx,ppt,zip file only and Max file Size is 5MB';
$strMsglbl = 'Message';
$strfeedbacklbl = 'Feedback';
$strMaxCharlbl = 'Maximum';
$str1000lbl = '1000';
$strCharlbl = 'characters';
// $strRecaptchalbl       =   'Click on reCAPTCHA box';
$strRecaptchalbl = 'Enter Captcha Code';
$strClickNowlbl = 'Click Now';
$strTrainPartnerslbl = 'Training Partners';
$strTrainCenterlbl = 'TRAINING CENTRE';
$strPeopleTrainlbl = 'PEOPLE TRAINED';
$strPeoplePlacedlbl = 'PEOPLE PLACED';
$strFindTrainCenterlbl = 'Find a Training Centre';
$strMax500Charlbl = 500;
$strCareerlbl = 'Career';
$strGuidelbl = 'Guide';
$strCareerGuideYlbl = 'Skilling can make you soar high';
$strCareerGuidelbl = 'An interactive map to explore all possible career paths.';
$strLoremIpsumlbl = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
$strTeachforOdishalbl = 'Teach for Odisha';
$strTeachOdishaParalbl = 'Lead the movement to impart world-class skills to our youth. Be the teacher, mentor, guide and philosopher to them. Together we can realize the Vision &QUOT;Skilled-in-Odisha, Best in World.&QUOT;';
$strBecomeMember = 'Join Now';
$strInlbl = 'IN';
$strFocuslbl = 'FOCUS';
$strSubmitQuerylbl = 'Submit Your Query';
$strShareOnlbl = 'Share on';
$strTwiterlbl = 'Twitter';
$strTwitterBylbl = 'Tweets by skilledinodisha';
$strSkillingOdishalbl = 'Skilling Odisha';
$strSubmitQueryP1lbl = 'In case you do not find your answer in,';
$strSubmitQueryp2lbl = 'feel free to write us';
$strFaqlbl = 'FAQ';
$strMaplbl = 'MAP';
$strShareStoryParalbl = 'Skill development empowers. It changes lives, gives wings to aspirations. We have heard it often and everywhere but want to hear it from you. For, you are a shining example of "Skilled-in-Odisha". Share your story, your journey through skill development. Your experiences, option and opportunities, goals and achievements can ignite the spark in others for skilling. Come forward and inspire. Be the charioteer for an Empowered Odisha through skill development.';
$strPridelbl = 'Our Pride';
$strRecruiterlbl = 'Our Recruiters';
$strFeaturedITIlbl = 'ITI';
$strITIBBSRlbl = 'ITI Bhubaneswar';
$strITIBerhampurlbl = 'ITI Berhampur';
$strFeaturedPIAlbl = 'Training Partners';
$strGlobalTrainlbl = 'IL&FS Skills Odisha';
$strFeaturedEmploylbl = 'Employer';
$strBalajiIndustrylbl = 'V G Siddhartha';
$strFeaturedGovtlbl = 'Official';
$strbnDaslbl = 'BN Das';
$strLoadMorelbl = 'Load More';
$strSuccessStorylbl = 'Success Stories';
$strViewDetailslbl = 'View details';
$strWant2Teachlbl = 'I want to teach in';
$strWhylbl = 'Why';
$strSelSectorlbl = 'Select Sector';
$strSelCourselbl = 'Select Course';
$strnocatVidlbl = 'No category available in video';
$strSkilledResourcelbl = 'Skilled Resource';
$strTrainCentersmllbl = 'Training Centre';
$strEnrolledCanlbl = 'Enrolled Candidates';
$strTrainPartsmllbl = 'Training Partner';
$strNewUpdateslbl = 'In News';
$strBloglbl = 'Blog';
$strPhotolbl = 'Photo';
$strPhotoEssaylbl = 'Photo Essay';
$strVideolbl = 'Video';
$strPhotogallerydtllbl = 'Photo Gallery Details';
$strVideogallerydtllbl = 'Video Gallery Details';
$strAlllbl = 'All';
$lblArticle = 'Articles';
$lblBiswa   = 'Biswa Bijayee';
$strAboutroadmaplbl1 = '-month Roadmap';
$strAboutroadmaplbl2 = 'The';
$strAboutroadmaplbl3 = 'Skilled-in- Odisha';
$strAllDistlbl = 'Select District';
$strTestimoniallable = 'Employer Speak';
$strProfilelbl = 'Profile Details';

$strStoryViewDetailslbl = 'View details';
$screenreaderlbl = 'Download Screen Reader';
/* MILESTONE */
$strmay161 = 'Shri Subroto Bagchi appointed as Chairman of Odisha Skill Development Authority.';
$strjune161 = 'Government ITI principals briefed on a new 10-point system through which all institutions would be reviewed.';
$strjune162 = 'Odisha Skill Development Authority launched by Honourable Chief Minister Shri Naveen Patnaik in the presence of 500 ITI students and trainees from various parts of the state.';
$strjune163 = '18-Month roadmap unveiled.';
$strjune164 = 'Review of progress starts for ADB funded ASTI projects.';
$strjune165 = 'Biometric attendance in the training centres of training partners was enforced from June, 2016.';
$strjuly161 = 'World Skills Day celebrated in all the Government ITIs across the state.';
$strjuly162 = 'World Skills Day presented as the Girl Child Day to raise awareness for more girls to join ITI.';
$strjuly163 = 'Hall of Fame introduced at every ITI presenting 10 outstanding alumni for students to emulate.';

$straug161 = 'Monthly academic performance review introduced at ITIs instituted with help of Polytechnic teachers.';
$straug162 = 'Government approves additional 350 posts for instructors at ITIs.';
$straug163 = 'New 14 ITIs get NCVT accreditation taking total to 45 NCVT.';
$straug164 = 'All new ITIs for the differently-abled start functioning at Khudurpur, Khorda.';

$strmay171 = 'Over the past year, 5000 + high school girls visit ITIs as a part of “Bring a Girl Child” program to encourage more girls to come to ITIs.';
$strmay172 = 'ASTI pre-bid briefing made in Delhi to ask leading institutions for joining the PPP initiative for 6 out of 8 ASTIs. ';
$strmay173 = 'Pilot launch of the “Nano-Unicorn” project to bring impact investment for grass-root level entrepreneurs. Program for skill trained individuals to start their own with a loan of Rs 1 L loan with 0% interest, no collateral, 1-page paper work based on a competitive case study.';

$strapr171 = 'ITI Talcher and ITI Puri complete Golden Jubilee – Honourable Chief Minister attends the celebrations.';
$strapr172 = 'MOU signed with Utkal University and Lend-A-Hand India for starting “Teach for Odisha” to bring in Ph.D candidates to teach for a year in an ITI as a Change Agent.';
$strapr173 = '12 girls from ITI Berhampur selected to join Bullet motorcycle company in Chennai.';
$strapr174 = 'OSDA achieves 30% contract award completion enabling successful completion of loan negotiations between GoI and ADB.';
$strapr175 = 'Pilot projects in skilling –in Health sector and Entrepreneurship models approved by EC of OSDA on 17.4.2017.';
$strapr176 = 'First ever roll out for recognition of prior learning at OUAT for agricultural sector by Honourable Chief Minister.';

$strmar171 = '1, 22,492 youth skill trained under various schemes; 28,589 employed and 6221 self-employed. Cumulative number goes to 4.3 lakhs leaving 6.7 lakhs to be covered by 2018-19.';
$strmar172 = 'OSDA moves into its own premises at Rajib Bhavan designed by a young architect. ';
$strmar173 = '.';

$strfeb171 = 'Crack down on examination malpractice commences with the help of district administration. First semester pass rate to decline to 48% in later months.';
$strfeb172 = 'Head Masters of 11 out of 30 districts covered under orientation on ITI as a future career for students.';
$strfeb173 = '.';

$strjan171 = 'ITI buildings now don a new design.';
$strjan172 = 'Executive Committee of OSDA clears project worth.';
$strjan173 = 'Criteria for the grading of training partners and their training centres uniformly across schemes and across departments rolled out in January, 2017. ';


$strdec161 = 'Odisha Skill Development Authority formally comes into effect as a registered society on 6th December, 2016.';
$strdec162 = '4-member Executive Council of OSDA formed to meet monthly and clear/review skill projects .';
$strdec163 = '2000 ITI students converge in Bhubaneswar to witness Make in Odisha event.';
$strdec164 = 'All new uniforms for ITI, Polytechnic and other skill training designed by NIFD get introduced.';
$strdec165 = 'Children of construction workers now get 100% scholarship at ITIs.';
$strdec166 = 'Common Norms notified by MoSDE, GoI was adopted by OSDA with effect from 27.12.2016 for all state funded skill training programmes for bringing in uniformity in project execution.';
$strdec167 = 'With the adoption of Common Norms with effect from 27th December, 2016, Biometric attendance along with CCTV cameras in the hostel were also adopted.';
$strdec168 = 'Skill Pavilion was arranged in the Make in Odisha Conclave organised in November-December, 2016.';

$strnov161 = 'Attendance of 100% ITI and Polytechnics students and staff is now taken by bio-metrics.';
$strnov162 = 'Training Partners & Employer workshop conducted on 10.11.2016 to garner partnership and greater engagement in scaling skilling.';

$strsep161 = 'System for ranking government ITIs begin.';
$strencodepincode = 'Enter Pincode';
$strencodedistrict = 'Enter District';
$strfindnow = 'Find Now';
$strsearch = 'Search';
$strlahi = 'Go to LAHI Website';
$strteachforodishaurl = 'Teach for Odisha Website';
$strNALevel = 'N/A';
$strNanoRadio1 = 'Are you skilled / trained at any Govt. ITI ?';
$strNanoRadio2 = 'Have you gone through any skill development programme at any training centre ?';
$strNanoITI    = 'Choose Govt. ITI';
$strNanoCenter = 'Choose Training Centre';
$strNanoTrade  = 'Choose Trade';

$strMJan = "Jan";
$strMFeb = "Feb";
$strMMar = "Mar";
$strMApr = "Apr";
$strMMay = "May";
$strMJun = "Jun";
$strMJul = "Jul";
$strMAug = "Aug";
$strMSep = "Sep";
$strMOct = "Oct";
$strMNov = "Nov";
$strMDec = "Dec";

$str2016 = 2016;
$str2017 = 2017;


$queryFormNamelvl = "Enter Name";
$queryFormEmaillvl = "Enter Address";
$queryFormMobilelvl = "Mobile No.";
$queryTypeLvl = "Write your query maximum 500 characters..";
$queryCaptcha = "Captcha Code";
$instinodishalbl = "Institutes in Odisha";

$entercourseinstnamelbl = "Enter Course/Institute Name";
$govermentlbl = "Government";
$privatelbl = "Private";
$printlbl = "Print";
$skiptomainlbl = "Skip to main content";
$albl = "A";
$ourgallerylbl = "Our Gallery";
$astilbl = "ASTI";
$astifullformlbl = "Advance Skill Training Institute";
$itilbl = "ITI";
$itifullformlbl = "Industrial Training Institute";
$pialbl = "Training Partners";
$entercourseorpialbl = "Enter Course/Training Partners Name";
//$piafullformlbl    ="Programme Implementation Agency";
$astinumberlbl = 8;
$itinumberlbl = 49;
$pianumberlbl = 63;
/* find institute only for home */
$findinstitutelbl = "Find Institutes";
$nearlocationlbl = "Near your Location";

$pinCodemessage1 = 'Please enter either pincode or district.';
$validPincodelevel = 'Enter a valid pincode.';

$strTrainPartnerslblnumber = 23;
$strTrainCenterlblnumber = 49;
$strPeopleTrainlblnumber = 8324;
$strPeoplePlacedlblnumber = 1340;

$medialbl = "Media";
$strfindyourcourceslbl = 'Find Your Courses';
$orlbl = "OR";

/* Level for DIstrict Map */
$strKhurda = 'Khurdha';
$strPuri = 'Puri';
$strGanjam = 'Ganjam';
$strGajapati = 'Gajapati';
$strRayagada = 'Rayagada';
$strKalahandi = 'Kalahandi';
$strBolangir = 'Bolangir';
$strNuapada = 'Nuapada';
$strSonepur = 'Sonepur';
$strSambalpur = 'Sambalpur';
$strJharsuguda = 'Jharsuguda';
$strSundargarh = 'Sundargarh';
$strDeogarh = 'Deogarh';
$strKeonjhar = 'Keonjhar';
$strAnugul = 'Angul';
$strBoudh = 'Boudha';
$strNayagarh = 'Nayagarh';
$strCuttack = 'Cuttack';
$strKendrapara = 'Kendrapara';
$strJagatsinghpur = 'Jagatsinghpur';
$strBhadrak = 'Bhadrak';
$strJajpur = 'Jajpur';
$strDhenkanal = 'Dhenkanal';
$strKoraput = 'Koraput';
$strMalkangiri = 'Malkanagiri';
$strNabrangpur = "Nabarangapur";
$strMayurbhanj = "Mayurbhanj";
$strBalasore = "Balasore";
$strBargarh = "Bargarh";
$strKandhamal = "Kandhamal";

$strstorymunitigatitle = "From herding cows to steering trains, she has come a long way. Acquiring skills has changed her life.";
$strstorymunitigadesc = "If being born to a poor tribal family was not enough, Muni Tiga lost her father at a very early age. But she had the fortitude to battle fate and overcome all adversities. She studied hard completed school and joined ITI Bargarh despite taunts and chides from her villagers. After training in electrical engineering in ITI too, she dared to take uncharted course and became a locomotive pilot with Indian Railways. Today she chugs the Shatabdi Express to Palasa and back eveyday.";
$strstorymunitiganame = "MUNI TIGA";
$strstorymunitigadesi = "Locomotive Pilot in Indian Railways";


$strSectorFilterLbl = 'Filter by Sectors';
$strEligibilityFilterLbl = 'Filter by Eligibility';
$strDurationFilterLbl = 'Filter by Duration ';

$str3monthDurationLbl = 'Less than 3 Months';
$str6monthDurationLbl = '3-6 Months';
$str12monthDurationLbl = '6-12 Months ';
$str1yearDurationLbl = 'More than 1 Year ';

$strstorymunitigadesi = "Less than 3 Months";
$strViewalbumlbl = "View Album";

$strCourseSearchlbl = "Search by Courses";

$strCourseSearchReslbl1 = "";
$strCourseSearchReslbl2 = " courses found in our directory";
$strOfferedbylbl = "Skill Institute";//"Skillers";

$instinodishaloclbl1 = "Institutes in ";
$instinodishaloclbl2 = "Odisha ";

$strInstituteFinderdesclbl1 = "To find your nearest institute, please enter your six-digit pincode number and we will let you know institutes of your nearest location.
  If your search returns no results, that doesn't necessarily mean there isn't an institute near you! Please ";
$strInstituteFinderdesclbl2 = " contact us.";

$strGvtItilbl = " Govt. ITI";
$strPIAlbl = " Training Partners";

$instinodishaSearchlbl1 = "";
$instinodishaSearchlbl2 = "Institute(s) found near your location ";

$strSeactorBrowselbl = 'Browse the complete list of sectors';
$strNorecordlbl = 'No Record Found';
$strShorttermlbl = 'Short Term Courses';
$strLongtermlbl = 'Long Term Courses';

$strMapviewlbl = 'Map View';
$strListviewlbl = 'List View';
$strOdishamaplbl = 'Odisha Map';
$strDistInstlbl = 'District-Wise Institute Details';
$stritiResultlbl1 = 'Showing results for ';
$stritiResultlbl2 = ' to view all institutes';
$stritiResultlbl3 = '. Click here';
$stritiResultlbl4 = '';
$strNewsdetaillbl = 'News Details';

//$strNewsReadmorelbl               = 'read more at';

$strButtomlbl1 = 'Terms & Condition';
$strButtomlbl2 = 'Disclaimer';
$strButtomlbl3 = 'Privacy Policy';
$strButtomlbl4 = 'Sitemap';

$strHomeImglbl1 = 'NSDC';
$strHomeImglbl2 = 'Sectors & Courses';
$strHomeImglbl3 = 'Course Syllabus';
$strHomeImglbl4 = 'Training Providers';
$strHomeImglbl5 = 'Schemes for Training';
$strHomeImglbl6 = 'Training Resources';
$strHomeImglbl7 = 'CTS Courses';
$strHomeImglbl8 = 'MES Courses';
$strHomeImglbl9 = 'Skill Development & Technical Edu. Dept.';
$strHomeImglbl10 = 'Directorate of Employment, SDTE';
$strHomeImglbl11 = 'SCTEVT Odisha';
$strHomeImglbl12 = 'Directorate of Technical Edu. & Training, SDTE';

$strNewsSourcelbl = 'Source';
$strNewsHeadlinelbl = 'News Headline';
$strFromDatelbl = "From Date";
$strToDatelbl = "To Date";
$strViewCourselbl = "View Courses";

$strInFocuslbl = 'In Focus';
$strCoffeedaylbl = 'Cafe Coffee Day';

$strInfocuslbl1 = 'Proper guidance and good practice would definitely make Odisha  ..';
$strInfocuslbl2 = "The textiles and apparel sector employs more than 119 million  ..";
$strInfocuslbl3 = "  Industrial Training Institute Bhubaneswar is a 27 years institute  ..";
$strInfocuslbl4 = "Abbey West Service (AWS) delved into skill development sector in 2010 ...";

$strInfocusDesc1 = 'Industrial Training Institute Bhubaneswar is a 27 years institute established in 1985 as an ITI exclusively for women .with just 4 trades. Today, the ITI is one of the top most centres on industrial and technical training with 8 elite skill courses in its syllabus and a seat intake of 676 both men & women.<br><br>
The ITI provides basic  short term courses like Computer fundamental, Tally, Computer Hardware, Multimedia & Webpage Design , Basic Electrical ,Basic Electronics, Mobile Repairing, Tailoring , solar electricity training etc. under MES skills of  Skill Development Initiative ,Govt. of india. All these courses are provided free of cost to trainees. Apart from this the ITI has tie ups with certain premier placement coaching institutes for readying the trainees for jobs in Railways and other PSUs. In recent years it has also signed some MoUs for training of soft and communication skills so that the students can be placed in multinational companies. Special attention is given to extracurricular activities such as sports, debate-cum-student-seminars, cultural programs and community works to develop the interpersonal skills of our students.<br><br>
Beyond classroom training this institution boast of an State of the Art SMART CLASS room with Interactive Smart Board. This also has an e-Library equipped with computers with internet facility for advance study and also has a  hostel for girls with limited seats. Bhubaneswar ITI has a tradition of maximum employment as many as 80% of the trainees get employed every year in top-notch companies like Hero MotoCorp, Samsung, Tata Motors, Unitech Corporation, Lava International. ITC Ltd etc.
';
$strInfocusDesc2 = "The textiles and apparel sector employs more than 119 million workers in India, with women making up roughly 35 percent of the workforce. The garment sector is also the largest employer of low-skilled and semi-skilled female workers. As these units generate more employment, in recent years the Govt has given priority for establishment of textile units in Odisha. People specifically girls ‘skilled in Odisha’ are part of many major textile units in India, be it in Coimbatore, Chennai, Tirupur of in Bhubaneswar too.  
";
$strInfocusDesc3 = "Shahi Exports Pvt Limited is one such employer whose employees are basically trained in either Govt or private it is of the state. Around 60% of its workforce is women that to skilled in Odisha. Shahi Export is a training partner under DDU-GKY, Odisha for last years and has been hiring trained operators from Odisha. Recently it has established its own manufacturing unit at Bhuabneswar. According the officials of Shahi Exports, operators from Odisha are clearly focused on the work. They are quick to learn and enhance their skill in short period and are much disciplined.";

$strInfocusDesc4 = "Abbey West Services (AWS) delved into skill development sector in 2010. It has established partnership with Ministry of Rural Development in 2014 to start imparting skill development training for rural youths belonging to down trodden families under Deen Dayal Upadhyay Grameen Kaushalya Yojana (DDU-GKY). It has now successfully completed of three projects under DDU-GKY and trained 2081 rural youths out of which 1445 have been successfully placed in various industries.  Abbey West believes that those who have been sidelined from society should be nurtured and given a second chance to come back to main stream of the society. And that can be done through skilling Therefore; the organization has trained more than 7000 students and provided employment to more than 5000 students across various industries. Abbey West has 11centres in all over Odisha and they provide candidates basic training in Hospitality, Electrical, Industrial Sewing Machine, Finisher & Checker, and Beauty Care & Wellness etc. sectors. Annually they train around 5000 people.<br><br>

Recently, the organization has launched a project for destitute women-ET WISH.
The project ET WISH (Employability Training of Women in Shelter Homes) aims to bring about both the social & economical upliftment of women in shelter homes by means of skill development training. A specific module was designed to gain the necessary Attitude, Skills & Knowledge to perform at the job from day one. The training programme included IT, soft skill, literacy & digital numeracy as well as theory & practical in Hospitality etc. The biggest positive is 26 out of 27 candidates who joined this programme have found employment in hotel & hospital industry.<br><br>
To know more, Go to <b>www.yousucceed.co.in</b>";


$strInfocusDesc5 = '‘Proper guidance and good practice would definitely make Odisha youth the best in the World’. <br><br>
 For Mrs Jeetamitra Satapathy, Principal ITI, Bhubaneswar skill is something which is very much needed in every profession; it should not be restricted to ITI or Polytechnic courses only. She is confident that Odia youth can be game changers in any field all they want is proper guidance so that their competencies can be chiseled out. Proper skill training is an answer to it. with a proper focus the skill sector now youths can present themselves as “Skilled In Odisha’ and can be a global brand. Giving an inference to the recently concluded ‘Skill Odisha-2018’ competitions, she said the result and the interest of our youth for making something new and excels in their own sphere shows their faith in skilling. Skill can definitely enhance anyone’s socio-economic standard. <br><br>
Mrs Satpathy has a numerous feathers in her hat. One of the major achievements that she feels proud is establishment of the ITI at Kudurpur, Jatni. This ITI is the only in the state that is dedicated to differently abled youth. According to her it was difficult to establish this centre and also manage the trainees there, but in the end when she sees trainees out of that ITI establish themselves in the main stream, it makes for immensely happy. She was also instrumental in adding 500 more seats to ITI Bhubaneswar centre after taking charge there as the principal. Her list of achievement is quite a few which include establishing the 1st ever ITI institute at Nayagarh which is considered to be one of the best in the state now. She feels happy when she finds employability for all the trainees passed out from the institute.  <br><br>
The ITIs are now putting major thrust on improving the will power of the students and also provide opportunities for the holistic development of trainees.
She is very optimistic of her students who are going to compete in the regional or world level skill competitions and is sure that they will definitely come out as winners in them and make the brand ‘Skilled In Odisha’ fly high. ';

$strPaginglbl1 = 'Show All';
$strPaginglbl2 = 'Show Paging';
$strInstCountinfo1 = 'Total';
$strInstCountinfo2 = ' Govt. ITI available';

$strInstCountinfoPol = ' Govt. Polytechnic available';

$strInstCountinfo3 = ' Training Centres available';
$strInstCountinfo4 = 'Govt. ITI and ';
$strInstCountinfo5 = ' Govt. Polytechnic available';

$strSearinglbl = 'Searching..';
$strMapclickInfolbl = 'Click on the Map to view the corresponding institute details';

$strMystorylbl1 = 'Single View';
$strMystorylbl2 = 'List View';

$strImplinklbl1 = 'COURSES';
$strcourseslbl = 'Courses';
$strImplinklbl2 = 'TRAINING PARTNER';
$strImplinklbl3 = 'SCHEME AND GUIDELINE';
$strImplinklbl4 = 'GOVT. DEPARTMENTS AND AGENCIES';
$strFaxlbl = 'Fax';
$strEmpofcAddrslbl1 = 'Contact Us details for ';
$strEmpofcAddrslbl2 = 'District Employment Officer';
$strContactAddrslbl1 = '1<sup>st</sup>';
$strContactAddrslbl2 = 'Floor, Rajiv Bhavan, Unit-5, Bhubaneswar-751001, Odisha';

$strFacebooklbl = 'Facebook';
$strLinkedinlbl = 'Linkedin';
$strYoutubelbl = 'YouTube';

$strastilbl1 = 'Advance Skill Training Institute';
$strastilbl2 = 'Proposed';

$strCopyrightlbl1 = 'Copyright';
$strCopyrightlbl2 = 'Odisha Skill Development Authority. All Rights Reserved';

$strjune171 = '“Nano Unicorn Project’’ started. 13 skilled youths on a pilot basis were given week long training on how to start a business & also given 1lakh rupees to start their business';
$strjuly171 = 'The Skill Caravan covered all the 30 district of the state & inform all the stakeholders starting from govt officials to students & teachers about skilling.';
$strNonmatric = 'Non-Matric';
$strportraitmodemsg = 'The website does not support landscape mode as yet. Please rotate your phone back to portrait mode for best viewing.';


$strFocusOfficialLable = 'Mrs Jeetamitra Satapathy';
$strFocusOfficialLablefull = 'Mrs Jeetamitra Satapathy';
$strFocusOfficialDesigLable = 'Principal, ITI, Bhubnaeswar';
$strFocusOfficialNameLable = 'Mrs Jeetamitra Satapathy';
$strFocusEmployerLable = 'Shahi Exports';
$strFocusTrainingPartnerLable = 'Abbey West Services';
$strFocusITILable = 'ITI Bhubaneswar';
/* * ************Nano Unocorn***************** */
$strBusinessLable = 'What business are you planning to start ?';
$strNanounicornLable = 'Nano Unicorn';

$strNanoSnippet = 'Nano-Unicorn Project aims at encouraging entrepreneurship of the Skill trained youth by linking them to philanthropic capital . This programme aims at encouraging entrepreneurship among the skill trained youth and thereby creating employment at the grass roots level. In venture capital parlance when the valuation of any start up company exceeds 1 billion dollars they are called Unicorns. Examples Flip cart or Ola etc. We believe there are many skill trained youth who if linked to mentoring,  hand holding , support and capital they will emerge as nano unicorns.  The seed capital will be made available to  OSDA by philanthropic donors. We propose to support 100 such entrepreneurs during 2017-18, 1000 in the year 2018-19 and 3000 in the year 2019-20.';
$strProcess = 'Process';

$strProcesslbl1 = 'Pre-requisite';
$strProcessDesc1 = 'The person  must be  ITI trained or have completed a recognized short term skill training Program conducted by any Training Partner . The concerned institute must recommend the prospective entrepreneur.';

$strProcesslbl2 = 'Selection';
$strProcessDesc2 = 'The ITI or TP would select talents who have the best of business idea. They should also be prepared to mentor him/her during the execution phase. The business plan by the person must aim to create employment for at least 2-3 others within 2 years.';

$strProcesslbl3 = 'Training';
$strProcessDesc3 = 'Candidates will undergo one week residential training on Entrepreneurship Development and prepare their business plan during the training.';

$strProcesslbl4 = 'Funding';
$strProcessDesc4 = 'After training the candidates would be eligible for funding of Rs 1 lakh. No guarantee or collateral will be required. They have to sign an one page agreement. For the first year the entrepreneur will not be charged any interest on the Rs1.00 lakh. During the second year a nominal 5% interest will be charged. The amount should be repayable by the 3rd year.';

$strProcesslbl5 = 'Business Kick-Off';
$strProcessDesc5 = 'Post training the amount is transferred to the prospective entrepreneur’s bank account directly.  They utilizes the funds to kick-start the business. During the initial phase, a mentor would guide the entrepreneur. There would be quarterly review and course correction. This apart the site of each and every entrepreneur is visited by OSDA team. All entrepreneurs are encouraged to network with the other Nano unicorns . As the business stabilises and expands,  the shy unsure youngsters evolve into confident entrepreneurs.';


$strProcesslbl6 = 'Aim of Nano Unicorn';
$strProcessDesc6 = 'The aim of nano unicorn project is to assist this transformation and help each entrepreneur to realise their dreams.';

$strProcesslbl7 = 'Knowledge Hub';
$strProcessDesc7 = 'The knowledge hub will be the crux of the project. It will be the repository of the story of each of the entrepreneurs , their stories, their journey and case studies. The quarterly meeting of the Nano entrepreneurs will help enrich the knowledge hub.';

$strProcesslbl8 = 'The experience so far ';
$strProcessDesc8 = 'The project was initiated by OSDA in July 2017 and by the end of December 2017 , support is extended to 57 entrepreneurs . Almost all of them have come from economically disadvantaged families and have shown tremendous amount of grit and determination.  Their shared vision is to be successful entrepreneurs and improve the lot of their family.  Most of them are ready to mentor the upcoming new entrepreneurs and make their family proud.';

$strRegisterHerelbl = 'Register Here';
$strInterpreshiplbl1 = 'Enterpreneurship ';
$strInterpreshiplbl2 = 'Programme ';

$strApplylbl = 'Apply';
$strKnowmorelbl = 'Know More';


$strHomeDesc1 = 'Nano-Unicorn Project aims at encouraging entrepreneurship of the Skill trained youth by linking them to philanthropic capital. This programme aims at encouraging entrepreneurship among the skilled youth. ';
$strHomeDesc2 = 'Nano Unicorn is a pilot programme by OSDA where skilled youths having exceptional entrepreneurship ideas are provided with a philanthropic capital to start their business.';
$strHomeDesc3 = 'The seed capital will be made available to OSDA by philanthropic donors. We propose to support 100 such entrepreneurs during 2017-18, 1000 in the year 2018-19 and 3000 in the year 2019-20.';

$strRegisterForlbl = 'Register for Nano Unicorn';
$strRegisterlbl = 'Register';


$strSelectlbl = 'Select';
$strSkillComplbl = 'Register for India Skills Competition - Odisha 2020';
$strSkillInfoPath = SITE_URL . 'images/competition_info_eng.pdf';

$strStudyMateriallbl = 'Study Material';
$strdownloadstudymateriallbl = 'Download Study Material';
$strAuthorLabel = 'Author';
$strViewMore = 'View more';
$strPhilosphylvl = 'Philosophy';
$enquiryLevel = 'Enquire Now';
$readNewslbl  = 'Read News';

$nanoUnicornContent ='<div class="col-12 mt-sm-3">
						<p class="text-justify">In March this year, 57 Nano Unicorns from Odisha created news as they promised thriving start-ups and small enterprises to boost the country’s economy. The Nano-Unicorn Project is a unique initiative under the ‘Skilled-in-Odisha’ banner that handpicks entrepreneurial talent in the state. It aims to encourage skilled youth to take up entrepreneurship by linking them to philanthropic capital. The resultant small indigenous enterprises not only strengthen the economy but also generate employment at the grass roots. </p>
						<ul class="list-type-arrow mt-4">
							<li>The nano-unicorns begin their journey with a capital of Rs 1 lakh. In venture capital parlance when the valuation of the start-up exceeds $ 1 billion, the nano-unicorn becomes a Unicorn. Examples of such start-ups are Flipkart, Ola etc. </li>
							<li>We provide short entrepreneurship training to the nano-unicorns. After the receiving the mentoring, the support and initial capital, they become confident enough to plunge into the path of self-employment. </li>
							<li>The seed capital is made available to OSDA through philanthropic donors. We propose to support 100 such entrepreneurs during 2017-18, 1000 in the year 2018-19 and 3000 in the year 2019-20.</li>
						</ul>
					</div>';
$nanoUnicornContent.='c';

//scheme page
$schemes1name='DDU-GKY';
$schemes1fullname='Deen Dayal Upadhyaya Grameen Kaushalya Yojana';
$schemes1des='Deen Dayal Upadhyaya Grameen Kaushalya Yojana (DDU-GKY) is the skilling and placement initiative of the Ministry of Rural Development (MoRD), Government of India. The scheme       focuses on catering to the occupational aspirations of rural youth and enhancing their skills for wage employment.
				Till Oct, 2018 , DDUGKY has trained around 83,745 candidates  under 329 trades and out of them 46,654 students are employed in various sectors. The scheme is being run by 711 Programme Implementation Agency(PIA) across India.';

$schemes2name='PLTP';
$schemes2fullname='Placement Linked Training Programme';
$schemes2des='Placement Linked Training programme (PLTP) are schemes  that address the complex problem of youth unemployment through a placement-linked skill development programmes.  An enrolled candidate is assured full support throughout the program and post completion, is connected with the appropriate industry for job placements. Potential employers and business mentors and volunteers are brought in to support quality training. Under OSDA , there are 39 PLTP is in progress.';

$schemes3name='PMKVY';
$two='2.0';
$schemes3fullname='Pradhan Mantri Kaushal Vikash Yojana';
$schemes3des='Pradhan Mantri Kaushal Vikas Yojana (PMKVY) is the flagship scheme of the Ministry of Skill Development & Entrepreneurship (MSDE),Government of India. The objective of this skill certification scheme is to enable a large number of Indian youth to take up industry-relevant skill training that will help them in securing a better livelihood. Individuals with prior learning experience or skills will also be assessed and certified under Recognition of Prior Learning (RPL).';

$schemes4name='PMKK';
$schemes4fullname='Pradhan Mantri Kaushal Kendra';
$schemes4des='Pradhan Mantri Kaushal Kendra (PMKK) is a state-of-the-art model training centres set up by National Skill Developemnt Council (NSDC) to upgrade vocational training. These centres would create benchmark institutions that demonstrate aspirational value for competency-based skill development training, focus on elements of quality, sustainability and connection with stakeholders in skills delivery process and also to establish sustainable institutional model.';
	
	//Skill Musium page start
	
$skilledVideo ='Click to watch the video';	
$skilled1='Skill Museum';	
$skilled2='Museums engage and educate the community and have interesting histories to inspire and educate visitors. Mankind’s journey in terms of skill is a long one and there is need to preserve it. The Skill Museum – a brainchild of the Skilled-in-Odisha Mission – is the first-of-its-kind initiative in India. The Museum is curated with equipment, machines and artefacts collected since 1906.';//'Museums engage and educate the community and have interesting histories to inspire and educate visitors. Mankind’s journey in terms of skill is a long one and there is need to preserve it. The Skill Museum – a brainchild of the Skilled-in-Odisha mission – is the first-of-its-kind initiative in India. The museum contains various antique items including old equipment’s, machines and innovative project designs by students which have been collected since 1906.';
$skilled3='The State’s first Skill Museum is set up on the premises of Government Industrial Training Institute (ITI), Cuttack in an area of 2600 sq ft. and houses several skill-based equipment and machineries, a world-class exhibition area and an auditorium. In short the skill museum is built on an amalgamation of traditional and modern skill sets. The innovative museum has been created to inspire youths and encourage them to think design before they think skills.';//The State’s first Skill Museum is set up on the premises of Government Industrial Training Institute (ITI), Cuttack in an area of 2600 sq ft. and houses several skill-based equipment and machineries, a world-class exhibition area and an auditorium. In short the skill museum is built on an amalgamation of traditional and modern skill sets. The innovative museum has been created to inspire youths and inculcate thinking in them to foresee future technological needs and develop skills to meet the demand.';
		

$skilled4='The skill museum was designed by renowned architect Suvendu Ray and dedicated to the nation by Hon’ble Chief Minister Naveen Patnaik on 4th August, 2018.';//The skill museum is meticulously constructed keeping a balance between aesthetics and world-class facilities. Different varieties of skill bases machineries, innovations, sculptures and equipment have been displayed in the museum. The museum also houses many structures and utility products prepared with waste that encourages people to think out of the box, mostly inculcate "design thinking" in the minds of the youth to enable them to foresee the technological needs of the future.';		
$skilled5='The Museum is open for public daily from <strong>10AM - 5PM</strong>';	
//$closed='Close only on <a href="https://www.scribd.com/document/434029692/Odisha-Govt-Holiday-List-2020-PDF" target="blank">Government Holidays</a></strong>';
$closed='Close only on <strong>Government Holidays</strong>';

$skillphone='Contact No :- <strong>9776797767</strong>';
$skillemail='Email ID :- <strong>sudhasmita@gmail.com</strong>';

$skilled6='How to Reach';

$filterDistLevel='Filter by Districts';
$strAvailCourse='Available Course';
$strInstituteProfile='Institute Profile';
$skilledbanner1='India\'s first skill museum at ITI Cuttack, Odisha';
$strPopularPage='Most Popular Pages';
$strSearchInput='Enter Keyword';
$strLastUpdate='Last Updated On';
$strWordSearchFor='Sorry, Your search for -';
$strWordSearchFor2='did not match with any Keywords.Please try again with some different keywords.';
$coronaSkillMsg  = "Click here to register for ODISHA SKILLS 2021!!";
$skillResult  = '"Results declared for Odisha skills phase 1 held on 8th Feb 2020." Click here to view the result.';
$registrationMsg  = '"Click here to register for Odisha Skill Competition 2021"';
$coronaTenderMsg  = "RFP for selection of agency towards Post Placement Verification";
$coringenTenderMsg = "Click here to register to join for the Bid Opening Meeting of EOI for Empanelment of Training Partners under PMKVY CSSM 3.0 program";
$IFBTenderMsg = "Invitation of Bids for Odisha Skill Development Project under ICB, NCB and Shopping";
$IFBRFPMsg = "Corrigendum cum Minutes of Pre Bid Meeting for ICB and NCB Packages under OSDP (Last date extended till 30th June 2021)";
$coronaRoadMapMsg1= "RFP for Selection of an Agency for Development of Vision 2030 and Strategic Roadmap for Skill Development in Odisha";


$urgentMsg       ='Notice for holding Pre-bid Meeting virtually for the RFP for Vision 2030 exercise.';

$extAuditor   = "RFP for engagement of External Auditor for OSDA";

$bannerTitle = "Stay Home, Stay Safe from Corona.";

$skillDeveloment = "Click here to register for coursera platform access.";

$sapErp = "Register for Online Test for qualifying to take SAP ERP course for students who have applied for the SAP ERP Program";


//scheme page end

if ($_SESSION['lang'] == 'O') {
    $strLangCls = 'odia';
    $strNumLangCls = 'odianum';
    $exmination     = '&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878; &#2872;&#2862;&#2893;&#2860;&#2856;&#2893;&#2855;&#2879;&#2852; &#2852;&#2853;&#2893;&#2911; &#2838;&#2881;&#2860;&#2870;&#2880;&#2840;&#2893;&#2864; &#2854;&#2893;&#2869;&#2879;&#2852;&#2880;&#2911; &#2858;&#2864;&#2893;&#2863;&#2893;&#2863;&#2878;&#2911;&#2864;&#2887; &#2858;&#2893;&#2864;&#2837;&#2878;&#2870; &#2858;&#2878;&#2823;&#2860;';
    $examList = '&#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2852;&#2878;&#2866;&#2879;&#2837;&#2878; &#2918;&#2926; &#2859;&#2887;&#2860;&#2883;&#2822;&#2864;&#2880; &#2920;&#2918;&#2920;&#2918; &#2858;&#2878;&#2823;&#2817;';
    $strlogotitlelbl = '&#2835;&#2908;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;';
    $strgovtofdishalbl = '&#2835;&#2908;&#2879;&#2870;&#2878; &#2872;&#2864;&#2837;&#2878;&#2864;';
    $strhomelbl = '&#2862;&#2881;&#2838;&#2893;&#2911; &#2858;&#2883;&#2871;&#2893;&#2848;&#2878;';
    $strSharelbl = '&#2870;&#2887;&#2911;&#2878;&#2864; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
    $strBylbl = '&#2854;&#2893;&#2860;&#2878;&#2864;&#2878;';
    $strReadMorelbl = '&#2821;&#2855;&#2879;&#2837; &#2858;&#2850;&#2856;&#2893;&#2852;&#2881;';
    $strSearchByCatlbl = '&#2838;&#2891;&#2844;&#2879;&#2860;&#2878;  &#2870;&#2893;&#2864;&#2887;&#2851;&#2880;&#2911;';
    $strSubmitlbl = '&#2856;&#2879;&#2860;&#2887;&#2854;&#2856;';
    $strTypelbl = '&#2858;&#2893;&#2864;&#2837;&#2878;&#2864;';
    $strYearlbl = '&#2860;&#2864;&#2893;&#2871;';
    $strMonthlbl = '&#2862;&#2878;&#2872;';
    $strMonthInlbl = '&#2862;&#2878;&#2872;&#2864;&#2887;';
    $strHourlbl = '&#2840;&#2851;&#2893;&#2847;&#2878;';
    $strSearchlbl = '&#2838;&#2891;&#2844;&#2879;&#2860;&#2878;';
    $strDistrictlbl = '&#2844;&#2879;&#2866;&#2893;&#2866;&#2878;';
    $strSerchCourselbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;  &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880; &#2838;&#2891;&#2844;&#2879;&#2860;&#2878;';
    $strAddresslbl = '&#2848;&#2879;&#2837;&#2851;&#2878;';
    $strProfileDeatilslbl = '&#2858;&#2893;&#2864;&#2891;&#2859;&#2878;&#2823;&#2866; &#2860;&#2879;&#2860;&#2864;&#2851;&#2880;';
    $strInstTypelbl = '&#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864;';
    $strLocationlbl = '&#2872;&#2893;&#2853;&#2878;&#2856;';
    $strAboutlbl = '&#2822;&#2862; &#2872;&#2818;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887;';
    $strKnwMorelbl = '&#2821;&#2855;&#2879;&#2837; &#2844;&#2878;&#2851;&#2856;&#2893;&#2852;&#2881;';
    $strYearEstlbl = '&#2837;&#2887;&#2860;&#2887; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878; &#2873;&#2887;&#2866;&#2878;';
    $strPrinciNamelbl = '&#2821;&#2855;&#2893;&#2911;&#2837;&#2893;&#2871;';
    $strAllMedia    = '&#2872;&#2860;&#2881; &#2862;&#2879;&#2849;&#2879;&#2822;';
    $strCareer             = '&#2837;&#2893;&#2911;&#2878;&#2864;&#2879;&#2911;&#2864;';
	
	$strContactInfolbl = '&#2863;&#2891;&#2839;&#2878;&#2863;&#2891;&#2839; &#2848;&#2879;&#2837;&#2851;&#2878;';
    $strContactDetaillbl = '&#2822;&#2862;&#2887; &#2822;&#2858;&#2851;&#2841;&#2893;&#2837;&#2881; &#2872;&#2878;&#2873;&#2878;&#2863;&#2893;&#2911; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2821;&#2858;&#2887;&#2837;&#2893;&#2871;&#2878;&#2864;&#2852;';
    $strPhonelbl = '&#2859;&#2891;&#2856;&#2893;';
    $strEmaillbl = '&#2823;&#2862;&#2887;&#2866;&#2893;';
    $strCallus = '&#2822;&#2862;&#2837;&#2881; &#2859;&#2891;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
    $strSendMessage = '&#2862;&#2887;&#2872;&#2887;&#2844; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
	$strOurLocation = '&#2822;&#2862; &#2848;&#2879;&#2837;&#2851;&#2878;';
	
    $strWebsitelbl = '&#2929;&#2887;&#2860;&#2872;&#2878;&#2823;&#2847;';
    $strCourseDetailslbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;   &#2860;&#2879;&#2860;&#2864;&#2851;&#2880;';
    $strCourseNamelbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2856;&#2878;&#2862;';
    $strDurationMonthlbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2821;&#2860;&#2855;&#2879;';
    $strBatchlbl = '&#2860;&#2893;&#2911;&#2878;&#2842;';
    $strSeatCntlbl = '&#2872;&#2893;&#2853;&#2878;&#2856; &#2872;&#2818;&#2838;&#2893;&#2911;&#2878;';
    $strEligibilitylbl = '&#2863;&#2891;&#2839;&#2893;&#2911;&#2852;&#2878;';
    $strDetailslbl = '&#2872;&#2862;&#2872;&#2893;&#2852; &#2852;&#2853;&#2893;&#2911;';
    $strShareStorylbl = '&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880; &#2837;&#2881;&#2873;&#2856;&#2893;&#2852;&#2881;';
    $strCourselbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
    $strSectorlbl = '&#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;';
    $strCandEligibilitylbl = '&#2858;&#2893;&#2864;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837;&#2864; &#2863;&#2891;&#2839;&#2893;&#2911;&#2852;&#2878;';
    $strCourseDurationlbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2821;&#2860;&#2855;&#2879;';
    $strDurationlbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2821;&#2860;&#2855;&#2879;';
    $strMonthlbl = '&#2862;&#2878;&#2872;';
    $strInstitutelbl = '&#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;';
    $strInstitute1lbl = '&#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;';

    $strPolitechnic  = '&#2858;&#2866;&#2879;&#2847;&#2887;&#2837;&#2893;&#2856;&#2879;&#2837;&#2893;';
    $strITI          = '&#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;';


    $strNoRecordlbl = '&#2837;&#2892;&#2851;&#2872;&#2879; &#2852;&#2853;&#2893;&#2911; &#2825;&#2858;&#2866;&#2860;&#2893;&#2855; &#2856;&#2878;&#2873;&#2879;&#2817;';
    $strBelow10lbl = '&#2919;&#2918;&#2862; &#2852;&#2867;&#2837;&#2881;';
    $str10thlbl = '&#2862;';
    $str10lbl = '&#2919;&#2918;';
    $str12thlbl = '&#2854;&#2893;&#2860;&#2878;&#2854;&#2870;&#47;&#49;&#50;';
    $strGraduatelbl = '&#2872;&#2893;&#2856;&#2878;&#2852;&#2837;';
    $strPostGradlbl = '&#2872;&#2893;&#2856;&#2878;&#2852;&#2837;&#2891;&#2852;&#2893;&#2852;&#2864;';
    $strMoreStorylbl = '&#2821;&#2855;&#2879;&#2837; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880;';
    $strPlacelbl = '&#2872;&#2893;&#2853;&#2878;&#2856;';
    $strDesignationlbl = '&#2858;&#2854;&#2860;&#2880;';
    $strITINamelbl = '&#2822;&#2823; &#2847;&#2879; &#2822;&#2823;  &#2856;&#2878;&#2862;';
    $strEmployerlbl = ' &#2856;&#2879;&#2911;&#2891;&#2844;&#2837;';

    $strNamelbl = '&#2856;&#2878;&#2862;';
    $strEmailAddresslbl = '&#2823;&#2862;&#2887;&#2866;&#2893;';
    $strMobileNolbl = '&#2862;&#2891;&#2860;&#2878;&#2823;&#2866;&#2893; &#2856;&#2862;&#2893;&#2860;&#2864;';
    $strAttachmentlbl = '&#2821;&#2847;&#2878;&#2842;&#2862;&#2887;&#2851;&#2893;&#2847;';

    $strPdfMsglbl = '&#2858;&#2879;&#2849;&#2879;&#2831;&#2859;&#44; &#2849;&#2879;&#2835;&#2872;&#2879;&#44; &#2858;&#2879;&#2858;&#2879;&#2847;&#2879;&#44;&#2844;&#2879;&#2858;&#44; &#2859;&#2878;&#2823;&#2866;&#44; &#2831;&#2860;&#2818; &#2862;&#2893;&#2911;&#2878;&#2837;&#2893;&#2872; &#2872;&#2878;&#2823;&#2844; &#2923; &#2831;&#2862;&#2893;&#2860;&#2879;';
    $strMsglbl = '&#2860;&#2878;&#2864;&#2893;&#2852;&#2893;&#2852;&#2878;';
    $strfeedbacklbl = '&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2862;&#2852;&#2878;&#2862;&#2852;';
    $strMaxCharlbl = '&#2872;&#2864;&#2893;&#2860;&#2878;&#2855;&#2879;&#2837;';
    $str1000lbl = 1000;
    $strCharlbl = ' &#2821;&#2837;&#2893;&#2871;&#2864;';
    // $strRecaptchalbl       =  'Click on reCAPTCHA box';
    $strRecaptchalbl = '&#2837;&#2878;&#2858;&#2853;&#2878; &#2837;&#2891;&#2864;&#2893;&#2849; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $strClickNowlbl = ' &#2837;&#2893;&#2866;&#2879;&#2837;&#2893; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
    $strTrainPartnerslbl = '&#2852;&#2878;&#2866;&#2879;&#2862;&#2864;&#2887; &#2821;&#2818;&#2870;&#2879;&#2854;&#2878;&#2864;';
    $strTrainCenterlbl = '&#2852;&#2878;&#2866;&#2879;&#2862; <br/> &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864;';
    $strPeopleTrainlbl = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2860;&#2893;&#2911;&#2837;&#2893;&#2852;&#2879';
    $strPeoplePlacedlbl = '&#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2860;&#2893;&#2911;&#2837;&#2893;&#2852;&#2879;';
    $strFindTrainCenterlbl = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2860;&#2878;&#2843;';
    $strMax500Charlbl = 500;
    $strCareerlbl = '&#2837;&#2893;&#2911;&#2878;&#2864;&#2879;&#2821;&#2864;&#40;&#2860;&#2883;&#2852;&#2893;&#2852;&#2879;&#41;';
    $strGuidelbl = '&#2858;&#2878;&#2823;&#2817; &#2862;&#2878;&#2864;&#2893;&#2839;&#2854;&#2864;&#2893;&#2870;&#2879;&#2837;&#2878;';
    $strCareerGuideYlbl = '&#2837;&#2892;&#2870;&#2867; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878; &#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2837;&#2893;&#2911;&#2878;&#2864;&#2879;&#2821;&#2864;&#2837;&#2881; &#2854;&#2887;&#2860; &#2856;&#2882;&#2822; &#2854;&#2879;&#2839;';
    $strCareerGuidelbl = '&#2858;&#2864;&#2872;&#2893;&#2858;&#2864; &#2872;&#2873;&#2879;&#2852; &#2872;&#2862;&#2856;&#2893;&#2860;&#2911; &#2864;&#2838;&#2879;&#2858;&#2878;&#2864;&#2881;&#2853;&#2879;&#2860;&#2878;&#44; &#2831;&#2873;&#2878; &#2831;&#2837; &#2863;&#2891;&#2844;&#2856;&#2878;&#44; &#2863;&#2878;&#2873;&#2878;&#2837;&#2879; &#2872;&#2862;&#2872;&#2893;&#2852; &#2872;&#2818;&#2861;&#2878;&#2860;&#2893;&#2911; &#2858;&#2853;&#2837;&#2881; &#2858;&#2893;&#2864;&#2854;&#2864;&#2893;&#2870;&#2856; &#2837;&#2864;&#2879;&#2858;&#2878;&#2864;&#2879;&#2860;&#2404;';
    $strLoremIpsumlbl = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
    $strTeachforOdishalbl = '&#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2879;&#2860;&#2878;&#2864;&#2887; &#2835;&#2849;&#2879;&#2870;&#2878;';
    $strTeachOdishaParalbl = '&#2822;&#2862; &#2863;&#2881;&#2860; &#2860;&#2864;&#2893;&#2839;&#2841;&#2893;&#2837;&#2881;  &#2860;&#2879;&#2870;&#2893;&#2860;&#2872;&#2893;&#2852;&#2864;&#2880;&#2911; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2887;&#2860;&#2878;&#2858;&#2878;&#2823;&#2817; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2821;&#2861;&#2879;&#2863;&#2878;&#2856;&#2864; &#2856;&#2887;&#2852;&#2883;&#2852;&#2893;&#2860; &#2856;&#2879;&#2821;&#2856;&#2893;&#2852;&#2881;&#2404; &#2870;&#2879;&#2837;&#2893;&#2871;&#2837; &#2873;&#2881;&#2821;&#2856;&#2893;&#2852;&#2881;&#44; &#2839;&#2881;&#2864;&#2881;  &#2837;&#2879;&#2862;&#2893;&#2860;&#2878; &#2858;&#2853; &#2858;&#2893;&#2864;&#2854;&#2864;&#2893;&#2870;&#2837; &#2873;&#2881;&#2821;&#2856;&#2893;&#2852;&#2881; &#2404; &#2822;&#2872;&#2856;&#2893;&#2852;&#2881; &#2862;&#2879;&#2867;&#2879;&#2862;&#2879;&#2870;&#2879; &#2835;&#2849;&#2879;&#2870;&#2878;&#2864; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878;&#2837;&#2881;  &#2860;&#2879;&#2870;&#2893;&#2860;&#2864; &#2870;&#2893;&#2864;&#2887;&#2871;&#2893;&#2848; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878;&#2864;&#2887; &#2858;&#2893;&#2864;&#2852;&#2879;&#2858;&#2878;&#2854;&#2856; &#2837;&#2864;&#2879;&#2860;&#2878; &#2831;&#2873;&#2878; &#2873;&#2879;&#2817;&#2817; &#2822;&#2862;&#2864; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911;&#2404;';
    $strBecomeMember = '&#2863;&#2891;&#2839; &#2854;&#2879;&#2821;&#2856;&#2893;&#2852;&#2881;';
    $strInlbl = '';
    $strFocuslbl = '&#2859;&#2891;&#2837;&#2872;&#2864;&#2887;';
    $strSubmitQuerylbl = '&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2858;&#2893;&#2864;&#2870;&#2893;&#2856; &#2858;&#2848;&#2878;&#2856;&#2893;&#2852;&#2881;';
    $strShareOnlbl = '&#2821;&#2818;&#2870; &#2839;&#2893;&#2864;&#2873;&#2851; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
    $strTwiterlbl = '&#2847;&#2893;&#2860;&#2879;&#2847;&#2864;';
    $strTwitterBylbl = '&#2872;&#2893;&#2837;&#2879;&#2866;&#2849;&#2893; &#2823;&#2851;&#2893;&#2849;&#2879;&#2822; &#2854;&#2893;&#2860;&#2878;&#2864;&#2878; &#2847;&#2881;&#2823;&#2847;&#2893;&#2872;';
    $strSkillingOdishalbl = '&#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862;&#2864;&#2887; &#2835;&#2849;&#2879;&#2870;&#2878;';

    $strSubmitQueryP1lbl = '&#2822;&#2858;&#2851; &#2844;&#2878;&#2851;&#2879;&#2860;&#2878;&#2837;&#2881; &#2842;&#2878;&#2873;&#2881;&#2817;&#2853;&#2879;&#2860;&#2878; ';
    $strSubmitQueryp2lbl = '&#2863;&#2854;&#2879; &#2837;&#2892;&#2851;&#2872;&#2879; &#2825;&#2852;&#2893;&#2852;&#2864; &#2856;&#2858;&#2878;&#2856;&#2893;&#2852;&#2879;&#44; &#2852;&#2887;&#2860;&#2887; &#2822;&#2862; &#2858;&#2878;&#2838;&#2837;&#2881; &#2872;&#2879;&#2855;&#2878;&#2872;&#2867;&#2838; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;&#2404;';

    $strFaqlbl = '&#2858;&#2893;&#2864;&#2870;&#2893;&#2856;&#2864;';
    $strMaplbl = '';
    $strShareStoryParalbl = '&#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2872;&#2870;&#2837;&#2893;&#2852; &#2837;&#2864;&#2878;&#2831;&#2404; &#2844;&#2880;&#2860;&#2856;&#2864; &#2855;&#2878;&#2864;&#2878;&#2837;&#2881; &#2860;&#2854;&#2867;&#2878;&#2823; &#2854;&#2887;&#2823;&#2853;&#2878;&#2831;&#44; &#2822;&#2839;&#2837;&#2881; &#2860;&#2850;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2887;&#2864;&#2851;&#2878; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2887;&#2404; &#2822;&#2862;&#2887; &#2831;&#2873;&#2879;&#2861;&#2867;&#2879; &#2837;&#2853;&#2878; &#2821;&#2856;&#2887;&#2837; &#2872;&#2862;&#2911;&#2864;&#2887; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2872;&#2893;&#2853;&#2878;&#2856;&#2864;&#2881; &#2870;&#2881;&#2851;&#2879;&#2853;&#2878;&#2825; &#2837;&#2879;&#2856;&#2893;&#2852;&#2881; &#2822;&#2862;&#2887; &#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2848;&#2878;&#2864;&#2881; &#2870;&#2881;&#2851;&#2879;&#2860;&#2878;&#2837;&#2881; &#2842;&#2878;&#2873;&#2881;&#2817;&#2404; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2849; &#2823;&#2856;&#2893; &#2835;&#2849;&#2879;&#2870;&#2878;&#2864; &#2822;&#2858;&#2851; &#2873;&#2887;&#2825;&#2843;&#2856;&#2893;&#2852;&#2879; &#2844;&#2893;&#2860;&#2867;&#2856;&#2893;&#2852; &#2825;&#2854;&#2878;&#2873;&#2864;&#2851;&#2404; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2883;&#2854;&#2893;&#2855;&#2879; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2864;&#2887; &#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2821;&#2856;&#2881;&#2861;&#2860; &#2860;&#2879;&#2871;&#2911;&#2864;&#2887; &#2822;&#2862;&#2837;&#2881; &#2837;&#2881;&#2873;&#2856;&#2893;&#2852;&#2881;&#2404; &#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2858;&#2872;&#2856;&#2893;&#2854;&#44; &#2872;&#2881;&#2863;&#2891;&#2839;&#44; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911; &#2831;&#2860;&#2818; &#2872;&#2859;&#2867;&#2852;&#2878;&#2864; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880; &#2821;&#2856;&#2893;&#2911;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2862;&#2856;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2856;&#2887;&#2823; &#2825;&#2852;&#2893;&#2872;&#2878;&#2873; &#2835; &#2825;&#2854;&#2893;&#2854;&#2879;&#2858;&#2856;&#2878; &#2861;&#2864;&#2879; &#2854;&#2887;&#2823;&#2858;&#2878;&#2864;&#2887;&#2404; &#2822;&#2839;&#2887;&#2823; &#2822;&#2872;&#2856;&#2893;&#2852;&#2881; &#2835; &#2821;&#2856;&#2893;&#2911;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2862;&#2856;&#2864;&#2887; &#2858;&#2893;&#2864;&#2887;&#2864;&#2851;&#2878; &#2861;&#2864;&#2879; &#2854;&#2879;&#2821;&#2856;&#2893;&#2852;&#2881;&#2404; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2862;&#2878;&#2855;&#2893;&#2911;&#2862;&#2864;&#2887; &#2872;&#2870;&#2837;&#2893;&#2852; &#2835;&#2849;&#2879;&#2870;&#2878; &#2839;&#2848;&#2856; &#2837;&#2864;&#2879;&#2860;&#2878;&#2864;&#2887; &#2822;&#2858;&#2851; &#2873;&#2881;&#2821;&#2856;&#2893;&#2852;&#2881; &#2872;&#2878;&#2864;&#2853;&#2880;&#2404;';
    $strPridelbl = '&#2822;&#2862;&#2864; &#2839;&#2864;&#2893;&#2860;';
    $strRecruiterlbl = '&#79;&#2825;&#2864;&#2893; &#2908;&#2887;&#99;&#2864;&#2881;&#2823;&#2847;&#2887;&#2864;&#2893;&#2872;&#2893;';
    $strFeaturedITIlbl = '&#2822;&#2823;&#2847;&#2879;&#2822;&#2823;';
    $strITIBerhampurlbl = '&#2860;&#2893;&#2864;&#2873;&#2893;&#2862;&#2858;&#2881;&#2864; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;';
    $strITIBBSRlbl = '&#2822;&#2823; &#2847;&#2879; &#2823;&#44;&#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864;';
    $strFeaturedPIAlbl = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;';
    $strGlobalTrainlbl = ' &#2822;&#2823;&#2831;&#2866; &#2831;&#2860;&#2818; &#2831;&#2859;&#2831;&#2872;&#40;IL&FS&#41; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2872; &#2835;&#2908;&#2879;&#2870;&#2878;';
    $strFeaturedEmploylbl = '&#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879;&#2854;&#2878;&#2852;&#2878;';

    $strBalajiIndustrylbl = '&#2861;&#2879; &#2844;&#2879; &#2872;&#2879;&#2854;&#2893;&#2855;&#2878;&#2864;&#2893;&#2853;';

    //$strBalajiIndustrylbl  =  'ଭି ଜି ସିଦ୍ଧାର୍ଥ‌';

    $strFeaturedGovtlbl = '&#2854;&#2837;&#2893;&#2871; &#2821;&#2855;&#2879;&#2837;&#2878;&#2864;&#2880;';
    $strbnDaslbl = '&#2870;&#2893;&#2864;&#2880; &#2860;&#2879;&#2831;&#2856; &#2854;&#2878;&#2872;';
    $strLoadMorelbl = '&#2821;&#2855;&#2879;&#2837; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $strSuccessStorylbl = '&#2872;&#2859;&#2867;&#2852;&#2878;&#2864; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880;';
    $strViewDetailslbl = '&#2872;&#2860;&#2881; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $strWant2Teachlbl = '&#2862;&#2881;&#2817; &#2858;&#2850;&#2887;&#2823;&#2860;&#2878;&#2837;&#2881; &#2842;&#2878;&#2873;&#2887;&#2817;';
    $strWhylbl = '&#2837;&#2878;&#2873;&#2879;&#2817;&#2837;&#2879;';
    $strSelSectorlbl = ' &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2860;&#2878;&#2843;';
    $strSelCourselbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2860;&#2878;&#2843;';
    $strnocatVidlbl = '&#2861;&#2879;&#2849;&#2879;&#2835;&#2864;&#2887;  &#2856;&#2853;&#2879;&#2860;&#2878; &#2870;&#2893;&#2864;&#2887;&#2851;&#2880;';


    $strAboutroadmaplbl1 = '&#2862;&#2878;&#2872;&#2864; &#2856;&#2837;&#2893;&#2872;&#2878; &#40;&#2863;&#2891;&#2844;&#2856;&#2878;&#41;';
    $strAboutroadmaplbl2 = '';
    $strAboutroadmaplbl3 = '&#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2849;&#45;&#2823;&#2856;&#2893;&#45;&#2835;&#2849;&#2879;&#2870;&#2878;   ';

    $strSkilledResourcelbl = '&#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2872;&#2862;&#2893;&#2860;&#2867;';
    $strTrainCentersmllbl = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864;';
    $strEnrolledCanlbl = '&#2856;&#2878;&#2862; &#2852;&#2878;&#2866;&#2879;&#2837;&#2878; &#2861;&#2881;&#2837;&#2893;&#2852;&#2858;&#2878; &#2864;&#2893;&#2853;&#2879;';
    $strTrainPartsmllbl = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;';


    $strAllDistlbl = '&#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2860;&#2878;&#2843;&#2856;&#2893;&#2852;&#2881;';    //    ' &#2872;&#2860;&#2881; &#2844;&#2879;&#2866;&#2893;&#2866;&#2878;';

    $strNewUpdateslbl = '&#2838;&#2860;&#2864;&#2864;&#2887;';
    $strBloglbl = '&#2860;&#2893;&#2867;&#2839;';
    $strPhotolbl = '&#2859;&#2847;&#2891;';
    $strPhotogallerydtllbl = '&#2859;&#2847;&#2891; &#2839;&#2893;&#2911;&#2878;&#2866;&#2887;&#2864;&#2880; &#2852;&#2853;&#2893;&#2911;';
    $strVideolbl = '&#2861;&#2879;&#2849;&#2879;&#2835;';
    $strVideogallerydtllbl = '&#2861;&#2879;&#2849;&#2879;&#2835; &#2839;&#2893;&#2911;&#2878;&#2866;&#2887;&#2864;&#2880; &#2852;&#2853;&#2893;&#2911;';
    $strAlllbl = '&#2872;&#2860;&#2881;';
    $lblArticle = '&#2822;&#2864;&#2893;&#2847;&#2879;&#2837;&#2879;&#2866;';
    $lblBiswa   = '&#2860;&#2879;&#2870;&#2893;&#2869; &#2860;&#2879;&#2844;&#2911;&#2880;';
    $strProfilelbl = '&#2858;&#2893;&#2864;&#2891;&#2859;&#2878;&#2823;&#2866; &#2860;&#2879;&#2860;&#2864;&#2851;&#2880;';


    $strMJan = "&#2844;&#2878;&#2856;&#2881;&#2911;&#2878;&#2864;&#2880;";
    $strMFeb = "&#2859;&#2887;&#2860;&#2883;&#2911;&#2878;&#2864;&#2880;";
    $strMMar = "&#2862;&#2878;&#2864;&#2893;&#2842;&#2893;&#2842;";
    $strMApr = "&#2821;&#2858;&#2893;&#2864;&#2887;&#2866;";
    $strMMay = "&#2862;&#2823;";
    $strMJun = "&#2844;&#2881;&#2856;&#2893;";
    $strMJul = "&#2844;&#2881;&#2866;&#2878;&#2823;";
    $strMAug = "&#2821;&#2839;&#2871;&#2893;&#2847;";
    $strMSep = "&#2872;&#2887;&#2858;&#2893;&#2847;&#2887;&#2862;&#2893;&#2860;&#2864;";
    $strMOct = "&#2821;&#2837;&#2893;&#2847;&#2891;&#2860;&#2864;";
    $strMNov = "&#2856;&#2861;&#2887;&#2862;&#2893;&#2860;&#2864;";
    $strMDec = "&#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864;";
    $str2016 = "&#2920;&#2918;&#2919;&#2924;";
    $str2017 = "&#2920;&#2918;&#2919;&#2925; ";

    $strTestimoniallable = '&#2837;&#8217;&#2851; &#2837;&#2881;&#2873;&#2856;&#2893;&#2852;&#2879; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879;&#2854;&#2878;&#2852;&#2878;';

    $queryFormNamelvl = "&#2856;&#2878;&#2862;";
    $queryFormEmaillvl = "&#2848;&#2879;&#2837;&#2851;&#2878;";
    $queryFormMobilelvl = "&#2862;&#2891;&#2860;&#2878;&#2823;&#2866; &#2856;&#2862;&#2893;&#2860;&#2864;";
    $queryTypeLvl = "&#2822;&#2858;&#2851; &#2844;&#2878;&#2851;&#2879;&#2860;&#2878;&#2837;&#2881; &#2842;&#2878;&#2873;&#2881;&#2817;&#2853;&#2879;&#2860;&#2878; &#2860;&#2879;&#2871;&#2911;&#2837;&#2881; &#2923;&#2918;&#2918; &#2821;&#2837;&#2893;&#2871;&#2864;&#2864;&#2887; &#2866;&#2887;&#2838;&#2879; &#2858;&#2842;&#2878;&#2864;&#2856;&#2893;&#2852;&#2881;&#2404;";
    $queryCaptcha = "&#2837;&#2893;&#2911;&#2878;&#2858;&#2893;&#2842;&#2878; &#2837;&#2891;&#2908;";
    $instinodishalbl = "&#2835;&#2849;&#2879;&#2870;&#2878;&#2864;&#2887; &#2853;&#2879;&#2860;&#2878; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856; &#2839;&#2881;&#2849;&#2879;&#2837;&#2864; &#2856;&#2878;&#2862;";
    $entercourseinstnamelbl = "&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#47; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864; &#2856;&#2878;&#2862;";
    $entercourseorpialbl = "&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#47; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;&#2864; &#2856;&#2878;&#2862;";

    $govermentlbl = "&#2872;&#2864;&#2837;&#2878;&#2864;&#2880;";
    $privatelbl = "&#2860;&#2887;&#2872;&#2864;&#2837;&#2878;&#2864;&#2880;";
    $printlbl = "&#2858;&#2893;&#2864;&#2879;&#2851;&#2893;&#2847;";
    $skiptomainlbl = "&#2862;&#2882;&#2867; &#2858;&#2893;&#2864;&#2872;&#2841;&#2893;&#2839;&#2837;&#2881; &#2863;&#2878;&#2822;&#2856;&#2893;&#2852;&#2881;";
    $albl = "&#2831;";
    $ourgallerylbl = "&#2822;&#2862; &#2839;&#2893;&#2911;&#2878;&#2866;&#2887;&#2864;&#2880;";
    $astilbl = "&#2831; &#2831;&#2872; &#2847;&#2879; &#2822;&#2823;";
    $astifullformlbl = "&#2821;&#2839;&#2893;&#2864;&#2880;&#2862; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856;";
    $itilbl = "&#2822;&#2823; &#2847;&#2879; &#2822;&#2823;";
    $itifullformlbl = "&#2870;&#2879;&#2867;&#2893;&#2858; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856;";
    $pialbl = "&#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;";
    $piafullformlbl = "&#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2856;&#2879;&#2911;&#2887;&#2844;&#2856; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878;";

    $strlahi = '&#2866;&#2878;&#2873;&#2879; &#2929;&#2887;&#2860;&#2872;&#2878;&#2823;&#2847;&#2837;&#2881; &#2863;&#2878;&#2821;&#2856;&#2893;&#2852;&#2881;';
    $astinumberlbl = 8;
    $itinumberlbl = 44;
    $pianumberlbl = 63;

    $strTrainPartnerslblnumber = 23;
    $strTrainCenterlblnumber = 49;
    $strPeopleTrainlblnumber = 8324;
    $strPeoplePlacedlblnumber = 1340;


    $medialbl = "&#2839;&#2851;&#2862;&#2878;&#2855;&#2893;&#2911;&#2862;";
    $strfindyourcourceslbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2860;&#2878;&#2843;&#2856;&#2893;&#2852;&#2881;';
    /* Our story numbers */

    /* find institute only for home */
    $findinstitutelbl = "&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2840;&#2864; &#2858;&#2878;&#2838;";
    $nearlocationlbl = "&#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856; &#2838;&#2891;&#2844;&#2856;&#2893;&#2852;&#2881;";

    $pinCodemessage1 = '&#2854;&#2911;&#2878;&#2837;&#2864;&#2879; &#2856;&#2879;&#2844; &#2858;&#2879;&#2856;&#2893; &#2837;&#2891;&#2849; &#2837;&#2879;&#2862;&#2893;&#2860;&#2878; &#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2856;&#2878;&#2817; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $validPincodelevel = '&#2854;&#2911;&#2878;&#2837;&#2864;&#2879; &#2872;&#2848;&#2879;&#2837; &#2858;&#2879;&#2856; &#2837;&#2891;&#2849; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    /* milestone */


    $strmay161 = '&#2870;&#2893;&#2864;&#2880; &#2872;&#2881;&#2860;&#2893;&#2864;&#2852; &#2860;&#2878;&#2839;&#2842;&#2880; &#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;&#40;&#2835;&#2831;&#2872;&#2849;&#2879;&#2831;&#41;&#2864; &#2821;&#2855;&#2893;&#2911;&#2837;&#2893;&#2871; &#2861;&#2878;&#2860;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852; &#2873;&#2887;&#2866;&#2887;&#2404;';

    $strjune161 = '&#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2839;&#2881;&#2849;&#2879;&#2837;&#2864; &#2872;&#2862;&#2880;&#2837;&#2893;&#2871;&#2878; &#2858;&#2878;&#2823;&#2817; &#2919;&#2918;&#2847;&#2879; &#2856;&#2882;&#2822; &#2862;&#2878;&#2856;&#2854;&#2851;&#2893;&#2849; &#2825;&#2858;&#2864;&#2887; &#2821;&#2855;&#2893;&#2911;&#2837;&#2893;&#2871;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2821;&#2860;&#2839;&#2852; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2853;&#2879;&#2866;&#2878; &#2404;';
    $strjune162 = '&#2872;&#2862;&#2893;&#2862;&#2878;&#2856;&#2856;&#2880;&#2911; &#2862;&#2881;&#2838;&#2893;&#2911;&#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2880; &#2870;&#2893;&#2864;&#2880; &#2856;&#2860;&#2880;&#2856; &#2858;&#2847;&#2893;&#2847;&#2856;&#2878;&#2911;&#2837; &#2864;&#2878;&#2844;&#2893;&#2911;&#2864; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2821;&#2846;&#2893;&#2842;&#2867;&#2864;&#2881; &#2822;&#2872;&#2879;&#2853;&#2879;&#2860;&#2878; &#2923;&#2918;&#2918; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880; &#2835; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#2856;&#2860;&#2879;&#2872;&#2841;&#2893;&#2837; &#2825;&#2858;&#2872;&#2893;&#2853;&#2879;&#2852;&#2879;&#2864;&#2887; &#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;&#2864; &#2870;&#2881;&#2861; &#2825;&#2854;&#2840;&#2878;&#2847;&#2856; &#2837;&#2866;&#2887;&#2404;';
    $strjune163 = '&#2919;&#2926; &#2862;&#2878;&#2872;&#2864; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2878;&#2864;&#2880; &#2856;&#2837;&#2893;&#2872;&#2878; &#2825;&#2856;&#2893;&#2862;&#2891;&#2842;&#2856; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404;';
    $strjune164 = '&#2831;&#2849;&#2879;&#2860;&#2879;&#2864; &#2822;&#2864;&#2893;&#2853;&#2879;&#2837; &#2872;&#2873;&#2878;&#2911;&#2852;&#2878;&#2864;&#2887; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2831;&#2831;&#2872;&#2847;&#2879;&#2822;&#2823; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#2822;&#2864;&#2862;&#2893;&#2861; &#2860;&#2879;&#2871;&#2911;&#2864; &#2872;&#2862;&#2880;&#2837;&#2893;&#2871;&#2878; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2853;&#2879;&#2866;&#2878;&#2404;';
    $strjune165 = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864;&#2839;&#2881;&#2849;&#2879;&#2837;&#2864;&#2887; &#2844;&#2881;&#2856; &#2920;&#2918;&#2919;&#2924;&#2864;&#2881; &#2860;&#2878;&#2911;&#2891;&#2862;&#2887;&#2847;&#2893;&#2864;&#2879;&#2837; &#2825;&#2858;&#2872;&#2893;&#2853;&#2878;&#2856; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2878;&#2864;&#2880; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404;';

    $strjuly161 = '&#2864;&#2878;&#2844;&#2893;&#2911;&#2864; &#2872;&#2862;&#2872;&#2893;&#2852; &#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2839;&#2881;&#2849;&#2879;&#2837;&#2864;&#2887; &#2860;&#2879;&#2870;&#2893;&#2860; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2854;&#2879;&#2860;&#2872; &#2858;&#2878;&#2867;&#2879;&#2852; &#2873;&#2891;&#2823;&#2853;&#2879;&#2866;&#2878;&#2404;';
    $strjuly162 = '&#2860;&#2879;&#2870;&#2893;&#2860; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2854;&#2879;&#2860;&#2872;&#2837;&#2881; &#2860;&#2878;&#2867;&#2879;&#2837;&#2878; &#2854;&#2879;&#2860;&#2872; &#2861;&#2878;&#2860;&#2887; &#2825;&#2858;&#2872;&#2893;&#2853;&#2878;&#2858;&#2879;&#2852; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878;&#2864;&#2881; &#2821;&#2855;&#2879;&#2837; &#2872;&#2818;&#2838;&#2893;&#2911;&#2837; &#2860;&#2878;&#2867;&#2879;&#2837;&#2878; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2887; &#2863;&#2891;&#2839; &#2854;&#2887;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2872;&#2842;&#2887;&#2852;&#2856;&#2852;&#2878; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2853;&#2879;&#2866;&#2878;&#2404;';
    $strjuly163 = '&#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881;  &#2821;&#2856;&#2881;&#2858;&#2893;&#2864;&#2878;&#2851;&#2880;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2825;&#2854;&#2893;&#2854;&#2887;&#2870;&#2893;&#2911;&#2864;&#2887; &#2821;&#2852;&#2880;&#2852;&#2864;&#2887; &#2860;&#2879;&#2870;&#2887;&#2871; &#2872;&#2859;&#2867;&#2852;&#2878; &#2835;  &#2837;&#2883;&#2852;&#2880;&#2852;&#2893;&#2869; &#2873;&#2878;&#2872;&#2866; &#2837;&#2864;&#2879;&#2853;&#2879;&#2860;&#2878; &#2919;&#2918; &#2844;&#2851; &#2858;&#2881;&#2864;&#2878;&#2852;&#2856; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2841;&#2893;&#2837; &#2859;&#2847;&#2891; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864; &#2858;&#2893;&#2864;&#2878;&#2842;&#2880;&#2864;&#2864;&#2887;  &#2872;&#2893;&#2853;&#2878;&#2856;&#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2873;&#2887;&#2866;&#2878;&#2404;';

    $straug161 = '&#2858;&#2866;&#2879;&#2847;&#2887;&#2837;&#2856;&#2879;&#2837;&#2893; &#2870;&#2879;&#2837;&#2893;&#2871;&#2837;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2854;&#2893;&#2860;&#2878;&#2864;&#2878; &#2858;&#2893;&#2864;&#2852;&#2879; &#2862;&#2878;&#2872;&#2864;&#2887; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2839;&#2881;&#2849;&#2879;&#2837;&#2864; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878; &#2872;&#2862;&#2893;&#2858;&#2878;&#2854;&#2856;&#2878; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2872;&#2862;&#2880;&#2837;&#2893;&#2871;&#2878; &#2860;&#2893;&#2911;&#2860;&#2872;&#2893;&#2853;&#2878;&#2864; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878; &#2404;';
    $straug162 = '&#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2858;&#2878;&#2823;&#2817; &#2864;&#2878;&#2844;&#2893;&#2911;  &#2872;&#2864;&#2837;&#2878;&#2864; &#2921;&#2923;&#2918;&#2847;&#2879; &#2821;&#2852;&#2879;&#2864;&#2879;&#2837;&#2893;&#2852; &#2823;&#2856;&#2871;&#2893;&#2847;&#2893;&#2864;&#2837;&#2893;&#2847;&#2864;  &#2858;&#2854;&#2860;&#2880; &#2862;&#2846;&#2893;&#2844;&#2881;&#2864; &#2837;&#2866;&#2887;&#2404;';
    $straug163 = '&#2919;&#2922;&#2847;&#2879; &#2856;&#2882;&#2822; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856; &#2831;&#2856;&#2872;&#2879;&#2861;&#2879;&#2847;&#2879; &#2821;&#2855;&#2879;&#2872;&#2893;&#2860;&#2880;&#2837;&#2883;&#2852;&#2879; &#2866;&#2878;&#2861; &#2837;&#2866;&#2878;&#2404; &#2831;&#2873;&#2878; &#2859;&#2867;&#2864;&#2887; &#2864;&#2878;&#2844;&#2893;&#2911;&#2864;&#2887; &#2831;&#2856;&#2872;&#2879;&#2861;&#2879;&#2847;&#2879; &#2821;&#2855;&#2879;&#2872;&#2893;&#2860;&#2880;&#2837;&#2883;&#2852;&#2879; &#2858;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856; &#2872;&#2818;&#2838;&#2893;&#2911;&#2878; &#2922;&#2923;&#2864;&#2887; &#2858;&#2873;&#2846;&#2893;&#2842;&#2879;&#2866;&#2878;&#2404;';
    $straug164 = '&#2854;&#2879;&#2860;&#2893;&#2911;&#2878;&#2841;&#2893;&#2839;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; &#2838;&#2891;&#2864;&#2893;&#2854;&#2893;&#2855;&#2878;&#44; &#2838;&#2881;&#2854;&#2881;&#2864;&#2858;&#2881;&#2864; &#2848;&#2878;&#2864;&#2887; &#2856;&#2882;&#2822; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2838;&#2891;&#2866;&#2879;&#2866;&#2878;&#2404;';
    $strsep161 = '&#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2839;&#2881;&#2849;&#2879;&#2837; &#2858;&#2878;&#2823;&#2817; &#2858;&#2878;&#2873;&#2893;&#2911;&#2878; &#2860;&#2893;&#2911;&#2860;&#2872;&#2893;&#2853;&#2878; &#2866;&#2878;&#2839;&#2881; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404;';

    $strnov161 = '&#2870;&#2852; &#2858;&#2893;&#2864;&#2852;&#2879;&#2870;&#2852; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2835; &#2858;&#2866;&#2879;&#2847;&#2887;&#2837;&#2856;&#2879;&#2837;&#2839;&#2881;&#2849;&#2879;&#2837;&#2864;&#2887; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880; &#2835; &#2837;&#2864;&#2893;&#2862;&#2842;&#2878;&#2864;&#2880;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; &#2860;&#2878;&#2911;&#2891;&#2862;&#2887;&#2847;&#2893;&#2864;&#2879;&#2837;&#2893; &#2825;&#2858;&#2872;&#2893;&#2853;&#2878;&#2856; &#2860;&#2893;&#2911;&#2860;&#2872;&#2893;&#2853;&#2878; &#2866;&#2878;&#2839;&#2881; &#2873;&#2887;&#2866;&#2878;&#2404;';
    $strnov162 = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880; &#2831;&#2860;&#2818; &#2842;&#2878;&#2837;&#2879;&#2864;&#2880; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856;&#2837;&#2878;&#2864;&#2880; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2856;&#2887;&#2823; &#2919;&#2918; &#2856;&#2861;&#2887;&#2862;&#2893;&#2860;&#2864; &#2920;&#2918;&#2919;&#2924;&#2864;&#2887; &#2831;&#2837; &#2837;&#2864;&#2893;&#2862;&#2870;&#2878;&#2867;&#2878; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2879;&#2852; &#2873;&#2891;&#2823;&#2853;&#2879;&#2866;&#2878;&#2404;';

    $strdec161 = '&#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851; &#2831;&#2837; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2883;&#2852; &#2872;&#2891;&#2872;&#2878;&#2823;&#2847;&#2879; &#2861;&#2878;&#2860;&#2887; &#2924; &#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864; &#2920;&#2918;&#2919;&#2924;&#2864;&#2881; &#2822;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2879;&#2837; &#2861;&#2878;&#2860;&#2887; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2871;&#2862; &#2873;&#2887;&#2866;&#2878; &#2404;';
    $strdec162 = '&#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#2839;&#2881;&#2849;&#2879;&#2837;&#2864; &#2858;&#2893;&#2864;&#2852;&#2879; &#2862;&#2878;&#2872;&#2864;&#2887; &#2872;&#2862;&#2880;&#2837;&#2893;&#2871;&#2878; &#2835; &#2821;&#2856;&#2881;&#2862;&#2891;&#2854;&#2856; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;&#2864; &#2842;&#2878;&#2864;&#2879; &#2844;&#2851;&#2879;&#2822; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2879;&#2864;&#2893;&#2860;&#2878;&#2873;&#2880; &#2858;&#2864;&#2879;&#2871;&#2854; &#2839;&#2848;&#2856; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878; &#2404;';
    $strdec163 = '&#39;&#2862;&#2887;&#2837;&#2893; &#2823;&#2856;&#2893; &#2835;&#2849;&#2879;&#2870;&#2878;&#39; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2854;&#2887;&#2838;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2864;&#2878;&#2844;&#2893;&#2911;&#2864; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2864;&#2881; &#2920;&#2918;&#2918;&#2918; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864; &#2822;&#2872;&#2879;&#2853;&#2879;&#2866;&#2887;&#2404; <br/>
';
    $strdec164 = '&#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2835; &#2858;&#2866;&#2879;&#2847;&#2887;&#2837;&#2856;&#2879;&#2837;&#2893; &#2872;&#2862;&#2887;&#2852; &#2821;&#2856;&#2893;&#2911;&#2878;&#2856;&#2893;&#2911; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2841;&#2893;&#2837; &#2858;&#2891;&#2871;&#2878;&#2837; &#2831;&#2856;&#2893;&#2822;&#2823;&#2831;&#2859;&#2849;&#2879; &#2854;&#2893;&#2860;&#2878;&#2864;&#2878; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2849;&#2879;&#2844;&#2878;&#2823;&#2856;&#2864; &#2858;&#2893;&#2864;&#2842;&#2867;&#2856; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878; &#2404;';
    $strdec165 = '&#2856;&#2879;&#2864;&#2893;&#2862;&#2878;&#2851; &#2870;&#2893;&#2864;&#2862;&#2879;&#2837;&#2841;&#2893;&#2837; &#2858;&#2879;&#2866;&#2878;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2887; &#2870;&#2852; &#2858;&#2893;&#2864;&#2852;&#2879;&#2870;&#2852; &#2860;&#2883;&#2852;&#2893;&#2852;&#2879; &#2862;&#2879;&#2867;&#2879;&#2860;&#2878; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2887;&#2866;&#2878; &#2404;';
    $strdec166 = '&#2861;&#2878;&#2864;&#2852; &#2872;&#2864;&#2837;&#2878;&#2864;&#2841;&#2893;&#2837; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2835; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839; &#2860;&#2879;&#2837;&#2878;&#2870; &#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2851;&#2878;&#2867;&#2911; &#2854;&#2893;&#2860;&#2878;&#2864;&#2878; &#2844;&#2878;&#2864;&#2879; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2831;&#2837; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2856;&#2879;&#2911;&#2862;&#44; &#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2864;&#2878;&#2844;&#2893;&#2911; &#2872;&#2864;&#2837;&#2878;&#2864;&#2841;&#2893;&#2837; &#2821;&#2856;&#2881;&#2854;&#2878;&#2856;&#2864;&#2887; &#2842;&#2878;&#2866;&#2881;&#2853;&#2879;&#2860;&#2878; &#2872;&#2862;&#2872;&#2893;&#2852; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2872;&#2862;&#2878;&#2856;&#2852;&#2878; &#2822;&#2851;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2920;&#2925; &#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864;&#44; &#2920;&#2918;&#2919;&#2924;&#2864;&#2881; &#2856;&#2879;&#2871;&#2893;&#2858;&#2852;&#2893;&#2852;&#2879; &#2856;&#2879;&#2822;&#2839;&#2866;&#2878;&#2404;';
    $strdec167 = '&#2920;&#2925; &#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864; &#2920;&#2918;&#2919;&#2924;&#2864;&#2881; &#2872;&#2860;&#2881; &#2873;&#2871;&#2893;&#2847;&#2887;&#2866;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2864;&#2887; &#2860;&#2878;&#2911;&#2891;&#2862;&#2887;&#2847;&#2893;&#2864;&#2879;&#2837;&#2893; &#2825;&#2858;&#2872;&#2893;&#2853;&#2878;&#2856; &#2831;&#2860;&#2818; &#2872;&#2879;&#2872;&#2879;&#2847;&#2879;&#2861;&#2879; &#2860;&#2893;&#2911;&#2860;&#2872;&#2893;&#2853;&#2878; &#2866;&#2878;&#2839;&#2881; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404;';
    $strdec168 = '&#2920;&#2918;&#2919;&#2924; &#2856;&#2861;&#2887;&#2862;&#2893;&#2860;&#2864; &#2835; &#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864; &#2862;&#2878;&#2872;&#2864;&#2887; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2879;&#2852; &#39;&#2862;&#2887;&#2837;&#2893; &#2823;&#2856;&#2893; &#2835;&#2849;&#2879;&#2870;&#2878;&#39; &#2872;&#2862;&#2893;&#2862;&#2879;&#2867;&#2856;&#2880;&#40;&#2837;&#2856;&#2837;&#2893;&#2866;&#2887;&#2861;&#41;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2858;&#2878;&#2861;&#2879;&#2866;&#2879;&#2911;&#2856; &#2838;&#2891;&#2866;&#2878; &#2863;&#2878;&#2823;&#2853;&#2879;&#2866;&#2878;&#2404;';

    $strjan171 = '&#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2837;&#2891;&#2848;&#2878;&#2840;&#2864;&#2839;&#2881;&#2849;&#2879;&#2837;&#2864; &#2856;&#2882;&#2822; &#2849;&#2879;&#2844;&#2878;&#2823;&#2856; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404;';
    $strjan172 = '&#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;&#2864; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2879;&#2864;&#2893;&#2860;&#2878;&#2873;&#2880; &#2858;&#2864;&#2879;&#2871;&#2854;&#2854;&#2893;&#2860;&#2878;&#2864;&#2878; &#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858;&#2839;&#2881;&#2849;&#2879;&#2837;&#2881; &#2862;&#2846;&#2893;&#2844;&#2881;&#2864;&#2880; &#2854;&#2879;&#2822;&#2839;&#2866;&#2878;&#2404;';
    $strjan173 = '&#2864;&#2878;&#2844;&#2893;&#2911;&#2864; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2860;&#2879;&#2861;&#2878;&#2839;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2842;&#2878;&#2866;&#2881;&#2853;&#2879;&#2860;&#2878; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864;&#2864; &#2855;&#2856;&#2893;&#2854;&#2878;&#2862;&#2882;&#2867;&#2837; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2841;&#2893;&#2839; &#2842;&#2878;&#2866;&#2881;&#2853;&#2879;&#2860;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2844;&#2878;&#2856;&#2881;&#2822;&#2864;&#2880; &#2920;&#2918;&#2919;&#2925;&#2864;&#2881; &#2872;&#2862;&#2852;&#2878; &#2864;&#2837;&#2893;&#2871;&#2878;&#2858;&#2878;&#2823;&#2817;  &#2839;&#2893;&#2864;&#2887;&#2849;&#2879;&#2841;&#2893;&#2839; &#2860;&#2893;&#2911;&#2860;&#2872;&#2893;&#2853;&#2878; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404;';

    $strfeb171 = '&#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2858;&#2893;&#2864;&#2870;&#2878;&#2872;&#2856;&#2864; &#2872;&#2873;&#2878;&#2911;&#2852;&#2878;&#2864;&#2887; &#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864;&#2864;&#2887; &#2837;&#2858;&#2879; &#2860;&#2856;&#2893;&#2854;&#2837;&#2864;&#2879; &#2854;&#2879;&#2822;&#2863;&#2879;&#2860;&#2878; &#2859;&#2867;&#2864;&#2887; &#2858;&#2893;&#2864;&#2853;&#2862; &#2872;&#2887;&#2862;&#2879;&#2871;&#2893;&#2847;&#2878;&#2864;&#2864;&#2887; &#2858;&#2878;&#2870;&#2873;&#2878;&#2864; &#2922;&#2926; &#2858;&#2893;&#2864;&#2852;&#2879;&#2870;&#2852;&#2837;&#2881; &#2873;&#2893;&#2864;&#2878;&#2872; &#2858;&#2878;&#2823;&#2866;&#2878;&#2404;';

    $strfeb172 = '&#2921;&#2918;&#2847;&#2879; &#2844;&#2879;&#2866;&#2893;&#2866;&#2878;&#2864;&#2881; &#2919;&#2919;&#2847;&#2879; &#2844;&#2879;&#2866;&#2893;&#2866;&#2878;&#2864; &#2825;&#2842;&#2893;&#2842; &#2860;&#2879;&#2854;&#2893;&#2911;&#2878;&#2867;&#2911;&#2864; &#2858;&#2893;&#2864;&#2855;&#2878;&#2856; &#2870;&#2879;&#2837;&#2893;&#2871;&#2837;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2837;&#2881; &#2856;&#2887;&#2823; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2862;&#2878;&#2856;&#2887; &#2861;&#2860;&#2879;&#2871;&#2893;&#2911;&#2852;&#2864;&#2887; &#2860;&#2883;&#2852;&#2893;&#2852;&#2879; &#2861;&#2878;&#2860;&#2887; &#2839;&#2893;&#2864;&#2873;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878; &#2854;&#2879;&#2839;&#2864;&#2887; &#2856;&#2879;&#2844;&#2837;&#2881; &#2821;&#2861;&#2893;&#2911;&#2872;&#2893;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2872;&#2878;&#2862;&#2879;&#2866; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404;';
    $strmar171 = '&#2920;&#2918;&#2919;&#2924;&#45;&#2919;&#2925; &#2822;&#2864;&#2893;&#2853;&#2879;&#2837; &#2860;&#2864;&#2893;&#2871;&#2864;&#2887; &#2919;&#2866;&#2837;&#2893;&#2871; &#2920;&#2920;&#2873;&#2844;&#2878;&#2864; &#2922;&#2927;&#2920; &#2844;&#2851; &#2863;&#2881;&#2860;&#2837; &#2835; &#2863;&#2881;&#2860;&#2852;&#2880; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2860;&#2879;&#2861;&#2878;&#2839;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862;&#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2873;&#2891;&#2823;&#2853;&#2879;&#2866;&#2887;&#2404; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2881; &#2920;&#2926;&#2923;&#2926;&#2927; &#2844;&#2851; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2853;&#2879;&#2866;&#2878;&#2860;&#2887;&#2867;&#2887; &#2924;&#2920;&#2920;&#2919; &#2844;&#2851; &#2822;&#2852;&#2893;&#2862;&#2856;&#2879;&#2864;&#2893;&#2861;&#2864;&#2870;&#2880;&#2867; &#2873;&#2891;&#2823; &#2858;&#2878;&#2864;&#2879;&#2853;&#2879;&#2866;&#2887;&#2404; &#2837;&#2893;&#2864;&#2862;&#2878;&#2839;&#2852; &#2861;&#2878;&#2860;&#2887; &#2922;&#46;&#2921; &#2866;&#2837;&#2893;&#2871; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2860;&#2887;&#2867;&#2887; &#2920;&#2918;&#2919;&#2926;&#45;&#2919;&#2927; &#2872;&#2881;&#2854;&#2893;&#2855;&#2878; &#2924;&#46;&#2925; &#2866;&#2837;&#2893;&#2871; &#2863;&#2881;&#2860;&#2837; &#2863;&#2881;&#2860;&#2852;&#2880;&#2841;&#2893;&#2837;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2879;&#2822;&#2863;&#2879;&#2860;&#2404;';

    $strmar172 = '&#2864;&#2878;&#2844;&#2880;&#2860; &#2861;&#2860;&#2856;&#2864;&#2887; &#2863;&#2881;&#2860;  &#2872;&#2893;&#2853;&#2858;&#2852;&#2879;&#2841;&#2893;&#2837; &#2854;&#2893;&#2860;&#2878;&#2864;&#2878; &#2849;&#2879;&#2844;&#2878;&#2823;&#2856; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2856;&#2860;&#2856;&#2879;&#2864;&#2893;&#2862;&#2879;&#2852; &#2839;&#2883;&#2873;&#2837;&#2881;  &#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;&#2864; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2878;&#2867;&#2911;&#2837;&#2881; &#2872;&#2893;&#2853;&#2878;&#2856;&#2878;&#2856;&#2893;&#2852;&#2864;&#2879;&#2852; &#2873;&#2887;&#2866;&#2878;&#2404;';
    $strapr171 = '&#2852;&#2878;&#2867;&#2842;&#2887;&#2864; &#2831;&#2860;&#2818; &#2858;&#2881;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864; &#2872;&#2881;&#2860;&#2864;&#2893;&#2851;&#2893;&#2851; &#2844;&#2911;&#2856;&#2893;&#2852;&#2880; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2879;&#2852; &#2873;&#2887;&#2866;&#2878; &#2831;&#2860;&#2818; &#2862;&#2881;&#2838;&#2893;&#2911;&#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2880; &#2870;&#2893;&#2864;&#2880; &#2856;&#2860;&#2880;&#2856; &#2858;&#2847;&#2893;&#2847;&#2856;&#2878;&#2911;&#2837; &#2872;&#2881;&#2860;&#2864;&#2893;&#2851;&#2893;&#2851; &#2844;&#2911;&#2856;&#2893;&#2852;&#2880; &#2825;&#2852;&#2893;&#2872;&#2860;&#2864;&#2887; &#2862;&#2881;&#2838;&#2893;&#2911; &#2821;&#2852;&#2879;&#2853;&#2879;&#2861;&#2878;&#2860;&#2887; &#2863;&#2891;&#2839; &#2854;&#2887;&#2823;&#2853;&#2879;&#2866;&#2887;&#2404;';

    $strapr172 = '&#2825;&#2852;&#2893;&#2837;&#2867; &#2860;&#2879;&#2870;&#2893;&#2860;&#2860;&#2879;&#2854;&#2893;&#2911;&#2878;&#2867;&#2911; &#2831;&#2860;&#2818; &#2866;&#2887;&#2851;&#2893;&#2849;&#45;&#2831;&#45;&#2873;&#2893;&#2911;&#2878;&#2851;&#2893;&#2849; &#2823;&#2851;&#2893;&#2849;&#2879;&#2822;&#44; &#2862;&#2878;&#2855;&#2893;&#2911;&#2862;&#2864;&#2887; &#39;&#2847;&#2879;&#2842;&#2893; &#2859;&#2864; &#2835;&#2849;&#2879;&#2870;&#2878;&#39; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2839;&#2860;&#2887;&#2871;&#2851;&#2878; &#2837;&#2864;&#2881;&#2853;&#2879;&#2860;&#2878; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#44;  &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2887; &#2831;&#2837; &#2860;&#2864;&#2893;&#2871;&#2858;&#2878;&#2823;&#2817;  &#2858;&#2864;&#2879;&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2856;&#2864; &#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#2855;&#2878;&#2864;&#40;Change Agent&#41; &#2873;&#2879;&#2872;&#2878;&#2860;&#2864;&#2887; &#2858;&#2850;&#2887;&#2823;&#2860;&#2878;&#2837;&#2881; &#2822;&#2872;&#2879;&#2860;&#2878; &#2856;&#2879;&#2862;&#2856;&#2893;&#2852;&#2887; &#2860;&#2881;&#2845;&#2878;&#2862;&#2851;&#2878;&#2858;&#2852;&#2893;&#2864; &#2872;&#2893;&#2860;&#2878;&#2837;&#2893;&#2871;&#2864;&#2879;&#2852; &#2873;&#2887;&#2866;&#2878;&#2404;';



    $strapr173 = '&#2860;&#2893;&#2864;&#2873;&#2893;&#2862;&#2858;&#2881;&#2864; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2919;&#2920; &#2844;&#2851; &#2843;&#2878;&#2852;&#2893;&#2864;&#2880; &#2842;&#2887;&#2856;&#2893;&#2856;&#2878;&#2823;&#2864;&#2887; &#2853;&#2879;&#2860;&#2878; &#2860;&#2881;&#2866;&#2887;&#2847; &#2862;&#2847;&#2864; &#2872;&#2878;&#2823;&#2837;&#2887;&#2866; &#2837;&#2862;&#2893;&#2858;&#2878;&#2856;&#2880;&#2864;&#2887; &#2863;&#2891;&#2839; &#2854;&#2887;&#2860;&#2878;&#2858;&#2878;&#2823;&#2817; &#2862;&#2856;&#2891;&#2856;&#2880;&#2852; &#2873;&#2887;&#2866;&#2887;&#2404;';

    $strapr174 = '&#2861;&#2878;&#2864;&#2852; &#2872;&#2864;&#2837;&#2878;&#2864; &#2835; &#2831;&#2872;&#2879;&#2822;&#2856;&#2893; &#2849;&#2887;&#2861;&#2866;&#2858;&#2862;&#2887;&#2851;&#2893;&#2847; &#2860;&#2893;&#2911;&#2878;&#2841;&#2893;&#2837; &#40;&#2831;&#2849;&#2879;&#2860;&#2879;&#8205;&#41; &#2872;&#2873;&#2879;&#2852; &#2827;&#2851; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2872;&#2856;&#2893;&#2852;&#2891;&#2871;&#2844;&#2856;&#2837; &#2822;&#2866;&#2891;&#2842;&#2856;&#2878; &#2858;&#2864;&#2887; &#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;&#2837;&#2881; &#2921;&#2918; &#2858;&#2893;&#2864;&#2852;&#2879;&#2870;&#2852; &#2837;&#2851;&#2893;&#2847;&#2893;&#2864;&#2878;&#2837;&#2893;&#2847; &#2822;&#2929;&#2878;&#2864;&#2893;&#2849; &#2862;&#2879;&#2867;&#2879;&#2866;&#2878;&#2404;';

    $strapr175 = '&#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878;&#2862;&#2882;&#2867;&#2837; &#2861;&#2878;&#2860;&#2887; &#2872;&#2893;&#2860;&#2878;&#2872;&#2893;&#2853;&#2893;&#2911;&#2872;&#2887;&#2860;&#2878; &#2831;&#2860;&#2818; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2878;&#2823;&#2817; &#2920;&#2918;&#2919;&#2925; &#2831;&#2858;&#2893;&#2864;&#2879;&#2866; &#2919;&#2925; &#2852;&#2878;&#2864;&#2879;&#2838;&#2864;&#2887; &#2835;&#2831;&#2872;&#2849;&#2879;&#2831;&#2864; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2879;&#2864;&#2893;&#2860;&#2878;&#2873;&#2880; &#2858;&#2864;&#2879;&#2871;&#2854;&#2864; &#2862;&#2846;&#2893;&#2844;&#2881;&#2864;&#2880; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856;&#2404;';

    $strapr176 = '&#2862;&#2881;&#2838;&#2893;&#2911;&#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2880; &#2870;&#2893;&#2864;&#2880; &#2856;&#2860;&#2880;&#2856; &#2858;&#2847;&#2893;&#2847;&#2856;&#2878;&#2911;&#2837; &#2835;&#2849;&#2879;&#2870;&#2878; &#2837;&#2883;&#2871;&#2879; &#2860;&#2888;&#2871;&#2911;&#2879;&#2837; &#2860;&#2879;&#2870;&#2893;&#2860;&#2860;&#2879;&#2854;&#2893;&#2911;&#2878;&#2867;&#2911;&#40;&#2835;&#2911;&#2881;&#2831;&#2847;&#2879;&#41;&#2864;&#2887; &#2837;&#2883;&#2871;&#2879; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2858;&#2893;&#2864;&#2853;&#2862;&#2853;&#2864; &#2822;&#2864;&#2858;&#2879;&#2831;&#2866;&#40;&#2864;&#2887;&#2837;&#2839;&#2856;&#2878;&#2823;&#2844;&#2887;&#2872;&#2856; &#2821;&#2859; &#2858;&#2893;&#2864;&#2878;&#2823;&#2835;&#2864;&#2893; &#2866;&#2864;&#2893;&#2851;&#2893;&#2851;&#2879;&#2818;&#41; &#2825;&#2854;&#2840;&#2878;&#2847;&#2856; &#2837;&#2866;&#2887;&#2404; ';

    $strmay171 = '&#2845;&#2879;&#2821;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2858;&#2893;&#2864;&#2852;&#2879; &#2822;&#2837;&#2883;&#2871;&#2893;&#2847; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2839;&#2852; &#2831;&#2837; &#2860;&#2864;&#2893;&#2871; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2923;&#2918;&#2918;&#2918;&#2864;&#2881; &#2821;&#2855;&#2879;&#2837; &#2873;&#2878;&#2823;&#2872;&#2893;&#2837;&#2881;&#2866; &#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2858;&#2864;&#2879;&#2854;&#2864;&#2893;&#2870;&#2856;&#2864;&#2887; &#2821;&#2851;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879;&#2404;';
    $strmay172 = '&#2835;&#2849;&#2879;&#2870;&#2878;&#2864;&#2887; &#2838;&#2891;&#2866;&#2878;&#2863;&#2879;&#2860;&#2878;&#2837;&#2881; &#2853;&#2879;&#2860;&#2878; &#2926;&#2847;&#2879; &#2821;&#2852;&#2893;&#2911;&#2878;&#2855;&#2881;&#2856;&#2879;&#2837; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2858;&#2893;&#2864;&#2870;&#2879;&#2837;&#2893;&#2871;&#2851; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2862;&#2855;&#2893;&#2911;&#2864;&#2881; &#2924;&#2847;&#2879;&#2837;&#2881; &#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2835; &#2860;&#2887;&#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2872;&#2873;&#2863;&#2891;&#2839;&#2864;&#2887; &#2872;&#2893;&#2853;&#2878;&#2858;&#2856;&#2878; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2847;&#2887;&#2851;&#2893;&#2849;&#2864; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2882;&#2864;&#2893;&#2860;&#2864;&#2881; &#2854;&#2879;&#2866;&#2893;&#2866;&#2880;&#2848;&#2878;&#2864;&#2887; &#2821;&#2839;&#2893;&#2864;&#2851;&#2880;&#47;&#2856;&#2878;&#2862;&#2844;&#2878;&#2854;&#2878; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2858;&#2893;&#2864;&#2878;&#2864;&#2862;&#2893;&#2861;&#2879;&#2837; &#2822;&#2866;&#2891;&#2842;&#2856;&#2878; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878; &#2404; ';

    $strmay173 = '&#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878;&#2862;&#2882;&#2867;&#2837; &#2861;&#2878;&#2860;&#2887; &#2872;&#2893;&#2869;&#2878;&#2872;&#2893;&#2853;&#2893;&#2911;&#2872;&#2887;&#2860;&#2878; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2831;&#2860;&#2818; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2878;&#2823;&#2817; &#2835;&#2831;&#2872;&#2849;&#2879;&#2831;&#2864; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2879;&#2864;&#2893;&#2860;&#2878;&#2873;&#2880; &#2858;&#2864;&#2879;&#2871;&#2854;&#2864;&#2887; &#2862;&#2846;&#2893;&#2844;&#2881;&#2864;&#2880; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404; &#2856;&#2878;&#2856;&#2891;&#45;&#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858;&#2864;&#2887; &#2863;&#2887;&#2837;&#2892;&#2851;&#2872;&#2879; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2860;&#2893;&#2911;&#2837;&#2893;&#2852;&#2879; &#2856;&#2879;&#2844;&#2864; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2860;&#2879;&#2856;&#2878; &#2872;&#2881;&#2855;&#2864;&#2887;&#44; &#2860;&#2879;&#2856;&#2878; &#2860;&#2856;&#2893;&#2855;&#2837;&#2864;&#2887; &#2919; &#2866;&#2837;&#2893;&#2871; &#2847;&#2841;&#2893;&#2837;&#2878;&#2864; &#2872;&#2873;&#2878;&#2911;&#2852;&#2878; &#2856;&#2887;&#2823;&#2858;&#2878;&#2864;&#2879;&#2860;&#2404; &#2852;&#2887;&#2860;&#2887; &#2831;&#2853;&#2879;&#2858;&#2878;&#2823;&#2817; &#2839;&#2891;&#2847;&#2879;&#2831; &#2858;&#2883;&#2871;&#2893;&#2848;&#2878;&#2864; &#2858;&#2893;&#2864;&#2852;&#2879;&#2854;&#2893;&#2860;&#2856;&#2893;&#2854;&#2879;&#2852;&#2878; &#2862;&#2882;&#2867;&#2837; &#39;&#2837;&#2887;&#2872;&#2893; &#2871;&#2893;&#2847;&#2849;&#2879;&#39; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2858;&#2849;&#2879;&#2860;&#2404; &#2852;&#2883;&#2851;&#2862;&#2882;&#2867; &#2872;&#2893;&#2852;&#2864;&#2864;&#2887; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880; &#2858;&#2881;&#2846;&#2893;&#2844;&#2879; &#2860;&#2879;&#2856;&#2879;&#2863;&#2891;&#2839; &#2858;&#2878;&#2823;&#2817; &#2831;&#2873;&#2879; &#2856;&#2878;&#2856;&#2891;&#45;&#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#2837;&#2881; &#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878;&#2862;&#2882;&#2867;&#2837; &#2861;&#2878;&#2860;&#2887; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2863;&#2878;&#2823;&#2853;&#2879;&#2866;&#2878;&#2404;';


    $strencodepincode = '&#2858;&#2879;&#2856;&#2893; &#2837;&#2891;&#2849;&#2876; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $strfindnow = '&#2838;&#2891;&#2844;&#2856;&#2893;&#2852;&#2881;';
    $strsearch = '&#2838;&#2891;&#2844;&#2856;&#2893;&#2852;&#2881;';

    $strsearchKeyword='Search Keywords';

    $strstorymunitigatitle = "&#2821;&#2861;&#2878;&#2860; &#2821;&#2872;&#2881;&#2860;&#2879;&#2855;&#2878; &#2854;&#2887;&#2823; &#2839;&#2852;&#2879; &#2837;&#2864;&#2881;&#2853;&#2879;&#2866;&#2887; &#2862;&#2855;&#2893;&#2911; &#2861;&#2860;&#2879;&#2871;&#2893;&#2911;&#2852;&#2837;&#2881; &#2856;&#2887;&#2823; &#2822;&#2839;&#2837;&#2881; &#2860;&#2850;&#2879;&#2860;&#2878;&#2864; &#2872;&#2893;&#2860;&#2858;&#2893;&#2856; &#2854;&#2887;&#2838;&#2879;&#2860;&#2878;&#2837;&#2881; &#2872;&#2887; &#2837;&#2887;&#2860;&#2887; &#2861;&#2881;&#2866;&#2879;&#2856;&#2878;&#2873;&#2878;&#2856;&#2893;&#2852;&#2879;&#2404; &#2404; &#2854;&#2880;&#2864;&#2893;&#2840; &#2854;&#2879;&#2856;&#2864; &#2872;&#2818;&#2840;&#2864;&#2893;&#2871;&#44; &#2837;&#2848;&#2879;&#2856; &#2858;&#2864;&#2879;&#2870;&#2893;&#2864;&#2862;&#44; &#2856;&#2879;&#2871;&#2893;&#2848;&#2878; &#2872;&#2873;&#2879;&#2852; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2863;&#2891;&#2839;&#2881; &#2873;&#2879;&#2817; &#2872;&#2887; &#2858;&#2878;&#2823;&#2853;&#2879;&#2866;&#2887; &#2872;&#2859;&#2867;&#2852;&#2878; &#2404; &#2839;&#2878;&#2823; &#2842;&#2864;&#2878;&#2867;&#2879;&#2864;&#2881; &#2873;&#2891;&#2823;&#2858;&#2878;&#2864;&#2879;&#2866;&#2887; &#2847;&#2893;&#2864;&#2887;&#2856;&#2893; &#2842;&#2878;&#2867;&#2837; &#2404; &#2831;&#2873;&#2878; &#2873;&#2891;&#2825;&#2843;&#2879; &#2852;&#2878;&#2841;&#2893;&#2837; &#2844;&#2880;&#2860;&#2856;&#2864; &#2872;&#2859;&#2867; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880; &#2404;";
    $strstorymunitigadesc = "&#2862;&#2881;&#2856;&#2879; &#2847;&#2879;&#2839;&#2878;&#2841;&#2893;&#2837; &#2844;&#2856;&#2893;&#2862; &#2831;&#2837; &#2839;&#2864;&#2880;&#2860; &#2822;&#2854;&#2879;&#2860;&#2878;&#2872;&#2880; &#2858;&#2864;&#2879;&#2860;&#2878;&#2864;&#2864;&#2887; &#44; &#2858;&#2866;&#2878;&#2854;&#2879;&#2856;&#2881; &#2872;&#2887; &#2873;&#2864;&#2878;&#2823; &#2860;&#2872;&#2856;&#2893;&#2852;&#2879; &#2858;&#2879;&#2852;&#2878;&#2841;&#2893;&#2837;&#2881; &#2404; &#2840;&#2864;&#2864; &#2821;&#2861;&#2878;&#2860; &#2821;&#2872;&#2881;&#2860;&#2879;&#2855;&#2878; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2860;&#2818;&#2842;&#2879;&#2860;&#2878; &#2835; &#2822;&#2839;&#2837;&#2881; &#2860;&#2850;&#2879;&#2860;&#2878;&#2864; &#2872;&#2893;&#2860;&#2858;&#2893;&#2856; &#2837;&#2881; &#2856;&#2887;&#2823; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2881;&#2831; &#2862;&#2881;&#2856;&#2879;&#2841;&#2893;&#2837;&#2864; &#2844;&#2880;&#2860;&#2856; &#2872;&#2818;&#2839;&#2893;&#2864;&#2878;&#2862; &#2404; &#2821;&#2861;&#2878;&#2860; &#2821;&#2856;&#2878;&#2847;&#2856; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2872;&#2893;&#2837;&#2881;&#2866; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878; &#2870;&#2887;&#2871; &#2837;&#2864;&#2879; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2878;&#2823;&#2817;  &#2872;&#2887; &#2863;&#2891;&#2839; &#2854;&#2879;&#2821;&#2856;&#2893;&#2852;&#2879; &#2860;&#2864;&#2839;&#2849; &#2822;&#2823; &#2847;&#2879; &#2822;&#2823; &#2864;&#2887; &#2404; &#2823;&#2866;&#2887;&#2837;&#2893;&#2847;&#2893;&#2864;&#2879;&#2837;&#2878;&#2866; &#2823;&#2846;&#2893;&#2844;&#2879;&#2911;&#2864;&#2879;&#2818;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2856;&#2887;&#2860;&#2878;&#2858;&#2864;&#2887; &#2866;&#2891;&#2837;&#2862;&#2891;&#2847;&#2879;&#2861; &#2858;&#2878;&#2823;&#2866;&#2847; &#40; &#2849;&#2893;&#2864;&#2823;&#2861;&#2864;&#41; &#2861;&#2878;&#2860;&#2887; &#2872;&#2887; &#2863;&#2891;&#2839; &#2854;&#2879;&#2821;&#2856;&#2893;&#2852;&#2879; &#2861;&#2878;&#2864;&#2852;&#2880;&#2911; &#2864;&#2887;&#2867;&#2860;&#2878;&#2823;&#2864;&#2887; &#2404; &#8205;&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2872;&#2887;  &#2847;&#2893;&#2864;&#2887;&#2856; &#2849;&#2893;&#2864;&#2878;&#2823;&#2861;&#2864; &#2861;&#2878;&#2860;&#2887; &#2870;&#2852;&#2878;&#2860;&#2893;&#2854;&#2880; &#2831;&#2837;&#2893;&#2872;&#2858;&#2893;&#2864;&#2887;&#2872; &#2847;&#2893;&#2864;&#2887;&#2856;&#2837;&#2881;  &#2858;&#2893;&#2864;&#2852;&#2879;&#2854;&#2879;&#2856; &#2858;&#2866;&#2878;&#2872;&#2878; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852; &#2842;&#2867;&#2878;&#2823; &#2863;&#2878;&#2825;&#2843;&#2856;&#2893;&#2852;&#2879; &#2831;&#2860;&#2818; &#2872;&#2887;&#2848;&#2878;&#2864;&#2881; &#2859;&#2887;&#2864;&#2881;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2831;&#2873;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862;&#2864; &#2872;&#2859;&#2867; &#2862;&#2878;&#2864;&#2893;&#2839; &#2404;";
    $strstorymunitiganame = "&#2862;&#2881;&#2856;&#2879; &#2847;&#2879;&#2839;&#2878;";
    $strstorymunitigadesi = "&#2866;&#2891;&#2837;&#2862;&#2891;&#2847;&#2879;&#2861; &#2858;&#2878;&#2823;&#2866;&#2847; &#40;&#2849;&#2893;&#2864;&#2878;&#2823;&#2861;&#2864; &#41; ";

    /* District  Levels in Map */
    $strKhurda = '&#2838;&#2891;&#2864;&#2893;&#2854;&#2893;&#2855;&#2878;';
    $strPuri = '&#2858;&#2881;&#2864;&#2880;';
    $strGanjam = '&#2839;&#2846;&#2893;&#2844;&#2878;&#2862;';
    $strGajapati = '&#2839;&#2844;&#2858;&#2852;&#2879;';
    $strRayagada = '&#2864;&#2878;&#2911;&#2839;&#2849;&#2878;';
    $strKalahandi = '&#2837;&#2867;&#2878;&#2873;&#2878;&#2851;&#2893;&#2849;&#2879;';
    $strBolangir = '&#2860;&#2866;&#2878;&#2841;&#2893;&#2839;&#2880;&#2864;';
    $strNuapada = '&#2856;&#2882;&#2822;&#2858;&#2849;&#2878;';
    $strSonepur = '&#2872;&#2891;&#2856;&#2858;&#2881;&#2864;';
    $strSambalpur = '&#2872;&#2862;&#2893;&#2860;&#2866;&#2858;&#2881;&#2864;';
    $strJharsuguda = '&#2845;&#2878;&#2864;&#2872;&#2881;&#2839;&#2881;&#2849;&#2878;';
    $strSundargarh = '&#2872;&#2881;&#2856;&#2893;&#2854;&#2864;&#2839;&#2849;';
    $strDeogarh = '&#2854;&#2887;&#2835;&#2839;&#2849;';
    $strKeonjhar = '&#2837;&#2887;&#2856;&#2893;&#2854;&#2881;&#2845;&#2864;';
    $strAnugul = '&#2821;&#2856;&#2881;&#2839;&#2891;&#2867;';
    $strBoudh = '&#2860;&#2892;&#2854;';
    $strNayagarh = '&#2856;&#2911;&#2878;&#2839;&#2849;';
    $strCuttack = '&#2837;&#2847;&#2837;';
    $strKendrapara = '&#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864;&#2878;&#2858;&#2849;&#2878;';
    $strJagatsinghpur = '&#2844;&#2839;&#2852;&#2872;&#2879;&#2818;&#2873;&#2858;&#2881;&#2864;';
    $strBhadrak = '&#2861;&#2854;&#2893;&#2864;&#2837;';
    $strJajpur = '&#2863;&#2878;&#2844;&#2858;&#2881;&#2864;';
    $strDhenkanal = '&#2850;&#2887;&#2841;&#2893;&#2837;&#2878;&#2856;&#2878;&#2867;';
    $strKoraput = '&#2837;&#2891;&#2864;&#2878;&#2858;&#2881;&#2847;';
    $strMalkangiri = '&#2862;&#2878;&#2866;&#2837;&#2878;&#2856;&#2839;&#2879;&#2864;&#2879;';
    $strNabrangpur = "&#2856;&#2860;&#2864;&#2841;&#2893;&#2839;&#2858;&#2881;&#2864;";
    $strMayurbhanj = "&#2862;&#2911;&#2881;&#2864;&#2861;&#2846;&#2893;&#2844;";
    $strBalasore = "&#2860;&#2878;&#2866;&#2887;&#2870;&#2893;&#2860;&#2864;";
    $strBargarh = "&#2860;&#2864;&#2839;&#2849;";
    $strKandhamal = "&#2837;&#2856;&#2893;&#2855;&#2862;&#2878;&#2867;";


    $strSectorFilterLbl = '&#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2838;&#2891;&#2844;&#2856;&#2893;&#2852;&#2881;';
    $strEligibilityFilterLbl = '&#2863;&#2891;&#2839;&#2893;&#2911;&#2852;&#2878; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2838;&#2891;&#2844;&#2856;&#2893;&#2852;&#2881;';
    $strDurationFilterLbl = 'Filter by Duration ';

    $str3monthDurationLbl = '&#51; &#2862;&#2878;&#2872; &#2864;&#2881; &#2837;&#2862;&#2893;';
    $str6monthDurationLbl = '&#51;&#45;&#54; &#2862;&#2878;&#2872;';
    $str12monthDurationLbl = '&#54;&#45;&#49;&#50; &#2862;&#2878;&#2872;';
    $str1yearDurationLbl = '&#49; &#2860;&#2864;&#2893;&#2871; &#2864;&#2881; &#2821;&#2855;&#2879;&#2837;&#2878; ';

    $strViewalbumlbl = "&#2822;&#2866;&#2860;&#2862; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;";

    $strCourseSearchlbl = "&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2821;&#2856;&#2881;&#2872;&#2878;&#2864;&#2887; &#2838;&#2891;&#2844;&#2856;&#2893;&#2852;&#2881;";

    $strCourseSearchReslbl1 = "&#2822;&#2862; &#2856;&#2879;&#2864;&#2893;&#2854;&#2893;&#2854;&#2887;&#2870;&#2879;&#2837;&#2878;&#2864;&#2887;";
    $strCourseSearchReslbl2 = "&#2847;&#2879; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2872;&#2882;&#2842;&#2856;&#2878; &#2864;&#2873;&#2879;&#2843;&#2879;";
    $strOfferedbylbl = "&#2872;&#2893;&#2837;&#2879;&#2866; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;";//"&#2858;&#2893;&#2864;&#2854;&#2852;&#2893;&#2852;";

    $strInstituteFinderdesclbl1 = "&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2821;&#2846;&#2893;&#2842;&#2867;&#2864;&#2887; &#2853;&#2879;&#2860;&#2878; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2837;&#2881; &#2844;&#2878;&#2851;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2856;&#2879;&#2844; &#2821;&#2846;&#2893;&#2842;&#2867;&#2864; &#2858;&#2879;&#2856;&#2893; &#2837;&#2891;&#2849;&#2876;&#2837;&#2881; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;&#44; &#2822;&#2862;&#2887; &#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2821;&#2846;&#2893;&#2842;&#2867;&#2864;&#2887; &#2853;&#2879;&#2860;&#2878; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2839;&#2881;&#2849;&#2879;&#2837; &#2860;&#2879;&#2871;&#2911;&#2864;&#2887; &#2844;&#2851;&#2878;&#2823;&#2860;&#2881;&#2404; &#2863;&#2854;&#2879; &#2822;&#2858;&#2851; &#2837;&#2879;&#2843;&#2879; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864; &#2856;&#2878;&#2862; &#2854;&#2887;&#2838;&#2879; &#2858;&#2878;&#2864;&#2881;&#2856;&#2878;&#2873;&#2878;&#2856;&#2893;&#2852;&#2879;&#44; &#2852;&#2878;&#2873;&#2878;&#2866;&#2887; &#2860;&#2893;&#2911;&#2872;&#2893;&#2852; &#2856; &#2873;&#2891;&#2823; ";
    $strInstituteFinderdesclbl2 = " &#2822;&#2862;&#2837;&#2881; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;&#2404;";

    $strGvtItilbl = "&#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;";

    $instinodishaloclbl1 = "&#2835;&#2849;&#2879;&#2870;&#2878;&#2864;&#2887; &#2853;&#2879;&#2860;&#2878; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;";
    $instinodishaloclbl2 = " ";

    $instinodishaSearchlbl1 = "&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2821;&#2846;&#2893;&#2842;&#2867; &#2858;&#2878;&#2838;&#2864;&#2887; ";
    $instinodishaSearchlbl2 = "&#2847;&#2879; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856; &#2862;&#2879;&#2867;&#2881;&#2843;&#2879; ";
    $strteachforodishaurl = '&#8216;&#2847;&#2879;&#2842; &#2859;&#2864; &#2835;&#2849;&#2879;&#2870;&#2878;&#8217; &#2929;&#2887;&#2860;&#2872;&#2878;&#2823;&#2847;';
    $strSeactorBrowselbl = '&#2872;&#2862;&#2872;&#2893;&#2852; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2860;&#2879;&#2871;&#2911;&#2864;&#2887; &#2844;&#2878;&#2851;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823; &#2838;&#2891;&#2844;&#2856;&#2893;&#2852;&#2881;';
    $strNorecordlbl = '&#2837;&#2892;&#2851;&#2872;&#2879; &#2852;&#2853;&#2893;&#2911; &#2825;&#2858;&#2866;&#2860;&#2893;&#2855; &#2856;&#2878;&#2873;&#2879;&#2817;';
    $strShorttermlbl = '&#2872;&#2893;&#2929;&#2867;&#2893;&#2858; &#2821;&#2860;&#2855;&#2879; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
    $strLongtermlbl = '&#2854;&#2880;&#2864;&#2893;&#2840; &#2821;&#2860;&#2855;&#2879; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';

    $strMapviewlbl = '&#2862;&#2878;&#2856;&#2842;&#2879;&#2852;&#2893;&#2864; &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $strListviewlbl = '&#2852;&#2878;&#2866;&#2879;&#2837;&#2878; &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $strOdishamaplbl = '&#2835;&#2908;&#2879;&#2870;&#2878; &#2862;&#2878;&#2856;&#2842;&#2879;&#2852;&#2893;&#2864;';
    $strDistInstlbl = '&#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;';
    $stritiResultlbl1 = '';
    $stritiResultlbl2 = '';
    $stritiResultlbl4 = '&#2864; &#2864;&#2887;&#2844;&#2866;&#2893;&#2847; &#2854;&#2887;&#2838;&#2878;&#2825;&#2843;&#2879;&#46; &#2872;&#2860;&#2881; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856; &#2854;&#2887;&#2838;&#2879;&#2860;&#2878;&#2837;&#2881; ';
    $stritiResultlbl3 = '&#2831;&#2848;&#2878;&#2864;&#2887; &#2837;&#2893;&#2866;&#2879;&#2837; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
    $strNewsdetaillbl = '&#2856;&#2893;&#2911;&#2881;&#2844; &#2849;&#2879;&#2847;&#2887;&#2866;';
    $strNewsHeadlinelbl = '&#2862;&#2881;&#2838;&#2893;&#2911; &#2838;&#2860;&#2864;';
    $strencodedistrict = '&#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2866;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $orlbl = "&#2837;&#2879;&#2862;&#2893;&#2860;&#2878;";
    // $strNewsReadmorelbl                  = '&#2821;&#2855;&#2879;&#2837; &#2858;&#2850;&#2856;&#2893;&#2852;&#2881;';

    $strButtomlbl1 = '&#2872;&#2864;&#2893;&#2852;&#2893;&#2852;&#2878;&#2860;&#2867;&#2880;';
    $strButtomlbl2 = '&#2821;&#2872;&#2893;&#2860;&#2880;&#2837;&#2878;&#2864;&#2893;&#2852;&#2879;';
    $strButtomlbl3 = '&#2839;&#2891;&#2858;&#2856;&#2880;&#2911; &#2856;&#2880;&#2852;&#2879;';
    $strButtomlbl4 = '&#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2864; &#2856;&#2837;&#2893;&#2872;&#2878;';

    $strHomeImglbl1 = '&#2831;&#2856;&#2831;&#2872;&#2849;&#2879;&#2872;&#2879;';
    $strHomeImglbl2 = '&#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2831;&#2860;&#2818; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
    $strHomeImglbl3 = ' &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
    $strHomeImglbl4 = '&#2852;&#2878;&#2866;&#2879;&#2862;&#2854;&#2878;&#2852;&#2878;';
    $strHomeImglbl5 = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2878;&#2823;&#2817; &#2863;&#2891;&#2844;&#2856;&#2878; ';
    $strHomeImglbl6 = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2878;&#2855;&#2856;';
    $strHomeImglbl7 = '&#2872;&#2879;&#2847;&#2879;&#2831;&#2872; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
    $strHomeImglbl8 = '&#2831;&#2862;&#2823;&#2831;&#2872; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
    $strHomeImglbl9 = '&#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2831;&#2860;&#2818; &#2860;&#2888;&#2871;&#2911;&#2879;&#2837; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878; &#2860;&#2879;&#2861;&#2878;&#2839;';
    $strHomeImglbl10 = '&#2856;&#2879;&#2911;&#2891;&#2844;&#2856; &#2856;&#2879;&#2864;&#2893;&#2854;&#2893;&#2854;&#2887;&#2870;&#2878;&#2867;&#2911;&#44; &#2831;&#2872;&#2849;&#2879;&#2847;&#2879;&#2823;';
    $strHomeImglbl11 = '&#2831;&#2872;&#2872;&#2879;&#2847;&#2879;&#2823;&#2861;&#2879;&#2847;&#2879; &#2835;&#2908;&#2879;&#2870;&#2878;';
    $strHomeImglbl12 = '&#2860;&#2888;&#2871;&#2911;&#2879;&#2837; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878; &#2831;&#2860;&#2818; &#2852;&#2878;&#2866;&#2879;&#2862; &#2856;&#2879;&#2864;&#2893;&#2854;&#2893;&#2854;&#2887;&#2870;&#2878;&#2867;&#2911;&#44; &#2831;&#2872;&#2849;&#2879;&#2847;&#2879;&#2823;';

    $strNewsSourcelbl = '&#2872;&#2882;&#2852;&#2893;&#2864;';
    $strNALevel = '&#2825;&#2858;&#2866;&#2860;&#2893;&#2855; &#2856;&#2878;&#2873;&#2879;&#2817;';
    $strPIAlbl = "&#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;";
    $strFromDatelbl = "&#2852;&#2878;&#2864;&#2879;&#2838;&#2864;&#2881;";
    $strToDatelbl = "&#2852;&#2878;&#2864;&#2879;&#2838;&#2837;&#2881;";

    $strViewCourselbl = "&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;        ";

    $strInFocuslbl = '&#2859;&#2891;&#2837;&#2872;&#2864;&#2887;';

    $strInfocuslbl1 = '&#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2862;&#2878;&#2864;&#2893;&#2839;&#2854;&#2864;&#2893;&#2870;&#2856; &#2831;&#2860;&#2818; &#2825;&#2852;&#2893;&#2852;&#2862; &#2821;&#2861;&#2893;&#2911;&#2878;&#2872; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2835;&#2908;&#2879;&#2870;&#2878;&#2864; &#2863;&#2881;&#2860;&#2839;&#2891;&#2871;&#2893;&#2848;&#2880; &#2856;&#2879;&#2870;&#2893;&#2842;&#2879;&#2852; &#2860;&#2879;&#2870;&#2893;&#2860;&#2864;&#2887; &#2870;&#2893;&#2864;&#2887;&#2871;&#2893;&#2848; &#2873;&#2891;&#2823;&#2858;&#2878;&#2864;&#2879;&#2860;&#2887;&#2404;&#8217;...';
    $strInfocuslbl2 = "&#2861;&#2878;&#2864;&#2852;&#2864;&#2887; &#2858;&#2891;&#2871;&#2878;&#2837; &#2835; &#2860;&#2911;&#2856; &#2870;&#2879;&#2867;&#2893;&#2858; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2919;&#2919;&#2927; &#2862;&#2879;&#2866;&#2879;&#2911;&#2856;&#2893; &#2866;&#2891;&#2837;&#2841;&#2893;&#2837;&#2881; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2854;&#2887;&#2823;&#2843;&#2879;...";
    $strInfocuslbl3 = "&#2919;&#2927;&#2926;&#2923; &#2862;&#2872;&#2879;&#2873;&#2878;&#2864;&#2887; &#2837;&#2887;&#2860;&#2867; &#2860;&#2878;&#2867;&#2879;&#2837;&#2878;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; &#2862;&#2878;&#2852;&#2893;&#2864; &#2922;&#2847;&#2879; &#2847;&#2893;&#2864;&#2887;&#2849;&#2864;&#2887; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864; ...";
    $strInfocuslbl4 = "&#2822;&#2860;&#2887; &#2929;&#2887;&#2871;&#2893;&#2847; &#2872;&#2864;&#2893;&#2861;&#2879;&#2872; (AWS) &#2920;&#2918;&#2919;&#2918; &#2862;&#2872;&#2879;&#2873;&#2878;&#2864;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2872;&#2873;&#2879;&#2852; &#2844;&#2849;&#2879;&#2852;&#2404; &#2854;&#2879;&#2856; &#2854;&#2911;&#2878;&#2866; &#2825;&#2858;&#2878;&#2855;&#2893;&#2911;&#2878;&#2911;... ";

    $strInfocusDesc1 = '&#2919;&#2927;&#2926;&#2923; &#2862;&#2872;&#2879;&#2873;&#2878;&#2864;&#2887; &#2837;&#2887;&#2860;&#2867; &#2860;&#2878;&#2867;&#2879;&#2837;&#2878;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; &#2862;&#2878;&#2852;&#2893;&#2864; &#2922;&#2847;&#2879; &#2847;&#2893;&#2864;&#2887;&#2849;&#2864;&#2887; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864; &#2870;&#2879;&#2867;&#2893;&#2858; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856; &#2854;&#2880;&#2864;&#2893;&#2840; &#2920;&#2925; &#2860;&#2864;&#2893;&#2871; &#2855;&#2864;&#2879; &#2856;&#2882;&#2822; &#2856;&#2882;&#2822; &#2837;&#2880;&#2864;&#2893;&#2852;&#2893;&#2852;&#2879;&#2862;&#2878;&#2856; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878; &#2837;&#2864;&#2879; &#2822;&#2872;&#2881;&#2843;&#2879;&#2404; &#2831;&#2873;&#2878; &#2870;&#2879;&#2867;&#2893;&#2858; &#2835; &#2860;&#2888;&#2871;&#2911;&#2879;&#2837; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2878;&#2823;&#2817; &#2821;&#2856;&#2893;&#2911;&#2852;&#2862; &#2870;&#2893;&#2864;&#2887;&#2871;&#2893;&#2848; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2861;&#2878;&#2860;&#2887; &#2872;&#2881;&#2856;&#2878;&#2862; &#2821;&#2864;&#2893;&#2844;&#2856; &#2837;&#2864;&#2879;&#2843;&#2879;&#2404; &#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2831;&#2848;&#2878;&#2864;&#2887; &#2926;&#2847;&#2879; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2825;&#2853;&#2879;&#2860;&#2878; &#2860;&#2887;&#2867;&#2887; &#2924;&#2925;&#2924;&#2847;&#2879; &#2872;&#2879;&#2847;&#2864;&#2887; &#2825;&#2861;&#2911; &#2860;&#2878;&#2867;&#2837; &#2835; &#2860;&#2878;&#2867;&#2879;&#2837;&#2878; &#2821;&#2855;&#2893;&#2911;&#2911;&#2856; &#2837;&#2864;&#2881;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404;<br/><br/>
&#2831;&#2873;&#2879; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2887; &#2861;&#2878;&#2864;&#2852; &#2872;&#2864;&#2837;&#2878;&#2864;&#2841;&#2893;&#2837; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880; &#2831;&#2862;&#2823;&#2831;&#2872; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2872; &#2821;&#2855;&#2879;&#2856;&#2864;&#2887; &#2862;&#2892;&#2867;&#2879;&#2837; &#2837;&#2862;&#2893;&#2858;&#2893;&#2911;&#2881;&#2847;&#2864; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#44; &#2847;&#2878;&#2866;&#2893;&#2866;&#2879;&#44; &#2837;&#2862;&#2893;&#2858;&#2893;&#2911;&#2881;&#2847;&#2864; &#2873;&#2878;&#2864;&#2893;&#2849;&#2835;&#2911;&#2878;&#2864;&#44; &#2862;&#2878;&#2866;&#2847;&#2879;&#2862;&#2879;&#2908;&#2879;&#2822; &#2835; &#2929;&#2887;&#2860;&#2858;&#2887;&#2844;&#2893; &#2849;&#2879;&#2844;&#2878;&#2823;&#2856;&#2893;&#44; &#2862;&#2892;&#2867;&#2879;&#2837; &#2860;&#2888;&#2854;&#2893;&#2911;&#2881;&#2852;&#2879;&#2837; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#44; &#2862;&#2892;&#2867;&#2879;&#2837; &#2860;&#2888;&#2854;&#2893;&#2911;&#2881;&#2852;&#2879;&#2837; &#2863;&#2856;&#2893;&#2852;&#2893;&#2864;&#2858;&#2878;&#2852;&#2879; &#2862;&#2864;&#2878;&#2862;&#2852;&#2879;&#44; &#2862;&#2891;&#2860;&#2878;&#2823;&#2866; &#2862;&#2864;&#2878;&#2862;&#2852;&#2879;&#44; &#2872;&#2879;&#2866;&#2887;&#2823;&#44; &#2872;&#2892;&#2864; &#2860;&#2879;&#2854;&#2893;&#2911;&#2881;&#2852;&#2870;&#2837;&#2893;&#2852;&#2879; &#2822;&#2854;&#2879; &#2860;&#2879;&#2871;&#2911;&#2864;&#2887; &#2872;&#2893;&#2929;&#2867;&#2893;&#2858; &#2821;&#2860;&#2855;&#2879; &#2852;&#2878;&#2866;&#2879;&#2862; &#2860;&#2879;&#2856;&#2878; &#2862;&#2882;&#2866;&#2893;&#2911;&#2864;&#2887; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2825;&#2843;&#2879;&#2404; &#2831;&#2873;&#2878; &#2860;&#2893;&#2911;&#2852;&#2880;&#2852; &#2864;&#2887;&#2867;&#2860;&#2878;&#2823; &#2831;&#2860;&#2818; &#2821;&#2856;&#2893;&#2911;&#2878;&#2856;&#2893;&#2911; &#2864;&#2878;&#2871;&#2893;&#2847;&#2893;&#2864;&#2878;&#2911;&#2852; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2860;&#2878;&#2837;&#2881; &#2852;&#2878;&#2866;&#2879;&#2862;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837;&#2881; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2881;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2831;&#2873;&#2879; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2844;&#2851;&#2878;&#2870;&#2881;&#2851;&#2878; &#2858;&#2893;&#2866;&#2887;&#2872;&#2862;&#2887;&#2851;&#2893;&#2847; &#2837;&#2891;&#2842;&#2879;&#2841;&#2893;&#2839; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856; &#2872;&#2873; &#2821;&#2856;&#2881;&#2860;&#2856;&#2893;&#2855;&#2879;&#2852; &#2821;&#2843;&#2879;&#2404; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2872;&#2859;&#2893;&#2847; &#2831;&#2860;&#2818; &#2837;&#2878;&#2862;&#2881;&#2856;&#2879;&#2837;&#2887;&#2870;&#2856; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2878;&#2823;&#2817; &#2856;&#2879;&#2837;&#2847; &#2860;&#2864;&#2893;&#2871;&#2864;&#2887; &#2837;&#2879;&#2843;&#2879; &#2842;&#2881;&#2837;&#2893;&#2852;&#2879;&#2856;&#2878;&#2862;&#2878; &#2872;&#2893;&#2860;&#2878;&#2837;&#2893;&#2871;&#2864;&#2879;&#2852; &#2873;&#2887;&#2823;&#2843;&#2879;&#59; &#2863;&#2878;&#2873;&#2878; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2862;&#2878;&#2856;&#2887; &#2860;&#2873;&#2881;&#2864;&#2878;&#2871;&#2893;&#2847;&#2893;&#2864;&#2880;&#2911; &#2837;&#2862;&#2893;&#2858;&#2878;&#2856;&#2880;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2860;&#2878;&#2837;&#2881; &#2872;&#2837;&#2893;&#2871;&#2862; &#2873;&#2887;&#2860;&#2887;&#2404; &#2831;&#2853;&#2879;&#2872;&#2873;&#2879;&#2852; &#2858;&#2879;&#2866;&#2878;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2821;&#2856;&#2893;&#2911;&#2878;&#2856;&#2893;&#2911; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2878;&#2823;&#2817; &#2837;&#2893;&#2864;&#2880;&#2849;&#2878;&#44; &#2860;&#2837;&#2893;&#2852;&#2883;&#2852;&#2878; &#2872;&#2873;&#2879;&#2852; &#2858;&#2878;&#2848;&#2893;&#2911;&#2842;&#2837;&#2893;&#2864;&#44; &#2872;&#2878;&#2818;&#2872;&#2893;&#2837;&#2883;&#2852;&#2879;&#2837; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2831;&#2860;&#2818; &#2872;&#2878;&#2862;&#2881;&#2873;&#2879;&#2837; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911; &#2822;&#2911;&#2891;&#2844;&#2856; &#2837;&#2864;&#2879;&#2860;&#2878; &#2825;&#2858;&#2864;&#2887; &#2872;&#2893;&#2869;&#2852;&#2856;&#2893;&#2852;&#2893;&#2864; &#2854;&#2883;&#2871;&#2893;&#2847;&#2879; &#2854;&#2879;&#2822;&#2863;&#2878;&#2825;&#2843;&#2879;&#2404;<br/><br/>
&#2870;&#2893;&#2864;&#2887;&#2851;&#2880;&#2839;&#2883;&#2873;&#2864;&#2887; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878; &#2860;&#2893;&#2911;&#2852;&#2880;&#2852; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864;&#2887; &#2872;&#2893;&#2862;&#2878;&#2864;&#2893;&#2847;&#2837;&#2893;&#2866;&#2878;&#2872; &#2864;&#2881;&#2862;&#2893; &#2872;&#2873;&#2879;&#2852; &#2872;&#2893;&#2862;&#2878;&#2864;&#2893;&#2847;&#2860;&#2891;&#2864;&#2893;&#2849;&#2864; &#2872;&#2881;&#2860;&#2879;&#2855;&#2878; &#2864;&#2873;&#2879;&#2843;&#2879;&#2404; &#2822;&#2849;&#2861;&#2878;&#2856;&#2893;&#2872; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878; &#2858;&#2878;&#2823;&#2817; &#2837;&#2862;&#2893;&#2858;&#2893;&#2911;&#2881;&#2847;&#2864; &#2835; &#2823;&#2851;&#2893;&#2847;&#2864;&#2856;&#2887;&#2847;&#2893; &#2872;&#2881;&#2860;&#2879;&#2855;&#2878; &#2844;&#2849;&#2879;&#2852; &#2823;&#45;&#2866;&#2878;&#2823;&#2860;&#2893;&#2864;&#2887;&#2864;&#2880; &#2864;&#2873;&#2879;&#2843;&#2879;&#2404; &#2825;&#2861;&#2911; &#2860;&#2878;&#2867;&#2837; &#2835; &#2860;&#2878;&#2867;&#2879;&#2837;&#2878;&#2841;&#2893;&#2837; &#2864;&#2873;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2873;&#2871;&#2893;&#2847;&#2887;&#2866;&#2893; &#2872;&#2881;&#2860;&#2879;&#2855;&#2878; &#2825;&#2858;&#2866;&#2860;&#2893;&#2855;&#2404;<br/><br/>
&#2858;&#2893;&#2864;&#2852;&#2879; &#2860;&#2864;&#2893;&#2871; &#2858;&#2878;&#2838;&#2878;&#2858;&#2878;&#2838;&#2879; &#2926;&#2918;&#37; &#2852;&#2878;&#2866;&#2879;&#2862;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837;&#2881; &#2873;&#2879;&#2864;&#2891; &#2862;&#2847;&#2891;&#2837;&#2864;&#2893;&#2858;&#44;&#2872;&#2878;&#2862;&#2872;&#2841;&#2893;&#2839;&#44; &#2847;&#2878;&#2847;&#2878; &#2862;&#2891;&#2847;&#2864;&#2893;&#2872;&#44; &#2911;&#2881;&#2856;&#2879;&#2847;&#2887;&#2837;&#2893; &#2837;&#2864;&#2893;&#2858;&#2891;&#2864;&#2887;&#2872;&#2856;&#44; &#2866;&#2878;&#2861;&#2878; &#2823;&#2851;&#2893;&#2847;&#2864;&#2856;&#2887;&#2872;&#2856;&#2878;&#2866;&#44; &#2822;&#2823;&#2847;&#2879;&#2872;&#2879; &#2858;&#2864;&#2879; &#2860;&#2849; &#2860;&#2849; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2879;&#2852; &#2837;&#2862;&#2893;&#2858;&#2878;&#2856;&#2880;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2854;&#2887;&#2823; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864; &#2856;&#2879;&#2844;&#2864; &#2872;&#2893;&#2869;&#2852;&#2856;&#2893;&#2852;&#2893;&#2864; &#2858;&#2864;&#2879;&#2842;&#2911; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2879;&#2843;&#2879;&#2404;<br/><br/>';

    $strInfocusDesc2 = "&#2861;&#2878;&#2864;&#2852;&#2864;&#2887; &#2858;&#2891;&#2871;&#2878;&#2837; &#2835; &#2860;&#2911;&#2856; &#2870;&#2879;&#2867;&#2893;&#2858; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2919;&#2919;&#2927; &#2862;&#2879;&#2866;&#2879;&#2911;&#2856;&#2893; &#2866;&#2891;&#2837;&#2841;&#2893;&#2837;&#2881; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2854;&#2887;&#2823;&#2843;&#2879;&#59; &#2863;&#2887;&#2825;&#2817;&#2853;&#2879;&#2864;&#2887; &#2870;&#2852;&#2837;&#2849;&#2878; &#2921;&#2923;&#37; &#2862;&#2873;&#2879;&#2867;&#2878; &#2837;&#2864;&#2893;&#2862;&#2844;&#2880;&#2860;&#2880; &#2821;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2872;&#2893;&#2929;&#2867;&#2893;&#2858; &#2837;&#2881;&#2870;&#2867;&#2880; &#2835; &#2821;&#2864;&#2893;&#2854;&#2893;&#2855; &#2837;&#2881;&#2870;&#2867;&#2880; &#2862;&#2873;&#2879;&#2867;&#2878; &#2837;&#2864;&#2893;&#2862;&#2844;&#2880;&#2860;&#2880;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; &#2860;&#2911;&#2856; &#2870;&#2879;&#2867;&#2893;&#2858; &#2860;&#2879;&#2858;&#2881;&#2867; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2872;&#2881;&#2863;&#2891;&#2839; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2879;&#2843;&#2879;&#2404; &#2831;&#2873;&#2878;&#2837;&#2881; &#2854;&#2883;&#2871;&#2893;&#2847;&#2879;&#2864;&#2887; &#2864;&#2838;&#2879; &#2856;&#2879;&#2837;&#2847; &#2860;&#2864;&#2893;&#2871;&#2864;&#2887; &#2835;&#2908;&#2879;&#2870;&#2878; &#2872;&#2864;&#2837;&#2878;&#2864; &#2864;&#2878;&#2844;&#2893;&#2911;&#2864;&#2887; &#2847;&#2887;&#2837;&#2893;&#2872;&#2847;&#2878;&#2823;&#2866;&#2893; &#2911;&#2881;&#2856;&#2879;&#2847; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2863;&#2891;&#2844;&#2856;&#2878; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2881;&#2852; &#2837;&#2864;&#2879;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2861;&#2878;&#2864;&#2852;&#2864; &#2837;&#2891;&#2823;&#2862;&#2893;&#2860;&#2847;&#2881;&#2864;&#44; &#2842;&#2887;&#2856;&#2893;&#2856;&#2878;&#2823;&#44; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864;&#2864; &#2852;&#2879;&#2864;&#2881;&#2858;&#2881;&#2864; &#2858;&#2864;&#2879; &#2858;&#2893;&#2864;&#2862;&#2881;&#2838; &#2847;&#2887;&#2837;&#2893;&#2872;&#2847;&#2878;&#2823;&#2866;&#2893; &#2911;&#2881;&#2856;&#2879;&#2847;&#2864;&#2887; &#8216;&#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2849; &#2823;&#2856;&#2893; &#2835;&#2908;&#2879;&#2870;&#2878;&#8217;&#2864; &#2860;&#2879;&#2870;&#2887;&#2871; &#2837;&#2864;&#2879; &#2860;&#2878;&#2867;&#2879;&#2837;&#2878;&#2862;&#2878;&#2856;&#2887; &#2839;&#2881;&#2864;&#2881;&#2852;&#2893;&#2929;&#2858;&#2882;&#2864;&#2893;&#2851;&#2893;&#2851; &#2861;&#2882;&#2862;&#2879;&#2837;&#2878; &#2856;&#2879;&#2861;&#2878;&#2825;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404;";
    $strInfocusDesc3 = "
&#2872;&#2878;&#2873;&#2879; &#2831;&#2837;&#2893;&#2872;&#2858;&#2891;&#2864;&#2893;&#2847; &#2858;&#2893;&#2864;&#2878;&#2823;&#2861;&#2887;&#2847; &#2866;&#2879;&#2862;&#2879;&#2847;&#2887;&#2849; &#2873;&#2887;&#2825;&#2843;&#2879; &#2831;&#2858;&#2864;&#2879; &#2831;&#2837; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879;&#2854;&#2878;&#2852;&#2878; &#2863;&#2887;&#2825;&#2817;&#2853;&#2879;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2837;&#2864;&#2893;&#2862;&#2842;&#2878;&#2864;&#2880;&#2862;&#2878;&#2856;&#2887; &#2860;&#2879;&#2870;&#2887;&#2871;&#2837;&#2864;&#2879; &#2835;&#2908;&#2879;&#2870;&#2878;&#2864; &#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2835; &#2860;&#2887;&#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2878;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2831;&#2873;&#2878;&#2864; &#2837;&#2864;&#2893;&#2862;&#2842;&#2878;&#2864;&#2880;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2858;&#2878;&#2838;&#2878;&#2858;&#2878;&#2838;&#2879; &#2924;&#2918;&#37; &#2862;&#2873;&#2879;&#2867;&#2878; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911; &#2837;&#2864;&#2881;&#2843;&#2856;&#2893;&#2852;&#2879;&#59; &#2863;&#2887;&#2825;&#2817;&#2862;&#2878;&#2856;&#2887; &#2837;&#2879; &#2835;&#2908;&#2879;&#2870;&#2878;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878;&#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852;&#2404; &#2872;&#2878;&#2873;&#2879; &#2831;&#2837;&#2893;&#2872;&#2858;&#2891;&#2864;&#2893;&#2847; &#2849;&#2879;&#2849;&#2879;&#2911;&#2881;&#45;&#2844;&#2879;&#2837;&#2887;&#2929;&#2878;&#2823;&#44; &#2835;&#2908;&#2879;&#2870;&#2878; &#2821;&#2855;&#2879;&#2856;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880; &#2861;&#2878;&#2860;&#2887; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911; &#2837;&#2864;&#2881;&#2843;&#2879; &#2831;&#2860;&#2818; &#2835;&#2908;&#2879;&#2870;&#2878;&#2864;&#2881; &#2854;&#2837;&#2893;&#2871; &#2821;&#2858;&#2864;&#2887;&#2847;&#2864;&#2841;&#2893;&#2837;&#2881; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2854;&#2887;&#2825;&#2843;&#2879;&#2404; &#2856;&#2879;&#2837;&#2847;&#2864;&#2887; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878; &#2856;&#2879;&#2844;&#2864; &#2831;&#2837; &#2870;&#2878;&#2838;&#2878; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864;&#2864;&#2887; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878; &#2837;&#2864;&#2879;&#2843;&#2879;&#2404; &#2872;&#2878;&#2873;&#2879; &#2831;&#2837;&#2893;&#2872;&#2858;&#2891;&#2864;&#2893;&#2847;&#2864; &#2821;&#2855;&#2879;&#2837;&#2878;&#2864;&#2880;&#2841;&#2893;&#2837; &#2837;&#2873;&#2879;&#2860;&#2878; &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880;&#44; &#2835;&#2908;&#2879;&#2870;&#2878;&#2864; &#2837;&#2881;&#2870;&#2867;&#2880; &#2837;&#2864;&#2893;&#2862;&#2880;&#2862;&#2878;&#2856;&#2887; &#2860;&#2887;&#2870; &#2856;&#2879;&#2871;&#2893;&#2848;&#2878;&#2864; &#2872;&#2873; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911; &#2837;&#2864;&#2879;&#2853;&#2878;&#2856;&#2893;&#2852;&#2879;&#2404; &#2872;&#2887;&#2862;&#2878;&#2856;&#2887; &#2860;&#2873;&#2881;&#2852; &#2870;&#2883;&#2841;&#2893;&#2838;&#2867;&#2879;&#2852;&#2404; &#2838;&#2881;&#2860;&#2870;&#2880;&#2840;&#2893;&#2864; &#2844;&#2893;&#2846;&#2878;&#2856; &#2822;&#2873;&#2864;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878; &#2872;&#2873; &#2856;&#2879;&#2844; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878;&#2837;&#2881; &#2872;&#2848;&#2879;&#2837; &#2861;&#2878;&#2860;&#2887; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2864;&#2887; &#2866;&#2839;&#2878;&#2825;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; <br/><br/>
";
    $strInfocusDesc4 = "&#2822;&#2860;&#2887; &#2929;&#2887;&#2871;&#2893;&#2847; &#2872;&#2864;&#2893;&#2861;&#2879;&#2872; (AWS) &#2920;&#2918;&#2919;&#2918; &#2862;&#2872;&#2879;&#2873;&#2878;&#2864;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2872;&#2873;&#2879;&#2852; &#2844;&#2849;&#2879;&#2852;&#2404; &#2854;&#2879;&#2856; &#2854;&#2911;&#2878;&#2866; &#2825;&#2858;&#2878;&#2855;&#2893;&#2911;&#2878;&#2911; &#2839;&#2893;&#2864;&#2878;&#2862;&#2880;&#2851; &#2837;&#2892;&#2870;&#2866;&#2893;&#2911; &#2863;&#2891;&#2844;&#2856;&#2878; &#40;&#2849;&#2879;&#2849;&#2879;&#2911;&#2881;&#45;&#2844;&#2879;&#2837;&#2887;&#2929;&#2878;&#2823;&#41; &#2821;&#2855;&#2879;&#2856;&#2864;&#2887; &#2839;&#2893;&#2864;&#2878;&#2862;&#2878;&#2846;&#2893;&#2842;&#2867;&#2864; &#2860;&#2879;&#2870;&#2887;&#2871; &#2837;&#2864;&#2879; &#2839;&#2864;&#2879;&#2860; &#2870;&#2893;&#2864;&#2887;&#2851;&#2880;&#2864; &#2863;&#2881;&#2860;&#2839;&#2891;&#2871;&#2893;&#2848;&#2880;&#2841;&#2893;&#2837;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2920;&#2918;&#2919;&#2922; &#2862;&#2872;&#2879;&#2873;&#2878;&#2864;&#2881; &#2839;&#2893;&#2864;&#2878;&#2862;&#2893;&#2911; &#2825;&#2856;&#2893;&#2856;&#2911;&#2856; &#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2878;&#2867;&#2911; &#2872;&#2873;&#2879;&#2852; &#2872;&#2873;&#2861;&#2878;&#2839;&#2879;&#2852;&#2878;&#2864;&#2887; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911; &#2837;&#2864;&#2881;&#2843;&#2879;&#2404;  &#2831;&#2873;&#2879; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878; &#2849;&#2879;&#2849;&#2879;&#2911;&#2881;&#45;&#2844;&#2879;&#2837;&#2887;&#2929;&#2878;&#2823; &#2821;&#2855;&#2879;&#2856;&#2864;&#2887; &#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2921;&#2847;&#2879; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858;&#2837;&#2881; &#2872;&#2859;&#2867;&#2852;&#2878;&#2864; &#2872;&#2873; &#2870;&#2887;&#2871; &#2837;&#2864;&#2879;&#2843;&#2879;&#2404; &#2920;&#2918;&#2926;&#2919;&#2844;&#2851; &#2839;&#2893;&#2864;&#2878;&#2862;&#2878;&#2846;&#2893;&#2842;&#2867; &#2863;&#2881;&#2860;&#2839;&#2891;&#2871;&#2893;&#2848;&#2880;&#2841;&#2893;&#2837;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2879;&#2843;&#2879;&#59; &#2863;&#2887;&#2825;&#2817;&#2853;&#2879;&#2864;&#2881; &#2919;&#2922;&#2922;&#2923;&#2844;&#2851; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2870;&#2879;&#2867;&#2893;&#2858; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2822;&#2860;&#2887; &#2929;&#2887;&#2871;&#2893;&#2847; &#2860;&#2879;&#2870;&#2893;&#2860;&#2878;&#2872; &#2837;&#2864;&#2887; &#2863;&#2887;&#59; &#2863;&#2887;&#2825;&#2817;&#2862;&#2878;&#2856;&#2887; &#2872;&#2862;&#2878;&#2844;&#2864; &#2862;&#2881;&#2838;&#2893;&#2911; &#2872;&#2893;&#2864;&#2891;&#2852;&#2864;&#2881; &#2860;&#2878;&#2854; &#2858;&#2849;&#2879;&#2863;&#2878;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2862;&#2881;&#2838;&#2893;&#2911; &#2872;&#2893;&#2864;&#2891;&#2852;&#2837;&#2881; &#2822;&#2851;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2862;&#2878;&#2864;&#2893;&#2839; &#2854;&#2864;&#2893;&#2870;&#2856; &#2872;&#2873;&#2879;&#2852; &#2854;&#2893;&#2869;&#2879;&#2852;&#2880;&#2911; &#2872;&#2881;&#2863;&#2891;&#2839; &#2854;&#2887;&#2860;&#2878;&#2864; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;&#2852;&#2878; &#2864;&#2873;&#2879;&#2843;&#2879; &#2831;&#2860;&#2818; &#2831;&#2873;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2872;&#2862;&#2893;&#2861;&#2860; &#2873;&#2891;&#2823;&#2858;&#2878;&#2864;&#2879;&#2860;&#2404; &#2831;&#2853;&#2879;&#2858;&#2878;&#2823;&#2817; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878; &#2925;&#2918;&#2918;&#2918;&#2864;&#2881; &#2825;&#2864;&#2893;&#2854;&#2893;&#2855;&#2893;&#2869; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2841;&#2893;&#2837;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2879;&#2853;&#2879;&#2860;&#2878; &#2860;&#2887;&#2867;&#2887; &#2852;&#2856;&#2862;&#2855;&#2893;&#2911;&#2864;&#2881; &#2858;&#2878;&#2838;&#2878;&#2858;&#2878;&#2838;&#2879; &#2923;&#2918;&#2918;&#2918; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2870;&#2879;&#2867;&#2893;&#2858; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2872;&#2878;&#2864;&#2878; &#2835;&#2908;&#2879;&#2870;&#2878;&#2864;&#2887; &#2822;&#2860;&#2887; &#2929;&#2887;&#2871;&#2893;&#2847;&#2864; &#2862;&#2891;&#2847; &#2919;&#2919;&#2847;&#2879; &#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2864;&#2873;&#2879;&#2843;&#2879;&#2404; &#2872;&#2887;&#2848;&#2878;&#2864;&#2887; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2841;&#2893;&#2837;&#2881; &#2873;&#2872;&#2893;&#2858;&#2879;&#2847;&#2878;&#2866;&#2879;&#2847;&#2879;&#44; &#2823;&#2866;&#2887;&#2837;&#2893;&#2847;&#2893;&#2864;&#2879;&#2837;&#2878;&#2866;&#44; &#2823;&#2851;&#2893;&#2849;&#2871;&#2893;&#2847;&#2893;&#2864;&#2879;&#2822;&#2866; &#2872;&#2879;&#2929;&#2879;&#2841;&#2893;&#2839; &#2862;&#2887;&#2872;&#2879;&#2856;&#2893;&#44; &#2859;&#2879;&#2856;&#2879;&#2870;&#2864; &#2831;&#2860;&#2818; &#2842;&#2887;&#2837;&#2864;&#2893;&#44; &#2860;&#2893;&#2911;&#2881;&#2847;&#2879; &#2837;&#2887;&#2911;&#2878;&#2864; &#2822;&#2854;&#2879; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2860;&#2879;&#2861;&#2878;&#2839;&#2864;&#2887; &#2862;&#2892;&#2867;&#2879;&#2837; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2825;&#2843;&#2879;&#2404; &#2831;&#2873;&#2879; &#2919;&#2919;&#2847;&#2879; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864;&#2864;&#2887; &#2860;&#2864;&#2893;&#2871;&#2837;&#2881; &#2858;&#2878;&#2838;&#2878;&#2858;&#2878;&#2838;&#2879; &#2923;&#2918;&#2918;&#2918; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2841;&#2893;&#2837;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2878;&#2825;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404;<br/>
			
&#2856;&#2879;&#2837;&#2847;&#2864;&#2887; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878; &#2856;&#2879;&#2864;&#2878;&#2870;&#2893;&#2864;&#2911; &#2862;&#2873;&#2879;&#2867;&#2878;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; ‘ET WISH’ &#2856;&#2878;&#2862;&#2864;&#2887; &#2831;&#2837; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#2870;&#2881;&#2861;&#2878;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2879;&#2843;&#2879;&#2404; &#2822;&#2870;&#2893;&#2864;&#2911;&#2872;&#2893;&#2853;&#2867;&#2864;&#2887; &#2864;&#2873;&#2881;&#2853;&#2879;&#2860;&#2878; &#2862;&#2873;&#2879;&#2867;&#2878;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2879; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2872;&#2878;&#2862;&#2878;&#2844;&#2879;&#2837; &#2831;&#2860;&#2818; &#2822;&#2864;&#2893;&#2853;&#2879;&#2837; &#2872;&#2893;&#2853;&#2879;&#2852;&#2879; &#2872;&#2881;&#2854;&#2883;&#2850; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2831;&#2873;&#2879; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911; &#2864;&#2838;&#2879;&#2843;&#2879;&#2404; &#2831;&#2873;&#2879; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2821;&#2855;&#2879;&#2856;&#2864;&#2887; &#2872;&#2882;&#2842;&#2856;&#2878; &#2835; &#2858;&#2893;&#2864;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879;&#2860;&#2879;&#2854;&#2893;&#2911;&#2878;&#44; &#2872;&#2859;&#2893;&#2847; &#2872;&#2893;&#2837;&#2879;&#2866;&#44; &#2872;&#2878;&#2837;&#2893;&#2871;&#2864;&#2852;&#2878; &#2831;&#2860;&#2818; &#2821;&#2852;&#2879;&#2853;&#2879;&#2872;&#2852;&#2893;&#2837;&#2878;&#2864; &#2822;&#2854;&#2879;&#2864;&#2887; &#2860;&#2879;&#2871;&#2911;&#2839;&#2852; &#2831;&#2860;&#2818; &#2860;&#2893;&#2911;&#2860;&#2873;&#2878;&#2864;&#2879;&#2837; &#2844;&#2893;&#2846;&#2878;&#2856; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2879;&#2822;&#2863;&#2878;&#2825;&#2843;&#2879;&#2404; &#2872;&#2860;&#2881;&#2848;&#2878;&#2864;&#2881; &#2860;&#2849; &#2837;&#2853;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2831;&#2873;&#2879; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862;&#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2920;&#2925;&#2844;&#2851;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2881; &#2920;&#2924;&#2844;&#2851; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2873;&#2891;&#2847;&#2887;&#2866; &#2831;&#2860;&#2818; &#2873;&#2872;&#2893;&#2858;&#2879;&#2847;&#2878;&#2866;&#2864;&#2887; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404;
<br><br>
&#2821;&#2855;&#2879;&#2837; &#2844;&#2878;&#2851;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817;  www.yousucceed.co.in &#2837;&#2881; &#2863;&#2878;&#2822;&#2856;&#2893;&#2852;&#2881;&#2404;";
    $strInfocusDesc5 = "&#8216;&#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2862;&#2878;&#2864;&#2893;&#2839;&#2854;&#2864;&#2893;&#2870;&#2856; &#2831;&#2860;&#2818; &#2825;&#2852;&#2893;&#2852;&#2862; &#2821;&#2861;&#2893;&#2911;&#2878;&#2872; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2835;&#2908;&#2879;&#2870;&#2878;&#2864; &#2863;&#2881;&#2860;&#2839;&#2891;&#2871;&#2893;&#2848;&#2880; &#2856;&#2879;&#2870;&#2893;&#2842;&#2879;&#2852; &#2860;&#2879;&#2870;&#2893;&#2860;&#2864;&#2887; &#2870;&#2893;&#2864;&#2887;&#2871;&#2893;&#2848; &#2873;&#2891;&#2823;&#2858;&#2878;&#2864;&#2879;&#2860;&#2887;&#2404;&#8217;<br/><br/>
&#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864;&#2864; &#2821;&#2855;&#2893;&#2911;&#2837;&#2893;&#2871; &#2870;&#2893;&#2864;&#2880;&#2862;&#2852;&#2879; &#2844;&#2879;&#2852;&#2878;&#2862;&#2879;&#2852;&#2893;&#2864; &#2870;&#2852;&#2858;&#2853;&#2880;&#2841;&#2893;&#2837; &#2862;&#2852;&#2864;&#2887; &#2863;&#2887;&#2837;&#2892;&#2851;&#2872;&#2879; &#2860;&#2883;&#2852;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2817; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893; &#2856;&#2879;&#2852;&#2893;&#2911;&#2878;&#2856;&#2893;&#2852; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;&#44; &#2831;&#2873;&#2878; &#2837;&#2887;&#2860;&#2867; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2837;&#2879;&#2862;&#2893;&#2860;&#2878; &#2858;&#2866;&#2879;&#2847;&#2887;&#2837;&#2856;&#2879;&#2837;&#2893; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2872;&#2880;&#2862;&#2879;&#2852; &#2864;&#2873;&#2879;&#2860;&#2878; &#2825;&#2842;&#2879;&#2852; &#2856;&#2881;&#2873;&#2887;&#2817;&#2404; &#2852;&#2878;&#2841;&#2893;&#2837; &#2822;&#2852;&#2893;&#2862;&#2860;&#2879;&#2870;&#2893;&#2860;&#2878;&#2872; &#2863;&#2887;&#44; &#2835;&#2908;&#2879;&#2822; &#2863;&#2881;&#2860;&#2839;&#2891;&#2871;&#2893;&#2848;&#2880; &#2863;&#2887;&#2837;&#2892;&#2851;&#2872;&#2879; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2864;&#2887; &#2858;&#2864;&#2879;&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2856;&#2864; &#2860;&#2878;&#2864;&#2893;&#2852;&#2893;&#2852;&#2878;&#2860;&#2873; &#2872;&#2878;&#2844;&#2879;&#2858;&#2864;&#2879;&#2860;&#2887;&#44; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2825;&#2852;&#2893;&#2852;&#2862; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2879;&#2852; &#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2862;&#2878;&#2864;&#2893;&#2839;&#2854;&#2864;&#2893;&#2870;&#2856;&#2864; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;&#2852;&#2878; &#2864;&#2873;&#2879;&#2843;&#2879;&#59; &#2863;&#2878;&#2873;&#2878; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2854;&#2837;&#2893;&#2871;&#2852;&#2878;&#2864; &#2860;&#2879;&#2837;&#2878;&#2870; &#2873;&#2891;&#2823;&#2858;&#2878;&#2864;&#2879;&#2860;&#2404; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878;&#2837;&#2881; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2837;&#2881; &#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2839;&#2881;&#2864;&#2881;&#2852;&#2893;&#2869; &#2854;&#2879;&#2822;&#2839;&#2866;&#2887; &#2822;&#2844;&#2879;&#2864; &#2863;&#2881;&#2860;&#2858;&#2879;&#2850;&#2880; &#8216;&#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2849; &#2823;&#2856;&#2893; &#2835;&#2908;&#2879;&#2870;&#2878;&#8217;&#2864; &#2870;&#2893;&#2864;&#2887;&#2871;&#2893;&#2848; &#2825;&#2854;&#2878;&#2873;&#2864;&#2851; &#2861;&#2878;&#2860;&#2887; &#2856;&#2879;&#2844;&#2837;&#2881; &#2858;&#2893;&#2864;&#2852;&#2879;&#2858;&#2878;&#2854;&#2879;&#2852; &#2837;&#2864;&#2879;&#2858;&#2878;&#2864;&#2879;&#2860;&#2878; &#2872;&#2873;&#2879;&#2852; &#2839;&#2893;&#2866;&#2891;&#2860;&#2878;&#2866; &#2860;&#2893;&#2864;&#2878;&#2851;&#2893;&#2849;&#2864;&#2887; &#2856;&#2879;&#2844;&#2837;&#2881; &#2858;&#2864;&#2879;&#2851;&#2852; &#2837;&#2864;&#2879;&#2858;&#2878;&#2864;&#2879;&#2860;&#2887;&#2404; &#2856;&#2879;&#2837;&#2847;&#2864;&#2887; &#2870;&#2887;&#2871; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#8216;&#2835;&#2908;&#2879;&#2870;&#2878; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2872;&#45;&#2920;&#2918;&#2919;&#2926;&#8217; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2879;&#2852;&#2878;&#2864; &#2821;&#2861;&#2879;&#2844;&#2893;&#2846;&#2852;&#2878;&#2837;&#2881; &#2856;&#2887;&#2823; &#2872;&#2887; &#2837;&#2873;&#2879;&#2843;&#2856;&#2893;&#2852;&#2879;&#44; &#2831;&#2873;&#2878;&#2864; &#2859;&#2867;&#2878;&#2859;&#2867; &#2835; &#2837;&#2879;&#2843;&#2879; &#2856;&#2882;&#2822; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2863;&#2881;&#2860;&#2858;&#2879;&#2850;&#2880;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2853;&#2879;&#2860;&#2878; &#2822;&#2839;&#2893;&#2864;&#2873; &#2831;&#2860;&#2818; &#2831;&#2853;&#2879;&#2864;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2858;&#2893;&#2864;&#2854;&#2864;&#2893;&#2870;&#2856; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2825;&#2858;&#2864;&#2887; &#2853;&#2879;&#2860;&#2878; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2860;&#2879;&#2870;&#2893;&#2860;&#2878;&#2872;&#2837;&#2881; &#2854;&#2864;&#2893;&#2870;&#2878;&#2825;&#2843;&#2879;&#2404; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2856;&#2879;&#2870;&#2893;&#2842;&#2879;&#2852; &#2861;&#2878;&#2860;&#2887; &#2863;&#2887;&#2837;&#2892;&#2851;&#2872;&#2879; &#2860;&#2893;&#2911;&#2837;&#2893;&#2852;&#2879;&#2864; &#2872;&#2878;&#2862;&#2878;&#2844;&#2879;&#2837; &#2831;&#2860;&#2818; &#2821;&#2864;&#2893;&#2853;&#2856;&#2888;&#2852;&#2879;&#2837; &#2872;&#2893;&#2853;&#2879;&#2852;&#2879;&#2864;&#2887; &#2860;&#2893;&#2911;&#2878;&#2858;&#2837; &#2872;&#2881;&#2855;&#2878;&#2864; &#2822;&#2851;&#2879;&#2858;&#2878;&#2864;&#2879;&#2860;&#2404; <br/><br/>
&#2870;&#2893;&#2864;&#2880;&#2862;&#2852;&#2879; &#2870;&#2852;&#2858;&#2853;&#2880; &#2821;&#2856;&#2887;&#2837;&#2839;&#2881;&#2849;&#2879;&#2831; &#2872;&#2859;&#2867;&#2852;&#2878;&#2864; &#2821;&#2855;&#2879;&#2837;&#2878;&#2864;&#2879;&#2851;&#2880;&#2404; &#2872;&#2887;&#2853;&#2879;&#2862;&#2855;&#2893;&#2911;&#2864;&#2881; &#2839;&#2891;&#2847;&#2879;&#2831; &#2858;&#2893;&#2864;&#2862;&#2881;&#2838; &#2872;&#2859;&#2867;&#2852;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2844;&#2847;&#2851;&#2880;&#44; &#2838;&#2881;&#2854;&#2881;&#2864;&#2858;&#2881;&#2864;&#2887; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#59; &#2863;&#2887;&#2825;&#2817;&#2853;&#2879;&#2858;&#2878;&#2823;&#2817; &#2872;&#2887; &#2839;&#2864;&#2893;&#2860; &#2821;&#2856;&#2881;&#2861;&#2860; &#2837;&#2864;&#2856;&#2893;&#2852;&#2879;&#2404; &#2864;&#2878;&#2844;&#2893;&#2911;&#2864; &#2831;&#2873;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2831;&#2837; &#2862;&#2878;&#2852;&#2893;&#2864; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#44; &#2863;&#2878;&#2873;&#2878; &#2872;&#2893;&#2869;&#2852;&#2856;&#2893;&#2852;&#2893;&#2864; &#2861;&#2878;&#2860;&#2887; &#2854;&#2879;&#2860;&#2893;&#2911;&#2878;&#2841;&#2893;&#2839;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; &#2825;&#2854;&#2893;&#2854;&#2879;&#2871;&#2893;&#2847;&#2404; &#2852;&#2878;&#2841;&#2893;&#2837; &#2837;&#2873;&#2879;&#2860;&#2878; &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880;&#44; &#2831;&#2873;&#2879; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878; &#2835; &#2831;&#2873;&#2878;&#2864; &#2858;&#2864;&#2879;&#2842;&#2878;&#2867;&#2856;&#2878; &#2858;&#2878;&#2823;&#2817; &#2856;&#2878;&#2856;&#2878; &#2872;&#2862;&#2872;&#2893;&#2911;&#2878;&#2864; &#2872;&#2862;&#2893;&#2862;&#2881;&#2838;&#2880;&#2856; &#2873;&#2887;&#2860;&#2878;&#2837;&#2881; &#2858;&#2849;&#2879;&#2853;&#2879;&#2866;&#2878;&#2404; &#2837;&#2879;&#2856;&#2893;&#2852;&#2881; &#2858;&#2864;&#2887; &#2831;&#2873;&#2879; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2881; &#2860;&#2878;&#2873;&#2878;&#2864;&#2881;&#2853;&#2879;&#2860;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837;&#2881; &#2862;&#2881;&#2838;&#2893;&#2911; &#2872;&#2893;&#2864;&#2891;&#2852;&#2864;&#2887; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2879;&#2852; &#2873;&#2887;&#2825;&#2853;&#2879;&#2860;&#2878; &#2854;&#2887;&#2838;&#2879; &#2838;&#2881;&#2872;&#2879; &#2866;&#2878;&#2839;&#2887;&#2404; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864;&#2864; &#2821;&#2855;&#2893;&#2911;&#2837;&#2893;&#2871; &#2861;&#2878;&#2860;&#2887; &#2854;&#2878;&#2911;&#2879;&#2852;&#2893;&#2869; &#2839;&#2893;&#2864;&#2873;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2864;&#2887; &#2852;&#2878;&#2841;&#2893;&#2837; &#2825;&#2854;&#2893;&#2911;&#2862;&#2864;&#2887; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864;&#2887; &#2923;&#2918;&#2918;&#2847;&#2879; &#2872;&#2879;&#2847;&#2893; &#2860;&#2883;&#2854;&#2893;&#2855;&#2879; &#2873;&#2891;&#2823;&#2853;&#2879;&#2866;&#2878;&#2404; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864;&#2881; &#2825;&#2852;&#2893;&#2852;&#2880;&#2864;&#2893;&#2851;&#2893;&#2851; &#2873;&#2887;&#2825;&#2853;&#2879;&#2860;&#2878; &#2872;&#2862;&#2872;&#2893;&#2852; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880; &#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2866;&#2887; &#2872;&#2887; &#2838;&#2881;&#2872;&#2879; &#2821;&#2856;&#2881;&#2861;&#2860; &#2837;&#2864;&#2879;&#2853;&#2878;&#2856;&#2893;&#2852;&#2879;&#2404;<br/><br/>
&#2822;&#2846;&#2893;&#2842;&#2867;&#2879;&#2837; &#2831;&#2860;&#2818; &#2860;&#2879;&#2870;&#2893;&#2869;&#2872;&#2893;&#2852;&#2864;&#2880;&#2911; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2879;&#2852;&#2878;&#2864;&#2887; &#2821;&#2818;&#2870;&#2839;&#2893;&#2864;&#2873;&#2851; &#2837;&#2864;&#2881;&#2853;&#2879;&#2860;&#2878; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880;&#2841;&#2893;&#2837;&#2881; &#2856;&#2887;&#2823; &#2872;&#2887; &#2860;&#2887;&#2870; &#2822;&#2870;&#2878;&#2860;&#2878;&#2854;&#2880; &#2821;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2872;&#2887; &#2872;&#2881;&#2856;&#2879;&#2870;&#2893;&#2842;&#2879;&#2852; &#2863;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2887; &#2860;&#2879;&#2844;&#2887;&#2852;&#2878; &#2873;&#2891;&#2823; &#2859;&#2887;&#2864;&#2879;&#2860;&#2887; &#2831;&#2860;&#2818; &#8216;&#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2849; &#2823;&#2856;&#2893; &#2835;&#2908;&#2879;&#2870;&#2878;&#8217;&#2864; &#2839;&#2892;&#2864;&#2860; &#2860;&#2883;&#2854;&#2893;&#2855;&#2879; &#2837;&#2864;&#2879;&#2860;&#2887;&#2404;";
    $strCoffeedaylbl = '&#2837;&#2878;&#2859;&#2887; &#2837;&#2859;&#2879; &#2849;&#2887;';

    $strPaginglbl1 = '&#2872;&#2860;&#2881; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $strPaginglbl2 = '&#2858;&#2883;&#2871;&#2893;&#2848;&#2878; &#2821;&#2856;&#2881;&#2872;&#2878;&#2864;&#2887; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';

    $strSearinglbl = '&#2838;&#2891;&#2844;&#2881;&#2843;&#2879;&#46;&#46;&#46;';
    $strMapclickInfolbl = 'Click on the Map to view the corresponding institute details';

    $strInstCountinfo1 = '&#2872;&#2864;&#2893;&#2860;&#2862;&#2891;&#2847;';
    $strInstCountinfo2 = '&#2847;&#2879; &#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2825;&#2858;&#2866;&#2860;&#2893;&#2855;';
    $strInstCountinfo3 = '&#2847;&#2879; &#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2825;&#2858;&#2866;&#2860;&#2893;&#2855;';
    $strInstCountinfo4 = '&#2847;&#2879; &#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2831;&#2860;&#2818; ';

    $strStoryViewDetailslbl = '&#2821;&#2855;&#2879;&#2837; &#2858;&#2850;&#2856;&#2893;&#2852;&#2881;';

    $strMystorylbl1 = '&#2839;&#2891;&#2847;&#2879;&#2831; &#2839;&#2891;&#2847;&#2879;&#2831; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';
    $strMystorylbl2 = '&#2872;&#2860;&#2881; &#2854;&#2887;&#2838;&#2856;&#2893;&#2852;&#2881;';

    $strImplinklbl1 = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
    $strcourseslbl = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
    $strImplinklbl2 = '&#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;';
    $strImplinklbl3 = '&#2863;&#2891;&#2844;&#2856;&#2878; &#2831;&#2860;&#2818;  &#2856;&#2880;&#2852;&#2879; &#2856;&#2879;&#2911;&#2862;';
    $strImplinklbl4 = '&#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2860;&#2879;&#2861;&#2878;&#2839;  &#2835; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878;';

    $strFaxlbl = '&#2859;&#2893;&#2911;&#2878;&#2837;&#2893;&#2872;';
    $strEmpofcAddrslbl1 = ' ';
    $strEmpofcAddrslbl3 = '&#2872;&#2860;&#2879;&#2870;&#2887;&#2871; &#2863;&#2891;&#2839;&#2878;&#2863;&#2891;&#2839; &#2852;&#2853;&#2893;&#2911;';
    $strEmpofcAddrslbl2 = '&#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2821;&#2855;&#2879;&#2837;&#2878;&#2864;&#2880;&#2841;&#2893;&#2837; ';

    $strContactAddrslbl1 = ' ';
    $strContactAddrslbl2 = '&#2858;&#2893;&#2864;&#2853;&#2862; &#2862;&#2873;&#2866;&#2878;&#44; &#2864;&#2878;&#2844;&#2880;&#2860; &#2861;&#2860;&#2856;&#44; &#2911;&#2881;&#2856;&#2879;&#2847;&#45;&#2923;&#44; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864;&#45;&#2925;&#2923;&#2919;&#2918;&#2918;&#2919;&#44; &#2835;&#2908;&#2879;&#2870;&#2878;  ';

    $strFacebooklbl = '&#2859;&#2887;&#2872;&#2860;&#2881;&#2837;';
    $strLinkedinlbl = '&#2866;&#2879;&#2841;&#2893;&#2837;&#2849;&#2823;&#2856; ';
    $strYoutubelbl = '&#2911;&#2881;&#2847;&#2893;&#2911;&#2881;&#2860;';

    $strastilbl1 = '&#2821;&#2852;&#2893;&#2911;&#2878;&#2855;&#2881;&#2856;&#2879;&#2837; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856;';
    $strastilbl2 = '&#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2878;&#2860;&#2879;&#2852;';

    $strCopyrightlbl1 = '&#2837;&#2858;&#2879; &#2872;&#2818;&#2864;&#2837;&#2893;&#2871;&#2879;&#2852;';
    $strCopyrightlbl2 = '&#2835;&#2908;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851; &#2404; &#2872;&#2862;&#2872;&#2893;&#2852; &#2872;&#2852;&#2893;&#2852;&#2893;&#2860; &#2872;&#2818;&#2864;&#2837;&#2893;&#2871;&#2879;&#2852;';
    $screenreaderlbl = '&#2872;&#2893;&#2837;&#2893;&#2864;&#2879;&#2856;&#2893; &#2864;&#2879;&#2849;&#2864; &#2849;&#2878;&#2825;&#2856;&#2866;&#2891;&#2849;&#2893; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';

    /*     * **************Weekdays******************* */
    $strSundayLbl = '&#2864;&#2860;&#2879;&#2860;&#2878;&#2864;';
    $strMondayLbl = '&#2872;&#2891;&#2862;&#2860;&#2878;&#2864;';
    $strTuesdayLbl = '&#2862;&#2841;&#2893;&#2839;&#2867;&#2860;&#2878;&#2864;';
    $strWednesdayLbl = '&#2860;&#2881;&#2855;&#2860;&#2878;&#2864;';
    $strThursedayLbl = '&#2839;&#2881;&#2864;&#2881;&#2860;&#2878;&#2864;';
    $strFridayLbl = '&#2870;&#2881;&#2837;&#2893;&#2864;&#2860;&#2878;&#2864;';
    $strSaturdayLbl = '&#2870;&#2856;&#2879;&#2860;&#2878;&#2864;';

    $strSunLbl = '&#2864;&#2860;&#2879;';
    $strMonLbl = '&#2872;&#2891;&#2862;';
    $strTuesLbl = '&#2862;&#2841;&#2893;&#2839;&#2867;';
    $strWednesLbl = '&#2860;&#2881;&#2855;';
    $strThurseLbl = '&#2839;&#2881;&#2864;&#2881;';
    $strFriLbl = '&#2870;&#2881;&#2837;&#2893;&#2864;';
    $strSaturLbl = '&#2870;&#2856;&#2879;';

    $strjune171 = '&#39;&#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#39; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2887;&#2866;&#2878;&#2404; &#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878;&#2862;&#2882;&#2867;&#2837; &#2861;&#2878;&#2860;&#2887; &#2919;&#2921; &#2844;&#2851; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878;&#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2863;&#2881;&#2860;&#2837; &#2863;&#2881;&#2860;&#2852;&#2880;&#2841;&#2893;&#2837;&#2881; &#2872;&#2858;&#2893;&#2852;&#2878;&#2873; &#2860;&#2893;&#2911;&#2878;&#2858;&#2879; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878;&#2856; &#2838;&#2891;&#2866;&#2879;&#2860;&#2878;&#2864; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2879;&#2822;&#2863;&#2878;&#2823; &#2919;&#2866;&#2837;&#2893;&#2871; &#2847;&#2841;&#2893;&#2837;&#2878;&#2864; &#2862;&#2882;&#2867;&#2855;&#2856; &#2854;&#2879;&#2822;&#2839;&#2866;&#2878;&#2404; ';

    $strjuly171 = '&#2835;&#2908;&#2879;&#2870;&#2878;&#2864; &#2921;&#2918;&#2847;&#2879; &#2844;&#2879;&#2866;&#2893;&#2866;&#2878;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2864;&#2853; &#2860;&#2881;&#2866;&#2879;&#2866;&#2878;&#2404; &#2872;&#2860;&#2881;&#2848;&#2878;&#2864;&#2887; &#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2821;&#2855;&#2879;&#2837;&#2878;&#2864;&#2880;&#2841;&#2893;&#2837; &#2848;&#2878;&#2864;&#2881; &#2843;&#2878;&#2852;&#2893;&#2864;&#2843;&#2878;&#2852;&#2893;&#2864;&#2880; &#2835; &#2870;&#2879;&#2837;&#2893;&#2871;&#2837;&#2841;&#2893;&#2837;&#2881; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2860;&#2879;&#2871;&#2911;&#2864;&#2887; &#2821;&#2860;&#2839;&#2852; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;&#2404;';

    $strNonmatric = '&#2821;&#2851; &#2862;&#2878;&#2847;&#2893;&#2864;&#2879;&#2837;';
    $strportraitmodemsg = '&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2831;&#2873;&#2879; &#2929;&#2887;&#2860;&#2872;&#2878;&#2823;&#2847;&#2837;&#2881; &#2866;&#2878;&#2851;&#2893;&#2849;&#2872;&#2893;&#2837;&#2887;&#2858;&#2893; &#2862;&#2891;&#2849;&#2864;&#2887; &#2854;&#2887;&#2838;&#2879; &#2873;&#2887;&#2860;&#2856;&#2878;&#2873;&#2879;&#2817;&#2404; &#2872;&#2848;&#2879;&#2837; &#2861;&#2878;&#2860;&#2887; &#2854;&#2887;&#2838;&#2879;&#2860;&#2878;&#2837;&#2881; &#2858;&#2891;&#2847;&#2893;&#2864;&#2887;&#2847;&#2893; &#2862;&#2891;&#2849;&#2864;&#2887; &#2864;&#2838;&#2856;&#2893;&#2852;&#2881;&#2404;';

    $strFocusOfficialLable = '&#2870;&#2893;&#2864;&#2880;&#2862;&#2852;&#2879; &#2844;&#2879;&#2852;&#2878;&#2862;&#2879;&#2852;&#2893;&#2864; &#2870;&#2852;&#2858;&#2853;&#2880;';
    $strFocusOfficialLablefull = '&#2870;&#2893;&#2864;&#2880;&#2862;&#2852;&#2879; &#2844;&#2879;&#2852;&#2878;&#2862;&#2879;&#2852;&#2893;&#2864; &#2870;&#2852;&#2858;&#2853;&#2880;';

    $strFocusOfficialDesigLable = '&#2821;&#2855;&#2893;&#2911;&#2837;&#2893;&#2871;&#44; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864;';
    $strFocusOfficialNameLable = '&#2870;&#2893;&#2864;&#2880;&#2862;&#2852;&#2879; &#2844;&#2879;&#2852;&#2878;&#2862;&#2879;&#2852;&#2893;&#2864; &#2870;&#2852;&#2858;&#2853;&#2880;';
    $strFocusEmployerLable = '&#2872;&#2878;&#2873;&#2879; &#2831;&#2837;&#2893;&#2872;&#2858;&#2891;&#2864;&#2893;&#2847;';
    $strFocusTrainingPartnerLable = '&#2822;&#2860;&#2887; &#2929;&#2887;&#2871;&#2893;&#2847; &#2872;&#2864;&#2893;&#2861;&#2879;&#2872;&#2887;&#2872;';
    $strFocusITILable = '&#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2861;&#2881;&#2860;&#2856;&#2887;&#2870;&#2893;&#2860;&#2864;';

    $strBusinessLable = '&#2837;&#2887;&#2825;&#2817;&#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2822;&#2858;&#2851; &#2863;&#2891;&#2844;&#2856;&#2878; &#2837;&#2864;&#2881;&#2843;&#2856;&#2893;&#2852;&#2879; &#63;';

    $strNanounicornLable = '&#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;';

    $strNanoSnippet = '&#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;&#2879;&#2837; &#2862;&#2856;&#2891;&#2860;&#2883;&#2852;&#2893;&#2852;&#2879; &#2853;&#2879;&#2860;&#2878; &#2837;&#2881;&#2870;&#2867;&#2880; &#2863;&#2881;&#2860;&#2858;&#2879;&#2850;&#2879;&#2841;&#2893;&#2837;&#2881; &#2825;&#2842;&#2879;&#2852; &#2862;&#2878;&#2864;&#2893;&#2839;&#2864;&#2887; &#2858;&#2864;&#2879;&#2842;&#2878;&#2867;&#2879;&#2852; &#2837;&#2864;&#2879; &#2872;&#2859;&#2867; &#2837;&#2893;&#2871;&#2881;&#2854;&#2893;&#2864; &#2870;&#2879;&#2867;&#2893;&#2858;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2864;&#2887; &#2858;&#2864;&#2879;&#2851;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2872;&#2873; &#2852;&#2883;&#2851;&#2862;&#2882;&#2867;&#2872;&#2893;&#2852;&#2864;&#2864;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2879;&#2860;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#2864; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911;&#2404; &#2831;&#2873;&#2879; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878;&#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2863;&#2881;&#2860;&#2837; &#2863;&#2881;&#2860;&#2852;&#2880;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;&#2864; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2854;&#2879;&#2839; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2878; &#2872;&#2873; &#2856;&#2879;&#2844;&#2864; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2822;&#2864;&#2893;&#2853;&#2879;&#2837; &#2872;&#2862;&#2893;&#2860;&#2867; &#2863;&#2891;&#2839;&#2878;&#2823; &#2854;&#2879;&#2822;&#2863;&#2878;&#2823;&#2853;&#2878;&#2831;&#2404; &#2831;&#2853;&#2879;&#2858;&#2878;&#2823;&#2817; &#2862;&#2856;&#2891;&#2856;&#2880;&#2852; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2863;&#2881;&#2860;&#2837; &#2863;&#2881;&#2860;&#2852;&#2880;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2831;&#2837; &#2872;&#2858;&#2893;&#2852;&#2878;&#2873; &#2855;&#2864;&#2879; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;&#2864; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2854;&#2879;&#2839; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2853;&#2878;&#2831;&#2404; &#2858;&#2864;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2878;&#2911; &#2831;&#2837; &#2866;&#2837;&#2893;&#2871; &#2847;&#2841;&#2893;&#2837;&#2878; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852; &#2862;&#2882;&#2867;&#2855;&#2856; &#2831;&#2873;&#2879; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2853;&#2878;&#2831;&#2404; &#2920;&#2918;&#2919;&#2925;&#45;&#2919;&#2926;&#2864;&#2887; &#2919;&#2918;&#2918;&#2844;&#2851;&#44; &#2920;&#2918;&#2919;&#2926;&#45;&#2919;&#2927;&#2864;&#2887; &#2919;&#2918;&#2918;&#2918;&#2844;&#2851; &#2835; &#2920;&#2918;&#2919;&#2927;&#45;&#2920;&#2918;&#2864;&#2887; &#2921;&#2918;&#2918;&#2918;&#2844;&#2851; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837;&#2881; &#2831;&#2873;&#2879; &#2863;&#2891;&#2844;&#2856;&#2878; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2872;&#2873;&#2878;&#2911;&#2852;&#2878; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2863;&#2891;&#2844;&#2856;&#2878; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879;&#2404;<br/>
<br/>
&#2837;&#2887;&#2860;&#2867; &#2822;&#2864;&#2893;&#2853;&#2879;&#2837; &#2872;&#2873;&#2863;&#2891;&#2839; &#2856;&#2881;&#2873;&#2887;&#2817;&#44; &#2863;&#2881;&#2860;&#2839;&#2891;&#2871;&#2893;&#2848;&#2880;&#2841;&#2893;&#2837;&#2881; &#2872;&#2859;&#2867; &#2837;&#2893;&#2871;&#2881;&#2854;&#2893;&#2864; &#2870;&#2879;&#2867;&#2893;&#2858;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2864;&#2887; &#2858;&#2864;&#2879;&#2851;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#2864; &#2825;&#2854;&#2893;&#2854;&#2887;&#2870;&#2893;&#2911;&#2404; &#2831;&#2873;&#2879; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;&#2839;&#2881;&#2849;&#2879;&#2837; &#2862;&#2878;&#2855;&#2893;&#2911;&#2862;&#2864;&#2887; &#2831;&#2837;&#2864;&#2881; &#2854;&#2881;&#2823; &#2860;&#2864;&#2893;&#2871; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2821;&#2852;&#2879;&#2837;&#2862;&#2864;&#2887; &#2854;&#2881;&#2823; &#2844;&#2851;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2872;&#2881;&#2863;&#2891;&#2839; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2879;&#2860;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851; &#2863;&#2891;&#2844;&#2856;&#2878;&#2864; &#2821;&#2856;&#2893;&#2911; &#2831;&#2837; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911;&#2404;';
    $strProcess = '&#2858;&#2893;&#2864;&#2837;&#2893;&#2864;&#2879;&#2911;&#2878;';

    $strProcesslbl1 = '&#2863;&#2891;&#2839;&#2893;&#2911;&#2852;&#2878;';
    $strProcessDesc1 = '&#2822;&#2870;&#2878;&#2911;&#2880; &#2858;&#2893;&#2864;&#2878;&#2864;&#2893;&#2853;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2852;&#2878;&#2866;&#2879;&#2862;&#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2837;&#2879;&#2862;&#2893;&#2860;&#2878; &#2863;&#2887;&#2837;&#2892;&#2851;&#2872;&#2879; &#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2848;&#2878;&#2864;&#2881; &#2862;&#2878;&#2856;&#2893;&#2911;&#2852;&#2878;&#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864;&#2887; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#2866;&#2878;&#2861; &#2837;&#2864;&#2879;&#2853;&#2879;&#2860;&#2878; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837; &#2831;&#2860;&#2818; &#2861;&#2878;&#2860;&#2880; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880; &#2861;&#2878;&#2860;&#2887; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2837;&#2879;&#2862;&#2893;&#2860;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2872;&#2881;&#2858;&#2878;&#2864;&#2879;&#2872; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;&#2404;';

    $strProcesslbl2 = '&#2842;&#2911;&#2856; ';
    $strProcessDesc2 = '&#2825;&#2856;&#2893;&#2856;&#2852; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2844;&#2893;&#2846;&#2878;&#2856; &#2853;&#2879;&#2860;&#2878; &#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2858;&#2893;&#2864;&#2852;&#2879;&#2861;&#2878;&#2841;&#2893;&#2837;&#2881; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2837;&#2879;&#2862;&#2893;&#2860;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2873;&#2863;&#2891;&#2839;&#2880; &#2842;&#2879;&#2873;&#2893;&#2856;&#2847; &#2837;&#2864;&#2879;&#2858;&#2878;&#2864;&#2879;&#2860;&#2887;&#2404; &#2831;&#2853;&#2879;&#2872;&#2873;&#2879;&#2852; &#2842;&#2879;&#2873;&#2893;&#2856;&#2847; &#2858;&#2893;&#2864;&#2852;&#2879;&#2861;&#2878;&#2841;&#2893;&#2837;&#2881; &#2872;&#2887;&#2862;&#2878;&#2856;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2887;&#2860;&#2887;&#2404;  &#2858;&#2893;&#2864;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2863;&#2891;&#2844;&#2856;&#2878;&#2864; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911; &#2920; &#2860;&#2864;&#2893;&#2871; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2821;&#2852;&#2879;&#2837;&#2862;&#2864;&#2887; &#2920;&#2864;&#2881; &#2921; &#2844;&#2851;&#2841;&#2893;&#2837;&#2881; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2854;&#2887;&#2823;&#2858;&#2878;&#2864;&#2879;&#2860;&#2878; &#2863;&#2891;&#2839;&#2893;&#2911; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2844;&#2864;&#2881;&#2864;&#2880;&#2404;';

    $strProcesslbl3 = '&#2852;&#2878;&#2866;&#2879;&#2862;';
    $strProcessDesc3 = '&#2858;&#2893;&#2864;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837;&#2881; &#2872;&#2858;&#2893;&#2852;&#2878;&#2873;&#2887; &#2860;&#2893;&#2911;&#2878;&#2858;&#2880; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870;&#2864; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2854;&#2879;&#2839; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2879;&#2822;&#2863;&#2879;&#2860;&#2404; &#2863;&#2854;&#2879; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837; &#2858;&#2849;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2863;&#2891;&#2844;&#2856;&#2878; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2858;&#2881;&#2856;&#2819;&#2822;&#2866;&#2891;&#2842;&#2856;&#2878; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2404; &#2852;&#2878;&#2866;&#2879;&#2862; &#2872;&#2862;&#2911;&#2864;&#2887; &#2858;&#2882;&#2864;&#2893;&#2860;&#2864;&#2881; &#2872;&#2887;&#2823; &#2872;&#2862;&#2893;&#2860;&#2856;&#2893;&#2855;&#2880;&#2911; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;&#2864;&#2887; &#2872;&#2859;&#2867; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2872;&#2873;&#2879;&#2852; &#2852;&#2878;&#2866;&#2879;&#2862;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837; &#2872;&#2878;&#2837;&#2893;&#2871;&#2878;&#2852; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2404; &#2863;&#2878;&#2873;&#2878;&#2854;&#2893;&#2929;&#2878;&#2864;&#2878; &#2852;&#2878;&#2866;&#2879;&#2862;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2860;&#2893;&#2911;&#2860;&#2873;&#2878;&#2864;&#2879;&#2837; &#2844;&#2893;&#2846;&#2878;&#2856;&#2864; &#2860;&#2879;&#2837;&#2878;&#2870; &#2873;&#2887;&#2860;&#2404; &#2852;&#2878;&#2866;&#2879;&#2862; &#2870;&#2887;&#2871; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2878;&#2911;&#2864;&#2887; &#2831;&#2837; &#2862;&#2881;&#2837;&#2893;&#2852; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2879;&#2852;&#2878;&#2864;&#2887; &#2858;&#2878;&#2864;&#2893;&#2853;&#2880;&#2862;&#2878;&#2856;&#2887; &#2856;&#2879;&#2844; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2863;&#2891;&#2844;&#2856;&#2878;&#2864; &#2872;&#2859;&#2867; &#2864;&#2882;&#2858;&#2878;&#2911;&#2856; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2856;&#2879;&#2844;&#2864; &#2862;&#2852; &#2864;&#2838;&#2879;&#2860;&#2887;&#2404;';

    $strProcesslbl4 = '&#2821;&#2856;&#2881;&#2854;&#2878;&#2856;';
    $strProcessDesc4 = '&#2862;&#2881;&#2837;&#2893;&#2852; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2879;&#2852;&#2878;&#2864;&#2887; &#2837;&#2883;&#2852;&#2879; &#2852;&#2878;&#2866;&#2879;&#2862;&#2878;&#2864;&#2893;&#2853;&#2880;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2860;&#2879;&#2856;&#2878; &#2839;&#2893;&#2911;&#2878;&#2864;&#2887;&#2851;&#2893;&#2847;&#2879;&#2864;&#2887; &#2839;&#2891;&#2847;&#2879;&#2831; &#2858;&#2883;&#2871;&#2893;&#2848;&#2878;&#2864; &#2842;&#2881;&#2837;&#2893;&#2852;&#2879;&#2856;&#2878;&#2862;&#2878; &#2872;&#2893;&#2869;&#2878;&#2837;&#2893;&#2871;&#2864; &#2837;&#2864;&#2879; &#2919; &#2866;&#2837;&#2893;&#2871; &#2847;&#2841;&#2893;&#2837;&#2878;&#2864; &#2821;&#2856;&#2881;&#2854;&#2878;&#2856; &#2864;&#2878;&#2870;&#2879; &#2854;&#2879;&#2822;&#2863;&#2879;&#2860;&#2404;  &#2831;&#2873;&#2879; &#2821;&#2856;&#2881;&#2854;&#2878;&#2856; &#2864;&#2878;&#2870;&#2879; &#2860;&#2878;&#2860;&#2854;&#2864;&#2887; &#2858;&#2893;&#2864;&#2853;&#2862; &#2860;&#2864;&#2893;&#2871; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2837;&#2892;&#2851;&#2872;&#2879; &#2821;&#2864;&#2893;&#2853; &#2854;&#2887;&#2860;&#2878;&#2837;&#2881; &#2858;&#2849;&#2879;&#2860; &#2856;&#2878;&#2873;&#2879;&#2817;&#2404; &#2854;&#2893;&#2869;&#2879;&#2852;&#2880;&#2911; &#2860;&#2864;&#2893;&#2871;&#2864;&#2887; &#2831;&#2873;&#2878;&#2864; &#2923;&#37; &#2872;&#2881;&#2855; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2854;&#2887;&#2860;&#2878;&#2837;&#2881; &#2873;&#2887;&#2825;&#2853;&#2879;&#2860;&#2878; &#2860;&#2887;&#2867;&#2887; &#2852;&#2883;&#2852;&#2880;&#2911; &#2860;&#2864;&#2893;&#2871;&#2864;&#2887; &#2872;&#2864;&#2893;&#2860;&#2862;&#2891;&#2847; &#2821;&#2864;&#2893;&#2853; &#2859;&#2887;&#2864;&#2872;&#2893;&#2852; &#2854;&#2887;&#2860;&#2878;&#2837;&#2881; &#2873;&#2887;&#2860;&#2404; &#2863;&#2854;&#2879; &#2831;&#2837; &#2860;&#2864;&#2893;&#2871; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2887; &#2872;&#2862;&#2872;&#2893;&#2852; &#2821;&#2864;&#2893;&#2853; &#2859;&#2887;&#2864;&#2872;&#2893;&#2852; &#2837;&#2864;&#2879; &#2854;&#2879;&#2821;&#2856;&#2893;&#2852;&#2879; &#2852;&#2887;&#2860;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2837;&#2892;&#2851;&#2872;&#2879; &#2872;&#2881;&#2855; &#2854;&#2887;&#2860;&#2878;&#2837;&#2881; &#2858;&#2849;&#2879;&#2860; &#2856;&#2878;&#2873;&#2879;&#2817;&#2404;';

    $strProcesslbl5 = '&#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2822;&#2864;&#2862;&#2893;&#2861; ';
    $strProcessDesc5 = '&#2858;&#2893;&#2864;&#2878;&#2864;&#2893;&#2853;&#2880;&#2862;&#2878;&#2856;&#2887; &#2831;&#2873;&#2879; &#2821;&#2856;&#2881;&#2854;&#2878;&#2856; &#2864;&#2878;&#2870;&#2879; &#2860;&#2879;&#2856;&#2879;&#2863;&#2891;&#2839; &#2837;&#2864;&#2879; &#2856;&#2879;&#2844;&#2864; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2879;&#2860;&#2887; &#2831;&#2860;&#2818; &#2856;&#2879;&#2844;&#2837;&#2881; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#2864; &#2872;&#2859;&#2867; &#2825;&#2854;&#2878;&#2873;&#2864;&#2851; &#2860;&#2856;&#2887;&#2823;&#2860;&#2887;&#2404; &#2858;&#2893;&#2864;&#2878;&#2864;&#2862;&#2893;&#2861;&#2879;&#2837; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2878;&#2911;&#2864;&#2887; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;&#2837;&#2881; &#2825;&#2842;&#2879;&#2852; &#2862;&#2878;&#2864;&#2893;&#2839;&#2864;&#2887; &#2858;&#2864;&#2879;&#2842;&#2878;&#2867;&#2879;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2844;&#2851;&#2887; &#2872;&#2893;&#2853;&#2878;&#2856;&#2880;&#2911; &#2862;&#2878;&#2864;&#2893;&#2839;&#2854;&#2870;&#2837;&#2841;&#2893;&#2837;&#2881; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2404; &#2858;&#2893;&#2864;&#2852;&#2879; &#2852;&#2879;&#2856;&#2879;&#2862;&#2878;&#2872;&#2864;&#2887; &#2853;&#2864;&#2887; &#2831;&#2873;&#2878; &#2872;&#2862;&#2880;&#2837;&#2893;&#2871;&#2878; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2878; &#2872;&#2873; &#2822;&#2839;&#2878;&#2862;&#2880; &#2858;&#2854;&#2837;&#2893;&#2871;&#2887;&#2858; &#2837;&#2879;&#2862;&#2893;&#2860;&#2878; &#2858;&#2864;&#2879;&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2856; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2822;&#2866;&#2891;&#2842;&#2856;&#2878; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2404; &#2835;&#2831;&#2872;&#2908;&#2879;&#2831;&#2864; &#2831;&#2837; &#2858;&#2893;&#2864;&#2852;&#2879;&#2856;&#2879;&#2855;&#2879; &#2854;&#2867; &#2858;&#2893;&#2864;&#2852;&#2893;&#2911;&#2887;&#2837; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2837;&#2881; &#2839;&#2872;&#2893;&#2852; &#2837;&#2864;&#2879;&#2860;&#2887; &#2831;&#2860;&#2818; &#2821;&#2856;&#2893;&#2911; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2872;&#2873; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837; &#2863;&#2891;&#2849;&#2879;&#2860;&#2878;&#2837;&#2881; &#2825;&#2852;&#2893;&#2872;&#2878;&#2873;&#2879;&#2852; &#2837;&#2864;&#2879;&#2860;&#2887;&#2404; ';


    $strProcesslbl6 = '&#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851; &#2863;&#2891;&#2844;&#2856;&#2878;&#2864; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911;';
    $strProcessDesc6 = ' &#2858;&#2893;&#2864;&#2852;&#2893;&#2911;&#2887;&#2837; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837;&#2881; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2872;&#2893;&#2869;&#2858;&#2893;&#2856; &#2858;&#2881;&#2864;&#2851;&#2864;&#2887; &#2872;&#2873;&#2863;&#2891;&#2839; &#2837;&#2864;&#2879;&#2860;&#2878; &#2872;&#2873; &#2822;&#2852;&#2893;&#2862;&#2856;&#2879;&#2864;&#2893;&#2861;&#2864;&#2870;&#2880;&#2867;&#2852;&#2878;&#2864; &#2856;&#2882;&#2822; &#2858;&#2864;&#2879;&#2842;&#2911; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2879;&#2860;&#2878;&#2404;';

    $strProcesslbl7 = '&#2856;&#2866;&#2887;&#2844;&#2893; &#2873;&#2860;&#2893;';
    $strProcessDesc7 = '&#2856;&#2866;&#2887;&#2844;&#2893; &#2873;&#2860;&#2893; &#2831;&#2873;&#2879; &#2863;&#2891;&#2844;&#2856;&#2878;&#2864; &#2821;&#2856;&#2893;&#2911; &#2831;&#2837; &#2862;&#2881;&#2838;&#2893;&#2911; &#2821;&#2818;&#2870;&#2404; &#2831;&#2853;&#2879;&#2864;&#2887; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2872;&#2859;&#2867;&#2852;&#2878; &#2863;&#2878;&#2852;&#2893;&#2864;&#2878;&#2864; &#2837;&#2878;&#2873;&#2878;&#2851;&#2880; &#2835; &#2839;&#2878;&#2853;&#2878;&#2837;&#2881; &#2872;&#2818;&#2864;&#2837;&#2893;&#2871;&#2879;&#2852; &#2837;&#2864;&#2879; &#2864;&#2838;&#2878;&#2863;&#2879;&#2860;&#2404; &#2863;&#2878;&#2873;&#2878; &#2831;&#2837; &#2837;&#2887;&#2872;&#2871;&#2893;&#2847;&#2849;&#2879; &#2861;&#2878;&#2860;&#2887; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2864;&#2887; &#2866;&#2878;&#2839;&#2879;&#2860;&#2404; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2864; &#2852;&#2893;&#2864;&#2888;&#2862;&#2878;&#2872;&#2879;&#2837; &#2860;&#2888;&#2848;&#2837; &#2831;&#2873;&#2879; &#2856;&#2866;&#2887;&#2844;&#2893; &#2873;&#2860;&#2837;&#2881; &#2872;&#2862;&#2883;&#2854;&#2893;&#2855; &#2837;&#2864;&#2879;&#2860;&#2404;';

    $strProcesslbl8 = '&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852;  &#2862;&#2879;&#2867;&#2879;&#2853;&#2879;&#2860;&#2878; &#2872;&#2859;&#2867;&#2852;&#2878; ';
    $strProcessDesc8 = '&#2835;&#2831;&#2872;&#2908;&#2879;&#2831; &#2858;&#2837;&#2893;&#2871;&#2864;&#2881; &#2920;&#2918;&#2919;&#2925; &#2844;&#2881;&#2866;&#2878;&#2823; &#2862;&#2878;&#2872;&#2864;&#2887; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2831;&#2873;&#2879; &#2863;&#2891;&#2844;&#2856;&#2878; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2920;&#2918;&#2919;&#2925; &#2849;&#2879;&#2872;&#2887;&#2862;&#2893;&#2860;&#2864; &#2862;&#2878;&#2872; &#2872;&#2881;&#2854;&#2893;&#2855;&#2878; &#2923;&#2925; &#2844;&#2851; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880; &#2825;&#2858;&#2837;&#2883;&#2852; &#2873;&#2891;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2881; &#2821;&#2855;&#2879;&#2837;&#2878;&#2818;&#2870; &#2822;&#2864;&#2893;&#2853;&#2879;&#2837; &#2872;&#2893;&#2860;&#2842;&#2893;&#2843;&#2867; &#2856;&#2853;&#2879;&#2860;&#2878; &#2858;&#2864;&#2879;&#2860;&#2878;&#2864;&#2864;&#2881; &#2822;&#2872;&#2879; &#2862;&#2855;&#2893;&#2911; &#2856;&#2879;&#2844; &#2854;&#2883;&#2850; &#2860;&#2854;&#2893;&#2855;&#2858;&#2864;&#2879;&#2837;&#2864;&#2852;&#2878; &#2854;&#2887;&#2838;&#2878;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2872;&#2859;&#2867; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880; &#2873;&#2887;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2872;&#2887;&#2862;&#2878;&#2856;&#2887; &#2854;&#2887;&#2838;&#2879;&#2853;&#2879;&#2860;&#2878; &#2872;&#2893;&#2869;&#2858;&#2893;&#2856; &#2852;&#2878;&#2841;&#2893;&#2837; &#2858;&#2864;&#2879;&#2860;&#2878;&#2864; &#2872;&#2881;&#2838; &#2835; &#2872;&#2862;&#2883;&#2854;&#2893;&#2855;&#2879; &#2860;&#2883;&#2854;&#2893;&#2855;&#2879;&#2864;&#2887; &#2872;&#2873;&#2878;&#2911;&#2837; &#2873;&#2891;&#2823;&#2843;&#2879;&#2404; &#2856;&#2879;&#2844; &#2858;&#2864;&#2879;&#2860;&#2878;&#2864;&#2837;&#2881; &#2839;&#2864;&#2893;&#2860;&#2879;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2872;&#2873; &#2822;&#2872;&#2881;&#2853;&#2879;&#2860;&#2878; &#2856;&#2882;&#2822; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837;&#2881; &#2825;&#2842;&#2879;&#2852; &#2862;&#2878;&#2864;&#2893;&#2839; &#2854;&#2887;&#2838;&#2878;&#2823;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2862;&#2855;&#2893;&#2911;&#2864;&#2881; &#2821;&#2855;&#2879;&#2837;&#2878;&#2818;&#2870; &#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2881;&#2852;&#2404; ';

    $strRegisterHerelbl = '&#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2883;&#2852; &#2873;&#2881;&#2821;&#2856;&#2893;&#2852;&#2881;';
    $strInterpreshiplbl1 = '&#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2852;&#2878; ';
    $strInterpreshiplbl2 = '&#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; ';
    $strApplylbl = '&#2822;&#2860;&#2887;&#2854;&#2856;';
    $strKnowmorelbl = '&#2821;&#2855;&#2879;&#2837; &#2844;&#2878;&#2851;&#2856;&#2893;&#2852;&#2881;';

    $strHomeDesc1 = '&#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;&#2879;&#2837; &#2862;&#2856;&#2891;&#2860;&#2883;&#2852;&#2893;&#2852;&#2879; &#2853;&#2879;&#2860;&#2878; &#2837;&#2881;&#2870;&#2867;&#2880; &#2863;&#2881;&#2860;&#2858;&#2879;&#2850;&#2879;&#2841;&#2893;&#2837;&#2881; &#2825;&#2842;&#2879;&#2852; &#2862;&#2878;&#2864;&#2893;&#2839;&#2864;&#2887; &#2858;&#2864;&#2879;&#2842;&#2878;&#2867;&#2879;&#2852; &#2837;&#2864;&#2879; &#2872;&#2859;&#2867; &#2837;&#2893;&#2871;&#2881;&#2854;&#2893;&#2864; &#2870;&#2879;&#2867;&#2893;&#2858;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2864;&#2887; &#2858;&#2864;&#2879;&#2851;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2872;&#2873; &#2852;&#2883;&#2851;&#2862;&#2882;&#2867;&#2872;&#2893;&#2852;&#2864;&#2864;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2879;&#2860;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851;&#2864; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911;&#2404; ';
    $strHomeDesc2 = '&#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851; &#2835;&#2831;&#2872;&#2849;&#2876;&#2879;&#2831; &#2854;&#2893;&#2929;&#2878;&#2864;&#2878; &#2822;&#2864;&#2862;&#2893;&#2861; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2831;&#2837; &#2856;&#2879;&#2822;&#2864;&#2878; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2404; &#2863;&#2887;&#2825;&#2817;&#2848;&#2878;&#2864;&#2887; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2852;&#2878; &#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2853;&#2879;&#2860;&#2878; &#2837;&#2881;&#2870;&#2867;&#2880; &#2863;&#2881;&#2860;&#2858;&#2880;&#2909;&#2879;&#2841;&#2893;&#2837; &#2844;&#2893;&#2846;&#2878;&#2856;&#2837;&#2881; &#2862;&#2878;&#2864;&#2893;&#2844;&#2879;&#2852; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2878; &#2872;&#2873; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2872;&#2859;&#2867; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2864;&#2887; &#2858;&#2864;&#2879;&#2851;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2831;&#2873;&#2878;&#2864; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2854;&#2879;&#2839; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2404; &#2858;&#2864;&#2887; &#2856;&#2882;&#2822; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2862;&#2882;&#2867;&#2855;&#2856; &#2863;&#2891;&#2839;&#2878;&#2823; &#2854;&#2879;&#2822;&#2863;&#2879;&#2860;&#2404;';
    $strHomeDesc3 = '&#2862;&#2856;&#2891;&#2856;&#2880;&#2852; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2863;&#2881;&#2860;&#2837; &#2863;&#2881;&#2860;&#2852;&#2880;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2831;&#2837; &#2872;&#2858;&#2893;&#2852;&#2878;&#2873; &#2855;&#2864;&#2879; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;&#2864; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2854;&#2879;&#2839; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2864;&#2887; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2879;&#2822;&#2863;&#2879;&#2860;&#2404; &#2858;&#2864;&#2887; &#2831;&#2873;&#2879; &#2863;&#2891;&#2844;&#2856;&#2878;&#2864;&#2887; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2822;&#2864;&#2862;&#2893;&#2861; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2878;&#2911; &#2831;&#2837; &#2866;&#2837;&#2893;&#2871; &#2847;&#2841;&#2893;&#2837;&#2878; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852; &#2872;&#2873;&#2878;&#2911;&#2852;&#2878; &#2864;&#2878;&#2870;&#2879; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2404; &#2920;&#2918;&#2919;&#2925;&#45;&#2919;&#2926;&#2864;&#2887; &#2919;&#2918;&#2918;&#2844;&#2851;&#44; &#2920;&#2918;&#2919;&#2926;&#45;&#2919;&#2927;&#2864;&#2887; &#2919;&#2918;&#2918;&#2918;&#2844;&#2851; &#2835; &#2920;&#2918;&#2919;&#2927;&#45;&#2920;&#2918;&#2864;&#2887; &#2921;&#2918;&#2918;&#2918;&#2844;&#2851; &#2825;&#2854;&#2893;&#2911;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837;&#2881; &#2831;&#2873;&#2879; &#2863;&#2891;&#2844;&#2856;&#2878; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2872;&#2873;&#2878;&#2911;&#2852;&#2878; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911; &#2864;&#2838;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879;&#2404;';

    $strRegisterForlbl = '&#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851; &#2858;&#2878;&#2823;&#2817; &#2822;&#2860;&#2887;&#2854;&#2856; &#2858;&#2852;&#2893;&#2864;';
    $strRegisterlbl = '&#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2883;&#2852; &#2873;&#2881;&#2821;&#2856;&#2893;&#2852;&#2881;';

    $strSelectlbl = ' &#2842;&#2911;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';

    $strSkillComplbl = '&#2823;&#2851;&#2893;&#2849;&#2879;&#2822; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2872; &#2837;&#2862;&#2893;&#2858;&#2879;&#2847;&#2879;&#2872;&#2856;&#2893;&#45; &#2835;&#2908;&#2879;&#2870;&#2878; &#2920;&#2918;&#2919;&#2926; &#2858;&#2878;&#2823;&#2817; &#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2883;&#2852; &#2873;&#2881;&#2821;&#2856;&#2893;&#2852;&#2881';

    $strSkillInfoPath = SITE_URL . 'images/competition_info_odia.pdf';

    $strStudyMateriallbl = '&#2858;&#2850;&#2878; &#2872;&#2878;&#2862;&#2839;&#2893;&#2864;&#2880; ';

    $strdownloadstudymateriallbl = '&#2858;&#2850;&#2878; &#2872;&#2878;&#2862;&#2839;&#2893;&#2864;&#2880; &#2849;&#2878;&#2825;&#2856;&#2866;&#2891;&#2849; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';



    $strClickherelbl = '&#2837;&#2893;&#2866;&#2879;&#2837; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
    $strViewMore = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;  &#2844;&#2878;&#2851;&#2856;&#2893;&#2852;&#2881;';

    $strAuthorLabel = 'Author';
    $strPhotoEssaylbl = '&#2859;&#2847;&#2891; &#2831;&#2872;&#2887;';
    $strPhilosphylvl = 'Philosophy';
    $enquiryLevel               = '&#2858;&#2893;&#2864;&#2870;&#2893;&#2856; &#2858;&#2842;&#2878;&#2864;&#2856;&#2893;&#2852;&#2881;';
    $readNewslbl  = '&#2838;&#2860;&#2864; &#2858;&#2850;&#2856;&#2893;&#2852;&#2881;';
    $strReadLesslbl= '&#2837;&#2862;&#2893; &#2858;&#2850;&#2856;&#2893;&#2852;&#2881;';

    $strViewMorelbl ='&#2821;&#2855;&#2879;&#2837; &#2858;&#2850;&#2856;&#2893;&#2852;&#2881;';
	
	$nanoUnicornContent ='<div class="col-12 mt-sm-3">
						<p class="text-justify">&#2860;&#2879;&#2839;&#2852; &#2860;&#2864;&#2893;&#2871; &#2862;&#2878;&#2864;&#2893;&#2842;&#2893;&#2842; &#2862;&#2878;&#2872;&#2864;&#2887; &#2854;&#2887;&#2870;&#2864; &#2821;&#2864;&#2893;&#2853;&#2856;&#2880;&#2852;&#2879;&#2837;&#2881; &#2872;&#2881;&#2854;&#2883;&#2850; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2852;&#2879;&#2860;&#2854;&#2893;&#2855; &#2871;&#2893;&#2847;&#2878;&#2864;&#2893;&#2847;&#2821;&#2858; &#2835; &#2837;&#2893;&#2871;&#2881;&#2854;&#2893;&#2864; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911;  &#2861;&#2878;&#2860;&#2887;  &#2835;&#2849;&#2879;&#2870;&#2878;&#2864; &#2923;&#2925; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851; &#2842;&#2873;&#2867; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2879;&#2853;&#2879;&#2866;&#2887;&#2404; &#2856;&#2878;&#2856;&#2891; &#2911;&#2881;&#2856;&#2879;&#2837;&#2864;&#2893;&#2851;&#2893;&#2851; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#8220;&#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2849; &#2823;&#2856; &#2835;&#2849;&#2879;&#2870;&#2878;&#8221; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2831;&#2837; &#2872;&#2893;&#2869;&#2852;&#2856;&#2893;&#2852;&#2893;&#2864; &#2825;&#2854;&#2893;&#2911;&#2862;&#44; &#2863;&#2887;&#2825;&#2817;&#2853;&#2879;&#2864;&#2887; &#2864;&#2878;&#2844;&#2893;&#2911;&#2864;&#2887; &#2836;&#2854;&#2893;&#2911;&#2891;&#2839;&#2879;&#2837; &#2858;&#2893;&#2864;&#2852;&#2879;&#2861;&#2878; &#2842;&#2879;&#2873;&#2893;&#2856;&#2847; &#2837;&#2864;&#2879; &#2872;&#2887;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837;&#2881; &#2859;&#2879;&#2866;&#2856;&#2893;&#2853;&#2893;&#2864;&#2891;&#2858;&#2879;&#2837; &#2837;&#2893;&#2911;&#2878;&#2858;&#2879;&#2847;&#2878;&#2866; &#2872;&#2873; &#2863;&#2891;&#2849;&#2879;&#2860;&#2878; &#2862;&#2882;&#2867; &#2866;&#2837;&#2893;&#2871;&#2404; &#2831;&#2873;&#2878;&#2864; &#2858;&#2864;&#2879;&#2851;&#2878;&#2862; &#2872;&#2893;&#2929;&#2864;&#2882;&#2858; &#2837;&#2893;&#2871;&#2881;&#2854;&#2893;&#2864; &#2872;&#2893;&#2853;&#2878;&#2856;&#2880;&#2911; &#2860;&#2893;&#2911;&#2860;&#2872;&#2878;&#2911; &#2837;&#2887;&#2860;&#2867; &#2821;&#2864;&#2893;&#2853;&#2856;&#2880;&#2852;&#2879; &#2860;&#2879;&#2837;&#2878;&#2870; &#2837;&#2864;&#2887; &#2852;&#2878;&#2873;&#2878; &#2856;&#2881;&#2873;&#2887;&#2817; &#2860;&#2864;&#2818; &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2872;&#2881;&#2863;&#2891;&#2839; &#2872;&#2883;&#2871;&#2893;&#2847;&#2879; &#2837;&#2864;&#2887;&#2404;<br/>
         </p>
						<ul class="list-type-arrow mt-4">
							<li>The nano-unicorns begin their journey with a capital of Rs 1 lakh. In venture capital parlance when the valuation of the start-up exceeds $ 1 billion, the nano-unicorn becomes a Unicorn. Examples of such start-ups are Flipkart, Ola etc. </li>
							<li>We provide short entrepreneurship training to the nano-unicorns. After the receiving the mentoring, the support and initial capital, they become confident enough to plunge into the path of self-employment. </li>
							<li>The seed capital is made available to OSDA through philanthropic donors. We propose to support 100 such entrepreneurs during 2017-18, 1000 in the year 2018-19 and 3000 in the year 2019-20.</li>
						</ul>
					</div>';
	
	
	//scheme page
$schemes1name='&#2849;&#2879;&#2849;&#2879;&#2911;&#2881;&#45;&#2844;&#2879;&#2837;&#2887;&#2929;&#2878;&#2823;';
$schemes1fullname='&#2854;&#2880;&#2856; &#2854;&#2911;&#2878;&#2866; &#2825;&#2858;&#2878;&#2855;&#2893;&#2911;&#2878;&#2911; &#2839;&#2893;&#2864;&#2878;&#2862;&#2880;&#2851; &#2837;&#2892;&#2870;&#2867; &#2863;&#2891;&#2844;&#2856;&#2878; ';
$schemes1des='&#2854;&#2880;&#2856; &#2854;&#2911;&#2878;&#2866; &#2825;&#2858;&#2878;&#2855;&#2893;&#2911;&#2878;&#2911; &#2839;&#2893;&#2864;&#2878;&#2862;&#2880;&#2851; &#2837;&#2892;&#2870;&#2867; &#2863;&#2891;&#2844;&#2856;&#2878; &#2873;&#2887;&#2825;&#2843;&#2879; &#2861;&#2878;&#2864;&#2852; &#2872;&#2864;&#2837;&#2878;&#2864;&#2841;&#2893;&#2837; &#2839;&#2893;&#2864;&#2878;&#2862;&#2893;&#2911; &#2860;&#2879;&#2837;&#2878;&#2870; &#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2851;&#2878;&#2867;&#2911;&#2864;  &#2837;&#2892;&#2870;&#2867; &#2835; &#2864;&#2891;&#2844;&#2839;&#2878;&#2864; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2911;&#2878;&#2872; &#2837;&#2864;&#2887;&#2404; &#2837;&#2892;&#2870;&#2867; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878; &#2831;&#2873;&#2879; &#2863;&#2891;&#2844;&#2856;&#2878;&#2864;&#2887;  &#2863;&#2881;&#2860;&#2858;&#2879;&#2850;&#2880;&#2841;&#2893;&#2837;  &#2864;&#2891;&#2844;&#2839;&#2878;&#2864; &#2822;&#2837;&#2878;&#2818;&#2837;&#2893;&#2871;&#2878; &#2858;&#2882;&#2864;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878;&#2864; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911; &#2856;&#2887;&#2823; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911; &#2837;&#2864;&#2881;&#2843;&#2879; &#2404; &#2821;&#2837;&#2893;&#2847;&#2891;&#2860;&#2864; &#2920;&#2918;&#2919;&#2926; &#2872;&#2881;&#2854;&#2893;&#2855;&#2878; &#2849;&#2879;&#2849;&#2879;&#2911;&#2881;&#2844;&#2879;&#2837;&#2887;&#2929;&#2878;&#2823; &#2921;&#2920;&#2927; &#2860;&#2879;&#2861;&#2878;&#2839;&#2864;&#2887; &#2926;&#2921;&#2925;&#2922;&#2923; &#2844;&#2851;&#2841;&#2893;&#2837;&#2881; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2887;&#2823;&#2853;&#2879;&#2860;&#2878; &#2860;&#2887;&#2867;&#2887; &#2922;&#2924;&#2924;&#2923;&#2922; &#2844;&#2851; &#2864;&#2891;&#2844;&#2839;&#2878;&#2864;&#2837;&#2893;&#2871;&#2862; &#2873;&#2891;&#2823;&#2858;&#2878;&#2864;&#2879;&#2843;&#2856;&#2893;&#2852;&#2879;&#2404; &#2831;&#2873;&#2879; &#2863;&#2891;&#2844;&#2856;&#2878; &#2872;&#2862;&#2839;&#2893;&#2864; &#2854;&#2887;&#2870;&#2864;&#2887; &#2925;&#2919;&#2919; &#2858;&#2879;&#2822;&#2823;&#2831;&#2864;&#2887; &#2842;&#2878;&#2866;&#2881;&#2821;&#2843;&#2879;&#2404; <br/>
';

$schemes2name='&#2858;&#2879;&#2831;&#2866;&#2847;&#2879;&#2858;&#2879; ';
$schemes2fullname='&#2858;&#2893;&#2866;&#2887;&#2872;&#2862;&#2887;&#2851;&#2893;&#2847; &#2866;&#2879;&#2841;&#2893;&#2837; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2858;&#2893;&#2864;&#2891;&#2839;&#2893;&#2864;&#2878;&#2862;';
$schemes2des='&#2858;&#2893;&#2866;&#2887;&#2872;&#2862;&#2887;&#2851;&#2893;&#2847; &#2866;&#2879;&#2841;&#2893;&#2837; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2858;&#2893;&#2864;&#2891;&#2839;&#2893;&#2864;&#2878;&#2862; &#2863;&#2891;&#2844;&#2856;&#2878; &#2863;&#2881;&#2860;&#2858;&#2879;&#2850;&#2880;&#2841;&#2893;&#2837; &#2844;&#2847;&#2879;&#2867; &#2864;&#2891;&#2844;&#2839;&#2878;&#2864; &#2872;&#2862;&#2872;&#2893;&#2911;&#2878;&#2837;&#2881; &#2872;&#2862;&#2878;&#2855;&#2878;&#2856; &#2837;&#2864;&#2887;&#2404; &#2856;&#2878;&#2862; &#2866;&#2887;&#2838;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2858;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837;&#2881; &#2852;&#2878;&#2866;&#2879;&#2862; &#2858;&#2893;&#2864;&#2878;&#2858;&#2893;&#2852; &#2858;&#2864;&#2887; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2870;&#2879;&#2867;&#2893;&#2858;&#2864;&#2887;  &#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2817; &#2872;&#2873;&#2863;&#2891;&#2839; &#2837;&#2864;&#2887;&#2404; &#2835;&#2831;&#2872;&#2908;&#2879;&#2831; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2921;&#2927; &#2858;&#2879;&#2831;&#2866;&#2847;&#2879;&#2858;&#2879; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911; &#2837;&#2864;&#2881;&#2843;&#2879; &#2404;';

$schemes3name='&#2858;&#2879;&#2831;&#2862;&#2837;&#2887;&#2861;&#2879;&#2929;&#2878;&#2823; ';
$two='&#2920;&#46;&#2918;';
$schemes3fullname='&#2858;&#2893;&#2864;&#2855;&#2878;&#2856;&#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2880; &#2837;&#2892;&#2870;&#2867; &#2860;&#2879;&#2837;&#2878;&#2870; &#2863;&#2891;&#2844;&#2856;&#2878; ';
$schemes3des='&#2858;&#2893;&#2864;&#2855;&#2878;&#2856;&#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2880; &#2837;&#2892;&#2870;&#2867; &#2860;&#2879;&#2837;&#2878;&#2870; &#2863;&#2891;&#2844;&#2856;&#2878; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2837;&#2892;&#2870;&#2867; &#2860;&#2879;&#2837;&#2878;&#2870; &#2835; &#2825;&#2854;&#2893;&#2911;&#2862;&#2879;&#2852;&#2878; &#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2851;&#2878;&#2867;&#2911; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911; &#2837;&#2864;&#2887;&#2404; &#2831;&#2873;&#2879; &#2872;&#2893;&#2837;&#2879;&#2866; &#2872;&#2878;&#2864;&#2893;&#2847;&#2879;&#2859;&#2879;&#2837;&#2887;&#2872;&#2856; &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;&#2864; &#2825;&#2854;&#2893;&#2854;&#2887;&#2870;&#2893;&#2911; &#2873;&#2887;&#2866;&#2878; &#2861;&#2878;&#2864;&#2852;&#2880;&#2911; &#2863;&#2881;&#2860;&#2837;&#2841;&#2893;&#2837;&#2881; &#2870;&#2879;&#2867;&#2893;&#2858; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;&#2852;&#2878; &#2821;&#2856;&#2881;&#2872;&#2878;&#2864;&#2887; &#2837;&#2892;&#2870;&#2867; &#2852;&#2878;&#2866;&#2879;&#2862; &#2854;&#2887;&#2823; &#2864;&#2891;&#2844;&#2839;&#2878;&#2864;&#2837;&#2893;&#2871;&#2862; &#2837;&#2864;&#2878;&#2823;&#2860;&#2878;&#2404; ';

$schemes4name='&#2858;&#2879;&#2831;&#2862;&#2837;&#2887;&#2837;&#2887; ';
$schemes4fullname='&#2858;&#2893;&#2864;&#2855;&#2878;&#2856;&#2862;&#2856;&#2893;&#2852;&#2893;&#2864;&#2880; &#2837;&#2892;&#2870;&#2867; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864;';
$schemes4des='&#2837;&#2892;&#2870;&#2867; &#2860;&#2879;&#2837;&#2878;&#2870;&#2837;&#2881; &#2839;&#2852;&#2879; &#2854;&#2887;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2831;&#2856;&#2831;&#2872;&#2849;&#2879;&#2872;&#2879; &#2858;&#2837;&#2893;&#2871;&#2864;&#2881;  &#2871;&#2893;&#2847;&#2887;&#2847; &#2821;&#2859; &#2854;&#2879; &#2822;&#2864;&#2893;&#2847; &#2852;&#2878;&#2866;&#2879;&#2862; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879;&#2404;';
//scheme page end

	$strOtherlbl='Others';
        $strAadharLevel='12-digit ADHAAR Number';
        $strAadharUploadLevel= 'Upload a scanned copy of your Adhaar card';
	$strBlocklbl='Block';
	$ourVisonlbl=' &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911;';
	
	
	//Skill Musium page start
	
$skilledVideo ='&#2861;&#2879;&#2849;&#2876;&#2879;&#2835; &#2854;&#2887;&#2838;&#2879;&#2860;&#2878;&#2837;&#2881; &#2837;&#2893;&#2866;&#2879;&#2837;&#2893; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';	
$skilled1=' &#2872;&#2893;&#2837;&#2879;&#2866; &#2862;&#2893;&#2911;&#2881;&#2844;&#2879;&#2911;&#2862;';		
$skilled2='&#2862;&#2893;&#2911;&#2881;&#2844;&#2879;&#2911;&#2862; &#2844;&#2856;&#2872;&#2878;&#2855;&#2878;&#2864;&#2851;&#2841;&#2893;&#2837;&#2881;  &#2870;&#2879;&#2837;&#2893;&#2871;&#2879;&#2852; &#2837;&#2864;&#2879;&#2860;&#2878; &#2872;&#2873; &#2864;&#2891;&#2842;&#2837; &#2832;&#2852;&#2879;&#2873;&#2878;&#2872;&#2879;&#2837; &#2852;&#2853;&#2893;&#2911; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2879;&#2853;&#2878;&#2831;&#2404; &#2862;&#2878;&#2856;&#2860;&#2860;&#2878;&#2854;&#2864; &#2863;&#2878;&#2852;&#2893;&#2864;&#2878; &#2831;&#2837; &#2866;&#2862;&#2893;&#2860;&#2878; &#2835; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2872;&#2862;&#2893;&#2858;&#2856;&#2893;&#2856; &#2821;&#2847;&#2887;&#2404; &#2831;&#2873;&#2878;&#2837;&#2881; &#2872;&#2881;&#2864;&#2837;&#2893;&#2871;&#2878; &#2854;&#2887;&#2860;&#2878; &#2825;&#2842;&#2879;&#2852; &#2404; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2849; &#2823;&#2856; &#2835;&#2849;&#2879;&#2870;&#2878; &#2862;&#2879;&#2870;&#2856; &#2872;&#2893;&#2837;&#2879;&#2866; &#2862;&#2893;&#2911;&#2881;&#2844;&#2879;&#2911;&#2862;&#2864; &#2858;&#2864;&#2879;&#2837;&#2867;&#2893;&#2858;&#2856;&#2878; &#2837;&#2864;&#2879;&#2843;&#2879;&#44; &#2831;&#2861;&#2867;&#2879;  &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2861;&#2878;&#2864;&#2852;&#2864;&#2887; &#2858;&#2893;&#2864;&#2853;&#2862; &#2404; &#2831;&#2873;&#2879; &#2862;&#2893;&#2911;&#2881;&#2844;&#2879;&#2911;&#2862;&#2864;&#2887; &#2919;&#2927;&#2918;&#2924; &#2862;&#2872;&#2879;&#2873;&#2878; &#2848;&#2878;&#2864;&#2881; &#2821;&#2856;&#2887;&#2837; &#2858;&#2893;&#2864;&#2878;&#2842;&#2880;&#2856; &#2860;&#2872;&#2893;&#2852;&#2881; &#2863;&#2853;&#2878; &#2858;&#2881;&#2864;&#2881;&#2851;&#2878; &#2863;&#2856;&#2893;&#2852;&#2893;&#2864;&#2878;&#2818;&#2870;&#44; &#2825;&#2858;&#2837;&#2864;&#2851; &#2852;&#2853;&#2878; &#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#2864;&#2893;&#2853;&#2880;&#2841;&#2893;&#2837; &#2854;&#2893;&#2869;&#2878;&#2864;&#2878;  &#2821;&#2861;&#2879;&#2856;&#2860; &#2858;&#2864;&#2879;&#2863;&#2891;&#2844;&#2856;&#2878;&#2864;&#2887; &#2849;&#2879;&#2844;&#2878;&#2823;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2853;&#2879;&#2860;&#2878; &#2858;&#2854;&#2878;&#2864;&#2893;&#2853; &#2872;&#2818;&#2839;&#2893;&#2864;&#2873; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879; &#2404;';	

$skilled3='&#2864;&#2878;&#2844;&#2893;&#2911;&#2864; &#2858;&#2893;&#2864;&#2853;&#2862; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2872;&#2818;&#2839;&#2893;&#2864;&#2873;&#2878;&#2867;&#2911; &#2837;&#2847;&#2837; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2848;&#2878;&#2864;&#2887; &#2858;&#2893;&#2864;&#2852;&#2879;&#2871;&#2893;&#2848;&#2878; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879;&#2404; &#2863;&#2878;&#2873;&#2878;&#2837;&#2879; &#2920;&#2924;&#2918;&#2918; &#2860;&#2864;&#2893;&#2839;&#2837;&#2893;&#2871;&#2887;&#2852;&#2893;&#2864; &#2821;&#2846;&#2893;&#2842;&#2867;&#2864;&#2887; &#2856;&#2879;&#2864;&#2893;&#2862;&#2878;&#2851; &#2873;&#2887;&#2823;&#2843;&#2879;&#2404; &#2831;&#2848;&#2878;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2872;&#2862;&#2893;&#2858;&#2864;&#2893;&#2837;&#2879;&#2852; &#2825;&#2858;&#2837;&#2864;&#2851; &#2864;&#2873;&#2879;&#2843;&#2879; &#2404; &#2862;&#2879;&#2867;&#2879;&#2853;&#2879;&#2860;&#2878; &#2872;&#2882;&#2842;&#2856;&#2878; &#2821;&#2856;&#2881;&#2872;&#2878;&#2864;&#2887;&#44; &#2831;&#2848;&#2878;&#2864;&#2887; &#2860;&#2879;&#2870;&#2893;&#2860;&#2872;&#2893;&#2852;&#2864;&#2880;&#2911; &#2858;&#2893;&#2864;&#2854;&#2864;&#2893;&#2870;&#2856;&#2880; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2873;&#2887;&#2860;&#2878; &#2872;&#2873; &#2822;&#2855;&#2881;&#2856;&#2879;&#2837; &#2835; &#2858;&#2878;&#2864;&#2862;&#2893;&#2858;&#2864;&#2879;&#2837; &#2844;&#2893;&#2846;&#2878;&#2856; &#2837;&#2892;&#2870;&#2867;&#2837;&#2881; &#2822;&#2838;&#2879; &#2822;&#2839;&#2864;&#2887; &#2864;&#2838;&#2879; &#2831;&#2873;&#2878;&#2837;&#2881; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2881;&#2852; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879; &#2404; &#2863;&#2881;&#2860;&#2858;&#2879;&#2850;&#2880; &#2831;&#2873;&#2878; &#2854;&#2893;&#2860;&#2878;&#2864;&#2878; &#2825;&#2858;&#2837;&#2883;&#2852; &#2873;&#2887;&#2860;&#2887; &#2835; &#2837;&#2879;&#2843;&#2879; &#2856;&#2882;&#2822; &#2870;&#2879;&#2838;&#2879;&#2860;&#2887; &#2404; &#2837;&#2878;&#2864;&#2851; &#2860;&#2864;&#2893;&#2852;&#2862;&#2878;&#2856; &#2872;&#2862;&#2911;&#2864;&#2887; &#2863;&#2887;&#2858;&#2864;&#2879; &#2861;&#2878;&#2860;&#2864;&#2887; &#2872;&#2878;&#2864;&#2878; &#2860;&#2879;&#2870;&#2893;&#2860; &#2821;&#2839;&#2893;&#2864;&#2872;&#2864; &#2873;&#2887;&#2825;&#2843;&#2879; &#2852;&#2878;&#2873;&#2878;&#2837;&#2881; &#2866;&#2837;&#2893;&#2871;&#2893;&#2911;&#2864;&#2887; &#2864;&#2838;&#2879; &#2831;&#2873;&#2878;&#2837;&#2881; &#2856;&#2879;&#2864;&#2893;&#2862;&#2878;&#2851; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879; &#2404; &#2822;&#2844;&#2879;&#2864; &#2863;&#2881;&#2860; &#2860;&#2864;&#2893;&#2839; &#2831;&#2873;&#2878;&#2848;&#2878;&#2864;&#2881; &#2856;&#2879;&#2870;&#2893;&#2842;&#2879;&#2852; &#2837;&#2879;&#2843;&#2879; &#2870;&#2879;&#2838;&#2879;&#2860;&#2878;&#2864; &#2822;&#2870;&#2878; &#2864;&#2838;&#2878; &#2863;&#2878;&#2823;&#2843;&#2879; &#2404; &#2860;&#2879;&#2870;&#2893;&#2860;&#2872;&#2893;&#2852;&#2864;&#2880;&#2911; &#2872;&#2862;&#2872;&#2893;&#2852; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2872;&#2881;&#2860;&#2879;&#2855;&#2878; &#2831;&#2848;&#2878;&#2864;&#2887; &#2825;&#2858;&#2866;&#2860;&#2893;&#2855; &#2873;&#2887;&#2860; &#2404; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2825;&#2858;&#2837;&#2864;&#2851; &#2872;&#2878;&#2855;&#2878;&#2864;&#2851; &#2866;&#2887;&#2878;&#2837;&#2841;&#2893;&#2837;&#2881; &#2858;&#2893;&#2864;&#2854;&#2864;&#2893;&#2870;&#2856; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860; &#2404; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864; &#2860;&#2864;&#2893;&#2844;&#2893;&#2911;&#2860;&#2872;&#2893;&#2852;&#2881;&#2837;&#2881; &#2831;&#2848;&#2878;&#2864;&#2887; &#2860;&#2893;&#2911;&#2860;&#2873;&#2878;&#2864; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860; &#2863;&#2878;&#2873;&#2878; &#2866;&#2887;&#2878;&#2837;&#2841;&#2893;&#2837;&#2881; &#2821;&#2856;&#2887;&#2837; &#2858;&#2893;&#2864;&#2887;&#2864;&#2851;&#2878; &#2854;&#2887;&#2860; &#2404;';
$skilled4='&#2831;&#2873;&#2878;&#2837;&#2881; &#2856;&#2879;&#2864;&#2893;&#2862;&#2878;&#2851; &#2837;&#2864;&#2878;&#2863;&#2879;&#2860;&#2878; &#2872;&#2862;&#2911;&#2864;&#2887; &#2821;&#2856;&#2887;&#2837; &#2837;&#2853;&#2878;&#2837;&#2881; &#2855;&#2893;&#2911;&#2878;&#2856; &#2854;&#2879;&#2822;&#2863;&#2878;&#2823;&#2843;&#2879;&#2404; &#2831;&#2873;&#2878;&#2864; &#2856;&#2879;&#2864;&#2893;&#2862;&#2878;&#2851; &#2870;&#2888;&#2867;&#2880;&#2864;&#2887; &#2821;&#2852;&#2893;&#2911;&#2856;&#2893;&#2852; &#2856;&#2879;&#2838;&#2881;&#2851;&#2852;&#2878; &#2864;&#2873;&#2879;&#2843;&#2879;&#2404; &#2831;&#2873;&#2878; &#2862;&#2855;&#2893;&#2911;&#2864;&#2887; &#2858;&#2878;&#2848;&#2839;&#2878;&#2864; &#2862;&#2855;&#2893;&#2911; &#2864;&#2873;&#2879;&#2843;&#2879; &#2404; &#2831;&#2873;&#2879; &#2872;&#2818;&#2839;&#2893;&#2864;&#2873;&#2878;&#2867;&#2911;&#2864;&#2887; &#2860;&#2879;&#2861;&#2879;&#2856;&#2893;&#2856; &#2858;&#2893;&#2864;&#2837;&#2878;&#2864;&#2864; &#2837;&#2892;&#2870;&#2867; &#2822;&#2855;&#2878;&#2864;&#2879;&#2852; &#2863;&#2856;&#2893;&#2852;&#2893;&#2864;&#2858;&#2878;&#2852;&#2879;&#44; &#2862;&#2882;&#2864;&#2893;&#2852;&#2893;&#2852;&#2879;&#44; &#2825;&#2858;&#2837;&#2864;&#2851; &#2858;&#2893;&#2864;&#2854;&#2864;&#2893;&#2870;&#2879;&#2852; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879;&#2404; &#2872;&#2818;&#2839;&#2893;&#2864;&#2873;&#2878;&#2867;&#2911;&#2864;&#2887; &#2860;&#2864;&#2893;&#2844;&#2893;&#2911;&#2860;&#2872;&#2893;&#2852;&#2881;&#2864;&#2881; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2881;&#2852; &#2872;&#2818;&#2864;&#2842;&#2856;&#2878; &#2835; &#2825;&#2858;&#2863;&#2891;&#2839;&#2880; &#2825;&#2852;&#2893;&#2858;&#2878;&#2854; &#2858;&#2893;&#2864;&#2854;&#2864;&#2893;&#2870;&#2879;&#2852; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879; &#2404; &#2863;&#2878;&#2873;&#2878; &#2866;&#2891;&#2837;&#2841;&#2893;&#2837;&#2881; &#2861;&#2879;&#2856;&#2893;&#2856; &#2855;&#2878;&#2864;&#2851;&#2878;&#2864;&#2887; &#2842;&#2879;&#2856;&#2893;&#2852;&#2878; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2887;&#2864;&#2851;&#2878; &#2863;&#2891;&#2839;&#2878;&#2823;&#2860; &#2860;&#2879;&#2870;&#2887;&#2871; &#2837;&#2864;&#2879; &#2861;&#2860;&#2879;&#2871;&#2893;&#2911;&#2852;&#2864;&#2887; &#2858;&#2893;&#2864;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879;&#2860;&#2879;&#2854;&#2893;&#2911;&#2878;&#2864; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;&#2852;&#2878;&#2837;&#2881; &#2854;&#2883;&#2871;&#2893;&#2847;&#2879;&#2864;&#2887; &#2864;&#2838;&#2879; &#2863;&#2881;&#2860;&#2858;&#2879;&#2850;&#2879;&#2841;&#2893;&#2837; &#8216;&#2849;&#2879;&#2844;&#2878;&#2823;&#2856; &#2853;&#2879;&#2841;&#2893;&#2837;&#2879;&#2841;&#2893;&#2839;&#8217; &#2825;&#2858;&#2864;&#2887; &#2839;&#2881;&#2864;&#2881;&#2852;&#2893;&#2869; &#2854;&#2879;&#2822;&#2863;&#2879;&#2860;&#2404;';	

	$skilled5='&#2831;&#2873;&#2879; &#2872;&#2818;&#2839;&#2893;&#2864;&#2873;&#2878;&#2867;&#2911; &#2866;&#2891;&#2837;&#2841;&#2893;&#2837; &#2858;&#2878;&#2823;&#2817; &#2872;&#2837;&#2878;&#2867; &#2919;&#2918; &#2847;&#2878; &#2864;&#2881; &#2872;&#2856;&#2893;&#2855;&#2893;&#2911;&#2878; &#2923; &#2847;&#2878; &#2863;&#2878;&#2831;&#2817; &#2838;&#2891;&#2866;&#2878; &#2864;&#2873;&#2879;&#2860; &#2404;<br/>
        ';		

	$closed='&#2837;&#2887;&#2860;&#2867; &#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2843;&#2881;&#2847;&#2879;&#2864;&#2887; &#2831;&#2873;&#2879; &#2872;&#2818;&#2839;&#2893;&#2864;&#2873;&#2878;&#2867;&#2911; &#2860;&#2856;&#2893;&#2854; &#2864;&#2873;&#2879;&#2860;  &#124;     
        ';	
	
	$skillphone='&#2859;&#2891;&#2856;&#2893; &#2856;&#2862;&#2893;&#2860;&#2864; :- 9776797767';
	$skillemail='&#2823;&#2862;&#2887;&#2866;&#2893; :- sudhasmita@gmail.com';
	
	$skilled6='&#2837;&#2887;&#2862;&#2879;&#2852;&#2879; &#2858;&#2873;&#2846;&#2893;&#2842;&#2879;&#2860;&#2887; ';	
	
$filterDistLevel='&#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880; &#2860;&#2878;&#2843;&#2856;&#2893;&#2852;&#2881';	
	
$strAvailCourse='&#2825;&#2858;&#2866;&#2860;&#2893;&#2855; &#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;';
$strInstituteProfile='&#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856; &#2858;&#2893;&#2864;&#2891;&#2859;&#2878;&#2823;&#2866;';	
$strInstCountinfo5 = '&#2847;&#2879; &#2872;&#2864;&#2837;&#2878;&#2864;&#2880;  &#2858;&#2866;&#2879;&#2847;&#2887;&#2837;&#2893;&#2856;&#2879;&#2837;&#2893; &#2825;&#2858;&#2866;&#2860;&#2893;&#2855;';
$skilledbanner1='&#2822;&#2823;&#2847;&#2879;&#2822;&#2823; &#2837;&#2847;&#2837; &#2864;&#2887; &#2854;&#2887;&#2870;&#2864; &#2858;&#2893;&#2864;&#2853;&#2862; &#2872;&#2893;&#2837;&#2879;&#2866; &#2862;&#2893;&#2911;&#2881;&#2844;&#2879;&#2911;&#2862;';
$strsearchKeyword='&#2838;&#2891;&#2844;&#2879;&#2853;&#2879;&#2860;&#2878; &#2870;&#2860;&#2893;&#2854;'; 
$strPopularPage='&#2872;&#2860;&#2881; &#2848;&#2878;&#2864;&#2881; &#2866;&#2891;&#2837;&#2858;&#2893;&#2864;&#2879;&#2911; &#2858;&#2883;&#2871;&#2893;&#2848;&#2878;';
$strSearchInput='&#2870;&#2860;&#2893;&#2854; &#2854;&#2879;&#2821;&#2856;&#2893;&#2852;&#2881;';
$strLastUpdate='&#2870;&#2887;&#2871; &#2853;&#2864; &#2821;&#2858;&#2849;&#2887;&#2847;&#2893;  &#2873;&#2887;&#2823;&#2853;&#2879;&#2860;&#2878; &#2872;&#2862;&#2911;';
$strWordSearchFor='&#2822;&#2862;&#2887; &#2854;&#2881;&#2819;&#2838;&#2879;&#2852;&#2404;  &#2822;&#2858;&#2851; &#2838;&#2891;&#2844;&#2881;&#2853;&#2879;&#2860;&#2878; &#2870;&#2860;&#2893;&#2854;';
$strWordSearchFor2='&#2831;&#2848;&#2878;&#2864;&#2887; &#2856;&#2878;&#2873;&#2879;&#2817;&#2404; &#2837;&#2879;&#2843;&#2879; &#2821;&#2856;&#2893;&#2911; &#2870;&#2860;&#2893;&#2854; &#2866;&#2887;&#2838;&#2879; &#2822;&#2825;&#2853;&#2864;&#2887; &#2842;&#2887;&#2876;&#2871;&#2893;&#2847;&#2878; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;&#2404;';
$strNanoRadio1 = '&#2822;&#2858;&#2851; &#2837;&#2892;&#2851;&#2872;&#2879; &#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2847;&#2879;&#2822;&#2823;&#2864;&#2881; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2856;&#2887;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879; &#2837;&#2879;&#63;';
$strNanoRadio2 = '&#2837;&#2892;&#2851;&#2872;&#2879; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2872;&#2887;&#2851;&#2893;&#2847;&#2864;&#2864;&#2881; &#2872;&#2893;&#2837;&#2879;&#2866; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2856;&#2887;&#2823;&#2843;&#2856;&#2893;&#2852;&#2879; &#2837;&#2879;&#63;';
$strNanoITI    = '&#2872;&#2864;&#2837;&#2878;&#2864;&#2880; &#2822;&#2823;&#2822;&#2847;&#2879;&#2822;&#2823; &#2842;&#2911;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
$strNanoCenter = '&#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2872;&#2887;&#2851;&#2893;&#2847;&#2864; &#2842;&#2911;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
$strNanoTrade  = '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2842;&#2911;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
$coronaSkillMsg  = "&#2835;&#2908;&#2879;&#2870;&#2878; &#2872;&#2893;&#2837;&#2879;&#2866;&#2893;&#2872; &#2920;&#2918;&#2920;&#2919;&#39;  &#2858;&#2878;&#2823;&#2817; &#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2864;&#2851;  &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2831;&#2848;&#2878;&#2864;&#2887; &#2837;&#2893;&#2866;&#2879;&#2837; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;&#2404;";
$skillResult  = '&#2839;&#2852; &#2926; &#2859;&#2887;&#2860;&#2883;&#2911;&#2878;&#2864;&#2880;&#44; &#2920;&#2918;&#2920;&#2918;&#2864;&#2887; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878;  &#39;&#2835;&#2908;&#2879;&#2870;&#2878; &#2872;&#2893;&#2837;&#2879;&#2866;&#39;  &#2858;&#2893;&#2864;&#2853;&#2862; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2878;&#2911; &#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878;&#2864; &#2859;&#2867;&#2878;&#2859;&#2867; &#2840;&#2891;&#2871;&#2879;&#2852;&#2404; <br/>';
$registrationMsg  = '&#2835;&#2849;&#2876;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2879;&#2852;&#2878; &#2920;&#2918;&#2920;&#2919; &#2864;&#2887; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2858;&#2878;&#2823;&#2817; &#2831;&#2848;&#2878;&#2864;&#2887; &#2837;&#2893;&#2866;&#2879;&#2837; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;&#2404;';

$coronaTenderMsg  = "&#2856;&#2879;&#2863;&#2881;&#2837;&#2893;&#2852;&#2879; &#2858;&#2878;&#2823;&#2860;&#2878;&#2864; &#2858;&#2864;&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2880; &#2858;&#2864;&#2893;&#2863;&#2893;&#2863;&#2878;&#2911;  &#2863;&#2878;&#2846;&#2893;&#2842; &#2837;&#2864;&#2879;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817;  &#2872;&#2818;&#2872;&#2893;&#2853;&#2878; &#2842;&#2911;&#2856; &#2856;&#2879;&#2862;&#2856;&#2893;&#2852;&#2887; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2878;&#2860; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;";

$coringenTenderMsg = "PMKVY 3.0 CSSM  &#2837;&#2878;&#2864;&#2893;&#2863;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862; &#2821;&#2856;&#2893;&#2852;&#2864;&#2893;&#2839;&#2852; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2858;&#2878;&#2864;&#2893;&#2847;&#2856;&#2864;&#2841;&#2893;&#2837; &#2831;&#2862;&#2893;&#2858;&#2878;&#2856;&#2887;&#2866;&#2862;&#2887;&#2851;&#2893;&#2847; &#2858;&#2878;&#2823;&#2817; &#69;&#79;&#73; &#2864; &#2860;&#2879;&#2849;&#2893; &#2835;&#2858;&#2856;&#2879;&#2818; &#2862;&#2879;&#2847;&#2879;&#2818;&#2864;&#2887; &#2863;&#2891;&#2839;&#2854;&#2887;&#2860;&#2878;&#2837;&#2881; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878;&#2837;&#2881; &#2831;&#2848;&#2878;&#2864;&#2887; &#2837;&#2893;&#2866;&#2879;&#2837;&#2893; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881; &#124;";

$IFBTenderMsg = "&#2822;&#2823;&#2872;&#2879;&#2860;&#2879;&#44; &#2831;&#2856;&#2872;&#2879;&#2860;&#2879; &#2831;&#2860;&#2818; &#2872;&#2858;&#2879;&#2818; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#2858;&#2878;&#2823;&#2817; &#2847;&#2887;&#2851;&#2893;&#2849;&#2864; &#2822;&#2873;&#2893;&#2869;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2825;&#2843;&#2879; &#124;";

$IFBRFPMsg = "&#2835;&#2849;&#2876;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2837;&#2867;&#2893;&#2858; &#2821;&#2855;&#2880;&#2856;&#2864;&#2887; &#73;&#67;&#2861;&#2893; &#2831;&#2860;&#2818; &#2851;&#2893;&#67;&#2861;&#2893; &#2858;&#2893;&#2911;&#2878;&#2837;&#2887;&#2844;&#2893; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2879; &#2860;&#2879;&#2849;&#2893; &#2862;&#2879;&#2847;&#2879;&#2841;&#2893;&#2839;&#2864; &#2870;&#2881;&#2854;&#2893;&#2855;&#2879;&#2858;&#2852;&#2893;&#2864; &#2852;&#2853;&#2878; &#2862;&#2879;&#2847;&#2879;&#2841;&#2893;&#2839;&#2864; &#2862;&#2879;&#2856;&#2879;&#2847;&#2893;&#2872; &#40;&#2870;&#2887;&#2871; &#2852;&#2878;&#2864;&#2879;&#2838; &#2921;&#2918; &#2844;&#2881;&#2856;&#2893; &#2920;&#2918;&#2920;&#2919; &#2858;&#2864;&#2893;&#2863;&#2893;&#2911;&#2856;&#2893;&#2852; &#2860;&#2850;&#2879;&#2866;&#2878;&#41;";
	
$coronaRoadMapMsg1= "&#2835;&#2908;&#2879;&#2870;&#2878;&#2864;&#2887; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870;&#2864; &#2856;&#2880;&#2852;&#2879; &#2856;&#2879;&#2864;&#2893;&#2854;&#2893;&#2855;&#2878;&#2864;&#2851; &#2852;&#2853;&#2878; &#2861;&#2879;&#2844;&#2856;&#45;&#2920;&#2918;&#2921;&#2918;&#2864; &#2860;&#2879;&#2837;&#2878;&#2870; &#2866;&#2878;&#2839;&#2879; &#2872;&#2818;&#2872;&#2893;&#2853;&#2878;&#2862;&#2878;&#2856;&#2841;&#2893;&#2837; &#2848;&#2878;&#2864;&#2881; &#2822;&#2860;&#2887;&#2854;&#2856; &#2858;&#2852;&#2893;&#2864; &#2822;&#2873;&#2893;&#2869;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2825;&#2843;&#2879;&#2404;";



$extAuditor   = "&#2835;&#2849;&#2876;&#2879;&#2870;&#2878;  &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;&#2864;&#2887; &#2860;&#2878;&#2873;&#2893;&#2911; &#2821;&#2849;&#2876;&#2879;&#2847;&#2864; &#2856;&#2879;&#2911;&#2891;&#2844;&#2856; &#2858;&#2878;&#2823;&#2817; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2878;&#2869; &#2822;&#2839;&#2893;&#2864;&#2873;&#2893;&#2911;";

$bannerTitle = "&#2840;&#2864;&#2887; &#2864;&#2881;&#2873;&#2856;&#2893;&#2852;&#2881;&#44; &#2837;&#2864;&#2891;&#2856;&#2878;&#2864;&#2881; &#2860;&#2846;&#2893;&#2842;&#2856;&#2893;&#2852;&#2881; &#2404;";

$urgentMsg       ='&#2861;&#2879;&#2844;&#2856; &#2920;&#2918;&#2921;&#2918; &#2858;&#2893;&#2864;&#2872;&#2893;&#2852;&#2878;&#2860; &#2822;&#2839;&#2893;&#2864;&#2873;&#2893;&#2911; &#2858;&#2893;&#2864;&#2837;&#2893;&#2864;&#2879;&#2911;&#2878; &#2856;&#2879;&#2862;&#2856;&#2893;&#2852;&#2887; &#2858;&#2893;&#2864;&#2879;&#45;&#2860;&#2879;&#2849;&#2876; &#2862;&#2879;&#2847;&#2879;&#2841;&#2893;&#2839; &#2821;&#2856;&#2866;&#2878;&#2823;&#2856; &#2854;&#2893;&#2929;&#2878;&#2864;&#2878; &#2873;&#2887;&#2860;&#2878; &#2858;&#2878;&#2823;&#2817; &#2856;&#2891;&#2847;&#2879;&#2872; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2839;&#2866;&#2878;';
	
$skillDeveloment = "&#2837;&#2891;&#2864;&#2872;&#2887;&#2864;&#2878; &#2858;&#2893;&#2866;&#2878;&#2847;&#2859;&#2864;&#2893;&#2862; &#2858;&#2878;&#2823;&#2817; &#2831;&#2848;&#2878;&#2864;&#2887; &#2858;&#2846;&#2893;&#2844;&#2879;&#2837;&#2864;&#2851; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;&#2404;";

$sapErp = "Register for Online Test for qualifying to take SAP ERP course for students who have applied for the SAP ERP Program";
  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>