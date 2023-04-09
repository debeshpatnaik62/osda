<?php
/*plugin*/

/* ================================================
  File Name         	  	: course.php
  Description		  	: This is to view the course details
  Date Created		  	:
  Created By		  	: Rumana Parmeen
  Developed by                    : Ashis kumar Patra
  Developed on                    : 06-Dec-2018
  Update History		  	:
  <Updated by>				<Updated On>		<Remarks>

  ================================================== */
$strPageTitle = ($_SESSION['lang'] == 'O') ? '&#2858;&#2878;&#2848;&#2893;&#2911;&#2837;&#2893;&#2864;&#2862;' : 'Courses';
;
$intRecno = 0;
$intPagesize = 30;
?>
<!doctype html>
<html lang="en">

<?php include 'include/header.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/custom.js" type="text/javascript"></script>    
    <script src="<?php echo APP_URL; ?>js/validatorchklist.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL; ?>js/loadAjax.js" type="text/javascript"></script>   
    <!--start:: contarea-->

    <form name="frmOsda" id="frmOsda"  method="post" action="" enctype="multipart/form-data" autocomplete="off"> 
        <section class="container contarea">
            <div class="row">

                <div class="col-12 col-md-4 leftsec">
                    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item btnCourseTab" onclick="addActiveClass(<?php echo $intAllDuration; ?>);" id="btnCourseTab_<?php echo $intAllDuration; ?>" data-value="<?php echo $intAllDuration; ?>">
                            <a class="nav-link active <?php echo $strLangCls; ?>" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true"><?php echo $strAlllbl; ?></a>
                        </li>
                        <li class="nav-item btnCourseTab" onclick="addActiveClass(<?php echo $intShorttermDuration; ?>);"  id="btnCourseTab_<?php echo $intShorttermDuration; ?>" data-value="<?php echo $intShorttermDuration; ?>">
                            <a class="nav-link <?php echo $strLangCls; ?>" id="pills-all-tab" data-toggle="pill" href="#pills-Short" role="tab" aria-controls="pills-Short" aria-selected="false"><?php echo $strShorttermlbl; ?></a>
                        </li>
                        <li class="nav-item btnCourseTab" onclick="addActiveClass(<?php echo $intLongtermDuration; ?>);" id="btnCourseTab_<?php echo $intLongtermDuration; ?>" data-value="<?php echo $intLongtermDuration; ?>">
                            <a class="nav-link <?php echo $strLangCls; ?>" id="pills-all-tab" data-toggle="pill" href="#pills-Long" role="tab" aria-controls="pills-Long" aria-selected="false"><?php echo $strLongtermlbl; ?></a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

                            <div class="togglesec">

                                <div>
                                    <a class="tabheader <?php echo $strLangCls; ?>" data-toggle="collapse" href="#filterSectors" role="button" aria-expanded="false" aria-controls="All"><?php echo $strSectorFilterLbl; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                </div>
                                <div class="collapse show" id="filterSectors">

                                </div>												

                                <div>
                                    <a class="tabheader <?php echo $strLangCls; ?>" data-toggle="collapse" href="#listEligibility" role="button" aria-expanded="false" aria-controls="shortterm"><?php echo $strEligibilityFilterLbl; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                </div>
                                <div class="collapse show" id="listEligibility">
                                    
                                </div>																		

                            </div>
                            
                            
                            
                            
                           <div class="mobilebtn loadmore">
                             <a href="#" class="active1">Apply Filter</a>
                           </div>

                        </div>
                        
                        
                    </div>
                </div>

                <div class="col-12 col-md-8 rightsec">

                    <div class="input-group md-form form-sm form-2 pl-0">
                        <input type="text" aria-label="Search" class="form-control my-0 py-1 amber-border <?php echo $strLangCls; ?>" maxlength="120" title="<?php echo $strCourseSearchlbl; ?>" placeholder="<?php echo $strCourseSearchlbl; ?>" name="txtCourse" id="txtCourse" value="<?php echo $strCourse; ?>">
                        <span id="course-datalist" style="display:none"></span>
                        <input type="hidden" id="hidCourseId"  name="hidCourseId" value="0" maxlength="20">
                        <div class="input-group-append">
            <!--                <span class="input-group-text amber lighten-3" id="basic-text1"><i class="fa fa-search text-grey" aria-hidden="true"></i></span> -->
                            <button type="button" name="btnSearch" id="btnSearch" onclick="loadCourseByName();$('.resultList').hide();" class="input-group-text amber lighten-3"><i class="fa fa-search text-grey" aria-hidden="true"></i></button>
                        </div>
                    </div>

                   <h3 id="courseresult"></h3>
                    <div id="loading"></div>
                    <div id="listCourses" > 
