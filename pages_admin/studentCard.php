<?php
include ('../db/connexion.php');
include('../verification/verif_session.php');
$student = $_GET['etudiant'];

$etudiants = $dbh->query("SELECT personne.ID, EMAIL, TELEPHONE, NOM, PRENOM, section.NOM_SECTION SECTION, NOM_COURS, demande.DATE_DEMANDE DATE_DEMANDE, demande.DATE_DECISION DATE_DECISION, statut_demande.NOMSTATDEMAND as ETAT_DEMANDE
FROM demande
	JOIN personne ON personne.ID = demande.ID
	JOIN section ON personne.ID_SECTION = section.ID_SECTION
    JOIN cours ON demande.ID_COURS = cours.ID_COURS
    JOIN statut_demande ON statut_demande.ID_STA_DEMAND = demande.ID_STA_DEMAND
    JOIN statut ON statut.ID_STATUT = personne.ID_STATUT
WHERE statut.NOM_STATUT = 'etudiant'AND EMAIL ='$student' ")->fetchAll();
foreach ($etudiants as $etudiant);

$Cours = $dbh->query("SELECT * FROM cours WHERE NOM_COURS =". $etudiant['NOM_COURS'])->fetchAll();
foreach ($Cours as $cour);

?>
<!doctype html>
<html>

	<head>			
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
			
			<link href="../css/style.css" rel="stylesheet">
			
	</head>

<body>
	<div class="container">
		<?php include("../includes/header.php") ?>
		<section class="row" >	
				
				<?php include("../includes/menu.php") ?>
				<div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 box col-lg-offset-1 col-md-offset-4   col-sm-offset-4 " >
					<ul class="nav nav-tabs ">
						<li class="active "><a class="color-tab" data-toggle="tab" href="#student"><span class="fa fa-graduation-cap"> </span> Etudiant</a></li>
				    </ul>
					<div class="tab-content content">
						<div id="student" class="tab-pane fade in active">
							<form class="form-horizontal col-lg-7 col-lg-offset-3" method="post" action="studentAnalyseVerif.php?etudiant=<?php echo $student?>">

									<div class="row">

										<div class="form-group">
											<div class="col-lg-5">

												<input id="name" type="text" class="form-control" placeholder="<?php echo $etudiant['NOM']?>" disabled/>
											</div>
											<div class="col-lg-5">
												<input id="firstName" type="text" class="form-control" placeholder="<?php echo $etudiant['PRENOM']?>" disabled/>
											</div>

										</div>
									</div>

									<div class="row">
										<div class="form-group">
											<div class="col-lg-5">
												<input id="phone" type="tel" class="form-control" placeholder="<?php echo $etudiant['TEL']?>" disabled/>
											</div>
											<div class="col-lg-5">
												<input id="email" type="email" class="form-control" placeholder="<?php echo $etudiant['MAIL']?>" disabled/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-lg-8">
												<input id="section" type="text" class="form-control" placeholder="<?php echo $etudiant['SECTION']?>" disabled/>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group date">
											<div class="col-lg-5">
												<label>Demande faite :</label>
											</div>
											<div class="col-lg-5">
												<label>Date limite:</label>
											</div>

										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-lg-5">
												<input id="dateSended" type="date" class="form-control"  value="<?php echo $etudiant['DATE_DEMANDE']?>" disabled/>
											</div>
											<div class="col-lg-5">
												<input id="deadLine" type="date" class="form-control"  value="<?php $date_limite = date('Y-m-d', strtotime($etudiant['DATE_DEMANDE']. ' + 7 days')); echo $date_limite;?>" disabled />
											</div>

										</div>
									</div>
                            </form>
								<div class="row">
										<div class="form-group">
											
											<div class="col-lg-8 col-lg-offset-2">
												<div class=" table-responsive ">
															<div class="panel panel-default">
																<table class="table table-bordered table-striped table-condensed"  >
																	
																			
													<?php

														$cpt=0;

														foreach ($etudiants as $etudiant){
															echo '
															<tr>
																 <td><label>Dossier reçu:</label></td>'.
															    '<td style="text-align:center;"><a href="" >'.$etudiant['NOM_COURS'].'</a></td>'.
															    '<td style="text-align:center;">
																	<button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target=".myModal" data-backdrop="static" id="btnAnalyze'.$cpt.'" onclick="catchId(this);" >
																			
																			Analyser
																	</button>
																	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".myModal" data-backdrop="static" id="btnUpdate'.$cpt.'" onclick="catchId(this);" style="display:none;" >
																			Modifier
																	</button>
																</td>
															</tr>'.
															'<tr>
																<td><label>Document probant:</label></td>
																<td colspan="2" style="text-align:center;"><a href="">Attestation Forem A1</a></td>
															 </tr>';
															$cpt++;}
													?>
					
																	
																</table>
														    </div>
												</div>

											</div>

										</div>
                                </div>

								<div  class=" modal fade myModal" role="dialog">
								  <div class="modal-dialog">
                                      <form class="form-horizontal col-lg-12 " method="post" action="studentAnalyseVerif.php?etudiant=<?php echo $student?>">
									<div class="modal-content">

                                        <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title" style="text-align:center;color:#414D5A;font-weight:bold;">Analyse de la demande</h4>
                                        </div>
                                        <div class="modal-body">

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
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en compréhension orale : <br><?php echo $cour['NOM_COURS'] ?></td>

																  </tr>

																  <tr>
																	<td colspan="2">Motivation :<br/>
																	    introduire la motivation php
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
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en compréhension de l'écrit : <br><?php echo $cour['NOM_COURS'] ?></td>

																  </tr>
																  <tr>
																	<td colspan="2">Motivation :<br/>
                                                                        introduire la motivation php
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
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en interaction oral : <br><?php echo $cour['NOM_COURS'] ?></td>

																  </tr>
																  <tr>
																	<td colspan="2">Motivation :<br/>
                                                                        introduire la motivation php
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
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en production orale en continu : <br><?php echo $cour['NOM_COURS'] ?></td>

																  </tr>
																  <tr>
																	<td colspan="2">Motivation :<br/>
                                                                        introduire la motivation php
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
																	<td colspan="2" class="backgroundTd">Analyse du prérequis en production écrite : <br><?php echo $cour['NOM_COURS'] ?></td>

																  </tr>
																  <tr>
																	<td colspan="2">Motivation :<br/>
                                                                        introduire la motivation php
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
                                                                                <option value="Admis">Admis</option>
                                                                                <option value="Refus">Refus</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                        </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger col-lg-offset-4 col-lg-3 " data-dismiss="modal" id="btnEnregistrer" ;">Enregistrer</button>
                                            </div>

                                      </div>

                                    </div>
                                      </form>
                                  </div>
								</div>
                                <?php

                                if ($_GET['analyse']=='ok'){
                                    echo '<div class="alert alert-success" style="display:none;" id="msgStudentCard">
                                        <p class="msgAlert">Analyse terminé!</p>
                                    </div>';
                                }else{
                                    echo '<div class="alert alert-danger" style="display:none;" id="msgStudentCard">
                                        <p class="msgAlert">erreur</p>
                                           </div>';
                                }

                                ?>
						</div>
					</div>
			
			   </div>
			
		</section>
	</div>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	

	<script src="../js/toolbox.js"></script>
	<script>		
			$(function(){
				displayAlertMessage("#btnEnregistrer","#msgStudentCard");
				
	    	});
			var id="#";
			/*au click du bouton enregistrer de la fenetre modal, le bouton analyser de la page studentCard disparait et on fait apparaitre
				le bouton modifier*/
			function disableBtn(){
				var str = id;
				var idUpdate = str.replace("Analyze", "Update");
				$(id).hide();
				$(idUpdate).show();	
			}
			//on récupère l'id du bouton clické par l'utilisateur et on la stocke dans la variable global id
			function catchId(elmt){
				id="#";
				id+=elmt.id;
			}
	</script>
  </body>
</html>
