<?php
require_once 'connect.php';
$requete = 'SELECT * FROM t_pays';

if(isset($_GET["continent"])){ // si let GET Continent exist
    //alors chqnger la requette par rapport au cotinent dan le get
    $selectRegionRequete = 'SELECT * FROM t_regions WHERE continent_id ='.$_GET["continent"];
    $requete = 'SELECT * FROM t_pays WHERE  continent_id ='.$_GET["continent"];
}
elseif($_GET["region"]){
    $requete = 'SELECT * FROM t_pays WHERE  continent_id ='.$_GET["continent"] . ' AND region_id ='.$_GET["region"];
}
else{
    // si non afficher tout les regions
    $selectRegionRequete = 'SELECT * FROM t_regions';
}

// PDO::query — Prépare et exécute une requête SQL sans marque substitutive
$statement = $db->query($requete);
// PDOStatement::fetchAll — Récupère les lignes restantes d'un ensemble de résultats
$data = $statement->fetchAll();

// Continents
$selectContinentRequete = 'SELECT * FROM t_continents';
$selectContinentQuery = $db->query($selectContinentRequete);
$selectContinent = $selectContinentQuery->fetchAll();

// Régions
// $selectRegionRequete = 'SELECT * FROM t_regions';
$selectRegionQuery = $db->query($selectRegionRequete);
$selectRegion = $selectRegionQuery->fetchAll();

?>
<link rel="stylesheet" href="style.css">
<h1>Population du monde</h1>
<p>Par continent</p>
<form>
    <select name="continent" onchange="this.form.submit()">
        <option value="">Choisir un continent</option>
        <?php foreach ($selectContinent as $continent) : ?>
            <?php if (isset($_GET["continent"]) && $_GET["continent"] == $continent["id_continent"]) : ?>
                <option value="<?php echo ($continent['id_continent']) ?>" selected><?php echo ($continent['libelle_continent']) ?></option>
            <?php else : ?>
                <!-- J'ai remplacé le echo par un raccourci -->
                <option value="<?= $continent["id_continent"] ?>"><?= $continent["libelle_continent"] ?></option>
            <?php endif ?>
        <?php endforeach ?>
    </select>

    <select name="region" onchange="this.form.submit()">
        <option value="">Choisir une région</option>
        <?php foreach ($selectRegion as $region) : ?>
            <?php if (isset($_GET["region"]) && $_GET["region"] == $region["id_region"]) : ?>
                <option value="<?= ($region['id_region']) ?>" selected><?php echo ($region['libelle_region']) ?></option>
            <?php else : ?>
                <option value="<?= $region["id_region"] ?>"><?= $region["libelle_region"] ?></option>
            <?php endif ?>
        <?php endforeach ?>
    </select>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Pays</th>
            <th>Population totale (en milliers)</th>
            <th>Taux de natalité</th>
            <th>Taux de mortalité</th>
            <th>Espérance de vie</th>
            <th>Taux de mortalité infantile</th>
            <th>Nombre d'enfant(s) par femme</th>
            <th>Taux de croissance</th>
            <th>Population de 65 ans et plus (en milliers)</th>
        </tr>
    </thead>
    <?php foreach ($data as $datas) : ?>
        <tbody>
            <tr>
                <td><?= $datas['libelle_pays'] ?></td>
                <td><?= $datas['population_pays'] ?></td>
                <td><?= $datas['taux_natalite_pays'] ?></td>
                <td><?= $datas['taux_mortalite_pays'] ?></td>
                <td><?= $datas['esperance_vie_pays'] ?></td>
                <td><?= $datas['taux_mortalite_infantile_pays'] ?></td>
                <td><?= $datas['nombre_enfants_par_femme_pays'] ?></td>
                <td><?= $datas['taux_croissance_pays'] ?></td>
                <td><?= $datas['population_plus_65_pays'] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
</table>