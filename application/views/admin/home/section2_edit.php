<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title">Section 2 </h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#">Section 2 Edit</a></li>
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
                Section 2 Edit</h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/banner/section2_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Title</label>
                  <input type="text" autocomplete="off"  name="section2Title" class="form-control" id="section2Title" value="<?php echo isset($Fetch_data['section2Title']) ? set_value("section2Title", $Fetch_data['section2Title']) : set_value("section2Title"); ?>" placeholder="">
                  <input type="hidden" name="section2ID" id="section2ID" value="<?php echo isset($Fetch_data['section2ID']) ? set_value("section2ID", $Fetch_data['section2ID']) : set_value("section2ID"); ?>">
               </div>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Video Link</label>
                  <input type="text" autocomplete="off"  name="videoLink" class="form-control" id="videoLink" value="<?php echo isset($Fetch_data['videoLink']) ? set_value("videoLink", $Fetch_data['videoLink']) : set_value("videoLink"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <label for="section2Desc"><span class="text-danger">*</span>Description</label>
                  <textarea name="section2Desc" id="section2Desc"><?php echo isset($Fetch_data['section2Desc']) ? set_value("section2Desc", $Fetch_data['section2Desc']) : set_value("section2Desc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="section2Image"><span class="text-danger">*</span>  Image</label>
                  <input type="file" class="form-control" id="section2Image" name="section2Image" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['section2Image']) ? $Fetch_data['section2Image'] : ''; ?>" />
                  <input type="hidden" name="old_section2Image" id="old_section2Image" value="<?php echo isset($Fetch_data['section2Image']) ? $Fetch_data['section2Image'] : ''; ?>" />
                  <p class="text-danger" id="section2Image_validate"></p>
                  <?php if (isset($Fetch_data['section2Image'])) {?>
                  <img src="<?php echo base_url('uploads/section2/' . $Fetch_data['section2Image']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
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
        CKEDITOR.replace('section2Desc', {
                 allowedContent : true,
         });
    });
</script>