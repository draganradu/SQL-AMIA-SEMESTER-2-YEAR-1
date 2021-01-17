<?php
require('../components/loginCredentials.php');

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to connect to '$dbhost'");


if($_POST['Nume'] && $_POST['Prenume'] && $_POST['Telefon'] && $_POST['Email']) {
    $aNume = $_POST['Nume'];
    $aPrenume = $_POST['Prenume'];
    $aTelefon = $_POST['Telefon'];
    $aEmail = $_POST['Email'];

    $sql = "INSERT INTO client (Nume, Prenume, Telefon, email) VALUES ('{$aNume}','{$aPrenume}', '{$aTelefon}', '{$aEmail}')";
    if( $connect->query($sql) === TRUE){
        echo "New record added";
    }else{
        echo "Error: " . $sql . "<br>". $connect->error;
    }

    $connect->close();
}



?>