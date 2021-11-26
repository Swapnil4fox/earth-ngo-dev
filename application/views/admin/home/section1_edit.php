<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title">Section 1</h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#">Section 1 Edit</a></li>
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
                Section 1 Edit</h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/banner/section1_edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Title</label>
                  <input type="text" autocomplete="off"  name="section1Title" class="form-control" id="section1Title" value="<?php echo isset($Fetch_data['section1Title']) ? set_value("section1Title", $Fetch_data['section1Title']) : set_value("section1Title"); ?>" placeholder="">
                  <input type="hidden" name="section1ID" id="section1ID" value="<?php echo isset($Fetch_data['section1ID']) ? set_value("section1ID", $Fetch_data['section1ID']) : set_value("section1ID"); ?>">
               </div>
               <div class="form-group">
                  <label for="section1Desc"><span class="text-danger">*</span>Description</label>
                  <textarea name="section1Desc" id="section1Desc"><?php echo isset($Fetch_data['section1Desc']) ? set_value("section1Desc", $Fetch_data['section1Desc']) : set_value("section1Desc"); ?></textarea>
               </div>
                <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Icon 1 Title</label>
                  <input type="text" autocomplete="off"  name="icon1Title" class="form-control" id="icon1Title" value="<?php echo isset($Fetch_data['icon1Title']) ? set_value("icon1Title", $Fetch_data['icon1Title']) : set_value("icon1Title"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <label for="icon1Image"><span class="text-danger">*</span>Icon 1 Image</label>
                  <input type="file" class="form-control" id="icon1Image" name="icon1Image" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['icon1Image']) ? $Fetch_data['icon1Image'] : ''; ?>" />
                  <input type="hidden" name="old_icon1Image" id="old_icon1Image" value="<?php echo isset($Fetch_data['icon1Image']) ? $Fetch_data['icon1Image'] : ''; ?>" />
                  <p class="text-danger" id="icon1Image_validate"></p>
                  <?php if (isset($Fetch_data['icon1Image'])) {?>
                  <img src="<?php echo base_url('uploads/section1/' . $Fetch_data['icon1Image']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('icon1Image'); ?></span>
               </div>
               <div class="form-group">
                  <label for="icon1Desc"><span class="text-danger">*</span>Icon 1 Description</label>
                  <textarea name="icon1Desc" id="icon1Desc"><?php echo isset($Fetch_data['icon1Desc']) ? set_value("icon1Desc", $Fetch_data['icon1Desc']) : set_value("icon1Desc"); ?></textarea>
               </div>
              <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Icon 2 Title</label>
                  <input type="text" autocomplete="off"  name="icon2Title" class="form-control" id="icon2Title" value="<?php echo isset($Fetch_data['icon2Title']) ? set_value("icon2Title", $Fetch_data['icon2Title']) : set_value("icon2Title"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <label for="icon2Image"><span class="text-danger">*</span>Icon2 Image</label>
                  <input type="file" class="form-control" id="icon2Image" name="icon2Image" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['icon2Image']) ? $Fetch_data['icon2Image'] : ''; ?>" />
                  <input type="hidden" name="old_icon2Image" id="old_icon2Image" value="<?php echo isset($Fetch_data['icon2Image']) ? $Fetch_data['icon2Image'] : ''; ?>" />
                  <p class="text-danger" id="icon2Image_validate"></p>
                  <?php if (isset($Fetch_data['icon2Image'])) {?>
                  <img src="<?php echo base_url('uploads/section1/' . $Fetch_data['icon2Image']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('icon2Image'); ?></span>
               </div>
               <div class="form-group">
                  <label for="icon2Desc"><span class="text-danger">*</span>Icon 2 Description</label>
                  <textarea name="icon2Desc" id="icon2Desc"><?php echo isset($Fetch_data['icon2Desc']) ? set_value("icon2Desc", $Fetch_data['icon2Desc']) : set_value("icon2Desc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Icon 3 Title</label>
                  <input type="text" autocomplete="off"  name="icon3Title" class="form-control" id="icon3Title" value="<?php echo isset($Fetch_data['icon3Title']) ? set_value("icon3Title", $Fetch_data['icon3Title']) : set_value("icon3Title"); ?>" placeholder="">
               </div>
               <div class="form-group">
                  <label for="icon3Image"><span class="text-danger">*</span>Icon 3 Image</label>
                  <input type="file" class="form-control" id="icon3Image" name="icon3Image" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['icon3Image']) ? $Fetch_data['icon3Image'] : ''; ?>" />
                  <input type="hidden" name="old_icon3Image" id="old_icon3Image" value="<?php echo isset($Fetch_data['icon3Image']) ? $Fetch_data['icon3Image'] : ''; ?>" />
                  <p class="text-danger" id="icon3Image_validate"></p>
                  <?php if (isset($Fetch_data['icon3Image'])) {?>
                  <img src="<?php echo base_url('uploads/section1/' . $Fetch_data['icon3Image']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('icon3Image'); ?></span>
               </div>

               <div class="form-group">
                  <label for="icon3Desc"><span class="text-danger">*</span>Icon 3 Description</label>
                  <textarea name="icon3Desc" id="icon3Desc"><?php echo isset($Fetch_data['icon3Desc']) ? set_value("icon3Desc", $Fetch_data['icon3Desc']) : set_value("icon3Desc"); ?></textarea>
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
        CKEDITOR.replace('section1Desc', {
                 allowedContent : true,
              });
        CKEDITOR.replace('icon1Desc', {
                 allowedContent : true,
              });
        CKEDITOR.replace('icon2Desc', {
                 allowedContent : true,
              });
        CKEDITOR.replace('icon3Desc', {
                 allowedContent : true,
              });

    });
</script>