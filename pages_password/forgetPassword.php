<!doctype html>
<html>

	<head>			
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<link href="css/style.css" rel="stylesheet">
			
				
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
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-7 box col-lg-offset-4 col-md-offset-4   col-sm-offset-4 col-xs-offset-2">
					
						<form id="recoveryPasswordForm"class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" method="post" action="">
							<legend>Récuperation mot de passe</legend>
							<div class="form-group">

									<div class="col-md-9 col-sm-9 col-xs-8 input-group">
											<span class="glyphicon-envelope glyphicon input-group-addon glyphAdjust"></span>
											<input type="email" class="form-control " id="email" placeholder="Email..." focus/>

									</div>

							</div>
							
							<button type="submit" class="btn btn-danger col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-2" data-toggle="modal" data-target=".myModal" data-backdrop="static">Envoyer</button>
							<div   class=" modal fade myModal" role="dialog">
									  <div class="modal-dialog" >
										<div class="modal-content">
									  	  <div class="modal-header">
										    <button type="button" class="close" data-dismiss="modal">&times;</button>
										    <h4 class="modal-title" style="text-align:center;color:#414D5A;font-weight:bold;">Confirmation</h4>
									      </div>
									   	 <div class="modal-body">
											<div class="alert alert-success"  class="msgUser">
												<p class="msgAlert">Un e-mail vient de vous être envoyé!</p>
											</div>		
									  	 </div>
									  	<div class="modal-footer">
										  <button type="button" class="btn btn-danger col-lg-offset-4 col-lg-3 " data-dismiss="modal" class="btnOk" onClick="sendForm(); ">ok</button>
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
	<script src="js/toolbox.js" type="text/javascript"></script>
	<script>
	

		$(document).ready(function(){		
				disableSubmit("#recoveryPasswordForm");		
		});
		//annule l'envoi du formulaire (pour pouvoir afficher la fenêtre modal)	
		function disableSubmit(element){
			  /*version javascript:document.getElementById(element).addEventListener("click", function(event){	
					event.preventDefault();
				});*/
			$(element).submit(function( event ) {
				 event.preventDefault();
			});
		}
		//une fois le bouton ok de la fenêtre modal, on réactive l'envoi du formulaire
		function sendForm(){		
			document.getElementById("recoveryPasswordForm").submit();	
			//$("#recoveryPasswordForm").submit();
		}
	
	</script>
</body>
</html>
