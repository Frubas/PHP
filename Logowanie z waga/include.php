<?php
function menu_from_db($connection){
	$menu = '';	
	if ($result = $connection -> query("SELECT * FROM podstrony ORDER BY waga ASC")) {
		while($wiersz = mysqli_fetch_assoc($result)){
                $menu = $menu.'<tr><td><a href="index.php?id='.$wiersz['id'].'">'.$wiersz['nazwapodstr']."</a></td></td>";
                }
		$result -> free_result();
		}
	return $menu;
   }
   
function podstrona_from_db($connection,$id=1,$nazwa_kolumny="tresc"){	
	$zapytanie = "SELECT ".$nazwa_kolumny." FROM podstrony WHERE id='".$id."'";
	if ($result = $connection -> query($zapytanie)) {
		while ($wiersz = $result -> fetch_row()) {
			$podstrona = $wiersz[0];
			}
		$result -> free_result();
		}
	return $podstrona;
   }
function get_id(){	
	if(isset($_GET['id'])){
		return $_GET['id'];}
	else {return 1;}
	}

	function login_form() {
		if($_SESSION['logowanie'] == 'poprawne') {
			$string  = '<form action="admin.php" method="post">';
			$string .= '   <INPUT type="submit" name="wylogowanie" value="Wyloguj">';
			$string .= '</form>';
			} 
		else {
			$string = '<form action="admin.php" method="POST"><ul class="logowanie">';
			if(isset($_SESSION['logowanie'])) $string .='<li>'.$_SESSION['logowanie'].'</li>';
			$string .= '<li>Login: <INPUT type="text" name="login"></li>';
			$string .= '<li>Haslo: <INPUT type="password" name="haslo"></li>';
			$string .= '<li><INPUT type="submit" name="logowanie" value="Logowanie"></li>';
			$string .= '</ul>';
			$string .= '</form>';	   
			}
		return $string;
		}
	
	function login_action($conn){
		if(isset($_POST['logowanie'])) {
			$q = "SELECT user, haslo FROM users WHERE user ='".$_POST['login']."' AND haslo = '".$_POST['haslo']."'";
			$result = @mysqli_query($conn,$q) or die(mysql_error());
			if(mysqli_num_rows($result) == 1) {
				$_SESSION['logowanie'] = 'poprawne';
				}
			else {
				$_SESSION['logowanie'] = 'Błędny login lub hasło!';
				} 
			unset($_POST['logowanie']);
			header("refresh: 1");
			}
		if(isset($_POST['wylogowanie'])) {   
			$_SESSION['logowanie'] = "Proszę się zalogować!";
			header("refresh: 1");
			}
		}
	
	//SPRAWDZENIE AUTENTYKACJI	
	function may_i_show(){
		if(isset($_SESSION['logowanie']) and $_SESSION['logowanie'] == 'poprawne') { 
				return true;
			} else {
				return false;
			}
		}
	
?>
