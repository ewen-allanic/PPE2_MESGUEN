<!DOCTYPE html>
<html>
<head>
	<title>AC13- Organiser les tournees</title>
</head>
<body>
	<form id="formulaire" action="" method="get">
			<fieldset style="width:720px;">

				<label for="liste">Lieu</label>
			    
			    	<select size="1">
			    
			    		<option selected="selected">LCM LE RHEU</option>
			    		<option >PLOUGASTEL</option>
			    		<option >MESGUEN</option>

			    	</select>

			   		<br/>
					<br/>

					<label for="Date">Rendez vous entre </label>
					<input id ="date" name="date" type="datetime-local" value="<?php echo date("d/m/Y H:i"); ?>" />	

					<p>
						et
					</p>

					<label for="Date">Pris en charge le  </label>
					<input id ="date" name="date" type="datetime-local" value="<?php echo date("d/m/Y H:i"); ?>" />	

					<p>
				
					<label for="zonetexte">Commentaire </label> 
					<textarea id="zonetexte" name="zonetexte" rows="5" cols="20"></textarea>
					
				</p>

		   
		    	<input type="reset" value="Annuler"/>
		    	<input type="submit" value="Valider"/>

	</form>
	
	<style type="text/css">
		label{
			display: block;
			width: 150px;
			float: left;
		}

		input, select{
			width: 160px;
		}
</style>
</body>	
</html>