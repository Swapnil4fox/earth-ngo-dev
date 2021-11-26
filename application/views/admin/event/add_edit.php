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
               <li class="breadcrumb-item"><a href="#"><?=trans('event_add_edit')?></a></li>
            </ol>
         </div>
      </div>
        <?php if ($this->router->fetch_method() == 'view') {?>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/event/" class="btn btn-primary-rgba"><i class="feather icon-skip-back mr-2"></i>Back</a>
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
               Event View <?php } else {?>Event Add Edit <?php }?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/event/add_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Name</label>
                  <input type="text" autocomplete="off"  name="eventName" class="form-control" id="eventName" value="<?php echo isset($Fetch_data['eventName']) ? set_value("eventName", $Fetch_data['eventName']) : set_value("eventName"); ?>" placeholder="">
                  <input type="hidden" name="eventID" id="eventID" value="<?php echo isset($Fetch_data['eventID']) ? set_value("eventID", $Fetch_data['eventID']) : set_value("eventID"); ?>">
               </div>
                <div class="form-group">
                  <label for="description"><span class="text-danger">*</span>Short Description</label>
                  <textarea name="eventshortDesc" id="eventshortDesc"><?php echo isset($Fetch_data['eventshortDesc']) ? set_value("eventshortDesc", $Fetch_data['eventshortDesc']) : set_value("eventshortDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="description"><span class="text-danger">*</span>Long Description</label>
                  <textarea name="eventLongDesc" id="eventLongDesc"><?php echo isset($Fetch_data['eventshortDesc']) ? set_value("eventLongDesc", $Fetch_data['eventLongDesc']) : set_value("eventLongDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="eventThumbImage"><span class="text-danger">*</span>Event Thumbnail Image</label>
                  <input type="file" class="form-control" id="eventThumbImage" name="eventThumbImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['eventThumbImage']) ? $Fetch_data['eventThumbImage'] : ''; ?>" />
                  <input type="hidden" name="old_eventThumbImage" id="old_eventThumbImage" value="<?php echo isset($Fetch_data['eventThumbImage']) ? $Fetch_data['eventThumbImage'] : ''; ?>" />
                  <p class="text-danger" id="eventThumbImage_validate"></p>
                  <?php if (isset($Fetch_data['eventThumbImage'])) {?>
                  <img src="<?php echo base_url('uploads/event/' . $Fetch_data['eventThumbImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('eventdetailImage'); ?></span>
               </div>
               <div class="form-group">
                  <label for="eventdetailImage"><span class="text-danger">*</span>Event Detail Image</label>
                  <input type="file" class="form-control" id="eventdetailImage" name="eventdetailImage" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['eventdetailImage']) ? $Fetch_data['eventdetailImage'] : ''; ?>" />
                  <input type="hidden" name="old_eventdetailImage" id="old_eventdetailImage" value="<?php echo isset($Fetch_data['eventdetailImage']) ? $Fetch_data['eventdetailImage'] : ''; ?>" />
                  <p class="text-danger" id="eventdetailImage_validate"></p>
                  <?php if (isset($Fetch_data['eventdetailImage'])) {?>
                  <img src="<?php echo base_url('uploads/event/' . $Fetch_data['eventdetailImage']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('eventdetailImage'); ?></span>
               </div>
               <div class="form-group">
                  <label for="Designation">Twitter Link</label>
                  <input type="text" autocomplete="off" name="eventTwitterLink" class="form-control" id="eventTwitterLink" value="<?php echo isset($Fetch_data['eventTwitterLink']) ? set_value("eventTwitterLink", $Fetch_data['eventTwitterLink']) : set_value("eventTwitterLink"); ?>"  placeholder="">
               </div>
               <div class="form-group">
                  <label for="Designation">Facebook Link</label>
                  <input type="text" autocomplete="off" name="eventFBLink" class="form-control" id="eventFBLink" value="<?php echo isset($Fetch_data['eventFBLink']) ? set_value("eventFBLink", $Fetch_data['eventFBLink']) : set_value("eventFBLink"); ?>"  placeholder="">
               </div>
               <div class="form-group">
                  <label for="Designation">Instagram Link</label>
                  <input type="text" autocomplete="off" name="eventInstaLink" class="form-control" id="eventInstaLink" value="<?php echo isset($Fetch_data['eventInstaLink']) ? set_value("eventInstaLink", $Fetch_data['eventInstaLink']) : set_value("eventInstaLink"); ?>"  placeholder="">
               </div>
               <div class="form-group">
                  <label for="Designation">Linkdin Link</label>
                  <input type="text" autocomplete="off" name="eventLinkdinLink" class="form-control" id="eventLinkdinLink" value="<?php echo isset($Fetch_data['eventLinkdinLink']) ? set_value("eventLinkdinLink", $Fetch_data['eventLinkdinLink']) : set_value("eventLinkdinLink"); ?>"  placeholder="">
               </div>
               <input type="submit" name="submit" id="BannerBtn" value="Submit" class="btn btn-primary pull-left">
               <a href="<?=base_url();?>admin/event/" class="btn-lg ml-1 btn btn-danger">Cancel</a>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('eventshortDesc', {
                 allowedContent : true,
              });
        CKEDITOR.replace('eventLongDesc', {
        allowedContent : true,
        filebrowserUploadUrl: "<?php echo base_url() ?>upload.php",
        // filebrowserUploadUrl: "upload.php",
        filebrowserUploadMethod : "form"
    });
    });
</script>