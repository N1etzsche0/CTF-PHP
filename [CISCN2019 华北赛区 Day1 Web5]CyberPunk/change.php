<?php
//
//require_once "config.php";
//
//if(!empty($_POST["user_name"]) && !empty($_POST["address"]) && !empty($_POST["phone"]))
//{
//    $msg = '';
//    $pattern = '/select|insert|update|delete|and|or|join|like|regexp|where|union|into|load_file|outfile/i';
//    $user_name = $_POST["user_name"];
//    $address = addslashes($_POST["address"]);
//    $phone = $_POST["phone"];
//    if (preg_match($pattern,$user_name) || preg_match($pattern,$phone)){
//        $msg = 'no sql inject!';
//    }else{
//        $sql = "select * from `user` where `user_name`='{$user_name}' and `phone`='{$phone}'";
//        $fetch = $db->query($sql);
//    }
//
//    if (isset($fetch) && $fetch->num_rows>0){
//        $row = $fetch->fetch_assoc();
//        $sql = "update `user` set `address`='".$address."', `old_address`='".$row['address']."' where `user_id`=".$row['user_id'];
//        $result = $db->query($sql);
//        if(!$result) {
//            echo 'error';
//            print_r($db->error);
//            exit;
//        }
//        $msg = "a";
//    }