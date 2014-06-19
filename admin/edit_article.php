<?php

	require_once("includes/authenticated.php");
	include_once("includes/actions.php");
	$title = "Modifier un article";
	include_once("includes/header.php"); 
	
	$query = mysql_query ("SELECT title, text FROM articles WHERE id_article=" . mysql_real_escape_string ($_GET['id_article']));
	$article = mysql_fetch_assoc($query);
	if ($article === false) {
		header("Location: gestion_articles.php");
		}
?>


<h2>Modifier un article</h2>
<form class='edit_article' action="edit_article.php?id_article=<?php echo $_GET['id_article']; ?> " method="post">
	<input type="hidden" name="action" value="edit_article" /> <!-- addArticle doit etre ecrit pareille que dans action -->
	<fieldset class="fields">
		<div class="row">
			<label for="title">Titre</label>
			<input type="text" name="title" value="<?php
				if (isset($_POST["title"])) {
					echo $_POST["title"];
				}
				else {
					echo $article['title'];
					}
			?>"/>
			
		<?php if (isset($messages) && isset($messages["title"])){
			echo '<div class="error">' . $messages["title"] . "</div>"; // '<div class="error">' pas de double cote entre div et fermeture de la div
			//sinon c est pas bon
			} ?>
		</div>
		<div class="row">
		<label for="text">Text</label>
		<textarea name="text"><?php
				if (isset($_POST["text"])) { // POST EN MAJUSCULE
					echo $_POST["text"];
			}
			
			else {
					echo $article['text'];
					}
			
			?></textarea>
			
			<?php if (isset($messages) && isset($messages["text"])){
			echo '<div class="error">' . $messages["text"] . "</div>"; 
			
			} ?>
				
			
		</div>
	</fieldset>	
	
		<fieldset class="action">
		<button type="submit">Enregistrer</button>
	</fieldset>

</form>
<?php include_once("includes/footer.php");?>