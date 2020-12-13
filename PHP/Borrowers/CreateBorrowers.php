<?php
require_once '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase();
$db->newBorrowers();
header("Location: Borrowers.php");
