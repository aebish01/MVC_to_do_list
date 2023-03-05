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

function addItem($title, $catID, $description) {
    global $db;
    $query = 'INSERT INTO todoitems ( Title, categoryID, Description ) VALUE (:title, :categoryId, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':categoryId', $catID);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

?>