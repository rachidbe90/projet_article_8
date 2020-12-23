<!--https://www.xul.fr/dom/images-dynamiques.php-->
<!doctype html>
<html>

	<head>			
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">
			<link href="../css/style.css" rel="stylesheet">
			<script type="text/javascript" src="../js/toolbox.js"></script>
	</head>

<body>
	<div class="container">
		<?php include("../includes/header.php") ?>
		<section class="row" >	
				
				<?php include("../includes/menu.php") ?>
				<div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 box col-lg-offset-1 col-md-offset-4   col-sm-offset-4 " >
					<ul class="nav nav-tabs ">
						<li class="active "><a class="color-tab" data-toggle="tab" href="#user"><span class="glyphicon glyphicon-user"></span>  Utilisateur</a></li>
						<li><a class="color-tab" data-toggle="tab" href="#setting"><span class="fas fa-toolbox"></span> Administration</a></li>
								
					</ul>
					<div class="tab-content content">
						<div id="user" class="tab-pane fade in active">
							<div class="form-horizontal col-lg-7 col-lg-offset-3" >
								<form id="userForm"  method="post" action="" onsubmit="return valider();" >								
									<div class="row">
										<div class="form-group">
											
											<div class="col-lg-4 col-lg-offset-3">
												<input id="userStatut" type="text" class="form-control" placeholder="Statut" disabled/>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-lg-5">
												<input id="name" type="text" class="form-control" placeholder="Nom" />
											</div>
											<div class="col-lg-5">
												<input id="firstName" type="text" class="form-control" placeholder="Prénom" />
											</div>

										</div>
									</div>

									<div class="row">
										<div class="form-group">
											<div class="col-lg-8">
												<input id="login" type="email" class="form-control" placeholder="Login" />
											</div>
											
											
										</div>
									</div>
									
									<fieldset>
										<legend><a href="#" id="linkPassword" > Nouveau mot de passe?</a></legend>
										<div id="passwordSection">
											<div class="form-group">



												<div class="col-lg-offset-1 col-lg-8 col-md-9 col-sm-9 col-xs-8 input-group ">
													<span class="glyphicon glyphicon-lock input-group-addon glyphAdjust"></span>
													<input type="password" class="form-control " id="oldPassword" placeholder="Ancien mdp..." form-control />
													<span  class="glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust" onclick="changeImage(this);"></span>

												</div>

											</div>
											<div class="form-group">
												<div class="col-lg-offset-1 col-lg-9 col-md-9 col-sm-9 col-xs-8 input-group " >
													<div class="progressUser " style="display:none;margin-top:0px;">
														   <div class="progressbarUser" style=" text-align:center;"></div>
													</div>	
												</div>
											</div>
											<div class="form-group">

													<div class="col-lg-offset-1 col-lg-8 col-md-9 col-sm-9 col-xs-8 input-group" >
															<span class="glyphicon glyphicon-lock input-group-addon glyphAdjust"></span>
															<input type="password" class="form-control " id="passUser" placeholder="Nouveau mdp..." />
															<span  class="glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust" onclick="changeImage(this);"></span>
																
													</div>
													
													
																		
													
											</div>
											<div class="form-group" >

													<div class="col-lg-offset-1 col-lg-8 col-md-9 col-sm-9 col-xs-8 input-group " >
														<span class="glyphicon glyphicon-lock input-group-addon glyphAdjust"  ></span>
														<input type="password" class="form-control" id="new2Password" placeholder="Réintroduire mdp..." />
														<span  class="glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust" onclick="changeImage(this);"></span>

													</div>

											</div>
										</div> 
									</fieldset>
									<div class="form-group btnFrom">
										<button type="submit" class="btn btn-danger col-lg-offset-3 col-lg-4" id="btnRecordUser" data-toggle="modal" data-target=".myModal" data-backdrop="static" >Enregistrer</button>
									</div>
									<div   class=" modal fade myModal" role="dialog">
									  <div class="modal-dialog" >
										<div class="modal-content">
									  	  <div class="modal-header">
										    <button type="button" class="close" data-dismiss="modal">&times;</button>
										    <h4 class="modal-title" style="text-align:center;color:#414D5A;font-weight:bold;">Confirmation</h4>
									      </div>
									   	 <div class="modal-body">
											<div class="alert alert-success"  class="msgUser">
												<p class="msgAlert">Utilisateur Enregistré!</p>
											</div>		
									  	 </div>
									  	<div class="modal-footer">
										  <button type="button" class="btn btn-danger col-lg-offset-4 col-lg-3 " data-dismiss="modal" class="btnOk" id="btnOk" onClick=send()>ok</button>
									  	</div>
									   </div>

								   </div>
								 </div>
								   
							</form>
							</div>
							
							

						</div>
						<div id="setting" class="tab-pane fade in ">
							
								<form id="administration" class="form-horizontal col-lg-7 col-lg-offset-3" method="post" action="">								
									<div class="row">
										<div class="form-group">
											
											<div class="col-lg-8 col-lg-offset-1">
												<select class="form-control selection" id="usersList">
														<option value="" disabled selected >Administrateurs</option>
														<option value="Dimitri" >Dimitri</option>
														<option value="Martin">Martin</option>
														
												</select>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="form-group">
											<div class="col-lg-5">
												<input id="newUserName" type="text" class="form-control" placeholder="Nom" />
											</div>
											<div class="col-lg-5">
												<input id="newUserFirstName" type="text" class="form-control" placeholder="Prénom" />
											</div>

										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-lg-8 col-lg-offset-1">
												<input id="newUserLogin" type="email" class="form-control" placeholder="Login" />
											</div>
											
											
										</div>
									</div>
									
									<fieldset>
										<legend><a href="#" id="linkPasswordSetting" > Nouveau mot de passe?</a></legend>
										<div id="passwordSectionSetting">
											<div class="form-group">
												<div class="col-lg-offset-1 col-lg-9 col-md-9 col-sm-9 col-xs-8 input-group " >
													<div class="progressAdministration " style="display:none;margin-top:0px;">
														   <div class="progressbarAdministration" style=" text-align:center;"></div>
													</div>	
												</div>
											</div>
											
											<div class="form-group" >

													<div class="col-lg-offset-1 col-lg-8 col-md-9 col-sm-9 col-xs-8 input-group " >
														<span class="glyphicon glyphicon-lock input-group-addon glyphAdjust"  ></span>
														<input type="password" class="form-control" id="newUserPassword" placeholder="introduire mdp..." />
														<span  class="glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust" onclick="changeImage(this);"></span>

													</div>

											</div>
										<div class="form-group" >

												<div class="col-lg-offset-1 col-lg-8 col-md-9 col-sm-9 col-xs-8 input-group " >
													<span class="glyphicon glyphicon-lock input-group-addon glyphAdjust"  ></span>
													<input type="password" class="form-control" id="newUserPassword2" placeholder="Réintroduire mdp..." />
													<span  class="glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust" onclick="changeImage(this);"></span>

												</div>

										</div>
										
									  </div>
								  </fieldset>
									<div class="form-group btnForm" >
										<button type="submit" class="btn btn-danger col-lg-offset1 col-lg-4" id="btnRecordSetting" data-toggle="modal" data-target=".myModal" data-backdrop="static">Enregistrer</button>
										<button type="button" class="btn btn-danger col-lg-offset-2 col-lg-4" id="btnDeleteSetting" data-toggle="modal" data-target=".myModalDelete" data-backdrop="static">Supprimer</button>
									</div>
									<div   class=" modal fade myModal" role="dialog">
									  <div class="modal-dialog" >
										<div class="modal-content">
									  	  <div class="modal-header">
										    <button type="button" class="close" data-dismiss="modal">&times;</button>
										    <h4 class="modal-title" style="text-align:center;color:#414D5A;font-weight:bold;">Confirmation</h4>
									      </div>
									   	 <div class="modal-body">
											<div class="alert alert-success"  class="msgUser">
												<p class="msgAlert">Utilisateur Enregistré!</p>
											</div>		
									  	 </div>
									  	<div class="modal-footer">
										  <button type="button" class="btn btn-danger col-lg-offset-4 col-lg-3 " data-dismiss="modal" class="btnOk" onClick="send(); ">ok</button>
									  	</div>
									   </div>

								   </div>
								 </div>
									<div   class=" modal fade myModalDelete" role="dialog">
									  <div class="modal-dialog" >
										<div class="modal-content">
									  	  <div class="modal-header">
										    <button type="button" class="close" data-dismiss="modal">&times;</button>
										    <h4 class="modal-title" style="text-align:center;color:#414D5A;font-weight:bold;">Confirmation</h4>
									      </div>
									   	 <div class="modal-body">
											<div class="alert alert-warning"  class="msgUser">
												<p class="msgAlert">Êtes-vous sûre de supprimer cet utilisateur?</p>
											</div>		
									  	 </div>
									  	<div class="modal-footer">
										  <button type="button" class="btn btn-danger col-lg-offset-3 col-lg-3 " data-dismiss="modal" id="btnModalYes" onClick="send2(); ">oui</button>
										  <button type="button" class="btn btn-danger  col-lg-3 " data-dismiss="modal" id="btnModalNo">Non</button>
									  	</div>
									   </div>

								   </div>
								 </div>
								
							</form>
							
						</div>

					  
					  
				
					
			   </div>
			
		</section>
	</div>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/seePassword.js"></script>
	
	<script language="javascript" type="text/javascript" src="../js/passwordInfos.js"></script>
	<script>
		//annule l'envoi du formulaire (pour pouvoir afficher la fenêtre modal)
		$(document).ready(function(){	
			$( "#userForm" ).submit(function( event ) {
			  event.preventDefault();
		   });	
			$( "#administration" ).submit(function( event ) {
			  event.preventDefault();
		   });
			
		});
		//une fois le bouton ok de la fenêtre modal, on réactive l'envoi du formulaire
		function send(){
			document.getElementById("userForm").submit();			
		}
		function send2(){

			document.getElementById("administration").submit();
		}	
		$(function(){
				displayPasswordSection();
		});
		
	</script>
  </body>
</html>
