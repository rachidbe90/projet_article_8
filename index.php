<?php
session_start();
//include ('verification/verif_session.php');
if(isset($_SESSION['mail']) && $_SESSION['profil']=='Secretariat'){
    header('Location: ./pages_admin/admin_home.php');
    exit;
}elseif (isset($_SESSION['mail']) && $_SESSION['profil']=='Etudiant'){
    header('Location: ./pages_student/student_home.php');
    exit;
}elseif (isset($_SESSION['mail']) && $_SESSION['profil']=='Directeur'){
    header('Location: ./pages_student/admin_home.php');
    exit;
}
?>
<!doctype html>
<html>

	<head>			
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="css/style.css" rel="stylesheet">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
				
	</head>

<body>
	<div class="container">
		<header>
			<div class="row">
				<div class="pull-left ">
					<a href="index.php"><img src="img/Logo.png" alt="logo"/></a>
				</div>
				<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4   hidden-xs">
					<h1>Gestion des valorisations des acquis</h1>
				</div>
			</div>
		</header>
		<section class="row">	
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-7 box col-lg-offset-4 col-md-offset-4   col-sm-offset-4 col-xs-offset-2">
					
						<form id="connexionForm" class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" method="post" action="./verification/verif_login.php">
							<div class="form-group">

									<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 input-group">
											<span class="glyphicon glyphicon-user input-group-addon" style="position:relative;top:-0.1px;"></span>
											<input type="text" class="form-control " name="email" id="email" placeholder="prenom.nom@hainaut-promsoc.be"  /><!--focus pattern="[A-Za-z]+.[A-Za-z]+@hainaut-promsoc.be$" required-->

									</div>

							</div>
							<div class="form-group" >

									<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 input-group " >
										<span class="glyphicon glyphicon-lock input-group-addon"  style="position:relative;top:-0.1px;"></span>
                                        <input type="password" class="form-control " name="mdp" id="mdp" placeholder="password..." />
                                        <span  class="glyphicon glyphicon-eye-open input-group-addon unmask" onclick="changeImage(this);" style="position:relative;top:0.1px;"></span>
									</div>
                                <?php
                                if(isset($_GET['erreur']) && $_GET['erreur']==1){
                                    echo '<p class="alert alert-danger" role="alert">
                                                      Mot de passe incorrect
                                                    </p>';
                                }elseif(isset($_GET['erreur']) && $_GET['erreur']==2){
                                    echo '<p class="alert alert-danger" role="alert">
                                                      les champs ne sont pas remplis
                                                    </p>';
                                }
                                ?>

                            </div>
							<div class="form-group" >

									<div class=" col-md-9 col-sm-9 col-xs-8 input-group col-lg-offset-2 col-md-offset-1   col-sm-offset-1 col-xs-offset-1" >
										
										<a class="linkPassword" href="pages_password/forgetPassword.php">Mot de passe oublié?</a>

									</div>
                                    <div class=" col-md-9 col-sm-9 col-xs-8 input-group col-lg-offset-2 col-md-offset-1   col-sm-offset-1 col-xs-offset-1" >

                                        <a class="linkInscription" href="inscription.php">Inscription!</a>

                                    </div>

							</div>
							<input type="submit" id="enter" value="Connexion" class="btn btn-danger col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"></input>
							<div class="alert alert-danger" style="display:none;" id="msgConnexion">
									<p class="msgAlert">login ou mot de passe erroné!</p>
							</div>
						</form>
					
			   </div>
			
		</section>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/seePassword.js"></script>
	<script src="js/toolbox.js"></script>
	<script>
		/*	$(function(){
				displayAlertMessage("#enter","#msgConnexion");
				
	    	});	
			 $(document).ready(function(){	
				$( "#connexionForm" ).submit(function( event ) {
				  event.preventDefault();
			   });	

			});	
			function send(){
				document.getElementById("connexionForm").submit();

			}*/
		
	</script>
	
</body>
</html>