<!--                   <div class="coursesportlet">
                        <div class="row">
                            


                            <div class="col-sm-10">
                                <div class="coursestext">
                                    <h3>Architect Assistant </h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span>Duration</span>
                                            <p>576 Hour(s) in 3 Month(s)</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Eligibility</span>
                                            <p>Non-Matric</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Skillers</span>
                                            <p class="textpurple">1 Training Center</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="coursesimg">
                                    <img src="images/image2.jpg" alt="Individuals"/>
                                    <p>Applied Electronics</p>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <div class="coursesportlet">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="coursesimg">
                                    <img src="images/image1.png" alt="Individuals"/>
                                    <p>Applied Electronics</p>
                                </div>
                            </div>


                            <div class="col-sm-9">
                                <div class="coursestext">
                                    <h3>Architect Assistant </h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span>Duration</span>
                                            <p>576 Hour(s) in 3 Month(s)</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Eligibility</span>
                                            <p>Non-Matric</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Skillers</span>
                                            <p class="textpurple">1 Training Center</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <div class="coursesportlet">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="coursesimg">
                                    <img src="images/Role-Model.jpg" alt="Individuals"/>
                                    <p>Applied Electronics</p>
                                </div>
                            </div>


                            <div class="col-sm-9">
                                <div class="coursestext">
                                    <h3>Architect Assistant </h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span>Duration</span>
                                            <p>576 Hour(s) in 3 Month(s)</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Eligibility</span>
                                            <p>Non-Matric</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Skillers</span>
                                            <p class="textpurple">1 Training Center</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <div class="coursesportlet">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="coursesimg">
                                    <img src="images/image2.jpg" alt="Individuals"/>
                                    <p>Applied Electronics</p>
                                </div>
                            </div>


                            <div class="col-sm-9">
                                <div class="coursestext">
                                    <h3>Architect Assistant </h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span>Duration</span>
                                            <p>576 Hour(s) in 3 Month(s)</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Eligibility</span>
                                            <p>Non-Matric</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Skillers</span>
                                            <p class="textpurple">1 Training Center</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>-->


<!--                    <div class="coursesportlet">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="coursesimg">
                                    <img src="images/image1.png" alt="Individuals"/>
                                    <p>Applied Electronics</p>
                                </div>
                            </div>


                            <div class="col-sm-9">
                                <div class="coursestext">
                                    <h3>Architect Assistant </h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span>Duration</span>
                                            <p>576 Hour(s) in 3 Month(s)</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Eligibility</span>
                                            <p>Non-Matric</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Skillers</span>
                                            <p class="textpurple">1 Training Center</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>-->


