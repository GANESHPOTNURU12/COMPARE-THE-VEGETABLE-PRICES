<?php
    session_start();
    $host="localhost";
    /*$user="link2sha_mapacc";
    $password="pMJ23gh0qfiJ";*/
    $user="root";
    $password="";
    $dbname="bestvegdeals";
    $mysqli = new mysqli($host, $user, $password, $dbname) or die ('Could not connect to the database server' . mysqli_connect_error());
?>