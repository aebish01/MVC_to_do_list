<?php include('/xampp/htdocs/MVC_todo_list/view/header.php'); ?>
<Section class="list">
    <?php foreach($items as $item) : ?>
        <div class="listItems">
            
                <p class="bold"><?php echo $item['Title'] ?></p>
                
                <form action="." method="POST">
                    <input type="hidden" name="action" value="deleteItem">
                    <input type="hidden" name="itemNum" value="<?= $item['ItemNum'] ?>">
                    <button>X</button>
                </form>
        
                <p><?php echo $item['Description'] ?></p>
            
        
        </div>
    <?php endforeach ?>
</Section>

<section class="add">
    <h2>Add to the to do list</h2>
    <form action="." method="POST" id="add_form" class="add_form">
        <input type="hidden" name="action" value="addItem">
        <div class="add_inputs">
            <label>Title:</label>
            <input type="text" name="title" maxlength="20" placeholder="Title" required>
            <label>Descritpion:</label>
            <input type="text" name="description" maxlength="50" placeholder="Description" required>
        </div>
        <div class="addButton">
            <button class="add-button">Add</button>
        </div>
    </form>
</section>