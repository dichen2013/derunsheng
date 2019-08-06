<?php
$page_title = '单笔销售报表';
require_once('includes/load.php');
require_once('money.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
$results = find_sale_report((int)$_GET['id']);
$results1 = find_sale_report1((int)$_GET['id']);
$results_f = $db->fetch_assoc($results);
$results1_f=$db->fetch_assoc($results1);
if(!$results){
    $session->msg("d","缺少货物id.");
    redirect('one_sale_report.php');
}

?>

<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>德润生食品</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
   <style>
   @media print {
     html,body{
        font-size: 9.5pt;
        margin: 0;
        padding: 0;
     }.page-break {
       page-break-before:always;
       width: auto;
       margin: auto;
      }
    }
    .page-break{
      width: 980px;
      margin: 0 auto;
    }
     .sale-head{
       margin: 40px 0;
       text-align: center;
     }.sale-head h1,.sale-head strong{
       padding: 10px 20px;
       display: block;
     }.sale-head h1{
       margin: 0;
       border-bottom: 1px solid #212121;
     }.table>thead:first-child>tr:first-child>th{
       border-top: 1px solid #000;
      }
      table thead tr th {
       text-align: center;
       border: 1px solid #ededed;
     }table tbody tr td{
       vertical-align: middle;
     }.sale-head,table.table thead tr th,table tbody tr td,table tfoot tr td{
       border: 1px solid #212121;
       white-space: nowrap;
     }.sale-head h1,table thead tr th,table tfoot tr td{
       background-color: #f8f8f8;
     }tfoot{
       color:#000;
       text-transform: uppercase;
       font-weight: 500;
     }
   </style>
</head>
<body>
  <?php if($results): ?>
    <div class="page-break">
       <div>
           <h2 class="text-center" style="margin-top: 10%;margin-bottom: 4%;">德阳市德润生食品有限公司</h2>
       </div>
        <div class="row">
            <div class="col-xs-5" style="margin-left: 2%;">地址： <?php echo remove_junk($results_f['address'])?></div>
            <div class="col-xs-3">电话：<?php echo remove_junk($results_f['phone'])?></div>
            <div class="col-xs-3">微信：<?php echo remove_junk($results_f['wx'])?></div>
        </div>
      <table class="table table-border">
        <thead>
          <tr>
              <th>日期</th>
              <th>种类</th>
              <th>品名</th>
              <th>单价</th>
              <th>数量</th>
              <th>金额</th>
          </tr>
        </thead>
        <tbody>
           <tr>
              <td class=""><?php echo remove_junk($results_f['date']);?></td>
               <td class="desc">
                   <?php echo remove_junk(ucfirst($results1_f['name']));?>
               </td>
              <td class="desc">
                <?php echo remove_junk(ucfirst($results_f['name']));?>
              </td>
              <td class="text-right"><?php echo remove_junk($results_f['sale_price']);?></td>
              <td class="text-right"><?php echo remove_junk($results_f['total_sales']);?> </td>
              <td class="text-right"><?php echo remove_junk($results_f['total_saleing_price']);?> </td>
          </tr>
        </tbody>
        <tfoot>
         <tr class="text-right">
           <td colspan="4"></td>
           <td colspan="1">金额合计</td>
           <td>
               <?php echo num_to_rmb(number_format(total_price($results)[0], 2));?>
          </td>
         </tr>
        </tfoot>
      </table>
        <div class="col-xs-3 col-xs-offset-9">收货方：                 <?php echo remove_junk($results_f['name1']);?></div>
    </div>
  <?php
    else:
        $session->msg("d", "没有销售记录。 ");
        redirect('one_sale_report.php', false);
     endif;
  ?>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
