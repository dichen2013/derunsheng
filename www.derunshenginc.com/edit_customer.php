<?php
$page_title = '编辑客户 ';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$e_customer = find_by_id('customer',(int)$_GET['id']);
if(!$e_customer){
    $session->msg("d","缺少客户id");
    redirect('customer.php');
}
?>

<?php
//Update User basic info
if(isset($_POST['update'])) {
    $req_fields = array('name','sex','phone','wx');
    validate_fields($req_fields);
    if(empty($errors)){
        $id = (int)$e_customer['id'];
        $name = remove_junk($db->escape($_POST['name']));
        $sex = (int)$db->escape($_POST['sex']);
        $phone = (int)$db->escape($_POST['phone']);
        $wx   = remove_junk($db->escape($_POST['wx']));
        $address   = remove_junk($db->escape($_POST['address']));
        $sql = "UPDATE customer SET name ='{$name}', sex ='{$sex}',phone='{$phone}',wx='{$wx}',address='{$address}' WHERE id='{$db->escape($id)}'";
        $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
            $session->msg('s',"客户更新成功 ");
            redirect('customer.php?', false);
        } else {
            $session->msg('d',' 客户更新失败');
            redirect('edit_customer.php?id='.(int)$e_customer['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_customer.php?id='.(int)$e_user['id'],false);
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
                    更新 <?php echo remove_junk(ucwords($e_customer['name'])); ?> 客户
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="edit_customer.php?id=<?php echo (int)$e_customer['id'];?>" class="clearfix">
                    <div class="form-group">
                        <label for="name" class="control-label">姓名</label>
                        <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($e_customer['name'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="level">性别</label>
                        <select class="form-control" name="sex">
                                <option value="0" <?php if($e_customer['sex'] ==='0') echo "selected"; ?> >男</option>
                            <option value="1" <?php if($e_customer['sex'] ==='1') echo "selected"; ?> >女</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">电话</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo remove_junk(ucwords($e_customer['phone'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">微信</label>
                        <input type="text" class="form-control" name="wx" value="<?php echo remove_junk($e_customer['wx']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">地址</label>
                        <input type="text" class="form-control" name="address" value="<?php echo remove_junk($e_customer['address']); ?>">
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
