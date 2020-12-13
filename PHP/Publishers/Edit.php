
<?php
require_once '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase();
$db->editPublisher();
header("Location: Publishers.php");
?>