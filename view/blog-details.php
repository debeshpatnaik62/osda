<?php 
/*plugin*/
/*
  Website Name : Odisha Skill Developement Authority (OSDA)
  Date Created : 4rd Dec 2018
  Author : Rumana Parween
 */ ?>
 
 
 
<!doctype html>
<html lang="en">
    <?php include 'include/header.php' ?>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/blog.css">
    <!--start:: contarea-->

    <section class="container contarea">
   
       <div class="row">
        <div class="col-12 col-md-9">
           <div class="blogsec">
            <div class="blogimg">
            	<img src="images/Blogpic1.jpg" alt="blogpic1"/>
            	<div class="blogdate">
            		<p>APR<br><span>2018</span></p>
            		<span>09</span>
            	</div>
            </div>
            <a href="#">
            <h2>9 Best Free Blogging Sites: Launch Your Own Blog Without Spending a Dime</h2>
           <p>WordPress.org is the king of free blogging sites. It is a free platform and can be downloaded from here, but you need to build the site mostly by yourself afterward. While you can find some free WordPress hosting, a better long-term strategy is to pay a moderate amount for standard WordPress hosting.This is where Bluehost comes into play. Not only is it very cheap (just $2.95 per month on the Basic plan), but it also provides solid features.</p>		
            <div class="blockquote-footer"><cite title="Source Title">By Deba</cite></div>
            </a>
            <div class="clearfix"></div>
<!--
            <ul>
            	<li><a href="#"> <i class="fa fa-thumbs-o-up"></i> <span>2</span> Like </a></li>
            	<li><a href="#"> <i class="fa fa-comment-o"></i> <span>8</span> Comments </a></li>
            	<li><a href="#"> <i class="fa fa-eye"></i> <span>5</span> Views </a></li>
            </ul>
-->
         </div>
         
         
         <div class="comments">
         
           <h2>Comments</h2>
         

			<div id="CommentsDetails">
			  <div class="media mt-3 p-3 border"><a class="pr-3">
				<div class="comment-tag">NK</div>
				</a>
				<div class="media-body">
				  <h6 class="mt-0">Niranjan Kumar</h6>
				  <p>Testing Comment A computer is a device that can be instructed to carry out sequences of arithmetic or logical operations automatically via computer programming. Modern computers have the ability to fo</p>
				  <small class="text-muted">17 Nov 2018</small></div>
			  </div>
			  <div class="media mt-3 p-3 border"><a class="pr-3">
				<div class="comment-tag">DB</div>
				</a>
				<div class="media-body">
				  <h6 class="mt-0">Debasis Behera</h6>
				  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500,00</p>
				  <small class="text-muted">27 Oct 2018</small></div>
			  </div>
			  <div class="media mt-3 p-3 border"><a class="pr-3">
				<div class="comment-tag">NK</div>
				</a>
				<div class="media-body">
				  <h6 class="mt-0">Niranjan Kumar</h6>
				  <p>Lorem Ipsum is simply dummy text</p>
				  <small class="text-muted"></small></div>
			  </div>
			</div>



         
         
         
         
         
         
          <h2>Leave a Comment</h2>
         
         
         <form>
    <div class="form-row">
         <div class="form-group col-md-4">
            <label for="inputPassword4">Name <span class="mandatory">*</span></label>
            <input type="text" name="vchName" class="form-control" maxlength="50" onkeypress="return isCharKey(event)" id="vchName" autocomplete="off">
            <span class="small text-danger" id="vchNameLbl" style="display: none;">Please Enter Name</span>
        </div>
        <div class="form-group col-md-4">
             <label for="inputEmail4">Email <span class="mandatory">*</span></label>
             <input type="email" class="form-control" name="vchEmailId" maxlength="50" id="vchEmailId">
             <span class="small text-danger" id="vchEmailLbl" style="display: none;">Please Email Id</span>
             <span class="small text-danger" id="vchEmailLblvValid" style="display: none;">Please Enter Valid Email Id</span>
        </div>
        <div class="form-group col-md-4">
             <label for="inputEmail4">Phone <span class="mandatory">*</span></label>
             <input type="email" class="form-control" name="vchPhoneNo" onkeypress="return isNumberKey(event)" maxlength="10" id="vchPhoneNo">
             <span class="small text-danger" id="vchMobileLbl" style="display: none;">Please Phone No</span>
        </div>
        
    </div>
    <div class="form-group">
        <label for="inputAddress">Comment <span class="mandatory">*</span></label>
        <textarea class="form-control" rows="5" maxlength="500" name="vchComment" id="vchComment"></textarea>
        
        <span class="small text-danger" id="vchCommentLbl" style="display: none;">Please Comment</span>
        <span class="small text-success" id="MsgSuccess" style="display: none;"></span>
        <span class="small text-danger" id="MsgErrro" style="display: none;"></span>
    </div>
    <button type="button" onclick="return validator();" class="osda--btn btn--rounded">Post Comment</button>
    <input type="hidden" name="postId" id="postId" value="4">
    <input type="hidden" name="typeId" id="typeId" value="1">
</form>
         
         
         </div>
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
	    </div>
    
        <div class="col-12 col-md-3">
       <div class="blogright">
       <h2>Categories</h2>
          <ul>
          	<li><a href="#">Cart1 <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
          	<li><a href="#">Discovery <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
          	<li><a href="#">Skills <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
          	<li><a href="#">Cart1 <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
          	<li><a href="#">Discovery <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
          	<li><a href="#">Skills <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
          </ul>
          
          
          <h2>Recent Post</h2>
          
			 <ul class="list-unstyled">
			  <li class="media">
			  <div class="blogmedia">
				<img class="mr-3" src="images/image5.jpg" alt="Generic placeholder image">
			  </div>
				<div class="media-body">
				  <h5 class="mt-0 mb-1">WordPress is the king of free blogging</h5>
				 <p>30 Oct 2018</p>
				</div>
			  </li>
			  <li class="media my-4">
			  <div class="blogmedia">
				<img class="mr-3" src="images/image7.jpg" alt="Generic placeholder image">
				  </div>
				<div class="media-body">
				  <h5 class="mt-0 mb-1">WordPress is the king of free blogging</h5>
				  <p>30 Oct 2018</p>
				</div>
			  </li>
			  <li class="media">
			  <div class="blogmedia">
				<img class="mr-3" src="images/image9.jpg" alt="Generic placeholder image">
				  </div>
				<div class="media-body">
				  <h5 class="mt-0 mb-1">WordPress is the king of free blogging</h5>
				  <p>30 Oct 2018</p>
				</div>
			  </li>
			</ul>
          
       </div>
	 </div>
		</div>
		
		
	</section>
    

    <!--end:: contarea-->

    <!--start::Footer-->
    <?php include 'include/footer.php' ?>  
</body>
</html>
