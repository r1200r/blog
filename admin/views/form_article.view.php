<form class='form_article' action="" method="post">
	<input type="hidden" name="action" value="form_article" /> <!-- addArticle doit etre ecrit pareille que dans action -->
	<fieldset class="fields">
		<div class="row">
			<label for="title">Titre</label>
			<input type="text" name="title" value="<?php echo $articletitle; ?>"/>
			
			
		<?php if (isset($messages) && isset($messages["title"])){
			echo '<div class="error">' . $messages["title"] . "</div>"; // '<div class="error">' pas de double cote entre div et fermeture de la div
			//sinon c est pas bon
			} ?>
		</div>
		<div class="row">
		<label for="text">Text</label>
		<textarea name="text"><?php echo $articletext; ?></textarea>
			
			<?php if (isset($messages) && isset($messages["text"])){
			echo '<div class="error">' . $messages["text"] . "</div>"; 
			
			} ?>
				
		</div>
	</fieldset>	
	
		<fieldset class="action">
		<button type="submit">Enregistrer</button>
	</fieldset>

</form>