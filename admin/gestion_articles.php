<?php
	require_once("includes/authenticated.php");
	include_once("includes/header.php");
	include_once("includes/actions.php");
	$title = "Gestion des articles"; 
	$query = mysql_query('select id_article, title, date FROM articles');
	
?>

<h2>Gestion des articles</h2>

<div class="action">
	<a href="add_article.php">Ajouter un article</a>
	
</div>

<table class='articles'>
	<thead>
		<th style='width: 40px;'>ID</th>
		<th style='width: 200px;'>Titre</th>
		<th style='width: 200px;'>Date</th>
		<th style='width: 200px;'>Action</th>
	</thead>
	<?php
		while ($row = mysql_fetch_assoc($query)){
		echo '
			<tr>
				<td>' . $row['id_article'] . '</td>
				<td>' .$row ['title'] . '</td>
				<td>' .$row ['date'] . '</td>
				<td></td>
			</tr>
		';
	}
	?>
				
</table>
<?php include_once('includes/footer.php');?>