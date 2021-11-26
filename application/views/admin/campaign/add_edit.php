<?php if ($this->router->fetch_method() == 'view') {
	?>
<script type="text/javascript">
$(document).ready(function(e) {
    $('input[type="password"]').each(function(index, element) {
        $(this).parents('.form-group').hide();
    });
    $('input[type="file"]').each(function(index, element) {
        var main=$(this).remove();
    });
    $('textarea').each(function(index, element) {
        var main=$(this).parents('.form-group');
          var value=$(this).val();
        $(this).before(value);
        $(this).remove();

      });
    $('input[type="text"]').each(function(index, element) {
        var main=$(this).parents('.form-group');
          var value=$(this).val();
        $(this).before(value);
        $(this).remove();

      });
    $('input[type="submit"]').each(function(index, element) {
        $(this).remove();
    });
    $('form').attr('id','');

     $('select').each(function(index, element) {
         var selVal=$('option:selected',this).text();
         $(this).before(selVal);
         $(this).parents('.form-group').remove();
     });
});
</script>
<style type="text/css">
.form-control{
    outline: none !important;
    border:none !important;
    -webkit-appearance:none !important;
}
.form-control:focus{
    outline: none !important;
    border:none !important;
    -webkit-appearance:none !important;
}

</style>
<?php }?>

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title">Team</h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#"><?=trans('campaign_add_edit')?></a></li>
            </ol>
         </div>
      </div>
        <?php if ($this->router->fetch_method() == 'view') {?>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/campaign/" class="btn btn-primary-rgba"><i class="feather icon-skip-back mr-2"></i>Back</a>
            </div>
        </div>
        <?php }?>
   </div>
</div>
<div class="contentbar">
   <div class="row">
      <div class="col-md-12">
         <div class="card m-b-30">
            <div class="card-header">
               <h5 class="card-title">
                <?php if ($this->router->fetch_method() == 'view') {?>
               campaign View <?php } else {?>campaign Add Edit <?php }?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/campaign/add_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Name</label>
                  <input type="text" autocomplete="off"  name="campaignName" class="form-control" id="campaignName" value="<?php echo isset($Fetch_data['campaignName']) ? set_value("campaignName", $Fetch_data['campaignName']) : set_value("campaignName"); ?>" placeholder="">
                  <input type="hidden" name="campaignID" id="campaignID" value="<?php echo isset($Fetch_data['campaignID']) ? set_value("campaignID", $Fetch_data['campaignID']) : set_value("campaignID"); ?>">
               </div>
                <div class="form-group">
                  <label for="description"><span class="text-danger">*</span>Short Description</label>
                  <textarea name="campaignshortDesc" id="campaignshortDesc"><?php echo isset($Fetch_data['campaignshortDesc']) ? set_value("campaignshortDesc", $Fetch_data['campaignshortDesc']) : set_value("campaignshortDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="description"><span class="text-danger">*</span>Long Description</label>
                  <textarea name="campaignLongDesc" id="campaignLongDesc"><?php echo isset($Fetch_data['campaignshortDesc']) ? set_value("campaignLongDesc", $Fetch_data['campaignLongDesc']) : set_value("campaignLongDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="campaignThumbImage"><span class="text-danger">*</span>Thumbnail Image</label>
                  <input type="file" class="form-control" id="campaignThumbImage" name="campaignThumbImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['campaignThumbImage']) ? $Fetch_data['campaignThumbImage'] : ''; ?>" />
                  <input type="hidden" name="old_campaignThumbImage" id="old_campaignThumbImage" value="<?php echo isset($Fetch_data['campaignThumbImage']) ? $Fetch_data['campaignThumbImage'] : ''; ?>" />
                  <p class="text-danger" id="campaignThumbImage_validate"></p>
                  <?php if (isset($Fetch_data['campaignThumbImage'])) {?>
                  <img src="<?php echo base_url('uploads/campaign/' . $Fetch_data['campaignThumbImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('campaigndetailImage'); ?></span>
               </div>
               <div class="form-group">
                  <label for="campaigndetailImage"><span class="text-danger">*</span> Detail Image</label>
                  <input type="file" class="form-control" id="campaigndetailImage" name="campaigndetailImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['campaigndetailImage']) ? $Fetch_data['campaigndetailImage'] : ''; ?>" />
                  <input type="hidden" name="old_campaigndetailImage" id="old_campaigndetailImage" value="<?php echo isset($Fetch_data['campaigndetailImage']) ? $Fetch_data['campaigndetailImage'] : ''; ?>" />
                  <p class="text-danger" id="campaigndetailImage_validate"></p>
                  <?php if (isset($Fetch_data['campaigndetailImage'])) {?>
                  <img src="<?php echo base_url('uploads/campaign/' . $Fetch_data['campaigndetailImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('campaigndetailImage'); ?></span>
               </div>
               <div class="form-group">
                  <label for="Designation">Twitter Link</label>
                  <input type="text" autocomplete="off" name="campaignTwitterLink" class="form-control" id="campaignTwitterLink" value="<?php echo isset($Fetch_data['campaignTwitterLink']) ? set_value("campaignTwitterLink", $Fetch_data['campaignTwitterLink']) : set_value("campaignTwitterLink"); ?>"  placeholder="">
               </div>
               <div class="form-group">
                  <label for="Designation">Facebook Link</label>
                  <input type="text" autocomplete="off" name="campaignFBLink" class="form-control" id="campaignFBLink" value="<?php echo isset($Fetch_data['campaignFBLink']) ? set_value("campaignFBLink", $Fetch_data['campaignFBLink']) : set_value("campaignFBLink"); ?>"  placeholder="">
               </div>
               <div class="form-group">
                  <label for="Designation">Instagram Link</label>
                  <input type="text" autocomplete="off" name="campaignInstaLink" class="form-control" id="campaignInstaLink" value="<?php echo isset($Fetch_data['campaignInstaLink']) ? set_value("campaignInstaLink", $Fetch_data['campaignInstaLink']) : set_value("campaignInstaLink"); ?>"  placeholder="">
               </div>
               <div class="form-group">
                  <label for="Designation">Linkdin Link</label>
                  <input type="text" autocomplete="off" name="campaignLinkdinLink" class="form-control" id="campaignLinkdinLink" value="<?php echo isset($Fetch_data['campaignLinkdinLink']) ? set_value("campaignLinkdinLink", $Fetch_data['campaignLinkdinLink']) : set_value("campaignLinkdinLink"); ?>"  placeholder="">
               </div>
               <input type="submit" name="submit" id="BannerBtn" value="Submit" class="btn btn-primary pull-left">
               <a href="<?=base_url();?>admin/campaign/" class="btn-lg ml-1 btn btn-danger">Cancel</a>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('campaignshortDesc', {
                 allowedContent : true,
              });
        CKEDITOR.replace('campaignLongDesc', {
        allowedContent : true,
        filebrowserUploadUrl: "<?php echo base_url() ?>campaignupload.php",
        // filebrowserUploadUrl: "upload.php",
        filebrowserUploadMethod : "form"
    });
    });
</script>