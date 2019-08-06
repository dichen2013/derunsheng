<?php
$page_title = '员工工资信息';
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
                    <span>员工工资信息</span>
                </strong>
                <a href="employee.php" class="btn btn-info pull-right">返回</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th class="text-center" style="width: 100px;">员工名</th>
                        <th class="text-center">工资</th>
                        <th class="text-center">工资结算详情备注</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_employees as $a_emp): ?>
                        <tr>
                            <td class="text-center"><?php echo count_id();?></td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_emp['name']))?></td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_emp['pay']))?></td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_emp['detail']))?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
