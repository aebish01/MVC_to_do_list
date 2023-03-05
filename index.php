<?php

require('model/database.php');
require('model/todo.php');
require('model/categories.php');

$id = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);
$catID = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_INT);
$catName = filter_input(INPUT_POST, 'categoryName', FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'listItems';
    }
}
switch ($action) { 
    case "addItem":
        addItem($title, $catID, $description);
        header('http://localhost/MVC_todo_list');
        break;
    case "addCategory":
        addCategory($catName);
        header('http://localhost/MVC_todo_list/');
    case "deleteCategory":
        deleteCategory($catID);
        header('http://localhost/MVC_todo_list/?action=displayCategory');
    case "deleteItem":
        deleteItem($id);
        header('http://localhost/MVC_todo_list/');
    case "displayCategory":
        $categories = getCategories();
        header('http://localhost/MVC_todo_list/?action=displayCategory');
    default:
        $items = displayItem();
        $categories = getCategories();
        //$category_name = getCategoryName($catID);
        include('/xampp/htdocs/MVC_todo_list/view/itemList.php');
}

?>