<?php
    require_once "view_begin.php";
?>
<style>
	<?php include_once "Content/css/style_film.css";?>
</style>
<body>
	<div class="containertt">
		<div class="left">
			<img src=<?php
						if ($titre['poster'] == null){
							echo "Content/img/NoImageAvailable.png";
						}else{
							echo $titre['poster'];
						}
						?> alt=<?=e($titre['primarytitle']) ?> style="width:100%; height:auto;">
		</div>
		<div class="right">
			<h2><?=e($titre['primarytitle']) ?></h2>
			<p>Genres : <?=e($titre['genres']) ?></p>
			<p>Durée : <?=e($titre['runtimeminutes']) ?>min</p>
			<p>Note : <?=e($titre['averagerating']) ?>/10</p>
			<p>Nombre de votes : <?=e($titre['numvotes']) ?></p>
			<p><?php
						if ($titre['description'] == null){
							echo "Pas de description";
						}else{
							echo $titre['description'];
						}
						?></p>
		</div>
	</div>
	
	<div class="carousel-container">
		<h2>Films</h2>
		<div class="carousel">
			<?php foreach($titre['personnes'] as $personne):?>
			<div class="item">
				<img src=<?=e($personne['poster'])?> alt=<?=e($personne['primaryname']);?>>
				<h3><a href=<?php echo "?controller=recherche&action=affichage&search=".$personne['nconst'];?> style="color:white; text-decoration:none"><?=e($personne['primaryname']);?></a></h3>
			</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>

	<script src="script.js"></script>
</body>

<?php
    require_once "view_end.php";
?>