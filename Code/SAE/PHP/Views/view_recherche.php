<?php
    require_once "view_begin.php";
?>
<body>
    <div id="search-results">
    <h2>Movies</h2>
    <ul>
        <?php if (isset($titres) && count($titres) > 0 ): ?>
            <?php foreach ($titres as $film): ?>
                <li>
                    <p><b>Title: </b><?= $film[0]['primarytitle'] ?></p>
                    <p><b>Genres: </b><?= $film[0]['genres'] ?></p>
                    <p><b>Start Year: </b><?= $film[0]['startyear'] ?></p>
                    <p><b>Is Adult: </b><?php if($film[0]['isadult']) :?> Oui <?php else: ?>No <?php endif; ?></p>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No movies found.</li>
        <?php endif; ?>
    </ul>

    <h2>People</h2>
    <ul>
        <?php if (isset($personnes) && count($personnes) > 0 ): ?>
            <?php foreach ($personnes as $personne): ?>
                <?php echo var_dump($personne[0]); ?>
                <li>
                    <p><b>Name: </b><?= $personne[0]['primaryname'] ?></p>
                    <p><b>Birth Year: </b><?= $personne[0]['birthyear'] ?></p>
                    <p><b>Death Year: </b><?= $personne[0]['deathyear'] ?></p>
                    <p><b>Primary Profession: </b><?= $personne[0]['primaryprofession'] ?></p>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No people found.</li>
        <?php endif; ?>
    </ul>
</div>
</body>

<?php
    require_once "view_end.php";
?>