<!--                    <div class="coursesportlet noborder">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="coursesimg">
                                    <img src="images/Role-Model.jpg" alt="Individuals"/>
                                    <p>Applied Electronics</p>
                                </div>
                            </div>


                            <div class="col-sm-9">
                                <div class="coursestext">
                                    <h3>Architect Assistant </h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span>Duration</span>
                                            <p>576 Hour(s) in 3 Month(s)</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Eligibility</span>
                                            <p>Non-Matric</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <span>Skillers</span>
                                            <p class="textpurple">1 Training Center</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>-->
    
                   </div>
                    
  </div>
            </div>
        </section>
        <span id="chkSectorArray" style="display:none"></span>
        <span id="chkLongSectorArray" style="display:none"></span>
        <span id="chkShortSectorArray" style="display:none"></span>
        <span id="chkQualArray" style="display:none"></span>
    </form>

    <!--end:: contarea-->

    <!--start::Footer-->

    <script type="text/javascript" >

        $(document).ready(function () {



            var chkSectorArray = '';
            var chkShortSectorArray = '';
            var chkQualArray = '';
            var chkLongSectorArray = '';
            var chkFilterSectorArray = '';
            var intDuration = 0;
            var intType = 1;
            var strSearchCourse = '';

<?php if ($intSectorId > 0) { ?>

                $('#chkSectorArray').html(<?php echo $intSectorId; ?>);
                $('#chkLongSectorArray').html(<?php echo $intSectorId; ?>);
                $('#chkShortSectorArray').html(<?php echo $intSectorId; ?>);

<?php } ?>

            chkSectorArray = $('#chkSectorArray').html();
            chkLongSectorArray = $('#chkLongSectorArray').html();
            chkShortSectorArray = $('#chkShortSectorArray').html();

            $(".btnCourseTab").each(function () {

                if ($(this).hasClass('active'))
                    $(this).removeClass("active");

                if ($(this).data("value") == intDuration)
                    $(this).addClass("active");

            });

            if (intDuration == 0)
                chkFilterSectorArray = chkSectorArray;
            else if (intDuration == 11)
                chkFilterSectorArray = chkShortSectorArray;
            else if (intDuration == 12)
                chkFilterSectorArray = chkLongSectorArray;

            loadSectors('0', strSearchCourse,<?php echo $intSectorId; ?>, '<?php echo $intRecno; ?>', '<?php echo $intPagesize; ?>', intDuration, chkQualArray, chkFilterSectorArray, 1);

            //load the eligibility details
            loadEligibility('listEligibility', intDuration, chkQualArray);

            //on key-up load the course
            $('#txtCourse').on('keyup', function (e) {
                if (!checkSpecialChar('txtCourse'))
                    return false;

                fillCourseDataLists('course-datalist', this.value, 0);
            });

        });

        function addActiveClass(intDuration) {

            $(".btnCourseTab").removeClass('active');
            $("#btnCourseTab_" + intDuration).addClass('active');
            var course = $('#txtCourse').val();
            var chkSectorArray = '';
            var chkselQuliArray = '';


            chkselQuliArray = $('#chkQualArray').html();

            //load the eligibility details
            loadEligibility('listEligibility', intDuration, chkselQuliArray);

            chkSectorArray = $('#chkSectorArray').html();
            ;
            // console.log(chkSectorArray+'aaa'+$('#chkSectorArray').html())
            //load the eligibility details
            loadSectors('0', course, 0, 0, 0, intDuration, chkselQuliArray, chkSectorArray, 2);

            //call to load the search details
            // getValueUsingClass(course);

        }
        /*get allchecklist ids*/
        function getValueUsingClass(course) {
            /* declare an checkbox array */

            var intDuration = 0;

            if ($(".sector:checked").length == 0 && (course == '' || course == undefined || course == null) && $(".qual:checked").length > 0) {
                course = $('#txtCourse').val();

            } else
                course = ((course != '' && course != undefined) ? course : '');

            var chkSelSectorArray = '';
            var chkSelQualArray = '';
            var chkSelQualArray = '';
            var chkFilterSectorArray = '';

            $(".btnCourseTab").each(function () {

                if ($(this).hasClass('active')) {
                    var courseTerm = $(this).data("value");
                    intDuration = courseTerm;
                }
            });


            $(".sector:checked").each(function () {
                // console.log(chkSelSectorArray+'sdfsd'+$(this).val())
                chkSelSectorArray += ',' + $(this).val();
            });

            $(".qual:checked").each(function () {
                chkSelQualArray += ',' + $(this).val();
            });
            if ($(".sector:checked").length == 0)
                $('#chkSectorArray').html('');
            if ($(".qual:checked").length == 0)
                $('#chkQualArray').html('');


            chkSelSectorArray = chkSelSectorArray.replace(/(^[,\s]+)|([,\s]+$)/g, '');
            chkSelQualArray = chkSelQualArray.replace(/(^[,\s]+)|([,\s]+$)/g, '');

            if (intDuration != 0) {
                if (intDuration == 11)
                    $('#chkShortSectorArray').html(((chkSelSectorArray != '' && chkSelSectorArray != undefined) ? chkSelSectorArray : ''));
                else if (intDuration == 12)
                    $('#chkLongSectorArray').html(((chkSelSectorArray != '' && chkSelSectorArray != undefined) ? chkSelSectorArray : ''));

                chkSectorArray = $('#chkSectorArray').html() + ',' + $('#chkShortSectorArray').html() + ',' + $('#chkLongSectorArray').html();

            } else {
                chkSectorArray = ((chkSelSectorArray != '' && chkSelSectorArray != undefined) ? chkSelSectorArray.replace(/(^[,\s]+)|([,\s]+$)/g, '') : '');
            }


            $( '#chkQualArray' ) . html( ( ( chkSelQualArray . length > 0 ) ? chkSelQualArray : '' ) );

            if ( chkSectorArray != '' && chkSectorArray != undefined )
            	$( '#chkSectorArray' ) . html( ( ( chkSectorArray . length > 0 ) ? chkSectorArray . replace( /(^[,\s]+)|([,\s]+$)/g, '' ) : '' ) );


            if ( intDuration == 0 )
            	chkFilterSectorArray = $( '#chkSectorArray' ) . html();
            else if ( intDuration == 11 )
            	chkFilterSectorArray = $( '#chkShortSectorArray' ) . html();
            else if ( intDuration == 12 )
            	chkFilterSectorArray = $( '#chkLongSectorArray' ) . html();

            /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
            loadFilterCourses( $( '#chkQualArray' ) . html(), chkFilterSectorArray, intDuration, course, 0, <?php echo $intRecno; ?>,<?php echo $intPagesize; ?> );

            }
            /*Load Course By Name */
            function loadCourseByName() {

            	var course = $( '#txtCourse' ) . val();

            	if ( !checkSpecialChar( 'txtCourse' ) )
            		return false;

            	if ( course != '' ) {
            		var pagesize = <?php echo $intPagesize; ?>;

            		var intDuration = 0;

            		$( 'input:checkbox' ) . removeAttr( 'checked' ); 
                        $(".btnCourseTab").removeClass('active');
                        $("#btnCourseTab_0").addClass('active');

                $('#chkSectorArray').html('')
                $('#chkLongSectorArray').html('')
                $('#chkShortSectorArray').html('')
                $('#chkQualArray').html('')

                loadFilterCourses('', '', intDuration, course, 0, 0, pagesize);
            } else {

                viewAlert('Please enter course name.')
            }
        }



    </script>
<?php include 'include/footer.php' ?>

</body>
</html>



