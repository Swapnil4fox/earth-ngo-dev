<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables_new/dataTables.bootstrap4.css">
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?=trans('users_list')?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>admin/dashboard"><?=trans('dashboard')?></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?=trans('users_list');?></a></li>
                </ol>
            </div>
        </div>

    </div>
</div>
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0"><?=trans('users_list')?></h5>
                </div>
                <div class="card-body">
                    <?php echo form_open(base_url('admin/users/trash'), 'id="frmvalidate"'); ?>
                    <div class="card-subtitle">
                    <?php if ($this->uri->segment(3) == 'trash') {?>
                    <button name="multiple_delete_all" id="multiple_delete_all" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Trash" class="btn btn-danger-rgba" ><i class="feather icon-trash" ></i></button>
                    <button name="multiple_restore" id="multiple_restore" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Restore" class="btn btn-success-rgba" ><i class="feather icon-refresh-ccw"></i></button>
                    <a href="<?=base_url('admin/users');?>">Users List</a>
                    <?php } else {?>

                    <button name="multiple_delete" id="multiple_delete" title="" data-toggle="tooltip" data-placement="Right" data-original-title="Trash" class="btn btn-danger-rgba" ><i class="feather icon-trash" ></i></button>
                    <a href="<?=base_url('admin/users/trash');?>"><button class="btn btn-danger-rgba"> <i class="feather icon-trash-2"></i>Trash</button></a>
                    <?php }?>
                    </div>
                    <!-- Load Admin list (json request)-->
                    <!-- <div class="data_container"></div> -->
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false" style="width:18px"><input type="checkbox" name="mult_change" id="mult_change" value="delete" /></th>
                                <th width="50"><?=trans('id')?></th>
                                <th><?=trans('username')?></th>
                                <th><?=trans('email')?></th>
                                <th><?=trans('mobile_no')?></th>
                                <th><?=trans('created_date')?></th>
                                <th><?=trans('email_verification')?></th>
                                <th width="100"><?=trans('status')?></th>
                                <th width="120"><?=trans('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($info as $row): ?>
                            <tr>
                                <td style="width:18px"><input type="checkbox" class="checkbox_del" name="checkbox_del[]" id="checkbox_del[]" value="<?php echo $row['id']; ?>"/></td>
                                <td>
                                    <?=$row['id']?>
                                </td>
                                <td>
                                    <h4 class="m0 mb5"><?=trans($row['username']);?></h4>
                                </td>
                                <td>
                                    <?=$row['email']?>
                                </td>
                                <td>
                                    <?=$row['mobile_no']?>
                                </td>
                                <td>
                                    <?=$row['created_at']?>
                                </td>
                                <td>
                                    <span class="btn btn-success"><?php echo ($row['is_verify'] == 1) ? "Verified" : "Pending"; ?></span>
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input class='tgl_checkbox custom-control-input' data-id="<?=$row['id']?>" id='cb_<?=$row['id']?>' type='checkbox' <?php echo ($row['is_active'] == 1) ? "checked" : ""; ?> />
                                        <label class='custom-control-label' for='cb_<?=$row['id']?>'></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?=base_url("admin/users/edit/" . $row['id']);?>" class="btn btn-success-rgba" >
                                    <i class="feather icon-edit-2"></i>
                                    </a>
                                    <a href="<?=base_url("admin/users/delete/" . $row['id']);?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
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

<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    $.post('<?=base_url("admin/users/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      new PNotify( {
                    title: 'Success notice', text: 'Status Changed Successfully', type: 'success'
                });
    });
  });
</script>
