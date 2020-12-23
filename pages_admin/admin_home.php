<?php
include ('../db/connexion.php');
include('../verification/verif_session.php');
$etudiants = $dbh->query('SELECT personne.ID ID_PERSONNE, personne.EMAIL MAIL, personne.NOM NOM, personne.PRENOM PRENOM, section.NOM_SECTION SECTION, cours.NOM_COURS COURS, demande.DATE_DEMANDE, demande.DATE_DECISION, statut_demande.NOMSTATDEMAND ETAT_DEMANDE
FROM demande
	JOIN personne 		ON personne.ID = demande.ID
    JOIN section 		ON personne.ID_SECTION = section.ID_SECTION
	JOIN cours 			ON demande.ID_COURS = cours.ID_COURS
	JOIN statut_demande on statut_demande.ID_STA_DEMAND = demande.ID_STA_DEMAND
    JOIN statut 		on statut.ID_STATUT = personne.ID_STATUT
    WHERE statut.ID_STATUT = 1')->fetchAll();

$etudiants_encours = $dbh->query('SELECT personne.ID ID_PERSONNE, personne.EMAIL MAIL, personne.NOM NOM, personne.PRENOM PRENOM, section.NOM_SECTION SECTION, cours.NOM_COURS COURS, demande.DATE_DEMANDE, demande.DATE_DECISION, statut_demande.NOMSTATDEMAND ETAT_DEMANDE
FROM demande
	JOIN personne 		ON personne.ID = demande.ID
    JOIN section 		ON personne.ID_SECTION = section.ID_SECTION
	JOIN cours 			ON demande.ID_COURS = cours.ID_COURS
	JOIN statut_demande on statut_demande.ID_STA_DEMAND = demande.ID_STA_DEMAND
    JOIN statut 		on statut.ID_STATUT = personne.ID_STATUT
    WHERE statut.ID_STATUT = 1 AND NOMSTATDEMAND = \'nouvelle\'')->fetchAll();

$etudiants_fini = $dbh->query('SELECT personne.ID ID_PERSONNE, personne.EMAIL MAIL, personne.NOM NOM, personne.PRENOM PRENOM, section.NOM_SECTION SECTION, cours.NOM_COURS COURS, demande.DATE_DEMANDE, demande.DATE_DECISION, statut_demande.NOMSTATDEMAND ETAT_DEMANDE
FROM demande
	JOIN personne 		ON personne.ID = demande.ID
    JOIN section 		ON personne.ID_SECTION = section.ID_SECTION
	JOIN cours 			ON demande.ID_COURS = cours.ID_COURS
	JOIN statut_demande on statut_demande.ID_STA_DEMAND = demande.ID_STA_DEMAND
    JOIN statut 		on statut.ID_STATUT = personne.ID_STATUT
    WHERE statut.ID_STATUT = 1 AND NOMSTATDEMAND != \'nouvelle\'')->fetchAll();

?>
<!doctype html>
<html>

	<head>			
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link href="../css/style.css" rel="stylesheet">
			<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	</head>

<body>
	<div class="container">
		<?php include("../includes/header.php") ?>
		<section class="row" >	
				
				<?php include("../includes/menu.php") ?>
				<div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 box col-lg-offset-1 col-md-offset-4   col-sm-offset-4 " >
					<div class="alert alert-success" style="display:none;" id="msgUpdate">
						<p class="msgAlert">Modification du résultat effectué!</p>
					</div>
					<ul class="nav nav-tabs ">
						<li class="active "><a class="color-tab" data-toggle="tab" href="#general">Général</a></li>
						<li><a class="color-tab" data-toggle="tab" href="#progress">Demandes en cours</a></li>
						<li><a class="color-tab" data-toggle="tab" href="#done">Demandes clôturé</a></li>		
					</ul>

					  <div class="tab-content content">
						<div id="general" class="tab-pane fade in active">
								<table class="table table-striped table-bordered tableStudent" style="width:100%">
									<thead>
										<tr>
											<th>Nom</th>									
											<th>Section</th>
											
											<th>Demande pour le cours</th>
											<th>Date</th>
											<th>Date de clôture</th>
											<th>Statut</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											foreach($etudiants as $etudiant) {

                                                echo '<tr>
														<td><a href="studentCard.php?etudiant=' . $etudiant['MAIL'] . '" alt="">' . $etudiant['NOM'] . ' ' . $etudiant['PRENOM'] . '</td>
														<td>' . $etudiant['SECTION'] . '</td>		
														<td>' . $etudiant['COURS'] . '</td>
														<td>' . $etudiant['DATE_DEMANDE'] . '</td>
														<td>' . $etudiant['DATE_DECISION'] . '</td>';

                                                if ($etudiant['ETAT_DEMANDE'] == 'Accepter') {
                                                    echo '<td><span  class=\'badge\' style=\'background-color:#468847\'>' . $etudiant['ETAT_DEMANDE'] . '</span></td></tr>';
                                                } elseif ($etudiant['ETAT_DEMANDE'] == 'refuser') {
                                                    echo '<td><span  class=\'badge\' style=\'background-color: #b94a48\'>' . $etudiant['ETAT_DEMANDE'] . '</span></td></tr>';
                                                } else {
                                                    echo '<td><span  class=\'badge\' style=\'background-color: #3a87ad\'>' . $etudiant['ETAT_DEMANDE'] . '</span></td></tr>';
                                                }
                                            }
										?>

									</tbody>
									<tfoot>
										<tr>
											<th>Nom</th>			
											<th>Section</th>
											
											<th>Demande </th>
											<th>Date</th>
											<th>Date de clôture</th>
											<th>Statut</th>
										</tr>
									</tfoot>
							</table>

						</div>
						<div id="progress" class="tab-pane fade">
								  <table class="table table-striped table-bordered tableStudent" style="width:100%">
									<thead>
										<tr>
											<th>Nom</th>									
											<th>Section</th>
											
											<th>Demande</th>
											<th>Date</th>
											<th>Date de clôture</th>
											<th>Statut</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    foreach($etudiants_encours as $etudiant) {

                                        echo '<tr>
														<td><a href="studentCard.php?etudiant=' . $etudiant['MAIL'] . '" alt="">' . $etudiant['NOM'] . ' ' . $etudiant['PRENOM'] . '</td>
														<td>' . $etudiant['SECTION'] . '</td>		
														<td>' . $etudiant['COURS'] . '</td>
														<td>' . $etudiant['DATE_DEMANDE'] . '</td>
														<td>' . $etudiant['DATE_DECISION'] . '</td>';

                                        if ($etudiant['ETAT_DEMANDE'] == 'Accepter') {
                                            echo '<td><span  class=\'badge\' style=\'background-color:#468847\'>' . $etudiant['ETAT_DEMANDE'] . '</span></td></tr>';
                                        } elseif ($etudiant['ETAT_DEMANDE'] == 'refuser') {
                                            echo '<td><span  class=\'badge\' style=\'background-color: #b94a48\'>' . $etudiant['ETAT_DEMANDE'] . '</span></td></tr>';
                                        } else {
                                            echo '<td><span  class=\'badge\' style=\'background-color: #3a87ad\'>' . $etudiant['ETAT_DEMANDE'] . '</span></td></tr>';
                                        }
                                    }
                                    ?>

									</tbody>
									<tfoot>
										<tr>
											<th>Nom</th>			
											<th>Section</th>
											
											<th>Demande </th>
											<th>Date</th>
											<th>Date de clôture</th>
											<th>Statut</th>
										</tr>
									</tfoot>
							</table>
						</div>
						<div id="done" class="tab-pane fade">
							 <table class="table table-striped table-bordered tableStudent" style="width:100%">
									<thead>
										<tr>
											<th>Nom</th>									
											<th>Section</th>
											
											<th>Demande</th>
											<th>Date</th>
											<th>Date de clôture</th>
											<th >Statut</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    foreach($etudiants_fini as $etudiant) {

                                        echo '<tr>
														<td><a href="studentCard.php?etudiant=' . $etudiant['MAIL'] . '" alt="">' . $etudiant['NOM'] . ' ' . $etudiant['PRENOM'] . '</td>
														<td>' . $etudiant['SECTION'] . '</td>		
														<td>' . $etudiant['COURS'] . '</td>
														<td>' . $etudiant['DATE_DEMANDE'] . '</td>
														<td>' . $etudiant['DATE_DECISION'] . '</td>';

                                        if ($etudiant['ETAT_DEMANDE'] == 'Accepter') {
                                            echo '<td><span  class=\'badge\' style=\'background-color:#468847\'>' . $etudiant['ETAT_DEMANDE'] . '</span></td></tr>';
                                        } else {
                                            echo '<td><span  class=\'badge\' style=\'background-color: #b94a48\'>' . $etudiant['ETAT_DEMANDE'] . '</span></td></tr>';
                                        }
                                    }
                                    ?>

									</tbody>
									<tfoot>
										<tr>
											<th>Nom</th>			
											<th>Section</th>
											
											<th>Demande </th>
											<th>Date</th>
											<th>Date de clôture</th>
											<th>Statut</th>
										</tr>
									</tfoot>
							</table>
						</div>

					  </div>
					  <div  class=" modal fade myModal" role="dialog">
								  <div class="modal-dialog">

									
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" style="text-align:center;color:#414D5A;font-weight:bold;">Analyse de la demande</h4>
									  </div>
									  <div class="modal-body">
											<form class="form-horizontal col-lg-12 " method="post" action="">
														<div class="row">
																<div class="form-group">
																	
																<input type="hidden" id="analyzeDate" value=""/><!--PHP:mettre dans value la fct PHP qui renvoi la date systeme jj/mm/aaaa.Le champ étant Hidden , il ne sera pas visible par le user-->
																	


																</div>
														</div>
														<div class=" table-responsive ">
															<div class="panel panel-primary">
															<table class="table table-bordered table-striped table-condensed"  >
																<div class="panel-heading">
																	<h4 class="panel-title" >Analyse de la demande</h4>
																</div>
																<thead>
																  <tr>
																	<th colspan="2">Critères:</th>

																	<th>Décision:</th>
																  </tr>
																</thead>
																<tbody>
																  <tr>
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en compréhension à l'oral : comprendre un message simple exprimé dans une langue standard clairement articulée, utilisé dans le cadre d'une situation courante de la vie socioprofessionnelle liée au domaine économique, à partir d’un support audio ou vidéo</td>

																  </tr>

																  <tr>
																	<td colspan="2">Motivation :<br/>
																	L’UE2 niveau secondaire a validé la compétence de niveau A2 pour la compréhension à l’oral de langue en général à l’oral
																	La rencontre à l’oral (cf annexe – questions posées) a permis de valider la compétence de compréhension de niveau A2 pour la langue appliquée au domaine économique à l’oral.
																	</td>
																	<td>
																		<div class="radio">
																			<label for="ami"  >
																				 <input type="radio" name="origine" value="acquis" id="oralAcquis">
																				 Acquis 
																			 </label>
																		 </div>
																		 <div class="radio">
																		  <label for="web" class="radio">
																			<input type="radio" name="origine" value="non acquis" id="oralNonAcquis">
																			N/A 
																		  </label>
																		</div>   
																	</td>
																  </tr>
																  <tr>
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en compréhension de l'écrit : comprendre un message écrit simple utilisé dans le cadre d'une situation courante de la vie socioprofessionnelle liée au domaine considéré (économique, informatique, technique, scientifique, artistique)</td>

																  </tr>
																  <tr>
																	<td colspan="2">Motivation :<br/> 
																		L’UE2 niveau secondaire a validé la compétence de niveau A2 pour la langue en général à l’écrit
																		Les questions relatives à la compréhension à l’écrit du test de sanction de l’UE2 anglais secondaire étaient centrées sur le domaine économique. La compréhension à l’écrit appliquée au domaine considéré de niveau A2 a donc déjà été validée.
																	</td>
																	<td>
																		<div class="radio">
																			<label for="ami"  >
																				 <input type="radio" name="origine" value="acquis" id="ecritAcquis">
																				 Acquis 
																			 </label>
																		 </div>
																		 <div class="radio">
																		  <label for="web" class="radio">
																			<input type="radio" name="origine" value="non acquis" id="ecritNonAcquis">
																			N/A 
																		  </label>
																		</div>   
																	</td>
																  </tr>
																  <tr>
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en interaction oral : interagir (répondre à des questions et en poser, réagir à des affirmations et en émettre, faire des suggestions et réagir à des propositions, etc.) en utilisant les expressions adéquates pour répondre aux besoins de la vie socioprofessionnelle du domaine considéré  (économique, informatique, technique, scientifique, artistique, etc.) ; </td>

																  </tr>
																  <tr>
																	<td colspan="2">Motivation :<br/>
																	L’UE2 niveau secondaire a validé la compétence de niveau A2 pour la langue en général à l’oral en interaction.
																	La rencontre à l’oral (cf annexe – questions posées) a permis de valider la compétence de niveau A2 pour la langue appliquée au domaine économique à l’oral en interaction.
																	</td>
																	<td>
																		<div class="radio">
																			<label for="ami"  >
																				 <input type="radio" name="origine" value="acquis" id="interactionOralAcquis">
																				 Acquis 
																			 </label>
																		 </div>
																		 <div class="radio">
																		  <label for="web" class="radio">
																			<input type="radio" name="origine" value="non acquis" id="interactionOralNonAcquis">
																			N/A 
																		  </label>
																		</div>   
																	</td>
																  </tr>
																  <tr>
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en production orale en continu : présenter brièvement sa formation, son travail, ses collègues ou des activités quotidiennes passées, présentes et/ou futures relatives à la vie socioprofessionnelle.</td>

																  </tr>
																  <tr>
																	<td colspan="2">Motivation :<br/>
																	L’UE2 niveau secondaire a validé la compétence de niveau A2 pour la langue en général à l’oral en continu
																	La rencontre à l’oral (cf annexe – questions posées) a permis de valider la compétence de niveau A2 pour la langue appliquée au domaine économique à l’oral en continu.
																	</td>
																	<td>
																		<div class="radio">
																			<label for="ami"  >
																				 <input type="radio" name="origine" value="acquis" id="oralContinuAcquis">
																				 Acquis 
																			 </label>
																		 </div>
																		 <div class="radio">
																		  <label for="web" class="radio">
																			<input type="radio" name="origine" value="non acquis" id="oralContinuNonAcquis">
																			N/A 
																		  </label>
																		</div>   
																	</td>
																  </tr>
																  <tr>
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en production écrite : produire un message cohérent simple relatif à une situation courante de la vie socioprofessionnelle liée au domaine considéré (économique, informatique, technique, scientifique, artistique, etc.).</td>

																  </tr>
																  <tr>
																	<td colspan="2">Motivation :<br/>
																	L’UE2 niveau secondaire a validé la compétence de niveau A2 pour la langue en général à l’écrit en production.
																	L’expression écrite du test de sanction de l’UE2 anglais secondaire était centré sur le domaine économique. L’expression à l’écrit appliquée au domaine considéré a déjà été évaluée.

																	</td>
																	<td>
																		<div class="radio">
																			<label for="ami"  >
																				 <input type="radio" name="origine" value="acquis" id="ecritProductionAcquis">
																				 Acquis 
																			 </label>
																		 </div>
																		 <div class="radio">
																		  <label for="web" class="radio">
																			<input type="radio" name="origine" value="non acquis" id="ecritProductionNonAcquis">
																			N/A 
																		  </label>
																		</div>   
																	</td>
																  </tr>

																</tbody>
															  </table>

														</div>
													</div>
													<div class="row">
																<div class="form-group">

																	<div class="col-lg-8 col-lg-offset-2 " style="margin-bottom: 15px;" >
																		<textarea id="information" class="form-control" placeholder="Note" rows="5"  ></textarea>
																	</div>

																	<div class="col-lg-5 col-lg-offset-3">
																		<select class="form-control selection">
																			<option value="" disabled selected >Status</option>
																			<option value="En cours" >En cours</option>
																			<option value="Accepté">Accepté</option>
																			<option value="Refusé">Refusé</option>
																		</select>
																	</div>
																</div>
													</div>
													


											</form>
									 </div>
									  <div class="modal-footer">
										<button type="submit" class="btn btn-danger col-lg-offset-4 col-lg-3 " data-dismiss="modal" id="btnEnregistrer" >Enregistrer</button>
									  </div>
									</div>

								  </div>
					</div>
					 
			   </div>
			
		</section>
	</div>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<script src="../js/toolbox.js"></script>
	
	<script>
		$(document).ready(function() {
			$('.tableStudent').DataTable();
		} );
		$(function(){
				displayAlertMessage("#btnEnregistrer","#msgUpdate");
				
	    	});	
			
	</script>
  </body>
</html>
