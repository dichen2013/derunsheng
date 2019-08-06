<?php
  $page_title = '添加客户';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_customer'])){

   $req_fields = array('name','sex','phone','wx','address');
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['name']));
       $sex   = remove_junk($db->escape($_POST['sex']));
       $phone   = remove_junk($db->escape($_POST['phone']));
       $wx = remove_junk($db->escape($_POST['wx']));
       $address = remove_junk($db->escape($_POST['address']));
        $query = "INSERT INTO customer(";
        $query .="name,sex,phone,wx,address";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$sex}', '{$phone}', '{$wx}','{$address}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"客户已成功添加");
          redirect('customer.php', false);
        } else {
          //failed
          $session->msg('d',' 客户添加失败');
          redirect('add_customer.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_customer.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>添加一个新客户</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_customer.php">
            <div class="form-group">
                <label for="name">姓名</label>
                <input type="text" class="form-control" name="name" placeholder="姓名">
            </div>
              <div class="form-group">
                  <label for="level">性别</label>
                  <select class="form-control" name="sex">
                          <option value="0">男</option>
                          <option value="1">女</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="sex">电话</label>
                  <input type="text" class="form-control" name="phone" placeholder="电话">
              </div>
              <div class="form-group">
                  <label for="wx">微信</label>
                  <input type="text" class="form-control" name="wx" placeholder="微信">
              </div>
              <div class="form-group">
                  <label for="address">地址</label>
                  <input type="text" class="form-control" name="address" placeholder="地址">
              </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_customer" class="btn btn-primary">添加客户</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
