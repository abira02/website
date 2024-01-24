<?php
    $con = mysqli_connect('localhost','root','','website');
    if(!$con){
        die(mysqli_error($con));
    }
?>