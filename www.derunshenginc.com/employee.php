<?php
$page_title = '所有员工';
require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
page_require_level(1);
//pull out all user form database
$all_employees = find_all_employee();
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
                    <span>员工</span>
                </strong>
                <a href="add_employee.php" class="btn btn-info pull-right">添加一个员工</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th class="text-center" style="width: 100px;">员工名</th>
                        <th class="text-center" style="width: 50px;">性别</th>
                        <th class="text-center">手机</th>
                        <th class="text-center">微信</th>
                        <th class="text-center" style="width: 100px;">查看与编辑</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_employees as $a_emp): ?>
                        <tr>
                            <td class="text-center"><?php echo count_id();?></td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_emp['name']))?></td>
                            <td class="text-center">
                                <?php if($a_emp['sex'] === '0'): ?>
                                    <span><?php echo "男"; ?></span>
                                <?php else: ?>
                                    <span ><?php echo "女"; ?></span>
                                <?php endif;?>
                            </td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_emp['phone']))?></td>
                            <td class="text-center"><?php echo remove_junk($a_emp['wx'])?></td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="employee_pay.php?id=<?php echo (int)$a_emp['id'];?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="员工工资">
                                        <i class="glyphicon glyphicon-yen"></i>
                                    </a>
                                    <a href="edit_employee.php?id=<?php echo (int)$a_emp['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="编辑">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href="delete_employee.php?id=<?php echo (int)$a_emp['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="删除">
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
