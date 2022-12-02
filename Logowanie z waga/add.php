<?php
include ('db_config.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['tytul'] and $_POST['tresc'] and $_POST['waga']) {
            $tytul = $_POST['tytul'];
            $tresc = $_POST['tresc'];
            $waga = $_POST['waga'];
            $query = "INSERT INTO podstrony (nazwapodstr,tresc,czasutworz,waga) VALUES ('$tytul','$tresc', now(),'$waga')";
            if ($polaczenie->query($query) === TRUE) {
                echo "Pomyslnie dodano nowy wpis!";
                header( "refresh:1;url=admin.php");
            }
            else {
                echo "Blad dodawania wpisu: " . $polaczenie->error;
            }
        } else {
            echo "Tytul oraz tresc nie moga byc puste!";
        }
    }
    ?>