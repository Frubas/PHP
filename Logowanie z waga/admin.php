<?php
session_start();
include ('db_config.php');
include ('include.php');
if(!isset($_SESSION['logowanie'])) {
    $_SESSION['logowanie']="Proszę się zalogować!";
}
login_action($polaczenie);
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styl.css" rel="stylesheet" type="text/css">
    <title>Panel admina</title>
</head>
<body>

    <?php
    if(may_i_show() == true) {
    
    //dodawanie

        echo '<h1>Dodawanie wpisu:</h1>
        <br>
        <form action="add.php" method="post">
        Tytul: <input type="text" name="tytul"><br>
        Tresc: <input type="text" name="tresc"><br>
        Waga: <input type="text" name="waga"><br>
        <input type="submit">
        </form>
        <br>';
        
    //usuwanie

        echo '<h1>Usuwanie wpisu:</h1>
        <form action="remove.php" method="post">
        Wybierz tytul:';
        echo '<select name="podstrona" id="podstrona">';
        $result = $polaczenie->query("SELECT * FROM podstrony");
        while ($row = $result->fetch_assoc()) {
            $value = $row['nazwapodstr'];
            echo '<option value="'.$value.'">'.$value.'</option>';
        }
        echo '</select>';
        echo '<br><input type="submit"></form>';
        echo '<br>';

    //edytowanie

        echo '<h1>Edytuj wpisu:</h1>
        <form action="edit.php" method="post">
        Wybierz tytul:';
        echo '<select name="tytul" id="podstrona">';
        $result = $polaczenie->query("SELECT * FROM podstrony");
        while ($row = $result->fetch_assoc()) {
            $value = $row['nazwapodstr'];
            echo '<option value="'.$value.'">'.$value.'</option>';
        }
        echo '</select>';
        echo '<br> Wpisz nową treść podstrony: <input type="text" name="edytowane">';
        echo '<br> Wpisz wagę podstrony: <input type="text" name="waga"> <br>';

        echo '<br><input type="submit"></form>';
        echo '</form> <br>';

    }
        echo login_form();
        echo '<a href="index.php">Powrót do strony głównej</a>';
    ?>
    
</body>
</html>
