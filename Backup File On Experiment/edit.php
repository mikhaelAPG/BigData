
<?php 
    require_once '../../Database/MongodbDatabase.php';
    $db = new MongodbDatabase();
    $db->editVisitor();
    header("Location: visitor.php");
?>