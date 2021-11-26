<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title"><?=trans('collaborated_partner');?></h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#"><?=trans('collaborated_partner');?></a></li>
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
                <?=trans('collaborated_partner');?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/gallery/collab_partner'), 'class="form-horizontal"'); ?>
               <div class="form-group">

                  <input type="hidden" name="collabSecID" id="collabSecID" value="<?php echo isset($Fetch_data['collabSecID']) ? set_value("collabSecID", $Fetch_data['collabSecID']) : set_value("collabSecID"); ?>">
               </div>
               <div class="form-group">
                  <label for="collabSecDesc"><span class="text-danger">*</span>Description</label>
                  <textarea name="collabSecDesc" id="collabSecDesc"><?php echo isset($Fetch_data['collabSecDesc']) ? set_value("collabSecDesc", $Fetch_data['collabSecDesc']) : set_value("collabSecDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <table border="0" class="tbl-vid-list" style="margin-top:-6px;" cellpadding="5" cellspacing="1" id="tbl-list" width="100%" bgcolor="">
                     <tr>
                        <th bgcolor=""><span class="text-danger">*</span>Multiple Images</th>
                     </tr>
                     <tr>
                        <td  bgcolor="">
                           <div id="status"></div>
                           <input type="file" class="form-control file-input demo" id="propertImg" Name="multiImage[]" placeholder="Image" multiple="multiple" />
                           <p class="text-danger" id="campaignFile_validate_gallery"></p>

                           <?php
if (count($gallary) == 0) {?>
                           <input type="hidden" name="old_blogThumbImg" id="old_blogThumbImg" value="0"  />
                          <?php } else {
	foreach ($gallary as $multiple) {?>
                        <input type="hidden" name="old_blogThumbImg" id="old_blogThumbImg" value="1" />
                           <img src="<?php echo base_url('uploads/gallery/collaborated/' . $multiple['collabSecSliderImg']); ?>" width="100" height="100" class="img-responsive"/>
                           <input type="button" class="delete_imaage" rel="<?php echo $multiple['collabSecSliderImg']; ?>" data-id="<?php echo $multiple['collabSecSliderID']; ?>" value="X">
                           <?php }}?>
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
        CKEDITOR.replace('collabSecDesc', {
                 allowedContent : true,
         });


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