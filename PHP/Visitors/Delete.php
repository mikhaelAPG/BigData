<?php
require_once '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase();
$db->deleteVisitor();

header("Location: Visitors.php");
