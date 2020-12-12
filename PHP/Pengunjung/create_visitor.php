<?php
require_once '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase();
$db->newVisitor();

header("Location: visitor.php");
