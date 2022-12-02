<?php
include ('db_config.php');

$query = 'CREATE TABLE podstrony(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
nazwapodstr VARCHAR(30) NOT NULL,
tresc MEDIUMTEXT NOT NULL,
czasutworz DATETIME NOT NULL,
waga INT NOT NULL)';

$tab2 = 'CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	user VARCHAR(50) NOT NULL,
	haslo VARCHAR(50) NOT NULL,
	ranga VARCHAR(50) NOT NULL,
	status VARCHAR(50) NOT NULL)';


if ($polaczenie->query($query) === TRUE) {
	echo "Table created successfully";
	}
else {
	echo "Error creating table: " . $polaczenie->error;
	}
	if ($polaczenie->query($tab2) === TRUE) {
		echo "Table created successfully";
		}
	else {
		echo "Error creating table: " . $polaczenie->error;
		}	
$polaczenie->query("INSERT INTO users (user,haslo,ranga)VALUES ('admin','1234','admin')");
$polaczenie->query("INSERT INTO podstrony (nazwapodstr,tresc,czasutworz,waga)VALUES ('start','Tresc podstrony startowej', now(),1)");
$polaczenie->query("INSERT INTO podstrony (nazwapodstr,tresc,czasutworz,waga)VALUES ('hobby','Opis mojego hobby',now(),2)");
$polaczenie->query("INSERT INTO podstrony (nazwapodstr,tresc,czasutworz,waga)VALUES ('kontakt','Kontakt: dane nieaktualne', now(),3)");
$polaczenie->close();


?>
