<section class="np-bannerSec  col-100 floatLft relative">
   <div class="np-bannerSec__bg ap__campDetails np-bannerSec__bg--height col-100 floatLft flexDisplay justifyCenter alignCenter relative">
      <div class="np-bannerSec__bg--overlay col-100 floatLft"></div>
      <div class="wrapper">
         <div class="np-bannerSec__title textCenter col-100 floatLft relative">
            <span class="ap__common__heading np-sec__title relative">About Us</span>
         </div>
      </div>
   </div>
</section>
<section class="ap__section__1 commonMar ap__movementSect col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <h1 class="ap__common__heading col-100 floatLft textCenter"><?php echo $About['aboutTitle']; ?></h1>
      <p class="ap__common__para col-100 floatLft textCenter"><?php echo strip_tags($About['aboutDesc']); ?></p>
   </div>
</section>
<section class="ap_section__2 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__storyWrp col-100 floatLft flexDisplay justifySpace alignCenter flexWrap">
         <div class="ap__storyImg relative">
            <img src="<?php echo base_url(); ?>uploads/about/<?php echo $About['aboutVisionImg']; ?>" alt="">
         </div>
         <div class="ap__storyCnt">
            <h1 class="ap__common__heading">Our Vision</h1>
            <p class="ap__common__para"><?php echo strip_tags($About['aboutvisionDesc']); ?></p>
         </div>
      </div>
   </div>
</section>
<section class="col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__campaignBorder col-100 floatLft"></div>
   </div>
</section>
<section class="ap_section__2 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__storyWrp col-100 floatLft flexDisplay justifySpace alignCenter flexWrap">
         <div class="ap__storyCnt">
            <h1 class="ap__common__heading">Our Mission</h1>
            <p class="ap__common__para"><?php echo strip_tags($About['aboutmisionDesc']); ?></p>
         </div>
         <div class="ap__storyImg relative">
            <img src="<?php echo base_url(); ?>uploads/about/<?php echo $About['aboutMissionImg']; ?>" alt="">
         </div>
      </div>
   </div>
</section>
<section class="ap__section__3 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <h1 class="ap__common__heading col-100 floatLft textCenter">Team Members</h1>
      <p class="ap__common__para ap__mt15 col-100 floatLft textCenter">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper <br> mattis, pulvinar dapibus leo.</p>
      <ul class="ap__teamListing col-100 floatLft">
         <?php echo TeamHomePageSlider(); ?>
      </ul>
   </div>
</section>
<section class="ap__section__4 commonMar col-100 floatLft flexDisplay justifyCenter relative">
   <div class="wrapper">
      <div class="ap__actionWrp col-100 floatLft flexDisplay justifySpace alignStart">
         <div class="ap__actionText">
            <h2 class="ap__common__heading orange-color"><?php echo $Section3['section3Title']; ?></h2>
            <p class="ap__common__para"><?php echo strip_tags($Section3['section3Desc']); ?></p>
            <ul class="ap__countIncrement col-100 floatLft flexDisplay justifySpace flexWrap">
               <li>
                  <div class="ap__icoDiv"><img src="<?php echo base_url(); ?>front/images/leaf.png" alt=""></div>
                  <div class="countNum relative">
                     <span class="ap__countValue ap__Heebo ap__fw700 counter" data-count="<?php echo $Section3['treePlant']; ?>">0 </span>
                     <h3>+</h3>
                  </div>
                  <h3 class="ap__countName">Trees Plant</h3>
               </li>
               <li>
                  <div class="ap__icoDiv"><img src="<?php echo base_url(); ?>front/images/hand-shake.png" alt=""></div>
                  <div class="countNum relative">
                     <span class="ap__countValue ap__Heebo ap__fw700 counter" data-count="<?php echo $Section3['caseSolved']; ?>">0 </span>
                     <h3>+</h3>
                  </div>
                  <h3 class="ap__countName">Case Solved</h3>
               </li>
               <li>
                  <div class="ap__icoDiv"><img src="<?php echo base_url(); ?>front/images/user.png" alt=""></div>
                  <div class="countNum relative">
                     <span class="ap__countValue ap__Heebo ap__fw700 counter" data-count="<?php echo $Section3['youngVolunteer']; ?>">0 </span>
                     <h3>+</h3>
                  </div>
                  <h3 class="ap__countName">Young Volunteer</h3>
               </li>
            </ul>
         </div>
         <div class="ap__actionImages">
            <div class="ap__actionSlider">
               <?php foreach ($Slider as $value) {?>
               <div class="ap__actionItem">
                  <img src="<?php echo base_url(); ?>uploads/section3/sliderImages/<?php echo $value['section3sliderImg']; ?>" alt="">
               </div>
            <?php }?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="ap__section__7 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__volunteerWrp col-100 floatLft textCenter">
         <h2 class="ap__common__heading orange-color col-100 floatLft">Become Our Volunteer</h2>
         <p class="ap__common__para ap__whtPara col-100 floatLft">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget <br> dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.</p>
         <div class="ap__joinDiv col-100 floatLft">
            <a href="javascript:;" class="ap__joinClick ap__common_button inlineBlk">JOIN VOLUNTEER</a>
         </div>
      </div>
   </div>
</section>
