<?php
try {
    $bdd = new PDO('mysql:host=localhost;port=3306;dbname=pays;charset=utf8', 'theo', 'theo');

} catch(PDOException $e) {
    print "Erreur !: " . $e->getMessage();
    die();
}
?>