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
         <h4 class="page-title">volunteer</h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#">volunteer Add Edit</a></li>
            </ol>
         </div>
      </div>
        <?php if ($this->router->fetch_method() == 'view') {?>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/volunteer/" class="btn btn-primary-rgba"><i class="feather icon-skip-back mr-2"></i>Back</a>
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
               Volunteer View <?php } else {?>Volunteer Add Edit <?php }?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/volunteer/add_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Name</label>
                  <input type="text" autocomplete="off"  name="volunteerName" class="form-control" id="volunteerName" value="<?php echo isset($Fetch_data['volunteerName']) ? set_value("volunteerName", $Fetch_data['volunteerName']) : set_value("volunteerName"); ?>" placeholder="">
                  <input type="hidden" name="volunteerID" id="volunteerID" value="<?php echo isset($Fetch_data['volunteerID']) ? set_value("volunteerID", $Fetch_data['volunteerID']) : set_value("volunteerID"); ?>">
               </div>
                <div class="form-group">
                  <label for="Designation"><span class="text-danger">*</span>Designation</label>
                  <input type="text" autocomplete="off" name="volunteerDesignation" class="form-control" id="volunteerDesignation" value="<?php echo isset($Fetch_data['volunteerDesignation']) ? set_value("volunteerDesignation", $Fetch_data['volunteerDesignation']) : set_value("volunteerDesignation"); ?>"  placeholder="">
               </div>
               <div class="form-group">
                  <label for="volThumbImage"><span class="text-danger">*</span>Image</label>
                  <input type="file" class="form-control" id="volThumbImage" name="volThumbImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['volThumbImage']) ? $Fetch_data['volThumbImage'] : ''; ?>" />
                  <input type="hidden" name="old_volThumbImage" id="old_volThumbImage" value="<?php echo isset($Fetch_data['volThumbImage']) ? $Fetch_data['volThumbImage'] : ''; ?>" />
                  <p class="text-danger" id="volThumbImage_validate"></p>
                  <?php if (isset($Fetch_data['volThumbImage'])) {?>
                  <img src="<?php echo base_url('uploads/volunteer/' . $Fetch_data['volThumbImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('volThumbImage'); ?></span>
               </div>
               <div class="form-group">
                  <label for="Name">Facebook Link</label>
                  <input type="text" autocomplete="off"  name="volunteerFbLink" class="form-control" id="volunteerFbLink" value="<?php echo isset($Fetch_data['volunteerFbLink']) ? set_value("volunteerFbLink", $Fetch_data['volunteerFbLink']) : set_value("volunteerFbLink"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <label for="Name">Twitter Link</label>
                  <input type="text" autocomplete="off"  name="volunteertweLink" class="form-control" id="volunteertweLink" value="<?php echo isset($Fetch_data['volunteertweLink']) ? set_value("volunteertweLink", $Fetch_data['volunteertweLink']) : set_value("volunteertweLink"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <label for="Name">Instagram Link</label>
                  <input type="text" autocomplete="off"  name="volunteerInstaLink" class="form-control" id="volunteerInstaLink" value="<?php echo isset($Fetch_data['volunteerInstaLink']) ? set_value("volunteerInstaLink", $Fetch_data['volunteerInstaLink']) : set_value("volunteerInstaLink"); ?>" placeholder="">
               </div>
               <input type="submit" name="submit" id="BannerBtn" value="Submit" class="btn btn-primary pull-left">
               <a href="<?=base_url();?>admin/volunteer/" class="btn-lg ml-1 btn btn-danger">Cancel</a>

               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
