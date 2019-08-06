<?php
  $page_title = '添加员工';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_employee'])){

   $req_fields = array('name','sex','phone','wx','pay','detail');
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['name']));
       $sex   = remove_junk($db->escape($_POST['sex']));
       $phone   = remove_junk($db->escape($_POST['phone']));
       $wx = remove_junk($db->escape($_POST['wx']));
       $pay = remove_junk($db->escape($_POST['pay']));
       $detail = remove_junk($db->escape($_POST['detail']));
        $query = "INSERT INTO employee(";
        $query .="name,sex,phone,wx,pay,detail";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$sex}', '{$phone}', '{$wx}','{$pay}','{$detail}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"员工资料已经成功添加");
          redirect('employee.php', false);
        } else {
          //failed
          $session->msg('d',' 创建员工信息失败');
          redirect('add_employee.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_employee.php',false);
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
          <span>添加一个新员工</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_employee.php">
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
                  <label for="qty">工资</label>
                  <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-yen"></i>
                      </span>
                      <input type="number" class="form-control" name="pay" value="0">
                      <span class="input-group-addon">.00</span>
                  </div>
                  </div>
              <div class="form-group">
                  <label for="detail">工资备注</label>
                  <input type="text" class="form-control" name="detail" placeholder="请备注工资结算方式，结算日期等信息">
              </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_employee" class="btn btn-primary">添加员工</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
