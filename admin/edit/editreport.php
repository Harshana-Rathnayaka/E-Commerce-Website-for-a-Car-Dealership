<?php
$user_id=$_REQUEST['id'];
$process=$_POST['process'];

            if ($process=="3"){
                $msg = "Please select an option";
                echo "<script>window.top.location='../index.php?msg=$msg'</script>";
            }else{
                require_once '../includes/dbOperations.php';
                // include '../../connection.php';
                $insert=$db->query("UPDATE `users` SET `user_status = '$process' WHERE `id` ='$user_id'");

                if ($insert) {
                    $msg = "User Updated Successfully";
                    echo "<script>window.top.location='../index.php?msg=$msg'</script>";
                } else {
                    $ms = "Something was Wrong! Please Contact System Developer";
                    echo "<script>window.top.location='../index.php?msg=$ms'</script>";
                }
            }
