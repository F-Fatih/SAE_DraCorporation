<?php require_once "view_begin.php"; ?>
<!-- Pour importer le CSS custom-->
<link href="Content/css/style.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-6 left">
        <br>
        <br>
            <div class="card shadow-sm">
            <img src="\SAE\PHP\Content\img\tlou.png" class="rounded float-start" alt="tlou">
                <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" href="?controller=articleTLOU">Voir plus ></button>
                        </div>
                        <small class="text-muted">6 mins</small>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 right">
        <br>
        <br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="\SAE\PHP\Content\img\topgun.png" class="rounded float-start" alt="topgun">
                        <div class="card-body">
                            <p class="card-text">Top Gun Maverick, le retour d’un classique après 36 ans</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" href="?controller=articleTopgun">Voir plus ></button>
                                    </div>
                                    <small class="text-muted">4 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img src="\SAE\PHP\Content\img\mercredi.jpg" class="rounded float-start" alt="mercredi">
                        <div class="card-body">
                            <p class="card-text">Mercredi, la nouvelle série Netflix de Tim Burton</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" href="?controller=articleMercredi">Voir plus ></button>
                                </div>
                                <small class="text-muted">5 mins</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img src="\SAE\PHP\Content\img\tolkien.jpg" class="rounded float-start" alt="tolkien">
                        <div class="card-body">
                            <p class="card-text">La résurrection du monde de Tolkien avec "Les Anneaux du Pouvoir"</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" href="?controller=articleTolkien">Voir plus ></button>
                                </div>
                                <small class="text-muted">6 mins</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img src="\SAE\PHP\Content\img\dragon.jpg" class="rounded float-start" alt="dragon">
                        <div class="card-body">
                            <p class="card-text">House of the Dragon, le nouveau succès de George R.R. Martin</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" href="?controller=articleDragon">Voir plus ></button>
                                </div>
                                <small class="text-muted">7 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "view_end.php"; ?>
