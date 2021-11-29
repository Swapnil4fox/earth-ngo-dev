<?php if ($this->uri->segment(1) != 'campaign' && $this->uri->segment(1) != 'events') {?>
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
<?php }?>
<footer class="col-100 floatLft flexDisplay justifyCenter">
   <div class="wrapper">
      <div class="ap__footInner col-100 floatLft flexDisplay justifySpace alignStart flexWrap">
         <div class="ap__footLogo">
            <div class="logoDiv"><img src="<?php echo base_url(); ?>front/images/logo-1.png" alt=""></div>
            <p class="ap__whtPara ap__common__para">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
         </div>
         <div class="ap__footMenuWrp">
            <div class="ap__footMenu">
               <h3 class="ap__footHead">Quick Links</h3>
               <ul class="ap__footNav col-100 floatLft">
                  <li>
                     <a href="<?php echo base_url(); ?>">Home</a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('about-us'); ?>">About us</a>
                  </li>
                  <li>
                     <a href="gallary.html">Gallery</a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('contact-us'); ?>">Contact</a>
                  </li>
               </ul>
            </div>
            <div class="ap__footMenu">
               <h3 class="ap__footHead">Contact Info</h3>
               <ul class="ap__footNav col-100 floatLft">
                  <li class="flexDisplay justifyStart alignStart">
                     <div class="ap__footIco"><img src="<?php echo base_url(); ?>front/images/map.png" alt=""></div>
                     <div class="ap__addText ap__whtPara">301, 3rd Floor,Tirupati Co-operative Housing Society Ltd, Opp. Mumbai University Main Gate, Vidyanagari Marg, (CST Road), Kalina, Santacruz (East), Mumbai - 400 098.</div>
                  </li>
                  <li class="flexDisplay justifyStart alignCenter">
                     <div class="ap__footIco"><img src="<?php echo base_url(); ?>front/images/call.png" alt=""></div>
                     <div class="ap__addText"><a href="tel:+91 84969 84969">+91 84969 84969</a></div>
                  </li>
                  <li class="flexDisplay justifyStart alignCenter">
                     <div class="ap__footIco"><img src="<?php echo base_url(); ?>front/images/email-small.png" alt=""></div>
                     <div class="ap__addText"><a href="mailto:connect@earthngo.org">connect@earthngo.org</a></div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="ap__footCopy col-100 floatLft flexDisplay justifySpace">
         <p class="ap__whtPara">Environmental & NGO Template Kit by Jegtheme</p>
         <p class="ap__whtPara">© 2021. Company Name. All Rights Reserved.</p>
      </div>
   </div>
</footer>

<script src="<?php echo base_url(); ?>front/js/slick-slider/slick.min.js"></script>
<script src="<?php echo base_url(); ?>front/js/flatpickr.min.js"></script>
<?php if ($this->uri->segment(1) != 'volunteer') {?>
<script src="<?php echo base_url(); ?>front/js/magnific/jquery.magnific-popup.min.js"></script>
<?php }?>
<script src="<?php echo base_url(); ?>front/js/swapnil.inc.js"></script>
<script src="<?php echo base_url(); ?>front/js/site.ap.js"></script>
 <script src="<?php echo base_url(); ?>front/js/site.np.js"></script>
</body>
</html>