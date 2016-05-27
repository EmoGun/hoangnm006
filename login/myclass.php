<style type="text/css">
    a{
        text-decoration: none;
        color: gold;
    }
    a:hover{
    }
    li{
        list-style-type: none;
        margin-top: 20px;
        margin-left: 150px;
    }
    #danh-sach{
        clear: both;
        border: 1px solid #dddddd;
        width: 1200px;
        margin: auto;
        margin-bottom: 100px;
        background-color: ghostwhite;
        box-sizing: border-box;
        border-radius: 20px;
    }
    ul{
        clear: both;
    }
    #bg{
        background-color: #1ca8c3;
        display: inline-block;
        width: 1198px;
        height: auto;
        padding: 20px;
        box-sizing: border-box;

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
    #chinh,#xoa{
        float: right;
        padding: 5px 20px 5px 20px;
        border: 1px solid #dddddd;
        margin-left: 10px;
        border-radius: 5px;
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
$sk = mysql_query("select *from member");

if($row['dateborn']==NULL){
    $row['dateborn']="";
}
if($row['sex']==NULL){
    $row['sex']="";
}
if($row['mota']==NULL){
    $row['mota']="";
}
if($row['image']=='data/'){
    $row['image']= "data/error.jpg";
    }
?>
<div style="background-color: #1ca8c3; height: 40px;"><a href="home.php" style="float: right;margin: 5px 100px 100px 0;border: 1px solid #dddddd;border-radius: 5px;padding:5px 20px 5px 20px">Home</a></div>
<div id="danh-sach">
<h1 align="center" style="clear: both;color: gold;background-color: #1ca8c3; margin: 0 0 0 0;border-top-left-radius: 20px;padding-top: 20px;width:1198px;border-top-right-radius: 20px;">Thông tin cá nhân của <?php echo $row['username']?></h1>

    <div id="bg">
        <img src="<?php echo $row['image'];?>" style="border-radius: 10px" width="150"/>
        <?php
        echo '<div id="chinh"><a href="setthanhvien.php?id='.$row['id'].'">Chỉnh sửa</a></div>';
        ?>
        <?php
        echo '<div id="xoa"><a href="del.php?id='.$row['id'].'">Xóa</a></div>';
        ?>
    </div>
    <ul>
        <li>
            <b>Họ và tên : </b><br><span style="margin-left: 200px"><?php echo $row['fullname']; ?></span>
        </li>
        <li>
            <b>Tên đăng nhập : </b><br><span style="margin-left: 200px"><?php echo $row['username']; ?></span>
        </li>
        <li>
            <b>password : </b><br><span style="margin-left: 200px"><?php echo $row['password']; ?></span>
        </li>
        <li>
            <b>Email : </b><br><span style="margin-left: 200px"><?php echo $row['email']; ?></span>
        </li>
        <li>
            <b>Phone : </b><br><span style="margin-left: 200px"><?php echo $row['phone']; ?></span>
        </li>
        <li>
            <b>Ngày sinh : </b><br><span style="margin-left: 200px"><?php echo $row['dateborn']; ?></span>
        </li>
        <li>
            <b>Giới tính : </b><br><span style="margin-left: 200px"><?php if($row['sex']==1){
                    echo 'Nam';
                }
                elseif ($row['sex']==2){
                    echo 'Nữ';
                }?></span>
        </li>
        <li>
            <b>Mô tả : </b><br><span style="margin-left: 200px"><?php echo $row['mota']; ?></span>
        </li>
        <li>
            <b>Chức vụ : </b><br><span style="margin-left: 200px"><?php if ($row['chuc'] == 1)
            {
                echo "Administration";
            }
            elseif($row['chuc']== 2)
            {
                echo "Admod";
            }
            else{
                echo "user";
            }
            ?></span>
        </li>
        <li>
            <b>Ngày đăng ký : </b><br><span style="margin-left: 200px"><?php echo $row['datetg']; ?></span>
        </li>
        <li>
            <b>Người được giới thiệu : </b><br><span style="margin-left: 200px"><?php
                while($sq= mysql_fetch_array($sk)) {
                    if ($row['username'] == $sq['who']) {
                        echo $sq['username'];
                        echo "; ";
                    }
                }
                ?></span>
        </li>
    </ul>
</div>
