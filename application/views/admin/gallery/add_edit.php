<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title"><?php echo trans(
	'gallery_edit'); ?></h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#"><?php echo trans(
	'gallery_edit'); ?></a></li>
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
                <?php echo trans(
	'gallery_edit'); ?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/gallery/add_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Category</label>
                  <input type="text" autocomplete="off"  name="galleryCategory" class="form-control" id="galleryCategory" value="<?php echo isset($Fetch_data['galleryCategory']) ? set_value("galleryCategory", $Fetch_data['galleryCategory']) : set_value("galleryCategory"); ?>" placeholder="">

                  <input type="hidden" name="galleryID" id="galleryID" value="<?php echo isset($Fetch_data['galleryID']) ? set_value("galleryID", $Fetch_data['galleryID']) : set_value("galleryID"); ?>">
               </div>
               <div class="form-group">
                  <table border="0" class="tbl-vid-list" style="margin-top:-6px;" cellpadding="5" cellspacing="1" id="tbl-list" width="100%" bgcolor="">
                     <tr>
                        <th><span class="text-danger">*</span>Multiple Images <span class="text-danger">Dimenesion: 2000 × 1335 px</span></th>
                     </tr>
                     <tr>
                        <td >
                           <input type="file" class="form-control file-input demo" id="galleryImg" Name="image[]" placeholder="Image" multiple="multiple" />
                           <p class="text-danger" id="galleryImg_validate"></p>
                           <input type="hidden" name="old_blogThumbImg" id="old_blogThumbImg"  />
                           <?php

foreach ($gallary as $multiple) {

	?>
                           <img src="<?php echo base_url('uploads/gallery/' . $multiple['galleryImage']); ?>" width="100" height="100" class="img-responsive"/>
                           <input type="button" class="delete_imaage" rel="<?php echo $multiple['galleryImage']; ?>" data-id="<?php echo $multiple['gallaryImageID']; ?>" value="X">
                           <?php }?>
                        </td>
                     </tr>
                  </table>
               </div>
               <input type="submit" name="submit" id="BannerBtn" value="Submit" class="btn btn-primary pull-left">
               <a href="<?=base_url();?>admin/gallery/" class="btn-lg ml-1 btn btn-danger">Cancel</a>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
    $(document).ready(function() {



        var hash='<?php echo $this->security->get_csrf_hash() ?>';
       var name='<?php echo $this->security->get_csrf_token_name() ?>';
$('.delete_imaage').on('click',function(){

     var imgName = $(this).attr('rel');
     var propertyID = $(this).attr('data-id');
    $.ajax({
         url:base_url +'admin/gallery/delete_image',
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