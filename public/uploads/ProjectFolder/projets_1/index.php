<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Travel Agency</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet"  href='http://fonts.googleapis.com/css?family=Crete+Round'>
</head>
<body>
	<header>
		<div class="wrapper">
			<h1>Travel Agency<span class="orange">.</span></h1>
			<nav>
				<ul>
					<li><a href="#main-image">Acceuil</a></li>
					<li><a href="#steps">Destinations</a></li>
					<li><a href="#possibilities">Circuits</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section id="main-image">
		<div class="wrapper">
			<h2>Organisez votre<br><strong>voyage sur mesure</strong></h2>
			<a href="#" class="button-1">Par ici</a>
		</div>
	</section>
	<section id="steps">
		<div class="wrapper">
			<ul>
				<li id="step-1">
					<h4>Planifier</h4>
					<p>Confiez-nous vos rêves d'évasion : en famille ou entre amis, nous trouverons la formule qui comblera vos attentes.</p>
				</li>
				<li id="step-2">
					<h4>Organiser</h4>
					<p>Bénéficiez de l'expertise de nos spécialistes de chaque destination, ils vous accompagnent dans la réalisation de votre voyage.</p>
				</li>
				<li id="step-3">
					<h4>Voyager</h4>
					<p>Nous nous chargeons d'assurer votre sécurité et de veiller à votre pleine sérénité tout au long de votre voyage.</p>
				</li>
				<div class="clear"></div>
			</ul>
		</div>
	</section>
	<section id="possibilities">
		<div class="wrapper">
			<article style="background-image:url(image/article-image-1.jpg) ;">
				<div class="overlay">
					<h4>Partez en famille</h4>
					<p><small>Offrez le meilleur à ceux que vous aimez et partagez des moments fabuleux !</small></p>
					<a href="#" class="button-2">Plus d'infos</a>
				</div>
			</article>
			<article style="background-image:url(image/article-image-2.jpg) ;">
				<div class="overlay">
					<h4>Envie de s'evader</h4>
					<p><small>Parfois un peu d'évasion serait le bienvenue et ferait le plus grand bien !</small></p>
					<a href="#" class="button-2">Plus d'infos</a>
				</div>
			</article>
			<div class="clear"></div>
		</div>
	</section>
	<section id="contact">
		<div class="wrapper">
			<h3>Contactez-nous</h3>
			<p>hez Travel Agency nous savons que voyager est une aventure humaine mais également un engagement financier important pour vous. C'est pourquoi nous mettons un point d'honneur à prendre en compte chacune de vos attentes pour vous aider dans la préparation de votre séjour, circuit ou voyage sur mesure.</p>
			<form>
				<label for="name">nom</label>
				<input type="text" id="name" placeholder="Votre nom">
				<label for="email">Email</label>
				<input type="text" id="email" placeholder="Votre email">
				<input type="submit" name="OK" class="button-3">
			</form>
		</div>
	</section>

	<footer>
		<div class="wrapper">
			<h1>Travel Agency<span class="orange">.</span></h1>
			<div class="copyright">Copyright © Tous droits réservés.</div>
		</div>
	</footer>
</body>
</html>