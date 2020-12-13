<?php
require '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase;
$isbn = $_POST['isbn'];
$buku = $db->deleteBook($isbn);

header("Location: ListofBooks.php");
