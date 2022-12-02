<?php
include ('db_config.php');
include ('include.php');
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>My first CMS</title>
	<meta name="keywords" content="cms, prostota, wydajność, opensource">
	<meta name="description" content="Tutaj wpisz opis swojej strony">
	<link rel="stylesheet" href="styl.css">
</head>
<body><center>
<a href="admin.php">logowanie</a></center>
	<div id="kontener">
		<header>
			<h1>Dynamiczna strona o Lorem ipsum!</h1>
		</header>
		<div>
			<main>
				<article>
				<h2><?php echo podstrona_from_db($polaczenie,get_id(),"nazwapodstr"); ?></h2>
					<p>
					<?php echo podstrona_from_db($polaczenie,get_id(),"tresc"); ?>
					</p>
				</article>
				<article>
					<h2>Statyczny tekst</h2>
					<p>Nam id rutrum velit. Ut gravida tristique neque et pretium. Sed eget viverra orci. Donec et cursus mauris, sed rhoncus odio. Etiam leo est, fringilla dictum pretium facilisis, dapibus in diam. Donec ullamcorper nisl ac ornare tincidunt. Cras scelerisque sapien vel nisi elementum, sed convallis mi aliquet. Ut finibus viverra tincidunt.</p>
				</article>
			</main>
			<aside>
				<nav>
					<h3>Menu</h3>
					<?php echo menu_from_db($polaczenie); ?>
				</nav>
				<section>
					<h3>Reklamy</h3>
					<p>Lorem ipsum dolor sit emet...</p>
				</section>
				<section>
					<h3>Social media</h3>
					<p>Lorem ipsum dolor sit emet etc...</p>
				</section>
			</aside>
		</div>
		<footer>
			<div> pk.sth © 2022</div>
			<div>Strona o niczym by PK edytowana przez DB przygotowane specjalnie dla twardzieli z ZSZ. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
		</footer>
	</div>
</body>
</html>

<?php $polaczenie -> close(); ?>


					
			
			
