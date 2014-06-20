		<h2 class ='centre'> formulaire d'autentification</h2>
		<hr /><!-- pour faire un trait -->
		<p class ='centre'>veuillez vous identifier pour accédere à l'espace protégé</p>
		<form class='login' action="login.php" method="post">
		<input type="hidden" name="action" value="login" />
			<fieldset class="fields">
				<div class="row">
					<label for="username">votre nom d'utilisateur</label>
					<input class="arrondi" type="text" name="username" value="<?php 
					if (isset($_POST ["username"])) {				
						echo $_POST["username"];
					}
					?>" />
				</div>
				<div class="row">
					<label for="password">votre mot de passe</label>
					<input class="arrondi" type="password" name="password" value="<?php
					if (isset($_POST ["password"])) {		// pour que les chants ne s'efface pas le mot de passe ou comme plus haut name reste dans le chant
						echo $_POST["password"];
					}
					?>" />
					
				</div>
			</fieldset>
			<fieldset class="action">
				<button type="submit">connection</button>
			</fieldset>
</form>