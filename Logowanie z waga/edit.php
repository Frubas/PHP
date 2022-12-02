<?php
include ('db_config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['edytowane']) !== NULL) {
        $tytul = $_POST['tytul'];
        $edytowane = $_POST['edytowane'];
        $waga = $_POST['waga'];
        $query = "DELETE FROM podstrony WHERE nazwapodstr='$tytul'";
        $query2 = "ALTER TABLE podstrony DROP `id`;";
        $query3 = "ALTER TABLE podstrony AUTO_INCREMENT = 1;";
        $query4 = "ALTER TABLE podstrony ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
        $query5 = "ALTER TABLE podstrony ADD `waga` int '$waga';";
        $query6 = "INSERT INTO podstrony (nazwapodstr,tresc,czasutworz,waga) VALUES ('$tytul','$edytowane',now(),'$waga');";
        $query7 = "SELECT * FROM `podstrony` ORDER BY `waga` ASC;";
        if ($polaczenie->query($query) === TRUE) {
            echo "Pomyslnie edytowano wpis!";
        }
        else {
            echo "Blad edycji wpisu: " . $polaczenie->error;
        }
        $polaczenie->query($query);
        $polaczenie->query($query2);
        $polaczenie->query($query3);
        $polaczenie->query($query4);
        $polaczenie->query($query5);
        $polaczenie->query($query6);
        $polaczenie->query($query7);

        header( "refresh:1;url=admin.php");
    } else {
        echo "Nowa tresc nie może byc pusta!";
    }
}
else {
echo '<div class="login">';
echo login_form();
echo '</div>';
echo '<a href="index.php">Powrót do strony głównej</a>';
}
?>