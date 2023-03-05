<?php

//get categories
function getCategories() {
    global $db;
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

//category name by id?
function getCategoryName($catID) {
    global $db;
    $query = 'SELECT * FROM categories WHERE categoryID = :categoryId';
    $statement = $db->prepare($query);
    $statement->bindValue(":categoryId", $catID);
    $statement->execute();
    $category = $statement->fetchAll();
    $statement->closeCursor();
    if (empty($category)) {
        return null; // or some default value
    }
    $category_name = $category[0]['categoryName'];
    return $category_name;
}


//delete category
function deleteCategory($catID) {
    global $db;
    $query = 'DELETE FROM categories WHERE categoryID = :categoryId';
    $statement = $db->prepare($query);
    $statement->bindValue(":categoryId", $catID);
    $statement->execute();
    $statement->closeCursor();  
}

//add category
function addCategory($catName) {
    global $db;
    $query = 'INSERT INTO categories ( categoryName ) VALUE (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $catName);
    $statement->execute();
    $statement->closeCursor();
}

?>