<?php
require_once '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase();

// echo "HAI MONYET";
$db->newBorrowers();

header("Location: borrowes.php");
