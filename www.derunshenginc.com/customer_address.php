<?php
$page_title = '客户地址';
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
                    <span>客户地址</span>
                </strong>
                <a href="customer.php" class="btn btn-info pull-right">返回</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th class="text-center" style="width: 100px;">客户名</th>
                        <th class="text-center">地址</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_customers as $a_cus): ?>
                        <tr>
                            <td class="text-center"><?php echo count_id();?></td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_cus['name']))?></td>
                            <td class="text-center"><?php echo remove_junk(ucwords($a_cus['address']))?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
