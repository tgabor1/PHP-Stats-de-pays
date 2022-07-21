<?php
require_once('connect.php');

$requete = 'SELECT * FROM t_continents INNER JOIN t_pays ON (t_pays.continent_id=t_continents.id_continent) GROUP BY libelle_continent';
// PDO::query — Prépare et Exécute une requête SQL sans marque substitutive
$statement = $bdd->query($requete);
// PDOStatement::fetchAll — Récupère les lignes restantes d'un ensemble de résultats

$data = $statement->fetchAll();

// var_dump($data)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exo database pays</title>
</head>

<body>
    <h1>Population du monde</h1>
    <p>Par continent</p>
    <select>
        <option value="">Monde</option>
        <option value="">Afrique</option>
        <option value="">Amérique Latine et Caraïbes</option>
        <option value="">Amérique Septentrionale</option>
        <option value="">Asie</option>
        <option value="">Europe</option>
        <option value="">Océanie</option>
    </select>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Pays</th>
                <th scope="col">Population totale (en milliers)</th>
                <th scope="col">Taux de natalité</th>
                <th scope="col">Taux de mortalité</th>
                <th scope="col">Espérance de vie</th>
                <th scope="col">Taux de mortalité infantile</th>
                <th scope="col">Nombre d'enfant(s) par femme</th>
                <th scope="col">Taux de croissance</th>
                <th scope="col">Population de 65 ans et plus (en milliers)</th>
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
                <?php endforeach ?>
            </tbody>
    </table>
</body>

</html>