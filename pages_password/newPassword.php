<!doctype html>
<html>
	<head>			
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link href="css/style.css" rel="stylesheet">
			<style>
				/*	https://www.bootdey.com/snippets/view/colored-modals#html
					.modal[data-modal-color="green"] .modal-content {
  					background: #D4EDDA;*/
}
			</style>
	</head>

<body>
	<div class="container">
			<div class="row">
				<div class="pull-left ">
					<a href="../index.php"><img src="../img/Logo.png" alt="logo"/></a>
				</div>
				<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4   hidden-xs">
					<h1>Gestion des valorisations des acquis</h1>
				</div>
			</div>
		<section class="row">	
				<div class="col-lg-5 col-md-4 col-sm-6 col-xs-7 box col-lg-offset-4 col-md-offset-4   col-sm-offset-4 col-xs-offset-2">
					
						<form id="newPasswordForm"class=" col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" method="post" action="">
							<legend>Entrez nouveau mot de passe</legend>
							  <div class="form-group">	
								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 ">
									<div class="progress" style="display:none;">
           								<div class="progressbar" style="text-align:center;"></div>
          							</div>	
								</div>
							</div>
							<div class="form-group">

									<div class="col-md-9 col-sm-9 col-xs-8 input-group">
											<span class="glyphicon glyphicon-lock input-group-addon glyphAdjust"></span>
											<input type="password" class="form-control " id="pass" placeholder=" mdp..." focus/>
											<span  class="glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust" onclick="changeImage(this);"></span>
									</div>
									
							</div>
							<div class="form-group" >

									<div class=" col-md-9 col-sm-9 col-xs-8 input-group " >
										<span class="glyphicon glyphicon-lock input-group-addon glyphAdjust"  ></span>
										<input type="password" class="form-control" id="pass2" placeholder="Réintroduire mdp..." />
										<span  class="glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust" onclick="changeImage(this);"></span>

									</div>

							</div>
						
							<button type="submit" class="btn btn-danger col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"  data-toggle="modal" data-target=".myModal" data-backdrop="static" id="submit">Enregistrer</button>
							<div   class="modal fade myModal" role="dialog" data-modal-color="green">
									  <div class="modal-dialog" >
										<div class="modal-content">
									  	  <div class="modal-header">
										    <button type="button" class="close" data-dismiss="modal">&times;</button>
										    <h4 class="modal-title" style="text-align:center;color:#414D5A;font-weight:bold;">Confirmation</h4>
									      </div>
									   	 <div class="modal-body">
											<div class="alert alert-success"  class="msgUser">
												<p class="msgAlert">Nouveau mot de passe Enregistré!</p>
											</div>		
									  	 </div>
									  	<div class="modal-footer">
										  <button type="button" class="btn btn-danger col-lg-offset-4 col-lg-3 " data-dismiss="modal" class="btnOk" onClick="send(); ">ok</button>
									  	</div>
									   </div>
								     </div>
							</div>					
					   </form>
					</div>
				
			</section>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/seePassword.js"></script>
	<script language="javascript" type="text/javascript" src="js/passwordInfos.js"></script>
	<script>
			//annule l'envoi du formulaire (pour pouvoir afficher la fenêtre modal)
		$(document).ready(function(){	
			$( "#newPasswordForm" ).submit(function( event ) {
			  event.preventDefault();
		   });	
			
		});
		//une fois le bouton ok de la fenêtre modal, on réactive l'envoi du formulaire
		function send(){
			document.getElementById("newPasswordForm").submit();
			
		}
		
	</script>
</body>
</html>
