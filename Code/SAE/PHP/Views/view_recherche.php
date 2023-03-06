<?php
    require_once "view_begin.php";
?>
<style>
    <?php include_once "Content/css/style_recherche.css";?>
</style>
  <body>
</br>
  <form class="d-flex" role="search">
            <input class="form-control length-search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
          </form>
          
</br>
    <div class="container4" style="margin:auto">
      <div class="films-section">
        <h2 class="text-center">Titres</h2>
        <?php foreach($titres as $titre):?>
        <div class="film-card flex-md-row mb-4 row">
          <img src=<?php
						if ($titre['poster'] == null){
							echo "Content/img/NoImageAvailable.png";
						}else{
							echo $titre['poster'];
						}
						?> alt=<?=e($titre['primarytitle']) ?> style>
          <div class="col p-4 d-flex flex-column flex-start">
          <?php if($titre['tconst'] != null):?>
          <h3><a href=<?php echo "?controller=recherche&action=affichage&search=".$titre['tconst'];?> style="color:white; text-decoration:none">
						<?=e($titre['primarytitle']);?>
			  </a>
          </h3>
          <?php else:?>
            <h3><?=e($titre['primarytitle']);?></h3>
          <?php endif;?>
          <p>Genres : <?=e($titre['genres']) ?> <br/>
		    Durée : <?=e($titre['runtimeminutes']) ?>min<br/>
			Note : <?=e($titre['averagerating']) ?>/10</p>
          <p><?php
						if ($titre['description'] == null){
							echo "Pas de description";
						}else{
							echo $titre['description'];
						}
						?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      
      <div class="actors-section">
        <h2 class="text-center">Personnes</h2>
        <?php foreach($personnes as $personne):?>
        <div class="actor-card flex-md-row mb-4 row">
            <img src=<?php
						if ($personne['poster'] == null){
							echo "Content/img/NoImageAvailable.png";
						}else{
							echo $personne['poster'];
						}
						?> alt=<?=e($personne['primaryname']) ?>>
          <div class="col p-4 d-flex flex-column flex-start">
          <?php if($personne['nconst'] != null):?>
          <h3><a href=<?php echo "?controller=recherche&action=affichage&search=".$personne['nconst'];?> style="color:white; text-decoration:none">
						<?=e($personne['primaryname']);?>
			  </a>
          </h3>
          <?php else:?>
            <h3><?=e($personne['primaryname']);?></h3>
          <?php endif;?>
            <p>Profession : <?=e($personne['primaryprofession'])?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
  <?php
    require_once "view_end.php";
?>