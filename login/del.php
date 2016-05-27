<style type="text/css">
    a{
        text-decoration: none;
        color: black;
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
        margin-left: 10px;
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
    $srl="select * from member where id='".$id."'";
    $query=mysql_query($srl);
    $row=mysql_fetch_array($query);
    if(isset($_POST['del'])) {
        $sql = "delete from member where id='" . $id . "'";
        mysql_query($sql);
        exit();
    }
?>
<form name="adduser" action="setthanhvien.php?id=<?php echo $row['id']; ?>" method="post">
    <div align="center">
    <?php echo '<h2 align="center"> Bạn muốn xóa '.$row['username'].'</h2>'; ?>
    <br> 
        <input style="background-color: #1ca8c3;background-color: #1ca8c3;color: gold;font-size: 15px;width: 65px;cursor:pointer;border: 1px solid #dddddd;border-radius: 5px;padding: 10px;margin-bottom: 10px;" type="submit" name="del" value="Yes">
        <a class="button" href="home.php">Trở lại</a>
        </div>
</form>
