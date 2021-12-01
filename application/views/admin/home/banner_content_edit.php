<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title"><?=trans('banner_content_edit');?></h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#"><?=trans('banner_content_edit');?></a></li>
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
               <h5 class="card-title"><?=trans('banner_content_edit');?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/banner/banner_content_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="title"><span class="text-danger">*</span><?=trans('title')?></label>
                  <input type="text" autocomplete="off" name="bannerTitle" class="form-control" id="bannerTitle" value="<?php echo isset($Fetch_data['bannerTitle']) ? set_value("bannerTitle", $Fetch_data['bannerTitle']) : set_value("bannerTitle"); ?>" placeholder="">
                  <input type="hidden" name="contentID" id="contentID" value="<?php echo isset($Fetch_data['contentID']) ? set_value("contentID", $Fetch_data['contentID']) : set_value("contentID"); ?>">
               </div>
               <div class="form-group">
                  <label for="description"><span class="text-danger">*</span>Description</label>
                  <textarea name="bannerDesc" id="bannerDesc"><?php echo isset($Fetch_data['bannerDesc']) ? set_value("bannerDesc", $Fetch_data['bannerDesc']) : set_value("bannerDesc"); ?></textarea>
                  <span id="pageSynopsis_validate" class="text-danger"></span>
               </div>
               <div class="form-group">
                  <label for="Name">Link</label>
                  <input type="text" autocomplete="off"  name="bannerlink" class="form-control" id="bannerlink" value="<?php echo isset($Fetch_data['bannerlink']) ? set_value("bannerlink", $Fetch_data['bannerlink']) : set_value("bannerlink"); ?>" placeholder="">
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
        CKEDITOR.replace( 'bannerDesc' );
    });
</script>