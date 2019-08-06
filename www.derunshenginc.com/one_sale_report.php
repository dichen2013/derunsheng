<?php
$page_title = '单笔销售报表';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
$sales = find_all_sale();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-6">
        <?php echo display_msg($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>所有销售</span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th> 商品名称 </th>
                        <th class="text-center" style="width: 15%;"> 客户</th>
                        <th class="text-center" style="width: 15%;"> 数量</th>
                        <th class="text-center" style="width: 15%;"> 总价 </th>
                        <th class="text-center" style="width: 15%;"> 时间 </th>
                        <th class="text-center" style="width: 100px;"> 生成报表 </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sales as $sale):?>
                        <tr>
                            <td class="text-center"><?php echo count_id();?></td>
                            <td><?php echo remove_junk($sale['name']); ?></td>
                            <td><?php echo remove_junk($sale['cname']); ?></td>
                            <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
                            <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
                            <td class="text-center"><?php echo $sale['date']; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="one_sale_report_process.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-success btn-xs"  title="生成报表" data-toggle="tooltip">
                                        <span class="glyphicon glyphicon-stats"></span>
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
