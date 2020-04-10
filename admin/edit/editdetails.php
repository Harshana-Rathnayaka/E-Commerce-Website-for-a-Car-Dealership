<?php
 $U_ID=$_REQUEST['U_ID'];

 $fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];

if (empty($fname) || empty($lname) || empty($uname)){
    echo "Can not send empty data";

}else{
    include '../../connection.php';
    $insert=$db->query("UPDATE users SET U_Name='$uname',F_Name='$fname',L_Name='$lname' WHERE U_ID='$U_ID'");
    if ($insert){
        $ms = "Successfully Changed";
        echo "<script>window.top.location='index.php?msg=$ms'</script>";
    }else{
        echo "something was wrong,please try again";
    }



}

?>