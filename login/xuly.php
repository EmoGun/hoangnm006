<style type="text/css">
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{

    }
    div{

        border: 1px solid #dddddd;
        width: 1000px;
        margin: auto;
        border-radius: 20px;
        background-color: ghostwhite;
        margin-top: 100px;
        box-sizing: border-box;
        height: 200px;
    }
    h2{
        margin-top: 0;padding: 20px;background-color: #1ca8c3;border-top-left-radius: 20px;border-top-right-radius: 20px;color: gold;
    }
    .button{
        border: 1px solid #dddddd;
        background-color: #1ca8c3;
        color: gold;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>
<?php

// Nếu không phải là sự kiện đăng ký thì không xử lý
if (!isset($_POST['txtUsername'])){
    die('');
}

include('connection.php');

header('Content-Type: text/html; charset=UTF-8');

$username   = addslashes($_POST['txtUsername']);
$password   = addslashes($_POST['txtPassword']);
$email      = addslashes($_POST['txtEmail']);
$fullname   = addslashes($_POST['txtFullname']);
$phone      = addslashes($_POST['txtphone']);
$chuc       = 3;
$image      = addslashes($_POST['txtImage']);
$url        = "data/".$image;
$who        = addslashes($_POST['txtwho']);
date_default_timezone_set ("Asia/Saigon");
$date = date("H:i:s d/m/Y");
if (!$username || !$password || !$email || !$fullname || !$phone)
{
    echo "<div align='center'><h2>Vui lòng nhập đầy đủ thông tin.</h2><br><br> <a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
    exit;
}
$password = md5($password);

if (mysql_num_rows(mysql_query("SELECT username FROM member WHERE username='$username'")) > 0){
    echo "<div align='center'><h2>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.</h2><br><br> <a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
    exit;
}
if (mysql_num_rows(mysql_query("SELECT fullname FROM member WHERE fullname='$fullname'")) > 0){
    echo "<div align='center'><h2>Tên đầy đủ này đã có người dùng. Vui lòng chọn tên khác.</h2><br><br> <a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
    exit;
}
if (mysql_num_rows(mysql_query("SELECT phone FROM member WHERE phone='$phone'")) > 0){
    echo "<div align='center'><h2>Số điện thoại này đã có người dùng. Vui lòng chọn số khác.</h2><br><br> <a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
    exit;
}
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
{
    echo "<div align='center'><h2>Email này không hợp lệ. Vui long nhập email khác. </h2><br><br><a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
    exit;
}
if (mysql_num_rows(mysql_query("SELECT email FROM member WHERE email='$email'")) > 0)
{
    echo "<div align='center'><h2>Email này đã có người dùng. Vui lòng chọn Email khác.</h2><br><br> <a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
    exit;
}
$query = mysql_query("SELECT username FROM member WHERE username='$who'");
$query1 = mysql_query("SELECT username, email FROM member WHERE email='$who'");
if (mysql_num_rows($query) == 0&&mysql_num_rows($query1) == 0){
    echo "<div align='center'><h2>Không có người giới thiệu trong hệ thống. Vui lòng chọn lại</h2><br><br> <a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
    exit;
}
$row1 = mysql_fetch_array($query1);
if(mysql_num_rows($query1) != 0){
    $who = $row1['username'];
}
@$addmember = mysql_query("
        INSERT INTO member (
            fullname,
            username,
            password,
            email,
            phone,
            image,
            datetg,
            who,
            chuc
        )
        VALUE (
            '{$fullname}',
            '{$username}',
            '{$password}',
            '{$email}',
            '{$phone}',
            '{$url}',
            '{$date}',
            '{$who}',
            '{$chuc}'
        )
    ");

if ($addmember){
    echo '<div align="center"><h2>Quá trình đăng ký thành công.</h2><br><br> <a class=\'button\' href="login.php">Đăng nhập ngay</a></div>';
}
else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='registion.php'>Thử lại</a>";
?>