<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('users',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","用户已经删除。");
      redirect('users.php');
  } else {
      $session->msg("d","缺少权限，用户删除失败。");
      redirect('users.php');
  }
?>
