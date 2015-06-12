<?php

$DBhost = "127.0.0.1";
$DBuser = "root";
$DBpass = "";
$DBname = "sorobanapp";

$email = "";
$error_message = "";
$email_was_posted = false;


if (!empty($_POST)) {
        $email = isset($_POST['email']) ? $_POST['email'] : null;

        if (is_null($email) == false) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                   $error_message = "Votre adresse email n'est pas considérée comme valide.";
            } else {

                $link = mysqli_connect($DBhost, $DBuser, $DBpass, $DBname);

                if (mysqli_connect_errno()) {
                        printf("Échec de la connexion : %s\n", mysqli_connect_error());
                        exit();
                }

                $email = mysqli_real_escape_string($link, $email);

                $query = "INSERT INTO `srb_subscriber`(`email`) VALUES ('$email')";
                $result = mysqli_query($link, $query);
                mysqli_close($link);

                $email_was_posted = true;
            }
		}
	} else {
		$email = "";
	}
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>EDF - Sorobanapp</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<meta name="robots" content = "index, follow, noodp" />
	<meta name="googlebot" content="index, follow, noodp" />

	<meta name="description" content="Une application mobile d'EDF pour les PME vous permettant d'indiquer votre consommation réelle et d'éviter toute surprise sur vos factures." />

	<meta name="keywords" content="edf, pro, entreprises, pme, facture, consommation, estimé, réel, estimée, réelle, électricité" />
	<meta name="author" content="whyers">
	<meta name="revisit-after" content="period" />
	<meta name="google" content="notranslate" />

	<link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16" />


	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

	<!--[if lt IE 8]>
	<link rel="stylesheet" href="ie7/ie7.css">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="assets/js/sweetalert/sweetalert.css">
	<script src="assets/js/sweetalert/sweetalert.min.js"></script>

</head>

