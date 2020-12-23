		//fonction qui change le logo eye au click
		function changeImage(element)
		{

		  var v = element.className;
		  v=v.trim();
		  if(v == "glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust" )	
				v = "glyphicon glyphicon-eye-close input-group-addon unmask glyphAdjust";
		  else if(v=="glyphicon glyphicon-eye-open input-group-addon unmask")
				v = "glyphicon glyphicon-eye-close input-group-addon unmask ";
		  else
			v = "glyphicon glyphicon-eye-open input-group-addon unmask glyphAdjust";
		  element.className=v;	
		}


		//permet d'afficher/cacher  le mot de passe
		$('.unmask').on('click', function(){
  
		  if($(this).prev('input').attr('type') == 'password')
			changeType($(this).prev('input'), 'text');

		  else
			changeType($(this).prev('input'), 'password');

		  return false;
		});	
		
		function changeType(x, type) {
		   if(x.prop('type') == type)
			  return x; // ça serait facile.
		   try {
			  // Une sécurité d'IE empêche ceci
			  return x.prop('type', type);
		   } 
		   catch(e) {
			  // On tente de reproduire l'élément
			  // En faisant d'abord une div
			  var html = $("<div>").append(x.clone()).html();
			  var regex = /type=(\")?([^\"\s]+)(\")?/;
			  // la regex trouve type=text ou type="text"
			  // si on ne trouve rien, on ajoute le type à la fin, sinon on le remplace
			  var tmp = $(html.match(regex) == null ?
				 html.replace(">", ' type="' + type + '">') :
				 html.replace(regex, 'type="' + type + '"') );

			  // on rajoute les vieilles données de l'élément
			  tmp.data('type', x.data('type') );
			  var events = x.data('events');
			  var cb = function(events) {
				 return function() {
					//Bind all prior events
					for(i in events) {
					   var y = events[i];
					   for(j in y) tmp.bind(i, y[j].handler);
					}
				 }
			  }(events);
			  x.replaceWith(tmp);
			  setTimeout(cb, 10); // On attend un peu avant d'appeler la fonction
			  return tmp;
		   }
		}
	
	
	

	
	
	
	
	

	