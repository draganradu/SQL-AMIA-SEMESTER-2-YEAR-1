<?php
require('../components/loginCredentials.php');

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to connect to '$dbhost'");


if($_POST['NumeScula'] && $_POST['Stare'] && $_POST['Pret'] && $_POST['ValRezid'] && $_POST['DataAchizitie']) {
    $aNumeScula = $_POST['NumeScula'];
    $aStare = $_POST['Stare'];
    $aPret = (int)$_POST['Pret'];
    $aValRezid = $_POST['ValRezid'];
    $aIsRented = 0;
    $aDataAchizitie = $_POST['DataAchizitie'];

    $sql = "INSERT INTO scule (NumeScula, Stare, Pret, ValRezid, IsRented, DataAchizitie) VALUES ('{$aNumeScula}','{$aStare}', '{$aPret}', '{$aValRezid}', '{$aIsRented}', '{$aDataAchizitie}')";
    if( $connect->query($sql) === TRUE){
        echo "New record added";
    }else{
        echo "Error: " . $sql . "<br>". $connect->error;
    }

    $connect->close();
}



?>