<body>

	<?php include_once("analyticstracking.php") ?>

	<!-- Header -->
	<section id="header" class="dark">
		<header>
			<img class="logo" src="/images/edf-logo.png">
			<img class="logo sorobanapp" src="/images/sorobanapp-logo.png">

			<h1>
				Vos factures d’électricité<br/>
				ne seront plus une surprise !
			</h1>

			<!--a class="contact" href="#">NOUS CONTACTER</a-->

			<p> 
				Application gratuite, prochainement disponible ! 
			</p>

			<form id="signup-form" method="post" action="/">
				<input type="email" name="email" id="email" placeholder="Votre adresse email" value="<? echo $email; ?>">
				<input class="button" type="submit" value="Souscrire">
				<span class="message"></span>
			</form>

		</header>

		<footer>
			<ul>
				<li><a href="#"><span class="icon-apple"></span></a></li>
				<li><a href="#"><span class="icon-android"></span></a></li>
				<li><a href="#"><span class="icon-windows"></span></a></li>
			</ul>
		</footer>
	</section>

	<!-- First -->
	<section id="first" class="main">

		<header>
			<div class="container">
				<div class="row">
					<div class="7u 12u(narrow)">
						<section>
							<h2>
								Le paiement de votre consommation réelle
							</h2>
							<p>
								Vous êtes un professionnel...<br/>
								<br/>
								Et vous venez de vous installer ?<br/>
								Ou vous avez réalisé des <span class="highlight">travaux</span> récemment pour étendre votre local ou votre commerce ?<br/>
								Ou vous avez installé de <span class="highlight">nouveaux équipements</span> ?<br/>
								<br/>
								Soyez vigilant, votre consommation d'électricité peut être plus élevée que celle prévue.<br/>
								Pour éviter toute surprise et rester zen, l’application Soroban vous permet d'indiquer votre <span class="highlight">consommation réelle</span> aux moments opportuns et mieux <span class="highlight">anticiper</span> vos dépenses.
							</p>
						</section>
					</div>
					<div class="5u 12u(narrow)">
						<sectio style="position:relative;">
							<div class="iphone">
								<div class="screenshots">
									<ul>
										<li class="screenshot-0"></li>
										<li class="screenshot-1"></li>
									</ul>
								</div>
							</div>	
							<!--img src="images/iphone-mockup.png" alt="" /-->
							<!--img src="images/iphone-glass-reflect.png" alt="" /-->
						</section>
					</div>
				</div>
				
			</div>
		</header>

	</section>

	<!-- Second -->
	<section id="second" class="main">
		<header>
			<div class="container">
				<h2>Comment çà marche ?</h2>
			</div>
		</header>

		<div class="content">
			<div class="container">
				<div class="row">
					<picture>
						<!--[if IE 9]><video style="display: none;"><![endif]-->
						<source srcset="images/schema-wide.png" media="(min-width: 736px)">
						<source srcset="images/schema-small.png" media="(min-width: 320px)">
						<!--[if IE 9]></video><![endif]-->
						<img src="images/schema-small.png" srcset="schema-small.png" alt="">
					</picture>
				</div>
			</div>
		</div>
	</section>

	<!-- Third -->
	<section id="third" class="main">
		<header>
			<div class="container">
				<h2>L’application Soroban assouplit votre gestion</h2>
			</div>
		</header>

		<div class="content">
			<div class="container">
				
				<div class="row">
					<div class="4u 12u(narrow)">
						<img class="benefit" src="images/benefit_01.png" alt="" />

						<h3>
							Payez<br/>
							votre consommation réelle
						</h3>
						<p>
							Fini les surprises en fin de mois.<br/>
							Vous relevez vous-même votre compteur d'électricité, ainsi vous êtes assuré de payer le prix juste.
						</p>
					</div>

					<div class="4u 12u(narrow)">
						<img class="benefit" src="images/benefit_02.png" alt="" />

						<h3>Bénéficiez de la lecture simplifiée de votre facture</h3>
						<p>
							Vous pouvez comparer vos factures<br/>
							et ainsi mieux analyser votre consommation d'électricité.
						</p>
					</div>

					<div class="4u 12u(narrow)">
						<img class="benefit" src="images/benefit_03.png" alt="" />

						<h3>Envoyez automatiquement vos factures à votre comptable</h3>
						<p>
							Gagnez du temps dans votre gestion.<br/>
							Vos factures d’électricités générées<br/>
							en ligne sont directement transmises<br/>
							à votre comptable par mail.
						</p>
					</div>

				</div>
			</div>
		</div>
	</section>

	<!-- Fourth -->
	<section id="fourth" class="main">
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="6u 12u(narrow)">
						<img class="conseiller" src="images/conseiller.png" alt="" />
					</div>
					<div class="6u 12u(narrow)">
						<p class="blockquote">
							Grâce à la consommation réelle, 98% des clients sont satisfaits de leur facture.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Five -->
	<section id="five" class="main">
		<header>
			<div class="container">
				<h2>Inclus dans l'application</h2>
			</div>
		</header>

		<div class="content">
			<div class="container">
				
				<div class="row">
					<div class="3u 12u(narrow)">
						<img class="feature" src="images/feature_01.png" alt="" />

						<h3>
							Vous avez<br/>une question ?
						</h3>
						<p>
							Demandez à un conseiller de vous rappeler
						</p>
					</div>

					<div class="3u 12u(narrow)">
						<img class="feature" src="images/feature_02.png" alt="" />

						<h3>Connaître les horaires<br/>pour faire des économies</h3>
						<p>
							Retrouvez facilement les différentes plages horaires HP et HC
						</p>
					</div>

					<div class="3u 12u(narrow)">
						<img class="feature" src="images/feature_03.png" alt="" />

						<h3>Téléchargez<br/>vos factures</h3>
						<p>
							Mensuelles ou annuelle<br/>
							(facture regroupée)
						</p>
					</div>

					<div class="3u 12u(narrow)">
						<img class="feature" src="images/feature_04.png" alt="" />

						<h3>Être notifié<br/>au bon moment</h3>
						<p>
							Configurez vos seuils d'alerte et vos rappels
						</p>
					</div>

				</div>
			</div>
		</div>
	</section>

	<!-- Five -->
	<section id="six" class="main">
		<header>
			<div class="container">
				<h2>Êtes-vous intéressé ?</h2>
				<p>
					L'application Soroban sera <span class="highlight">bientôt</span> disponible.<br/>
					<span class="highlight">Inscrivez-vous</span> pour être prévenu de sa date de lancement.
				</p>

					<form id="signup-form" method="post" action="/">
						<input type="email" name="email" id="email" placeholder="Votre adresse email" value="<? echo $email; ?>">
						<input class="button" type="submit" value="Souscrire">
						<span class="message"></span>
					</form>
				
				<hr>

				<p>
					Votre avis est important,<br/><span class="highlight">participez</span> à l'élobaration du produit en répondant à quelques questions :
				</p>
				<div class="dark">
					<a class="button" href="#subscribe">Fomulaire</a>
				</div>
			</div>
		</header>


	</section>

	<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row">
				<div class="6u 12u(narrow) imprint">
					<!--a href="#">Mentions légales</a-->
				</div>
				<div class="6u 12u(narrow) copyright">
					2015 &copy; EDF-Soroban.
				</div>
			</div>
		</div>
	</section>

	<!-- Scripts -->

	<!--[if lt IE 8]>
	<script src="ie7/ie7.js"></script>
	<![endif]-->

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->

	<script>
	// Picture element HTML5 shiv
	document.createElement( "picture" );
	</script>
	<script src="assets/js/picturefill.min.js" async></script>

	<script type="text/javascript">
		window.sorobanapp = <?php echo json_encode(
			array("email" => $email, "error_message" => $error_message, "email_was_posted" => $email_was_posted)
		); ?>;
	</script>

	<script src="assets/js/main.js"></script>

</body>
</html>