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
               <li class="breadcrumb-item"><a href="#"><?=trans('goals_add_edit')?></a></li>
            </ol>
         </div>
      </div>
        <?php if ($this->router->fetch_method() == 'view') {?>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/goals/" class="btn btn-primary-rgba"><i class="feather icon-skip-back mr-2"></i>Back</a>
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
               Goals View <?php } else {?>Goals Add Edit <?php }?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/goals/add_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Designation"><span class="text-danger">*</span>Number</label>
                  <input type="text" inputmode="numeric" autocomplete="off" name="goalsNumber" class="form-control numberOnly" id="goalsNumber" value="<?php echo isset($Fetch_data['goalsNumber']) ? set_value("goalsNumber", $Fetch_data['goalsNumber']) : set_value("goalsNumber"); ?>"  placeholder="">
               </div>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Name</label>
                  <input type="text" autocomplete="off"  name="goalsName" class="form-control" id="goalsName" value="<?php echo isset($Fetch_data['goalsName']) ? set_value("goalsName", $Fetch_data['goalsName']) : set_value("goalsName"); ?>" placeholder="">
                  <input type="hidden" name="goalsID" id="goalsID" value="<?php echo isset($Fetch_data['goalsID']) ? set_value("goalsID", $Fetch_data['goalsID']) : set_value("goalsID"); ?>">
               </div>
                <div class="form-group">
                  <label for="description"><span class="text-danger">*</span>Short Description</label>
                  <textarea name="goalsShortDesc" id="goalsShortDesc"><?php echo isset($Fetch_data['goalsShortDesc']) ? set_value("goalsShortDesc", $Fetch_data['goalsShortDesc']) : set_value("goalsShortDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="goalsThumbImage"><span class="text-danger">*</span>Thumbnail Image <span class="text-danger">Image Dimension : 148 x 148 px</span></label>
                  <input type="file" class="form-control" id="goalsThumbImage" name="goalsThumbImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['goalsThumbImage']) ? $Fetch_data['goalsThumbImage'] : ''; ?>" />
                  <input type="hidden" name="old_goalsThumbImage" id="old_goalsThumbImage" value="<?php echo isset($Fetch_data['goalsThumbImage']) ? $Fetch_data['goalsThumbImage'] : ''; ?>" />
                  <p class="text-danger" id="goalsThumbImage_validate"></p>
                  <?php if (isset($Fetch_data['goalsThumbImage'])) {?>
                  <img src="<?php echo base_url('uploads/goals/' . $Fetch_data['goalsThumbImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('goalsdetailImage'); ?></span>
               </div>
               <div class="form-group">
                  <label for="goalsdetailImage"><span class="text-danger">*</span>Detail Image <span class="text-danger">Image Dimension : 1024 x 1024 px</span></label>
                  <input type="file" class="form-control" id="goalsdetailImage" name="goalsdetailImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['goalsdetailImage']) ? $Fetch_data['goalsdetailImage'] : ''; ?>" />
                  <input type="hidden" name="old_goalsdetailImage" id="old_goalsdetailImage" value="<?php echo isset($Fetch_data['goalsdetailImage']) ? $Fetch_data['goalsdetailImage'] : ''; ?>" />
                  <p class="text-danger" id="goalsdetailImage_validate"></p>
                  <?php if (isset($Fetch_data['goalsdetailImage'])) {?>
                  <img src="<?php echo base_url('uploads/goals/' . $Fetch_data['goalsdetailImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('goalsdetailImage'); ?></span>
               </div>

               <input type="submit" name="submit" id="BannerBtn" value="Submit" class="btn btn-primary pull-left">
               <a href="<?=base_url();?>admin/goals/" class="btn-lg ml-1 btn btn-danger">Cancel</a>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('goalsShortDesc', {
                 allowedContent : true,
              });
    });
</script>