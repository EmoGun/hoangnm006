<style type="text/css">
    a{
        text-decoration: none;
        color: gold;
    }
    a:hover{
    }
    input:focus{
        outline: none;
    }
    .danh-sach{
        display:block;
        clear: both;
        width: 1200px;
        margin: auto;
        border: 1px solid #dddddd;
        background-color: ghostwhite;
        border-radius: 20px;
    }
    #danh-sach:last-child{
        border: none;
    }
    #danh-sach{
        margin: auto;
        border-bottom: 1px solid #bdbdbd;
        height: 220px;
    }
    ul{
        border-left: 1px solid #bdbdbd;
        margin-left: 20px;
        float: left;
        display: inline-block;
    }
    li:first-child{
        margin-top: 0;
    }
    li{
        margin-top: 10px;
        list-style-type: none;
    }
    #danh-sach{
        clear: both;
    }
    #chinh:before{
        margin-right: 5px;
        content: "\f013";
        font-family: FontAwesome;
        color: gold;
    }
    #xoa:before{
        margin-right: 5px;
        content: "\f014";
        font-family: FontAwesome;
        color: gold;
    }

    #chinh,#xoa,#canhan{
        float: right;
        border: 1px solid #dddddd;
        border-radius: 5px;
        padding: 5px 10px 5px 10px;
        margin: 20px 20px 0 0px;
        background-color: #1ca8c3;
    }
    #canhan:before{
        margin-right: 5px;
        content: "\f007";
        font-family: FontAwesome;
        color: gold;
    }
