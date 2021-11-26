<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title"><?=trans('about_us_edit');?></h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#"><?=trans('about_us_edit');?></a></li>
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
                <?=trans('about_us_edit');?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/about/edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <label for="Name"><span class="text-danger">*</span>Title</label>
                  <input type="text" autocomplete="off"  name="aboutTitle" class="form-control" id="aboutTitle" value="<?php echo isset($Fetch_data['aboutTitle']) ? set_value("aboutTitle", $Fetch_data['aboutTitle']) : set_value("aboutTitle"); ?>" placeholder="">
                  <input type="hidden" name="aboutID" id="aboutID" value="<?php echo isset($Fetch_data['aboutID']) ? set_value("aboutID", $Fetch_data['aboutID']) : set_value("aboutID"); ?>">
               </div>
               <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="aboutDesc" id="aboutDesc"><?php echo isset($Fetch_data['aboutDesc']) ? set_value("aboutDesc", $Fetch_data['aboutDesc']) : set_value("aboutDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="aboutvisionDesc">Vision Description</label>
                  <textarea name="aboutvisionDesc" id="aboutvisionDesc"><?php echo isset($Fetch_data['aboutvisionDesc']) ? set_value("aboutvisionDesc", $Fetch_data['aboutvisionDesc']) : set_value("aboutvisionDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="aboutVisionImg"><span class="text-danger">*</span>Vision Image</label>
                  <input type="file" class="form-control" id="aboutVisionImg" name="aboutVisionImg" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['aboutVisionImg']) ? $Fetch_data['aboutVisionImg'] : ''; ?>" />
                  <input type="hidden" name="old_aboutVisionImg" id="old_aboutVisionImg" value="<?php echo isset($Fetch_data['aboutVisionImg']) ? $Fetch_data['aboutVisionImg'] : ''; ?>" />
                  <p class="text-danger" id="aboutVisionImg_validate"></p>
                  <?php if (isset($Fetch_data['aboutVisionImg'])) {?>
                  <img src="<?php echo base_url('uploads/about/' . $Fetch_data['aboutVisionImg']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('aboutVisionImg'); ?></span>
               </div>
               <div class="form-group">
                  <label for="aboutmisionDesc">Mission Description</label>
                  <textarea name="aboutmisionDesc" id="aboutmisionDesc"><?php echo isset($Fetch_data['aboutmisionDesc']) ? set_value("aboutmisionDesc", $Fetch_data['aboutmisionDesc']) : set_value("aboutmisionDesc"); ?></textarea>
               </div>
               <div class="form-group">
                  <label for="aboutMissionImg"><span class="text-danger">*</span>Mission Image</label>
                  <input type="file" class="form-control" id="aboutMissionImg" name="aboutMissionImg" placeholder="Fetch_data Image" value="<?php echo !empty($Fetch_data['aboutMissionImg']) ? $Fetch_data['aboutMissionImg'] : ''; ?>" />
                  <input type="hidden" name="old_aboutMissionImg" id="old_aboutMissionImg" value="<?php echo isset($Fetch_data['aboutMissionImg']) ? $Fetch_data['aboutMissionImg'] : ''; ?>" />
                  <p class="text-danger" id="aboutMissionImg_validate"></p>
                  <?php if (isset($Fetch_data['aboutMissionImg'])) {?>
                  <img src="<?php echo base_url('uploads/about/' . $Fetch_data['aboutMissionImg']); ?>" width="100" height="100" class="img-responsive"/>
                  <?php }?>
                  <span class="text-danger"><?php echo form_error('aboutmisionDesc'); ?></span>
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
        CKEDITOR.replace( 'aboutDesc' );
        CKEDITOR.replace( 'aboutvisionDesc');
        CKEDITOR.replace( 'aboutmisionDesc');
    });
</script>