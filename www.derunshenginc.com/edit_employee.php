<?php
$page_title = '编辑员工 ';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_employee = find_by_id('employee',(int)$_GET['id']);
if(!$e_employee){
    $session->msg("d","缺少员工信息");
    redirect('employee.php');
}
?>

<?php
//Update User basic info
if(isset($_POST['update'])) {
    $req_fields = array('name','sex','phone','wx','pay','detail');
    validate_fields($req_fields);
    if(empty($errors)){
        $id = (int)$e_employee['id'];
        $name = remove_junk($db->escape($_POST['name']));
        $sex = (int)$db->escape($_POST['sex']);
        $phone = (int)$db->escape($_POST['phone']);
        $wx   = remove_junk($db->escape($_POST['wx']));
        $pay   = (int)$db->escape($_POST['pay']);
        $detail   = remove_junk($db->escape($_POST['detail']));
        $sql = "UPDATE employee SET name ='{$name}', sex ='{$sex}',phone='{$phone}',wx='{$wx}',pay='{$pay}',detail='{$detail}' WHERE id='{$db->escape($id)}'";
        $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
            $session->msg('s',"员工更新成功 ");
            redirect('employee.php', false);
        } else {
            $session->msg('d',' 员工更新失败');
            redirect('edit_employee.php?id='.(int)$e_employee['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_employee.php?id='.(int)$e_employee['id'],false);
    }
}
?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    更新 <?php echo remove_junk(ucwords($e_employee['name'])); ?> 员工
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="edit_employee.php?id=<?php echo (int)$e_employee['id'];?>" class="clearfix">
                    <div class="form-group">
                        <label for="name" class="control-label">姓名</label>
                        <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($e_employee['name'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="level">性别</label>
                        <select class="form-control" name="sex">
                                <option value="0" <?php if($e_employee['sex'] ==='0') echo "selected"; ?> >男</option>
                            <option value="1" <?php if($e_employee['sex'] ==='1') echo "selected"; ?> >女</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">电话</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo remove_junk(ucwords($e_employee['phone'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">微信</label>
                        <input type="text" class="form-control" name="wx" value="<?php echo remove_junk($e_employee['wx']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="qty">工资</label>
                        <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-yen"></i>
                      </span>
                            <input type="number" class="form-control" name="pay" value="<?php echo remove_junk($e_employee['pay']); ?>">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="detail" class="control-label">备注</label>
                        <input type="text" class="form-control" name="detail" value="<?php echo remove_junk($e_employee['detail']); ?>">
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="update" class="btn btn-info">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
