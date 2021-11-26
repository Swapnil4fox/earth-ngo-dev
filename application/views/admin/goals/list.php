<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables_new/dataTables.bootstrap4.css">
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?=trans('goals_list')?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?=trans('goals_list');?></a></li>
                </ol>
            </div>
        </div>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?=base_url();?>admin/goals/add_edit" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i><?=trans('add_goals');?></a>
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
                    <h5 class="card-title mb-0"><?=trans('goals_list')?></h5>
                </div>
                <div class="card-body">
                    <?php $this->load->view('admin/includes/_messages.php')?>
                    <?php echo form_open(base_url('admin/goals/trash'), 'id="frmvalidate"'); ?>
                    <div class="card-subtitle">
                    <?php if ($this->uri->segment(3) == 'trash') {?>
                    <button name="multiple_delete_all" id="multiple_delete_all" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Trash" class="btn btn-danger-rgba" ><i class="feather icon-trash" ></i></button>
                    <button name="multiple_restore" id="multiple_restore" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Restore" class="btn btn-success-rgba" ><i class="feather icon-refresh-ccw"></i></button>
                    <a href="<?=base_url('admin/goals');?>"><?=trans('goals_list');?></a>
                    <?php } else {?>

                    <button name="multiple_delete" id="multiple_delete" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Trash" class="btn btn-danger-rgba" ><i class="feather icon-trash" ></i></button>
                    <a href="<?=base_url('admin/goals/trash');?>"><button class="btn btn-danger-rgba"> <i class="feather icon-trash-2"></i>Trash</button></a>
                    <?php }?>
                </div>
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false" style="width:18px"><input type="checkbox" name="mult_change" id="mult_change" value="delete" /></th>
                                <th width="50"><?=trans('id')?></th>
                                <th><?=trans('thumbnail_image')?></th>
                                <th><?=trans('detail_image')?></th>
                                <th><?=trans('name')?></th>
                                <th width="120"><?=trans('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($info as $row): ?>
                            <tr>
                                <td style="width:18px"><input type="checkbox" class="checkbox_del" name="checkbox_del[]" id="checkbox_del[]" value="<?php echo $row['goalsID']; ?>"/></td>
                                <td>
                                    <?=$row['goalsID']?>
                                </td>
                                <td>
                                    <h4 class="m0 mb5"><img src="<?php echo base_url('uploads/goals/' . $row['goalsThumbImage']); ?>" width="100" height="100" class="img-responsive"/></h4>
                                </td>
                                <td>
                                    <h4 class="m0 mb5"><img src="<?php echo base_url('uploads/goals/' . $row['goalsdetailImage']); ?>" width="100" height="100" class="img-responsive"/></h4>
                                </td>
                                <td>
                                    <?=$row['goalsName']?>
                                </td>
                                <td>
                                    <a href="<?=base_url("admin/goals/view/" . $row['goalsID']);?>"><i class="feather icon-eye"></i></a>
                                    <a href="<?=base_url("admin/goals/add_edit/" . $row['goalsID']);?>" class="btn btn-success-rgba" >
                                    <i class="feather icon-edit-2"></i>
                                    </a>
                                    <a href="<?=base_url("admin/goals/delete/" . $row['goalsID']);?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
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

<SCRIPT language="javascript">

    $("#mult_change").click(function () {
          $('.checkbox_del').attr('checked', this.checked);
    });

    $(".checkbox_del").click(function(){

        if($(".checkbox_del").length == $(".checkbox_del:checked").length) {
            $("#mult_change").attr("checked", "checked");
        } else {
            $("#mult_change").removeAttr("checked");
        }

    });
</SCRIPT>


