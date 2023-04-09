<?php
  /* ================================================
      File Name                   : skill-compete-registerInner.php
      Description             : This page is to addskill competetion form
      Date Created            : 20-Jan-2018 
      Created By              : T Ketaki Debadarshini
      Update History          :
      <Updated by>              <Updated On>        <Remarks>
  ================================================== */
  //============= include class path ============ //
   //$_SESSION['lang']='O';
    include_once(CLASS_PATH.'clsSkillCompetition.php');

  //=========== create object ================= //
    $objCompete             = new  clsSkillCompetition;
    $selDistrict            = 0;
    $selState               = 0;
    $selAddressSate         = 0;
    $selQualification       = 0;
    $hdnStrSkill='';
    
    $idproofary             = json_decode($objCompete->idproof);
   
    
    $strSkills              = array();
    
    //$strType              = (isset($_REQUEST['NID']) && $_REQUEST['NID']!='')?$_REQUEST['NID']:'';
    //echo $_SERVER['REQUEST_URI'].'sdsdsd';
    
    $url                    = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $details                = parse_url($url);
    
    if($details["query"]!=''){
        $detailsAllAry      = explode('&', $details["query"]);
        $detailsAry         = explode('=', $detailsAllAry[0]);
        $strType            = $detailsAry[1];
        
        $detailslangAry     = explode('=', $detailsAllAry[1]);
        $strLang            = $detailslangAry[1];
    }
    
  // echo $details["query"];
    /********************start : get skill details***************/
    
     $skillResults = $objCompete->manageSkillCompetition('SK',0,0,0,'','','','',0,'0000-00-00','','','','','','',0,'','','',0,'',0,'',0,'','',0,0,0,'0000-00-00','0000-00-00');
    /********************start : get skill details***************/
    $compId = !empty($_REQUEST['PARAM'])?$objCompete->decrypt($_REQUEST['PARAM']):0;

    if(!empty($compId))
    {
        $result             = $objCompete->readSkillUpdation($compId);
        $row = mysqli_fetch_array($result);
        //print_r($result);exit;

        $selState           =  $row['intStateId'];
         
        $selBlock           =  $row['intBlockId'];
        $selDistrict        =  $row['intDistrictid'];
        $txtFirstName       =  $row['vchFirstName'];
        $txtMiddleName      =  $row['vchMiddleName'];
        $txtLastName        =  $row['vchLastName'];
        $rdoGender          =  $row['tinGender'];
        $txtDob             =  $row['dtmDob'];
        $txtEmail           =  $row['vchEmailId'];
        $txtPhone           =  $row['vchPhoneno'];
        $selQualification   =  $row['intQualificationId'];
        if($row['vchAcademicInstitute']=='')
        {
            $txtAcademicInstitute  =  $row['vchWorkPlace'];
        }
        else
        {
            $txtAcademicInstitute  =  $row['vchAcademicInstitute'];
        }
        
        
        $selIdProof            =  $row['vchAadharId'];
        $fileDocument          =  $row['vchDocument'];
        $profilePhoto          =  $row['vchProfilePhoto'];
        
        if($row['strUpdateSkills']=='')
        {
            $strSkills             =  $row['strSkills'];
        }
        else
        {
            $strSkills       =  $row['strUpdateSkills'];
        }
        
       
    }
 //============ Button Submit ===================
    if (isset($_POST['btnSubmitSkill'])) {
    //echo "xsacdcd";
        //$addInfo            = array('selIdProof'=>$selIdProof,'txtEmail'=>$txtEmail,'txtPhone'=>$txtPhone);
        $result             = $objCompete->addCompetitionSkill($strType,$strLang,$compId);
        $outMsg             = $result['msg'];     
        $errFlag            = $result['errFlag'];
        
       
        $selState           =  $result['selState'];
         
        $selBlock           =  $result['selBlock'];
        $selDistrict        =  $result['selDistrict'];
        $txtFirstName       =  $result['txtFirstName'];
        $txtMiddleName      =  $result['txtMiddleName'];
        $txtLastName        =  $result['txtLastName'];
        $rdoGender          =  $result['rdoGender'];
        $txtDob             =  $result['txtDob'];
        $txtEmail           =  $result['txtEmail'];
        $txtPhone           =  $result['txtPhone'];
        $selQualification   =  $result['selQualification'];
        $txtAcademicInstitute  =  $result['txtAcademicInstitute'];
        $rdoWorkSatus          =  $result['rdoWorkSatus'];
        $selIdProof            =  $result['selIdProof'];
        $fileDocument          =  $result['fileDocument'];
        $strSkills             =  $result['strSkills'];
        
        $txtFirstNamepop       =  $result['txtFirstNamepop'];
        $txtLastNamepop        =  $result['txtLastNamepop'];
        $rdoGenderpop          =  $result['rdoGenderpop'];
        $txtDobpop             =  $result['txtDobpop'];
        $txtEmailpop           =  $result['txtEmailpop'];
        $txtPhonepop           =  $result['txtPhonepop'];
        $selQualificationpop   =  $result['selQualificationpop'];
        $txtAcademicInstitutepop  =  $result['txtAcademicInstitutepop'];
        $rdoWorkSatuspop          =  $result['rdoWorkSatuspop'];
        $selIdProofpop            =  $result['selIdProofpop'];
        $fileDocumentpop          =  $result['fileDocumentpop'];
        $strSkillspop             =  $result['strSkillspop'];
        $hdnStrSkill=$result['hdnStrSkill'];
        $redirectLoc = $result['ridrectUrl'];
        
       
  
       // $redirectLoc   = ($errFlag==0)?SITE_URL.(($_REQUEST['PG']!=''?$_REQUEST['PG']:'')).(($_REQUEST['GL']!=''?'/'.$_REQUEST['GL']:'')).(($_REQUEST['PL']!=''?'/'.$_REQUEST['PL']:'')).(($_REQUEST['NID']!=''?'/'.$_REQUEST['NID']:'')):"";
    }     
    
  
    if($strType=='mob')    
     $_SESSION['lang']      = ($strLang =='eng' && $strType=='mob')?'E':'O';
     
    
    /****************************/
    
        $strStatelbl        = 'State';
        $strFirstNamelbl    = 'First Name';
        $strMiddleNamelbl   = 'Middle Name';
        $strLastNamelbl     = 'Last Name';

        $strGenderlbl       = 'Gender';
        $strSkilllbl        = 'Select your skill';
        $strMalelbl         = 'Male';
        $strFemalelbl       = 'Female';
        $strDoblbl          = 'Date of Birth';
        $strEmaillbl        = 'Email ID';
        $strMobnolbl        = 'Mobile No';
        $strBirthplacelbl   = 'Birth Place';
        $strLivingcitylbl   = 'Currently living in which city';
        $strAddress1lbl     = 'Address Line 1';
        $strAddress2lbl     = 'Address Line 2';
        $strCitylbl         = 'City';
        $strPincodelbl         = 'Pincode';
        $strSchoollbl          = 'School Name';
        $strQualificationlbl   = 'Education Qualification';
        $strAcademiclbl        = 'Name of Academic Institution ( ITI, College, University. Training Centre)';
        $strWorkinglbl         = 'Are you currently working ?';

        $strYeslbl              = 'Yes';
        $strNolbl               = 'No';
        $strOrglbl              = 'If yes, please mention the name of the organisation';
        $strIdprooflbl          = 'Proof of Identity ( Birth Certificate, Voter Id, Aadhar Id, Passport) ';
        $strIdproofdoclbl       = 'Please upload the document of identity proof (Aadhar Card/ Voter ID card/ Passport/ Birth Certificate)';

        $strfiletypelbl         = 'jpg,jpeg,pdf file only and Max file Size is 2MB';
        $strprofilefiletypelbl  = 'jpg,jpeg,png file only and Max file Size is 1MB'; 
        
        $strRegisterlbl            = 'Register';
          
        $strSelectlbl              = 'Select';
        $strSkillComplbl           = 'Register for Odisha Skills Competition - Odisha 2021';
        $strNamelbl                =   'Name';
         
        $strSubmitlbl              =   'Submit';
        $queryCaptcha              = "Captcha Code";
        
        $strSkillInfolbl               =   'Skill Details';
        $strProfilepiclbl              =   'Upload Profile Photo';
        $strApplicantinfolbl           =   'Applicant Information';
        $strProfileVallbl              =   'jpg,jpeg,png file only and Max file Size is 1MB';
        $firstParticipant              = 'First Participant Information';
        $secondParticipant             = 'Second Participant Information';
        $noteforrobotics               = 'Mechatronics, Mobile Robotics, Landscape Gardening, Cyber Security,Robot System Integration,Industry 4.O are grouped competition and for this two participants are required.  ';
        $strDistrictlbl='District'; 
       
        $strBornmsg='Applicant should born on or after 1st Jan 1996 for this trade.';
        $strExamcenter='Your exam centre will be alloted according to your selection of district and block.';
        $strBlock='Block';
        $strOtherslbl='Others';
        $strAadharLevel='12-digit ADHAAR Number';
        $strAadharUploadLevel='Upload a scanned copy of your Adhaar card';
        $agreemsgLbl='I agree to receive the message in my whatsapp number'; 
        $strSubmitFormlbl='Submit Your Form'; 
        $strIndicatelbl  =' Indicates Applicant should born on or after 1st Jan 1996 of this trade.';
        $disclamir = 'Disclaimer';
        $disPoint1 = 'I hereby confirm my participation in the new trade for the level 2 skill test to be organised by OSDA';
        $disPoint2 = 'I confirm that I will travel to the venue of the level 2 test as per the guidance of the organising team.';
        $disPoint3 = 'All the information shared earlier by me during registration process holds true to the best of my knowledge and I take full responsibility of the registration details. Organising team has the right to verify the data and take appropriate steps for the event.';
     if($_SESSION['lang']=='O' ){
        $strStatelbl        = '&#2864;&#2878;&#2844;&#2893;&#2911;';
          $strDistrictlbl        =  '&#2844;&#2879;&#2866;&#2893;&#2866;&#2878;';
        $strFirstNamelbl    = '&#2858;&#2893;&#2864;&#2853;&#2862; &#2856;&#2878;&#2862;';
        $strMiddleNamelbl   = '&#2862;&#2855;&#2893;&#2911;&#2862; &#2856;&#2878;&#2862;';
        $strLastNamelbl     = '&#2870;&#2887;&#2871; &#2856;&#2878;&#2862;';

        $strGenderlbl       = '&#2866;&#2879;&#2841;&#2893;&#2839;';
        $strSkilllbl        = '&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2842;&#2911;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
        $strMalelbl         = '&#2858;&#2881;&#2864;&#2881;&#2871;';
        $strFemalelbl       = '&#2862;&#2873;&#2879;&#2867;&#2878;';
        $strDoblbl          = '&#2844;&#2856;&#2893;&#2862; &#2852;&#2878;&#2864;&#2879;&#2838;';
        $strEmaillbl        = '&#2823;&#45;&#2862;&#2887;&#2866;&#2893; &#2822;&#2823;&#2849;&#2879;';
        $strMobnolbl        = '&#2862;&#2891;&#2860;&#2878;&#2823;&#2866; &#2856;&#2818;';
        $strBirthplacelbl   = '&#2844;&#2856;&#2893;&#2862; &#2872;&#2893;&#2853;&#2878;&#2856;';
        $strLivingcitylbl   = '&#2860;&#2864;&#2893;&#2852;&#2893;&#2852;&#2862;&#2878;&#2856;&#2864; &#2860;&#2878;&#2872;&#2872;&#2893;&#2853;&#2867;&#2879;';
        $strAddress1lbl     = '&#2848;&#2879;&#2837;&#2851;&#2878; &#2919;';
        $strAddress2lbl     = '&#2848;&#2879;&#2837;&#2851;&#2878; &#2920;';
        $strCitylbl         = '&#2872;&#2873;&#2864;';
        $strSchoollbl       = '&#2860;&#2879;&#2854;&#2893;&#2911;&#2878;&#2867;&#2911;&#2864; &#2856;&#2878;&#2862;';
        $strQualificationlbl   = '&#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#2839;&#2852; &#2863;&#2891;&#2839;&#2893;&#2911;&#2852;&#2878;';
        $strAcademiclbl        = '&#2870;&#2879;&#2837;&#2893;&#2871;&#2878;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864; &#2856;&#2878;&#2862; &#40;&#2822;&#2823;&#46;&#2847;&#2879;&#46;&#2822;&#2823;&#44; &#2862;&#2873;&#2878;&#2860;&#2879;&#2854;&#2893;&#2911;&#2878;&#2867;&#2911;&#44; &#2860;&#2879;&#2870;&#2893;&#2929;&#2860;&#2879;&#2854;&#2893;&#2911;&#2878;&#2867;&#2911;&#44; &#2847;&#2893;&#2864;&#2887;&#2856;&#2879;&#2818; &#2872;&#2887;&#2851;&#2893;&#2847;&#2864;&#41;';
        $strWorkinglbl         = '&#2822;&#2858;&#2851; &#2842;&#2878;&#2837;&#2879;&#2864;&#2880; &#2837;&#2864;&#2881;&#2843;&#2856;&#2893;&#2852;&#2879; &#2837;&#2879; ?';

        $strYeslbl              = '&#2873;&#2817;';
        $strNolbl               = '&#2856;&#2878;&#2817;';
        $strOrglbl              = '&#2863;&#2854;&#2879; &#2873;&#2817;&#44; &#2821;&#2856;&#2881;&#2871;&#2893;&#2848;&#2878;&#2856;&#2864; &#2856;&#2878;&#2862;';
        $strIdprooflbl          = '&#2858;&#2864;&#2879;&#2842;&#2911; &#2858;&#2852;&#2893;&#2864; &#40; &#2860;&#2878;&#2864;&#2893;&#2853; &#2872;&#2878;&#2864;&#2893;&#2847;&#2879;&#2859;&#2879;&#2837;&#2887;&#2847;&#2893;&#44; &#2861;&#2891;&#2847;&#2864; &#2822;&#2823;&#2849;&#2879;&#44; &#2822;&#2855;&#2878;&#2864; &#2822;&#2823;&#2849;&#2879;&#44; &#2858;&#2878;&#2872;&#2858;&#2891;&#2864;&#2893;&#2847; &#41; ';
        $strIdproofdoclbl       = '&#2858;&#2864;&#2879;&#2842;&#2911; &#2858;&#2852;&#2893;&#2864;&#2864; &#2856;&#2837;&#2866; &#2872;&#2818;&#2866;&#2839;&#2893;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881; &#40;&#2860;&#2878;&#2864;&#2893;&#2853; &#2872;&#2878;&#2864;&#2893;&#2847;&#2879;&#2859;&#2879;&#2837;&#2887;&#2847;&#2893;&#44; &#2861;&#2891;&#2847;&#2864; &#2822;&#2823;&#2849;&#2879;&#44; &#2822;&#2855;&#2878;&#2864; &#2822;&#2823;&#2849;&#2879;&#44; &#2858;&#2878;&#2872;&#2858;&#2891;&#2864;&#2893;&#2847; &#41;  ';

        $strfiletypelbl        = '&#2837;&#2887;&#2860;&#2867; &#2844;&#2887;&#2858;&#2879;&#2844;&#2879;&#44; &#2844;&#2887;&#2858;&#2879;&#2823;&#2844;&#2879;&#44; &#2858;&#2879;&#2849;&#2879;&#2831;&#2859; &#2859;&#2878;&#2823;&#2866;&#2893; &#2831;&#2860;&#2818; &#2872;&#2864;&#2893;&#2860;&#2878;&#2855;&#2879;&#2837; &#2859;&#2878;&#2823;&#2866;&#2893; &#2872;&#2878;&#2823;&#2844;&#2893; &#2919;&#2831;&#2862;&#2860;&#2879;&#2404;';
        
         $strPincodelbl         = '&#2858;&#2879;&#2856;&#2893; &#2837;&#2891;&#2849;&#2893;';
         
         $idproofary             = json_decode($objCompete->idproofod);
          
         $strprofilefiletypelbl  = 'jpg,jpeg,gif,png file only and Max file Size is 1MB'; 
         
         
        $strRegisterlbl            = '&#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2883;&#2852; &#2873;&#2881;&#2821;&#2856;&#2893;&#2852;&#2881;';                                
        $strSelectlbl              = '&#2842;&#2911;&#2856; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
        $strSkillComplbl           = '&#2835;&#2908;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2879;&#2852;&#2878; &#45; &#2835;&#2908;&#2879;&#2870;&#2878; &#2920;&#2918;&#2920;&#2919; &#2858;&#2878;&#2823;&#2817; &#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2864;&#2851; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
        
        $strNamelbl                = '&#2856;&#2878;&#2862;';
        $strSubmitlbl              =  '&#2856;&#2879;&#2860;&#2887;&#2854;&#2856;';
        $queryCaptcha              = "&#2837;&#2893;&#2911;&#2878;&#2858;&#2893;&#2842;&#2878; &#2837;&#2891;&#2908;";
        
        $strSkillInfolbl               =   '&#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2860;&#2864;&#2851;&#2880; ';
        $strProfilepiclbl              =   '&#2858;&#2893;&#2864;&#2891;&#2859;&#2878;&#2823;&#2866;&#2893; &#2859;&#2847;&#2891; &#2821;&#2858;&#2866;&#2891;&#2849;&#2893; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881;';
        $strApplicantinfolbl           =   '&#2822;&#2860;&#2887;&#2854;&#2856;&#2837;&#2878;&#2864;&#2880;&#2841;&#2893;&#2837; &#2860;&#2879;&#2871;&#2911;&#2864;&#2887;';
        $strProfileVallbl              =   '&#2837;&#2887;&#2860;&#2867; &#2844;&#2887;&#2858;&#2879;&#2844;&#2879;&#44; &#2844;&#2887;&#2858;&#2879;&#2823;&#2844;&#2879;&#44; &#2844;&#2879;&#2822;&#2823;&#2831;&#2859;&#2893;&#44; &#2858;&#2879;&#2831;&#2856;&#2844;&#2879; &#2859;&#2878;&#2823;&#2866;&#2893; &#2831;&#2860;&#2818; &#2872;&#2864;&#2893;&#2860;&#2878;&#2855;&#2879;&#2837; &#2859;&#2878;&#2823;&#2866;&#2893; &#2872;&#2878;&#2823;&#2844;&#2893; &#2919; &#2831;&#2862;&#2860;&#2879;';
        $noteforrobotics               = '&#2862;&#2887;&#2837;&#2847;&#2893;&#2864;&#2891;&#2856;&#2879;&#2837;&#2893;&#2872;&#44; &#2862;&#2891;&#2860;&#2878;&#2823;&#2866; &#2864;&#2891;&#2860;&#2891;&#2847;&#2879;&#2837;&#2893;&#2872;&#44; &#2866;&#2878;&#2851;&#2893;&#2849;&#2872;&#2893;&#2837;&#2887;&#2858; &#2839;&#2878;&#2864;&#2893;&#2849;&#2887;&#2856;&#2879;&#2818;&#44; &#2872;&#2878;&#2823;&#2860;&#2864; &#2872;&#2879;&#2837;&#2893;&#2863;&#2881;&#2864;&#2879;&#2847;&#2880;&#44; &#2864;&#2891;&#2860;&#2847; &#2872;&#2879;&#2871;&#2893;&#2847;&#2862; &#2823;&#2851;&#2893;&#2847;&#2887;&#2839;&#2893;&#2864;&#2887;&#2872;&#2856; &#2831;&#2860;&#2818; &#2870;&#2879;&#2867;&#2893;&#2858; &#52;&#46;&#48; &#2822;&#2854;&#2879; &#2839;&#2893;&#2864;&#2881;&#2858; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2880;&#2852;&#2878; &#2831;&#2853;&#2879;&#2864;&#2887; &#2861;&#2878;&#2839; &#2856;&#2887;&#2860;&#2878;&#2837;&#2881; &#2873;&#2887;&#2866;&#2887; &#2854;&#2881;&#2823; &#2844;&#2851; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2854;&#2867; &#2854;&#2864;&#2837;&#2878;&#2864;';
        $applicant                     = '&#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2872;&#2882;&#2842;&#2856;&#2878;';
        $firstParticipant              = '&#2858;&#2893;&#2864;&#2853;&#2862; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2872;&#2882;&#2842;&#2856;&#2878;';
        $secondParticipant              = '&#2854;&#2893;&#2869;&#2879;&#2852;&#2880;&#2911; &#2858;&#2893;&#2864;&#2852;&#2879;&#2863;&#2891;&#2839;&#2880;&#2841;&#2893;&#2837; &#2872;&#2882;&#2842;&#2856;&#2878;';
       
        $strBornmsg='&#2831;&#2873;&#2879; &#2847;&#2893;&#2864;&#2887;&#2849; &#2856;&#2879;&#2862;&#2856;&#2893;&#2852;&#2887; &#2822;&#2860;&#2887;&#2854;&#2856;&#2837;&#2878;&#2864;&#2880; &#2844;&#2878;&#2856;&#2881;&#2911;&#2878;&#2864;&#2880; &#2919;&#44; &#2919;&#2927;&#2927;&#2924; &#2854;&#2879;&#2856; &#2837;&#2879;&#2818;&#2860;&#2878; &#2858;&#2864;&#2887; &#2844;&#2856;&#2893;&#2862; &#2839;&#2893;&#2864;&#2873;&#2851; &#2837;&#2864;&#2879;&#2853;&#2879;&#2860;&#2878; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;';
         $strBlock='&#2860;&#2893;&#2866;&#2837;&#2893;';
         $strExamcenter='&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878; &#2837;&#2887;&#2856;&#2893;&#2854;&#2893;&#2864; &#2822;&#2858;&#2851; &#2842;&#2911;&#2856; &#2837;&#2864;&#2879;&#2853;&#2879;&#2860;&#2878;  &#2844;&#2879;&#2866;&#2893;&#2866;&#2878; &#2831;&#2860;&#2818; &#2860;&#2893;&#2866;&#2837;  &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880; &#2873;&#2887;&#2860;&#2404;';
          $strOtherslbl='&#2821;&#2856;&#2893;&#2911;&#2878;&#2856;&#2893;&#2911;';
         $strAadharLevel='&#2919;&#2920; &#2821;&#2841;&#2893;&#2837; &#2860;&#2879;&#2870;&#2879;&#2871;&#2893;&#2847; &#2822;&#2855;&#2878;&#2864; &#2872;&#2818;&#2838;&#2893;&#2911;&#2878;';
        $strAadharUploadLevel='&#2822;&#2858;&#2851;&#2841;&#2893;&#2837; &#2822;&#2855;&#2878;&#2864; &#2837;&#2878;&#2864;&#2893;&#2849;&#2864; &#2872;&#2893;&#2837;&#2878;&#2856; &#2837;&#2858;&#2879; &#2821;&#2858;&#2866;&#2891;&#2849; &#2837;&#2864;&#2856;&#2893;&#2852;&#2881; ';
     $agreemsgLbl='&#2862;&#2891; &#2873;&#2893;&#2869;&#2878;&#2847;&#2872;&#2878;&#2858; &#2864;&#2887; &#2862;&#2887;&#2831;&#2872;&#2844; &#2858;&#2878;&#2823;&#2860;&#2878;&#2837;&#2881; &#2862;&#2881;&#2817; &#2864;&#2878;&#2844;&#2879;&#2404;';
       $strSubmitFormlbl='&#2856;&#2879;&#2860;&#2887;&#2854;&#2856;'; 
       $strIndicatelbl  =' &#2844;&#2851;&#2878;&#2823; &#2854;&#2879;&#2822;&#2863;&#2878;&#2825;&#2843;&#2879; &#2831;&#2873;&#2879; &#2847;&#2893;&#2864;&#2887;&#2849; &#2856;&#2879;&#2862;&#2856;&#2893;&#2852;&#2887; &#2822;&#2860;&#2887;&#2854;&#2856;&#2837;&#2878;&#2864;&#2880; &#2844;&#2878;&#2856;&#2881;&#2911;&#2878;&#2864;&#2880; &#2919;&#44; &#2919;&#2927;&#2927;&#2924; &#2854;&#2879;&#2856; &#2837;&#2879;&#2818;&#2860;&#2878; &#2858;&#2864;&#2887; &#2844;&#2856;&#2893;&#2862; &#2839;&#2893;&#2864;&#2873;&#2851; &#2837;&#2864;&#2879;&#2853;&#2879;&#2860;&#2878; &#2822;&#2860;&#2870;&#2893;&#2911;&#2837;';
       $disclamir = '&#2849;&#2879;&#2872;&#2837;&#2893;&#2866;&#2887;&#2862;&#2864;';
        $disPoint1 = '&#2835;&#2849;&#2879;&#2870;&#2878; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2860;&#2879;&#2837;&#2878;&#2870; &#2858;&#2893;&#2864;&#2878;&#2855;&#2879;&#2837;&#2864;&#2851;&#2854;&#2893;&#2929;&#2878;&#2864;&#2878; &#2822;&#2911;&#2891;&#2844;&#2879;&#2852; &#2873;&#2887;&#2860;&#2878;&#2837;&#2881; &#2853;&#2879;&#2860;&#2878; &#2859;&#2887;&#2844; &#2920; &#2854;&#2837;&#2893;&#2871;&#2852;&#2878; &#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878; &#2858;&#2878;&#2823;&#2817; &#2862;&#2881;&#2817; &#2856;&#2882;&#2852;&#2856; &#2847;&#2893;&#2864;&#2887;&#2849;&#2876;&#2864;&#2887; &#2862;&#2891;&#2864; &#2821;&#2818;&#2870;&#2839;&#2893;&#2864;&#2873;&#2851;&#2837;&#2881; &#2856;&#2879;&#2870;&#2893;&#2842;&#2879;&#2852; &#2837;&#2864;&#2881;&#2843;&#2879;&#2404; ';
        $disPoint2 = '&#2862;&#2881;&#2817; &#2822;&#2911;&#2891;&#2844;&#2837;&#2841;&#2893;&#2837; &#2862;&#2878;&#2864;&#2893;&#2839;&#2854;&#2864;&#2893;&#2870;&#2856; &#2821;&#2856;&#2881;&#2863;&#2878;&#2911;&#2880; &#2859;&#2887;&#2844; &#2920; &#2858;&#2864;&#2880;&#2837;&#2893;&#2871;&#2878; &#2872;&#2893;&#2853;&#2878;&#2856;&#2837;&#2881; &#2863;&#2879;&#2860;&#2879; &#124;';
        $disPoint3 = '&#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2864;&#2851; &#2858;&#2893;&#2864;&#2837;&#2893;&#2864;&#2879;&#2911;&#2878; &#2872;&#2862;&#2911;&#2864;&#2887; &#2862;&#2891; &#2854;&#2893;&#2929;&#2878;&#2864;&#2878;  &#2858;&#2882;&#2864;&#2893;&#2860;&#2864;&#2881; &#2858;&#2893;&#2864;&#2854;&#2852;&#2893;&#2852; &#2873;&#2891;&#2823;&#2853;&#2879;&#2860;&#2878; &#2872;&#2862;&#2872;&#2893;&#2852; &#2872;&#2882;&#2842;&#2856;&#2878; &#2862;&#2891; &#2844;&#2893;&#2846;&#2878;&#2852;&#2872;&#2878;&#2864;&#2864;&#2887; &#2858;&#2893;&#2864;&#2854;&#2878;&#2856; &#2837;&#2864;&#2878;&#2863;&#2878;&#2823;&#2843;&#2879; &#2831;&#2860;&#2818; &#2831;&#2873;&#2878; &#2872;&#2852;&#2893;&#2911; &#2821;&#2847;&#2887; &#2831;&#2860;&#2818; &#2862;&#2881;&#2817; &#2858;&#2846;&#2893;&#2844;&#2880;&#2837;&#2864;&#2851; &#2860;&#2879;&#2860;&#2864;&#2851;&#2880;&#2839;&#2881;&#2849;&#2879;&#2837;&#2864; &#2872;&#2852;&#2893;&#2911;&#2852;&#2878;&#2864; &#2872;&#2862;&#2893;&#2858;&#2882;&#2864;&#2893;&#2851;&#2893;&#2851; &#2854;&#2878;&#2911;&#2879;&#2852;&#2893;&#2929; &#2839;&#2893;&#2864;&#2873;&#2851; &#2837;&#2864;&#2881;&#2843;&#2879; &#124; &#2852;&#2853;&#2893;&#2911; &#2863;&#2878;&#2846;&#2893;&#2842; &#2837;&#2864;&#2879;&#2860;&#2878; &#2831;&#2860;&#2818; &#2823;&#2861;&#2887;&#2851;&#2893;&#2847; &#2858;&#2878;&#2823;&#2817; &#2825;&#2858;&#2863;&#2881;&#2837;&#2893;&#2852; &#2858;&#2854;&#2837;&#2893;&#2871;&#2887;&#2858; &#2839;&#2893;&#2864;&#2873;&#2851; &#2837;&#2864;&#2879;&#2860;&#2878;&#2864; &#2822;&#2911;&#2891;&#2844;&#2837; &#2854;&#2867;&#2864; &#2821;&#2855;&#2879;&#2837;&#2878;&#2864; &#2821;&#2843;&#2879; &#124;';
     }
     
     $strPageTtlcls          = $strLangCls; 
     $strRegisterForlbl      = $strSkillComplbl;
?>