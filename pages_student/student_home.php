<!doctype html>
<html>
<!--col-xs-* < 768 px

col-sm-* >= 768 px

col-md-* >= 992 px

col-lg-* >= 1200 px-->
<!--https://bootsnipp.com/forms         generateur de form
	https://bootsnipp.com/buttons générateur de bouton
	http://charliepark.org/bootstrap_buttons/  couleurs personnalisé	
	example https://fontawesome.com/how-to-use/on-the-web/setup/getting-started
	ANIMATION https://fontawesome.com/how-to-use/on-the-web/setup/getting-started-->
	<head>			
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link href="css/studentStyle.css" rel="stylesheet">
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
			<!--sert à utiliser 675 icones de font awesome:https://fontawesome.com/?from=io-->
		
	</head>

<body>
	<div class="container">
        <?php include("../includes/header.php") ?>
		<div class="row">
            <?php include("../includes/menu.php") ?>
			<div class="col-lg-offset-3 col-lg-9 ">
				<h4 class="bolder">Demande de valorisation des acquis* pour l’ADMISSION dans une unité d’enseignement</h4>
			</div>
			<div class="col-lg-6">
				<h5 class="bolder">CONSTITUTION DE MON DOSSIER DE VALORISATION</h5>
				<h5 class="bolder">Etape 1. Ma demande </h5>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<form id="studentFolder" method="post" action="">
				   <div class="panel panel-primary">
					<table class="table table-bordered table-striped table-condensed"  >
						<div class="panel-heading">
						<h4 class="panel-title">Dossier de valorisation</h4>
						</div>
						  <tr class="active">
														
							<td><input id="name" type="text" class="form-control" placeholder="Nom"/></td>
							
							<td><input id="firstName" type="text" class="form-control" placeholder="Prénom"/></td>
							
							<td><input id="phone" type="tel" class="form-control" placeholder="ex:0487101652"/></td>
							
							<td colspan="6"><input id="email" type="email" class="form-control" placeholder="xxx.xxx@hainaut-promsoc.be"/></td>
													
							<td ><input id="section" type="text" class="form-control" placeholder="Section"/></td>
							
						  </tr>
						  <tr class="active">
							<td rowspan="2" class="bolder">Unité d’enseignement concernée :<br/> 
								<input id="lessonName" type="text" class="form-control" placeholder="Cours"/>
							</td>
							<td colspan="9" class="bolder">Capacité(s) préalable(s) requise(s) concernée(s)</td>
							
						  </tr>
						  <tr class="active">
							<td colspan="9">Prérequis de l’UE3 anglais supérieur appliqué au domaine considéré (DP) :<br/>
								<ul>
									<li>en compréhension de l'oral : comprendre un message simple exprimé dans une langue standard clairement articulée, utilisé dans le cadre d'une situation courante de la vie socioprofessionnelle liée au domaine considéré (économique, informatique, technique, scientifique, artistique, etc.), à partir d’un support audio ou vidéo ;</li>
									<li>en compréhension de l'écrit : comprendre un message écrit simple utilisé dans le cadre d'une situation courante de la vie socioprofessionnelle liée au domaine considéré (économique, informatique, technique, scientifique, artistique)</li>
									<li>en interaction oral : interagir (répondre à des questions et en poser, réagir à des affirmations et en émettre, faire des suggestions et réagir à des propositions, etc.) en utilisant les expressions adéquates pour répondre aux besoins de la vie socioprofessionnelle du domaine considéré  (économique, informatique, technique, scientifique, artistique, etc.) ;</li>
									<li>en production orale en continu : présenter brièvement sa formation, son travail, ses collègues ou des activités quotidiennes passées, présentes et/ou futures relatives à la vie socioprofessionnelle,</li>
									<li>en production écrite : produire un message cohérent simple relatif à une situation courante de la vie socioprofessionnelle liée au domaine considéré (économique, informatique, technique, scientifique, artistique, etc.).</li>
								</ul>
							</td>
						  </tr>	
						  
					  </table>
					
				</div>
				<hr/>
				<br/>
				<br/>
				<p>(*)En cas de non-respect des délais pour la remise de la demande et des documents probants, celle-ci ne sera pas prise en considération.</p>	
				
				
				
				
					
					
					
		</div>
		<div class="row">
			
			<div class="col-xs-12  ">
				<div>
					<h5 class="bolder">Etape 2.Mes documents probants </h5>
					<p>Je joins, en annexe, les documents probants suivants, attestant de la maitrise de capacités préalables requises concernés par la demande :</p>
				</div>
				
				<div class="checkbox">
		  			<label><input type="checkbox" value="enseignement" name="from"/>Issus de mon parcours dans l’enseignement </label>
					<div class="col-lg-offset-1">
						<div class="checkbox">
						  <label><input type="checkbox" name="schoolChoice" value="1">Originaux   de diplôme, certificat, brevet, attestation de réussite, titres, bulletin  (réussite UE2 anglais niveau secondaire)</label>
						</div>
						<div class="checkbox">
						  <label><input type="checkbox" name="schoolChoice" value="2">Programme, référentiel, contenu de cours, acquis d’apprentissage, crédits obtenus, fiche ECTS… (pré-requis UE3 anglais appliqué au domaine économique)</label>
						</div>
						<div class="checkbox ">
						  <label><input type="checkbox" name="schoolChoice" value="3">Grille horaire, nombre d’heures de cours, relevé d’heures de stage effectués, rapport …</label>
						</div>
						<div class="checkbox ">
						  <label><input type="checkbox" name="schoolChoice" value="4">Autres : à compléter</label>
						</div>
			      </div>
			   </div>
				<div class="checkbox">
				  <label><input type="checkbox" value="formation" name="from"/>Issus de mon parcours dans des organismes de formation ou des centres de validation</label>
				  <div class="col-lg-offset-1">
						<div class="checkbox">
						  <label><input type="checkbox" name="formationChoice" value="1">Titres de compétence</label>
						</div>
						<div class="checkbox">
						  <label><input type="checkbox" name="formationChoice" value="2">Unités d’acquis d’apprentissage</label>
						</div>
						<div class="checkbox ">
						  <label><input type="checkbox" name="formationChoice" value="3">Attestation</label>
						</div>
						<div class="checkbox ">
						  <label><input type="checkbox" name="formationChoice" value="4">Autres : à compléter</label>
						</div>
					</div>
				</div>
				<div class="checkbox ">
				  <label><input type="checkbox" value="experiencePro" name="from"/>Issus de mon expérience professionnelle </label>
				  <div class="col-lg-offset-1">
						<div class="checkbox">
						  <label><input type="checkbox" name="experienceProChoice" value="1">Copie de contrat de travail</label>
						</div>
						<div class="checkbox">
						  <label><input type="checkbox" name="experienceProChoice" value="2">Description de fonction, attestation de service, de tâches ou activités réalisées</label>
						</div>
						<div class="checkbox ">
						  <label><input type="checkbox" name="experienceProChoice" value="3">Projet, portfolio, cahier individuel de compétences</label>
						</div>
						<div class="checkbox ">
						  <label><input type="checkbox" name="experienceProChoice" value="4">Autres : à compléter</label>
						</div>
					</div>
				</div>
				<div class="checkbox ">
				  <label><input type="checkbox" value="experiencePerso" name="from"/>Issus de mon expérience personnelle</label>
				  <div class="col-lg-offset-1">
						<div class="checkbox">
						  <label><input type="checkbox" name="experiencePersoChoice" value="1">Descriptif des activités liées aux loisirs, à la famille, au bénévolat…</label>
						</div>
						<div class="checkbox">
						  <label><input type="checkbox" name="experiencePersoChoice" value="2">Compétences linguistiques </label>
						</div>
						<div class="checkbox ">
						  <label><input type="checkbox" name="experiencePersoChoice" value="3">Auto-formation ou autres : pratique de l’anglais du tourisme dans ma vie de tous les jours et en tant qu’étudiant en-dehors de l’école (par moi-même)</label>
						</div>

					</div>
				</div>
				<hr/>
					<br/>
					<br/>
					<p>Les originaux sont à présenter lors d’une rencontre pour valider la demande ou lors de la remise du dossier avec une copie qui sera gardée par l’établissement.	</p>
			</div>
		</div>	
	</form>
   </div>
  </div>
</div>

    
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
