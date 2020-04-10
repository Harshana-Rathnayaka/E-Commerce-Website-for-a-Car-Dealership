<?php
$U_ID=$_REQUEST['U_ID'];
$proceed=$_POST['proceed'];

if ($proceed=="4"){

}else{
    include '../../connection.php';
    $insert=$db->query("UPDATE users SET Active='$proceed' WHERE U_ID='$U_ID'");
    if ($insert){
        $ms = "Successfully Changed";
        echo "<script>window.top.location='../index.php?msg=$ms'</script>";
    }else{
        $ms ="something was wrong,please try again";
        echo "<script>window.top.location='../index.php?msg=$ms'</script>";
    }
}

?>