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
               <li class="breadcrumb-item"><a href="#">Team Add Edit</a></li>
            </ol>
         </div>
      </div>
        <?php if ($this->router->fetch_method() == 'view') {?>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/team/" class="btn btn-primary-rgba"><i class="feather icon-skip-back mr-2"></i>Back</a>
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
               Team View <?php } else {?>Team Add Edit <?php }?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/team/add_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Name</label>
                  <input type="text" autocomplete="off"  name="teamName" class="form-control" id="teamName" value="<?php echo isset($Fetch_data['teamName']) ? set_value("teamName", $Fetch_data['teamName']) : set_value("teamName"); ?>" placeholder="">
                  <input type="hidden" name="teamID" id="teamID" value="<?php echo isset($Fetch_data['teamID']) ? set_value("teamID", $Fetch_data['teamID']) : set_value("teamID"); ?>">
               </div>
                <div class="form-group">
                  <label for="Designation"><span class="text-danger">*</span>Designation</label>
                  <input type="text" autocomplete="off" name="teamDesignation" class="form-control" id="teamDesignation" value="<?php echo isset($Fetch_data['teamDesignation']) ? set_value("teamDesignation", $Fetch_data['teamDesignation']) : set_value("teamDesignation"); ?>"  placeholder="">
                  <span class="text-danger"><?php echo form_error('teamDesignation'); ?></span>
               </div>
               <div class="form-group">
                  <label for="teamThumbImage"><span class="text-danger">*</span>Image <span class="text-danger">Image Dimension: 755 × 755 px</span></label>
                  <input type="file" class="form-control" id="teamThumbImage" name="teamThumbImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['teamThumbImage']) ? $Fetch_data['teamThumbImage'] : ''; ?>" />
                  <input type="hidden" name="old_teamThumbImage" id="old_teamThumbImage" value="<?php echo isset($Fetch_data['teamThumbImage']) ? $Fetch_data['teamThumbImage'] : ''; ?>" />
                  <p class="text-danger" id="teamThumbImage_validate"></p>
                  <?php if (isset($Fetch_data['teamThumbImage'])) {?>
                  <img src="<?php echo base_url('uploads/team/' . $Fetch_data['teamThumbImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('teamThumbImage'); ?></span>
               </div>
               <input type="submit" name="submit" id="BannerBtn" value="Submit" class="btn btn-primary pull-left">
               <a href="<?=base_url();?>admin/team/" class="btn-lg ml-1 btn btn-danger">Cancel</a>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
