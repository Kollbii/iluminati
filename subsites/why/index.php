<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Ilmn</title>
</head>
<body>
    <div class="baner">
        <div class="menu-btn">
            <a href="../../"><span>₥₳ł₦</span></a>
        </div>
    </div>

    <div class="main-content">
        <div class="box">
            <p>Ɇ₦₮ɆⱤ Ø₦ ɎØɄⱤ Ø₩₦ Ɽł₴₭</p>
            <a href="#"><span>₲Ø ł₦</span></a>
        </div>
    </div>
    <div class="footer">
        <div class="ft-section">
            <p>₥₳ĐɆ ฿Ɏ <i>₭ØⱠⱠ฿ł</i> &copy; 2̴0̴2̴1̴</p>
        </div>
    </div>
</body>
</html>
<?php


function getCon() {
    $con = mysqli_connect('localhost','root','','kollbek');
    if($con->connect_errno!=0){return null;};
    $con->query("SET NAMES utf8");
    return $con;
}
function getSelectQuery($query){
    $con = getCon(); 
    $sql = $query; 
    $result = $con->query($sql);
    $result = $result->fetch_all();
    $con->close();
    return $result;
}
?>