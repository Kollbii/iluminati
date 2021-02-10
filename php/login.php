<?php
    if(isset($_POST['submit'])){
        if($_POST['password'] == getUserPasswd($_POST['user'])){
            header("Location: ../subsites/admin/index.html");
        }
    }

    function getCon() {
        $con = mysqli_connect('localhost','root','','kollbek');
        if($con->connect_errno!=0){return null;};
        $con->query("SET NAMES utf8");
        return $con;
    }

    function getUserPasswd($user){
        $id = getSelectQuery("SELECT labowicze.id FROM `labowicze` WHERE labowicze.nick = '$user';");
        if($id == NULL){
            header("Location: ../");
        }
        $passwd = getSelectQuery("SELECT passwords.password FROM passwords WHERE passwords.idLabowicza = {$id[0]};");
        return $passwd[0];
    }

    function getSelectQuery($query){
        $con = getCon(); 
        $sql = $query; 
        $result = $con->query($sql);
        $result = $result->fetch_all();
        $con->close();
        return $result[0];
    }
?>