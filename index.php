<?php

require('model/database.php');
require('model/todo.php');

$id = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'listItems';
    }
}
switch ($action) { 
    case "addItem":
        addItem($title, $description);
        header('http://localhost/MVC_todo_list');
    case "deleteItem":
        deleteItem($id);
        header('http://localhost/MVC_todo_list');
    default:
        $items = displayItem();
        include('/xampp/htdocs/MVC_todo_list/view/itemList.php');
}

?>