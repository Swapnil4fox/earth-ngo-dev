<main>
   <section class="np-bannerSec col-100 floatLft relative">
      <div class="np-bannerSec__bg np-bannerSec__bg--height col-100 floatLft flexDisplay justifyCenter alignCenter relative">
         <div class="np-bannerSec__bg--overlay col-100 floatLft"></div>
         <div class="wrapper">
            <div class="np-bannerSec__title textCenter col-100 floatLft relative">
               <span class="ap__common__heading np-sec__title relative">Gallery</span>
            </div>
         </div>
      </div>
   </section>
   <section class="np-gallarySec col-100 floatLft relative">
      <div class="np-gallaryInnerSec col-100 floatLft flexDisplay justifyCenter">
         <div class="wrapper">
            <div class="np-gallaryInnerWrp col-100 floatLft flexDisplay justifyCenter">
               <div class="np-bannerSec__title np__title textCenter col-100 floatLft relative">
                  <span class="ap__common__heading np-gallary__heading col-100 floatLft relative">Moment Captured</span>
                  <p class="np-gallary__disc col-100 floatLft relative ">
                     Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati suscipit animi aperiam a dignissimos, non cumque cum accusamus facilis unde laborum assumenda distinctio facere dolores, voluptates, beatae inventore ad asperiores!
                  </p>
                  <div class="np-gallary__tab col-100 floatLft relative">
                     <ul class="np-gallary__tabList col-100 floatLft flexDisplay justifyCenter alignCenter flexWrap">
                        <li class="current">
                           <a class="current" rel="all" href="javascript:;">ALL</a>
                        </li>
                        <?php foreach ($Gallery_category as $value) {?>
                        <li>
                           <a rel="<?php echo $value['galleryCategory']; ?>" href="javascript:;"><?php echo $value['galleryCategory']; ?></a>
                        </li>
                     <?php }?>
                        <!-- <li>
                           <a rel="advocation" href="javascript:;">ADVOCATION</a>
                        </li>
                        <li>
                           <a rel="education" href="javascript:;">EDUCATION</a>
                        </li>
                        <li>
                           <a rel="test" href="javascript:;">Test</a>
                        </li> -->
                     </ul>
                  </div>
               </div>
            </div>
            <div class="np-gallary__tabContant col-100 floatLft current" id="all">
               <ul class="np-gallary__tabContant--list  col-100 floatLft">
                  <?php foreach ($All as $key => $value) {?>
                  <li>
                     <div class="image-popupContent">
                        <a class="image-popup" href="<?php echo base_url(); ?>uploads/gallery/<?php echo $value['galleryImage']; ?>">
                        <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $value['galleryImage']; ?>" alt="">
                        </a>
                     </div>
                  </li>
               <?php }?>
               </ul>
            </div>
             <?php foreach ($Gallery_category as $value) {?>
            <div class="np-gallary__tabContant col-100 floatLft" id="<?php echo $value['galleryCategory']; ?>">
               <?php echo galleryPageTabing($value['galleryID']); ?>
            </div>
         <?php }?>
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
   <section class="np-gallerySec__1 commonMar col-100 floatLft flexDisplay justifyCenter relative">
      <div class="np-gallerySec__1--innerWrp col-100 floatLft flexDisplay justifyCenter relative">
         <div class="wrapper">
            <div class="np-gallaryInnerWrp col-100 floatLft flexDisplay justifyCenter relative">
               <div class="np-bannerSec__title np__title--1 textCenter col-100 floatLft relative">
                  <span class="ap__common__heading np-gallary__heading col-100 floatLft relative">Collaborated Partner</span>
                  <p class="np-gallary__disc col-100 floatLft relative ">
                     <?php echo strip_tags($Collab['collabSecDesc']); ?>
                  </p>
               </div>
            </div>
            <div class="np-partner__slider col-100 floatLft relative">
               <ul class="np-partner__slid col-100 floatLft relative">
                  <?php foreach ($CollabImages as $value) {?>
                  <li>
                     <div class="ap__goalWrp col-100 floatLft">
                        <img src="<?php echo base_url(); ?>uploads/gallery/collaborated/<?php echo $value['collabSecSliderImg']; ?>" alt="">
                     </div>
                  </li>
                  <?php }?>
               </ul>
            </div>
         </div>
      </div>
   </section>
</main>