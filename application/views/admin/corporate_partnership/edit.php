<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h4 class="page-title"><?=trans('corporate_partnership');?></h4>
         <div class="breadcrumb-list">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
               <li class="breadcrumb-item"><a href="#"><?=trans('corporate_partnership');?></a></li>
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
                <?=trans('corporate_partnership');?></h5>
            </div>
            <div class="card-body">
               <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php')?>
               <?php echo form_open_multipart(base_url('admin/corporate_partnership/edit'), 'class="form-horizontal"'); ?>
               <div class="form-group">
                  <input type="hidden" name="corporateID" id="corporateID" value="<?php echo isset($Fetch_data['corporateID']) ? set_value("corporateID", $Fetch_data['corporateID']) : set_value("corporateID"); ?>">
               </div>
               <div class="form-group">
                  <label for="page_Description">Description</label>
                  <textarea name="page_Description" id="page_Description"><?php echo isset($Fetch_data['page_Description']) ? set_value("page_Description", $Fetch_data['page_Description']) : set_value("page_Description"); ?></textarea>
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
      CKEDITOR.replace('page_Description', {
        allowedContent : true,
        filebrowserUploadUrl: "<?php echo base_url() ?>corporate_par_upload.php",
        filebrowserUploadMethod : "form"
    });
    });
</script>