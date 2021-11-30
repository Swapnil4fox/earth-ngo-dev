<main>
   <section class="np-bannerSec col-100 floatLft relative">
      <div class="np-bannerSec__bg np-bannerSec__bg--height col-100 floatLft flexDisplay justifyCenter alignCenter relative">
         <div class="np-bannerSec__bg--overlay col-100 floatLft"></div>
         <div class="wrapper">
            <div class="np-bannerSec__title textCenter col-100 floatLft relative">
               <span class="ap__common__heading np-sec__title relative">Contact Us</span>
            </div>
         </div>
      </div>
   </section>
   <section class="np-contentSec col-100 floatLft">
      <div class="np-contentSec__Wrp col-100 floatLft flexDisplay justifyCenter">
         <div class="wrapper">
            <div class="np-contentSec--Inner col-100 floatLft flexDisplay justifyCenter">
               <div class="np-contentSec--lft col-100 floatLft">
                  <div class="np-contentSec--lftWrp col-100 floatLft">
                     <p class="ap__common__heading mar--b">Get In Touch</p>
                     <p class="np-disc mar--b"><?php echo strip_tags($Contact['contact_pageDesc']); ?></p>
                     <div class="np-contentSec--innerLft col-100 floatLft">
                        <div class="np-contentSec--innerLftWrp col-100 floatLft">
                           <p class="ap__common__heading np-small__heading mar--b">Office</p>
                           <ul>
                              <li>
                                 <div class="np-contentSec--ph paa-b mar-t col-100 floatLft flexDisplay alignStart">
                                    <div class="ap__footIco"><img src="<?php echo base_url(); ?>front/images/call.png" alt=""></div>
                                    <a class="np-ph gry"
                                       href="tel:+91<?php echo $Contact['contact_pagePhone']; ?>">+91 <?php echo $Contact['contact_pagePhone']; ?></a>
                                 </div>
                              </li>
                              <li>
                                 <div class="np-contentSec--mai mar-t col-100 floatLft flexDisplay alignStart">
                                    <div class="ap__footIco"><img src="<?php echo base_url(); ?>front/images/email-small.png" alt=""></div>
                                    <a class="np-mai gry" href="mailto:<?php echo $Contact['contact_pageEmail']; ?>"><?php echo $Contact['contact_pageEmail']; ?></a>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="contact__map">
                     <div class="contact__mapWrp col-100 floatLft">
                        <div style="width: 100%"><iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=550&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="http://www.gps.ie/">gps systems</a></iframe></div>
                     </div>
                  </div>
               </div>
               <div class="np-contentSec--rgt col-100 floatLft">
               <div class="np-contentSec--rgtWrp">
                  <div class="np-contentSec--rgt__contaner col-100 floatLft">
                        <?php echo form_open('class="np-form col-100 floatLft" id="ContactusForm"'); ?>
                        <section class="np-formSec col-100 floatLft">
                           <div class="np-formSec__content col-100 floatLft">
                              <div class="np-formSec__Wrp col-100 floatLft">
                                 <section class="np--form__flname col-100 floatLft">
                                    <div class="np--form__flnameWrp">
                                       <div class="np--form__fname ">
                                          <div class="np--form__fnameCont col-50 floatLft">
                                             <div class="np--form__fnameWrp">
                                                <input type="text" class="np--form__fnameInp col-100 floatLft textalpha SpaceNot" id="conFname" name="np--form__fnameInp" placeholder="First Name " aria-invalid="false">
                                                 <span id="conFName_validate" class="error_info"></span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="np--form__fname">
                                          <div class="np--form__fnameCont col-50 floatLft">
                                 <div class="np--form__lnameWrp">
                                    <input type="text" class="np--form__fnameInp col-100 floatLft textalpha SpaceNot" id="conLname" name="np--form__fnameInp" placeholder="Last Name " aria-invalid="false">
                                     <span id="conLName_validate" class="error_info"></span>
                                 </div>
                              </div>
                                 </div>
                                    </div>
                                 </section>
                                 <div class="np--form__Mail col-100 floatLft">
                                    <input type="mail" class="np--form__fnameInp col-100 floatLft" id="conEmail" name="np--form__fnameInp" placeholder="Your Email" aria-invalid="false">
                                    <span id="conEmail_validate" class="error_info"></span>
                                 </div>
                                    <div class="np--form__Mail col-100 floatLft">
                                       <input type="mail" class="np--form__fnameInp col-100 floatLft numberOnly" id="conPhone" maxlength="10" inputmode="numeric" name="np--form__phnInp" placeholder="Your Phone" aria-invalid="false">
                                        <span id="conPhone_validate" class="error_info"></span>
                                    </div>
                                    <div class="np--form__Mail col-100 floatLft">
                                       <textarea class="np--form__fnameInp col-100 floatLft " id="conMessage" name="np--form__msgInp" placeholder="Your message " cols="30" rows="10" aria-invalid="false"></textarea>
                                    </div>
                                    <span id="SuccessMSG"></span>
                                    <div class="np--formBtn col-100 floatLft">
                                       <button type="button" id="ConSubmitBtn" class="np--formBtn--b col-100 floatLft" id=""><span>send message </span></button>
                                    </div>
                                 </div>
                              </div>
                           </section>
                        <?php echo form_close(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<script type="text/javascript">
$(document).ready(function() {
    $('#ConSubmitBtn').click(function()
     {

            var First_Name      = $("#conFname").val();
            var Last_Name       = $("#conLname").val();
            var email_id        = $("#conEmail").val();
            var mobile_number   = $("#conPhone").val();
            var message         = $("#conMessage").val();

            if(First_Name==""){
                $("#conFName_validate").html('Please Enter First Name.');
                registraion_flag=1;
            }else{
                registraion_flag=0;
            }
            if(Last_Name==""){
                $("#conLName_validate").html('Please Enter Last Name.');
                registraion_flag=1;
            }else{
                registraion_flag=0;
            }
            if(email_id=="" && pattern.test(email_id) == false){
                $("#conEmail_validate").html('Please Enter Email.');
                registraion_flag = 1;
            }else{
                registraion_flag = 0;
            }
            if(mobile_number == ""){
                $("#conPhone_validate").html('Please Enter Phone Number.');
                registraion_flag=1;
            }else{
                registraion_flag = 0;
            }
            if(registraion_flag == 0)
             {
                if(First_Name !='' && Last_Name !=''  && email_id!='' && pattern.test(email_id)== true && mobile_number !='' && mobile_number.length >=10)
                {
                    $.ajax({

                        url: base_url +'home/conatatUS_form',
                        type: 'POST',
                        data: {'conFname': First_Name, 'conLname': Last_Name,
                                    'conEmail':email_id,'conPhone':mobile_number,
                                    'conMessage':message,
                                    <?php echo $this->security->get_csrf_token_name() ?>:'<?php echo $this->security->get_csrf_hash() ?>'},
                        dataType : 'json',
                        success: function (data)
                        {
                            if(data.success=="ok"){

                                $("#SuccessMSG").css({"color": "green", "font-size": "13px","text-align": "center"});
                                $("#SuccessMSG").html("Thank you for contacting us we will get back to you shortly!!");
                                $("#SuccessMSG").show();
                                $("#SuccessMSG").delay(5000).fadeOut();
                                $("#ContactusForm").trigger("reset");
                            }else{
                                $("#SuccessMSG").css({"color": "red", "font-size": "15px", "font-weight": "800", "margin-top": "10px","text-align": "center"});
                                $("#SuccessMSG").html("Something went wrong ,please try again!");
                                $("#SuccessMSG").show();
                                $("#SuccessMSG").delay(5000).fadeOut();

                            }
                        }
                    });
                }
            }
    });
});
</script>