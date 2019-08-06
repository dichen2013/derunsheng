<?php
  $page_title = '主页';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h1>欢迎登录</h1>
         <p>德润生食品为您提供最专业的食品服务</p>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
