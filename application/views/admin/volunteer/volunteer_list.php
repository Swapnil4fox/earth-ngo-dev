<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables_new/dataTables.bootstrap4.css">
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?=trans('valunteer_form_list')?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?=trans('valunteer_form_list');?></a></li>
                </ol>
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
                    <h5 class="card-title mb-0"><?=trans('valunteer_form_list')?></h5>
                </div>
                <div class="card-body">
                    <?php $this->load->view('admin/includes/_messages.php')?>
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th><?=trans('id')?></th>
                                <th><?=trans('name')?></th>
                                <th><?=trans('Phone')?></th>
                                <th><?=trans('email')?></th>
                                <th><?=trans('Address')?></th>
                                <th><?=trans('date_of_birth')?></th>
                                <th><?=trans('nationality')?></th>
                                <th><?=trans('message')?></th>
                                <th><?=trans('date')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
foreach ($info as $row): ?>
                            <tr>
                                <td>
                                    <?=$row['volFromD']?>
                                </td>
                                <td>
                                    <?=$row['volFromName']?>
                                </td>
                                <td>
                                    <?=$row['volFromPhone']?>
                                </td>
                                <td>
                                    <?=$row['volFromEmail']?>
                                </td>
                                <td>
                                    <?=$row['volFromAddress']?>
                                </td>
                                <td>
                                    <?=$row['volFromBdate']?>
                                </td>
                                <td>
                                    <?=$row['volFromNationality']?>
                                </td>
                                <td>
                                    <?=$row['volFromMessage']?>
                                </td>
                                <td>
                                    <?=date('Y-m-d', strtotime($row['dateAdded']))?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>

<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables_new/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables_new/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });

</script>



