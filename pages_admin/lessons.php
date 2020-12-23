<?php
include ('../db/connexion.php');
include('../verification/verif_session.php');

$matieres = $dbh->query('SELECT * FROM matiere JOIN sujet_de ON matiere.ID_MATIERE = sujet_de.ID_MATIERE
	JOIN unite	ON unite.ID_UNITE = sujet_de.ID_UNITE
    JOIN prerequises ON prerequises.ID_PREREQ = unite.ID_PREREQ')->fetchAll();
foreach ($matieres as $matiere);

?>
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
				<div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 box col-lg-offset-1 col-md-offset-4   col-sm-offset-4 " >
					<ul class="nav nav-tabs ">
						<li class="active "><a class="color-tab" data-toggle="tab" href="#lessons"><span class="fa fa-book"> </span> Cours</a></li>
						
								
					</ul>
					<div class="tab-content content">
						<div id="lessons" class="tab-pane fade in active">
							
							<form id="lessonsForm" class="form-horizontal" method="post" action="">
									

								
									
									<div class="form-group">
									  <label class="col-md-4 control-label" for="name">Nom cours:</label>  
									  <div class="col-md-4">
									  <select id="name" name="name"   class="form-control input-md">
                                          <?php
                                          echo '<option  selected disabled > Cours</option >';
                                          $langues = $dbh->query('SELECT * FROM matiere ')->fetchAll();
                                            foreach ($langues as $langue) {
                                                echo '<option>'. $langue['NOM_MATIERE'] .'</option>';
											  	}
											?>
										  </select>

									  </div>
									</div>

									
									<div class="form-group">
									  <label class="col-md-4 control-label" for="level">Niveau:</label>  
									  <div class="col-md-4">
									   <select id="level" name="level" type="text"  class="form-control input-md">
										 		<option  selected disabled>Niveau</option>
                                           <?php
                                           echo '<option  selected disabled > Cours</option >';
                                           $langues = $dbh->query('SELECT * FROM UNITE ')->fetchAll();
                                           foreach ($unites as $unite) {
                                               echo '<option>'. $langue['NOM_MATIERE'] .'</option>';
                                           }
                                           ?>
										  </select>

									  </div>
									</div>

									
									<div class="form-group">
									  <label class="col-md-4 control-label" for="period">Nombre périodes:</label>  
									  <div class="col-md-4">
									  <input id="period" name="period" type="number"  min="10" max="300" step="5" class="form-control input-md">

									  </div>
									</div>


								<div class="form-group">
									  <label class="col-md-4 control-label" for="capacityName">Nom capacité:</label>  
									  <div class="col-md-4 ">
									  	  <select id="capacityName" name="capacityName" type="text"  class="form-control input-md">
										 		<option  selected disabled>Choix</option>
											  	<option>Compréhension à l'oral</option>
											  	<option>Compréhension à l'écrit</option>
											  	<option>En intéraction oral</option>
											    <option>En production orale en continu</option>
											    <option>En production écrite</option>
											  	
										  </select>
									  </div>
									</div>

									
									<div class="form-group">
									  <label class="col-md-4 control-label" for="descriptionCapacity">Description capacité:</label>  
									  <div class="col-lg-6 col-md-4">
										  <textarea id="descriptionCapacity"   class="form-control" rows="8">
										  </textarea>
											
									  </div>
									</div>
									
								
								
							</form>
								

						</div>
								
			   </div>
			
		</section>
	</div>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  </body>
</html>
