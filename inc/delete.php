<?php
include "db_conn.php";
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];


    $sql="delete from `employees` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
       // echo"Deleted Sucessfully";
       header('location:../admin/employees.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>