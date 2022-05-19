<?php

if(isset($_GET['id'])){
    include "config.php";
    $id = mysqli_real_escape_string($cnx, $_GET['id']);
    mysqli_query($cnx,"update todo set done=1 where id='$id'");
}
header('location:index.php');