<?php
include ('db_config.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['podstrona']) {
            $podstrona = $_POST['podstrona'];
            $query = "DELETE FROM podstrony WHERE nazwapodstr='$podstrona'";
            $query2 = "ALTER TABLE podstrony DROP `id`;";
            $query3 = "ALTER TABLE podstrony AUTO_INCREMENT = 1;";
            $query4 = "ALTER TABLE podstrony ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
            if ($polaczenie->query($query) === TRUE) {
                echo "Pomyslnie usunieto wpis!";
            }
            else {
                echo "Blad dodawania wpisu: " . $polaczenie->error;
            }
            $polaczenie->query($query2);
            $polaczenie->query($query3);
            $polaczenie->query($query4);
            header( "refresh:1;url=admin.php");
        } else {
            echo "Tytul oraz tresc nie moga byc puste!";
        }
    }
    ?>