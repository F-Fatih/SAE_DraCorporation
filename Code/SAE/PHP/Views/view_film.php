<?php
require_once "view_begin.php";
?>
<style>
	<?php include_once "Content/css/style_film.css"; ?>
</style>

<body>
	<div class="containertt">
		<div class="left">
			<img src=<?php
			if ($titre['poster'] == null) {
				echo "Content/img/NoImageAvailable.png";
			} else {
				echo $titre['poster'];
			}
			?> alt=<?= e($titre['primarytitle']) ?> style="width:100%; height:auto;">
		</div>
		<div class="right">
			<h2>
				<?= e($titre['primarytitle']) ?>
			</h2>
			<p>Genres :
				<?= e($titre['genres']) ?>
			</p>
			<p>Durée :
				<?= e($titre['runtimeminutes']) ?>min
			</p>
			<p>Note :
				<?= e($titre['averagerating']) ?>/10
			</p>
			<p>Nombre de votes :
				<?= e($titre['numvotes']) ?>
			</p>
			<p>
				<?php
				if ($titre['description'] == null) {
					echo "Pas de description";
				} else {
					echo $titre['description'];
				}
				?>
			</p>
			<div class="rating-container">
				<form method="post" action="./index.php?controller=notation&action=notation">
					<input type="hidden" name="tconst" value="<?=e($titre["tconst"])?>">
					<label for="rating">Note ce film:</label>
					<input type="number" name="rating" id="note" min="0" max="10" step="0.1" required><br>

					<input type="submit" value="Soumettre">
				</form>
				</p>
			</div>
		</div>
	</div>

	<div class="carousel-container">
		<h2>Films</h2>
		<div class="carousel">
			<?php foreach ($titre['personnes'] as $personne): ?>
				<div class="item">
					<img src=<?= e($personne['poster']) ?> alt=<?= e($personne['primaryname']); ?>>
					<h3><a href=<?php echo "?controller=recherche&action=affichage&search=" . $personne['nconst']; ?>
							style="color:white; text-decoration:none"><?= e($personne['primaryname']); ?></a></h3>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</body>

<?php
require_once "view_end.php";
?>