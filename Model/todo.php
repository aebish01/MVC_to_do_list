<?php

function displayItem() {
    global $db;
    $query = 'SELECT * FROM todoitems';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function deleteItem($itemNum) {
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":itemNum", $itemNum);
    $statement->execute();
    $statement->closeCursor();    
}

function addItem($title, $description) {
    global $db;
    $query = 'INSERT INTO todoitems ( Title, Description ) VALUE (:title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

?>