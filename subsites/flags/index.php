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
          
        </div>
        <div class="submit">
            <form method="POST" action="?">
                <div class="form-section">
                    <span>Your Alias: </span>
                    <input name="alias" id="alias" placeholder="Alias">
                </div>
                <div class="form-section">
                    <span>Flag: </span>
                    <input name="flag" id="flag" placeholder="cllFlag{VALUE}">
                </div>
                <div class="form-section">
                    <input type="submit" name="submit" id="submit" value="₴Ʉ฿₥ł₮">
                </div>
            </form>
        </div>
        <?php
            if(isset($_POST['submit'])){
                $alias = $_POST['alias'];
                $flag = $_POST['flag'];
                if (trim($alias) == ''){
                    echo "Ɇ₦₮ɆⱤ ɎØɄⱤ ₳Ⱡł₳₴ <br>";
                }
                insertInDB($alias, $flag);
            }
        ?>
        <div class="leaderboard">
            <p>ⱠɆ₳ĐɆⱤ฿Ø₳ⱤĐ</p>
            <?php
                echo getLeaderboard();
            ?>
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

function getLeaderboard(){
    $con = getCon(); 
    $sql = "SELECT submitedflags.alias, COUNT(*) as flag_count FROM submitedflags GROUP BY submitedflags.alias;";
    $result = $con->query($sql);
    echo "<ol>";
    while($row = $result->fetch_array()){
        echo "<li><span style='color: green; font-size: 20px; font-weight: bold;' >{$row[0]}</span> ₵ØⱠⱠɆ₵₮ɆĐ <span style='color: red; font-size: 20px; font-weight: bold;'>{$row[1]}</span> ₣Ⱡ₳₲₴</li>";
    }
    echo "</ol>";

}
function insertInDB($alias, $flag){
    //Check if user got correct flag
    $valid = checkFlag($flag);
    if($valid == false){
        // header("Location: ../subsites/flags/");
        echo "₮Ⱨł₴ ł₴ ₦Ø₮ V₳ⱠłĐ ₣Ⱡ₳₲. <br> ₣Ⱡ₳₲ ₣ØⱤ₥₳₮ -> cllFlag{VALUE}";
    }else{
        //Check if user already submited this flag
        $submited = checkIfSubmited($alias, $flag);
        if($submited == true){
            // header("Location: ../subsites/flags/");
            echo "ɎØɄ ₳ⱠⱤɆ₳ĐɎ ₴Ʉ฿₥ł₮ɆĐ ₮Ⱨł₴ ₣Ⱡ₳₲!";
        }else{
            // If not - insert it
            insertFlag($alias, $flag);
            // header("Location: ../subsites/flags/");
            echo "₳ĐĐɆĐ ₣Ⱡ₳₲ $flag ₳₴ $alias";
        }
    }
    echo "";
}
function insertFlag($alias, $flag){
    $con = getCon();
    $sql = "INSERT INTO `submitedflags` (`id`, `alias`, `flag`) VALUES (NULL, '$alias', '$flag');";
    $con->query($sql);
    $con->close();
}
function checkIfSubmited($alias, $flag){
    $submited = getSelectQuery("SELECT submitedflags.id FROM `submitedflags` WHERE submitedflags.alias = '$alias' AND submitedflags.flag = '$flag';");
    if($submited == NULL){
        return false;
    }else{
        return true;
    }
}
function checkFlag($flag){
    $flag_id = getSelectQuery("SELECT flags.id FROM `flags` WHERE flags.flag='$flag';");
    if($flag_id != NULL){
        return $flag_id;
    }else{
        return false;
    }
}
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