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
			
	</head>

<body>
	<div class="container">
		<?php include("../includes/header.php") ?>
		<section class="row" >	
				
				<?php include("../includes/menu.php") ?>
				<div class="col-lg-9 col-md-4 col-sm-6 col-xs-8 box col-lg-offset-1 col-md-offset-4   col-sm-offset-4 col-xs-offset-4" >
					<ul class="nav nav-tabs ">
						<li class="active "><a class="color-tab" data-toggle="tab" href="#sessionDate"><span class="fa fa-book"> </span> Dates de session</a></li>
						
								
					</ul>
					<div class="tab-content content">
						<div id="sessionDate" class="tab-pane fade in active ">
							
							<form id="sessionDateForm" class="form-horizontal" method="post" action="">
									

								
									
									<div class="form-group">
									  <label class="col-md-4 control-label" for="name">Date début:</label>  
									  <div class="col-md-4">
									  	<input id="startDate" type="date"/>
									  </div>
									</div>

									
									<div class="form-group">
									  <label class="col-md-4 control-label" for="level">Date fin:</label>  
									  <div class="col-md-4">
									  	<input id="startDate" type="date"/>
									  </div>
									</div>							
									<div class="form-group">
									   
									   <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1">
											<button id="btnSend" name="btnSend" class="btn btn-danger" data-toggle="modal" data-target=".myModal" data-backdrop="static">Envoyer</button>
									  </div>
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
												<p class="msgAlert">Nouvelle session Enregistré!</p>
											</div>		
									  	 </div>
									  	<div class="modal-footer">
										  <button type="button" class="btn btn-danger col-lg-offset-4 col-lg-3 " data-dismiss="modal"  onClick="send(); ">ok</button>
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
	<script>
		$(document).ready(function(){	
			$( "#sessionDateForm" ).submit(function( event ) {
			  event.preventDefault();
		   });	
			
		});	
		function send(){
			document.getElementById("sessionDateForm").submit();
			
		}
		
	</script>
  </body>
</html>
