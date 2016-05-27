<style type="text/css">
    input:focus{
        outline: none;
    }
    a{
        text-decoration: none;
        color: black;
    }
    input{
        height: 30px;
        font-size: 17px;
    }
</style>
<?php session_start(); ?>
<?php
    header('Content-Type: text/html; charset=UTF-8');
    include('connection.php');
    $dn= $_SESSION['username'];
    $sl = mysql_query("select * from member where username='$dn'");
    $roww = mysql_fetch_array($sl);
    $id =  $roww['id'];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql="select * from member where id='".$id."'";
    $query=mysql_query($sql);
    $row=mysql_fetch_array($query);
?>
<?php
if(isset($_POST['upload']))
{
    $u=$p=$e=$ph=$f=$ur=$s=$d=$m=$ch="";
    $day=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];

    if(checkdate($month,$day,$year))
    {
        $d=$year."/".$month."/".$day;
    }
    if($roww['chuc']==1) {
        $ch = $_POST['txtChucvu'];
    }
    if($_POST['txtUsername'] == NULL){
        echo "<div align='center' style='color: red'>Xin vui lòng nhập Username<br /></div>";
    }else{
        $u=addslashes($_POST['txtUsername']);
    }
    if($_POST['txtPassword'] == NULL){
        echo "<div align='center' style='color: red'>Xin vui lòng nhập Password<br /></div>";
    }else{
        $p=addslashes($_POST['txtPassword']);
        $p= md5($p);
    }
    if($_POST['txtEmail'] == NULL){
        echo "<div align='center' style='color: red'>Xin vui lòng nhập E-Mail<br /></div>";
    }else{
        $e=addslashes($_POST['txtEmail']);
    }
    if($_POST['txtFullname'] == NULL){
        echo "<div align='center' style='color: red'>Xin vui lòng nhập Fullname<br /></div>";
    }else{
        $f=addslashes($_POST['txtFullname']);
    }
    if($_POST['txtPhone'] == NULL){
        echo "<div align='center' style='color: red'>Xin vui lòng nhập Phone<br /></div>";
    }else{
        $ph=addslashes($_POST['txtPhone']);
    }
    if($_POST['txtImage']==NULL) {
        echo "<div align='center' style='color: red'>Xin vui lòng chọn ảnh đại diện<br /></div>";
    }else {
        $image = addslashes($_POST['txtImage']);
        $ur= "data/".$image;
    }

    if($_POST['txtMota']==NULL) {
        echo "<div align='center' style='color: red'>Xin vui lòng thêm mô tả<br /></div>";
    }else {
        $m = addslashes($_POST['txtMota']);
    }
    if($id==$roww['id']&&$u!=""){
        $_SESSION['username']=$u;
    }
    if (mysql_num_rows(mysql_query("SELECT username FROM member WHERE username='$u'")) > 0){
        echo "<div align='center'>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.<br><br> <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
    if (mysql_num_rows(mysql_query("SELECT fullname FROM member WHERE fullname='$f'")) > 0){
        echo "<div align='center'>Tên đầy đủ này đã có người dùng. Vui lòng chọn tên khác.<br><br> <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
    if (mysql_num_rows(mysql_query("SELECT phone FROM member WHERE phone='$p'")) > 0){
        echo "<div align='center'>Số điện thoại này đã có người dùng. Vui lòng chọn số khác.<br><br> <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $e))
    {
        echo "<div align='center'>Email này không hợp lệ. Vui long nhập email khác. <br><br><a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
    $s = $_POST['txtsex'];
    if (mysql_num_rows(mysql_query("SELECT email FROM member WHERE email='$e'")) > 0)
    {
        echo "<div align='center'>Email này đã có người dùng. Vui lòng chọn Email khác.<br><br> <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
    if($f & $u & $p & $e & $ph & $ur & $d & $m & $ch & $s){
        $sql="update member set fullname = '".$f."',username='".$u."', password='".$p."', email='".$e."',phone='".$ph."',image='".$ur."',dateborn = '".$d."',mota = '".$m."', sex = '".$s."',chuc = '".$ch."'where id='".$id."'";
        mysql_query($sql);
        $url = "home.php";
        header("location: $url");
        exit();
    }
}
?>
<div style="border: 1px solid #dddddd; width: 800px; margin: auto; margin-top: 100px; margin-bottom: 100px; border-radius: 20px;background-color: ghostwhite">
<h1 align="center" style="background-color: #1ca8c3; padding: 20px; margin-top: 0;border-top-left-radius: 20px;border-top-right-radius: 20px;color: gold">Chỉnh sửa thông tin thành viên <?php echo $row['username']; ?></h1>
<form name="adduser" action="setthanhvien.php?id=<?php echo $row['id']; ?>" method="post">
    <table cellpadding="0" cellspacing="10" border="0" align="center">
        <?php
            if($row['image']=='data/'){
            $row['image']= "data/error.jpg";
            }
        ?>
        <div align="center"><img src="<?php echo $row['image'];?>" width="100"/></div>
        <tr>
            <td>
                Họ và tên :
            </td>
            <td>
                <input type="text" name="txtFullname" size="50" placeholder="<?php echo $row['fullname']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Tên đăng nhập :
            </td>
            <td>
                <input type="text" name="txtUsername" size="50" placeholder="<?php echo $row['username']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Mật khẩu :
            </td>
            <td>
                <input type="password" name="txtPassword" size="50" placeholder="<?php echo $row['password']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Email :
            </td>
            <td>
                <input type="text" name="txtEmail" size="50" placeholder="<?php echo $row['email']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Phone :
            </td>
            <td>
                <input type="text" name="txtPhone" size="50" placeholder="<?php echo $row['phone']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Chọn ảnh đại diện :
            </td>
            <td>
                <input type="file" name="txtImage" size="50" />
            </td>
        </tr>
        <?php
            if($roww['chuc']==1){
                ?>
        <tr>
            <td>
                Chức vụ :
            </td>
            <td>
                <select name="txtChucvu">
                    <option value="1" selected="selected">Administion</option>
                    <option value="2" selected="selected">Admod</option>
                    <option value="3" selected="selected">User</option>
                </select>
            </td>
        </tr>
                <?php } ?>
        <tr>
            <td>
                Ngày sinh :
            </td>
            <td>
                <select name="day">
                    <option value="0" selected="selected">Chọn ngày</option>
                    <?php
                    for($i=1;$i<=31;$i++)
                    {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <select name="month">
                    <option value="0" selected="selected">Chọn tháng</option>
                    <?php
                    for($i=1;$i<=12;$i++)
                    {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <select name="year">
                    <option value="0" selected="selected">Chọn năm</option>
                    <?php
                    for($i=1970;$i<=2003;$i++)
                    {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
                <tr>
                    <td>
                        Giới tính :
                    </td>
                    <td>
                        <input type="radio" name="txtsex" value="1" />
                        Nam
                        <input type="radio" name="txtsex" value="2" />
                        Nữ
                    </td>
                </tr>
                <tr>
                    <td>
                        Mô tả :
                    </td>
                    <td>
                        <textarea name="txtMota" rows="10" cols="50" placeholder="<?php echo $row['mota']; ?>"></textarea>
                    </td>
                </tr>
        <tr>
            <td><input style="margin-top: 30px;cursor: pointer;height: 42px;color: white;background-color: #1ca8c3; border: 1px solid #dddddd;border-radius: 5px;padding: 10px;width: 100px;margin-left: 100px"type="submit" name="upload" value="Update" /></td>
            <td><button style="margin-top: 25px;font-size:17px;cursor: pointer;height: 42px;color: white;background-color: #1ca8c3; border: 1px solid #dddddd;border-radius: 5px;padding: 10px;width: 100px;margin-left: 100px"><a style="color: white" href="home.php">Trở lại</a></button></td>
        </tr>
    </table>

</form>
</div>
