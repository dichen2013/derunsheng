<?php
$page_title = '客户';
require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
page_require_level(1);
//pull out all user form database
$all_customers = find_all_customer();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo display_msg($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>客户</span>
                </strong>
                <a href="add_customer.php" class="btn btn-info pull-right">添加一个客户</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th class="text-center" style="width:100px;">客户名</th>
                        <th class="text-center" style="width:50px;">性别</th>
                        <th class="text-center">手机</th>
                        <th class="text-center">微信</th>
                        <th class="text-center" style="width:100px;">编辑</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_customers as $a_cus): ?>
                        <tr>
                            <td class="text-center"><?php echo count_id();?></td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_cus['name']))?></td>
                            <td class="text-center">
                                <?php if($a_cus['sex'] === '0'): ?>
                                    <span><?php echo "男"; ?></span>
                                <?php else: ?>
                                    <span ><?php echo "女"; ?></span>
                                <?php endif;?>
                            </td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_cus['phone']))?></td>
                            <td class="text-center"><?php echo remove_junk($a_cus['wx'])?></td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="customer_address.php?id=<?php echo (int)$a_cus['id'];?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="客户地址">
                                        <i class="glyphicon glyphicon-home"></i>
                                    </a>
                                    <a href="edit_customer.php?id=<?php echo (int)$a_cus['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="编辑">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href="delete_customer.php?id=<?php echo (int)$a_cus['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="删除">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
