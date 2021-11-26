<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Profile</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Add New User</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?= base_url('admin/users'); ?>"><button class="btn btn-primary-rgba"> <i class="feather icon-plus mr-2"></i><?= trans('users_list') ?></button></a>
            </div>                        
        </div>
    </div>          
</div>
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <h5 class="card-title mb-0">Edit Profile Informations</h5>
                </div>
                <div class="card-body">
                   <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>

                    <?php echo form_open(base_url('admin/users/add'), 'class="form-horizontal"');  ?> 
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="username"><?= trans('username') ?></label>
                              <input type="text" name="username" class="form-control" id="username" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="firstname"><?= trans('firstname') ?></label>
                              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="lastname"><?= trans('lastname') ?></label>
                              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="email"><?= trans('email') ?></label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="mobile_no"><?= trans('mobile_no') ?></label>
                              <input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="password"><?= trans('password') ?></label>
                              <input type="text" name="password" class="form-control" id="password" placeholder="">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="address"><?= trans('address') ?></label>
                              <input type="text" name="address" class="form-control" id="address" placeholder="">
                          </div>
                          
                      </div>
                      <input type="submit" name="submit" value="<?= trans('add_user') ?>" class="btn btn-primary-rgba font-16">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>