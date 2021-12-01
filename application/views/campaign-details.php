<section class="np-bannerSec  col-100 floatLft relative">
   <div class="np-bannerSec__bg ap__campDetails np-bannerSec__bg--height col-100 floatLft flexDisplay justifyCenter alignCenter relative">
      <div class="np-bannerSec__bg--overlay col-100 floatLft"></div>
      <div class="wrapper">
         <div class="np-bannerSec__title textCenter col-100 floatLft relative">
            <span class="ap__common__heading np-sec__title relative">Green Planet</span>
         </div>
      </div>
   </div>
</section>
<section class="ap__campaignWrap commonMar col-100 floatLft relative flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__innerCampaignWrp col-100 floatLft flexDisplay justifySpace alignStart flexWrap">
        <!--  <div class="ap__campaignText">
            <h2 class="ap__common__heading">Plant More Tree For The Earth</h2>
            <p class="ap__common__para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <h3 class="ap__common__small">Summary</h3>
            <p class="ap__common__para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <ul class="ap__campaignList col-100 floatLft">
               <li class="ap__common__para col-100 floatLft">Support people in extreme need</li>
               <li class="ap__common__para col-100 floatLft">Largest global crowdfunding community</li>
               <li class="ap__common__para col-100 floatLft">Make the world a better place</li>
               <li class="ap__common__para col-100 floatLft">Share your love for community</li>
            </ul>
            <ul class="ap__campDetWrp col-100 floatLft flexDisplay justifySpace alignStart flexWrap">
               <li class="ap__campDetInner flexDisplay justifySpace alignStart flexWrap">
                  <div class="ap__campLogo"><img src="<?php echo base_url(); ?>front/images/chalkboard.png" alt=""></div>
                  <div class="ap__campDesc">
                     <h3 class="ap__common__small">Educate People</h3>
                     <p class="ap__common__para">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                  </div>
               </li>
               <li class="ap__campDetInner flexDisplay justifySpace alignStart flexWrap">
                  <div class="ap__campLogo"><img src="<?php echo base_url(); ?>front/images/leaf.png" alt=""></div>
                  <div class="ap__campDesc">
                     <h3 class="ap__common__small">Save Nature</h3>
                     <p class="ap__common__para">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                  </div>
               </li>
            </ul>
            <p class="ap__common__para col-100 floatLft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="ap__commentBox col-100 floatLft flexDisplay justifySpace alignStart">
               <div class="ap__commentText">
                  <p class="ap__common__para col-100 floatLft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris.</p>
                  <span class="floatLft col-100 ap__Heebo">Marlene Redman – Founder Humanite</span>
               </div>
               <div class="ap__commentQuote"><img src="<?php echo base_url(); ?>front/images/quote.png" alt=""></div>
            </div>
            <p class="ap__common__para col-100 floatLft">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
         </div> -->
          <?php echo $campagin_details['campaignLongDesc']; ?>
         <div class="ap__campaignBrief">
            <div class="ap__campaignImgWrp col-100 floatLft">
               <img src="<?php echo base_url(); ?>uploads/campaign/<?php echo $campagin_details['campaigndetailImage']; ?>" alt="">
            </div>
            <div class="ap__campaignDonate col-100 floatLft">
               <p class="ap__common__para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
               <div class="ap__donateBtns col-100 floatLft flexDisplay justifySpace flexWrap">
                  <a href="javascript:;" class="ap__common_button">DONATE NOW</a>
                  <a href="javascript:;" class="ap__button__outline">JOIN NOW</a>
               </div>
            </div>
            <div class="ap__shareDiv col-100 floatLft">
               <span>Share This:</span>
               <div class="ap__socialDiv col-100 floatLft">
                  <a href="<?php echo $campagin_details['campaignFBLink']; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a>
                  <a href="<?php echo $campagin_details['campaignTwitterLink']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a href="<?php echo $campagin_details['campaignInstaLink']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                  <a href="<?php echo $campagin_details['campaignLinkdinLink']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
               </div>
            </div>
            <div class="ap__otherCampaign col-100 floatLft">
               <h3 class="ap__common__small col-100 floatLft">Other Campaign</h3>
               <div class="ap__campaignBorder col-100 floatLft"></div>
               <ul class="ap__otherCampList col-100 floatLft">
                  <?php foreach ($Similar as $value) {?>
                  <li class="col-100 floatLft flexDisplay justifySpace alignStart flexWrap">
                     <div class="ap__campIco"><img src="<?php echo base_url(); ?>uploads/campaign/<?php echo $value['campaignThumbImage']; ?>" alt=""></div>
                     <div class="ap__otherCampInfo">
                        <h3 class="ap__common__small col-100 floatLft"><?php echo $value['campaignName']; ?></h3>
                        <p class="ap__common__para"><?php echo strip_tags($value['campaignshortDesc']); ?></p>
                        <a href="<?php echo base_url(); ?>campaign/<?php echo $value['seoUri'] ?>" class="ap__takeAction">TAKE ACTION <span><img src="<?php echo base_url(); ?>front/images/right-arrow-action.png" alt=""></span></a>
                     </div>
                  </li>
                 <?php }?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="ap__section__8 commonMar col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__newsLetterWrp col-100 floatLft flexDisplay justifySpace alignCenter flexWrap">
         <div class="ap__newsLetterHead flexDisplay justifyStart alignCenter">
            <div class="ap__mailIco"><img src="<?php echo base_url(); ?>front/images/email.png" alt=""></div>
            <div class="ap__mailTitle">
               <span>Keep Updated</span>
               <h2 class="ap__common__heading ap__whtPara">Newsletter</h2>
            </div>
         </div>
         <div class="ap__formSubscribe">
            <div class="ap__inputDiv">
               <input type="text" class="ap__textInput col-100 floatLft" placeholder="Email">
            </div>
            <div class="ap__buttonDiv">
               <button><i class="fa fa-paper-plane" aria-hidden="true"></i> SUBSCRIBE</button>
            </div>
         </div>
      </div>
   </div>
</section>