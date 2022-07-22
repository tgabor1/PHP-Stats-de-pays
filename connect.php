<?php
try {
    $db = new PDO('mysql:host=localhost;port=3306;dbname=id19308260_df;charset=utf8', 'id19308260_bnn', 'J|-q}EUD$>c4my|u');

} catch(PDOException $e) {
    print "Erreur !: " . $e->getMessage();
    die();
}
?>