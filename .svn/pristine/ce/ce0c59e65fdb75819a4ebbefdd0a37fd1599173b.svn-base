<span style="display: none !important;">
<span  id="hidJan" class="<?php echo $strLangCls; ?>"><?php echo $strMJan; ?></span >
<span  id="hidFeb" class="<?php echo $strLangCls; ?>" ><?php echo $strMFeb; ?></span >
<span id="hidMarch" class="<?php echo $strLangCls; ?>" ><?php echo $strMMar; ?></span >
<span id="hidApr" class="<?php echo $strLangCls; ?>" ><?php echo $strMApr; ?></span >
<span id="hidMay" class="<?php echo $strLangCls; ?>" ><?php echo $strMMay; ?></span >
<span id="hidJune" class="<?php echo $strLangCls; ?>" ><?php echo $strMJun; ?></span >
<span id="hidJuly" class="<?php echo $strLangCls; ?>" ><?php echo $strMJul; ?></span >
<span id="hidAug" class="<?php echo $strLangCls; ?>" ><?php echo $strMAug; ?></span >
<span id="hidSep" class="<?php echo $strLangCls; ?>" ><?php echo $strMSep; ?></span >
<span id="hidOct" class="<?php echo $strLangCls; ?>" ><?php echo $strMOct; ?></span >
<span id="hidNov" class="<?php echo $strLangCls; ?>" ><?php echo $strMNov; ?></span>
<span id="hidDec" class="<?php echo $strLangCls; ?>" ><?php echo $strMDec; ?></span >


<span id="hidSunday" class="<?php echo $strLangCls; ?>" ><?php echo $strSundayLbl; ?></span >
<span id="hidMonday" class="<?php echo $strLangCls; ?>" ><?php echo $strMondayLbl; ?></span >
<span id="hidTuesday" class="<?php echo $strLangCls; ?>" ><?php echo $strTuesdayLbl; ?></span >
<span id="hidWednesday" class="<?php echo $strLangCls; ?>" ><?php echo $strWednesdayLbl; ?></span >
<span id="hidThursday" class="<?php echo $strLangCls; ?>"  ><?php echo $strThursedayLbl; ?></span >
<span id="hidFriday" class="<?php echo $strLangCls; ?>"  ><?php echo $strFridayLbl; ?></span >
<span id="hidSatday" class="<?php echo $strLangCls; ?>" ><?php echo $strSaturdayLbl; ?></span >

<span id="hidSun" class="<?php echo $strLangCls; ?>" ><?php echo $strSunLbl; ?></span >
<span id="hidMon" class="<?php echo $strLangCls; ?>" ><?php echo $strMonLbl; ?></span >
<span id="hidTues" class="<?php echo $strLangCls; ?>" ><?php echo $strTuesLbl; ?></span >
<span id="hidWednes" class="<?php echo $strLangCls; ?>" ><?php echo $strWednesLbl; ?></span >
<span id="hidThurs" class="<?php echo $strLangCls; ?>"  ><?php echo $strThurseLbl; ?></span >
<span id="hidFri" class="<?php echo $strLangCls; ?>"  ><?php echo $strFriLbl; ?></span >
<span id="hidSat" class="<?php echo $strLangCls; ?>" ><?php echo $strSaturLbl; ?></span >
</span>
<script>

      $(document).ready(function () {
		     
            <?php if($_SESSION['lang']=='O'){ ?> 
                   $('.datepicker').addClass('odianum');

             $.fn.datepicker.dates['en'] = {
                       days: [$('#hidSunday').html(),$('#hidMonday').html(),$('#hidTuesday').html(),$('#hidWednesday').html(),$('#hidThursday').html(),$('#hidFriday').html(),$('#hidSatday').html()],
                       daysShort: [$('#hidSunday').html(),$('#hidMonday').html(),$('#hidTuesday').html(),$('#hidWednesday').html(),$('#hidThursday').html(),$('#hidFriday').html(),$('#hidSatday').html()],
                       daysMin: [$('#hidSun').html(),$('#hidMon').html(),$('#hidTues').html(),$('#hidWednes').html(),$('#hidThurs').html(),$('#hidFri').html(),$('#hidSat').html()],
                       months: [$('#hidJan').html(),$('#hidFeb').html(),$('#hidMarch').html(),$('#hidApr').html(),$('#hidMay').html(),$('#hidJune').html(),$('#hidJuly').html(),$('#hidAug').html(),$('#hidSep').html(),$('#hidOct').html(),$('#hidNov').html(),$('#hidDec').html()],
                       monthsShort: [$('#hidJan').html(),$('#hidFeb').html(),$('#hidMarch').html(),$('#hidApr').html(),$('#hidMay').html(),$('#hidJune').html(),$('#hidJuly').html(),$('#hidAug').html(),$('#hidSep').html(),$('#hidOct').html(),$('#hidNov').html(),$('#hidDec').html()],
                       today: "Today",
                       clear: "Clear"

                   };
           <?php }else{ ?>   
                   $('.datepicker-switch, .day').removeClass('odianum');
           <?php } ?>
                        
                        
               
      });

</script>