<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables_new/dataTables.bootstrap4.css">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?=trans('contact_list');?></h4>

            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?=trans('contact_list');?></a></li>
                </ol>
            </div>
        </div>
            <?php echo form_open(base_url('admin/contact_us/export_Contact'), 'id="frmvalidate"'); ?>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-5">
                     <label for="fromDate" class="control-label "><span class="text-danger">*</span>From Date</label>
                     <input type="text" name="fromDate" autocomplete="off" value="<?php echo $this->input->post('fromDate'); ?>" class="form-control" id="fromDate"  />

                     <span class="text-danger"><?php echo form_error('fromDate'); ?></span>
                  </div>
                  <div class="col-md-5">
                     <label for="toDate" class="control-label "><span class="text-danger">*</span>To Date</label>
                     <input type="text" name="toDate" autocomplete="off" value="<?php echo $this->input->post('toDate'); ?>" class="form-control" id="toDate" />
                     <span class="text-danger"><?php echo form_error('toDate'); ?></span>
                  </div>
                   <div class="col-md-2">
                      <button type="submit" class="mt-2 btn-md btn btn-primary" style="margin-top:29px !important ;">Export</button>
                   </div>

                  </div>
            </div>
         <?php echo form_close(); ?>
    </div>
</div>
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo trans('contact_list'); ?></h5>
                </div>
                <div class="card-body">
                    <?php $this->load->view('admin/includes/_messages.php')?>
                    <div class="table-responsive">
                        <table id="contactdatatable" class="table table-striped table-bordered" width="100%">
                            <thead>
                            <tr>
                                <th>#<?=trans('id')?></th>
                                <th><?=trans('name');?></th>
                                <th><?=trans('email');?></th>
                                <th><?=trans('phone');?></th>
                                <th><?=trans('message');?></th>
                                <th><?=trans('date');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<script src="<?=base_url()?>assets/plugins/datatables_new/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables_new/dataTables.bootstrap4.js"></script>
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>

<script>
$(document).ready(function(){
    $('#contactdatatable').DataTable({

        "processing": true,
        "serverSide": false,
        "ajax": "<?=base_url('admin/contact_us/contactlist_json')?>",
        "order": [[0,'desc']],
        "columnDefs": [
        { "targets": 0, "name": "contact_formID", 'searchable':true, 'orderable':true,'width':'30px'},
        { "targets": 1, "name": "fullname", 'searchable':true, 'orderable':true,'width':'30px'},
        { "targets": 2, "name": "contact_formEmail", 'searchable':true, 'orderable':true,'width':'30px'},
        { "targets": 3, "name": "contact_formPhone", 'searchable':true, 'orderable':true,'width':'30px'},
        { "targets": 4, "name": "contact_formMessage", 'searchable':true, 'orderable':true,'width':'100px'},
        { "targets": 5, "name": "date", 'searchable':true, 'orderable':true,'width':'100px'}
        ]
    });
});

var fromDate = jQuery('#fromDate').datepicker({

        maxDate:0,
        dateFormat: 'yy-mm-dd',
        timepicker:false,
       onSelect: function(dateStr)
        {
            $("#toDate").datepicker("option",{ minDate: new Date(dateStr)})
        }
    });


  var toDate = jQuery('#toDate').datepicker({

        dateFormat: 'yy-mm-dd',
        timepicker:false,
        maxDate:0,
        onSelect: function(dateStr)
        {

            $("#fromDate").datepicker("option",{ maxDate: new Date(dateStr)})
        }

         });

</script>





