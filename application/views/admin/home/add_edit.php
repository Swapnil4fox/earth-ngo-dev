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
         <h4 class="page-title">Banner</h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#">Banner Add Edit</a></li>
            </ol>
         </div>
      </div>
        <?php if ($this->router->fetch_method() == 'view') {?>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/banner/" class="btn btn-primary-rgba"><i class="feather icon-skip-back mr-2"></i>Back</a>
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
               <h5 class="card-title">Banner Add Edit</h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/banner/add_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <input type="hidden" name="bannerID" id="bannerID" value="<?php echo isset($Fetch_data['bannerID']) ? set_value("bannerID", $Fetch_data['bannerID']) : set_value("bannerID"); ?>">
               </div>
               <div class="form-group">
                  <label for="bannerMobImage"><span class="text-danger">*</span>Mobile Banner </label>
                  <input type="file" class="form-control" id="bannerMobImage" name="bannerMobImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['bannerMobImage']) ? $Fetch_data['bannerMobImage'] : ''; ?>" />
                  <input type="hidden" name="old_bannerMobImage" id="old_bannerMobImage" value="<?php echo isset($Fetch_data['bannerMobImage']) ? $Fetch_data['bannerMobImage'] : ''; ?>" />
                  <p class="text-danger" id="bannerMobImage_validate"></p>
                  <?php if (isset($Fetch_data['bannerMobImage'])) {?>
                  <img src="<?php echo base_url('uploads/banner/' . $Fetch_data['bannerMobImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('bannerMobImage'); ?></span>
               </div>
               <div class="form-group">
                  <label for="bannerMobImage"><span class="text-danger">*</span>Desktop Banner </label>
                  <input type="file" class="form-control" id="bannerDeskImage" name="bannerDeskImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['bannerDeskImage']) ? $Fetch_data['bannerDeskImage'] : ''; ?>" />
                  <input type="hidden" name="old_bannerDeskImage" id="old_bannerDeskImage" value="<?php echo isset($Fetch_data['bannerDeskImage']) ? $Fetch_data['bannerDeskImage'] : ''; ?>" />
                  <p class="text-danger" id="bannerDeskImage_validate"></p>
                  <?php if (isset($Fetch_data['bannerDeskImage'])) {?>
                  <img src="<?php echo base_url('uploads/banner/' . $Fetch_data['bannerDeskImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('bannerDeskImage'); ?></span>
               </div>
               <input type="submit" name="submit" id="BannerBtn" value="Submit" class="btn btn-primary pull-left">
               <a href="<?=base_url();?>admin/banner/" class="btn-lg ml-1 btn btn-danger">Cancel</a>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
