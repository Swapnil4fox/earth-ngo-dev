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
         <h4 class="page-title"><?=trans('Contact_us_page');?></h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#"><?=trans('edit_Contact_us_page');?></a></li>
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
                <?=trans('Contact_us_page');?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open(base_url('admin/contact_us/edit'), 'class="form-horizontal"'); ?>
                <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Description</label>
                  <textarea name="contact_pageDesc" id="contact_pageDesc"><?php echo isset($Fetch_data['contact_pageDesc']) ? set_value("contact_pageDesc", $Fetch_data['contact_pageDesc']) : set_value("contact_pageDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Phone</label>
                  <input type="text" autocomplete="off"  name="contact_pagePhone" class="form-control" id="contact_pagePhone" value="<?php echo isset($Fetch_data['contact_pagePhone']) ? set_value("contact_pagePhone", $Fetch_data['contact_pagePhone']) : set_value("contact_pagePhone"); ?>" placeholder="">
                   <input type="hidden" name="contact_pageID" id="contact_pageID" value="<?php echo isset($Fetch_data['contact_pageID']) ? set_value("contact_pageID", $Fetch_data['contact_pageID']) : set_value("contact_pageID"); ?>">
               </div>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Email</label>
                  <input type="text" autocomplete="off"  name="contact_pageEmail" class="form-control" id="contact_pageEmail" value="<?php echo isset($Fetch_data['contact_pageEmail']) ? set_value("contact_pageEmail", $Fetch_data['contact_pageEmail']) : set_value("contact_pageEmail"); ?>" placeholder="">
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
       CKEDITOR.replace('contact_pageDesc', {
                 allowedContent : true,
              });
    });
</script>