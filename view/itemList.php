<?php include('/xampp/htdocs/MVC_todo_list/view/header.php'); ?>
<Section class="list">

    <?php foreach($items as $item) : ?>
        <div class="listItems">
            <form action="." method="POST">
                <input type="hidden" name="action" value="deleteItem">
                <input type="hidden" name="itemNum" value="<?= $item['ItemNum'] ?>">
                <button>X</button>
            </form>
            <p class="bold"><?php echo $item['Title'] ?></p>
            <?php $categoryName = getCategoryName($item['categoryID']);
                if ($categoryName === null) { ?>
                    <p>No category</p>
                <?php } else { ?>
                    <p><?php echo $categoryName ?></p>
                <?php } ?>
            <p><?php echo $item['Description'] ?></p>
        </div>
    <?php endforeach ?>
</Section>

<section class="add">
    <h2>Add to the to do list</h2>
    <form action="." method="POST" id="add_form" class="add_form">
        <input type="hidden" name="action" value="addItem">
        <div class="add_inputs">
            <label>Title: &emsp; &emsp; &nbsp;</label>
            <input type="text" name="title" maxlength="20" placeholder="Title" required>
           <br>
            <label>Category: &ensp; &nbsp;</label>
            <select name="categoryId" required>
                <option value="">Please select</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['categoryID'] ?>">
                        <?= $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label>Descritpion: &nbsp;</label>
            <input type="text" name="description" maxlength="50" placeholder="Description" required>
        </div>
        <br>
        <div class="addButton">
            <button class="add-button">Add</button>
        </div>
    </form>
</section>
<p><a href=".?action=displayCategory">View/Edit Courses</a></p>