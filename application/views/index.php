<section class="ap__hompage__banner ap__m0 col-100 floatLft relative">
   <div class="ap__banner__slider col-100 floatLft">
      <?php echo HomePageBannerSlider(); ?>
   </div>
   <div class="ap__bannerContent absolute">
      <div class="ap__contentWrp col-100 floatLft textCenter">
         <h2 class="ap__bannerTitle ap__common__heading ap__bigFnt"><?php echo $Content['bannerTitle']; ?></h2>
         <p class="ap__bannerPara ap__common__para"><?php echo $Content['bannerDesc']; ?>
         <a href="javascript:;" class="ap__common_button">READ MORE</a>
      </div>
   </div>
</section>
<section class="ap__section__1 commonMar ap__movementSect col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <h1 class="ap__common__heading col-100 floatLft textCenter"><?php echo $Section1['section1Title']; ?></h1>
      <p class="ap__common__para col-100 floatLft textCenter"><?php echo $Section1['section1Desc']; ?>
      <ul class="ap__cardsList col-100 floatLft flexDisplay justifySpace alignStart flexWrap">
         <li class="ap__cardWrp">
            <div class="ap__cardItem col-100 floatLft">
               <div class="ap__ico"><img src="<?php echo base_url(); ?>uploads/section1/<?php echo $Section1['icon1Image']; ?>" alt=""></div>
               <div class="ap__cardBox col-100 floatLft">
                  <h2 class="ap__cardTitle"><?php echo $Section1['icon1Title']; ?></h2>
                  <p class="ap__cardDesc ap__common__para"><?php echo strip_tags($Section1['icon1Desc']); ?></p>
                  <a href="javascript:;" class="ap__cardLink">Learn More</a>
               </div>
            </div>
         </li>
         <li class="ap__cardWrp">
            <div class="ap__cardItem col-100 floatLft">
               <div class="ap__ico"><img src="<?php echo base_url(); ?>uploads/section1/<?php echo $Section1['icon2Image']; ?>" alt=""></div>
               <div class="ap__cardBox col-100 floatLft">
                  <h2 class="ap__cardTitle"><?php echo $Section1['icon2Title']; ?></h2>
                  <p class="ap__cardDesc ap__common__para"><?php echo strip_tags($Section1['icon2Desc']); ?></p>
                  <a href="javascript:;" class="ap__cardLink">Learn More</a>
               </div>
            </div>
         </li>
         <li class="ap__cardWrp">
            <div class="ap__cardItem col-100 floatLft">
               <div class="ap__ico"><img src="<?php echo base_url(); ?>uploads/section1/<?php echo $Section1['icon3Image']; ?>" alt=""></div>
               <div class="ap__cardBox col-100 floatLft">
                  <h2 class="ap__cardTitle"><?php echo $Section1['icon3Title']; ?></h2>
                  <p class="ap__cardDesc ap__common__para"><?php echo strip_tags($Section1['icon3Desc']); ?></p>
                  <a href="javascript:;" class="ap__cardLink">Learn More</a>
               </div>
            </div>
         </li>
      </ul>
   </div>
</section>
<section class="ap_section__2 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__storyWrp col-100 floatLft flexDisplay justifySpace alignCenter flexWrap">
         <div class="ap__storyImg relative">
            <img src="<?php echo base_url(); ?>front/images/green-leaves-pattern-background--768x448.jpg" alt="">
            <div class="ap__storyAbs absolute">
               <img src="<?php echo base_url(); ?>uploads/section2/<?php echo $Section2['section2Image']; ?>" alt="">
            </div>
         </div>
         <div class="ap__storyCnt">
            <h1 class="ap__common__heading"><?php echo $Section2['section2Title']; ?></h1>
            <?php echo $Section2['section2Desc']; ?>
            <div class="ap__actionDiv col-90 floatLft textLeft flexDisplay justifySpace alignCenter">
               <a href="javascript:;" class="ap__common_button">READ MORE</a>
               <div class="ap__videoPlay flexDisplay justifySpace alignCenter">
                  <a href="<?php echo $Section2['videoLink']; ?>" class="ap__playIco popup-youtube"><img src="<?php echo base_url(); ?>front/images/play.png" alt=""></a>
                  <span>Watch Video</span>
               </div>
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
            <a href="javascript:;" class="ap__joinClick ap__common_button inlineBlk">KNOW MORE</a>
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
<section class="ap__section__5 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <h1 class="ap__common__heading col-100 floatLft textCenter">Sustainable development goals</h1>
      <p class="ap__common__para ap__mt15 col-100 floatLft textCenter">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper <br> mattis, pulvinar dapibus leo.</p>
      <ul class="ap__goalsListing ap__goalsSlider col-100 floatLft">
         <?php echo goalsHomeSlider(); ?>
      </ul>
      <div class="ap__viewMore col-100 floatLft textCenter">
         <a href="<?php echo base_url('sustainable-goals'); ?>" class="ap__viewmoreClick ap__common_button">VIEW MORE</a>
      </div>
   </div>
</section>
<section class="ap__section__6 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__headDiv col-100 floatLft flexDisplay justifySpace alignCenter">
         <div class="ap__campHead">
            <h1 class="ap__common__heading col-100 floatLft textLeft">Our Campaign</h1>
            <p class="ap__common__para ap__mt15 col-100 floatLft textLeft">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula <br> eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.
            </p>
         </div>
         <a href="javascript:;" class="ap__viewmoreClick ap__common_button">VIEW MORE</a>
      </div>
      <ul class="ap__campaignListing col-100 floatLft flexDisplay justifySpace alignStart flexWrap">
         <?php echo CampaignHomePageSlider(); ?>
      </ul>
   </div>
</section>
<section class="ap__section__7 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__volunteerWrp col-100 floatLft textCenter">
         <h2 class="ap__common__heading orange-color col-100 floatLft">Become Our Volunteer</h2>
         <p class="ap__common__para ap__whtPara col-100 floatLft">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget <br> dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.</p>
         <div class="ap__joinDiv col-100 floatLft">
            <a href="<?php echo base_url('volunteer'); ?>" class="ap__joinClick ap__common_button inlineBlk">JOIN VOLUNTEER</a>
         </div>
      </div>
   </div>
</section>
