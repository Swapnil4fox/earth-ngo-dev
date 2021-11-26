<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title">Section 3 </h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#">Section 3 Edit</a></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="contentbar">
   <div class="row">
      <div class="col-md-12">
         <div class="card m-b-30">
            <div class="card-header">
               <h5 class="card-title">
                Section 3 Edit</h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/banner/section3_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Title</label>
                  <input type="text" autocomplete="off"  name="section3Title" class="form-control" id="section3Title" value="<?php echo isset($Fetch_data['section3Title']) ? set_value("section3Title", $Fetch_data['section3Title']) : set_value("section3Title"); ?>" placeholder="">

                  <input type="hidden" name="section3ID" id="section3ID" value="<?php echo isset($Fetch_data['section3ID']) ? set_value("section3ID", $Fetch_data['section3ID']) : set_value("section3ID"); ?>">
               </div>
               <div class="form-group">
                  <label for="section3Desc"><span class="text-danger">*</span>Description</label>
                  <textarea name="section3Desc" id="section3Desc"><?php echo isset($Fetch_data['section3Desc']) ? set_value("section3Desc", $Fetch_data['section3Desc']) : set_value("section3Desc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Tree Plant</label>
                  <input type="text" autocomplete="off"  name="treePlant" class="form-control numberOnly" id="treePlant" value="<?php echo isset($Fetch_data['treePlant']) ? set_value("treePlant", $Fetch_data['treePlant']) : set_value("treePlant"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <label for="caseSolved"><span class="text-danger">*</span>Case Solved</label>
                  <input type="text" autocomplete="off"  name="caseSolved" class="form-control numberOnly" id="caseSolved" value="<?php echo isset($Fetch_data['caseSolved']) ? set_value("caseSolved", $Fetch_data['caseSolved']) : set_value("caseSolved"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <label for="youngVolunteer"><span class="text-danger">*</span>Young Volunteer</label>
                  <input type="text" autocomplete="off"  name="youngVolunteer" class="form-control numberOnly" id="youngVolunteer" value="<?php echo isset($Fetch_data['youngVolunteer']) ? set_value("youngVolunteer", $Fetch_data['youngVolunteer']) : set_value("youngVolunteer"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <table border="0" class="tbl-vid-list" style="margin-top:-6px;" cellpadding="5" cellspacing="1" id="tbl-list" width="100%" bgcolor="">
                     <tr>
                        <th bgcolor=""><span class="text-danger">*</span>Multiple Images</th>
                     </tr>
                     <tr>
                        <td  bgcolor="">
                           <div id="status"></div>
                           <input type="file" class="form-control file-input demo" id="propertyImg" Name="image[]" placeholder="Image" multiple="multiple" />
                           <p class="text-danger" id="campaignFile_validate_gallery"></p>
                           <input type="hidden" name="old_blogThumbImg" id="old_blogThumbImg"  />
                           <?php

foreach ($gallary as $multiple) {

	?>
                           <img src="<?php echo base_url('uploads/section3/sliderImages/' . $multiple['section3sliderImg']); ?>" width="100" height="100" class="img-responsive"/>
                           <input type="button" class="delete_imaage" rel="<?php echo $multiple['section3sliderImg']; ?>" data-id="<?php echo $multiple['sliderID']; ?>" value="X">
                           <?php }?>
                        </td>
                     </tr>
                  </table>
               </div>
               <input type="submit" name="submit" id="BannerBtn" value="Submit" class="btn btn-primary pull-left">
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('section3Desc', {
                 allowedContent : true,
         });


        var hash='<?php echo $this->security->get_csrf_hash() ?>';
       var name='<?php echo $this->security->get_csrf_token_name() ?>';
$('.delete_imaage').on('click',function(){

     var imgName = $(this).attr('rel');
     var propertyID = $(this).attr('data-id');
    $.ajax({
         url:base_url +'admin/banner/delete_image',
          method: 'POST',
          data: {'image': imgName, 'id': propertyID,<?php echo $this->security->get_csrf_token_name() ?>:'<?php echo $this->security->get_csrf_hash() ?>'},
          dataType: 'json',
          success: function(response)
          {
            if(response.status=='ok'){
                window.location.reload();
                $('html, body').animate({ scrollTop: 0 }, 0);

            }

          }
       });

   });

 });

</script>