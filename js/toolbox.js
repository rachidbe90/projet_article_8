//affiche un alert de confirmation d'enregistrement 	
function displayAlertMessage(element,msg){
	$(element).click(function(){		
		$(msg).show("slow").delay(1500).hide("slow");
	});
}
//affiche la section mot de passe de la page users.php
function displayPasswordSection (){
		$("#linkPassword").on("click",function(){
			$("#passwordSection").show("slow").delay(4000);		 
		});
		$("#linkPasswordSetting").on("click",function(){
			$("#passwordSectionSetting").show("slow").delay(4000);		 
		 });
}