</style>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
include('connection.php');
unset($_SESSION['num']);
if(isset($_SESSION['username'])){
    $dn = $_SESSION['username'];
}
if (isset($_SESSION['username']) && $_SESSION['username']){
    echo '<div style="background-color: #1ca8c3; height: 40px;" >';
    echo '<a href="logout.php" style="float: right;margin-bottom: 100px;margin-right: 20px;margin-top: 5px;border-radius:5px;border: 1px solid #dddddd;padding: 5px 10px 5px 10px" >Logout</a>';
    echo '<div style="margin-bottom: 100px; float: right; padding-right: 20px;margin-right: 20px;margin-top: 14px;color: gold" >'.'Xin chào '.'<b><a href="myclass.php">'.$_SESSION['username'].'</a></b>'.'</div>';
    echo '</div>';
}
else{
    echo '<div style="background-color: #1ca8c3; height: 40px;" >';
    echo '<a href="login.php" style="float: right;margin-bottom: 100px;margin-right: 20px;margin-top: 5px;border-radius:5px;border: 1px solid #dddddd;padding: 5px 10px 5px 10px">Đăng nhập</a><a href="registion.php" style="float: right;margin-bottom: 100px;margin-right: 20px;margin-top: 5px;border-radius:5px;border: 1px solid #dddddd;padding: 5px 10px 5px 10px"">Đăng ký</a>';
    echo '</div>';

}
echo '<h1 align="center" style="clear: both">Trang quản lý thành viên</h1>';
$sort = mysql_query("select * from member");
while ($sorts = mysql_fetch_array($sort)) {
    $sapxep[] = $sorts['username'];
}
sort($sapxep);
if(isset($dn)){
$sl = mysql_query("select * from member WHERE username='$dn'");
$row = mysql_fetch_array($sl);
    ?>
    <div align="center"><form name="phantrang" action="home.php" method="post">
            <select name="so">
                <option value="0" selected="selected">Chọn số thành viên trên 1 trang</option>
                <option value="10" >10</option>
                <option value="20" >20</option>
                <option value="50" >50</option>
                <option value="100" >100</option>
            </select>
            <input type="submit" style="margin-top: 30px;cursor: pointer;height: 42px;color: white;background-color: #1ca8c3;margin-left: 10px; border: 1px solid #dddddd;border-radius: 5px;padding: 10px;width: 100px;" name="chon" value="Chọn">
        </form></div>
    <?php

    if(isset($_POST['chon'])) {
        $c = isset ( $_POST["so"] ) ? $_POST["so"] : -1;
    }
    else{
        $c = isset ( $_GET["so"] ) ? intval ( $_GET["so"] ) : -1;
    }
    if($c==-1||$c==0){
        $c=5;
    }
if($row['chuc']==1){
?>
<div class="danh-sach">
    <?php
    $stt=mysql_query("select id from member where hien=0");
    $row_per_page=$c;
    $rows=mysql_num_rows($stt);
    if ($rows>$row_per_page) $page=ceil($rows/$row_per_page);
    else $page=1;
    if(isset($_GET['start']) && (int)$_GET['start'])
        $start=$_GET['start'];
    else $start=0;
    $squery=mysql_query("select * from member order by id asc limit $start,$row_per_page");

    while($list = mysql_fetch_array($squery))
    {
        echo $list['username'];
        if($list['image']=='data/'){
            $list['image']= "data/error.jpg";
        }
        ?>
        <div id="danh-sach">
            <img src="<?php echo $list['image'];?>" style="float: left;margin: 20px 0 0 20px" width="100"/>
            <ul>
                <li>
                    <b>Họ và tên : </b><?php echo $list['fullname']; ?>
                </li>
                <li>
                    <b>Tên đăng nhập : </b><?php echo $list['username']; ?>
                </li>
                <li>
                    <b>password : </b><?php echo $list['password']; ?>
                </li>
                <li>
                    <b>Email : </b><?php echo $list['email']; ?>
                </li>
                <li>
                    <b>Phone : </b><?php echo $list['phone']; ?>
                </li>

                <li>
                    <b>Chức vụ : </b><?php if ($list['chuc'] == 1)
                    {
                        echo "Administration";
                    }
                    elseif($list['chuc']== 2)
                    {
                        echo "Admod";
                    }
                    else{
                        echo "user";
                    }
                    ?>
                </li>
                <li>
                    <b>Ngày đăng ký: </b><?php echo $list['datetg']; ?>
                </li>
            </ul>
            <?php
                echo '<div id="chinh"><a href="setthanhvien.php?id='.$list['id'].'">Chỉnh sửa</a></div>';
            ?>
            <?php
                echo '<div id="xoa"><a href="del.php?id='.$list['id'].'">Xóa</a></div>';
            ?>
            <?php
            echo '<div id="canhan"><a href="myclass.php?id='.$list['id'].'">Xem chi tiết</a></div>';
            ?>
        </div>
    <?php } ?>
</div>
<?php } ?>
<?php
if($row['chuc']==2){
    ?>
    <div class="danh-sach">
        <?php
        $stt=mysql_query("select id from member where hien=0");
        $row_per_page=$c;
        $rows=mysql_num_rows($stt);
        if ($rows>$row_per_page) $page=ceil($rows/$row_per_page);
        else $page=1;
        if(isset($_GET['start']) && (int)$_GET['start'])
            $start=$_GET['start'];
        else $start=0;
        $squery=mysql_query("select * from member order by id asc limit $start,$row_per_page");
        while($list = mysql_fetch_array($squery))
        {
            if($list['image']=='data/'){
                $list['image']= "data/error.jpg";
            }
            if($list['chuc']==1||$list['chuc']==2&&$list['username']!=$dn){
            ?>
            <div id="danh-sach">
                <img src="<?php echo $list['image'];?>" style="float: left;margin: 20px 0 0 20px" width="100"/>
                <ul>
                    <li>
                        <b>Họ và tên : </b><?php echo $list['fullname']; ?>
                    </li>
                    <li>
                        <b>Tên đăng nhập : </b>********
                    </li>
                    <li>
                        <b>password : </b>********
                    </li>
                    <li>
                        <b>Email : </b>********@gmail.com
                    </li>
                    <li>
                        <b>Phone : </b>********
                    </li>

                    <li>
                        <b>Chức vụ : </b><?php if ($list['chuc'] == 1)
                        {
                            echo "Administration";
                        }
                        elseif($list['chuc']== 2)
                        {
                            echo "Admod";
                        }
                        else{
                            echo "user";
                        }
                        ?>
                    </li>
                    <li>
                        <b>Ngày đăng ký: </b><?php echo $list['datetg']; ?>
                    </li>
                </ul>
            </div>
            <?php } ?>
            <?php
                if($list['chuc']==3 || $list['username']==$dn){
            ?>
            <div id="danh-sach">
                <img src="<?php echo $list['image'];?>" style="float: left;margin: 20px 0 0 20px" width="100"/>
                <ul>
                    <li>
                        <b>Họ và tên : </b><?php echo $list['fullname']; ?>
                    </li>
                    <li>
                        <b>Tên đăng nhập : </b><?php echo $list['username']; ?>
                    </li>
                    <li>
                        <b>password : </b><?php echo $list['password']; ?>
                    </li>
                    <li>
                        <b>Email : </b><?php echo $list['email']; ?>
                    </li>
                    <li>
                        <b>Phone : </b><?php echo $list['phone']; ?>
                    </li>

                    <li>
                        <b>Chức vụ : </b><?php if ($list['chuc'] == 1)
                        {
                            echo "Administration";
                        }
                        elseif($list['chuc']== 2)
                        {
                            echo "Admod";
                        }
                        else{
                            echo "user";
                        }
                        ?>
                    </li>
                    <li>
                        <b>Ngày đăng ký: </b><?php echo $list['datetg']; ?>
                    </li>
                </ul>
                <?php
                    echo '<div id="chinh"><a href="setthanhvien.php?id='.$list['id'].'">Chỉnh sửa</a></div>';
                ?>
                <?php
                    echo '<div id="xoa"><a href="del.php?id='.$list['id'].'">Xóa</a></div>';
                ?>
                <?php
                echo '<div id="canhan"><a href="myclass.php?id='.$list['id'].'">Xem chi tiết</a></div>';
                ?>
            </div>
        <?php } ?>
        <?php } ?>
    </div>
<?php } ?>
<?php
    if($row['chuc']==3){
?>
<div class="danh-sach">
    <?php
    $stt=mysql_query("select id from member where hien=0");
    $row_per_page=$c;
    $rows=mysql_num_rows($stt);
    if ($rows>$row_per_page) $page=ceil($rows/$row_per_page);
    else $page=1;
    if(isset($_GET['start']) && (int)$_GET['start'])
        $start=$_GET['start'];
    else $start=0;
    $squery=mysql_query("select * from member order by id asc limit $start,$row_per_page");
    while($list = mysql_fetch_array($squery))
    {
        if($list['image']=='data/'){
            $list['image']= "data/error.jpg";
        }
        if($list['username']!=$dn){
        ?>
        <div id="danh-sach">
            <img src="<?php echo $list['image'];?>" style="float: left;margin: 20px 0 0 20px" width="100"/>
            <ul>
                <li>
                    <b>Họ và tên : </b><?php echo $list['fullname']; ?>
                </li>
                <li>
                    <b>Tên đăng nhập : </b>********
                </li>
                <li>
                    <b>password : </b>********
                </li>
                <li>
                    <b>Email : </b>********@gmail.com
                </li>
                <li>
                    <b>Phone : </b>********
                </li>

                <li>
                    <b>Chức vụ : </b><?php if ($list['chuc'] == 1)
                    {
                        echo "Administration";
                    }
                    elseif($list['chuc']== 2)
                    {
                        echo "Admod";
                    }
                    else{
                        echo "user";
                    }
                    ?>
                </li>
                <li>
                    <b>Ngày đăng ký: </b><?php echo $list['datetg']; ?>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php
            if($list['username']==$dn){
        ?>
        <div id="danh-sach">
            <img src="<?php echo $list['image'];?>" style="float: left;margin: 20px 0 0 20px" width="100"/>
            <ul>
                <li>
                    <b>Họ và tên : </b><?php echo $list['fullname']; ?>
                </li>
                <li>
                    <b>Tên đăng nhập : </b><?php echo $list['username']; ?>
                </li>
                <li>
                    <b>password : </b><?php echo $list['password']; ?>
                </li>
                <li>
                    <b>Email : </b><?php echo $list['email']; ?>
                </li>
                <li>
                    <b>Phone : </b><?php echo $list['phone']; ?>
                </li>
                <li>
                    <b>Chức vụ : </b><?php if ($list['chuc'] == 1)
                    {
                        echo "Administration";
                    }
                    elseif($list['chuc']== 2)
                    {
                        echo "Admod";
                    }
                    else{
                        echo "user";
                    }
                    ?>
                </li>
                <li>
                    <b>Ngày đăng ký: </b><?php echo $list['datetg']; ?>
                </li>
            </ul>
            <?php
                echo '<div id="chinh"><a href="setthanhvien.php?id='.$list['id'].'">Chỉnh sửa</a></div>';
            ?>
            <?php
                echo '<div id="xoa"><a href="del.php?id='.$list['id'].'">Xóa</a></div>';
            ?>
            <?php
            echo '<div id="canhan"><a href="myclass.php?id='.$list['id'].'">Xem chi tiết</a></div>';
            ?>
        </div>
    <?php } ?>
    <?php } ?>

</div>
<?php } ?>
<?php
    if($row['chuc']!=1)
?>
<?php } ?>
<?php
if(empty($dn)){
?>
    <div align="center"><form name="phantrang" action="home.php" method="post">
            <select name="so">
                <option value="0" selected="selected">Chọn số thành viên trên 1 trang</option>
                <option value="10" >10</option>
                <option value="20" >20</option>
                <option value="50" >50</option>
                <option value="100" >100</option>
            </select>
            <input type="submit" style="margin-top: 30px;cursor: pointer;height: 42px;color: white;background-color: #1ca8c3;margin-left: 10px; border: 1px solid #dddddd;border-radius: 5px;padding: 10px;width: 100px;" name="chon" value="Chọn">
        </form></div>
    <?php
    $c=10;
    if(isset($_POST['chon'])) $c= $_POST['so'];
    ?>
    <div class="danh-sach">
    <?php
    $stt=mysql_query("select id from member where hien=0");
    $row_per_page=$c;
    $rows=mysql_num_rows($stt);
    if ($rows>$row_per_page) $page=ceil($rows/$row_per_page);
    else $page=1;
    if(isset($_GET['start']) && (int)$_GET['start'])
        $start=$_GET['start'];
    else $start=0;
    $squery=mysql_query("select * from member order by id asc limit $start,$row_per_page");
    while($list = mysql_fetch_array($squery))
    {
        if($list['image']=='data/'){
            $list['image']= "data/error.jpg";
        }
        ?>
        <div id="danh-sach">
            <img src="<?php echo $list['image'];?>" style="float: left;margin: 20px 0 0 20px" width="100"/>
            <ul>
                <li>
                    <b>Họ và tên : </b><?php echo $list['fullname']; ?>
                </li>
                <li>
                    <b>Tên đăng nhập : </b>********
                </li>
                <li>
                    <b>password : </b>********
                </li>
                <li>
                    <b>Email : </b>********@gmail.com
                </li>
                <li>
                    <b>Phone : </b>********
                </li>

                <li>
                    <b>Chức vụ : </b><?php if ($list['chuc'] == 1)
                    {
                        echo "Administration";
                    }
                    elseif($list['chuc']== 2)
                    {
                        echo "Admod";
                    }
                    else{
                        echo "user";
                    }
                    ?>
                </li>
                <li>
                    <b>Ngày đăng ký: </b><?php echo $list['datetg']; ?>
                </li>
            </ul>
        </div>
    <?php } ?>
</div>
<?php } ?>
<?php
    $page_cr=($start/$row_per_page)+1;
    ?>
    <div align="center" style="margin: 20px 0 100px 0">
    <?php
    for($i=1;$i<=$page;$i++)
    {
        if ($page_cr!=$i) echo "<div style='border: 1px solid #dddddd; width: auto; display: inline-block;padding: 5px;margin-right: 10px'><a href='home.php?so=".$c."&start=".$row_per_page*($i-1)."'>$i</a></div>";
        else echo "<div style='border: 1px solid #dddddd; width: auto; display: inline-block;padding: 5px;margin-right: 10px'><b style='color: red'>".$i."</b></div>";
    }
?>
    </div>
</body>
</html>