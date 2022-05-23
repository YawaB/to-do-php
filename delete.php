<?php

if(isset($_GET['id'])){
    include "config.php";
    $id = mysqli_real_escape_string($cnx, $_GET['id']);
    
    mysqli_query($cnx,"delete from todo where id='$id'");
}
header('location:index.php');