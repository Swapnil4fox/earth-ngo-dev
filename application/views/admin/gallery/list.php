<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables_new/dataTables.bootstrap4.css">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?php echo trans('gallery_list'); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo trans('gallery_list'); ?></a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/gallery/add_edit" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?php echo trans('gallery_add'); ?></a>
            </div>
        </div>
    </div>
</div>
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?=trans('gallery_list')?></h5>
                </div>
                <div class="card-body">
                     <?php $this->load->view('admin/includes/_messages.php')?>
                    <div class="table-responsive">
                        <table id="gallerydatatable" class="table table-striped table-bordered" width="100%">
                            <thead>
                            <tr>
                                <th>#id</th>
                                <th>Category</th>
                                <th class="text-right">Action</th>
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
<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables_new/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables_new/dataTables.bootstrap4.js"></script>

<script>
$(document).ready(function(){
    $('#gallerydatatable').DataTable({

        "processing": true,
        "serverSide": false,
        "ajax": "<?=base_url('admin/gallery/gallerylist_json')?>",
        "order": [[0,'desc']],
        "columnDefs": [
        { "targets": 0, "name": "galleryID", 'searchable':true, 'orderable':true,'width':'30px'},
        { "targets": 1, "name": "galleryCategory", 'searchable':true, 'orderable':true,'width':'30px'},
        { "targets": 2, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
        ]
    });
});
</script>





